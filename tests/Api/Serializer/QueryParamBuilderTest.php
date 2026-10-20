<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\Ec2ParamBuilder;
use Aws\Api\Serializer\QueryParamBuilder;
use Aws\Api\Shape;
use Aws\Api\ShapeMap;
use Aws\Api\StructureShape;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Direct output tests for AWS Query and EC2 Query parameter building.
 *
 * Expected values were taken from the builders before serde plans were added.
 * Shapes are hand-built and omit optional keys, and every case fails on any
 * PHP warning or deprecation.
 */
#[CoversClass(QueryParamBuilder::class)]
#[CoversClass(Ec2ParamBuilder::class)]
class QueryParamBuilderTest extends TestCase
{
    private const SHAPES = [
        'S' => ['type' => 'string'],
        'I' => ['type' => 'integer'],
        'B' => ['type' => 'boolean'],
        'Bl' => ['type' => 'blob'],
        'T' => ['type' => 'timestamp'],
        'TU' => ['type' => 'timestamp', 'timestampFormat' => 'unixTimestamp'],
        'SL' => ['type' => 'list', 'member' => ['shape' => 'S']],
        'NamedL' => ['type' => 'list', 'member' => ['shape' => 'S', 'locationName' => 'item']],
        'FlatL' => ['type' => 'list', 'member' => ['shape' => 'S'], 'flattened' => true],
        'FlatNamedL' => [
            'type' => 'list',
            'member' => ['shape' => 'S', 'locationName' => 'item'],
            'flattened' => true,
        ],
        'NestL' => ['type' => 'list', 'member' => ['shape' => 'SL']],
        'Inner' => ['type' => 'structure', 'members' => [
            'A' => ['shape' => 'S', 'locationName' => 'a'],
            'Tags' => ['shape' => 'SL'],
        ]],
        'InnerL' => ['type' => 'list', 'member' => ['shape' => 'Inner']],
        'SM' => ['type' => 'map', 'key' => ['shape' => 'S'], 'value' => ['shape' => 'S']],
        'NamedM' => [
            'type' => 'map',
            'key' => ['shape' => 'S', 'locationName' => 'name'],
            'value' => ['shape' => 'S', 'locationName' => 'val'],
        ],
        'FlatM' => ['type' => 'map', 'key' => ['shape' => 'S'], 'value' => ['shape' => 'S'], 'flattened' => true],
        'ListM' => ['type' => 'map', 'key' => ['shape' => 'S'], 'value' => ['shape' => 'SL']],
        'TM' => ['type' => 'map', 'key' => ['shape' => 'S'], 'value' => ['shape' => 'TU']],
        'MapL' => ['type' => 'list', 'member' => ['shape' => 'SM']],
        'NoMemberL' => ['type' => 'list'],
        'In' => ['type' => 'structure', 'members' => [
            'Str' => ['shape' => 'S'],
            'lower' => ['shape' => 'S'],
            'Int' => ['shape' => 'I'],
            'Bool' => ['shape' => 'B'],
            'Blob' => ['shape' => 'Bl'],
            'Ts' => ['shape' => 'T'],
            'TsU' => ['shape' => 'TU'],
            'loc' => ['shape' => 'S', 'locationName' => 'location'],
            'qn' => ['shape' => 'S', 'queryName' => 'QueryOverride', 'locationName' => 'ignored'],
            'SL' => ['shape' => 'SL'],
            'NamedL' => ['shape' => 'NamedL'],
            'FlatL' => ['shape' => 'FlatL'],
            'FlatNamedL' => ['shape' => 'FlatNamedL'],
            'FlatDot' => ['shape' => 'FlatNamedL', 'locationName' => 'a.b'],
            'NestL' => ['shape' => 'NestL'],
            'Inner' => ['shape' => 'Inner'],
            'InnerL' => ['shape' => 'InnerL'],
            'SM' => ['shape' => 'SM'],
            'NamedM' => ['shape' => 'NamedM'],
            'FlatM' => ['shape' => 'FlatM'],
            'ListM' => ['shape' => 'ListM'],
            'TM' => ['shape' => 'TM'],
            'Inline' => ['type' => 'list', 'member' => ['type' => 'boolean']],
            'BlL' => ['type' => 'list', 'member' => ['shape' => 'Bl']],
            'BL' => ['type' => 'list', 'member' => ['shape' => 'B']],
            'TL' => ['type' => 'list', 'member' => ['shape' => 'T']],
            'MapL' => ['shape' => 'MapL'],
            'NoMemberL' => ['shape' => 'NoMemberL'],
        ]],
    ];

    private function input(): StructureShape
    {
        $map = new ShapeMap(self::SHAPES);
        return $map->resolve(['shape' => 'In']);
    }

