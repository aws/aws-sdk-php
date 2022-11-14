<?php
namespace Aws\Test\EventBridge;

use Aws\CommandInterface;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Result;
use Aws\EventBridge\EventBridgeClient;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class EventBridgeClientTest extends TestCase
{
    use UsesServiceTrait;

    public function putEventsEndpointSuccessProvider()
    {

        return [
            [
                "us-east-1",
                [],
                'abc123.456def',
                'https://abc123.456def.endpoint.events.amazonaws.com',
                ['x-amz-region-set' => '*'],
            ],
            [
                "us-east-1",
                ['use_dual_stack_endpoint' => true],
                null,
                'https://events.us-east-1.api.aws',
                null,
            ],
            [
                "us-east-1",
                ['use_fips_endpoint' => true],
                null,
                'https://events-fips.us-east-1.amazonaws.com',
                null,
            ],
            [
                "us-east-1",
                ['use_dual_stack_endpoint' => true, 'use_fips_endpoint' => true],
                null,
                'https://events-fips.us-east-1.api.aws',
                null,
            ],
            [
                "us-iso-east-1",
                [],
                null,
                'https://events.us-iso-east-1.c2s.ic.gov',
                null,
            ],
            [
                "us-iso-east-1",
                [], 'abc123.456def',
                'https://abc123.456def.endpoint.events.c2s.ic.gov',
                ['x-amz-region-set' => '*'],
            ],
            [
                "us-east-1",
                ['endpoint' => 'https://example.org'],
                null,
                'https://example.org',
                null,
            ],
            [
                "us-east-1",
                ['endpoint' => 'https://example.org'],
                'abc123.456def',
                'https://example.org',
                ['x-amz-region-set' => '*'],
            ],
        ];
    }

    /**
     * @dataProvider putEventsEndpointSuccessProvider
     *
     * @param $clientRegion
     * @param $additionalConfig
     * @param $endpointId
     * @param $expectedEndpoint
     * @param $additionalHeaders
     */
    public function testPutEventsEndpointSuccessCases(
        $clientRegion,
        $additionalConfig,
        $endpointId,
        $expectedEndpoint,
        $additionalHeaders
    )
    {
        //these tests require the CRT
        $isCrtAvailable = extension_loaded('awscrt');
        if (!$isCrtAvailable && !empty($endpointId)) {
            $this->markTestSkipped();
        }

        $clientConfig = [
            'region' => $clientRegion,
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $req)
            use ($expectedEndpoint, $additionalHeaders) {
                $this->assertSame(
                    $expectedEndpoint,
                    (string) $req->getUri()
                );
                if (!empty($additionalHeaders)) {
                    foreach ($additionalHeaders as $header => $value) {
                        self::assertSame($req->getHeaderLine($header), $value);
                    }
                }
                return new Result([]);
            },
        ];
        $clientConfig += $additionalConfig;
        $client = new EventBridgeClient($clientConfig);
        $input = [
            'Entries' => [
                [
                    "Version"=> "0",
                    "Id"=> "89d1a02d-5ec7-412e-82f5-13505f849b41",
                    "DetailType"=> "Scheduled Event",
                    "Detail"=> '{"a":"b"}',
                    "Source"=> "test.events",
                    "Time"=> time(),
                    "Region"=> "us-east-1",
                    "Resources"=> ["arn:aws:events:us-east-1:123456789012:rule/SampleRule"],
                ]
            ]
        ];
        if (!empty($endpointId)) {
            $input['EndpointId'] = $endpointId;
        }
        $command = $client->getCommand('PutEvents', $input);
        $client->execute($command);
    }

    public function putEventsEndpointFailureProvider()
    {

        return [
            ["us-east-1", [], 'badactor.com?foo=bar', 'EndpointId must be a valid host label.'],
            ["us-east-1", ['use_fips_endpoint' => true], 'abc123.456def', 'Invalid Configuration: FIPS is not supported with EventBridge multi-region endpoints.'],
            ["us-east-1", ['use_dualstack_endpoint' => true, 'use_fips_endpoint' => true], 'abc123.456def', 'Invalid Configuration: FIPS is not supported with EventBridge multi-region endpoints.'],
        ];
    }

    /**
     * @dataProvider putEventsEndpointFailureProvider
     *
     * @param $clientRegion
     * @param $additionalConfig
     * @param $endpointId
     * @param $expectedException
     */
    public function testPutEventsEndpointFailureCases(
        $clientRegion,
        $additionalConfig,
        $endpointId,
        $expectedException
    )
    {
        $clientConfig = [
            'region' => $clientRegion,
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $req) {
                return new Result([]);
            },
        ];
        $clientConfig += $additionalConfig;
        $client = new EventBridgeClient($clientConfig);
        $input = [
            'Entries' => [
                [
                    "Version"=> "0",
                    "Id"=> "89d1a02d-5ec7-412e-82f5-13505f849b41",
                    "DetailType"=> "Scheduled Event",
                    "Detail"=> '{"a":"b"}',
                    "Source"=> "test.events",
                    "Time"=> time(),
                    "Region"=> "us-east-1",
                    "Resources"=> ["arn:aws:events:us-east-1:123456789012:rule/SampleRule"],
                ]
            ]
        ];
        if (isset($endpointId)) {
            $input['EndpointId'] = $endpointId;
        }
        $command = $client->getCommand('PutEvents', $input);
        try {
            $client->execute($command);
            self::fail("this test should have thrown an exception");
        } catch (\Exception $exception) {
            self::assertSame("Aws\Exception\UnresolvedEndpointException", get_class($exception));
            self::assertStringContainsString($expectedException, $exception->getMessage());
        }
    }
}