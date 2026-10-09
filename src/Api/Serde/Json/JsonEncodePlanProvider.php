<?php
namespace Aws\Api\Serde\Json;

use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;

/**
 * Builds and caches JsonEncodePlan objects, one per shape.
 *
 * Plans attach to the shape via the shared ShapePlanCache (slot JSON_ENCODE)
 * and reuse its generation-based invalidation. Composite child plans are
 * compiled lazily, when traversal first reaches the child, so an operation
 * only ever compiles the shapes it actually encodes.
 *
 * @internal
 */
final class JsonEncodePlanProvider
{
    /**
     * Returns the cached plan for a shape, compiling it on first use.
     *
     * @param Shape $shape
     *
     * @return JsonEncodePlan
     */
    public function get(Shape $shape): JsonEncodePlan
    {
        return $shape->getSerdePlan(ShapePlanCache::JSON_ENCODE)
            ?? $shape->cacheSerdePlan(
                ShapePlanCache::JSON_ENCODE,
                $this->compile($shape)
            );
    }

    private function compile(Shape $shape): JsonEncodePlan
    {
        $plan = new JsonEncodePlan();
        $plan->type = JsonShapeType::fromShape($shape);

        switch ($plan->type) {
            case JsonShapeType::STRUCTURE:
                $members = [];
                foreach ($shape->getMembers() as $name => $member) {
                    $type = JsonShapeType::fromShape($member);
                    $members[$name] = [
                        JsonEncodePlan::M_WIRE     => $member['locationName'] ?: $name,
                        JsonEncodePlan::M_TYPE     => $type,
                        JsonEncodePlan::M_SHAPE    => $member,
                        JsonEncodePlan::M_TSFORMAT => self::timestampFormat($type, $member),
                        JsonEncodePlan::M_PLAN     => null,
                    ];
                }
                $plan->members = $members;
                break;

            case JsonShapeType::LIST:
                $member = $shape->getMember();
                $type = JsonShapeType::fromShape($member);
                $plan->value = [
                    JsonEncodePlan::V_TYPE     => $type,
                    JsonEncodePlan::V_SHAPE    => $member,
                    JsonEncodePlan::V_TSFORMAT => self::timestampFormat($type, $member),
                ];
                break;

            case JsonShapeType::MAP:
                $value = $shape->getValue();
                $type = JsonShapeType::fromShape($value);
                $plan->value = [
                    JsonEncodePlan::V_TYPE     => $type,
                    JsonEncodePlan::V_SHAPE    => $value,
                    JsonEncodePlan::V_TSFORMAT => self::timestampFormat($type, $value),
                ];
                break;

            case JsonShapeType::TIMESTAMP:
                $plan->timestampFormat = self::timestampFormat($plan->type, $shape);
                break;
        }

        return $plan;
    }

    /**
     * Resolves the timestamp format for a shape, or null when it is not a
     * timestamp. Defaults to unixTimestamp.
     */
    private static function timestampFormat(int $type, Shape $shape): ?string
    {
        if ($type !== JsonShapeType::TIMESTAMP) {
            return null;
        }

        return !empty($shape['timestampFormat'])
            ? $shape['timestampFormat']
            : 'unixTimestamp';
    }
}
