<?php
namespace Aws\Test\Arn\S3;

use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\S3\RegionalBucketArn;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\S3\RegionalBucketArn
 */
class RegionalBucketArnTest extends TestCase
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
        $arn = new RegionalBucketArn($string);
        $this->assertEquals($expected, $arn->toArray());
        $this->assertEquals($expected['arn'], $arn->getPrefix());
        $this->assertEquals($expected['partition'], $arn->getPartition());
        $this->assertEquals($expected['service'], $arn->getService());
        $this->assertEquals($expected['region'], $arn->getRegion());
        $this->assertEquals($expected['account_id'], $arn->getAccountId());
        $this->assertEquals($expected['resource'], $arn->getResource());
        $this->assertEquals($expected['resource_id'], $arn->getResourceId());
        $this->assertEquals($expected['resource_type'], $arn->getResourceType());
        $this->assertEquals($expected['bucket_name'], $arn->getBucketName());
        $this->assertEquals($expectedString, (string) $arn);
    }

    public function parsedArnProvider()
    {
        return [
            // Colon delimiters
            [
                'arn:aws:s3:us-west-2:123456789012:bucket:mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'bucket',
                    'resource_id' => 'mybucket',
                    'resource' => 'bucket:mybucket',
                    'bucket_name' => 'mybucket',
                ],
                'arn:aws:s3:us-west-2:123456789012:bucket:mybucket',
            ],
            // Slash delimiter
            [
                'arn:aws:s3:us-west-2:123456789012:bucket/mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'bucket',
                    'resource_id' => 'mybucket',
                    'resource' => 'bucket/mybucket',
                    'bucket_name' => 'mybucket',
                ],
                'arn:aws:s3:us-west-2:123456789012:bucket/mybucket',
            ],
            // Minimum inputs
            [
                'arn:aws:s3:us-west-2:1:bucket:b',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3',
                    'region' => 'us-west-2',
                    'account_id' => '1',
                    'resource_type' => 'bucket',
                    'resource_id' => 'b',
                    'resource' => 'bucket:b',
                    'bucket_name' => 'b',
                ],
                'arn:aws:s3:us-west-2:1:bucket:b',
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
            new RegionalBucketArn($string);
            $this->fail('This was expected to fail with: ' . $expected->getMessage());
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof $expected);
            $this->assertEquals(
                $expected->getMessage(),
                $e->getMessage()
            );
        }
    }

    public function badArnProvider()
    {
        return [
            [
                'arn:aws:someservice:us-west-2:123456789012:bucket:mybucket',
                new InvalidArnException("The 3rd component of an S3 bucket ARN"
                    . " represents the service and must be 's3'.")
            ],
            [
                'arn:aws:s3::123456789012:bucket:mybucket',
                new InvalidArnException("The 4th component of an S3 regional"
                    . " bucket ARN represents the region and must not be empty.")
            ],
            [
                'arn:aws:s3:us-west-2:*#$:bucket:mybucket',
                new InvalidArnException("The 5th component of an S3"
                    . " bucket ARN is required, represents the account ID, and"
                    . " must be a valid host label.")
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:someresource:mybucket',
                new InvalidArnException("The 6th component of an S3"
                    . " bucket ARN represents the resource type and must be"
                    . " 'bucket'.")
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:bucket:',
                new InvalidArnException("The 7th component of an S3"
                    . " bucket ARN represents the bucket name and must not be"
                    . " empty.")
            ],
        ];
    }
}
