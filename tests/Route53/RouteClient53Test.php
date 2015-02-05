<?php
namespace Aws\Test\Route53;

use Aws\Route53\Route53Client;
use Aws\Test\SdkTest;

/**
 * @covers Aws\Route53\Route53Client
 */
class Route53ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $client = new Route53Client([
            'service' => 'route53',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Route53\CleanIdSubscriber',
            'init'
        ));
    }
}
