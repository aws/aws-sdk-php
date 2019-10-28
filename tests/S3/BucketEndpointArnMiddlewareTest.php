<?php
namespace Aws\Test\S3;

use Aws\CommandInterface;
use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\S3\BucketEndpointMiddleware
 */
class BucketEndpointArnMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    public function testCorrectlyModifiesUri()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:foo',
                'Key' => 'Bar/Baz'
            ]
        );

        $command->getHandlerList()->appendSign(
            Middleware::tap(function (
                CommandInterface $cmd,
                RequestInterface $req
            ) {
                $this->assertEquals(
                    'foo-123456789012.s3.us-west-2.aws',
                    $req->getUri()->getHost()
                );
                $this->assertEquals('/Bar/Baz', $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }
}
