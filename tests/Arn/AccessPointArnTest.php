<?php
namespace Aws\Test\Arn;

use Aws\Arn\AccessPointArn;
use Aws\Arn\Exception\InvalidArnException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\AccessPointArn
 */
class AccessPointArnTest extends TestCase
{
    /**
     * @dataProvider parsedArnProvider
     *
     * @param $string
     * @param $expected
     */
    public function testParsesArnString($string, $expected, $expectedString)
    {
        $arn = new AccessPointArn($string);
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
                'arn:bar:baz::com:po:nents',
                "The 4th component of an access point ARN represents the region and"
                . " must not be empty.",
            ],
            [
                'arn:bar:baz:seven::po:nents',
                "The 5th component of an access point ARN represents the account ID"
                . " and must not be empty.",
            ],
            [
                'arn:bar:baz:seven:com:po:nents',
                "The 6th component of an access point ARN represents the resource"
                . " type and must be 'accesspoint'.",
            ],
            [
                'arn:bar:baz:seven:com:accesspoint:',
                "The 7th component of an access point ARN represents the resource"
                . " ID and must not be empty.",
            ],
        ];
    }
}
