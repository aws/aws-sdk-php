<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\Ruleset\RulesetStandardLibrary;
use Aws\Exception\UnresolvedEndpointException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(RulesetStandardLibrary::class)]
class RulesetStandardLibraryTest extends TestCase
{
    private $standardLibrary;

    protected function set_up()
    {
        $partitionsPath = __DIR__ . '/partitions.json';
        $partitions = EndpointDefinitionProvider::getPartitions();
        $this->standardLibrary = new RulesetStandardLibrary($partitions);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function isSetProvider(): array
    {
        return [
            [null, false],
            [0, true],
            [1, true],
            ["abc", true],
            [[], true],
            [true, true],
            [false, true]
        ];
    }

    #[DataProvider('isSetProvider')]
    public function testIsSet($input, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->is_set($input));
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function notProvider(): array
    {
        return [
            [true, false],
            [false, true],
            [1, false],
            ["abc", false],
            [[], true],
        ];
    }

    #[DataProvider('notProvider')]
    public function testNot($input, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->not($input));
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function getAttrProvider(): array
    {
        return [
            ['{"Thing1": "foo", "Thing2": ["index0", "index1"], "Thing3": {"SubThing": 42}}', "Thing1", "foo"],
            ['{"Thing1": "foo", "Thing2": ["index0", "index1"], "Thing3": {"SubThing": 42}}', "Thing2[0]", "index0"],
            ['{"Thing1": "foo", "Thing2": ["index0", "index1"], "Thing3": {"SubThing": 42}}', "Thing3.SubThing", 42],
            ['["index0", "index1"]', "[0]", 'index0']
        ];
    }

    #[DataProvider('getAttrProvider')]
    public function testGetAttr($from, $path, $expected)
    {
        $from = json_decode($from, true);
        $this->assertSame($expected, $this->standardLibrary->getAttr($from, $path));
    }

    public function testGetAttrFromArray()
    {
        $from = json_decode('["foo", "bar"]', true);
        $this->assertSame("foo", $this->standardLibrary->getAttr($from, 0));
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function stringEqualsProvider(): array
    {
        return [
            ["abc", "abc", true],
            ["abc", "ABC", false],
            ["abc", "def", false],
        ];
    }

    #[DataProvider('stringEqualsProvider')]
    public function testStringEquals($string1, $string2, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->stringEquals($string1, $string2));
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function booleanEqualsProvider(): array
    {
        return [
            [true, true, true],
            [true, false, false],
            [false, true, false],
            [false, false, true],
            ['true', true, true],
            ['true', false, false],
            ['false', true, false],
            ['false', false, true],
            [true, 'true', true],
            [true, 'false', false],
            [false, 'true', false],
            [false, 'false', true],
        ];
    }

    #[DataProvider('booleanEqualsProvider')]
    public function testBooleanEquals($boolean1, $boolean2, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->booleanEquals($boolean1, $boolean2));
    }

    public function testParseUrlReturnsNullWithQuery()
    {
        $result = $this->standardLibrary->parseUrl('https://example.com:8443?foo=bar&faz=baz');
        $this->assertEquals(null, $result);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function isValidHostLabelProvider(): array
    {
        return [
            "valid" => ["exampleHostLabel", false, true],
            "valid with subdomains" => ["amazon.example.com", true, true],
            "invalid: invalid character" => ["tilde~.com", false, false],
            "invalid: too long" => ["abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz", false, false],
            "invalid: invalid character with subdomains" => ["amazon.example~.com", true, false],
        ];
    }

    #[DataProvider('isValidHostLabelProvider')]
    public function testIsValidHostLabel($hostLabel, $allowSubDomains, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->isValidHostLabel($hostLabel, $allowSubDomains));
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function resolveTemplateStringProvider(): array
    {
        $params = [
            'ShorthandSyntax' => [
                'foo' => 'bar'
            ],
            'NestedShorthandSyntax' =>
            [
                'first' => [
                    'second' => [
                        'third' => 'baz'
                    ]
                ]
            ],
            'Region' => 'us-east-1',
            'PartitionResult' => null
        ];

        return [
            "resolves standard value" =>
            [
                'https://{Region}.amazonaws.com',
                $params,
                'https://us-east-1.amazonaws.com'
            ],
            "shorthand syntax" =>
            [
                'https://{ShorthandSyntax#foo}.amazonaws.com',
                $params,
                'https://bar.amazonaws.com'
            ],
            "nested shorthand syntax" =>
            [
                'https://{NestedShorthandSyntax#first#second#third}.amazonaws.com',
                $params,
                'https://baz.amazonaws.com'
            ],
            "escape sequence" =>
            [
                'https://{{Region}}.{{ShorthandSyntax}}.amazonaws.com',
                $params,
                'https://{Region}.{ShorthandSyntax}.amazonaws.com'
            ],
        ];
    }

    #[DataProvider('resolveTemplateStringProvider')]
    public function testResolveTemplateString($string, $inputParams, $expected)
    {
        $result = $this->standardLibrary->resolveTemplateString($string, $inputParams);
        $this->assertEquals($expected, $result);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function NullParamProvider(): array
    {
        $params = [
            'Region' => 'us-east-1',
            'PartitionResult' => null
        ];

        return [
            "null PartitionResult" =>
                [
                    'https://{Region}.{PartitionResult}.amazonaws.com',
                    $params,
                ],
            "null PartitionResult nested property" =>
                [
                    'https://{Region}.{PartitionResult#someIndex}.amazonaws.com',
                    $params,
                ],
        ];
    }

    #[DataProvider('NullParamProvider')]
    public function testResolveTemplateStringThrowsExceptionIfNullParam($string, $inputParams)
    {
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            'Resolved value was null.  Please check rules and ' .
            'input parameters and try again.'
        );
        $this->standardLibrary->resolveTemplateString($string, $inputParams);
    }

    public function testParseArnReturnsNullIfInvalid() {
        $result = $this->standardLibrary->parseArn('arn:aws:this-is-not-an-arn:foo');
        $this->assertEquals(null, $result);
    }

    public function testUriEncodeReturnsNullIfProvidedNull()
    {
        $result = $this->standardLibrary->uriEncode(null);
        $this->assertEquals(null, $result);
    }

    public function testParseUrlReturnsNullIfProvidedNull()
    {
        $result = $this->standardLibrary->parseUrl(null);
        $this->assertEquals(null, $result);
    }

    public function testStringEqualsThrowsExceptionIfNotString()
    {
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Values passed to StringEquals must be `string`.');
        $this->standardLibrary->stringEquals('foo', true);
    }

    public function testPartitionThrowsExceptionIfNotString()
    {
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Value passed to `partition` must be `string`.');
        $this->standardLibrary->partition(null);
    }

    public function testSubstringThrowsExceptionIfInputNotString() {
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Input passed to `substring` must be `string`.');
        $this->standardLibrary->substring(null, null, null, null);
    }

    public function testCallFunctionThrowsErrorIfAlreadyAssigned() {
        $condition = [
            'fn' => 'aws.parseArn',
            'argv' => ['{Bucket}'],
            'assign' => 'bucketArn'
        ];
        $inputParameters = [
            'Bucket' => 'arn:aws:s3:us-east-1:123456789012:mybucket',
            'bucketArn' => 'arn:aws:s3:us-east-1:123456789012:mybucket'
        ];

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage(
            'Assignment `bucketArn` already exists in input parameters' .
            ' or has already been assigned by an endpoint rule and cannot be overwritten.'
        );
        $this->standardLibrary->callFunction($condition, $inputParameters);
    }

    public function testCallFunctionThrowsOnUnknownFunction()
    {
        $condition = [
            'fn' => 'aws.doesNotExist',
            'argv' => [],
        ];
        $params = [];

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Unknown endpoint function `aws.doesNotExist`.');
        $this->standardLibrary->callFunction($condition, $params);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function coalesceProvider(): array
    {
        return [
            'first non-null' => [['primary', 'secondary'], 'primary'],
            'skips nulls' => [[null, null, 'third'], 'third'],
            'all nulls' => [[null, null], null],
            'no args' => [[], null],
            'respects falsy non-null' => [[null, 0, 'later'], 0],
            'respects empty string' => [[null, '', 'later'], ''],
        ];
    }

    #[DataProvider('coalesceProvider')]
    public function testCoalesce($values, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->coalesce(...$values));
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function splitProvider(): array
    {
        return [
            'unlimited split' => ['a.b.c.d', '.', null, ['a', 'b', 'c', 'd']],
            'limited split' => ['a.b.c.d', '.', 2, ['a', 'b.c.d']],
            'delimiter not found' => ['abcd', '.', null, ['abcd']],
            'empty input' => ['', '.', null, ['']],
            'null input returns null' => [null, '.', null, null],
            'empty delimiter returns null' => ['a.b', '', null, null],
            'zero limit returns null' => ['a.b', '.', 0, null],
            'negative limit returns null' => ['a.b', '.', -1, null],
            'non-int limit returns null' => ['a.b', '.', '2', null],
        ];
    }

    #[DataProvider('splitProvider')]
    public function testSplit($input, $delimiter, $limit, $expected)
    {
        $this->assertSame(
            $expected,
            $this->standardLibrary->split($input, $delimiter, $limit)
        );
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public static function iteProvider(): array
    {
        return [
            'true picks then' => [true, 'yes', 'no', 'yes'],
            'false picks else' => [false, 'yes', 'no', 'no'],
            'string true picks then' => ['true', 'yes', 'no', 'yes'],
            'string false picks else' => ['false', 'yes', 'no', 'no'],
            'null picks else' => [null, 'yes', 'no', 'no'],
            'nested values preserved' => [true, ['a' => 1], ['b' => 2], ['a' => 1]],
        ];
    }

    #[DataProvider('iteProvider')]
    public function testIte($condition, $then, $else, $expected)
    {
        $this->assertSame(
            $expected,
            $this->standardLibrary->ite($condition, $then, $else)
        );
    }
}
