<?php
namespace Aws\Tests;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use Aws\Signature\SignatureV4;
use Aws\Subscriber\Error;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Mock;

/**
 * @covers Aws\AwsClient
 */
class AwsClientTest extends \PHPUnit_Framework_TestCase
{
    public function testHasGetters()
    {
        $config = [
            'client'      => new Client(),
            'credentials' => new Credentials('foo', 'bar'),
            'signature'   => new SignatureV4('foo', 'bar'),
            'region'      => 'foo',
            'api'         => new Service([])
        ];

        $client = new AwsClient($config);
        $this->assertSame($config['client'], $client->getHttpClient());
        $this->assertSame($config['credentials'], $client->getCredentials());
        $this->assertSame($config['signature'], $client->getSignature());
        $this->assertSame($config['region'], $client->getRegion());
        $this->assertSame($config['api'], $client->getApi());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage is a required option
     */
    public function testEnsuresRequiredArgumentsArePresent()
    {
        new AwsClient([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Operation not found: Foo
     */
    public function testEnsuresOperationIsFoundWhenCreatingCommands()
    {
        $this->createClient([])->getCommand('foo');
    }

    public function testReturnsCommandForOperation()
    {
        $client = $this->createClient(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'Aws\AwsCommandInterface',
            $client->getCommand('foo')
        );
    }

    public function testThrowsAwsExceptions()
    {
        $client = $this->createClient(['operations' => ['foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $client->getHttpClient()->getEmitter()->attach(new Mock([
            new Response(404)
        ]));

        $client->getEmitter()->attach(new Error(
            function () {
                return [
                    'code' => 'foo',
                    'type' => 'bar',
                    'request_id' => '123'
                ];
            }
        ));

        $client->getEmitter()->on('prepare', function (PrepareEvent $e) {
            $e->setRequest($e->getClient()
                ->getHttpClient()
                ->createRequest('GET', 'http://httpbin.org'));
        });

        try {
            $client->foo();
            $this->fail('Did not throw an exception');
        } catch (AwsException $e) {
            $this->assertEquals([
                'aws_error' => [
                    'code' => 'foo',
                    'type' => 'bar',
                    'request_id' => '123'
                ]
            ], $e->getContext());
            $this->assertEquals('foo', $e->getAwsErrorCode());
            $this->assertEquals('bar', $e->getAwsErrorType());
            $this->assertEquals('123', $e->getAwsRequestId());
        }
    }

    public function testChecksBothLowercaseAndUppercaseOperationNames()
    {
        $client = $this->createClient(['operations' => ['Foo' => [
            'http' => ['method' => 'POST']
        ]]]);

        $this->assertInstanceOf(
            'Aws\AwsCommandInterface',
            $client->getCommand('foo')
        );
    }

    private function createClient(array $service)
    {
        return new AwsClient([
            'client'      => new Client(),
            'credentials' => new Credentials('foo', 'bar'),
            'signature'   => new SignatureV4('foo', 'bar'),
            'region'      => 'foo',
            'api'         => new Service($service)
        ]);
    }
}
