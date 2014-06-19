<?php
namespace Aws\S3;

use Aws\S3\Exception\PermanentRedirectException;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Throws a PermanentRedirectException exception when a 301 redirect is
 * encountered.
 */
class PermanentRedirectListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepare' => ['checkForPermanentRedirect', 'last']];
    }

    public function checkForPermanentRedirect(ProcessEvent $e)
    {
        $res = $e->getResponse();

        if ($res && $res->getStatusCode() == 301) {
            throw new PermanentRedirectException(
                'Encountered a permanent redirect',
                $e->getCommandTransaction()
            );
        }
    }
}
