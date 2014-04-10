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
     * Get the service description associated with the client.
     *
     * @return \Aws\Api\Service
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
     * @return \Aws\Paginator\ResourceIterator
     */
    public function getIterator($name, array $args = [], array $config = []);

    /**
     * Get a result paginator for the specified operation.
     *
     * @param string $name   Name of the command used for iterator
     * @param array  $args   Command args to be used with each command
     * @param array  $config Hash of options
     *
     * @return \Aws\Paginator\ResultPaginator
     * @throws \RuntimeException
     */
    public function getPaginator($name, array $args = [], array $config = []);
}
