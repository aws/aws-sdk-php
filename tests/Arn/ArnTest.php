<?php
namespace Aws\Test\Arn;

use Aws\Arn\Arn;
use Aws\Arn\Exception\InvalidArnException;
use GuzzleHttp\Promise\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn
 */
class ArnTest extends TestCase
{

    /**
     * @dataProvider parsedArnProvider
     *
     * @param $string
     * @param $expected
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
        $this->assertEquals($expected['resource_type'], $arn->getResourceType());
        $this->assertEquals($expected['resource_id'], $arn->getResourceId());
        $this->assertEquals($expectedString, (string) $arn);
    }

    public function parsedArnProvider()
    {
        return [
            // All components
            [
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz_id',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'foo',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource_type' => 'bar_type',
                    'resource_id' => 'baz_id',
                ],
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz_id',
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
                    'resource_type' => null,
                    'resource_id' => 'baz_id',
                ],
                'arn:aws:foo:us-west-2:123456789012:baz_id',
            ],
            // Slash delimiter between resource type and ID
            [
                'arn:aws:foo:us-west-2:123456789012:bar_type/baz_id',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'foo',
                    'region' => 'us-west-2',
                    'account_id' => 123456789012,
                    'resource_type' => 'bar_type',
                    'resource_id' => 'baz_id',
                ],
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz_id',
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
                    'resource_type' => 'bar_type',
                    'resource_id' => 'baz_id:extra:comps',
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
                    'resource_type' => 'bar_type',
                    'resource_id' => 'baz_id:extra:comps',
                ],
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz_id:extra:comps',
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
                "The final (6th or 7th) component of an ARN represents the"
                . " resource ID and must not be empty.",
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
                "The final (6th or 7th) component of an ARN represents the"
                    . " resource ID and must not be empty."
            ],
        ];
    }
}
