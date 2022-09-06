<?php
namespace Aws\Token;

use Aws;
use Aws\Api\DateTimeResult;
use Aws\CacheInterface;
use Aws\Exception\TokenException;
use GuzzleHttp\Promise;
use Nette\Neon\Exception;

/**
 * Token providers are functions that accept no arguments and return a
 * promise that is fulfilled with an {@see \Aws\Token\TokenInterface}
 * or rejected with an {@see \Aws\Exception\TokenException}.
 *
 * <code>
 * use Aws\Token\TokenProvider;
 * $provider = TokenProvider::defaultProvider();
 * // Returns a TokenInterface or throws.
 * $token = $provider()->wait();
 * </code>
 *
 * Token providers can be composed to create a token using conditional
 * logic that can create different tokens in different environments. You
 * can compose multiple providers into a single provider using
 * {@see Aws\Token\TokenProvider::chain}. This function accepts
 * providers as variadic arguments and returns a new function that will invoke
 * each provider until a token is successfully returned.
 */
class TokenProvider
{
    const ENV_PROFILE = 'AWS_PROFILE';

    /**
     * Create a default token provider that
     * first checks for cached a SSO token from the CLI,
     *
     * This provider is automatically wrapped in a memoize function that caches
     * previously provided tokens.
     *
     * @param array $config Optional array of token provider options.
     *
     * @return callable
     */
    public static function defaultProvider(array $config = [])
    {
        $cacheable = [
            'sso',
        ];

        $profileName = getenv(self::ENV_PROFILE) ?: 'default';

        $defaultChain = [
        ];
        if (
            !isset($config['use_aws_shared_config_files'])
            || $config['use_aws_shared_config_files'] !== false
        ) {
            $defaultChain['sso'] = self::sso(
                'profile '. $profileName,
                self::getHomeDir() . '/.aws/config',
                $config
            );

        }

        if (isset($config['token'])
            && $config['token'] instanceof CacheInterface
        ) {
            foreach ($cacheable as $provider) {
                if (isset($defaultChain[$provider])) {
                    $defaultChain[$provider] = self::cache(
                        $defaultChain[$provider],
                        $config['token'],
                        'aws_cached_' . $provider . '_token'
                    );
                }
            }
        }

        return self::memoize(
            call_user_func_array(
                'self::chain',
                array_values($defaultChain)
            )
        );
    }

    /**
     * Create a token provider function from a static token.
     *
     * @param TokenInterface $token
     *
     * @return callable
     */
    public static function fromToken(TokenInterface $token)
    {
        $promise = Promise\Create::promiseFor($token);

        return function () use ($promise) {
            return $promise;
        };
    }

    /**
     * Creates an aggregate token provider that invokes the provided
     * variadic providers one after the other until a provider returns
     * a token.
     *
     * @return callable
     */
    public static function chain()
    {
        $links = func_get_args();
        //This is a common use
        if (empty($links)) {
            return function () {
                return Promise\Create::promiseFor(false);
            };
        }

        return function () use ($links) {
            /** @var callable $parent */
            $parent = array_shift($links);
            $promise = $parent();
            while ($next = array_shift($links)) {
                $promise = $promise->otherwise($next);
            }
        };
    }

    /**
     * Wraps a token provider and caches a previously provided token.
     *
     * Ensures that cached tokens are refreshed when they expire.
     *
     * @param callable $provider Token provider function to wrap.
     *
     * @return callable
     */
    public static function memoize(callable $provider)
    {
        return function () use ($provider) {
            static $result;
            static $isConstant;

            // Constant tokens will be returned constantly.
            if ($isConstant) {
                return $result;
            }

            // Create the initial promise that will be used as the cached value
            // until it expires.
            if (null === $result) {
                $result = $provider();
            }

            // Return a token that could expire and refresh when needed.
            return $result
                ->then(function (TokenInterface $token) use ($provider, &$isConstant, &$result) {
                    // Determine if the token is constant.
                    if (!$token->getExpiration()) {
                        $isConstant = true;
                        return $token;
                    }

                    // Refresh an expired token.
                    if (!$token->isExpired()) {
                        return $token;
                    }
                    // Refresh the result and forward the promise.
                    return $result = $provider($token);
                })
                ->otherwise(function($reason) use (&$result) {
                    // Cleanup rejected promise.
                    $result = null;
                    return Promise\Create::promiseFor(null);
                });
        };
    }

