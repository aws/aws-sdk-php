<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\EnumInterface;

/**
 * <p>Encoding type used by Amazon S3 to encode the <a
 * href="https://docs.aws.amazon.com/AmazonS3/latest/userguide/object-keys.html">object keys</a> in the response.
 * Responses are
      encoded only in UTF-8. An object key can contain any Unicode character. However, the XML 1.0
 * parser
      can't parse certain characters, such as characters with an ASCII value from 0 to 10. For characters
 * that
      aren't supported in XML 1.0, you can add this parameter to request that Amazon S3 encode the keys in the
 
 * response. For more information about characters to avoid in object key names, see <a
 * href="https://docs.aws.amazon.com/AmazonS3/latest/userguide/object-keys.html#object-key-guidelines">Object key
      
 * naming guidelines</a>.</p>
         <note>
            <p>When using the URL encoding type, non-ASCII characters that
 * are used in an object's key name will
        be percent-encoded according to UTF-8 code values. For example, the
 * object
          <code>test_file(3).png</code> will appear as <code>test_file%283%29.png</code>.</p>
         </note>
 */
final class EncodingType implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#EncodingType';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function url(): self
    {
        return self::$known['url'] ??= new self('url');
    }

    /**
     * Create an instance from a string value.
     *
     * Known values are cached as singletons.
     * Unknown values create a fresh instance
     * for forward-compatibility with newer service versions.
     *
     * @param string $value
     * @return self
     */
    public static function fromValue(string $value): self
    {
        return match ($value) {
            'url' => self::$known['url'] ??= new self('url'),
            default => new self($value),
        };
    }

    /**
     * Returns all known enum values.
     *
     * @return list<self>
     */
    public static function cases(): array
    {
        return [self::url()];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        return Schemas::encodingType();
    }

    /**
     * Get the shape schema for this instance.
     */
    public function getSchema(): Schema
    {
        return self::schema();
    }

    /**
     * Serialize the shape to the desired wire format.
     *
     * @return void
     */
    public function serialize(ShapeSerializerInterface $serializer, int $idx): void
    {
        $serializer->serializeString(self::schema(), $this->value, $idx);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
