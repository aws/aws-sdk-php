<?php
namespace Aws\Test\Service\Route53;

use Aws\Service\Route53\Route53Client;
use Aws\Service\Route53\CleanIdListener;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Service\Route53\CleanIdListener
 */
class CleanIdListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testCleansIds()
    {
        $client = Route53Client::factory(['region' => 'us-west-2']);
        $command = $client->getCommand('ChangeResourceRecordSets', [
            'HostedZoneId' => '/hostedzone/foo'
        ]);
        $event = new PrepareEvent($command, $client);
        $listener = new CleanIdListener();
        $listener->onPrepare($event);
        $this->assertEquals('foo', $command['HostedZoneId']);
        unset($command['HostedZoneId']);
        $command['Id'] = '/change/foo';
        $listener->onPrepare($event);
        $this->assertEquals('foo', $command['Id']);
    }
}
