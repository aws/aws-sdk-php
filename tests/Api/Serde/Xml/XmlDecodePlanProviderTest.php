<?php
namespace Aws\Test\Api\Serde\Xml;

use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Serde\Xml\XmlDecodePlan;
use Aws\Api\Serde\Xml\XmlDecodePlanProvider;
use Aws\Api\Serde\Xml\XmlShapeType;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(XmlDecodePlanProvider::class)]
#[CoversClass(XmlDecodePlan::class)]
class XmlDecodePlanProviderTest extends TestCase
{
    private function shape(array $def): Shape
    {
        return Shape::create($def, new ShapeMap([]));
    }

    public function testStructureMembersInModeledOrderWithNodeNames(): void
    {
        $provider = new XmlDecodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => [
                'First'  => ['type' => 'string', 'locationName' => 'first_wire'],
                'Second' => ['type' => 'timestamp'],
                'Items'  => ['type' => 'list', 'member' => ['type' => 'string']],
            ],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame(XmlShapeType::STRUCTURE, $plan->type);
        // Modeled order preserved.
        $this->assertSame('First', $plan->members[0][XmlDecodePlan::M_SDK]);
        $this->assertSame('Second', $plan->members[1][XmlDecodePlan::M_SDK]);
        $this->assertSame('Items', $plan->members[2][XmlDecodePlan::M_SDK]);
        // Node name from locationName, else SDK name.
        $this->assertSame('first_wire', $plan->members[0][XmlDecodePlan::M_NODE]);
        $this->assertSame('Second', $plan->members[1][XmlDecodePlan::M_NODE]);
        // Type tags.
        $this->assertSame(XmlShapeType::TIMESTAMP, $plan->members[1][XmlDecodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::LIST, $plan->members[2][XmlDecodePlan::M_TYPE]);
    }

    public function testAttributeMemberKeyStripsNamespacePrefix(): void
    {
        $provider = new XmlDecodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'xmlNamespace' => ['prefix' => 'ns2', 'uri' => 'http://ns.example'],
            'members' => [
                'Id' => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'ns2:id'],
            ],
        ]);

        $m = $provider->get($shape)->members[0];
        $this->assertTrue($m[XmlDecodePlan::M_ATTRIBUTE]);
        // Prefix stripped from the attribute key; namespace uri retained.
        $this->assertSame('id', $m[XmlDecodePlan::M_ATTRKEY]);
        $this->assertSame('http://ns.example', $m[XmlDecodePlan::M_ATTRNS]);
    }

    public function testDecodeTimestampDefaultsToNull(): void
    {
        // XML decode default is null (DateTimeResult auto-detect), unlike the
        // encode default of iso8601.
        $provider = new XmlDecodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => ['When' => ['type' => 'timestamp']],
        ]);
        $this->assertNull($provider->get($shape)->members[0][XmlDecodePlan::M_TSFORMAT]);

        $explicit = $this->shape([
            'type' => 'structure',
            'members' => ['When' => ['type' => 'timestamp', 'timestampFormat' => 'rfc822']],
        ]);
        $this->assertSame('rfc822', $provider->get($explicit)->members[0][XmlDecodePlan::M_TSFORMAT]);
    }

    public function testUnionFlag(): void
    {
        $provider = new XmlDecodePlanProvider();
        $union = $this->shape([
            'type' => 'structure', 'union' => true,
            'members' => ['A' => ['type' => 'string']],
        ]);
        $nonUnion = $this->shape([
            'type' => 'structure',
            'members' => ['A' => ['type' => 'string']],
        ]);
        $this->assertTrue($provider->get($union)->union);
        $this->assertFalse($provider->get($nonUnion)->union);
    }

    public function testListFlattenedAndItemName(): void
    {
        $provider = new XmlDecodePlanProvider();
        $flat = $provider->get($this->shape([
            'type' => 'list', 'flattened' => true,
            'member' => ['type' => 'string'],
        ]));
        $this->assertTrue($flat->flattened);

        $wrapped = $provider->get($this->shape([
            'type' => 'list',
            'member' => ['type' => 'string', 'locationName' => 'Item'],
        ]));
        $this->assertFalse($wrapped->flattened);
        $this->assertSame('Item', $wrapped->listItemName);
        $this->assertSame(XmlShapeType::SCALAR, $wrapped->listItemType);

        $default = $provider->get($this->shape([
            'type' => 'list', 'member' => ['type' => 'string'],
        ]));
        $this->assertSame('member', $default->listItemName);
    }

    public function testMapNamesAndFlattening(): void
    {
        $provider = new XmlDecodePlanProvider();
        $wrapped = $provider->get($this->shape([
            'type' => 'map',
            'key'   => ['type' => 'string'],
            'value' => ['type' => 'timestamp'],
        ]));
        $this->assertSame(XmlShapeType::MAP, $wrapped->type);
        $this->assertFalse($wrapped->flattened);
        $this->assertSame('key', $wrapped->mapKeyName);
        $this->assertSame('value', $wrapped->mapValueName);
        $this->assertSame(XmlShapeType::TIMESTAMP, $wrapped->mapValueType);
        // Decode timestamp default null carried on the map value.
        $this->assertNull($wrapped->mapValueTsFormat);

        $custom = $provider->get($this->shape([
            'type' => 'map', 'flattened' => true,
            'key'   => ['type' => 'string', 'locationName' => 'K'],
            'value' => ['type' => 'string', 'locationName' => 'V'],
        ]));
        $this->assertTrue($custom->flattened);
        $this->assertSame('K', $custom->mapKeyName);
        $this->assertSame('V', $custom->mapValueName);
    }

    public function testRootTimestampAndLeafTags(): void
    {
        $provider = new XmlDecodePlanProvider();
        $ts = $provider->get($this->shape(['type' => 'timestamp']));
        $this->assertSame(XmlShapeType::TIMESTAMP, $ts->type);
        $this->assertNull($ts->timestampFormat);

        // Leaf tags via a structure to cover blob/boolean branches.
        $plan = $provider->get($this->shape([
            'type' => 'structure',
            'members' => [
                'Body' => ['type' => 'blob'],
                'Flag' => ['type' => 'boolean'],
                'N'    => ['type' => 'integer'],
            ],
        ]));
        $this->assertSame(XmlShapeType::BLOB, $plan->members[0][XmlDecodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::BOOLEAN, $plan->members[1][XmlDecodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::SCALAR, $plan->members[2][XmlDecodePlan::M_TYPE]);
    }

    public function testStructureMemberInheritedLocationNameReadsByMemberName(): void
    {
        // Reproduces XmlParser::memberKey's getOriginalDefinition special case:
        // a StructureShape member whose locationName was inherited from the
        // target shape definition (structure level) reads by the member name,
        // not the locationName. Built via a ShapeMap so the named target shape
        // carries a structure-level locationName that ShapeMap::resolve merges
        // onto the member reference.
        $map = new ShapeMap([
            'Outer' => [
                'type' => 'structure',
                'members' => [
                    'Inner' => ['shape' => 'Inner'],
                ],
            ],
            'Inner' => [
                'type' => 'structure',
                'locationName' => 'InheritedName',
                'members' => [
                    'Field' => ['type' => 'string'],
                ],
            ],
        ]);
        $outer = $map->resolve(['shape' => 'Outer']);

        $plan = (new XmlDecodePlanProvider())->get($outer);

        // The Inner member inherited locationName 'InheritedName' from the shape
        // definition, so it must be read by the member name 'Inner'.
        $this->assertSame('Inner', $plan->members[0][XmlDecodePlan::M_SDK]);
        $this->assertSame('Inner', $plan->members[0][XmlDecodePlan::M_NODE]);
    }

    public function testCachesPlanPerShapeInXmlDecodeSlot(): void
    {
        $provider = new XmlDecodePlanProvider();
        $shape = $this->shape(['type' => 'structure', 'members' => []]);

        $first = $provider->get($shape);
        $this->assertSame($first, $provider->get($shape));
        $this->assertSame($first, $shape->getSerdePlan(ShapePlanCache::XML_DECODE));
        // Does not collide with the XML encode slot.
        $this->assertNull($shape->getSerdePlan(ShapePlanCache::XML_ENCODE));
    }
}
