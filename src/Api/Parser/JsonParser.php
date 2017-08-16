<?php
namespace RamseyAws\Api\Parser;

use RamseyAws\Api\DateTimeResult;
use RamseyAws\Api\Shape;

/**
 * @internal Implements standard JSON parsing.
 */
class JsonParser
{
    public function parse(Shape $shape, $value)
    {
        if ($value === null) {
            return $value;
        }

        switch ($shape['type']) {
            case 'structure':
                $target = [];
                foreach ($shape->getMembers() as $name => $member) {
                    $locationName = $member['locationName'] ?: $name;
                    if (isset($value[$locationName])) {
                        $target[$name] = $this->parse($member, $value[$locationName]);
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
