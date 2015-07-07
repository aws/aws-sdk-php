<?php

namespace Aws\Credentials;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\PhpFileCache;

trait CachingProviderTrait
{
    private static $configCredentialsCache = 'credentials.cache';
    private static $configCredentialsCacheKey = 'credentials.cache.key';

    private static function tryToCache(
        CredentialsInterface $credentials,
        array $config = []
    ) {
        $cache = self::getCredentialsCache($config);
        if (!$cache || $credentials->isExpired()) {
            return null;
        }

        $cache->save(
            self::getCacheKey($config),
            $credentials,
            $credentials->getExpiration() - time()
        );
    }

    /**
     * @param array $config
     * @return Cache|null
     */
    private static function getCredentialsCache(array $config = [])
    {
        if (!empty($config[self::$configCredentialsCache])) {
            return $config[self::$configCredentialsCache] instanceof Cache ?
                $config[self::$configCredentialsCache]
                : self::getDefaultCache();
        }

        return null;
    }

    private static function getDefaultCache()
    {
        $cacheDir = sys_get_temp_dir() .
            DIRECTORY_SEPARATOR . 'aws_credentials_cache';

        while (file_exists($cacheDir) && !is_dir($cacheDir)) {
            $cacheDir .= '_1';
        }

        if (!file_exists($cacheDir)) {
            mkdir($cacheDir);
        }

        return new PhpFileCache($cacheDir);
    }

    private static function getCacheKey(array $config = [])
    {
        return isset($config[self::$configCredentialsCacheKey]) ?
            $config[self::$configCredentialsCacheKey]
            : 'credentials_' . crc32(gethostname());
    }

}