<?php
namespace Aws\ClientSideMonitoring;

use Aws\CacheInterface;
use Aws\ClientSideMonitoring\Exception\ConfigException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\InvalidArgumentException;


class ConfigurationProvider
{

    const ENV_CLIENT_ID = 'AWS_CSM_CLIENT_ID';
    const ENV_ENABLED = 'AWS_CSM_ENABLED';
    const ENV_PORT = 'AWS_CSM_PORT';
    const ENV_PROFILE = 'AWS_PROFILE';
    const FALLBACK_CLIENT_ID = '';
    const FALLBACK_ENABLED = false;
    const FALLBACK_PORT = 31000;
    const INI_CSM_PROFILE = 'aws_csm';

    /**
     * Wraps a credential provider and saves provided credentials in an
     * instance of Aws\CacheInterface. Forwards calls when no credentials found
     * in cache and updates cache with the results.
     *
     * Defaults to using a simple file-based cache when none provided.
     *
     * @param callable $provider Credentials provider function to wrap
     * @param CacheInterface $cache Cache to store credentials
     * @param string|null $cacheKey (optional) Cache key to use
     *
     * @return callable
     * @todo Implement for real
     */
    public static function cache(
        callable $provider,
        CacheInterface $cache,
        $cacheKey = null
    ) {
        $cacheKey = $cacheKey ?: 'aws_cached_credentials';

        return function () use ($provider, $cache, $cacheKey) {
            $found = $cache->get($cacheKey);
            if ($found instanceof ConfigurationInterface && !$found->isExpired()) {
                return Promise\promise_for($found);
            }

            return $provider()
                ->then(function (ConfigurationInterface $creds) use (
                    $cache,
                    $cacheKey
                ) {
                    $cache->set(
                        $cacheKey,
                        $creds,
                        null === $creds->getExpiration() ?
                            0 : $creds->getExpiration() - time()
                    );

                    return $creds;
                });
        };
    }

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
     * Create a default CSM config provider that first checks for environment
     * variables, then checks for a specified profile in ~/.aws/config, then
     * checks for the "aws_csm" profile in ~/.aws/config, and failing those uses
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
        return self::memoize(
            call_user_func_array('self::chain', $configProviders)
        );
    }

    /**
     * Provider that creates CSM config from environment variables
     *
     * @return callable
     * @todo Investigate which config options are necessary
     */
    public static function env()
    {
        return function () {
            // Use credentials from environment variables, if available
            $client_id = getenv(self::ENV_CLIENT_ID);
            $enabled = getenv(self::ENV_ENABLED);
            $port = getenv(self::ENV_PORT);
            if ($port && $enabled !== false) {
                $client_id = !empty($client_id) ? $client_id : '';
                return Promise\promise_for(
                    new Configuration($enabled, $port, $client_id)
                );
            }

            return self::reject('Could not find environment variable CSM config in '
                . self::ENV_ENABLED. '/' . self::ENV_PORT . '/'
                . self::ENV_CLIENT_ID);
        };
    }

    /**
     * Fallback config options when other sources are not set
     *
     * @return callable
     */
    private static function fallback()
    {
        return function() {
            return Promise\promise_for(
                new Configuration(
                    self::FALLBACK_ENABLED,
                    self::FALLBACK_PORT,
                    self::FALLBACK_CLIENT_ID
                )
            );
        };
    }

    /**
     * Gets the environment's HOME directory if available.
     *
     * @return null|string
     */
    private static function getHomeDir()
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
     * CSM config provider that creates CSM config using an ini file stored
     * in the current user's home directory.
     *
     * @param string|null $profile  Profile to use. If not specified will use
     *                              the "aws_csm" profile in "~/.aws/config".
     * @param string|null $filename If provided, uses a custom filename rather
     *                              than looking in the home directory.
     *
     * @return callable
     * @todo Investigate which config options are necessary
     */
    public static function ini($profile = null, $filename = null)
    {
        $filename = $filename ?: (self::getHomeDir() . '/.aws/config');
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: self::INI_CSM_PROFILE);

        return function () use ($profile, $filename) {
            if (!is_readable($filename)) {
                return self::reject("Cannot read CSM config from $filename");
            }
            $data = parse_ini_file($filename, true);
            if ($data === false) {
                return self::reject("Invalid config file: $filename");
            }
            if (!isset($data[$profile])) {
                return self::reject("'$profile' not found in config file");
            }
            if (!isset($data[$profile]['enabled']) || !isset($data[$profile]['port'])) {
                return self::reject("Required CSM config values not present in 
                    INI profile '{$profile}' ({$filename})");
            }

            // client_id is optional
            if (empty($data[$profile]['client_id'])) {
                $data[$profile]['client_id'] = '';
            }

            return Promise\promise_for(
                new Configuration(
                    $data[$profile]['enabled'],
                    $data[$profile]['port'],
                    $data[$profile]['client_id']
                )
            );
        };
    }

    /**
     * Wraps a CSM config provider and caches previously provided configuration.
     *
     * Ensures that cached configuration is refreshed when it expires.
     *
     * @param callable $provider CSM config provider function to wrap.
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
            // until it expires.
            if (null === $result) {
                $result = $provider();
            }

            // Return config that could expire and refresh when needed.
            return $result
                ->then(function (ConfigurationInterface $config) use ($provider, &$isConstant, &$result) {
                    $isConstant = true;
                    return $config;
                });
        };
    }

    /**
     * Reject promise with standardized exception
     * 
     * @param $msg
     * @return Promise\RejectedPromise
     */
    private static function reject($msg)
    {
        return new Promise\RejectedPromise(new ConfigException($msg));
    }

    /**
     * Unwraps a configuration object in whatever valid form it is in,
     * always returning a ConfigurationInterface object.
     *
     * @param  PromiseInterface|ConfigurationInterface|callable|array $config
     * @return ConfigurationInterface
     * @throws InvalidArgumentException
     * @todo Investigate which config options are necessary
     */
    public static function unwrap($config)
    {
        if (is_callable($config)) {
            $config = $config();
        }
        if ($config instanceof PromiseInterface) {
            $config = $config->wait(true);
        }
        if ($config instanceof ConfigurationInterface) {
            return $config;
        } else if (is_array($config)
            && isset($config['enabled'])
            && isset($config['port'])
        ) {
            $client_id = isset($config['client_id']) ? $config['client_id'] : self::FALLBACK_CLIENT_ID;
            return new Configuration($config['enabled'], $config['port'], $client_id);
        }

        throw new \InvalidArgumentException('Not a valid CSM configuration argument.');
    }
}