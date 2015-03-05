<?php
namespace Aws;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\RejectedPromise;
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
        $exceptionClass
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
     * @return PromiseInterface
     */
    public function __invoke(
        CommandInterface $command,
        RequestInterface $request
    ) {
        $fn = $this->httpHandler;
        /** @var PromiseInterface $promise */
        $promise = $fn($request, $command['@http'] ?: []);

        return $promise->then(
            function (ResponseInterface $response) use ($command, $request) {
                return $this->parseResponse($command, $request, $response);
            },
            function (array $reason) use ($request, $command) {
                $exception = $this->parseError($command, $reason, $request);
                return new RejectedPromise($exception);
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
        $result = $parser($command, $response);
        $result['@effectiveUri'] = (string) $request->getUri();
        $result['@responseHeaders'] = $response->getHeaders();
        $result['@statusCode'] = $response->getStatusCode();

        return $result;
    }

    /**
     * Parses a rejection into an AWS error.
     *
     * @param array            $reason  Rejection array.
     * @param RequestInterface $request Request that was sent.
     * @param CommandInterface $command Command being sent.
     *
     * @return \Exception
     */
    private function parseError(
        array $reason,
        RequestInterface $request,
        CommandInterface $command
    ) {
        if (!isset($reason['exception'])) {
            throw new \RuntimeException('The HTTP handler was rejected without an "exception" key value pair.');
        }

        $serviceError = "AWS HTTP error; "
            . $reason['exception']->getMessage();

        if (!isset($reason['response'])) {
            $parts = [];
        } else {
            $errorParser = $this->errorParser;
            $parts = $errorParser($reason['response']);
            $serviceError = $parts['code'] . '(' . $parts['type'] . '): '
                . $parts['message'] . ' (' . $serviceError . ') - '
                . $reason['response']->getBody();
        }

        if (isset($reason['response'])) {
            $parts['response'] = $reason['response'];
        }

        if (!empty($reason['connection_error'])) {
            $parts['connection_error'] = true;
        }

        return new $this->exceptionClass(
            sprintf(
                'Error executing %s on "%s"; %s',
                $command->getName(),
                $request->getUri(),
                $serviceError
            ),
            $command,
            $parts,
            $reason['exception']
        );
    }
}
