<?php
namespace Aws\Test\Arn\S3;

use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\S3\RegionalBucketArn;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Arn\S3\RegionalBucketArn
 */
class RegionalBucketArnTest extends TestCase
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
        $arn = new RegionalBucketArn($string);
        $this->assertEquals($expected, $arn->toArray());
        $this->assertEquals($expected['arn'], $arn->getPrefix());
        $this->assertEquals($expected['partition'], $arn->getPartition());
        $this->assertEquals($expected['service'], $arn->getService());
        $this->assertEquals($expected['region'], $arn->getRegion());
        $this->assertEquals($expected['account_id'], $arn->getAccountId());
        $this->assertEquals($expected['resource'], $arn->getResource());
        $this->assertEquals($expected['resource_id'], $arn->getResourceId());
        $this->assertEquals($expected['resource_type'], $arn->getResourceType());
        $this->assertEquals($expected['bucket_name'], $arn->getBucketName());
        $this->assertEquals($expectedString, (string) $arn);
    }

    public function parsedArnProvider()
    {
        return [
            [

            ]
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
            $arn = new RegionalBucketArn($string);
            $this->fail('This was expected to fail with: ' . $expected->getMessage());
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof $expected);
            $this->assertEquals(
                $expected->getMessage(),
                $e->getMessage()
            );
        }
    }

    public function badArnProvider()
    {
        return [
            [

            ],
        ];
    }
}
