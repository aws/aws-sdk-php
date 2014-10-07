<?php
namespace Aws\Common;

use GuzzleHttp\Ring\Core;
use GuzzleHttp\Ring\Future\FutureInterface;
use GuzzleHttp\Ring\Future\MagicFutureTrait;

/**
 * Future result that may not have finished.
 */
class FutureResult implements ResultInterface, FutureInterface
{
    use MagicFutureTrait {
        MagicFutureTrait::wait as parentWait;
    }

    public function wait()
    {
        $result = $this->parentWait();

        if (!$result instanceof ResultInterface) {
            throw new \RuntimeException('Expected a ResultInterface. Found '
                . Core::describeType($result));
        }

        return $result;
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
