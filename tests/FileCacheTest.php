<?php
namespace Aws\Test;

use Aws\Credentials\Credentials;
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
        $rmrf = function ($path) use (&$rmrf) {
            foreach(glob($path . DIRECTORY_SEPARATOR . '*') as $file) {
                if (is_dir($file)) {
                    $rmrf($file);
                    rmdir($file);
                } else {
                    unlink($file);
                }
            }
        };
        $rmrf($this->getCacheTestDir());
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

    public function testSetAndGetShouldPersistObjects()
    {
        $c = new FileCache;
        $c->set('creds', new Credentials('foo', 'bar', 'baz', PHP_INT_MAX));
        $this->assertInstanceOf(Credentials::class, $c->get('creds'));
    }


    private function getCacheTestDir()
    {
        return sys_get_temp_dir() . '/aws_file_cache_test_dir';
    }
}
