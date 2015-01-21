<?php
namespace Aws\Test;

use Aws\ClientFactory;
use Aws\Credentials\Credentials;
use Aws\Credentials\NullCredentials;
use Aws\Exception\AwsException;
use GuzzleHttp\Client;
use Aws\Credentials\Provider;

/**
 * @covers Aws\ClientFactory
 */
class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCreatesNewClientInstances()
    {
        $f = new ClientFactory();
        $args = [
            'service' => 'sqs',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ];
        $c = $f->create($args);
        $this->assertInstanceOf('Aws\AwsClientInterface', $c);
        $this->assertNotSame($c, $f->create($args));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresRequiredArgumentsAreProvided()
    {
        $f = new ClientFactory();
        $f->create([]);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Client not found for Foo
     */
    public function testEnsuresClientClassExists()
    {
        $f = new ClientFactory();
        $f->create([
            'service'    => 'sqs',
            'region'     => 'x',
            'class_name' => 'Foo',
            'version'    => 'latest'
        ]);
    }

    public function testCanSpecifyValidClientClass()
    {
        $f = new ClientFactory();
        $this->assertInstanceOf('Aws\Sqs\SqsClient', $f->create([
            'service'    => 'sqs',
            'region'     => 'x',
            'class_name' => 'Sqs',
            'version'    => 'latest'
        ]));
    }

    public function testValidatesInput()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'dynamodb',
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
        // Validation is disabled, so server side validation is used.
        $c = (new ClientFactory())->create([
            'service'  => 'dynamodb',
            'region'   => 'x',
            'validate' => false,
            'version'  => 'latest'
        ]);
        $command = $c->getCommand('CreateTable');
        $command->getEmitter()->on('prepared', function () {
            throw new \Exception('Throwing!');
        });
        $c->execute($command);
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Unknown protocol: foo
     */
    public function testValidatesErrorParser()
    {
        $f = new ClientFactory();
        $provider = function () {
            return ['metadata' => ['protocol' => 'foo']];
        };
        $f->create([
            'service'      => 'dynamodb',
            'region'       => 'x',
            'api_provider' => $provider,
            'version'      => 'latest'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage retries must be a boolean or an integer
     */
    public function testValidatesRetries()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region'  => 'x',
            'retries' => 'a',
            'version' => 'latest'
        ]);
    }

    public function testCanSpecifyValidExceptionClass()
    {
        $f = new ClientFactory();
        $f->create([
            'service'         => 'dynamodb',
            'region'          => 'x',
            'exception_class' => 'Aws\Exception\AwsException',
            'version' => 'latest'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid signature option
     */
    public function testValidatesSignatureOption()
    {
        $f = new ClientFactory();
        $f->create([
            'service'   => 'dynamodb',
            'region'    => 'x',
            'signature' => [0, 2, 3],
            'version'   => 'latest'
        ]);
    }

    public function testCanSetSignatureVersionString()
    {
        $f = new ClientFactory();
        $args = [
            'service'   => 'sqs',
            'region'    => 'foo',
            'signature' => 'v2',
            'version'   => 'latest'
        ];
        $c = $f->create($args);
        $this->assertInstanceOf(
            'Aws\Signature\SignatureV2',
            $c->getSignature()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage client must be an instance of GuzzleHttp\ClientInterface
     */
    public function testValidatesClient()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region'  => 'x',
            'client'  => [0, 1, 2],
            'version' => 'latest'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage client_defaults must be an array
     */
    public function testValidatesClientDefaults()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region'  => 'x',
            'client_defaults'  => 'foo',
            'version' => 'latest'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage api_provider must be callable
     */
    public function testValidatesApiProvider()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region' => 'x',
            'api_provider' => [0, 1, 2],
            'version' => 'latest'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage endpoint_provider must be a callable
     */
    public function testValidatesEndpointProvider()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region' => 'x',
            'endpoint_provider' => [0, 1, 2],
            'version' => 'latest'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Credentials must be an
     */
    public function testValidatesCredentials()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region' => 'x',
            'credentials' => new \stdClass(),
            'version' => 'latest'
        ]);
    }

    public function testCanDisableRetries()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'dynamodb',
            'region'  => 'x',
            'version' => 'latest'
        ]);
        $this->assertCount(1, $c->getHttpClient()->getEmitter()->listeners('error'));
        $c = $f->create([
            'service' => 'dynamodb',
            'region'  => 'x',
            'retries' => false,
            'version' => 'latest'
        ]);
        $this->assertCount(0, $c->getHttpClient()->getEmitter()->listeners('error'));
    }

    public function testCanCreateNullCredentials()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'credentials' => false,
            'version' => 'latest'
        ]);
        $this->assertInstanceOf(
            'Aws\Credentials\NullCredentials',
            $c->getCredentials()
        );
    }

    public function testCanCreateCredentialsFromProvider()
    {
        $f = new ClientFactory();
        $c = new Credentials('foo', 'bar');
        $client = $f->create([
            'service'     => 'sqs',
            'region'      => 'x',
            'credentials' => function () use ($c) { return $c; },
            'version'     => 'latest'
        ]);
        $this->assertSame($c, $client->getCredentials());
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
        $f = new ClientFactory();
        $client = $f->create([
            'service'     => 'sqs',
            'region'      => 'x',
            'profile'     => 'foo',
            'version'     => 'latest'
        ]);
        $creds = $client->getCredentials();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        unlink($dir . '/credentials');
        putenv("HOME=$home");
    }

    public function testCanUseCredentialsObject()
    {
        $creds = new NullCredentials();
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'credentials' => $creds,
            'version' => 'latest'
        ]);
        $this->assertSame($creds, $c->getCredentials());
    }

    public function testCanUseCustomEndpointProviderWithExtraData()
    {
        $p = function () {
            return [
                'endpoint' => 'http://foo.com',
                'signatureVersion' => 'v2'
            ];
        };
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'endpoint_provider' => $p,
            'version' => 'latest'
        ]);
        $this->assertInstanceOf(
            'Aws\Signature\SignatureV2',
            $c->getSignature()
        );
    }

    public function testAddsLogger()
    {
        $f = new ClientFactory();
        $logger = $this->getMockBuilder('Psr\Log\LoggerInterface')
            ->getMockForAbstractClass();
        $c = $f->create([
            'service'      => 'sqs',
            'region'       => 'x',
            'retries'      => 2,
            'retry_logger' => $logger,
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'version'      => 'latest'
        ]);
        $this->assertTrue(SdkTest::hasListener(
            $c->getHttpClient()->getEmitter(),
            'GuzzleHttp\Subscriber\Retry\RetrySubscriber',
            'error'
        ));
    }

    public function testAddsLoggerWithDebugSettings()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service'      => 'sqs',
            'region'       => 'x',
            'retry_logger' => 'debug',
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'version'      => 'latest'
        ]);
        $this->assertTrue(SdkTest::hasListener(
            $c->getHttpClient()->getEmitter(),
            'GuzzleHttp\Subscriber\Retry\RetrySubscriber',
            'error'
        ));
    }

    public function testAddsDebugListener()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service'  => 'sqs',
            'region'   => 'x',
            'debug'    => true,
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
            'version'  => 'latest'
        ]);
        $this->assertTrue(SdkTest::hasListener(
            $c->getEmitter(),
            'GuzzleHttp\Command\Subscriber\Debug',
            'prepared'
        ));

        $c = $f->create([
            'service'  => 'sqs',
            'region'   => 'x',
            'debug'    => false,
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
            'version'  => 'latest'
        ]);
        $this->assertFalse(SdkTest::hasListener(
            $c->getEmitter(),
            'GuzzleHttp\Command\Subscriber\Debug',
            'prepare'
        ));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid signature option: bool(true)
     */
    public function testValidatesSignature()
    {
        $f = new ClientFactory();
        $f->create([
            'service'  => 'sqs',
            'region'   => 'x',
            'signature' => true,
            'version'  => 'latest'
        ]);
    }

    public function testCreatesSignatureFromString()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service'   => 'sqs',
            'region'    => 'x',
            'signature' => 'v2',
            'version'   => 'latest'
        ]);
        $this->assertInstanceOf('Aws\Signature\SignatureV2', $c->getSignature());
    }

    public function testDoesNotMessWithExistingResults()
    {
        $c = (new ClientFactory())->create([
            'service'  => 'dynamodb',
            'region'   => 'x',
            'validate' => false,
            'version'  => 'latest'
        ]);
        $command = $c->getCommand('ListTables');
        $command->getEmitter()->on('prepared', function ($e) {
            $e->intercept(['foo' => 'bar']);
        });
        $this->assertEquals(['foo' => 'bar'], $c->execute($command));
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage No response was received.
     */
    public function testThrowsWhenNoResultOrResponseIsPresent()
    {
        $c = (new ClientFactory())->create([
            'service'  => 'dynamodb',
            'region'   => 'x',
            'validate' => false,
            'version'  => 'latest'
        ]);
        $command = $c->getCommand('ListTables');
        $command->getEmitter()->on('prepared', function ($e) {
            $e->intercept(false);
        });
        $c->execute($command);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage You cannot provide both a client option and a ringphp_handler option.
     */
    public function testCannotProvideClientAndHandler()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region'  => 'x',
            'version' => 'latest',
            'client'  => new Client(),
            'ringphp_handler' => function () {}
        ]);
    }

    /**
     * @expectedException \GuzzleHttp\Exception\RequestException
     * @expectedExceptionMessage foo
     */
    public function testCanProvideRingPHPHandler()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'dynamodb',
            'region'  => 'x',
            'version' => 'latest',
            'ringphp_handler' => function () {
                throw new \UnexpectedValueException('foo');
            }
        ]);

        $c->getHttpClient()->get('http://localhost:123');
    }

    public function testLoadsFromDefaultChainIfNeeded()
    {
        $key = getenv(Provider::ENV_KEY);
        $secret = getenv(Provider::ENV_SECRET);
        putenv(Provider::ENV_KEY . '=foo');
        putenv(Provider::ENV_SECRET . '=bar');
        $f = new ClientFactory();
        $client = $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'version' => 'latest'
        ]);
        $c = $client->getCredentials();
        $this->assertInstanceOf('Aws\Credentials\CredentialsInterface', $c);
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('bar', $c->getSecretKey());
        putenv(Provider::ENV_KEY . "=$key");
        putenv(Provider::ENV_SECRET . "=$secret");
    }

    public function testCreatesFromArray()
    {
        $exp = time() + 500;
        $f = new ClientFactory();
        $client = $f->create([
            'service'     => 'sqs',
            'region'      => 'x',
            'version'     => 'latest',
            'credentials' => [
                'key'     => 'foo',
                'secret'  => 'baz',
                'token'   => 'tok',
                'expires' => $exp
            ]
        ]);
        $creds = $client->getCredentials();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('baz', $creds->getSecretKey());
        $this->assertEquals('tok', $creds->getSecurityToken());
        $this->assertEquals($exp, $creds->getExpiration());
    }

    public function testCanAddClientDefaultOptions()
    {
        $f = new ClientFactory();
        $client = $f->create([
            'service'         => 'sqs',
            'region'          => 'x',
            'version'         => 'latest',
            'client_defaults' => ['foo' => 'bar']
        ]);
        $this->assertEquals('bar', $client->getHttpClient()->getDefaultOption('foo'));
    }
}
