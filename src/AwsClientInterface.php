<?php
namespace Aws;

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
     * @throws \RuntimeException if a paginator factory is unavailable
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
     * @throws \RuntimeException if a paginator factory is unavailable
     */
    public function getPaginator($name, array $args = [], array $config = []);

    /**
     * Wait until a particular condition is true.
     *
     * @param string|callable $name Name of the waiter that defines the wait
     *                              conditions. If a callable is provided, then
     *                              the callable handled the wait conditions
     * @param array  $args          Command args to be used with each command.
     *                              If a callable was provided for $name, this
     *                              array will act as $config instead.
     * @param array  $config        Hash of options
     *
     * @throws \RuntimeException if a waiter factory is unavailable
     */
    public function waitUntil($name, array $args = [], array $config = []);
}
