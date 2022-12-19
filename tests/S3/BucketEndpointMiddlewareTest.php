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

    public function testHandlesTrailingForwardSlash()
    {
        $s3 = $this->getTestClient('s3', [
            'endpoint'        => 'http://test.domain.com/test/',
            'bucket_endpoint' => true
        ]);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('ListObjects', [
            'Bucket' => 'test',
            'Prefix'    => '/'
        ]);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertSame('test.domain.com', $req->getUri()->getHost());
                $this->assertSame('/test/?prefix=%2F&encoding-type=url', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function testHandlesDuplicatePath()
    {
        $s3 = $this->getTestClient('s3', [
            'endpoint'        => 'http://domain.com/test',
            'bucket_endpoint' => true,
            'use_path_style_endpoint' => true
        ]);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('headBucket', [
            'Bucket' => 'test',
        ]);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertSame('domain.com', $req->getUri()->getHost());
                $this->assertSame('/test/', $req->getUri()->getPath());
            })
        );
        $s3->execute($command);
    }

    public function keyContainsBucketNameProvider()
    {
        return [
            ['bucketname'],
            ['/bucketname'],
            ['foo/bucketname/'],
            ['/foo/bucketname'],
            ['///bucketname'],
            ['bucketname/bucketname/bucketname/bucketname'],
            ['/bucketname/bucketname/bucketname/bucketname']
        ];
    }

    /**
     * @dataProvider keyContainsBucketNameProvider
     *
     * @param $key
     */
    public function testsHandlesDuplicatePathWithKeyContainsBucketName($key)
    {
        $s3 = $this->getTestClient('s3', [
            'endpoint'        => 'http://domain.com/bucketname',
            'bucket_endpoint' => true,
            'use_path_style_endpoint' => true
        ]);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('headObject', [
            'Bucket' => 'bucketname',
            'Key' => $key
        ]);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) use ($key) {
                $this->assertSame('domain.com', $req->getUri()->getHost());
                $this->assertSame('/bucketname/' . $key, $req->getUri()->getPath());
            })
        );
        $s3->execute($command);
    }
}
