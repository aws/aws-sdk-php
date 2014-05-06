<?php
namespace Aws\Paginator;

use Aws\AwsClientInterface;
use Aws\Result;
use GuzzleHttp\Event\ListenerAttacherTrait;

class ResultPaginator implements \Iterator
{
    use ListenerAttacherTrait;

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

    /** @var array Event listeners. */
    private $listeners;

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
        $this->listeners = $this->prepareListeners(
            $config,
            ['prepare', 'process', 'error']
        );
    }

    /**
     * Returns either a single config value or entire paginator's config.
     *
     * @param string $key
     *
     * @return string|array|null
     */
    public function getConfig($key = null)
    {
        if ($key === null) {
            return $this->config;
        } else {
            return isset($this->config[$key]) ? $this->config[$key] : null;
        }
    }

    /**
     * Returns the next token that will be used for pagination.
     *
     * @return array|string
     */
    public function getNextToken()
    {
        return $this->nextToken;
    }

    /**
     * Fetch the next result for the command managed by the paginator. You may
     * pass additional arguments, the most appropriate being a limiter.
     *
     * @param array $args
     * @return Result|null
     */
    public function getNext(array $args = [])
    {
        $this->result = null;

        // Load next result if there's a next token or it's the first request.
        if (!$this->requestCount || $this->nextToken) {
            $this->loadNextResult($args);
        }

        return $this->result ?: null;
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

        return (bool) $this->getNext();
    }

    public function rewind()
    {
        $this->result = null;
        $this->requestCount = 0;
        $this->nextToken = null;
    }

    /**
     * Loads the next result by executing another command using the next token.
     *
     * @param array $args
     */
    private function loadNextResult(array $args = [])
    {
        // Create the command
        $args = $args + $this->args;
        $command = $this->client->getCommand($this->operation, $args);
        $this->attachListeners($command, $this->listeners);

        // Set the next token
        if ($this->nextToken) {
            $inputArg = $this->config['input_token'];
            if (is_array($this->nextToken) && is_array($inputArg)) {
                foreach ($inputArg as $index => $arg) {
                    $command[$arg] = $this->nextToken[$index];
                }
            } else {
                $command[$inputArg] = $this->nextToken;
            }
        }

        // Get the next result
        $this->result = $this->client->execute($command);
        $this->requestCount++;
        $this->nextToken = null;

        // If there is no more_results to check or more_results is true
        if ($this->config['more_results'] === null
            || $this->result->search($this->config['more_results'])
        ) {
            // Get the next token's value
            if ($key = $this->config['output_token']) {
                if (is_array($key)) {
                    $this->nextToken = $this->result->search(json_encode($key));
                    $this->nextToken = array_filter($this->nextToken);
                } else {
                    $this->nextToken = $this->result->search($key);
                }
            }
        }
    }
}