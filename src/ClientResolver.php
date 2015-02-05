<?php
namespace Aws;

use Aws\Signature\Provider;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Event\EmitterInterface;
use InvalidArgumentException as IAE;
use Aws\Api\FilesystemApiProvider;
use Aws\Api\Service;
use Aws\Api\Validator;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Credentials\NullCredentials;
use Aws\Credentials\Provider as CredentialProvider;
use Aws\Retry\ThrottlingFilter;
use Aws\Subscriber\Validation;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Log\SimpleLogger;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;
use GuzzleHttp\Command\Subscriber\Debug;
use GuzzleHttp\Ring\Core;

/**
 * @internal Resolves a hash of client arguments to construct a client.
 */
class ClientResolver
{
    /** @var array */
    private $argDefinitions;

    /** @var array */
    private static $argCache;

    /**
     * Gets an array of default client arguments, each argument containing a
     * hash of the following:
     *
     * - type: (string, required) option type described as follows:
     *
     *   - value: The default option type.
     *   - config: The provided value is made available in the client's
     *     getConfig() method.
     *   - deprecated: Used to apply a deprecated option to a client.
     *     Deprecated options are applied using the "fn" key of the option. The
     *     provided "fn" is expected to trigger a PHP warning.
     * - valid: (array, required) Valid PHP types or class names.
     * - required: (bool, callable) Whether or not the argument is required.
     *   Provide a function that accepts an array of arguments and returns a
     *   string to provide a custom error message.
     * - default: (mixed) The default value of the argument if not provided. If
     *   a function is provided, then it will be invoked to provide a default
     *   value. The function is provided the array of options and is expected
     *   to return the default value of the option.
     * - doc: (string) The argument documentation string.
     * - fn: (callable) Function used to apply the argument. The function
     *   accepts the provided value, array of arguments by reference, and an
     *   event emitter.
     * - choice: (array) If provided, the passed in value MUST match one of the
     *   values in the choice array.
     *
     * Note: Order is honored and important when applying arguments.
     *
     * @return array
     */
    public static function getDefaultArguments()
    {
        if (self::$argCache) {
            return self::$argCache;
        }

        return self::$argCache = [
            'key' => [
                'type'  => 'deprecated',
                'valid' => ['string'],
                'fn'    => [__CLASS__, '_deprecated_key'],
            ],
            'ssl.certificate_authority' => [
                'type'  => 'deprecated',
                'valid' => ['bool', 'string'],
                'fn'    => [__CLASS__, '_deprecated_ssl_certificate_authority'],
            ],
            'curl.options' => [
                'type'  => 'deprecated',
                'valid' => ['array'],
                'fn'    => [__CLASS__, '_deprecated_curl_options'],
            ],
            'service' => [
                'type'     => 'value',
                'valid'    => ['string'],
                'doc'      => 'Name of the service to utilize. This value will '
                            . 'be supplied by default when using one of the '
                            . 'SDK clients (e.g., Aws\\S3\\S3Client).',
                'required' => true,
            ],
            'scheme' => [
                'type'     => 'value',
                'valid'    => ['string'],
                'default'  => 'https',
                'choice'   => ['http', 'https'],
                'doc'      => 'URI scheme to use when connecting connect.',
            ],
            'endpoint' => [
                'type'  => 'value',
                'valid' => ['string'],
                'doc'   => 'The full URI of the webservice. This is only '
                    . 'required when connecting to a custom endpoint '
                    . '(e.g., a local version of S3).',
            ],
            'region' => [
                'type'     => 'value',
                'valid'    => ['string'],
                'required' => [__CLASS__, '_missing_region'],
                'doc'      => 'Region to connect to. See http://docs.aws.amazon.com/general/latest/gr/rande.html '
                            . 'for a list of available regions.',
            ],
            'version' => [
                'type'     => 'value',
                'valid'    => ['string'],
                'required' => [__CLASS__, '_missing_version'],
                'doc'      => 'The version of the webservice to utilize '
                            . '(e.g., 2006-03-01).',
            ],
            'defaults' => [
                'type'    => 'config',
                'valid'   => ['array'],
                'default' => [],
                'doc'     => 'An associative array of default parameters to '
                           . 'pass to each operation created by the client.',
            ],
            'signature_provider' => [
                'type'    => 'value',
                'valid'   => ['callable'],
                'doc'     => 'A callable that accepts a signature version name '
                           . '(e.g., v4, s3), a service name, and region, and '
                           . 'returns a SignatureInterface object. This '
                           . 'provider is used to create signers utilized by '
                           . 'the client.',
                'default' => function (array &$args) {
                    return Provider::memoize(Provider::version());
                },
            ],
            'endpoint_provider' => [
                'type'     => 'value',
                'valid'    => ['callable'],
                'fn'       => [__CLASS__, '_apply_endpoint_provider'],
                'doc'      => 'An optional PHP callable that accepts a hash of '
                            . 'options including a service and region key and '
                            . 'returns a hash of endpoint data, of which the '
                            . 'endpoint key is required.',
                'default' => function () {
                    return EndpointProvider::fromDefaults();
                },
            ],
            'api_provider' => [
                'type'     => 'value',
                'valid'    => ['callable'],
                'doc'      => 'An optional PHP callable that accepts a type, '
                            . 'service, and version argument, and returns an '
                            . 'array of corresponding configuration data. The '
                            . 'type value can be one of api, waiter, or paginator.',
                'fn'       => [__CLASS__, '_apply_api_provider'],
                'default'  => function () {
                    return new FilesystemApiProvider(__DIR__ . '/data');
                },
            ],
            'signature_version' => [
                'type'    => 'config',
                'valid'   => ['string'],
                'doc'     => 'A string representing a custom signature version '
                           . 'to use with a service (e.g., v4, s3, v2). Note '
                           . 'that per/operation signature version MAY '
                           . 'override this requested signature version.',
                'default' => function (array &$args) {
                    return isset($args['config']['signature_version'])
                        ? $args['config']['signature_version']
                        : $args['api']->getSignatureVersion();
                },
            ],
            'profile' => [
                'type'  => 'config',
                'valid' => ['string'],
                'doc'   => 'Allows you to specify which profile to use when '
                         . 'credentials are created from the AWS credentials '
                         . 'file in your HOME directory. This setting overrides '
                         . 'the AWS_PROFILE environment variable. Note: '
                         . 'Specifying "profile" will cause the "credentials" '
                         . 'key to be ignored.',
                'fn'    => function ($_, array &$args) {
                    $args['credentials'] = CredentialProvider::ini($args['profile']);
                },
            ],
            'credentials' => [
                'type'    => 'value',
                'valid'   => ['array', 'Aws\Credentials\CredentialsInterface', 'bool', 'callable'],
                'doc'     => 'An Aws\Credentials\CredentialsInterface object '
                           . 'to use with each, an associative array of "key", '
                           . '"secret", and "token" key value pairs, `false` '
                           . 'to utilize null credentials, or a callable '
                           . 'credentials provider function to create '
                           . 'credentials using a function. If no credentials '
                           . 'are provided, the SDK will attempt to load them '
                           . 'from the environment.',
                'fn'      => [__CLASS__, '_apply_credentials'],
                'default' => function () {
                    return CredentialProvider::resolve(
                        CredentialProvider::defaultProvider()
                    );
                },
            ],
            'client' => [
                'type'    => 'value',
                'valid'   => ['GuzzleHttp\ClientInterface', 'bool'],
                'default' => [__CLASS__, '_default_client'],
                'doc'     => 'Optional Guzzle client used to transfer requests '
                           . 'over the wire. Set to true or do not specify a '
                           . 'client, and the SDK will create a new client '
                           . 'that uses a shared Ring HTTP handler with other '
                           . 'clients.',
                'fn'      => function (ClientInterface $value) {
                    // Make sure the user agent is prefixed by the SDK version.
                    $value->setDefaultOption(
                        'headers/User-Agent',
                        'aws-sdk-php/' . Sdk::VERSION . ' ' . Client::getDefaultUserAgent()
                    );
                }
            ],
            'ringphp_handler' => [
                'type'  => 'value',
                'valid' => ['callable'],
                'doc'   => 'RingPHP handler used to transfer HTTP requests '
                         . '(see http://ringphp.readthedocs.org/en/latest/).',
                'fn'    => function () {
                    throw new IAE('You cannot provide both a client option and a ringphp_handler option.');
                },
            ],
            'retry_logger' => [
                'type'  => 'value',
                'valid' => ['string', 'Psr\Log\LoggerInterface'],
                'doc'   => 'When the string "debug" is provided, all retries '
                         . 'will be logged to STDOUT. Provide a PSR-3 logger '
                         . 'to log retries to a specific logger instance.'
            ],
            'retries' => [
                'type'    => 'value',
                'valid'   => ['int'],
                'doc'     => 'Configures the maximum number of allowed retries '
                           . 'for a client (pass 0 to disable retries). ',
                'fn'      => [__CLASS__, '_apply_retries'],
                'default' => 3,
            ],
            'validate' => [
                'type'    => 'value',
                'valid'   => ['bool'],
                'default' => true,
                'doc'     => 'Set to false to disable client-side parameter validation.',
                'fn'      => function ($value, array &$args, EmitterInterface $em) {
                    if ($value === true) {
                        $em->attach(new Validation($args['api'], new Validator()));
                    }
                },
            ],
            'debug' => [
                'type'  => 'value',
                'valid' => ['bool', 'resource'],
                'doc'   => 'Set to true to display debug information when '
                         . 'sending requests. Provide a stream resource to '
                         . 'write debug information to a specific resource.',
                'fn'    => function ($value, $_, EmitterInterface $em) {
                    if ($value !== false) {
                        $em->attach(new Debug(
                            $value === true ? [] : $value
                        ));
                    }
                },
            ],
            'http' => [
                'type'  => 'value',
                'valid' => ['array'],
                'doc'   => 'Set to an array of Guzzle client request options '
                         . '(e.g., proxy, verify, etc.). See http://docs.guzzlephp.org/en/latest/clients.html#request-options '
                         . 'for a list of available options.',
                'fn'    => function (array $values, array &$args) {
                    foreach ($values as $k => $v) {
                        $args['client']->setDefaultOption($k, $v);
                    }
                },
            ],
        ];
    }

