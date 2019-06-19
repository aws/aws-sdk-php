<?php
namespace Aws\Credentials;

use Aws;
use Aws\Api\DateTimeResult;
use Aws\CacheInterface;
use Aws\Exception\CredentialsException;
use Aws\Sts\StsClient;
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
     * variables, then checks for the "default" profile in ~/.aws/credentials,
     * then checks for "profile default" profile in ~/.aws/config (which is
     * the default profile of AWS CLI), then tries to make a GET Request to
     * fetch credentials if Ecs environment variable is presented, then checks
     * for credential_process in the "default" profile in ~/.aws/credentials,
     * then for credential_process in the "default profile" profile in
     * ~/.aws/config, and finally checks for EC2 instance profile credentials.
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
        $localCredentialProviders = self::localCredentialProviders();
        $remoteCredentialProviders = self::remoteCredentialProviders($config);

        return self::memoize(
            call_user_func_array(
                'self::chain',
                array_merge($localCredentialProviders, $remoteCredentialProviders)
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
                })
                ->otherwise(function($reason) use (&$result) {
                    // Cleanup rejected promise.
                    $result = null;
                    return new Promise\RejectedPromise($reason);
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
                    new Credentials($key, $secret, getenv(self::ENV_SESSION) ?: NULL)
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
     * Credentials provider that creates credentials using an ini file stored
     * in the current user's home directory.
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
        $filename = $filename ?: (self::getHomeDir() . '/.aws/credentials');
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: 'default');

        return function () use ($profile, $filename, $config) {
            $preferStaticCredentials = isset($config['preferStaticCredentials'])
                ? $config['preferStaticCredentials']
                : false;
            $disableAssumeRole = isset($config['disableAssumeRole'])
                ? $config['disableAssumeRole']
                : false;
            $stsClient = isset($config['stsClient']) ? $config['stsClient'] : null;

            if (!is_readable($filename)) {
                return self::reject("Cannot read credentials from $filename");
            }
            $data = self::loadProfiles($filename);
            if ($data === false) {
                return self::reject("Invalid credentials file: $filename");
            }
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
                    $stsClient
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

            return Promise\promise_for(
                new Credentials(
                    $data[$profile]['aws_access_key_id'],
                    $data[$profile]['aws_secret_access_key'],
                    $data[$profile]['aws_session_token']
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
        $filename = $filename ?: (self::getHomeDir() . '/.aws/credentials');
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: 'default');

        return function () use ($profile, $filename) {
            if (!is_readable($filename)) {
                return self::reject("Cannot read process credentials from $filename");
            }
            $data = \Aws\parse_ini_file($filename, true, INI_SCANNER_RAW);
            if ($data === false) {
                return self::reject("Invalid credentials file: $filename");
            }
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
            } else {
                $processData['Expiration'] = null;
            }

            if (empty($processData['SessionToken'])) {
                $processData['SessionToken'] = null;
            }

            return Promise\promise_for(
                new Credentials(
                    $processData['AccessKeyId'],
                    $processData['SecretAccessKey'],
                    $processData['SessionToken'],
                    $processData['Expiration']
                )
            );
        };
    }

    /**
     * Assumes role for profile that includes role_arn
     *
     * @return callable
     */
    private static function loadRoleProfile($profiles, $profileName, $filename, $stsClient)
    {
        $roleProfile = $profiles[$profileName];
        $roleArn = isset($roleProfile['role_arn']) ? $roleProfile['role_arn'] : '';
        $roleSessionName = isset($roleProfile['role_session_name'])
            ? $roleProfile['role_session_name']
            : 'aws-sdk-php-' . round(microtime(true) * 1000);

        if (empty($profiles[$profileName]['source_profile'])) {
            return self::reject("source_profile is not set using profile " .
                $profileName
            );
        }

        $sourceProfileName = $roleProfile['source_profile'];
        if (!isset($profiles[$sourceProfileName])) {
            return self::reject("source_profile " . $sourceProfileName
                . " using profile " . $profileName . " does not exist"
            );
        }
        $sourceRegion = isset($profiles[$sourceProfileName]['region'])
            ? $profiles[$sourceProfileName]['region']
            : 'us-east-1';

        if (empty($stsClient)) {
            $config = [
                'preferStaticCredentials' => true
            ];
            $sourceCredentials = call_user_func(
                CredentialProvider::ini($sourceProfileName, $filename, $config)
            )->wait();
            $stsClient = new StsClient([
                'credentials' => $sourceCredentials,
                'region' => $sourceRegion,
                'version' => '2011-06-15',
            ]);
        }

        $result = $stsClient->assumeRole([
            'RoleArn' => $roleArn,
            'RoleSessionName' => $roleSessionName
        ]);

        $creds = $stsClient->createCredentials($result);
        return Promise\promise_for($creds);
    }


    /**
     * Local credential providers returns a list of local credential providers
     * in following order:
     *  - credentials from environment variables
     *  - 'default' profile in '.aws/credentials' file
     *  - 'profile default' profile in '.aws/config' file
     *
     * @return array
     */
    private static function localCredentialProviders()
    {
        return [
            self::env(),
            self::ini(),
            self::ini('profile default', self::getHomeDir() . '/.aws/config')
        ];
    }

    /**
     * Remote credential providers returns a list of credentials providers
     * for the remote endpoints such as EC2 or ECS Roles.
     *
     * @param array $config Array of configuration data.
     *
     * @return array
     * @see Aws\Credentials\InstanceProfileProvider for $config details.
     * @see Aws\Credentials\EcsCredentialProvider for $config details.
     */
    private static function remoteCredentialProviders(array $config = [])
    {
        if (!empty(getenv(EcsCredentialProvider::ENV_URI))) {
            $providers['ecs'] = self::ecsCredentials($config);
        }
        $providers['process_credentials'] = self::process();
        $providers['process_config'] = self::process(
            'profile default',
            self::getHomeDir() . '/.aws/config'
        );
        $providers['instance'] = self::instanceProfile($config);

        if (isset($config['credentials'])
            && $config['credentials'] instanceof CacheInterface
        ) {
            foreach ($providers as $key => $provider) {
                $providers[$key] = self::cache(
                    $provider,
                    $config['credentials'],
                    'aws_cached_' . $key . '_credentials'
                );
            }
        }

        return $providers;
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

        // If loading .aws/credentials, also load .aws/config when AWS_SDK_LOAD_NONDEFAULT_CONFIG is set
        if ($filename === self::getHomeDir() . '/.aws/credentials'
            && getenv('AWS_SDK_LOAD_NONDEFAULT_CONFIG')
        ) {
            $configFilename = self::getHomeDir() . '/.aws/config';
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

    private static function reject($msg)
    {
        return new Promise\RejectedPromise(new CredentialsException($msg));
    }
}
