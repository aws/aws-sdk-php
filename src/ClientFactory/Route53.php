<?php
namespace Aws\ClientFactory;

use Aws\Route53\CleanIdSubscriber;

/**
 * @internal
 */
class Route53 extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);
        $client->getEmitter()->attach(new CleanIdSubscriber());

        return $client;
    }
}
