<?php
namespace Aws\Service;

use Aws\Service\Sqs\QueueUrlListener;
use Aws\Service\Sqs\Md5ValidatorListener;

class SqsFactory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        $emitter = $client->getEmitter();
        $emitter->attach(new QueueUrlListener());
        $emitter->attach(new Md5ValidatorListener());

        return $client;
    }

    /**
     * Converts a queue URL into a queue ARN.
     *
     * @param string $queueUrl The queue URL to perform the action on.
     *                         Retrieved when the queue is first created.
     *
     * @return string An ARN representation of the queue URL.
     * @todo: Move function
     */
    public function getQueueArn($queueUrl)
    {
        return strtr($queueUrl, array(
            'http://'        => 'arn:aws:',
            'https://'       => 'arn:aws:',
            '.amazonaws.com' => '',
            '/'              => ':',
            '.'              => ':',
        ));
    }
}
