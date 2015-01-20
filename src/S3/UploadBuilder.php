<?php
namespace Aws\S3;

use Aws\Multipart\AbstractUploadBuilder;
use Aws\Multipart\UploadState;
use Aws\Result;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Mimetypes;
use GuzzleHttp\Stream\LazyOpenStream;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\Utils;
use GuzzleHttp\Subscriber\MessageIntegrity\HashingStream;
use GuzzleHttp\Subscriber\MessageIntegrity\PhpHash;

/**
 * Creates a multipart uploader used to easily upload large objects to S3.
 */
class UploadBuilder extends AbstractUploadBuilder
{
    protected $config = [
        'id' => ['Bucket', 'Key', 'UploadId'],
        'part'   => [
            'min_size' => 5242880,
            'max_size' => 5368709120,
            'max_num'  => 10000,
            'param'    => 'PartNumber',
        ],
        'initiate' => [
            'command' => 'CreateMultipartUpload',
            'params'  => [],
        ],
        'upload' => [
            'command' => 'UploadPart',
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

    /**
     * Set the bucket to upload the object to
     *
     * @param string $bucket Name of the bucket
     *
     * @return self
     */
    public function setBucket($bucket)
    {
        $this->uploadId['Bucket'] = $bucket;

        return $this;
    }

    /**
     * Set the key of the object
     *
     * @param string $key Key of the object to upload
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->uploadId['Key'] = $key;

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
        $this->uploadId['UploadId'] = $uploadId;

        return $this;
    }

    protected function prepareParams()
    {
        // Set the content type, if not specified, and can be detected.
        if (!isset($this->config['initiate']['params']['ContentType'])
            && ($uri = $this->source->getMetadata('uri'))
        ) {
            if ($mimeType = Mimetypes::getInstance()->fromFilename($uri)) {
                $this->config['initiate']['params']['ContentType'] = $mimeType;
            }
        }
    }

    protected function loadStateByUploadId(array $params = [])
    {
        $state = new UploadState($params);

        $partSize = null;
        foreach ($this->client->getIterator('ListParts', $params) as $part) {
            if (!$partSize) $partSize = $part['Size'];
            $state->markPartAsUploaded($part['PartNumber'], [
                'PartNumber' => $part['PartNumber'],
                'ETag'       => $part['ETag']
            ]);
        }
        $state->setPartSize($partSize);
        $state->setStatus($state::INITIATED);

        return $state;
    }

    protected function determinePartSize()
    {
        // Make sure the part size is set.
        $partSize = $this->specifiedPartSize ?: $this->config['part']['min_size'];

        // Adjust the part size to be larger for known, x-large uploads.
        if ($sourceSize = $this->source->getSize()) {
            $partSize = (int) max(
                $partSize,
                ceil($sourceSize / $this->config['part']['max_num'])
            );
        }

        // Ensure that the part size follows the rules: 5 MB <= size <= 5 GB
        if ($partSize < $this->config['part']['min_size']
            || $partSize > $this->config['part']['max_size']
        ) {
            throw new \InvalidArgumentException('The part size must be no less '
                . 'than 5 MB and not greater than 5 GB.');
        }

        return $partSize;
    }

    protected function getCreatePartFn()
    {
        return function ($seekable, $number) {
            // Initialize the array of part data that will be returned.
            $data = ['PartNumber' => $number];

            // Read from the source to create the body stream.
            if ($seekable) {
                // Case 1: Source is seekable, use lazy stream to defer work.
                $body = $this->limitPartStream(
                    new LazyOpenStream($this->source->getMetadata('uri'), 'r')
                );
            } else {
                // Case 2: Stream is not seekable; must store in temp stream.
                $source = $this->limitPartStream($this->source);
                $source = $this->decorateWithHashes($source,
                    function ($result, $type) use (&$data) {
                        $data['Content' . strtoupper($type)] = $result;
                    }
                );
                $body = Stream::factory();
                Utils::copyToStream($source, $body);
                $data['ContentLength'] = $body->getSize();
            }

            $body->seek(0);
            $data['Body'] = $body;

            return $data;
        };
    }

    protected function getCompleteParamsFn()
    {
        return function () {
            return [
                'MultipartUpload' => [
                    'Parts' => $this->state->getUploadedParts()
                ]
            ];
        };
    }

    protected function getResultHandlerFn()
    {
        return function (CommandInterface $command, Result $result) {
            $this->state->markPartAsUploaded($command['PartNumber'], [
                'PartNumber' => $command['PartNumber'],
                'ETag'       => $result['ETag']
            ]);
        };
    }

    /**
     * Decorates a stream with a md5/sha256 linear hashing stream if needed.
     *
     * S3 does not typically require content hashes (unless using Signature V4),
     * but they can be used to ensure the message integrity of the upload.
     * When using non-seekable/remote streams, we must do the work of reading
     * through the body to calculate parts. In this case, we can wrap the parts'
     * body streams with a hashing stream decorator to calculate the hashes at
     * the same time, instead of having to buffer the stream to disk and re-read
     * the stream later.
     *
     * @param StreamInterface $stream   Stream to decorate.
     * @param callable        $complete Callback to execute for the hash result.
     *
     * @return StreamInterface
     */
    private function decorateWithHashes(StreamInterface $stream, callable $complete)
    {
        // Determine if the checksum needs to be calculated.
        if ($this->client->getSignature() instanceof SignatureV4) {
            $type = 'sha256';
        } elseif ($this->client->getConfig('calculate_md5')) {
            $type = 'md5';
        } else {
            return $stream;
        }

        // Decorate source with a hashing stream
        $hash = new PhpHash($type, ['base64' => true]);
        return new HashingStream($stream, $hash,
            function ($result) use ($type, $complete) {
                return $complete($result, $type);
            }
        );
    }
}