    private function build(callable $builder, array $args): array
    {
        set_error_handler(function ($no, $str) {
            throw new \ErrorException($str, 0, $no);
        });
        try {
            $shape = $this->input();
            $first = $builder($shape, $args);
            // The second call runs from the cached plans.
            $this->assertSame($first, $builder($shape, $args));
            return $first;
        } finally {
            restore_error_handler();
        }
    }

    public static function queryCases(): array
    {
        return [
            'scalars' => [
                ['Str' => 'a', 'Int' => 5, 'Bool' => false, 'Blob' => 'xy', 'Ts' => 1577934245, 'TsU' => 1577934245],
                [
                    'Str' => 'a', 'Int' => '5', 'Bool' => 'false', 'Blob' => 'eHk=',
                    'Ts' => '2020-01-02T03:04:05Z', 'TsU' => '1577934245',
                ],
            ],
            'name precedence' => [
                ['loc' => 'l', 'qn' => 'q'],
                ['location' => 'l', 'QueryOverride' => 'q'],
            ],
            'unknown members are skipped' => [
                ['Nope' => 'x', 'Str' => 'y'],
                ['Str' => 'y'],
            ],
            'wrapped lists' => [
                ['SL' => ['a', 'b'], 'NamedL' => ['c']],
                ['SL.member.1' => 'a', 'SL.member.2' => 'b', 'NamedL.item.1' => 'c'],
            ],
            'empty list' => [
                ['SL' => []],
                ['SL' => ''],
            ],
            'flattened lists' => [
                ['FlatL' => ['a'], 'FlatNamedL' => ['b'], 'FlatDot' => ['c']],
                ['FlatL.1' => 'a', 'item.1' => 'b', 'a.a.b.1' => 'c'],
            ],
            'index is key plus one' => [
                ['SL' => [3 => 'a']],
                ['SL.member.4' => 'a'],
            ],
            'nested list' => [
                ['NestL' => [['a'], []]],
                ['NestL.member.1.member.1' => 'a', 'NestL.member.2' => ''],
            ],
            'structures' => [
                ['Inner' => ['A' => 'x', 'Tags' => ['t']], 'InnerL' => [['A' => 'y']]],
                ['Inner.a' => 'x', 'Inner.Tags.member.1' => 't', 'InnerL.member.1.a' => 'y'],
            ],
            'maps' => [
                ['SM' => ['k' => 'v'], 'NamedM' => ['k' => 'v'], 'FlatM' => ['k' => 'v']],
                [
                    'SM.entry.1.key' => 'k', 'SM.entry.1.value' => 'v',
                    'NamedM.entry.1.name' => 'k', 'NamedM.entry.1.val' => 'v',
                    'FlatM.1.key' => 'k', 'FlatM.1.value' => 'v',
                ],
            ],
            'map with composite and timestamp values' => [
                ['ListM' => ['a' => ['x']], 'TM' => ['t' => 1577934245]],
                [
                    'ListM.entry.1.key' => 'a', 'ListM.entry.1.value.member.1' => 'x',
                    'TM.entry.1.key' => 't', 'TM.entry.1.value' => '1577934245',
                ],
            ],
            'empty map' => [
                ['SM' => []],
                [],
            ],
            'inline list' => [
                ['Inline' => [true, false]],
                ['Inline.member.1' => 'true', 'Inline.member.2' => 'false'],
            ],
            'null list items' => [
                ['SL' => ['a', null], 'BL' => [null, true], 'Inline' => [null]],
                [
                    'SL.member.1' => 'a', 'SL.member.2' => '',
                    'BL.member.1' => 'false', 'BL.member.2' => 'true',
                    'Inline.member.1' => 'false',
                ],
            ],
            'empty list without a member definition' => [
                ['NoMemberL' => []],
                ['NoMemberL' => ''],
            ],
        ];
    }

    #[DataProvider('queryCases')]
    public function testAwsQueryOutput(array $args, array $expected): void
    {
        $this->assertSame($expected, $this->build(new QueryParamBuilder(), $args));
    }

