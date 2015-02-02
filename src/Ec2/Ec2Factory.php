<?php
namespace Aws\Ec2;

use Aws\ClientFactory;

/**
 * @internal
 */
class Ec2Factory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);
        $client->getEmitter()->attach(new CopySnapshotSubscriber(
            $args['endpoint_provider'],
            $args['serializer']
        ));

        return $client;
    }
}
