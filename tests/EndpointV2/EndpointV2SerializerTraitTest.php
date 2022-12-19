<?php
namespace Aws\Test\EndpointV2;

use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\EndpointV2\EndpointV2SerializerTrait
 */
class EndpointV2SerializerTraitTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * Ensures SDK-level config options used for ruleset evaluation
     * are not overridden by a collision with a command argument
     */
    public function testCommandEndpointDoesNotOverrideSdkEndpoint()
    {
        $clientArgs = [
            'region' => 'us-east-1',
            'endpoint' => 'https://foo.com'
        ];

        $client = $this->getTestClient('sns', $clientArgs);
        $this->addMockResults($client, [[]]);
        $command = $client->getCommand(
            'subscribe',
            [
                'TopicArn' => 'foo',
                'Protocol' => 'https',
                'Endpoint' => 'http://someurl.com'
            ]
        );
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $this->assertStringContainsString(
                'foo.com',
                $req->getUri()->getHost()
            );
        }));
        $handler = $list->resolve();
        $handler($command)->wait();
    }
}