<?php
namespace Aws;

/**
 * Trait implementing ToArrayInterface, \ArrayAccess, \Countable,
 * \IteratorAggregate, and getPath().
 */
trait HasDataTrait
{
    /** @var array */
    private $data = [];

    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function toArray()
    {
        return $this->data;
    }

    public function count()
    {
        return count($this->data);
    }

    /**
     * Get a value from the collection using a path syntax to retrieve nested
     * data.
     *
     * @param string $path Path to traverse and retrieve a value from
     *
     * @return mixed|null
     */
    public function getPath($path)
    {
        return \GuzzleHttp\Utils::getPath($this->data, $path);
    }
}
