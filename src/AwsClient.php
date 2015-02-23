<?php
namespace Aws;

use Aws\Exception\AwsException;
use Aws\Api\Service;
use Aws\Credentials\CredentialsInterface;
use Aws\Signature\SignatureProvider;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Uri;
use GuzzleHttp\HandlerStack;

/**
 * Default AWS client implementation
 */
class AwsClient implements AwsClientInterface
{
    /** @var CredentialsInterface AWS credentials */
    private $credentials;

    /** @var string */
    private $region;

    /** @var string */
    private $endpoint;

    /** @var Service */
    private $api;

    /** @var string */
    private $commandException = 'Aws\Exception\AwsException';

    /** @var callable */
    private $signatureProvider;

    /** @var HandlerStack */
    private $handlerStack;

    /** @var array*/
    private $defaultRequestOptions;

    /**
     * Get an array of client constructor arguments used by the client.
     *
     * @return array
     */
    public static function getArguments()
    {
        return ClientResolver::getDefaultArguments();
    }

    /**
     * The client constructor accepts the following options:
     *
     * - api_provider: (callable) An optional PHP callable that accepts a
     *   type, service, and version argument, and returns an array of
     *   corresponding configuration data. The type value can be one of api,
     *   waiter, or paginator.
     * - client: (GuzzleHttp\ClientInterface) Optional Guzzle client used to
     *   transfer requests over the wire. If you do not specify a client, the
     *   SDK will create a new client that uses a shared Ring HTTP handler
     *   with other clients.
     * - credentials:
     *   (array|Aws\Credentials\CredentialsInterface|bool|callable) An
     *   Aws\Credentials\CredentialsInterface object to use with each, an
     *   associative array of "key", "secret", and "token" key value pairs,
     *   `false` to utilize null credentials, or a callable credentials
     *   provider function to create credentials using a function. If no
     *   credentials are provided, the SDK will attempt to load them from the
     *   environment.
     * - debug: (bool|resource) Set to true to display debug information
     *   when sending requests. Provide a stream resource to write debug
     *   information to a specific resource.
     * - endpoint: (string) The full URI of the webservice. This is only
     *   required when connecting to a custom endpoint (e.g., a local version
     *   of S3).
     * - endpoint_provider: (callable) An optional PHP callable that
     *   accepts a hash of options including a service and region key and
     *   returns a hash of endpoint data, of which the endpoint key is
     *   required.
     * - http: (array) Set to an array of Guzzle client request options
     *   (e.g., proxy, verify, etc.). See
     *   http://docs.guzzlephp.org/en/latest/clients.html#request-options for a
     *   list of available options.
     * - profile: (string) Allows you to specify which profile to use when
     *   credentials are created from the AWS credentials file in your HOME
     *   directory. This setting overrides the AWS_PROFILE environment
     *   variable. Note: Specifying "profile" will cause the "credentials" key
     *   to be ignored.
     * - region: (string, required) Region to connect to. See
     *   http://docs.aws.amazon.com/general/latest/gr/rande.html for a list of
     *   available regions.
     * - retries: (int, default=int(3)) Configures the maximum number of
     *   allowed retries for a client (pass 0 to disable retries).
     * - retry_logger: (string|Psr\Log\LoggerInterface) When the string "debug"
     *   is provided, all retries will be logged to STDOUT. Provide a PSR-3
     *   logger to log retries to a specific logger instance.
     * - ringphp_handler: (callable) RingPHP handler used to transfer HTTP
     *   requests (see http://ringphp.readthedocs.org/en/latest/).
     * - scheme: (string, default=string(5) "https") URI scheme to use when
     *   connecting connect.
     * - service: (string, required) Name of the service to utilize. This
     *   value will be supplied by default.
     * - signature_provider: (callable) A callable that accepts a signature
     *   version name (e.g., v4, s3), a service name, and region, and returns a
     *   SignatureInterface object. This provider is used to create signers
     *   utilized by the client.
     * - signature_version: (string) A string representing a custom
     *   signature version to use with a service (e.g., v4, s3, v2). Note that
     *   per/operation signature version MAY override this requested signature
     *   version.
     * - validate: (bool, default=bool(true)) Set to false to disable
     *   client-side parameter validation.
     * - version: (string, required) The version of the webservice to
     *   utilize (e.g., 2006-03-01).
     *
     * @param array $args Client configuration arguments.
     *
     * @throws \InvalidArgumentException if any required options are missing
     */
    public function __construct(array $args)
    {
        $service = $this->parseClass();
        $withResolved = null;

        if (!isset($args['service'])) {
            $args['service'] = $service;
        }

        $this->handlerStack = new HandlerStack();
        $resolver = new ClientResolver(static::getArguments());
        $config = $resolver->resolve($args, $this->handlerStack);
        $this->api = $config['api'];
        $this->signatureProvider = $config['signature_provider'];
        $this->endpoint = new Uri($config['endpoint']);
        $this->credentials = $config['credentials'];
        $this->region = isset($config['region']) ? $config['region'] : null;
        $this->httpClient = $config['client'];
        $this->config = $config['config'];
        $this->defaultRequestOptions = $config['http'];

        // Make sure the user agent is prefixed by the SDK version.
        $this->httpClient->setDefaultOption('allow_redirects', false);
        $this->httpClient->setDefaultOption(
            'headers/User-Agent',
            'aws-sdk-php/' . Sdk::VERSION . ' ' . \GuzzleHttp\default_user_agent()
        );

        $this->addSignatureMiddleware();

        if (isset($args['with_resolved'])) {
            /** @var callable $withResolved */
            $args['with_resolved']($config);
        }
    }

