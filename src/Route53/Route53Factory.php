<?php
namespace Aws\Route53;

use Aws\Common\ClientFactory;

/**
 * @internal
 */
class Route53Factory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);
        $client->getEmitter()->attach(new CleanIdListener());

        return $client;
    }
}
