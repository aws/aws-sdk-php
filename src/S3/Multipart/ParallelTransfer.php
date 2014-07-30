<?php
namespace Aws\S3\Multipart;

use GuzzleHttp\Command\Event\CommandErrorEvent;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\LimitStream;


/**
 * Transfers multipart upload parts in parallel
 */
class ParallelTransfer extends AbstractTransfer
{
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

    protected function transfer()
    {
        $totalParts  = (int) ceil($this->source->getSize() / $this->partSize);
        $concurrency = min($totalParts, $this->options['concurrency']);
        $partsToSend = $this->prepareParts($concurrency);

        while (!$this->stopped && count($this->state) < $totalParts) {

            $currentTotal = count($this->state);
            $commands = array();

            for ($i = 0; $i < $concurrency && $i + $currentTotal < $totalParts; $i++) {
                /** @var LimitStream $part */
                $part = $partsToSend[$i];

                // Move the offset to the correct position
                $part->setOffset(($currentTotal + $i) * $this->partSize);

                // @codeCoverageIgnoreStart
                if ($part->getSize() == 0) {
                    break;
                }
                // @codeCoverageIgnoreEnd

                $params = $this->state->getUploadId()->toParams();
                $commands[] = $this->client->getCommand('UploadPart', array_replace($params, array(
                    'PartNumber' => count($this->state) + 1 + $i,
                    'Body'       => $partsToSend[$i],
                )));
            }

            // Execute each command, iterate over the results, and add to the transfer state
            $errors = [];
            $this->client->executeAll($commands, [
                'parallel' => $concurrency,
                'process' => [
                    'fn' => function (ProcessEvent $event) {
                        $this->state->addPart(UploadPart::fromArray(array(
                            'PartNumber'   => (int) $event->getCommand()['PartNumber'],
                            'ETag'         => $event->getResult()['ETag'],
                            'Size'         => $event->getRequest()->getBody()->getSize(),
                            'LastModified' => gmdate(\DateTime::RFC2822)
                        )));
                    },
                    'priority' => 'last',
                ],
                'error' => function (CommandErrorEvent $e) use (&$errors) {
                    $errors[] = $e->getException();
                },
            ]);

            if ($errors) {
                throw end($errors);
            }
        }
    }

    /**
     * Prepare the entity body handles to use while transferring
     *
     * @param int $concurrency Number of parts to prepare
     *
     * @return array Parts to send
     */
    protected function prepareParts($concurrency)
    {
        $url = $this->source->getMetadata('uri');
        // Use the source EntityBody as the first part
        $parts = array(new LimitStream($this->source, $this->partSize));
        // Open EntityBody handles for each part to upload in parallel
        for ($i = 1; $i < $concurrency; $i++) {
            $parts[] = new LimitStream(new Stream(fopen($url, 'r')), $this->partSize);
        }

        return $parts;
    }
}
