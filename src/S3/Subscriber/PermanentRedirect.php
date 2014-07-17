<?php
namespace Aws\S3\Subscriber;

use Aws\S3\Exception\PermanentRedirectException;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Throws a PermanentRedirectException exception when a 301 redirect is
 * encountered.
 *
 * @internal
 */
class PermanentRedirect implements SubscriberInterface
{
    public function getEvents()
    {
        return ['process' => ['checkForPermanentRedirect', 'last']];
    }

    public function checkForPermanentRedirect(ProcessEvent $e)
    {
        $res = $e->getResponse();

        if ($res && $res->getStatusCode() == 301) {
            throw new PermanentRedirectException(
                'Encountered a permanent redirect while requesting '
                    . $e->getRequest()->getUrl(),
                $e->getTransaction()
            );
        }
    }
}
