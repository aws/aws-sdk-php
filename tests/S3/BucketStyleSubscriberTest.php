<?php
namespace Aws\Test\S3;

use Aws\S3\BucketStyleSubscriber;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\S3\BucketStyleSubscriber
 */
class BucketStyleTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testHasEvents()
    {
        $this->assertNotEmpty((new BucketStyleSubscriber)->getEvents());
    }

    public function testUsesPathStyleWhenHttpsContainsDots()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResponses($s3, [new Response(200)]);
        $command = $s3->getCommand('GetObject', array(
            'Bucket' => 'test.123',
            'Key'    => 'Bar'
        ));
        $command->getEmitter()->on('process', function (ProcessEvent $e) {
            $this->assertEquals('s3.amazonaws.com', $e->getRequest()->getHost());
            $this->assertEquals('/test.123/Bar', $e->getRequest()->getResource());
        });
        $s3->execute($command);
    }

    public function testUsesPathStyleWhenNotDnsCompatible()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResponses($s3, [new Response(200)]);
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => '_baz_!',
            'Key'       => 'Bar'
        ));
        $command->getEmitter()->on('process', function (ProcessEvent $e) {
            $this->assertEquals('s3.amazonaws.com', $e->getRequest()->getHost());
            $this->assertEquals('/_baz_%21/Bar', $e->getRequest()->getResource());
        });
        $s3->execute($command);
    }

    public function testUsesPathStyleWhenForced()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResponses($s3, [new Response(200)]);
        $command = $s3->getCommand('GetObject', array(
            'Bucket'    => 'foo',
            'Key'       => 'Bar',
            'PathStyle' => true
        ));
        $command->getEmitter()->on('process', function (ProcessEvent $e) {
                $this->assertEquals('s3.amazonaws.com', $e->getRequest()->getHost());
                $this->assertEquals('/foo/Bar', $e->getRequest()->getResource());
            });
        $s3->execute($command);
    }

    public function testUsesVirtualHostedWhenPossible()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResponses($s3, [new Response(200)]);
        $command = $s3->getCommand('GetObject', array('Bucket' => 'foo', 'Key' => 'Bar/Baz'));
        $command->getEmitter()->on('process', function (ProcessEvent $e) {
            $this->assertEquals('foo.s3.amazonaws.com', $e->getRequest()->getHost());
            $this->assertEquals('/Bar/Baz', $e->getRequest()->getResource());
        });
        $s3->execute($command);
    }

    public function testIgnoresExcludedCommands()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResponses($s3, [new Response(200)]);
        $command = $s3->getCommand('GetBucketLocation', ['Bucket' => 'foo']);
        $command->getEmitter()->on('process', function (ProcessEvent $e) {
            $this->assertEquals('s3.amazonaws.com', $e->getRequest()->getHost());
            $this->assertEquals('/foo?location', $e->getRequest()->getResource());
        });
        $s3->execute($command);
    }
}
