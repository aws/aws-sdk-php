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

final class BucketLocationConstraint implements EnumInterface
{
    public const SHAPE_ID = 'com.amazonaws.s3#BucketLocationConstraint';

    /** @var array<array-key, self> */
    private static array $known = [];

    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function af_south_1(): self
    {
        return self::$known['af-south-1'] ??= new self('af-south-1');
    }

    public static function ap_east_1(): self
    {
        return self::$known['ap-east-1'] ??= new self('ap-east-1');
    }

    public static function ap_east_2(): self
    {
        return self::$known['ap-east-2'] ??= new self('ap-east-2');
    }

    public static function ap_northeast_1(): self
    {
        return self::$known['ap-northeast-1'] ??= new self('ap-northeast-1');
    }

    public static function ap_northeast_2(): self
    {
        return self::$known['ap-northeast-2'] ??= new self('ap-northeast-2');
    }

    public static function ap_northeast_3(): self
    {
        return self::$known['ap-northeast-3'] ??= new self('ap-northeast-3');
    }

    public static function ap_south_1(): self
    {
        return self::$known['ap-south-1'] ??= new self('ap-south-1');
    }

    public static function ap_south_2(): self
    {
        return self::$known['ap-south-2'] ??= new self('ap-south-2');
    }

    public static function ap_southeast_1(): self
    {
        return self::$known['ap-southeast-1'] ??= new self('ap-southeast-1');
    }

    public static function ap_southeast_2(): self
    {
        return self::$known['ap-southeast-2'] ??= new self('ap-southeast-2');
    }

    public static function ap_southeast_3(): self
    {
        return self::$known['ap-southeast-3'] ??= new self('ap-southeast-3');
    }

    public static function ap_southeast_4(): self
    {
        return self::$known['ap-southeast-4'] ??= new self('ap-southeast-4');
    }

    public static function ap_southeast_5(): self
    {
        return self::$known['ap-southeast-5'] ??= new self('ap-southeast-5');
    }

    public static function ap_southeast_6(): self
    {
        return self::$known['ap-southeast-6'] ??= new self('ap-southeast-6');
    }

    public static function ap_southeast_7(): self
    {
        return self::$known['ap-southeast-7'] ??= new self('ap-southeast-7');
    }

    public static function ca_central_1(): self
    {
        return self::$known['ca-central-1'] ??= new self('ca-central-1');
    }

    public static function ca_west_1(): self
    {
        return self::$known['ca-west-1'] ??= new self('ca-west-1');
    }

    public static function cn_north_1(): self
    {
        return self::$known['cn-north-1'] ??= new self('cn-north-1');
    }

    public static function cn_northwest_1(): self
    {
        return self::$known['cn-northwest-1'] ??= new self('cn-northwest-1');
    }

    public static function eu(): self
    {
        return self::$known['EU'] ??= new self('EU');
    }

    public static function eu_central_1(): self
    {
        return self::$known['eu-central-1'] ??= new self('eu-central-1');
    }

    public static function eu_central_2(): self
    {
        return self::$known['eu-central-2'] ??= new self('eu-central-2');
    }

    public static function eu_north_1(): self
    {
        return self::$known['eu-north-1'] ??= new self('eu-north-1');
    }

    public static function eu_south_1(): self
    {
        return self::$known['eu-south-1'] ??= new self('eu-south-1');
    }

    public static function eu_south_2(): self
    {
        return self::$known['eu-south-2'] ??= new self('eu-south-2');
    }

    public static function eu_west_1(): self
    {
        return self::$known['eu-west-1'] ??= new self('eu-west-1');
    }

    public static function eu_west_2(): self
    {
        return self::$known['eu-west-2'] ??= new self('eu-west-2');
    }

    public static function eu_west_3(): self
    {
        return self::$known['eu-west-3'] ??= new self('eu-west-3');
    }

    public static function il_central_1(): self
    {
        return self::$known['il-central-1'] ??= new self('il-central-1');
    }

    public static function me_central_1(): self
    {
        return self::$known['me-central-1'] ??= new self('me-central-1');
    }

    public static function me_south_1(): self
    {
        return self::$known['me-south-1'] ??= new self('me-south-1');
    }

    public static function mx_central_1(): self
    {
        return self::$known['mx-central-1'] ??= new self('mx-central-1');
    }

    public static function sa_east_1(): self
    {
        return self::$known['sa-east-1'] ??= new self('sa-east-1');
    }

    public static function us_east_2(): self
    {
        return self::$known['us-east-2'] ??= new self('us-east-2');
    }

    public static function us_gov_east_1(): self
    {
        return self::$known['us-gov-east-1'] ??= new self('us-gov-east-1');
    }

    public static function us_gov_west_1(): self
    {
        return self::$known['us-gov-west-1'] ??= new self('us-gov-west-1');
    }

    public static function us_west_1(): self
    {
        return self::$known['us-west-1'] ??= new self('us-west-1');
    }

