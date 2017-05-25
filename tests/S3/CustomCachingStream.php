<?php

namespace Aws\Test\S3;

use GuzzleHttp\Psr7\Stream;

/**
 * Test Dummy for StreamWrapperTest to test seekable_handler
 *
 * @see \Aws\Test\S3\StreamWrapperTest::testOpensCustomSeekableReadStream
 * @see \Aws\Test\S3\StreamWrapperTest::testOpensSeekableReadStreamHandlerNotCallable
 * @see \Aws\Test\S3\StreamWrapperTest::testOpensSeekableReadStreamHandlerReturnInvalidStream
 */
class CustomCachingStream extends Stream
{
}
