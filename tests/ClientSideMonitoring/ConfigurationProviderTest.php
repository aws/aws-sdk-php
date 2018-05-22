<?php

namespace Aws\ClientSideMonitoring;

use Aws\LruArrayCache;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;


/**
 * @covers \Aws\ClientSideMonitoring\ConfigurationProvider
 */
class ConfigurationProviderTest extends TestCase
{
    /**
     * Reset relevant environment variables & create temporary .aws directory
     *
     * @return string
     */
    private function clearEnv()
    {
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

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        $expected = new Configuration(true, 555, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=555');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromEnvironmentVariablesEmptyString()
    {
        $this->clearEnv();
        $expected = new Configuration(true, 555, '');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=555');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '');
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->clearEnv();
        $expected  = new Configuration(true, 555, 'IniApp');
        $iniFile = <<<EOT
[aws_csm]
csm_enabled = true
csm_port = 555
csm_clientid = IniApp
EOT;

        file_put_contents($dir . '/config', $iniFile);
        putenv('HOME=' . dirname($dir));
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromIniFileWithSpecifiedProfile()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(false, 777, 'CustomApp');
        $iniFile = <<<EOT
[aws_csm]
csm_enabled = true
csm_port = 555
csm_clientid = DefaultApp
[custom]
csm_enabled = false
csm_port = 777
csm_clientid = CustomApp
EOT;

        file_put_contents($dir . '/config', $iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');
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
    
    public function testUsesClassDefaultOptions()
    {
        $this->clearEnv();
        $expected = new Configuration(
            ConfigurationProvider::DEFAULT_ENABLED,
            ConfigurationProvider::DEFAULT_PORT,
            ConfigurationProvider::DEFAULT_CLIENT_ID
        );
        $provider = ConfigurationProvider::defaultProvider();
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
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
        $dir = $this->clearEnv();
        $expected = new Configuration(false, 777, 'CustomApp');
        $iniFile = <<<EOT
[aws_csm]
csm_enabled = true
csm_port = 555
csm_clientid = DefaultApp
[custom]
csm_enabled = false
csm_port = 777
csm_clientid = CustomApp
EOT;
        file_put_contents($dir . '/config', $iniFile);
        putenv('HOME=' . dirname($dir));
        $a = ConfigurationProvider::ini('custom');
        $b = ConfigurationProvider::ini();
        $c = function () { $this->fail('Should not have called'); };
        $provider = ConfigurationProvider::chain($a, $b, $c);
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testSelectsEnvironmentOverIniConfiguration()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration(true, 888, 'EnvApp');
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=888');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        $iniFile = <<<EOT
[aws_csm]
csm_enabled = true
csm_port = 555
csm_clientid = DefaultIniApp
[custom]
csm_enabled = false
csm_port = 777
csm_clientid = CustomIniApp
EOT;

        file_put_contents($dir . '/config', $iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
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
