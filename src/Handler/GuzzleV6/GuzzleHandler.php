<?php
namespace Aws\Handler\GuzzleV6;

use Exception;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface as Psr7Request;
use Psr\Http\Message\RequestInterface;

/**
 * A request handler that sends PSR-7-compatible requests with Guzzle 6.
 */
class GuzzleHandler
{
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
        $request = $this->prepareRequest($request, $options);

        return $this->client->sendAsync($request, $options)->otherwise(
            static function (\Exception $e) {
                $error = [
                    'exception'        => $e,
                    'connection_error' => $e instanceof ConnectException,
                    'response'         => null,
                ];

                if ($e instanceof RequestException && $e->getResponse()) {
                    $error['response'] = $e->getResponse();
                }

                return new Promise\RejectedPromise($error);
            }
        );
    }

    private function prepareRequest(RequestInterface $request, array $options)
    {
        $request = $request->withHeader(
            'user-agent',
            $request->getHeaderLine('user-agent')
                . ' ' . \GuzzleHttp\default_user_agent()
        );

        return $request;
    }
}
