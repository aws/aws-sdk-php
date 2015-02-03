<?php
namespace Aws\Test;

use Aws\ClientFactory;
use Aws\Credentials\Credentials;
use Aws\Credentials\NullCredentials;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;
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

    public function testCanSpecifyValidClientClass()
    {
        $f = new ClientFactory();
        $this->assertInstanceOf('Aws\Sqs\SqsClient', $f->create([
            'service'    => 'sqs',
            'region'     => 'x',
            'class_name' => 'Aws\Sqs\SqsClient',
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
     */
    public function testValidatesObjects()
    {
        $f = new ClientFactory();
        $f->create([
            'service'   => 'dynamodb',
            'region'    => 'x',
            'signature_version' => -1,
            'version'   => 'latest'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testValidatesCallables()
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
            'service'     => 'dynamodb',
            'region'      => 'x',
            'credentials' => [],
            'version'     => 'latest'
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
        $this->assertEquals('anonymous', $c->getConfig('signature_version'));
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
        $this->assertEquals('v2', $c->getConfig('signature_version'));
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

    public function testCanAddConfigOptions()
    {
        $c = S3Client::factory([
            'version' => 'latest',
            'region'  => 'us-west-2',
            'calculate_md5' => true
        ]);
        $this->assertTrue($c->getConfig('calculate_md5'));
    }

    private function getCallableSignatureVersion()
    {
        $f = new ClientFactory();
        $r = new \ReflectionMethod($f, 'getSignatureVersion');
        $r->setAccessible(true);

        return function (array $args) use ($r, $f) {
            return $r->invoke($f, $args);
        };
    }

    public function testCanGetSignatureVersionFromOuterArray()
    {
        $fn = $this->getCallableSignatureVersion();
        $this->assertEquals(
            'v2',
            $fn(['signature_version' => 'v2'])
        );
    }

    public function testCanGetSignatureVersionFromConfig()
    {
        $fn = $this->getCallableSignatureVersion();
        $this->assertEquals(
            'v4',
            $fn([
                'signature_version' => 'v2',
                'config'            => ['signature_version' => 'v4']
            ])
        );
    }

    public function testCanGetSignatureApiModel()
    {
        $fn = $this->getCallableSignatureVersion();
        $api = $this->getMockBuilder('Aws\Api\Service')
            ->setMethods(['getSignatureVersion'])
            ->disableOriginalConstructor()
            ->getMock();
        $api->expects($this->once())
            ->method('getSignatureVersion')
            ->will($this->returnValue('s3'));
        $this->assertEquals('s3', $fn(['api' => $api]));
    }

    public function testReturnsNullSignatureVersion()
    {
        $fn = $this->getCallableSignatureVersion();
        $this->assertNull($fn([]));
    }
}
