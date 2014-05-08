<?php
namespace Aws\Test\Service\Sqs;

use Aws\Service\Sqs\SqsClient;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Service\Sqs\QueueUrlListener
 */
class QueueUrlListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testUpdatesUrl()
    {
        // Setup state of command/request
        $newUrl = 'https://queue.amazonaws.com/stuff/in/the/path';
        $client = SqsClient::factory(['region' => 'us-east-1']);

        $command = $client->getCommand('ReceiveMessage');
        $command['QueueUrl'] = $newUrl;
        $event = new PrepareEvent($command, $client);
        $command->getEmitter()->emit('prepare', $event);
        $this->assertEquals($newUrl, $event->getRequest()->getUrl());
    }
}
