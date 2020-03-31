<?php
namespace Aws\Test\Retry;

use Aws\LruArrayCache;
use Aws\Retry\Configuration;
use Aws\Retry\ConfigurationInterface;
use Aws\Retry\ConfigurationProvider;
use Aws\Retry\Exception\ConfigurationException;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Retry\ConfigurationProvider
 */
class ConfigurationProviderTest extends TestCase
{
    private static $originalEnv;

    private $iniFile = <<<EOT
[custom]
max_attempts = 5
retry_mode = adaptive
[default]
max_attempts = 10
retry_mode = standard
EOT;

    private $altIniFile = <<<EOT
[custom]
max_attempts = 15
retry_mode = legacy
[default]
max_attempts = 20
retry_mode = adaptive
EOT;

    public static function setUpBeforeClass()
    {
        self::$originalEnv = [
            'max_attempts' => getenv(ConfigurationProvider::ENV_MAX_ATTEMPTS) ?: '',
            'mode' => getenv(ConfigurationProvider::ENV_MODE) ?: '',
            'home' => getenv('HOME') ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
        ];
    }

    private function clearEnv()
    {
        putenv(ConfigurationProvider::ENV_MODE . '=');
        putenv(ConfigurationProvider::ENV_MAX_ATTEMPTS . '=');
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=');

        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public static function tearDownAfterClass()
    {
        putenv(ConfigurationProvider::ENV_MAX_ATTEMPTS . '=' .
            self::$originalEnv['max_attempts']);
        putenv(ConfigurationProvider::ENV_MODE . '=' .
            self::$originalEnv['mode']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
        putenv('HOME=' . self::$originalEnv['home']);
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        $expected = new Configuration('standard', 17);
        putenv(ConfigurationProvider::ENV_MODE . '=standard');
        putenv(ConfigurationProvider::ENV_MAX_ATTEMPTS . '=17');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testRejectsOnNoEnvironmentVars()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_MODE);
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
        $expected  = new Configuration('legacy', 3);
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->clearEnv();
        $expected  = new Configuration('standard', 10);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini(null, null))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromIniFileWithDifferentDefaultFilename()
    {
        $dir = $this->clearEnv();
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=' . $dir . "/alt_config");
        $expected  = new Configuration('adaptive', 20);
        file_put_contents($dir . '/config', $this->iniFile);
        file_put_contents($dir . '/alt_config', $this->altIniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini(null, null))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
        unlink($dir . '/alt_config');
    }

    public function testCreatesFromIniFileWithSpecifiedProfile()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration('adaptive', 5);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    /**
     * @expectedException \Aws\Retry\Exception\ConfigurationException
     */
    public function testEnsuresIniFileExists()
    {
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(ConfigurationProvider::ini())->wait();
    }

    /**
     * @expectedException \Aws\Retry\Exception\ConfigurationException
     */
    public function testEnsuresProfileIsNotEmpty()
    {
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

    /**
     * @expectedException \Aws\Retry\Exception\ConfigurationException
     * @expectedExceptionMessage 'foo' not found in
     */
    public function testEnsuresFileIsNotEmpty()
    {
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

    /**
     * @expectedException \Aws\Retry\Exception\ConfigurationException
     * @expectedExceptionMessage Invalid config file:
     */
    public function testEnsuresIniFileIsValid()
    {
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
            ConfigurationProvider::DEFAULT_MODE,
            ConfigurationProvider::DEFAULT_MAX_ATTEMPTS
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
        $ref = new \ReflectionClass('Aws\S3\UseArnRegion\ConfigurationProvider');
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertEquals('C:\\My\\Home', $meth->invoke(null));
    }

    public function testMemoizes()
    {
        $called = 0;
        $expected = new Configuration('adaptive', 16);
        $f = function () use (&$called, $expected) {
            $called++;
            return Promise\promise_for($expected);
        };
        $p = ConfigurationProvider::memoize($f);
        $this->assertSame($expected, $p()->wait());
        $this->assertEquals(1, $called);
        $this->assertSame($expected, $p()->wait());
        $this->assertEquals(1, $called);
    }

    public function testChainsConfiguration()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration('adaptive', 5);
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
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testChainThrowsExceptionOnEmptyArgs()
    {
        ConfigurationProvider::chain();
    }

    public function testSelectsEnvironmentOverIniConfiguration()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration('adaptive', 98);
        putenv(ConfigurationProvider::ENV_MODE . '=adaptive');
        putenv(ConfigurationProvider::ENV_MAX_ATTEMPTS . '=98');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testsPersistsToCache()
    {
        $cache = new LruArrayCache();
        $expected = new Configuration('standard', 13);

        $timesCalled = 0;
        $volatileProvider = function () use ($expected, &$timesCalled) {
            if (0 === $timesCalled) {
                ++$timesCalled;
                return Promise\promise_for($expected);
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

        $this->assertEquals(1, $timesCalled);
        $this->assertCount(1, $cache);
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromCache()
    {
        $expected = new Configuration('adaptive', 54);
        $cacheBuilder = $this->getMockBuilder('Aws\CacheInterface');
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::$cacheKey)
            ->willReturn($expected);

        $provider = ConfigurationProvider::defaultProvider(['retries' => $cache]);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $result);
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function getSuccessfulUnwrapData()
    {
        $expected = new Configuration('standard', 30);
        return [
            [
                function () use ($expected) {
                    return $expected;
                },
                $expected
            ],
            [
                Promise\promise_for($expected),
                $expected
            ],
            [
                $expected,
                $expected
            ],
            [
                [
                    'mode' => 'standard',
                    'max_attempts' => 30
                ],
                $expected
            ],
            [
                [
                    'mode' => 'standard',
                ],
                new Configuration('standard', 3)
            ],
            [
                15,
                new Configuration('legacy', 16)
            ],
        ];
    }

    /**
     * @dataProvider getSuccessfulUnwrapData
     * @param $toUnwrap
     * @param ConfigurationInterface $expected
     */
    public function testSuccessfulUnwraps($toUnwrap, ConfigurationInterface $expected)
    {
        $this->assertSame(
            $expected->toArray(),
            ConfigurationProvider::unwrap($toUnwrap)->toArray()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Not a valid retry configuration argument
     */
    public function testThrowsForInvalidUnwrapArgument()
    {
        ConfigurationProvider::unwrap('some_string');
    }
}
