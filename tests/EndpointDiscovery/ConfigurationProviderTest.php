<?php

namespace Aws\Test\EndpointDiscovery;

use Aws\Api\ApiProvider;
use Aws\EndpointDiscovery\Configuration;
use Aws\EndpointDiscovery\ConfigurationInterface;
use Aws\EndpointDiscovery\ConfigurationProvider;
use Aws\EndpointDiscovery\Exception\ConfigurationException;
use Aws\LruArrayCache;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\EndpointDiscovery\ConfigurationProvider
 */
class ConfigurationProviderTest extends TestCase
{
    private static $originalEnv;

    private $iniFile = <<<EOT
[custom]
endpoint_discovery_enabled = false
[default]
endpoint_discovery_enabled = true
[disabled]
endpoint_discovery_enabled = false
EOT;

    private $altIniFile = <<<EOT
[custom]
endpoint_discovery_enabled = true
[default]
endpoint_discovery_enabled = false
EOT;

    public static function setUpBeforeClass()
    {
        self::$originalEnv = [
            'enabled' => getenv(ConfigurationProvider::ENV_ENABLED) ?: '',
            'enabled_alt' => getenv(ConfigurationProvider::ENV_ENABLED_ALT) ?: '',
            'home' => getenv('HOME') ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
        ];
    }

    private function clearEnv()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=');
        putenv(ConfigurationProvider::ENV_ENABLED_ALT . '=');
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=');

        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public static function tearDownAfterClass()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=' .
            self::$originalEnv['enabled']);
        putenv(ConfigurationProvider::ENV_ENABLED_ALT . '=' .
            self::$originalEnv['enabled_alt']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
        putenv('HOME=' . self::$originalEnv['home']);
    }

    /**
     * @dataProvider getEnvVariableNames
     * @param $envName
     */
    public function testCreatesFromEnvironmentVariables($envName)
    {
        $this->clearEnv();
        $expected = new Configuration(true, 2000);
        putenv($envName . '=true');
        $result = call_user_func(ConfigurationProvider::env(2000))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function getEnvVariableNames()
    {
        return [
            [ConfigurationProvider::ENV_ENABLED],
            [ConfigurationProvider::ENV_ENABLED_ALT],
        ];
    }

    public function testRejectsOnNoEnvironmentVars()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_ENABLED);
        putenv(ConfigurationProvider::ENV_ENABLED_ALT);
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
        $expected  = new Configuration(false, 1000);
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesDefaultFromFallbackWithRequiredModel()
    {
        $this->clearEnv();
        $expected  = new Configuration(true, 1000);
        $config = [
            'api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures'),
            'version' => 'latest',
            'service' => 'ed_required'
        ];

        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback($config))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesDefaultFromFallbackWithOptionalModel()
    {
        $this->clearEnv();
        $expected  = new Configuration(false, 1000);
        $config = [
            'api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures'),
            'version' => 'latest',
            'service' => 'ed_optional'
        ];

        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback($config))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->clearEnv();
        $expected  = new Configuration(true, 2000);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini(null, null, 2000))->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromIniFileWithDifferentDefaultFilename()
    {
        $dir = $this->clearEnv();
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=' . $dir . "/alt_config");
        $expected  = new Configuration(false);
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
        $expected = new Configuration(false);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesWithDefaultsFromIniFileWithSpecifiedProfile()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(false);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=disabled');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    /**
     * @expectedException \Aws\EndpointDiscovery\Exception\ConfigurationException
     */
    public function testEnsuresIniFileExists()
    {
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(ConfigurationProvider::ini())->wait();
    }

    /**
     * @expectedException \Aws\EndpointDiscovery\Exception\ConfigurationException
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
     * @expectedException \Aws\EndpointDiscovery\Exception\ConfigurationException
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
     * @expectedException \Aws\EndpointDiscovery\Exception\ConfigurationException
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
            ConfigurationProvider::DEFAULT_ENABLED,
            ConfigurationProvider::DEFAULT_CACHE_LIMIT
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
        putenv('HOMEPATH=\\Michael\\Home');
        $ref = new \ReflectionClass('Aws\EndpointDiscovery\ConfigurationProvider');
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertEquals('C:\\Michael\\Home', $meth->invoke(null));
    }

    public function testMemoizes()
    {
        $called = 0;
        $expected = new Configuration(true);
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
        $expected = new Configuration(false, 2000);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        $a = ConfigurationProvider::ini('custom', null, 2000);
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
        $expected = new Configuration(true);
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testSelectsEnvironmentVariablesWithDisabled()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(false);
        putenv(ConfigurationProvider::ENV_ENABLED . '=false');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=default');

        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testsPersistsToCache()
    {
        $cache = new LruArrayCache();
        $expected = new Configuration(true, 3000);

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
        $expected = new Configuration(true, 3500);
        $cacheBuilder = $this->getMockBuilder('Aws\CacheInterface');
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::$cacheKey)
            ->willReturn($expected);

        $provider = ConfigurationProvider::defaultProvider(['endpoint_discovery' => $cache]);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $result);
        $this->assertSame($expected->toArray(), $result->toArray());
    }


    public function testUsesIniWithUseAwsConfigFileTrue()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(true, 1000);
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
        $expected = new Configuration(false, 1000);
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(
            ConfigurationProvider::defaultProvider(['use_aws_shared_config_files' => false])
        )->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function getSuccessfulUnwrapData()
    {
        $expected = new Configuration(true, 4000);
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
                    'enabled' => true,
                    'cache_limit' => 4000
                ],
                $expected
            ],
            [
                [
                    'enabled' => true,
                ],
                new Configuration(
                    true,
                    ConfigurationProvider::DEFAULT_CACHE_LIMIT
                )
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
     * @expectedExceptionMessage Not a valid endpoint_discovery configuration argument.
     */
    public function testInvalidConfigurationUnwrap()
    {
        ConfigurationProvider::unwrap([]);
    }
}
