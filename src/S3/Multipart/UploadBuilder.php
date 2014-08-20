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
   protected $uploadParams = [
        'Bucket'   => null, // Required to initiate.
        'Key'      => null, // Required to initiate.
        'UploadId' => null, // Required to upload.
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

        // Create the part generator.
        $isSigV4 = ($this->client->getSignature() instanceof SignatureV4);
        $parts = new PartGenerator($this->source, [
            'part_size'     => $this->partSize,
            'skip'          => $this->state->getUploadedParts(),
            'calculate_md5' => $this->client->getConfig('calculate_md5'),
            'checksum_type' => $isSigV4 ? 'sha256' : 'md5',
        ]);

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
