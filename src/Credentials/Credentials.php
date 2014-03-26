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

use Aws\Common\Enum\ClientOptions as Options;
use GuzzleHttp\Collection;

/**
 * Basic implementation of the AWSCredentials interface that allows callers to
 * pass in the AWS access key and secret access in the constructor.
 */
class Credentials implements CredentialsInterface
{
    const ENV_KEY = 'AWS_ACCESS_KEY_ID';
    const ENV_SECRET_ACCESS_KEY = 'AWS_SECRET_ACCESS_KEY';

    /** @var string AWS Access key ID */
    private $key;

    /** @var string AWS Secret access key */
    private $secret;

    /** @var string Security token */
    private $token;

    /** @var int Time to die of token */
    private $ttd;

    /**
     * Get the available keys for the factory method
     *
     * @return array
     */
    public static function getConfigDefaults()
    {
        return [
            Options::KEY       => null,
            Options::SECRET    => null,
            Options::TOKEN     => null,
            Options::TOKEN_TTD => null
        ];
    }

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
        // Add default key values
        foreach (self::getConfigDefaults() as $key => $value) {
            if (!isset($config[$key])) {
                $config[$key] = $value;
            }
        }

        // Create the credentials object
        if (!$config['key'] || !$config['secret']) {
            $credentials = self::createFromEnvironment($config);
        } else {
            $credentials = new static(
                $config['key'],
                $config['secret'],
                $config['token'],
                $config['token.ttd']
            );
        }

        return $credentials;
    }

    /**
     * Constructs a new BasicAWSCredentials object, with the specified AWS
     * access key and AWS secret key
     *
     * @param string $key        AWS access key ID
     * @param string $secret     AWS secret access key
     * @param string $token      Security token to use
     * @param int    $expiration UNIX timestamp for when credentials expire
     */
    public function __construct(
        $key,
        $secret,
        $token = null,
        $expiration = null
    ) {
        $this->key = trim($key);
        $this->secret = trim($secret);
        $this->token = $token;
        $this->ttd = $expiration;
    }

    public function toArray()
    {
        return [
            'key'       => $this->key,
            'secret'    => $this->secret,
            'token'     => $this->token,
            'token.ttd' => $this->ttd
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
        return $this->ttd;
    }

    public function isExpired()
    {
        return $this->ttd !== null && time() >= $this->ttd;
    }

    /**
     * When no keys are provided, attempt to create them based on the
     * environment or instance profile credentials.
     *
     * @param array|Collection $config
     *
     * @return CredentialsInterface
     */
    private static function createFromEnvironment($config)
    {
        $envKey = isset($_SERVER[self::ENV_KEY])
            ? $_SERVER[self::ENV_KEY]
            : getenv(self::ENV_KEY);

        $envSecret = isset($_SERVER[self::ENV_SECRET_ACCESS_KEY])
            ? $_SERVER[self::ENV_SECRET_ACCESS_KEY]
            : getenv(self::ENV_SECRET_ACCESS_KEY);

        if ($envKey && $envSecret) {
            // Use credentials set in the environment variables
            $credentials = new static($envKey, $envSecret);
        } else {
            // Use instance profile credentials (available on EC2 instances)
            $credentials = new RefreshableInstanceProfileCredentials(
                new static('', '', '', 1),
                $config[Options::CREDENTIALS_CLIENT]
            );
        }

        return $credentials;
    }
}
