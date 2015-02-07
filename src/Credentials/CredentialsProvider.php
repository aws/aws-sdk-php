<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use Aws\Exception\UnresolvedCredentialsException;
use Aws\Utils;

/**
 * Credentials providers are functions that create credentials and can be
 * composed to create credentials using conditional logic that can create
 * different credentials in different environments.
 *
 * A credentials provider is a function that accepts no arguments and returns
 * {@see CredentialsInterface} object on success or NULL if no credentials can
 * be created. Note: exceptions MAY be thrown in credentials providers if
 * necessary though this should only be the result of an error (e.g., malformed
 * file, bad permissions, etc.) and not the result of missing credentials.
 *
 * You can wrap your calls to a credentials provider with the
 * {@see CredentialsProvider::resolve} function to ensure that a credentials
 * object is created. If a credentials object is not created, then the
 * resolve() function will throw a {@see Aws\Exception\UnresolvedCredentialsException}.
 *
 *     use Aws\Credentials\CredentialsProvider;
 *     $provider = CredentialsProvider::defaultProvider();
 *     // Returns a CredentialsInterface or NULL.
 *     $creds = $provider();
 *     // Returns a CredentialsInterface or throws.
 *     $creds = CredentialsProvider::resolve($provider);
 *
 * You can compose multiple providers into a single provider using
 * {@see Aws\Utils::orFn}. This function accepts providers as arguments and
 * returns a new function that will invoke each provider until a non-null value
 * is returned.
 *
 *     // First try an INI file at this location.
 *     $a = CredentialsProvider::ini(null, '/path/to/file.ini');
 *     // Then try an INI file at this location.
 *     $b = CredentialsProvider::ini(null, '/path/to/other-file.ini');
 *     // Then try loading from envrionment variables.
 *     $c = CredentialsProvider::env();
 *     // Combine the three providers together.
 *     $composed = Aws\Utils::orFn($a, $b, $c);
 *     // Returns creds or NULL
 *     $creds = $composed();
 *     // Returns creds or throws.
 *     $creds = CredentialsProvider::resolve($composed);
 */
class CredentialsProvider
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
        $result = $provider();
        if ($result instanceof CredentialsInterface) {
            return $result;
        }

        throw new UnresolvedCredentialsException('Could not load credentials');
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
     * @see Aws\Credentials\InstanceProfileProvider for $config details.
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
            if (!$result || $result->isExpired()) {
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
        return Utils::orFn(
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
