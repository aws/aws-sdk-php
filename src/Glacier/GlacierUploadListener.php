<?php
namespace Aws\Glacier;

use Aws\Glacier\Multipart\UploadPartGenerator;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Adds the content sha256 and tree hash to Glacier upload requests if not set
 *
 * @internal
 */
class ContentHash implements SubscriberInterface
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
     */
    public function onPrepare(PrepareEvent $event)
    {
        $command = $event->getCommand();
        $name = $command->getName();

        if ($hash = $command['ContentSHA256']) {
            $event->getRequest()->addHeader('x-amz-content-sha256', $hash);
        } elseif ($name === 'UploadArchive' || $name === 'UploadPart') {
            $request = $event->getRequest();
            $upload = UploadPartGenerator::createSingleUploadPart(
                $request->getBody()
            );
            $request->setHeader(
                'x-amz-content-sha256',
                $upload->getContentHash()
            );
            if (!$command['checksum']) {
                $request->setHeader(
                    'x-amz-sha256-tree-hash',
                    $upload->getChecksum()
                );
            }
        }
    }
}
