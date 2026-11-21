<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Smithy\Auth\Aws\AwsCredentials;
use Aws\Core\Credentials\Provider\BoundContextCredentialProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\IdentityInterface;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\IdentityResult;

/**
 * Tests for {@see BoundContextCredentialProvider} — verifies that the
 * decorator merges the bound context into the caller-supplied
 * properties, with caller-supplied taking precedence.
 */
final class BoundContextCredentialProviderTest extends TestCase
{
    public function testBoundContextIsPassedToInner(): void
    {
        $capture = new class implements IdentityResolverInterface {
            /** @var array<string, mixed>|null */
            public ?array $seen = null;

            public function resolveIdentity(array $properties = []): IdentityResult
            {
                $this->seen = $properties;

                return IdentityResult::success(
                    new AwsCredentials('AKID', 'SECRET')
                );
            }

            public function invalidate(
                IdentityInterface $rejectedIdentity
            ): void {}
        };

        $provider = new BoundContextCredentialProvider(
            $capture,
            ['region' => 'us-east-1', 'useFips' => true],
        );
        $provider->resolveIdentity()->unwrap();

        $this->assertSame(
            ['region' => 'us-east-1', 'useFips' => true],
            $capture->seen,
        );
    }

    public function testCallerPropertiesWinOnCollision(): void
    {
        $capture = new class implements IdentityResolverInterface {
            /** @var array<string, mixed>|null */
            public ?array $seen = null;

            public function resolveIdentity(array $properties = []): IdentityResult
            {
                $this->seen = $properties;

                return IdentityResult::success(
                    new AwsCredentials('AKID', 'SECRET')
                );
            }

            public function invalidate(
                IdentityInterface $rejectedIdentity
            ): void {}
        };

        $provider = new BoundContextCredentialProvider(
            $capture,
            ['region' => 'us-east-1', 'useFips' => false],
        );
        $provider->resolveIdentity(['region' => 'us-west-2'])->unwrap();

        // Region overridden by caller, useFips inherited from bound context.
        $this->assertSame('us-west-2', $capture->seen['region']);
        $this->assertFalse($capture->seen['useFips']);
    }

    public function testReturnsUnderlyingIdentity(): void
    {
        $creds = new AwsCredentials('AKID', 'SECRET');
        $inner = new class ($creds) implements IdentityResolverInterface {
            public function __construct(private readonly AwsCredentials $creds) {}
            public function resolveIdentity(array $properties = []): IdentityResult
            {
                return IdentityResult::success($this->creds);
            }

            public function invalidate(
                IdentityInterface $rejectedIdentity
            ): void {}
        };

        $provider = new BoundContextCredentialProvider($inner, []);
        $this->assertSame($creds, $provider->resolveIdentity()->unwrap());
    }

    public function testForwardsRejectedIdentity(): void
    {
        $creds = new AwsCredentials('AKID', 'SECRET');
        $inner = new class($creds) implements IdentityResolverInterface {
            public ?IdentityInterface $invalidated = null;

            public function __construct(
                private readonly AwsCredentials $creds
            ) {}

            public function resolveIdentity(
                array $properties = []
            ): IdentityResult {
                return IdentityResult::success($this->creds);
            }

            public function invalidate(
                IdentityInterface $rejectedIdentity
            ): void {
                $this->invalidated = $rejectedIdentity;
            }
        };
        $provider = new BoundContextCredentialProvider($inner, []);

        $provider->invalidate($creds);

        $this->assertSame($creds, $inner->invalidated);
    }
}
