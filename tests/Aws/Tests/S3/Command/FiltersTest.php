<?php

namespace Aws\Tests\S3\Command;

use Aws\S3\Command\Filters;

/**
 * @covers Aws\S3\Command\Filters
 */
class FiltersTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testPrependsAmzMetadata()
    {
        $this->assertEquals(array(
            'x-amz-meta-foo' => '123',
            'x-amz-meta-baz' => '456',
            'x-amz-meta-bar' => '789',
            'x-amz-meta-1'   => 'number'
        ), Filters::prependAmzMeta(array(
            'foo'            => '123',
            'x-amz-meta-baz' => '456',
            'bar'            => '789',
            1                => 'number'
        )));
    }
}
