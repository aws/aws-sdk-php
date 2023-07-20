<?php
namespace Aws\Test\Integ;

trait IntegUtils
{
    private static $originalCsmEnabled;

    private static function getSdk(array $args = [])
    {
        return new \Aws\Sdk($args + [
            'region'  => 'us-east-1',
            'version' => 'latest',
            'ua_append' => 'PHPUnit/Integration'
        ]);
    }

    public static function log($message)
    {
        fwrite(STDERR, date('c') . ': ' . $message . "\n");
    }

    /**
     * Get the resource prefix to add to created resources
     *
     * @return string
     */
    public static function getResourcePrefix()
    {
        if (!isset($_SERVER['PREFIX']) || $_SERVER['PREFIX'] == 'hostname') {
            $_SERVER['PREFIX'] = crc32(gethostname()) . rand(0, 10000);
        }

        return $_SERVER['PREFIX'];
    }

    /**
     * Disable client-side monitoring if local config has it enabled
     *
     * @BeforeSuite
     */
    public static function disableCsm()
    {
        self::$originalCsmEnabled = getenv(
            \Aws\ClientSideMonitoring\ConfigurationProvider::ENV_ENABLED
        );
        putenv(\Aws\ClientSideMonitoring\ConfigurationProvider::ENV_ENABLED
            . '=false'
        );
    }

    /**
     * Restore original client-side monitoring enabled flag
     *
     * @AfterSuite
     */
    public static function restoreCsmConfig()
    {
        putenv(\Aws\ClientSideMonitoring\ConfigurationProvider::ENV_ENABLED .
            '=' . self::$originalCsmEnabled
        );
    }
}
