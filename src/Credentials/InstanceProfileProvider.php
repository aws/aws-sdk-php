<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use Aws\Exception\InvalidJsonException;
use Aws\Sdk;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;
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
    const TOKEN_PATH = 'api/token/';

    const ENV_DISABLE = 'AWS_EC2_METADATA_DISABLED';

    /** @var string */
    private $profile;

    /** @var callable */
    private $client;

    /** @var int */
    private $retries;

    /** @var int */
    private $attempts;

    /** @var float|mixed */
    private $timeout;

    /** @var string */
    private $token;

    /** @var int */
    private $tokenExpiry;

    /** @var int */
    private $tokenTtl;

    /**
     * The constructor accepts the following options:
     *
     * - timeout: Connection timeout, in seconds.
     * - profile: Optional EC2 profile name, if known.
     * - retries: Optional number of retries to be attempted.
     *
     * @param array $config Configuration options.
     */
    public function __construct(array $config = [])
    {
        $this->timeout = isset($config['timeout']) ? $config['timeout'] : 1.0;
        $this->profile = isset($config['profile']) ? $config['profile'] : null;
        $this->retries = isset($config['retries']) ? $config['retries'] : 3;
        $this->tokenTtl = isset($config['token_ttl'])
            ? $config['token_ttl']
            : 21600;
        $this->attempts = 0;
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

            if (empty($this->token) || time() >= $this->tokenExpiry) {
                $this->token = (yield $this->request(
                    self::TOKEN_PATH,
                    [
                        'x-aws-ec2-metadata-token-ttl-seconds' => $this->tokenTtl
                    ]
                ));
                $this->tokenExpiry = $this->calculateExpiry($this->tokenTtl);
            }

            if (!$this->profile) {
                $this->profile = (yield $this->request(self::CRED_PATH));
            }
            echo "Token: {$this->token}\n";
            echo "Token TTL: {$this->tokenTtl}\n";
            echo "Token Expiry: {$this->tokenExpiry}\n";
            echo "Current Time: " . time() . "\n";
            echo "Profile: {$this->profile}\n";
            $result = null;
            while ($result == null) {
                try {
                    $json = (yield $this->request(
                        self::CRED_PATH . $this->profile,
                        [
                            'x-aws-ec2-metadata-token' => $this->token
                        ]
                    ));
                    $result = $this->decodeResult($json);
                } catch (InvalidJsonException $e) {
                    if ($this->attempts < $this->retries) {
                        sleep(pow(1.2, $this->attempts));
                    } else {
                        throw new CredentialsException(
                            'Invalid JSON Response, retries exhausted.'
                        );
                    }
                } catch (RequestException $e) {
                    if ($this->attempts < $this->retries) {
                        sleep(pow(1.2, $this->attempts));
                    } else {
                        throw new CredentialsException(
                            'Networking error, retries exhausted.'
                        );
                    }
                }
                $this->attempts++;
            }
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
     * @param array $headers
     * @return PromiseInterface Returns a promise that is fulfilled with the
     *                          body of the response as a string.
     */
    private function request($url, $headers = [])
    {
        $disabled = getenv(self::ENV_DISABLE) ?: false;
        if (strcasecmp($disabled, 'true') === 0) {
            throw new CredentialsException(
                $this->createErrorMessage('EC2 metadata server access disabled')
            );
        }

        $fn = $this->client;
        $request = new Request('GET', self::SERVER_URI . $url);
        $userAgent = 'aws-sdk-php/' . Sdk::VERSION;
        if (defined('HHVM_VERSION')) {
            $userAgent .= ' HHVM/' . HHVM_VERSION;
        }
        $userAgent .= ' ' . \Aws\default_user_agent();
        $request = $request->withHeader('User-Agent', $userAgent);
        foreach ($headers as $key => $value) {
            $request = $request->withHeader($key, $value);
        }

        return $fn($request, ['timeout' => $this->timeout])
            ->then(function (ResponseInterface $response) {
                echo "Response: " . (string) $response->getBody() . "\n";
                return (string) $response->getBody();
            })->otherwise(function (array $reason) {
                $reason = $reason['exception'];
                if ($reason instanceof \GuzzleHttp\Exception\RequestException) {
                    throw $reason;
                }
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

        if (json_last_error() > 0) {
            throw new InvalidJsonException();
        }

        if ($result['Code'] !== 'Success') {
            throw new CredentialsException('Unexpected instance profile '
                .  'response code: ' . $result['Code']);
        }

        return $result;
    }

    private function calculateExpiry($timeToLive)
    {
        return time() + $timeToLive;
    }
}
