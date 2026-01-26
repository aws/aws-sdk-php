<?php
namespace Aws\Test;

use Aws;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

class FunctionsTest extends TestCase
{
    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testCreatesRecursiveDirIterator()
    {
        $iter = Aws\recursive_dir_iterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = array_map('realpath', iterator_to_array($iter));
        $this->assertContains(realpath(__FILE__), $files);
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testCreatesNonRecursiveDirIterator()
    {
        $iter = Aws\dir_iterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains('FunctionsTest.php', $files);
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testComposesOrFunctions()
    {
        $a = function ($a, $b) { return null; };
        $b = function ($a, $b) { return $a . $b; };
        $c = function ($a, $b) { return 'C'; };
        $comp = Aws\or_chain($a, $b, $c);
        $this->assertSame('+-', $comp('+', '-'));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
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

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testCreatesConstantlyFunctions()
    {
        $fn = Aws\constantly('foo');
        $this->assertSame('foo', $fn());
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testUsesJsonCompiler()
    {
        $this->expectException(\InvalidArgumentException::class);
        Aws\load_compiled_json('/path/to/not/here.json');
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
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

 */
    #[CoversClass(recursive_dir_iterator()::class)]
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

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testFilter()
    {
        $data = [0, 1, 2, 3, 4];
        $func = function ($v) { return $v % 2; };
        $result = \Aws\filter($data, $func);
        $this->assertEquals([1, 3], iterator_to_array($result));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testMap()
    {
        $data = [0, 1, 2, 3, 4];
        $result = \Aws\map($data, function ($v) { return $v + 1; });
        $this->assertEquals([1, 2, 3, 4, 5], iterator_to_array($result));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
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

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testPartition()
    {
        $data = [1, 2, 3, 4, 5];
        $result = \Aws\partition($data, 2);
        $this->assertEquals([[1, 2], [3, 4], [5]], iterator_to_array($result));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testDescribeObject()
    {
        $obj = new \stdClass();
        $this->assertSame('object(stdClass)', Aws\describe_type($obj));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testDescribeArray()
    {
        $arr = [0, 1, 2];
        $this->assertSame('array(3)', Aws\describe_type($arr));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testDescribeDoubleToFloat()
    {
        if (PHP_VERSION_ID >= 80500) {
            $this->markTestSkipped(
                'Non-canonical casts are deprecated in version 8.5 and up'
            );
        }

        $double = (double) 1.3;
        $this->assertSame('float(1.3)', Aws\describe_type($double));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testDescribeType()
    {
        $this->assertSame('int(1)', Aws\describe_type(1));
        $this->assertSame('string(4) "test"', Aws\describe_type("test"));
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testGuzzleHttpHandler()
    {
        if (!class_exists('GuzzleHttp\Handler\StreamHandler')) {
            $this->markTestSkipped();
        }
        $this->assertInstanceOf(
            Aws\Handler\Guzzle\GuzzleHandler::class,
            Aws\default_http_handler()
        );
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
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
        $this->assertSame('/bar', $request->getRequestTarget());
        $this->assertSame('PUT', $request->getMethod());
        $this->assertSame('foo.s3.amazonaws.com', $request->getHeaderLine('Host'));
        $this->assertTrue($request->hasHeader('Authorization'));
        $this->assertTrue($request->hasHeader('X-Amz-Content-Sha256'));
        $this->assertTrue($request->hasHeader('X-Amz-Date'));
        $this->assertSame('123', (string) $request->getBody());
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testLoadsManifest()
    {
        $this->assertNotNull(Aws\manifest());
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testServiceManifest()
    {
        $manifest = Aws\manifest('s3');
        $data = [
            'namespace' => 'S3',
            'versions'  => [
                'latest'     => '2006-03-01',
                '2006-03-01' => '2006-03-01'
            ],
            'endpoint'  => 's3',
            'serviceIdentifier' => 's3'
        ];
        $this->assertEquals($data, $manifest);
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testAliasManifest()
    {
        $manifest = Aws\manifest('iotdataplane');
        $data = [
            'namespace' => 'IotDataPlane',
            'versions'  => [
                'latest'     => '2015-05-28',
                '2015-05-28' => '2015-05-28'
            ],
            'endpoint'  => 'data.iot',
            'serviceIdentifier' => 'iot_data_plane'
        ];
        $this->assertEquals($data, $manifest);
    }

    /**

 */
    #[CoversClass(recursive_dir_iterator()::class)]
    public function testInvalidManifest()
    {
        $this->expectException(\InvalidArgumentException::class);
        Aws\manifest('notarealservicename');
    }

    /**

 */
#[CoversClass(recursive_dir_iterator()::class)]
    #[DataProvider('getHostnameTestCases')]
    public function testValidatesHostnames($hostname, $expected)
    {
        $this->assertEquals($expected, Aws\is_valid_hostname($hostname));
    }

    public static function getHostnameTestCases()
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
     * @param string $label
     * @param bool $expected

 */
#[CoversClass(recursive_dir_iterator()::class)]
    #[DataProvider('getHostlabelTestCases')]
    public function testValidatesHostlabels($label, $expected)
    {
        $this->assertEquals($expected, Aws\is_valid_hostlabel($label));
    }

    public static function getHostlabelTestCases()
    {
        return [
            ['us-west-2', true],
            ['a', true],
            ['a.b', false],
            ['2-us-west', true],
            ['1-us-west-2', true],
            ['42', true],
            ['us_west_2', false],
            ['-west-2', false],
            ['@uncoolwebsite.com', false],
            ['a-b.c-d', false],
            ['a--b', true],
            ['a b', false],
            ['<a', false],
            ['a>', false],
            [' ', false],
            ['-', false],
            ['', false],
            [str_repeat('a', 63), true],
            [str_repeat('a', 64), false],
            ['us-west-2-certainly-this-label-must-be-longer-than-63-characters-by-now', false],
        ];
    }

    /**

 */
#[CoversClass(recursive_dir_iterator()::class)]
    #[DataProvider('getIniFileTestCases')]
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

    public static function getIniFileTestCases()
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

    /**

 */
#[CoversClass(recursive_dir_iterator()::class)]
    #[DataProvider('getIniFileServiceTestCases')]
    public function testParsesIniSectionsWithSubsections($ini, $expected)
    {
        $tmpFile = sys_get_temp_dir() . '/test.ini';
        file_put_contents($tmpFile, $ini);
        $this->assertEquals(
            $expected,
            Aws\parse_ini_section_with_subsections($tmpFile, 'services my-services')
        );
        unlink($tmpFile);
    }

    public static function getIniFileServiceTestCases()
    {
        return [
            [
                <<<EOT
[services my-services]
s3 =
  endpoint_url = https://exmaple.com
elastic_beanstalk =
  endpoint_url = https://exmaple.com
[default]
foo_key = bar
baz_key = qux
[custom]
foo_key = bar-custom
baz_key = qux-custom
EOT
                ,
                [
                    's3' => [
                        'endpoint_url' => 'https://exmaple.com'
                    ],
                    'elastic_beanstalk' => [
                        'endpoint_url' => 'https://exmaple.com',
                    ]
                ]
            ]
        ];
    }

    /**
     * @param $array
     * @param $expected
     *

 */
    #[DataProvider('isAssociativeProvider')]
    public function testIsAssociative($array, $expected)
    {
        $result = Aws\is_associative($array);
        $this->assertEquals($expected, $result);
    }

    public static function isAssociativeProvider()
    {
        return [
           [[], false],
           [['foo' => 'bar'], true],
           [[1, 2, 3, 5], false],
           [['foo', 'bar', 'baz'], false],
           [['1' => 1, '2' => 2, '3'], true],
           [['0' => 0, '1' => 2], false],
           [[0 => 1, 1 => 2], false],
           [[1 => 0, 2 => 2], true],
        ];
    }
}
