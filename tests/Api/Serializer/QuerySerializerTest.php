<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Service;
use Aws\Command;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\EndpointProviderV2;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\Serializer\QuerySerializer
 */
class QuerySerializerTest extends TestCase
{
    use UsesServiceTrait;

    public function testSerializesEmptyLists()
    {
        $service = new Service(
            [
                'metadata'=> [
                    'protocol'   => 'query',
                    'apiVersion' => '1'
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

        $q = new QuerySerializer($service, 'http://foo.com');
        $cmd = new Command('foo', ['baz' => []]);
        $request = $q($cmd);
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame('http://foo.com', (string) $request->getUri());
        $this->assertSame('Action=foo&Version=1&baz=', (string) $request->getBody());
    }

    public function testDoesNotOverrideScheme()
    {
        $service = new Service(
            [
                'metadata'=> [
                    'protocol'   => 'query',
                    'apiVersion' => '1',
                    'serviceIdentifier' => 'foo'
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

        $q = new QuerySerializer($service, 'http://foo.com');
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
