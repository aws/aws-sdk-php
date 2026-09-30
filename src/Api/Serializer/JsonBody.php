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
     * Builds the JSON body using the pre-plan format() path.
     *
     * Retained only so the serde benchmark can compare the legacy path against
     * the plan path in a single process. Not used by the request pipeline.
     *
     * @internal
     */
    public function buildLegacy(Shape $shape, array|string $args)
    {
        try {
            $result = json_encode($this->format($shape, $args), JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new InvalidJsonException(
                'Unable to encode JSON document ' . $shape->getName() . ': ' .
                $e->getMessage() . PHP_EOL
            );
        }

        return $result === '[]' ? '{}' : $result;
    }

    private function format(Shape $shape, $value)
    {
        switch ($shape['type']) {
            case 'structure':
                $data = [];
                if ($shape['document'] ?? false) {
                    return $value;
                }
                foreach ($value as $k => $v) {
                    if ($v !== null && $shape->hasMember($k)) {
                        $valueShape = $shape->getMember($k);
                        $data[$valueShape['locationName'] ?: $k]
                            = $this->format($valueShape, $v);
                    }
                }
                if (empty($data)) {
                    return new \stdClass();
                }
                return $data;

            case 'list':
                $items = $shape->getMember();
                foreach ($value as $k => $v) {
                    $value[$k] = $this->format($items, $v);
                }
                return $value;

            case 'map':
                if (empty($value)) {
                    return new \stdClass();
                }
                $values = $shape->getValue();
                foreach ($value as $k => $v) {
                    $value[$k] = $this->format($values, $v);
                }
                return $value;

            case 'blob':
                return base64_encode($value);

            case 'timestamp':
                $timestampFormat = !empty($shape['timestampFormat'])
                    ? $shape['timestampFormat']
                    : 'unixTimestamp';
                return TimestampShape::format($value, $timestampFormat);

            default:
                return $value;
        }
    }

    /**
     * Encodes a value using a compiled plan instead of re-reading the model.
     *
     * Produces the same PHP value that format() produces for the same shape,
     * so json_encode yields identical wire output.
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
                    $data[$member[JsonEncodePlan::M_WIRE]] = $this->formatByType(
                        $member[JsonEncodePlan::M_TYPE],
                        $member[JsonEncodePlan::M_SHAPE],
                        $member[JsonEncodePlan::M_TSFORMAT],
                        $v
                    );
                }
                if (empty($data)) {
                    return new \stdClass();
                }
                return $data;

            case JsonShapeType::LIST:
                $type  = $plan->value[JsonEncodePlan::V_TYPE];
                $shape = $plan->value[JsonEncodePlan::V_SHAPE];
                $ts    = $plan->value[JsonEncodePlan::V_TSFORMAT];
                foreach ($value as $k => $v) {
                    $value[$k] = $this->formatByType($type, $shape, $ts, $v);
                }
                return $value;

            case JsonShapeType::MAP:
                if (empty($value)) {
                    return new \stdClass();
                }
                $type  = $plan->value[JsonEncodePlan::V_TYPE];
                $shape = $plan->value[JsonEncodePlan::V_SHAPE];
                $ts    = $plan->value[JsonEncodePlan::V_TSFORMAT];
                foreach ($value as $k => $v) {
                    $value[$k] = $this->formatByType($type, $shape, $ts, $v);
                }
                return $value;

            case JsonShapeType::BLOB:
                return base64_encode($value);

            case JsonShapeType::TIMESTAMP:
                return TimestampShape::format($value, $plan->timestampFormat);

            default: // SCALAR, DOCUMENT
                return $value;
        }
    }

    /**
     * Formats one member or collection element. Composite children fetch their
     * own plan lazily; leaf types are handled inline.
     */
    private function formatByType(int $type, Shape $shape, ?string $tsFormat, $value)
    {
        switch ($type) {
            case JsonShapeType::STRUCTURE:
            case JsonShapeType::LIST:
            case JsonShapeType::MAP:
                return $this->formatPlan($this->planProvider->get($shape), $value);

            case JsonShapeType::BLOB:
                return base64_encode($value);

            case JsonShapeType::TIMESTAMP:
                return TimestampShape::format($value, $tsFormat);

            default: // SCALAR, DOCUMENT
                return $value;
        }
    }
}
