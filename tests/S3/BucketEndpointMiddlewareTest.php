<?php
namespace Aws\Test\S3;

use Aws\Middleware;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\S3\BucketEndpointMiddleware
 */
class BucketEndpointMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testUsesPathStyleByDefault()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'Bar/Baz']);
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertEquals('s3.amazonaws.com', $req->getUri()->getHost());
                $this->assertEquals('/foo/Bar/Baz', $req->getRequestTarget());
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
        $command->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) {
                $this->assertEquals('test.domain.com', $req->getUri()->getHost());
                $this->assertEquals('/key', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }
}
