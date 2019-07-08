<?php
namespace Aws\Test;

use Aws;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    /**
     * @covers Aws\recursive_dir_iterator()
     */
    public function testCreatesRecursiveDirIterator()
    {
        $iter = Aws\recursive_dir_iterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains(__FILE__, $files);
    }

    /**
     * @covers Aws\dir_iterator()
     */
    public function testCreatesNonRecursiveDirIterator()
    {
        $iter = Aws\dir_iterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains('FunctionsTest.php', $files);
    }

    /**
     * @covers Aws\or_chain()
     */
    public function testComposesOrFunctions()
    {
        $a = function ($a, $b) { return null; };
        $b = function ($a, $b) { return $a . $b; };
        $c = function ($a, $b) { return 'C'; };
        $comp = Aws\or_chain($a, $b, $c);
        $this->assertEquals('+-', $comp('+', '-'));
    }

    /**
     * @covers Aws\or_chain()
     */
    public function testReturnsNullWhenNonResolve()
    {
        $called = [];
        $a = function () use (&$called) { $called[] = 'a'; };
        $b = function () use (&$called) { $called[] = 'b'; };
        $c = function () use (&$called) { $called[] = 'c'; };
        $comp = Aws\or_chain($a, $b, $c);
        $this->assertNull($comp());
        $this->assertEquals(['a', 'b', 'c'], $called);
    }

    /**
     * @covers Aws\constantly()
     */
    public function testCreatesConstantlyFunctions()
    {
        $fn = Aws\constantly('foo');
        $this->assertSame('foo', $fn());
    }

    /**
     * @expectedException \InvalidArgumentException
     *
     * @covers Aws\load_compiled_json()
     */
    public function testUsesJsonCompiler()
    {
        Aws\load_compiled_json('/path/to/not/here.json');
    }

    /**
     * @covers Aws\load_compiled_json()
     */
    public function testUsesPhpCompilationOfJsonIfPossible()
    {
        $soughtData = ['foo' => 'bar'];
        $jsonPath = sys_get_temp_dir() . '/some-file-name-' . time() . '.json';

        file_put_contents($jsonPath, json_encode($soughtData), LOCK_EX);

        $this->assertSame($soughtData, Aws\load_compiled_json($jsonPath));

        file_put_contents($jsonPath, 'INVALID JSON', LOCK_EX);

        file_put_contents(
            "$jsonPath.php",
            '<?php return ' . var_export($soughtData, true) . ';',
            LOCK_EX
        );

        $this->assertSame($soughtData, Aws\load_compiled_json($jsonPath));
    }

    /**
     * @covers Aws\load_compiled_json()
     */
    public function testOnlyLoadsCompiledJsonOnce()
    {
        $soughtData = ['foo' => 'bar'];
        $jsonPath = sys_get_temp_dir() . '/some-file-name-' . time() . '.json';

        file_put_contents($jsonPath, json_encode($soughtData), LOCK_EX);

        $this->assertSame($soughtData, Aws\load_compiled_json($jsonPath));
        $jsonAtime = fileatime($jsonPath);

        file_put_contents($jsonPath, 'INVALID JSON', LOCK_EX);

        $compiledPath = "{$jsonPath}.php";
        file_put_contents(
            $compiledPath,
            '<?php return ' . var_export($soughtData, true) . ';',
            LOCK_EX
        );

        $this->assertSame($soughtData, Aws\load_compiled_json($jsonPath));
        $compiledAtime = fileatime($compiledPath);

        sleep(1);
        clearstatcache();
        $this->assertSame($soughtData, Aws\load_compiled_json($jsonPath));
        $this->assertEquals($jsonAtime, fileatime($jsonPath));
        $this->assertEquals($compiledAtime, fileatime($compiledPath));
    }

    /**
     * @covers Aws\filter()
     */
    public function testFilter()
    {
        $data = [0, 1, 2, 3, 4];
        $func = function ($v) { return $v % 2; };
        $result = \Aws\filter($data, $func);
        $this->assertEquals([1, 3], iterator_to_array($result));
    }

    /**
     * @covers Aws\map()
     */
    public function testMap()
    {
        $data = [0, 1, 2, 3, 4];
        $result = \Aws\map($data, function ($v) { return $v + 1; });
        $this->assertEquals([1, 2, 3, 4, 5], iterator_to_array($result));
    }

    /**
     * @covers Aws\flatmap()
     */
    public function testFlatMap()
    {
        $data = ['Hello', 'World'];
        $xf = function ($value) { return str_split($value); };
        $result = \Aws\flatmap($data, $xf);
        $this->assertEquals(
            ['H', 'e', 'l', 'l', 'o', 'W', 'o', 'r', 'l', 'd'],
            iterator_to_array($result)
        );
    }

    /**
     * @covers Aws\partition()
     */
    public function testPartition()
    {
        $data = [1, 2, 3, 4, 5];
        $result = \Aws\partition($data, 2);
        $this->assertEquals([[1, 2], [3, 4], [5]], iterator_to_array($result));
    }

    /**
     * @covers Aws\describe_type()
     */
    public function testDescribeObject()
    {
        $obj = new \stdClass();
        $this->assertEquals('object(stdClass)', Aws\describe_type($obj));
    }

    /**
     * @covers Aws\describe_type()
     */
    public function testDescribeArray()
    {
        $arr = [0, 1, 2];
        $this->assertEquals('array(3)', Aws\describe_type($arr));
    }

    /**
     * @covers Aws\describe_type()
     */
    public function testDescribeDoubleToFloat()
    {
        $double = (double)1.3;
        $this->assertEquals('float(1.3)', Aws\describe_type($double));
    }

    /**
     * @covers Aws\describe_type()
     */
    public function testDescribeType()
    {
        $this->assertEquals('int(1)', Aws\describe_type(1));
        $this->assertEquals('string(4) "test"', Aws\describe_type("test"));
    }

    /**
     * @covers Aws\default_http_handler()
     */
    public function testGuzzleV5HttpHandler()
    {
        if (!class_exists('GuzzleHttp\Ring\Core')) {
            $this->markTestSkipped();
        }
        $this->assertInstanceOf(
            Aws\Handler\GuzzleV5\GuzzleHandler::class,
            Aws\default_http_handler()
        );
    }

    /**
     * @covers Aws\default_http_handler()
     */
    public function testGuzzleV6HttpHandler()
    {
        if (!class_exists('GuzzleHttp\Handler\StreamHandler')) {
            $this->markTestSkipped();
        }
        $this->assertInstanceOf(
            Aws\Handler\GuzzleV6\GuzzleHandler::class,
            Aws\default_http_handler()
        );
    }

    /**
     * @covers Aws\serialize()
     */
    public function testSerializesHttpRequests()
    {
        $mock = new MockHandler([new Result([])]);
        $conf = [
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => 'foo',
                'secret' => 'bar'
            ],
            'handler' => $mock,
            'signature_version' => 'v4',
        ];

        $client = new S3Client($conf);
        $command = $client->getCommand('PutObject', [
            'Bucket' => 'foo',
            'Key'    => 'bar',
            'Body'   => '123'
        ]);
        $request = \Aws\serialize($command);
        $this->assertEquals('/bar', $request->getRequestTarget());
        $this->assertEquals('PUT', $request->getMethod());
        $this->assertEquals('foo.s3.amazonaws.com', $request->getHeaderLine('Host'));
        $this->assertTrue($request->hasHeader('Authorization'));
        $this->assertTrue($request->hasHeader('X-Amz-Content-Sha256'));
        $this->assertTrue($request->hasHeader('X-Amz-Date'));
        $this->assertEquals('123', (string) $request->getBody());
    }

    /**
     * @covers Aws\manifest()
     */
    public function testLoadsManifest()
    {
        $this->assertNotNull(Aws\manifest());
    }

    /**
     * @covers Aws\manifest()
     */
    public function testServiceManifest()
    {
        $manifest = Aws\manifest('s3');
        $data = [
            'namespace' => 'S3',
            'versions'  => [
                'latest'     => '2006-03-01',
                '2006-03-01' => '2006-03-01'
            ],
            'endpoint'  => 's3'
        ];
        $this->assertEquals($data, $manifest);
    }

    /**
     * @covers Aws\manifest()
     */
    public function testAliasManifest()
    {
        $manifest = Aws\manifest('iotdataplane');
        $data = [
            'namespace' => 'IotDataPlane',
            'versions'  => [
                'latest'     => '2015-05-28',
                '2015-05-28' => '2015-05-28'
            ],
            'endpoint'  => 'data.iot'
        ];
        $this->assertEquals($data, $manifest);
    }

    /**
     * @covers Aws\manifest()
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidManifest()
    {
        Aws\manifest('notarealservicename');
    }

    /**
     * @covers Aws\is_valid_hostname()
     * @dataProvider getHostnameTestCases
     */
    public function testValidatesHostnames($hostname, $expected)
    {
        $this->assertEquals($expected, Aws\is_valid_hostname($hostname));
    }

    public function getHostnameTestCases()
    {
        return [
            ['a', true],
            ['a.', true],
            ['0', true],
            ['1.2.3.4', true],
            ['a.b', true],
            ['a.b.c.d.e', true],
            ['a.b.c.d.e.', true],
            ['a-b.c-d', true],
            ['a--b.c--d', true],
            ['a b', false],
            ['a..b', false],
            ['a.b ', false],
            ['a-.b', false],
            ['-a.b', false],
            ['.a.b', false],
            ['<a', false],
            ['(a', false],
            ['a>', false],
            ['a)', false],
            ['.', false],
            [' ', false],
            ['-', false],
            ['', false],
            [str_repeat('a', 63), true],
            [str_repeat('a', 64), false],
            [
                str_repeat('a', 63) . '.' . str_repeat('a', 63) . '.'
                    . str_repeat('a', 63) . '.' . str_repeat('a', 61),
                true
            ],
            [
                str_repeat('a', 63) . '.' . str_repeat('a', 63) . '.'
                    . str_repeat('a', 63) . '.' . str_repeat('a', 62),
                false
            ],
        ];
    }

    /**
     * @covers Aws\parse_ini_file()
     * @dataProvider getIniFileTestCases
     */
    public function testParsesIniFile($ini, $expected)
    {
        $tmpFile = sys_get_temp_dir() . '/test.ini';
        file_put_contents($tmpFile, $ini);
        $this->assertEquals(
            $expected,
            Aws\parse_ini_file($tmpFile, true, INI_SCANNER_RAW)
        );
        unlink($tmpFile);
    }

    public function getIniFileTestCases()
    {
        return [
            [
                <<<EOT
[default]
foo_key = bar
baz_key = qux
[custom]
foo_key = bar-custom
baz_key = qux-custom
EOT
                ,
                [
                    'default' => [
                        'foo_key' => 'bar',
                        'baz_key' => 'qux',
                    ],
                    'custom' => [
                        'foo_key' => 'bar-custom',
                        'baz_key' => 'qux-custom',
                    ]
                ]
            ],
            [
                <<<EOT
[default]
;Full-line comment = ignored
#Full-line comment = ignored
foo_key = bar;Inline comment = ignored
baz_key = qux
*star_key = not_ignored
EOT
                ,
                [
                    'default' => [
                        'foo_key' => 'bar',
                        'baz_key' => 'qux',
                        '*star_key' => 'not_ignored'
                    ],
                ],
            ],
        ];
    }
}
