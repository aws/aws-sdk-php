<?php
namespace Aws\Service;

use Aws\Credentials\Credentials;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Client used for interacting with the Amazon EC2 instance metadata server
 */
class InstanceMetadataClient
{
    /**
     * @param ClientInterface $client Optionally provide a client to customize
     *                                settings like timeouts.
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?: new Client([
            'base_url' => 'http://169.254.169.254/latest/',
            'defaults' => [
                'connect_timeout' => 5,
                'timeout'         => 10
            ]
        ]);
    }

    /**
     * Wait until the instance metadata server is responding to requests.
     *
     * @param int $maxWait Maximum number of seconds to wait
     */
    public function waitUntilRunning($maxWait = 120)
    {
        // @todo: Implement
    }

    /**
     * Get a specific data point from the instance metadata server.
     *
     * @param string $path Instance metadata path to retrieve
     *
     * @return mixed
     */
    public function get($path)
    {
        return $this->client->get($path)->json();
    }

    /**
     * Get instance profile credentials
     *
     * @return Credentials
     * @throws \RuntimeException
     */
    public function getInstanceProfileCredentials()
    {
        try {
            $result = $this->get(
                "meta-data/iam/security-credentials/"
                . $this->get('meta-data/iam/security-credentials/')
            )->json();
        } catch (\Exception $e) {
            $message = sprintf('Error retrieving credentials from the instance'
                . ' profile metadata server. When you are not running inside of'
                . ' Amazon EC2, you must provide your AWS access key ID and '
                . ' secret access key in the "key" and "secret" options when '
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

        return new Credentials(
            $result['AccessKeyId'],
            $result['SecretAccessKey'],
            $result['Token'],
            strtotime($result['Expiration'])
        );
    }
}
