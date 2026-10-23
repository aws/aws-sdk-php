<?php
namespace Aws\Api\Serde\Query;

use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;

/**
 * Builds and caches AWS Query QueryEncodePlan objects, one per shape.
 *
 * Plans attach to the shape via the shared ShapePlanCache and reuse its
 * generation-based invalidation. Child plans compile lazily, when traversal
 * first reaches the child. Ec2QueryEncodePlanProvider overrides the naming
 * rules and the cache slot.
 *
 * @internal
 */
class QueryEncodePlanProvider
{
    protected const SLOT = ShapePlanCache::QUERY_ENCODE;

    /**
     * Returns the cached plan for a shape, compiling it on first use.
     *
     * @param Shape $shape
     *
     * @return QueryEncodePlan
     */
    public function get(Shape $shape): QueryEncodePlan
    {
        return $shape->getSerdePlan(static::SLOT)
            ?? $shape->cacheSerdePlan(static::SLOT, $this->compile($shape));
    }

    /**
     * Query name precedence: queryName, locationName, a flattened target's
     * member locationName, then the default.
     *
     * @param Shape       $shape
     * @param string|null $default
     *
     * @return mixed
     */
    protected function queryName(Shape $shape, $default = null)
    {
        if (null !== $shape['queryName']) {
            return $shape['queryName'];
        }

        if (null !== $shape['locationName']) {
            return $shape['locationName'];
        }

        if ($this->isFlat($shape) && !empty($shape['member']['locationName'])) {
            return $shape['member']['locationName'];
        }

        return $default;
    }

    protected function isFlat(Shape $shape): bool
    {
        return $shape['flattened'] === true;
    }

    private function compile(Shape $shape): QueryEncodePlan
    {
        $plan = new QueryEncodePlan();
        $plan->type = QueryShapeType::fromShape($shape);

        switch ($plan->type) {
            case QueryShapeType::STRUCTURE:
                $members = [];
                foreach ($shape->getMembers() as $name => $member) {
                    $type = QueryShapeType::fromShape($member);
                    $members[$name] = [
                        QueryEncodePlan::M_NAME     => $this->queryName($member, $name),
                        QueryEncodePlan::M_TYPE     => $type,
                        QueryEncodePlan::M_SHAPE    => $member,
                        QueryEncodePlan::M_TSFORMAT => self::timestampFormat($type, $member),
                        QueryEncodePlan::M_PLAN     => null,
                    ];
                }
                $plan->members = $members;
                if (count($members) !== count($shape['members'] ?? [])) {
                    // A failed shape resolution leaves StructureShape with a
                    // partial member hash. The legacy builder then threw for
                    // each missing member a request set, so keep that.
                    foreach ($shape['members'] as $name => $definition) {
                        if (!isset($members[$name])) {
                            $plan->members[$name] = [
                                QueryEncodePlan::M_NAME     => '',
                                QueryEncodePlan::M_TYPE     => QueryShapeType::UNRESOLVED,
                                QueryEncodePlan::M_SHAPE    => null,
                                QueryEncodePlan::M_TSFORMAT => null,
                                QueryEncodePlan::M_PLAN     => null,
                            ];
                        }
                    }
                }
                break;

            case QueryShapeType::LIST:
                $plan->flattened = $this->isFlat($shape);
                if (!isset($shape['member'])) {
                    // The legacy builders read the member only for non-empty
                    // lists, so an empty list still serializes without one.
                    $plan->itemType = QueryShapeType::MISSING;
                    break;
                }

                $items = $shape->getMember();
                if (!$plan->flattened) {
                    $plan->listMemberSegment = '.' . ($items['locationName'] ?: 'member');
                } else {
                    // A falsy name leaves the prefix unchanged, as before.
                    $name = $shape['locationName'] ?? $this->queryName($items);
                    $plan->listFlatName = $name ?: null;
                }
                self::compileItem($plan, $items);
                break;

            case QueryShapeType::MAP:
                $keys = $shape->getKey();
                $values = $shape->getValue();
                $plan->flattened = $this->isFlat($shape);
                $plan->mapEntrySegment = $plan->flattened ? '' : '.entry';
                $keyName = $this->queryName($keys, 'key');
                $valueName = $this->queryName($values, 'value');
                $plan->mapKeySuffix = '.' . $keyName;
                $plan->mapValueSuffix = '.' . $valueName;
                $plan->mapSprintf = strpos($plan->mapKeySuffix, '%') !== false
                    || strpos($plan->mapValueSuffix, '%') !== false;
                $plan->mapKeyType = QueryShapeType::fromShape($keys);
                $plan->mapKeyShape = $keys;
                $plan->mapKeyTimestampFormat = self::timestampFormat($plan->mapKeyType, $keys);
                self::compileItem($plan, $values);
                break;

            case QueryShapeType::TIMESTAMP:
                $plan->timestampFormat = self::timestampFormat($plan->type, $shape);
                break;
        }

        return $plan;
    }

    private static function compileItem(QueryEncodePlan $plan, Shape $item): void
    {
        $plan->itemType = QueryShapeType::fromShape($item);
        $plan->itemShape = $item;
        $plan->itemTimestampFormat = self::timestampFormat($plan->itemType, $item);
    }

    /**
     * Resolves the timestamp format for a shape, or null when it is not a
     * timestamp. Defaults to iso8601.
     */
    private static function timestampFormat(int $type, Shape $shape): ?string
    {
        if ($type !== QueryShapeType::TIMESTAMP) {
            return null;
        }

        return !empty($shape['timestampFormat'])
            ? $shape['timestampFormat']
            : 'iso8601';
    }
}
