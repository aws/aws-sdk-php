<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Client\InvalidateCredentialsInterceptor;
use Smithy\Auth\Aws\AwsCredentials;
use Aws\Core\Exception\AwsException;
use Smithy\Protocol\Aws\RestJsonProtocol;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Client\HttpClientTransport;
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
        AwsCredentials $identity,
        IdentityResolverInterface $resolver
    ): OutputContext {
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
