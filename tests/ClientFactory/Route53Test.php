<?php
namespace Aws\Test\Route53;

use Aws\ClientFactory\Route53;
use Aws\Test\SdkTest;

/**
 * @covers Aws\ClientFactory\Route53
 */
class Route53Test extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $f = new Route53();
        $client = $f->create([
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
