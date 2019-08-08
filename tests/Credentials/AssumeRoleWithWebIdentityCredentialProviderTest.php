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
use PHPUnit\Framework\TestCase;

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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing required 'AssumeRoleWithWebIdentityCredentialProvider' configuration option:
     */
    public function testEnsureRoleArnProvidedForAssumeRole()
    {
        $config = [
            'WebIdentityTokenFile' => '/path/to/token/file',
        ];
        new AssumeRoleWithWebIdentityCredentialProvider($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing required 'AssumeRoleWithWebIdentityCredentialProvider' configuration option:
     */
    public function testEnsureWebIdentityTokenFileProvidedForAssumeRole()
    {
        $config = [
            'RoleArn' => self::SAMPLE_ROLE_ARN,
        ];
        new AssumeRoleWithWebIdentityCredentialProvider($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage 'WebIdentityTokenFile' must be an absolute path.
     */
    public function testEnsureWebIdentityTokenFileIsAbsolutePath()
    {
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
                $this->assertEquals('fooSession', $c->toArray()['RoleSessionName']);
                return Promise\promise_for(new Result($result));
            }
        );

        $args['client'] = $sts;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = $tokenPath;
        $args['SessionName'] = 'fooSession';
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        $creds = $provider()->wait();

        try {
            $this->assertEquals('foo', $creds->getAccessKeyId());
            $this->assertEquals('bar', $creds->getSecretKey());
            $this->assertEquals('baz', $creds->getSecurityToken());
            $this->assertInternalType('int', $creds->getExpiration());
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
                $this->assertContains('aws-sdk-php-', $c->toArray()['RoleSessionName']);
                return Promise\promise_for(new Result($result));
            }
        );

        $args['client'] = $sts;
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = $tokenPath;
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        $creds = $provider()->wait();
        unlink($tokenPath);
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error reading WebIdentityTokenFile
     */
    public function testThrowsExceptionWhenReadingTokenFileFails()
    {
        $args['RoleArn'] = self::SAMPLE_ROLE_ARN;
        $args['WebIdentityTokenFile'] = '/foo';
        $provider = new AssumeRoleWithWebIdentityCredentialProvider($args);
        $provider()->wait();
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error assuming role from web identity credentials
     */
    public function testThrowsExceptionWhenRetrievingAssumeRoleCredentialFails()
    {
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
                    return Promise\promise_for(new Result($result));
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
            $this->assertEquals('foo', $creds->getAccessKeyId());
            $this->assertEquals('bar', $creds->getSecretKey());
            $this->assertEquals('baz', $creds->getSecurityToken());
            $this->assertInternalType('int', $creds->getExpiration());
            $this->assertFalse($creds->isExpired());
        } catch (\Exception $e) {
            throw $e;
        } finally {
            unlink($tokenPath);
        }
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage InvalidIdentityToken, retries exhausted
     */
    public function testThrowsExceptionWhenInvalidIdentityTokenRetriesExhausted()
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
        $retries = 4;

        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => false,
            'handler' => function () use (&$retries, $result) {
                if (0 === $retries--) {
                    return Promise\promise_for(new Result($result));
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

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage InvalidIdentityToken, retries exhausted
     */
    public function testCanDisableInvalidIdentityTokenRetries()
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
                    return Promise\promise_for(new Result($result));
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
