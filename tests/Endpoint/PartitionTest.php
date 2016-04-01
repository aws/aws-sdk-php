<?php
namespace Aws\Test;

use Aws\Endpoint\Partition;

/**
 * @covers \Aws\Endpoint\Partition
 */
class PartitionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider partitionDefinitionProvider
     *
     * @param array $definition
     */
    public function testAcceptsValidDefinitions(array $definition)
    {
        $this->assertInstanceOf(Partition::class, new Partition($definition));
    }

    /**
     * @dataProvider invalidPartitionDefinitionProvider
     *
     * @param array $invalidDefinition
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /missing required \w+ field/
     */
    public function testRejectsInvalidDefinitions(array $invalidDefinition)
    {
        new Partition($invalidDefinition);
    }

    public function partitionDefinitionProvider()
    {
        return [
            [[
                'partition' => 'aws',
                'dnsSuffix' => 'amazonaws.com',
                'regions' => [
                    'region' => [
                        'description' => 'A description',
                    ],
                ],
                'services' => [
                    'service' => [
                        'endpoints' => [
                            'us-east-1' => [],
                            'us-west-2' => [],
                        ],
                    ],
                ],
            ]],
        ];
    }

    public function invalidPartitionDefinitionProvider()
    {
        $validDefinition = $this->partitionDefinitionProvider()[0][0];
        $return = [];

        foreach ($validDefinition as $requiredKey => $v) {
            $def = $validDefinition;
            unset($def[$requiredKey]);

            $return []= [$def];
        }

        return $return;
    }

    /**
     * @dataProvider partitionDefinitionProvider
     *
     * @param array $definition
     */
    public function testReportsRegionMatches(array $definition)
    {
        $partition = new Partition($definition);

        $this->assertTrue($partition->matchesRegion('region'));
        $this->assertFalse($partition->matchesRegion('foo'));
    }

    /**
     * @dataProvider partitionDefinitionProvider
     *
     * @param array $definition
     */
    public function testReportsRegionMatchesByPattern(array $definition)
    {
        $definition['regionRegex'] = '^fo[\w]{1}';
        $partition = new Partition($definition);

        $this->assertTrue($partition->matchesRegion('foo'));
        $this->assertTrue($partition->matchesRegion('fou'));
        $this->assertFalse($partition->matchesRegion('bar'));
    }

    /**
     * @dataProvider serviceRegionsProvider
     *
     * @param Partition $partition
     * @param string $service
     * @param array $regions
     */
    public function testEnumeratesRegionsForGivenService(
        Partition $partition,
        $service,
        array $regions
    ) {
        $this->assertSame($regions, $partition->getRegionsForService($service));
    }

    public function serviceRegionsProvider()
    {
        $partition = new Partition([
            'partition' => 'foo',
            'dnsSuffix' => 'bar',
            'regions' => [
                'foo-global' => [],
                'buzz' => [],
                'pop' => [],
            ],
            'services' => [
                'baz' => [
                    'isRegionalized' => false,
                    'partitionEndpoint' => 'foo-global',
                    'endpoints' => [
                        'foo-global' => [
                            'credentialScope' => ['region' => 'quux']
                        ],
                    ],
                ],
                'fizz' => [
                    'endpoints' => [
                        'buzz' => [],
                        'pop' => [],
                        'pop-external-1-fips' => [],
                    ],
                ],
            ],
        ]);

        return [
            [$partition, 'baz', ['foo-global']],
            [$partition, 'fizz', ['buzz', 'pop']],
            [$partition, 'quux', []],
        ];
    }

    /**
     * @dataProvider signingRegionProvider
     *
     * @param Partition $partition
     * @param $region
     * @param $service
     * @param $signingRegion
     */
    public function testDeterminesSigningRegion(
        Partition $partition,
        $region,
        $service,
        $signingRegion
    ) {
        $resolved = $partition([
            'scheme' => 'https',
            'service' => $service,
            'region' => $region,
        ]);

        $this->assertArrayHasKey('signingRegion', $resolved);
        $this->assertSame($signingRegion, $resolved['signingRegion']);
    }

    public function signingRegionProvider()
    {
        $partition = new Partition([
            'partition' => 'foo',
            'dnsSuffix' => 'bar',
            'regions' => [],
            'services' => [
                'baz' => [
                    'isRegionalized' => false,
                    'partitionEndpoint' => 'foo-global',
                    'endpoints' => [
                        'foo-global' => [
                            'credentialScope' => ['region' => 'quux']
                        ],
                    ],
                ],
                'fizz' => [
                    'endpoints' => [
                        'buzz' => [],
                    ],
                ],
            ],
        ]);

        return [
            [$partition, 'eu-central-1', 'baz', 'quux'],
            [$partition, 'eu-central-1', 'fizz', 'eu-central-1'],
            [$partition, 'us-east-1', 'iot', 'us-east-1'],
        ];
    }

    /**
     * @dataProvider endpointProvider
     *
     * @param Partition $partition
     * @param $region
     * @param $service
     * @param $endpoint
     */
    public function testDeterminesEndpoint(
        Partition $partition,
        $region,
        $service,
        $endpoint
    ) {
        $resolved = $partition([
            'scheme' => 'https',
            'service' => $service,
            'region' => $region,
        ]);

        $this->assertArrayHasKey('endpoint', $resolved);
        $this->assertSame($endpoint, $resolved['endpoint']);
    }

    public function endpointProvider()
    {
        $partition = new Partition([
            'partition' => 'foo',
            'dnsSuffix' => 'bar',
            'defaults' => ['hostname' => '{service}.{region}.{dnsSuffix}'],
            'regions' => [],
            'services' => [
                'baz' => [
                    'isRegionalized' => false,
                    'partitionEndpoint' => 'foo-global',
                    'endpoints' => [
                        'foo-global' => ['hostname' => 'quux'],
                    ],
                ],
                'fizz' => [
                    'endpoints' => [
                        'buzz' => [],
                        'pop' => [
                            'hostname' => '{region}.{service}.{dnsSuffix}',
                        ],
                    ],
                ],
            ],
        ]);

        return [
            [$partition, 'us-east-1', 'baz', 'https://quux'],
            [$partition, 'buzz', 'fizz', 'https://fizz.buzz.bar'],
            [$partition, 'pop', 'fizz', 'https://pop.fizz.bar'],
            [$partition, 'us-east-1', 'iot', 'https://iot.us-east-1.bar'],
        ];
    }

    /**
     * @dataProvider partitionDefinitionProvider
     *
     * @param array $definition
     */
    public function testSupportsArrayAccess(array $definition)
    {
        $partition = new Partition($definition);
        $this->assertSame($definition, $partition->toArray());
        $partition['foo'] = 'bar';
        $this->assertTrue(isset($partition['foo']));
        $this->assertSame('bar', $partition['foo']);
        unset($partition['foo']);
        $this->assertFalse(isset($partition['foo']));
    }

    /**
     * @dataProvider signatureVersionProvider
     *
     * @param Partition $partition
     * @param $region
     * @param $service
     * @param $signatureVersion
     */
    public function testDeterminesSignatureVersion(
        Partition $partition,
        $region,
        $service,
        $signatureVersion
    ) {
        $resolved = $partition([
            'scheme' => 'https',
            'service' => $service,
            'region' => $region,
        ]);

        $this->assertArrayHasKey('signatureVersion', $resolved);
        $this->assertSame($signatureVersion, $resolved['signatureVersion']);
    }

    public function signatureVersionProvider()
    {
        $partition = new Partition([
            'partition' => 'foo',
            'dnsSuffix' => 'bar',
            'defaults' => ['signatureVersions' => ['v4']],
            'regions' => [],
            'services' => [
                'baz' => [
                    'isRegionalized' => false,
                    'partitionEndpoint' => 'foo-global',
                    'endpoints' => [
                        'foo-global' => ['signatureVersions' => ['s3v4']],
                    ],
                ],
                'fizz' => [
                    'defaults' => ['signatureVersions' => ['anonymous']],
                    'endpoints' => [
                        'buzz' => [],
                        'pop' => [
                            'signatureVersions' => ['s3v4'],
                        ],
                    ],
                ],
                'quux' => [
                    'endpoints' => [
                        'puff' => [],
                    ],
                ],
            ],
        ]);

        return [
            // partition endpoint setting
            [$partition, 'us-east-1', 'baz', 's3v4'],
            // service setting
            [$partition, 'buzz', 'fizz', 'anonymous'],
            // service endpoint setting
            [$partition, 'pop', 'fizz', 's3v4'],
            // no overrides
            [$partition, 'puff', 'quux', 'v4'],
            // unknown region
            [$partition, 'us-east-1', 'quux', 'v4'],
            // unknown service
            [$partition, 'us-east-1', 'iot', 'v4'],
        ];
    }

    /**
     * @dataProvider signingNameProvider
     *
     * @param Partition $partition
     * @param string $region
     * @param string $service
     * @param string $signingName
     */
    public function testDeterminesSigningName(
        Partition $partition,
        $region,
        $service,
        $signingName
    ) {
        $resolved = $partition([
            'scheme' => 'https',
            'service' => $service,
            'region' => $region,
        ]);

        $this->assertArrayHasKey('signingName', $resolved);
        $this->assertSame($signingName, $resolved['signingName']);
    }

    public function signingNameProvider()
    {
        $partition = new Partition([
            'partition' => 'foo',
            'dnsSuffix' => 'bar',
            'regions' => [],
            'services' => [
                'baz' => [
                    'isRegionalized' => false,
                    'partitionEndpoint' => 'foo-global',
                    'endpoints' => [
                        'foo-global' => [
                            'credentialScope' => ['service' => 'quux']
                        ],
                    ],
                ],
                'fizz' => [
                    'defaults' => [
                        'credentialScope' => ['service' => 'execute-api'],
                    ],
                    'endpoints' => [
                        'buzz' => [
                            'credentialScope' => ['service' => 'pop'],
                        ],
                    ],
                ],
                'quux' => [
                    'endpoints' => [
                        'puff' => [],
                    ],
                ],
            ],
        ]);

        return [
            // partition endpoint setting
            [$partition, 'eu-central-1', 'baz', 'quux'],
            // service setting
            [$partition, 'eu-central-1', 'fizz', 'execute-api'],
            // service endpoint setting
            [$partition, 'buzz', 'fizz', 'pop'],
            // no overrides
            [$partition, 'puff', 'quux', 'quux'],
            // unknown service
            [$partition, 'us-east-1', 's3', 's3'],
        ];
    }
}
