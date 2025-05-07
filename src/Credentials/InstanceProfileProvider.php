<?php
namespace Aws\Credentials;

use Aws\Configuration\ConfigurationResolver;
use Aws\Exception\CredentialsException;
use Aws\Exception\InvalidJsonException;
use Aws\Sdk;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Credential provider that provides credentials from the EC2 metadata service.
 */
class InstanceProfileProvider
{
    const LEGACY_PATH = 'meta-data/iam/security-credentials/';
    const EXTENDED_PATH = 'meta-data/iam/security-credentials-extended/';
    const API_VERSION_EXTENDED = 'extended';
    const API_VERSION_LEGACY = 'legacy';
    const TOKEN_PATH = 'api/token';
    const ENV_DISABLE = 'AWS_EC2_METADATA_DISABLED';
    const ENV_TIMEOUT = 'AWS_METADATA_SERVICE_TIMEOUT';
    const ENV_RETRIES = 'AWS_METADATA_SERVICE_NUM_ATTEMPTS';
    const CFG_EC2_METADATA_SERVICE_ENDPOINT = 'ec2_metadata_service_endpoint';
    const CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE = 'ec2_metadata_service_endpoint_mode';
    const CFG_DISABLE_EC2_METADATA = 'disable_ec2_metadata';
    const CFG_EC2_INSTANCE_PROFILE_NAME = 'ec2_instance_profile_name';
    const DEFAULT_TIMEOUT = 1.0;
    const DEFAULT_RETRIES = 3;
    const DEFAULT_TOKEN_TTL_SECONDS = 21600;
    const ENDPOINT_MODE_IPv4 = 'IPv4';
    const ENDPOINT_MODE_IPv6 = 'IPv6';
    const DEFAULT_METADATA_SERVICE_IPv4_ENDPOINT = 'http://169.254.169.254';
    const DEFAULT_METADATA_SERVICE_IPv6_ENDPOINT = 'http://[fd00:ec2::254]';

    /** @var string */
    private $profile;

    /** @var callable */
    private $client;

    /** @var string */
    private $apiVersion;

    /** @var int */
    private $retries;

    /** @var int */
    private $attempts;

    /** @var float|mixed */
    private $timeout;

    /** @var string */
    private $endpoint;

    /** @var string */
    private $endpointMode;

    /** @var array */
    private $config;

    /**
     * The constructor accepts the following options:
     *
     * - timeout: Connection timeout, in seconds.
     * - profile: Optional EC2 profile name, if known.
     * - retries: Optional number of retries to be attempted.
     * - ec2_metadata_v1_disabled: Optional for disabling the fallback to IMDSv1.
     * - endpoint: Optional for overriding the default endpoint to be used for fetching credentials.
     *   The value must contain a valid URI scheme. If the URI scheme is not https, it must
     *   resolve to a loopback address.
     * - endpoint_mode: Optional for overriding the default endpoint mode (IPv4|IPv6) to be used for
     *   resolving the default endpoint.
     * - use_aws_shared_config_files: Decides whether the shared config file should be considered when
     *   using the ConfigurationResolver::resolve method.
     *
     * @param array $config Configuration options.
     */
    public function __construct(array $config = [])
    {
        $this->timeout = (float) getenv(self::ENV_TIMEOUT)
            ?: ($config['timeout'] ?? self::DEFAULT_TIMEOUT);
        $this->profile = $config['profile']
            ?? $config[self::CFG_EC2_INSTANCE_PROFILE_NAME]
            ?? ConfigurationResolver::resolve(
                self::CFG_EC2_INSTANCE_PROFILE_NAME,
                null,
                'string',
                $this->config
            );
        $this->retries = (int) getenv(self::ENV_RETRIES)
            ?: ($config['retries'] ?? self::DEFAULT_RETRIES);
        $this->client = $config['client'] ?? \Aws\default_http_handler();
        $this->endpoint = $config[self::CFG_EC2_METADATA_SERVICE_ENDPOINT] ?? null;
        if (!empty($this->endpoint) && !$this->isValidEndpoint($this->endpoint)) {
            throw new \InvalidArgumentException(
                'The provided URI "'
                . $this->endpoint . '" is invalid, or contains an unsupported host'
            );
        }

        $this->endpointMode = $config[self::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE] ?? null;
        $this->apiVersion = self::API_VERSION_EXTENDED;
        $this->config = $config;
    }

