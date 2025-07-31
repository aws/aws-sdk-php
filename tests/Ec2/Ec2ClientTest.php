<?php
namespace Aws\Test\Ec2;

use Aws\Api\Parser\QueryParser;
use Aws\Ec2\Ec2Client;
use Aws\MockHandler;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\Ec2\Ec2Client
 */
class Ec2ClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testAddsCopySnapshotMiddleware()
    {
        $ec2 = new Ec2Client([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);

        $mock = new MockHandler([
            function ($command, $request) {
                $this->assertNotNull($command['PresignedUrl']);
                $this->assertSame('us-east-1', $command['DestinationRegion']);
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
                $this->assertSame('foo', $command['ClientToken']);
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

    public function testSkipEmptyListSerialization()
    {

        $ec2Client = new Ec2Client([
            'region' => 'us-east-1',
            'http_handler' => function (RequestInterface $request) {
                $testResponse = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<DescribeFleetsResponse xmlns="http://ec2.amazonaws.com/doc/2016-11-15/">
    <requestId>TestRequestId</requestId>
    <fleetSet/>
</DescribeFleetsResponse>
EOF;
                $parameters = explode('&',  $request->getBody()->getContents());
                $this->assertNotContains('Filter=0', $parameters);

                return new Response(200, [], $testResponse);
            }
        ]);
        $ec2Client->describeFleets([
            'Filters' => []
        ]);
    }

    public function testDescribeInstanceStatusParsesInstanceStateCorrectly()
    {
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<DescribeInstanceStatusResponse xmlns="http://ec2.amazonaws.com/doc/2016-11-15/">
    <requestId>3be1508e-c444-4fef-89cc-0b1223c4f02fEXAMPLE</requestId>
    <instanceStatusSet>
        <item>
            <instanceId>i-1234567890abcdef0</instanceId>
            <availabilityZone>us-east-1d</availabilityZone>
            <instanceState>
                <code>16</code>
                <name>running</name>
            </instanceState>
            <systemStatus>
                <status>ok</status>
                <details>
                    <item>
                        <name>reachability</name>
                        <status>passed</status>
                    </item>
                </details>
            </systemStatus>
            <instanceStatus>
                <status>ok</status>
                <details>
                    <item>
                        <name>reachability</name>
                        <status>passed</status>
                    </item>
                </details>
            </instanceStatus>
        </item>
    </instanceStatusSet>
</DescribeInstanceStatusResponse>
XML;

        $ec2 = new Ec2Client([
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'foo',
                'secret' => 'bar'
            ]
        ]);

        $command = $ec2->getCommand('DescribeInstanceStatus');
        $parser = new QueryParser($ec2->getApi());
        $response = new Response(200, [], $xml);
        $this->addMockResults($ec2, [$parser($command, $response)]);

        $result = $ec2->describeInstanceStatus([
            'InstanceIds' => ['i-1234567890abcdef0']
        ]);

        $this->assertArrayHasKey('InstanceStatuses', $result);
        $this->assertCount(1, $result['InstanceStatuses']);

        $instanceStatus = $result['InstanceStatuses'][0];

        // Verify basic fields
        $this->assertEquals('i-1234567890abcdef0', $instanceStatus['InstanceId']);
        $this->assertEquals('us-east-1d', $instanceStatus['AvailabilityZone']);

        // InstanceState should be present
        $this->assertArrayHasKey('InstanceState', $instanceStatus);
        $this->assertEquals(16, $instanceStatus['InstanceState']['Code']);
        $this->assertEquals('running', $instanceStatus['InstanceState']['Name']);

        // Verify other nested structures work too
        $this->assertArrayHasKey('SystemStatus', $instanceStatus);
        $this->assertEquals('ok', $instanceStatus['SystemStatus']['Status']);

        $this->assertArrayHasKey('InstanceStatus', $instanceStatus);
        $this->assertEquals('ok', $instanceStatus['InstanceStatus']['Status']);
    }
}
