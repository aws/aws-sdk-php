<?php
namespace Aws\Test\Api\Serde\Query;

use Aws\Api\Serde\Query\Ec2QueryEncodePlanProvider;
use Aws\Api\Serde\Query\QueryEncodePlanProvider;
use Aws\Api\Serializer\Ec2ParamBuilder;
use Aws\Api\Serializer\QueryParamBuilder;
use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Service;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use Aws\Command;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Every model mutation path must reach the next serialization: offsetSet and
 * offsetUnset on a member, a structure's members, a nested member, list and
 * map children, and an operation's input. Each test serializes once to build
 * and cache the plans, mutates, then checks the output against the value the
 * builders produced before serde plans existed.
 */
#[CoversClass(QueryEncodePlanProvider::class)]
#[CoversClass(Ec2QueryEncodePlanProvider::class)]
#[CoversClass(QueryParamBuilder::class)]
#[CoversClass(Ec2ParamBuilder::class)]
class QueryPlanInvalidationTest extends TestCase
{
    private const SHAPES = [
        'S' => ['type' => 'string'],
        'Item' => ['type' => 'string'],
        'T' => ['type' => 'timestamp'],
        'SL' => ['type' => 'list', 'member' => ['shape' => 'Item', 'locationName' => 'item']],
        'SM' => ['type' => 'map', 'key' => ['shape' => 'S', 'locationName' => 'k'],
            'value' => ['shape' => 'S', 'locationName' => 'v']],
        'Inner' => ['type' => 'structure', 'members' => ['A' => ['shape' => 'S', 'locationName' => 'a']]],
        'In' => ['type' => 'structure', 'members' => [
            'Str' => ['shape' => 'S', 'locationName' => 'str'],
            'Ts' => ['shape' => 'T'],
            'L' => ['shape' => 'SL'],
            'M' => ['shape' => 'SM'],
            'Inner' => ['shape' => 'Inner'],
        ]],
    ];

    private function input(): StructureShape
    {
        return (new ShapeMap(self::SHAPES))->resolve(['shape' => 'In']);
    }

    public static function builders(): array
    {
        return [
            'aws query' => [QueryParamBuilder::class, false],
            'ec2' => [Ec2ParamBuilder::class, true],
        ];
    }

    #[DataProvider('builders')]
    public function testMemberLocationNameSetAndUnset(string $class, bool $ec2): void
    {
        $builder = new $class();
        $shape = $this->input();
        $this->assertSame([$ec2 ? 'Str' : 'str' => 'x'], $builder($shape, ['Str' => 'x']));

        $shape->getMember('Str')['locationName'] = 'renamed';
        $this->assertSame([$ec2 ? 'Renamed' : 'renamed' => 'x'], $builder($shape, ['Str' => 'x']));

        unset($shape->getMember('Str')['locationName']);
        $this->assertSame(['Str' => 'x'], $builder($shape, ['Str' => 'x']));
    }

    #[DataProvider('builders')]
    public function testMemberQueryNameSet(string $class, bool $ec2): void
    {
        $builder = new $class();
        $shape = $this->input();
        $builder($shape, ['Str' => 'x']);

        $shape->getMember('Str')['queryName'] = 'QN';
        $this->assertSame(['QN' => 'x'], $builder($shape, ['Str' => 'x']));
    }

    #[DataProvider('builders')]
    public function testMembersReplacement(string $class, bool $ec2): void
    {
        $builder = new $class();
        $shape = $this->input();
        $builder($shape, ['Str' => 'x', 'New' => 'n']);

        $shape['members'] = ['New' => ['shape' => 'S']];
        $this->assertSame(['New' => 'n'], $builder($shape, ['Str' => 'x', 'New' => 'n']));
    }

    #[DataProvider('builders')]
    public function testNestedMemberMutationRebuildsParentAndChild(string $class, bool $ec2): void
    {
        $builder = new $class();
        $shape = $this->input();
        $this->assertSame(
            [$ec2 ? 'Inner.A' : 'Inner.a' => 'x'],
            $builder($shape, ['Inner' => ['A' => 'x']])
        );

        $shape->getMember('Inner')->getMember('A')['locationName'] = 'changed';
        $this->assertSame(
            [$ec2 ? 'Inner.Changed' : 'Inner.changed' => 'x'],
            $builder($shape, ['Inner' => ['A' => 'x']])
        );
    }

