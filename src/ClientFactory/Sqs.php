<?php
namespace Aws\ClientFactory;

use Aws\Sqs\QueueUrlSubscriber;
use Aws\Sqs\Md5ValidatorSubscriber;

/**
 * Modifies the host used when connecting to queues and validates the MD5 body
 * of received messages.
 *
 * @internal
 */
class Sqs extends ClientFactory
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