    /**
     * @param array $argDefinitions Client arguments.
     */
    public function __construct(array $argDefinitions)
    {
        $this->argDefinitions = $argDefinitions;
    }

    /**
     * Resolves client configuration options and attached event listeners.
     *
     * @param array            $args    Provided constructor arguments.
     * @param EmitterInterface $emitter Emitter to augment..
     *
     * @return array Returns the array of provided options.
     * @throws \InvalidArgumentException
     * @see Aws\AwsClient::__construct for a list of available options.
     */
    public function resolve(array $args, EmitterInterface $emitter)
    {
        $args['config'] = [];
        foreach ($this->argDefinitions as $key => $a) {
            if (!array_key_exists($key, $args)) {
                if (isset($a['default'])) {
                    // Merge defaults in when not present.
                    if (!is_callable($a['default'])) {
                        $args[$key] = $a['default'];
                    } else {
                        $fn = $a['default'];
                        $args[$key] = $fn($args);
                    }
                } elseif (!empty($a['required'])) {
                    $this->throwRequired($args);
                } else {
                    continue;
                }
            }
            $this->validate($key, $args[$key], $a['valid']);
            if (isset($a['choice'])) {
                $this->validateChoice($key, $args[$key], $a['choice']);
            }
            if (isset($a['fn'])) {
                $fn = $a['fn'];
                $fn($args[$key], $args, $emitter);
            }
            if ($a['type'] === 'config') {
                $args['config'][$key] = $args[$key];
            }
        }

        return $args;
    }

