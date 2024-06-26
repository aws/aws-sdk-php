<?php
namespace Aws\Test\Api\Parser;

use Aws\Api\Operation;
use Aws\Api\Parser\EventParsingIterator;
use Aws\Api\Parser\JsonParser;
use Aws\Api\Parser\JsonRpcParser;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use Aws\Command;
use Aws\CommandInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;

class JsonRpcParserTest extends TestCase
{
    /** @doesNotPerformAssertions */
    public function testCanHandleNullResponses()
    {
        $operation = $this->getMockBuilder(Operation::class)
            ->disableOriginalConstructor()
            ->setMethods(['getOutput'])
            ->getMock();
        $operation->expects($this->any())
            ->method('getOutput')
            ->withAnyParameters()
            ->willReturn(
                $this->getMockBuilder(Shape::class)
                    ->disableOriginalConstructor()
                    ->setMethods([])
                    ->getMock()
            );

        $service = $this->getMockBuilder(Service::class)
            ->disableOriginalConstructor()
            ->setMethods(['getOperation'])
            ->getMock();
        $service->expects($this->any())
            ->method('getOperation')
            ->withAnyParameters()
            ->willReturn($operation);

        $parser = $this->getMockBuilder(JsonParser::class)
            ->disableOriginalConstructor()
            ->setMethods(['parse'])
            ->getMock();
        $parser->expects($this->any())
            ->method('parse')
            ->withAnyParameters()
            ->willReturn(null);

        $instance = new JsonRpcParser($service, $parser);
        $result = $instance(
            $this->getMockBuilder(CommandInterface::class)->getMock(),
            new Response(200, [], json_encode(null))
        );
    }

    public function testCanHandleEmptyResponses()
    {
        $operation = $this->getMockBuilder(Operation::class)
            ->disableOriginalConstructor()
            ->setMethods(['offsetGet'])
            ->getMock();
        $operation->expects($this->atLeastOnce())
            ->method('offsetGet')
            ->with('output')
            ->willReturn(null);

        $service = $this->getMockBuilder(Service::class)
            ->disableOriginalConstructor()
            ->setMethods(['getOperation'])
            ->getMock();
        $service->expects($this->any())
            ->method('getOperation')
            ->withAnyParameters()
            ->willReturn($operation);

        $parser = $this->getMockBuilder(JsonParser::class)
            ->disableOriginalConstructor()
            ->setMethods(['parse'])
            ->getMock();
        $parser->expects($this->never())
            ->method('parse');

        $instance = new JsonRpcParser($service, $parser);
        $result = $instance(
            $this->getMockBuilder(CommandInterface::class)->getMock(),
            new Response(200, [])
        );
    }

    public function testCanHandleNonStreamingResponses()
    {
        $service = $this->getMockBuilder(Service::class)
            -> disableOriginalConstructor()
            -> setMethods(['getOperation'])
            -> getMock();
        $operation = $this->getMockBuilder(Operation::class)
            -> disableOriginalConstructor()
            -> setMethods(['getOutput'])
            -> getMock();
        $outputShape = new StructureShape([
            'type' => 'structure',
            'members' => [
                'name' => [
                    'type' => 'string'
                ],
                'lastName' => [
                    'type' => 'string'
                ],
                'age' => [
                    'type' => 'integer'
                ],
                'DOB' => [
                    'type' => 'timestamp'
                ]
            ]
        ], new ShapeMap([]));
        $operation->method('getOutput')
            -> willReturn($outputShape);
        $operation['output'] = $outputShape;
        $service->method('getOperation')
            -> withAnyParameters()
            -> willReturn($operation);
        $jsonRPCParser = new JsonRpcParser($service);
        $command = $this->getMockBuilder(Command::class)
            -> disableOriginalConstructor()
            -> setMethods(['getName'])
            -> getMock();
        $command->method('getName')
            ->willReturn('TestCommand');
        $body = json_encode([
            'name' => 'foo',
            'lastName' => 'fuzz',
            'age' => 28
        ]);
        $response = new Response(200, [], $body);
        $result = $jsonRPCParser($command, $response);

        foreach ($result->toArray() as $_ => $value) {
            $this->assertNotInstanceOf(EventParsingIterator::class, $value);
        }

        $this->assertEquals(
            json_decode($body, true),
            $result->toArray()
        );
    }

    public function testCanHandleStreamingResponses()
    {
        $service = $this->getMockBuilder(Service::class)
            -> disableOriginalConstructor()
            -> setMethods(['getOperation'])
            -> getMock();
        $operation = $this->getMockBuilder(Operation::class)
            -> disableOriginalConstructor()
            -> setMethods(['getOutput'])
            -> getMock();
        $outputShape = new StructureShape([
            'type' => 'structure',
            'members' => [
                'responseStream' => [
                    'type' => 'structure',
                    'eventstream' => true,
                    'members' => [
                        'person' => [
                            'type' => 'structure',
                            'members' => [
                                'name' => [
                                    'type' => 'string'
                                ],
                                'lastName' => [
                                    'type' => 'string'
                                ],
                                'age' => [
                                    'type' => 'integer'
                                ],
                                'DOB' => [
                                    'type' => 'timestamp'
                                ]
                            ]
                        ]
                    ]
                ],
            ]
        ], new ShapeMap([]));
        $operation->method('getOutput')
            -> willReturn($outputShape);
        $operation['output'] = $outputShape;
        $service->method('getOperation')
            -> withAnyParameters()
            -> willReturn($operation);
        $jsonRPCParser = new JsonRpcParser($service);
        $command = $this->getMockBuilder(Command::class)
            -> disableOriginalConstructor()
            -> setMethods(['getName'])
            -> getMock();
        $command->method('getName')
            ->willReturn('TestCommand');
        $expectedResult = [
            'person' => [
                'name' => 'foo',
                'lastName' => 'fuzz',
                'age' => 28
            ]
        ];
        $body = <<<EOF
AAAAhQAAAExjTu0wDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcABnBlcnNvbg06Y29udGVudC10eXBlBwAQYXBwbGljYXRpb24vanNvbnsibmFtZSI6ImZvbyIsImxhc3ROYW1lIjoiZnV6eiIsImFnZSI6Mjh9+hfixw==
EOF;
        $response = new Response(200, [], Utils::streamFor(base64_decode($body)));
        $resultToArray = $jsonRPCParser($command, $response)->toArray();
        $iterator = $resultToArray['responseStream'];
        $this->assertInstanceOf(EventParsingIterator::class, $iterator);
        $iterator->rewind();
        $this->assertEquals($expectedResult, $iterator->current());
    }
}
