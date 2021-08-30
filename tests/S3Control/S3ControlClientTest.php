<?php
namespace Aws\Test\S3Control;

use Aws\Arn\ArnParser;
use Aws\Exception\UnresolvedEndpointException;
use Aws\S3Control\S3ControlClient;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3Control\S3ControlClient
 */
class S3ControlClientTest extends TestCase
{
    use S3ControlTestingTrait;

    public function testAppliesS3ControlEndpointMiddleware()
    {
        // test applies the hostprefix trait for account id
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                '111222333444.s3-control.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };

        $client = $this->getTestClient([
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

        $dualStackClient = $this->getTestClient([
            'http_handler' => $handler,
            'use_dual_stack_endpoint' => true,
        ]);
        $dualStackClient->deletePublicAccessBlock([
            'AccountId' => '111222333444',
        ]);

        $client = $this->getTestClient([
            'http_handler' => $handler,
        ]);
        $client->deletePublicAccessBlock([
            'AccountId' => '111222333444',
            '@use_dual_stack_endpoint' => true,
        ]);
    }

}
