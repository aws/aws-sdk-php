<?php
namespace Aws\Test;

use Aws\JsonCompiler;

/**
 * @covers Aws\JsonCompiler
 */
class JsonCompilerTest extends \PHPUnit_Framework_TestCase
{
    private $env;
    private $models;

    public function setup()
    {
        $this->models = realpath(__DIR__ . '/../src/data');
        $js = new JsonCompiler();
        $js->purge();
        $this->env = getenv(JsonCompiler::CACHE_ENV);
        putenv(JsonCompiler::CACHE_ENV . '=');
    }

    public function tearDown()
    {
        $js = new JsonCompiler();
        $js->purge();
        putenv(JsonCompiler::CACHE_ENV . '=' . $this->env);
    }

    private function ensureOpcache()
    {
        if (!extension_loaded('Zend OPcache')) {
            $this->markTestSkipped('OPcache not enabled');
        }
    }

    public function testCanDisableCache()
    {
        $c = new JsonCompiler(false);
        $this->assertInternalType('array', $c->load(__DIR__ . '/../composer.json'));
        $this->assertEmpty(array_diff(scandir($c->getCacheDir()), ['.', '..']));
    }

    public function testCanCacheFiles()
    {
        $this->ensureOpcache();
        $c = new JsonCompiler();
        $data = $c->load($this->models . '/endpoints.json');
        $this->assertInternalType('array', $data);
        $entries = array_diff(scandir($c->getCacheDir()), ['.', '..']);
        $this->assertContains('data_endpoints.json.php', $entries);
        $this->assertSame($data, $c->load($this->models . '/endpoints.json'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresFileExists()
    {
        $this->ensureOpcache();
        $c = new JsonCompiler();
        $c->load($this->models . '/not_there.json');
    }

    public function testCanPurgeCachedFiles()
    {
        $this->ensureOpcache();
        $c = new JsonCompiler();
        $c->load($this->models . '/endpoints.json');
        $entries = array_diff(scandir($c->getCacheDir()), ['.', '..']);
        $this->assertNotEmpty($entries);
        $this->assertEquals(['data_endpoints.json.php'], array_values($entries));
        $c->purge();
        $entries = array_diff(scandir($c->getCacheDir()), ['.', '..']);
        $this->assertEmpty($entries);
    }

    public function pathProvider()
    {
        return [
            ['/foo/baz/bar.qux', '/foo/baz/bar.qux'],
            ['/foo/baz/../bar.qux', '/foo/bar.qux'],
            ['/foo/baz/./bar.qux', '/foo/baz/bar.qux'],
            ['/foo/baz/../../bar.qux', '/bar.qux'],
            ['/../../bar.qux', '/bar.qux'],
            // Extra slashes
            ['/foo//baz///bar.qux', '/foo/baz/bar.qux'],
            // Relative with no leading slash
            ['foo/baz/../bar.qux', 'foo/bar.qux'],
            ['\\foo\\baz\\..\\.\\bar.qux', '/foo/bar.qux'],
            // Phar path
            ['phar://foo.phar/foo/bar/../baz.qux', 'phar://foo.phar/foo/baz.qux'],
            // Phar path with windows mixed in
            ['phar://foo.phar\\foo\\bar\\..\\baz.qux', 'phar://foo.phar/foo/baz.qux'],
        ];
    }

    /**
     * @dataProvider pathProvider
     */
    public function testResolvesRelativePaths($path, $resolved)
    {
        $j = new JsonCompiler();
        $meth = new \ReflectionMethod('Aws\JsonCompiler', 'normalize');
        $meth->setAccessible(true);
        $this->assertEquals($resolved, $meth->invoke($j, $path));
    }
}
