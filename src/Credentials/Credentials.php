<?php
namespace Aws\Credentials;

use Aws\Service\InstanceMetadataClient;

/**
 * Basic implementation of the AWS Credentials interface that allows callers to
 * pass in the AWS Access Key and AWS Secret Access Key in the constructor.
 */
class Credentials implements CredentialsInterface
{
    const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    const ENV_SECRET = 'AWS_SECRET_ACCESS_KEY';
    const ENV_PROFILE = 'AWS_PROFILE';

    /** @var string AWS Access Key ID */
    private $key;

    /** @var string AWS Secret Access Key */
    private $secret;

    /** @var string AWS Security Token */
    private $token;

    /** @var int Time to die (TTD) of the token */
    private $expires;

    /**
     * Factory method for creating new credentials. This factory method will
     * create the appropriate credentials object based on the passed
     * configuration options.
     *
     * - key: Your AWS Access Key ID
     * - secret: Your AWS Secret Access Key
     * - token: An AWS Security Access Token (for temporary credentials)
     * - expires: The TTD for the credentials (for temporary credentials)
     *
     * @param array $config Options to use when instantiating the credentials
     *
     * @return self
     */
    public static function factory(array $config = [])
    {
        // Use explicitly configured credentials, if provided
        if (isset($config['key']) && isset($config['secret'])) {
            return new self(
                $config['key'],
                $config['secret'],
                isset($config['token']) ? $config['token'] : null,
                isset($config['expires']) ? $config['expires'] : null
            );
        }

        // Use credentials from environment variables, if available
        if (isset($_SERVER[self::ENV_KEY]) &&
            isset($_SERVER[self::ENV_SECRET])
        ) {
            return new self(
                $_SERVER[self::ENV_KEY],
                $_SERVER[self::ENV_SECRET]
            );
        }

        // Use credentials from the ~/.aws/credentials INI file, if available
        $home = self::getHomeDir();
        if ($home && file_exists("{$home}/.aws/credentials")) {
            return self::fromIni(null, "{$home}/.aws/credentials");
        }

        // Use IAM Instance Profile credentials, if hosted on Amazon EC2
        return new InstanceProfileCredentials(
            new InstanceMetadataClient(),
            new self('', '', '', 1)
        );
    }

    /**
     * Create credentials from the credentials ini file in the HOME directory.
     *
     * @param string|null $profile  Pass a specific profile to use. If no
     *                              profile is specified we will attempt to use
     *                              the value specified in the AWS_PROFILE
     *                              environment variable. If AWS_PROFILE is not
     *                              set, the "default" profile is used.
     * @param string|null $filename Pass a string to specify the location of the
     *                              credentials files. If null is passed, the
     *                              SDK will attempt to find the configuration
     *                              file at in your HOME directory at
     *                              ~/.aws/credentials.
     * @return Credentials
     * @throws \RuntimeException if the file cannot be found, if the file is
     *                           invalid, or if the profile is invalid.
     */
    public static function fromIni($profile = null, $filename = null)
    {
        // Determine the path to the credentials file and make sure it exists
        if (!$filename) {
            $filename = self::getHomeDir() . '/.aws/credentials';
        }
        if (!is_readable($filename)) {
            throw new \RuntimeException("Credentials file not found: {$filename}");
        }

        // Parse the credentials file
        if (!($data = parse_ini_file($filename, true))) {
            throw new \RuntimeException("Invalid credentials file: {$filename}");
        }

        // Determine the profile name and make sure it contains correct data
        if (!$profile) {
            $profile = isset($_SERVER[self::ENV_PROFILE])
                ? $_SERVER[self::ENV_PROFILE]
                : 'default';
        }
        if (empty($data[$profile])
            || !isset($data[$profile]['aws_access_key_id'])
            || !isset($data[$profile]['aws_secret_access_key'])
        ) {
            throw new \RuntimeException(
                "Invalid AWS credentials profile \"{$profile}\" in {$filename}."
            );
        }

        // Create the credentials object from the profile data
        return new self(
            $data[$profile]['aws_access_key_id'],
            $data[$profile]['aws_secret_access_key'],
            isset($data[$profile]['aws_security_token'])
                ? $data[$profile]['aws_security_token']
                : null
        );
    }

    /**
     * Constructs a new BasicAWSCredentials object, with the specified AWS
     * access key and AWS secret key
     *
     * @param string $key     AWS access key ID
     * @param string $secret  AWS secret access key
     * @param string $token   Security token to use
     * @param int    $expires UNIX timestamp for when credentials expire
     */
    public function __construct($key, $secret, $token = null, $expires = null)
    {
        $this->key = trim($key);
        $this->secret = trim($secret);
        $this->token = $token;
        $this->expires = $expires;
    }

    public function getAccessKeyId()
    {
        return $this->key;
    }

    public function getSecretKey()
    {
        return $this->secret;
    }

    public function getSecurityToken()
    {
        return $this->token;
    }

    public function getExpiration()
    {
        return $this->expires;
    }

    public function isExpired()
    {
        return $this->expires !== null && time() >= $this->expires;
    }

    public function toArray()
    {
        return [
            'key'     => $this->key,
            'secret'  => $this->secret,
            'token'   => $this->token,
            'expires' => $this->expires
        ];
    }

    /**
     * Gets the environment's HOME directory
     *
     * @return null|string
     */
    private static function getHomeDir()
    {
        // On Linux/Unix-like systems, use the HOME environment variable
        if (isset($_SERVER['HOME'])) {
            return $_SERVER['HOME'];
        }

        // Get the HOMEDRIVE and HOMEPATH values for Windows hosts
        // Note: getenv() is a fallback for case-insensitive keys on Windows
        $homeDrive = isset($_SERVER['HOMEDRIVE'])
            ? $_SERVER['HOMEDRIVE']
            : getenv('HOMEDRIVE');
        $homePath = isset($_SERVER['HOMEPATH'])
            ? $_SERVER['HOMEPATH']
            : getenv('HOMEPATH');
        return ($homeDrive && $homePath) ? $homeDrive . $homePath : null;
    }
}
