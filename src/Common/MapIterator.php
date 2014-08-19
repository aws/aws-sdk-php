<?php
namespace Aws\Common;

/**
 * Maps values before yielding
 */
class MapIterator extends \IteratorIterator
{
    /** @var mixed Callback */
    private $callback;

    /**
     * @param \Traversable $iterator Traversable iterator
     * @param callback     $callback Callback used for iterating
     *
     * @throws \InvalidArgumentException if the callback if not callable
     */
    public function __construct(\Traversable $iterator, callable $callback)
    {
        parent::__construct($iterator);
        $this->callback = $callback;
    }

    public function current()
    {
        return call_user_func($this->callback, parent::current());
    }
}
