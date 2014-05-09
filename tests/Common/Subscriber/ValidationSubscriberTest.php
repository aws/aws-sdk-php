<?php
namespace Aws\Test\Common\Subscriber;

use Aws\Common\Api\Operation;
use Aws\Common\Api\ShapeMap;
use Aws\Common\Subscriber\Validation;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Common\Subscriber\Validation
 */
class ValidationTest extends \PHPUnit_Framework_TestCase
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

        $validator = $this->getMockBuilder('Aws\Common\Api\Validator')
            ->setMethods(['validate'])
            ->getMock();
        $validator->expects($this->once())
            ->method('validate')
            ->will($this->returnValue(true));

        $event = new PrepareEvent($command, $client);
        $validation = new Validation($validator);
        $this->assertNotEmpty($validation->getEvents());
        $validation->onPrepare($event);
    }
}
