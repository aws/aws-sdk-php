<?php
namespace Aws\Test\Api\Serde\Xml;

use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Serde\Xml\XmlEncodePlan;
use Aws\Api\Serde\Xml\XmlEncodePlanProvider;
use Aws\Api\Serde\Xml\XmlShapeType;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(XmlEncodePlanProvider::class)]
#[CoversClass(XmlEncodePlan::class)]
#[CoversClass(XmlShapeType::class)]
class XmlEncodePlanProviderTest extends TestCase
{
    private function shape(array $def): Shape
    {
        return Shape::create($def, new ShapeMap([]));
    }

    public function testCompilesStructureWithAttributeAndNamespace(): void
    {
        $provider = new XmlEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'xmlNamespace' => ['uri' => 'http://ns.example'],
            'members' => [
                'Id'   => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'id'],
                'Name' => ['type' => 'string', 'locationName' => 'thing_name'],
                'When' => ['type' => 'timestamp'],
            ],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame(XmlShapeType::STRUCTURE, $plan->type);
        // Namespace precomputed as [attrName, uri].
        $this->assertSame(['xmlns', 'http://ns.example'], $plan->namespace);

        // Member element names resolved from locationName.
        $this->assertSame('id', $plan->members['Id'][XmlEncodePlan::M_ELEMENT]);
        $this->assertSame('thing_name', $plan->members['Name'][XmlEncodePlan::M_ELEMENT]);

        // Attribute flag + attributeMembers list.
        $this->assertTrue($plan->members['Id'][XmlEncodePlan::M_ATTRIBUTE]);
        $this->assertFalse($plan->members['Name'][XmlEncodePlan::M_ATTRIBUTE]);
        $this->assertSame(['Id'], $plan->attributeMembers);

        // Type tags.
        $this->assertSame(XmlShapeType::SCALAR, $plan->members['Name'][XmlEncodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::TIMESTAMP, $plan->members['When'][XmlEncodePlan::M_TYPE]);
    }

