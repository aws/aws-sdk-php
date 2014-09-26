<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractUploadBuilder;
use Aws\Common\Multipart\PartGenerator;
use Aws\Common\Multipart\UploadState;
use Aws\Glacier\TreeHash;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\Utils;
use GuzzleHttp\Subscriber\MessageIntegrity\HashingStream;
use GuzzleHttp\Subscriber\MessageIntegrity\PhpHash;

/**
 * Creates a multipart uploader used to easily upload large archives to Glacier.
 */
class UploadBuilder extends AbstractUploadBuilder
{
    // An Glacier upload part can be anywhere from 1 MB to 4 GB
    const MIN_PART_SIZE = 1048576;
    const MAX_PART_SIZE = 4294967296;
    const MAX_PARTS = 10000;

    protected $uploadParams = [
        'accountId' => '-',  // Required to initiate.
        'vaultName' => null, // Required to initiate.
        'uploadId'  => null, // Required to upload.
    ];

    /**
     * @var string Archive description.
     */
    protected $archiveDescription;

    /**
     * Set the account ID of the the archive.
     *
     * @param string $accountId ID of the account.
     *
     * @return self
     */
    public function setAccountId($accountId)
    {
        $this->uploadParams['accountId'] = $accountId;

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
        $this->uploadParams['vaultName'] = $vaultName;

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
        $this->addParam(Uploader::INITIATE, 'archiveDescription', $description);

        return $this;
    }

    protected function createUploader()
    {
        $this->addParam(Uploader::INITIATE, 'partSize', $this->partSize);

        $createPart = $this->getCreatePartFn();
        $parts = new PartGenerator($this->source, $this->state, $createPart);

        return new Uploader($this->client, $this->state, $parts, $this->params);
    }

    protected function loadStateFromParams(array $params = [])
    {
        $state = new UploadState($params);

        // Get all of the parts and archive information
        $partSize = null;
        $results = $this->client->getPaginator('ListParts', $params);
        foreach ($results as $result) {
            if (!$partSize) $partSize = $result['PartSizeInBytes'];
            foreach ($result['Parts'] as $part) {
                $rangeData = Uploader::parseRange($part['RangeInBytes'], $partSize);
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
        $partSize = $this->partSize ?: self::MIN_PART_SIZE;

        // Calculate list of valid part sizes.
        static $validSizes;
        if (!$validSizes) {
            $validSizes = array_map(function ($n) {
                return pow(2, $n) * self::MIN_PART_SIZE;
            }, range(0, 12));
        }

        // Ensure that the part size is valid.
        if (!in_array($partSize, $validSizes)) {
            throw new \InvalidArgumentException('The part size must be a power '
                . 'of 2, in megabytes, such that 1 MB <= PART_SIZE <= 4 GB.');
        }

        return $partSize;
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
                $body = Utils::open($this->source->getMetadata('uri'), 'r');
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
                Utils::copyToStream($source, $body);
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
     * @param StreamInterface $stream Stream to decorate.
     * @param array           $data   Data bag that results are injected into.
     *
     * @return StreamInterface
     */
    private function decorateWithHashes(StreamInterface $stream, array &$data) {
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
}
