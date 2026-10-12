<?php
namespace Aws\Api\Serializer;

use Aws\Api\Serde\Json\JsonEncodePlan;
use Aws\Api\Serde\Json\JsonEncodePlanProvider;
use Aws\Api\Serde\Json\JsonShapeType;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\TimestampShape;
use Aws\Exception\InvalidJsonException;

/**
 * Formats the JSON body of a JSON-REST or JSON-RPC operation.
 * @internal
 */
class JsonBody
{
    private $api;

    /** @var JsonEncodePlanProvider */
    private $planProvider;

    public function __construct(Service $api)
    {
        $this->api = $api;
        $this->planProvider = new JsonEncodePlanProvider();
    }

    /**
     * Gets the JSON Content-Type header for a service API
     *
     * @param Service $service
     *
     * @return string
     */
    public static function getContentType(Service $service)
    {
        if ($service->getMetadata('protocol') === 'rest-json') {
            return 'application/json';
        }

        $jsonVersion = $service->getMetadata('jsonVersion');
        if (empty($jsonVersion)) {
            throw new \InvalidArgumentException('invalid json');
        } else {
            return 'application/x-amz-json-'
                . @number_format($service->getMetadata('jsonVersion'), 1);
        }
    }

    /**
     * Builds the JSON body based on an array of arguments.
     *
     * @param Shape $shape Operation being constructed
     * @param array|string $args  Associative array of arguments, or a string.
     *
     * @return string
     */
    public function build(Shape $shape, array|string $args)
    {
        if ($args === []) {
            return '{}';
        }

        try {
            $plan = $this->planProvider->get($shape);
            $result = json_encode($this->formatPlan($plan, $args), JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new InvalidJsonException(
                'Unable to encode JSON document ' . $shape->getName() . ': ' .
                $e->getMessage() . PHP_EOL
            );
        }

        return $result === '[]' ? '{}' : $result;
    }

    /**
     * Encodes a value using a compiled plan instead of re-reading the model.
     */
    private function formatPlan(JsonEncodePlan $plan, $value)
    {
        switch ($plan->type) {
            case JsonShapeType::STRUCTURE:
                $data = [];
                foreach ($value as $k => $v) {
                    if ($v === null || !isset($plan->members[$k])) {
                        continue;
                    }
                    $member = $plan->members[$k];
                    switch ($member[JsonEncodePlan::M_TYPE]) {
                        case JsonShapeType::STRUCTURE:
                        case JsonShapeType::LIST:
                        case JsonShapeType::MAP:
                            $childPlan = $member[JsonEncodePlan::M_PLAN];
                            if ($childPlan === null) {
                                $childPlan = $this->planProvider->get(
                                    $member[JsonEncodePlan::M_SHAPE]
                                );
                                $plan->members[$k][JsonEncodePlan::M_PLAN] = $childPlan;
                            }
                            $formatted = $this->formatPlan($childPlan, $v);
                            break;

                        case JsonShapeType::BLOB:
                            $formatted = base64_encode($v);
                            break;

                        case JsonShapeType::TIMESTAMP:
                            $formatted = TimestampShape::format(
                                $v,
                                $member[JsonEncodePlan::M_TSFORMAT]
                            );
                            break;

                        default: // SCALAR, DOCUMENT
                            $formatted = $v;
                    }
                    $data[$member[JsonEncodePlan::M_WIRE]] = $formatted;
                }
                if (empty($data)) {
                    return new \stdClass();
                }
                return $data;

            case JsonShapeType::LIST:
                $type  = $plan->value[JsonEncodePlan::V_TYPE];
                $shape = $plan->value[JsonEncodePlan::V_SHAPE];
                $ts    = $plan->value[JsonEncodePlan::V_TSFORMAT];
                switch ($type) {
                    case JsonShapeType::STRUCTURE:
                    case JsonShapeType::LIST:
                    case JsonShapeType::MAP:
                        $childPlan = $plan->valuePlan
                            ??= $this->planProvider->get($shape);
                        foreach ($value as $k => $v) {
                            $value[$k] = $this->formatPlan($childPlan, $v);
                        }
                        return $value;

                    case JsonShapeType::BLOB:
                        foreach ($value as $k => $v) {
                            $value[$k] = base64_encode($v);
                        }
                        return $value;

                    case JsonShapeType::TIMESTAMP:
                        foreach ($value as $k => $v) {
                            $value[$k] = TimestampShape::format($v, $ts);
                        }
                        return $value;

                    default: // SCALAR, DOCUMENT
                        return $value;
                }

            case JsonShapeType::MAP:
                if (empty($value)) {
                    return new \stdClass();
                }
                $type  = $plan->value[JsonEncodePlan::V_TYPE];
                $shape = $plan->value[JsonEncodePlan::V_SHAPE];
                $ts    = $plan->value[JsonEncodePlan::V_TSFORMAT];
                switch ($type) {
                    case JsonShapeType::STRUCTURE:
                    case JsonShapeType::LIST:
                    case JsonShapeType::MAP:
                        $childPlan = $plan->valuePlan
                            ??= $this->planProvider->get($shape);
                        foreach ($value as $k => $v) {
                            $value[$k] = $this->formatPlan($childPlan, $v);
                        }
                        return $value;

                    case JsonShapeType::BLOB:
                        foreach ($value as $k => $v) {
                            $value[$k] = base64_encode($v);
                        }
                        return $value;

                    case JsonShapeType::TIMESTAMP:
                        foreach ($value as $k => $v) {
                            $value[$k] = TimestampShape::format($v, $ts);
                        }
                        return $value;

                    default: // SCALAR, DOCUMENT
                        return $value;
                }

            case JsonShapeType::BLOB:
                return base64_encode($value);

            case JsonShapeType::TIMESTAMP:
                return TimestampShape::format($value, $plan->timestampFormat);

            default: // SCALAR, DOCUMENT
                return $value;
        }
    }
}
