<?php
namespace Aws\Common\Api\Serializer;

use Aws\Common\Api\Shape;
use Aws\Common\Api\ListShape;

/**
 * @internal
 */
class Ec2ParamBuilder extends QueryParamBuilder
{
    protected function queryName(Shape $shape, $default = null)
    {
        return ($shape['queryName']
            ?: ucfirst($shape['locationName']))
                ?: $default;
    }

    protected function isFlat(Shape $shape)
    {
        return false;
    }

    protected function format_list(
        ListShape $shape,
        array $value,
        $prefix,
        &$query
    ) {
        // Handle empty list serialization
        if (!$value) {
            $query[$prefix] = false;
        } else {
            $items = $shape->getMember();
            foreach ($value as $k => $v) {
                $this->format($items, $v, $prefix . '.' . ($k + 1), $query);
            }
        }
    }
}
