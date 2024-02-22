<?php

namespace Aws\IMDS;

use Aws\IMDS\Utils\ConfigFileProvider;
use Aws\IMDS\Utils\Validator;
use DateInterval;
use GuzzleHttp\Client;

/**
 * This class contains the configurations that can be provided to
 * an ec2 metadata client.
 */
final class Ec2MetadataConfig
{
    private const AWS_EC2_METADATA_SERVICE_ENDPOINT_MODE_KEY = 'AWS_EC2_METADATA_SERVICE_ENDPOINT_MODE';
    private const AWS_EC2_METADATA_SERVICE_ENDPOINT_KEY = 'AWS_EC2_METADATA_SERVICE_ENDPOINT';
    const HTTP_OPEN_TIMEOUT_KEY = 'http_open_timeout';
    const HTTP_READ_TIMEOUT_KEY = 'http_read_timeout';
    const HTTP_DEBUG_OUTPUT = 'http_debug_output';
    private const DEFAULT_IPv4_ENDPOINT = 'http://169.254.169.254';
    private const DEFAULT_IPv6_ENDPOINT = 'http://[fd00:ec2::254]';
    private const DEFAULT_PORT = 80;
    const DEFAULT_HTTP_ATTRS = [
        self::HTTP_OPEN_TIMEOUT_KEY => 1,
        self::HTTP_READ_TIMEOUT_KEY => 1,
        self::HTTP_DEBUG_OUTPUT => false,
    ];
    /**
     * The number of retries or max attempts when doing a request
     * against the metadata service, and that request fails. The
     * default value is 3 attempts.
     * @var int $retries
     */
    private $retries;
    /**
     * A customer custom provided endpoint, ex: ('http://169.254.169.254'),
     * but if not provided then we will resolve a default endpoint.
     * This option has precedence over $endpointMode.
     * @var string $endpoint
     */
    private $endpoint;
    /**
     * A customer custom provided port. If not provided by default
     * we will use 80.
     * @var int port
     */
    private $port;
    /**
     * tokenTtl (session's token time to live) is a value in seconds,
     * but provided as a DateInterval, to define how long a token will be valid.
     * The default value for this is 6 hours.
     * @var DateInterval $tokenTtl
     */
    private $tokenTtl;
    /**
     * A customer custom provided endpoint mode, but if not provided then
     * we will use IPv4. The valid options are IPv4, where its default endpoint
     * is ('http://169.254.169.254'), and IPv6 where its default endpoint is
     * ('http://[fd00:ec2::254]').
     * @var string $endpointMode
     */
    private $endpointMode;
    /**
     * This array is used to set http options such as http_open_timeout,
     * http_read_timeout, and http_debug_output. If not provided then we will
     * resolve default values for each option as following:
     *  - http_open_timeout, which is the number of seconds to wait for the
     * connection to open, will be set to 1.
     *  - http_read_timeout, which is the number seconds for one chunk of data to be read,
     * will be set to 1.
     *  - http_debug_output, which is to whether or not to enable debugging on requests.
     * By default, we will set this option to false, and we also do not recommend to enable this option
     * in production.
     * @var array $httpConfigAttrs
     */
    private $httpConfigAttrs;
    /**
     * A customer custom provided backoff used for retrying requests.
     * This can be either an integer, which will be interpreted as a number
     * of seconds to sleep, or a function that will be called with the number
     * of retries being made as argument. Example $this->config->backoff($numOfRetries).
     * Please make sure that if a function is provided then,
     * a sleep is actually implemented, otherwise the retries will be done instantly.
     * @var int|callable
     */
    private $backoff;
    /**
     * A custom http client that will handle the http requests.
     * If not provided then we will set one by default.
     * @internal
     * @var Client $client
     */
    private $client;

    /**
     * @return int
     */
    public function retries() {
        return $this->retries;
    }

    /**
     * @return string
     */
    public function endpoint() {
        return $this->endpoint;
    }

    /**
     * @return int
     */
    public function port() {
        return $this->port;
    }

    /**
     * @return DateInterval
     */
    public function tokenTtl() {
        return $this->tokenTtl;
    }

    /**
     * @return string
     */
    public function endpointMode() {
        return $this->endpointMode;
    }

    /**
     * @return array
     */
    public function httpConfigAttrs() {
        return $this->httpConfigAttrs;
    }

    /**
     * @param $attrName
     * @return mixed
     */
    public function httpConfigAttr($attrName) {
        if (!array_key_exists($attrName, $this->httpConfigAttrs ?? [])) {
            return null;
        }

        return $this->httpConfigAttrs[$attrName];
    }

    /**
     * @return callable|int
     */
    public function backoff() {
        return $this->backoff;
    }

    /**
     * @return Client
     */
    public function client() {
        return $this->client;
    }

    /**
     * @param int $retries
     * @return Ec2MetadataConfig
     */
    public function withRetries($retries) {
        $this->retries = $retries;

        return $this;
    }

    /**
     * @param string $endpointMode
     * @return Ec2MetadataConfig
     */
    public function withEndpointMode($endpointMode) {
        $this->endpointMode = $endpointMode;

        return $this;
    }

