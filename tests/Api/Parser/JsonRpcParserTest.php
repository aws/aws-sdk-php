<?php
namespace Aws\Test\Api\Parser;

use Aws\Api\Operation;
use Aws\Api\Parser\JsonParser;
use Aws\Api\Parser\JsonRpcParser;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\CommandInterface;
use GuzzleHttp\Psr7\Response;

class JsonRpcParserTest extends \PHPUnit_Framework_TestCase
{
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
}
