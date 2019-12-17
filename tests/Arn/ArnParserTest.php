<?php
namespace Aws\Test\Arn;

use Aws\Arn\AccessPointArn;
use Aws\Arn\Arn;
use Aws\Arn\ArnParser;
use Aws\Arn\S3\AccessPointArn as S3AccessPointArn;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\ArnParser
 */
class ArnParserTest extends TestCase
{

    /**
     * @dataProvider isArnCases
     *
     * @param $string
     * @param $expected
     */
    public function testDeterminesShouldAttemptToParseAsArn($string, $expected)
    {
        $this->assertEquals($expected, ArnParser::isArn($string));
    }

    public function isArnCases()
    {
        return [
            [
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz_id',
                true
            ],
            [
                'arn:',
                true
            ],
            [
                'arn',
                false
            ],
            [
                'barn:aws:foo:us-west-2:123456789012:bar_type:baz_id',
                false
            ],
            [
                '',
                false
            ],
            [
                null,
                false
            ]
        ];
    }

    /**
     * @dataProvider parsedArnCases
     *
     * @param $string
     * @param $expected
     */
    public function testCorrectlyChoosesArnClass($string, $expected)
    {
        $this->assertTrue(ArnParser::parse($string) instanceof $expected);
    }

    public function parsedArnCases()
    {
        return [
            [
                'arn:aws:foo:us-west-2:123456789012:bar_type:baz-id',
                Arn::class
            ],
            [
                'arn:aws:foo:us-west-2:123456789012:accesspoint:baz-id',
                AccessPointArn::class
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:baz-id',
                S3AccessPointArn::class
            ],
            [
                'arn:aws:foo:us-west-2:123456789012:bucket_name:baz-id',
                Arn::class
            ],
        ];
    }
}
