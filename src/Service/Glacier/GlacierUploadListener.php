<?php
namespace Aws\Service\Glacier;

use Aws\Service\Glacier\Multipart\UploadPartGenerator;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Adds the content sha256 and tree hash to Glacier upload requests if not set
 */
class GlacierUploadListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepare' => ['onPrepare', RequestEvents::EARLY]];
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
        $contentHash = $command['ContentSHA256'];
        if ($contentHash === true) {
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
        } elseif (is_string($contentHash)) {
            $request = $event->getRequest();
            $request->addHeader('x-amz-content-sha256', $contentHash);
        }
    }
}
