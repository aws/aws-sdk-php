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
        $this->assertEquals($expectedString, (string) $arn);
    }

    public function parsedArnProvider()
    {
        return [
            // All components
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource_type' => 'accesspoint',
                    'resource_id' => 'myendpoint',
                    'resource' => 'accesspoint:myendpoint',
                ],
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            ],
            // Alternate partition
            [
                'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                [
                    'arn' => 'arn',
                    'partition' => 'aws-cn',
                    'service' => 's3',
                    'region' => 'cn-north-1',
                    'account_id' => 123456789012,
                    'resource_type' => 'accesspoint',
                    'resource_id' => 'myendpoint',
                    'resource' => 'accesspoint:myendpoint',
                ],
                'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            ],
        ];
    }
}
