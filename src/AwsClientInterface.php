<?php

namespace Aws;

use GuzzleHttp\Command\ServiceClientInterface;

interface AwsClientInterface extends ServiceClientInterface
{
    /**
     * Returns the AWS credentials associated with the client
     *
     * @return \Aws\Common\Credentials\CredentialsInterface
     */
    public function getCredentials();

    /**
     * Returns the signature implementation used with the client
     *
     * @return \Aws\Common\Signature\SignatureInterface
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
     * @return \Aws\Api\Model
     */
    public function getApi();
}
