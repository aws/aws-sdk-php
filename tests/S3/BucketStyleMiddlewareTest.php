<?php
namespace Aws\Test\S3;

use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\S3\BucketStyleMiddleware
 */
class BucketStyleTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testUsesPathStyleWhenHttpsContainsDots()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', [
            'Bucket' => 'test.123',
            'Key'    => 'Bar'
        ]);
        $command->getHandlerList()->append(
            'sign',
            Middleware::tap(function ($cmd, RequestInterface $req) {
                $this->assertEquals('s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertEquals('/test.123/Bar', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testUsesPathStyleWhenNotDnsCompatible()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', [
            'Bucket' => '_baz_!',
            'Key'    => 'Bar'
        ]);
        $command->getHandlerList()->append(
            'sign',
            Middleware::tap(function ($cmd, $req) {
                $this->assertEquals('s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertEquals('/_baz_%21/Bar', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testUsesPathStyleWhenForced()
    {
        $s3 = $this->getTestClient('s3', ['force_path_style' => true]);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', [
            'Bucket' => 'foo',
            'Key'    => 'Bar'
        ]);
        $command->getHandlerList()->append(
            'sign',
            Middleware::tap(function ($cmd, $req) {
                $this->assertEquals('s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertEquals('/foo/Bar', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testUsesVirtualHostedWhenPossible()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'Bar/Baz']);
        $command->getHandlerList()->append(
            'sign',
            Middleware::tap(function ($cmd, $req) {
                $this->assertEquals('foo.s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertEquals('/Bar/Baz', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testIgnoresExcludedCommands()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetBucketLocation', ['Bucket' => 'foo']);
        $command->getHandlerList()->append(
            'sign',
            Middleware::tap(function ($cmd, $req) {
                $this->assertEquals('s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertEquals('/foo?location', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testRemovesBucketWhenBucketEndpoint()
    {
        $s3 = $this->getTestClient('s3', [
            'endpoint'        => 'http://test.domain.com',
            'bucket_endpoint' => true
        ]);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', [
            'Bucket' => 'test',
            'Key'    => 'key'
        ]);
        $command->getHandlerList()->append(
            'sign',
            Middleware::tap(function ($cmd, $req) {
                $this->assertEquals('test.domain.com', $req->getUri()->getHost());
                $this->assertEquals('/key', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }
}