    public function getHandlerStack()
    {
        return $this->handlerStack;
    }

    public function __call($name, array $args)
    {
        $cmd = $this->getCommand($name, isset($args[0]) ? $args[0] : []);
        return $this->execute($cmd);
    }

    public function getConfig($keyOrPath = null)
    {
        return $keyOrPath === null
            ? $this->config
            : \GuzzleHttp\get_path($this->config, $keyOrPath);
    }

    public function executeAll($commands, array $options = [])
    {

    }

    public function getCredentials()
    {
        return $this->credentials;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getApi()
    {
        return $this->api;
    }

    /**
     * Executes an AWS command.
     *
     * @param CommandInterface $command Command to execute
     *
     * @return ResultInterface
     * @throws AwsException when an error occurs during transfer
     */
    public function execute(CommandInterface $command)
    {
        $handler = $command->getHandlerStack()->resolve();
        $promise = $handler($command);

        return empty($command['@future']) ? $promise->wait() : $promise;
    }

    public function getCommand($name, array $args = [])
    {
        // Fail fast if the command cannot be found in the description.
        if (!isset($this->api['operations'][$name])) {
            $name = ucfirst($name);
            if (!isset($this->api['operations'][$name])) {
                throw new \InvalidArgumentException("Operation not found: $name");
            }
        }

        if (!isset($args['@http'])) {
            $http = $this->defaultRequestOptions;
        } else {
            $http = $args['@http'] + $this->defaultRequestOptions;
            unset($args['@http']);
        }

        return new Command($name, $args, $http, clone $this->getHandlerStack());
    }

    public function getIterator($name, array $args = [])
    {
        $config = $this->api->getPaginatorConfig($name);
        if (!$config['result_key']) {
            throw new \UnexpectedValueException(sprintf(
                'There are no resources to iterate for the %s operation of %s',
                $name, $this->api['serviceFullName']
            ));
        }

        $key = is_array($config['result_key'])
            ? $config['result_key'][0]
            : $config['result_key'];

        if ($config['output_token'] && $config['input_token']) {
            return $this->getPaginator($name, $args)->search($key);
        }

        $result = $this->getCommand($name, $args)->search($key);

        return new \ArrayIterator((array) $result);
    }

    public function getPaginator($name, array $args = [], array $config = [])
    {
        $config += $this->api->getPaginatorConfig($name);

        return new ResultPaginator($this, $name, $args, $config);
    }

    public function getWaiter($name, array $args = [], array $config = [])
    {
        // Create the waiter. If async, then waiting begins immediately.
        $config += $this->api->getWaiterConfig($name);
        return new Waiter($this, $name, $args, $config);
    }

    public function waitUntil($name, array $args = [], array $config = [])
    {
        $this->getWaiter($name, $args, $config)->wait();
    }

    public function serialize(CommandInterface $command)
    {
        $request = null;
        // Return a mock response.
        $command->setRequestOption(
            'handler',
            new MockHandler(function ($req) use (&$request) {
                $request = $req;
                return new Response();
            })
        );
        $command['@future'] = true;
        $this->execute($command)->wait();

        return $request;
    }

    /**
     * Wraps an exception in an AWS specific exception.
     *
     * @return AwsException
     */
    protected function createException(\Exception $e)
    {
        if ($e instanceof AwsException) {
            return $e;
        }

        die("not implemented");
    }

    /**
     * Get the signature_provider function of the client.
     *
     * @return callable
     */
    final protected function getSignatureProvider()
    {
        return $this->signatureProvider;
    }

    /**
     * Parse the class name and setup the custom exception class of the client
     * and return the "service" name of the client.
     *
     * @return string
     */
    private function parseClass()
    {
        $klass = get_class($this);

        if ($klass === __CLASS__) {
            return '';
        }

        $service = substr($klass, strrpos($klass, '\\') + 1, -6);
        $this->commandException = "Aws\\{$service}\\Exception\\{$service}Exception";

        return strtolower($service);
    }

    private function addSignatureMiddleware()
    {
        // Sign requests. This may need to be modified later to support
        // variable signatures per/operation.
        $this->handlerStack->push(
            Middleware::signer(
                $this->credentials,
                Utils::constantly(SignatureProvider::resolve(
                    $this->signatureProvider,
                    $this->config['signature_version'],
                    $this->api->getSigningName(),
                    $this->region
                ))
            )
        );
    }

    /**
     * @deprecated
     * @return static
     */
    public static function factory(array $config = [])
    {
        return new static($config);
    }
}
