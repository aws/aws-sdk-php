<?php
namespace Aws\S3\Multipart;

use Aws\Common\Multipart\AbstractUploadBuilder;
use Aws\Common\Multipart\UploadState;
use Aws\Common\Signature\SignatureV4;
use GuzzleHttp\Mimetypes;

/**
 * Creates a multipart uploader used to easily upload large objects to S3.
 */
class UploadBuilder extends AbstractUploadBuilder
{
    protected static $requiredParams = ['Bucket', 'Key'];

    protected static $uploadIdParam = 'UploadId';

    protected $uploadParams = [
        'Bucket'   => null,
        'Key'      => null,
        'UploadId' => null,
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
        $this->uploadParams['Bucket'] = $bucket;

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
        $this->uploadParams['Key'] = $key;

        return $this;
    }

    public function createUploader()
    {
        // Set the content type.
        if ($uri = $this->source->getMetadata('uri')) {
            if ($mimeType = Mimetypes::getInstance()->fromFilename($uri)) {
                $this->addParam(Uploader::INITIATE, 'ContentType', $mimeType);
            }
        }

        // Create part generator.
        $signature = $this->client->getSignature();
        $options = [
            'part_size'           => $this->partSize,
            'skip'                => $this->state->getUploadedParts(),
            'calculate_checksums' => true, // @TODO determine from client.
            'checksum_type'       => ($signature instanceof SignatureV4)
                ? 'sha256'
                : 'md5',
        ];
        $parts = ($this->source->getMetadata('wrapper_type') !== 'plainfile')
            ? new PartGenerator($this->source, $options)
            : new OptimizedPartGenerator($this->source, $options);

        // Store the part size in the state.
        $this->state->setPartSize($parts->getPartSize());

        return new Uploader($this->client, $this->state, $parts, $this->params);
    }

    protected function loadStateFromParams(array $params = [])
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
}
