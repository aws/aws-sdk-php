<?php
namespace Aws\Test\Arn;

use Aws\Arn\Arn;
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
    public function testParsesArnString($string, $expected)
    {
        $arn = new Arn($string);
        $this->assertEquals($expected, $arn->toArray());
    }

    public function parsedArnProvider()
    {
        return [
            [
                'arn:aws:rds:us-east-2:123456789012:secgrp:my-public',
                [
                    'arn' => 'arn',
                    'partition' => 'aws',
                    'service' => 'rds',
                    'region' => 'us-east-2',
                    'account_id' => 123456789012,
                    'resource_type' => 'secgrp',
                    'resource_id' => 'my-public',
                ],
            ],
        ];
    }
}
