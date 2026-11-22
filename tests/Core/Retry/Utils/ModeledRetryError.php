<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry\Utils;

use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Serde\ShapeSerializerInterface;
use Smithy\Core\Shape\ShapeType;
use Smithy\Core\Shape\WithMemberValueTrait;

/**
 * Error whose schema carries a configurable retryable trait.
 */
final class ModeledRetryError extends \RuntimeException implements
    SerializableStructInterface
{
    use WithMemberValueTrait;

    public function __construct(private readonly bool|string $retryable)
    {
        parent::__construct('modeled');
    }

    public function getSchema(): Schema
    {
        return new Schema(
            id: 'aws.tests#ModeledRetryError',
            type: ShapeType::Structure,
            traits: [Schema::T_RETRYABLE => $this->retryable]
        );
    }

    public function serialize(
        ShapeSerializerInterface $serializer,
        int $idx
    ): void
    {
    }

    public function serializeMembers(
        ShapeSerializerInterface $serializer
    ): void
    {
    }

    public function getMemberValue(Schema $member): mixed
    {
        return null;
    }
}
