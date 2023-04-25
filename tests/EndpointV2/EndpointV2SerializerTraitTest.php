<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\EndpointProviderV2;
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

    /**
     * Ensures SDK-level config options used for ruleset evaluation
     * are not overridden by a collision with a command argument
     */
    public function testThrowsExceptionForInvalidAuthScheme()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
           'This operation requests `sigvfoo`, `sigvbar`, `sigvbaz` auth schemes,'
           . ' but the client only supports `sigv4`, `sigv4a`, `none`, `bearer`.'
        );

        $rulesetPath = __DIR__ . '/invalid-rules/invalid-scheme.json';
        $rulesetDefinition = json_decode(file_get_contents($rulesetPath), true);
        $partitions = EndpointDefinitionProvider::getPartitions();

        $clientArgs = [
            'region' => 'us-east-1',
            'endpoint_provider' => new EndpointProviderV2($rulesetDefinition, $partitions)
        ];

        $client = $this->getTestClient('s3', $clientArgs);
        $this->addMockResults($client, [[]]);
        $command = $client->getCommand(
            'headBucket',
            [
                'Bucket' => 'foo',
            ]
        );
        $list = $client->getHandlerList();
        $handler = $list->resolve();
        $handler($command)->wait();
    }
}