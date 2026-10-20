<?php
namespace Aws\Test\Api\Serde\Query;

use Aws\Api\Serde\Query\Ec2QueryEncodePlanProvider;
use Aws\Api\Serde\Query\QueryEncodePlan;
use Aws\Api\Serde\Query\QueryEncodePlanProvider;
use Aws\Api\Serde\Query\QueryShapeType;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(QueryEncodePlanProvider::class)]
#[CoversClass(Ec2QueryEncodePlanProvider::class)]
#[CoversClass(QueryEncodePlan::class)]
#[CoversClass(QueryShapeType::class)]
class QueryEncodePlanProviderTest extends TestCase
{
    private function shape(array $def): Shape
    {
        return Shape::create($def, new ShapeMap([]));
    }

    public function testCompilesStructureMemberDescriptors(): void
    {
        $plan = (new QueryEncodePlanProvider())->get($this->shape([
            'type' => 'structure',
            'members' => [
                'Name' => ['type' => 'string', 'locationName' => 'name'],
                'Q' => ['type' => 'string', 'queryName' => 'QN', 'locationName' => 'x'],
                'Plain' => ['type' => 'integer'],
                'When' => ['type' => 'timestamp'],
                'Flag' => ['type' => 'boolean'],
                'Data' => ['type' => 'blob'],
                'Items' => ['type' => 'list', 'member' => ['type' => 'string']],
            ],
        ]));

        $this->assertSame(QueryShapeType::STRUCTURE, $plan->type);
        $this->assertSame('name', $plan->members['Name'][QueryEncodePlan::M_NAME]);
        $this->assertSame('QN', $plan->members['Q'][QueryEncodePlan::M_NAME]);
        $this->assertSame('Plain', $plan->members['Plain'][QueryEncodePlan::M_NAME]);
        $this->assertSame(QueryShapeType::SCALAR, $plan->members['Plain'][QueryEncodePlan::M_TYPE]);
        $this->assertSame(QueryShapeType::TIMESTAMP, $plan->members['When'][QueryEncodePlan::M_TYPE]);
        $this->assertSame(QueryShapeType::BOOLEAN, $plan->members['Flag'][QueryEncodePlan::M_TYPE]);
        $this->assertSame(QueryShapeType::BLOB, $plan->members['Data'][QueryEncodePlan::M_TYPE]);
        $this->assertSame(QueryShapeType::LIST, $plan->members['Items'][QueryEncodePlan::M_TYPE]);
        $this->assertSame('iso8601', $plan->members['When'][QueryEncodePlan::M_TSFORMAT]);
        $this->assertNull($plan->members['Name'][QueryEncodePlan::M_TSFORMAT]);
        $this->assertNull($plan->members['Items'][QueryEncodePlan::M_PLAN]);
    }

    public function testCompilesListRules(): void
    {
        $provider = new QueryEncodePlanProvider();

        $wrapped = $provider->get($this->shape(['type' => 'list', 'member' => ['type' => 'string']]));
        $this->assertFalse($wrapped->flattened);
        $this->assertSame('.member', $wrapped->listMemberSegment);

        $named = $provider->get($this->shape([
            'type' => 'list',
            'member' => ['type' => 'timestamp', 'locationName' => 'item', 'timestampFormat' => 'unixTimestamp'],
        ]));
        $this->assertSame('.item', $named->listMemberSegment);
        $this->assertSame(QueryShapeType::TIMESTAMP, $named->itemType);
        $this->assertSame('unixTimestamp', $named->itemTimestampFormat);

        $flat = $provider->get($this->shape([
            'type' => 'list',
            'flattened' => true,
            'member' => ['type' => 'string', 'locationName' => 'item'],
        ]));
        $this->assertTrue($flat->flattened);
        $this->assertSame('item', $flat->listFlatName);

        $flatUnnamed = $provider->get($this->shape([
            'type' => 'list',
            'flattened' => true,
            'member' => ['type' => 'string'],
        ]));
        $this->assertNull($flatUnnamed->listFlatName);
    }

    public function testCompilesMapRules(): void
    {
        $plan = (new QueryEncodePlanProvider())->get($this->shape([
            'type' => 'map',
            'value' => ['type' => 'boolean', 'locationName' => 'val'],
        ]));

        $this->assertSame('.entry', $plan->mapEntrySegment);
        $this->assertSame('.key', $plan->mapKeySuffix);
        $this->assertSame('.val', $plan->mapValueSuffix);
        $this->assertFalse($plan->mapSprintf);
        $this->assertSame(QueryShapeType::SCALAR, $plan->mapKeyType);
        $this->assertSame(QueryShapeType::BOOLEAN, $plan->itemType);

        $pct = (new QueryEncodePlanProvider())->get($this->shape([
            'type' => 'map',
            'flattened' => true,
            'key' => ['type' => 'string', 'locationName' => 'a%%b'],
            'value' => ['type' => 'string'],
        ]));
        $this->assertSame('', $pct->mapEntrySegment);
        $this->assertTrue($pct->mapSprintf);
    }

    public function testEc2RulesDifferFromAwsQuery(): void
    {
        $plan = (new Ec2QueryEncodePlanProvider())->get($this->shape([
            'type' => 'structure',
            'members' => [
                'loc' => ['type' => 'string', 'locationName' => 'location'],
                'lower' => ['type' => 'string'],
                'Flat' => ['type' => 'list', 'flattened' => true, 'member' => ['type' => 'string']],
            ],
        ]));

        // locationName is capitalized, the default member name is not.
        $this->assertSame('Location', $plan->members['loc'][QueryEncodePlan::M_NAME]);
        $this->assertSame('lower', $plan->members['lower'][QueryEncodePlan::M_NAME]);

        $list = (new Ec2QueryEncodePlanProvider())->get($plan->members['Flat'][QueryEncodePlan::M_SHAPE]);
        $this->assertFalse($list->flattened);
    }

    public function testPlansAreCachedPerSlot(): void
    {
        $shape = $this->shape(['type' => 'structure', 'members' => ['A' => ['type' => 'string']]]);
        $query = new QueryEncodePlanProvider();
        $ec2 = new Ec2QueryEncodePlanProvider();

        $plan = $query->get($shape);
        $this->assertSame($plan, $query->get($shape));
        $this->assertSame($plan, $shape->getSerdePlan(ShapePlanCache::QUERY_ENCODE));

        $ec2Plan = $ec2->get($shape);
        $this->assertNotSame($plan, $ec2Plan);
        $this->assertSame($ec2Plan, $shape->getSerdePlan(ShapePlanCache::EC2_QUERY_ENCODE));
    }

    public function testMutationInvalidatesPlan(): void
    {
        $shape = $this->shape(['type' => 'structure', 'members' => ['A' => ['type' => 'string']]]);
        $provider = new QueryEncodePlanProvider();
        $plan = $provider->get($shape);

        $shape['members'] = ['B' => ['type' => 'string', 'locationName' => 'b']];

        $rebuilt = $provider->get($shape);
        $this->assertNotSame($plan, $rebuilt);
        $this->assertSame(['B'], array_keys($rebuilt->members));
        $this->assertSame('b', $rebuilt->members['B'][QueryEncodePlan::M_NAME]);
    }
}
