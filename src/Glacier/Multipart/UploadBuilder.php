<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractUploadBuilder;
use Aws\Common\Multipart\UploadState;

/**
 * Creates a multipart uploader used to easily upload large archives to Glacier.
 */
class UploadBuilder extends AbstractUploadBuilder
{
    protected static $requiredParams = ['accountId', 'vaultName'];

    protected static $uploadIdParam = 'uploadId';

    protected $uploadParams = [
        'accountId' => '-',
        'vaultName' => null,
        'uploadId'  => null,
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
     * @param string $archiveDescription Archive description.
     *
     * @return self
     */
    public function setArchiveDescription($archiveDescription)
    {
        $this->addParam(Uploader::INITIATE, 'archiveDescription', $archiveDescription);

        return $this;
    }

    public function createUploader()
    {
        // Create the part generator.
        $parts = new PartGenerator($this->source, [
            'part_size' => $this->partSize,
            'skip'      => $this->state->getUploadedParts(),
        ]);

        // Store the part size in the state.
        $this->partSize = $parts->getPartSize();
        $this->state->setPartSize($this->partSize);
        $this->addParam(Uploader::INITIATE, 'partSize', $this->partSize);

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
}
