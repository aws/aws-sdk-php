<?php
namespace Aws\Test\Ec2;

use Aws\Ec2\Ec2Client;
use Aws\MockHandler;
use Aws\Result;

/**
 * @covers Aws\Ec2\Ec2Client
 */
class Ec2ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testAddsCopySnapshotMiddleware()
    {
        $ec2 = new Ec2Client([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);

        $mock = new MockHandler([
            function ($command, $request) {
                $this->assertNotNull($command['PresignedUrl']);
                $this->assertEquals('us-east-1', $command['DestinationRegion']);
                return new Result();
            }
        ]);

        $ec2->getHandlerList()->setHandler($mock);

        $ec2->copySnapshot([
            'SourceRegion'     => 'us-east-1',
            'SourceSnapshotId' => 'foo'
        ]);
    }

    public function testCanDisableAutoFillPerClient()
    {
        $ec2 = new Ec2Client([
            'region'  => 'us-east-1',
            'version' => 'latest',
            'idempotency_auto_fill' => false,
        ]);

        $mock = new MockHandler([
            function ($command, $request) {
                $this->assertNull($command['ClientToken']);
                return new Result();
            }
        ]);

        $ec2->getHandlerList()->setHandler($mock);

        $ec2->runScheduledInstances([
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
        ]);
    }

    public function testCanOverwriteAutoFillToken()
    {
        $ec2 = new Ec2Client([
            'region'  => 'us-east-1',
            'version' => 'latest',
            'idempotency_auto_fill' => true,
        ]);

        $mock = new MockHandler([
            function ($command, $request) {
                $this->assertEquals('foo', $command['ClientToken']);
                return new Result();
            }
        ]);

        $ec2->getHandlerList()->setHandler($mock);

        $ec2->runScheduledInstances([
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
            'ClientToken' => 'foo',
        ]);
    }
}