    #[DataProvider('builders')]
    public function testTimestampFormatMutation(string $class, bool $ec2): void
    {
        $builder = new $class();
        $shape = $this->input();
        $this->assertSame(['Ts' => '2020-01-02T03:04:05Z'], $builder($shape, ['Ts' => 1577934245]));

        $shape->getMember('Ts')['timestampFormat'] = 'unixTimestamp';
        $this->assertSame(['Ts' => '1577934245'], $builder($shape, ['Ts' => 1577934245]));
    }

    #[DataProvider('builders')]
    public function testMapKeyAndValueMutation(string $class, bool $ec2): void
    {
        $builder = new $class();
        $shape = $this->input();
        $this->assertSame(
            $ec2 ? ['M.entry.1.K' => 'a', 'M.entry.1.V' => 'b'] : ['M.entry.1.k' => 'a', 'M.entry.1.v' => 'b'],
            $builder($shape, ['M' => ['a' => 'b']])
        );

        $map = $shape->getMember('M');
        $map->getKey()['locationName'] = 'name';
        $map->getValue()['type'] = 'boolean';
        $this->assertSame(
            $ec2 ? ['M.entry.1.Name' => 'a', 'M.entry.1.V' => 'true']
                : ['M.entry.1.name' => 'a', 'M.entry.1.v' => 'true'],
            $builder($shape, ['M' => ['a' => 'b']])
        );
    }

    public function testListMemberAndFlattenedMutation(): void
    {
        $builder = new QueryParamBuilder();
        $shape = $this->input();
        $this->assertSame(['L.item.1' => 'a'], $builder($shape, ['L' => ['a']]));

        $list = $shape->getMember('L');
        $list->getMember()['locationName'] = 'entry';
        $this->assertSame(['L.entry.1' => 'a'], $builder($shape, ['L' => ['a']]));

        // Mutating the list drops its resolved member, so the member is
        // rebuilt from the list definition and the earlier member edit is
        // lost. Master behaves the same way.
        $list['flattened'] = true;
        $this->assertSame(['item.1' => 'a'], $builder($shape, ['L' => ['a']]));
    }

    public function testEc2ListItemTypeMutation(): void
    {
        $builder = new Ec2ParamBuilder();
        $shape = $this->input();
        $this->assertSame(['L.1' => '1'], $builder($shape, ['L' => [1]]));

        $shape->getMember('L')->getMember()['type'] = 'boolean';
        $this->assertSame(['L.1' => 'true'], $builder($shape, ['L' => [1]]));
    }

    #[DataProvider('builders')]
    public function testStableGenerationReusesCachedPlans(string $class, bool $ec2): void
    {
        $provider = $ec2 ? new Ec2QueryEncodePlanProvider() : new QueryEncodePlanProvider();
        $shape = $this->input();
        $plan = $provider->get($shape);
        $child = $provider->get($shape->getMember('Inner'));

        $this->assertSame($plan, $provider->get($shape));
        $this->assertSame($child, $provider->get($shape->getMember('Inner')));
    }

    #[DataProvider('builders')]
    public function testOperationInputReplacement(string $class, bool $ec2): void
    {
        $api = new Service([
            'metadata' => ['protocol' => $ec2 ? 'ec2' : 'query', 'apiVersion' => '2020-01-01'],
            'operations' => ['Op' => ['name' => 'Op', 'input' => ['shape' => 'In']]],
            'shapes' => self::SHAPES + ['Other' => ['type' => 'structure', 'members' => [
                'Str' => ['shape' => 'S', 'locationName' => 'other'],
            ]]],
        ], function () {
            return [];
        });
        $serializer = new QuerySerializer($api, 'http://foo.com', new $class());
        $body = function () use ($serializer) {
            return (string) $serializer(new Command('Op', ['Str' => 'x']))->getBody();
        };

        $this->assertSame('Action=Op&Version=2020-01-01&' . ($ec2 ? 'Str' : 'str') . '=x', $body());

        $api->getOperation('Op')['input'] = ['shape' => 'Other'];
        $this->assertSame('Action=Op&Version=2020-01-01&' . ($ec2 ? 'Other' : 'other') . '=x', $body());
    }
}
