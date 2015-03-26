<?php
namespace Aws;

use transducers as t;
use GuzzleHttp\Promise;

/**
 * Iterator that yields each page of results of a pageable operation.
 */
class ResultPaginator implements \Iterator
{
    /** @var AwsClientInterface Client performing operations. */
    private $client;

    /** @var string Name of the operation being paginated. */
    private $operation;

    /** @var array Args for the operation. */
    private $args;

    /** @var array Configuration for the paginator. */
    private $config;

    /** @var Result Most recent result from the client. */
    private $result;

    /** @var string|array Next token to use for pagination. */
    private $nextToken;

    /** @var int Number of operations/requests performed. */
    private $requestCount = 0;

    /**
     * @param AwsClientInterface $client
     * @param string             $operation
     * @param array              $args
     * @param array              $config
     */
    public function __construct(
        AwsClientInterface $client,
        $operation,
        array $args,
        array $config
    ) {
        $this->client = $client;
        $this->operation = $operation;
        $this->args = $args;
        $this->config = $config;
    }

    /**
     * Runs a paginator asynchronously and uses a callback to handle results.
     *
     * The callback should have the signature: function (|Aws\Result $result)
     *
     * @param callable $handleResult Callback for handling each page of results.
     *                               If the callback returns a promise, the
     *                               promise will be merged into the coroutine.
     *
     * @return Promise\Promise
     */
    public function each(callable $handleResult)
    {
        return Promise\coroutine(function () use ($handleResult) {
            $nextToken = null;
            do {
                $command = $this->createNextCommand($this->args, $nextToken);
                $result = (yield $this->client->executeAsync($command));
                $nextToken = $this->determineNextToken($result);
                if ($retVal = $handleResult($result)) {
                    yield Promise\promise_for($retVal);
                }
            } while ($nextToken);
        });
    }

    /**
     * Returns an iterator that iterates over the values of applying a JMESPath
     * search to each result yielded by the iterator as a flat sequence.
     *
     * @param string   $expression JMESPath expression to apply to each result.
     * @param int|null $limit      Total number of items that should be returned
     *                             or null for no limit.
     *
     * @return \Iterator
     */
    public function search($expression, $limit = null)
    {
        // Apply JMESPath expression on each result, but as a flat sequence.
        $xf = t\mapcat(function (Result $result) use ($expression) {
            return (array) $result->search($expression);
        });

        // Apply a limit to the total items returned.
        if ($limit) {
            $xf = t\comp($xf, t\take($limit));
        }

        // Return items as an iterator.
        return t\to_iter($this, $xf);
    }

    /**
     * @return Result
     */
    public function current()
    {
        return $this->valid() ? $this->result : false;
    }

    public function key()
    {
        return $this->valid() ? $this->requestCount - 1 : null;
    }

    public function next()
    {
        $this->result = null;
    }

    public function valid()
    {
        if ($this->result) {
            return true;
        }

        if ($this->nextToken || !$this->requestCount) {
            $this->result = $this->client->execute(
                $this->createNextCommand($this->args, $this->nextToken)
            );
            $this->nextToken = $this->determineNextToken($this->result);
            $this->requestCount++;
            return true;
        }

        return false;
    }

    public function rewind()
    {
        $this->requestCount = 0;
        $this->nextToken = null;
        $this->result = null;
    }

    private function createNextCommand(array $args, $nextToken)
    {
        // Prepare arguments
        if ($nextToken) {
            $inputArg = $this->config['input_token'];
            if (is_array($nextToken) && is_array($inputArg)) {
                foreach ($inputArg as $index => $key) {
                    $args[$key] = $nextToken[$index];
                }
            } else {
                $args[$inputArg] = $nextToken;
            }
        }

        return $this->client->getCommand($this->operation, $args);
    }

    private function determineNextToken(Result $result)
    {
        if (!$this->config['output_token']) {
            return null;
        }

        if ($this->config['more_results']
            && !$result->search($this->config['more_results'])
        ) {
            return null;
        }

        $nextToken = is_array($this->config['output_token'])
            ? array_filter($result->search(json_encode($this->config['output_token'])))
            : $result->search($this->config['output_token']);

        return $nextToken;
    }
}
