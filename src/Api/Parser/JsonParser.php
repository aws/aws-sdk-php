<?php
namespace Aws\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Shape;

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

            case 'timestamp':
                // The Unix epoch (or Unix time or POSIX time or Unix
                // timestamp) is the number of seconds that have elapsed since
                // January 1, 1970 (midnight UTC/GMT).
                return DateTimeResult::fromEpoch($value);

            case 'blob':
                return base64_decode($value);

            default:
                return $value;
        }
    }
}
