<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Config;

/**
 * Report a shared config or credentials file that cannot be parsed.
 *
 * The message names the file and the line number and describes the syntax
 * problem; property values and comments stay out of it.
 */
final class ConfigFileException extends \RuntimeException
{
    private const FORMAT_DOCS =
        'https://docs.aws.amazon.com/sdkref/latest/guide/file-format.html';

    /**
     * Build the exception for a syntax problem on one line.
     */
    public static function atLine(
        string $source,
        int $lineNumber,
        string $reason
    ): self
    {
        return new self(\sprintf(
            'Invalid AWS profile file %s: %s on line %d. See %s',
            $source,
            $reason,
            $lineNumber,
            self::FORMAT_DOCS
        ));
    }
}
