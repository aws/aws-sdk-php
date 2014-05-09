<?php
namespace Aws\Common;

use Aws\Sdk;
use Aws\AwsClientInterface;
use Aws\Common\Api\ApiProviderInterface;
use Aws\Common\Api\ErrorParser\JsonRestErrorParser;
use Aws\Common\Api\ErrorParser\XmlErrorParser;
use Aws\Common\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Common\Api\FilesystemApiProvider;
use Aws\Common\Api\Service;
use Aws\Common\Api\Validator;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Credentials\NullCredentials;
use Aws\Common\Paginator\PaginatorFactory;
use Aws\Common\Retry\ThrottlingFilter;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Subscriber\Error;
use Aws\Common\Subscriber\Signature;
use Aws\Common\Subscriber\Validation;
use Aws\Common\Waiter\ResourceWaiterFactory;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @internal Default factory class used to create clients.
 */
class ClientFactory
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
        'class_name'        => 1,
        'exception_class'   => 1,
        'credentials'       => 1,
        'signature'         => 1,
        'paginator_factory' => 1,
        'waiter_factory'    => 1,
        'client_defaults'   => 1,
        'client'            => 1,
        'retries'           => 2,
        'validate'          => 2
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
        static $required = ['api_provider', 'endpoint_provider', 'service'];
        static $defaultArgs = [
            'credentials'       => [],
            'region'            => null,
            'retries'           => true,
            'scheme'            => 'https',
            'signature'         => false,
            'version'           => 'latest',
            'exception_class'   => true,
            'paginator_factory' => false,
            'waiter_factory'    => false,
            'validate'          => true,
            'class_name'        => false
        ];

        $args += $defaultArgs;
        $this->addDefaultArgs($args);

        foreach ($required as $r) {
            if (!isset($args[$r])) {
                throw new \InvalidArgumentException("{$r} is required");
            }
        }

        // Process each argument and keep track of deferred ones
        $deferred = [];
        foreach ($this->validArguments as $key => $type) {
            if (isset($args[$key])) {
                if ($type === 1) {
                    $this->{"handle_{$key}"}($args[$key], $args);
                } elseif ($type === 2) {
                    $deferred[$key] = $args[$key];
                }
            }
        }

        // Create the client and then handle deferred and post-create logic
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
        return new $args['client_class']($args);
    }

    /**
     * Apply default option arguments.
     *
     * @param array $args Arguments passed by reference
     */
    protected function addDefaultArgs(&$args)
    {
        if (!isset($args['client'])) {
            $args['client'] = new Client(
                isset($args['client_defaults'])
                    ? ['defaults' => $args['client_defaults']]
                    : []
            );
            unset($args['client_defaults']);
        }

        if (!isset($args['api_provider'])) {
            $path = __DIR__ . '/../../vendor/aws/aws-models';
            $args['api_provider'] = new FilesystemApiProvider($path, true);
        }

        if (!isset($args['endpoint_provider'])) {
            $path = __DIR__ . '/../../vendor/aws/aws-models/endpoint-rules.json';
            $args['endpoint_provider'] = new RulesEndpointProvider(
                json_decode(file_get_contents($path), true)
            );
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
        if ($value = $this->validateRetries($value)) {
            $conf = [
                'max' => $value,
                'filter' => RetrySubscriber::createChainFilter([
                    new ThrottlingFilter($args['error_parser']),
                    RetrySubscriber::createStatusFilter(),
                    RetrySubscriber::createCurlFilter()
                ])
            ];

            $this->addRetryLogger($args, $conf);
            $retry = new RetrySubscriber($conf);
            $client->getHttpClient()->getEmitter()->attach($retry);
        }
    }

    protected function addRetryLogger(array $args, array &$conf)
    {
        if (!isset($args['retry_logger'])) {
            return;
        }

        $delay = isset($conf['delay'])
            ? $conf['delay']
            : 'GuzzleHttp\Subscriber\Retry\RetrySubscriber::exponentialDelay';
        $conf['delay'] = RetrySubscriber::createLoggingDelay(
            $delay,
            $args['retry_logger']
        );
    }

    /**
     * Applies validation to a client
     */
    protected function handle_validate(
        $value,
        array &$args,
        AwsClientInterface $client
    ) {
        if ($value !== true) {
            return;
        }

        $validator = new Validator();
        $client->getEmitter()->attach(new Validation($validator));
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
        switch ($api->getMetadata('protocol')) {
            case 'json':
                return new JsonRpcErrorParser();
            case 'rest-json':
                return new JsonRestErrorParser($api);
            case 'rest-xml':
            case 'query':
                return new XmlErrorParser($api);
        }

        throw new \InvalidArgumentException('Unknown service type '
            . $api->getMetadata('protocol'));
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

    private function handle_class_name($value, array &$args)
    {
        if ($value !== false) {
            // An explicitly provided class_name must be found.
            $args['client_class'] = "Aws\\{$value}\\{$value}Client";
            if (!class_exists($args['client_class'])) {
                throw new \RuntimeException("Client not found for $value");
            }
            return;
        }

        $fullName = $args['api']->getMetadata('serviceFullName');
        $value = $this->convertServiceName($fullName);

        // If the dynamically created exception cannot be found, then use the
        // default client class.
        $args['client_class'] = "Aws\\{$value}\\{$value}Client";
        if (!class_exists($args['client_class'])) {
            $args['client_class'] = 'Aws\AwsClient';
        }

        $args['class_name'] = $value;
    }

    private function handle_exception_class($value, array &$args)
    {
        if ($value !== true) {
            // An explicitly provided exception must be found.
            if (class_exists($value)) {
                return;
            }
            throw new \InvalidArgumentException("Exception not found when "
                . "evaluating the exception_class argument: $value");
        }

        $value = "Aws\\Service\\{$args['class_name']}\\{$args['class_name']}Exception";
        // If the dynamically created exception cannot be found, then use the
        // default exception class.
        if (!class_exists($value)) {
            $value = 'Aws\AwsException';
        }

        $args['exception_class'] = $value;
    }

    private function handle_credentials($value, array &$args)
    {
        if (isset($args['profile'])) {
            $args['credentials'] = Credentials::fromIni($args['profile']);
        } elseif ($value instanceof CredentialsInterface) {
            return;
        } elseif (is_array($value)) {
            $args['credentials'] = Credentials::factory($value);
        } elseif ($value === false) {
            $args['credentials'] = new NullCredentials();
        } else {
            throw new \InvalidArgumentException('Credentials must be an '
                . 'instance of Aws\Common\Credentials\CredentialsInterface, an '
                . 'associative array that contains "key", "secret", and '
                . 'an optional "token" key-value pairs, or false.');
        }
    }

    private function handle_client($value, array &$args)
    {
        if (!($value instanceof ClientInterface)) {
            throw new \InvalidArgumentException('client must be an instance of'
                . ' GuzzleHttp\ClientInterface');
        }

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
                . 'instance of Aws\Common\Api\ApiProviderInterface');
        }

        $api = $value->getService($args['service'], $args['version']);
        $api = new Service($api);
        $args['error_parser'] = $this->createErrorParser($api);
        $args['api'] = $api;
    }

    private function handle_endpoint_provider($value, array &$args)
    {
        if (!($value instanceof EndpointProviderInterface)) {
            throw new \InvalidArgumentException('endpoint_provider must be an '
                . 'instance of Aws\Common\Api\EndpointProviderInterface');
        }

        if (!isset($args['endpoint'])) {
            $result = $value->getEndpoint(
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

    private function handle_paginator_factory($value, array &$args)
    {
        if ($value === false) {
            $args['paginator_factory'] = new PaginatorFactory(
                $args['api_provider'],
                $args['service'],
                $args['api']->getMetadata('apiVersion')
            );
        }

        if (!($args['paginator_factory'] instanceof PaginatorFactory)) {
            throw new \InvalidArgumentException('paginator_factory must be an '
                . 'instance of PaginatorFactory.');
        }
    }

    private function handle_waiter_factory($value, array &$args)
    {
        if ($value === false) {
            $args['waiter_factory'] = new ResourceWaiterFactory(
                $args['api_provider'],
                $args['service'],
                $args['api']->getMetadata('apiVersion')
            );
        }

        if (!($args['waiter_factory'] instanceof ResourceWaiterFactory)) {
            throw new \InvalidArgumentException('waiter_factory must be an '
                . 'instance of ResourceWaiterFactory.');
        }
    }

    private function handle_signature($value, array &$args)
    {
        $region = isset($args['region']) ? $args['region'] : 'us-east-1';

        if ($value === false) {
            $args['signature'] = $args['api']->createSignature($region);
        } elseif (is_string($value)) {
            $args['signature'] = $args['api']->createSignature($region, $value);
        } elseif (!($value instanceof SignatureInterface)) {
            throw new \InvalidArgumentException('Invalid signature option');
        }
    }

    protected function postCreate(AwsClientInterface $client, array $args)
    {
        // Apply the protocol of the service description to the client.
        $client->getApi()->applyProtocol($client, $args['endpoint']);
        // Attach an error parser
        $client->getEmitter()->attach(new Error($args['error_parser']));
        // Attach a signer to the client.
        $credentials = $client->getCredentials();
        if (!($credentials instanceof NullCredentials)) {
            $client->getHttpClient()->getEmitter()->attach(
                new Signature($credentials, $client->getSignature())
            );
        }
    }

    private function convertServiceName($serviceFullName)
    {
        static $search = ['Amazon ', 'AWS ', ' (Beta)', ' '];
        static $map = ['A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd',
            'E' => 'e', 'F' => 'f', 'G' => 'g', 'H' => 'h', 'I' => 'i',
            'J' => 'j', 'K' => 'k', 'L' => 'l', 'M' => 'm', 'N' => 'n',
            'O' => 'o', 'P' => 'p', 'Q' => 'q', 'R' => 'r', 'S' => 's',
            'T' => 't', 'U' => 'u', 'V' => 'v', 'W' => 'w', 'X' => 'x',
            'Y' => 'y', 'Z' => 'z'];

        // Convert to a strict PascalCase
        $value = str_replace($search, '', $serviceFullName);

        $i = -1;
        while (isset($value[++$i])) {
            if (isset($map[$value[$i]])) {
                while (isset($value[++$i]) && isset($map[$value[$i]])) {
                    $value[$i] = $map[$value[$i]];
                }
            }
        }

        return $value;
    }
}
