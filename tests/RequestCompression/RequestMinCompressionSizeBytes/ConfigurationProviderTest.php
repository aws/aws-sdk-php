<?php
namespace Aws\Test\RequestCompression\RequestMinCompressionSizeBytes;

use Aws\LruArrayCache;
use Aws\RequestCompression\RequestMinCompressionSizeBytes\Configuration;
use Aws\RequestCompression\RequestMinCompressionSizeBytes\ConfigurationInterface;
use Aws\RequestCompression\RequestMinCompressionSizeBytes\ConfigurationProvider;
use Aws\RequestCompression\Exception\ConfigurationException;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\RequestCompression\RequestMinCompressionSizeBytes\ConfigurationProvider;
 */
class ConfigurationProviderTest extends TestCase
{
    private static $originalEnv;

    private $iniFile = <<<EOT
[custom]
request_min_compression_size_bytes = 5
[default]
request_min_compression_size_bytes = 10
EOT;

    private $altIniFile = <<<EOT
[custom]
request_min_compression_size_bytes = 15
[default]
request_min_compression_size_bytes = 20
EOT;

    public static function set_up_before_class()
    {
        self::$originalEnv = [
            'request_min_compression_size_bytes' => getenv(ConfigurationProvider::ENV_MIN_COMPRESSION_SIZE_BYTES) ?: '',
            'home' => getenv('HOME') ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
            'config_file' => getenv(ConfigurationProvider::ENV_CONFIG_FILE) ?: '',
        ];
    }

    private function clearEnv()
    {
        putenv(ConfigurationProvider::ENV_MIN_COMPRESSION_SIZE_BYTES . '=');
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=');
        putenv(ConfigurationProvider::ENV_PROFILE . '=');

        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public static function tear_down_after_class()
    {
        putenv(ConfigurationProvider::ENV_MIN_COMPRESSION_SIZE_BYTES . '=' .
            self::$originalEnv['request_min_compression_size_bytes']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=' .
            self::$originalEnv['config_file']);
        putenv('HOME=' . self::$originalEnv['home']);
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        $expected = new Configuration(17);
        putenv(ConfigurationProvider::ENV_MIN_COMPRESSION_SIZE_BYTES . '=17');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
    }

    public function testRejectsOnNoEnvironmentVars()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_MIN_COMPRESSION_SIZE_BYTES);
        $promise = call_user_func(ConfigurationProvider::env())->then(
            function () {
                $this->fail('Should have received a rejection.');
            },
            function (ConfigurationException $e) {
                $this->assertStringStartsWith(
                    'Could not find environment variable config',
                    $e->getMessage()
                );
            }
        );
        $promise->wait();
    }

    public function testCreatesDefaultFromFallback()
    {
        $this->clearEnv();
        $expected = new Configuration(10240);
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(10);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini(null, null))->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testUsesIniWithUseAwsConfigFileTrue()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(10);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(
            ConfigurationProvider::defaultProvider(['use_aws_shared_config_files' => true])
        )->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testIgnoresIniWithUseAwsConfigFileFalse()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(10240);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname("garbageDirectory"));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(
            ConfigurationProvider::defaultProvider(['use_aws_shared_config_files' => false])
        )->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromIniFileWithDifferentDefaultFilename()
    {
        $dir = $this->clearEnv();
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=' . $dir . "/alt_config");
        $expected = new Configuration(20);
        file_put_contents($dir . '/config', $this->iniFile);
        file_put_contents($dir . '/alt_config', $this->altIniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini(null, null))->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
        unlink($dir . '/alt_config');
    }

    public function testCreatesFromIniFileWithSpecifiedProfile()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(5);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testEnsuresIniFileExists()
    {
        $this->expectException(ConfigurationException::class);
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(ConfigurationProvider::ini())->wait();
    }

    public function testEnsuresProfileIsNotEmpty()
    {
        $this->expectException(ConfigurationException::class);
        $dir = $this->clearEnv();
        $ini = "[custom]";
        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(ConfigurationProvider::ini('custom'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
    }

    public function testEnsuresFileIsNotEmpty()
    {
        $this->expectExceptionMessage("'foo' not found in");
        $this->expectException(ConfigurationException::class);
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', '');
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(ConfigurationProvider::ini('foo'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
    }

    public function testEnsuresIniFileIsValid()
    {
        $this->expectExceptionMessage("Invalid config file:");
        $this->expectException(ConfigurationException::class);
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', "wef \n=\nwef");
        putenv('HOME=' . dirname($dir));

        try {
            @call_user_func(ConfigurationProvider::ini())->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
    }

    public function testUsesClassDefaultOptions()
    {
        $this->clearEnv();
        $expected = new Configuration(
            ConfigurationProvider::DEFAULT_MIN_COMPRESSION_SIZE_BYTES
        );
        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\My\\Home');
        $ref = new \ReflectionClass(
            'Aws\RequestCompression\RequestMinCompressionSizeBytes\ConfigurationProvider'
        );
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertSame('C:\\My\\Home', $meth->invoke(null));
    }

    public function testMemoizes()
    {
        $called = 0;
        $expected = new Configuration(16);
        $f = function () use (&$called, $expected) {
            $called++;
            return Promise\Create::promiseFor($expected);
        };
        $p = ConfigurationProvider::memoize($f);
        $this->assertSame($expected, $p()->wait());
        $this->assertSame(1, $called);
        $this->assertSame($expected, $p()->wait());
        $this->assertSame(1, $called);
    }

    public function testChainsConfiguration()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(5);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        $a = ConfigurationProvider::ini('custom', null);
        $b = ConfigurationProvider::ini();
        $c = function () {
            $this->fail('Should not have called');
        };
        $provider = ConfigurationProvider::chain($a, $b, $c);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testChainThrowsExceptionOnEmptyArgs()
    {
        $this->expectException(\InvalidArgumentException::class);
        ConfigurationProvider::chain();
    }

    public function testSelectsEnvironmentOverIniConfiguration()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(98);
        putenv(ConfigurationProvider::ENV_MIN_COMPRESSION_SIZE_BYTES . '=98');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testsPersistsToCache()
    {
        $cache = new LruArrayCache();
        $expected = new Configuration(13);

        $timesCalled = 0;
        $volatileProvider = function () use ($expected, &$timesCalled) {
            if (0 === $timesCalled) {
                ++$timesCalled;
                return Promise\Create::promiseFor($expected);
            }

            throw new \BadFunctionCallException('I was called too many times!');
        };

        for ($i = 0; $i < 10; $i++) {
            /** @var ConfigurationInterface $result */
            $result = call_user_func(
                ConfigurationProvider::cache($volatileProvider, $cache)
            )
                ->wait();
        }

        $this->assertSame(1, $timesCalled);
        $this->assertCount(1, $cache);
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromCache()
    {
        $expected = new Configuration(10240);
        $cacheBuilder = $this->getMockBuilder('Aws\CacheInterface');
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::$cacheKey)
            ->willReturn($expected);

        $provider = ConfigurationProvider::defaultProvider([
            'request_min_compression_size_bytes' => $cache
        ]);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $result);
        $this->assertSame($expected->toArray(), $result->toArray());
    }
}