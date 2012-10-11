<?php

namespace Aws\Tests\S3;

use Aws\S3\BucketStyleListener;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\S3\BucketStyleListener
 */
class BucketStyleListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasEvents()
    {
        $this->assertNotEmpty(BucketStyleListener::getSubscribedEvents());
    }

    public function testUsesPathStyleWhenHttpsContainsDots()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => 'test.123',
            'Key'       => 'Bar'
        ));
        $command->execute();
        $this->assertEquals('s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/test.123/Bar', $command->getRequest()->getResource());
    }

    public function testUsesPathStyleWhenNotDnsCompatible()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => '_baz_!',
            'Key'       => 'Bar'
        ));
        $command->execute();
        $this->assertEquals('s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/_baz_%21/Bar', $command->getRequest()->getResource());
    }

    public function testUsesPathStyleWhenForced()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => 'foo',
            'Key'       => 'Bar',
            'PathStyle' => true
        ));
        $command->execute();
        $this->assertEquals('s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/foo/Bar', $command->getRequest()->getResource());
    }

    public function testUsesVirtualHostedWhenPossible()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $this->setMockResponse($s3, array(new Response(200)));
        $command = $s3->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'Bar'));
        $command->execute();
        $this->assertEquals('foo.s3.amazonaws.com', $command->getRequest()->getHost());
        $this->assertEquals('/Bar', $command->getRequest()->getResource());
    }
}
