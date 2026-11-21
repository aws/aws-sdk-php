<?php

declare(strict_types=1);

namespace Aws\Core\Checksum;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Client\Interceptor\ResponseContext;
use Smithy\Core\Transport\{
    TransportRequestInterface,
    TransportResponseInterface
};
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\EnumInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Checksum\ChecksumAlgorithm;
use Smithy\Http\Checksum\ChecksumStream;
use Smithy\Http\Checksum\ExpectedChecksum;
use Smithy\Http\Checksum\ResponseChecksumValidator;
use Smithy\Http\Message\{
    HttpTransportRequest,
    HttpTransportResponse,
    Request
};

/**
 * Opt in to modeled response checksums and select a checksum to validate.
 */
final class FlexibleChecksumResponseInterceptor extends AbstractInterceptor
{
    private const ENABLED = 'ENABLED';

    public function __construct(
        private readonly ResponseChecksumValidation $validationMode,
    ) {}

    public function modifyBeforeRetryLoop(
        RequestContext $ctx,
    ): TransportRequestInterface {
        $transportRequest = HttpTransportRequest::expect($ctx->request);
        $request = $transportRequest->request;
        $metadata = $this->metadata($ctx->operation);
        if (
            $metadata === null
            || $this->supportedModeledAlgorithms($metadata) === []
        ) {
            return $ctx->request;
        }

        $header = $metadata['requestValidationModeHeader'] ?? null;
        if (!\is_string($header) || $header === '') {
            return $ctx->request;
        }

        if ($this->validationEnabled($ctx, $metadata)) {
            return $this->requestEnablesValidation($request, $header)
                ? $ctx->request
                : $transportRequest->withRequest(
                    $this->withValidationHeader($request, $header)
                );
        }

        if ($this->validationMode === ResponseChecksumValidation::WHEN_REQUIRED) {
            return $ctx->request;
        }

        return $transportRequest->withRequest(
            $this->withValidationHeader($request, $header)
        );
    }

    public function modifyBeforeDeserialization(
        ResponseContext $ctx
    ): TransportResponseInterface {
        $selection = $this->selectResponseChecksum($ctx);
        if ($selection === null) {
            return $ctx->response;
        }

        $transportResponse = HttpTransportResponse::expect($ctx->response);
        $response = $transportResponse->response;
        $body = $response->getBody();
        if ($body instanceof ChecksumStream) {
            return $ctx->response;
        }

        return $transportResponse->withResponse(
            $response->withBody(
                new ChecksumStream($body, $selection)
            )
        );
    }

    /**
     * Select at most one valid, supported checksum from a successful response.
     */
    public function selectResponseChecksum(
        ResponseContext $ctx
    ): ?ExpectedChecksum {
        $request = $ctx->getHttpRequest();
        $response = $ctx->getHttpResponse();
        if (
            $response->getStatusCode() < 200
            || $response->getStatusCode() >= 300
        ) {
            return null;
        }

        $metadata = $this->metadata($ctx->operation);
        if ($metadata === null) {
            return null;
        }

        $header = $metadata['requestValidationModeHeader'] ?? null;
        $enabled = $this->validationMode
            === ResponseChecksumValidation::WHEN_SUPPORTED;
        if (\is_string($header) && $header !== '') {
            $enabled = $enabled
                || $this->requestEnablesValidation($request, $header);
        }
        if (!$enabled) {
            $enabled = $this->inputEnablesValidation($ctx, $metadata);
        }
        if (!$enabled) {
            return null;
        }

        foreach ($this->supportedModeledAlgorithms($metadata) as $algorithm) {
            $checksumHeader = 'x-amz-checksum-'
                . \strtolower($algorithm->value);
            $encoded = $response->getHeaderLine($checksumHeader);
            if ($encoded === '') {
                continue;
            }
            if ($this->isCompositeChecksum(
                $ctx->operation->getId(),
                $encoded
            )) {
                continue;
            }

            $checksum = \base64_decode($encoded, true);
            if ($checksum === false || $checksum === '') {
                continue;
            }

            return new ExpectedChecksum($algorithm, $encoded);
        }

        return null;
    }

