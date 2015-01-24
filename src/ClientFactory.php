<?php
namespace Aws;

use InvalidArgumentException as IAE;
use Aws\Api\FilesystemApiProvider;
use Aws\Api\Service;
use Aws\Api\Validator;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Credentials\NullCredentials;
use Aws\Credentials\Provider as CredentialProvider;
use Aws\Signature\Provider as SignatureProvider;
use Aws\Retry\ThrottlingFilter;
use Aws\Signature\SignatureInterface;
use Aws\Subscriber\Signature;
use Aws\Subscriber\Validation;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Subscriber\Log\SimpleLogger;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;
use GuzzleHttp\Command\Subscriber\Debug;
use GuzzleHttp\Ring\Core;

/**
 * @internal Default factory class used to create clients.
 */
class ClientFactory
{
    /**
     * Gets an array of valid arguments, each argument containing a hash of
     * the following:
     *
     * - type: (string, required) argument type (deprecated, value, pre, post)
     * - valid: (string, required) "|" separated valid types or class names.
     * - required: (bool) Whether or not the argument is required.
     * - default: (mixed) The default value of the argument if not provided.
     * - doc: (string) The argument documentation string.
     *
     * @return array
     */
    public static function getValidArguments()
    {
        return [
            'key' => ['type' => 'deprecated'],
            'ssl.certificate_authority' => ['type' => 'deprecated'],
            'curl.options' => ['type' => 'deprecated'],
            'service' => [
                'type'     => 'value',
                'valid'    => 'string',
                'required' => true,
                'doc'      => 'Name of the service to utilize. This value will be supplied by default.'
            ],
            'scheme' => [
                'type'     => 'value',
                'valid'    => 'string',
                'default'  => 'https',
                'doc'      => 'URI scheme to use to connect. One of http or https.'
            ],
            'region' => [
                'type'     => 'value',
                'valid'    => 'string',
                'required' => true,
                'doc'      => 'Region to connect to. See http://docs.aws.amazon.com/general/latest/gr/rande.html for a list of available regions.'
            ],
            'version' => [
                'type'     => 'value',
                'valid'    => 'string',
                'required' => true,
                'doc'      => 'The version of the webservice to utilize (e.g., 2006-03-01).'
            ],
            'endpoint' => [
                'type'  => 'value',
                'valid' => 'string',
                'doc'   => 'The full URI of the webservice. This is only required when connecting to a custom endpoint (e.g., a local version of S3).'
            ],
            'defaults' => [
                'type'  => 'value',
                'valid' => 'array',
                'doc'   => 'An associative array of default parameters to pass to each operation created by the client.'
            ],
            'endpoint_provider' => [
                'type'     => 'pre',
                'valid'    => 'callable',
                'doc'      => 'An optional PHP callable that accepts a hash of options including a service and region key and returns a hash of endpoint data, of which the endpoint key is required.'
            ],
            'api_provider' => [
                'type'     => 'pre',
                'valid'    => 'callable',
                'doc'      => 'An optional PHP callable that accepts a type, service, and version argument, and returns an array of corresponding configuration data. The type value can be one of api, waiter, or paginator.'
            ],
            'class_name' => [
                'type'    => 'value',
                'valid'   => 'string',
                'default' => 'Aws\AwsClient',
                'doc'     => 'Optional class name of the client to create. This value will be supplied by default.'
            ],
            'exception_class' => [
                'type'    => 'value',
                'valid'   => 'string',
                'default' => 'Aws\Exception\AwsException',
                'doc'     => 'Optional exception class name to throw on request errors. This value will be supplied by default.'
            ],
            'profile' => [
                'type'  => 'pre',
                'valid' => 'string',
                'doc'   => 'Allows you to specify which profile to use when credentials are created from the AWS credentials file in your home directory. This setting overrides the AWS_PROFILE environment variable. Specifying "profile" will cause the "credentials" key to be ignored.'
            ],
            'credentials' => [
                'type'    => 'pre',
                'valid'   => 'array|Aws\Credentials\CredentialsInterface|bool|callable',
                'default' => true,
                'doc'     => 'An Aws\Credentials\CredentialsInterface object to use with each, an associative array of "key", "secret", and "token" key value pairs, `false` to utilize null credentials, or a callable credentials provider function to create credentials using a function. If no credentials are provided or credentials is set to true, the SDK will attempt to load them from the environment.'
            ],
            'signature' => [
                'type'    => 'pre',
                'valid'   => 'string|Aws\Signature\SignatureInterface|bool',
                'default' => false,
                'doc'     => 'A string representing a custom signature version to use with a service (e.g., v4, s3, v2) or a Aws\Signature\SignatureInterface object. Set to false or do not specify a signature to use the default signature version of the service.'
            ],
            'client' => [
                'type'    => 'pre',
                'valid'   => 'GuzzleHttp\ClientInterface|bool',
                'default' => true,
                'doc'     => 'Optional Guzzle client used to transfer requests over the wire. Set to true or do not specify a client, and the SDK will create a new client that uses a shared Ring HTTP handler with other clients.'
            ],
            'ringphp_handler' => [
                'type'  => 'pre',
                'valid' => 'callable',
                'doc'   => 'RingPHP handler used to transfer HTTP requests (see http://ringphp.readthedocs.org/en/latest/).'
            ],
            'retries' => [
                'type'    => 'post',
                'valid'   => 'bool|int',
                'default' => true,
                'doc'     => 'Configures retries for clients. The value can be true (the default setting which enables retry behavior), false to disable retries, or a number representing the maximum number of retries.'
            ],
            'validate' => [
                'type'    => 'post',
                'valid'   => 'bool',
                'default' => true,
                'doc'     => 'Set to false to disable client-side parameter validation.'
            ],
            'debug' => [
                'type'  => 'post',
                'valid' => 'bool|resource',
                'doc'   => 'Set to true to display debug information when sending requests. Provide a stream resource to write debug information to a specific resource.'
            ],
            'client_defaults' => [
                'type'  => 'post',
                'valid' => 'array',
                'doc'   => 'Set to an array of Guzzle client request options (e.g., proxy, verify, etc.). See http://docs.guzzlephp.org/en/latest/clients.html#request-options for a list of available options.'
            ],
        ];
    }

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
        $post = [];
        $this->addDefaultArgs($args);

