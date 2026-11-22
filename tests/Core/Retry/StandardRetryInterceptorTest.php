<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Retry;

use Aws\Core\Exception\AwsException;
use Aws\Core\Retry\RetryMetadataException;
use Aws\Core\Retry\StandardRetryInterceptor;
use Aws\Tests\Core\Retry\Utils\ModeledRetryError;
use Aws\Tests\Core\Retry\Utils\RetryTestClient;
use Aws\Tests\Core\Retry\Utils\ThrottlingShapeError;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Core\Exception\ErrorFault;
use Smithy\Http\Client\Exception\HttpException;
use Smithy\Http\Message\{HttpTransportResponse, Request, Response, Uri};

final class StandardRetryInterceptorTest extends TestCase
{
    public function testReturnsOutputWhenAttemptSucceeded(): void
    {
        $ctx = $this->context(new Response(200));

        $this->assertSame(
            $ctx->output,
            StandardRetryInterceptor::instance()
                ->modifyBeforeAttemptCompletion($ctx, null)
        );
    }

    public function testTransportFailureIsRetryable(): void
    {
        $error = new HttpException(
            'transport failed',
            new Request('POST', new Uri('https://example.test'))
        );

        $wrapped = $this->attemptFailure($this->context(null), $error);

        $this->assertTrue($wrapped->retryable);
        $this->assertFalse($wrapped->throttling);
        $this->assertNull($wrapped->retryAfterSeconds);
        $this->assertSame($error, RetryMetadataException::unwrap($wrapped));
    }

    public function testRetryAfterHeaderAndSlowDownAreThrottling(): void
    {
        $ctx = $this->context(
            new Response(503, ['x-amz-retry-after' => '1500'])
        );

        $wrapped = $this->attemptFailure(
            $ctx,
            $this->awsError('SlowDown', 503)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertTrue($wrapped->throttling);
        $this->assertSame(1.5, $wrapped->retryAfterSeconds);
    }

    public function testRetryAfterHeaderAloneMakesErrorRetryable(): void
    {
        $ctx = $this->context(
            new Response(400, ['x-amz-retry-after' => '250'])
        );

        $wrapped = $this->attemptFailure(
            $ctx,
            $this->awsError('ValidationException', 400)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertFalse($wrapped->throttling);
        $this->assertSame(0.25, $wrapped->retryAfterSeconds);
    }

    public function testNonNumericRetryAfterHeaderIsIgnored(): void
    {
        $ctx = $this->context(
            new Response(500, ['x-amz-retry-after' => 'soon'])
        );

        $wrapped = $this->attemptFailure(
            $ctx,
            $this->awsError('InternalFailure', 500)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertNull($wrapped->retryAfterSeconds);
    }

    public function testStatus429IsThrottling(): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(new Response(429)),
            $this->awsError('Unknown', 429)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertTrue($wrapped->throttling);
    }

    /**
     * @return array<string, array{string}>
     */
    public static function throttlingCodeProvider(): array
    {
        return [
            'Throttling' => ['Throttling'],
            'ThrottlingException' => ['ThrottlingException'],
            'RequestLimitExceeded' => ['RequestLimitExceeded'],
            'ProvisionedThroughputExceededException' => [
                'ProvisionedThroughputExceededException'
            ],
        ];
    }

    #[DataProvider('throttlingCodeProvider')]
    public function testThrottlingErrorCodeIsThrottling(string $code): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(new Response(400)),
            $this->awsError($code, 400)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertTrue($wrapped->throttling);
    }

    /**
     * @return array<string, array{int}>
     */
    public static function transientStatusProvider(): array
    {
        return [
            '500' => [500],
            '502' => [502],
            '503' => [503],
            '504' => [504],
        ];
    }

    #[DataProvider('transientStatusProvider')]
    public function testTransientStatusIsRetryable(int $status): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(new Response($status)),
            $this->awsError('ServiceUnavailable', $status)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertFalse($wrapped->throttling);
    }

