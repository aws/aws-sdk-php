<?php
namespace Aws\Glacier\Multipart;

use Aws\AwsCommandInterface;
use Aws\Common\Multipart\AbstractTransfer as CommonAbstractTransfer;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\Stream;

/**
 * Abstract class for transfer commonalities
 */
abstract class AbstractTransfer extends CommonAbstractTransfer
{
    /**
     * @var TransferState Glacier transfer state
     */
    protected $state;

    /**
     * {@inheritdoc}
     */
    protected function calculatePartSize()
    {
        return $this->state->getPartGenerator()->getPartSize();
    }

    /**
     * {@inheritdoc}
     */
    protected function complete()
    {
        $partGenerator = $this->state->getPartGenerator();

        $params = array_replace($this->state->getUploadId()->toParams(), array(
            'archiveSize' => $partGenerator->getArchiveSize(),
            'checksum'    => $partGenerator->getRootChecksum(),
        ));
        $command = $this->client->getCommand('CompleteMultipartUpload', $params);

        return $this->client->execute($command);
    }

    /**
     * {@inheritdoc}
     */
    protected function getAbortCommand()
    {
        $params = $this->state->getUploadId()->toParams();

        /** @var $command AwsCommandInterface */
        $command = $this->client->getCommand('AbortMultipartUpload', $params);

        return $command;
    }

    /**
     * Creates an UploadMultipartPart command from an UploadPart object
     *
     * @param UploadPart $part          UploadPart for which to create a command
     * @param bool       $useSourceCopy Whether or not to use the original source or a copy of it
     *
     * @return AwsCommandInterface
     */
    protected function getCommandForPart(UploadPart $part, $useSourceCopy = false)
    {
        // Setup the command with identifying parameters (accountId, vaultName, and uploadId)
        /** @var $command AwsCommandInterface */
        $command = $this->client->getCommand('UploadMultipartPart', $this->state->getUploadId()->toParams());

        // Get the correct source
        $source = $this->source;
        if ($useSourceCopy) {
            $sourceUri = $this->source->getMetadata('uri');
            $source = Stream::factory(fopen($sourceUri, 'r'));
        }

        // Add the range, checksum, and the body limited by the range
        $command['range'] = $part->getFormattedRange();
        $command['checksum'] = $part->getChecksum();
        $command['ContentSHA256'] = $part->getContentHash();
        $command['body'] = new LimitStream($source, $part->getSize(), $part->getOffset());

        return $command;
    }
}
