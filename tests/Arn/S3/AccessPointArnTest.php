<?php
namespace Aws\Test\Arn\S3;

use Aws\Arn\S3\AccessPointArn;
use Aws\Arn\Exception\InvalidArnException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\S3\AccessPointArn
 */
class AccessPointArnTest extends TestCase
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
            new AccessPointArn($string);
            $this->fail('This test should have thrown an InvalidArnException.');
        } catch (InvalidArnException $e) {
            $this->assertEquals($message, $e->getMessage());
        }
    }

    public function invalidArnCases()
    {
        return [
            [
                'arn:bar:baz:seven:com:accesspoint:resource-id',
                "The 3rd component of an S3 access point ARN represents the"
                    . " region and must be 's3'.",
            ],
        ];
    }
}
