<?php
namespace Aws\Handler\GuzzleV6;

use Aws\Sdk;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface as Psr7Request;

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
        $request = $request->withHeader(
            'User-Agent',
            $request->getHeaderLine('User-Agent')
                . ' ' . \GuzzleHttp\default_user_agent()
        );

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
}
