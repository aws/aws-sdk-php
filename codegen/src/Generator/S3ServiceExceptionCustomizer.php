<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen\Generator;

use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Generator\GeneratedFile;
use Smithy\Codegen\Model\SmithyModel;
use Smithy\Codegen\ShapeCategory;
use Smithy\Protocol\Aws\AwsExtendedRequestIdInterface;

/**
 * Add the S3 extended request ID accessors to the generated S3 service
 * exception.
 *
 * Applies only to models whose service has the `S3` SDK ID. The exception
 * implements `AwsExtendedRequestIdInterface`, and the accessors are
 * populated by `Aws\Core\S3\S3ErrorInterceptor`.
 */
final class S3ServiceExceptionCustomizer
{
    private const IMPORT =
        'use ' . AwsExtendedRequestIdInterface::class . ';';

    private const BODY = <<<'PHP'

{
    private ?string $extendedRequestId = null;

    /**
     * Return the S3 extended request ID (`x-amz-id-2` header or the
     * `Error>HostId` body element), or null when the response has none.
     */
    public function getExtendedRequestId(): ?string
    {
        return $this->extendedRequestId;
    }

    /**
     * Set the S3 extended request ID.
     *
     * @internal Called by the S3 error interceptor.
     */
    public function setExtendedRequestId(?string $extendedRequestId): void
    {
        $this->extendedRequestId = $extendedRequestId;
    }
}
PHP;

    public function __construct(
        private readonly SmithyModel $model,
        private readonly CodegenSettings $settings
    ) {}

    /**
     * Return `$files` with the S3 service exception customized.
     *
     * @param list<GeneratedFile> $files
     *
     * @return list<GeneratedFile>
     */
    public function apply(array $files): array
    {
        if (!$this->isS3()) {
            return $files;
        }

        $class = $this->settings->resolveServiceExceptionClass();
        $separator = \strrpos($class, '\\');
        $shortName = $separator === false
            ? $class
            : \substr($class, $separator + 1);
        $path = $this->settings->resolveOutputDir(ShapeCategory::Error)
            . \DIRECTORY_SEPARATOR
            . $shortName
            . '.php';

        foreach ($files as $index => $file) {
            if ($file->path !== $path) {
                continue;
            }

            $importCount = 0;
            $customized = \preg_replace_callback(
                '/^(class ' . \preg_quote($shortName, '/') . ' extends \S+)'
                    . '(?: \{\}|\n\{\})$/m',
                static fn(array $match): string => $match[1]
                    . ' implements AwsExtendedRequestIdInterface'
                    // A CRLF checkout must not leak into generated code.
                    . \str_replace("\r\n", "\n", self::BODY),
                $file->content,
                1,
                $classCount
            );
            $customized = $customized === null
                ? null
                : \preg_replace_callback(
                    '/^(use [^;\n]+;\n)(?!use )/m',
                    static fn(array $match): string => $match[1]
                        . self::IMPORT
                        . "\n",
                    $customized,
                    1,
                    $importCount
                );
            if ($customized === null
                || $classCount !== 1
                || $importCount !== 1
            ) {
                throw new \LogicException(
                    "Cannot customize the S3 service exception in {$path}"
                );
            }
            $files[$index] = new GeneratedFile($file->path, $customized);
        }

        return $files;
    }

    private function isS3(): bool
    {
        foreach ($this->model->getServiceShapes() as $service) {
            $trait = ($service['traits'] ?? [])['aws.api#service'] ?? null;
            if (\is_array($trait) && ($trait['sdkId'] ?? null) === 'S3') {
                return true;
            }
        }

        return false;
    }
}
