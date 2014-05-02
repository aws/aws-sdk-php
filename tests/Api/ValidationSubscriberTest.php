<?php
namespace Aws\Test\Api;

use Aws\Api\Operation;
use Aws\Api\ShapeMap;
use Aws\Api\ValidationSubscriber;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Api\ValidationSubscriber
 */
class ValidationSubscriberTest extends \PHPUnit_Framework_TestCase
{
    public function testValdiatesBeforeSerialization()
    {
        $operation = new Operation([
            'name' => 'Test',
            'input' => [
                'type' => 'structure',
                'members' => ['foo' => ['type' => 'string']]
            ]
        ], new ShapeMap([]));

        $command = $this->getMockBuilder('Aws\AwsCommandInterface')
            ->setMethods(['getName', 'getOperation', 'toArray'])
            ->getMockForAbstractClass();
        $command->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue(['foo' => 'bar']));
        $command->expects($this->once())
            ->method('getName')
            ->will($this->returnValue('Test'));
        $command->expects($this->once())
            ->method('getOperation')
            ->will($this->returnValue($operation));

        $client = $this->getMockBuilder('Aws\AwsClientInterface')
            ->getMockForAbstractClass();

        $validator = $this->getMockBuilder('Aws\Api\Validator')
            ->setMethods(['validate'])
            ->getMock();
        $validator->expects($this->once())
            ->method('validate')
            ->will($this->returnValue(true));

        $event = new PrepareEvent($command, $client);
        $validation = new ValidationSubscriber($validator);
        $this->assertNotEmpty($validation->getEvents());
        $validation->onPrepare($event);
    }
}
