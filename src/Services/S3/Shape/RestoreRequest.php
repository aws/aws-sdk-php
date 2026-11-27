<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

use Aws\Services\S3\Schemas;
use JsonSerializable;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ArraySerializableTrait;
use Smithy\Core\Shape\FromMembersTrait;
use Smithy\Core\Shape\SensitiveStringableTrait;

/**
 * Container for restore job parameters.
 */
final class RestoreRequest implements SerializableStructInterface, JsonSerializable
{
    use ArraySerializableTrait;
    use SensitiveStringableTrait;
    use FromMembersTrait;

    public const SHAPE_ID = 'com.amazonaws.s3#RestoreRequest';

    private static Schema $SCHEMA;
    private static Schema $SCHEMA_DAYS;
    private static Schema $SCHEMA_GLACIER_JOB_PARAMETERS;
    private static Schema $SCHEMA_TYPE;
    private static Schema $SCHEMA_TIER;
    private static Schema $SCHEMA_DESCRIPTION;
    private static Schema $SCHEMA_SELECT_PARAMETERS;
    private static Schema $SCHEMA_OUTPUT_LOCATION;

    public readonly ?RestoreRequestType $type;
    public readonly ?Tier $tier;

    /**
     * @param ?int $days Lifetime of the active copy in days. Do not use with restores that specify OutputLocation. The Days
     *        element is required for regular restores, and must not be provided for select requests.
     * @param ?GlacierJobParameters $glacierJobParameters S3 Glacier related parameters pertaining to this job. Do not use
     *        with restores that specify OutputLocation.
     * @param ?RestoreRequestType $type Amazon S3 Select is no longer available to new customers. Existing customers of
     *        Amazon S3 Select can continue to use the feature as usual. Learn more Type of restore request.
     * @param ?Tier $tier Retrieval tier at which the restore will be processed.
     * @param ?string $description The optional description for the job.
     * @param ?SelectParameters $selectParameters Amazon S3 Select is no longer available to new customers. Existing
     *        customers of Amazon S3 Select can continue to use the feature as usual. Learn more Describes the parameters
     * for
     *        Select job types.
     * @param ?OutputLocation $outputLocation Describes the location where the restore job's output is stored.
     */
    public function __construct(
        public readonly ?int $days = null,
        public readonly ?GlacierJobParameters $glacierJobParameters = null,
        RestoreRequestType|string|null $type = null,
        Tier|string|null $tier = null,
        public readonly ?string $description = null,
        public readonly ?SelectParameters $selectParameters = null,
        public readonly ?OutputLocation $outputLocation = null
    ) {
        $this->type = $type === null || $type instanceof RestoreRequestType ? $type : RestoreRequestType::fromValue($type);
        $this->tier = $tier === null || $tier instanceof Tier ? $tier : Tier::fromValue($tier);
    }

    /**
     * Get the shape schema.
     */
    public static function schema(): Schema
    {
        if (isset(self::$SCHEMA)) {
            return self::$SCHEMA;
        }
        $s = Schemas::restoreRequest();
        $m = $s->getMembersByIndex();
        self::$SCHEMA_DAYS = $m[0];
        self::$SCHEMA_GLACIER_JOB_PARAMETERS = $m[1];
        self::$SCHEMA_TYPE = $m[2];
        self::$SCHEMA_TIER = $m[3];
        self::$SCHEMA_DESCRIPTION = $m[4];
        self::$SCHEMA_SELECT_PARAMETERS = $m[5];
        self::$SCHEMA_OUTPUT_LOCATION = $m[6];
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
        if (isset($this->days)) {
            $serializer->serializeInteger(self::$SCHEMA_DAYS, $this->days, 0);
        }
        if (isset($this->glacierJobParameters)) {
            $serializer->serializeStruct(self::$SCHEMA_GLACIER_JOB_PARAMETERS, $this->glacierJobParameters, 1);
        }
        if (isset($this->type)) {
            $serializer->serializeString(self::$SCHEMA_TYPE, $this->type->value, 2);
        }
        if (isset($this->tier)) {
            $serializer->serializeString(self::$SCHEMA_TIER, $this->tier->value, 3);
        }
        if (isset($this->description)) {
            $serializer->serializeString(self::$SCHEMA_DESCRIPTION, $this->description, 4);
        }
        if (isset($this->selectParameters)) {
            $serializer->serializeStruct(self::$SCHEMA_SELECT_PARAMETERS, $this->selectParameters, 5);
        }
        if (isset($this->outputLocation)) {
            $serializer->serializeStruct(self::$SCHEMA_OUTPUT_LOCATION, $this->outputLocation, 6);
        }
    }

    /**
     * Get a modeled member value.
     */
    public function getMemberValue(Schema $member): mixed
    {
        return match ($member->memberIndex) {
            0 => $this->days,
            1 => $this->glacierJobParameters,
            2 => $this->type,
            3 => $this->tier,
            4 => $this->description,
            5 => $this->selectParameters,
            6 => $this->outputLocation,
            default => null,
        };
    }

    /**
     * Return a copy with one member replaced.
     */
    public function withMemberValue(Schema $member, mixed $value): static
    {
        $members = [
            $this->days,
            $this->glacierJobParameters,
            $this->type,
            $this->tier,
            $this->description,
            $this->selectParameters,
            $this->outputLocation
        ];
        $members[$member->memberIndex] = $value;

        return new self(...$members);
    }

}
