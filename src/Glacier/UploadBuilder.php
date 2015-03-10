<?php
namespace Aws\Glacier;

use Aws\Multipart\AbstractUploadBuilder;
use Aws\Multipart\UploadState;
use Aws\Result;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamableInterface;
use GuzzleHttp\Psr7;
use GuzzleHttp\Subscriber\MessageIntegrity\HashingStream;
use GuzzleHttp\Subscriber\MessageIntegrity\PhpHash;

/**
 * Creates a multipart uploader used to easily upload large archives to Glacier.
 */
class UploadBuilder extends AbstractUploadBuilder
{
    protected $config = [
        'id' => ['accountId', 'vaultName', 'uploadId'],
        'part' => [
            'min_size' => 1048576,
            'max_size' => 4294967296,
            'max_num'  => 10000,
            'param'    => 'range',
        ],
        'initiate' => [
            'command' => 'InitiateMultipartUpload',
            'params'  => [],
        ],
        'upload' => [
            'command' => 'UploadMultipartPart',
            'params'  => [],
        ],
        'complete' => [
            'command' => 'CompleteMultipartUpload',
            'params'  => [],
        ],
        'abort' => [
            'command' => 'AbortMultipartUpload',
            'params'  => [],
        ],
    ];

    /** @var string Archive description. */
    protected $archiveDescription;

    public function __construct()
    {
        parent::__construct();
        $this->uploadId['accountId'] = '-';
    }

    /**
     * Set the account ID of the the archive.
     *
     * @param string $accountId ID of the account.
     *
     * @return self
     */
    public function setAccountId($accountId)
    {
        $this->uploadId['accountId'] = $accountId;

        return $this;
    }

    /**
     * Set the vault name to upload the archive to.
     *
     * @param string $vaultName Name of the vault.
     *
     * @return self
     */
    public function setVaultName($vaultName)
    {
        $this->uploadId['vaultName'] = $vaultName;

        return $this;
    }

    /**
     * Set the upload ID of the upload.
     *
     * @param string $uploadId ID of the upload.
     *
     * @return self
     */
    public function setUploadId($uploadId)
    {
        $this->uploadId['uploadId'] = $uploadId;

        return $this;
    }

    /**
     * Set the archive description.
     *
     * @param string $description Description to associate with the archive.
     *
     * @return self
     */
    public function setArchiveDescription($description)
    {
        $this->config['initiate']['params']['archiveDescription'] = $description;

        return $this;
    }

    protected function prepareParams()
    {
        $this->config['initiate']['params']['partSize'] = $this->state->getPartSize();
    }

    protected function loadStateByUploadId(array $params = [])
    {
        $state = new UploadState($params);

        // Get all of the parts and archive information
        $partSize = null;
        $results = $this->client->getPaginator('ListParts', $params);
        foreach ($results as $result) {
            if (!$partSize) $partSize = $result['PartSizeInBytes'];
            foreach ($result['Parts'] as $part) {
                $rangeData = $this->parseRange($part['RangeInBytes'], $partSize);
                $state->markPartAsUploaded($rangeData['PartNumber'], [
                    'size'     => $rangeData['Size'],
                    'checksum' => $part['SHA256TreeHash'],
                ]);
            }
        }
        $state->setPartSize('partSize', $partSize);
        $state->setStatus($state::INITIATED);

        return $state;
    }

    protected function determinePartSize()
    {
        // Make sure the part size is set.
        $partSize = $this->specifiedPartSize ?: $this->config['part']['min_size'];

        // Calculate list of valid part sizes.
        static $validSizes;
        if (!$validSizes) {
            $validSizes = array_map(function ($n) {
                return pow(2, $n) * $this->config['part']['min_size'];
            }, range(0, 12));
        }

        // Ensure that the part size is valid.
        if (!in_array($partSize, $validSizes)) {
            throw new \InvalidArgumentException('The part size must be a power '
                . 'of 2, in megabytes, such that 1 MB <= PART_SIZE <= 4 GB.');
        }

        return $partSize;
    }

    protected function getCompleteParamsFn()
    {
        return function () {
            $treeHash = new TreeHash();
            $archiveSize = 0;
            foreach ($this->state->getUploadedParts() as $part) {
                $archiveSize += $part['size'];
                $treeHash->addChecksum($part['checksum']);
            }

            return [
                'archiveSize' => $archiveSize,
                'checksum'    => bin2hex($treeHash->complete()),
            ];
        };
    }

    protected function getResultHandlerFn()
    {
        return function (CommandInterface $command, Result $result) {
            // Get data from the range.
            $rangeData = $this->parseRange(
                $command['range'],
                $this->state->getPartSize()
            );

            // Store the data we need for later.
            $this->state->markPartAsUploaded($rangeData['PartNumber'], [
                'size'     => $rangeData['Size'],
                'checksum' => $command['checksum']
            ]);
        };
    }

    protected function getCreatePartFn()
    {
        return function ($seekable) {
            $data = [];
            $firstByte = $this->source->tell();

            // Read from the source to create the body stream. This also
            // calculates the linear and tree hashes as the data is read.
            if ($seekable) {
                // Case 1: Stream is seekable, can make stream from new handle.
                $body = Psr7\try_fopen($this->source->getMetadata('uri'), 'r');
                $body = $this->limitPartStream(Stream::factory($body));
                // Create another stream decorated with hashing streams and read
                // through it, so we can get the hash values for the part.
                $decoratedBody = $this->decorateWithHashes($body, $data);
                while (!$decoratedBody->eof()) $decoratedBody->read(1048576);
                // Seek the original source forward to the end of the range.
                $this->source->seek($this->source->tell() + $body->getSize());
            } else {
                // Case 2: Stream is not seekable, must store part in temp stream.
                $source = $this->limitPartStream($this->source);
                $source = $this->decorateWithHashes($source, $data);
                $body = Stream::factory();
                Psr7\copy_to_stream($source, $body);
            }

            $body->seek(0);
            $data['body'] = $body;
            $lastByte = $this->source->tell() - 1;
            $data['range'] = "bytes {$firstByte}-{$lastByte}/*";

            return $data;
        };
    }

    /**
     * Decorates a stream with a tree AND linear sha256 hashing stream.
     *
     * @param StreamableInterface $stream Stream to decorate.
     * @param array               $data   Data bag that results are injected into.
     *
     * @return StreamableInterface
     */
    private function decorateWithHashes(StreamableInterface $stream, array &$data) {
        // Make sure that a tree hash is calculated.
        $stream = new HashingStream($stream, new TreeHash(),
            function ($result) use (&$data) {
                $data['checksum'] = bin2hex($result);
            }
        );

        // Make sure that a linear SHA256 hash is calculated.
        $stream = new HashingStream($stream, new PhpHash('sha256'),
            function ($result) use (&$data) {
                $data['ContentSHA256'] = bin2hex($result);
            }
        );

        return $stream;
    }

    /**
     * Parses a Glacier range string into a size and part number.
     *
     * @param string $range    Glacier range string (e.g., "bytes 5-5000/*")
     * @param int    $partSize The part size
     *
     * @return array
     */
    private function parseRange($range, $partSize)
    {
        // Strip away the prefix and suffix.
        if (strpos($range, 'bytes') !== false) {
            $range = substr($range, 6, -2);
        }

        // Split that range into it's parts.
        list($firstByte, $lastByte) = explode('-', $range);

        // Calculate and return data from the range.
        return [
            'Size'       => $lastByte - $firstByte + 1,
            'PartNumber' => intval($firstByte / $partSize) + 1,
        ];
    }
}
