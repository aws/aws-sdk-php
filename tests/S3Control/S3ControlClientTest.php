<?php
namespace Aws\Test\S3Control;

use Aws\Api\ApiProvider;
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

    /**
     * Returns a test client that uses model fixtures to not be dependent on
     * the current live model files
     *
     * @param array $args
     * @return S3ControlClient
     */
    private function getTestClient(array $args)
    {
        $params = [
            'version' => '2018-08-20',
            'region' => 'us-west-2',
            'api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')
        ];

        return new S3ControlClient(array_merge($params, $args));
    }
}
