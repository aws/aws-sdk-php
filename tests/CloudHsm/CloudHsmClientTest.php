<?php
namespace Aws\Test\CloudHsm;

use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

class CloudHsmClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testVerifyGetConfig()
    {
        $client = $this->getTestClient('CloudHsm', [
            'region'      => 'us-west-2',
        ]);
        $this->assertInternalType('array', $client->getConfig());
    }

    /**
     * @dataProvider getCloudHsmAliasOperations
     */
    public function testVerifyCloudHsmOperationAlias($operation, $params)
    {
        $client = $this->getTestClient('CloudHsm', [
            'region'      => 'us-west-2',
        ]);
        $this->verifyOperationAlias($client, $operation, $params);
    }

    public function getCloudHsmAliasOperations()
    {
        return [
            [
                'GetConfigFiles',
                [
                    'ClientArn' => 'arn',
                    'ClientVersion' => '5.3',
                    'HapgList' => ['hapg1', 'hapg2'],
                ],
            ],
            [
                'GetConfigAsync',
                [
                    'ClientArn' => 'arn',
                    'ClientVersion' => '5.3',
                    'HapgList' => ['hapg1', 'hapg2'],
                ],
            ],
            [
                'GetConfigFilesAsync',
                [
                    'ClientArn' => 'arn',
                    'ClientVersion' => '5.3',
                    'HapgList' => ['hapg1', 'hapg2'],
                ],
            ],
        ];
    }
}