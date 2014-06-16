<?php
namespace Aws\S3;

use Aws\S3\Exception\PermanentRedirectException;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * Throws a PermanentRedirectException exception when a 301 redirect is
 * encountered.
 */
class PermanentRedirectListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['process' => ['checkForPermanentRedirect']];
    }

    public function checkForPermanentRedirect(ProcessEvent $e)
    {
        if ($e->getResponse()->getStatusCode() == 301) {
            throw new PermanentRedirectException(
                'Encountered a permanent redirect',
                $e->getClient(),
                $e->getCommand(),
                $e->getRequest(),
                $e->getResponse()
            );
        }
    }
}
