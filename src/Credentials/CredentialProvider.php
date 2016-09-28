<?php
namespace Aws\Credentials;

use Aws;
use Aws\CacheInterface;
use Aws\Exception\CredentialsException;
use GuzzleHttp\Promise;

/**
 * Credential providers are functions that accept no arguments and return a
 * promise that is fulfilled with an {@see \Aws\Credentials\CredentialsInterface}
 * or rejected with an {@see \Aws\Exception\CredentialsException}.
 *
 * <code>
 * use Aws\Credentials\CredentialProvider;
 * $provider = CredentialProvider::defaultProvider();
 * // Returns a CredentialsInterface or throws.
 * $creds = $provider()->wait();
 * </code>
 *
 * Credential providers can be composed to create credentials using conditional
 * logic that can create different credentials in different environments. You
 * can compose multiple providers into a single provider using
 * {@see Aws\Credentials\CredentialProvider::chain}. This function accepts
 * providers as variadic arguments and returns a new function that will invoke
 * each provider until a successful set of credentials is returned.
 *
 * <code>
 * // First try an INI file at this location.
 * $a = CredentialProvider::ini(null, '/path/to/file.ini');
 * // Then try an INI file at this location.
 * $b = CredentialProvider::ini(null, '/path/to/other-file.ini');
 * // Then try loading from environment variables.
 * $c = CredentialProvider::env();
 * // Combine the three providers together.
 * $composed = CredentialProvider::chain($a, $b, $c);
 * // Returns a promise that is fulfilled with credentials or throws.
 * $promise = $composed();
 * // Wait on the credentials to resolve.
 * $creds = $promise->wait();
 * </code>
 */
class CredentialProvider
{
    const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    const ENV_SECRET = 'AWS_SECRET_ACCESS_KEY';
    const ENV_SESSION = 'AWS_SESSION_TOKEN';
    const ENV_PROFILE = 'AWS_PROFILE';

    /**
     * Create a default credential provider that first checks for environment
     * variables, check for assume role profile secondly, then checks for
     * the "default" profile in ~/.aws/credentials, then checks for
     * "profile default" profile in ~/.aws/config, then tries to make
     * GET Request to fetch credentials if Ecs environment variable is presented,
     * and finally checks for EC2 instance profile credentials.
     *
     * This provider is automatically wrapped in a memoize function that caches
     * previously provided credentials.
     *
     * @param array $config Optional array of instance profile credentials
     *                      provider options.
     * @return callable
     */
    public static function defaultProvider(array $config = [])
    {
        $instanceProfileProvider = self::instanceProfile($config);
        $ecsCredentialProvider = self::ecsCredentials($config);

        if (isset($config['credentials'])
            && $config['credentials'] instanceof CacheInterface
        ) {
            $instanceProfileProvider = self::cache(
                $instanceProfileProvider,
                $config['credentials']
            );
        }

        return self::memoize(
            self::chain(
                self::env(),
                self::assumeRole(),
                self::assumeRole(null, null, true),
                self::ini(),
                self::ini(null, null, true),
                $ecsCredentialProvider,
                $instanceProfileProvider
            )
        );
    }

