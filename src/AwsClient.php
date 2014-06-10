<?php
namespace Aws;

use Aws\Common\Api\Service;
use Aws\Common\Compat;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Paginator\PaginatorFactory;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Waiter\ResourceWaiterFactory;
use GuzzleHttp\Command\AbstractClient;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Exception\CommandException;

/**
 * Default AWS client implementation
 */
class AwsClient extends AbstractClient implements AwsClientInterface
{
    /** @var CredentialsInterface AWS credentials */
    private $credentials;

    /** @var SignatureInterface Signature implementation of the service */
    private $signature;

    /** @var array Default command options */
    private $defaults;

    /** @var string */
    private $region;

    /** @var Service */
    private $api;

    /** @var string */
    private $commandException;

    /** @var PaginatorFactory|null */
    private $paginatorFactory;

    /** @var ResourceWaiterFactory|null */
    private $waiterFactory;

    /**
     * The AwsClient constructor requires the following constructor options:
     *
     * - api: The Api object used to interact with a web service
     * - credentials: CredentialsInterface object used when signing.
     * - client: {@see GuzzleHttp\Client} used to send requests.
     * - signature: string representing the signature version to use (e.g., v4)
     * - region: (optional) Region used to interact with the service
     * - exception_class: (optional) A specific exception class to throw that
     *   extends from {@see Aws\AwsException}.
     *
     * @param array $config Configuration options
     * @throws \InvalidArgumentException if any required options are missing
     */
    public function __construct(array $config)
    {
        static $required = ['api', 'credentials', 'client', 'signature'];

        foreach ($required as $r) {
            if (!isset($config[$r])) {
                throw new \InvalidArgumentException("$r is a required option");
            }
        }

        $this->api = $config['api'];
        $this->credentials = $config['credentials'];
        $this->signature = $config['signature'];
        $this->region = isset($config['region']) ? $config['region'] : null;
        $this->commandException = isset($config['exception_class'])
            ? $config['exception_class']
            : 'Aws\AwsException';
        $this->paginatorFactory = isset($config['paginator_factory'])
            ? $config['paginator_factory']
            : null;
        $this->waiterFactory = isset($config['waiter_factory'])
            ? $config['waiter_factory']
            : null;
        $this->defaults = isset($config['defaults']) ? $config['defaults'] : [];

        parent::__construct($config['client']);
    }

    /**
     * Creates a new client based on the provided configuration options.
     *
     * @param array $config Configuration options
     *
     * @return static
     */
    public static function factory(array $config = [])
    {
        // Convert SDKv2 configuration options to SDKv3 configuration options.
        (new Compat)->convertConfig($config);

        // Determine the service being called
        $class = get_called_class();
        $service = substr($class, strrpos($class, '\\') + 1, -6);

        // Create the client using the Sdk class
        return (new Sdk)->getClient($service, $config);
    }

    public function getCommand($name, array $args = [])
    {
        $command = null;
        if (isset($this->api['operations'][$name])) {
            $command = $this->api['operations'][$name];
        } else {
            $name = ucfirst($name);
            if (isset($this->api['operations'][$name])) {
                $command = $this->api['operations'][$name];
            }
        }

        if (!$command) {
            throw new \InvalidArgumentException("Operation not found: $name");
        }

        $args += $this->defaults;

        return new AwsCommand($name, $args, $this->api, clone $this->getEmitter());
    }

    public function getCredentials()
    {
        return $this->credentials;
    }

    public function getSignature()
    {
        return $this->signature;
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
        } catch (CommandException $e) {
            throw call_user_func([$this->commandException, 'wrap'], $e);
        }
    }

    public function getIterator($name, array $args = [], array $config = [])
    {
        $this->validatePaginatorFactory();

        return $this->paginatorFactory->createIterator($this, $name, $args, $config);
    }

    public function getPaginator($name, array $args = [], array $config = [])
    {
        $this->validatePaginatorFactory();

        return $this->paginatorFactory->createPaginator($this, $name, $args, $config);
    }

    public function waitUntil($name, array $args = [], array $config = [])
    {
        if (!($this->waiterFactory instanceof ResourceWaiterFactory)) {
            throw new \RuntimeException('A waiter_factory must be provided to '
                . 'the client in order to use the ' . __METHOD__ . ' method.');
        }

        $waiter = $this->waiterFactory->createWaiter($this, $name, $args, $config);
        $waiter->wait();
    }

    private function validatePaginatorFactory()
    {
        if (!($this->paginatorFactory instanceof PaginatorFactory)) {
            $fn = debug_backtrace()[2]['function'];
            throw new \RuntimeException('A paginator_factory must be provided '
                . ' in order to use the ' . $fn . ' method.');
        }
    }
}
