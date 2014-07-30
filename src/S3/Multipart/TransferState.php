<?php
namespace Aws\S3\Multipart;

use Aws\AwsClientInterface;
use Aws\Common\Multipart\AbstractTransferState;
use Aws\Common\Multipart\AbstractUploadId;

/**
 * State of a multipart upload
 */
class TransferState extends AbstractTransferState
{
    /**
     * {@inheritdoc}
     */
    public static function fromUploadId(AwsClientInterface $client, AbstractUploadId $uploadId)
    {
        $transferState = new self($uploadId);

        foreach ($client->getIterator('ListParts', $uploadId->toParams()) as $part) {
            $transferState->addPart(UploadPart::fromArray($part));
        }

        return $transferState;
    }
}
