<?php

namespace Aws\Test\Auth;

use Aws\Auth\Exception\UnresolvedAuthSchemeException;
use Aws\Auth\AuthSchemeResolver;
use Aws\Identity\AwsCredentialIdentity;
use Aws\Identity\BearerTokenIdentity;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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
     * @dataProvider schemeForIdentityProvider
     */
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

    public function schemeForIdentityProvider()
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
        $method->setAccessible(true);
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
        $method->setAccessible(true);
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
     * @dataProvider fallsBackWhenIdentityNotAvailableProvider
     */
    public function testFallsBackWhenIdentityNotAvailable(
        $credentialProvider,
        $tokenProvider,
        $authSchemes,
        $expected
    )
    {
        if ($expected === 'error') {
            $this->expectException(UnresolvedAuthSchemeException::class);
        }
        $resolver = new AuthSchemeResolver($credentialProvider, $tokenProvider);
        $this->assertEquals($expected, $resolver->selectAuthScheme($authSchemes));
    }

    public function fallsBackWhenIdentityNotAvailableProvider()
    {
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
        $badCredentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(BearerTokenIdentity::class)
            );
        };
        $badTokenProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };

        return [
            [$credentialProvider, $tokenProvider, ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'], 'v4'],
            [$badCredentialProvider, $tokenProvider, ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'], 'bearer'],
            [$credentialProvider, $badTokenProvider, ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'], 'v4'],
            [$badCredentialProvider, $badTokenProvider, ['aws.auth#sigv4', 'smithy.api#httpBearerAuth'], 'error'],
            [$badCredentialProvider, $tokenProvider, ['aws.auth#sigv4'], 'error']
        ];
    }
}
