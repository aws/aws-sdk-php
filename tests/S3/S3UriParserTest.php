<?php
namespace Aws\Test\S3;

use Aws\S3\S3UriParser;

/**
 * @covers Aws\S3\S3UriParser
 */
class S3UriParserTest extends \PHPUnit_Framework_TestCase
{
    public function uriProvider()
    {
        return [
            ['http://s3.amazonaws.com', ['region' => null, 'bucket' => null, 'key' => null, 'path_style' => true]],
            ['http://s3.amazonaws.com/bar', ['region' => null, 'bucket' => 'bar', 'key' => null, 'path_style' => true]],
            ['http://s3.amazonaws.com/bar/', ['region' => null, 'bucket' => 'bar', 'key' => null, 'path_style' => true]],
            ['http://s3.amazonaws.com/bar/baz', ['region' => null, 'bucket' => 'bar', 'key' => 'baz', 'path_style' => true]],
            ['http://s3.amazonaws.com/bar/baz/', ['region' => null, 'bucket' => 'bar', 'key' => 'baz/', 'path_style' => true]],

            ['http://foo.s3.amazonaws.com', ['region' => null, 'bucket' => 'foo', 'key' => null, 'path_style' => false]],
            ['http://foo.s3.amazonaws.com/', ['region' => null, 'bucket' => 'foo', 'key' => null, 'path_style' => false]],
            ['http://foo.s3.amazonaws.com/bar', ['region' => null, 'bucket' => 'foo', 'key' => 'bar', 'path_style' => false]],
            ['http://foo.s3.amazonaws.com/bar/baz', ['region' => null, 'bucket' => 'foo', 'key' => 'bar/baz', 'path_style' => false]],
            ['http://foo.s3.amazonaws.com/bar/baz/', ['region' => null, 'bucket' => 'foo', 'key' => 'bar/baz/', 'path_style' => false]],

            ['http://foo.baz.s3.amazonaws.com', ['region' => null, 'bucket' => 'foo.baz', 'key' => null, 'path_style' => false]],
            ['http://foo.baz.s3.amazonaws.com/', ['region' => null, 'bucket' => 'foo.baz', 'key' => null, 'path_style' => false]],
            ['http://foo.baz.s3.amazonaws.com/bar', ['region' => null, 'bucket' => 'foo.baz', 'key' => 'bar', 'path_style' => false]],
            ['http://foo.baz.s3.amazonaws.com/bar/baz', ['region' => null, 'bucket' => 'foo.baz', 'key' => 'bar/baz', 'path_style' => false]],
            ['http://foo.baz.s3.amazonaws.com/bar/baz/', ['region' => null, 'bucket' => 'foo.baz', 'key' => 'bar/baz/', 'path_style' => false]],

            ['http://s3-us-west-2.amazonaws.com', ['region' => 'us-west-2', 'bucket' => null, 'key' => null, 'path_style' => true]],
            ['http://s3-us-west-2.amazonaws.com/', ['region' => 'us-west-2', 'bucket' => null, 'key' => null, 'path_style' => true]],
            ['http://s3-us-west-2.amazonaws.com/bar', ['region' => 'us-west-2', 'bucket' => 'bar', 'key' => null, 'path_style' => true]],
            ['http://s3-us-west-2.amazonaws.com/bar/', ['region' => 'us-west-2', 'bucket' => 'bar', 'key' => null, 'path_style' => true]],
            ['http://s3-us-west-2.amazonaws.com/bar/baz', ['region' => 'us-west-2', 'bucket' => 'bar', 'key' => 'baz', 'path_style' => true]],
            ['http://s3-us-west-2.amazonaws.com/bar/baz/', ['region' => 'us-west-2', 'bucket' => 'bar', 'key' => 'baz/', 'path_style' => true]],

            ['http://foo.s3-us-west-2.amazonaws.com', ['region' => 'us-west-2', 'bucket' => 'foo', 'key' => null, 'path_style' => false]],
            ['http://foo.s3-us-west-2.amazonaws.com/', ['region' => 'us-west-2', 'bucket' => 'foo', 'key' => null, 'path_style' => false]],
            ['http://foo.s3-us-west-2.amazonaws.com/bar', ['region' => 'us-west-2', 'bucket' => 'foo', 'key' => 'bar', 'path_style' => false]],
            ['http://foo.s3-us-west-2.amazonaws.com/bar/baz', ['region' => 'us-west-2', 'bucket' => 'foo', 'key' => 'bar/baz', 'path_style' => false]],
            ['http://foo.s3-us-west-2.amazonaws.com/bar/baz/', ['region' => 'us-west-2', 'bucket' => 'foo', 'key' => 'bar/baz/', 'path_style' => false]],

            ['http://foo.baz.s3-us-west-2.amazonaws.com', ['region' => 'us-west-2', 'bucket' => 'foo.baz', 'key' => null, 'path_style' => false]],
            ['http://foo.baz.s3-us-west-2.amazonaws.com/', ['region' => 'us-west-2', 'bucket' => 'foo.baz', 'key' => null, 'path_style' => false]],
            ['http://foo.baz.s3-us-west-2.amazonaws.com/bar', ['region' => 'us-west-2', 'bucket' => 'foo.baz', 'key' => 'bar', 'path_style' => false]],
            ['http://foo.baz.s3-us-west-2.amazonaws.com/bar/baz', ['region' => 'us-west-2', 'bucket' => 'foo.baz', 'key' => 'bar/baz', 'path_style' => false]],
            ['http://foo.baz.s3-us-west-2.amazonaws.com/bar/baz/', ['region' => 'us-west-2', 'bucket' => 'foo.baz', 'key' => 'bar/baz/', 'path_style' => false]],

            ['http://jarjar.binks.com/foo/bar', ['bucket' => 'foo', 'key' => 'bar', 'path_style' => true, 'region' => null]],
            ['http://jarjar.binks.com/foo/bar/baz', ['bucket' => 'foo', 'key' => 'bar/baz', 'path_style' => true, 'region' => null]],
            ['http://amazonaws.com/foo', ['bucket' => 'foo', 'key' => null, 'path_style' => true, 'region' => null]],

            ['s3://bar/baz/foo/', ['region' => null, 'bucket' => 'bar', 'key' => 'baz/foo/', 'path_style' => false]],
            ['s3://bar/baz/foo', ['region' => null, 'bucket' => 'bar', 'key' => 'baz/foo', 'path_style' => false]],
            ['s3://bar/baz/', ['region' => null, 'bucket' => 'bar', 'key' => 'baz/', 'path_style' => false]],
            ['s3://bar/baz', ['region' => null, 'bucket' => 'bar', 'key' => 'baz', 'path_style' => false]],
            ['s3://bar/', ['region' => null, 'bucket' => 'bar', 'key' => null, 'path_style' => false]],
            ['s3://bar', ['region' => null, 'bucket' => 'bar', 'key' => null, 'path_style' => false]],
            ['s3://', [], true],

            ['/foo/bar', [], true],
        ];
    }

    /**
     * @dataProvider uriProvider
     */
    public function testParsesUrls($uri, $result, $isError = false)
    {
        ksort($result);

        try {
            $actual = (new S3UriParser())->parse($uri);
            ksort($actual);
            $this->assertSame($result, $actual);
        } catch (\InvalidArgumentException $e) {
            if (!$isError) {
                throw $e;
            }
        }
    }
}
