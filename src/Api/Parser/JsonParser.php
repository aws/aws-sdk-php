<?php
namespace Aws\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Serde\Json\JsonDecodePlan;
use Aws\Api\Serde\Json\JsonDecodePlanProvider;
use Aws\Api\Serde\Json\JsonShapeType;
use Aws\Api\Shape;

/**
 * @internal Implements standard JSON parsing.
 */
class JsonParser
{
    /** @var JsonDecodePlanProvider */
    private $planProvider;

    public function __construct()
    {
        $this->planProvider = new JsonDecodePlanProvider();
    }

    public function parse(Shape $shape, $value)
    {
        if ($value === null) {
            return $value;
        }

        return $this->parsePlan($this->planProvider->get($shape), $value);
    }

    /**
     * Decodes a value using a compiled plan instead of re-reading the model.
     *
     * Produces the same result JsonParser::parseLegacy() produces for the same
     * shape, preserving modeled member order and union handling.
     */
    private function parsePlan(JsonDecodePlan $plan, $value)
    {
        switch ($plan->type) {
            case JsonShapeType::STRUCTURE:
                $target = [];
                foreach ($plan->members as $member) {
                    $wire = $member[JsonDecodePlan::M_WIRE];
                    if (isset($value[$wire])) {
                        $target[$member[JsonDecodePlan::M_SDK]] = $this->parseByType(
                            $member[JsonDecodePlan::M_TYPE],
                            $member[JsonDecodePlan::M_SHAPE],
                            $member[JsonDecodePlan::M_TSFORMAT],
                            $value[$wire]
                        );
                    }
                }
                if ($plan->union && is_array($value) && empty($target)) {
                    foreach ($value as $key => $val) {
                        $target['Unknown'][$key] = $val;
                    }
                }
                return $target;

            case JsonShapeType::LIST:
                $type  = $plan->value[JsonDecodePlan::V_TYPE];
                $shape = $plan->value[JsonDecodePlan::V_SHAPE];
                $ts    = $plan->value[JsonDecodePlan::V_TSFORMAT];
                $target = [];
                foreach ($value as $v) {
                    $target[] = $this->parseByType($type, $shape, $ts, $v);
                }
                return $target;

            case JsonShapeType::MAP:
                $type  = $plan->value[JsonDecodePlan::V_TYPE];
                $shape = $plan->value[JsonDecodePlan::V_SHAPE];
                $ts    = $plan->value[JsonDecodePlan::V_TSFORMAT];
                $target = [];
                foreach ($value as $k => $v) {
                    // null map values should not be deserialized
                    if (!is_null($v)) {
                        $target[$k] = $this->parseByType($type, $shape, $ts, $v);
                    }
                }
                return $target;

            case JsonShapeType::TIMESTAMP:
                return DateTimeResult::fromTimestamp($value, $plan->timestampFormat);

            case JsonShapeType::BLOB:
                return base64_decode($value);

            default: // SCALAR, DOCUMENT
                return $value;
        }
    }

    /**
     * Decodes one member or collection element. Composite children fetch their
     * own plan lazily; leaf types are handled inline.
     */
    private function parseByType(int $type, Shape $shape, ?string $tsFormat, $value)
    {
        // Match the legacy parser: a null value is returned as-is for every
        // shape type, so sparse list elements stay null.
        if ($value === null) {
            return null;
        }

        switch ($type) {
            case JsonShapeType::STRUCTURE:
            case JsonShapeType::LIST:
            case JsonShapeType::MAP:
                return $this->parsePlan($this->planProvider->get($shape), $value);

            case JsonShapeType::TIMESTAMP:
                return DateTimeResult::fromTimestamp($value, $tsFormat);

            case JsonShapeType::BLOB:
                return base64_decode($value);

            default: // SCALAR, DOCUMENT
                return $value;
        }
    }

    /**
     * Decodes using the pre-plan parse() path.
     *
     * Retained only so the serde benchmark can compare the legacy path against
     * the plan path in a single process. Not used by the response pipeline.
     *
     * @internal
     */
    public function parseLegacy(Shape $shape, $value)
    {
        if ($value === null) {
            return $value;
        }

        switch ($shape['type']) {
            case 'structure':
                if (isset($shape['document']) && $shape['document']) {
                    return $value;
                }
                $target = [];
                foreach ($shape->getMembers() as $name => $member) {
                    $locationName = $member['locationName'] ?: $name;
                    if (isset($value[$locationName])) {
                        $target[$name] = $this->parseLegacy($member, $value[$locationName]);
                    }
                }
                if (isset($shape['union'])
                    && $shape['union']
                    && is_array($value)
                    && empty($target)
                ) {
                    foreach ($value as $key => $val) {
                        $target['Unknown'][$key] = $val;
                    }
                }
                return $target;

            case 'list':
                $member = $shape->getMember();
                $target = [];
                foreach ($value as $v) {
                    $target[] = $this->parseLegacy($member, $v);
                }
                return $target;

            case 'map':
                $values = $shape->getValue();
                $target = [];
                foreach ($value as $k => $v) {
                    // null map values should not be deserialized
                    if (!is_null($v)) {
                        $target[$k] = $this->parseLegacy($values, $v);
                    }
                }
                return $target;

            case 'timestamp':
                return DateTimeResult::fromTimestamp(
                    $value,
                    !empty($shape['timestampFormat']) ? $shape['timestampFormat'] : null
                );

            case 'blob':
                return base64_decode($value);

            default:
                return $value;
        }
    }
}