    /**
     * Validates the user provided argument.
     *
     * @param string $name     Name of the value being validated.
     * @param mixed  $provided The provided value.
     * @param array  $expected  Array of possible types.
     * @throws \InvalidArgumentException on error.
     */
    private function validate($name, $provided, array $expected)
    {
        static $typeMap = [
            'resource' => 'is_resource',
            'callable' => 'is_callable',
            'int'      => 'is_int',
            'bool'     => 'is_bool',
            'string'   => 'is_string',
            'object'   => 'is_object',
            'array'    => 'is_array',
            'null'     => 'is_null'
        ];

        foreach ($expected as $check) {
            if (isset($typeMap[$check])) {
                $fn = $typeMap[$check];
                if ($fn($provided)) {
                    return;
                }
            } elseif ($provided instanceof $check) {
                return;
            }
        }

        $expected = implode('|', $expected);
        throw new \InvalidArgumentException("Invalid configuration value "
            . "provided for \"{$name}\". Expected {$expected}, but got "
            . Core::describeType($provided));
    }

    private function validateChoice($name, $provided, array $expected)
    {
        if (in_array($provided, $expected)) {
            return;
        }
        throw new \InvalidArgumentException("The value provided for the "
            . "\"{$name}\" option has the value of " . Core::describeType($provided)
            . ", but is expected to be one of " . implode(
                ", ",
                array_map(function ($s) { return '"' . $s . '"'; }, $expected)
            ));
    }

