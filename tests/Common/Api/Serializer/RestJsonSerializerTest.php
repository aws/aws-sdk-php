<?php
namespace Aws\Test\Common\Api\Serializer;

use GuzzleHttp\Command\Command;
use Aws\Common\Api\Serializer\RestJsonSerializer;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;

/**
 * @covers Aws\Common\Api\Serializer\RestJsonSerializer
 */
class RestJsonSerializerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    private function getTestService()
    {
        return $this->createServiceApi([
            'metadata'=> [
                'targetPrefix' => 'test',
                'jsonVersion' => '1.1'
            ],
            'operations' => [
                'foo' => [
                    'http' => ['httpMethod' => 'POST'],
                    'input' => ['shape' => 'FooInput'],
                ],
                'bar' => [
                    'http' => ['httpMethod' => 'POST'],
                    'input' => ['shape' => 'BarInput'],
                ],
                'baz' => [
                    'http' => ['httpMethod' => 'POST'],
                    'input' => ['shape' => 'BazInput']
                ]
            ],
            'shapes' => [
                'FooInput' => [
                    'type' => 'structure',
                    'members' => [
                        'baz' => ['shape' => 'BazShape']
                    ]
                ],
                'BarInput' => [
                    'type' => 'structure',
                    'members' => [
                        'baz' => ['shape' => 'BlobShape']
                    ],
                    'payload' => 'baz'
                ],
                'BazInput' => [
                    'type' => 'structure',
                    'members' => ['baz' => ['shape' => 'FooInput']],
                    'payload' => 'baz'
                ],
                'BlobShape' => ['type' => 'blob'],
                'BazShape'  => ['type' => 'string']
            ]
        ]);
    }

    private function getRequest($commandName, $input)
    {
        $http = new Client();
        $service = $this->getTestService();
        $command = new Command($commandName, $input);
        $j = new RestJsonSerializer($service, 'http://foo.com');
        $aws = $this->getMockBuilder('Aws\AwsClient')
            ->setMethods(['getHttpClient'])
            ->disableOriginalConstructor()
            ->getMock();
        $aws->expects($this->once())
            ->method('getHttpClient')
            ->will($this->returnValue($http));
        $trans = new CommandTransaction($aws, $command);

        return $j($trans);
    }

    public function testPreparesRequestsWithContentType()
    {
        $request = $this->getRequest('foo', ['baz' => 'bar']);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', $request->getUrl());
        $this->assertTrue($request->hasHeader('User-Agent'));
        $this->assertEquals('{"baz":"bar"}', (string) $request->getBody());
        $this->assertEquals(
            'application/x-amz-json-1.1',
            $request->getHeader('Content-Type')
        );
    }

    public function testPreparesRequestsWithBlobButNoForcedContentType()
    {
        $request = $this->getRequest('bar', ['baz' => 'bar']);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', $request->getUrl());
        $this->assertTrue($request->hasHeader('User-Agent'));
        $this->assertEquals('bar', (string) $request->getBody());
        $this->assertEquals('', $request->getHeader('Content-Type'));
    }

    public function testPreparesRequestsWithStructPayload()
    {
        $request = $this->getRequest('baz', ['baz' => ['baz' => '1234']]);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', $request->getUrl());
        $this->assertTrue($request->hasHeader('User-Agent'));
        $this->assertEquals('{"baz":"1234"}', (string) $request->getBody());
        $this->assertEquals(
            'application/x-amz-json-1.1',
            $request->getHeader('Content-Type')
        );
    }
}
