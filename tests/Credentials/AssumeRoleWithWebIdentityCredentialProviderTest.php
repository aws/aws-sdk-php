<?php
namespace Aws\Test\Credentials;

use Aws\Command;
use Aws\Credentials\AssumeRoleWithWebIdentityCredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\Sts\StsClient;
use Aws\Sts\Exception\StsException;
use Aws\Api\DateTimeResult;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\RejectedPromise;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Credentials\AssumeRoleWithWebIdentityCredentialProvider
 */
class AssumeRoleWithWebIdentityCredentialProviderTest extends TestCase
{
    const SAMPLE_ROLE_ARN = 'arn:aws:iam::012345678910:role/role_name';

    use UsesServiceTrait;

    private function clearEnv()
    {
        putenv('AWS_ROLE_SESSION_NAME');
        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public function testEnsureRoleArnProvidedForAssumeRole()
    {
        $this->expectExceptionMessage("Missing required 'AssumeRoleWithWebIdentityCredentialProvider' configuration option:");
        $this->expectException(\InvalidArgumentException::class);
        $config = [
            'WebIdentityTokenFile' => '/path/to/token/file',
        ];
        new AssumeRoleWithWebIdentityCredentialProvider($config);
    }

    public function testEnsureWebIdentityTokenFileProvidedForAssumeRole()
    {
        $this->expectExceptionMessage("Missing required 'AssumeRoleWithWebIdentityCredentialProvider' configuration option:");
        $this->expectException(\InvalidArgumentException::class);
        $config = [
            'RoleArn' => self::SAMPLE_ROLE_ARN,
        ];
        new AssumeRoleWithWebIdentityCredentialProvider($config);
    }

    public function testEnsureWebIdentityTokenFileIsAbsolutePath()
    {
        $this->expectExceptionMessage("'WebIdentityTokenFile' must be an absolute path.");
        $this->expectException(\InvalidArgumentException::class);
        $config = [
            'RoleArn' => self::SAMPLE_ROLE_ARN,
            'WebIdentityTokenFile' => '..\foo\path'
        ];
        new AssumeRoleWithWebIdentityCredentialProvider($config);
    }

    public function testCanLoadAssumeRoleWithWebIdentityCredentials()
    {
        $dir = $this->clearEnv();
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $tokenPath = $dir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(
            function ($c, $r) use ($result) {
                $this->assertSame('fooSession', $c->toArray()['RoleSessionName']);
                return Promise\Create::promiseFor(new Result($result));
            }
        );

        $args['client'] = $sts;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = $tokenPath;
        $args['SessionName'] = 'fooSession';
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        $creds = $provider()->wait();

        try {
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('bar', $creds->getSecretKey());
            $this->assertSame('baz', $creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Error $e) {
            throw $e;
        } finally {
            unlink($tokenPath);
        }
    }

    public function testSetsSessionNameWhenNotProvided()
    {
        $dir = $this->clearEnv();
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];

        $tokenPath = $dir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $sts = $this->getTestClient('Sts', ['credentials' => false]);
        $sts->getHandlerList()->setHandler(
            function ($c, $r) use ($result) {
                $this->assertStringContainsString('aws-sdk-php-', $c->toArray()['RoleSessionName']);
                return Promise\Create::promiseFor(new Result($result));
            }
        );

        $args['client'] = $sts;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = $tokenPath;
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        $creds = $provider()->wait();
        unlink($tokenPath);
    }

    public function testThrowsExceptionWhenReadingTokenFileFails()
    {
        $this->expectExceptionMessage("Error reading WebIdentityTokenFile");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = '/foo';
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        $provider()->wait();
    }

    public function testThrowsExceptionWhenEmptyTokenFile()
    {
        $dir = $this->clearEnv();
        $tokenPath = $dir . '/emptyTokenFile';
        $args['WebIdentityTokenFile'] = $tokenPath;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        file_put_contents($tokenPath, '');

        try {
            $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
            $provider()->wait();
            $this->fail("Should have thrown an exception");
        } catch (\Exception $e) {
            self::assertInstanceOf('\Aws\Exception\CredentialsException', $e);
            self::assertStringContainsString('Error reading WebIdentityTokenFile', $e->getMessage());
        } finally {
            unlink($tokenPath);
        }
    }

    public function testThrowsExceptionWhenRetrievingAssumeRoleCredentialFails()
    {
        $this->expectExceptionMessage("Error assuming role from web identity credentials");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => false,
            'http_handler' => function () {
                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $this->getMockBuilder(AwsException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'result' => null,
                ]);
            }
        ]);

        $tokenPath = $dir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $args['client'] = $sts;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = $tokenPath;
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        try {
            $provider()->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($tokenPath);
        }
    }

    public function testThrowsNonAwsExceptionWhenRetrievingAssumeRoleCredentialFails()
    {
        $this->expectExceptionMessage("Error retrieving web identity credentials: Found 1 error while validating the input provided for the AssumeRoleWithWebIdentity operation:");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => false,
            'http_handler' => function () {
                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => new \Exception("", 0),
                    'result' => null,
                ]);
            }
        ]);

        $tokenPath = $dir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $args['client'] = $sts;
        $args['RoleArn'] = "invalidrole";
        $args['WebIdentityTokenFile'] = $tokenPath;
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        try {
            $provider()->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($tokenPath);
        }
    }

    public function testRetryInvalidIdentityToken()
    {
        $dir = $this->clearEnv();
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $retries = 1;

        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => false,
            'handler' => function () use (&$retries, $result) {
                if (0 === $retries--) {
                    return Promise\Create::promiseFor(new Result($result));
                }

                return new StsException(
                    "foo",
                    new Command("foo"),
                    ['code' => 'InvalidIdentityToken']
                );
            }
        ]);

        $tokenPath = $dir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $args['client'] = $sts;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = $tokenPath;
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        $creds = $provider()->wait();
        try {
            $this->assertSame('foo', $creds->getAccessKeyId());
            $this->assertSame('bar', $creds->getSecretKey());
            $this->assertSame('baz', $creds->getSecurityToken());
            $this->assertIsInt($creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($tokenPath);
        }
    }

    public function testThrowsExceptionWhenInvalidIdentityTokenRetriesExhausted()
    {
        $this->expectExceptionMessage("InvalidIdentityToken, retries exhausted");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $retries = 4;

        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => false,
            'handler' => function () use (&$retries, $result) {
                if (0 === $retries--) {
                    return Promise\Create::promiseFor(new Result($result));
                }

                return new StsException(
                    "foo",
                    new Command("foo"),
                    ['code' => 'InvalidIdentityToken']
                );
            }
        ]);

        $tokenPath = $dir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $args['client'] = $sts;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = $tokenPath;
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        try {
            $provider()->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($tokenPath);
        }
    }

    public function testCanDisableInvalidIdentityTokenRetries()
    {
        $this->expectExceptionMessage("InvalidIdentityToken, retries exhausted");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $dir = $this->clearEnv();
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => 'baz',
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
        ];
        $retries = 1;

        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => false,
            'handler' => function () use (&$retries, $result) {
                if (0 === $retries--) {
                    return Promise\Create::promiseFor(new Result($result));
                }

                return new StsException(
                    "foo",
                    new Command("foo"),
                    ['code' => 'InvalidIdentityToken']
                );
            }
        ]);

        $tokenPath = $dir . '/my-token.jwt';
        file_put_contents($tokenPath, 'token');

        $args = [
            'client' => $sts,
            'RoleArn' => self::SAMPLE_ROLE_ARN,
            'WebIdentityTokenFile' => $tokenPath,
            'retries' => 0
        ];
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        try {
            $provider()->wait();
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($tokenPath);
        }
    }
}