    /**
     * Creates a verbose error message for a missing required option.
     *
     * @param string $name Name of the argument that is missing.
     * @param array  $args Provided arguments
     *
     * @return string
     */
    private function getMissingMessage($name, $args)
    {
        $arg = $this->argDefinitions[$name];
        $msg = '';
        $modifiers = [];
        if (isset($arg['valid'])) {
            $modifiers[] = implode('|', $arg['valid']);
        }
        if (isset($arg['choice'])) {
            $modifiers[] = 'One of ' . implode(', ', $arg['choice']);
        }
        if ($modifiers) {
            $msg .= '(' . implode('; ', $modifiers) . ')';
        }
        $msg = wordwrap("{$name}: {$msg}", 75, "\n  ");

        if (is_callable($arg['required'])) {
            $msg .= "\n\n  ";
            $msg .= str_replace("\n", "\n  ", call_user_func($arg['required'], $args));
        } elseif (isset($arg['doc'])) {
            $msg .= wordwrap("\n\n  {$arg['doc']}", 75, "\n  ");
        }

        return $msg;
    }

    /**
     * Throws an exception for missing required arguments.
     *
     * @param array $args Passed in arguments.
     * @throws \InvalidArgumentException
     */
    private function throwRequired(array $args)
    {
        $missing = [];
        foreach ($this->argDefinitions as $k => $a) {
            if (empty($a['required'])
                || isset($a['default'])
                || array_key_exists($k, $args)
            ) {
                continue;
            }
            $missing[] = $this->getMissingMessage($k, $args);
        }
        $msg = "Missing required client configuration options: \n\n";
        $msg .= implode("\n\n", $missing);
        throw new IAE($msg);
    }

    /** @internal */
    public static function _apply_retries($value, array &$args)
    {
        if ($value) {
            $retry = new RetrySubscriber(self::_wrapDebugLogger($args, [
                'max'    => $value,
                'delay'  => 'GuzzleHttp\Subscriber\Retry\RetrySubscriber::exponentialDelay',
                'filter' => RetrySubscriber::createChainFilter([
                    new ThrottlingFilter($args['error_parser']),
                    RetrySubscriber::createStatusFilter(),
                    RetrySubscriber::createConnectFilter()
                ])
            ]));
            $args['client']->getEmitter()->attach($retry);
        }
    }

    /** @internal */
    public static function _apply_credentials($value, array &$args)
    {
        if ($value instanceof CredentialsInterface) {
            return;
        } elseif (is_callable($value)) {
            $args['credentials'] = CredentialProvider::resolve($value);
        } elseif (is_array($value) && isset($value['key']) && isset($value['secret'])) {
            $args['credentials'] = new Credentials(
                $value['key'],
                $value['secret'],
                isset($value['token']) ? $value['token'] : null,
                isset($value['expires']) ? $value['expires'] : null
            );
        } elseif ($value === false) {
            $args['credentials'] = new NullCredentials();
            $args['config']['signature_version'] = 'anonymous';
        } else {
            throw new IAE('Credentials must be an instance of '
                . 'Aws\Credentials\CredentialsInterface, an associative '
                . 'array that contains "key", "secret", and an optional "token" '
                . 'key-value pairs, a credentials provider function, or false.');
        }
    }

