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
              ['smithy.auth#noAuth'],
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
}
