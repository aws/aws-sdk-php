<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Credentials;

use Aws\Service\InstanceMetadataClient;

/**
 * Basic implementation of the AWSCredentials interface that allows callers to
 * pass in the AWS access key and secret access in the constructor.
 */
class Credentials implements CredentialsInterface
{
    const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    const ENV_SECRET_ACCESS_KEY = 'AWS_SECRET_ACCESS_KEY';
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
     * Factory method for creating new credentials.  This factory method will
     * create the appropriate credentials object with appropriate decorators
     * based on the passed configuration options.
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
     * When no keys are provided, attempt to create them based on the
     * environment or instance profile credentials.
     *
     * @return CredentialsInterface
     */
    private static function createFromEnvironment()
    {
        // Check for environment variable credentials.
        if (isset($_SERVER[self::ENV_KEY]) &&
            isset($_SERVER[self::ENV_SECRET_ACCESS_KEY])
        ) {
            // Use credentials set in the environment variables
            return new static(
                $_SERVER[self::ENV_KEY],
                $_SERVER[self::ENV_SECRET_ACCESS_KEY]
            );
        }

        // Get credentials from the ini file in ~ directory if available.
        $home = self::getHomeDir();
        if ($home && file_exists($home . '/.aws/credentials')) {
            return self::fromIniFile($home . '/.aws/credentials');
        }

        // Use instance profile credentials (available on EC2 instances)
        return new InstanceProfileCredentials(
            new self('', '', '', 1),
            new InstanceMetadataClient()
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

    private static function fromIniFile($filename)
    {
        if (!($data = parse_ini_file($filename, true))) {
            throw new \RuntimeException('Invalid AWS credentials file: '
                . $filename);
        }

        $profile = isset($_SERVER[self::ENV_PROFILE])
            ? $_SERVER[self::ENV_PROFILE]
            : 'default';

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
}
