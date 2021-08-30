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
                    'doctype' => [
                        'http' => ['httpMethod' => 'POST'],
                        'input' => ['shape' => 'DocTypeInput'],
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
                    'DocTypeInput' => [
                        'type' => 'structure',
                        'members' => [
                            "DocumentValue" => [
                                "shape" => "DocumentType",
                            ]
                        ]
                    ],
                    "DocumentType" => [
                        "type" => "structure",
                        "document" => true
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

    private function getPathEndpointRequest($commandName, $input)
    {
        $service = $this->getTestService();
        $command = new Command($commandName, $input);
        $j = new RestJsonSerializer($service, 'http://foo.com/bar');
        return $j($command);
    }

    public function testPreparesRequestsWithContentType()
    {
        $request = $this->getRequest('foo', ['baz' => 'bar']);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('{"baz":"bar"}', (string) $request->getBody());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    public function testPreparesRequestsWithEndpointWithPath()
    {
        $request = $this->getPathEndpointRequest('foo', ['baz' => 'bar']);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/bar', (string) $request->getUri());
        $this->assertSame('{"baz":"bar"}', (string) $request->getBody());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    public function testPreparesRequestsWithBlobButNoForcedContentType()
    {
        $request = $this->getRequest('bar', ['baz' => 'bar']);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('bar', (string) $request->getBody());
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitString()
    {
        $jsonValueArgs = '{"a":"b"}';
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertSame('IntcImFcIjpcImJcIn0i', $request->getHeaderLine('baz'));
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitArray()
    {
        $jsonValueArgs = [
            "a" => "b"
        ];
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertSame('eyJhIjoiYiJ9', $request->getHeaderLine('baz'));
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithJsonValueTraitEmptyString()
    {
        $jsonValueArgs = '';
        $request = $this->getRequest('foobar', ['baz' => $jsonValueArgs]);
        $this->assertSame('IiI=', $request->getHeaderLine('baz'));
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
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
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame('{"baz":"1234"}', (string) $request->getBody());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }

    /**
     * @dataProvider doctypeTestProvider
     * @param string $operation
     *
     */
    public function testHandlesDoctype($input, $expectedOutput)
    {
        $request = $this->getRequest('doctype', $input);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com/', (string) $request->getUri());
        $this->assertSame($expectedOutput, $request->getBody()->getContents());
        $this->assertSame(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );
    }


    public function doctypeTestProvider() {
        return [
            [
                ['DocumentValue' =>
                    ['DocumentType' =>
                        [
                            'name' => "John",
                            'age'=> 31,
                            'active'=> true
                        ]
                    ]
                ],
                '{"DocumentValue":{"DocumentType":{"name":"John","age":31,"active":true}}}'
            ],
            [
                ['DocumentValue' =>
                    [
                        'DocumentType' => true
                    ]
                ],
                '{"DocumentValue":{"DocumentType":true}}'
            ],
            [
                ['DocumentValue' =>
                    [
                        'DocumentType' => 2
                    ]
                ],
                '{"DocumentValue":{"DocumentType":2}}'
            ],
        ];
    }

}

