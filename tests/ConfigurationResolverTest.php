<?php
namespace Aws\Test;

use Aws\Configuration\ConfigurationResolver;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class ConfigurationResolverTest extends TestCase
{
    private static $configurationKey = 'foo_configuration_option';
    private static $originalEnv;

    private $boolIniFile = <<<EOT
[custom]
foo_configuration_option = false
[default]
foo_configuration_option = true
EOT;

    private $intIniFile = <<<EOT
[custom]
foo_configuration_option = 25
[default]
foo_configuration_option = 15
EOT;


    private $stringIniFile = <<<EOT
[custom]
foo_configuration_option = experimental
[default]
foo_configuration_option = standard
EOT;

    public static function set_up_before_class()
    {
        self::$originalEnv = [
            'foo_configuration_option' => getenv(
                ConfigurationResolver::$envPrefix . strtoupper(self::$configurationKey)
            ) ?: '',
            'home' => getenv('HOME') ?: '',
            'profile' => getenv(ConfigurationResolver::ENV_PROFILE) ?: '',
            'config_file' => getenv(ConfigurationResolver::ENV_CONFIG_FILE) ?: '',
        ];
    }

    private function clearEnv()
    {
        putenv(
            ConfigurationResolver::$envPrefix . strtoupper(self::$configurationKey) . '='
        );
        putenv(ConfigurationResolver::ENV_PROFILE . '=');
        putenv(ConfigurationResolver::ENV_CONFIG_FILE . '=');

        $dir = sys_get_temp_dir() . '/.aws';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public static function tear_down_after_class()
    {
        putenv(ConfigurationResolver::$envPrefix . strtoupper(self::$configurationKey) . '=' .
            self::$originalEnv['foo_configuration_option']);
        putenv('HOME=' . self::$originalEnv['home']);
        putenv(ConfigurationResolver::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
        putenv(ConfigurationResolver::ENV_CONFIG_FILE . '=' .
            self::$originalEnv['config_file']);
    }

    public function getEnvValues()
    {
        return [
            ['true', 'bool', true],
            ['false', 'bool', false],
            ['25', 'int', 25],
            ['some value', 'string', 'some value']
        ];
    }

    /**
     * @dataProvider getEnvValues
     */
    public function testRetrievesAndConvertsEnvironmentVariables($envValue, $type, $expected)
    {
        $this->clearEnv();
        putenv(
            ConfigurationResolver::$envPrefix
            . strtoupper(self::$configurationKey)
            . '='
            . $envValue
        );
        $result = ConfigurationResolver::env(self::$configurationKey, $type);
        $this->assertSame($expected, $result);
    }

    public function testNoEnvReturnsNull()
    {
        $this->clearEnv();
        putenv(ConfigurationResolver::$envPrefix . strtoupper(self::$configurationKey));
        $result = ConfigurationResolver::env(self::$configurationKey, 'string');
        $this->assertNull($result);
    }

    public function testResolvesDefaultFromFallback()
    {
        $this->clearEnv();
        $result = ConfigurationResolver::resolve(
            self::$configurationKey,
            false,
            'bool'
        );
        $this->assertFalse($result);
    }

    public function iniFileProvider()
    {
        return [
            [$this->boolIniFile, 'bool', true],
            [$this->intIniFile, 'int', 15],
            [$this->stringIniFile, 'string', 'standard'],
        ];
    }

    /**
     * @dataProvider IniFileProvider
     */
    public function testResolvesFromIniFileWithDefaultProfile($iniFile, $type, $expected)
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', $iniFile);
        putenv('HOME=' . dirname($dir));
        $result = ConfigurationResolver::ini(self::$configurationKey, $type);
        $this->assertSame($expected, $result);
        unlink($dir . '/config');
    }

    /**
     * @dataProvider IniFileProvider
     */
    public function testCreatesFromIniFileWithDifferentDefaultFilename($iniFile, $type, $expected)
    {
        $dir = $this->clearEnv();
        putenv(ConfigurationResolver::ENV_CONFIG_FILE . '=' . $dir . "/alt_config");
        file_put_contents($dir . '/config', $iniFile);
        file_put_contents($dir . '/alt_config', $iniFile);
        putenv('HOME=' . dirname($dir));
        /** @var ConfigurationInterface $result */
        $result = $result = ConfigurationResolver::ini(self::$configurationKey, $type);
        $this->assertSame($expected, $result);
        unlink($dir . '/config');
        unlink($dir . '/alt_config');
    }

    public function iniFileWithAltProfileProvider()
    {
        return [
            [$this->boolIniFile, 'bool', false],
            [$this->intIniFile, 'int', 25],
            [$this->stringIniFile, 'string', 'experimental'],
        ];
    }

    /**
     * @dataProvider IniFileWIthAltProfileProvider
     */
    public function testCreatesFromIniFileWithSpecifiedProfile($iniFile, $type, $expected)
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', $iniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationResolver::ENV_PROFILE . '=custom');
        $result = ConfigurationResolver::ini(self::$configurationKey, $type);
        $this->assertEquals($expected, $result);
        unlink($dir . '/config');
    }

    public function testEnsuresIniFileExists()
    {
        $this->clearEnv();
        putenv('HOME=/does/not/exist');
        $result = ConfigurationResolver::ini(self::$configurationKey, 'bool');
        $this->assertNull($result);
    }

    public function testReturnsNullIfProfileDoesNotExist()
    {
        $dir = $this->clearEnv();
        $ini = "[foo]";
        file_put_contents($dir . '/config', $ini);
        putenv('HOME=' . dirname($dir));
        $result = ConfigurationResolver::ini(self::$configurationKey, 'bool');
        $this->assertNull($result);
    }

    public function testReturnsNullIfIniFileIsEmpty()
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', '');
        putenv('HOME=' . dirname($dir));
        $result = ConfigurationResolver::ini(self::$configurationKey, 'bool');
        $this->assertNull($result);
    }

    public function testEnsuresIniFileIsValid()
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', "wef \n=\nwef");
        putenv('HOME=' . dirname($dir));
        $result = ConfigurationResolver::ini(self::$configurationKey, 'bool');
        $this->assertNull($result);
    }

    public function testGetsHomeDirectoryForWindowsUsers()
    {
        putenv('HOME=');
        putenv('HOMEDRIVE=C:');
        putenv('HOMEPATH=\\Sean\\Home');
        $ref = new \ReflectionClass(ConfigurationResolver::class);
        $meth = $ref->getMethod('getHomeDir');
        $meth->setAccessible(true);
        $this->assertSame('C:\\Sean\\Home', $meth->invoke(null));
    }

    public function testSelectsEnvironmentOverIniConfiguration()
    {
        $dir = $this->clearEnv();
        putenv(
            ConfigurationResolver::$envPrefix
            . strtoupper(self::$configurationKey)
            . '=true'
        );
        file_put_contents($dir . '/config', $this->boolIniFile);
        putenv('HOME=' . dirname($dir));
        putenv(ConfigurationResolver::ENV_PROFILE . '=custom');
        $result = ConfigurationResolver::resolve(
            self::$configurationKey,
            false,
            'bool'
        );
        $this->assertTrue($result);
        unlink($dir . '/config');
    }

    public function testUsesIniWithUseAwsConfigFileTrue()
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', $this->boolIniFile);
        putenv('HOME=' . dirname($dir));
        $result = ConfigurationResolver::resolve(
            self::$configurationKey,
            false,
            'bool',
            ['use_aws_shared_config_files' => true]
        );
        $this->assertTrue($result);
        unlink($dir . '/config');
    }

    public function testIgnoresIniWithUseAwsConfigFileFalse()
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . '/config', $this->boolIniFile);
        putenv('HOME=' . dirname($dir));
        $result = ConfigurationResolver::resolve(
            self::$configurationKey,
            false,
            'bool',
            ['use_aws_shared_config_files' => false]
        );
        $this->assertFalse($result);
        unlink($dir . '/config');
    }
}