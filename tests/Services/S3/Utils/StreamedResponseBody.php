<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Services\S3\Utils;

use Smithy\Async\RevoltEventLoop;
use Smithy\Http\Message\StreamingResponseStream;

/**
 * Build non-seekable response bodies like the ones the curl transport
 * streams for chunked or large responses.
 */
final class StreamedResponseBody
{
    /**
     * Create a streamed body that already holds all of `$content`.
     */
    public static function of(string $content): StreamingResponseStream
    {
        $body = self::open();
        foreach (\str_split($content, 64) as $chunk) {
            $body->append($chunk);
        }
        $body->end();

        return $body;
    }

    /**
     * Create a streamed body whose transfer failed with `$failure`.
     */
    public static function failed(\Throwable $failure): StreamingResponseStream
    {
        $body = self::open();
        $body->fail($failure);

        return $body;
    }

    private static function open(): StreamingResponseStream
    {
        return new StreamingResponseStream(
            new RevoltEventLoop(),
            1048576,
            static function (): void {},
            static function (): void {}
        );
    }
}
