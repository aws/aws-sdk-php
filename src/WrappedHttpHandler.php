<?php
namespace Aws;

use GuzzleHttp\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Converts an HTTP handler into a Command HTTP handler.
 *
 * HTTP handlers have the following signature:
 *     function(RequestInterface $request, array $options) : PromiseInterface
 *
 * The promise returned form an HTTP handler must resolve to a PSR-7 response
 * object when fulfilled or an error array when rejected. The error array
 * can contain the following data:
 *
 * - exception: (required, Exception) Exception that was encountered.
 * - response: (ResponseInterface) PSR-7 response that was received (if a
 *   response) was received.
 * - connection_error: (bool) True if the error is the result of failing to
 *   connect.
 */
class WrappedHttpHandler
{
    private $httpHandler;
    private $parser;
    private $errorParser;
    private $exceptionClass;

    /**
     * @param callable $httpHandler    Function that accepts a request and array
     *                                 of request options and returns a promise
     *                                 that fulfills with a response or rejects
     *                                 with an error array.
     * @param callable $parser         Function that accepts a response object
     *                                 and returns an AWS result object.
     * @param callable $errorParser    Function that parses a response object
     *                                 into AWS error data.
     * @param string   $exceptionClass Exception class to throw.
     */
    public function __construct(
        callable $httpHandler,
        callable $parser,
        callable $errorParser,
        $exceptionClass = 'Aws\Exception\AwsException'
    ) {
        $this->httpHandler = $httpHandler;
        $this->parser = $parser;
        $this->errorParser = $errorParser;
        $this->exceptionClass = $exceptionClass;
    }

    /**
     * Calls the simpler HTTP specific handler and wraps the returned promise
     * with AWS specific values (e.g., a result object or AWS exception).
     *
     * @param CommandInterface $command Command being executed.
     * @param RequestInterface $request Request to send.
     *
     * @return Promise\PromiseInterface
     */
    public function __invoke(
        CommandInterface $command,
        RequestInterface $request
    ) {
        $fn = $this->httpHandler;

        return Promise\promise_for($fn($request, $command['@http'] ?: []))
            ->then(
                function (ResponseInterface $res) use ($command, $request) {
                    return $this->parseResponse($command, $request, $res);
                },
                function ($err) use ($request, $command) {
                    if (is_array($err)) {
                        $exception = $this->parseError($err, $request, $command);
                        return new Promise\RejectedPromise($exception);
                    }
                    return new Promise\RejectedPromise($err);
                }
            );
    }

    /**
     * @param CommandInterface  $command
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return ResultInterface
     */
    private function parseResponse(
        CommandInterface $command,
        RequestInterface $request,
        ResponseInterface $response
    ) {
        $parser = $this->parser;
        $status = $response->getStatusCode();
        $result = $status < 300
            ? $parser($command, $response)
            : new Result();

        $metadata = [
            'statusCode'   => $status,
            'effectiveUri' => (string) $request->getUri(),
            'headers'      => []
         ];

        // Bring headers into the metadata array.
        foreach ($response->getHeaders() as $name => $values) {
            $metadata['headers'][strtolower($name)] = $values[0];
        }

        $result['@metadata'] = $metadata;

        return $result;
    }

    /**
     * Parses a rejection into an AWS error.
     *
     * @param array            $err     Rejection error array.
     * @param RequestInterface $request Request that was sent.
     * @param CommandInterface $command Command being sent.
     *
     * @return \Exception
     */
    private function parseError(
        array $err,
        RequestInterface $request,
        CommandInterface $command
    ) {
        if (!isset($err['exception'])) {
            throw new \RuntimeException('The HTTP handler was rejected without an "exception" key value pair.');
        }

        $serviceError = "AWS HTTP error: " . $err['exception']->getMessage();

        if (!isset($err['response'])) {
            $parts = ['response' => null];
        } else {
            $errorParser = $this->errorParser;
            $parts = $errorParser($err['response']);
            $parts['response'] = $err['response'];
            $serviceError .= " {$parts['code']} ({$parts['type']}): "
                . "{$parts['message']} - " . $err['response']->getBody();
        }

        $parts['exception'] = $err['exception'];
        $parts['request'] = $request;
        $parts['connection_error'] = !empty($err['connection_error']);

        return new $this->exceptionClass(
            sprintf(
                'Error executing "%s" on "%s"; %s',
                $command->getName(),
                $request->getUri(),
                $serviceError
            ),
            $command,
            $parts,
            $err['exception']
        );
    }
}
