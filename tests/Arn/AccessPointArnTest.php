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
