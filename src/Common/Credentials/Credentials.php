<?php
namespace Aws\Common\Credentials;

/**
 * Basic implementation of the AWS Credentials interface that allows callers to
 * pass in the AWS Access Key and AWS Secret Access Key in the constructor.
 */
class Credentials implements CredentialsInterface
{
    const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    const ENV_SECRET = 'AWS_SECRET_ACCESS_KEY';
    const ENV_SESSION = 'AWS_SESSION_TOKEN';
    const ENV_PROFILE = 'AWS_PROFILE';

    private $key;
    private $secret;
    private $token;
    private $expires;

    /**
     * Creates credentials using a hash of options or the default credentials
     * provider chain.
     *
     * If the hash does not contain 'key', and 'secret' key value pairs, then
     * credentials are loaded using the default credentials provider chain.
     *
     * - key: Your AWS Access Key ID
     * - secret: Your AWS Secret Access Key
     * - token: An AWS Security Access Token (for temporary credentials)
     * - expires: The TTD for the credentials (for temporary credentials)
     *
     * @param array $config Options to use when instantiating the credentials.
     *
     * @return CredentialsInterface
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

        return Provider::resolve(Provider::defaultProvider($config));
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
}
