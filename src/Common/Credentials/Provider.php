<?php
namespace Aws\Common\Credentials;

use Aws\Common\Exception\CredentialsException;

/**
 * Credential provider functions provide credentials or null when invoked.
 *
 * This allows you compose credential provider functions to create shareable
 * conditional logic used to load credentials in different environments.
 */
class Provider
{
    const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    const ENV_SECRET = 'AWS_SECRET_ACCESS_KEY';
    const ENV_SESSION = 'AWS_SESSION_TOKEN';
    const ENV_PROFILE = 'AWS_PROFILE';

    /**
     * Invokes a credential provider and ensures that the provider returns a
     * CredentialsInterface object.
     *
     * @param callable $provider Credential provider function
     *
     * @return CredentialsInterface
     * @throws CredentialsException
     */
    public static function resolve(callable $provider)
    {
        if (!$result = $provider()) {
            throw new CredentialsException('Could not load credentials.');
        }

        return $result;
    }

    /**
     * Credential provider that attempts to load credentials from multiple
     * credential providers.
     *
     *     // Providers are supplied using variadic arguments.
     *     $provider = Provider::chain(
     *         Provider::ini(),
     *         Provider::env()
     *     );
     *     $credsOrNull = $provider();
     *
     * @param callable ... Credential providers pass as variadic arguments.
     *
     * @return callable
     */
    public static function chain()
    {
        $providers = func_get_args();
        return function () use ($providers) {
            foreach ($providers as $provider) {
                $result = $provider();
                if ($result instanceof CredentialsInterface) {
                    return $result;
                }
            }
            return null;
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
            return $key && $secret
                ? new Credentials($key, $secret, getenv(self::ENV_SESSION))
                : null;
        };
    }

    /**
     * Credential provider that creates credentials using instance profile
     * credentials.
     *
     * @param array $config Array of configuration data.
     *
     * @return InstanceProfileProvider
     * @see Aws\Common\Credentials\InstanceProfileProvider for $config details.
     */
    public static function instanceProfile(array $config = [])
    {
        return new InstanceProfileProvider($config);
    }

    /**
     * Credentials provider that creates credentials using an ini file stored
     * in the current user's home directory.
     *
     * @param string|null $profile  Profile to use. If not specified will use
     *                              the "default" profile.
     * @param string|null $filename If provided, uses a custom filename rather
     *                              than looking in the home directory for the
     *
     * @return callable
     */
    public static function ini($profile = null, $filename = null)
    {
        $filename = $filename ?: (self::getHomeDir() . '/.aws/credentials');
        $profile = $profile ?: (getenv(self::ENV_PROFILE) ?: 'default');

        return function () use ($profile, $filename) {
            if (!file_exists($filename)) {
                return null;
            }
            if (!is_readable($filename)) {
                throw new CredentialsException("Cannot read credentials from $filename");
            }
            if (!($data = parse_ini_file($filename, true))) {
                throw new CredentialsException("Invalid credentials file: {$filename}");
            }
            if (!isset($data[$profile]['aws_access_key_id'])
                || !isset($data[$profile]['aws_secret_access_key'])
            ) {
                return null;
            }
            return new Credentials(
                $data[$profile]['aws_access_key_id'],
                $data[$profile]['aws_secret_access_key'],
                isset($data[$profile]['aws_security_token'])
                    ? $data[$profile]['aws_security_token']
                    : null
            );
        };
    }

    /**
     * Wraps a credentials provider and caches previously provided credentials.
     *
     * Ensures that cached credentials are refreshed when they expire.
     *
     * @param callable $provider Credentials provider function to wrap.
     *
     * @return callable
     */
    public static function memoize(callable $provider)
    {
        $result = null;
        return function () use (&$result, $provider) {
            if (!$result || ($result && $result->isExpired())) {
                $result = $provider();
            }
            return $result;
        };
    }

    /**
     * Create a default credentials provider that first checks for environment
     * variables, then checks for the "default" profile in ~/.aws/credentials,
     * and finally checks for credentials using EC2 instance profile
     * credentials.
     *
     * @param array $config Optional array of instance profile credentials
     *                      provider options.
     * @return callable
     */
    public static function defaultProvider(array $config = [])
    {
        return self::chain(
            self::env(),
            self::ini(),
            self::instanceProfile($config)
        );
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
}