    public function testStatusFromErrorIsUsedWithoutResponse(): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(null),
            $this->awsError('Unknown', 502)
        );

        $this->assertTrue($wrapped->retryable);
    }

    public function testTransientErrorCodeIsRetryable(): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(null),
            $this->awsError('RequestTimeout', 400)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertFalse($wrapped->throttling);
    }

    public function testStsCommunicationErrorIsRetryableForSts(): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(new Response(400), 'sts'),
            $this->awsError('IDPCommunicationError', 400)
        );

        $this->assertTrue($wrapped->retryable);
    }

    public function testStsCommunicationErrorIsNotRetriedForOtherServices(): void
    {
        $error = $this->awsError('IDPCommunicationError', 400);

        $this->assertSame(
            $error,
            $this->thrown($this->context(new Response(400)), $error)
        );
    }

    public function testNonRetryableErrorIsRethrownUnwrapped(): void
    {
        $error = $this->awsError('ValidationException', 400);

        $this->assertSame(
            $error,
            $this->thrown($this->context(new Response(400)), $error)
        );
    }

    public function testModeledRetryableErrorIsRetryable(): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(new Response(400)),
            new ModeledRetryError(true)
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertFalse($wrapped->throttling);
    }

    public function testModeledThrottlingErrorIsThrottling(): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(new Response(400)),
            new ModeledRetryError('{"throttling":true}')
        );

        $this->assertTrue($wrapped->retryable);
        $this->assertTrue($wrapped->throttling);
    }

    public function testShapeIdNameIsUsedAsErrorCode(): void
    {
        $wrapped = $this->attemptFailure(
            $this->context(new Response(400)),
            new ThrottlingShapeError('throttled')
        );

        $this->assertTrue($wrapped->throttling);
    }

    public function testCompletionUnwrapsRetryMetadata(): void
    {
        $error = new \RuntimeException('boom');

        try {
            StandardRetryInterceptor::instance()->modifyBeforeCompletion(
                $this->context(null),
                RetryMetadataException::wrap($error, retryable: true)
            );
            $this->fail('Expected exception was not thrown');
        } catch (\RuntimeException $thrown) {
            $this->assertSame($error, $thrown);
        }
    }

    public function testCompletionRethrowsOtherErrors(): void
    {
        $error = new \RuntimeException('boom');

        try {
            StandardRetryInterceptor::instance()->modifyBeforeCompletion(
                $this->context(null),
                $error
            );
            $this->fail('Expected exception was not thrown');
        } catch (\RuntimeException $thrown) {
            $this->assertSame($error, $thrown);
        }
    }

    public function testCompletionReturnsOutputWithoutError(): void
    {
        $ctx = $this->context(new Response(200));

        $this->assertSame(
            $ctx->output,
            StandardRetryInterceptor::instance()
                ->modifyBeforeCompletion($ctx, null)
        );
    }

    private function context(
        ?Response $response,
        string $signingName = 'retry'
    ): OutputContext
    {
        $client = RetryTestClient::forModel($signingName);
        $operation = $client->operation('Ping');
        $input = $operation->createInput([]);

        return new OutputContext(
            operation: $operation,
            input: $input,
            config: $client->getConfig(),
            request: null,
            response: $response === null
                ? null
                : new HttpTransportResponse($response),
            output: $input
        );
    }

    private function awsError(string $code, int $status): AwsException
    {
        return new AwsException(
            message: $code,
            fault: ErrorFault::Server,
            awsErrorCode: $code,
            requestId: 'abc123',
            httpStatusCode: $status
        );
    }

    private function attemptFailure(
        OutputContext $ctx,
        \Throwable $error
    ): RetryMetadataException
    {
        $thrown = $this->thrown($ctx, $error);
        $this->assertInstanceOf(RetryMetadataException::class, $thrown);

        return $thrown;
    }

    private function thrown(
        OutputContext $ctx,
        \Throwable $error
    ): \Throwable
    {
        try {
            StandardRetryInterceptor::instance()
                ->modifyBeforeAttemptCompletion($ctx, $error);
        } catch (\Throwable $thrown) {
            return $thrown;
        }

        $this->fail('Expected exception was not thrown');
    }
}
