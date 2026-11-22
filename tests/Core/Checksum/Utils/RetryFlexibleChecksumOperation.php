<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum\Utils;

use Smithy\Core\Exception\ApiException;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;

/**
 * Operation that requires a request checksum on a streaming body.
 */
final class RetryFlexibleChecksumOperation implements OperationInterface
{
    private static ?self $instance = null;
    private static ?Schema $schema = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function getName(): string
    {
        return 'RetryFlexibleChecksum';
    }

    public function getId(): string
    {
        return 'aws.tests#RetryFlexibleChecksum';
    }

    public function getServiceId(): ?string
    {
        return null;
    }

    public function getServiceExceptionClass(): string
    {
        return ApiException::class;
    }

    public function getRuntimeIdentity(): string
    {
        return self::class;
    }

    public function getEffectiveAuthSchemes(): array
    {
        return ['smithy.api#noAuth'];
    }

    public function getInputClass(): string
    {
        return RetryFlexibleChecksumInput::class;
    }

    public function getOutputClass(): string
    {
        return RetryFlexibleChecksumInput::class;
    }

    public function getErrors(): array
    {
        return [];
    }

    public function getSchema(): Schema
    {
        return self::schema();
    }

    public static function schema(): Schema
    {
        return self::$schema ??= new Schema(
            id: 'aws.tests#RetryFlexibleChecksum',
            type: ShapeType::Operation,
            traits: [
                Schema::T_HTTP_CHECKSUM => [
                    'requestChecksumRequired' => true,
                    'requestAlgorithmMemberIndex' => null,
                    'requestAlgorithmHeader' =>
                        'x-amz-request-algorithm',
                    'requestValidationModeMemberIndex' => null,
                    'requestValidationModeHeader' => null,
                    'responseAlgorithms' => [],
                ]
            ]
        );
    }

    public function getInputSchema(): Schema
    {
        return self::inputSchema();
    }

    public static function inputSchema(): Schema
    {
        return RetryFlexibleChecksumInput::schema();
    }

    public function getOutputSchema(): Schema
    {
        return self::outputSchema();
    }

    public static function outputSchema(): Schema
    {
        return RetryFlexibleChecksumInput::schema();
    }

    public function getErrorSchemas(): array
    {
        return [];
    }

    public function createInput(array $members): \Smithy\Core\Serde\SerializableStructInterface
    {
        $inputClass = $this->getInputClass();

        return $inputClass === ""
            ? \Smithy\Core\Shape\Document\StructDocument::fromMembers(
                $this->getInputSchema(),
                $members
            )
            : new $inputClass(...$members);
    }

    public function createOutput(array $members): \Smithy\Core\Serde\SerializableStructInterface
    {
        $outputClass = $this->getOutputClass();

        return $outputClass === ""
            ? \Smithy\Core\Shape\Document\StructDocument::fromMembers(
                $this->getOutputSchema(),
                $members
            )
            : new $outputClass(...$members);
    }

    public function getRequestTarget(): ?string
    {
        return \defined(static::class . "::TARGET")
            ? \constant(static::class . "::TARGET")
            : $this->getName();
    }

    public function resolveErrorSchema(string $discriminator): ?Schema
    {
        $errorMap = $this->getSchema()->getTrait(Schema::T_ERRORS) ?? [];
        $errorClass = $errorMap[$discriminator] ?? null;

        return \is_string($errorClass)
            && \method_exists($errorClass, "schema")
                ? $errorClass::schema()
                : null;
    }

    public function getInputStreamMember(): ?Schema
    {
        return self::inputSchema()->getMemberByIndex(0);
    }

    public function getOutputStreamMember(): ?Schema
    {
        return null;
    }
}
