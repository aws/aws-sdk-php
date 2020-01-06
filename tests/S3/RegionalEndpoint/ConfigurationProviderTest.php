<?php

namespace Aws\Test\S3\RegionalEndpoint;

use Aws\LruArrayCache;
use Aws\S3\RegionalEndpoint\Configuration;
use Aws\S3\RegionalEndpoint\ConfigurationInterface;
use Aws\S3\RegionalEndpoint\ConfigurationProvider;
use Aws\S3\RegionalEndpoint\Exception\ConfigurationException;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\S3\RegionalEndpoint\ConfigurationProvider
 */
class ConfigurationProviderTest extends TestCase
{
    private static $originalEnv;

    private $iniFile = <<<EOT
[custom]
s3_us_east_1_regional_endpoint = regional
[default]
s3_us_east_1_regional_endpoint = legacy
[casetest]
s3_us_east_1_regional_endpoint = ReGiOnAl
EOT;

    private $altIniFile = <<<EOT
[custom]
s3_us_east_1_regional_endpoint = legacy
[default]
s3_us_east_1_regional_endpoint = regional
EOT;

    public static function setUpBeforeClass()
    {
        self::$originalEnv = [
            'endpoints_type' => getenv(ConfigurationProvider::ENV_ENDPOINTS_TYPE) ?: '',
            'home' => getenv('HOME') ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
        ];
    }

    private function clearEnv()
    {
        putenv(ConfigurationProvider::ENV_ENDPOINTS_TYPE . '=');
        putenv(ConfigurationProvider::ENV_CONFIG_FILE . '=');

        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public static function tearDownAfterClass()
    {
        putenv(ConfigurationProvider::ENV_ENDPOINTS_TYPE . '=' .
            self::$originalEnv['endpoints_type']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
        putenv('HOME=' . self::$originalEnv['home']);
    }

    public function testCreatesFromEnvironmentVariables()
    {
        $this->clearEnv();
        $expected = new Configuration('regional');
        putenv(ConfigurationProvider::ENV_ENDPOINTS_TYPE . '=regional');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::env())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testRejectsOnNoEnvironmentVars()
    {
        $this->clearEnv();
        putenv(ConfigurationProvider::ENV_ENDPOINTS_TYPE);
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
        $expected  = new Configuration('legacy');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testCreatesFromIniFileWithDefaultProfile()
    {
        $dir = $this->clearEnv();
        $expected  = new Configuration('legacy');
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
        $expected  = new Configuration('regional');
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
        $expected = new Configuration('regional');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromNonLowercaseValue()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration('regional');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=casetest');
        /** @var ConfigurationInterface $result */
        $result = call_user_func(ConfigurationProvider::ini())->wait();
        $this->assertEquals($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    /**
     * @expectedException \Aws\S3\RegionalEndpoint\Exception\ConfigurationException
     */
    public function testEnsuresIniFileExists()
    {
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        call_user_func(ConfigurationProvider::ini())->wait();
    }

    /**
     * @expectedException \Aws\S3\RegionalEndpoint\Exception\ConfigurationException
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
     * @expectedException \Aws\S3\RegionalEndpoint\Exception\ConfigurationException
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
     * @expectedException \Aws\S3\RegionalEndpoint\Exception\ConfigurationException
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
            ConfigurationProvider::DEFAULT_ENDPOINTS_TYPE
        );
        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function testSelectsEnvironmentOverIniConfiguration()
    {
        $dir = $this->clearEnv();
        $expected = new Configuration('legacy');
        putenv(ConfigurationProvider::ENV_ENDPOINTS_TYPE . '=legacy');
        file_put_contents($dir . '/config', $this->iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationProvider::ENV_PROFILE . '=custom');

        $provider = ConfigurationProvider::defaultProvider();
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertSame($expected->toArray(), $result->toArray());
        unlink($dir . '/config');
    }

    public function testCreatesFromCache()
    {
        $expected = new Configuration('regional');
        $cacheBuilder = $this->getMockBuilder('Aws\CacheInterface');
        $cacheBuilder->setMethods(['get', 'set', 'remove']);
        $cache = $cacheBuilder->getMock();
        $cache->expects($this->any())
            ->method('get')
            ->with(ConfigurationProvider::$cacheKey)
            ->willReturn($expected);

        $provider = ConfigurationProvider::defaultProvider(['s3_us_east_1_regional_endpoint' => $cache]);
        /** @var ConfigurationInterface $result */
        $result = $provider()->wait();
        $this->assertInstanceOf(Configuration::class, $result);
        $this->assertSame($expected->toArray(), $result->toArray());
    }

    public function getSuccessfulUnwrapData()
    {
        $expected = new Configuration('regional');
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
                    'endpoints_type' => 'regional'
                ],
                $expected
            ],
            [
                'regional',
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
     * @expectedExceptionMessage Not a valid S3 regional endpoint configuration argument.
     */
    public function testInvalidConfigurationUnwrap()
    {
        ConfigurationProvider::unwrap([]);
    }
}