    /**
     * Loads instance profile credentials.
     *
     * @return PromiseInterface
     */
    public function __invoke($previousCredentials = null)
    {
        return Promise\Coroutine::of(function () use ($previousCredentials) {
            $token = $this->getToken($previousCredentials);

            if ($token === false) {
                goto generateCredentials;
            }

            $headers = [
                'x-aws-ec2-metadata-token' => $token
            ];

            if (!$this->profile) {
                $this->profile = $this->getProfile($headers);
            }

            $result = $this->getCredentials($headers, $previousCredentials);

            generateCredentials:
            if (isset($result)) {
                $credentials = new Credentials(
                    $result['AccessKeyId'],
                    $result['SecretAccessKey'],
                    $result['Token'],
                    strtotime($result['Expiration']),
                    $result['AccountId'] ?? null,
                    CredentialSources::IMDS
                );
            } else {
                $credentials = $previousCredentials;
            }

            if ($credentials->isExpired()) {
                $credentials->extendExpiration();
            }

            yield $credentials;
        });
    }

    /**
     * @param $previousCredentials
     *
     * @return string|bool
     */
    private function getToken($previousCredentials): string | bool
    {
        $token = null;
        while (is_null($token)) {
            try {
                $token = $this->request(self::TOKEN_PATH, 'PUT', [
                    'x-aws-ec2-metadata-token-ttl-seconds' => self::DEFAULT_TOKEN_TTL_SECONDS
                ])->wait();
            } catch (TransferException $e) {
                if ($previousCredentials instanceof Credentials
                    && $this->getExceptionStatusCode($e) === 500
                ) {
                    return false;
                }

                $this->handleRetryableException(
                    $e,
                    [],
                    $this->createErrorMessage('Error retrieving metadata token')
                );
            }

            $this->attempts++;
        }

        return $token;
    }

    /**
     * @param array $headers
     *
     * @return PromiseInterface
     */
    private function getProfile(array $headers): string
    {
        while (true) {
            $path = $this->getMetadataPath();

            try {
                return $this->request($path, 'GET', $headers)->wait();
            } catch (TransferException $e) {
                if ($this->apiVersion === self::API_VERSION_EXTENDED
                    && $this->getExceptionStatusCode($e) === 404
                ) {
                    $this->apiVersion = self::API_VERSION_LEGACY;
                }

                $this->handleRetryableException(
                    $e,
                    ['blacklist' => [401, 403]],
                    $this->createErrorMessage($e->getMessage())
                );
            }

            $this->attempts++;
        }
    }

    /**
     * @param array $headers
     * @param $previousCredentials
     *
     * @return mixed|null
     */
    private function getCredentials(array $headers, $previousCredentials): array | null
    {
        while (true) {
            $path = $this->getMetadataPath() . $this->profile;

            try {
                $json = $this->request($path, 'GET', $headers)->wait();
                return $this->decodeResult($json);
            } catch (InvalidJsonException $e) {
                $this->handleRetryableException(
                    $e,
                    ['blacklist' => [401, 403]],
                    $this->createErrorMessage(
                        'Invalid JSON response, retries exhausted'
                    )
                );
            } catch (TransferException $e) {
                if ($this->apiVersion === self::API_VERSION_EXTENDED
                    && $this->getExceptionStatusCode($e) === 404
                ) {
                    $this->apiVersion = self::API_VERSION_LEGACY;
                }

                if ($previousCredentials instanceof Credentials
                    && ($this->getExceptionStatusCode($e) === 500
                        || str_contains($e->getMessage(), "cURL error 28"))
                ) {
                    return null;
                }

                $this->handleRetryableException(
                    $e,
                    ['blacklist' => [401, 403]],
                    $this->createErrorMessage($e->getMessage())
                );
            }

            $this->attempts++;
        }
    }

