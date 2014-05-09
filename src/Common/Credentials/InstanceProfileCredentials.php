<?php
namespace Aws\Common\Credentials;

use Aws\Common\InstanceMetadataClient;

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
        $this->credentials = $credentials;
        if (!$credentials) {
            $this->refresh();
        }
    }

    public function refresh()
    {
        try {
            $result = $this->client->getInstanceProfileCredentials();
        } catch (\Exception $e) {
            $message = sprintf('Error retrieving credentials from the instance'
                . ' profile metadata server. When you are not running inside of'
                . ' Amazon EC2, you must provide your AWS Access Key ID and '
                . ' Secret Access Key in the "key" and "secret" options when '
                . ' creating a client or provide an instantiated '
                . ' Aws\\Common\\Credentials\\CredentialsInterface object.'
                . ' (%s)', $e->getMessage());
            throw new \RuntimeException($message, $e->getCode());
        }

        // Ensure that the status code was successful
        if ($result['Code'] !== 'Success') {
            throw new \RuntimeException('Unexpected instance profile response '
                . 'code: ' . $result['Code']);
        }

        $this->credentials = new Credentials(
            $result['AccessKeyId'],
            $result['SecretAccessKey'],
            $result['Token'],
            strtotime($result['Expiration'])
        );
    }
}
