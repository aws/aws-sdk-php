<?php
namespace Aws\EndpointDiscovery;

use Aws\AbstractConfigurationProvider;
use Aws\CacheInterface;
use Aws\ConfigurationProviderInterface;
use Aws\EndpointDiscovery\Exception\ConfigurationException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * A configuration provider is a function that returns a promise that is
 * fulfilled with a {@see \Aws\EndpointDiscovery\ConfigurationInterface}
 * or rejected with an {@see \Aws\EndpointDiscovery\Exception\ConfigurationException}.
 *
 * <code>
 * use Aws\EndpointDiscovery\ConfigurationProvider;
 * $provider = ConfigurationProvider::defaultProvider();
 * // Returns a ConfigurationInterface or throws.
 * $config = $provider()->wait();
 * </code>
 *
 * Configuration providers can be composed to create configuration using
 * conditional logic that can create different configurations in different
 * environments. You can compose multiple providers into a single provider using
 * {@see Aws\EndpointDiscovery\ConfigurationProvider::chain}. This function
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
class ConfigurationProvider extends AbstractConfigurationProvider
    implements ConfigurationProviderInterface
{
    const DEFAULT_ENABLED = false;
    const DEFAULT_CACHE_LIMIT = 1000;
    const ENV_ENABLED = 'AWS_ENDPOINT_DISCOVERY_ENABLED';
    const ENV_ENABLED_ALT = 'AWS_ENABLE_ENDPOINT_DISCOVERY';
    const ENV_PROFILE = 'AWS_PROFILE';

    public static $cacheKey = 'aws_cached_endpoint_discovery_config';

    protected static $interfaceClass = ConfigurationInterface::class;
    protected static $exceptionClass = ConfigurationException::class;

    /**
     * Creates an aggregate credentials provider that invokes the provided
     * variadic providers one after the other until a provider returns
     * credentials.
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
     * Create a default config provider that first checks for environment
     * variables, then checks for a specified profile in ~/.aws/config, then
     * checks for the "default" profile in ~/.aws/config, and failing those uses
     * a default fallback set of configuration options.
     *
     * This provider is automatically wrapped in a memoize function that caches
     * previously provided config options.
     *
     * @param array $config Optional array of ecs/instance profile credentials
     *                      provider options.
     *
     * @return callable
     */
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

        if (isset($config['endpoint_discovery'])
            && $config['endpoint_discovery'] instanceof CacheInterface
        ) {
            return self::cache($memo, $config['endpoint_discovery'], self::$cacheKey);
        }

        return $memo;
    }

    /**
     * Provider that creates config from environment variables.
     *
     * @param $cacheLimit
     * @return callable
     */
    public static function env($cacheLimit = self::DEFAULT_CACHE_LIMIT)
    {
        return function () use ($cacheLimit) {
            // Use config from environment variables, if available
            $enabled = getenv(self::ENV_ENABLED);
            if ($enabled === false || $enabled === '') {
                $enabled = getenv(self::ENV_ENABLED_ALT);
            }
            if ($enabled !== false && $enabled !== '') {
                return Promise\promise_for(
                    new Configuration($enabled, $cacheLimit)
                );
            }

            return self::reject('Could not find environment variable config'
                . ' in ' . self::ENV_ENABLED);
        };
    }

    /**
     * Fallback config options when other sources are not set.
     *
     * @return callable
     */
    public static function fallback()
    {
        return function () {
            return Promise\promise_for(
                new Configuration(
                    self::DEFAULT_ENABLED,
                    self::DEFAULT_CACHE_LIMIT
                )
            );
        };
    }

    /**
     * Config provider that creates config using an ini file stored
     * in the current user's home directory.
     *
     * @param string|null $profile  Profile to use. If not specified will use
     *                              the "default" profile in "~/.aws/config".
     * @param string|null $filename If provided, uses a custom filename rather
     *                              than looking in the home directory.
     * @param int $cacheLimit
     *
     * @return callable
     */
    public static function ini(
        $profile = null,
        $filename = null,
        $cacheLimit = self::DEFAULT_CACHE_LIMIT
    ) {
        $filename = $filename ?: (self::getHomeDir() . '/.aws/config');
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: 'default');

        return function () use ($profile, $filename, $cacheLimit) {
            if (!is_readable($filename)) {
                return self::reject("Cannot read configuration from $filename");
            }
            $data = \Aws\parse_ini_file($filename, true);
            if ($data === false) {
                return self::reject("Invalid config file: $filename");
            }
            if (!isset($data[$profile])) {
                return self::reject("'$profile' not found in config file");
            }
            if (!isset($data[$profile]['endpoint_discovery_enabled'])) {
                return self::reject("Required endpoint discovery config values 
                    not present in INI profile '{$profile}' ({$filename})");
            }

            return Promise\promise_for(
                new Configuration(
                    $data[$profile]['endpoint_discovery_enabled'],
                    $cacheLimit
                )
            );
        };
    }

    /**
     * Unwraps a configuration object in whatever valid form it is in,
     * always returning a ConfigurationInterface object.
     *
     * @param  mixed $config
     * @return ConfigurationInterface
     * @throws \InvalidArgumentException
     */
    public static function unwrap($config)
    {
        if (is_callable($config)) {
            $config = $config();
        }
        if ($config instanceof PromiseInterface) {
            $config = $config->wait();
        }
        if ($config instanceof ConfigurationInterface) {
            return $config;
        } elseif (is_array($config) && isset($config['enabled'])) {
            if (isset($config['cache_limit'])) {
                return new Configuration(
                    $config['enabled'],
                    $config['cache_limit']
                );
            }
            return new Configuration(
                $config['enabled'],
                self::DEFAULT_CACHE_LIMIT
            );
        }

        throw new \InvalidArgumentException('Not a valid endpoint_discovery '
            . 'configuration argument.');
    }
}
