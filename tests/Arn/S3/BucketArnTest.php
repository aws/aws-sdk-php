<?php
namespace Aws\Test\Arn\S3;

use Aws\Arn\S3\BucketArn;
use Aws\Arn\Exception\InvalidArnException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\S3\BucketArn
 */
class BucketArnTest extends TestCase
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
        $arn = new BucketArn($string);
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
                'arn:aws:s3:us-west-2:123456789012:bucket_name:mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 's3',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource_type' => 'bucket_name',
                    'resource_id' => 'mybucket',
                    'resource' => 'bucket_name:mybucket',
                ],
                'arn:aws:s3:us-west-2:123456789012:bucket_name:mybucket',
            ],
            // Alternate partition
            [
                'arn:aws-cn:s3:cn-north-1:123456789012:bucket_name:mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws-cn',
                    'service' => 's3',
                    'region' => 'cn-north-1',
                    'account_id' => 123456789012,
                    'resource_type' => 'bucket_name',
                    'resource_id' => 'mybucket',
                    'resource' => 'bucket_name:mybucket',
                ],
                'arn:aws-cn:s3:cn-north-1:123456789012:bucket_name:mybucket',
            ],
            // Slash delimiter
            [
                'arn:aws:foo:us-west-2:123456789012:bucket_name/mybucket',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'foo',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource_type' => 'bucket_name',
                    'resource_id' => 'mybucket',
                    'resource' => 'bucket_name/mybucket',
                ],
                'arn:aws:foo:us-west-2:123456789012:bucket_name:mybucket',
            ],
            // Slash delimiter, 9 components
            [
                'arn:aws:foo:us-west-2:123456789012:bucket_name/mybucket:more:cmps',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'foo',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource_type' => 'bucket_name',
                    'resource_id' => 'mybucket:more:cmps',
                    'resource' => 'bucket_name/mybucket:more:cmps',
                ],
                'arn:aws:foo:us-west-2:123456789012:bucket_name:mybucket:more:cmps',
            ],
        ];
    }

    /**
     * @dataProvider invalidArnCases
     *
     * @param $string
     * @param $message
     */
    public function testThrowsOnInvalidArn($string, $message)
    {
        try {
            new BucketArn($string);
            $this->fail('This test should have thrown an InvalidArnException.');
        } catch (InvalidArnException $e) {
            $this->assertEquals($message, $e->getMessage());
        }
    }

    public function invalidArnCases()
    {
        return [
            [
                'arn:bar:baz::com:po:nents',
                "The 4th component of a S3 bucket ARN represents the region and"
                . " must not be empty.",
            ],
            [
                'arn:bar:baz:seven::po:nents',
                "The 5th component of a S3 bucket ARN represents the account ID"
                . " and must not be empty.",
            ],
            [
                'arn:bar:baz:seven:com:po:nents',
                "The 6th component of a S3 bucket ARN represents the resource"
                . " type and must be 'bucket_name'.",
            ],
            [
                'arn:bar:baz:seven:com:bucket_name:',
                "The 7th component of a S3 bucket ARN represents the resource"
                . " ID and must not be empty.",
            ],
        ];
    }
}
