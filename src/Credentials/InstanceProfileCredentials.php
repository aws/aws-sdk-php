<?php
namespace Aws\Credentials;

use Aws\Service\InstanceMetadataClient;

/**
 * Credentials decorator used to implement retrieving credentials from the
 * EC2 metadata server
 */
class InstanceProfileCredentials extends AbstractRefreshableCredentials
{
    /** @var InstanceMetadataClient */
    private $client;

    /**
     * Constructs a new instance profile credentials decorator
     *
     * @param InstanceMetadataClient $client      Client to use
     * @param CredentialsInterface   $credentials Credentials to adapt
     */
    public function __construct(
        InstanceMetadataClient $client,
        CredentialsInterface $credentials = null
    ) {
        $this->client = $client;
        $this->credentials = $credentials
            ?: $client->getInstanceProfileCredentials();
    }

    public function refresh()
    {
        $this->credentials = $this->client->getInstanceProfileCredentials();
    }
}
