<?php
namespace Aws\Api;

/**
 * Represents a map shape.
 */
class MapShape extends Shape
{
    /** @var Shape */
    private $value;

    /** @var Shape */
    private $key;

    /**
     * @return Shape
     */
    public function getValue()
    {
        if (!$this->value) {
            $this->value = isset($this->definition['value'])
                ? Shape::create($this->definition['value'], $this->shapeMap)
                : new Shape([], $this->shapeMap);
        }

        return $this->value;
    }

    /**
     * @return Shape
     */
    public function getKey()
    {
        if (!$this->key) {
            $this->key = isset($this->definition['key'])
                ? Shape::create($this->definition['key'], $this->shapeMap)
                : new Shape([], $this->shapeMap);
        }

        return $this->key;
    }
}
