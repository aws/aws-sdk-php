<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Credential provider that fetches credentials with GET request.
 * ECS environment variable is used in constructing request URI.
 */
class EcsCredentialProvider
{
    const SERVER_URI = 'http://169.254.170.2/';
    const ENV_URI = "AWS_CONTAINER_CREDENTIALS_RELATIVE_URI";

    /** @var callable */
    private $client;

    /**
     * @param array $config Configuration options
     */
    public function __construct(array $config = [])
    {
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
        return $this->request($this->getEcsUri());
    }

    /**
     * Fetch credential URI from ECS environment variable
     *
     * @return string Returns ECS URI
     * @throws CredentialsException If the credential URI path cannot be found
     */
    private function getEcsUri()
    {
        $creds_uri = getenv(self::ENV_URI);

        if (!$creds_uri) {
            throw new CredentialsException(
                "Unable to find an ECS environment variable value for "
                . self::ENV_URI
            );
        }
        return $creds_uri;
    }

    /**
     * @param string $url
     * @return PromiseInterface Returns a promise that is fulfilled with the
     *                          body of the response as a string.
     */
    private function request($url)
    {
        $client = $this->client;
        $request = new Request('GET', new Uri(self::SERVER_URI . $url));
        return $client($request)->then(function (ResponseInterface $response) {
            $result = $this->decodeResult((string) $response->getBody());
            return new Credentials(
                $result['AccessKeyId'],
                $result['SecretAccessKey'],
                $result['Token'],
                strtotime($result['Expiration'])
            );
        })->otherwise(function ($reason) {
            $msg = $reason->getMessage();
            throw new CredentialsException(
                "Error retrieving credential from ECS ($msg)"
            );
        });
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
