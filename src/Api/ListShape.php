<?php
namespace Aws\Api;

/**
 * Represents a list shape.
 */
class ListShape extends Shape
{
    private $member;

    /**
     * @return Shape
     */
    public function getMember()
    {
        if (!$this->member) {
            $this->member = isset($this->definition['member'])
                ? Shape::create($this->definition['member'], $this->shapeMap)
                : new Shape([], $this->shapeMap);
        }

        return $this->member;
    }
}
