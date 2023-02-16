<?php
namespace Aws\Api;

/**
 * Base class that is used by most API shapes
 */
abstract class AbstractModel implements \ArrayAccess
{
    /** @var array */
    protected $definition;

    /** @var ShapeMap */
    protected $shapeMap;

    /** @var array */
    protected $contextParam;

    /**
     * @param array    $definition Service description
     * @param ShapeMap $shapeMap   Shapemap used for creating shapes
     */
    public function __construct(array $definition, ShapeMap $shapeMap)
    {
        $this->definition = $definition;
        $this->shapeMap = $shapeMap;
        if (isset($definition['contextParam'])) {
            $this->contextParam = $definition['contextParam'];
        }
    }

    public function toArray()
    {
        return $this->definition;
    }

    /**
     * @return mixed|null
     */
    public function offsetGet($offset): mixed
    {
        return isset($this->definition[$offset])
            ? $this->definition[$offset] : null;
    }

    /**
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        $this->definition[$offset] = $value;
    }

    /**
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->definition[$offset]);
    }

    /**
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->definition[$offset]);
    }

    protected function shapeAt($key)
    {
        if (!isset($this->definition[$key])) {
            throw new \InvalidArgumentException('Expected shape definition at '
                . $key);
        }

        return $this->shapeFor($this->definition[$key]);
    }

    protected function shapeFor(array $definition)
    {
        return isset($definition['shape'])
            ? $this->shapeMap->resolve($definition)
            : Shape::create($definition, $this->shapeMap);
    }
}
