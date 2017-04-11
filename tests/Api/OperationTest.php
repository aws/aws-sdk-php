<?php
namespace Aws\Test\Api;

use Aws\Api\ShapeMap;
use Aws\Api\Operation;

/**
 * @covers \Aws\Api\Operation
 */
class OperationTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatesDefaultMethodAndUri()
    {
        $o = new Operation([], new ShapeMap([]));
        $this->assertEquals('POST', $o->getHttp()['method']);
        $this->assertEquals('/', $o->getHttp()['requestUri']);
    }

    public function testReturnsEmptyShapes()
    {
        $o = new Operation([], new ShapeMap([]));
        $this->assertInstanceOf('Aws\Api\Shape', $o->getInput());
        $this->assertInstanceOf('Aws\Api\Shape', $o->getOutput());
        $this->assertInternalType('array', $o->getErrors());
    }

    public function testReturnsInputShape()
    {
        $o = new Operation([
            'input' => ['shape' => 'i']
        ], new ShapeMap([
            'i' => ['type' => 'structure']
        ]));
        $i = $o->getInput();
        $this->assertInstanceOf('Aws\Api\Shape', $i);
        $this->assertEquals('structure', $i->getType());
        $this->assertSame($i, $o->getInput());
    }

    public function testReturnsOutputShape()
    {
        $o = new Operation([
            'output' => ['shape' => 'os']
        ], new ShapeMap([
            'os' => ['type' => 'structure']
        ]));
        $os = $o->getOutput();
        $this->assertInstanceOf('Aws\Api\Shape', $os);
        $this->assertEquals('structure', $os->getType());
        $this->assertSame($os, $o->getOutput());
    }

    public function testReturnsErrorsShapeArray()
    {
        $o = new Operation([
            'errors' =>[['shape' => 'a'], ['shape' => 'b']]
        ], new ShapeMap([
            'a' => ['type' => 'structure'],
            'b' => ['type' => 'list'],
        ]));
        $e = $o->getErrors();
        $this->assertInternalType('array', $e);
        $this->assertInstanceOf('Aws\Api\Shape', $e[0]);
        $this->assertInstanceOf('Aws\Api\Shape', $e[1]);
        $this->assertEquals('structure', $e[0]->getType());
        $this->assertEquals('list', $e[1]->getType());
    }

    public function testErrorsDoesNotCreateReferences()
    {
        $o = new Operation([
            'errors' =>[['shape' => 'a'], ['shape' => 'b']]
        ], new ShapeMap([
            'a' => ['type' => 'structure'],
            'b' => ['type' => 'list'],
        ]));
        $errors = $o->getErrors();
        $errorsCopy = $errors;
        $errorsCopy[0]['a_copy'] = $errorsCopy[0]['a'];
        $errorsCopy[0]['a'] = 'test';
        $this->assertEquals('structure', $errors[0]->getType());
    }
}
