<?php
namespace Aws\Test\EndpointV2;

use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\Ruleset\RulesetStandardLibrary;
use Aws\Exception\UnresolvedEndpointException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\EndpointV2\Ruleset\RulesetStandardLibrary
 */
class RulesetStandardLibraryTest extends TestCase
{
    private $standardLibrary;

    protected function set_up()
    {
        $partitionsPath = __DIR__ . '/partitions.json';
        $partitions = EndpointDefinitionProvider::getPartitions();
        $this->standardLibrary = new RulesetStandardLibrary($partitions);
    }

    public function isSetProvider()
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

    /**
     * @dataProvider isSetProvider
     *
     * @param $input
     * @param $expected
     */
    public function testIsSet($input, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->is_set($input));
    }

    public function notProvider()
    {
        return [
            [true, false],
            [false, true],
            [1, false],
            ["abc", false],
            [[], true],
        ];
    }

    /**
     * @dataProvider notProvider
     *
     * @param  $input
     * @param $expected
     */
    public function testNot($input, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->not($input));
    }

    public function getAttrProvider()
    {
        return [
            ["Thing1", "foo"],
            ["Thing2[0]", "index0"],
            ["Thing3.SubThing", 42],
        ];
    }

    /**
     * @dataProvider getAttrProvider
     *
     * @param $path
     * @param $expected
     */
    public function testGetAttr($path, $expected)
    {
        $from = json_decode('{"Thing1": "foo", "Thing2": ["index0", "index1"], "Thing3": {"SubThing": 42}}', true);
        $this->assertSame($expected, $this->standardLibrary->getAttr($from, $path));
    }

    public function testGetAttrFromArray()
    {
        $from = json_decode('["foo", "bar"]', true);
        $this->assertSame("foo", $this->standardLibrary->getAttr($from, 0));
    }

    public function stringEqualsProvider()
    {
        return [
            ["abc", "abc", true],
            ["abc", "ABC", false],
            ["abc", "def", false],
        ];
    }

    /**
     * @dataProvider stringEqualsProvider
     *
     * @param $string1
     * @param $string2
     * @param $expected
     */
    public function testStringEquals($string1, $string2, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->stringEquals($string1, $string2));
    }

    public function booleanEqualsProvider()
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

    /**
     * @dataProvider booleanEqualsProvider
     *
     * @param $boolean1
     * @param $boolean2
     * @param $expected
     */
    public function testBooleanEquals($boolean1, $boolean2, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->booleanEquals($boolean1, $boolean2));
    }

    public function testParseUrlReturnsNullWithQuery()
    {
        $result = $this->standardLibrary->parseUrl('https://example.com:8443?foo=bar&faz=baz');
        $this->assertEquals(null, $result);
    }

    public function isValidHostLabelProvider()
    {
        return [
            "valid" => ["exampleHostLabel", false, true],
            "valid with subdomains" => ["amazon.example.com", true, true],
            "invalid: invalid character" => ["tilde~.com", false, false],
            "invalid: too long" => ["abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz", false, false],
            "invalid: invalid character with subdomains" => ["amazon.example~.com", true, false],
        ];
    }

    /**
     * @dataProvider isValidHostLabelProvider
     *
     * @param $hostLabel
     * @param $allowSubDomains
     * @param $expected
     */
    public function testIsValidHostLabel($hostLabel, $allowSubDomains, $expected)
    {
        $this->assertSame($expected, $this->standardLibrary->isValidHostLabel($hostLabel, $allowSubDomains));
    }

    public function resolveTemplateStringProvider()
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

    /**
     * @dataProvider resolveTemplateStringProvider
     *
     * @param $string
     * @param $inputParams
     * @param $expected
     */
    public function testResolveTemplateString($string, $inputParams, $expected)
    {
        $result = $this->standardLibrary->resolveTemplateString($string, $inputParams);
        $this->assertEquals($expected, $result);
    }

    public function NullParamProvider()
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

    /**
     * @dataProvider NullParamProvider
     *
     * @param $string
     * @param $inputParams
     */
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
}

