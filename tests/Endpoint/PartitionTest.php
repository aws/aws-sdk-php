<?php
namespace Aws\Test;

use Aws\Endpoint\Partition;
use Aws\Endpoint\PartitionInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Endpoint\Partition
 */
class PartitionTest extends TestCase
{
    /**
     * @dataProvider partitionDefinitionProvider
     *
     * @param array $definition
     */
    public function testAcceptsValidDefinitions(array $definition)
    {
        $this->assertInstanceOf(
            PartitionInterface::class, 
            new Partition($definition)
        );
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

    /**
     * @dataProvider partitionDefinitionProvider
     *
     * @param array $definition
     */
    public function testReportsName(array $definition)
    {
        $this->assertSame(
            $definition['partition'],
            (new Partition($definition))->getName()
        );
    }

    public function partitionDefinitionProvider()
    {
        return [
            [[
                'partition' => 'aws_test',
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

        $this->assertTrue($partition->isRegionMatch('region', 'service'));
        $this->assertFalse($partition->isRegionMatch('foo', 'bar'));
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

        $this->assertTrue($partition->isRegionMatch('foo', 's3'));
        $this->assertTrue($partition->isRegionMatch('fou', 's3'));
        $this->assertFalse($partition->isRegionMatch('bar', 's3'));
    }

    /**
     * @dataProvider serviceRegionsProvider
     *
     * @param Partition $partition
     * @param string $service
     * @param array $regions
     * @param bool $allowNonRegionalEndpoints
     */
    public function testEnumeratesRegionsForGivenService(
        Partition $partition,
        $service,
        array $regions,
        $allowNonRegionalEndpoints
    ) {
        $this->assertSame($regions, $partition->getAvailableEndpoints(
            $service,
            $allowNonRegionalEndpoints
        ));
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
            [$partition, 'baz', ['foo-global'], false],
            [$partition, 'fizz', ['buzz', 'pop'], false],
            [$partition, 'fizz', ['buzz', 'pop', 'pop-external-1-fips'], true],
            [$partition, 'quux', [], true],
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

    public function testIgnoresIsRegionalizedFlagIfPartitionEndpointAbsent()
    {
        $partition = new Partition([
            'partition' => 'foo',
            'dnsSuffix' => 'bar',
            'defaults' => ['hostname' => '{service}.{region}.{dnsSuffix}'],
            'regions' => [],
            'services' => [
                'baz' => [
                    'isRegionalized' => false,
                    'endpoints' => [
                        'foo-global' => ['hostname' => 'quux'],
                    ],
                ],
            ],
        ]);

        $resolved = $partition([
            'service' => 'baz',
            'region' => 'us-east-1',
            'scheme' => 'https',
        ]);

        $this->assertArrayHasKey('endpoint', $resolved);
        $this->assertSame('https://baz.us-east-1.bar', $resolved['endpoint']);
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
                'sdb' => [
                    'defaults' => ['signatureVersions' => ['v2']],
                    'endpoints' => [
                        'us-east-1' => [],
                    ]
                ]
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
            // sdb
            [$partition, 'us-east-1', 'sdb', null]
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