    public static function us_west_2(): self
    {
        return self::$known['us-west-2'] ??= new self('us-west-2');
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
            'af-south-1' => self::$known['af-south-1'] ??= new self('af-south-1'),
            'ap-east-1' => self::$known['ap-east-1'] ??= new self('ap-east-1'),
            'ap-east-2' => self::$known['ap-east-2'] ??= new self('ap-east-2'),
            'ap-northeast-1' => self::$known['ap-northeast-1'] ??= new self('ap-northeast-1'),
            'ap-northeast-2' => self::$known['ap-northeast-2'] ??= new self('ap-northeast-2'),
            'ap-northeast-3' => self::$known['ap-northeast-3'] ??= new self('ap-northeast-3'),
            'ap-south-1' => self::$known['ap-south-1'] ??= new self('ap-south-1'),
            'ap-south-2' => self::$known['ap-south-2'] ??= new self('ap-south-2'),
            'ap-southeast-1' => self::$known['ap-southeast-1'] ??= new self('ap-southeast-1'),
            'ap-southeast-2' => self::$known['ap-southeast-2'] ??= new self('ap-southeast-2'),
            'ap-southeast-3' => self::$known['ap-southeast-3'] ??= new self('ap-southeast-3'),
            'ap-southeast-4' => self::$known['ap-southeast-4'] ??= new self('ap-southeast-4'),
            'ap-southeast-5' => self::$known['ap-southeast-5'] ??= new self('ap-southeast-5'),
            'ap-southeast-6' => self::$known['ap-southeast-6'] ??= new self('ap-southeast-6'),
            'ap-southeast-7' => self::$known['ap-southeast-7'] ??= new self('ap-southeast-7'),
            'ca-central-1' => self::$known['ca-central-1'] ??= new self('ca-central-1'),
            'ca-west-1' => self::$known['ca-west-1'] ??= new self('ca-west-1'),
            'cn-north-1' => self::$known['cn-north-1'] ??= new self('cn-north-1'),
            'cn-northwest-1' => self::$known['cn-northwest-1'] ??= new self('cn-northwest-1'),
            'EU' => self::$known['EU'] ??= new self('EU'),
            'eu-central-1' => self::$known['eu-central-1'] ??= new self('eu-central-1'),
            'eu-central-2' => self::$known['eu-central-2'] ??= new self('eu-central-2'),
            'eu-north-1' => self::$known['eu-north-1'] ??= new self('eu-north-1'),
            'eu-south-1' => self::$known['eu-south-1'] ??= new self('eu-south-1'),
            'eu-south-2' => self::$known['eu-south-2'] ??= new self('eu-south-2'),
            'eu-west-1' => self::$known['eu-west-1'] ??= new self('eu-west-1'),
            'eu-west-2' => self::$known['eu-west-2'] ??= new self('eu-west-2'),
            'eu-west-3' => self::$known['eu-west-3'] ??= new self('eu-west-3'),
            'il-central-1' => self::$known['il-central-1'] ??= new self('il-central-1'),
            'me-central-1' => self::$known['me-central-1'] ??= new self('me-central-1'),
            'me-south-1' => self::$known['me-south-1'] ??= new self('me-south-1'),
            'mx-central-1' => self::$known['mx-central-1'] ??= new self('mx-central-1'),
            'sa-east-1' => self::$known['sa-east-1'] ??= new self('sa-east-1'),
            'us-east-2' => self::$known['us-east-2'] ??= new self('us-east-2'),
            'us-gov-east-1' => self::$known['us-gov-east-1'] ??= new self('us-gov-east-1'),
            'us-gov-west-1' => self::$known['us-gov-west-1'] ??= new self('us-gov-west-1'),
            'us-west-1' => self::$known['us-west-1'] ??= new self('us-west-1'),
            'us-west-2' => self::$known['us-west-2'] ??= new self('us-west-2'),
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
        return [self::af_south_1(), self::ap_east_1(), self::ap_east_2(), self::ap_northeast_1(), self::ap_northeast_2(), self::ap_northeast_3(), self::ap_south_1(), self::ap_south_2(), self::ap_southeast_1(), self::ap_southeast_2(), self::ap_southeast_3(), self::ap_southeast_4(), self::ap_southeast_5(), self::ap_southeast_6(), self::ap_southeast_7(), self::ca_central_1(), self::ca_west_1(), self::cn_north_1(), self::cn_northwest_1(), self::eu(), self::eu_central_1(), self::eu_central_2(), self::eu_north_1(), self::eu_south_1(), self::eu_south_2(), self::eu_west_1(), self::eu_west_2(), self::eu_west_3(), self::il_central_1(), self::me_central_1(), self::me_south_1(), self::mx_central_1(), self::sa_east_1(), self::us_east_2(), self::us_gov_east_1(), self::us_gov_west_1(), self::us_west_1(), self::us_west_2()];
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
        return Schemas::bucketLocationConstraint();
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
