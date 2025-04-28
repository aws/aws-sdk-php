<?php
namespace Aws\Handler\React;

use Psr\Http\Message\RequestInterface;
use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use React\Http\Browser;
use GuzzleHttp\Promise\Promise as GuzzlePromise;

/**
 * ReactPHP-based handler for AWS SDK.
 */
class ReactHandler
{
    /** @var LoopInterface */
    private $loop;

    /** @var Browser */
    private $browser;

    /** @var array */
    private $promises = [];

    /** @var bool */
    private $isWaiting = false;

    /**
     * @param LoopInterface|null $loop Optional event loop instance.
     */
    public function __construct(LoopInterface $loop = null)
    {
        $this->loop = $loop ?: Loop::get();
        $this->browser = new Browser($this->loop);
    }

    /**
     * @param RequestInterface $request
     * @param array $options
     *
     * @return GuzzlePromise
     */
    public function __invoke(RequestInterface $request, array $options = [])
    {
        // Create a promise that will be returned to AWS SDK
        $promise = new GuzzlePromise();

        // Store promise for tracking
        $this->promises[] = $promise;

        // Prepare request details
        $uri = (string) $request->getUri();
        $method = $request->getMethod();
        $headers = $request->getHeaders();
        $body = (string) $request->getBody();

        // Add a timer to actually send the request
        // This ensures we return the promise first, then send the request
        $this->loop->futureTick(function() use ($method, $uri, $headers, $body, $promise) {
            // Log that we're sending a request
            echo "Sending request to: $uri\n";

            $this->browser->request($method, $uri, $headers, $body)
                ->then(
                    function($response) use ($promise) {
                        echo "Request succeeded!\n";
                        $promise->resolve($response);
                    },
                    function($error) use ($promise, $uri) {
                        echo "Request to $uri failed: " . $error->getMessage() . "\n";
                        $promise->reject([
                            'exception' => $error,
                            'connection_error' => true,
                            'response' => null
                        ]);
                    }
                );
        });

        // If wait() has been called, make sure the loop is running
        if ($this->isWaiting) {
            // Ensure loop is running
            $this->loop->futureTick(function() {
                if (!$this->loop->isRunning()) {
                    $this->loop->run();
                }
            });
        }

        return $promise;
    }

    /**
     * Run the event loop until all requests complete
     */
    public function wait()
    {
        $this->isWaiting = true;

        // Check if any promises are still pending
        $allResolved = true;
        foreach ($this->promises as $promise) {
            if ($promise->getState() === 'pending') {
                $allResolved = false;
                break;
            }
        }

        // Only run the loop if there are pending promises
        if (!$allResolved) {
            echo "Running event loop to process pending requests...\n";
            $this->loop->run();
        } else {
            echo "No pending requests, not running the loop.\n";
        }
    }

    /**
     * Get the number of pending promises
     *
     * @return int
     */
    public function getPendingCount()
    {
        $count = 0;
        foreach ($this->promises as $promise) {
            if ($promise->getState() === 'pending') {
                $count++;
            }
        }
        return $count;
    }
}
