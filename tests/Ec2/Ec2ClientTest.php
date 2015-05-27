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
}
