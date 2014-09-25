<?php
namespace Aws\Test\Common;

use Aws\Common\Credentials\NullCredentials;
use Aws\Common\Exception\AwsException;
use Aws\Common\ClientFactory;
use Aws\Test\SdkTest;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Common\ClientFactory
 */
class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCreatesNewClientInstances()
    {
        $f = new ClientFactory();
        $args = ['service' => 'sqs', 'region' => 'us-west-2'];
        $c = $f->create($args);
        $this->assertInstanceOf('Aws\Common\AwsClientInterface', $c);
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
        ]);
    }

    public function testCanSpecifyValidClientClass()
    {
        $f = new ClientFactory();
        $this->assertInstanceOf('Aws\Sqs\SqsClient', $f->create([
            'service'    => 'sqs',
            'region'     => 'x',
            'class_name' => 'Sqs',
        ]));
    }

    public function testValidatesInput()
    {
        $f = new ClientFactory();
        $c = $f->create(['service' => 'dynamodb', 'region' => 'x']);
        try {
            // CreateTable requires actual input parameters.
            $c->createTable([]);
            $this->fail('Did not validate');
        } catch (AwsException $e) {}
    }

    /**
     * @expectedException \Aws\Common\Exception\AwsException
     * @expectedExceptionMessage Throwing!
     */
    public function testCanDisableValidation()
    {
        // Validation is disabled, so server side validation is used.
        $c = (new ClientFactory())->create([
            'service'  => 'dynamodb',
            'region'   => 'x',
            'validate' => false
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
        $p = $this->getMockBuilder('Aws\Common\Api\ApiProviderInterface')
            ->setMethods(['getService'])
            ->getMockForAbstractClass();
        $p->expects($this->once())
            ->method('getService')
            ->will($this->returnValue(['metadata' => ['protocol' => 'foo']]));
        $f->create(['service' => 'dynamodb', 'region' => 'x', 'api_provider' => $p]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage retries must be a boolean or an integer
     */
    public function testValidatesRetries()
    {
        $f = new ClientFactory();
        $f->create(['service' => 'dynamodb', 'region' => 'x', 'retries' => 'a']);
    }

    public function testCanSpecifyValidExceptionClass()
    {
        $f = new ClientFactory();
        $f->create([
            'service'         => 'dynamodb',
            'region'          => 'x',
            'exception_class' => 'Aws\Common\Exception\AwsException'
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Exception not found when evaluating the exception_class argument: MissingFoo
     */
    public function testValidatesExceptionClass()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region' => 'x',
            'exception_class' => 'MissingFoo'
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
            'signature' => [0, 2, 3]
        ]);
    }

    public function testCanSetSignatureVersionString()
    {
        $f = new ClientFactory();
        $args = ['service' => 'sqs', 'region' => 'foo', 'signature' => 'v2'];
        $c = $f->create($args);
        $this->assertInstanceOf(
            'Aws\Common\Signature\SignatureV2',
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
            'client'  => [0, 1, 2]
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage api_provider must be an instance of Aws\Common\Api\ApiProviderInterface
     */
    public function testValidatesApiProvider()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'dynamodb',
            'region' => 'x',
            'api_provider' => [0, 1, 2]
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
            'endpoint_provider' => [0, 1, 2]
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
            'credentials' => new \stdClass()
        ]);
    }

    public function testCanDisableRetries()
    {
        $f = new ClientFactory();
        $c = $f->create(['service' => 'dynamodb', 'region' => 'x']);
        $this->assertCount(1, $c->getHttpClient()->getEmitter()->listeners('error'));
        $c = $f->create(['service' => 'dynamodb', 'region' => 'x', 'retries' => false]);
        $this->assertCount(0, $c->getHttpClient()->getEmitter()->listeners('error'));
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Invalid AWS credentials profile "profile_
     */
    public function testCanCreateCredentialsWithProfileName()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'profile' => uniqid('profile_')
        ]);
    }

    public function testCanCreateNullCredentials()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'credentials' => false
        ]);
        $this->assertInstanceOf(
            'Aws\Common\Credentials\NullCredentials',
            $c->getCredentials()
        );
    }

    public function testCanUseCredentialsObject()
    {
        $creds = new NullCredentials();
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'credentials' => $creds
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
            'endpoint_provider' => $p
        ]);
        $this->assertInstanceOf(
            'Aws\Common\Signature\SignatureV2',
            $c->getSignature()
        );
    }

    public function testConvertsServiceNames()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service'  => 'sdb',
            'region'   => 'x',
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
        ]);
        $this->assertInstanceOf('Aws\SimpleDb\SimpleDbClient', $c);
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
        ]);
        $this->assertFalse(SdkTest::hasListener(
            $c->getEmitter(),
            'GuzzleHttp\Command\Subscriber\Debug',
            'prepare'
        ));
    }

    public function signatureVersionProvider()
    {
        return [
            ['v2', 'Aws\Common\Signature\SignatureV2'],
            ['v4', 'Aws\Common\Signature\SignatureV4'],
            ['v3https', 'Aws\Common\Signature\SignatureV3Https'],
            ['v1', 'InvalidArgumentException']
        ];
    }

    /**
     * @dataProvider signatureVersionProvider
     */
    public function testCreatesSignatures($version, $class)
    {
        $f = new ClientFactory();

        $m = new \ReflectionMethod($f, 'createSignature');
        $m->setAccessible(true);

        try {
            $result = $m->invoke($f, $version, 'foo', 'bar');
        } catch (\Exception $e) {
            $result = $e;
        }

        $this->assertInstanceOf($class, $result);
        if (method_exists($result, 'getRegion')) {
            $this->assertEquals('bar', $result->getRegion());
        }
    }

    public function testDoesNotMessWithExistingResults()
    {
        $c = (new ClientFactory())->create([
            'service'  => 'dynamodb',
            'region'   => 'x',
            'validate' => false
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
            'validate' => false
        ]);
        $command = $c->getCommand('ListTables');
        $command->getEmitter()->on('prepared', function ($e) {
            $e->intercept(false);
        });
        $c->execute($command);
    }
}
