<?php
namespace Aws\Common;

use Aws\AwsClientInterface;
use Aws\Common\Api\ApiProviderInterface;
use Aws\Common\Api\ErrorParser\RestJsonErrorParser;
use Aws\Common\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Common\Api\ErrorParser\XmlErrorParser;
use Aws\Common\Api\FilesystemApiProvider;
use Aws\Common\Api\Parser\JsonRpcParser;
use Aws\Common\Api\Parser\QueryParser;
use Aws\Common\Api\Parser\RestJsonParser;
use Aws\Common\Api\Parser\RestXmlParser;
use Aws\Common\Api\Serializer\Ec2ParamBuilder;
use Aws\Common\Api\Serializer\JsonRpcSerializer;
use Aws\Common\Api\Serializer\QuerySerializer;
use Aws\Common\Api\Serializer\RestJsonSerializer;
use Aws\Common\Api\Serializer\RestXmlSerializer;
use Aws\Common\Api\Service;
use Aws\Common\Api\Validator;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Credentials\NullCredentials;
use Aws\Common\Retry\ThrottlingFilter;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Signature\SignatureV2;
use Aws\Common\Signature\SignatureV3Https;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Subscriber\Signature;
use Aws\Common\Subscriber\Validation;
use Aws\Sdk;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Subscriber\Log\SimpleLogger;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;
use GuzzleHttp\Command\Subscriber\Debug;

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
        'defaults'          => true,
        'endpoint_provider' => 1,
        'api_provider'      => 1,
        'class_name'        => 1,
        'exception_class'   => 1,
        'credentials'       => 1,
        'signature'         => 1,
        'client'            => 1,
        'retries'           => 2,
        'validate'          => 2,
        'debug'             => 2
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
        static $required = [
            'service',
            'region',
            'api_provider',
            'endpoint_provider'
        ];

        static $defaultArgs = [
            'credentials'       => [],
            'region'            => null,
            'retries'           => true,
            'scheme'            => 'https',
            'signature'         => false,
            'version'           => 'latest',
            'exception_class'   => true,
            'validate'          => true,
            'class_name'        => false
        ];

        // Merge in and handle default arguments
        $args += $defaultArgs;
        $this->addDefaultArgs($args);

        // Ensure required arguments are provided.
        foreach ($required as $r) {
            if (!isset($args[$r])) {
                throw new \InvalidArgumentException("{$r} is a required "
                    . "configuration setting when creating a client.");
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
            $args['client'] = new Client();
        }

        if (!isset($args['api_provider'])) {
            $args['api_provider'] = new FilesystemApiProvider(
                __DIR__ . '/Resources/api'
            );
        }

        if (!isset($args['endpoint_provider'])) {
            $args['endpoint_provider'] = RulesEndpointProvider::fromDefaults();
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

        if ($args['retry_logger'] === 'debug') {
            $args['retry_logger'] = new SimpleLogger();
        }

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

    protected function handle_debug(
        $value,
        array &$args,
        AwsClientInterface $client
    ) {
        if ($value === false) {
            return;
        }

        $client->getEmitter()->attach(new Debug(
            $value === true ? [] : $value
        ));
    }

    /**
     * Creates an appropriate error parser for the given API.
     *
     * This may be extended in subclasses.
     *
     * @param Service $api API to parse
     *
     * @return RestJsonErrorParser|JsonRpcErrorParser|XmlErrorParser
     * @throws \InvalidArgumentException if the service type is unknown
     */
    protected function createErrorParser(Service $api)
    {
        switch ($api->getMetadata('protocol')) {
            case 'json':
                return new JsonRpcErrorParser();
            case 'rest-json':
                return new RestJsonErrorParser($api);
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

        $value = "Aws\\{$args['class_name']}\\Exception\\{$args['class_name']}Exception";
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

    private function handle_api_provider($value, array &$args)
    {
        if (!($value instanceof ApiProviderInterface)) {
            throw new \InvalidArgumentException('api_provider must be an '
                . 'instance of Aws\Common\Api\ApiProviderInterface');
        }

        $api = new Service($value, $args['service'], $args['version']);
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
            $result = $value->getEndpoint([
                'service' => $args['service'],
                'region'  => $args['region'],
                'scheme'  => $args['scheme']
            ]);

            $args['endpoint'] = $result['endpoint'];

            if (isset($result['signatureVersion'])) {
                $args['signature'] = $result['signatureVersion'];
            }
        }
    }

    private function handle_signature($value, array &$args)
    {
        $region = isset($args['region']) ? $args['region'] : 'us-east-1';
        $version = $value ?: $args['api']->getMetadata('signatureVersion');

        if (is_string($version)) {
            $args['signature'] = $this->createSignature(
                $version,
                $args['api']->getSigningName(),
                $region
            );
        } elseif (!($version instanceof SignatureInterface)) {
            throw new \InvalidArgumentException('Invalid signature option.');
        }
    }

    /**
     * Creates a signature object based on the service description.
     *
     * @param string $version     Signature version name
     * @param string $signingName Signing name of the service (for V4)
     * @param string $region      Region used for the service (for V4)
     *
     * @return SignatureInterface
     * @throws \InvalidArgumentException if the signature cannot be created
     */
    protected function createSignature($version, $signingName, $region)
    {
        switch ($version) {
            case 'v4':
                return new SignatureV4($signingName, $region);
            case 'v2':
                return new SignatureV2();
            case 'v3https':
                return new SignatureV3Https();
        }

        throw new \InvalidArgumentException('Unable to create the signature.');
    }

    protected function postCreate(AwsClientInterface $client, array $args)
    {
        // Apply the protocol of the service description to the client.
        $this->applyProtocol($client, $args['endpoint']);
        // Attach a signer to the client.
        $credentials = $client->getCredentials();
        if (!($credentials instanceof NullCredentials)) {
            $client->getHttpClient()->getEmitter()->attach(
                new Signature($credentials, $client->getSignature())
            );
        }
    }

    /**
     * Creates and attaches serializers and parsers to the given client based
     * on the protocol of the description.
     *
     * @param AwsClientInterface $client   AWS client to update
     * @param string             $endpoint Service endpoint to connect to.
     *
     * @throws \UnexpectedValueException if the protocol doesn't exist
     */
    protected function applyProtocol(AwsClientInterface $client, $endpoint)
    {
        $em = $client->getEmitter();
        $api = $client->getApi();

        switch ($api->getProtocol()) {
            case 'json':
                $em->attach(new JsonRpcSerializer($api, $endpoint));
                $em->attach(new JsonRpcParser($api));
                break;
            case 'query':
                $em->attach(new QuerySerializer($api, $endpoint));
                $em->attach(new QueryParser($api));
                break;
            case 'rest-json':
                $em->attach(new RestJsonSerializer($api, $endpoint));
                $em->attach(new RestJsonParser($api));
                break;
            case 'rest-xml':
                $em->attach(new RestXmlSerializer($api, $endpoint));
                $em->attach(new RestXmlParser($api));
                break;
            case 'ec2':
                $em->attach(
                    new QuerySerializer($api, $endpoint, new Ec2ParamBuilder())
                );
                $em->attach(new QueryParser($api, null, false));
                break;
            default:
                throw new \UnexpectedValueException(
                    'Unknown protocol: ' . $api->getProtocol()
                );
        }
    }
}
