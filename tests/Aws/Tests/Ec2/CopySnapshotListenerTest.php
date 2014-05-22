<?php

namespace Aws\Tests\Ec2;

/**
 * @covers \Aws\Ec2\CopySnapshotListener
 */
class CopySnapshotListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testAddsPresignedUrlBeforeSending()
    {
        $client = $this->getServiceBuilder()->get('ec2');
        $client->setRegion('us-east-1');
        $command = $client->getCommand('CopySnapshot', array(
            'SourceRegion'     => 'eu-west-1',
            'SourceSnapshotId' => 'foo'
        ));
        $request = $command->prepare();
        $r = (string) $request;
        $this->assertContains('DestinationRegion=us-east-1', $r);
        $this->assertContains('SourceRegion%3Deu-west-1', $r);
        $this->assertContains('PresignedUrl=https%3A%2F%2Fec2.eu-west-1.amazonaws.com', $r);
    }

    public function testIgnoresOtherOperations()
    {
        $client = $this->getServiceBuilder()->get('ec2');
        $command = $client->getCommand('DescribeInstances');
        $request = $command->prepare();
        $r = (string) $request;
        $this->assertNotContains('PresignedUrl=', $r);
    }
}
