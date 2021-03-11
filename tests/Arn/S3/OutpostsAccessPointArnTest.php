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
        $this->assertEquals($expected['accesspoint_name'], $arn->getAccesspointName());
        $this->assertEquals($expectedString, (string) $arn);
    }

    public function parsedArnProvider()
    {
        return [
            // Colon delimiters
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
                    'accesspoint_name' => 'myaccesspoint',
                ],
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
            ],
            // Slash delimiters
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/myaccesspoint',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'outpost',
                    'resource_id' => 'op-01234567890123456/accesspoint/myaccesspoint',
                    'resource' => 'outpost/op-01234567890123456/accesspoint/myaccesspoint',
                    'outpost_id' => 'op-01234567890123456',
                    'accesspoint_type' => 'accesspoint',
                    'accesspoint_name' => 'myaccesspoint',
                ],
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/myaccesspoint',
            ],
            // Mixed colon and slash delimiters
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456:accesspoint/myaccesspoint',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'outpost',
                    'resource_id' => 'op-01234567890123456:accesspoint/myaccesspoint',
                    'resource' => 'outpost/op-01234567890123456:accesspoint/myaccesspoint',
                    'outpost_id' => 'op-01234567890123456',
                    'accesspoint_type' => 'accesspoint',
                    'accesspoint_name' => 'myaccesspoint',
                ],
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456:accesspoint/myaccesspoint',
            ],
            // Minimum inputs
            [
                'arn:aws:s3-outposts:us-west-2:1:outpost:a:accesspoint:b',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '1',
                    'resource_type' => 'outpost',
                    'resource_id' => 'a:accesspoint:b',
                    'resource' => 'outpost:a:accesspoint:b',
                    'outpost_id' => 'a',
                    'accesspoint_type' => 'accesspoint',
                    'accesspoint_name' => 'b',
                ],
                'arn:aws:s3-outposts:us-west-2:1:outpost:a:accesspoint:b',
            ],
        ];
    }

    /**
     * @dataProvider badArnProvider
     *
     * @param $string
     * @param \Exception $expected
     */
    public function testThrowsForBadArn($string, \Exception $expected)
    {
        try {
            $arn = new OutpostsAccessPointArn($string);
            $this->fail('This was expected to fail with: ' . $expected->getMessage());
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof $expected);
            $this->assertSame(
                $expected->getMessage(),
                $e->getMessage()
            );
        }
    }

    public function badArnProvider()
    {
        return [
            [
                'arn:aws:s3:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                new InvalidArnException("The 3rd component of an S3 Outposts"
                    . " access point ARN represents the service and must be"
                    . " 's3-outposts'.")
            ],
            [
                'arn:aws:s3-outposts::123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                new InvalidArnException("The 4th component of a S3 Outposts"
                    . " access point ARN represents the region and must not be empty.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:invalid!!:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                new InvalidArnException("The 5th component of a S3 Outposts"
                    . " access point ARN is required, represents the account ID, and"
                    . " must be a valid host label.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:notoutpost:op-01234567890123456:accesspoint:myaccesspoint',
                new InvalidArnException("The 6th component of an S3 Outposts"
                    . " access point ARN represents the resource type and must be"
                    . " 'outpost'.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:invalid,:accesspoint:myaccesspoint',
                new InvalidArnException("The 7th component of an S3 Outposts"
                    . " access point ARN is required, represents the outpost ID, and"
                    . " must be a valid host label.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:notaccesspoint:myaccesspoint',
                new InvalidArnException("The 8th component of an S3 Outposts"
                    . " access point ARN must be 'accesspoint'")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:..invalid',
                new InvalidArnException("The 9th component of an S3 Outposts"
                    . " access point ARN is required, represents the accesspoint name,"
                    . " and must be a valid host label.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:accesspoint:extra:components',
                new InvalidArnException("An S3 Outposts access point ARN"
                    . " should only have 9 components, delimited by the characters"
                    . " ':' and '/'. 'extra:components' was found after the 9th"
                    . " component.")
            ],
        ];
    }
}
