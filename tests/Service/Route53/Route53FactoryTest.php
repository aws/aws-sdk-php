<?php
namespace Aws\Test\Service\Sqs;

use Aws\Service\Route53\Route53Factory;
use Aws\Test\SdkTest;

/**
 * @covers Aws\Service\Route53\Route53Factory
 */
class Route53FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAttachesSubscribers()
    {
        $f = new Route53Factory();
        $client = $f->create([
            'service' => 'route53',
            'region'  => 'us-west-2'
        ]);

        $this->assertTrue(SdkTest::hasListener(
            $client->getEmitter(),
            'Aws\Service\Route53\CleanIdListener',
            'prepare'
        ));
    }
}
