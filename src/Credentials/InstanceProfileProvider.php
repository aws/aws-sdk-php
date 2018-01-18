<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Credential provider that provides credentials from the EC2 metadata server.
 */
class InstanceProfileProvider
{
    const SERVER_URI = 'http://169.254.169.254/latest/';
    const CRED_PATH = 'meta-data/iam/security-credentials/';

    const ENV_DISABLE = 'AWS_EC2_METADATA_DISABLED';

    /** @var string */
    private $profile;

    /** @var callable */
    private $client;

    /**
     * The constructor accepts the following options:
     *
     * - timeout: Connection timeout, in seconds.
     * - profile: Optional EC2 profile name, if known.
     *
     * @param array $config Configuration options.
     */
    public function __construct(array $config = [])
    {
        $this->timeout = isset($config['timeout']) ? $config['timeout'] : 1.0;
        $this->profile = isset($config['profile']) ? $config['profile'] : null;
        $this->client = isset($config['client'])
            ? $config['client'] // internal use only
            : \Aws\default_http_handler();
    }

    /**
     * Loads instance profile credentials.
     *
     * @return PromiseInterface
     */
    public function __invoke()
    {
        return Promise\coroutine(function () {
            if (!$this->profile) {
                $this->profile = (yield $this->request(self::CRED_PATH));
            }
            $json = (yield $this->request(self::CRED_PATH . $this->profile));
            $result = $this->decodeResult($json);
            yield new Credentials(
                $result['AccessKeyId'],
                $result['SecretAccessKey'],
                $result['Token'],
                strtotime($result['Expiration'])
            );
        });
    }

    /**
     * @param string $url
     * @return PromiseInterface Returns a promise that is fulfilled with the
     *                          body of the response as a string.
     */
    private function request($url)
    {
        $disabled = getenv(self::ENV_DISABLE) ?: false;
        if (strcasecmp($disabled, 'true') === 0) {
            throw new CredentialsException(
                $this->createErrorMessage('EC2 metadata server access disabled')
            );
        }

        $fn = $this->client;
        $request = new Request('GET', self::SERVER_URI . $url);

        return $fn($request, ['timeout' => $this->timeout])
            ->then(function (ResponseInterface $response) {
                return (string) $response->getBody();
            })->otherwise(function (array $reason) {
                $reason = $reason['exception'];
                $msg = $reason->getMessage();
                throw new CredentialsException(
                    $this->createErrorMessage($msg)
                );
            });
    }

    private function createErrorMessage($previous)
    {
        return "Error retrieving credentials from the instance profile "
            . "metadata server. ({$previous})";
    }

    private function decodeResult($response)
    {
        $result = json_decode($response, true);

        if ($result['Code'] !== 'Success') {
            throw new CredentialsException('Unexpected instance profile '
                .  'response code: ' . $result['Code']);
        }

        return $result;
    }
}