    public static function ec2Cases(): array
    {
        return [
            'name precedence capitalizes locationName only' => [
                ['loc' => 'l', 'qn' => 'q', 'lower' => 's'],
                ['Location' => 'l', 'QueryOverride' => 'q', 'lower' => 's'],
            ],
            'lists have no member segment' => [
                ['SL' => ['a', 'b'], 'NamedL' => ['c']],
                ['SL.1' => 'a', 'SL.2' => 'b', 'NamedL.1' => 'c'],
            ],
            'empty list is omitted' => [
                ['SL' => [], 'Str' => 's'],
                ['Str' => 's'],
            ],
            'flattened flag is ignored' => [
                ['FlatL' => ['a'], 'FlatDot' => ['b']],
                ['FlatL.1' => 'a', 'A.b.1' => 'b'],
            ],
            'structures' => [
                ['Inner' => ['A' => 'x', 'Tags' => ['t']], 'InnerL' => [['A' => 'y']]],
                ['Inner.A' => 'x', 'Inner.Tags.1' => 't', 'InnerL.1.A' => 'y'],
            ],
            'maps keep the entry segment' => [
                ['SM' => ['k' => 'v'], 'NamedM' => ['k' => 'v']],
                [
                    'SM.entry.1.key' => 'k', 'SM.entry.1.value' => 'v',
                    'NamedM.entry.1.Name' => 'k', 'NamedM.entry.1.Val' => 'v',
                ],
            ],
            'null list items' => [
                ['SL' => ['a', null], 'BL' => [null]],
                ['SL.1' => 'a', 'SL.2' => '', 'BL.1' => 'false'],
            ],
            'empty list without a member definition is omitted' => [
                ['NoMemberL' => [], 'Str' => 's'],
                ['Str' => 's'],
            ],
        ];
    }

    #[DataProvider('ec2Cases')]
    public function testEc2QueryOutput(array $args, array $expected): void
    {
        $this->assertSame($expected, $this->build(new Ec2ParamBuilder(), $args));
    }

    public function testNonArrayStructureValueThrowsTypeError(): void
    {
        $this->expectException(\TypeError::class);
        (new QueryParamBuilder())($this->input(), ['Inner' => 'not an array']);
    }

    public static function builders(): array
    {
        return [
            'aws query' => [QueryParamBuilder::class],
            'ec2' => [Ec2ParamBuilder::class],
        ];
    }

    #[DataProvider('builders')]
    public function testMemberWithUnresolvableShapeKeepsThrowingAfterFirstFailure(string $class): void
    {
        $builder = new $class();
        $map = new ShapeMap([
            'S' => ['type' => 'string'],
            'In' => ['type' => 'structure', 'members' => [
                'Str' => ['shape' => 'S'],
                'Broken' => ['shape' => 'DoesNotExist'],
            ]],
        ]);
        $shape = $map->resolve(['shape' => 'In']);

        try {
            $builder($shape, ['Str' => 'a']);
            $this->fail('Expected the unresolvable shape to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertSame('Shape not found: DoesNotExist', $e->getMessage());
        }

        // The failed resolution leaves a partial member hash. Members that
        // resolved keep working, and the broken one keeps throwing.
        $this->assertSame(['Str' => 'a'], $builder($shape, ['Str' => 'a']));
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown member Broken');
        $builder($shape, ['Broken' => 'x']);
    }

    #[DataProvider('builders')]
    public function testNonEmptyListWithoutMemberDefinitionThrows(string $class): void
    {
        $builder = new $class();
        $shape = $this->input();
        // An empty list compiles the plan first, then a non-empty list fails.
        $builder($shape, ['NoMemberL' => []]);
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('No member attribute specified');
        $builder($shape, ['NoMemberL' => ['a']]);
    }

    public function testNullMemberValueSerializesAsEmptyString(): void
    {
        $this->assertSame(
            ['Str' => '', 'Int' => '7'],
            $this->build(new QueryParamBuilder(), ['Str' => null, 'Int' => 7])
        );
    }

    public function testLaterRequestsSetMembersNotSeenBefore(): void
    {
        $builder = new QueryParamBuilder();
        $shape = $this->input();
        $this->assertSame(['Str' => 'a'], $builder($shape, ['Str' => 'a']));
        $this->assertSame(
            ['Int' => '1', 'Str' => 'b', 'Inner.a' => 'x'],
            $builder($shape, ['Int' => 1, 'Str' => 'b', 'Inner' => ['A' => 'x']])
        );
        $this->assertSame(['Inner.Tags.member.1' => 't'], $builder($shape, ['Inner' => ['Tags' => ['t']]]));
    }

    public function testMutationAfterFirstUseIsReflected(): void
    {
        $builder = new QueryParamBuilder();
        $shape = $this->input();
        $this->assertSame(['Str' => 'a'], $builder($shape, ['Str' => 'a']));

        $shape->getMember('Str')['locationName'] = 'Renamed';
        $this->assertSame(['Renamed' => 'a'], $builder($shape, ['Str' => 'a']));

        // A fresh model: Str and the SL items resolve to the same cached 'S'
        // shape, so the rename above would also rename flattened SL items.
        $shape = $this->input();
        $this->assertSame(['SL.member.1' => 'x'], $builder($shape, ['SL' => ['x']]));
        $shape->getMember('SL')['flattened'] = true;
        $this->assertSame(['SL.1' => 'x'], $builder($shape, ['SL' => ['x']]));
    }
}
