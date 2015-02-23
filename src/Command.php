<?php
namespace Aws;

use GuzzleHttp\HandlerStack;

/**
 * AWS command.
 */
class Command implements CommandInterface
{
    use HasDataTrait;

    /** @var string */
    private $name;

    /** @var HandlerStack */
    private $handlerStack;

    /** @var array */
    private $requestOptions;

    /**
     * Accepts an associative array of command options, including:
     *
     * - @future: (bool) Mark the command as a future command.
     *
     * @param string       $name           Name of the command
     * @param array        $args           Arguments to pass to the command
     * @param array        $requestOptions HTTP request options.
     * @param HandlerStack $stack          Handler stack
     */
    public function __construct(
        $name,
        array $args = [],
        array $requestOptions = [],
        HandlerStack $stack
    ) {
        $this->name = $name;
        $this->data = $args;
        $this->handlerStack = $stack;
        $this->requestOptions = $requestOptions;
    }

    public function getName()
    {
        return $this->name;
    }

    public function hasParam($name)
    {
        return array_key_exists($name, $this->data);
    }

    public function getHandlerStack()
    {
        return $this->handlerStack;
    }

    public function getRequestHandlerStack()
    {
        if (!isset($this->requestOptions['stack'])) {
            $this->requestOptions['stack'] = new HandlerStack();
        }

        return $this->requestOptions['stack'];
    }

    public function setRequestOption($path, $value)
    {
        \GuzzleHttp\set_path($this->requestOptions, $path, $value);
    }

    public function getRequestOptions()
    {
        return $this->requestOptions;
    }
}
