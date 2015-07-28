<?php
namespace Aws\Test;

use Aws\FileCache;
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
        $this->env = getenv(FileCache::CACHE_ENV);
        putenv(FileCache::CACHE_ENV . '=');
    }

    public function tearDown()
    {
        $js = new JsonCompiler();
        $js->purge();
        putenv(FileCache::CACHE_ENV . '=' . $this->env);
    }

    private function ensureOpcache()
    {
        if (!extension_loaded('Zend OPcache')) {
            $this->markTestSkipped('OPcache not enabled');
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCanDisableCache()
    {
        $jsonPath = tempnam(sys_get_temp_dir(), 'JsonCompiler');
        file_put_contents($jsonPath, json_encode(['foo' => 'bar']));

        $c = new JsonCompiler(false);
        $this->assertInternalType('array', $c->load($jsonPath));
        unlink($jsonPath);
        $c->load($jsonPath);
    }

    public function testCanCacheFiles()
    {
        $jsonPath = tempnam(sys_get_temp_dir(), 'JsonCompiler');
        file_put_contents($jsonPath, json_encode(['foo' => 'bar']));

        $c = new JsonCompiler;
        $this->assertInternalType('array', $c->load($jsonPath));
        unlink($jsonPath);
        $c->load($jsonPath);
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
        $cacheProp = (new \ReflectionClass($c))->getProperty('cache');
        $cacheProp->setAccessible(true);
        $cache = $cacheProp->getValue($c);
        $c->load($this->models . '/endpoints.json');
        $this->assertNotNull($cache->get(realpath($this->models . '/endpoints.json')));
        $c->purge();
        $this->assertNull($cache->get(realpath($this->models . '/endpoints.json')));
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