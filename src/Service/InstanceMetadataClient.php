<?php
namespace Aws\Service;

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
        return $this->client->get($path);
    }

    /**
     * Retrieves the name of the IAM Instance Profile.
     *
     * @return string
     */
    public function getInstanceProfile()
    {
        $path = 'meta-data/iam/security-credentials/';
        return (string) $this->client->get($path)->getBody();
    }

    /**
     * Retrieves the IAM Instance Profile credentials which are associated with
     * the IAM role of the EC2 instance.
     *
     * @param string|null $profile The profile name
     *
     * @return array
     */
    public function getInstanceProfileCredentials($profile = null)
    {
        $profile = $profile ?: $this->getInstanceProfile();
        $path = "meta-data/iam/security-credentials/{$profile}";
        return $this->client->get($path . $profile)->json();
    }
}
