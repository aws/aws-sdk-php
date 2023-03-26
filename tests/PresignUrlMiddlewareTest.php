<?php
namespace Aws\Test;

use Aws\CommandInterface;
use Aws\Credentials\Credentials;
use Aws\DocDB\DocDBClient;
use Aws\Ec2\Ec2Client;
use Aws\Neptune\NeptuneClient;
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
}

