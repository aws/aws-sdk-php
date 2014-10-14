<?php
namespace Aws\Common\Credentials;

use Aws\Common\Exception\InstanceProfileCredentialsException;
use GuzzleHttp\Client;
use GuzzleHttp\Utils;

/**
 * Uses credentials from the EC2 metadata server.
 */
class InstanceProfileCredentials extends AbstractRefreshableCredentials
{
    /** @var string */
    private $profile;

    /** @var int */
    private $retries;

    /** @var Client */
    private $client;

    /**
     * The constructor accepts the following options:
     *
     * - timeout: Connection timeout, in seconds.
     * - retries: Optional number of exponential backoff retries to use.
     * - profile: Optional EC2 profile name, if known.
     *
     * @param array $config Configuration options.
     */
    public function __construct(array $config = [])
    {
        $this->timeout = isset($config['timeout']) ? $config['timeout'] : 1.0;
        $this->profile = isset($config['profile']) ? $config['profile'] : null;
        $this->retries = isset($config['retries']) ? $config['retries'] : 3;

        if (isset($config['client'])) {
            // Internal use only. Not part of the public API.
            $this->client = $config['client'];
        } else {
            $this->client = $this->client = new Client([
                'base_url' => 'http://169.254.169.254/latest/',
                'defaults' => ['connect_timeout' => 1]
            ]);
        }

        $this->refresh();
    }

    public function refresh()
    {
        $result = $this->getCreds();

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

    private function getCreds()
    {
        return Utils::jsonDecode(
            $this->request('meta-data/iam/security-credentials/' . $this->getProfile()),
            true
        );
    }

    private function getProfile()
    {
        if (!$this->profile) {
            $this->profile = $this->request('meta-data/iam/security-credentials/');
        }

        return $this->profile;
    }

    private function request($url)
    {
        $retryCount = 0;
        do {
            try {
                return (string) $this->client->get($url)->getBody();
            } catch (\Exception $e) {
                if (++$retryCount > $this->retries) {
                    $message = $this->createErrorMessage($e->getMessage());
                    throw new InstanceProfileCredentialsException($message, $e->getCode());
                }
            }
        } while (1);
    }

    private function createErrorMessage($previous)
    {
        return <<<EOT
Error retrieving credentials from the instance profile metadata server. When
you are not running inside of Amazon EC2, you must provide your AWS Access Key
ID and Secret Access Key in the "key" and "secret" options when creating a
client or provide an instantiated Aws\\Common\\Credentials\\CredentialsInterface
object. ({$previous})
EOT;
    }
}
