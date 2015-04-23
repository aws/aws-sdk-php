<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Service;
use Aws\Command;
use Aws\Api\Serializer\RestJsonSerializer;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Api\Serializer\RestJsonSerializer
 */
class RestJsonSerializerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    private function getTestService()
    {
        return new Service(
            [
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
            ],
            function () {}
        );
    }

    private function getRequest($commandName, $input)
    {
        $service = $this->getTestService();
        $command = new Command($commandName, $input);
        $j = new RestJsonSerializer($service, 'http://foo.com');
        return $j($command);
    }

    public function testPreparesRequestsWithContentType()
    {
        $request = $this->getRequest('foo', ['baz' => 'bar']);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', (string) $request->getUri());
        $this->assertEquals('{"baz":"bar"}', (string) $request->getBody());
        $this->assertEquals(
            'application/x-amz-json-1.1',
            $request->getHeaderLine('Content-Type')
        );
    }

    public function testPreparesRequestsWithBlobButNoForcedContentType()
    {
        $request = $this->getRequest('bar', ['baz' => 'bar']);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', (string) $request->getUri());
        $this->assertEquals('bar', (string) $request->getBody());
        $this->assertEquals('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithStructPayload()
    {
        $request = $this->getRequest('baz', ['baz' => ['baz' => '1234']]);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', (string) $request->getUri());
        $this->assertEquals('{"baz":"1234"}', (string) $request->getBody());
        $this->assertEquals(
            'application/x-amz-json-1.1',
            $request->getHeaderLine('Content-Type')
        );
    }
}
