<?php
namespace Aws\Test\Api\Serde\Xml;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Parser\XmlParser;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Serde\Xml\XmlDecodePlan;
use Aws\Api\Serde\Xml\XmlDecodePlanProvider;
use Aws\Api\Serde\Xml\XmlEncodePlan;
use Aws\Api\Serde\Xml\XmlEncodePlanProvider;
use Aws\Api\Serializer\XmlBody;
use Aws\Api\Service;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * XML counterpart of JsonPlanInvalidationTest: model mutation must rebuild
 * the affected XML encode and decode plans, and requests built afterwards
 * must follow the new model.
 */
#[CoversClass(XmlEncodePlanProvider::class)]
#[CoversClass(XmlDecodePlanProvider::class)]
class XmlPlanInvalidationTest extends TestCase
{
    private function structure(array $members, ?ShapeMap $map = null): StructureShape
    {
        return new StructureShape(
            ['type' => 'structure', 'name' => 'Root', 'members' => $members],
            $map ?? new ShapeMap([])
        );
    }

    private function body(): XmlBody
    {
        return new XmlBody(new Service(
            ['metadata' => ['protocol' => 'rest-xml'], 'shapes' => []],
            function () {
                return [];
            }
        ));
    }

    public function testLocationNameMutationRebuildsEncodePlan(): void
    {
        $provider = new XmlEncodePlanProvider();
        $shape = $this->structure(['A' => ['type' => 'string', 'locationName' => 'old']]);

        $plan1 = $provider->get($shape);
        $this->assertSame('old', $plan1->members['A'][XmlEncodePlan::M_ELEMENT]);

        $shape['members'] = ['A' => ['type' => 'string', 'locationName' => 'new']];

        $plan2 = $provider->get($shape);
        $this->assertNotSame($plan1, $plan2);
        $this->assertSame('new', $plan2->members['A'][XmlEncodePlan::M_ELEMENT]);
    }

    public function testLocationNameMutationRebuildsDecodePlan(): void
    {
        $provider = new XmlDecodePlanProvider();
        $shape = $this->structure(['A' => ['type' => 'string', 'locationName' => 'old']]);

        $plan1 = $provider->get($shape);
        $this->assertSame('old', $plan1->members[0][XmlDecodePlan::M_NODE]);

        $shape['members'] = ['A' => ['type' => 'string', 'locationName' => 'new']];

        $plan2 = $provider->get($shape);
        $this->assertNotSame($plan1, $plan2);
        $this->assertSame('new', $plan2->members[0][XmlDecodePlan::M_NODE]);
    }

    public function testAttributeToggleRebuildsEncodePlan(): void
    {
        $provider = new XmlEncodePlanProvider();
        $shape = $this->structure(['A' => ['type' => 'string']]);

        $plan1 = $provider->get($shape);
        $this->assertNull($plan1->members['A'][XmlEncodePlan::M_ATTR_NAME]);
        $this->assertSame([], $plan1->attributeMembers);

        $shape['members'] = ['A' => ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'a']];

