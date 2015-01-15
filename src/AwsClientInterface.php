<?php
namespace Aws;

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
     * @return \Aws\Credentials\CredentialsInterface
     */
    public function getCredentials();

    /**
     * Returns the signature implementation used with the client.
     *
     * @return \Aws\Signature\SignatureInterface
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
     * @return \Aws\Api\Service
     */
    public function getApi();

    /**
     * Get a resource iterator for the specified operation.
     *
     * @param string $name Name of the iterator to retrieve.
     * @param array  $args Command arguments to use with each command.
     *
     * @return \Iterator
     * @throws \UnexpectedValueException if the iterator config is invalid.
     */
    public function getIterator($name, array $args = []);

    /**
     * Get a result paginator for the specified operation.
     *
     * @param string $name   Name of the operation used for iterator
     * @param array  $args   Command args to be used with each command
     * @param array  $config Hash of paginator options.
     *
     * @return \Aws\ResultPaginator
     * @throws \UnexpectedValueException if the iterator config is invalid.
     */
    public function getPaginator($name, array $args = [], array $config = []);

    /**
     * Wait until a resource is in a particular state.
     *
     * @param string|callable $name Name of the waiter that defines the wait
     *                              configuration and conditions.
     * @param array  $args          Args to be used with each command executed
     *                              by the waiter. Use `'@future' => true` to
     *                              make the waiter work asynchronously.
     * @param array  $config        Waiter configuration. Use this to override
     *                              the defaults for the specified waiter.
     *
     * @return \Aws\Waiter|void
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
