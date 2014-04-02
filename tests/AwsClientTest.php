<?php
namespace Aws\Tests;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Client;

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
