<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use http\Exception\InvalidArgumentException;
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
    const ENV_AUTH_TOKEN_FILE = "AWS_CONTAINER_AUTHORIZATION_TOKEN_FILE";
    const ENV_TIMEOUT = 'AWS_METADATA_SERVICE_TIMEOUT';
    const EKS_SERVER_HOST = '169.254.170.23';
    const EKS_SERVER_HOST_IPV6 = 'fd00:ec2::23';

    /** @var callable */
    private $client;

    /** @var float|mixed */
    private $timeout;

    /**
     *  The constructor accepts following options:
     *  - timeout: (optional) Connection timeout, in seconds, default 1.0
     *  - client: An EcsClient to make request from
     *
     * @param array $config Configuration options
     */
    public function __construct(array $config = [])
    {
        $timeout = getenv(self::ENV_TIMEOUT);

        if (!$timeout) {
            $timeout = $_SERVER[self::ENV_TIMEOUT] ?? ($config['timeout'] ?? 1.0);
        }

        $this->timeout = (float) $timeout;
        $this->client = $config['client'] ?? \Aws\default_http_handler();
    }

    /**
     * Load ECS credentials
     *
     * @return PromiseInterface
     * @throws GuzzleException
     */
    public function __invoke()
    {
        $client = $this->client;
        $uri = self::getEcsUri();

        if ($this->isValidUri($uri)) {
            $request = new Request('GET', $uri);

            $headers = $this->setHeaderForAuthToken();
            return $client(
                $request,
                [
                    'timeout' => $this->timeout,
                    'proxy' => '',
                    'headers' => $headers
                ]
            )->then(function (ResponseInterface $response) {
                $result = $this->decodeResult((string) $response->getBody());
                return new Credentials(
                    $result['AccessKeyId'],
                    $result['SecretAccessKey'],
                    $result['Token'],
                    strtotime($result['Expiration'])
                );
            })->otherwise(function ($reason) {
                $reason = is_array($reason) ? $reason['exception'] : $reason;
                $msg = $reason->getMessage();
                throw new CredentialsException(
                    "Error retrieving credential from ECS ($msg)"
                );
            });
        }

        throw new \InvalidArgumentException("Uri '{$uri}' contains an unsupported host.");
    }
    
    private function getEcsAuthToken()
    {
        if (!empty($path = getenv(self::ENV_AUTH_TOKEN_FILE))) {
            try {
                $token = file_get_contents($path);
            } catch (\Exception $e) {
                throw new \InvalidArgumentException(
                    "Failed to read authorization token from '{$path}': no such file or directory."
                );
            }

            return $token;
        }

        return getenv(self::ENV_AUTH_TOKEN);
    }

    public function setHeaderForAuthToken(){
        $authToken = self::getEcsAuthToken();
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
            $credsUri = $_SERVER[self::ENV_URI] ?? '';
        }

        if(empty($credsUri)){
            $credFullUri = getenv(self::ENV_FULL_URI);
            if ($credFullUri === false){
                $credFullUri = $_SERVER[self::ENV_FULL_URI] ?? '';
            }

            if (!empty($credFullUri))
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

    private function isValidUri($uri)
    {
        $parsed = parse_url($uri);

        if ($parsed['scheme'] !== 'https') {
            $host = trim($parsed['host'], '[]');

            if ($host !== '169.254.170.2'
                && $host !== self::EKS_SERVER_HOST
                && $host !== self::EKS_SERVER_HOST_IPV6
                && !$this->isLoopbackAddress($host)
            ) {
                return false;
            }
        }

        return true;
    }

    private function isLoopbackAddress($ip)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            return false;
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            if ($ip === '::1') {
                return true;
            }

            return false;
        }

        $loopbackStart = ip2long('127.0.0.0');
        $loopbackEnd = ip2long('127.255.255.255');

        $ipLong = ip2long($ip);

        return ($ipLong >= $loopbackStart && $ipLong <= $loopbackEnd);
    }
}
