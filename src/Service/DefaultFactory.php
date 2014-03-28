<?php

namespace Aws\Service;

use Aws\AwsClient;
use Aws\AwsClientInterface;
use Aws\Api\ApiProviderInterface;
use Aws\Api\EndpointProviderInterface;
use Aws\Api\ErrorParser\JsonRestErrorParser;
use Aws\Api\ErrorParser\XmlErrorParser;
use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Api\Service;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Retry\ThrottlingFilter;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @internal Default factory class used to create clients.
 */
class DefaultFactory
{
    /**
     * Represents how provided key value pairs are processed.
     *
     * - true: The value is passed through to the underlying client unchanged.
     * - 1: There is a handle_<key> function that handles this specific key
     *   before the client is constructed. The handler receives the value of
     *   the key and the provided arguments by reference.
     * - 2: There is a handle_<key> function that handles this specific key
     *   after the client is constructed. The handler function receives the
     *   value of the key, the provided arguments by reference, and the client.
     *
     * @var array
     */
    protected $validArguments = [
        'endpoint'          => true,
        'region'            => true,
        'signature'         => true,
        'service'           => true,
        'version'           => true,
        'scheme'            => true,
        'credentials'       => 1,
        'api_provider'      => 1,
        'client_defaults'   => 1,
        'endpoint_provider' => 1,
        'retries'           => 2
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
            'service', 'retries'];

        foreach ($required as $r) {
            if (!isset($args[$r])) {
                throw new \InvalidArgumentException($r . ' is required');
            }
        }

        $deferred = [];
        foreach ($args as $key => $value) {
            if (!isset($this->validArguments[$key])) {
                throw new \InvalidArgumentException('Unknown argument ' . $key);
            } elseif ($this->validArguments[$key] === 1) {
                $this->{"handle_{$key}"}($value, $args);
            } elseif ($this->validArguments[$key] === 2) {
                $deferred[$key] = $value;
            }
        }

        // Create a default credentials object based on the environment
        if (!isset($args['credentials'])) {
            $args['credentials'] = Credentials::factory();
        }

        // Cleanup the configuration data array
        unset($args['endpoint_provider'], $args['service'], $args['version'],
            $args['retries']);

        $client = $this->createClient($args);

        foreach ($deferred as $key => $value) {
            $this->{"handle_{$key}"}($value, $args, $client);
        }

        return $client;
    }

    /**
     * Creates a client for the given arguments.
     *
     * This method can be overridden in subclasses as needed.
     *
     * @param array $args Arguments to provide to the client.
     *
     * @return AwsClientInterface
     */
    protected function createClient(array $args)
    {
        $client = new AwsClient($args);

        return $client;
    }

    /**
     * Applies the appropriate retry subscriber.
     *
     * This may be extended in subclasses.
     *
     * @param int|bool           $value  User-provided value (must be validated)
     * @param array              $args   Provided arguments reference
     * @param AwsClientInterface $client Client to modify
     *
     * @throws \InvalidArgumentException if the value provided is invalid.
     */
    protected function handle_retries(
        $value,
        array &$args,
        AwsClientInterface $client
    ) {
        $value = $this->validateRetries($value);

        $client->getHttpClient()->getEmitter()->attach(new RetrySubscriber([
            'max' => $value,
            'filter' => RetrySubscriber::createChainFilter([
                new ThrottlingFilter($args['error_parser']),
                RetrySubscriber::createStatusFilter(),
                RetrySubscriber::createCurlFilter()
            ])
        ]));
    }

    /**
     * Creates an appropriate error parser for the given API.
     *
     * This may be extended in subclasses.
     *
     * @param Service $api API to parse
     *
     * @return JsonRestErrorParser|JsonRpcErrorParser|XmlErrorParser
     * @throws \InvalidArgumentException if the service type is unknown
     */
    protected function createErrorParser(Service $api)
    {
        switch ($api->getMetadata('type')) {
            case 'json':
                return new JsonRpcErrorParser();
            case 'rest-json':
                return new JsonRestErrorParser($api);
            case 'rest-xml':
            case 'query':
                return new XmlErrorParser($api);
        }

        throw new \InvalidArgumentException('Unknown service type '
            . $api->getMetadata('type'));
    }

    /**
     * Validates the provided "retries" key and returns a number.
     *
     * @param mixed $value Value to validate and coerce
     *
     * @return bool|int Returns false to disable, or a number of retries.
     * @throws \InvalidArgumentException if the setting is invalid.
     */
    protected function validateRetries($value)
    {
        if ($value === true) {
            $value = 3;
        } elseif ($value === false || $value === 0) {
            return false;
        } elseif (!is_integer($value)) {
            throw new \InvalidArgumentException('retries must be a boolean or'
                . ' an integer');
        }

        return $value;
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

    private function handle_api_provider($value, array &$args)
    {
        if (!($value instanceof ApiProviderInterface)) {
            throw new \InvalidArgumentException('api_provider must be an '
                . 'instance of Aws\Api\ApiProviderInterface');
        }

        $version = isset($args['version']) ? $args['version'] : 'latest';
        $api = $args['api_provider']->getService($args['service'], $version);

        if (!$api) {
            throw new \InvalidArgumentException('Unknown service version: '
                . $args['service'] . ' at ' . $version);
        }

        $args['error_parser'] = $this->createErrorParser($api);
        $args['api'] = $api;
    }

    private function handle_endpoint_provider($value, array &$args)
    {
        if (!($value instanceof EndpointProviderInterface)) {
            throw new \InvalidArgumentException('endpoint_provider must be an '
                . 'instance of Aws\Api\EndpointProviderInterface');
        }

        if (!isset($args['endpoint'])) {
            $result = $args['endpoint_provider']->getEndpoint(
                $args['service'],
                $args
            );
            $args['endpoint'] = $result['uri'];
            if (isset($result['properties']['signatureVersion'])) {
                $args['signature'] = $result['properties']['signatureVersion'];
            }
        }
    }
}
