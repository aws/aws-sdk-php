<?php
namespace Aws\Test\Api;

use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\Operation;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\Operation
 */
class OperationTest extends TestCase
{
    public function testCreatesDefaultMethodAndUri()
    {
        $o = new Operation([], new ShapeMap([]));
        $this->assertSame('POST', $o->getHttp()['method']);
        $this->assertSame('/', $o->getHttp()['requestUri']);
    }

    public function testReturnsEmptyShapes()
    {
        $o = new Operation([], new ShapeMap([]));
        $this->assertInstanceOf(Shape::class, $o->getInput());
        $this->assertInstanceOf(Shape::class, $o->getOutput());
        $this->assertIsArray($o->getErrors());
    }

    public function testReturnsInputShape()
    {
        $o = new Operation([
            'input' => ['shape' => 'i']
        ], new ShapeMap([
            'i' => ['type' => 'structure']
        ]));
        $i = $o->getInput();
        $this->assertInstanceOf(Shape::class, $i);
        $this->assertSame('structure', $i->getType());
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
        $this->assertInstanceOf(Shape::class, $os);
        $this->assertSame('structure', $os->getType());
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
        $this->assertIsArray($e);
        $this->assertInstanceOf(Shape::class , $e[0]);
        $this->assertInstanceOf(Shape::class, $e[1]);
        $this->assertSame('structure', $e[0]->getType());
        $this->assertSame('list', $e[1]->getType());
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
        $this->assertSame('structure', $errors[0]->getType());
    }

    public function testGetStaticContextParams()
    {
        $params = ['Foo' => ['value' => 'bar']];
        $o = new Operation([
            'staticContextParams' => $params
        ], new ShapeMap([
            'i' => ['type' => 'structure']
        ]));
        $staticContextParams = $o->getStaticContextParams();
        $this->assertEquals(
            $params,
            $staticContextParams
        );
    }

    public function testGetContextParams()
    {
        $expected = [
          'Foo' => [
              'shape' => 'Foo',
              'type' => 'string'
          ]
        ];
        $o = new Operation([
            'input' => ['shape' => 'FooOperationRequest']
        ], new ShapeMap([
            'FooOperationRequest' => [
                'type' => 'structure',
                'members' => [
                    'Foo' => [
                        'shape' => 'Foo',
                        'contextParam' => [
                            'name' => 'Foo'
                        ]
                    ]
                ]
            ],
            'Foo' => [
                'type' => 'string'
            ]
        ]));

        $contextParams = $o->getContextParams();
        $this->assertEquals(
           $expected,
           $contextParams
        );
    }
}
