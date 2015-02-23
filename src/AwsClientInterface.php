<?php
namespace Aws;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Represents an AWS client.
 */
interface AwsClientInterface
{
    /**
     * Creates and executes a command for an operation by name.
     *
     * @param string $name      Name of the command to execute.
     * @param array  $arguments Arguments to pass to the getCommand method.
     *
     * @return ResultInterface
     * @throws \Exception
     */
    public function __call($name, array $arguments);

    /**
     * Create a command for an operation name.
     *
     * Special keys may be set on the command to control how it behaves,
     * including:
     *
     * - @future: Set to true to create a future if possible. When processed,
     *   the "@future" key value pair can be removed from the input data before
     *   serializing the command.
     * - @http: Associative array of transfer specific options to apply to the
     *   request that is serialized for this command. Available keys include
     *   "proxy", "verify", "timeout", "connect_timeout", "debug", and
     *   "headers".
     *
     * @param string $name Name of the operation to use in the command
     * @param array  $args Arguments to pass to the command
     *
     * @return CommandInterface
     * @throws \InvalidArgumentException if no command can be found by name
     */
    public function getCommand($name, array $args = []);

    /**
     * Execute a single command.
     *
     * @param CommandInterface $command Command to execute
     *
     * @return ResultInterface
     * @throws \Exception
     */
    public function execute(CommandInterface $command);

    /**
     * Executes many commands concurrently using a fixed pool size.
     *
     * Exceptions encountered while executing the commands will not be thrown.
     * Instead, callers are expected to handle errors using callbacks.
     *
     *     $commands = [$client->getCommand('foo', ['baz' => 'bar'])];
     *     $client->executeAll($commands, [
     *         'then' => [function ($fulfilled) {}, function ($rejected) {}]
     *     ]);
     *
     * @param array|\Iterator $commands Array or iterator that contains
     *     CommandInterface objects to execute with the client.
     * @param array $options Associative array of options to apply.
     *     - pool_size: (int) Max number of commands to send concurrently.
     *       When this number of concurrent requests are created, the sendAll
     *       function blocks until all of the futures have completed.
     *     - request_options: (array) Request options to apply to each request.
     *     - then: (array) Array containing two elements. The first element may
     *       contain NULL or a function to call when a command succeeds. This
     *       callback is provided the result object. The second element is null
     *       or a callback to invoke with an exception as an argument when a
     *       command fails.
     */
    public function executeAll($commands, array $options = []);

    /**
     * Serialize a request for a command but do not send it.
     *
     * @param CommandInterface $command Command to serialize.
     *
     * @return RequestInterface
     */
    public function serialize(CommandInterface $command);

    /**
     * Returns the AWS credentials associated with the client.
     *
     * @return \Aws\Credentials\CredentialsInterface
     */
    public function getCredentials();

    /**
     * Get the region to which the client is configured to send requests.
     *
     * @return string
     */
    public function getRegion();

    /**
     * Gets the default endpoint, or base URL, used by the client.
     *
     * @return UriInterface
     */
    public function getEndpoint();

    /**
     * Get the service description associated with the client.
     *
     * @return \Aws\Api\Service
     */
    public function getApi();

    /**
     * Get a client configuration value.
     *
     * @param string|int|null $keyOrPath The Path to a particular configuration
     *     value. The syntax uses a path notation that allows you to retrieve
     *     nested array values without throwing warnings.
     *
     * @return mixed
     */
    public function getConfig($keyOrPath = null);

    /**
     * Get the handler stack used to transfer commands.
     *
     * @return HandlerStack
     */
    public function getHandlerStack();

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
}
