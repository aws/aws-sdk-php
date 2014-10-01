<?php
namespace Aws\Common;

use GuzzleHttp\Ring\FutureInterface;
use GuzzleHttp\Ring\MagicFutureTrait;
use GuzzleHttp\Ring\Core;

/**
 * Future result that may not have finished.
 */
class FutureResult implements ResultInterface, FutureInterface
{
    use MagicFutureTrait;

    public function hasKey($name)
    {
        return $this->result->hasKey($name);
    }

    public function get($name)
    {
        return $this->result->get($name);
    }

    public function getIterator()
    {
        return $this->result->getIterator();
    }

    public function offsetGet($offset)
    {
        return $this->result->offsetGet($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->result->offsetSet($offset, $value);
    }

    public function offsetExists($offset)
    {
        return $this->result->offsetExists($offset);
    }

    public function offsetUnset($offset)
    {
        $this->result->offsetUnset($offset);
    }

    public function toArray()
    {
        return $this->result->toArray();
    }

    public function count()
    {
        return $this->result->count();
    }

    public function getPath($path)
    {
        return $this->result->getPath($path);
    }

    public function setPath($path, $value)
    {
        $this->result->setPath($path, $value);
    }

    public function search($expression)
    {
        return $this->result->search($expression);
    }

    public function __toString()
    {
        try {
            return (string) $this->result;
        } catch (\Exception $e) {
            trigger_error($e->getMessage(), E_USER_WARNING);
            return '';
        }
    }

    protected function processResult($result)
    {
        if ($result instanceof ResultInterface) {
            return $result;
        } elseif (is_array($result)) {
            return new Result($result);
        }

        throw new \RuntimeException('Future result must be an array. or '
            . 'instance of GuzzleHttp\ToArrayInterface. Found '
            . Core::describeType($result));
    }
}