    /**
     * Create a credential provider function from a set of static credentials.
     *
     * @param CredentialsInterface $creds
     *
     * @return callable
     */
    public static function fromCredentials(CredentialsInterface $creds)
    {
        $promise = Promise\promise_for($creds);

        return function () use ($promise) {
            return $promise;
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
     * Wraps a credential provider and caches previously provided credentials.
     *
     * Ensures that cached credentials are refreshed when they expire.
     *
     * @param callable $provider Credentials provider function to wrap.
     *
     * @return callable
     */
    public static function memoize(callable $provider)
    {
        return function () use ($provider) {
            static $result;
            static $isConstant;

            // Constant credentials will be returned constantly.
            if ($isConstant) {
                return $result;
            }

            // Create the initial promise that will be used as the cached value
            // until it expires.
            if (null === $result) {
                $result = $provider();
            }

            // Return credentials that could expire and refresh when needed.
            return $result
                ->then(function (CredentialsInterface $creds) use ($provider, &$isConstant, &$result) {
                    // Determine if these are constant credentials.
                    if (!$creds->getExpiration()) {
                        $isConstant = true;
                        return $creds;
                    }

                    // Refresh expired credentials.
                    if (!$creds->isExpired()) {
                        return $creds;
                    }
                    // Refresh the result and forward the promise.
                    return $result = $provider();
                });
        };
    }

    /**
     * Wraps a credential provider and saves provided credentials in an
     * instance of Aws\CacheInterface. Forwards calls when no credentials found
     * in cache and updates cache with the results.
     *
     * Defaults to using a simple file-based cache when none provided.
     *
     * @param callable $provider Credentials provider function to wrap
     * @param CacheInterface $cache (optional) Cache to store credentials
     * @param string|null $cacheKey (optional) Cache key to use
     *
     * @return callable
     */
    public static function cache(
        callable $provider,
        CacheInterface $cache,
        $cacheKey = null
    ) {
        $cacheKey = $cacheKey ?: 'aws_cached_credentials';

        return function () use ($provider, $cache, $cacheKey) {
            $found = $cache->get($cacheKey);
            if ($found instanceof CredentialsInterface && !$found->isExpired()) {
                return Promise\promise_for($found);
            }

            return $provider()
                ->then(function (CredentialsInterface $creds) use (
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
     * Provider that creates credentials from environment variables
     * AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, and AWS_SESSION_TOKEN.
     *
     * @return callable
     */
    public static function env()
    {
        return function () {
            // Use credentials from environment variables, if available
            $key = getenv(self::ENV_KEY);
            $secret = getenv(self::ENV_SECRET);
            if ($key && $secret) {
                return Promise\promise_for(
                    new Credentials($key, $secret, getenv(self::ENV_SESSION))
                );
            }

            return self::reject('Could not find environment variable '
                . 'credentials in ' . self::ENV_KEY . '/' . self::ENV_SECRET);
        };
    }

    /**
     * Credential provider that creates credentials using instance profile
     * credentials.
     *
     * @param array $config Array of configuration data.
     *
     * @return InstanceProfileProvider
     * @see Aws\Credentials\InstanceProfileProvider for $config details.
     */
    public static function instanceProfile(array $config = [])
    {
        return new InstanceProfileProvider($config);
    }

    /**
     * Credential provider that creates credentials using
     * ecs credentials by a GET request, whose uri is specified
     * by environment variable
     *
     * @param array $config Array of configuration data.
     *
     * @return EcsCredentialProvider
     * @see Aws\Credentials\EcsCredentialProvider for $config details.
     */
    public static function ecsCredentials(array $config = [])
    {
        return new EcsCredentialProvider($config);
    }

    /**
     * Credential provider that creates credentials using assume role
     * credentials from ini profile
     *
     * @param string|null $assumeRoleProfile   Assume role profile name to be used.
     *                                         Default:
     *                                         [assumes_role] in credentials file
     *                                         [profile assumes_role] in config file
     *
     * @param string|null $fileName            A custom file to fetch credential from.
     *                                         Default: credential/config file in home directory
     *
     * @param bool|false  $configFile          The type of file where the profile lives in.
     *                                         Default: false (taken as credential file)
     *
     * @return callable
     */
    public static function assumeRole(
        $assumeRoleProfile = null,
        $fileName = null,
        $configFile = false
    ) {
        $fileName = self::getFileName($fileName, $configFile);
        $assumeRoleProfile = $assumeRoleProfile ?: (
            $configFile ? 'profile assumes_role' : 'assumes_role'
        );

        return function () use ($assumeRoleProfile, $fileName, $configFile) {
            $data = self::checkProfileAvailability($assumeRoleProfile, $fileName);
            if (is_string($data)) {
                return self::reject($data);
            }
            
            if (!isset($data[$assumeRoleProfile]['role_arn'])) {
                return self::reject("Profile specified is not an assume role profile.");
            }

            $args = self::loadConfigurationForAssumeRoleCredential(
                $data,
                $assumeRoleProfile,
                $fileName,
                $configFile
            );

            if (!is_array($args)) {
                // Rejected promise
                return $args;
            }
            $provider = new AssumeRoleCredentialProvider($args);
            return $provider();
        };
    }

    public static function loadConfigurationForAssumeRoleCredential(
        $data,
        $assumeRoleProfile,
        $fileName,
        $configFile
    ) {
        $args = [];
        if (!isset($data[$assumeRoleProfile]['source_profile'])) {
            // No source_profile specified, jump to next in chain after ini
            $args['credentials'] = self::chain(
                self::ecsCredentials(),
                self::instanceProfile()
            );
        } else {
            $sourceProfile = $data[$assumeRoleProfile]['source_profile'];
            if ($sourceProfile === $assumeRoleProfile) {
                $args['credentials'] = self::chain(
                    self::ini(null, $fileName),
                    self::ini(),
                    self::ini(null, null, true)
                );
            } else {
                $args['credentials'] = self::chain(
                    self::assumeRole($sourceProfile, $fileName),
                    self::assumeRole($sourceProfile),
                    self::assumeRole($sourceProfile, null, true),
                    self::ini($sourceProfile, $fileName),
                    self::ini($sourceProfile),
                    self::ini($sourceProfile, null, true)
                );
            }
        }
        unset($data[$assumeRoleProfile]['source_profile']);

        if (isset($data[$assumeRoleProfile]['region'])) {
            $args['region'] = $data[$assumeRoleProfile]['region'];
        } else {
            // If no region provided under same assume role profile
            // check static profile for region in the same file
            $profile = getenv(self::ENV_PROFILE) ?: (
                $configFile ? 'profile default' : 'default'
            );
            $data = self::checkProfileAvailability($profile, $fileName);
            if (!isset($data[$profile]['region'])) {
                return self::reject("'region' must be provided to retrieve assume role.");
            }
            $args['region'] = $data[$profile]['region'];
        }
        unset($data[$assumeRoleProfile]['region']);

        $args['assume_role_params'] = self::paramsParser($data[$assumeRoleProfile]);
        return $args;
    }

    /**
     * Credentials provider that creates credentials using an ini file stored
     * in the current user's home directory.
     *
     * @param string|null $profile      Profile to use. If not specified will use
     *                                  the "default" profile.
     * @param string|null $fileName     If provided, uses a custom filename rather
     *                                  than looking in the home directory.
     *                                  Default:
     *                                  - 'default' in credential file
     *                                  - 'profile default' in config file
     * @param bool|false  $configFile   The type of file where the profile lives in.
     *                                  Default: false (taken as credential file)
     * @return callable
     */
    public static function ini($profile = null, $fileName = null, $configFile = false)
    {
        $fileName = self::getFileName($fileName, $configFile);
        $profile = $profile ?: (
            getenv(self::ENV_PROFILE) ?: (
                $configFile ? 'profile default' : 'default'
            )
        );

        return function () use ($profile, $fileName) {
            $data = self::checkProfileAvailability($profile, $fileName);
            if (is_string($data)) {
                return self::reject($data);
            }

            if (!isset($data[$profile]['aws_access_key_id'])
                || !isset($data[$profile]['aws_secret_access_key'])
            ) {
                return self::reject("No credentials present in INI profile "
                    . "'$profile' ($fileName)");
            }

            if (empty($data[$profile]['aws_session_token'])) {
                $data[$profile]['aws_session_token']
                    = isset($data[$profile]['aws_security_token'])
                        ? $data[$profile]['aws_security_token']
                        : null;
            }

            return Promise\promise_for(
                new Credentials(
                    $data[$profile]['aws_access_key_id'],
                    $data[$profile]['aws_secret_access_key'],
                    $data[$profile]['aws_session_token']
                )
            );
        };
    }

    private static function getFileName($fileName, $configFile)
    {
        return $fileName ?: (
            self::getHomeDir() . '/.aws' . ($configFile ? '/config' : '/credentials')
        );
    }

    /**
     * Check profile availability in a given file.
     * Return profile data array or error message string
     *
     * @return array|string
     */
    private static function checkProfileAvailability($profile, $fileName)
    {
        if (!is_readable($fileName)) {
            return "Cannot read credentials from $fileName";
        }
        $data = parse_ini_file($fileName, true);
        if ($data === false) {
            return "Invalid credentials file: $fileName";
        }
        if (!isset($data[$profile])) {
            return "'$profile' not found in $fileName";
        }
        return $data;
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

    private static function reject($msg)
    {
        return new Promise\RejectedPromise(new CredentialsException($msg));
    }

    private static function paramsParser(array $params)
    {
        $args = [];
        foreach($params as $param => $value){
            $arg = str_replace('_', '', ucwords($param, '_'));
            $args[$arg] = $value;
        }
        return $args;
    }
}
