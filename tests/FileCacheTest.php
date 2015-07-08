<?php
namespace Aws\Test;
use Aws\FileCache;
use Aws\JsonCompiler;

/**
 * @covers Aws\FileCache
 */
class FileCacheTest extends \PHPUnit_Framework_TestCase
{
    private $cacheDir;

    public function setUp()
    {
        $this->cacheDir = getenv(JsonCompiler::CACHE_ENV);
        putenv(JsonCompiler::CACHE_ENV . '=' . $this->getCacheTestDir());
    }

    public function tearDown()
    {
        array_map('unlink', glob($this->getCacheTestDir() . '/**/*.*'));
        array_map('rmdir', glob($this->getCacheTestDir() . '/**/*'));
        array_map('rmdir', glob($this->getCacheTestDir() . '/*'));
        rmdir($this->getCacheTestDir());
        putenv(JsonCompiler::CACHE_ENV . "={$this->cacheDir}");
    }

    public function testSetRemoveAndRetrieve()
    {
        $c = new FileCache;
        $c->set('foo', 'baz');
        $this->assertSame('baz', $c->get('foo'));
        $this->assertSame('baz', $c->get('foo'));
        $c->remove('foo');
        $this->assertNull($c->get('foo'));
    }


    private function getCacheTestDir()
    {
        return sys_get_temp_dir() . '/aws_file_cache_test_dir';
    }
}
