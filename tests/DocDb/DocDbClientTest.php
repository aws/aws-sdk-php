<?php
namespace Aws\Test\Rds;

use Aws\CommandInterface;
use Aws\Credentials\Credentials;
use Aws\DocDB\DocDBClient;
use Aws\Result;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;
require_once __DIR__ . '/../Signature/sig_hack.php';

/**
 * @covers Aws\DocDB\DocDBClient
 */
class DocDbClientTest extends TestCase
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

    public function DocDbPresignMethodProvider()
    {
        return [
            ['CopyDBClusterSnapshot', ['SourceDBClusterSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster-snapshot:source-db-cluster-snapshot', 'TargetDBClusterSnapshotIdentifier' => 'target-db-cluster-snapshot'], null, null, null, null],
            ['CopyDBClusterSnapshot', ['SourceDBClusterSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster-snapshot:source-db-cluster-snapshot', 'TargetDBClusterSnapshotIdentifier' => 'target-db-cluster-snapshot'], 'https://aws.com', 'us-east-1', 'https://aws.com', null],
            ['CopyDBClusterSnapshot', ['SourceDBClusterSnapshotIdentifier' => 'arn:aws:rds:us-east-1:123456789012:cluster-snapshot:source-db-cluster-snapshot', 'TargetDBClusterSnapshotIdentifier' => 'target-db-cluster-snapshot'], null, 'us-east-1', null, '01eda84cb84ff1558373f4759aaf76aa4b7be8664241a58f6906ae842a0a9d74'],
        ];
    }

    /**
     * @dataProvider DocDbPresignMethodProvider
     *
     * @param string $functionName
     * @param string $presignedUrl
     * @param string $sourceRegion
     * @param string $expectedUrl
     * @param string $expectedSignature
     */
    public function testCorrectPresignDocDbUrls(
        $functionName,
        $functionArgs,
        $presignedUrl,
        $sourceRegion,
        $expectedUrl,
        $expectedSignature
    ) {
        $docDb = new DocDBClient([
            'region'  => 'us-west-2',
            'version' => 'latest',
            'credentials' => new Credentials('akid', 'secret'),
            'handler' => function (
                CommandInterface $cmd,
                RequestInterface $r
            ) use (
                $expectedUrl,
                $expectedSignature
            ) {
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
        call_user_func([$docDb, $functionName], $functionArgs);
    }
}

