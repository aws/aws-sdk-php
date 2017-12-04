<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Service;
use Aws\Command;
use Aws\Api\Serializer\RestJsonSerializer;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\Serializer\RestJsonSerializer
 */
class RestJsonSerializerTest extends TestCase
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
                    ],
                    'foobar' => [
                        'http' => ['httpMethod' => 'POST'],
                        'input' => ['shape' => 'FooBarInput']
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
                    'FooBarInput' => [
                        'type' => 'structure',
                        'members' => [
                            'baz' => [
                                'shape' => 'BazShape',
                                'location' => 'header',
                                'locationname' => 'Bar',
                                'jsonvalue' => true
                            ]
                        ]
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

    public function testPreparesRequestsWithJsonValueTraitString()
    {
        $jsonValueArgs = '{"a":"b"}';
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertEquals('IntcImFcIjpcImJcIn0i', $request->getHeaderLine('baz'));
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', (string) $request->getUri());
        $this->assertEquals('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitArray()
    {
        $jsonValueArgs = [
            "a" => "b"
        ];
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertEquals('eyJhIjoiYiJ9', $request->getHeaderLine('baz'));
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', (string) $request->getUri());
        $this->assertEquals('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitEmptyString()
    {
        $jsonValueArgs = '';
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertEquals('IiI=', $request->getHeaderLine('baz'));
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com/', (string) $request->getUri());
        $this->assertEquals('', $request->getHeaderLine('Content-Type'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPreparesRequestsWithJsonValueTraitThrowsException()
    {
        $obj = new \stdClass();
        $obj->obj = $obj;
        $this->getRequest('foobar', ['baz' => $obj]);
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
