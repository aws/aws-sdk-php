<?php
namespace Aws\Service\Sts;

use Aws\AwsClient;
use Aws\Credentials\Credentials;
use Aws\Result;

/**
 * Client used to interact with the AWS Security Token Service.
 */
class StsClient extends AwsClient
{
    /**
     * Creates credentials from the result of an STS operations
     *
     * @param Result $result Result of an STS operation
     *
     * @return Credentials
     * @throws \InvalidArgumentException if the result contains no credentials
     */
    public function createCredentials(Result $result)
    {
        if (!$result->hasKey('Credentials')) {
            throw new \InvalidArgumentException('Result contains no credentials');
        }

        return new Credentials(
            $result->getPath('Credentials/AccessKeyId'),
            $result->getPath('Credentials/SecretAccessKey'),
            $result->getPath('Credentials/SessionToken'),
            $result->getPath('Credentials/Expiration')
        );
    }
}
