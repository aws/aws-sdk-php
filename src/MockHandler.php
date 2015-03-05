<?php
namespace Aws;

use Aws\Exception\AwsException;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\RejectedPromise;
use Psr\Http\Message\RequestInterface;

/**
 * Returns promises that are rejected or fulfilled using a queue of
 * Aws\ResultInterface and Aws\Exception\AwsException objects.
 */
class MockHandler
{
    private $queue;
    private $lastRequest;

    /**
     * The passed in value can be a {@see Aws\ResultInterface},
     * {@see AwsException}, or an array that acts as a queue of results or
     * exceptions to return each time the handler is invoked.
     *
     * @param mixed $resultOrQueue
     */
    public function __construct($resultOrQueue)
    {
        if (is_array($resultOrQueue)) {
            foreach ($resultOrQueue as $value) {
                $this->add($value);
            }
        } else {
            $this->add($resultOrQueue);
        }
    }

    public function addException(AwsException $e)
    {
        $this->queue[] = $e;
    }

    public function addResult(ResultInterface $response)
    {
        $this->queue[] = $response;
    }

    public function __invoke(
        CommandInterface $command,
        RequestInterface $request
    ) {
        $this->lastRequest = $request;

        if (!$this->queue) {
            throw new \RuntimeException('Mock queue is empty');
        }

        $result = array_shift($this->queue);

        if ($result instanceof AwsException) {
            return new RejectedPromise($result);
        }

        return new FulfilledPromise($result);
    }

    /**
     * Get the last received request.
     *
     * @return RequestInterface
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }

    private function add($value)
    {
        if ($value instanceof ResultInterface) {
            $this->addResult($value);
        } elseif ($value instanceof AwsException) {
            $this->addException($value);
        } else {
            throw new \InvalidArgumentException('Expected a result or AWS exception');
        }
    }
}
