<?php
namespace Aws\Test\Build;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(\NamespaceResolver::class)]
class NamespaceResolverTest extends TestCase
{
    private const SENTINEL = 'AWS Renamed Service';

    private static $sdkRoot = __DIR__ . '/../..';

    /** @var \NamespaceResolver */
    private static $resolver;

    public static function setUpBeforeClass(): void
    {
        self::$resolver = new \NamespaceResolver(self::$sdkRoot);
    }

    public static function shippedServices()
    {
        $manifest = json_decode(
            file_get_contents(self::$sdkRoot . '/src/data/manifest.json'),
            true
        );
        foreach ($manifest as $identifier => $entry) {
            yield $identifier => [
                $identifier,
                $entry['versions']['latest'],
                $entry['namespace'],
            ];
        }
    }

    public static function historicalNamespaces()
    {
        // (serviceId, changelog category) pairs taken from CHANGELOG.md.
        // derive() must reproduce the historical casing exactly; resolve()
        // uses the directory casing instead.
        return [
            ['EC2', 'EC2'],
            ['SNS', 'SNS'],
            ['SQS', 'SQS'],
            ['API Gateway', 'APIGateway'],
            ['SESv2', 'SESv2'],
            ['DynamoDB Streams', 'DynamoDBStreams'],
            ['IoT Data Plane', 'IoTDataPlane'],
            ['Route 53', 'Route53'],
            ['mq', 'MQ'],
            ['kendra', 'kendra'],
            ['drs', 'drs'],
            ['Elastic Load Balancing v2', 'ElasticLoadBalancingv2'],
            ['Location', 'LocationService'],
            ['amp', 'PrometheusService'],
        ];
    }

    private static function latestMetadata($identifier, $version)
    {
        $model = json_decode(file_get_contents(
            self::$sdkRoot . "/src/data/$identifier/$version/api-2.json"
        ), true);

        return $model['metadata'];
    }

    /** @return array<string, string> serviceId => namespace */
    private static function serviceNamespaces()
    {
        return json_decode(file_get_contents(
            self::$sdkRoot . '/src/data/service-namespaces.json'
        ), true)['service-namespaces'];
    }

    #[DataProvider('shippedServices')]
    public function testNamespaceIgnoresDocumentationIds(
        $identifier,
        $version,
        $namespace
    ): void {
        $metadata = self::latestMetadata($identifier, $version);
        $renamed = $metadata;
        $renamed['serviceFullName'] = self::SENTINEL;
        $renamed['serviceAbbreviation'] = self::SENTINEL;

        $this->assertSame($namespace, self::$resolver->resolve($metadata));
        $this->assertSame(
            $namespace,
            self::$resolver->resolve($renamed),
            "$identifier: namespace changed when documentation ids changed"
        );
    }

    public function testShippedNamespacesAreUnique(): void
    {
        $derived = [];
        $resolved = [];
        foreach (self::shippedServices() as [$identifier, $version]) {
            $metadata = self::latestMetadata($identifier, $version);
            $derived[$identifier] = strtolower(self::$resolver->derive($metadata));
            $resolved[$identifier] = strtolower(self::$resolver->resolve($metadata));
        }

        $this->assertSame(
            [],
            array_diff_assoc($derived, array_unique($derived)),
            'Two services derive the same namespace'
        );
        $this->assertSame(
            [],
            array_diff_assoc($resolved, array_unique($resolved)),
            'Two services resolve to the same namespace'
        );
    }

    #[DataProvider('historicalNamespaces')]
    public function testDeriveMatchesHistoricalChangelogCategories(
        $serviceId,
        $expected
    ): void {
        $this->assertSame(
            $expected,
            self::$resolver->derive(['serviceId' => $serviceId])
        );
    }

    public function testResolveUsesDirectoryCasing(): void
    {
        $metadata = ['serviceId' => 'EC2'];
        $this->assertSame('EC2', self::$resolver->derive($metadata));
        $this->assertSame('Ec2', self::$resolver->resolve($metadata));
    }

    public function testDeriveDoesNotRequireADirectory(): void
    {
        $metadata = [
            'serviceId' => 'Brand New Thing',
            'serviceFullName' => 'Amazon Brand New Thing',
        ];
        $this->assertSame('BrandNewThing', self::$resolver->derive($metadata));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('NS not found: BrandNewThing');
        self::$resolver->resolve($metadata);
    }

    public function testDeriveFailsOnCollisionWithTabledNamespace(): void
    {
        // 'amp' owns the namespace PrometheusService; a new service whose
        // serviceId derives to the same name must not be generated under
        // either namespace.
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("already used by serviceId 'amp'");
        self::$resolver->derive(['serviceId' => 'Prometheus Service']);
    }

    public function testDeriveRequiresServiceId(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('endpointPrefix: old-service');
        self::$resolver->derive([
            'endpointPrefix' => 'old-service',
            'serviceFullName' => 'Amazon Old Service',
        ]);
    }

    public function testMissingTableIsRejected(): void
    {
        $root = sys_get_temp_dir() . '/' . uniqid('namespace-resolver-');
        mkdir("$root/src/data", 0777, true);
        try {
            $this->expectException(\RuntimeException::class);
            $this->expectExceptionMessage('service-namespaces.json');
            new \NamespaceResolver($root);
        } finally {
            rmdir("$root/src/data");
            rmdir("$root/src");
            rmdir($root);
        }
    }

    public function testTableEntriesAreNeeded(): void
    {
        // Every entry must differ (including by case) from what serviceId
        // derives on its own; otherwise the entry is dead weight and hides
        // a typo.
        $redundant = [];
        foreach (self::serviceNamespaces() as $serviceId => $ns) {
            if (str_replace(' ', '', ucwords($serviceId)) === $ns) {
                $redundant[$serviceId] = $ns;
            }
        }
        $this->assertSame([], $redundant, 'Redundant service-namespaces.json entries');
    }

    public function testTableKeysAreShippedServiceIds(): void
    {
        // Guards against a mistyped key. An entry is removed only together
        // with the service's models under src/data.
        $shipped = [];
        foreach (self::shippedServices() as [$identifier, $version]) {
            $shipped[] = self::latestMetadata($identifier, $version)['serviceId'];
        }
        $unknown = array_diff(
            array_keys(self::serviceNamespaces()),
            $shipped
        );
        $this->assertSame([], array_values($unknown), 'Table entries for unknown serviceIds');
    }
}
