<?php
namespace Aws\Common\Credentials;

use Aws\Common\Exception\CredentialsException;

/**
 * Credential provider functions provide credentials or null when invoked. This
 * allows you compose credential provider functions to create shareable
 * conditional logic used to load credentials in different environments.
 */
class Provider
{
    /**
     * Creates a chain from an array of providers and calls the chain to
     * retrieve credentials.
     *
     * @param callable[] $providers Array of callables that return
     *                              CredentialsInterface or null.
     *
     * @return CredentialsInterface
     * @throws CredentialsException
     */
    public static function fromChain(array $providers)
    {
        if (!$result = call_user_func(self::chain($providers))) {
            throw new CredentialsException('Could not load credentials from chain');
        }

        return $result;
    }

    /**
     * Credential provider that attempts to load credentials from multiple
     * credential providers.
     *
     * @param callable[] $providers Array of credential providers.
     *
     * @return callable
     */
    public static function chain(array $providers)
    {
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
            $key = getenv(Credentials::ENV_KEY);
            $secret = getenv(Credentials::ENV_SECRET);
            return $key && $secret
                ? new Credentials($key, $secret, getenv(Credentials::ENV_SESSION))
                : null;
        };
    }

    /**
     * Credential provider that creates credentials from hardcoded values.
     *
     * @param string      $key    AWS access key ID
     * @param string      $secret AWS secret key
     * @param string|null $token  optional Session token
     *
     * @return callable
     */
    public static function hardcoded($key, $secret, $token = null)
    {
        return function () use ($key, $secret, $token) {
            return new Credentials($key, $secret, $token);
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
     * @param string|null $profile Profile to use. If not specified will use
     *                             the "default" profile.
     * @return callable
     */
    public static function ini($profile = null)
    {
        $home = self::getHomeDir();
        $profile = $profile ?: (getenv(Credentials::ENV_PROFILE) ?: 'default');

        return function () use ($home, $profile) {
            $filename = "{$home}/.aws/credentials";
            if (!$home || !file_exists($filename)) {
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
