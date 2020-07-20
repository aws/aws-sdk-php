<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\ClientSideMonitoring\Configuration;
use Aws\ClientSideMonitoring\ConfigurationInterface;
use Aws\ClientSideMonitoring\ConfigurationProvider;
use Aws\ClientSideMonitoring\Exception\ConfigurationException;
use Aws\LruArrayCache;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;


/**
 * @covers \Aws\ClientSideMonitoring\ConfigurationProvider
 */
class ConfigurationProviderTest extends TestCase
{
    private static $originalEnv;

    private $iniFile = <<<EOT
[aws_csm]
csm_enabled = true
csm_host = 123.4.5.6
csm_port = 555
csm_client_id = DefaultIniApp
[custom]
csm_enabled = false
csm_host = 192.168.0.1
csm_port = 777
csm_client_id = CustomIniApp
[enabled]
csm_enabled = true
EOT;

    private $altIniFile = <<<EOT
[aws_csm]
csm_enabled = false
csm_host = 987.6.5.4
csm_port = 888
csm_client_id = AltIniApp
[custom]
csm_enabled = true
csm_host = 192.168.5.5
csm_port = 999
csm_client_id = CustomAltIniApp
EOT;

    public static function setUpBeforeClass()
    {
        self::$originalEnv = [
            'enabled' => getenv(ConfigurationProvider::ENV_ENABLED) ?: '',
            'host' => getenv(ConfigurationProvider::ENV_HOST) ?: '',
            'port' => getenv(ConfigurationProvider::ENV_PORT) ?: '',
            'client_id' => getenv(ConfigurationProvider::ENV_CLIENT_ID) ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
        ];
    }

    private function clearEnv()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=');
        putenv(ConfigurationProvider::ENV_HOST . '=');
        putenv(ConfigurationProvider::ENV_PORT . '=');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=');
        putenv(ConfigurationProvider::ENV_PROFILE . '=');
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
        putenv(ConfigurationProvider::ENV_HOST . '=' .
            self::$originalEnv['host']);
        putenv(ConfigurationProvider::ENV_PORT . '=' .
            self::$originalEnv['port']);
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=' .
            self::$originalEnv['client_id']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        $expected = new Configuration(true, '123.4.5.6', 555, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_HOST . '=123.4.5.6');
        putenv(ConfigurationProvider::ENV_PORT . '=555');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromEnvironmentVariablesEmptyString()
    {
        $this->clearEnv();
        $expected = new Configuration(true, '123.4.5.6', 555, '');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_HOST . '=123.4.5.6');
        putenv(ConfigurationProvider::ENV_PORT . '=555');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '');
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testRejectsOnNoEnvironmentVars()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_ENABLED);
        putenv(ConfigurationProvider::ENV_HOST);
        putenv(ConfigurationProvider::ENV_PORT);
        putenv(ConfigurationProvider::ENV_CLIENT_ID);
        $promise = call_user_func(ConfigurationProvider::env())->then(
            function() {
                $this->fail('Should have received a rejection.');
            },
            function(ConfigurationException $e) {
                $this->assertStringStartsWith(
                    'Could not find environment variable CSM config',
                    $e->getMessage()
                );
            }
        );
        $promise->wait();
    }

    public function testCreatesDefaultFromFallback()
    {
        $this->clearEnv();
        $expected  = new Configuration(false, '127.0.0.1', 31000, '');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testUsesIniWithUseAwsConfigFileTrue()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(true, '123.4.5.6', 555, 'DefaultIniApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv(ConfigurationProvider::ENV_ENABLED);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(
            ConfigurationProvider::defaultProvider(['use_aws_shared_config_files' => true])
        )->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testIgnoresIniWithUseAwsConfigFileFalse()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(
            false,
            ConfigurationProvider::DEFAULT_HOST,
            ConfigurationProvider::DEFAULT_PORT,
            ''
        );
        file_put_contents($dir . '/config', $this->altIniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(
            ConfigurationProvider::defaultProvider(['use_aws_shared_config_files' => false])
        )->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->clearEnv();
        $expected  = new Configuration(true, '123.4.5.6', 555, 'DefaultIniApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromIniFileWithDifferentDefaultFilename()
    {
        $dir = $this->clearEnv();
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=' . $dir . "/alt_config");
        $expected  = new Configuration(false, '987.6.5.4', 888, 'AltIniApp');
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
        $expected = new Configuration(false, '192.168.0.1', 777, 'CustomIniApp');
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
        $expected = new Configuration(
            true,
            ConfigurationProvider::DEFAULT_HOST,
            ConfigurationProvider::DEFAULT_PORT,
            ''
        );
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=enabled');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    /**
     * @expectedException \Aws\ClientSideMonitoring\Exception\ConfigurationException
     */
    public function testEnsuresIniFileExists()
    {
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(ConfigurationProvider::ini())->wait();
    }

    /**
     * @expectedException \Aws\ClientSideMonitoring\Exception\ConfigurationException
     */
    public function testEnsuresProfileIsNotEmpty()
    {
        $dir = $this->clearEnv();
        $ini = "[aws_csm]";
        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(ConfigurationProvider::ini('aws_csm'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
    }

    /**
     * @expectedException \Aws\ClientSideMonitoring\Exception\ConfigurationException
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
     * @expectedException \Aws\ClientSideMonitoring\Exception\ConfigurationException
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
            ConfigurationProvider::DEFAULT_HOST,
            ConfigurationProvider::DEFAULT_PORT,
            ConfigurationProvider::DEFAULT_CLIENT_ID
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
        $ref = new \ReflectionClass('Aws\ClientSideMonitoring\ConfigurationProvider');
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertEquals('C:\\Michael\\Home', $meth->invoke(null));
    }

    public function testMemoizes()
    {
        $called = 0;
        $expected = new Configuration(true, '123.4.5.6', 555, 'FooApp');
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
        $expected = new Configuration(false, '192.168.0.1', 777, 'CustomIniApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        $a = ConfigurationProvider::ini('custom');
        $b = ConfigurationProvider::ini();
        $c = function () { $this->fail('Should not have called'); };
        $provider = ConfigurationProvider::chain($a, $b, $c);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testSelectsEnvironmentOverIniConfiguration()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(true, '10.0.0.1', 888, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_HOST . '=10.0.0.1');
        putenv(ConfigurationProvider::ENV_PORT . '=888');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testSelectsEnvironmentVariablesWithDisabled()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(false, '10.0.0.1', 888, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=false');
        putenv(ConfigurationProvider::ENV_HOST . '=10.0.0.1');
        putenv(ConfigurationProvider::ENV_PORT . '=888');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testsPersistsToCache()
    {
        $cache = new LruArrayCache();
        $expected = new Configuration(true, '123.4.5.6', 555, 'FooApp');

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
        $expected = new Configuration(true, '123.4.5.6', 555, 'FooApp');
        $cacheBuilder = $this->getMockBuilder('Aws\CacheInterface');
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::$cacheKey)
            ->willReturn($expected);

        $provider = ConfigurationProvider::defaultProvider(['csm' => $cache]);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $result);
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function getSuccessfulUnwrapData()
    {
        $expected = new Configuration(true, '123.4.5.6', 555, 'FooApp');
        return [
            [
                function() use ($expected) {
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
                    'host' => '123.4.5.6',
                    'port' => 555,
                    'client_id' => 'FooApp'
                ],
                $expected
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
     * @expectedExceptionMessage Not a valid CSM configuration argument.
     */
    public function testInvalidConfigurationUnwrap()
    {
        ConfigurationProvider::unwrap([]);
    }
}
