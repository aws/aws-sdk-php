<?php
namespace Aws\Glacier\Multipart;

use Aws\AwsClientInterface;
use Aws\Common\Multipart\AbstractTransferState;
use Aws\Common\Multipart\AbstractUploadId;

/**
 * State of a multipart upload
 */
class TransferState extends AbstractTransferState
{
    const ALREADY_UPLOADED = '-';

    /**
     * @var UploadPartGenerator Glacier upload helper object that contains part information
     */
    protected $partGenerator;

    /**
     * {@inheritdoc}
     */
    public static function fromUploadId(AwsClientInterface $client, AbstractUploadId $uploadId)
    {
        $transferState = new self($uploadId);
        $listParts = $client->getIterator('ListParts', $uploadId->toParams());

        $partSize = null;
        foreach ($listParts as $part) {
            list($firstByte, $lastByte) = explode('-', $part['RangeInBytes']);
            if ($partSize) {
                $partSize = $lastByte - $firstByte + 1;
            }
            $partData = array(
                'partNumber'  => $firstByte / $partSize + 1,
                'checksum'    => $part['SHA256TreeHash'],
                'contentHash' => self::ALREADY_UPLOADED,
                'size'        => $lastByte - $firstByte + 1,
                'offset'      => $firstByte
            );
            $transferState->addPart(UploadPart::fromArray($partData));
        }

        return $transferState;
    }

    /**
     * @param UploadPartGenerator $partGenerator Glacier upload helper object
     *
     * @return self
     */
    public function setPartGenerator(UploadPartGenerator $partGenerator)
    {
        $this->partGenerator = $partGenerator;

        return $this;
    }

    /**
     * @return UploadPartGenerator Glacier upload helper object
     */
    public function getPartGenerator()
    {
        return $this->partGenerator;
    }
}
