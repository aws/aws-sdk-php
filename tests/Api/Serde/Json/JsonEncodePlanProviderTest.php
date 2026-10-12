<?php
namespace Aws\Test\Api\Serde\Json;

use Aws\Api\Serde\Json\JsonEncodePlan;
use Aws\Api\Serde\Json\JsonEncodePlanProvider;
use Aws\Api\Serde\Json\JsonShapeType;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(JsonEncodePlanProvider::class)]
#[CoversClass(JsonEncodePlan::class)]
#[CoversClass(JsonShapeType::class)]
class JsonEncodePlanProviderTest extends TestCase
{
    private function shape(array $def): Shape
    {
        return Shape::create($def, new ShapeMap([]));
    }

    public function testCompilesStructureMemberDescriptors(): void
    {
        $provider = new JsonEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => [
                'Name'  => ['type' => 'string', 'locationName' => 'name'],
                'Count' => ['type' => 'integer'],
                'When'  => ['type' => 'timestamp'],
                'Body'  => ['type' => 'blob'],
                'Items' => ['type' => 'list', 'member' => ['type' => 'string']],
            ],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame(JsonShapeType::STRUCTURE, $plan->type);

        // Wire name uses locationName when present, SDK name otherwise.
        $this->assertSame('name', $plan->members['Name'][JsonEncodePlan::M_WIRE]);
        $this->assertSame('Count', $plan->members['Count'][JsonEncodePlan::M_WIRE]);

        // Type tags per member.
        $this->assertSame(JsonShapeType::SCALAR, $plan->members['Name'][JsonEncodePlan::M_TYPE]);
        $this->assertSame(JsonShapeType::SCALAR, $plan->members['Count'][JsonEncodePlan::M_TYPE]);
        $this->assertSame(JsonShapeType::TIMESTAMP, $plan->members['When'][JsonEncodePlan::M_TYPE]);
        $this->assertSame(JsonShapeType::BLOB, $plan->members['Body'][JsonEncodePlan::M_TYPE]);
        $this->assertSame(JsonShapeType::LIST, $plan->members['Items'][JsonEncodePlan::M_TYPE]);

        // Timestamp member defaults to unixTimestamp on encode; non-timestamps null.
        $this->assertSame('unixTimestamp', $plan->members['When'][JsonEncodePlan::M_TSFORMAT]);
        $this->assertNull($plan->members['Name'][JsonEncodePlan::M_TSFORMAT]);

        // Child Shape is retained for lazy composite lookup.
        $this->assertInstanceOf(Shape::class, $plan->members['Items'][JsonEncodePlan::M_SHAPE]);
    }

    public function testCompilesListValueDescriptor(): void
    {
        $provider = new JsonEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'list',
            'member' => ['type' => 'timestamp'],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame(JsonShapeType::LIST, $plan->type);
        $this->assertSame(JsonShapeType::TIMESTAMP, $plan->value[JsonEncodePlan::V_TYPE]);
        $this->assertSame('unixTimestamp', $plan->value[JsonEncodePlan::V_TSFORMAT]);
        $this->assertInstanceOf(Shape::class, $plan->value[JsonEncodePlan::V_SHAPE]);
    }

    public function testCompilesMapValueDescriptor(): void
    {
        $provider = new JsonEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'map',
            'key'   => ['type' => 'string'],
            'value' => ['type' => 'string'],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame(JsonShapeType::MAP, $plan->type);
        $this->assertSame(JsonShapeType::SCALAR, $plan->value[JsonEncodePlan::V_TYPE]);
        $this->assertNull($plan->value[JsonEncodePlan::V_TSFORMAT]);
    }

    public function testCompilesRootTimestampWithExplicitFormat(): void
    {
        $provider = new JsonEncodePlanProvider();
        $shape = $this->shape(['type' => 'timestamp', 'timestampFormat' => 'iso8601']);

        $plan = $provider->get($shape);

        $this->assertSame(JsonShapeType::TIMESTAMP, $plan->type);
        $this->assertSame('iso8601', $plan->timestampFormat);
    }

    public function testDocumentStructureTagsAsDocument(): void
    {
        $provider = new JsonEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'document' => true,
            'members' => [],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame(JsonShapeType::DOCUMENT, $plan->type);
    }

    public function testCachesPlanPerShapeInEncodeSlot(): void
    {
        $provider = new JsonEncodePlanProvider();
        $shape = $this->shape(['type' => 'structure', 'members' => []]);

        $first = $provider->get($shape);
        $second = $provider->get($shape);

        // Same instance returned: compiled once and cached.
        $this->assertSame($first, $second);
        // Stored under the JSON_ENCODE slot.
        $this->assertSame($first, $shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
    }
}
