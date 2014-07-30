<?php
namespace Aws\Glacier\Multipart;

use Aws\AwsCommandInterface;
use Aws\Common\AwsException;
use Aws\Common\Iterator\ChunkedIterator;
use Aws\Result;

/**
 * Transfers multipart upload parts in parallel
 */
class ParallelTransfer extends AbstractTransfer
{
    /**
     * {@inheritdoc}
     */
    protected function init()
    {
        parent::init();

        if (!$this->source->isSeekable() || $this->source->getMetadata('wrapper_type') != 'plainfile') {
            throw new \RuntimeException('The source data must be a local file stream when uploading in parallel.');
        }

        if (empty($this->options['concurrency'])) {
            throw new \RuntimeException('The `concurrency` option must be specified when instantiating.');
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function transfer()
    {
        /** @var $parts UploadPartGenerator */
        $parts     = $this->state->getPartGenerator();
        $chunkSize = min($this->options['concurrency'], count($parts));
        $partSets  = new ChunkedIterator($parts, $chunkSize);

        foreach ($partSets as $partSet) {
            /** @var $part UploadPart */
            $commands = array();
            foreach ($partSet as $index => $part) {
                $command = $this->getCommandForPart($part, (bool) $index);
                $command['part'] = $part;
                $commands[] = $command;
            }

            // Allow listeners to stop the transfer if needed
            if ($this->stopped) {
                break;
            }

            // Execute each command, iterate over the results, and add to the transfer state
            $errors = [];
            /** @var $command AwsCommandInterface */
            $commands = $this->client->batch($commands);
            foreach ($commands as $command) {
                if ($commands[$command] instanceof Result) {
                    $this->state->addPart($command['part']);
                } else {
                    $errors[] = $commands[$command];
                }
            }

            if ($errors) {
                throw end($errors);
            }
        }
    }
}
