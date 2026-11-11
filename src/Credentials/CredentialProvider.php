<?php
namespace Aws\Credentials;

use Aws;
use Aws\Api\DateTimeResult;
use Aws\CacheInterface;
use Aws\Exception\AwsException;
use Aws\Exception\CredentialsException;
use Aws\Exception\NoCredentialsException;
use Aws\Exception\NonRecoverableCredentialsException;
use Aws\Exception\NonRecoverableCredentialsExceptionInterface;
use Aws\Exception\TokenException;
use Aws\Sts\StsClient;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;
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
    public const ENV_ARN = 'AWS_ROLE_ARN';
    public const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    public const ENV_PROFILE = 'AWS_PROFILE';
    public const ENV_ROLE_SESSION_NAME = 'AWS_ROLE_SESSION_NAME';
    public const ENV_SECRET = 'AWS_SECRET_ACCESS_KEY';
    public const ENV_ACCOUNT_ID = 'AWS_ACCOUNT_ID';
    public const ENV_SESSION = 'AWS_SESSION_TOKEN';
    public const ENV_TOKEN_FILE = 'AWS_WEB_IDENTITY_TOKEN_FILE';
    public const ENV_SHARED_CREDENTIALS_FILE = 'AWS_SHARED_CREDENTIALS_FILE';
    public const ENV_CONFIG_FILE = 'AWS_CONFIG_FILE';
    public const ENV_REGION = 'AWS_REGION';
    public const FALLBACK_REGION = 'us-east-1';
    public const REFRESH_WINDOW = 60;

    // memoize() refresh settings, in seconds.
    private const MANDATORY_REFRESH_WINDOW = 60;
    private const MIN_BACKOFF = 60;
    private const MIN_BACKOFF_UPPER = 90;
    private const MAX_BACKOFF = 600;
    private const MIN_ERROR_CACHE = 1;
    private const MAX_ERROR_CACHE = 5;

    /**
     * Create a default credential provider that
     * first checks for environment variables,
     * then checks for assumed role via web identity,
     * then checks for cached SSO credentials from the CLI,
     * then check for credential_process in the "default" profile in ~/.aws/credentials,
     * then checks for the "default" profile in ~/.aws/credentials,
     * then for credential_process in the "default profile" profile in ~/.aws/config,
     * then checks for "profile default" profile in ~/.aws/config (which is
     * the default profile of AWS CLI),
     * then tries to make a GET Request to fetch credentials if ECS environment variable is presented,
     * finally checks for EC2 instance profile credentials.
     *
     * This provider is automatically wrapped in a memoize function that caches
     * previously provided credentials.
     *
     * @param array $config Optional array of ecs/instance profile credentials
     *                      provider options.
     *
     * @return callable
     */
    public static function defaultProvider(array $config = [])
    {
        $cacheable = [
            'web_identity' => true,
            'sso' => true,
            'login' => true,
            'process_credentials' => false,
            'process_config' => false,
            'ecs' => true,
            'instance' => true
        ];

        $profileName = getenv(self::ENV_PROFILE) ?: 'default';

        $defaultChain = [
            'env' => self::env(),
            'web_identity' => self::assumeRoleWithWebIdentityCredentialProvider($config),
        ];
        if (!isset($config['use_aws_shared_config_files'])
            || $config['use_aws_shared_config_files'] !== false
        ) {
            $defaultChain['sso'] = self::sso(
                $profileName,
                self::getConfigFileName(),
                $config
            );
            $defaultChain['login'] = self::login($profileName, $config);
            $defaultChain['process_credentials'] = self::process();
            $defaultChain['ini'] = self::ini(null, null, $config);
            $defaultChain['process_config'] = self::process(
                'profile ' . $profileName,
                self::getConfigFileName()
            );
            $defaultChain['ini_config'] = self::ini(
                'profile ' . $profileName,
                self::getConfigFileName()
            );
        }

        if (self::shouldUseEcs()) {
            $defaultChain['ecs'] = self::ecsCredentials($config);
        } else {
            $defaultChain['instance'] = self::instanceProfile($config);
        }

        if (isset($config['credentials'])
            && $config['credentials'] instanceof CacheInterface
        ) {
            foreach ($cacheable as $provider => $usesLifecycleCache) {
                if (!isset($defaultChain[$provider])) {
                    continue;
                }

                $cacheKey = 'aws_cached_' . $provider . '_credentials';
                if ($usesLifecycleCache) {
                    $defaultChain[$provider] = self::cacheCredentials(
                        $defaultChain[$provider],
                        $config['credentials'],
                        $cacheKey
                    );
                } else {
                    $defaultChain[$provider] = self::cache(
                        $defaultChain[$provider],
                        $config['credentials'],
                        $cacheKey
                    );
                }
            }
        }

        return self::memoize(
            call_user_func_array(
                [CredentialProvider::class, 'chain'],
                array_values($defaultChain)
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
        $promise = Promise\Create::promiseFor($creds);

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

        return function ($previousCreds = null) use ($links) {
            /** @var callable $parent */
            $parent = array_shift($links);
            $promise = $parent();
            while ($next = array_shift($links)) {
                $promise = $promise->otherwise(function ($reason) use (
                    $next,
                    $previousCreds
                ) {
                    if ($next instanceof InstanceProfileProvider
                        && $previousCreds instanceof Credentials
                    ) {
                        return $next($previousCreds);
                    }
                    return $next($reason);
                });
            }
            return $promise;
        };
    }

    /**
     * Wraps a credential provider and caches the credentials it returns.
     *
     * Refreshes the credentials before they expire, using two windows: an
     * advisory window sized to the credential lifetime, and a 60-second
     * mandatory window. When a refresh fails, keeps the cached credentials
     * (even past expiry) and waits a jittered backoff before retrying. The
     * backoff scales with the credentials remaining lifetime (1 to 10
     * minutes), so credentials near expiry are retried sooner. The target
     * service decides whether to accept them.
     *
     * State is held in closure-scoped static variables.
     *
     * @param callable $provider Credentials provider function to wrap.
     *
     * @return callable
     */
    public static function memoize(callable $provider)
    {
        return function () use ($provider) {
            // Lifecycle state, persisted across calls.
            static $cached;
            static $isConstant = false;
            static $advisoryWindow;
            static $nextRefreshAllowedAt;
            static $cachedError;
            static $cachedErrorExpiresAt;
            static $fetchPromise;
            static $refreshPromise;

            $now = time();

            // Constant credentials (no expiration) never need refreshing.
            if ($isConstant) {
                return Promise\Create::promiseFor($cached);
            }

            if ($cached !== null) {
                $remaining = $cached->getExpiration() - $now;

                // State 2: valid credentials, outside every window.
                if ($remaining > $advisoryWindow) {
                    return Promise\Create::promiseFor($cached);
                }

                // Backoff gate: a previous refresh failed and the backoff
                // has not elapsed.
                if ($nextRefreshAllowedAt !== null && $now < $nextRefreshAllowedAt) {
                    return Promise\Create::promiseFor($cached);
                }
            }

            // Everything below only runs when a fetch or refresh is needed.

            // Handles credentials returned by the source (fresh or stale).
            $onSourceCredentials = static function (
                CredentialsInterface $creds,
                bool $isInitial
            ) use (
                &$cached,
                &$isConstant,
                &$advisoryWindow,
                &$nextRefreshAllowedAt,
                &$cachedError,
                &$cachedErrorExpiresAt
            ) {
                $now = time();

                // Constant credentials: cache and return as-is.
                if (!$creds->getExpiration()) {
                    $isConstant = true;
                    $cached = $creds;
                    $cachedError = null;
                    $cachedErrorExpiresAt = null;
                    return $creds;
                }

                // Response with already-expired credentials.
                if ($creds->getExpiration() <= $now) {
                    if ($isInitial) {
                        // Initial fetch: nothing is cached to fall back on, so
                        // return the expired credentials instead of raising and
                        // let the service decide.
                        $cached = $creds;
                        $advisoryWindow = self::advisoryWindow($creds, $now);
                        $cachedError = null;
                        $cachedErrorExpiresAt = null;
                        return $creds;
                    }
                    $backoff = self::refreshBackoff($cached, $now);
                    $nextRefreshAllowedAt = $now + $backoff;
                    self::warnRefreshFailed(
                        'Credential source returned expired credentials',
                        $backoff
                    );
                    return $cached;
                }

                // Success: replace cache, recompute window, clear failure state.
                $cached = $creds;
                $advisoryWindow = self::advisoryWindow($creds, $now);
                $nextRefreshAllowedAt = null;
                $cachedError = null;
                $cachedErrorExpiresAt = null;
                return $creds;
            };

            // State 1: no credentials yet. Concurrent callers share one fetch.
            // A cached non-recoverable error is re-raised without calling the
            // source.
            if ($cached === null) {
                if ($cachedError !== null && $now < $cachedErrorExpiresAt) {
                    return Promise\Create::rejectionFor($cachedError);
                }
                if ($fetchPromise !== null) {
                    return $fetchPromise;
                }

                $fetchPromise = self::callSource($provider)
                    ->then(
                        function ($creds) use (&$fetchPromise, $onSourceCredentials) {
                            $fetchPromise = null;
                            if (!$creds instanceof CredentialsInterface) {
                                return new Promise\RejectedPromise(
                                    new NoCredentialsException(
                                        'Could not load credentials: the credential '
                                        . 'source did not return credentials.'
                                    )
                                );
                            }
                            return $onSourceCredentials($creds, true);
                        },
                        function ($reason) use (
                            &$fetchPromise,
                            &$cachedError,
                            &$cachedErrorExpiresAt
                        ) {
                            $fetchPromise = null;
                            if ($reason instanceof NonRecoverableCredentialsExceptionInterface) {
                                $cachedError = $reason;
                                $cachedErrorExpiresAt = self::errorCacheExpiry(time());
                                return new Promise\RejectedPromise($reason);
                            }
                            $message = $reason instanceof \Throwable
                                ? 'Could not load credentials: ' . $reason->getMessage()
                                : (string) $reason;
                            $previous = $reason instanceof \Throwable ? $reason : null;
                            return new Promise\RejectedPromise(
                                new NoCredentialsException($message, 0, $previous)
                            );
                        }
                    );

                return $fetchPromise;
            }

            // States 3 to 5. Within the mandatory window (or expired) the
            // caller waits for the refresh. Otherwise it is an advisory
            // refresh and the caller gets the cached credentials if one is
            // already in flight.
            if ($refreshPromise !== null) {
                return $remaining <= self::MANDATORY_REFRESH_WINDOW
                    ? $refreshPromise
                    : Promise\Create::promiseFor($cached);
            }

            if ($cachedError !== null && $now < $cachedErrorExpiresAt) {
                return Promise\Create::rejectionFor($cachedError);
            }

            // Refresh failure handler. Non-recoverable errors are cached briefly
            // and re-raised. Any other failure backs off, logs, and keeps the
            // cached credentials.
            $onRefreshFailure = static function ($reason) use (
                &$cached,
                &$nextRefreshAllowedAt,
                &$cachedError,
                &$cachedErrorExpiresAt
            ) {
                $now = time();

                if ($reason instanceof NonRecoverableCredentialsExceptionInterface) {
                    $cachedError = $reason;
                    $cachedErrorExpiresAt = self::errorCacheExpiry($now);
                    return new Promise\RejectedPromise($reason);
                }

                $backoff = self::refreshBackoff($cached, $now);
                $nextRefreshAllowedAt = $now + $backoff;
                $error = $reason instanceof \Throwable
                    ? $reason->getMessage()
                    : (string) $reason;
                self::warnRefreshFailed($error, $backoff);
                return $cached;
            };

            $refreshPromise = self::callSource($provider, $cached)
                ->then(
                    function ($creds) use (
                        &$refreshPromise,
                        $onSourceCredentials,
                        $onRefreshFailure
                    ) {
                        $refreshPromise = null;
                        if (!$creds instanceof CredentialsInterface) {
                            return $onRefreshFailure(new CredentialsException(
                                'The credential source did not return credentials.'
                            ));
                        }
                        return $onSourceCredentials($creds, false);
                    },
                    function ($reason) use (&$refreshPromise, $onRefreshFailure) {
                        $refreshPromise = null;
                        return $onRefreshFailure($reason);
                    }
                );

            return $refreshPromise;
        };
    }

    /**
     * Calls the credential source. A source that throws is treated the same
     * as one that returns a rejected promise.
     */
    private static function callSource(callable $provider, ...$args): PromiseInterface
    {
        try {
            return Promise\Create::promiseFor($provider(...$args));
        } catch (\Throwable $e) {
            return Promise\Create::rejectionFor($e);
        }
    }

    /**
     * Returns the advisory refresh window, sized to the credential lifetime.
     */
    private static function advisoryWindow(CredentialsInterface $creds, int $now): int
    {
        $lifetime = $creds->getExpiration() - $now;
        if ($lifetime <= 1200) {   // <= 20 min
            return 300;             // 5 min
        }
        if ($lifetime < 5400) {    // > 20 and < 90 min
            return 900;             // 15 min
        }
        return 3600;                // >= 90 min -> 60 min
    }

    /**
     * Returns a random delay before retrying a failed refresh. The upper bound
     * is half the remaining lifetime, kept between 90 seconds and 10 minutes.
     */
    private static function refreshBackoff(CredentialsInterface $cached, int $now): int
    {
        $remaining = max($cached->getExpiration() - $now, 0);
        $upper = max(
            self::MIN_BACKOFF_UPPER,
            min((int) ($remaining / 2), self::MAX_BACKOFF)
        );
        return mt_rand(self::MIN_BACKOFF, $upper);
    }

    /**
     * Returns when a cached non-recoverable error expires.
     */
    private static function errorCacheExpiry(int $now): int
    {
        return $now + mt_rand(self::MIN_ERROR_CACHE, self::MAX_ERROR_CACHE);
    }

    private static function warnRefreshFailed($error, $backoff)
    {
        $message = "Credential refresh failed: {$error}. The SDK will "
            . "continue using cached credentials. A refresh of these "
            . "credentials will be attempted again after {$backoff} seconds.";

        try {
            trigger_error($message, E_USER_WARNING);
        } catch (\Throwable $e) {
            error_log($message);
        }
    }

    /**
     * Loads stored credentials once so later refreshes reach the source.
     *
     * @param callable $provider Credentials provider function to wrap
     * @param CacheInterface $cache Cache to store credentials
     * @param string $cacheKey Cache key to use
     *
     * @return callable
     */
    private static function cacheCredentials(
        callable $provider,
        CacheInterface $cache,
        $cacheKey
    ) {
        return function () use ($provider, $cache, $cacheKey) {
            static $initialized = false;

            if (!$initialized) {
                $found = $cache->get($cacheKey);
                if ($found instanceof CredentialsInterface) {
                    $initialized = true;
                    return Promise\Create::promiseFor($found);
                }
            }

            $isInitial = !$initialized;
            return $provider()
                ->then(function (CredentialsInterface $creds) use (
                    &$initialized,
                    $cache,
                    $cacheKey,
                    $isInitial
                ) {
                    $initialized = true;

                    if (!$isInitial && $creds->isExpired()) {
                        return new Promise\RejectedPromise(
                            new CredentialsException(
                                'Credential source returned expired credentials'
                            )
                        );
                    }

                    // Keep the last successful credentials available after
                    // their expiration so a later process can recover them.
                    $cache->set($cacheKey, $creds, 0);

                    return $creds;
                });
        };
    }

    /**
     * Wraps a credential provider and saves provided credentials in an
     * instance of Aws\CacheInterface. Forwards calls when no credentials found
     * in cache and updates cache with the results.
     *
     * @param callable $provider Credentials provider function to wrap
     * @param CacheInterface $cache Cache to store credentials
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
                return Promise\Create::promiseFor($found);
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
            $accountId = getenv(self::ENV_ACCOUNT_ID) ?: null;
            $token = getenv(self::ENV_SESSION) ?: null;

            if ($key && $secret) {
                return Promise\Create::promiseFor(
                    new Credentials(
                        $key,
                        $secret,
                        $token,
                        null,
                        $accountId,
                        CredentialSources::ENVIRONMENT
                    )
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
     * Credential provider that retrieves cached SSO credentials from the CLI
     *
     * @return callable
     */
    public static function sso(
        $ssoProfileName = 'default',
        $filename = null,
        $config = []
    ) {
        $filename = $filename ?? self::getConfigFileName();

        return function () use ($ssoProfileName, $filename, $config) {
            if (!@is_readable($filename)) {
                return self::reject("Cannot read credentials from $filename");
            }
            $profiles = self::loadProfiles($filename);

            if (isset($profiles[$ssoProfileName])) {
                $ssoProfile = $profiles[$ssoProfileName];
            } elseif (isset($profiles['profile ' . $ssoProfileName])) {
                $ssoProfileName = 'profile ' . $ssoProfileName;
                $ssoProfile = $profiles[$ssoProfileName];
            } else {
                return self::reject("Profile {$ssoProfileName} does not exist in {$filename}.");
            }

            if (!empty($ssoProfile['sso_session'])) {
                return CredentialProvider::getSsoCredentials($profiles, $ssoProfileName, $filename, $config);
            } else {
                return CredentialProvider::getSsoCredentialsLegacy($profiles, $ssoProfileName, $filename, $config);
            }
        };
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
     *
     * @param array $config Array of configuration data
     * @return callable
     * @see Aws\Credentials\AssumeRoleCredentialProvider for $config details.
     */
    public static function assumeRole(array $config=[])
    {
        return new AssumeRoleCredentialProvider($config);
    }

    /**
     * Credential provider that creates credentials by assuming role from a
     * Web Identity Token
     *
     * @param array $config Array of configuration data
     * @return callable
     * @see Aws\Credentials\AssumeRoleWithWebIdentityCredentialProvider for
     * $config details.
     */
    public static function assumeRoleWithWebIdentityCredentialProvider(array $config = [])
    {
        return function () use ($config) {
            $arnFromEnv = getenv(self::ENV_ARN);
            $tokenFromEnv = getenv(self::ENV_TOKEN_FILE);
            $stsClient = isset($config['stsClient'])
                ? $config['stsClient']
                : null;
            $region = isset($config['region'])
                ? $config['region']
                : null;

            if ($tokenFromEnv && $arnFromEnv) {
                $sessionName = getenv(self::ENV_ROLE_SESSION_NAME)
                    ? getenv(self::ENV_ROLE_SESSION_NAME)
                    : null;
                $provider = new AssumeRoleWithWebIdentityCredentialProvider([
                    'RoleArn' => $arnFromEnv,
                    'WebIdentityTokenFile' => $tokenFromEnv,
                    'SessionName' => $sessionName,
                    'client' => $stsClient,
                    'region' => $region,
                    'source' => CredentialSources::ENVIRONMENT_STS_WEB_ID_TOKEN
                ]);

                return $provider();
            }

            $profileName = getenv(self::ENV_PROFILE) ?: 'default';
            if (isset($config['filename'])) {
                $profiles = self::loadProfiles($config['filename']);
            } else {
                $profiles = self::loadDefaultProfiles();
            }

            if (isset($profiles[$profileName])) {
                $profile = $profiles[$profileName];
                if (isset($profile['region'])) {
                    $region = $profile['region'];
                }
                if (isset($profile['web_identity_token_file'])
                    && isset($profile['role_arn'])
                ) {
                    $sessionName = isset($profile['role_session_name'])
                        ? $profile['role_session_name']
                        : null;
                    $provider = new AssumeRoleWithWebIdentityCredentialProvider([
                        'RoleArn' => $profile['role_arn'],
                        'WebIdentityTokenFile' => $profile['web_identity_token_file'],
                        'SessionName' => $sessionName,
                        'client' => $stsClient,
                        'region' => $region,
                        'source' => CredentialSources::PROFILE_STS_WEB_ID_TOKEN
                    ]);

                    return $provider();
                }
            } else {
                return self::reject("Unknown profile: $profileName");
            }
            return self::reject("No RoleArn or WebIdentityTokenFile specified");
        };
    }

    /**
     * Credentials provider that creates credentials using an ini file stored
     * in the current user's home directory.  A source can be provided
     * in this file for assuming a role using the credential_source config option.
     *
     * @param string|null $profile  Profile to use. If not specified will use
     *                              the "default" profile in "~/.aws/credentials".
     * @param string|null $filename If provided, uses a custom filename rather
     *                              than looking in the home directory.
     * @param array|null $config If provided, may contain the following:
     *                           preferStaticCredentials: If true, prefer static
     *                           credentials to role_arn if both are present
     *                           disableAssumeRole: If true, disable support for
     *                           roles that assume an IAM role. If true and role profile
     *                           is selected, an error is raised.
     *                           stsClient: StsClient used to assume role specified in profile
     *
     * @return callable
     */
    public static function ini($profile = null, $filename = null, array $config = [])
    {
        $useProfileFallback = $filename !== null
            && $filename === self::getConfigFileName();
        $filename = self::getCredentialsFileName($filename);
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: 'default');

        return function () use (
            $profile,
            $filename,
            $config,
            $useProfileFallback
        ) {
            $preferStaticCredentials = $config['preferStaticCredentials'] ?? false;
            $disableAssumeRole = $config['disableAssumeRole'] ?? false;
            $stsClient = $config['stsClient'] ?? null;

            if (!@is_readable($filename)) {
                return self::reject("Cannot read credentials from $filename");
            }
            $data = self::loadProfiles($filename);
            if ($data === false) {
                return self::reject("Invalid credentials file: $filename");
            }
            $profile = self::resolveProfileName(
                $data,
                $profile,
                $useProfileFallback
            );
            if (!isset($data[$profile])) {
                return self::reject("'$profile' not found in credentials file");
            }

            /*
            In the CLI, the presence of both a role_arn and static credentials have
            different meanings depending on how many profiles have been visited. For
            the first profile processed, role_arn takes precedence over any static
            credentials, but for all subsequent profiles, static credentials are
            used if present, and only in their absence will the profile's
            source_profile and role_arn keys be used to load another set of
            credentials. This bool is intended to yield compatible behaviour in this
            sdk.
            */
            $preferStaticCredentialsToRoleArn = ($preferStaticCredentials
                && isset($data[$profile]['aws_access_key_id'])
                && isset($data[$profile]['aws_secret_access_key']));

            if (isset($data[$profile]['role_arn'])
                && !$preferStaticCredentialsToRoleArn
            ) {
                if ($disableAssumeRole) {
                    return self::reject(
                        "Role assumption profiles are disabled. "
                        . "Failed to load profile " . $profile);
                }
                return self::loadRoleProfile(
                    $data,
                    $profile,
                    $filename,
                    $stsClient,
                    $config
                );
            }

            if (!isset($data[$profile]['aws_access_key_id'])
                || !isset($data[$profile]['aws_secret_access_key'])
            ) {
                return self::reject("No credentials present in INI profile "
                    . "'$profile' ($filename)");
            }

            if (empty($data[$profile]['aws_session_token'])) {
                $data[$profile]['aws_session_token']
                    = isset($data[$profile]['aws_security_token'])
                    ? $data[$profile]['aws_security_token']
                    : null;
            }

            return Promise\Create::promiseFor(
                new Credentials(
                    $data[$profile]['aws_access_key_id'],
                    $data[$profile]['aws_secret_access_key'],
                    $data[$profile]['aws_session_token'],
                    null,
                    $data[$profile]['aws_account_id'] ?? null,
                    CredentialSources::PROFILE
                )
            );
        };
    }

    /**
     * Credentials provider that creates credentials using a process configured in
     * ini file stored in the current user's home directory.
     *
     * @param string|null $profile  Profile to use. If not specified will use
     *                              the "default" profile in "~/.aws/credentials".
     * @param string|null $filename If provided, uses a custom filename rather
     *                              than looking in the home directory.
     *
     * @return callable
     */
    public static function process($profile = null, $filename = null)
    {
        $useProfileFallback = $filename !== null
            && $filename === self::getConfigFileName();
        $filename = self::getCredentialsFileName($filename);
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: 'default');

        return function () use ($profile, $filename, $useProfileFallback) {
            if (!@is_readable($filename)) {
                return self::reject("Cannot read process credentials from $filename");
            }
            $data = \Aws\parse_ini_file($filename, true, INI_SCANNER_RAW);
            if ($data === false) {
                return self::reject("Invalid credentials file: $filename");
            }
            $profile = self::resolveProfileName(
                $data,
                $profile,
                $useProfileFallback
            );
            if (!isset($data[$profile])) {
                return self::reject("'$profile' not found in credentials file");
            }
            if (!isset($data[$profile]['credential_process'])) {
                return self::reject("No credential_process present in INI profile "
                    . "'$profile' ($filename)");
            }

            $credentialProcess = $data[$profile]['credential_process'];
            $json = shell_exec($credentialProcess);

            $processData = json_decode($json, true);

            // Only support version 1
            if (isset($processData['Version'])) {
                if ($processData['Version'] !== 1) {
                    return self::reject("credential_process does not return Version == 1");
                }
            }

            if (!isset($processData['AccessKeyId'])
                || !isset($processData['SecretAccessKey']))
            {
                return self::reject("credential_process does not return valid credentials");
            }

            if (isset($processData['Expiration'])) {
                try {
                    $expiration = new DateTimeResult($processData['Expiration']);
                } catch (\Exception $e) {
                    return self::reject("credential_process returned invalid expiration");
                }
                $now = new DateTimeResult();
                if ($expiration < $now) {
                    return self::reject("credential_process returned expired credentials");
                }
                $expires = $expiration->getTimestamp();
            } else {
                $expires = null;
            }

            if (empty($processData['SessionToken'])) {
                $processData['SessionToken'] = null;
            }

            $accountId = null;
            if (!empty($processData['AccountId'])) {
                $accountId = $processData['AccountId'];
            } elseif (!empty($data[$profile]['aws_account_id'])) {
                $accountId = $data[$profile]['aws_account_id'];
            }

            return Promise\Create::promiseFor(
                new Credentials(
                    $processData['AccessKeyId'],
                    $processData['SecretAccessKey'],
                    $processData['SessionToken'],
                    $expires,
                    $accountId,
                    CredentialSources::PROFILE_PROCESS
                )
            );
        };
    }

    /**
     * Resolves the alternate config-file form of a profile section.
     *
     * @param array  $data
     * @param string $profile
     * @param bool   $useProfileFallback
     *
     * @return string
     */
    private static function resolveProfileName(
        array $data,
        string $profile,
        bool $useProfileFallback
    ): string
    {
        if (isset($data[$profile])
            || !$useProfileFallback
            || strpos($profile, 'profile ') !== 0
        ) {
            return $profile;
        }

        $fallbackProfile = substr($profile, strlen('profile '));

        return isset($data[$fallbackProfile]) ? $fallbackProfile : $profile;
    }

    /**
     * Login credential provider for AWS local development using console credentials
     *
     * @param string|null $profileName profile containing your console login session information
     * @param array $config region used for refresh requests.
     *                      pass `'region' => <your_region>` to configure a region,
     *                      otherwise, provider construction falls back to AWS_REGION,
     *                      then the profile specified for `login`
     *
     * @return callable
     */
    public static function login(
        ?string $profileName = null,
        array $config = [],
    ): callable
    {
        $resolvedProfile = $profileName ?? getenv(self::ENV_PROFILE) ?: 'default';

        return static function () use ($resolvedProfile, $config) {
            try {
                $provider = new LoginCredentialProvider(
                    $resolvedProfile,
                    $config['region'] ?? null
                );
            } catch (\Exception $e) {
                return self::reject(
                    "Failed to initialize login credential provider for profile '{$resolvedProfile}': " 
                    . $e->getMessage()
                );
            }

            return $provider();
        };
    }

    /**
     * Assumes role for profile that includes role_arn
     *
     * @return callable
     */
    private static function loadRoleProfile(
        $profiles,
        $profileName,
        $filename,
        $stsClient,
        $config = []
    ) {
        $roleProfile = $profiles[$profileName];
        $roleArn = $roleProfile['role_arn'] ?? '';
        $roleSessionName = $roleProfile['role_session_name']
            ?? 'aws-sdk-php-' . round(microtime(true) * 1000);

        if (empty($roleProfile['source_profile'])
            == empty($roleProfile['credential_source'])
        ) {
            return self::reject("Either source_profile or credential_source must be set " .
                "using profile " . $profileName . ", but not both."
            );
        }

        $sourceProfileName = "";
        if (!empty($roleProfile['source_profile'])) {
            $sourceProfileName = $roleProfile['source_profile'];
            if (!isset($profiles[$sourceProfileName])) {
                return self::reject("source_profile " . $sourceProfileName
                    . " using profile " . $profileName . " does not exist"
                );
            }
            if (isset($config['visited_profiles']) &&
                in_array($roleProfile['source_profile'], $config['visited_profiles'])
            ) {
                return self::reject("Circular source_profile reference found.");
            }
            $config['visited_profiles'] [] = $roleProfile['source_profile'];
        } else {
            if (empty($roleArn)) {
                return self::reject(
                    "A role_arn must be provided with credential_source in " .
                    "file {$filename} under profile {$profileName} "
                );
            }
        }

        if (empty($stsClient)) {
            $config['preferStaticCredentials'] = true;
            $sourceCredentials = null;
            if (!empty($roleProfile['source_profile'])){
                $sourceCredentials = call_user_func(
                    CredentialProvider::ini($sourceProfileName, $filename, $config)
                )->wait();
            } else {
                $sourceCredentials = self::getCredentialsFromSource(
                    $profileName,
                    $filename
                );
            }

            $region = $profiles[$sourceProfileName]['region']
                ?? $config['region']
                ?? getEnv(self::ENV_REGION)
                ?: null;

            $stsClient = self::createDefaultStsClient($sourceCredentials, $region);
        }

        try {
            $result = $stsClient->assumeRole([
                'RoleArn' => $roleArn,
                'RoleSessionName' => $roleSessionName
            ]);
        } catch (AwsException $e) {
            $isNonRecoverable = in_array(
                $e->getAwsErrorCode(),
                NonRecoverableCredentialsException::STS_NON_RECOVERABLE_ERROR_CODES,
                true
            );
            if ($isNonRecoverable) {
                throw new NonRecoverableCredentialsException(
                    'Error in retrieving assume role credentials.',
                    0,
                    $e
                );
            }
            throw $e;
        }

        $credentials = $stsClient->createCredentials(
            $result,
            CredentialSources::STS_ASSUME_ROLE
        );

        return Promise\Create::promiseFor($credentials);
    }

    /**
     * Gets the environment's HOME directory if available.
     *
     * @return null|string
     */
    public static function getHomeDir()
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
    public static function loadProfiles($filename)
    {
        $profileData = \Aws\parse_ini_file($filename, true, INI_SCANNER_RAW);

        // If loading .aws/credentials, also load .aws/config when AWS_SDK_LOAD_NONDEFAULT_CONFIG is set
        if ($filename === self::getHomeDir() . '/.aws/credentials'
            && getenv('AWS_SDK_LOAD_NONDEFAULT_CONFIG')
        ) {
            $configFilename = self::getConfigFileName();
            $configProfileData = \Aws\parse_ini_file($configFilename, true, INI_SCANNER_RAW);
            foreach ($configProfileData as $name => $profile) {
                // standardize config profile names
                $name = str_replace('profile ', '', $name);
                if (!isset($profileData[$name])) {
                    $profileData[$name] = $profile;
                }
            }
        }

        return $profileData;
    }

    /**
     * Gets profiles from ~/.aws/credentials and ~/.aws/config ini files
     */
    private static function loadDefaultProfiles()
    {
        $profiles = [];
        $credFile = self::getHomeDir() . '/.aws/credentials';
        $configFile = self::getHomeDir() . '/.aws/config';
        if (file_exists($credFile)) {
            $profiles = \Aws\parse_ini_file($credFile, true, INI_SCANNER_RAW);
        }

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

    public static function getCredentialsFromSource(
        $profileName = '',
        $filename = '',
        $config = []
    ) {
        $data = self::loadProfiles($filename);
        $credentialSource = !empty($data[$profileName]['credential_source'])
            ? $data[$profileName]['credential_source']
            : null;
        $credentialsPromise = null;

        switch ($credentialSource) {
            case 'Environment':
                $credentialsPromise = self::env();
                break;
            case 'Ec2InstanceMetadata':
                $credentialsPromise = self::instanceProfile($config);
                break;
            case 'EcsContainer':
                $credentialsPromise = self::ecsCredentials($config);
                break;
            default:
                throw new CredentialsException(
                    "Invalid credential_source found in config file: {$credentialSource}. Valid inputs "
                    . "include Environment, Ec2InstanceMetadata, and EcsContainer."
                );
        }

        $credentialsResult = null;
        try {
            $credentialsResult = $credentialsPromise()->wait();
        } catch (\Exception $reason) {
            return self::reject(
                "Unable to successfully retrieve credentials from the source specified in the"
                . " credentials file: {$credentialSource}; failure message was: "
                . $reason->getMessage()
            );
        }
        return function () use ($credentialsResult) {
            return Promise\Create::promiseFor($credentialsResult);
        };
    }

    private static function reject($msg)
    {
        return new Promise\RejectedPromise(new CredentialsException($msg));
    }

    /**
     * Builds a rejected promise carrying a non-recoverable credentials error,
     * used for failures that require customer action (e.g., an expired or
     * invalid cached SSO token). The caching layer raises these immediately
     * without applying the refresh backoff.
     *
     * @param string $msg
     *
     * @return Promise\RejectedPromise
     */
    private static function rejectNonRecoverable($msg)
    {
        return new Promise\RejectedPromise(
            new NonRecoverableCredentialsException($msg)
        );
    }

    /**
     * Locates shared configuration file by first checking for AWS_CONFIG,
     * then falling back to the default location.  Returns the path of the
     * resolved configuration file.
     *
     * @return string
     */
    public static function getConfigFileName(): string
    {
        return getenv(self::ENV_CONFIG_FILE) ?: self::getHomeDir() . '/.aws/config';
    }

    /**
     *  Locates credentials file by first checking for AWS_SHARED_CREDENTIALS_FILE,
     *  then falling back to the default location.  Returns the path of the
     *  resolved credentials file.
     *
     * @param $filename
     * @return string
     */
    public static function getCredentialsFileName($filename): string
    {
        if (!isset($filename)) {
            $filename = getenv(self::ENV_SHARED_CREDENTIALS_FILE) ?:
                (self::getHomeDir() . '/.aws/credentials');
        }

        return $filename;
    }

    /**
     * @return boolean
     */
    public static function shouldUseEcs()
    {
        //Check for relative uri. if not, then full uri.
        //fall back to server for each as getenv is not thread-safe.
        return !empty(getenv(EcsCredentialProvider::ENV_URI))
            || !empty($_SERVER[EcsCredentialProvider::ENV_URI])
            || !empty(getenv(EcsCredentialProvider::ENV_FULL_URI))
            || !empty($_SERVER[EcsCredentialProvider::ENV_FULL_URI]);
    }

    /**
     * @param $profiles
     * @param $ssoProfileName
     * @param $filename
     * @param $config
     * @return Promise\PromiseInterface
     */
    private static function getSsoCredentials($profiles, $ssoProfileName, $filename, $config)
    {
        if (empty($config['ssoOidcClient'])) {
            $ssoProfile = $profiles[$ssoProfileName];
            $sessionName = $ssoProfile['sso_session'];
            if (empty($profiles['sso-session ' . $sessionName])) {
                return self::reject(
                    "Could not find sso-session {$sessionName} in {$filename}"
                );
            }
            $ssoSession = $profiles['sso-session ' . $ssoProfile['sso_session']];
            $ssoOidcClient = new Aws\SSOOIDC\SSOOIDCClient([
                'region' => $ssoSession['sso_region'],
                'version' => '2019-06-10',
                'credentials' => false
            ]);
        } else {
            $ssoOidcClient = $config['ssoClient'];
        }

        $tokenPromise = new Aws\Token\SsoTokenProvider(
            $ssoProfileName,
            $filename,
            $ssoOidcClient
        );
        try {
            $token = $tokenPromise()->wait();
        } catch (TokenException $e) {
            // The cached SSO token is missing, expired, or malformed, detected
            // client-side before calling GetRoleCredentials.
            return new Promise\RejectedPromise(
                new NonRecoverableCredentialsException(
                    "Unable to load SSO token for profile {$ssoProfileName}; "
                    . "the SSO token is missing, expired, or invalid. "
                    . "Please run `aws sso login`.",
                    0,
                    $e
                )
            );
        }
        $ssoCredentials = CredentialProvider::getCredentialsFromSsoService(
            $ssoProfile,
            $ssoSession['sso_region'],
            $token->getToken(),
            $config
        );

        //Expiration value is returned in epoch milliseconds. Conversion to seconds
        $expiration = intdiv($ssoCredentials['expiration'], 1000);
        return Promise\Create::promiseFor(
            new Credentials(
                $ssoCredentials['accessKeyId'],
                $ssoCredentials['secretAccessKey'],
                $ssoCredentials['sessionToken'],
                $expiration,
                $ssoProfile['sso_account_id'],
                CredentialSources::PROFILE_SSO
            )
        );
    }

    /**
     * @param $profiles
     * @param $ssoProfileName
     * @param $filename
     * @param $config
     * @return Promise\PromiseInterface
     */
    private static function getSsoCredentialsLegacy($profiles, $ssoProfileName, $filename, $config)
    {
        $ssoProfile = $profiles[$ssoProfileName];
        if (empty($ssoProfile['sso_start_url'])
            || empty($ssoProfile['sso_region'])
            || empty($ssoProfile['sso_account_id'])
            || empty($ssoProfile['sso_role_name'])
        ) {
            return self::reject(
                "Profile {$ssoProfileName} in {$filename} must contain the following keys: "
                . "sso_start_url, sso_region, sso_account_id, and sso_role_name."
            );
        }
        $tokenLocation = self::getHomeDir()
            . '/.aws/sso/cache/'
            . sha1($ssoProfile['sso_start_url'])
            . ".json";

        if (!@is_readable($tokenLocation)) {
            return self::rejectNonRecoverable("Unable to read token file at $tokenLocation");
        }
        $tokenData = json_decode(file_get_contents($tokenLocation), true);
        if (empty($tokenData['accessToken']) || empty($tokenData['expiresAt'])) {
            return self::rejectNonRecoverable(
                "Token file at {$tokenLocation} must contain an access token and an expiration"
            );
        }
        try {
            $expiration = (new DateTimeResult($tokenData['expiresAt']))->getTimestamp();
        } catch (\Exception $e) {
            return self::rejectNonRecoverable("Cached SSO credentials returned an invalid expiration");
        }
        $now = time();
        if ($expiration < $now) {
            return self::rejectNonRecoverable("Cached SSO credentials returned expired credentials");
        }
        $ssoCredentials = CredentialProvider::getCredentialsFromSsoService(
            $ssoProfile,
            $ssoProfile['sso_region'],
            $tokenData['accessToken'],
            $config
        );
        return Promise\Create::promiseFor(
            new Credentials(
                $ssoCredentials['accessKeyId'],
                $ssoCredentials['secretAccessKey'],
                $ssoCredentials['sessionToken'],
                $expiration,
                $ssoProfile['sso_account_id'],
                CredentialSources::PROFILE_SSO_LEGACY
            )
        );
    }
    /**
     * @param array $ssoProfile
     * @param string $clientRegion
     * @param string $accessToken
     * @param array $config
     * @return array|null
     */
    private static function getCredentialsFromSsoService($ssoProfile, $clientRegion, $accessToken, $config)
    {
        if (empty($config['ssoClient'])) {
            $ssoClient = new Aws\SSO\SSOClient([
                'region' => $clientRegion,
                'version' => '2019-06-10',
                'credentials' => false
            ]);
        } else {
            $ssoClient = $config['ssoClient'];
        }
        $ssoResponse = null;
        try {
            $ssoResponse = $ssoClient->getRoleCredentials([
                'accessToken' => $accessToken,
                'accountId' => $ssoProfile['sso_account_id'],
                'roleName' => $ssoProfile['sso_role_name']
            ]);
        } catch (AwsException $e) {
            if ($e->getAwsErrorCode() === 'UnauthorizedException') {
                throw new NonRecoverableCredentialsException(
                    "SSO GetRoleCredentials was unauthorized; the SSO token is "
                    . "invalid or expired. Please run `aws sso login`.",
                    0,
                    $e
                );
            }
            throw $e;
        }

        $ssoCredentials = $ssoResponse['roleCredentials'];
        return $ssoCredentials;
    }

    /**
     * @param CredentialsInterface $credentials
     * @param string|null $region
     *
     * @return StsClient
     */
    private static function createDefaultStsClient(
        CredentialsInterface|callable $credentials,
        ?string $region
    ): StsClient
    {
        if (empty($region)) {
            $region = self::FALLBACK_REGION;
            trigger_error(
                'NOTICE: STS client created without explicit `region` configuration.' . PHP_EOL
                . "Defaulting to `{$region}`. This fallback behavior may be removed." . PHP_EOL
                . 'To avoid potential disruptions, configure a `region` using one of the following methods:' . PHP_EOL
                . '(1) Add `region` to your source profile in ~/.aws/credentials,' . PHP_EOL
                . '(2) Pass `region` in the `$config` array when calling the provider,' . PHP_EOL
                . '(3) Set the `AWS_REGION` environment variable.' . PHP_EOL
                . 'See: https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials_assume_role.html#assume-role-with-profile'
                . PHP_EOL,
                E_USER_NOTICE
            );
        }

        return new StsClient([
            'credentials' => $credentials,
            'region' => $region
        ]);
    }
}

