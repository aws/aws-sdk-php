<?php
namespace Aws\Test;

use Aws\CommandInterface;
use Aws\Ec2\Ec2Client;
use Aws\Rds\RdsClient;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\PresignUrlMiddleware
 */
class PresignUrlMiddlewareTest extends \PHPUnit_Framework_TestCase
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
                $this->assertContains('https://ec2.eu-west-1.amazonaws.com', $url);
                $this->assertContains('SourceSnapshotId=foo', $url);
                $this->assertContains('SourceRegion=eu-west-1', $url);
                $this->assertContains('X-Amz-Signature=', $url);
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
                $this->assertContains('https://rds.eu-west-1.amazonaws.com', $url);
                $this->assertContains('KmsKeyId=', $url);
                $this->assertContains('SourceDBSnapshotIdentifier=', $url);
                $this->assertContains('TargetDBSnapshotIdentifier=my-snapshot-copy', $url);
                $this->assertContains('eu-west-1', $url);
                $this->assertContains('X-Amz-Signature=', $url);
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
}
