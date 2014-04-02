<?php
namespace Aws;

use GuzzleHttp\Command\ServiceClientInterface;

/**
 * Represents an AWS client.
 */
interface AwsClientInterface extends ServiceClientInterface
{
    /**
     * Returns the AWS credentials associated with the client
     *
     * @return \Aws\Credentials\CredentialsInterface
     */
    public function getCredentials();

    /**
     * Returns the signature implementation used with the client
     *
     * @return \Aws\Signature\SignatureInterface
     */
    public function getSignature();

    /**
     * Get the name of the region to which the client is configured to send requests
     *
     * @return string
     */
    public function getRegion();

    /**
     * Get the service description associated with the client
     *
     * @return \Aws\Api\Service
     */
    public function getApi();
}