    /**
     * @param string $endpoint
     * @return Ec2MetadataConfig
     */
    public function withEndpoint($endpoint) {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @param int|DateInterval $tokenTtl
     * @return Ec2MetadataConfig
     */
    public function withTokenTtl($tokenTtl) {
        if (is_int($tokenTtl)) {
            $tokenTtl = DateInterval::createFromDateString($tokenTtl. ' seconds');
        }

        $this->tokenTtl = $tokenTtl;

        return $this;
    }

    /**
     * @param int $port
     * @return Ec2MetadataConfig
     */
    public function withPort($port) {
        $this->port = $port;

        return $this;
    }

    /**
     * @param string $httpConfigAttrName
     * @param mixed $value
     * @return Ec2MetadataConfig
     */
    public function withHttpConfigAttr($httpConfigAttrName, $value) {
        $this->httpConfigAttrs[$httpConfigAttrName] = $value ?? self::DEFAULT_HTTP_ATTRS[$httpConfigAttrName];

        return $this;
     }

    /**
     * @param int|callable $backoff
     * @return Ec2MetadataConfig
     */
     public function withBackoff($backoff) {
        $this->backoff = $backoff;

        return $this;
     }

    /**
     * @param Client $client
     * @return Ec2MetadataConfig
     */
     public function withClient($client) {
         $this->client = $client;

         return $this;
     }

    /**
     * This method resolves all the possible default values for any property
     * in the provided configuration object that has no value in.
     * @param Ec2MetadataConfig $config
     * @return Ec2MetadataConfig
     */
    public static function resolveDefaults($config) {
        $config->withEndpointMode($config->resolveEndpointMode());
        $config->withEndpoint($config->resolveEndpoint());
        $config->withTokenTtl((is_null($config->tokenTtl) ? Token::DEFAULT_TOKEN_TTL : $config->tokenTtl));
        $config->withPort($config->port === 0 ? self::DEFAULT_PORT : $config->port);
        $config->withHttpConfigAttr(
            self::HTTP_OPEN_TIMEOUT_KEY,
            $config->httpConfigAttr(self::HTTP_OPEN_TIMEOUT_KEY) ?? self::DEFAULT_HTTP_ATTRS[self::HTTP_OPEN_TIMEOUT_KEY]
        );
        $config->withHttpConfigAttr(
            self::HTTP_READ_TIMEOUT_KEY,
            $config->httpConfigAttr(self::HTTP_READ_TIMEOUT_KEY) ?? self::DEFAULT_HTTP_ATTRS[self::HTTP_READ_TIMEOUT_KEY]
        );
        $config->withHttpConfigAttr(
            self::HTTP_DEBUG_OUTPUT,
            $config->httpConfigAttr(self::HTTP_DEBUG_OUTPUT) ?? self::DEFAULT_HTTP_ATTRS[self::HTTP_DEBUG_OUTPUT]
        );
        $config->withClient(is_null($config->client()) ? new Client() : $config->client);

        return $config;
    }

    /**
     * This method resolves the endpoint mode. If is provided by the customer and
     * is a valid endpointMode then, we use that endpointMode, otherwise we try to resolve
     * this value from the different places where this can be defined, and as last option
     * we default it to IPv4.
     * @return string
     */
    private function resolveEndpointMode() {
        $endpointMode = $this->endpointMode
            ?: getenv(self::AWS_EC2_METADATA_SERVICE_ENDPOINT_MODE_KEY)
            ?: ConfigFileProvider::valueFor(self::AWS_EC2_METADATA_SERVICE_ENDPOINT_MODE_KEY)
            ?: EndpointMode::IPv4;
        $endpointMode = new EndpointMode($endpointMode);

        return $endpointMode->__toString();
    }

    /**
     * This method resolves the endpoint. If is provided by the customer and
     * is a valid URL then, we use that endpoint, otherwise we try to resolve
     * this value from the different places where this can be defined, and as last option
     * we default it to either http://169.254.169.254 if resolved endpointMode is IPv4
     * or http://[fd00:ec2::254] if endpointMode is resolved as IPv6.
     * @return string
     */
    private function resolveEndpoint() {
        $endpoint = $this->endpoint;
        if (!is_null($endpoint)) {
            return Validator::ifNotMatchesExprThrowException($endpoint, FILTER_VALIDATE_URL, 'The provided endpoint ' . $endpoint . ' is not valid');
        }

        $endpoint = getenv(self::AWS_EC2_METADATA_SERVICE_ENDPOINT_KEY)
            ?: ConfigFileProvider::valueFor(self::AWS_EC2_METADATA_SERVICE_ENDPOINT_KEY);
        if (!is_null($endpoint)) {
            return $endpoint;
        }

        // Resolve endpoint mode if not resolved yet. We need this value for resolving the default endpoint
        if (is_null($this->endpointMode)) {
            $this->withEndpointMode($this->resolveEndpointMode());
        }

        if ($this->endpointMode === EndpointMode::IPv4) {
            return self::DEFAULT_IPv4_ENDPOINT;
        } else if ($this->endpointMode === EndpointMode::IPv6) {
            return self::DEFAULT_IPv6_ENDPOINT;
        }

        return Validator::ifNullThrowException(null, "Endpoint could not be resolved");
    }
}
