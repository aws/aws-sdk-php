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
        ];
    }
}
