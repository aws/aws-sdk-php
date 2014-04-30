<?php
namespace Aws\Api\Parser;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * @internal Implements standard JSON parsing.
 */
class JsonBody
{
    public function parse(Shape $shape, $value)
    {
        static $methods = [
            'parse_structure' => true,
            'parse_list'      => true,
            'parse_map'       => true,
            'parse_blob'      => true
        ];

        $type = 'parse_' . $shape['type'];
        if (isset($methods[$type])) {
            return $this->{$type}($shape, $value);
        }

        return $value;
    }

    private function parse_structure(StructureShape $shape, array $value)
    {
        $target = [];
        foreach ($shape->getMembers() as $name => $member) {
            $name = $member['locationName'] ?: $name;
            if (isset($value[$name])) {
                $target[$name] = $this->parse($member, $value[$name]);
            }
        }

        return $target;
    }

    private function parse_list(ListShape $shape, array $value)
    {
        $member = $shape->getMember();
        $target = [];
        foreach ($value as $v) {
            $target[] = $this->parse($member, $v);
        }

        return $target;
    }

    private function parse_map(MapShape $shape, array $value)
    {
        $values = $shape->getValue();

        $target = [];
        foreach ($value as $k => $v) {
            $target[$k] = $this->parse($values, $v);
        }

        return $target;
    }

    private function parse_blob(Shape $shape, $value)
    {
        return base64_decode($value);
    }
}
