<?php
namespace Aws\Test;

use Aws\CommandInterface;
use Aws\Ec2\Ec2Client;
use Aws\PresignUrlMiddleware;
use Aws\Rds\RdsClient;
use Aws\Result;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\PresignUrlMiddleware
 */
class PresignUrlMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    public function testDoesNotAddPresignedUrlForNonRequiredOperations()
    {
        $ec2 = new Ec2Client([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->addMockResults($ec2, [[]]);
        $cmd = $ec2->getCommand('DescribeInstances');
        $ec2->execute($cmd);
        $this->assertNull($cmd['PresignedUrl']);

        $rds = new RdsClient([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->addMockResults($rds, [[]]);
        $cmd = $rds->getCommand('DescribeDBClusterParameterGroups');
        $rds->execute($cmd);
        $this->assertNull($cmd['PreSignedUrl']);
    }

    public function testAddsPresignedUrlForRequiredOperations()
    {
        $ec2 = new Ec2Client([
            'region'  => 'us-east-2',
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $r) {
                $url = $cmd['PresignedUrl'];
                $this->assertNotNull($url);
                $this->assertStringContainsString('https://ec2.eu-west-1.amazonaws.com', $url);
                $this->assertStringContainsString('SourceSnapshotId=foo', $url);
                $this->assertStringContainsString('SourceRegion=eu-west-1', $url);
                $this->assertStringContainsString('X-Amz-Signature=', $url);
                $this->assertSame('us-east-2', $cmd['DestinationRegion']);

                return new Result;
            },
        ]);
        $ec2->copySnapshot([
            'SourceRegion'     => 'eu-west-1',
            'SourceSnapshotId' => 'foo',
        ]);

        $rds = new RdsClient([
            'region'  => 'us-east-2',
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $r) {
                $url = $cmd['PreSignedUrl'];
                $this->assertNotNull($url);
                $this->assertStringContainsString('https://rds.eu-west-1.amazonaws.com', $url);
                $this->assertStringContainsString('KmsKeyId=', $url);
                $this->assertStringContainsString('SourceDBSnapshotIdentifier=', $url);
                $this->assertStringContainsString('TargetDBSnapshotIdentifier=my-snapshot-copy', $url);
                $this->assertStringContainsString('eu-west-1', $url);
                $this->assertStringContainsString('X-Amz-Signature=', $url);
                $this->assertSame('us-east-2', $cmd['DestinationRegion']);

                return new Result;
            },
        ]);
        $rds->copyDBSnapshot([
            'SourceRegion'     => 'eu-west-1',
            'KmsKeyId' => '238f8ec9-71da-4530-8ec9-009f4a90fef5',
            'SourceDBSnapshotIdentifier' => 'arn:aws:rds:us-west-2:123456789012:snapshot:rds:my-snapshot',
            'TargetDBSnapshotIdentifier' => 'my-snapshot-copy',
        ]);
    }

    public function testNoPreSignedUrlWhenDifferentSourceRegionRequired()
    {
        $rds = new RdsClient([
            'region'  => 'us-east-2',
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $r) {
                $this->assertNull($cmd['PreSignedUrl']);
                $this->assertSame('us-east-2', $cmd['DestinationRegion']);

                return new Result;
            },
        ]);
        $rds->createDBInstanceReadReplica([
            'DBInstanceIdentifier' => 'test-replica',
            'SourceDBInstanceIdentifier' => 'test-source',
        ]);
    }

    /**
     * @param string $parameter
     * @param string $value
     * @param string $expected
     *
     * @dataProvider extraQueryParamsProvider
     *
     * @return void
     */
    public function testExtraQueryParametersAreURLEncoded(
        string $parameter,
        string $value,
        string $expected
    ): void
    {
        $ec2 = new Ec2Client([
            'region'  => 'us-east-2',
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $r)
            use ($expected) {
                $url = $cmd['PresignedUrl'];

                $this->assertStringContainsString(
                    $expected,
                    $url
                );

                return new Result;
            },
        ]);
        
        $ec2->getHandlerList()->prependInit(
            PresignUrlMiddleware::wrap($ec2, $ec2->getEndpointProvider(), [
                'operations' => ['CopySnapshot'],
                'service' => 'ec2',
                'extra_query_params' => ['CopySnapshot' => [$parameter]]
            ])
        );
        
        $ec2->copySnapshot([
            'SourceRegion' => 'eu-west-1',
            'SourceSnapshotId' => 'foo',
            "$parameter" => $value,
        ]);
    }

    /**
     * @return array[]
     */
    public function extraQueryParamsProvider(): array
    {
        return [
            'simple_parameter' => [
                'parameter' => 'MyParameter',
                'value' => 'MyValue',
                'expected' => 'MyParameter=MyValue',
            ],
            'simple_parameter_with_space' => [
                'parameter' => 'MyParameter',
                'value' => 'My Value',
                'expected' => 'MyParameter=My%20Value',
            ],
            'parameter_injection_with_ampersand' => [
                'parameter' => 'MyParameter',
                'value' => 'myValue&anotherKey=anotherValue',
                'expected' => 'MyParameter=myValue%26anotherKey%3DanotherValue',
            ],
            'parameter_injection_multiple_params' => [
                'parameter' => 'MyParameter',
                'value' => 'value&param1=val1&param2=val2',
                'expected' => 'MyParameter=value%26param1%3Dval1%26param2%3Dval2',
            ],
            'parameter_injection_with_equals' => [
                'parameter' => 'MyParameter',
                'value' => 'value=injection&malicious=true',
                'expected' => 'MyParameter=value%3Dinjection%26malicious%3Dtrue',
            ],
            'parameter_injection_with_question_mark' => [
                'parameter' => 'MyParameter',
                'value' => 'value?extra=param&more=data',
                'expected' => 'MyParameter=value%3Fextra%3Dparam%26more%3Ddata',
            ],
        ];
    }
}

