<?php
namespace Aws\Test;

use Aws\AwsClient;
use Aws\Command;
use Aws\Api\Service;
use Aws\Middleware;
use Aws\MockHandler;
use Aws\Result;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\QueryCompatibleInputMiddleware
 */
class QueryCompatibleInputMiddlewareTest extends TestCase
{
    /**
     * @dataProvider getInputs()
     *
     * @param $inputParam
     * @param $inputValue
     * @param $expected
     * @param $type
     */
    public function testEmitsWarning($inputParam, $inputValue, $expected, $type)
    {
        $this->expectWarning();
        $this->expectWarningMessage(
            "The provided type for `${inputParam}` value was `"
            . (gettype($inputValue) === 'double' ? 'float' : gettype($inputValue))
            . "`. The modeled type is `{$type}`."
        );
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            'FooOperation',
            [$inputParam => $inputValue]
        );
        $client->execute($command);
    }

    /**
     * @dataProvider getInputs()
     *
     * @param $inputParam
     * @param $inputValue
     * @param $expected
     */
    public function testAppliesMiddlewareAndCastsValues($inputParam, $inputValue, $expected)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            'FooOperation',
            [$inputParam => $inputValue]
        );
        $command->getHandlerList()->appendValidate(Middleware::tap(
                function (Command $command) use ($inputParam, $expected) {
                    $this->assertSame($expected, $command[$inputParam]);
                }
            )
        );
        $result = @$client->execute($command);
    }

    /**
     * Data provider for providing top-level command arguments
     *
     * @return array
     */
    public function getInputs()
    {
        return [
            ['IntParam', '10', 10, 'integer'],
            ['LongParam', '1000000000000000000000000', 1.0E+24, 'long'],
            ['FloatParam', '10.0', 10.0, 'float'],
            ['StringParam', 1234, '1234', 'string'],
            ['StringParam', 15.5, '15.5', 'string'],
            ['StringParam', 1000000000000000000000000, '1.0E+24', 'string']
        ];
    }

    public function testCastsNestedValues()
    {
        $input = [
            'MapParam' => [
                'Key1' => [
                    'DataType' => 123,
                    'StringValue' => 456
                ]
            ],
            'StructureParam' => [
                'NestedParam1' => 5.5,
                'NestedParam2' => '98765'
            ],
            'ListParam' => [
                [
                    'NestedParam1' => '10',
                    'NestedParam2' => 20
                ]
            ]
        ];

        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            'FooOperation',
            $input
        );

        $command->getHandlerList()->prependBuild(Middleware::tap(function (Command $command) {
            $this->assertIsString($command['MapParam']['Key1']['DataType']);
            $this->assertEquals('123', $command['MapParam']['Key1']['DataType']);

            $this->assertIsString($command['MapParam']['Key1']['StringValue']);
            $this->assertEquals('456', $command['MapParam']['Key1']['StringValue']);

            $this->assertIsString($command['StructureParam']['NestedParam1']);
            $this->assertEquals('5.5', $command['StructureParam']['NestedParam1']);

            $this->assertIsInt($command['StructureParam']['NestedParam2']);
            $this->assertEquals(98765, $command['StructureParam']['NestedParam2']);

            $this->assertIsInt($command['ListParam'][0]['NestedParam1']);
            $this->assertEquals(10, $command['ListParam'][0]['NestedParam1']);

            $this->assertIsString($command['ListParam'][0]['NestedParam2']);
            $this->assertEquals('20', $command['ListParam'][0]['NestedParam2']);
        }));

        @$client->execute($command);
    }

    public function testMiddlewareAppliedForQueryCompatClients()
    {
        $client = $this->generateTestClient($this->generateTestService());
        $list = $client->getHandlerList();
        $this->assertStringContainsString('query-compatible-input', $list->__toString());
    }

    public function testMiddlewareNotAppliedForNonQueryCompatClients()
    {
        $client = $this->generateTestClient($this->generateTestService(false));
        $list = $client->getHandlerList();
        $this->assertStringNotContainsString('query-compatible-input', $list->__toString());
    }

    private function generateTestClient(Service $service, $args = [])
    {
        return new AwsClient(
            array_merge(
                [
                    'service'      => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region'       => 'us-east-1',
                    'version'      => 'latest',
                    'handler' => new MockHandler([new Result([])])
                ],
                $args
            )
        );
    }

    private function generateTestService($queryCompatible = true)
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => "json",
                    "apiVersion" => "2014-01-01",
                    "jsonVersion" => "1.1",
                    "awsQueryCompatible" => $queryCompatible ? [] : null
                ],
                'operations' => [
                    'FooOperation' => [
                        'http' => [
                            'requestUri' => '/',
                            'httpMethod' => 'POST'
                        ],
                        'input' => [
                            'type' => 'structure',
                            'members' => [
                                'StringParam' => [
                                    'type' => 'string',
                                ],
                                'IntParam' => [
                                    'type' => 'integer',
                                ],
                                'LongParam' => [
                                    'type' => 'long',
                                ],
                                'FloatParam' => [
                                    'type' => 'float',
                                ],
                                'MapParam' => [
                                    'type' => 'map',
                                    'key' => [
                                        'type' => 'string'
                                    ],
                                    'value' => [
                                        'type' => 'structure',
                                        'members' => [
                                            'DataType' => [
                                                'type' => 'string',
                                            ],
                                            'StringValue' => [
                                                'type' => 'string',
                                            ]
                                        ]
                                    ]
                                ],
                                'StructureParam' => [
                                    'type' => 'structure',
                                    'members' => [
                                        'NestedParam1' => [
                                            'type' => 'string',
                                        ],
                                        'NestedParam2' => [
                                            'type' => 'long',
                                        ]
                                    ]
                                ],
                                'ListParam' => [
                                    'type' => 'list',
                                    'member' => [
                                        'type' => 'structure',
                                        'members' => [
                                            'NestedParam1' => [
                                                'type' => 'integer'
                                            ],
                                            'NestedParam2' => [
                                                'type' => 'string'
                                            ]
                                        ]
                                    ],
                                ]
                            ]
                        ]
                    ],
                ]
            ],
            function () { return []; }
        );
    }
}
