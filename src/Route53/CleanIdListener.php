<?php
namespace Aws\Route53;

use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Strips prefixes (if present) from operations that uses an Id or
 * HostedZoneId parameter.
 */
class CleanIdListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['prepare' => ['onPrepare']];
    }

    public function onPrepare(PrepareEvent $event)
    {
        $c = $event->getCommand();

        if ($c->hasParam('Id')) {
            $c['Id'] = $this->cleanId($c['Id']);
        } elseif ($c->hasParam('HostedZoneId')) {
            $c['HostedZoneId'] = $this->cleanId($c['HostedZoneId']);
        }
    }

    private function cleanId($id)
    {
        return str_replace(['/hostedzone/', '/change/'], '', $id);
    }
}
