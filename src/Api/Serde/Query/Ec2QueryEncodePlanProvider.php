<?php
namespace Aws\Api\Serde\Query;

use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;

/**
 * Builds and caches EC2 Query plans.
 *
 * EC2 differs from AWS Query in naming and collection rules: names use
 * queryName, then a capitalized locationName, then the default unchanged, and
 * collections are never flattened. List serialization differences live in
 * Ec2ParamBuilder::formatList().
 *
 * @internal
 */
final class Ec2QueryEncodePlanProvider extends QueryEncodePlanProvider
{
    protected const SLOT = ShapePlanCache::EC2_QUERY_ENCODE;

    protected function queryName(Shape $shape, $default = null)
    {
        return ($shape['queryName']
            ?: ucfirst(@$shape['locationName'] ?: ""))
                ?: $default;
    }

    protected function isFlat(Shape $shape): bool
    {
        return false;
    }
}