        foreach (static::getValidArguments() as $key => $a) {
            if (!array_key_exists($key, $args)) {
                if (isset($a['default'])) {
                    // Merge defaults in when not present.
                    $args[$key] = $a['default'];
                } elseif (!empty($a['required'])) {
                    // Allows custom error messages for missing values.
                    $message = method_exists($this, "missing_{$key}")
                        ? $this->{"missing_{$key}"}($args)
                        : "{$key} is a required client setting";
                    throw new IAE($message);
                } else {
                    continue;
                }
            }
            $this->validate($key, $args[$key], $a['valid']);
            if ($a['type'] === 'pre') {
                $this->{"handle_{$key}"}($args[$key], $args);
            } elseif ($a['type'] === 'post') {
                $post[$key] = $args[$key];
            } elseif ($a['type'] === 'deprecated') {
                $meth = 'deprecated_' . str_replace('.', '_', $key);
                $this->{$meth}($args[$key], $args);
            }
        }

        // Create the client and then handle deferred and post-create logic
        $client = $this->createClient($args);
        foreach ($post as $key => $value) {
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
        return new $args['class_name']($args);
    }

    /**
     * Apply default option arguments.
     *
     * @param array $args Arguments passed by reference
     */
    protected function addDefaultArgs(&$args)
    {
        if (!isset($args['client'])) {
            $clientArgs = [];
            if (isset($args['ringphp_handler'])) {
                $clientArgs['handler'] = $args['ringphp_handler'];
                unset($args['ringphp_handler']);
            }
            $args['client'] = new Client($clientArgs);
        }

        if (!isset($args['api_provider'])) {
            $args['api_provider'] = new FilesystemApiProvider(__DIR__ . '/data');
        }

        if (!isset($args['endpoint_provider'])) {
            $args['endpoint_provider'] = EndpointProvider::fromDefaults();
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
     * @throws \InvalidArgumentException if the value provided is invalid.
     */
    private function handle_retries(
        $value,
        array &$args,
        AwsClientInterface $client
    ) {
        if (!$value) {
            return;
        }

        $conf = $this->getRetryOptions($args);

        if (is_int($value)) {
            // Overwrite the max, if a retry value was provided.
            $conf['max'] = $value;
        }

        // Add retry logger
        if (isset($args['retry_logger'])) {
            $conf['delay'] = RetrySubscriber::createLoggingDelay(
                $conf['delay'],
                ($args['retry_logger'] === 'debug')
                    ? new SimpleLogger()
                    : $args['retry_logger']
            );
        }

        $retry = new RetrySubscriber($conf);
        $client->getHttpClient()->getEmitter()->attach($retry);
    }

    /**
     * Gets the options for use with the RetrySubscriber.
     *
     * This method can be overwritten by service-specific factories to easily
     * change the options to suit the service's needs.
     *
     * @param array $args Factory args
     *
     * @return array
     */
    protected function getRetryOptions(array $args)
    {
        return [
            'max' => 3,
            'delay' => ['GuzzleHttp\Subscriber\Retry\RetrySubscriber', 'exponentialDelay'],
            'filter' => RetrySubscriber::createChainFilter([
                new ThrottlingFilter($args['error_parser']),
                RetrySubscriber::createStatusFilter(),
                RetrySubscriber::createConnectFilter()
            ])
        ];
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

        $client->getEmitter()->attach(new Validation($args['api'], new Validator()));
    }

    private function handle_debug(
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

    private function handle_profile($value, array &$args)
    {
        $args['credentials'] = CredentialProvider::ini($args['profile']);
    }

    private function handle_credentials($value, array &$args)
    {
        if ($value instanceof CredentialsInterface) {
            return;
        } elseif (is_callable($value)) {
            $args['credentials'] = CredentialProvider::resolve($value);
        } elseif ($value === true) {
            $default = CredentialProvider::defaultProvider();
            $args['credentials'] = CredentialProvider::resolve($default);
        } elseif (is_array($value) && isset($value['key']) && isset($value['secret'])) {
            $args['credentials'] = new Credentials(
                $value['key'],
                $value['secret'],
                isset($value['token']) ? $value['token'] : null,
                isset($value['expires']) ? $value['expires'] : null
            );
        } elseif ($value === false) {
            $args['credentials'] = new NullCredentials();
        } else {
            throw new IAE('Credentials must be an instance of '
                . 'Aws\Credentials\CredentialsInterface, an associative '
                . 'array that contains "key", "secret", and an optional "token" '
                . 'key-value pairs, a credentials provider function, or false.');
        }
    }

    private function handle_client($value, array &$args)
    {
        // Make sure the user agent is prefixed by the SDK version
        $args['client']->setDefaultOption(
            'headers/User-Agent',
            'aws-sdk-php/' . Sdk::VERSION . ' ' . Client::getDefaultUserAgent()
        );
    }

    private function handle_client_defaults($value, array &$args)
    {
        foreach ($value as $k => $v) {
            $args['client']->setDefaultOption($k, $v);
        }
    }

    private function handle_ringphp_handler($value, array &$args)
    {
        throw new IAE('You cannot provide both a client option and a ringphp_handler option.');
    }

    private function handle_api_provider($value, array &$args)
    {
        $api = new Service($value, $args['service'], $args['version']);
        $args['api'] = $api;
        $args['error_parser'] = Service::createErrorParser($api->getProtocol());
        $args['serializer'] = Service::createSerializer($api, $args['endpoint']);
    }

    private function handle_endpoint_provider($value, array &$args)
    {
        if (!isset($args['endpoint'])) {
            $result = call_user_func($value, [
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
        $version = $value ?: $args['api']->getMetadata('signatureVersion');
        if (is_string($version)) {
            $args['signature'] = $this->createSignature($version, $args);
        }
    }

    /**
     * Creates a signature object based on the service description.
     *
     * @param string $version Signature version (e.g., "s3", "v3").
     * @param array  $args    Client configuration arguments.
     *
     * @return SignatureInterface
     */
    protected function createSignature($version, array $args)
    {
        return SignatureProvider::fromVersion($version, [
            'service' => $args['api']->getSigningName(),
            'region'  => $args['region']
        ]);
    }

    protected function postCreate(AwsClientInterface $client, array $args)
    {
        // Apply the protocol of the service description to the client.
        $this->applyParser($client);
        // Attach a signer to the client.
        $credentials = $client->getCredentials();

        // Null credentials don't sign requests.
        if (!($credentials instanceof NullCredentials)) {
            $client->getHttpClient()->getEmitter()->attach(
                new Signature($credentials, $client->getSignature())
            );
        }
    }

    /**
     * Creates and attaches parsers given client based on the protocol of the
     * description.
     *
     * @param AwsClientInterface $client AWS client to update
     *
     * @throws \UnexpectedValueException if the protocol doesn't exist
     */
    private function applyParser(AwsClientInterface $client)
    {
        $parser = Service::createParser($client->getApi());

        $client->getEmitter()->on(
            'process',
            function (ProcessEvent $e) use ($parser) {
                // Guard against exceptions and injected results.
                if ($e->getException() || $e->getResult()) {
                    return;
                }

                // Ensure a response exists in order to parse.
                $response = $e->getResponse();
                if (!$response) {
                    throw new \RuntimeException('No response was received.');
                }

                $e->setResult($parser($e->getCommand(), $response));
            }
        );
    }

    private function deprecated_key($value, array &$args)
    {
        trigger_error('You provided key, secret, or token in a top-level '
            . 'configuration value. In v3, credentials should be provided '
            . 'in an associative array under the "credentials" key (i.e., '
            . "['credentials' => ['key' => 'abc', 'secret' => '123']]).");
        $args['credentials'] = [
            'key'    => $args['key'],
            'secret' => $args['secret'],
            'token'  => isset($args['token']) ? $args['token'] : null
        ];
        unset($args['key'], $args['secret'], $args['token']);
    }

    private function deprecated_ssl_certificate_authority($value, array &$args)
    {
        trigger_error('ssl.certificate_authority should be provided using '
            . "\$config['client_defaults']['verify']' (i.e., S3Client::factory(['client_defaults' => ['verify' => true]]). ");
        $args['client_defaults']['verify'] = $value;
        unset($args['ssl.certificate_authority']);
    }

    private function deprecated_curl_options($value, array &$args)
    {
        trigger_error("curl.options should be provided using \$config['client_defaults']['config']['curl']' "
            . "(i.e., S3Client::factory(['client_defaults' => ['config' => ['curl' => []]]]). ");
        $args['client_defaults']['config']['curl'] = $value;
        unset($args['curl.options']);
    }

    private function missing_region(array $args)
    {
        return <<<EOT
A 'region' configuration value is required when connecting to the {$args['service']}
service (e.g., 'us-west-2'). A list of available public regions and endpoints
can be found at http://docs.aws.amazon.com/general/latest/gr/rande.html;
EOT;
    }

    private function missing_version(array $args)
    {
        $dir = __DIR__ . '/data';
        $provider = new FilesystemApiProvider($dir);
        $versions = $provider->getServiceVersions($args['service']);
        $versions = implode("\n", array_map(function ($v) {
                    return "- $v";
                }, $versions));
        return <<<EOT
A 'version' configuration value is required when creating an API client. For
example, when using Amazon S3, you can lock your API version to '2006-03-01' to
ensure that your code will be unaffected by a change in the web service.

Your build of the SDK has the following versions of '{$args['service']}':
{$versions}

You may provide 'latest' to the 'version' configuration value to utilize the
most recent available API version that your client's API provider can find
(the default API provider will scan the {$dir}
directory for *.api.php and *.api.json files). Using 'latest' in a production
application is not recommended.

A list of available API versions can be found on each client's API documentation
page: http://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html. If you are
unable to load a specific API version, then you may need to update your copy of
the SDK.
EOT;
    }

    /**
     * Validates the user provided argument.
     *
     * @param string $name     Name of the value being validated.
     * @param mixed  $provided The provided value.
     * @param string $expected "|" separated list of valid types.
     * @throws \InvalidArgumentException on error.
     */
    private function validate($name, $provided, $expected)
    {
        static $replace = ['integer' => 'int', 'boolean' => 'bool'];
        $type = strtr(gettype($provided), $replace);
        foreach (explode('|', $expected) as $valid) {
            if ($type === $valid
                || ($type === 'object' && $provided instanceof $valid)
                || ($valid === 'callable' && is_callable($provided))
            ) {
                return;
            }
        }

        throw new \InvalidArgumentException("Invalid configuration value "
            . "provided for {$name}. Expected {$expected}, but got "
            . Core::describeType($provided));
    }
}
