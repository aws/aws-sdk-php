<?php

namespace Aws\Service;

use Aws\Api\EndpointProviderInterface;
use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Api\ApiProviderInterface;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use GuzzleHttp\Client;

/**
 * Default factory class used to create clients.
 */
class DefaultFactory
{
    /** @var array Values that are `1` have a handle_<key> function handler */
    protected $validArguments = [
        'region'            => true,
        'signature'         => true,
        'version'           => true,
        'scheme'            => true,
        'api'               => 1,
        'credentials'       => 1,
        'api_provider'      => 1,
        'client_defaults'   => 1,
        'service'           => 1,
        'endpoint_provider' => 1
    ];

    /**
     * Constructs a new factory object used for building services.
     *
     * @param array $args
     *
     * @return \Aws\AwsClientInterface
     * @throws \InvalidArgumentException
     * @see Aws\Sdk for a list of available options.
     */
    public function create(array $args = [])
    {
        static $required = ['version', 'api_provider', 'endpoint_provider',
            'service'];

        foreach ($required as $r) {
            if (!isset($args[$r])) {
                throw new \InvalidArgumentException($r . ' is required');
            }
        }

        foreach ($args as $key => $value) {
            if (!isset($this->validArguments[$key])) {
                throw new \InvalidArgumentException('Unknown argument ' . $key);
            }
            if ($this->validArguments[$key] === 1) {
                $this->{"handle_{$key}"}($value, $args);
            }
        }

        // Create a default credentials object based on the environment
        if (!isset($arg['credentials'])) {
            $args['credentials'] = Credentials::factory();
        }

        unset($args['endpoint_provider'], $args['service'], $args['version']);

        return $this->createClient($args);
    }

    /**
     * Creates a client for the given arguments.
     *
     * This method can be overridden in subclasses as needed.
     *
     * @param array $args Arguments to provide to the client.
     *
     * @return AwsClient
     */
    protected function createClient(array $args)
    {
        $client = new AwsClient($args);

        return $client;
    }

    private function handle_credentials($value, array &$args)
    {
        if ($value instanceof CredentialsInterface) {

        } elseif (is_array($value) && isset($value['key']) &&
            isset($value['secret'])
        ) {
            $args['credentials'] = Credentials::factory($value);
        } else {
            throw new \InvalidArgumentException('credentials must be an '
                . 'instance of Aws\Credentials\CredentialsInterface or an '
                . 'associative array that contains "key", "secret", and '
                . 'an optional "token" key value pairs.');
        }
    }

    private function handle_client_defaults($value, array &$args)
    {
        if (!is_array($value)) {
            throw new \InvalidArgumentException('The "client_defaults" option'
                . ' must be an array');
        }

        $args['client'] = new Client(['defaults' => $value]);
        unset($args['client_defaults']);
    }

    private function handle_api($value, array &$args)
    {
        if (!($value instanceof Service)) {
            throw new \InvalidArgumentException('api must be an instance of'
                . 'Aws\Api\Service');
        }
    }

    private function handle_api_provider($value, array &$args)
    {
        if (!($value instanceof ApiProviderInterface)) {
            throw new \InvalidArgumentException('api_provider must be an '
                . 'instance of Aws\Api\ApiProviderInterface');
        }
    }

    private function handle_endpoint_provider($value, array &$args)
    {
        if (!($value instanceof EndpointProviderInterface)) {
            throw new \InvalidArgumentException('endpoint_provider must be an '
                . 'instance of Aws\Api\EndpointProviderInterface');
        }

        $result = $args['endpoint_provider']->getEndpoint(
            $args['service'],
            $args
        );

        $args['endpoint'] = $result['uri'];
    }

    private function handle_service($value, array &$args)
    {
        $version = isset($args['version']) ? $args['version'] : 'latest';
        $api = $args['api_provider']->getService($value, $version);

        if (!$api) {
            throw new \InvalidArgumentException('Unknown service version: '
                . $value . ' at ' . $version);
        }

        $args['api'] = $api;
    }
}
