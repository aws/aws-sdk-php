<?php
namespace Aws\Test\Arn\S3;

use Aws\Arn\S3\AccessPointArn;
use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\S3\OutpostsAccessPointArn;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\S3\OutpostsAccessPointArn
 */
class OutpostsAccessPointArnTest extends TestCase
{
    /**
     * @dataProvider parsedArnProvider
     *
     * @param $string
     * @param $expected
     * @param $expectedString
     */
    public function testParsesArnString($string, $expected, $expectedString)
    {
        $arn = new OutpostsAccessPointArn($string);
        $this->assertEquals($expected, $arn->toArray());
        $this->assertEquals($expected['arn'], $arn->getPrefix());
        $this->assertEquals($expected['partition'], $arn->getPartition());
        $this->assertEquals($expected['service'], $arn->getService());
        $this->assertEquals($expected['region'], $arn->getRegion());
        $this->assertEquals($expected['account_id'], $arn->getAccountId());
        $this->assertEquals($expected['resource'], $arn->getResource());
        $this->assertEquals($expected['resource_id'], $arn->getResourceId());
        $this->assertEquals($expected['resource_type'], $arn->getResourceType());
        $this->assertEquals($expected['outpost_id'], $arn->getOutpostId());
        $this->assertEquals($expected['accesspoint_id'], $arn->getAccesspointId());
        $this->assertEquals($expectedString, (string) $arn);
    }

    public function parsedArnProvider()
    {
        return [

            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'outpost',
                    'resource_id' => 'op-01234567890123456:accesspoint:myaccesspoint',
                    'resource' => 'outpost:op-01234567890123456:accesspoint:myaccesspoint',
                    'outpost_id' => 'op-01234567890123456',
                    'accesspoint_type' => 'accesspoint',
                    'accesspoint_id' => 'myaccesspoint',
                ],
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
            ],
        ];
    }
}
