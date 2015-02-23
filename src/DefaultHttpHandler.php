<?php
namespace Aws;

use Aws\Exception\AwsException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides the default bindings to send HTTP requests.
 */
class DefaultHttpHandler
{
    private $client;
    private $serializer;
    private $parser;
    private $errorParser;

    /**
     * @param ClientInterface $client      Client to send requests.
     * @param callable        $serializer  Accepts command, returns request options.
     * @param callable        $parser      Parses a response into a ResultInterface
     * @param callable        $errorParser Parses a response into an error array.
     */
    public function __construct(
        ClientInterface $client,
        callable $serializer,
        callable $parser,
        callable $errorParser
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
        $this->parser = $parser;
        $this->errorParser = $errorParser;
    }

    /**
     * Sends a command and returns a promise that delivers an associative array
     * containing the following data:
     *
     * - response: A PSR-7 response
     * - effective_uri: The effective URI of the request that was sent.
     *
     * @param CommandInterface $command
     *
     * @return \GuzzleHttp\PromiseInterface
     */
    public function __invoke(CommandInterface $command)
    {
        $serializer = $this->serializer;
        $options = $serializer($command);
        // Extract the request and response into an array.
        $ctx = [];
        $options['last_middleware'][] = $this->createHttpExtractor($ctx);
        // Get the method and uri and remove them from the array.
        $method = $options['method'];
        $uri = $options['uri'];
        unset($options['method'], $options['uri']);
        // Merge the serialization options on top of the command options.
        $options = $command->getRequestOptions() + $options;
        // Send the request with the using the request options.
        $promise = $this->client->request($method, $uri, $options);

        // Return a promise that parses the response into a result or error.
        return $promise->then(
            function (ResponseInterface $response) use ($command, $uri, &$ctx) {
                return $this->parseResponse($command, $response, $uri, $ctx);
            },
            function ($reason) use ($command, $uri) {
                throw $this->parseError($reason, $command, $uri);
            }
        );
    }

    /**
     * Creates a function that extracts the request of a transaction into the
     * given context array by reference.
     *
     * @param array $ctx
     *
     * @return callable
     */
    private function createHttpExtractor(array &$ctx)
    {
        return function (callable $handler) use (&$ctx) {
            return function (
                RequestInterface $request,
                array $options
            ) use ($handler, &$ctx) {
                $ctx['request'] = $request;
                return $handler($request, $options);
            };
        };
    }

    /**
     * @param CommandInterface  $command
     * @param ResponseInterface $response
     * @param string            $uri
     *
     * @return ResultInterface
     */
    private function parseResponse(
        CommandInterface $command,
        ResponseInterface $response,
        $uri
    ) {
        $parser = $this->parser;
        $result = $parser($command, $response);
        $result['@effectiveUri'] = (string) $uri;
        $result['@status'] = $response->getStatusCode();

        return $result;
    }

    /**
     * Parses a rejection into an AWS error.
     *
     * @param mixed|\Exception $reason Rejection reason.
     * @param CommandInterface $command
     * @param string           $uri
     *
     * @return \Exception
     */
    private function parseError($reason, CommandInterface $command, $uri)
    {
        if (!$reason instanceof RequestException) {
            // A non Muzzle exception.
            if ($reason instanceof \Exception) {
                return $reason;
            }
            // An unexpected rejection reason.
            return new \RuntimeException(
                sprintf(
                    'Error executing %s on "%s"; %s',
                    $command->getName(),
                    $uri,
                    $reason
                )
            );
        }

        $serviceError = $reason->getMessage();
        if (!($response = $reason->getResponse())) {
            $parts = [];
        } else {
            $errorParser = $this->errorParser;
            $parts = $errorParser($response);
            $serviceError = $parts['code'] . '(' . $parts['type'] . '): '
                . $parts['message'] . ' (' . $serviceError . ') - '
                . $response->getBody();
        }

        $msg = sprintf(
            'Error executing %s on "%s"; %s',
            $command->getName(),
            $uri,
            $serviceError
        );

        return new AwsException($msg, $command, null, $response, $parts);
    }
}
