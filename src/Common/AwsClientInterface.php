<?php
namespace Aws\Common;

use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\ServiceClientInterface;

/**
 * Represents an AWS client.
 */
interface AwsClientInterface extends ServiceClientInterface
{
    /**
     * Returns the AWS credentials associated with the client.
     *
     * @return \Aws\Common\Credentials\CredentialsInterface
     */
    public function getCredentials();

    /**
     * Returns the signature implementation used with the client.
     *
     * @return \Aws\Common\Signature\SignatureInterface
     */
    public function getSignature();

    /**
     * Get the region to which the client is configured to send requests.
     *
     * @return string
     */
    public function getRegion();

    /**
     * Gets the default endpoint, or base URL, used by the client.
     *
     * @return string
     */
    public function getEndpoint();

    /**
     * Get the service description associated with the client.
     *
     * @return \Aws\Common\Api\Service
     */
    public function getApi();

    /**
     * Get a resource iterator for the specified operation.
     *
     * @param string $name   Name of the command used for iterator
     * @param array  $args   Command args to be used with each command
     * @param array  $config Hash of options:
     *     - result_key: A jmespath expression that yields the resources to be
     *       iterated. If this is not provided, the default expression for the
     *       given operation will be used.
     *
     * @return \Aws\Common\Paginator\ResourceIterator
     * @throws \UnexpectedValueException if the iterator config is invalid.
     */
    public function getIterator($name, array $args = [], array $config = []);

    /**
     * Get a result paginator for the specified operation.
     *
     * @param string $name   Name of the command used for iterator
     * @param array  $args   Command args to be used with each command
     * @param array  $config Hash of options
     *
     * @return \Aws\Common\Paginator\ResultPaginator
     * @throws \UnexpectedValueException if the iterator config is invalid.
     */
    public function getPaginator($name, array $args = [], array $config = []);

    /**
     * Get a service waiter object by name.
     *
     * @param string|callable $name Name of the service waiter that defines the
     *                              wait conditions.
     * @param array  $args          Command args to be used with each command.
     * @param array  $config        Hash of options.
     *
     * @return \Aws\Common\Waiter\ResourceWaiter
     * @throws \UnexpectedValueException if the waiter is invalid.
     */
    public function getWaiter($name, array $args = [], array $config = []);

    /**
     * Wait until a particular condition is true.
     *
     * @param string|callable $name Name of the service waiter that defines the
     *                              wait conditions -OR- if a callable is
     *                              provided, then the callable acts as the wait
     *                              condition (return `true` to stop waiting).
     * @param array  $args          Command args to be used with each command.
     *                              If a callable was provided for $name, this
     *                              array will act as $config instead.
     * @param array  $config        Hash of options.
     *
     * @throws \UnexpectedValueException if the waiter is invalid.
     */
    public function waitUntil($name, array $args = [], array $config = []);

    /**
     * Creates and executes a command for an operation by name.
     *
     * @param string $name      Name of the command to execute.
     * @param array  $arguments Arguments to pass to the getCommand method.
     *
     * @return ResultInterface
     * @throws \Exception
     * @see \GuzzleHttp\Command\ServiceClientInterface::getCommand
     */
    public function __call($name, array $arguments);

    /**
     * Execute a single command.
     *
     * @param CommandInterface $command Command to execute
     *
     * @return ResultInterface
     * @throws \Exception
     */
    public function execute(CommandInterface $command);
}
