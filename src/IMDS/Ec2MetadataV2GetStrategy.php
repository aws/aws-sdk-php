<?php

namespace Aws\IMDS;

use Aws\IMDS\Exceptions\MetadataNotFoundException;
use Aws\IMDS\Exceptions\RequestFailedException;
use Aws\IMDS\Exceptions\RequestForbiddenException;
use Aws\IMDS\Exceptions\TokenExpiredException;
use Aws\IMDS\Exceptions\TokenFetchException;
use Aws\IMDS\Utils\HttpStatus;
use Aws\IMDS\Utils\Retry;
use Aws\IMDS\Utils\RetryConfig;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class Ec2MetadataV2GetStrategy implements Ec2MetadataGetStrategy
{
    use Ec2MetadataTrait;
    /**
     * Client config
     * @var Ec2MetadataConfig $config
     */
    private $config;
    /**
     * Token to perform the request against the Ec2 metadata service.
     * @var Token $token
     */
    private $token;
    /**
     * The retry configuration to be used when retrying requests.
     * @var RetryConfig
     */
    private $retryConfig;
    /**
     * @param Ec2MetadataConfig $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->retryConfig = RetryConfig::newWithDefaults($config->retries(), $config->backoff(), self::retryBaseCondition());
    }

    /**
     * @param string $path
     * @inheritDoc
     */
    public function get($path) {
        return Retry::retry($this->retryConfig, function () use ($path) {
            // Let's fetch the token first
            $this->fetchToken();
            // Let's execute the desired get request to the ec2 metadata service
            return $this->executeThisGetRequest($path);
        });
    }

    /**
     * This method is used for handling the flow
     * for executing the request to the Ec2 metadata service,
     * such as fetching token, and then executing the get request.
     * @param string $path
     * @return Ec2MetadataResponse
     * @throws TokenFetchException|RequestForbiddenException|RequestFailedException|GuzzleException
     */
    private function executeThisGetRequest($path) {
        // Then, lets execute the get request
        $response = $this->doGetRequest($this->config->endpoint(), $path, [Token::X_AWS_EC2_METADATA_TOKEN_KEY => $this->token]);
        if ($response->getStatusCode() === HttpStatus::OK) {
            return new Ec2MetadataResponse($response->getBody()->getContents());
        }

        return $this->handleGetRequestResponseError($response);
    }

    /**
     * This method is used for fetching a token from the Ec2
     * metadata service.
     * @return void
     * @throws TokenFetchException|RequestForbiddenException|RequestFailedException|GuzzleException
     */
    private function fetchToken() {
        if (is_null($this->token) || $this->token->isExpired()) {
            $response = $this->doPutRequest(
                $this->config->endpoint(),
                Ec2Metadata::METADATA_TOKEN_PATH,
                [Token::X_AWS_EC2_METADATA_TOKEN_TTL_SECONDS_KEY => $this->config->tokenTtl()->s]
            );
            if ($response->getStatusCode() === HttpStatus::OK) {
                $ttl = \DateInterval::createFromDateString(
                    $response->getHeader(Token::X_AWS_EC2_METADATA_TOKEN_TTL_SECONDS_KEY)[0] . ' seconds'
                );
                $this->token = new Token($response->getBody()->getContents(), $ttl);
            }

            return $this->handleTokenResponseError($response);
        }
    }

    /**
     * @param ResponseInterface $response
     * @return null
     */
    private function handleTokenResponseError($response) {
        switch ($response->getStatusCode()) {
            case HttpStatus::MISSING_OR_INVALID_PARAMETERS:
                throw new TokenFetchException($response->getBody()->getContents());
            case HttpStatus::FORBIDDEN:
                throw new RequestForbiddenException($response->getBody()->getContents());
            default:
                throw new RequestFailedException($response->getBody()->getContents());
        }
    }

    /**
     * @param ResponseInterface $response
     * @return null
     */
    private function handleGetRequestResponseError($response) {
        switch ($response->getStatusCode()) {
            case HttpStatus::UNAUTHORIZED:
                throw new TokenExpiredException();
            case HttpStatus::NOT_FOUND:
                throw new MetadataNotFoundException($response->getBody()->getContents());
            default:
                throw new RequestFailedException($response->getBody()->getContents());
        }
    }

    /**
     * This method returns a function as the base condition
     * that decides which exceptions/errors will be retried.
     * @return callable
     */
    private static function retryBaseCondition() {
        return function ($exception) {
            if ($exception instanceof TokenExpiredException) {
                return true;
            }

            return false;
        };
    }
}