    /** @internal */
    public static function _apply_api_provider($value, array &$args)
    {
        $api = new Service($value, $args['service'], $args['version']);
        $args['api'] = $api;
        $args['error_parser'] = Service::createErrorParser($api->getProtocol());
        $args['serializer'] = Service::createSerializer($api, $args['endpoint']);
    }

    /** @internal */
    public static function _apply_endpoint_provider($value, array &$args)
    {
        if (!isset($args['endpoint'])) {
            $result = call_user_func($value, [
                'service' => $args['service'],
                'region'  => $args['region'],
                'scheme'  => $args['scheme']
            ]);

            $args['endpoint'] = $result['endpoint'];

            if (isset($result['signatureVersion'])) {
                $args['config']['signature_version'] = $result['signatureVersion'];
            }
        }
    }

    /** @internal */
    public static function _deprecated_key($_, array &$args)
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

    /** @internal */
    public static function _deprecated_curl_options($value, array &$args)
    {
        trigger_error("curl.options should be provided using \$config['http']['config']['curl']' "
            . "(i.e., new S3Client(['http' => ['config' => ['curl' => []]]]). ");
        $args['http']['config']['curl'] = $value;
        unset($args['curl.options']);
    }

    /** @internal */
    public static function _deprecated_ssl_certificate_authority($value, array &$args)
    {
        trigger_error('ssl.certificate_authority should be provided using '
            . "\$config['http']['verify']' (i.e., new S3Client(['http' => ['verify' => true]]). ");
        $args['http']['verify'] = $value;
        unset($args['ssl.certificate_authority']);
    }

    /** @internal */
    public static function _missing_version(array $args)
    {
        $dir = __DIR__ . '/data';
        $args['service'] = isset($args['service']) ? $args['service'] : '';
        $provider = new FilesystemApiProvider($dir);
        $versions = $provider->getServiceVersions($args['service']);
        $versions = implode("\n", array_map(function ($v) {
            return "* \"$v\"";
        }, $versions)) ?: '* (none found)';

        return <<<EOT
A "version" configuration value is required. Specifying a version constraint
ensures that your code will not be affected by a breaking change made to the
service. For example, when using Amazon S3, you can lock your API version to
"2006-03-01".

Your build of the SDK has the following version(s) of "{$args['service']}":
{$versions}

You may provide "latest" to the "version" configuration value to utilize the
most recent available API version that your client's API provider can find
(the default api_provider will scan the {$dir}
directory for *.api.php and *.api.json files). Note: Using 'latest' in a
production application is not recommended.

A list of available API versions can be found on each client's API documentation
page: http://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html. If you are
unable to load a specific API version, then you may need to update your copy of
the SDK.
EOT;
    }

    /** @internal */
    public static function _missing_region(array $args)
    {
        $service = isset($args['service']) ? $args['service'] : '';

        return <<<EOT
A "region" configuration value is required for the "{$service}" service
(e.g., "us-west-2"). A list of available public regions and endpoints can be
found at http://docs.aws.amazon.com/general/latest/gr/rande.html.
EOT;
    }

    /** @internal */
    public static function _default_client (array &$args)
    {
        $clientArgs = [];
        if (isset($args['ringphp_handler'])) {
            $clientArgs['handler'] = $args['ringphp_handler'];
            unset($args['ringphp_handler']);
        }
        return new Client($clientArgs);
    }

    /** @internal */
    public static function _wrapDebugLogger(array $clientArgs, array $conf)
    {
        // Add retry logger
        if (isset($clientArgs['retry_logger'])) {
            $conf['delay'] = RetrySubscriber::createLoggingDelay(
                $conf['delay'],
                ($clientArgs['retry_logger'] === 'debug')
                    ? new SimpleLogger()
                    : $clientArgs['retry_logger']
            );
        }

        return $conf;
    }
}
