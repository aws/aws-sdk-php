<?php
namespace Aws\Test\Arn;

use Aws\Arn\Arn;
use Aws\Arn\Exception\InvalidArnException;
use GuzzleHttp\Promise\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\Arn
 */
class ArnTest extends TestCase
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
        $arn = new Arn($string);
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
                    'resource' => 'accesspoint:myendpoint',
                ],
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            ],
            // All components, aws-cn
            [
                'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                [
                    'arn' => 'arn',
                    'partition' => 'aws-cn',
                    'service' => 's3',
                    'region' => 'cn-north-1',
                    'account_id' => 123456789012,
                    'resource' => 'accesspoint:myendpoint',
                ],
                'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            ],
            // All components, SNS
            [
                'arn:aws:sns:us-west-2:123456789012:myTopic',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'sns',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource' => 'myTopic',
                ],
                'arn:aws:sns:us-west-2:123456789012:myTopic',
            ],
            // 6 components
            [
                'arn:aws:foo:us-west-2:123456789012:baz_id',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'foo',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource' => 'baz_id',
                ],
                'arn:aws:foo:us-west-2:123456789012:baz_id',
            ],
            // More than 7 components
            [
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz_id:extra:comps',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'foo',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource' => 'bar_type:baz_id:extra:comps',
                ],
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz_id:extra:comps',
            ],
            // Slash delimiter and more than 7 components
            [
                'arn:aws:foo:us-west-2:123456789012:bar_type/baz_id:extra:comps',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'foo',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource' => 'bar_type/baz_id:extra:comps',
                ],
                'arn:aws:foo:us-west-2:123456789012:bar_type/baz_id:extra:comps',
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
            new Arn($string);
            $this->fail('This test should have thrown an InvalidArnException.');
        } catch (InvalidArnException $e) {
            $this->assertEquals($message, $e->getMessage());
        }
    }

    public function invalidArnCases()
    {
        return [
            [
                'arn',
                "The 2nd component of an ARN represents the partition and must"
                . " not be empty.",
            ],
            [
                'arn:five:com:po:nents',
                "The 6th component of an ARN represents the resource information"
                . " and must not be empty. Individual service ARNs may include"
                . " additional delimiters to further qualify resources.",
            ],
            [
                'foo:bar:baz:seven:com:po:nents',
                "The 1st component of an ARN must be 'arn'.",
            ],
            [
                'arn::baz:seven:com:po:nents',
                "The 2nd component of an ARN represents the partition and must"
                    . " not be empty.",
            ],
            [
                'arn:bar::seven:com:po:nents',
                "The 3rd component of an ARN represents the service and must not"
                    . " be empty.",
            ],
            [
                'arn:bar:baz:six:com:',
                "The 6th component of an ARN represents the resource information"
                    . " and must not be empty. Individual service ARNs may include"
                    . " additional delimiters to further qualify resources.",
            ],
        ];
    }
}
