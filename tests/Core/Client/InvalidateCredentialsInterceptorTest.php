<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Client\InvalidateCredentialsInterceptor;
use Aws\Core\Exception\AwsException;
use Aws\Core\Retry\RetryMetadataException;
use Aws\Tests\Core\Client\Utils\{
    QueryCodeError,
    ShapeIdError
};
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\Aws\AwsCredentials;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Protocol\Aws\RestJsonProtocol;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class InvalidateCredentialsInterceptorTest extends TestCase
{
    #[DataProvider('invalidCredentialCodes')]
    public function testInvalidatesRejectedCredentials(string $code): void
    {
        $identity = new AwsCredentials('rejected', 'secret');
        $resolver = $this->createMock(IdentityResolverInterface::class);
        $resolver
            ->expects($this->once())
            ->method('invalidate')
            ->with($identity);

        InvalidateCredentialsInterceptor::instance()->readAfterAttempt(
            $this->context($identity, $resolver),
            new AwsException('rejected', awsErrorCode: $code)
        );
    }

    public function testDoesNotInvalidateAuthorizationFailure(): void
    {
        $identity = new AwsCredentials('current', 'secret');
        $resolver = $this->createMock(IdentityResolverInterface::class);
        $resolver->expects($this->never())->method('invalidate');

        InvalidateCredentialsInterceptor::instance()->readAfterAttempt(
            $this->context($identity, $resolver),
            new AwsException('denied', awsErrorCode: 'AccessDenied')
        );
    }

    #[DataProvider('invalidCredentialErrors')]
    public function testReadsTheCodeFromEachErrorForm(\Throwable $error): void
    {
        $identity = new AwsCredentials('rejected', 'secret');
        $resolver = $this->createMock(IdentityResolverInterface::class);
        $resolver
            ->expects($this->once())
            ->method('invalidate')
            ->with($identity);

        InvalidateCredentialsInterceptor::instance()->readAfterAttempt(
            $this->context($identity, $resolver),
            $error
        );
    }

    /**
     * @return array<string, array{\Throwable}>
     */
    public static function invalidCredentialErrors(): array
    {
        return [
            'retry metadata wrapper' => [
                RetryMetadataException::wrap(
                    new AwsException('expired', awsErrorCode: 'ExpiredToken'),
                    retryable: false
                )
            ],
            'query error code constant' => [new QueryCodeError('expired')],
            'shape ID constant' => [new ShapeIdError('invalid')]
        ];
    }

    public function testIgnoresErrorsWithoutACode(): void
    {
        $identity = new AwsCredentials('current', 'secret');
        $resolver = $this->createMock(IdentityResolverInterface::class);
        $resolver->expects($this->never())->method('invalidate');

        InvalidateCredentialsInterceptor::instance()->readAfterAttempt(
            $this->context($identity, $resolver),
            new \RuntimeException('network')
        );
        InvalidateCredentialsInterceptor::instance()->readAfterAttempt(
            $this->context($identity, $resolver),
            new AwsException('empty', awsErrorCode: '')
        );
    }

    public function testDoesNothingOnSuccess(): void
    {
        $identity = new AwsCredentials('current', 'secret');
        $resolver = $this->createMock(IdentityResolverInterface::class);
        $resolver->expects($this->never())->method('invalidate');

        InvalidateCredentialsInterceptor::instance()->readAfterAttempt(
            $this->context($identity, $resolver),
            null
        );
    }

    public function testDoesNothingWithoutAResolvedIdentity(): void
    {
        $resolver = $this->createMock(IdentityResolverInterface::class);
        $resolver->expects($this->never())->method('invalidate');

        InvalidateCredentialsInterceptor::instance()->readAfterAttempt(
            $this->context(null, $resolver),
            new AwsException('expired', awsErrorCode: 'ExpiredToken')
        );
    }

    public function testInstanceIsShared(): void
    {
        $this->assertSame(
            InvalidateCredentialsInterceptor::instance(),
            InvalidateCredentialsInterceptor::instance()
        );
    }

    /**
     * @return array<string, array{string}>
     */
    public static function invalidCredentialCodes(): array
    {
        return [
            'expired token' => ['ExpiredToken'],
            'invalid token' => ['InvalidToken']
        ];
    }

    private function context(
        ?AwsCredentials $identity,
        IdentityResolverInterface $resolver
    ): OutputContext
    {
        return new OutputContext(
            $this->createStub(OperationInterface::class),
            $this->createStub(SerializableStructInterface::class),
            new ClientConfig(
                transport: new HttpClientTransport(new MockHttpClient()),
                endpointResolver:
                    $this->createStub(EndpointResolverInterface::class),
                protocol: new RestJsonProtocol()
            ),
            null,
            null,
            null,
            $identity,
            $resolver
        );
    }
}
