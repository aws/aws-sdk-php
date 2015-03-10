<?php
namespace Aws;

use GuzzleHttp\Promise\Promise;

/**
 * Result promise that may not have finished.
 */
class ResultPromise extends Promise implements ResultPromiseInterface
{
    public function __get($name)
    {
        if ($name === '_value') {
            return $this->_value = $this->wait();
        }

        throw new \BadMethodCallException('Unknown value: ' . $name);
    }

    /**
     * Ensures that the resolved value is an instance of ResultInterface
     *
     * {@inheritdoc}
     */
    public function resolve($value)
    {
        if (!($value instanceof ResultInterface)) {
            throw new \InvalidArgumentException('A ResultPromise must be resolved with a ResultInterface');
        }

        parent::resolve($value);
    }

    public function hasKey($name)
    {
        return $this->_value->hasKey($name);
    }

    public function get($name)
    {
        return $this->_value->get($name);
    }

    public function getIterator()
    {
        return $this->_value->getIterator();
    }

    public function offsetGet($offset)
    {
        return $this->_value->offsetGet($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->_value->offsetSet($offset, $value);
    }

    public function offsetExists($offset)
    {
        return $this->_value->offsetExists($offset);
    }

    public function offsetUnset($offset)
    {
        $this->_value->offsetUnset($offset);
    }

    public function toArray()
    {
        return $this->_value->toArray();
    }

    public function count()
    {
        return $this->_value->count();
    }

    public function getPath($path)
    {
        return $this->_value->getPath($path);
    }

    public function setPath($path, $value)
    {
        $this->_value->setPath($path, $value);
    }

    public function search($expression)
    {
        return $this->_value->search($expression);
    }

    public function __toString()
    {
        try {
            return (string) $this->_value;
        } catch (\Exception $e) {
            trigger_error($e->getMessage(), E_USER_WARNING);
            return '';
        }
    }
}