        $plan2 = $provider->get($shape);
        $this->assertSame('a', $plan2->members['A'][XmlEncodePlan::M_ATTR_NAME]);
        $this->assertSame(['A'], $plan2->attributeMembers);
    }

    public function testCoercionMutationRebuildsDecodePlan(): void
    {
        $provider = new XmlDecodePlanProvider();
        $shape = $this->structure(['A' => ['type' => 'string']]);

        $this->assertSame(
            XmlDecodePlan::COERCE_STRING,
            $provider->get($shape)->members[0][XmlDecodePlan::M_COERCE]
        );

        $shape['members'] = ['A' => ['type' => 'integer']];

        $this->assertSame(
            XmlDecodePlan::COERCE_INT,
            $provider->get($shape)->members[0][XmlDecodePlan::M_COERCE]
        );
    }

    public function testMutatingChildInvalidatesParentAndChildPlans(): void
    {
        // Parent and child share a ShapeMap generation, so mutating the child
        // must also drop the parent's cached plan.
        $map = new ShapeMap(['Child' => [
            'type' => 'structure',
            'members' => ['X' => ['type' => 'string']],
        ]]);
        $parent = $this->structure(['C' => ['shape' => 'Child']], $map);
        $provider = new XmlEncodePlanProvider();

        $parentPlan = $provider->get($parent);
        $child = $parent->getMember('C');
        $childPlan = $provider->get($child);

        $child['members'] = ['Y' => ['type' => 'string']];

        $this->assertNotSame($childPlan, $provider->get($child));
        $this->assertNotSame($parentPlan, $provider->get($parent));
        $this->assertArrayHasKey('Y', $provider->get($child)->members);
    }

    public function testListItemMutationRebuildsAttributeFields(): void
    {
        $list = new ListShape(
            ['type' => 'list', 'member' => ['type' => 'string']],
            new ShapeMap([])
        );
        $provider = new XmlEncodePlanProvider();

        $plan1 = $provider->get($list);
        $this->assertFalse($plan1->listItemAttribute);
        $this->assertNull($plan1->listItemAttrName);

        $list['member'] = ['type' => 'string', 'xmlAttribute' => true, 'locationName' => 'it'];

        $plan2 = $provider->get($list);
        $this->assertNotSame($plan1, $plan2);
        $this->assertTrue($plan2->listItemAttribute);
        $this->assertSame('it', $plan2->listItemAttrName);
    }

    public function testMapValueMutationRebuildsAttributeFields(): void
    {
        $map = new MapShape(
            ['type' => 'map', 'key' => ['type' => 'string'], 'value' => ['type' => 'string']],
            new ShapeMap([])
        );
        $provider = new XmlEncodePlanProvider();

        $plan1 = $provider->get($map);
        $this->assertFalse($plan1->mapKeyAttribute);
        $this->assertFalse($plan1->mapValueAttribute);

        $map['value'] = ['type' => 'string', 'xmlAttribute' => true];

        $plan2 = $provider->get($map);
        $this->assertNotSame($plan1, $plan2);
        $this->assertFalse($plan2->mapKeyAttribute);
        $this->assertTrue($plan2->mapValueAttribute);
    }

    public function testOffsetUnsetInvalidatesPlan(): void
    {
        $provider = new XmlEncodePlanProvider();
        $shape = $this->structure(['A' => ['type' => 'string']]);
        $shape['xmlNamespace'] = ['uri' => 'http://a'];

        $plan1 = $provider->get($shape);
        $this->assertSame(['xmlns', 'http://a'], $plan1->namespace);

        unset($shape['xmlNamespace']);

        $plan2 = $provider->get($shape);
        $this->assertNotSame($plan1, $plan2);
        $this->assertNull($plan2->namespace);
    }

    public function testStableGenerationReusesCachedPlans(): void
    {
        $shape = $this->structure(['A' => ['type' => 'string']]);
        $encode = new XmlEncodePlanProvider();
        $decode = new XmlDecodePlanProvider();

        $this->assertSame($encode->get($shape), $encode->get($shape));
        $this->assertSame($decode->get($shape), $decode->get($shape));
    }

    public function testRootNameIsResolvedOnBuildAndCachedOnRootPlan(): void
    {
        $shape = $this->structure([
            'C' => ['type' => 'structure', 'members' => ['X' => ['type' => 'string']]],
        ]);
        $provider = new XmlEncodePlanProvider();

        // Compiling never resolves a root name; nested shapes may have none.
        $this->assertNull($provider->get($shape)->rootName);

        $body = $this->body();
        $body->build($shape, ['C' => ['X' => 'x']]);

        $rootPlan = $shape->getSerdePlan(ShapePlanCache::XML_ENCODE);
        $this->assertSame('Root', $rootPlan->rootName);
        $childPlan = $shape->getMember('C')->getSerdePlan(ShapePlanCache::XML_ENCODE);
        $this->assertNull($childPlan->rootName);
    }

    public function testEncodeFollowsMemberMutation(): void
    {
        $shape = $this->structure(['A' => ['type' => 'string', 'locationName' => 'old']]);
        $body = $this->body();
        $prefix = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $this->assertSame($prefix . "<Root><old>a</old></Root>\n", $body->build($shape, ['A' => 'a']));

        $shape['members'] = ['A' => ['type' => 'string', 'locationName' => 'new']];
        $this->assertSame($prefix . "<Root><new>a</new></Root>\n", $body->build($shape, ['A' => 'a']));

        $shape['members'] = ['A' => ['type' => 'string', 'xmlAttribute' => true]];
        $this->assertSame($prefix . "<Root A=\"a\"/>\n", $body->build($shape, ['A' => 'a']));
    }

    public function testDecodeFollowsMemberMutation(): void
    {
        $shape = $this->structure(['A' => ['type' => 'string', 'locationName' => 'old']]);
        $parser = new XmlParser();
        $xml = new \SimpleXMLElement('<Root><old>1</old><new>2</new></Root>');

        $this->assertSame(['A' => '1'], $parser->parse($shape, $xml));

        $shape['members'] = ['A' => ['type' => 'string', 'locationName' => 'new']];
        $this->assertSame(['A' => '2'], $parser->parse($shape, $xml));

        $shape['members'] = ['A' => ['type' => 'integer', 'locationName' => 'new']];
        $this->assertSame(['A' => 2], $parser->parse($shape, $xml));
    }
}
