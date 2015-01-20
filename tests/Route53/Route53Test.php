<?php
namespace Aws\Test\Route53;

use Aws\Route53\Route53Factory;
use Aws\Test\SdkTest;

/**
 * @covers Aws\Route53\Route53Factory
 */
class Route53FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $f = new Route53Factory();
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
