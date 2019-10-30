<?php
namespace Aws;

use GuzzleHttp\Promise;

/**
 * A configuration provider is a function that returns a promise that is
 * fulfilled with a {@see \Aws\Sts\RegionalEndpoints\ConfigurationInterface}
 * or rejected with an {@see \Aws\Sts\RegionalEndpoints\Exception\ConfigurationException}.
 *
 * <code>
 * use Aws\Sts\RegionalEndpoints\ConfigurationProvider;
 * $provider = ConfigurationProvider::defaultProvider();
 * // Returns a ConfigurationInterface or throws.
 * $config = $provider()->wait();
 * </code>
 *
 * Configuration providers can be composed to create configuration using
 * conditional logic that can create different configurations in different
 * environments. You can compose multiple providers into a single provider using
 * {@see \Aws\Sts\RegionalEndpoints\ConfigurationProvider::chain}. This function
 * accepts providers as variadic arguments and returns a new function that will
 * invoke each provider until a successful configuration is returned.
 *
 * <code>
 * // First try an INI file at this location.
 * $a = ConfigurationProvider::ini(null, '/path/to/file.ini');
 * // Then try an INI file at this location.
 * $b = ConfigurationProvider::ini(null, '/path/to/other-file.ini');
 * // Then try loading from environment variables.
 * $c = ConfigurationProvider::env();
 * // Combine the three providers together.
 * $composed = ConfigurationProvider::chain($a, $b, $c);
 * // Returns a promise that is fulfilled with a configuration or throws.
 * $promise = $composed();
 * // Wait on the configuration to resolve.
 * $config = $promise->wait();
 * </code>
 */
abstract class AbstractConfigurationProvider
{
    const ENV_PROFILE = 'AWS_PROFILE';

    public static $cacheKey;

    protected static $interfaceClass;
    protected static $exceptionClass;

    /**
     * Wraps a config provider and saves provided configuration in an
     * instance of Aws\CacheInterface. Forwards calls when no config found
     * in cache and updates cache with the results.
     *
     * @param callable $provider Configuration provider function to wrap
     * @param CacheInterface $cache Cache to store configuration
     * @param string|null $cacheKey (optional) Cache key to use
     *
     * @return callable
     */
    public static function cache(
        callable $provider,
        CacheInterface $cache,
        $cacheKey = null
    ) {
        $cacheKey = $cacheKey ?: static::$cacheKey;

        return function () use ($provider, $cache, $cacheKey) {
            $found = $cache->get($cacheKey);
            if ($found instanceof static::$interfaceClass) {
                return Promise\promise_for($found);
            }

            return $provider()
                ->then(function ($config) use (
                    $cache,
                    $cacheKey
                ) {
                    $cache->set($cacheKey, $config);
                    return $config;
                });
        };
    }

    /**
     * Creates an aggregate configuration provider that invokes the provided
     * variadic providers one after the other until a provider returns
     * configuration.
     *
     * @return callable
     */
    public static function chain()
    {
        $links = func_get_args();
        if (empty($links)) {
            throw new \InvalidArgumentException('No providers in chain');
        }

        return function () use ($links) {
            /** @var callable $parent */
            $parent = array_shift($links);
            $promise = $parent();
            while ($next = array_shift($links)) {
                $promise = $promise->otherwise($next);
            }
            return $promise;
        };
    }

    /**
     * Create a default config provider
     *
     * @param array $config
     * @return callable
     */
    abstract public static function defaultProvider(array $config = []);

    /**
     * Provider that creates config from environment variables.
     *
     * @return callable
     */
    abstract public static function env();

    /**
     * Config provider that creates config using an ini file stored
     * in the current user's home directory.
     *
     * @param string|null $profile  Profile to use. If not specified will use
     *                              the "default" profile in "~/.aws/config".
     * @param string|null $filename If provided, uses a custom filename rather
     *                              than looking in the home directory.
     *
     * @return callable
     */
    abstract public static function ini($profile = null, $filename = null);

    /**
     * Gets the environment's HOME directory if available.
     *
     * @return null|string
     */
    protected static function getHomeDir()
    {
        // On Linux/Unix-like systems, use the HOME environment variable
        if ($homeDir = getenv('HOME')) {
            return $homeDir;
        }

        // Get the HOMEDRIVE and HOMEPATH values for Windows hosts
        $homeDrive = getenv('HOMEDRIVE');
        $homePath = getenv('HOMEPATH');

        return ($homeDrive && $homePath) ? $homeDrive . $homePath : null;
    }

    /**
     * Wraps a config provider and caches previously provided configuration.
     *
     * @param callable $provider Config provider function to wrap.
     *
     * @return callable
     */
    public static function memoize(callable $provider)
    {
        return function () use ($provider) {
            static $result;
            static $isConstant;

            // Constant config will be returned constantly.
            if ($isConstant) {
                return $result;
            }

            // Create the initial promise that will be used as the cached value
            if (null === $result) {
                $result = $provider();
            }

            // Return config and set flag that provider is already set
            return $result
                ->then(function ($config) use (&$isConstant) {
                    $isConstant = true;
                    return $config;
                });
        };
    }

    /**
     * Reject promise with standardized exception.
     *
     * @param $msg
     * @return Promise\RejectedPromise
     */
    protected static function reject($msg)
    {
        $exceptionClass = static::$exceptionClass;
        return new Promise\RejectedPromise(new $exceptionClass($msg));
    }
}
