<?php
namespace Aws\Test\Api\Serializer;

use Aws\Command;
use Aws\Api\Serializer\JsonRpcSerializer;
use Aws\Api\Service;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\Serializer\JsonRpcSerializer
 */
class JsonRpcSerializerTest extends TestCase
{
    use UsesServiceTrait;

    public function testPreparesRequests()
    {
        $service = new Service(
            [
                'metadata'=> [
                    'targetPrefix' => 'test',
                    'jsonVersion' => '1.1'
                ],
                'operations' => [
                    'foo' => [
                        'http' => ['httpMethod' => 'POST'],
                        'input' => [
                            'type' => 'structure',
                            'members' => [
                                'baz' => ['type' => 'string']
                            ]
                        ]
                    ]
                ]
            ],
            function () {}
        );

        $j = new JsonRpcSerializer($service, 'http://foo.com');
        $cmd = new Command('foo', ['baz' => 'bam']);
        $request = $j($cmd);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com', (string) $request->getUri());
        $this->assertSame(
            'application/x-amz-json-1.1',
            $request->getHeaderLine('Content-Type')
        );
        $this->assertSame('test.foo', $request->getHeaderLine('X-Amz-Target'));
        $this->assertSame('{"baz":"bam"}', (string) $request->getBody());
    }
}
