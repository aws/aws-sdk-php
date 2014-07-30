<?php
namespace Aws\Glacier\Multipart;

/**
 * Transfers multipart upload parts serially
 */
class SerialTransfer extends AbstractTransfer
{
    /**
     * {@inheritdoc}
     */
    protected function transfer()
    {
        /** @var $partGenerator UploadPartGenerator */
        $partGenerator = $this->state->getPartGenerator();

        /** @var $part UploadPart */
        foreach ($partGenerator as $part) {
            $command = $this->getCommandForPart($part);

            // Allow listeners to stop the transfer if needed
            if ($this->stopped) {
                break;
            }

            $this->client->execute($command);
            $this->state->addPart($part);
        }
    }
}
