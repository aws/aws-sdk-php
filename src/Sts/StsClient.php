<?php
namespace Aws\Sts;

use Aws\Common\AwsClient;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Result;

/**
 * This client is used to interact with the **AWS Security Token Service (AWS STS)**.
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
