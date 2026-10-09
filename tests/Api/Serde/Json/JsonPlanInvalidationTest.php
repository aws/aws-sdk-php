<?php
namespace Aws\Test\Api\Serde\Json;

use Aws\Api\Serde\Json\JsonDecodePlan;
use Aws\Api\Serde\Json\JsonDecodePlanProvider;
use Aws\Api\Serde\Json\JsonEncodePlan;
use Aws\Api\Serde\Json\JsonEncodePlanProvider;
use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use PHPUnit\Framework\TestCase;

/**
 * Covers the invalidation cases the design requires: mutating a member's
 * locationName, replacing a structure's members, and mock-without-ShapeMap
 * safety. Plans must rebuild against the new graph generation.
 */
class JsonPlanInvalidationTest extends TestCase
{
    private function structure(array $members, ShapeMap $map): StructureShape
    {
        return new StructureShape(
            ['type' => 'structure', 'members' => $members],
            $map
        );
    }

    public function testLocationNameMutationRebuildsEncodePlan(): void
    {
        $provider = new JsonEncodePlanProvider();
        $map = new ShapeMap([]);
        $shape = $this->structure(
            ['Name' => ['type' => 'string', 'locationName' => 'old']],
            $map
        );

        $plan1 = $provider->get($shape);
        $this->assertSame('old', $plan1->members['Name'][JsonEncodePlan::M_WIRE]);

        // Mutate the definition: this bumps the graph generation.
        $shape['members'] = ['Name' => ['type' => 'string', 'locationName' => 'new']];

        $plan2 = $provider->get($shape);
        $this->assertNotSame($plan1, $plan2, 'Plan should rebuild after mutation');
        $this->assertSame('new', $plan2->members['Name'][JsonEncodePlan::M_WIRE]);
    }

    public function testLocationNameMutationRebuildsDecodePlan(): void
    {
        $provider = new JsonDecodePlanProvider();
        $map = new ShapeMap([]);
        $shape = $this->structure(
            ['Name' => ['type' => 'string', 'locationName' => 'old']],
            $map
        );

        $plan1 = $provider->get($shape);
        $this->assertSame('old', $plan1->members[0][JsonDecodePlan::M_WIRE]);

        $shape['members'] = ['Name' => ['type' => 'string', 'locationName' => 'new']];

        $plan2 = $provider->get($shape);
        $this->assertNotSame($plan1, $plan2);
        $this->assertSame('new', $plan2->members[0][JsonDecodePlan::M_WIRE]);
    }

    public function testMembersReplacementRebuildsPlan(): void
    {
        $provider = new JsonEncodePlanProvider();
        $map = new ShapeMap([]);
        $shape = $this->structure(['A' => ['type' => 'string']], $map);

        $plan1 = $provider->get($shape);
        $this->assertArrayHasKey('A', $plan1->members);
        $this->assertArrayNotHasKey('B', $plan1->members);

        // Replace the members definition entirely.
        $shape['members'] = ['B' => ['type' => 'integer']];

        $plan2 = $provider->get($shape);
        $this->assertNotSame($plan1, $plan2);
        $this->assertArrayHasKey('B', $plan2->members);
        $this->assertArrayNotHasKey('A', $plan2->members);
    }

    public function testGenerationBumpInvalidatesBothDirections(): void
    {
        $encode = new JsonEncodePlanProvider();
        $decode = new JsonDecodePlanProvider();
        $map = new ShapeMap([]);
        $shape = $this->structure(
            ['Name' => ['type' => 'string', 'locationName' => 'old']],
            $map
        );

        $enc1 = $encode->get($shape);
        $dec1 = $decode->get($shape);

        $shape['members'] = ['Name' => ['type' => 'string', 'locationName' => 'new']];

        $this->assertNotSame($enc1, $encode->get($shape));
        $this->assertNotSame($dec1, $decode->get($shape));
    }

    public function testStableGenerationReusesCachedPlan(): void
    {
        $provider = new JsonEncodePlanProvider();
        $map = new ShapeMap([]);
        $shape = $this->structure(['A' => ['type' => 'string']], $map);

        // No mutation between gets: same cached plan instance.
        $this->assertSame($provider->get($shape), $provider->get($shape));
    }

    public function testOffsetUnsetInvalidatesPlan(): void
    {
        // The invalidation contract covers offsetUnset as well as offsetSet.
        // Unset an optional shape-level trait and confirm the plan rebuilds.
        $provider = new JsonEncodePlanProvider();
        $map = new ShapeMap([]);
        $shape = $this->structure(['A' => ['type' => 'string']], $map);
        $shape['union'] = true;

        $plan1 = $provider->get($shape);

        // Removing a trait via unset() bumps the graph generation.
        unset($shape['union']);

        $plan2 = $provider->get($shape);
        $this->assertNotSame($plan1, $plan2, 'offsetUnset should invalidate the plan');
        $this->assertArrayHasKey('A', $plan2->members);
    }

    public function testListShapeClearsResolvedMemberOnMutation(): void
    {
        // A ListShape memoizes its resolved member; mutation must drop it so the
        // rebuilt plan reflects the new member definition.
        $map = new ShapeMap([]);
        $list = new ListShape(
            ['type' => 'list', 'member' => ['type' => 'string']],
            $map
        );
        $provider = new JsonEncodePlanProvider();

        $plan1 = $provider->get($list);
        $memberBefore = $list->getMember();

        $list['member'] = ['type' => 'integer'];

        $memberAfter = $list->getMember();
        $this->assertNotSame(
            $memberBefore,
            $memberAfter,
            'Resolved member should be re-resolved after mutation'
        );
        $plan2 = $provider->get($list);
        $this->assertNotSame($plan1, $plan2);
    }

    public function testMapShapeClearsResolvedValueOnMutation(): void
    {
        $map = new ShapeMap([]);
        $mapShape = new MapShape(
            [
                'type' => 'map',
                'key'   => ['type' => 'string'],
                'value' => ['type' => 'string'],
            ],
            $map
        );
        $provider = new JsonEncodePlanProvider();

        $plan1 = $provider->get($mapShape);
        $valueBefore = $mapShape->getValue();

        $mapShape['value'] = ['type' => 'integer'];

        $valueAfter = $mapShape->getValue();
        $this->assertNotSame(
            $valueBefore,
            $valueAfter,
            'Resolved value should be re-resolved after mutation'
        );
        $plan2 = $provider->get($mapShape);
        $this->assertNotSame($plan1, $plan2);
    }

    public function testMockWithoutShapeMapIsSafe(): void
    {
        // Mocks may construct shapes without a live ShapeMap. Plan access and
        // mutation must not error in that state.
        $provider = new JsonEncodePlanProvider();
        $shape = Shape::create(
            ['type' => 'structure', 'members' => ['A' => ['type' => 'string']]],
            new ShapeMap([])
        );

        $plan = $provider->get($shape);
        $this->assertArrayHasKey('A', $plan->members);

        // Mutating still resolves without throwing.
        $shape['members'] = ['B' => ['type' => 'string']];
        $plan2 = $provider->get($shape);
        $this->assertArrayHasKey('B', $plan2->members);
    }
}
