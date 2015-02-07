<?php
namespace Aws;

use Aws\Exception\AwsException;
use Aws\Api\Service;
use Aws\Credentials\CredentialsInterface;
use Aws\Signature\SignatureProvider;
use GuzzleHttp\Command\AbstractClient;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * Default AWS client implementation
 */
class AwsClient extends AbstractClient implements AwsClientInterface
{
    /** @var CredentialsInterface AWS credentials */
    private $credentials;

    /** @var array Default command options */
    private $defaults;

    /** @var string */
    private $region;

    /** @var string */
    private $endpoint;

    /** @var Service */
    private $api;

    /** @var string */
    private $commandException;

    /** @var callable */
    private $errorParser;

    /** @var callable */
    private $serializer;

    /** @var callable */
    private $signatureProvider;

    /** @var callable */
    private $defaultSignatureListener;

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
     * - client: (GuzzleHttp\ClientInterface|bool) Optional Guzzle client
     *   used to transfer requests over the wire. Set to true or do not specify
     *   a client, and the SDK will create a new client that uses a shared Ring
     *   HTTP handler with other clients.
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
     * - defaults: (array, default=array(0)) An associative array of
     *   default parameters to pass to each operation created by the client.
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
     * - retry_logger: When the string "debug" is provided, all retries
     *   will be logged to STDOUT. Provide a PSR-3 logger to log retries to a
     *   specific logger instance.
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
        $resolver = new ClientResolver(static::getArguments());
        $withResolved = null;

        if (isset($args['with_resolved'])) {
            $withResolved = $args['with_resolved'];
            unset($args['with_resolved']);
        }

        if (!isset($args['service'])) {
            $args['service'] = $service;
        }

        $config = $resolver->resolve($args, $this->getEmitter());
        $this->api = $config['api'];
        $this->serializer = $config['serializer'];
        $this->errorParser = $config['error_parser'];
        $this->signatureProvider = $config['signature_provider'];
        $this->endpoint = $config['endpoint'];
        $this->credentials = $config['credentials'];
        $this->defaults = $config['defaults'];
        $this->region = isset($config['region']) ? $config['region'] : null;
        $this->applyParser();
        $this->initSigners($config['config']['signature_version']);
        parent::__construct($config['client'], $config['config']);

        if ($withResolved) {
            /** @var callable $withResolved */
            $withResolved($config);
        }
    }

    /**
     * @deprecated
     * @return static
     */
    public static function factory(array $config = [])
    {
        return new static($config);
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
     * @return mixed Returns the result of the command
     * @throws AwsException when an error occurs during transfer
     */
    public function execute(CommandInterface $command)
    {
        try {
            return parent::execute($command);
        } catch (AwsException $e) {
            throw $e;
        } catch (\Exception $e) {
            // Wrap other uncaught exceptions for consistency
            $exceptionClass = $this->commandException;
            throw new $exceptionClass(
                sprintf('Uncaught exception while executing %s::%s - %s',
                    get_class($this),
                    $command->getName(),
                    $e->getMessage()),
                new CommandTransaction($this, $command),
                $e
            );
        }
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

        // Merge in default configuration options.
        $args += $this->getConfig('defaults');

        if (isset($args['@future'])) {
            $future = $args['@future'];
            unset($args['@future']);
        } else {
            $future = false;
        }

        return new Command($name, $args + $this->defaults, [
            'emitter' => clone $this->getEmitter(),
            'future' => $future
        ]);
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
        // Create the waiter. If async, then waiting begins immediately.
        $config += $this->api->getWaiterConfig($name);
        $waiter = new Waiter($this, $name, $args, $config);

        // If async, return the future, for access to then()/wait()/cancel().
        if (!empty($args['@future'])) {
            return $waiter;
        }

        // For synchronous waiting, call wait() and don't return anything.
        $waiter->wait();
    }

    /**
     * Creates AWS specific exceptions.
     *
     * {@inheritdoc}
     *
     * @return AwsException
     */
    public function createCommandException(CommandTransaction $transaction)
    {
        // Throw AWS exceptions as-is
        if ($transaction->exception instanceof AwsException) {
            return $transaction->exception;
        }

        // Set default values (e.g., for non-RequestException)
        $url = null;
        $transaction->context['aws_error'] = [];
        $serviceError = $transaction->exception->getMessage();

        if ($transaction->exception instanceof RequestException) {
            $url = $transaction->exception->getRequest()->getUrl();
            if ($response = $transaction->exception->getResponse()) {
                $parser = $this->errorParser;
                // Add the parsed response error to the exception.
                $transaction->context['aws_error'] = $parser($response);
                // Only use the AWS error code if the parser could parse response.
                if (!$transaction->context->getPath('aws_error/type')) {
                    $serviceError = $transaction->exception->getMessage();
                } else {
                    // Create an easy to read error message.
                    $serviceError = trim($transaction->context->getPath('aws_error/code')
                        . ' (' . $transaction->context->getPath('aws_error/type')
                        . ' error): ' . $transaction->context->getPath('aws_error/message'));
                }
            }
        }

        $exceptionClass = $this->commandException;
        return new $exceptionClass(
            sprintf('Error executing %s::%s() on "%s"; %s',
                get_class($this),
                lcfirst($transaction->command->getName()),
                $url,
                $serviceError),
            $transaction,
            $transaction->exception
        );
    }

    final protected function createFutureResult(CommandTransaction $transaction)
    {
        return new FutureResult(
            $transaction->response->then(function () use ($transaction) {
                return $transaction->result;
            }),
            [$transaction->response, 'wait'],
            [$transaction->response, 'cancel']
        );
    }

    final protected function serializeRequest(CommandTransaction $trans)
    {
        $fn = $this->serializer;
        $request = $fn($trans);

        // Note: We can later update this to allow custom per/operation
        // signers, by checking the corresponding operation for a
        // signatureVersion override and attaching a different listener.
        $request->getEmitter()->on(
            'before',
            $this->defaultSignatureListener,
            RequestEvents::SIGN_REQUEST
        );

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

    private function initSigners($defaultVersion)
    {
        $defaultSigner = SignatureProvider::resolve(
            $this->signatureProvider,
            $defaultVersion,
            $this->api->getSigningName(),
            $this->region
        );
        $this->defaultSignatureListener = function (BeforeEvent $e) use ($defaultSigner) {
            $defaultSigner->signRequest(
                $e->getRequest(),
                $this->credentials
            );
        };
    }

    private function parseClass()
    {
        $klass = get_class($this);

        if ($klass == __CLASS__) {
            $this->commandException = 'Aws\Exception\AwsException';
            return '';
        }

        $parts = explode('\\', $klass);
        $service = substr(array_pop($parts), 0, -6);
        $this->commandException = implode('\\', $parts)
            . "\\Exception\\{$service}Exception";

        return strtolower($service);
    }

    private function applyParser()
    {
        $parser = Service::createParser($this->api);
        $this->getEmitter()->on(
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
}
