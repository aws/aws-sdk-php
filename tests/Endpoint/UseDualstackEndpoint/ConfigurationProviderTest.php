<?php
namespace Aws\Test\Endpoint\UseDualstackEndpoint;


use Aws\CacheInterface;
use Aws\LruArrayCache;
use Aws\Endpoint\UseDualstackEndpoint\ConfigurationProvider;
use Aws\Endpoint\UseDualstackEndpoint\Configuration;
use Aws\Endpoint\UseDualstackEndpoint\ConfigurationInterface;
use Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Endpoint\UseDualstackEndpoint\ConfigurationProvider
 */
class ConfigurationProviderTest extends TestCase
{
    private static $originalEnv;

    private $iniFile = <<<EOT
[custom]
use_dualstack_endpoint = true
[default]
use_dualstack_endpoint = false
EOT;

    private $altIniFile = <<<EOT
[custom]
use_dualstack_endpoint = false
[default]
use_dualstack_endpoint = true
EOT;

    public static function set_up_before_class()
    {
        self::$originalEnv = [
            'use_dualstack_endpoint' => getenv(ConfigurationProvider::ENV_USE_DUAL_STACK_ENDPOINT) ?: '',
            'home' => getenv('HOME') ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
            'config_file' => getenv(ConfigurationProvider::ENV_CONFIG_FILE) ?: '',
        ];
    }

    private function clearEnv()
    {
        putenv(ConfigurationProvider::ENV_USE_DUAL_STACK_ENDPOINT . '=');
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
        putenv(ConfigurationProvider::ENV_USE_DUAL_STACK_ENDPOINT . '=' .
            self::$originalEnv['use_dualstack_endpoint']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=' .
            self::$originalEnv['config_file']);
        putenv('HOME=' . self::$originalEnv['home']);
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_USE_DUAL_STACK_ENDPOINT . '=true');
        $expected = new Configuration(true, "us-east-1");
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::defaultProvider(['region' => 'us-east-1']))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testRejectsOnNoEnvironmentVars()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_USE_DUAL_STACK_ENDPOINT);
        $promise = call_user_func(ConfigurationProvider::env('us-east-1'))->then(
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
        $expected  = new Configuration(false, "us-east-1");
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback("us-east-1"))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testUsesIniWithUseAwsConfigFileTrue()
    {
        $dir = $this->clearEnv();
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=' . $dir . "/alt_config");
        $expected = new Configuration(true, "us-east-1");
        file_put_contents($dir . '/alt_config', $this->altIniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(
            ConfigurationProvider::defaultProvider(['use_aws_shared_config_files' => true, 'region' => 'us-east-1'])
        )->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/alt_config');
    }

    public function testIgnoresIniWithUseAwsConfigFileFalse()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(false, "us-east-1");
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(
            ConfigurationProvider::defaultProvider(['use_aws_shared_config_files' => false, 'region' => 'us-east-1'])
        )->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->clearEnv();
        $expected  = new Configuration(false, "us-east-1");
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
        $expected  = new Configuration(true, "us-east-1");
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
        $expected = new Configuration(true, "us-east-1");
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini('us-east-1`'))->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testEnsuresIniFileExists()
    {
        $this->expectException(\Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException::class);
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(ConfigurationProvider::ini('us-east-1'))->wait();
    }

    public function testEnsuresProfileIsNotEmpty()
    {
        $this->expectException(\Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException::class);
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
        $this->expectException(\Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException::class);
        $this->expectExceptionMessage("'foo' not found in");
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', '');
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(ConfigurationProvider::ini('us-east-1', 'foo'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
    }

    public function testEnsuresIniFileIsValid()
    {
        $this->expectException(\Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException::class);
        $this->expectExceptionMessage("Invalid config file:");
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', "wef \n=\nwef");
        putenv('HOME=' . dirname($dir));

        try {
            @call_user_func(ConfigurationProvider::ini('us-east-1'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
    }

    public function testUsesClassDefaultOptions()
    {
        $this->clearEnv();
        $expected = new Configuration(
            false,
            "us-east-1"
        );
        $provider = ConfigurationProvider::defaultProvider(['region' => 'us-east-1']);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\My\\Home');
        $ref = new \ReflectionClass(ConfigurationProvider::class);
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertSame('C:\\My\\Home', $meth->invoke(null));
    }

    public function testMemoizes()
    {
        $called = 0;
        $expected = new Configuration(true, "us-east-1");
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
        $expected = new Configuration(true, "us-east-1");
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        $a = ConfigurationProvider::ini('us-east-1', 'custom', null);
        $b = ConfigurationProvider::ini('us-east-1');
        $c = function () {
            $this->fail('Should not have called');
        };
        $provider = ConfigurationProvider::chain($a, $b, $c);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
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
        $expected = new Configuration(false, "us-east-1");
        putenv(ConfigurationProvider::ENV_USE_DUAL_STACK_ENDPOINT . '=false');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider([ 'region' => 'us-east-1']);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testsPersistsToCache()
    {
        $cache = new LruArrayCache();
        $expected = new Configuration(true, "us-east-1");

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
        $expected = new Configuration(true, "us-east-1");
        $cacheBuilder = $this->getMockBuilder(CacheInterface::class);
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::$cacheKey)
            ->willReturn($expected);

        $provider = ConfigurationProvider::defaultProvider(['use_dual_stack_endpoint' => $cache, 'region' => 'us-east-1']);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $result);
        $this->assertSame($expected->toArray(), $result->toArray());
    }
}