    /**
     * @param string $path
     * @param string $method
     * @param array $headers
     * @return PromiseInterface Returns a promise that is fulfilled with the
     *                          body of the response as a string.
     */
    private function request($path, $method = 'GET', $headers = [])
    {
        $disabled = ConfigurationResolver::ini(self::CFG_DISABLE_EC2_METADATA, 'bool')
            ?? ConfigurationResolver::env(substr(self::ENV_DISABLE, 4), 'bool')
            ?? false;

        if ($disabled) {
            throw new CredentialsException(
                $this->createErrorMessage('EC2 metadata service access disabled')
            );
        }

        $fn = $this->client;
        $request = new Request($method, $this->resolveEndpoint() . $path);
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
                return (string) $response->getBody();
            })->otherwise(function (array $reason) {
                $reason = $reason['exception'];
                if ($reason instanceof TransferException) {
                    throw $reason;
                }
                $msg = $reason->getMessage();
                throw new CredentialsException(
                    $this->createErrorMessage($msg)
                );
            });
    }

    private function handleRetryableException(
        \Exception $e,
       $retryOptions,
       $message
    ) {
        $isRetryable = true;
        if (!empty($status = $this->getExceptionStatusCode($e))
            && isset($retryOptions['blacklist'])
            && in_array($status, $retryOptions['blacklist'])
        ) {
            $isRetryable = false;
        }

        if ($isRetryable && $this->attempts < $this->retries) {
            sleep((int) pow(1.2, $this->attempts));
        } else {
            throw new CredentialsException($message);
        }
    }

    private function getExceptionStatusCode(\Exception $e)
    {
        if (method_exists($e, 'getResponse')
            && !empty($e->getResponse())
        ) {
            return $e->getResponse()->getStatusCode();
        }
        return null;
    }

    private function createErrorMessage($previous)
    {
        return "Error retrieving credentials from the instance profile "
            . "metadata service. ({$previous})";
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

    private function getMetadataPath(): string
    {
        return $this->apiVersion === self::API_VERSION_EXTENDED
            ? self::EXTENDED_PATH
            : self::LEGACY_PATH;
    }

    /**
     * Resolves the metadata service endpoint. If the endpoint is not provided
     * or configured then, the default endpoint, based on the endpoint mode resolved,
     * will be used.
     * Example: if endpoint_mode is resolved to be IPv4 and the endpoint is not provided
     * then, the endpoint to be used will be http://169.254.169.254.
     *
     * @return string
     */
    private function resolveEndpoint(): string
    {
        $endpoint = $this->endpoint;
        if (is_null($endpoint)) {
            $endpoint = ConfigurationResolver::resolve(
                self::CFG_EC2_METADATA_SERVICE_ENDPOINT,
                $this->getDefaultEndpoint(),
                'string',
                $this->config
            );
        }

        if (!$this->isValidEndpoint($endpoint)) {
            throw new CredentialsException('The provided URI "' . $endpoint . '" is invalid, or contains an unsupported host');
        }

        if (!str_ends_with($endpoint, '/')) {
            $endpoint .= '/';
        }

        return $endpoint . 'latest/';
    }

    /**
     * Resolves the default metadata service endpoint.
     * If endpoint_mode is resolved as IPv4 then:
     * - endpoint = http://169.254.169.254
     * If endpoint_mode is resolved as IPv6 then:
     * - endpoint = http://[fd00:ec2::254]
     *
     * @return string
     */
    private function getDefaultEndpoint(): string
    {
        $endpointMode = $this->resolveEndpointMode();
        switch ($endpointMode) {
            case self::ENDPOINT_MODE_IPv4:
                return self::DEFAULT_METADATA_SERVICE_IPv4_ENDPOINT;
            case self::ENDPOINT_MODE_IPv6:
                return self::DEFAULT_METADATA_SERVICE_IPv6_ENDPOINT;
        }

        throw new CredentialsException("Invalid endpoint mode '$endpointMode' resolved");
    }

    /**
     * Resolves the endpoint mode to be considered when resolving the default
     * metadata service endpoint.
     *
     * @return string
     */
    private function resolveEndpointMode(): string
    {
        $endpointMode = $this->endpointMode;
        if (is_null($endpointMode)) {
            $endpointMode = ConfigurationResolver::resolve(
                self::CFG_EC2_METADATA_SERVICE_ENDPOINT_MODE,
                self::ENDPOINT_MODE_IPv4,
                'string',
                $this->config
            );
        }

        return $endpointMode;
    }

    /**
     * This method checks for whether a provide URI is valid.
     * @param string $uri this parameter is the uri to do the validation against to.
     *
     * @return string|null
     */
    private function isValidEndpoint(
        $uri
    ): bool
    {
        // We make sure first the provided uri is a valid URL
        $isValidURL = filter_var($uri, FILTER_VALIDATE_URL) !== false;
        if (!$isValidURL) {
            return false;
        }

        // We make sure that if is a no secure host then it must be a loop back address.
        $parsedUri = parse_url($uri);
        if ($parsedUri['scheme'] !== 'https') {
            $host = trim($parsedUri['host'], '[]');

            return CredentialsUtils::isLoopBackAddress(gethostbyname($host))
                || in_array(
                    $uri,
                    [self::DEFAULT_METADATA_SERVICE_IPv4_ENDPOINT, self::DEFAULT_METADATA_SERVICE_IPv6_ENDPOINT]
                );
        }

        return true;
    }
}
