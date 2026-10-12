<?php
namespace Aws\Test\Api\Serde\Json;

use Aws\Api\Serde\Json\JsonDecodePlan;
use Aws\Api\Serde\Json\JsonDecodePlanProvider;
use Aws\Api\Serde\Json\JsonShapeType;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(JsonDecodePlanProvider::class)]
#[CoversClass(JsonDecodePlan::class)]
class JsonDecodePlanProviderTest extends TestCase
{
    private function shape(array $def): Shape
    {
        return Shape::create($def, new ShapeMap([]));
    }

    public function testCompilesStructureMembersInModeledOrder(): void
    {
        $provider = new JsonDecodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => [
                'First'  => ['type' => 'string', 'locationName' => 'first_wire'],
                'Second' => ['type' => 'timestamp'],
                'Third'  => ['type' => 'map', 'key' => ['type' => 'string'], 'value' => ['type' => 'string']],
            ],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame(JsonShapeType::STRUCTURE, $plan->type);
        // Ordered list, not name-keyed: preserves modeled result order.
        $this->assertSame('First', $plan->members[0][JsonDecodePlan::M_SDK]);
        $this->assertSame('Second', $plan->members[1][JsonDecodePlan::M_SDK]);
        $this->assertSame('Third', $plan->members[2][JsonDecodePlan::M_SDK]);

        // Wire name from locationName; SDK name otherwise.
        $this->assertSame('first_wire', $plan->members[0][JsonDecodePlan::M_WIRE]);
        $this->assertSame('Second', $plan->members[1][JsonDecodePlan::M_WIRE]);

        // Type tags.
        $this->assertSame(JsonShapeType::SCALAR, $plan->members[0][JsonDecodePlan::M_TYPE]);
        $this->assertSame(JsonShapeType::TIMESTAMP, $plan->members[1][JsonDecodePlan::M_TYPE]);
        $this->assertSame(JsonShapeType::MAP, $plan->members[2][JsonDecodePlan::M_TYPE]);
    }

    public function testDecodeTimestampDefaultsToNull(): void
    {
        // JsonParser defaults timestamp decode format to null (DateTimeResult),
        // unlike encode which defaults to unixTimestamp.
        $provider = new JsonDecodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => ['When' => ['type' => 'timestamp']],
        ]);

        $plan = $provider->get($shape);

        $this->assertNull($plan->members[0][JsonDecodePlan::M_TSFORMAT]);
    }

    public function testDecodeTimestampKeepsExplicitFormat(): void
    {
        $provider = new JsonDecodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => ['When' => ['type' => 'timestamp', 'timestampFormat' => 'iso8601']],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame('iso8601', $plan->members[0][JsonDecodePlan::M_TSFORMAT]);
    }

    public function testCompilesRootTimestamp(): void
    {
        $provider = new JsonDecodePlanProvider();

        // No explicit format: decode defaults to null (DateTimeResult).
        $plain = $provider->get($this->shape(['type' => 'timestamp']));
        $this->assertSame(JsonShapeType::TIMESTAMP, $plain->type);
        $this->assertNull($plain->timestampFormat);

        // Explicit format is retained on the root plan.
        $iso = $provider->get($this->shape(['type' => 'timestamp', 'timestampFormat' => 'iso8601']));
        $this->assertSame('iso8601', $iso->timestampFormat);
    }

    public function testUnionFlagSet(): void
    {
        $provider = new JsonDecodePlanProvider();
        $union = $this->shape([
            'type' => 'structure',
            'union' => true,
            'members' => ['A' => ['type' => 'string']],
        ]);
        $nonUnion = $this->shape([
            'type' => 'structure',
            'members' => ['A' => ['type' => 'string']],
        ]);

        $this->assertTrue($provider->get($union)->union);
        $this->assertFalse($provider->get($nonUnion)->union);
    }

    public function testCompilesListAndMapValueDescriptors(): void
    {
        $provider = new JsonDecodePlanProvider();

        $list = $provider->get($this->shape([
            'type' => 'list',
            'member' => ['type' => 'string'],
        ]));
        $this->assertSame(JsonShapeType::LIST, $list->type);
        $this->assertSame(JsonShapeType::SCALAR, $list->value[JsonDecodePlan::V_TYPE]);

        $map = $provider->get($this->shape([
            'type' => 'map',
            'key'   => ['type' => 'string'],
            'value' => ['type' => 'timestamp'],
        ]));
        $this->assertSame(JsonShapeType::MAP, $map->type);
        $this->assertSame(JsonShapeType::TIMESTAMP, $map->value[JsonDecodePlan::V_TYPE]);
        $this->assertNull($map->value[JsonDecodePlan::V_TSFORMAT]);
    }

    public function testCachesPlanPerShapeInDecodeSlot(): void
    {
        $provider = new JsonDecodePlanProvider();
        $shape = $this->shape(['type' => 'structure', 'members' => []]);

        $first = $provider->get($shape);
        $second = $provider->get($shape);

        $this->assertSame($first, $second);
        $this->assertSame($first, $shape->getSerdePlan(ShapePlanCache::JSON_DECODE));
        // Decode plan does not occupy the encode slot.
        $this->assertNull($shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
    }
}
