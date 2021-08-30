<?php
namespace Aws\Test\Endpoint;

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
    public function testReportsData(array $definition)
    {
        $this->assertSame(
            $definition['partition'],
            (new Partition($definition))->getName()
        );
        $this->assertSame(
            $definition['dnsSuffix'],
            (new Partition($definition))->getDnsSuffix()
        );
    }
    /**
     * @dataProvider partitionDefinitionProvider
     *
     * @param array $definition
     */
    public function testFipsEndpoint(array $definition)
    {
        $partition = new Partition($definition);
        $resolved = $partition(['region' => 'fips-aws-global', 'service' => 'service']);
        self::assertContains('service-fips.amazonaws.com', $resolved['endpoint']);
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
                            'fips-aws-global' => ['hostname' => 'service-fips.amazonaws.com'],
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
            [$partition, 'us-east-2', 's3', 's3'],
        ];
    }

    /**
     * @dataProvider stsEndpointTestCases
     *
     * @param $region
     * @param $configOption
     * @param $expectedEndpoint
     */
    public function testResolvesStsRegionalEndpoints(
        $region,
        $configOption,
        $expectedEndpoint
    ) {
        $data = json_decode(
            file_get_contents(__DIR__ . '/fixtures/sts_regional_endpoints.json'),
            true
        );
        $partition = new Partition($data['partitions'][0]);

        $params = [
            'service' => 'sts',
            'region' => $region
        ];
        if (!empty($configOption)) {
            $params['options'] = [
                'sts_regional_endpoints' => $configOption
            ];
        }

        $data = $partition($params);
        $this->assertEquals($expectedEndpoint, $data['endpoint']);

    }

    public function stsEndpointTestCases()
    {
        return [
            [
                'us-west-2',
                'legacy',
                'https://sts.amazonaws.com'
            ],
            [
                'us-west-2',
                'regional',
                'https://sts.us-west-2.amazonaws.com'
            ],
            [
                'us-west-2',
                null,
                'https://sts.amazonaws.com'
            ],
            [
                'us-west-2-fips',
                'legacy',
                'https://sts-fips.us-west-2.amazonaws.com'
            ],
            [
                'us-west-2-fips',
                'regional',
                'https://sts-fips.us-west-2.amazonaws.com'
            ],
            [
                'us-west-2-fips',
                null,
                'https://sts-fips.us-west-2.amazonaws.com'
            ],
            [
                'ap-east-1',
                'legacy',
                'https://sts.ap-east-1.amazonaws.com'
            ],
            [
                'ap-east-1',
                'regional',
                'https://sts.ap-east-1.amazonaws.com'
            ],
            [
                'ap-east-1',
                null,
                'https://sts.ap-east-1.amazonaws.com'
            ],
            [
                'aws-global',
                'legacy',
                'https://sts.amazonaws.com'
            ],
            [
                'aws-global',
                'regional',
                'https://sts.amazonaws.com'
            ],
            [
                'aws-global',
                null,
                'https://sts.amazonaws.com'
            ],
        ];
    }

    /**
     * @dataProvider s3EndpointTestCases
     *
     * @param $region
     * @param $configOption
     * @param $expectedEndpoint
     */
    public function testResolvesS3RegionalEndpoint(
        $region,
        $configOption,
        $expectedEndpoint
    ) {
        $data = json_decode(
            file_get_contents(__DIR__ . '/fixtures/s3_us_east_1_regional_endpoint.json'),
            true
        );
        $partition = new Partition($data['partitions'][0]);

        $params = [
            'service' => 's3',
            'region' => $region
        ];
        if (!empty($configOption)) {
            $params['options'] = [
                's3_us_east_1_regional_endpoint' => $configOption
            ];
        }

        $data = $partition($params);
        $this->assertEquals($expectedEndpoint, $data['endpoint']);

    }

    public function s3EndpointTestCases()
    {
        return [
            [
                'us-west-2',
                'legacy',
                'https://s3.us-west-2.amazonaws.com'
            ],
            [
                'us-west-2',
                'regional',
                'https://s3.us-west-2.amazonaws.com'
            ],
            [
                'us-west-2',
                null,
                'https://s3.us-west-2.amazonaws.com'
            ],
            [
                'us-east-1',
                'legacy',
                'https://s3.amazonaws.com'
            ],
            [
                'us-east-1',
                'regional',
                'https://s3.us-east-1.amazonaws.com'
            ],
            [
                'us-east-1',
                null,
                'https://s3.amazonaws.com'
            ],
            [
                'aws-global',
                'legacy',
                'https://s3.amazonaws.com'
            ],
            [
                'aws-global',
                'regional',
                'https://s3.amazonaws.com'
            ],
            [
                'aws-global',
                null,
                'https://s3.amazonaws.com'
            ],
        ];
    }
}
