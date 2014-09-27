<?php
namespace Aws\Common\Api\Parser;

use Aws\Common\Api\Shape;

/**
 * @internal Implements standard JSON parsing.
 */
class JsonParser
{
    public function parse(Shape $shape, $value)
    {
        switch ($shape['type']) {
            case 'structure':
                $target = [];
                foreach ($shape->getMembers() as $name => $member) {
                    $name = $member['locationName'] ?: $name;
                    if (isset($value[$name])) {
                        $target[$name] = $this->parse($member, $value[$name]);
                    }
                }
                return $target;

            case 'list':
                $member = $shape->getMember();
                $target = [];
                foreach ($value as $v) {
                    $target[] = $this->parse($member, $v);
                }
                return $target;

            case 'map':
                $values = $shape->getValue();
                $target = [];
                foreach ($value as $k => $v) {
                    $target[$k] = $this->parse($values, $v);
                }
                return $target;

            case 'blob':
                return base64_decode($value);

            default:
                return $value;
        }
    }
}
