<?php
namespace Aws\Test\Rds;

use Aws\CommandInterface;
use Aws\Credentials\Credentials;
use Aws\Rds\RdsClient;
use Aws\MockHandler;
use Aws\Result;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;
require_once __DIR__ . '/../Signature/sig_hack.php';

/**
 * @covers Aws\Rds\RdsClient
 */
class RdsClientTest extends TestCase
{
    public static function set_up_before_class()
    {
        $_SERVER['aws_time'] = 1598486400;
        $_SERVER['formatAwsTime'] = true;
    }

    public static function tear_down_after_class()
    {
        $_SERVER['aws_time'] = null;
        $_SERVER['formatAwsTime'] = null;
    }
    
    public function testAddsCopySnapshotMiddleware()
    {
        $rds = new RdsClient([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);

        $mock = new MockHandler([
            function ($command, $request) {
                $this->assertNotNull($command['PreSignedUrl']);
                $this->assertStringContainsString('us-west-2', $command['PreSignedUrl']);
                $this->assertSame('us-east-1', $command['DestinationRegion']);
                return new Result();
            }
        ]);

        $rds->getHandlerList()->setHandler($mock);

        $rds->copyDBSnapshot([
            'KmsKeyId' => '238f8ec9-71da-4530-8ec9-009f4a90fef5',
            'SourceDBSnapshotIdentifier' => 'arn:aws:rds:us-west-2:123456789012:snapshot:rds:my-snapshot',
            'TargetDBSnapshotIdentifier' => 'my-snapshot-copy',
            'SourceRegion' => 'us-west-2',
        ]);
    }

    public function rdsPresignMethodProvider()
    {
        return [
            ['copyDBSnapshot', ['SourceDBSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:snapshot:source-db-snapshot', 'TargetDBSnapshotIdentifier' => 'target-db-snapshot'], null, null, null, null],
            ['copyDBSnapshot', ['SourceDBSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:snapshot:source-db-snapshot', 'TargetDBSnapshotIdentifier' => 'target-db-snapshot'], 'https://aws.com', 'us-east-1', 'https://aws.com', null],
            ['copyDBSnapshot', ['SourceDBSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:snapshot:source-db-snapshot', 'TargetDBSnapshotIdentifier' => 'target-db-snapshot'], null, 'us-east-1', null, 'afee7e7f55fcbce926a89482f01acb51e9dc1df0adb09ee172622a079b47ea71'],
            ['CreateDBInstanceReadReplica', ['SourceDBInstanceIdentifier' => 'arn:aws:rds:us-east-1:123456789012:db:source-db-instance', 'DBInstanceIdentifier' => 'target-db-instance'], null, null, null, null],
            ['CreateDBInstanceReadReplica', ['SourceDBInstanceIdentifier' => 'arn:aws:rds:us-east-1:123456789012:db:source-db-instance', 'DBInstanceIdentifier' => 'target-db-instance'], 'https://aws.com', 'us-east-1', 'https://aws.com', null],
            ['CreateDBInstanceReadReplica', ['SourceDBInstanceIdentifier' => 'arn:aws:rds:us-east-1:123456789012:db:source-db-instance', 'DBInstanceIdentifier' => 'target-db-instance'], null, 'us-east-1', null, 'ddab9b46aa026dd36339e3f80c16c361f0e9e4f86368ee7e391dcdd45cb385e6'],
            ['CopyDBClusterSnapshot', ['SourceDBClusterSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster-snapshot:source-db-cluster-snapshot', 'TargetDBClusterSnapshotIdentifier' => 'target-db-cluster-snapshot'], null, null, null, null],
            ['CopyDBClusterSnapshot', ['SourceDBClusterSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster-snapshot:source-db-cluster-snapshot', 'TargetDBClusterSnapshotIdentifier' => 'target-db-cluster-snapshot'], 'https://aws.com', 'us-east-1', 'https://aws.com', null],
            ['CopyDBClusterSnapshot', ['SourceDBClusterSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster-snapshot:source-db-cluster-snapshot', 'TargetDBClusterSnapshotIdentifier' => 'target-db-cluster-snapshot'], null, 'us-east-1', null, '01eda84cb84ff1558373f4759aaf76aa4b7be8664241a58f6906ae842a0a9d74'],
            ['CreateDBCluster', ['DBClusterIdentifier' => 'db-cluster', 'Engine' => 'aurora', 'StorageEncrypted' => true, 'ReplicationSourceIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster:source-db-cluster'], null, null, null, null],
            ['CreateDBCluster', ['DBClusterIdentifier' => 'db-cluster', 'Engine' => 'aurora', 'StorageEncrypted' => true, 'ReplicationSourceIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster:source-db-cluster'], 'https://aws.com', 'us-east-1', 'https://aws.com', null],
            ['CreateDBCluster', ['DBClusterIdentifier' => 'db-cluster', 'Engine' => 'aurora', 'StorageEncrypted' => true, 'ReplicationSourceIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster:source-db-cluster'], null, 'us-east-1', null, '1f654a3049149ef925f2ad58d4fd71fdf94791eb65848f866a6f451f9be655f7'],
        ];
    }

    /**
     * @dataProvider rdsPresignMethodProvider
     *
     * @param string $functionName
     * @param string $presignedUrl
     * @param string $sourceRegion
     * @param string $expectedUrl
     * @param string $expectedSignature
     */
    public function testCorrectPresignRdsUrls(
        $functionName,
        $functionArgs,
        $presignedUrl,
        $sourceRegion,
        $expectedUrl,
        $expectedSignature
    ) {
        $rds = new RdsClient([
            'region'  => 'us-west-2',
            'version' => 'latest',
            'credentials' => new Credentials('akid', 'secret'),
            'handler' => function (
                CommandInterface $cmd,
                RequestInterface $r
            ) use ($expectedUrl, $expectedSignature)
            {
                $url = $cmd['PreSignedUrl'];
                if (!empty($expectedUrl)) {
                    self::assertSame($expectedUrl, $url);
                } else if (!empty($expectedSignature)) {
                    $this->assertStringContainsString("X-Amz-Signature={$expectedSignature}", $url);
                } else {
                    self::assertNull($url);
                }
                return new Result;
            }
        ]);

        $functionArgs['KmsKeyId'] = '238f8ec9-420a-0690-8ec9-009f34fc3ef5';
        if (!empty($sourceRegion)) {
            $functionArgs['SourceRegion'] = $sourceRegion;
        }
        if (!empty($presignedUrl)) {
            $functionArgs['PreSignedUrl'] = $presignedUrl;
        }
        call_user_func([$rds, $functionName], $functionArgs);
    }
}

