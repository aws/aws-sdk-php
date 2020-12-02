<?php
namespace Aws\Test\Arn\S3;

use Aws\Arn\S3\AccessPointArn;
use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\S3\OutpostsAccessPointArn;
use Aws\Arn\S3\OutpostsBucketArn;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\S3\OutpostsBucketArn
 */
class OutpostsBucketArnTest extends TestCase
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
        $arn = new OutpostsBucketArn($string);
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
        $this->assertEquals($expected['bucket_name'], $arn->getBucketName());
        $this->assertEquals($expectedString, (string) $arn);
    }

    public function parsedArnProvider()
    {
        return [
            // Colon delimiters
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'outpost',
                    'resource_id' => 'op-01234567890123456:bucket:mybucket',
                    'resource' => 'outpost:op-01234567890123456:bucket:mybucket',
                    'outpost_id' => 'op-01234567890123456',
                    'bucket_name' => 'mybucket',
                    'bucket_label' => 'bucket'
                ],
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket',
            ],
            // Slash delimiters
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/bucket/mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'outpost',
                    'resource_id' => 'op-01234567890123456/bucket/mybucket',
                    'resource' => 'outpost/op-01234567890123456/bucket/mybucket',
                    'outpost_id' => 'op-01234567890123456',
                    'bucket_name' => 'mybucket',
                    'bucket_label' => 'bucket'
                ],
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/bucket/mybucket',
            ],
            // Mixed colon & slash delimiters
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456:bucket/mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '123456789012',
                    'resource_type' => 'outpost',
                    'resource_id' => 'op-01234567890123456:bucket/mybucket',
                    'resource' => 'outpost/op-01234567890123456:bucket/mybucket',
                    'outpost_id' => 'op-01234567890123456',
                    'bucket_name' => 'mybucket',
                    'bucket_label' => 'bucket'
                ],
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456:bucket/mybucket',
            ],
            // Minimum inputs
            [
                'arn:aws:s3-outposts:us-west-2:1:outpost:2:bucket:3',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3-outposts',
                    'region' => 'us-west-2',
                    'account_id' => '1',
                    'resource_type' => 'outpost',
                    'resource_id' => '2:bucket:3',
                    'resource' => 'outpost:2:bucket:3',
                    'outpost_id' => '2',
                    'bucket_name' => '3',
                    'bucket_label' => 'bucket'
                ],
                'arn:aws:s3-outposts:us-west-2:1:outpost:2:bucket:3',
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
            $arn = new OutpostsBucketArn($string);
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
                'arn:aws:s3:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket',
                new InvalidArnException("The 3rd component of an S3 Outposts"
                    . " bucket ARN represents the service and must be 's3-outposts'.")
            ],
            [
                'arn:aws:s3-outposts::123456789012:outpost:op-01234567890123456:bucket:mybucket',
                new InvalidArnException("The 4th component of a S3 Outposts"
                . " bucket ARN represents the region and must not be empty.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:%$#:outpost:op-01234567890123456:bucket:mybucket',
                new InvalidArnException("The 5th component of a S3 Outposts"
                    . " bucket ARN is required, represents the account ID, and"
                    . " must be a valid host label.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:someresource:op-01234567890123456:bucket:mybucket',
                new InvalidArnException("The 6th component of an S3 Outposts"
                    . " bucket ARN represents the resource type and must be"
                    . " 'outpost'.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:!!!:bucket:mybucket',
                new InvalidArnException("The 7th component of an S3 Outposts"
                    . " bucket ARN is required, represents the outpost ID, and"
                    . " must be a valid host label.")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:foo:mybucket',
                new InvalidArnException("The 8th component of an S3 Outposts"
                    . " bucket ARN must be 'bucket'")
            ],
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:',
                new InvalidArnException("The 9th component of an S3 Outposts"
                    . " bucket ARN represents the bucket name and must not be empty.")
            ],
        ];
    }
}