    /**
     * Wraps a token provider and saves provided token in an
     * instance of Aws\CacheInterface. Forwards calls when no token found
     * in cache and updates cache with the results.
     *
     * @param callable $provider Token provider function to wrap
     * @param CacheInterface $cache Cache to store the token
     * @param string|null $cacheKey (optional) Cache key to use
     *
     * @return callable
     */
    public static function cache(
        callable $provider,
        CacheInterface $cache,
        $cacheKey = null
    ) {
        $cacheKey = $cacheKey ?: 'aws_cached_token';

        return function () use ($provider, $cache, $cacheKey) {
            $found = $cache->get($cacheKey);
            if ($found instanceof TokenInterface && !$found->isExpired()) {
                return Promise\Create::promiseFor($found);
            }
            return $provider()
                ->then(function (TokenInterface $token) use (
                    $cache,
                    $cacheKey
                ) {
                    $cache->set(
                        $cacheKey,
                        $token,
                        null === $token->getExpiration() ?
                            0 : $token->getExpiration() - time()
                    );

                    return $token;
                });
        };
    }

    /**
     * Token provider that retrieves a cached SSO token from the disk
     *
     * @return callable
     */
    public static function sso($ssoProfileName, $filename = null, $config = [])
    {
        $filename = $filename ?: (self::getHomeDir() . '/.aws/config');

        return function () use ($ssoProfileName, $filename, $config) {
            $ssoProfileName = $ssoProfileName;
            if (!@is_readable($filename)) {
                return self::reject("Cannot read token from $filename");
            }
            $profiles = self::loadProfiles($filename);
            if (!isset($profiles[$ssoProfileName])) {
                return self::reject("Profile {$ssoProfileName} does not exist in {$filename}.");
            }
            $ssoProfile = $profiles[$ssoProfileName];
            if (empty($ssoProfile['sso_session'])) {
                return self::reject(
                    "Profile {$ssoProfileName} in {$filename} must contain an sso_session."
                );
            }

            $sessionProfileName = 'sso-session ' . $ssoProfile['sso_session'];
            $sessionProfileData = $profiles[$sessionProfileName];
            if (empty($sessionProfileData['sso_start_url'])
                || empty($sessionProfileData['sso_region'])
            ) {
                return self::reject(
                    "Profile {$ssoProfileName} in {$filename} must contain the following keys: "
                    . "sso_start_url and sso_region."
                );
            }

            $tokenLocation = self::getHomeDir()
                . '/.aws/sso/cache/'
                . utf8_encode(sha1($ssoProfile['sso_session']))
                . ".json";

            if (!@is_readable($tokenLocation)) {
                return self::reject("Unable to read token file at $tokenLocation");
            }

            $tokenData = json_decode(file_get_contents($tokenLocation), true);
            if (empty($tokenData['accessToken']) || empty($tokenData['expiresAt'])) {
                return self::reject(
                    "Token file at {$tokenLocation} must contain an access token and an expiration"
                );
            }

            try {
                $expiration = (new DateTimeResult($tokenData['expiresAt']))->getTimestamp();
            } catch (\Exception $e) {
                return self::reject("Cached SSO token returned an invalid expiration");
            }
            $refreshWindow = strtotime('+5 minutes');;
            if ($expiration < $refreshWindow) {
                return self::reject("Cached SSO token returned an expired token");
            }

            return Promise\Create::promiseFor(
                new Token(
                    $tokenData['accessToken'],
                    $tokenData['expiresAt']
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
     * Gets profiles from specified $filename, or default ini files.
     */
    private static function loadProfiles($filename)
    {
        $profileData = \Aws\parse_ini_file($filename, true, INI_SCANNER_RAW);

        $configFilename = self::getHomeDir() . '/.aws/config';
        $configProfileData = \Aws\parse_ini_file($configFilename, true, INI_SCANNER_RAW);
        foreach ($configProfileData as $name => $profile) {
            // standardize config profile names
            $name = str_replace('profile ', '', $name);
            if (!isset($profileData[$name])) {
                $profileData[$name] = $profile;
            }
        }

        return $profileData;
    }

    /**
     * Gets profiles from the ~/.aws/config ini file
     */
    private static function loadDefaultProfiles() {
        $profiles = [];
        $configFile = self::getHomeDir() . '/.aws/config';

        if (file_exists($configFile)) {
            $configProfileData = \Aws\parse_ini_file($configFile, true, INI_SCANNER_RAW);
            foreach ($configProfileData as $name => $profile) {
                // standardize config profile names
                $name = str_replace('profile ', '', $name);
                if (!isset($profiles[$name])) {
                    $profiles[$name] = $profile;
                }
            }
        }

        return $profiles;
    }

    private static function reject($msg)
    {
        return new Promise\RejectedPromise(new TokenException($msg));
    }
}

