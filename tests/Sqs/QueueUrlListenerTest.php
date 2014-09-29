<?php
namespace Aws\Test\Sqs;

use Aws\Sqs\SqsClient;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Message\Request;

/**
 * @covers Aws\Sqs\QueueUrlListener
 */
class QueueUrlListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testUpdatesUrl()
    {
        // Setup state of command/request
        $newUrl = 'https://queue.amazonaws.com/stuff/in/the/path';
        $client = SqsClient::factory([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $command = $client->getCommand('ReceiveMessage');
        $command['QueueUrl'] = $newUrl;
        $ct = new CommandTransaction($client, $command);
        $ct->request = new Request('GET', 'https://sqs.amazonaws.com');
        $event = new PreparedEvent($ct);
        $command->getEmitter()->emit('prepared', $event);
        $this->assertEquals($newUrl, $ct->request->getUrl());
    }
}
