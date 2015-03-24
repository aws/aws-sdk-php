<?php
namespace Aws\Handler\GuzzleV5;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\ResponseInterface as GuzzleResponse;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response as Psr7Response;
use Psr\Http\Message\RequestInterface as Psr7Request;

/**
 * A request handler that sends PSR-7-compatible requests with Guzzle 5.
 *
 * The handler accepts a PSR-7 Request object and an array of transfer options
 * and returns a Guzzle 6 Promise. The promise is either resolved with a
 * PSR-7 Response object or rejected with an array of error data.
 */
class GuzzleHandler
{
    private static $validOptions = [
        'proxy'           => true,
        'verify'          => true,
        'timeout'         => true,
        'debug'           => true,
        'connect_timeout' => true,
        'stream'          => true,
        'delay'           => true,
    ];

    /** @var ClientInterface */
    private $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?: new Client();
    }

    /**
     * @param Psr7Request $request
     * @param array       $options
     *
     * @return Promise\Promise
     */
    public function __invoke(Psr7Request $request, array $options = [])
    {
        // Create and send a Guzzle 5 request
        $guzzlePromise = $this->client->send(
            $this->createGuzzleRequest($request, $options)
        );

        $promise = new Promise\Promise(
            function () use ($guzzlePromise) {
                try {
                    $guzzlePromise->wait();
                } catch (\Exception $e) {
                    // The promise is already delivered when the exception is
                    // thrown, so don't rethrow it.
                }
            },
            [$guzzlePromise, 'cancel']
        );

        $guzzlePromise->then([$promise, 'resolve'], [$promise, 'reject']);

        return $promise->then(
            function (GuzzleResponse $response) {
                // Adapt the Guzzle 5 Future to a Guzzle 6 ResponsePromise.
                return $this->createPsr7Response($response);
            },
            function (Exception $exception) {
                // Reject with information about the error.
                return new Promise\RejectedPromise($this->prepareErrorData($exception));
            }
        );
    }

    private function createGuzzleRequest(Psr7Request $psrRequest, array $options)
    {
        // Remove unsupported options.
        foreach (array_keys($options) as $key) {
            if (isset(self::$validOptions[$key])) {
                unset($options['key']);
            }
        }

        // Handle delay option.
        $delay = null;
        if (isset($options['delay'])) {
            $delay = $options['delay'];
            unset($options['delay']);
        }

        // Ensure that all requests are async.
        $options['future'] = true;

        // Create the Guzzle 5 request from the provided PSR7 request.
        $request = $this->client->createRequest(
            $psrRequest->getMethod(),
            $psrRequest->getUri(),
            $options
        );
        $request->setBody(new GuzzleStream($psrRequest->getBody()));
        $request->setHeaders($psrRequest->getHeaders());
        if ($delay) {
            $request->getConfig()->set('delay', $delay);
        }

        // Append the Guzzle UA string to current one.
        $request->setHeader(
            'user-agent',
            $request->getHeader('user-agent') . ' ' . Client::getDefaultUserAgent()
        );

        return $request;
    }

    private function createPsr7Response(GuzzleResponse $response)
    {
        if ($body = $response->getBody()) {
            $body = new PsrStream($body);
        }

        return new Psr7Response(
            $response->getStatusCode(),
            $response->getHeaders(),
            $body,
            $response->getReasonPhrase()
        );
    }

    private function prepareErrorData(Exception $e)
    {
        $error = [
            'exception'        => $e,
            'connection_error' => false,
            'response'         => null,
        ];

        if ($e instanceof ConnectException) {
            $error['connection_error'] = true;
        }

        if ($e instanceof RequestException && $e->getResponse()) {
            $error['response'] = $this->createPsr7Response($e->getResponse());
        }

        return $error;
    }
}
