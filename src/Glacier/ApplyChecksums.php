<?php
namespace Aws\Glacier;

use Aws\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Subscriber\MessageIntegrity\HashingStream;
use GuzzleHttp\Subscriber\MessageIntegrity\PhpHash;

/**
 * Adds the content sha256 and tree hash to Glacier upload requests if not set
 *
 * @internal
 */
class ApplyChecksums implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepared' => ['onPrepared', 'last']];
    }

    /**
     * Update a command with the content and tree hash headers, as needed.
     *
     * @param PreparedEvent $event Event emitted.
     *
     * @throws \RuntimeException if the body is not seekable.
     */
    public function onPrepared(PreparedEvent $event)
    {
        $command = $event->getCommand();
        $name = $command->getName();

        // Determine if there is a need to calculate any hashes.
        $needsHashes = ($name === 'UploadArchive' || $name === 'UploadPart')
            && (!$command['checksum'] || !$command['ContentSHA256']);

        if ($needsHashes) {
            $body = $event->getRequest()->getBody();
            if (!$body->isSeekable()) {
                throw new CouldNotCreateChecksumException('sha256');
            }

            // Add a tree hash if not provided.
            if (!$command['checksum']) {
                $body = new HashingStream($body, new TreeHash(),
                    function ($result) use ($command, $event) {
                        $event->getRequest()->setHeader(
                            'x-amz-sha256-tree-hash',
                            bin2hex($result)
                        );
                    }
                );
            }

            // Add a linear content hash if not provided.
            if (!$command['ContentSHA256']) {
                $body = new HashingStream($body, new PhpHash('sha256'),
                    function ($result) use ($command) {
                        $command['ContentSHA256'] = bin2hex($result);
                    }
                );
            }

            // Read the stream in order to calculate the hashes.
            while (!$body->eof()) $body->read(1048576);
            $body->seek(0);
        }

        // Set the content hash header if there is a value to set.
        if ($hash = $command['ContentSHA256']) {
            $event->getRequest()->addHeader('x-amz-content-sha256', $hash);
        }
    }
}
