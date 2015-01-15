<?php
namespace Aws\Sqs;

use Aws\ClientFactory;

/**
 * Modifies the host used when connecting to queues and validates the MD5 body
 * of received messages.
 */
class SqsFactory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);
        $emitter = $client->getEmitter();
        $emitter->attach(new QueueUrlSubscriber());
        $emitter->attach(new Md5ValidatorSubscriber());

        return $client;
    }
}
