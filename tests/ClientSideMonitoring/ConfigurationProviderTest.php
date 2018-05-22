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
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=31002');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=EnvApp');
        $config = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertEquals(true, $config->isEnabled());
        $this->assertEquals(31002, $config->getPort());
        $this->assertEquals('EnvApp', $config->getClientId());
    }

    public function testCreatesFromEnvironmentVariablesEmptyString()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_ENABLED . '=true');
        putenv(ConfigurationProvider::ENV_PORT . '=31003');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '');
        $config = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertEquals(true, $config->isEnabled());
        $this->assertEquals(31003, $config->getPort());
        $this->assertSame('', $config->getClientId());
    }

    public function testCreatesFromIniFile()
    {
        $dir = $this->clearEnv();
        $expectedConfig = new Configuration(true, 555, 'IniApp');
        $iniFile = <<<EOT
[aws_csm]
csm_enabled = true
csm_port = 555
csm_clientid = IniApp
EOT;

        file_put_contents($dir . '/config', $iniFile);
        putenv('HOME=' . dirname($dir));
        $config = call_user_func(ConfigurationProvider::ini('aws_csm'))->wait();
        $this->assertEquals($expectedConfig->toArray(), $config->toArray());
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

    public function testMemoizes()
    {
        $called = 0;
        $config = new Configuration(true, 31006, 'MemoizesApp');
        $f = function () use (&$called, $config) {
            $called++;
            return Promise\promise_for($config);
        };
        $p = ConfigurationProvider::memoize($f);
        $this->assertSame($config, $p()->wait());
        $this->assertEquals(1, $called);
        $this->assertSame($config, $p()->wait());
        $this->assertEquals(1, $called);
    }

    public function testsPersistsToCache()
    {
        $cache = new LruArrayCache();
        $config = new Configuration(true, 32000, 'PersistsApp');

        $timesCalled = 0;
        $volatileProvider = function () use ($config, &$timesCalled) {
            if (0 === $timesCalled) {
                ++$timesCalled;
                return Promise\promise_for($config);
            }

            throw new \BadFunctionCallException('I was called too many times!');
        };

        for ($i = 0; $i < 10; $i++) {
            $found= call_user_func(
                ConfigurationProvider::cache($volatileProvider, $cache)
            )
                ->wait();
        }

        $this->assertEquals(1, $timesCalled);
        $this->assertCount(1, $cache);
        $this->assertEquals($config->isEnabled(), $found->isEnabled());
        $this->assertEquals($config->getPort(), $found->getPort());
        $this->assertEquals($config->getClientId(), $found->getClientId());
    }

    public function testCreatesFromCache()
    {
        $initial = new Configuration(true, 31001, 'CreatesApp');
        $cacheBuilder = $this->getMockBuilder('Aws\CacheInterface');
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::CACHE_KEY)
            ->willReturn($initial);

        $provider = ConfigurationProvider::defaultProvider(['csm' => $cache]);
        $returned = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $returned);
        $this->assertEquals($initial->isEnabled(), $returned->isEnabled());
        $this->assertEquals($initial->getPort(), $returned->getPort());
        $this->assertEquals($initial->getClientId(), $returned->getClientId());
    }

}
