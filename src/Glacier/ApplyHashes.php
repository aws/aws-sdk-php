<?php
namespace Aws\Glacier;

use Aws\Glacier\Multipart\PartGenerator;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Adds the content sha256 and tree hash to Glacier upload requests if not set
 *
 * @internal
 */
class ApplyHashes implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepare' => ['onPrepare', 'last']];
    }

    /**
     * Retrieve bodies passed in as UploadPartContext objects and set the real
     * hash, length, etc. values on the command
     *
     * @param PrepareEvent $event Event emitted
     *
     * @throws \RuntimeException
     */
    public function onPrepare(PrepareEvent $event)
    {
        $command = $event->getCommand();
        $name = $command->getName();

        if ($hash = $command['ContentSHA256']) {
            $event->getRequest()->addHeader('x-amz-content-sha256', $hash);
        } elseif ($name === 'UploadArchive' || $name === 'UploadPart') {
            // Get the request body
            $request = $event->getRequest();
            $stream = $request->getBody();
            if (!$stream->isSeekable()) {
                throw new \RuntimeException('Could not automatically apply the '
                    . 'checksums required for a Glacier upload, because the '
                    . 'provided body is not seekable.');
            }

            // Decorate the body and read the contents to get the hashes.
            $hash = [];
            PartGenerator::addHashDecorators($stream, $hash);
            while (!$stream->eof()) $stream->read(1048576);

            // Set the hashes.
            $request->setHeader('x-amz-content-sha256', $hash['ContentSHA256']);
            if (!$command['checksum']) {
                $request->setHeader('x-amz-sha256-tree-hash', $hash['checksum']);
            }
        }
    }
}
