<?php
namespace Aws\Test;

use Aws;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;

class FunctionsTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatesRecursiveDirIterator()
    {
        $iter = Aws\recursive_dir_iterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains(__FILE__, $files);
    }

    public function testCreatesNonRecursiveDirIterator()
    {
        $iter = Aws\dir_iterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains('FunctionsTest.php', $files);
    }

    public function testComposesOrFunctions()
    {
        $a = function ($a, $b) { return null; };
        $b = function ($a, $b) { return $a . $b; };
        $c = function ($a, $b) { return 'C'; };
        $comp = Aws\or_chain($a, $b, $c);
        $this->assertEquals('+-', $comp('+', '-'));
    }

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

    public function testCreatesConstantlyFunctions()
    {
        $fn = Aws\constantly('foo');
        $this->assertSame('foo', $fn());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUsesJsonCompiler()
    {
        Aws\load_compiled_json('/path/to/not/here.json');
    }

    public function testUsesPhpCompilationOfJsonIfPossible()
    {
        $soughtData = ['foo' => 'bar'];
        $jsonPath = sys_get_temp_dir() . '/some-file-name-' . time() . '.json';
        file_put_contents($jsonPath, 'INVALID JSON', LOCK_EX);
        file_put_contents(
            "$jsonPath.php",
            '<?php return ' . var_export($soughtData, true) . ';',
            LOCK_EX
        );

        $this->assertSame($soughtData, Aws\load_compiled_json($jsonPath));
    }

    public function filterTest()
    {
        $data = [0, 1, 2, 3, 4];
        $result = \Aws\filter($data, function ($v) { return $v % 2; });
        $this->assertEquals([1, 3], iterator_to_array($result));
    }

    public function mapTest()
    {
        $data = [0, 1, 2, 3, 4];
        $result = \Aws\map($data, function ($v) { return $v + 1; });
        $this->assertEquals([1, 2, 3, 4, 5], iterator_to_array($result));
    }

    public function flatmapTest()
    {
        $data = [[1, 2], [3], [], [4, 5]];
        $xf = function ($value) { return array_sum($value); };
        $result = \Aws\flatmap($data, $xf);
        $this->assertEquals([3, 3, 0, 9], iterator_to_array($result));
    }

    public function partitionTest()
    {
        $data = [0, 1, 2, 3, 4, 5];
        $result = \Aws\partition($data, 2);
        $this->assertEquals([[1, 2], [3, 4], [5]], iterator_to_array($result));
    }

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
            'signature_version' => 'v4'
        ];

        $client = new S3Client($conf);
        $command = $client->getCommand('PutObject', [
            'Bucket' => 'foo',
            'Key'    => 'bar',
            'Body'   => '123'
        ]);
        $request = \Aws\serialize($command);
        $this->assertEquals('/foo/bar', $request->getRequestTarget());
        $this->assertEquals('PUT', $request->getMethod());
        $this->assertEquals('s3.amazonaws.com', $request->getHeaderLine('Host'));
        $this->assertTrue($request->hasHeader('Authorization'));
        $this->assertTrue($request->hasHeader('X-Amz-Content-Sha256'));
        $this->assertTrue($request->hasHeader('X-Amz-Date'));
        $this->assertEquals('123', (string) $request->getBody());
    }
}
