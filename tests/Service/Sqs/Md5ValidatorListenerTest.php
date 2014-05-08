<?php
namespace Aws\Test\Service\Sqs;

use Aws\Result;
use Aws\Service\Sqs\Md5ValidatorListener;
use Aws\Service\Sqs\SqsClient;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @covers Aws\Service\Sqs\Md5ValidatorListener
 */
class Md5ValidatorListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Aws\Service\Sqs\SqsException
     */
    public function testValidatesMd5WithException()
    {
        $model  = new Result([
            'Messages' => [['MD5OfBody' => 'foo', 'Body' => 'Bar']]
        ]);
        $client = SqsClient::factory(['region' => 'us-west-2']);
        $command = $client->getCommand('ReceiveMessage');
        $event = new ProcessEvent($command, $client);
        $event->setResult($model);
        $listener = new Md5ValidatorListener();
        $listener->onProcess($event);
    }

    public function testValidatesMd5()
    {
        $model  = new Result([
            'Messages' => [
                [
                    'MD5OfBody' => 'fafb00f5732ab283681e124bf8747ed1',
                    'Body' => 'This is a test message'
                ]
            ]
        ]);

        $client = SqsClient::factory(['region' => 'us-west-2']);
        $command = $client->getCommand('ReceiveMessage');
        $event = new ProcessEvent($command, $client);
        $event->setResult($model);
        $listener = new Md5ValidatorListener();
        $listener->onProcess($event);
    }

    public function testIgnoresIrrelevantCommands()
    {
        $model  = new Result([]);
        $client = SqsClient::factory(['region' => 'us-west-2']);
        $command = $client->getCommand('ListQueues');
        $event = new ProcessEvent($command, $client);
        $event->setResult($model);
        $listener = new Md5ValidatorListener();
        $listener->onProcess($event);
    }
}
