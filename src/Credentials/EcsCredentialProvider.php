<?php

namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Credential provider that fetches credentials with GET request.
 * ECS environment variable is used in constructing request URI.
 */
class EcsCredentialProvider
{
    const SERVER_URI = 'http://169.254.170.2';
    const ENV_URI = "AWS_CONTAINER_CREDENTIALS_RELATIVE_URI";
    const ENV_FULL_URI = "AWS_CONTAINER_CREDENTIALS_FULL_URI";
    const ENV_AUTH_TOKEN = "AWS_CONTAINER_AUTHORIZATION_TOKEN";
    const ENV_TIMEOUT = 'AWS_METADATA_SERVICE_TIMEOUT';
    const ENV_RETRIES = 'AWS_METADATA_SERVICE_NUM_ATTEMPTS';

    const DEFAULT_ENV_TIMEOUT = 1.0;
    const DEFAULT_ENV_RETRIES = 3;

    /** @var callable */
    private $client;

    /** @var int */
    private $retries;

    /** @var int */
    private $attempts;

    /** @var float|mixed */
    private $timeout;

    /**
     *  The constructor accepts following options:
     *  - timeout: (optional) Connection timeout, in seconds, default 1.0
     *  - retries: Optional number of retries to be attempted, default 3.
     *  - client: An EcsClient to make request from
     *
     * @param array $config Configuration options
     */
    public function __construct(array $config = [])
    {
        $this->timeout = (int) isset($config['timeout'])
            ? $config['timeout']
            : (getenv(self::ENV_TIMEOUT) ?: self::DEFAULT_ENV_TIMEOUT);
        $this->retries = (int) isset($config['retries'])
            ? $config['retries']
            : (getenv(self::ENV_RETRIES) ?: self::DEFAULT_ENV_RETRIES);

        $this->attempts = 0;
        $this->client = isset($config['client'])
            ? $config['client'] // internal use only
            : \Aws\default_http_handler();
    }

    /**
     * Load ECS credentials
     *
     * @return PromiseInterface
     */
    public function __invoke()
    {
        return Promise\Coroutine::of(function () {
            $client = $this->client;
            $request = new Request('GET', $this->getEcsUri());

            $headers = $this->setHeaderForAuthToken();

            $credentials = null;

            while ($credentials === null) {
                $credentials = (yield $client(
                    $request,
                    [
                        'timeout' => $this->timeout,
                        'proxy' => '',
                        'headers' => $headers,
                    ]
                )->then(function (ResponseInterface $response) {
                    $result = $this->decodeResult((string)$response->getBody());
                    return new Credentials(
                        $result['AccessKeyId'],
                        $result['SecretAccessKey'],
                        $result['Token'],
                        strtotime($result['Expiration'])
                    );
                })->otherwise(function ($reason) {
                    $reason = is_array($reason) ? $reason['exception'] : $reason;

                    $isRetryable = $reason instanceof ConnectException;
                    if ($isRetryable && ($this->attempts < $this->retries)) {
                        sleep((int)pow(1.2, $this->attempts));
                    } else {
                        $msg = $reason->getMessage();
                        throw new CredentialsException(
                            sprintf('Error retrieving credential from ECS after attempt %d/%d (%s)', $this->attempts, $this->retries, $msg)
                        );
                    }
                }));
                $this->attempts++;
            }

            yield $credentials;
        });
    }

    private function getEcsAuthToken()
    {
        return getenv(self::ENV_AUTH_TOKEN);
    }

    public function setHeaderForAuthToken()
    {
        $authToken = $this->getEcsAuthToken();
        $headers = [];
        if(!empty($authToken))
            $headers = ['Authorization' => $authToken];

        return $headers;
    }

    /**
     * Fetch credential URI from ECS environment variable
     *
     * @return string Returns ECS URI
     */
    private function getEcsUri()
    {
        $credsUri = getenv(self::ENV_URI);

        if ($credsUri === false) {
            $credsUri = isset($_SERVER[self::ENV_URI]) ? $_SERVER[self::ENV_URI] : '';
        }

        if(empty($credsUri)){
            $credFullUri = getenv(self::ENV_FULL_URI);
            if($credFullUri === false){
                $credFullUri = isset($_SERVER[self::ENV_FULL_URI]) ? $_SERVER[self::ENV_FULL_URI] : '';
            }

            if(!empty($credFullUri))
                return $credFullUri;
        }

        return self::SERVER_URI . $credsUri;
    }

    private function decodeResult($response)
    {
        $result = json_decode($response, true);

        if (!isset($result['AccessKeyId'])) {
            throw new CredentialsException('Unexpected ECS credential value');
        }
        return $result;
    }
}
