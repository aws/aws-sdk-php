<?php

namespace Aws\Service;

use Aws\Sdk;
use Aws\AwsClient;
use Aws\AwsClientInterface;
use Aws\Api\ApiProviderInterface;
use Aws\Api\EndpointProviderInterface;
use Aws\Api\ErrorParser\JsonRestErrorParser;
use Aws\Api\ErrorParser\XmlErrorParser;
use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Api\Service;
use Aws\Api\Serializer\JsonRpcSerializer;
use Aws\Api\Parser\JsonRpcParser;
use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Serializer\RestJsonSerializer;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Retry\ThrottlingFilter;
use Aws\Signature\SignatureInterface;
use Aws\Signature\SignatureV2;
use Aws\Signature\SignatureV4;
use Aws\Subscriber\Signature;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @internal Default factory class used to create clients.
 */
class DefaultFactory
{
    /** @var int Default maximum number of retries for failed requests. */
    const DEFAULT_MAX_RETRIES = 3;

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
        'scheme'            => true,
        'region'            => true,
        'service'           => true,
        'endpoint'          => true,
        'version'           => true,
        'endpoint_provider' => 1,
        'api_provider'      => 1,
        'credentials'       => 1,
        'signature'         => 1,
        'client_defaults'   => 1,
        'client'            => 1,
        'retries'           => 2
    ];

    /**
     * Constructs a new factory object used for building services.
     *
     * @param array $args
     *
     * @return \Aws\AwsClientInterface
     * @throws \InvalidArgumentException
     * @see Aws\Sdk::getClient() for a list of available options.
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

        $this->addDefaultArgs($args);

        $deferred = [];
        foreach ($args as $key => $value) {
            if (!isset($this->validArguments[$key])) {
                throw new \InvalidArgumentException("Unknown client option $key");
            } elseif ($this->validArguments[$key] === 1) {
                $this->{"handle_{$key}"}($value, $args);
            } elseif ($this->validArguments[$key] === 2) {
                $deferred[$key] = $value;
            }
        }

        $client = $this->createClient($args);
        foreach ($deferred as $key => $value) {
            $this->{"handle_{$key}"}($value, $args, $client);
        }

        $this->postCreate($client, $args);

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
     * Apply default option arguments.
     *
     * @param array $args Arguments passed by reference
     */
    protected function addDefaultArgs(&$args)
    {
        if (!isset($args['region'])) {
            $args['region'] = null;
        }

        if (!isset($args['signature'])) {
            $args['signature'] = null;
        }

        if (!isset($args['client'])) {
            $args['client'] = new Client(
                isset($args['client_defaults'])
                    ? ['defaults' => $args['client_defaults']]
                    : []
            );
            unset($args['client_defaults']);
        }

        // Create a default credentials object based on the environment
        if (!isset($args['credentials'])) {
            if (isset($args['profile'])) {
                $args['credentials'] = Credentials::fromIni($args['profile']);
                unset($args['profile']);
            } else {
                $args['credentials'] = Credentials::factory();
            }
        }
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
            $value = static::DEFAULT_MAX_RETRIES;
        } elseif (!$value) {
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
            throw new \InvalidArgumentException('Credentials must be an '
                . 'instance of Aws\Credentials\CredentialsInterface or an '
                . 'associative array that contains "key", "secret", and '
                . 'an optional "token" key-value pairs.');
        }
    }

    private function handle_client($value, array &$args)
    {
        if (!($value instanceof ClientInterface)) {
            throw new \InvalidArgumentException('client must be an instance of'
                . 'GuzzleHttp\ClientInterface');
        }

        $args['client'] = $value;

        // Make sure the user agent is prefixed by the SDK version
        $args['client']->setDefaultOption(
            'headers/User-Agent',
            'aws-sdk-php/' . Sdk::VERSION . ' ' . Client::getDefaultUserAgent()
        );
    }

    private function handle_client_defaults($value, array &$args)
    {
        throw new \InvalidArgumentException('"client_defaults" cannot be'
            . ' specified if the "client" option is provided. You can use one'
            . ' or the other.');
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
                [
                    'service' => $args['service'],
                    'region'  => $args['region'],
                    'scheme'  => $args['scheme']
                ]
            );
            $args['endpoint'] = $result['uri'];
            if (isset($result['properties']['signatureVersion'])) {
                $args['signature'] = $result['properties']['signatureVersion'];
            }
        }
    }

    private function handle_signature($value, array &$args)
    {
        if ($value instanceof SignatureInterface) {
            $args['signature'] = $value;
        } elseif ($value === null) {
            $args['signature'] = $this->createSignature(
                $args['api']->getMetadata('signatureVersion'),
                $args['api'],
                $args['region']
            );
        }

        if (is_string($value)) {
            $args['signature'] = $this->createSignature(
                $value,
                $args['api'],
                isset($args['region']) ? $args['region'] : 'us-east-1'
            );
        }
    }

    private function createSignature($version, Service $api, $region)
    {
        switch ($version) {
            case 'v4':
                return new SignatureV4(
                    $api->getMetadata('signingName') ?:
                        $api->getMetadata('endpointPrefix'),
                    $region
                );
            case 'v2':
                return new SignatureV2();
            default:
                throw new \InvalidArgumentException("Unknown signature"
                    . " version {$version}");
        }
    }

    protected function postCreate(AwsClientInterface $client, array $args)
    {
        $this->applyProtocol($client, $args);

        // Attach a signer to the client.
        $client->getHttpClient()->getEmitter()->attach(
            new Signature($client->getCredentials(), $client->getSignature())
        );
    }

    /**
     * Attaches the appropriate protocol serializers and parsers to a client.
     *
     * @param AwsClientInterface $client Client to modify
     * @param array              $args   Arguments passed to the factory
     *
     * @throws \UnexpectedValueException when an unknown protocol is found
     */
    protected function applyProtocol(AwsClientInterface $client, array $args)
    {
        $api = $client->getApi();
        $type = $api->getMetadata('type');
        $em = $client->getEmitter();

        if ($type == 'json') {
            $em->attach(new JsonRpcSerializer($args['endpoint'], $api));
            $em->attach(new JsonRpcParser($api));
        } elseif ($type == 'query') {
            $em->attach(new QuerySerializer($args['endpoint'], $api));
            // $em->attach(new XmlParser($api));
        } elseif ($type = 'rest-json') {
            $em->attach(new RestJsonSerializer($args['endpoint'], $api));
            // $em->attach(new RestJsonParser($api));
        } elseif ($type == 'rest-xml') {
            // $em->attach(new RestXmlSerializer($args['endpoint'], $api));
            // $em->attach(new RestXmlParser($api));
        } else {
            throw new \UnexpectedValueException('Unknown protocol ' . $type);
        }
    }
}
