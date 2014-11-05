<?php
namespace Aws\Common;

/**
 * Iterates over a flattened sequence of values by applying a map function to
 * each value yielded by an iterator and combining the return value into the
 * sequence. The map function must return an array or \Iterator or an exception
 * will be thrown.
 *
 *     $inner = new ArrayIterator([[1, 2], [3, 4], [5, 6, 7]]]);
 *     $iter = new \Aws\Common\FlatMapIterator($inner, function ($value) {
 *         return array_map(function ($value) {
 *             return $value + 1;
 *         }, $value);
 *     });
 *
 *     var_export(iterator_to_array($iter));
 *     // -> [2, 3, 4, 5, 6, 7, 8]
 *
 */
class FlatMapIterator implements \Iterator
{
    /** @var \Iterator */
    private $inner;
    /** @var \Iterator|null */
    private $currentIterator;
    /** @var callable */
    private $map;
    private $pos = 0;

    /**
     * @param \Iterator $inner Iterator to flatten, combine, and map.
     * @param callable  $map   Accepts a value and returns an array or \Iterator
     */
    public function __construct(\Iterator $inner, callable $map)
    {
        $this->inner = $inner;
        $this->map = $map;
    }

    public function rewind()
    {
        if (!($this->inner instanceof \Generator)) {
            $this->inner->rewind();
        }

        $this->currentIterator = null;
        $this->pos = 0;
    }

    public function next()
    {
        if ($this->currentIterator && $this->currentIterator->valid()) {
            ++$this->pos;
            $this->currentIterator->next();
        } elseif ($this->inner->valid()) {
            $this->applyMap();
            $this->inner->next();
        }
    }

    public function valid()
    {
        if ($this->currentIterator && $this->currentIterator->valid()) {
            return true;
        } elseif (!$this->inner->valid()) {
            return false;
        }

        $this->applyMap();
        $this->inner->next();

        // Skip empty sequences by going to the next iterator.
        if (!$this->currentIterator->valid()) {
            $this->next();
            return $this->valid();
        }

        return $this->currentIterator->valid();
    }

    public function current()
    {
        // Create the current iterator the first time current/valid is called.
        if (!$this->currentIterator) {
            $this->valid();
        }

        return $this->currentIterator->current();
    }

    public function key()
    {
        return $this->pos;
    }

    private function applyMap()
    {
        $map = $this->map;
        $this->currentIterator = $map($this->inner->current());

        if (is_array($this->currentIterator)) {
            $this->currentIterator = new \ArrayIterator($this->currentIterator);
        } elseif (!$this->currentIterator instanceof \Iterator) {
            $this->typeFailure();
        }
    }

    private function typeFailure()
    {
        $msg = 'Each value returned by the map function must be an array or '
            . 'instance of \Iterator. Found ' . gettype($this->currentIterator);

        if (is_object($this->currentIterator)) {
            $msg .= '(' . get_class($this->currentIterator) . ')';
        } else {
            ob_start();
            var_dump($this->currentIterator);
            $msg .= '(' . ob_end_clean() . ')';
        }

        $msg .= ' on iteration #' . $this->pos;

        throw new \UnexpectedValueException($msg);
    }
}
