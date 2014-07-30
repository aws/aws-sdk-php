<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractUploadBuilder;
use Aws\Common\Multipart\AbstractTransferState as State;

/**
 * Easily create a multipart uploader used to quickly and reliably upload a
 * large file or data stream to Amazon Glacier using multipart uploads
 */
class UploadBuilder extends AbstractUploadBuilder
{
    /**
     * @var string Account ID to upload to
     */
    protected $accountId = '-';

    /**
     * @var string Name of the vault to upload to
     */
    protected $vaultName;

    /**
     * @var string Archive description
     */
    protected $archiveDescription;

    /**
     * @var UploadPartGenerator Glacier upload helper object
     */
    protected $partGenerator;

    /**
     * Set the account ID to upload the part to
     *
     * @param string $accountId ID of the account
     *
     * @return self
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Set the vault name to upload the part to
      *
      * @param string $vaultName Name of the vault
      *
      * @return self
     */
    public function setVaultName($vaultName)
    {
        $this->vaultName = $vaultName;

        return $this;
    }

    /**
     * Set the archive description
      *
      * @param string $archiveDescription Archive description
      *
      * @return self
     */
    public function setArchiveDescription($archiveDescription)
    {
        $this->archiveDescription = $archiveDescription;

        return $this;
    }

    /**
     * Sets the Glacier upload helper object that pre-calculates hashes and sizes for all upload parts
     *
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
     * {@inheritdoc}
     * @throws \InvalidArgumentException when attempting to resume a transfer using a non-seekable stream
     * @throws \InvalidArgumentException when missing required properties (bucket, key, client, source)
     */
    public function build()
    {
        // If a Glacier upload helper object was set, use the source and part size from it
        if ($this->partGenerator) {
            $this->partSize = $this->partGenerator->getPartSize();
        }

        if (!($this->state instanceof State) && !$this->vaultName || !$this->client || !$this->source) {
            throw new \InvalidArgumentException('You must specify a vault name, client, and source.');
        }

        if (!$this->source->isSeekable()) {
            throw new \InvalidArgumentException('You cannot upload from a non-seekable source.');
        }

        // If no state was set, then create one by initiating or loading a multipart upload
        if (is_string($this->state)) {
            if (!$this->partGenerator) {
                throw new \InvalidArgumentException('You must provide an UploadPartGenerator when resuming an upload.');
            }
            $this->state = TransferState::fromUploadId($this->client, UploadId::fromParams(array(
                'accountId' => $this->accountId,
                'vaultName' => $this->vaultName,
                'uploadId'  => $this->state
            )));
            $this->state->setPartGenerator($this->partGenerator);
        } elseif (!$this->state) {
            $this->state = $this->initiateMultipartUpload();
        }

        $options = array(
            'concurrency' => $this->concurrency
        );

        return $this->concurrency > 1
            ? new ParallelTransfer($this->client, $this->state, $this->source, $options)
            : new SerialTransfer($this->client, $this->state, $this->source, $options);
    }

    /**
     * {@inheritdoc}
     */
    protected function initiateMultipartUpload()
    {
        $params = array(
            'accountId' => $this->accountId,
            'vaultName' => $this->vaultName
        );

        $partGenerator = $this->partGenerator ?: UploadPartGenerator::factory($this->source, $this->partSize);

        $command = $this->client->getCommand('InitiateMultipartUpload', array_replace($params, array(
            'command.headers'    => $this->headers,
            'partSize'           => $partGenerator->getPartSize(),
            'archiveDescription' => $this->archiveDescription,
        )));
        $result = $this->client->execute($command);
        $params['uploadId'] = $result->get('uploadId');

        // Create a new state based on the initiated upload
        $state = new TransferState(UploadId::fromParams($params));
        $state->setPartGenerator($partGenerator);

        return $state;
    }
}
