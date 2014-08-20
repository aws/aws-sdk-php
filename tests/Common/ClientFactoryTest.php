<?php
namespace Aws\Test\Common;

use Aws\AwsClient;
use Aws\Common\Credentials\NullCredentials;
use Aws\AwsException;
use Aws\Common\ClientFactory;
use Aws\Test\SdkTest;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;

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
            $c->listTables([]);
            $this->fail('Did not validate');
        } catch (AwsException $e) {}
    }

    /**
     * @expectedException \Aws\AwsException
     * @expectedExceptionMessage Throwing!
     */
    public function testCanDisableValidation()
    {
        $c = (new ClientFactory())->create([
            'service'  => 'dynamodb',
            'region'   => 'x',
            'validate' => false
        ]);

        $c->getHttpClient()->getEmitter()->on('before', function() {
            throw new \Exception('Throwing!');
        });

        $c->listTables([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unknown service type foo
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
            'exception_class' => 'Aws\AwsException'
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
     * @expectedExceptionMessage endpoint_provider must be an instance of Aws\Common\Api\EndpointProviderInterface
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

    public function errorParserProvider()
    {
        return [
            ['json', 'Aws\Common\Api\ErrorParser\JsonRpcErrorParser'],
            ['rest-json', 'Aws\Common\Api\ErrorParser\RestJsonErrorParser'],
            ['query', 'Aws\Common\Api\ErrorParser\XmlErrorParser'],
            ['rest-xml', 'Aws\Common\Api\ErrorParser\XmlErrorParser']
        ];
    }

    /**
     * @dataProvider errorParserProvider
     */
    public function testCreatesRelevantErrorParsers($p, $cl)
    {
        $f = new ClientFactory();

        $r = new \ReflectionMethod($f, 'createErrorParser');
        $r->setAccessible(true);

        $api = $this->createServiceApi(['metadata' => ['protocol' => $p]]);
        $this->assertInstanceOf($cl, $r->invoke($f, $api));
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
        $p = $this->getMockBuilder('Aws\Common\EndpointProviderInterface')
            ->setMethods(['getEndpoint'])
            ->getMockForAbstractClass();
        $p->expects($this->once())
            ->method('getEndpoint')
            ->will($this->returnValue([
                'endpoint' => 'http://foo.com',
                'signatureVersion' => 'v2'
            ]));
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

    public function protocolDataProvider()
    {
        return [
            ['json', 'Aws\Common\Api\Serializer\JsonRpcSerializer', 'Aws\Common\Api\Parser\JsonRpcParser'],
            ['rest-json', 'Aws\Common\Api\Serializer\RestJsonSerializer'],
            ['rest-xml', 'Aws\Common\Api\Serializer\RestXmlSerializer'],
            ['query', 'Aws\Common\Api\Serializer\QuerySerializer'],
            ['foo', 'UnexpectedValueException'],
        ];
    }

    /**
     * @dataProvider protocolDataProvider
     */
    public function testAttachesProtocols($type, $serializer, $parser = null)
    {
        $factory = new ClientFactory();
        $method = new \ReflectionMethod($factory, 'applyProtocol');
        $method->setAccessible(true);
        $service = $this->createServiceApi([
            'metadata' => ['protocol' => $type]
        ]);

        $client = new AwsClient([
            'api' => $service,
            'credentials' => $this->getMock('Aws\Common\Credentials\CredentialsInterface'),
            'signature' => $this->getMock('Aws\Common\Signature\SignatureInterface'),
            'client' => new Client(),
            'endpoint' => 'http://us-east-1.foo.amazonaws.com',
            'error_parser' => function () {}
        ]);

        try {
            $method->invoke($factory, $client, 'http://foo.com');
        } catch (\Exception $e) {
            $this->assertInstanceOf($serializer, $e);
            return;
        }

        $hasSerializer = false;
        foreach ($client->getEmitter()->listeners('prepare') as $listener) {
            if ($listener[0] instanceof $serializer) {
                $hasSerializer = true;
                break;
            }
        }
        $this->assertTrue($hasSerializer);

        if ($parser) {
            $hasParser = false;
            foreach ($client->getEmitter()->listeners('process') as $listener) {
                if ($listener[0] instanceof $parser) {
                    $hasParser = true;
                    break;
                }
            }
            $this->assertTrue($hasParser);
        }
    }
}
