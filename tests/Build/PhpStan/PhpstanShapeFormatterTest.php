<?php
namespace Aws\Test\Build\PhpStan;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\PhpstanShapeFormatter::class)]
class PhpstanShapeFormatterTest extends TestCase
{
    private function makeFormatter(array $shapes): \PhpstanShapeFormatter
    {
        return new \PhpstanShapeFormatter(['shapes' => $shapes]);
    }

    public function testReturnsNullForUnknownInputShape(): void
    {
        $f = $this->makeFormatter([]);
        $this->assertNull($f->formatInput('Missing'));
    }

    public function testReturnsNullForNonStructureInput(): void
    {
        $f = $this->makeFormatter(['S' => ['type' => 'string']]);
        $this->assertNull($f->formatInput('S'));
    }

    public function testEmptyStructureRendersUnsealedShape(): void
    {
        // Operations whose input shape has no modeled members (e.g.
        // DynamoDB DescribeEndpoints/DescribeLimits) must still emit a
        // valid @phpstan-method annotation so the paired-emission
        // invariant in ClientAnnotator holds. The unsealed empty shape
        // `array{...}` accepts any array without flagging extra keys,
        // matching the runtime behaviour of those operations.
        $f = $this->makeFormatter([
            'Empty' => ['type' => 'structure', 'members' => []],
        ]);
        $this->assertSame('array{...}', $f->formatInput('Empty'));
    }

    public function testTopLevelStructureRendersAllOptionalUnsealed(): void
    {
        // Even members in `required` render as optional.
        $shapes = [
            'In' => [
                'type' => 'structure',
                'required' => ['Bucket', 'Key'],
                'members' => [
                    'Bucket' => ['shape' => 'S'],
                    'Key' => ['shape' => 'S'],
                    'Marker' => ['shape' => 'S'],
                ],
            ],
            'S' => ['type' => 'string'],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('In');

        $this->assertSame(
            'array{Bucket?: string, Key?: string, Marker?: string, ...}',
            $rendered
        );
    }

    public function testEnumStringRendersAsLiteralUnion(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Mode' => ['shape' => 'ModeEnum']],
            ],
            'ModeEnum' => [
                'type' => 'string',
                'enum' => ['ENABLED', 'DISABLED', 'AUTO'],
            ],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('In');

        // Enum literals are alphabetized for stable diffs.
        $this->assertSame(
            "array{Mode?: 'AUTO'|'DISABLED'|'ENABLED', ...}",
            $rendered
        );
    }

    public function testEnumLiteralsEscapeSingleQuotesAndBackslashes(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Weird' => ['shape' => 'WeirdEnum']],
            ],
            'WeirdEnum' => [
                'type' => 'string',
                'enum' => ["it's", 'a\\b'],
            ],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('In');