    private function isCompositeChecksum(
        string $operationId,
        string $checksum
    ): bool {
        if (!\str_starts_with($operationId, 'com.amazonaws.s3#')) {
            return false;
        }

        $separator = \strrpos($checksum, '-');
        if ($separator === false || $separator === \strlen($checksum) - 1) {
            return false;
        }

        $partCount = \substr($checksum, $separator + 1);
        if (
            \strlen($partCount) > 5
            || !\ctype_digit($partCount)
        ) {
            return false;
        }

        $parts = (int) $partCount;

        return $parts >= 1 && $parts <= 10000;
    }

    /**
     * @param array<string, mixed> $metadata
     *
     * @return list<ChecksumAlgorithm>
     */
    private function supportedModeledAlgorithms(array $metadata): array
    {
        $modeled = [];
        foreach ($metadata['responseAlgorithms'] ?? [] as $algorithm) {
            if (!\is_string($algorithm)) {
                continue;
            }
            $resolved = ChecksumAlgorithm::tryFromName($algorithm);
            if ($resolved !== null) {
                $modeled[] = $resolved;
            }
        }

        return ResponseChecksumValidator::candidates($modeled);
    }

    /**
     * @param array<string, mixed> $metadata
     */
    private function validationEnabled(
        RequestContext $ctx,
        array $metadata
    ): bool {
        $header = $metadata['requestValidationModeHeader'] ?? null;
        if (
            \is_string($header)
            && $header !== ''
            && $this->requestEnablesValidation(
                $ctx->getHttpRequest(),
                $header
            )
        ) {
            return true;
        }

        return $this->inputEnablesValidation($ctx, $metadata);
    }

    /**
     * @param RequestContext|ResponseContext $ctx
     * @param array<string, mixed> $metadata
     */
    private function inputEnablesValidation(
        RequestContext|ResponseContext $ctx,
        array $metadata
    ): bool {
        $index = $metadata['requestValidationModeMemberIndex'] ?? null;
        if (!\is_int($index)) {
            return false;
        }

        $member = $ctx->operation->getInputSchema()->getMemberByIndex($index);
        if ($member === null) {
            return false;
        }

        $value = $ctx->input->getMemberValue($member);
        if ($value instanceof EnumInterface) {
            $value = $value->getValue();
        }

        return \is_string($value)
            && \strtoupper($value) === self::ENABLED;
    }

    private function requestEnablesValidation(
        RequestInterface $request,
        string $header
    ): bool {
        return \strtoupper(\trim($request->getHeaderLine($header)))
            === self::ENABLED;
    }

    private function withValidationHeader(
        RequestInterface $request,
        string $header,
    ): RequestInterface {
        return $request instanceof Request
            ? $request->withNormalizedHeader(
                \strtolower($header),
                $header,
                [self::ENABLED],
            )
            : $request->withHeader($header, self::ENABLED);
    }

    /**
     * @return array<string, mixed>|null
     */
    private function metadata(OperationInterface $operation): ?array
    {
        $metadata = $operation->getSchema()->getTrait(
            Schema::T_HTTP_CHECKSUM
        );
        if (!\is_array($metadata)) {
            return null;
        }

        $memberName = $metadata['requestValidationModeMember'] ?? null;
        if (
            !\is_int(
                $metadata['requestValidationModeMemberIndex'] ?? null
            )
            && \is_string($memberName)
            && $memberName !== ''
        ) {
            $member = $operation->getInputSchema()->getMember($memberName);
            if ($member !== null && $member->memberIndex !== null) {
                $metadata['requestValidationModeMemberIndex'] =
                    $member->memberIndex;
                $header = $member->getTrait(Schema::T_HTTP_HEADER);
                if (\is_string($header) && $header !== '') {
                    $metadata['requestValidationModeHeader'] = $header;
                }
            }
        }

        return $metadata;
    }
}
