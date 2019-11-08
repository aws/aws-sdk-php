<?php
namespace Aws\S3\UseArnRegion;

use Aws\AbstractConfigurationProvider;
use Aws\CacheInterface;
use Aws\ConfigurationProviderInterface;
use Aws\S3\UseArnRegion\Exception\ConfigurationException;
use GuzzleHttp\Promise;

class ConfigurationProvider extends AbstractConfigurationProvider
    implements ConfigurationProviderInterface
{
    const ENV_USE_ARN_REGION = 'AWS_S3_USE_ARN_REGION';
    const INI_USE_ARN_REGION = 's3_use_arn_region';
    const DEFAULT_USE_ARN_REGION = false;

    public static $cacheKey = 'aws_s3_use_arn_region_config';

    protected static $interfaceClass = ConfigurationInterface::class;
    protected static $exceptionClass = ConfigurationException::class;

    public static function defaultProvider(array $config = [])
    {
        $configProviders = [
            self::env(),
            self::ini(),
            self::fallback()
        ];

        $memo = self::memoize(
            call_user_func_array('self::chain', $configProviders)
        );

        if (isset($config['use_arn_region'])
            && $config['use_arn_region'] instanceof CacheInterface
        ) {
            return self::cache($memo, $config['use_arn_region'], self::$cacheKey);
        }

        return $memo;
    }

    public static function env()
    {
        return function () {
            // Use config from environment variables, if available
            $useArnRegion = getenv(self::ENV_USE_ARN_REGION);
            if (!empty($useArnRegion)) {
                return Promise\promise_for(
                    new Configuration($useArnRegion)
                );
            }

            return self::reject('Could not find environment variable config'
                . ' in ' . self::ENV_USE_ARN_REGION);
        };
    }

    public static function ini($profile = null, $filename = null)
    {
        $filename = $filename ?: (self::getHomeDir() . '/.aws/config');
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: 'default');

        return function () use ($profile, $filename) {
            if (!is_readable($filename)) {
                return self::reject("Cannot read configuration from $filename");
            }

            // Use INI_SCANNER_NORMAL instead of INI_SCANNER_TYPED for PHP 5.5 compatibility
            $data = \Aws\parse_ini_file($filename, true, INI_SCANNER_NORMAL);
            if ($data === false) {
                return self::reject("Invalid config file: $filename");
            }
            if (!isset($data[$profile])) {
                return self::reject("'$profile' not found in config file");
            }
            if (!isset($data[$profile][self::INI_USE_ARN_REGION])) {
                return self::reject("Required S3 Use Arn Region config values 
                    not present in INI profile '{$profile}' ({$filename})");
            }

            // INI_SCANNER_NORMAL parses false-y values as an empty string
            if ($data[$profile][self::INI_USE_ARN_REGION] === "") {
                $data[$profile][self::INI_USE_ARN_REGION] = false;
            }

            return Promise\promise_for(
                new Configuration($data[$profile][self::INI_USE_ARN_REGION])
            );
        };
    }

    public static function fallback()
    {
        return function () {
            return Promise\promise_for(
                new Configuration(self::DEFAULT_USE_ARN_REGION)
            );
        };
    }
}