<?php
namespace Aws\Test\S3;

use Aws\S3\BucketStyleMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * @covers Aws\S3\BucketStyleMiddleware
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

    public function testRemovesBucketWhenBucketEndpoint()
    {
        $s3 = $this->getTestClient('s3', [
            'endpoint'        => 'http://test.domain.com',
            'bucket_endpoint' => true
        ]);
        $command = $s3->getCommand('GetObject', array(
            'Bucket' => 'test',
            'Key'    => 'key'
        ));
        $ct = new CommandTransaction($s3, $command);
        $ct->request = new Request('GET', 'http://test.domain.com/test/key');
        $event = new PreparedEvent($ct);
        $bs = new BucketStyleSubscriber(true);
        $bs->setBucketStyle($event);
        $this->assertEquals('/key', $ct->request->getResource());
        $this->assertEquals('test.domain.com', $ct->request->getHost());
    }
}
