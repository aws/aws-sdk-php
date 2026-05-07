<?php

namespace Aws\Test\EndpointV2\Bdd;

use Aws\EndpointV2\Bdd\BddResultResolver;
use Aws\EndpointV2\Bdd\BddRuleset;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Exception\UnresolvedEndpointException;
use PHPUnit\Framework\Attributes\CoversClass;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(BddResultResolver::class)]
class BddResultResolverTest extends TestCase
{
    private array $partitions;

    protected function set_up()
    {
        $this->partitions = EndpointDefinitionProvider::getPartitions();
    }

    public function testResolvesEndpointResultWithPlainUrl()
    {
        $resolver = $this->resolverFor([
            $this->endpointResult('https://example.com'),
        ]);

        $endpoint = $resolver->resolve(1, []);

        $this->assertInstanceOf(RulesetEndpoint::class, $endpoint);
        $this->assertSame('https://example.com', $endpoint->getUrl());
        $this->assertNull($endpoint->getProperties());
        $this->assertNull($endpoint->getHeaders());
    }

    public function testResolvesTemplatedUrlUsingInputParameters()
    {
        $resolver = $this->resolverFor([
            $this->endpointResult('https://{Region}.example.com'),
        ]);

        $endpoint = $resolver->resolve(1, ['Region' => 'us-west-2']);

        $this->assertSame('https://us-west-2.example.com', $endpoint->getUrl());
    }

    public function testResolvesPropertiesIncludingNestedTemplates()
    {
        $resolver = $this->resolverFor([
            [
                'endpoint' => [
                    'url' => 'https://example.com',
                    'properties' => [
                        'authSchemes' => [
                            [
                                'name' => 'sigv4',
                                'signingRegion' => '{Region}',
                            ],
                        ],
                    ],
                ],
                'type' => 'endpoint',
            ],
        ]);

        $endpoint = $resolver->resolve(1, ['Region' => 'eu-west-1']);

        $this->assertSame(
            [
                'authSchemes' => [
                    ['name' => 'sigv4', 'signingRegion' => 'eu-west-1'],
                ],
            ],
            $endpoint->getProperties()
        );
    }

    public function testResolvesHeaders()
    {
        $resolver = $this->resolverFor([
            [
                'endpoint' => [
                    'url' => 'https://example.com',
                    'headers' => [
                        'x-amz-region' => [['ref' => 'Region']],
                        'x-amz-static' => ['literal'],
                    ],
                ],
                'type' => 'endpoint',
            ],
        ]);

        $endpoint = $resolver->resolve(1, ['Region' => 'us-east-1']);

        $this->assertSame(
            [
                'x-amz-region' => ['us-east-1'],
                'x-amz-static' => ['literal'],
            ],
            $endpoint->getHeaders()
        );
    }

    public function testErrorResultThrowsWithResolvedMessage()
    {
        $resolver = $this->resolverFor([
            [
                'error' => 'No endpoint for region {Region}',
                'type' => 'error',
            ],
        ]);

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('No endpoint for region eu-south-42');
        $resolver->resolve(1, ['Region' => 'eu-south-42']);
    }

    public function testResultWithoutEndpointOrErrorThrows()
    {
        $resolver = $this->resolverFor([
            ['type' => 'endpoint'],
        ]);

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('missing an `endpoint` or `error` block');
        $resolver->resolve(1, []);
    }

    public function testResolveIndexZeroIsTreatedAsNoMatch()
    {
        $resolver = $this->resolverFor([
            $this->endpointResult('https://example.com'),
        ]);

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Unable to resolve an endpoint');
        $resolver->resolve(0, ['Region' => 'us-east-1']);
    }

    public function testResolveNoMatchThrowsCanonicalMessage()
    {
        $resolver = $this->resolverFor([]);

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            'Unable to resolve an endpoint using the provider arguments:'
        );
        $resolver->resolveNoMatch(['Region' => 'us-east-1']);
    }

    public function testUnknownResultIndexThrows()
    {
        $resolver = $this->resolverFor([
            $this->endpointResult('https://example.com'),
        ]);

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('unknown result index 5');
        $resolver->resolve(5, []);
    }

    public function testDefinedResultIndexMapsToOffsetMinusOne()
    {
        // results[0] represents defined result index 1 (NoMatchRule is implicit).
        // This confirms resolve(2, ...) reads results[1], not results[2].
        $resolver = $this->resolverFor([
            $this->endpointResult('https://first.example'),
            $this->endpointResult('https://second.example'),
        ]);

        $this->assertSame(
            'https://first.example',
            $resolver->resolve(1, [])->getUrl()
        );
        $this->assertSame(
            'https://second.example',
            $resolver->resolve(2, [])->getUrl()
        );
    }

    private function resolverFor(array $results): BddResultResolver
    {
        $ruleset = new BddRuleset(
            [
                'parameters' => [],
                'conditions' => [],
                'results' => $results,
                'nodes' => '',
                'nodeCount' => 0,
                'root' => 1,
            ],
            $this->partitions
        );

        return new BddResultResolver($ruleset);
    }

    private function endpointResult(string $url): array
    {
        return [
            'endpoint' => ['url' => $url],
            'type' => 'endpoint',
        ];
    }
}
