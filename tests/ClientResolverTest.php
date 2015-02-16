<?php
namespace Aws\Test;

use Aws\ClientResolver;
use Aws\Credentials\Credentials;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use GuzzleHttp\Client;
use Aws\Credentials\CredentialProvider;
use GuzzleHttp\Event\Emitter;

/**
 * @covers Aws\ClientResolver
 */
class ClientResolverTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing required client configuration options
     */
    public function testEnsuresRequiredArgumentsAreProvided()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([], new Emitter());
    }

    public function testAddsValidationSubscriber()
    {
        $c = new DynamoDbClient([
            'region'  => 'x',
            'version' => 'latest'
        ]);

        try {
            // CreateTable requires actual input parameters.
            $c->createTable([]);
            $this->fail('Did not validate');
        } catch (AwsException $e) {}
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessage Throwing!
     */
    public function testCanDisableValidation()
    {
        $c = new DynamoDbClient([
            'region'   => 'x',
            'version'  => 'latest',
            'validate' => false
        ]);
        $command = $c->getCommand('CreateTable');
        $command->getEmitter()->on('prepared', function () {
            throw new \Exception('Throwing!');
        });
        $c->execute($command);
    }

    public function testAppliesApiProvider()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $provider = function () {
            return ['metadata' => ['protocol' => 'query']];
        };
        $conf = $r->resolve([
            'service'      => 'dynamodb',
            'region'       => 'x',
            'api_provider' => $provider,
            'version'      => 'latest'
        ], new Emitter());
        $this->assertArrayHasKey('api', $conf);
        $this->assertArrayHasKey('error_parser', $conf);
        $this->assertArrayHasKey('serializer', $conf);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "foo". Expected string, but got int(-1)
     */
    public function testValidatesInput()
    {
        $r = new ClientResolver([
            'foo' => [
                'type'  => 'value',
                'valid' => ['string']
            ]
        ]);
        $r->resolve(['foo' => -1], new Emitter());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "foo". Expected callable, but got string(1) "c"
     */
    public function testValidatesCallables()
    {
        $r = new ClientResolver([
            'foo' => [
                'type'   => 'value',
                'valid'  => ['callable']
            ]
        ]);
        $r->resolve(['foo' => 'c'], new Emitter());
    }


    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Credentials must be an
     */
    public function testValidatesCredentials()
    {
        $r = new ClientResolver([
            'credentials' => ClientResolver::getDefaultArguments()['credentials']
        ]);
        $r->resolve(['credentials' => []], new Emitter());
    }

    public function testLoadsFromDefaultChainIfNeeded()
    {
        $key = getenv(CredentialProvider::ENV_KEY);
        $secret = getenv(CredentialProvider::ENV_SECRET);
        putenv(CredentialProvider::ENV_KEY . '=foo');
        putenv(CredentialProvider::ENV_SECRET . '=bar');
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region' => 'x',
            'version' => 'latest'
        ], new Emitter());
        $c = $conf['credentials'];
        $this->assertInstanceOf('Aws\Credentials\CredentialsInterface', $c);
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('bar', $c->getSecretKey());
        putenv(CredentialProvider::ENV_KEY . "=$key");
        putenv(CredentialProvider::ENV_SECRET . "=$secret");
    }

    public function testCreatesFromArray()
    {
        $exp = time() + 500;
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'version'     => 'latest',
            'credentials' => [
                'key'     => 'foo',
                'secret'  => 'baz',
                'token'   => 'tok',
                'expires' => $exp
            ]
        ], new Emitter());
        $creds = $conf['credentials'];
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        $this->assertEquals($exp, $creds->getExpiration());
    }

    public function testCanDisableRetries()
    {
        $client = new Client();
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'      => 's3',
            'region'       => 'baz',
            'version'      => 'latest',
            'retries'      => 0,
            'client'       => $client
        ], new Emitter());
        $this->assertCount(0, $client->getEmitter()->listeners('error'));
    }

    public function testCanEnableRetries()
    {
        $client = new Client();
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'      => 's3',
            'region'       => 'baz',
            'version'      => 'latest',
            'retries'      => 2,
            'client'       => $client
        ], new Emitter());
        $this->assertGreaterThan(0, $client->getEmitter()->listeners('error'));
    }

    public function testCanCreateNullCredentials()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region' => 'x',
            'credentials' => false,
            'version' => 'latest'
        ], new Emitter());
        $this->assertInstanceOf(
            'Aws\Credentials\NullCredentials',
            $conf['credentials']
        );
        $this->assertEquals('anonymous', $conf['config']['signature_version']);
    }

    public function testCanCreateCredentialsFromProvider()
    {
        $c = new Credentials('foo', 'bar');
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => function () use ($c) { return $c; },
            'version'     => 'latest'
        ], new Emitter());
        $this->assertSame($c, $conf['credentials']);
    }

    public function testCanCreateCredentialsFromProfile()
    {
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $ini = <<<EOT
[foo]
aws_access_key_id = foo
aws_secret_access_key = baz
aws_security_token = tok
EOT;
        file_put_contents($dir . '/credentials', $ini);
        $home = getenv('HOME');
        putenv('HOME=' . dirname($dir));
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'profile'     => 'foo',
            'version'     => 'latest'
        ], new Emitter());
        $creds = $conf['credentials'];
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        unlink($dir . '/credentials');
        putenv("HOME=$home");
    }

    public function testCanUseCredentialsObject()
    {
        $c = new Credentials('foo', 'bar');
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => $c,
            'version'     => 'latest'
        ], new Emitter());
        $this->assertSame($c, $conf['credentials']);
    }

    public function testCanUseCustomEndpointProviderWithExtraData()
    {
        $p = function () {
            return [
                'endpoint' => 'http://foo.com',
                'signatureVersion' => 'v2'
            ];
        };
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region' => 'x',
            'endpoint_provider' => $p,
            'version' => 'latest'
        ], new Emitter());
        $this->assertEquals('v2', $conf['config']['signature_version']);
    }

    public function testAddsLogger()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $logger = $this->getMockBuilder('Psr\Log\LoggerInterface')
            ->getMockForAbstractClass();
        $conf = $r->resolve([
            'service'      => 'sqs',
            'region'       => 'x',
            'retries'      => 2,
            'retry_logger' => $logger,
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'version'      => 'latest'
        ], new Emitter());
        $this->assertTrue(SdkTest::hasListener(
            $conf['client']->getEmitter(),
            'GuzzleHttp\Subscriber\Retry\RetrySubscriber',
            'error'
        ));
    }

    public function testAddsLoggerWithDebugSettings()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service'      => 'sqs',
            'region'       => 'x',
            'retry_logger' => 'debug',
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'version'      => 'latest'
        ], new Emitter());
        $this->assertTrue(SdkTest::hasListener(
            $conf['client']->getEmitter(),
            'GuzzleHttp\Subscriber\Retry\RetrySubscriber',
            'error'
        ));
    }

    public function testAddsDebugListener()
    {
        $em = new Emitter();
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'  => 'sqs',
            'region'   => 'x',
            'debug'    => true,
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
            'version'  => 'latest'
        ], $em);
        $this->assertTrue(SdkTest::hasListener(
            $em,
            'GuzzleHttp\Command\Subscriber\Debug',
            'prepared'
        ));
    }

    public function canSetDebugToFalse()
    {
        $em = new Emitter();
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $r->resolve([
            'service'  => 'sqs',
            'region'   => 'x',
            'debug'    => false,
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
            'version'  => 'latest'
        ], $em);
        $this->assertFalse(SdkTest::hasListener(
            $em,
            'GuzzleHttp\Command\Subscriber\Debug',
            'prepared'
        ));
    }

    /**
     * @expectedException \GuzzleHttp\Exception\RequestException
     * @expectedExceptionMessage foo
     */
    public function testCanProvideCallableClient()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'dynamodb',
            'region'  => 'x',
            'version' => 'latest',
            'client' => function (array $args) {
                return new Client([
                    'handler' => function () {
                        throw new \UnexpectedValueException('foo');
                    }
                ]);
            }
        ], new Emitter());

        $conf['client']->get('http://localhost:123');
    }

    public function testCanAddHttpClientDefaultOptions()
    {
        $r = new ClientResolver(ClientResolver::getDefaultArguments());
        $conf = $r->resolve([
            'service' => 'sqs',
            'region'  => 'x',
            'version' => 'latest',
            'http'    => ['foo' => 'bar']
        ], new Emitter());
        $this->assertEquals('bar', $conf['client']->getDefaultOption('foo'));
    }

    public function testCanAddConfigOptions()
    {
        $c = new S3Client([
            'version'       => 'latest',
            'region'        => 'us-west-2',
            'calculate_md5' => true
        ]);
        $this->assertTrue($c->getConfig('calculate_md5'));
    }

    public function testSkipsNonRequiredKeys()
    {
        $r = new ClientResolver([
            'foo' => [
                'valid' => ['int'],
                'type'  => 'value'
            ]
        ]);
        $r->resolve([], new Emitter());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "version" configuration value is required
     */
    public function testHasSpecificMessageForMissingVersion()
    {
        $args = ClientResolver::getDefaultArguments()['version'];
        $r = new ClientResolver(['version' => $args]);
        $r->resolve(['service' => 'foo'], new Emitter());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A "region" configuration value is required for the "foo" service
     */
    public function testHasSpecificMessageForMissingRegion()
    {
        $args = ClientResolver::getDefaultArguments()['region'];
        $r = new ClientResolver(['region' => $args]);
        $r->resolve(['service' => 'foo'], new Emitter());
    }
}
