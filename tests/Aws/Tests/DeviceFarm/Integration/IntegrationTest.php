<?php
namespace Aws\Tests\DeviceFarm\Integration;

use Aws\DeviceFarm\DeviceFarmClient;
use Aws\DeviceFarm\Exception\DeviceFarmException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var DeviceFarmClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('devicefarm', array('region' => 'us-west-2'));
    }

    public function testListOperation()
    {
        $result = $this->client->ListDevices();
        $this->assertInternalType('array', $result['devices']);
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->getDevice(array(
                'arn' => 'arn:aws:devicefarm:us-west-2::device:000000000000000000000000fake-arn'
            ));
            $this->fail('An exception should have been thrown.');
        } catch (DeviceFarmException $e) {
            $this->assertEquals('NotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