    public function testOnlyStringAttributesGetAnAttributeName(): void
    {
        $provider = new XmlEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => [
                'Id'    => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'id'],
                'Count' => ['type' => 'integer', 'xmlAttribute' => true],
                'Name'  => ['type' => 'string'],
            ],
        ]);

        $plan = $provider->get($shape);

        $this->assertSame('id', $plan->members['Id'][XmlEncodePlan::M_ATTR_NAME]);
        // Non-string xmlAttribute members are still ordered first but written
        // as elements, so they carry no attribute name.
        $this->assertTrue($plan->members['Count'][XmlEncodePlan::M_ATTRIBUTE]);
        $this->assertNull($plan->members['Count'][XmlEncodePlan::M_ATTR_NAME]);
        $this->assertNull($plan->members['Name'][XmlEncodePlan::M_ATTR_NAME]);
        $this->assertSame(['Id', 'Count'], $plan->attributeMembers);
    }

    public function testPrefixedNamespace(): void
    {
        $provider = new XmlEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'xmlNamespace' => ['prefix' => 'ns2', 'uri' => 'http://ns.example'],
            'members' => [],
        ]);

        $this->assertSame(
            ['xmlns:ns2', 'http://ns.example'],
            $provider->get($shape)->namespace
        );
    }

    public function testLocationNameAtStructureLevelIsIgnored(): void
    {
        // When locationName came from the structure level, the member element
        // name falls back to the SDK member name (matches XmlBody).
        $provider = new XmlEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => [
                'Name' => [
                    'type' => 'string',
                    'locationName' => 'should_be_ignored',
                    'locationNameAtStructureLevel' => true,
                ],
            ],
        ]);

        $this->assertSame('Name', $provider->get($shape)->members['Name'][XmlEncodePlan::M_ELEMENT]);
    }

    public function testFlattenedList(): void
    {
        $provider = new XmlEncodePlanProvider();
        $flat = $provider->get($this->shape([
            'type' => 'list',
            'flattened' => true,
            'member' => ['type' => 'string'],
        ]));
        $this->assertSame(XmlShapeType::LIST, $flat->type);
        $this->assertTrue($flat->flattened);

        $wrapped = $provider->get($this->shape([
            'type' => 'list',
            'member' => ['type' => 'string', 'locationName' => 'Item'],
        ]));
        $this->assertFalse($wrapped->flattened);
        $this->assertSame('Item', $wrapped->listItemName);
    }

    public function testWrappedListDefaultsItemNameToMember(): void
    {
        $provider = new XmlEncodePlanProvider();
        $plan = $provider->get($this->shape([
            'type' => 'list',
            'member' => ['type' => 'string'],
        ]));
        $this->assertSame('member', $plan->listItemName);
    }

    public function testMapNamesAndFlattening(): void
    {
        $provider = new XmlEncodePlanProvider();

        $wrapped = $provider->get($this->shape([
            'type' => 'map',
            'key'   => ['type' => 'string'],
            'value' => ['type' => 'string'],
        ]));
        $this->assertSame(XmlShapeType::MAP, $wrapped->type);
        $this->assertFalse($wrapped->flattened);
        $this->assertSame('entry', $wrapped->mapEntryName);
        $this->assertSame('key', $wrapped->mapKeyName);
        $this->assertSame('value', $wrapped->mapValueName);

        $custom = $provider->get($this->shape([
            'type' => 'map',
            'flattened' => true,
            'key'   => ['type' => 'string', 'locationName' => 'K'],
            'value' => ['type' => 'string', 'locationName' => 'V'],
        ]));
        $this->assertTrue($custom->flattened);
        $this->assertSame('K', $custom->mapKeyName);
        $this->assertSame('V', $custom->mapValueName);
    }

    public function testTimestampDefaultsToIso8601(): void
    {
        // XML default is iso8601, unlike JSON's unixTimestamp.
        $provider = new XmlEncodePlanProvider();
        $plan = $provider->get($this->shape([
            'type' => 'structure',
            'members' => ['When' => ['type' => 'timestamp']],
        ]));

        // Root timestamp form:
        $root = $provider->get($this->shape(['type' => 'timestamp']));
        $this->assertSame('iso8601', $root->timestampFormat);

        $explicit = $provider->get($this->shape([
            'type' => 'timestamp', 'timestampFormat' => 'rfc822',
        ]));
        $this->assertSame('rfc822', $explicit->timestampFormat);
    }

    public function testLeafTypeTags(): void
    {
        // Cover every XmlShapeType::fromShape branch, including blob and
        // boolean, plus the scalar default for numeric types.
        $provider = new XmlEncodePlanProvider();
        $shape = $this->shape([
            'type' => 'structure',
            'members' => [
                'Body'    => ['type' => 'blob'],
                'Flag'    => ['type' => 'boolean'],
                'Count'   => ['type' => 'integer'],
                'Ratio'   => ['type' => 'double'],
                'Name'    => ['type' => 'string'],
            ],
        ]);
        $plan = $provider->get($shape);

        $this->assertSame(XmlShapeType::BLOB, $plan->members['Body'][XmlEncodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::BOOLEAN, $plan->members['Flag'][XmlEncodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::SCALAR, $plan->members['Count'][XmlEncodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::SCALAR, $plan->members['Ratio'][XmlEncodePlan::M_TYPE]);
        $this->assertSame(XmlShapeType::SCALAR, $plan->members['Name'][XmlEncodePlan::M_TYPE]);
    }

    public function testCachesPlanPerShapeInXmlEncodeSlot(): void
    {
        $provider = new XmlEncodePlanProvider();
        $shape = $this->shape(['type' => 'structure', 'members' => []]);

        $first = $provider->get($shape);
        $second = $provider->get($shape);

        $this->assertSame($first, $second);
        $this->assertSame($first, $shape->getSerdePlan(ShapePlanCache::XML_ENCODE));
        // Does not collide with the JSON encode slot.
        $this->assertNull($shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
    }
}
