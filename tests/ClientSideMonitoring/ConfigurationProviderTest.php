<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\ClientSideMonitoring\Configuration;
use Aws\ClientSideMonitoring\ConfigurationProvider;
use Aws\LruArrayCache;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;


/**
 * @covers \Aws\ClientSideMonitoring\ConfigurationProvider
 */
class ConfigurationProviderTest extends TestCase
{
    private $originalEnv;

    private $iniFile = <<<EOT
[aws_csm]
csm_enabled = true
csm_port = 555
csm_clientid = DefaultIniApp
[custom]
csm_enabled = false
csm_port = 777
csm_clientid = CustomIniApp
EOT;


    /**
     * Saves original environment variables, then clears them
     * Creates temporary aws config directory
     *
     * @return string
     */
    private function prepEnv()
    {
        if (!isset($this->originalEnv)) {
            $this->originalEnv = [
                'enabled' => getenv(ConfigurationProvider::ENV_ENABLED) ?: '',
                'port' => getenv(ConfigurationProvider::ENV_PORT) ?: '',
                'client_id' => getenv(ConfigurationProvider::ENV_CLIENT_ID) ?: '',
                'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
            ];
        }

        putenv(ConfigurationProvider::ENV_ENABLED . '=');
        putenv(ConfigurationProvider::ENV_PORT . '=');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=');
        putenv(ConfigurationProvider::ENV_PROFILE . '=');

        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    /**
     * Restores environment variables to what they were originally
     */
    private function restoreEnv()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=' .
            $this->originalEnv['enabled']);
        putenv(ConfigurationProvider::ENV_PORT . '=' .
            $this->originalEnv['port']);
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=' .
            $this->originalEnv['client_id']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            $this->originalEnv['profile']);
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->prepEnv();
        $expected = new Configuration(true, 555, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=555');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        $this->restoreEnv();
    }

    public function testCreatesFromEnvironmentVariablesEmptyString()
    {
        $this->prepEnv();
        $expected = new Configuration(true, 555, '');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=555');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '');
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        $this->restoreEnv();
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->prepEnv();
        $expected  = new Configuration(true, 555, 'DefaultIniApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
        $this->restoreEnv();
    }

    public function testCreatesFromIniFileWithSpecifiedProfile()
    {
        $dir = $this->prepEnv();
        $expected = new Configuration(false, 777, 'CustomIniApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
        $this->restoreEnv();
    }

    /**
     * @expectedException \Aws\ClientSideMonitoring\Exception\ConfigurationException
     */
    public function testEnsuresIniFileExists()
    {
        $this->prepEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(ConfigurationProvider::ini())->wait();
        $this->restoreEnv();
    }

    /**
     * @expectedException \Aws\ClientSideMonitoring\Exception\ConfigurationException
     */
    public function testEnsuresProfileIsNotEmpty()
    {
        $dir = $this->prepEnv();
        $ini = "[aws_csm]";
        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(ConfigurationProvider::ini('aws_csm'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
        $this->restoreEnv();
    }

    /**
     * @expectedException \Aws\ClientSideMonitoring\Exception\ConfigurationException
     * @expectedExceptionMessage 'foo' not found in
     */
    public function testEnsuresFileIsNotEmpty()
    {
        $dir = $this->prepEnv();
        file_put_contents($dir . '/config', '');
        putenv('HOME=' . dirname($dir));

        try {
            call_user_func(ConfigurationProvider::ini('foo'))->wait();
        } catch (\Exception $e) {
            unlink($dir . '/config');
            throw $e;
        }
        $this->restoreEnv();
    }
    
    public function testUsesClassDefaultOptions()
    {
        $this->prepEnv();
        $expected = new Configuration(
            ConfigurationProvider::DEFAULT_ENABLED,
            ConfigurationProvider::DEFAULT_PORT,
            ConfigurationProvider::DEFAULT_CLIENT_ID
        );
        $provider = ConfigurationProvider::defaultProvider();
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        $this->restoreEnv();
    }

    public function testMemoizes()
    {
        $called = 0;
        $expected = new Configuration(true, 555, 'FooApp');
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
        $dir = $this->prepEnv();
        $expected = new Configuration(false, 777, 'CustomIniApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        $a = ConfigurationProvider::ini('custom');
        $b = ConfigurationProvider::ini();
        $c = function () { $this->fail('Should not have called'); };
        $provider = ConfigurationProvider::chain($a, $b, $c);
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        $this->restoreEnv();
    }

    public function testSelectsEnvironmentOverIniConfiguration()
    {
        $dir = $this->prepEnv();
        $expected = new Configuration(true, 888, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=888');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        $this->restoreEnv();
    }

    public function testSelectsEnvironmentVariablesWithDisabled()
    {
        $dir = $this->prepEnv();
        $expected = new Configuration(false, 888, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=false');
        putenv(ConfigurationProvider::ENV_PORT . '=888');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        $this->restoreEnv();
    }

    public function testsPersistsToCache()
    {
        $cache = new LruArrayCache();
        $expected = new Configuration(true, 555, 'FooApp');

        $timesCalled = 0;
        $volatileProvider = function () use ($expected, &$timesCalled) {
            if (0 === $timesCalled) {
                ++$timesCalled;
                return Promise\promise_for($expected);
            }

            throw new \BadFunctionCallException('I was called too many times!');
        };

        for ($i = 0; $i < 10; $i++) {
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
        $expected = new Configuration(true, 555, 'FooApp');
        $cacheBuilder = $this->getMockBuilder('Aws\CacheInterface');
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::CACHE_KEY)
            ->willReturn($expected);

        $provider = ConfigurationProvider::defaultProvider(['csm' => $cache]);
        $result = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $result);
        $this->assertSame($expected->toArray(), $result->toArray());
    }

}
