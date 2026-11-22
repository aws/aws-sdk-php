<?php

declare(strict_types=1);

namespace Aws\Core\S3;

use Psr\Http\Message\ResponseInterface;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Core\Exception\ApiException;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Message\HttpTransportResponse;
use Smithy\Protocol\Aws\AwsErrorInterface;
use Smithy\Protocol\Aws\AwsExtendedRequestIdInterface;

/**
 * Apply S3 error response customizations to an attempt's error.
 *
 * Runs in `modifyBeforeAttemptCompletion`, before the retry strategy
 * classifies the error. It acts on errors that implement both
 * {@see AwsErrorInterface} and {@see AwsExtendedRequestIdInterface}, such as
 * the `AwsProtocolException` errors of dynamic clients and S3 service
 * exception classes.
 *
 * 1. An unmodeled error from a 404 response with an empty body (for example
 *    a `HeadObject` 404) becomes a `NotFound` error. When the operation
 *    models `NotFound` with an error class, the interceptor returns that
 *    modeled error.
 * 2. Every matching error records the extended request ID from the
 *    `x-amz-id-2` header, or from the `Error>HostId` body element when the
 *    header is absent.
 */
final class S3ErrorInterceptor extends AbstractInterceptor
{
    /** Error code the XML error deserializer assigns to empty bodies. */
    private const UNKNOWN_CODE = 'Unknown';

    /** Error code S3 implies for an empty-body 404 response. */
    private const NOT_FOUND_CODE = 'NotFound';

    /**
     * @inheritDoc
     *
     * @throws \Throwable The attempt error, possibly replaced.
     */
    public function modifyBeforeAttemptCompletion(
        OutputContext $ctx,
        ?\Throwable $error
    ): SerializableStructInterface
    {
        if ($error instanceof AwsErrorInterface
            && $error instanceof AwsExtendedRequestIdInterface
            && $error instanceof ApiException
            && $ctx->response instanceof HttpTransportResponse
        ) {
            $response = $ctx->response->response;
            $body = (string) $response->getBody();
            if ($body === ''
                && $response->getStatusCode() === 404
                && !$error instanceof SerializableStructInterface
                && $error->getAwsErrorCode() === self::UNKNOWN_CODE
            ) {
                $error = self::notFound($ctx->operation, $error);
            }
            $error->setExtendedRequestId(
                self::extendedRequestId($response, $body)
            );
        }

        return parent::modifyBeforeAttemptCompletion($ctx, $error);
    }

    /**
     * Build the `NotFound` error for an empty-body 404 response.
     */
    private static function notFound(
        OperationInterface $operation,
        AwsErrorInterface&AwsExtendedRequestIdInterface&ApiException $error
    ): AwsErrorInterface&AwsExtendedRequestIdInterface&ApiException
    {
        $message = 'HTTP 404: ' . self::NOT_FOUND_CODE;
        $modeledClass = $operation->resolveErrorSchema(self::NOT_FOUND_CODE)
            ?->resolveTarget()
            ->targetClass;
        if ($modeledClass !== null
            && \is_a($modeledClass, $error::class, true)
            && \method_exists($modeledClass, 'fromMembers')
        ) {
            $inferred = $modeledClass::fromMembers([]);
            $inferred->setAwsErrorMetadata(
                $message,
                self::NOT_FOUND_CODE,
                $error->getAwsRequestId(),
                404
            );
        } else {
            $inferred = $error::fromAwsError(
                $message,
                $error->fault,
                $error->getPrevious(),
                self::NOT_FOUND_CODE,
                $error->getAwsRequestId(),
                404
            );
        }
        $inferred->setRetryAfter($error->getRetryAfter());

        return $inferred;
    }

    /**
     * Read the extended request ID from the `x-amz-id-2` header or the
     * `HostId` element of an XML error body.
     */
    private static function extendedRequestId(
        ResponseInterface $response,
        string $body
    ): ?string
    {
        $header = $response->getHeaderLine('x-amz-id-2');
        if ($header !== '') {
            return $header;
        }
        if ($body === '' || !\str_contains($body, '<HostId>')) {
            return null;
        }

        $useInternalErrors = \libxml_use_internal_errors(true);
        try {
            $xml = new \SimpleXMLElement($body, LIBXML_NONET);
        } catch (\Exception) {
            return null;
        } finally {
            \libxml_clear_errors();
            \libxml_use_internal_errors($useInternalErrors);
        }
        $hostId = (string) ($xml->HostId ?? $xml->Error->HostId ?? '');

        return $hostId !== '' ? $hostId : null;
    }
}
