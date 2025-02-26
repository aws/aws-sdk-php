<?php
namespace Aws\Test\S3Control;

use Aws\Endpoint\PartitionEndpointProvider;
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
            return Promise\Create::promiseFor(new Response);
        };

        $client = $this->getTestClient([
            'http_handler' => $handler,
        ]);
        $client->deletePublicAccessBlock([
            'AccountId' => '111222333444',
        ]);
    }

    public function testDoesNotUseEndpointArnMiddlewareByDefault()
    {
        $client = $this->getTestClient([]);
        $list = $client->getHandlerList();
        $this->assertStringNotContainsString(
            's3control.endpoint_arn_middleware', $list->__toString()
        );
    }

    public function testLegacyEndpointProviderUsesEndpointArnMiddleware()
    {
        $client = $this->getTestClient(
            ['endpoint_provider' => PartitionEndpointProvider::defaultProvider()]
        );
        $list = $client->getHandlerList();
        $this->assertStringContainsString(
            's3control.endpoint_arn_middleware', $list->__toString()
        );
    }
}
