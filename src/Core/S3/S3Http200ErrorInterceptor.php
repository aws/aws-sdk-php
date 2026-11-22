<?php

declare(strict_types=1);

namespace Aws\Core\S3;

use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\ResponseContext;
use Smithy\Core\Exception\ApiException;
use Smithy\Core\Exception\ErrorFault;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Shape\ShapeType;
use Smithy\Http\Message\HttpTransportResponse;
use Smithy\Protocol\Aws\AwsErrorInterface;
use Smithy\Protocol\Aws\AwsExtendedRequestIdInterface;

/**
 * Raise an error for an S3 HTTP 200 response that carries an `Error` body.
 *
 * S3 can answer with HTTP 200 OK while the XML payload is an error envelope
 * whose root element is named `Error`. This interceptor runs in
 * `readBeforeDeserialization`: on a 200 response whose body is an XML
 * document with an `Error` root element, it deserializes that element into an
 * AWS error and throws it, so the pipeline treats the attempt as a failure
 * and the retry strategy classifies it. On any other response it returns and
 * lets normal deserialization continue.
 *
 * The check applies only to operations whose response carries a structured
 * XML body. It skips an operation whose output has a streaming response (an
 * `@streaming` blob or union `@httpPayload` member, such as `GetObject`) and
 * one whose output binds an `@httpPayload` member of an unstructured type
 * (a `string` payload such as `GetBucketPolicy`, or a non-streaming `blob`),
 * both read from the output schema. This matches the specification's operation
 * selector. A `SlowDown` error is raised as a retryable throttle and an
 * `InternalError` as a retryable server error, mirroring a generic 5XX
 * error; any other error code is raised as an unknown error.
 *
 * The `S3ErrorInterceptor` installed alongside this interceptor records the
 * extended request ID on the raised error during attempt completion.
 */
final class S3Http200ErrorInterceptor extends AbstractInterceptor
{
    /** Status code this interceptor inspects. */
    private const HTTP_OK = 200;

    /** Error code S3 sends for a throttle in a 200 response. */
    private const SLOW_DOWN_CODE = 'SlowDown';

    /** Error code S3 sends for a transient server failure in a 200 response. */
    private const INTERNAL_ERROR_CODE = 'InternalError';

    /**
     * Largest body this interceptor parses as XML, in bytes.
     *
     * A 200-with-error envelope is a few hundred bytes; capping the parse
     * keeps a large structured response (for example a long `ListObjectsV2`
     * result) on the normal deserialization path and avoids parsing a jumbo
     * payload.
     *
     * shortcut: a fixed cap; raise it if a real `Error` envelope ever exceeds it.
     */
    private const MAX_PARSE_BYTES = 262144;

    /**
     * @inheritDoc
     *
     * @throws \Throwable The error deserialized from a 200-with-error body.
     *
     * @return void
     */
    public function readBeforeDeserialization(ResponseContext $ctx): void
    {
        if (!$ctx->response instanceof HttpTransportResponse) {
            return;
        }
        $response = $ctx->response->response;
        if ($response->getStatusCode() !== self::HTTP_OK
            || $ctx->operation->getOutputStreamMember() !== null
            || self::hasUnstructuredPayload($ctx->operation)
        ) {
            return;
        }

        $error = self::errorFromBody(
            $ctx->operation,
            (string) $response->getBody()
        );
        if ($error !== null) {
            throw $error;
        }
    }

