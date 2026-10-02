<?php
namespace Aws\Api\Serde\Json;

use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;

/**
 * Builds and caches JsonDecodePlan objects, one per shape.
 *
 * Plans attach to the shape via the shared ShapePlanCache (slot JSON_DECODE)
 * and reuse its generation-based invalidation. Composite child plans are
 * compiled lazily, when traversal first reaches the child, so a response only
 * ever compiles the shapes it actually decodes.
 *
 * @internal
 */
final class JsonDecodePlanProvider
{
    /**
     * Returns the cached plan for a shape, compiling it on first use.
     *
     * @param Shape $shape
     *
     * @return JsonDecodePlan
     */
    public function get(Shape $shape): JsonDecodePlan
    {
        return $shape->getSerdePlan(ShapePlanCache::JSON_DECODE)
            ?? $shape->cacheSerdePlan(
                ShapePlanCache::JSON_DECODE,
                $this->compile($shape)
            );
    }

    private function compile(Shape $shape): JsonDecodePlan
    {
        $plan = new JsonDecodePlan();
        $plan->type = JsonShapeType::fromShape($shape);

        switch ($plan->type) {
            case JsonShapeType::STRUCTURE:
                $members = [];
                foreach ($shape->getMembers() as $name => $member) {
                    $type = JsonShapeType::fromShape($member);
                    $members[] = [
                        JsonDecodePlan::M_SDK      => $name,
                        JsonDecodePlan::M_WIRE     => $member['locationName'] ?: $name,
                        JsonDecodePlan::M_TYPE     => $type,
                        JsonDecodePlan::M_SHAPE    => $member,
                        JsonDecodePlan::M_TSFORMAT => self::timestampFormat($type, $member),
                    ];
                }
                $plan->members = $members;
                $plan->union = !empty($shape['union']);
                break;

            case JsonShapeType::LIST:
                $member = $shape->getMember();
                $type = JsonShapeType::fromShape($member);
                $plan->value = [
                    JsonDecodePlan::V_TYPE     => $type,
                    JsonDecodePlan::V_SHAPE    => $member,
                    JsonDecodePlan::V_TSFORMAT => self::timestampFormat($type, $member),
                ];
                break;

            case JsonShapeType::MAP:
                $value = $shape->getValue();
                $type = JsonShapeType::fromShape($value);
                $plan->value = [
                    JsonDecodePlan::V_TYPE     => $type,
                    JsonDecodePlan::V_SHAPE    => $value,
                    JsonDecodePlan::V_TSFORMAT => self::timestampFormat($type, $value),
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
     * timestamp. Matches JsonParser's default of null (DateTimeResult).
     */
    private static function timestampFormat(int $type, Shape $shape): ?string
    {
        if ($type !== JsonShapeType::TIMESTAMP) {
            return null;
        }

        return !empty($shape['timestampFormat'])
            ? $shape['timestampFormat']
            : null;
    }
}
