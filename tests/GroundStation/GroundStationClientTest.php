<?php
namespace Aws\Test\GroundStation;

use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

class GroundStationClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testVerifyGetConfig()
    {
        $client = $this->getTestClient('GroundStation', [
            'region'      => 'us-west-2',
        ]);
        $this->assertInternalType('array', $client->getConfig());
    }

    /**
     * @dataProvider getGroundStationAliasOperations
     */
    public function testVerifyCloudHsmOperationAlias($operation, $params)
    {
        $client = $this->getTestClient('GroundStation', [
            'region'      => 'us-west-2',
        ]);
        $this->verifyOperationAlias($client, $operation, $params);
    }

    public function getGroundStationAliasOperations()
    {
        return [
            [
                'GetMissionProfileConfig',
                [
                    'configId' => 'foo',
                    'configType' => 'bar'
                ],
            ],
            [
                'GetConfigAsync',
                [
                    'configId' => 'foo',
                    'configType' => 'bar'
                ],
            ],
            [
                'GetMissionProfileConfigAsync',
                [
                    'configId' => 'foo',
                    'configType' => 'bar'
                ],
            ],
        ];
    }
}