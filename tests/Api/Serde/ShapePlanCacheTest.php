<?php
namespace Aws\Test\Api\Serde;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Operation;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use PHPUnit\Framework\Attributes\CoversClass;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * Foundation tests for the shared serde plan cache: storage, direction-specific
 * slots, and graph-generation invalidation across related model objects.
 */
#[CoversClass(ShapePlanCache::class)]
#[CoversClass(ShapeMap::class)]
class ShapePlanCacheTest extends TestCase
{
    public function testSlotsAreDistinct()
    {
        $slots = [
            ShapePlanCache::JSON_ENCODE,
            ShapePlanCache::JSON_DECODE,
            ShapePlanCache::HTTP_REQUEST_BINDINGS,
            ShapePlanCache::HTTP_RESPONSE_BINDINGS,
            ShapePlanCache::XML_ENCODE,
            ShapePlanCache::XML_DECODE,
            ShapePlanCache::QUERY_ENCODE,
            ShapePlanCache::EC2_QUERY_ENCODE,
        ];

        $this->assertCount(count($slots), array_unique($slots));
    }

    public function testCachesAndReturnsPlan()
    {
        $shape = new Shape(['type' => 'string', 'name' => 'S'], new ShapeMap([]));
        $plan = new \stdClass();

        $this->assertNull($shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
        $this->assertSame(
            $plan,
            $shape->cacheSerdePlan(ShapePlanCache::JSON_ENCODE, $plan)
        );
        $this->assertSame(
            $plan,
            $shape->getSerdePlan(ShapePlanCache::JSON_ENCODE)
        );
    }

    public function testDirectionSpecificSlotsAreIndependent()
    {
        $shape = new Shape(['type' => 'string', 'name' => 'S'], new ShapeMap([]));
        $encode = new \stdClass();
        $decode = new \stdClass();

        $shape->cacheSerdePlan(ShapePlanCache::JSON_ENCODE, $encode);
        $shape->cacheSerdePlan(ShapePlanCache::JSON_DECODE, $decode);

        $this->assertSame($encode, $shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
        $this->assertSame($decode, $shape->getSerdePlan(ShapePlanCache::JSON_DECODE));
    }

    public function testMutatingOneShapeInvalidatesPlansOnRelatedShapes()
    {
        $shapeMap = new ShapeMap([
            'A' => ['type' => 'string'],
            'B' => ['type' => 'string'],
        ]);
        $a = $shapeMap->resolve(['shape' => 'A']);
        $b = $shapeMap->resolve(['shape' => 'B']);
        $plan = new \stdClass();

        $a->cacheSerdePlan(ShapePlanCache::JSON_ENCODE, $plan);
        $this->assertSame($plan, $a->getSerdePlan(ShapePlanCache::JSON_ENCODE));

        // Mutating B advances the graph generation, invalidating A's plan.
        $b['documentation'] = 'changed';

        $this->assertNull($a->getSerdePlan(ShapePlanCache::JSON_ENCODE));
    }

    public function testMutatedShapeCanCacheAgainstNewGeneration()
    {
        $shape = new Shape(['type' => 'string', 'name' => 'S'], new ShapeMap([]));
        $shape->cacheSerdePlan(ShapePlanCache::JSON_ENCODE, new \stdClass());

        $shape['documentation'] = 'changed';
        $this->assertNull($shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));

        $rebuilt = new \stdClass();
        $shape->cacheSerdePlan(ShapePlanCache::JSON_ENCODE, $rebuilt);
        $this->assertSame($rebuilt, $shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
    }

    public function testMutatingChildMemberLocationNameClearsResolvedMembersAndPlans()
    {
        $struct = $this->structShape();
        $struct->cacheSerdePlan(ShapePlanCache::JSON_ENCODE, new \stdClass());

        $member = $struct->getMember('A');
        $member['locationName'] = 'renamed';

        // The parent's plan is stale after a related-shape mutation.
        $this->assertNull($struct->getSerdePlan(ShapePlanCache::JSON_ENCODE));
    }

    public function testReplacingStructureMembersRebuildsResolvedMembers()
    {
        $struct = $this->structShape();
        $this->assertSame(['A'], array_keys($struct->getMembers()));

        $struct['members'] = [
            'A' => ['shape' => 'Str'],
            'B' => ['shape' => 'Str'],
        ];

        $this->assertSame(['A', 'B'], array_keys($struct->getMembers()));
    }

    public function testListMemberResolutionClearedOnMutation()
    {
        $shapeMap = new ShapeMap([
            'List' => ['type' => 'list', 'member' => ['shape' => 'Str']],
            'Str'  => ['type' => 'string'],
            'Int'  => ['type' => 'integer'],
        ]);
        /** @var ListShape $list */
        $list = $shapeMap->resolve(['shape' => 'List']);
        $this->assertSame('string', $list->getMember()->getType());

        $list['member'] = ['shape' => 'Int'];
        $this->assertSame('integer', $list->getMember()->getType());
    }

    public function testMapValueResolutionClearedOnMutation()
    {
        $shapeMap = new ShapeMap([
            'Map' => [
                'type'  => 'map',
                'key'   => ['shape' => 'Str'],
                'value' => ['shape' => 'Str'],
            ],
            'Str' => ['type' => 'string'],
            'Int' => ['type' => 'integer'],
        ]);
        /** @var MapShape $map */
        $map = $shapeMap->resolve(['shape' => 'Map']);
        $this->assertSame('string', $map->getValue()->getType());

        $map['value'] = ['shape' => 'Int'];
        $this->assertSame('integer', $map->getValue()->getType());
    }

    public function testOperationOwnsHttpBindingPlans()
    {
        $service = $this->service();
        $operation = $service->getOperation('Foo');
        $plan = new \stdClass();

        $operation->cacheSerdePlan(ShapePlanCache::HTTP_REQUEST_BINDINGS, $plan);
        $this->assertSame(
            $plan,
            $operation->getSerdePlan(ShapePlanCache::HTTP_REQUEST_BINDINGS)
        );
    }

    public function testSetDefinitionReplacesOperationsButKeepsThemStable()
    {
        $service = $this->service();

        $first = $service->getOperation('Foo');
        $this->assertSame($first, $service->getOperation('Foo'), 'operations cache and stay stable');

        $definition = $service->getDefinition();
        $definition['metadata']['serviceId'] = 'changed';
        $service->setDefinition($definition);

        $replaced = $service->getOperation('Foo');
        $this->assertNotSame($first, $replaced, 'setDefinition replaces stale operations');
        $this->assertSame($replaced, $service->getOperation('Foo'), 'new operation stays cached');
    }

    public function testCacheIsSafeWithoutShapeMap()
    {
        // Mocks may construct model objects without a ShapeMap.
        $shape = (new \ReflectionClass(Shape::class))->newInstanceWithoutConstructor();
        $plan = new \stdClass();

        $this->assertNull($shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
        $shape->cacheSerdePlan(ShapePlanCache::JSON_ENCODE, $plan);
        $this->assertSame($plan, $shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));

        // Mutation must not fault when no ShapeMap is present.
        $shape['documentation'] = 'changed';
        $this->assertNull($shape->getSerdePlan(ShapePlanCache::JSON_ENCODE));
    }

    private function structShape(): StructureShape
    {
        $shapeMap = new ShapeMap([
            'Struct' => [
                'type'    => 'structure',
                'members' => ['A' => ['shape' => 'Str']],
            ],
            'Str' => ['type' => 'string'],
        ]);

        return $shapeMap->resolve(['shape' => 'Struct']);
    }

    private function service(): Service
    {
        return new Service(
            [
                'metadata' => [
                    'serviceIdentifier' => 'foo',
                    'endpointPrefix'    => 'foo',
                    'apiVersion'        => '2020-01-01',
                    'protocol'          => 'json',
                ],
                'operations' => [
                    'Foo' => [
                        'name'   => 'Foo',
                        'http'   => ['method' => 'POST', 'requestUri' => '/'],
                        'input'  => ['shape' => 'FooInput'],
                        'output' => ['shape' => 'FooOutput'],
                    ],
                ],
                'shapes' => [
                    'FooInput'  => ['type' => 'structure', 'members' => []],
                    'FooOutput' => ['type' => 'structure', 'members' => []],
                ],
            ],
            function () {
                return [];
            }
        );
    }
}
