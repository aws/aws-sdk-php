<?php
namespace Aws\Route53;

use Aws\ClientFactory;

/**
 * @internal
 */
class Route53Factory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);
        $client->getEmitter()->attach(new CleanIdSubscriber());

        return $client;
    }
}
