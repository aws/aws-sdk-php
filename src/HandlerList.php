<?php
namespace Aws;

/**
 * Builds a single handler function from zero or more middleware functions and
 * an HTTP handler. The handler function is then used to send command objects
 * and return a promise that is resolved with an AWS result object.
 *
 * The "front" of the list is invoked before the "end" of the list. You can add
 * middleware to the front of the list using the "prepend" method, and the end
 * of the list using the "append" method. The last function invoked in a
 * handler list is the HTTP handler (a function that does not accept a next
 * handler but rather is responsible for returning a promise that is fulfilled
 * with a PSR-7 response object).
 *
 * Handlers can be ordered using a "step" that describes the step at which the
 * SDK is when sending a command. The available steps are:
 *
 * - init: The command is being initialized, allowing you to do things like add
 *   default options.
 * - validate: The command is being validated before it is serialized
 * - build: The command is being serialized into an HTTP request. A middleware
 *   in this step MUST serialize an HTTP request and populate the "@request"
 *   parameter of a command with the request such that it is available to
 *   subsequent middleware.
 * - sign: The request is being signed and prepared to be sent over the wire.
 *
 * You can control if a middleware is added to the front or end of a specific
 * step or the entire list by setting the "sticky" option to true when calling
 * the prepend or append method.
 */
class HandlerList
{
    /** @var callable */
    private $handler;

    /** @var array */
    private $stack = [];

    /** @var array */
    private $order = [
        'init'     => 400,
        'validate' => 300,
        'build'    => 200,
        'sign'     => 100
    ];

    /**
     * @param callable $handler HTTP handler.
     */
    public function __construct(callable $handler = null)
    {
        $this->handler = $handler;
    }

    /**
     * Set the HTTP handler that actually returns a response.
     *
     * @param callable $handler Function that accepts a request and array of
     *                          options and returns a Promise.
     */
    public function setHandler(callable $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Returns true if the builder has a handler.
     *
     * @return bool
     */
    public function hasHandler()
    {
        return (bool) $this->handler;
    }

    /**
     * Prepend a middleware to the front of the list.
     *
     * Available options are:
     *
     * - sticky: When set to true, the the prepended middleware will always be
     *   invoked before non-sticky prepended middleware. Subsequently prepended
     *   sticky middleware will push the middleware before the previously added
     *   middleware in the list.
     * - step: Places the middleware at a specific position in the list based on
     *   the lifecycle of sending a command. In order of invoked first to last,
     *   this option may be one of "init", "validate", "build", "sign".
     *   If not specified, middleware will be prepended to the front of the
     *   entire list.
     *
     * @param callable $middleware Middleware function to prepend.
     * @param array    $options    Middleware options.
     */
    public function prepend(callable $middleware, array $options = [])
    {
        $this->stack[$this->calculatePriority(1, $options)][] = $middleware;
    }

    /**
     * Append a middleware to the end of the list.
     *
     * Available options are:
     *
     * - sticky: When set to true, the the appended middleware will always be
     *   invoked after non-sticky appended middleware. Subsequently appended
     *   sticky middleware will push the middleware after the previously
     *   appended middleware in the list.
     * - step: Places the middleware at a specific position in the list based on
     *   the lifecycle of sending a command. In order of invoked first to last,
     *   this option may be one of "init", "validate", "build", "sign".
     *   If not specified, middleware will be prepended to the front of the
     *   entire list.
     *
     * @param callable $middleware Middleware function to append.
     * @param array    $options    Middleware options.
     */
    public function append(callable $middleware, array $options = [])
    {
        $this->stack[$this->calculatePriority(-1, $options)][] = $middleware;
    }

    /**
     * Remove a middleware by instance from the list.
     *
     * @param callable $remove Middleware to remove.
     *
     * @return $this
     */
    public function remove(callable $remove)
    {
        for ($i = 0, $ci = count($this->stack); $i < $ci; $i++) {
            for ($j = 0, $cj = count($this->stack[$i]); $j < $cj; $j++) {
                if ($this->stack[$i][$j] === $remove) {
                    unset($this->stack[$i][$j]);
                }
            }
        }

        return $this;
    }

    /**
     * Compose the middleware and handler into a single callable function.
     *
     * @return callable
     */
    public function resolve()
    {
        if (!($prev = $this->handler)) {
            throw new \LogicException('No handler has been specified');
        }

        ksort($this->stack);
        foreach ($this->stack as $stack) {
            foreach (array_reverse($stack) as $fn) {
                /** @var callable $fn */
                $prev = $fn($prev);
            }
        }

        return $prev;
    }

    private function calculatePriority($stickyModifier, $options)
    {
        if (!isset($options['step'])) {
            // Push to the front or back of the entire list.
            $priority = $stickyModifier < 0 ? -100 : 500;
        } elseif (!isset($this->order[$options['step']])) {
            throw new \InvalidArgumentException("Invalid step: {$options['step']}");
        } else {
            // Push to a specific step in the list.
            $priority = $this->order[$options['step']];
        }

        // Adjust the priority if sticky is set.
        if (!empty($options['sticky'])) {
            $priority += $stickyModifier;
        }

        return $priority;
    }
}
