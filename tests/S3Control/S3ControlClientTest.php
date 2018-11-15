<?php
namespace Aws\Test\S3Control;

use Aws\CommandInterface;
use Aws\Middleware;
use Aws\S3Control\S3ControlClient;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3Control\S3ControlClient
 */
class S3ControlClientTest extends TestCase
{
    public function testAppliesS3ControlEndpointMiddleware()
    {
        // test applies dualstack
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                '111222333444.s3-control.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };

        $client = new S3ControlClient([
            'version' => '2018-08-20',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->deletePublicAccessBlock([
            'AccountId' => '111222333444',
        ]);
    }

    public function testAppliesS3ControlEndpointMiddlewareDualstack()
    {
        // test applies dualstack
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                '111222333444.s3-control.dualstack.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };

        $dualStackClient = new S3ControlClient([
            'version' => '2018-08-20',
            'region' => 'us-west-2',
            'use_dual_stack_endpoint' => true,
            'http_handler' => $handler,
        ]);
        $dualStackClient->deletePublicAccessBlock([
            'AccountId' => '111222333444',
        ]);

        $client = new S3ControlClient([
            'version' => '2018-08-20',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->deletePublicAccessBlock([
            'AccountId' => '111222333444',
            '@use_dual_stack_endpoint' => true,
        ]);
    }

    public function testRemovesAccountIdFromHeaderAndCommand()
    {
        $handler = function (RequestInterface $req) {
            $this->assertEmpty($req->getHeader('x-amz-account-id'));
            return Promise\promise_for(new Response);
        };

        $client = new S3ControlClient([
            'version' => '2018-08-20',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);

        $handlerList = $client->getHandlerList();
        $tap = Middleware::tap(function(CommandInterface $cmd, RequestInterface $req) {
            $this->assertEmpty($cmd->offsetGet('AccountId'));
        });
        $handlerList->prependSign($tap, "tap");

        $client->deletePublicAccessBlock([
            'AccountId' => '111222333444',
        ]);
    }
}