    /**
     * Report whether the operation's output binds an `@httpPayload` member of
     * an unstructured type.
     *
     * Returns true when a member of the output schema carries the
     * `@httpPayload` trait and targets a `string` or `blob` shape. Such a
     * response holds raw text or binary bytes rather than a structured XML
     * body, so the specification's operation selector excludes it. The streaming
     * payload members are already excluded through `getOutputStreamMember`.
     */
    private static function hasUnstructuredPayload(
        OperationInterface $operation
    ): bool
    {
        foreach ($operation->getOutputSchema()->getMembers() as $member) {
            if ($member->hasTrait(Schema::T_HTTP_PAYLOAD)
                && ($member->type === ShapeType::String_->value
                    || $member->type === ShapeType::Blob->value)
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Build the AWS error for a 200 response whose XML root element is
     * `Error`, or return null when the body is not such an envelope.
     */
    private static function errorFromBody(
        OperationInterface $operation,
        string $body
    ): ?\Throwable
    {
        if (!self::looksLikeErrorXml($body)) {
            return null;
        }

        $useInternalErrors = \libxml_use_internal_errors(true);
        try {
            $xml = new \SimpleXMLElement($body, LIBXML_NONET | LIBXML_NOBLANKS);
        } catch (\Exception) {
            return null;
        } finally {
            \libxml_clear_errors();
            \libxml_use_internal_errors($useInternalErrors);
        }

        if ($xml->getName() !== 'Error') {
            return null;
        }

        $code = (string) $xml->Code;
        if ($code === '') {
            $code = null;
        }
        $message = (string) $xml->Message;
        $requestId = (string) $xml->RequestId;
        $requestId = $requestId !== '' ? $requestId : null;
        $hostId = (string) $xml->HostId;

        $error = self::createError(
            $operation,
            $code,
            $message,
            $requestId
        );
        self::applyRetrySafety($error, $code);
        if ($hostId !== ''
            && $error instanceof AwsExtendedRequestIdInterface
        ) {
            $error->setExtendedRequestId($hostId);
        }

        return $error;
    }

    /**
     * Test whether a body begins like an XML document with an `Error` root
     * element.
     *
     * Reads only the leading bytes: it skips a UTF-8 BOM, optional leading
     * whitespace, an XML declaration and comments, and then requires an
     * `<Error>` start tag. A body that is not XML, is too large, or has a
     * different root element returns false and takes the normal path.
     */
    private static function looksLikeErrorXml(string $body): bool
    {
        if ($body === ''
            || \strlen($body) > self::MAX_PARSE_BYTES
        ) {
            return false;
        }

        return \preg_match(
            '/^(?:\xEF\xBB\xBF)?\s*(?:<\?xml[^>]*\?>\s*)?'
                . '(?:<!--.*?-->\s*)*<Error(?:\s|>|\/)/s',
            $body
        ) === 1;
    }

    /**
     * Create the AWS error for the parsed code, preferring a modeled error
     * class from the operation and falling back to the service exception.
     */
    private static function createError(
        OperationInterface $operation,
        ?string $code,
        string $message,
        ?string $requestId
    ): \Throwable
    {
        $defaultMessage = $message !== ''
            ? $message
            : 'HTTP 200: ' . ($code ?? 'Unknown');

        $modeledClass = $code !== null
            ? $operation->resolveErrorSchema($code)
                ?->resolveTarget()
                ->targetClass
            : null;
        if ($modeledClass !== null
            && \is_a($modeledClass, AwsErrorInterface::class, true)
            && \method_exists($modeledClass, 'fromMembers')
        ) {
            /** @var AwsErrorInterface&ApiException $modeled */
            $modeled = $modeledClass::fromMembers([]);
            $modeled->setAwsErrorMetadata(
                $defaultMessage,
                $code,
                $requestId,
                self::HTTP_OK
            );

            return $modeled;
        }

        $errorClass = $operation->getServiceExceptionClass();
        if ($errorClass === ApiException::class
            || !\is_a($errorClass, AwsErrorInterface::class, true)
        ) {
            return new ApiException($defaultMessage, ErrorFault::Client);
        }

        return $errorClass::fromAwsError(
            $defaultMessage,
            ErrorFault::Client,
            null,
            $code,
            $requestId,
            self::HTTP_OK
        );
    }

    /**
     * Mark the error retryable for the error codes the specification calls out.
     *
     * `SlowDown` becomes a retryable throttle and `InternalError` a retryable
     * server error, so the retry strategy retries them as it would a generic
     * 5XX. Any other code keeps the error's default classification.
     *
     * @return void
     */
    private static function applyRetrySafety(
        \Throwable $error,
        ?string $code
    ): void
    {
        if (!$error instanceof ApiException) {
            return;
        }
        if ($code === self::SLOW_DOWN_CODE) {
            $error->applyRetryableTrait(true);
        } elseif ($code === self::INTERNAL_ERROR_CODE) {
            $error->applyRetryableTrait(false);
        }
    }
}
