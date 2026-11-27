<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Endpoint;

/**
 * Generated cache-key builder for S3EndpointKeyBuilder.
 *
 * The returned closure matches resolver output,
 * but skips the reflective walk over the
 * ruleset's input-name list.
 *
 * @generated Do not edit.
 */
final class S3EndpointKeyBuilder
{
    private static ?\Closure $closure = null;

    /**
     * Return the memoized cache-key builder closure.
     *
     * @return \Closure(array<string, mixed>): string
     */
    public static function build(): \Closure
    {
        return self::$closure ??= static function (
            array $inputs
        ): string
        {
            $key = '';
            if (!\array_key_exists(
                'Bucket',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['Bucket'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'Region',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['Region'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'UseFIPS',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['UseFIPS'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'UseDualStack',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['UseDualStack'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'Endpoint',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['Endpoint'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'ForcePathStyle',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['ForcePathStyle'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'Accelerate',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['Accelerate'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'UseGlobalEndpoint',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['UseGlobalEndpoint'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'UseObjectLambdaEndpoint',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['UseObjectLambdaEndpoint'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'Key',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['Key'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'Prefix',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['Prefix'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'CopySource',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['CopySource'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'DisableAccessPoints',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['DisableAccessPoints'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'DisableMultiRegionAccessPoints',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['DisableMultiRegionAccessPoints'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'UseArnRegion',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['UseArnRegion'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'UseS3ExpressControlEndpoint',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['UseS3ExpressControlEndpoint'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            if (!\array_key_exists(
                'DisableS3ExpressSessionAuth',
                $inputs
            )) {
                $key .= "\x00";
            } else {
                $value = $inputs['DisableS3ExpressSessionAuth'];
                if ($value === null) {
                    $key .= "\x01";
                } elseif ($value === false) {
                    $key .= "\x02";
                } elseif ($value === true) {
                    $key .= "\x03";
                } elseif (\is_string($value)) {
                    $key .= "\x04"
                        . \strlen($value)
                        . ':' . $value;
                } elseif (\is_int($value)) {
                    $key .= "\x05" . $value . ';';
                } else {
                    $encoded = \serialize($value);
                    $key .= "\x06"
                        . \strlen($encoded)
                        . ':' . $encoded;
                }
            }
            return $key;
        };
    }
}
