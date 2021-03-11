<?php
namespace Aws\Test\S3;

use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\BucketEndpointMiddleware
 */
class BucketEndpointMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    public function testUsesHostStyleByDefault()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'Bar/Baz']);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertSame('foo.s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertSame('/Bar/Baz', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testUsesPathStyle()
    {
        $s3 = $this->getTestClient('s3', [
            'use_path_style_endpoint' => true
        ]);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'Bar/Baz']);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertSame('s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertSame('/foo/Bar/Baz', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testIgnoresExcludedCommands()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [['bucket_endpoint' => true]]);
        $command = $s3->getCommand('GetBucketLocation', ['Bucket' => 'foo']);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertSame('foo.s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertSame('/?location', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testPathStyleIgnoresExcludedCommands()
    {
        $s3 = $this->getTestClient('s3', [
            'use_path_style_endpoint' => true
        ]);
        $this->addMockResults($s3, [['bucket_endpoint' => true]]);
        $command = $s3->getCommand('GetBucketLocation', ['Bucket' => 'foo']);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertSame('s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertSame('/foo?location', $req->getRequestTarget());
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
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertSame('test.domain.com', $req->getUri()->getHost());
                $this->assertSame('/key', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }
}
