<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Checksum;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Smithy\Auth\Aws\AwsChunkedTrailer;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Core\Checksum\ChecksumAlgorithm;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\EnumInterface;
use Smithy\Core\Transport\TransportRequestInterface;
use Smithy\Http\Message\{
    HttpTransportRequest,
    Request
};

/**
 * Apply modeled flexible request checksums after request encodings.
 *
 * Seekable bodies carry the checksum in an `x-amz-checksum-*` header.
 * Non-seekable streaming bodies are sent as `aws-chunked` with the checksum
 * in an unsigned trailer, which requires an HTTPS endpoint.
 */
final class FlexibleChecksumRequestInterceptor extends AbstractInterceptor
{
    private const DEFAULT_ALGORITHM = 'CRC32';

    private const CHECKSUM_HEADER_PREFIX = 'x-amz-checksum-';

    private const CHECKSUM_PREFIX_EXCLUSIONS = [
        'x-amz-checksum-algorithm' => true,
        'x-amz-checksum-mode' => true,
        'x-amz-checksum-type' => true,
    ];

    public function __construct(
        private readonly RequestChecksumCalculation $calculationMode,
    ) {}

    public function modifyBeforeRetryLoop(
        RequestContext $ctx,
    ): TransportRequestInterface
    {
        $transportRequest = HttpTransportRequest::expect($ctx->request);
        $request = $transportRequest->request;
        $metadata = $this->metadata($ctx);
        if ($metadata === null) {
            return $ctx->request;
        }

        $algorithmHeader = $metadata['requestAlgorithmHeader'] ?? null;
        if ($this->hasUserProvidedChecksum($request)) {
            return \is_string($algorithmHeader) && $algorithmHeader !== ''
                ? $transportRequest->withRequest(
                    $request->withoutHeader($algorithmHeader)
                )
                : $ctx->request;
        }

        $checksumRequired =
            ($metadata['requestChecksumRequired'] ?? false) === true;
        $algorithmModeled = \is_int(
            $metadata['requestAlgorithmMemberIndex'] ?? null
        );
        if (!$checksumRequired && !$algorithmModeled) {
            return $ctx->request;
        }

        $requestedAlgorithm = $this->requestedAlgorithm($ctx, $metadata);
        if ($requestedAlgorithm === null
            && !$checksumRequired
            && $this->calculationMode
                === RequestChecksumCalculation::WHEN_REQUIRED
        ) {
            return $ctx->request;
        }

        $algorithm = ChecksumAlgorithm::resolveRequest(
            $requestedAlgorithm ?? self::DEFAULT_ALGORITHM
        );

        $body = $request->getBody();
        $headers = [];
        if ($requestedAlgorithm === null
            && \is_string($algorithmHeader)
            && $algorithmHeader !== ''
        ) {
            $headers[\strtolower($algorithmHeader)] = [
                $algorithmHeader,
                [self::DEFAULT_ALGORITHM],
            ];
        }

        if ($ctx->operation->getInputStreamMember() !== null
            && !$body->isSeekable()
        ) {
            foreach ($headers as [$name, $values]) {
                $request = $request->withHeader($name, $values);
            }

            return $transportRequest->withRequest(
                AwsChunkedTrailer::applyUnsigned($request, $algorithm)
            );
        }

        $checksum = \base64_encode($this->hashBody($body, $algorithm));
        $checksumHeader = self::CHECKSUM_HEADER_PREFIX
            . \strtolower($algorithm->value);
        $headers[$checksumHeader] = [$checksumHeader, [$checksum]];

        if ($request instanceof Request) {
            return $transportRequest->withRequest(
                $request->withNormalizedHeaders($headers)
            );
        }

        foreach ($headers as [$name, $values]) {
            $request = $request->withHeader($name, $values);
        }

        return $transportRequest->withRequest($request);
    }

    /**
     * @param array<string, mixed> $metadata
     */
    private function requestedAlgorithm(
        RequestContext $ctx,
        array $metadata
    ): ?string
    {
        $index = $metadata['requestAlgorithmMemberIndex'] ?? null;
        if (!\is_int($index)) {
            return null;
        }

        $member = $ctx->operation->getInputSchema()->getMemberByIndex($index);
        if ($member === null) {
            return null;
        }

        $value = $this->inputMemberValue($ctx, $member);
        if ($value instanceof EnumInterface) {
            $value = $value->getValue();
        }
        if (!\is_string($value) || $value === '') {
            return null;
        }

        return \strtoupper($value);
    }

    private function inputMemberValue(
        RequestContext $ctx,
        Schema $member
    ): mixed
    {
        return $ctx->input->getMemberValue($member);
    }

    private function hasUserProvidedChecksum(
        RequestInterface $request,
    ): bool
    {
        foreach ($request->getHeaders() as $name => $_) {
            $name = \strtolower($name);
            if (\str_starts_with($name, self::CHECKSUM_HEADER_PREFIX)
                && !isset(self::CHECKSUM_PREFIX_EXCLUSIONS[$name])
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Resolve modeled member names to runtime schema indexes and headers.
     *
     * @return array<string, mixed>|null
     */
    private function metadata(RequestContext $ctx): ?array
    {
        $metadata = $ctx->operation->getSchema()->getTrait(
            Schema::T_HTTP_CHECKSUM
        );
        if (!\is_array($metadata)) {
            return null;
        }

        $memberName = $metadata['requestAlgorithmMember'] ?? null;
        if (!\is_int($metadata['requestAlgorithmMemberIndex'] ?? null)
            && \is_string($memberName)
            && $memberName !== ''
        ) {
            $member = $ctx->operation->getInputSchema()->getMember(
                $memberName
            );
            if ($member !== null && $member->memberIndex !== null) {
                $metadata['requestAlgorithmMemberIndex'] =
                    $member->memberIndex;
                $header = $member->getTrait(Schema::T_HTTP_HEADER);
                if (\is_string($header) && $header !== '') {
                    $metadata['requestAlgorithmHeader'] = $header;
                }
            }
        }

        return $metadata;
    }

    private function hashBody(
        StreamInterface $body,
        ChecksumAlgorithm $algorithm
    ): string
    {
        $checksum = $algorithm->create();
        if (!$body->isSeekable()) {
            throw new \RuntimeException(
                'Cannot calculate a request checksum for a non-seekable body.'
            );
        }

        $position = $body->tell();
        while (!$body->eof()) {
            $chunk = $body->read(65536);
            if ($chunk === '') {
                break;
            }
            $checksum->update($chunk);
        }
        $body->seek($position);

        return $checksum->digest();
    }
}
