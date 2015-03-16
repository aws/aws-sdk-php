<?php
namespace Aws;

use Aws\Api\Service;
use Aws\Credentials\CredentialsInterface;
use Aws\Signature\SignatureProvider;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Uri;

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

    /** @var callable */
    private $signatureProvider;

    /** @var HandlerList */
    private $handlerList;

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
     * - credentials:
     *   (Aws\Credentials\CredentialsInterface|array|bool|callable) Specifies
     *   the credentials used to sign requests. Provide an
     *   Aws\Credentials\CredentialsInterface object, an associative array of
     *   "key", "secret", and an optional "token" key, `false` to use null
     *   credentials, or a callable credentials provider used to create
     *   credentials or return null. See Aws\Credentials\CredentialProvider for
     *   a list of built-in credentials providers. If no credentials are
     *   provided, the SDK will attempt to load them from the environment.
     * - debug: (bool|resource) Set to true to display debug information
     *   when sending requests. Provide a stream resource to write debug
     *   information to a specific resource.
     * - endpoint: (string) The full URI of the webservice. This is only
     *   required when connecting to a custom endpoint (e.g., a local version
     *   of S3).
     * - endpoint_provider: (callable) An optional PHP callable that
     *   accepts a hash of options including a "service" and "region" key and
     *   returns NULL or a hash of endpoint data, of which the "endpoint" key
     *   is required. See Aws\Endpoint\EndpointProvider for a list of built-in
     *   providers.
     * - handler: (callable) A handler that accepts a command object,
     *   request object and returns a promise that is fulfilled with a result
     *   object or an AWS exception. A handler does not accept a next handler
     *   as it is terminal and expected to fulfill a request.
     * - http: (array, default=array(0)) Set to an array of SDK request
     *   options to apply to each request (e.g., proxy, verify, etc.).
     * - http_handler: (callable) An HTTP handler that accepts a request
     *   object and returns a promise that is fulfilled with a response object
     *   or array of exception data. This option supersedes any provided
     *   "handler" option.
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
     * - retry_logger: (string|Psr\Log\LoggerInterface) When the string
     *   "debug" is provided, all retries will be logged to STDOUT. Provide a
     *   PSR-3 logger to log retries to a specific logger instance.
     * - scheme: (string, default=string(5) "https") URI scheme to use when
     *   connecting connect. The SDK will utilize "https" endpoints (i.e.,
     *   utilize SSL/TLS connections) by default. You can attempt to connect to
     *   a service over an unencrypted "http" endpoint by setting ``scheme`` to
     *   "http".
     * - signature_provider: (callable) A callable that accepts a signature
     *   version name (e.g., "v4", "s3"), a service name, and region, and
     *   returns a SignatureInterface object or null. This provider is used to
     *   create signers utilized by the client. See
     *   Aws\Signature\SignatureProvider for a list of built-in providers
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
        list($service, $exceptionClass) = $this->parseClass();
        $withResolved = null;

        if (!isset($args['service'])) {
            $args['service'] = $service;
        }

        if (!isset($args['exception_class'])) {
            $args['exception_class'] = $exceptionClass;
        }

        $this->handlerList = new HandlerList();
        $resolver = new ClientResolver(static::getArguments());
        $config = $resolver->resolve($args, $this->handlerList);
        $this->api = $config['api'];
        $this->signatureProvider = $config['signature_provider'];
        $this->endpoint = new Uri($config['endpoint']);
        $this->credentials = $config['credentials'];
        $this->region = isset($config['region']) ? $config['region'] : null;
        $this->config = $config['config'];
        $this->defaultRequestOptions = $config['http'];
        $this->defaultRequestOptions['headers']['User-Agent'] = 'aws-sdk-php/' . Sdk::VERSION;
        $this->addSignatureMiddleware();

        if (isset($args['with_resolved'])) {
            /** @var callable $withResolved */
            $args['with_resolved']($config);
        }
    }

    public function getHandlerList()
    {
        return $this->handlerList;
    }

    public function __call($name, array $args)
    {
        $params = isset($args[0]) ? $args[0] : [];

        if (substr($name, -5) !== 'Async') {
            return $this->execute($this->getCommand($name, $params));
        }

        return $this->executeAsync(
            $this->getCommand(substr($name, 0, -5), $params)
        );
    }

    public function getConfig($keyOrPath = null)
    {
        return $keyOrPath === null
            ? $this->config
            : \GuzzleHttp\Utils::getPath($this->config, $keyOrPath);
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

    public function execute(CommandInterface $command)
    {
        return $this->executeAsync($command)->wait();
    }

    public function executeAsync(CommandInterface $command)
    {
        $handler = $command->getHandlerList()->resolve();
        return $handler($command);
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
            $args['@http'] = $this->defaultRequestOptions;
        } else {
            $args['@http'] += $this->defaultRequestOptions;
        }

        return new Command($name, $args, clone $this->getHandlerList());
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

    public function waitUntil($name, array $args = [], array $config = [])
    {
        $this->getWaiter($name, $args, $config)->promise()->wait();
    }

    public function getWaiter($name, array $args = [], array $config = [])
    {
        $config += $this->api->getWaiterConfig($name);

        return new Waiter($this, $name, $args, $config);
    }

    public function serialize(CommandInterface $command)
    {
        $request = null;
        // Return a mock response.
        $command->getHandlerList()->setHandler(
            function (CommandInterface $cmd, RequestInterface $req) use (&$request) {
                $request = $req;
                return new FulfilledPromise(new Result([]));
            }
        );
        $this->execute($command);

        return $request;
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
     * and return the "service" name of the client and "exception_class".
     *
     * @return array
     */
    private function parseClass()
    {
        $klass = get_class($this);

        if ($klass === __CLASS__) {
            return ['', 'Aws\Exception\AwsException'];
        }

        $service = substr($klass, strrpos($klass, '\\') + 1, -6);

        return [
            strtolower($service),
            "Aws\\{$service}\\Exception\\{$service}Exception"
        ];
    }

    private function addSignatureMiddleware()
    {
        // Sign requests. This may need to be modified later to support
        // variable signatures per/operation.
        $this->handlerList->append(
            Middleware::signer(
                $this->credentials,
                Utils::constantly(SignatureProvider::resolve(
                    $this->signatureProvider,
                    $this->config['signature_version'],
                    $this->api->getSigningName(),
                    $this->region
                ))
            ),
            ['step' => 'sign']
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
