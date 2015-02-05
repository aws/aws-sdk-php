<?php
namespace Aws\Sqs;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Simple Queue Service (Amazon SQS)**.
 */
class SqsClient extends AwsClient
{
    public function __construct(array $config)
    {
        parent::__construct($config);
        $emitter = $this->getEmitter();
        $emitter->attach(new QueueUrlSubscriber());
        $emitter->attach(new Md5ValidatorSubscriber());
    }

    /**
     * Converts a queue URL into a queue ARN.
     *
     * @param string $queueUrl The queue URL to perform the action on.
     *                         Retrieved when the queue is first created.
     *
     * @return string An ARN representation of the queue URL.
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
