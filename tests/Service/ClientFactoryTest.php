<?php
namespace Aws\Test\Service;

use Aws\Api\Service;
use Aws\Credentials\NullCredentials;
use Aws\Exception\AwsException;
use Aws\Service\ClientFactory;
use GuzzleHttp\Client;

/**
 * @covers Aws\Service\ClientFactory
 */
class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
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
        $this->assertInstanceOf('Aws\Service\Sqs\SqsClient', $f->create([
            'service'    => 'sqs',
            'region'     => 'x',
            'class_name' => 'Sqs',
        ]));
    }

    public function testValidatesInput()
    {
        $f = new ClientFactory();
        $c = $f->create(['service' => 's3', 'region' => 'x']);
        try {
            $c->putObject([]);
            $this->fail('Did not validate');
        } catch (AwsException $e) {}
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessage Throwing!
     */
    public function testCanDisableValidation()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service'  => 's3',
            'region'   => 'x',
            'validate' => false
        ]);

        $c->getHttpClient()->getEmitter()->on('before', function() {
            throw new \Exception('Throwing!');
        });

        $c->putObject([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unknown service type foo
     */
    public function testValidatesErrorParser()
    {
        $f = new ClientFactory();
        $p = $this->getMockBuilder('Aws\Api\ApiProviderInterface')
            ->setMethods(['getService'])
            ->getMockForAbstractClass();
        $p->expects($this->once())
            ->method('getService')
            ->will($this->returnValue(['metadata' => ['protocol' => 'foo']]));
        $f->create(['service' => 's3', 'region' => 'x', 'api_provider' => $p]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage retries must be a boolean or an integer
     */
    public function testValidatesRetries()
    {
        $f = new ClientFactory();
        $f->create(['service' => 's3', 'region' => 'x', 'retries' => 'a']);
    }

    public function testCanSpecifyValidExceptionClass()
    {
        $f = new ClientFactory();
        $f->create([
            'service'         => 's3',
            'region'          => 'x',
            'exception_class' => 'Aws\Exception\AwsException'
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
            'service' => 's3',
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
            'service'   => 's3',
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
            'Aws\Signature\SignatureV2',
            $c->getSignature()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage waiter_factory must be an instance of ResourceWaiterFactory
     */
    public function testValidatesWaiterFactory()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 's3',
            'region' => 'x',
            'waiter_factory' => [0, 1, 2]
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage paginator_factory must be an instance of PaginatorFactory
     */
    public function testValidatesPaginatorFactory()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 's3',
            'region' => 'x',
            'paginator_factory' => [0, 1, 2]
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage client must be an instance of GuzzleHttp\ClientInterface
     */
    public function testValidatesClient()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 's3',
            'region'  => 'x',
            'client'  => [0, 1, 2]
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage api_provider must be an instance of Aws\Api\ApiProviderInterface
     */
    public function testValidatesApiProvider()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 's3',
            'region' => 'x',
            'api_provider' => [0, 1, 2]
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage endpoint_provider must be an instance of Aws\Api\EndpointProviderInterface
     */
    public function testValidatesEndpointProvider()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 's3',
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
            'service' => 's3',
            'region' => 'x',
            'credentials' => new \stdClass()
        ]);
    }

    public function testCanDisableRetries()
    {
        $f = new ClientFactory();
        $c = $f->create(['service' => 's3', 'region' => 'x']);
        $this->assertCount(1, $c->getHttpClient()->getEmitter()->listeners('error'));
        $c = $f->create(['service' => 's3', 'region' => 'x', 'retries' => false]);
        $this->assertCount(0, $c->getHttpClient()->getEmitter()->listeners('error'));
    }

    public function errorParserProvider()
    {
        return [
            ['json', 'Aws\Api\ErrorParser\JsonRpcErrorParser'],
            ['rest-json', 'Aws\Api\ErrorParser\JsonRestErrorParser'],
            ['query', 'Aws\Api\ErrorParser\XmlErrorParser'],
            ['rest-xml', 'Aws\Api\ErrorParser\XmlErrorParser']
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
        $api = new Service(['metadata' => ['protocol' => $p]]);
        $this->assertInstanceOf($cl, $r->invoke($f, $api));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage "client_defaults" cannot be specified
     */
    public function testCannotPassClientDefaultsAndClient()
    {
        $f = new ClientFactory();
        $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'client' => new Client(),
            'client_defaults' => []
        ]);
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
            'Aws\Credentials\NullCredentials',
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
        $p = $this->getMockBuilder('Aws\Api\EndpointProviderInterface')
            ->setMethods(['getEndpoint'])
            ->getMockForAbstractClass();
        $p->expects($this->once())
            ->method('getEndpoint')
            ->will($this->returnValue([
                'uri' => 'http://foo.com',
                'properties' => [
                    'signatureVersion' => 'v2'
                ]
            ]));
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'sqs',
            'region' => 'x',
            'endpoint_provider' => $p
        ]);
        $this->assertInstanceOf(
            'Aws\Signature\SignatureV2',
            $c->getSignature()
        );
    }

    public function testConvertsServiceNames()
    {
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'sdb',
            'region'  => 'x'
        ]);
        $this->assertInstanceOf('Aws\Service\SimpleDb\SimpleDbClient', $c);
    }
}
