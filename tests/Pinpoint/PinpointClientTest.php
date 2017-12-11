<?php
namespace Aws\Test\Pinpoint;

use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

class PinpointClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testVerifyGetEndpoint()
    {
        $client = $this->getTestClient('Pinpoint', [
            'region'      => 'us-west-2',
        ]);
        $this->assertInstanceOf('GuzzleHttp\\Psr7\\Uri', $client->getEndpoint());
    }

    /**
     * @dataProvider getPinpointAliasOperations
     */
    public function testVerifyPinpointOperationAlias($operation, $params)
    {
        $client = $this->getTestClient('Pinpoint', [
            'region'      => 'us-west-2',
        ]);
        $this->verifyOperationAlias($client, $operation, $params);
    }

    public function getPinpointAliasOperations()
    {
        return [
            [
                'GetUserEndpoint',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                ],
            ],
            [
                'GetEndpointAsync',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                ],
            ],
            [
                'GetUserEndpointAsync',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                ],
            ],
            [
                'UpdateEndpoint',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointRequest' => [],
                ],
            ],
            [
                'UpdateUserEndpoint',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointRequest' => [],
                ],
            ],
            [
                'UpdateEndpointAsync',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointRequest' => [],
                ],
            ],
            [
                'UpdateUserEndpointAsync',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointRequest' => [],
                ],
            ],
            [
                'UpdateEndpointsBatch',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointBatchRequest' => [],
                ],
            ],
            [
                'UpdateUserEndpointsBatch',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointBatchRequest' => [],
                ],
            ],
            [
                'UpdateEndpointsBatchAsync',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointBatchRequest' => [],
                ],
            ],
            [
                'UpdateUserEndpointsBatchAsync',
                [
                    'ApplicationId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointId' => '11111111-2222-3333-4444-555555555555',
                    'EndpointBatchRequest' => [],
                ],
            ],
        ];
    }
}