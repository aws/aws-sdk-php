<?php
namespace Aws\Credentials;

use Aws\Service\InstanceMetadataClient;

/**
 * Basic implementation of the AWSCredentials interface that allows callers to
 * pass in the AWS access key and secret access in the constructor.
 */
class Credentials implements CredentialsInterface
{
    const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    const ENV_SECRET = 'AWS_SECRET_ACCESS_KEY';
    const ENV_PROFILE = 'AWS_PROFILE';

    /** @var string AWS Access key ID */
    private $key;

    /** @var string AWS Secret access key */
    private $secret;

    /** @var string Security token */
    private $token;

    /** @var int Time to die of token */
    private $expires;

    /**
     * Factory method for creating new credentials. This factory method will
     * create the appropriate credentials object based on the passed
     * configuration options.
     *
     * @param array $config Options to use when instantiating the credentials
     *
     * @return self
     */
    public static function factory($config = [])
    {
        // Create the credentials object
        if (!isset($config['key']) || !isset($config['secret'])) {
            return self::createFromEnvironment();
        }

        return new static(
            $config['key'],
            $config['secret'],
            isset($config['token']) ? $config['token'] : null,
            isset($config['expires']) ? $config['expires'] : null
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

    public function toArray()
    {
        return [
            'key'     => $this->key,
            'secret'  => $this->secret,
            'token'   => $this->token,
            'expires' => $this->expires
        ];
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
        if (!$filename) {
            $filename = self::getHomeDir() . '/.aws/credentials';
        }

        if (!$profile) {
            $profile = isset($_SERVER[self::ENV_PROFILE])
                ? $_SERVER[self::ENV_PROFILE]
                : 'default';
        }

        if (!file_exists($filename)) {
            throw new \RuntimeException("Credentials file not found: $filename");
        }

        if (!($data = parse_ini_file($filename, true))) {
            throw new \RuntimeException('Invalid AWS credentials file: '
                . $filename);
        }

        if (empty($data[$profile])) {
            throw new \RuntimeException(sprintf(
                'Invalid AWS credentials profile %s in %s',
                $profile,
                $filename
            ));
        }

        return new self(
            $data[$profile]['aws_access_key_id'],
            $data[$profile]['aws_secret_access_key'],
            isset($data[$profile]['aws_security_token'])
                ? $data[$profile]['aws_security_token']
                : null
        );
    }

    /**
     * When no keys are provided, attempt to create them based on the
     * environment or instance profile credentials.
     *
     * @return CredentialsInterface
     */
    private static function createFromEnvironment()
    {
        // Check for environment variable credentials.
        if (isset($_SERVER[self::ENV_KEY]) &&
            isset($_SERVER[self::ENV_SECRET])
        ) {
            // Use credentials set in the environment variables
            return new static(
                $_SERVER[self::ENV_KEY],
                $_SERVER[self::ENV_SECRET]
            );
        }

        // Get credentials from the ini file in ~ directory if available.
        $home = self::getHomeDir();
        if ($home && file_exists("$home/.aws/credentials")) {
            return self::fromIni(null, "$home/.aws/credentials");
        }

        // Use instance profile credentials (available on EC2 instances)
        return new InstanceProfileCredentials(
            new InstanceMetadataClient(),
            new self('', '', '', 1)
        );
    }

    private static function getHomeDir()
    {
        if (isset($_SERVER['HOME'])) {
            return $_SERVER['HOME'];
        } elseif (isset($_SERVER['HOMEDRIVE']) &&
            isset($_SERVER['HOMEPATH'])
        ) {
            return $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'];
        }

        return null;
    }
}
