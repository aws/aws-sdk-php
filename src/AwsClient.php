<?php
namespace Aws;

use Aws\Api\Service;
use Aws\Credentials\CredentialsInterface;
use Aws\Exception\AwsException;
use Aws\Paginator\PaginatorFactory;
use Aws\Signature\SignatureInterface;
use Aws\Waiter\ResourceWaiterFactory;
use Aws\Waiter\Waiter;
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
     *   extends from {@see Aws\Exception\AwsException}.
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
        $this->region = $config['region'];
        $this->commandException = isset($config['exception_class'])
            ? $config['exception_class']
            : 'Aws\Exception\AwsException';
        $this->paginatorFactory = isset($config['paginator_factory'])
            ? $config['paginator_factory']
            : null;
        $this->waiterFactory = isset($config['waiter_factory'])
            ? $config['waiter_factory']
            : null;
        $this->defaults = isset($config['defaults']) ? $config['defaults'] : [];

        parent::__construct($config['client']);
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
            throw new $this->commandException($e);
        }
    }

    public function getIterator($name, array $args = [], array $config = [])
    {
        if ($this->paginatorFactory instanceof PaginatorFactory) {
            return $this->paginatorFactory->createIterator($this, $name, $args, $config);
        }

        throw new \RuntimeException('A paginator_factory must be provided to '
            . 'the client in order to use the ' . __METHOD__ . ' method.');
    }

    public function getPaginator($name, array $args = [], array $config = [])
    {
        if ($this->paginatorFactory instanceof PaginatorFactory) {
            return $this->paginatorFactory->createPaginator($this, $name, $args, $config);
        }

        throw new \RuntimeException('A paginator_factory must be provided to '
            . 'the client in order to use the ' . __METHOD__ . ' method.');
    }

    public function waitUntil($name, array $args = [], array $config = [])
    {
        if ($this->waiterFactory instanceof ResourceWaiterFactory) {
            $waiter = $this->waiterFactory->createWaiter($this, $name, $args, $config);
        } elseif (is_callable($name)) {
            $config = $config ? $config + ['args' => $args] : $args;
            $waiter = new Waiter($name, $config);
        } else {
            throw new \RuntimeException('A waiter_factory must be provided to '
                . 'the client in order to use the ' . __METHOD__ . ' method.');
        }

        $waiter->wait();
    }
}
