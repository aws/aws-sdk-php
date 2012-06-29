<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Common\Credentials;

use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\RuntimeException;
use Guzzle\Http\ClientInterface;
use Guzzle\Common\FromConfigInterface;
use Guzzle\Common\Cache\CacheAdapterInterface;
use Guzzle\Common\Cache\DoctrineCacheAdapter;
use Guzzle\Common\Cache\CacheAdapterFactory;
use Doctrine\Common\Cache\ApcCache;

/**
 * Basic implementation of the AWSCredentials interface that allows callers to
 * pass in the AWS access key and secret access in the constructor.
 */
class Credentials implements CredentialsInterface, FromConfigInterface
{
    /**
     * @var string AWS Access key ID
     */
    protected $key;

    /**
     * @var string AWS Secret access key
     */
    protected $secret;

    /**
     * @var string Security token
     */
    protected $token;

    /**
     * @var int Time to die of token
     */
    protected $ttd;

    /**
     * Get the available keys for the factory method
     *
     * @return array
     */
    public static function getConfigDefaults()
    {
        return array(
            'access_key_id'              => null,
            'secret_access_key'          => null,
            'token'                      => null,
            'token.ttd'                  => null,
            'token.refresh_duration'     => 43200,
            'credentials.cache'          => null,
            'credentials.cache.key'      => null,
            'credentials.cache.adapter'  => null,
            'credentials.cache.provider' => null,
            'credentials.client'         => null,
            'credentials.refresh_with'   => null
        );
    }

    /**
     * Factory method for creating new credentials.  This factory method will
     * create the appropriate credentials object with appropriate decorators
     * based on the passed configuration options.
     *
     * @param array $config Options to use when instantiating the credentials
     *
     * @return CredentialsInterface
     */
    public static function factory($config = array())
    {
        // Add default key values
        foreach (self::getConfigDefaults() as $key => $value) {
            if (!isset($config[$key])) {
                $config[$key] = $value;
            }
        }

        // Start tracking the cache key
        $cacheKey = $config['credentials.cache.key'];

        // Ensure that the client is actually a client
        if ($config['credentials.client'] && !($config['credentials.client'] instanceof ClientInterface)) {
            throw new InvalidArgumentException(
                'The "credentials.client" credentials option must be an instance of Guzzle\Service\ClientInterface'
            );
        }

        if (!$config['access_key_id'] || !$config['secret_access_key']) {

            // No keys were provided, so create a new credentials object that is
            // automatically expired and uses instance profile credentials.
            $credentials = new RefreshableInstanceProfileCredentials(
                new static('', '', '', 1),
                $config['credentials.client']
            );

            // If no cache key was set, use the crc32 hostname of the server
            $cacheKey = $cacheKey ?: 'credentials_' . crc32(gethostname());

        } else {

            // If no cache key was set, use the access key ID
            $cacheKey = $cacheKey ?: 'credentials_' . $config['access_key_id'];
            // Instantiate using short or long term credentials
            $credentials = new static(
                $config['access_key_id'],
                $config['secret_access_key'],
                $config['token'],
                $config['token.ttd']
            );
        }

        // Check if the credentials are refreshable, and if so, configure caching
        if ($cacheKey && $config['credentials.cache']) {

            if ($config['credentials.cache'] instanceof CacheAdapterInterface) {
                // The user explicitly provided a cache adapter
                $cache = $config['credentials.cache'];
            } elseif ($config['credentials.cache.adapter'] instanceof CacheAdapterInterface) {
                $cache = $config['credentials.cache.adapter'];
            } elseif (!$config['credentials.cache.adapter']) {
                // If no cache adapter was provided, then create one for the user
                // @codeCoverageIgnoreStart
                if (extension_loaded('apc')) {
                    $cache = new DoctrineCacheAdapter(new ApcCache());
                } else {
                    throw new RuntimeException('PHP has not been compiled with APC. Unable to cache credentials.');
                }
                // @codeCoverageIgnoreEnd
            } elseif (is_string($config['credentials.cache.adapter'])) {
                // Create a cache adapter using Guzzle's cache adapter factory
                // need to remove the credentials.* prefix
                $cacheOptions = array();
                foreach ($config as $key => $value) {
                    if (strpos($key, 'cache')) {
                        $key = str_replace('credentials.', '', $key);
                        $cacheOptions[$key] = $value;
                    }
                }
                $cache = CacheAdapterFactory::factory($cacheOptions);
            } else {
                throw new InvalidArgumentException('Unable to utilize caching with the specified options');
            }

            // Decorate the credentials with a cache
            $credentials = new CacheableCredentials($credentials, $cache, $cacheKey);
        }

        return $credentials;
    }

    /**
     * Constructs a new BasicAWSCredentials object, with the specified AWS
     * access key and AWS secret key
     *
     * @param string $accessKeyId     AWS access key ID
     * @param string $secretAccessKey AWS secret access key
     * @param string $token           Security token to use
     * @param int    $expiration      UNIX timestamp for when credentials expire
     */
    public function __construct($accessKeyId, $secretAccessKey, $token = null, $expiration = null)
    {
        $this->key = trim($accessKeyId);
        $this->secret = trim($secretAccessKey);
        $this->token = $token;
        $this->ttd = $expiration;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return json_encode(array(
            'key'       => $this->key,
            'secret'    => $this->secret,
            'token'     => $this->token,
            'token.ttd' => $this->ttd
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $data = json_decode($serialized, true);
        $this->key = $data['key'];
        $this->secret = $data['secret'];
        $this->token = $data['token'];
        $this->ttd = $data['token.ttd'];
    }

    /**
     * {@inheritdoc}
     */
    public function getAccessKeyId()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function getSecretKey()
    {
        return $this->secret;
    }

    /**
     * {@inheritdoc}
     */
    public function getSecurityToken()
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpiration()
    {
        return $this->ttd;
    }

    /**
     * {@inheritdoc}
     */
    public function isExpired()
    {
        return $this->ttd !== null && time() >= $this->ttd;
    }

    /**
     * {@inheritdoc}
     */
    public function setAccessKeyId($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setSecretKey($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setSecurityToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setExpiration($timestamp)
    {
        $this->ttd = $timestamp;

        return $this;
    }
}
