<?php
namespace Aws\Test\Api\Serializer;

use Aws\Command;
use Aws\Api\Serializer\JsonRpcSerializer;
use Aws\Api\Service;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\EndpointProviderV2;
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

    public function testDoesNotOverrideScheme()
    {
        $service = new Service(
            [
                'metadata'=> [
                    'protocol'   => 'json',
                    'apiVersion' => '1',
                    'serviceIdentifier' => 'foo',
                    'jsonVersion' => 1.1
                ],
                'operations' => [
                    'foo' => [
                        'http' => ['httpMethod' => 'POST'],
                        'input' => [
                            'type' => 'structure',
                            'members' => [
                                'baz' => [
                                    'type' => 'list',
                                    'member' => ['type' => 'string']
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            function () {}
        );

        $q = new JsonRpcSerializer($service, 'http://foo.com');
        $cmd = new Command('foo', ['baz' => []]);
        $endpointProvider = new EndpointProviderV2(
            json_decode(
                file_get_contents(__DIR__ . '/../../EndpointV2/valid-rules/aws-region.json'),
                true
            ),
            EndpointDefinitionProvider::getPartitions()
        );
        $request = $q($cmd, $endpointProvider, ['Region' => 'us-east-1']);
        $this->assertSame('http://us-east-1.amazonaws.com', (string) $request->getUri());
    }
}
