<?php

namespace Aws\Test\Auth;

use Aws\Auth\Exception\UnresolvedAuthSchemeException;
use Aws\Auth\AuthSchemeResolver;
use Aws\Identity\AwsCredentialIdentity;
use Aws\Identity\BearerTokenIdentity;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class AuthSchemeResolverTest extends TestCase
{
    public function testUsesDefaultSchemeMapWhenNoneProvided()
    {
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $resolver = new AuthSchemeResolver($credentialProvider);
        $this->assertEquals('v4', $resolver->selectAuthScheme(['aws.auth#sigv4']));
    }

    public function testAcceptsCustomSchemeMap()
    {
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $customMap = ['custom.auth#example' => 'v4'];
        $resolver = new AuthSchemeResolver($credentialProvider, null, $customMap);
        $this->assertEquals('v4', $resolver->selectAuthScheme(['custom.auth#example']));
    }

    /**

 */
    #[DataProvider('schemeForIdentityProvider')]
    public function testSelectAuthSchemeReturnsCorrectSchemeForIdentity(
        $authScheme,
        $expectedSignatureVersion,
        $args = []
    ){
        if ($expectedSignatureVersion === 'v4a'
            && !extension_loaded('awscrt')
        ) {
            $this->markTestSkipped();
        }

        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $tokenProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(BearerTokenIdentity::class)
            );
        };
        $resolver = new AuthSchemeResolver($credentialProvider, $tokenProvider);
        $this->assertEquals($expectedSignatureVersion, $resolver->selectAuthScheme($authScheme, $args));
    }

    public static function schemeForIdentityProvider()
    {
        return [
          [
              ['smithy.api#httpBearerAuth'],
              'bearer'
          ] ,
          [
              ['aws.auth#sigv4'],
              'v4'
          ],
          [
              ['aws.auth#sigv4'],
              'v4-unsigned-body',
              ['unsigned_payload' => true]
          ],
          [
              ['aws.auth#sigv4a'],
              'v4a'
          ],
          [
              ['smithy.api#noAuth'],
              'anonymous'
          ],
        ];
    }

    public function testSelectAuthSchemeThrowsExceptionWhenNoCompatibleScheme()
    {
        $this->expectException(UnresolvedAuthSchemeException::class);
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $resolver = new AuthSchemeResolver($credentialProvider);
        $resolver->selectAuthScheme(['non.existent#scheme']);
    }

    public function testSelectAuthSchemePrioritizesFirstCompatibleScheme()
    {
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $resolver = new AuthSchemeResolver($credentialProvider);
        $this->assertEquals('v4', $resolver->selectAuthScheme(['aws.auth#sigv4', 'aws.auth#sigv4a']));
    }

    public function testSelectAuthSchemeSkipsIncompatible()
    {
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $resolver = new AuthSchemeResolver($credentialProvider);
        $this->assertEquals(
            'v4',
            $resolver->selectAuthScheme(['smithy.api#httpBearerAuth', 'aws.auth#sigv4'])
        );
    }

    public function testIsCompatibleAuthSchemeReturnsTrueForValidScheme()
    {
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $resolver = new AuthSchemeResolver($credentialProvider);
        $reflection = new \ReflectionClass($resolver);
        $method = $reflection->getMethod('isCompatibleAuthScheme');
        $this->assertTrue($method->invokeArgs($resolver, ['v4']));
    }

    public function testIsCompatibleAuthSchemeReturnsFalseForInvalidScheme()
    {
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $resolver = new AuthSchemeResolver($credentialProvider);
        $reflection = new \ReflectionClass($resolver);
        $method = $reflection->getMethod('isCompatibleAuthScheme');
        $this->assertFalse($method->invokeArgs($resolver, ['invalidScheme']));
    }

    public function testMissingRequiredIdentityThrows()
    {
        $this->expectException(UnresolvedAuthSchemeException::class);
        $this->expectExceptionMessage(
            'Could not resolve an authentication scheme: Signature V4 requires AWS credentials '
            . 'for request signing; Anonymous signatures require AWS credentials for request '
            . 'signing; Bearer token credentials must be provided to use Bearer authentication'
        );

        $credentialProvider = function () {
            return null;
        };
        $tokenProvider = $credentialProvider;

        $resolver = new AuthSchemeResolver($credentialProvider, $tokenProvider);
        $resolver->selectAuthScheme(['aws.auth#sigv4', 'smithy.api#noAuth', 'smithy.api#httpBearerAuth']);
    }

    public function testUnmetV4aRequirementsThrows()
    {
        $this->expectException(UnresolvedAuthSchemeException::class);
        $this->expectExceptionMessage(
           'The aws-crt-php extension and AWS credentials are required to use Signature V4A'
        );

        $credentialProvider = function () {
            if (!extension_loaded('awscrt')) {
                return Promise\Create::promiseFor(
                    $this->createMock(AwsCredentialIdentity::class)
                );
            }
            return null;
        };
        $resolver = new AuthSchemeResolver($credentialProvider);
        $resolver->selectAuthScheme(['aws.auth#sigv4a']);
    }

    /**

 */
    #[DataProvider('fallsBackWhenIdentityNotAvailableProvider')]
    public function testFallsBackWhenIdentityNotAvailable(
        string $credentialIdentityClass,
        string $tokenIdentityClass,
        array $authSchemes,
        string $expected
    )
    {
        $credentialProvider = function () use ($credentialIdentityClass) {
            return Promise\Create::promiseFor(
                $this->createMock($credentialIdentityClass)
            );
        };
        $tokenProvider = function () use ($tokenIdentityClass) {
            return Promise\Create::promiseFor(
                $this->createMock($tokenIdentityClass)
            );
        };
        if ($expected === 'error') {
            $this->expectException(UnresolvedAuthSchemeException::class);
        }
        $resolver = new AuthSchemeResolver($credentialProvider, $tokenProvider);
        $this->assertEquals($expected, $resolver->selectAuthScheme($authSchemes));
    }

    public static function fallsBackWhenIdentityNotAvailableProvider(): array
    {
        $credentialIdentity = AwsCredentialIdentity::class;
        $tokenIdentity = BearerTokenIdentity::class;

        return [
            'credential_provider' => [
                'credential_identity' => $credentialIdentity,
                'token_identity' => $tokenIdentity,
                'auth_schemes' => ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'],
                'resolved_auth_scheme' => 'v4'
            ],
            'bad_credential_provider' => [
                'credential_identity' => $tokenIdentity,
                'token_identity' => $tokenIdentity,
                'auth_schemes' => ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'],
                'resolved_auth_scheme' => 'bearer'
            ],
            'bad_token_provider' => [
                'credential_identity' => $credentialIdentity,
                'token_identity' => $credentialIdentity,
                'auth_schemes' => ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'],
                'resolved_auth_scheme' => 'v4'
            ],
            'bad_credential_provider_2' => [
                'credential_identity' => $tokenIdentity,
                'token_identity' => $credentialIdentity,
                'auth_schemes' => ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'],
                'resolved_auth_scheme' => 'error'
            ],
            'bad_credential_provider_3' => [
                'credential_identity' => $tokenIdentity,
                'token_identity' => $tokenIdentity,
                'auth_schemes' => ['aws.auth#sigv4'],
                'resolved_auth_scheme' => 'error'
            ]
        ];
    }
}
