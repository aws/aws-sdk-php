<?php
namespace Aws\Test;

use Aws\Credentials\Credentials;
use Aws\FileCache;

/**
 * @covers Aws\FileCache
 */
class FileCacheTest extends \PHPUnit_Framework_TestCase
{
    private $cacheDir;

    public function setUp()
    {
        $this->cacheDir = getenv(FileCache::CACHE_ENV);
        putenv(FileCache::CACHE_ENV . '=' . $this->getCacheTestDir());
    }

    public function tearDown()
    {
        $this->rmrf($this->getCacheTestDir());

        putenv(FileCache::CACHE_ENV . "={$this->cacheDir}");
    }

    public function testSetRemoveAndRetrieve()
    {
        $c = new FileCache($this->getCacheTestDir());
        $c->set('foo', 'baz');
        $this->assertSame('baz', $c->get('foo'));
        $this->assertSame('baz', $c->get('foo'));
        $c->remove('foo');
        $this->assertNull($c->get('foo'));
    }

    public function testReset()
    {
        $c = new FileCache($this->getCacheTestDir());
        $c->set('foo', 'bar');
        $this->assertSame('bar', $c->get('foo'));
        $c->set('foo', 'baz');
        $this->assertSame('baz', $c->get('foo'));
    }

    public function testSetAndGetShouldPersistObjects()
    {
        $c = new FileCache($this->getCacheTestDir());
        $className = 'TestClass' . time();
        $klass = <<<EOC
class $className {
    private \$foo;

    public function __construct(\$foo)
    {
        \$this->foo = \$foo;
    }

    public static function __set_state(array \$state)
    {
        return new self(\$state['foo']);
    }

    public function getFoo()
    {
        return \$this->foo;
    }
}
EOC;
        eval($klass);
        $c->set('baz', new $className('bar'));
        $this->assertInstanceOf($className, $c->get('baz'));
        $this->assertSame('bar', $c->get('baz')->getFoo());
    }

    public function testCreatesDirectoryBeloningToUser()
    {
        if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
            $this->markTestSkipped('Behavior not necessary on Windows');
        }

        $myUserName = posix_getpwuid(posix_geteuid())['name'];
        $expectedCacheDir = $this->getCacheTestDir() . "/$myUserName";
        $c = new FileCache($this->getCacheTestDir());
        $c->set('foo', 'bar');

        $this->assertFileExists($expectedCacheDir);
        $this->assertTrue(is_dir($expectedCacheDir));
        $this->assertEquals(posix_geteuid(), fileowner($expectedCacheDir));
        $this->assertEquals(0700, fileperms($expectedCacheDir) & 0777);
    }


    private function getCacheTestDir()
    {
        return sys_get_temp_dir() . '/aws_file_cache_test_dir';
    }

    private function rmrf($path)
    {
        if (is_dir($path)) {
            foreach(glob($path . DIRECTORY_SEPARATOR . '*') as $file) {
                $this->rmrf($file);
            }
            rmdir($path);
        } else {
            unlink($path);
        }
    }
}
