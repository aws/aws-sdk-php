<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;

/**
 * Specifies how requests are redirected. In the event of an error, you can specify a different error code to return.
 */
final class Redirect implements SerializableStructInterface
{
    use ArraySerializableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#Redirect';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_HOST_NAME;
    private static Schema $SCHEMA_HTTP_REDIRECT_CODE;
    private static Schema $SCHEMA_PROTOCOL;
    private static Schema $SCHEMA_REPLACE_KEY_PREFIX_WITH;
    private static Schema $SCHEMA_REPLACE_KEY_WITH;

    public readonly ?Protocol $protocol;

    /**
     * @param ?string $hostName The host name to use in the redirect request.
     * @param ?string $httpRedirectCode The HTTP redirect code to use on the response. Not required if one of the siblings
     *        is present.
     * @param ?Protocol $protocol Protocol to use when redirecting requests. The default is the protocol that is used in the
     *        original request.
     * @param ?string $replaceKeyPrefixWith The object key prefix to use in the redirect request. For example, to redirect
     *        requests for all pages with prefix docs/ (objects in the docs/ folder) to documents/, you can set a condition
     * block
     *        with KeyPrefixEquals set to docs/ and in the Redirect set ReplaceKeyPrefixWith to /documents. Not required if
     * one of
     *        the siblings is present. Can be present only if ReplaceKeyWith is not provided. Replacement must be made for
     * object
     *        keys containing special characters (such as carriage returns) when using XML requests. For more information,
     * see XML
     *        related object key constraints.
     * @param ?string $replaceKeyWith The specific object key to use in the redirect request. For example, redirect request
     *        to error.html. Not required if one of the siblings is present. Can be present only if ReplaceKeyPrefixWith is
     * not
     *        provided. Replacement must be made for object keys containing special characters (such as carriage returns)
     * when
     *        using XML requests. For more information, see XML related object key constraints.
     */
    public function __construct(
        public readonly ?string $hostName = null,
        public readonly ?string $httpRedirectCode = null,
        Protocol|string|null $protocol = null,
        public readonly ?string $replaceKeyPrefixWith = null,
        public readonly ?string $replaceKeyWith = null
    ) {
        $this->protocol = $protocol === null || $protocol instanceof Protocol ? $protocol : Protocol::fromValue($protocol);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::redirect();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_HOST_NAME = $m[0];
        self::$SCHEMA_HTTP_REDIRECT_CODE = $m[1];
        self::$SCHEMA_PROTOCOL = $m[2];
        self::$SCHEMA_REPLACE_KEY_PREFIX_WITH = $m[3];
        self::$SCHEMA_REPLACE_KEY_WITH = $m[4];
        return self::$SCHEMA = $s;
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
        $serializer->serializeStruct(self::schema(), $this, $idx);
    }

    /**
     * Serialize the shape members to the desired wire format.
     *
     * @return void
     */
    public function serializeMembers(ShapeSerializerInterface $serializer): void
    {
        if (isset($this->hostName)) {
            $serializer->serializeString(self::$SCHEMA_HOST_NAME, $this->hostName, 0);
        }
        if (isset($this->httpRedirectCode)) {
            $serializer->serializeString(self::$SCHEMA_HTTP_REDIRECT_CODE, $this->httpRedirectCode, 1);
        }
        if (isset($this->protocol)) {
            $serializer->serializeString(self::$SCHEMA_PROTOCOL, $this->protocol->value, 2);
        }
        if (isset($this->replaceKeyPrefixWith)) {
            $serializer->serializeString(self::$SCHEMA_REPLACE_KEY_PREFIX_WITH, $this->replaceKeyPrefixWith, 3);
        }
        if (isset($this->replaceKeyWith)) {
            $serializer->serializeString(self::$SCHEMA_REPLACE_KEY_WITH, $this->replaceKeyWith, 4);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->hostName,
            1 => $this->httpRedirectCode,
            2 => $this->protocol,
            3 => $this->replaceKeyPrefixWith,
            4 => $this->replaceKeyWith,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->hostName,
            $this->httpRedirectCode,
            $this->protocol,
            $this->replaceKeyPrefixWith,
            $this->replaceKeyWith
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
