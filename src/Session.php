<?php
namespace Aws;

class Session
{
    private $args;

    public function __construct(array $args = [])
    {
        $this->args = $args;

        if (!isset($args['handler']) && !isset($args['http_handler'])) {
            $this->args['http_handler'] = default_http_handler();
        }
    }

    /**
     * @param string|null $namespace
     *
     * @return array
     */
    public function getArgs($namespace = null)
    {
        return isset($this->args[$namespace])
            ? $this->args[$namespace] + $this->args
            : $this->args;
    }
}
