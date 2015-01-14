<?php
namespace Aws\Test\Route53;

use Aws\Route53Client;
use Aws\Route53\CleanIdListener;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\InitEvent;

/**
 * @covers Aws\Route53\CleanIdListener
 */
class CleanIdListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testCleansIds()
    {
        $client = Route53Client::factory([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $command = $client->getCommand('ChangeResourceRecordSets', [
            'HostedZoneId' => '/hostedzone/foo'
        ]);
        $trans = new CommandTransaction($client, $command);
        $event = new InitEvent($trans);
        $listener = new CleanIdListener();
        $listener->onInit($event);
        $this->assertEquals('foo', $command['HostedZoneId']);
        unset($command['HostedZoneId']);
        $command['Id'] = '/change/foo';
        $listener->onInit($event);
        $this->assertEquals('foo', $command['Id']);
    }
}
