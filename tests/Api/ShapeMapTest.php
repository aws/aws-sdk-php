<?php
namespace Aws\Test\Api;

use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Api\ShapeMap
 */
class ShapeMapTest extends TestCase
{
    private $shapeDefinitions;
    private $shapeMap;

    protected function setUp(): void
    {
        $this->shapeDefinitions = [
            'StringShape' => [
                'type' => 'string'
            ],
            'PayloadWithXmlName' => [
                'type' => 'structure',
                'locationName' => 'Hello',
                'members' => [
                    'name' => [
                        'shape' => 'StringShape'
                    ]
                ]
            ],
            'BodyWithXmlNameInputOutput' => [
                'type' => 'structure',
                'locationName' => 'Ahoy',
                'members' => [
                    'nested' => [
                        'shape' => 'PayloadWithXmlName'
                    ]
                ]
            ]
        ];

        $this->shapeMap = new ShapeMap($this->shapeDefinitions);
    }

    public function testOffsetExists(): void
    {
        // Test existing shapes
        $this->assertTrue(isset($this->shapeMap['StringShape']));
        $this->assertTrue(isset($this->shapeMap['PayloadWithXmlName']));
        $this->assertTrue(isset($this->shapeMap['BodyWithXmlNameInputOutput']));

        // Test non-existing shape
        $this->assertFalse(isset($this->shapeMap['NonExistentShape']));
    }

    public function testOffsetGet(): void
    {
        // Test getting existing shape definition
        $stringShape = $this->shapeMap['StringShape'];
        $this->assertEquals(['type' => 'string'], $stringShape);

        // Test getting structure with locationName
        $payloadShape = $this->shapeMap['PayloadWithXmlName'];
        $this->assertEquals('structure', $payloadShape['type']);
        $this->assertEquals('Hello', $payloadShape['locationName']);

        // Test getting non-existing shape returns null
        $this->assertNull($this->shapeMap['NonExistentShape']);
    }

    public function testOffsetSetThrowsException(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('ShapeMap is read-only and cannot be modified.');

        $this->shapeMap['NewShape'] = [
            'type' => 'integer',
            'min' => 0,
            'max' => 100
        ];
    }

    public function testOffsetSetOnExistingShapeThrowsException(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('ShapeMap is read-only and cannot be modified.');

        $this->shapeMap['StringShape'] = [
            'type' => 'string',
            'pattern' => '[a-z]+'
        ];
    }

    public function testOffsetUnsetThrowsException(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('ShapeMap is read-only and cannot be modified.');

        unset($this->shapeMap['StringShape']);
    }

    public function testReadOnlyArrayAccessWithComplexOperations(): void
    {
        // Test accessing nested properties (read-only operations)
        $shape = $this->shapeMap['PayloadWithXmlName'];
        $this->assertIsArray($shape['members']);
        $this->assertArrayHasKey('name', $shape['members']);

        // Test that original definitions are preserved
        $this->assertEquals(
            'Hello',
            $this->shapeMap['PayloadWithXmlName']['locationName']
        );
    }

    public function testArrayAccessIntegrationWithResolve(): void
    {
        // Ensure ArrayAccess doesn't interfere with existing resolve functionality
        $shapeRef = ['shape' => 'StringShape'];
        $resolved = $this->shapeMap->resolve($shapeRef);

        $this->assertEquals('string', $resolved->getType());

        // Verify we can still access via ArrayAccess after resolve
        $this->assertEquals('string', $this->shapeMap['StringShape']['type']);
    }

    public function testReturnsShapeName(): void
    {
        $sm = new ShapeMap(['foo' => [], 'baz' => []]);
        $this->assertEquals(['foo', 'baz'], $sm->getShapeNames());
    }

    public function testEnsuresShapeExists(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $sm = new ShapeMap([]);
        $sm->resolve(['shape' => 'missing']);
    }

    public function testReturnsShapes(): void
    {
        $sm = new ShapeMap(['foo' => ['type' => 'string']]);
        $s = $sm->resolve(['shape' => 'foo']);
        $this->assertInstanceOf(Shape::class, $s);
        $this->assertArrayNotHasKey('shape', $s->toArray());
        $this->assertSame($s, $sm->resolve(['shape' => 'foo']));
    }
}
