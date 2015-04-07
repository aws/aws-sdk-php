<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\HashingStream;
use Aws\Multipart\AbstractUploader;
use Aws\Multipart\UploadState;
use Aws\PhpHash;
use Aws\ResultInterface;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamableInterface as Stream;

/**
 * Encapsulates the execution of a multipart upload to S3 or Glacier.
 */
class MultipartUploader extends AbstractUploader
{
    const PART_MIN_SIZE = 5242880;
    const PART_MAX_SIZE = 5368709120;
    const PART_MAX_NUM = 10000;

    /**
     * Creates an UploadState object for a multipart upload by querying the
     * service for the specified upload's information.
     *
     * @param S3Client $client   S3Client used for the upload.
     * @param string   $bucket   Bucket for the multipart upload.
     * @param string   $key      Object key for the multipart upload.
     * @param string   $uploadId Upload ID for the multipart upload.
     *
     * @return UploadState
     */
    public static function getStateFromService(
        S3Client $client,
        $bucket,
        $key,
        $uploadId
    ) {
        $state = new UploadState([
            'Bucket'   => $bucket,
            'Key'      => $key,
            'UploadId' => $uploadId,
        ]);

        foreach($client->getPaginator('ListParts', $state->getId()) as $result) {
            // Get the part size from the first part in the first result.
                if (!$state->getPartSize()) {
                $state->setPartSize($result->search('Parts[0].Size'));
            }
            // Mark all the parts returned by ListParts as uploaded.
            foreach ($result['Parts'] as $part) {
                $state->markPartAsUploaded($part['PartNumber'], [
                    'PartNumber' => $part['PartNumber'],
                    'ETag'       => $part['ETag']
                ]);
            }
        }

        $state->setStatus(UploadState::INITIATED);

        return $state;
    }

    /**
     * Creates a multipart upload for an S3 object.
     *
     * The valid configuration options are as follows:
     *
     * - acl: (string) ACL to set on the object being upload. Objects are
     *   private by default.
     * - before_complete: (callable) Callback to invoke before the
     *   `CompleteMultipartUpload` operation. The callback should have a
     *   function signature like `function (Aws\Command $command) {...}`.
     * - before_initiate: (callable) Callback to invoke before the
     *   `CreateMultipartUpload` operation. The callback should have a function
     *   signature like `function (Aws\Command $command) {...}`.
     * - before_upload: (callable) Callback to invoke before any `UploadPart`
     *   operations. The callback should have a function signature like
     *   `function (Aws\Command $command) {...}`.
     * - bucket: (string, required) Name of the bucket to which the object is
     *   being uploaded.
     * - concurrency: (int, default=int(3)) Maximum number of concurrent
     *   `UploadPart` operations allowed during the multipart upload.
     * - key: (string, required) Key to use for the object being uploaded.
     * - part_size: (int, default=int(5242880)) Part size, in bytes, to use when
     *   doing a multipart upload. This must between 5 MB and 5 GB, inclusive.
     * - state: (Aws\Multipart\UploadState) An object that represents the state
     *   of the multipart upload and that is used to resume a previous upload.
     *   When this options is provided, the `bucket`, `key`, and `part_size`
     *   options are ignored.
     *
     * @param S3Client $client Client used for the upload.
     * @param mixed    $source Source of the data to upload.
     * @param array    $config Configuration used to perform the upload.
     */
    public function __construct(S3Client $client, $source, array $config = [])
    {
        parent::__construct($client, $source, $config + [
            'bucket' => null,
            'key'    => null,
        ]);
    }

    protected function loadUploadWorkflowInfo()
    {
        return [
            'command' => [
                'initiate' => 'CreateMultipartUpload',
                'upload'   => 'UploadPart',
                'complete' => 'CompleteMultipartUpload',
            ],
            'id' => [
                'bucket'    => 'Bucket',
                'key'       => 'Key',
                'upload_id' => 'UploadId',
            ],
            'part_num' => 'PartNumber',
        ];
    }

    protected function determinePartSize()
    {
        // Make sure the part size is set.
        $partSize = $this->config['part_size'] ?: self::PART_MIN_SIZE;

        // Adjust the part size to be larger for known, x-large uploads.
        if ($sourceSize = $this->source->getSize()) {
            $partSize = (int) max(
                $partSize,
                ceil($sourceSize / self::PART_MAX_NUM)
            );
        }

        // Ensure that the part size follows the rules: 5 MB <= size <= 5 GB.
        if ($partSize < self::PART_MIN_SIZE || $partSize > self::PART_MAX_SIZE) {
            throw new \InvalidArgumentException('The part size must be no less '
                . 'than 5 MB and no greater than 5 GB.');
        }

        return $partSize;
    }

    protected function createPart($seekable, $number)
    {
        // Initialize the array of part data that will be returned.
        $data = ['PartNumber' => $number];

        // Read from the source to create the body stream.
        if ($seekable) {
            // Case 1: Source is seekable, use lazy stream to defer work.
            $body = $this->limitPartStream(
                new Psr7\LazyOpenStream($this->source->getMetadata('uri'), 'r')
            );
        } else {
            // Case 2: Stream is not seekable; must store in temp stream.
            $source = $this->limitPartStream($this->source);
            $source = $this->decorateWithHashes($source,
                function ($result, $type) use (&$data) {
                    $data['Content' . strtoupper($type)] = $result;
                }
            );
            $body = Psr7\stream_for();
            Psr7\copy_to_stream($source, $body);
            $data['ContentLength'] = $body->getSize();
        }

        // Do not create a part if the body size is zero.
        if ($body->getSize() === 0) {
            return false;
        }

        $body->seek(0);
        $data['Body'] = $body;

        return $data;
    }

    protected function handleResult(CommandInterface $command, ResultInterface $result)
    {
        $this->state->markPartAsUploaded($command['PartNumber'], [
            'PartNumber' => $command['PartNumber'],
            'ETag'       => $result['ETag']
        ]);
    }

    protected function getInitiateParams()
    {
        $params = [];

        if (isset($this->config['acl'])) {
            $params['ACL'] = $this->config['acl'];
        }

        // Set the content type
        if ($uri = $this->source->getMetadata('uri')) {
            $params['ContentType'] = Psr7\mimetype_from_filename($uri)
                ?: 'application/octet-stream';
        }

        return $params;
    }

    protected function getCompleteParams()
    {
        return ['MultipartUpload' => [
            'Parts' => $this->state->getUploadedParts()
        ]];
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
     * @param Stream   $stream   Stream to decorate.
     * @param callable $complete Callback to execute for the hash result.
     *
     * @return Stream
     */
    private function decorateWithHashes(Stream $stream, callable $complete)
    {
        // Determine if the checksum needs to be calculated.
        if ($this->client->getConfig('signature_version') == 'v4') {
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
