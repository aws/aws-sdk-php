<?php
namespace Aws\S3\Multipart;

use Aws\AwsClientInterface;
use Aws\Common\MultipartUpload\AbstractTransferState;
use Aws\Common\MultipartUpload\UploadIdInterface;

/**
 * State of a multipart upload
 */
class TransferState extends AbstractTransferState
{
    /**
     * {@inheritdoc}
     */
    public static function fromUploadId(AwsClientInterface $client, UploadIdInterface $uploadId)
    {
        $transferState = new self($uploadId);

        foreach ($client->getIterator('ListParts', $uploadId->toParams()) as $part) {
            $transferState->addPart(UploadPart::fromArray($part));
        }

        return $transferState;
    }
}
