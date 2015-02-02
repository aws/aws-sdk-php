<?php
namespace Aws\Test\Ec2;

use Aws\Ec2\Ec2Client;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Ec2\CopySnapshotSubscriber
 */
class CopySnapshotSubscriberTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testDoesNotAddPresignedUrlForNonCopySnapshot()
    {
        $ec2 = Ec2Client::factory([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->addMockResults($ec2, [[]]);
        $cmd = $ec2->getCommand('DescribeInstances');
        $ec2->execute($cmd);
        $this->assertNull($cmd['PresignedUrl']);
    }

    public function testAddsPresignedUrlForCopySnapshot()
    {
        $ec2 = Ec2Client::factory([
            'region'  => 'us-east-2',
            'version' => 'latest'
        ]);
        $this->addMockResults($ec2, [[]]);
        $cmd = $ec2->getCommand('CopySnapshot', [
            'SourceRegion'     => 'eu-west-1',
            'SourceSnapshotId' => 'foo'
        ]);
        $ec2->execute($cmd);
        $url = $cmd['PresignedUrl'];
        $this->assertNotNull($url);
        $this->assertContains('https://ec2.eu-west-1.amazonaws.com', $url);
        $this->assertContains('SourceSnapshotId=foo', $url);
        $this->assertContains('SourceRegion=eu-west-1', $url);
        $this->assertContains('X-Amz-Signature=', $url);
        $this->assertSame('us-east-2', $cmd['DestinationRegion']);
    }
}