        // Sorted: 'a\b' < "it's" by string comparison.
        $this->assertSame(
            "array{Weird?: 'a\\\\b'|'it\\'s', ...}",
            $rendered
        );
    }

    public function testListMapsToListOfInner(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Names' => ['shape' => 'StringList']],
            ],
            'StringList' => ['type' => 'list', 'member' => ['shape' => 'S']],
            'S' => ['type' => 'string'],
        ];

        $this->assertSame(
            'array{Names?: list<string>, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testMapMapsToArrayOfStringToValue(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Tags' => ['shape' => 'TagMap']],
            ],
            'TagMap' => [
                'type' => 'map',
                'key' => ['shape' => 'S'],
                'value' => ['shape' => 'S'],
            ],
            'S' => ['type' => 'string'],
        ];

        $this->assertSame(
            'array{Tags?: array<string, string>, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testTimestampMapsToScalarUnion(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['When' => ['shape' => 'TS']],
            ],
            'TS' => ['type' => 'timestamp'],
        ];

        $this->assertSame(
            'array{When?: int|string|\\DateTimeInterface, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testBlobMapsToStreamUnion(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Body' => ['shape' => 'Blob']],
            ],
            'Blob' => ['type' => 'blob'],
        ];

        $this->assertSame(
            'array{Body?: string|resource|\\Psr\\Http\\Message\\StreamInterface, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testIntegerVariantsAllMapToInt(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => [
                    'A' => ['shape' => 'I'],
                    'B' => ['shape' => 'L'],
                    'C' => ['shape' => 'Sh'],
                    'D' => ['shape' => 'By'],
                    'E' => ['shape' => 'Bg'],
                ],
            ],
            'I' => ['type' => 'integer'],
            'L' => ['type' => 'long'],
            'Sh' => ['type' => 'short'],
            'By' => ['type' => 'byte'],
            'Bg' => ['type' => 'bigInteger'],
        ];

        $this->assertSame(
            'array{A?: int, B?: int, C?: int, D?: int, E?: int, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testBigDecimalMapsToString(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Amount' => ['shape' => 'BD']],
            ],
            'BD' => ['type' => 'bigDecimal'],
        ];

        $this->assertSame(
            'array{Amount?: string, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testDocumentMapsToMixed(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Payload' => ['shape' => 'Doc']],
            ],
            'Doc' => ['type' => 'document'],
        ];

        $this->assertSame(
            'array{Payload?: mixed, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testUnknownTypeFallsBackToBareArray(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Mystery' => ['shape' => 'X']],
            ],
            'X' => ['type' => 'whoknows'],
        ];

        $this->assertSame(
            'array{Mystery?: array, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testNestedStructureRendersAtDepth(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Filter' => ['shape' => 'F']],
            ],
            'F' => [
                'type' => 'structure',
                'members' => [
                    'Name' => ['shape' => 'S'],
                    'Values' => ['shape' => 'StringList'],
                ],
            ],
            'StringList' => ['type' => 'list', 'member' => ['shape' => 'S']],
            'S' => ['type' => 'string'],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('In');

        $this->assertSame(
            'array{Filter?: array{Name?: string, Values?: list<string>, ...}, ...}',
            $rendered
        );
    }

    public function testListOfStructureRendersInner(): void
    {
        // List elements should render as full structures even though they're
        // at one level deeper than a direct nested structure.
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Tags' => ['shape' => 'TagList']],
            ],
            'TagList' => ['type' => 'list', 'member' => ['shape' => 'Tag']],
            'Tag' => [
                'type' => 'structure',
                'members' => [
                    'Key' => ['shape' => 'S'],
                    'Value' => ['shape' => 'S'],
                ],
            ],
            'S' => ['type' => 'string'],
        ];

        $this->assertSame(
            'array{Tags?: list<array{Key?: string, Value?: string, ...}>, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testRecursiveShapeCollapsesToBareArray(): void
    {
        // Folder { children: list<Folder> } recurses; on the cycle we emit
        // bare `array`.
        $shapes = [
            'Folder' => [
                'type' => 'structure',
                'members' => [
                    'Name' => ['shape' => 'S'],
                    'Children' => ['shape' => 'FolderList'],
                ],
            ],
            'FolderList' => ['type' => 'list', 'member' => ['shape' => 'Folder']],
            'S' => ['type' => 'string'],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('Folder');

        $this->assertStringContainsString('Name?: string', $rendered);
        $this->assertStringContainsString('list<array>', $rendered);
    }

    public function testDepthCapCollapsesNestedStructuresBelowLevelThree(): void
    {
        // L1 -> L2 -> L3 -> L4: at L4 (depth 4) we collapse to bare `array`.
        $shapes = [
            'L1' => ['type' => 'structure', 'members' => ['n' => ['shape' => 'L2']]],
            'L2' => ['type' => 'structure', 'members' => ['n' => ['shape' => 'L3']]],
            'L3' => ['type' => 'structure', 'members' => ['n' => ['shape' => 'L4']]],
            'L4' => [
                'type' => 'structure',
                'members' => ['n' => ['shape' => 'S']],
            ],
            'S' => ['type' => 'string'],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('L1');

        // L1 (depth 1) renders, L2 (depth 2) renders, L3 (depth 3) renders,
        // L4 (depth 4 > MAX_DEPTH=3) collapses to bare `array`.
        $this->assertStringContainsString('n?: array', $rendered);
    }

    public function testScalarLeavesAtDepthFourStillRender(): void
    {
        // Earlier bug: depth tracking treated string leaves at depth 4 as
        // collapsed. They should render unconditionally because they can't
        // recurse anyway.
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Tags' => ['shape' => 'TagList']],
            ],
            'TagList' => ['type' => 'list', 'member' => ['shape' => 'Tag']],
            'Tag' => [
                'type' => 'structure',
                'members' => [
                    'Key' => ['shape' => 'S'],
                    'Value' => ['shape' => 'S'],
                ],
            ],
            'S' => ['type' => 'string'],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('In');

        // Strings should render as `string`, NOT as `array`. The Key/Value
        // members are at depth 4 because list increments depth.
        $this->assertStringContainsString('Key?: string', $rendered);
        $this->assertStringContainsString('Value?: string', $rendered);
    }

    public function testUnionStructureRendersLikeStructure(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Body' => ['shape' => 'BodyUnion']],
            ],
            'BodyUnion' => [
                'type' => 'structure',
                'union' => true,
                'members' => [
                    'Json' => ['shape' => 'S'],
                    'Xml' => ['shape' => 'S'],
                ],
            ],
            'S' => ['type' => 'string'],
        ];

        $this->assertSame(
            'array{Body?: array{Json?: string, Xml?: string, ...}, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }

    public function testNonIdentifierKeysAreQuoted(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => [
                    'odd-key' => ['shape' => 'S'],
                    'normal_key' => ['shape' => 'S'],
                ],
            ],
            'S' => ['type' => 'string'],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('In');

        $this->assertStringContainsString("'odd-key'?: string", $rendered);
        $this->assertStringContainsString('normal_key?: string', $rendered);
    }

    public function testMultiLineEmissionTriggeredByLongShape(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => [
                    'A_long_member_name_one' => ['shape' => 'S'],
                    'A_long_member_name_two' => ['shape' => 'S'],
                    'A_long_member_name_three' => ['shape' => 'S'],
                    'A_long_member_name_four' => ['shape' => 'S'],
                ],
            ],
            'S' => ['type' => 'string'],
        ];

        $rendered = $this->makeFormatter($shapes)->formatInput('In');

        $this->assertStringContainsString("\n", $rendered);
        $this->assertStringStartsWith('array{', $rendered);
        $this->assertStringEndsWith('}', $rendered);
        // Members appear on their own indented lines.
        $this->assertStringContainsString("\n    A_long_member_name_one?: string,\n", $rendered);
        // The unsealed marker is the last segment, with a trailing comma.
        $this->assertStringContainsString("\n    ...,\n", $rendered);
    }

    public function testMissingMemberShapeRendersMixed(): void
    {
        $shapes = [
            'In' => [
                'type' => 'structure',
                'members' => ['Foo' => []],
            ],
        ];

        $this->assertSame(
            'array{Foo?: mixed, ...}',
            $this->makeFormatter($shapes)->formatInput('In')
        );
    }
}
