<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use GuzzleHttp\Psr7\Request;

/**
 * Loads credentials from the EC2 metadata server. If the profile cannot bef
 * found, the provider returns null.
 */
class InstanceProfileProvider
{
    const SERVER_URI = 'http://169.254.169.254/latest/';

    /** @var string */
    private $profile;

    /** @var int */
    private $retries;

    /** @var callable */
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
        $this->client = isset($config['client'])
            ? $config['client'] // internal use only
            : \Aws\default_http_handler();
    }

    /**
     * Loads refreshable profile credentials if they are available, otherwise
     * returns null.
     *
     * @return RefreshableCredentials|null
     */
    public function __invoke()
    {
        // Pass if the profile cannot be loaded or was not provided.
        if (!$this->profile) {
            try {
                $this->profile = $this->request('meta-data/iam/security-credentials/');
            } catch (CredentialsException $e) {
                return null;
            }
        }

        return new RefreshableCredentials(function () {
            $response = $this->request("meta-data/iam/security-credentials/$this->profile");
            $result = json_decode($response, true);
            if ($result['Code'] !== 'Success') {
                throw new CredentialsException('Unexpected instance profile response'
                    . " code: {$result['Code']}");
            }
            return new Credentials(
                $result['AccessKeyId'],
                $result['SecretAccessKey'],
                $result['Token'],
                strtotime($result['Expiration'])
            );
        });
    }

    /**
     * @param string $url
     *
     * @throws CredentialsException
     * @return string
     */
    private function request($url)
    {
        $fn = $this->client;
        $request = new Request('GET', self::SERVER_URI . $url);
        $retryCount = 0;
        start_over:
        try {
            $result = $fn($request, ['timeout' => $this->timeout]);
            return (string) $result->wait()->getBody();
        } catch (\Exception $e) {
            if (++$retryCount > $this->retries) {
                $message = $this->createErrorMessage($e->getMessage());
                throw new CredentialsException($message, $e->getCode());
            }
            goto start_over;
        }
    }

    private function createErrorMessage($previous)
    {
        return "Error retrieving credentials from the instance profile "
            . "metadata server. ({$previous})";
    }
}
