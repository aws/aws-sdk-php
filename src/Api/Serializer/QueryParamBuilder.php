<?php
namespace Aws\Api\Serializer;

use Aws\Api\Serde\Query\QueryEncodePlan;
use Aws\Api\Serde\Query\QueryEncodePlanProvider;
use Aws\Api\Serde\Query\QueryShapeType;
use Aws\Api\StructureShape;
use Aws\Api\TimestampShape;

/**
 * @internal
 */
class QueryParamBuilder
{
    /** @var QueryEncodePlanProvider */
    protected $planProvider;

    public function __construct(?QueryEncodePlanProvider $planProvider = null)
    {
        $this->planProvider = $planProvider ?? new QueryEncodePlanProvider();
    }

    public function __invoke(StructureShape $shape, array $params)
    {
        $query = [];
        if ($params) {
            $this->formatStructure(
                $this->planProvider->get($shape),
                $params,
                '',
                $query
            );
        }

        return $query;
    }

    protected function formatStructure(
        QueryEncodePlan $plan,
        array $value,
        $prefix,
        array &$query
    ) {
        if ($prefix) {
            $prefix .= '.';
        }

        foreach ($value as $k => $v) {
            if (!isset($plan->members[$k])) {
                continue;
            }

            $member = $plan->members[$k];
            $name = $prefix . $member[QueryEncodePlan::M_NAME];
            switch ($member[QueryEncodePlan::M_TYPE]) {
                case QueryShapeType::STRUCTURE:
                    $childPlan = $member[QueryEncodePlan::M_PLAN];
                    if ($childPlan === null) {
                        $childPlan = $this->planProvider->get($member[QueryEncodePlan::M_SHAPE]);
                        $plan->members[$k][QueryEncodePlan::M_PLAN] = $childPlan;
                    }
                    $this->formatStructure($childPlan, $v, $name, $query);
                    break;

                case QueryShapeType::LIST:
                    $childPlan = $member[QueryEncodePlan::M_PLAN];
                    if ($childPlan === null) {
                        $childPlan = $this->planProvider->get($member[QueryEncodePlan::M_SHAPE]);
                        $plan->members[$k][QueryEncodePlan::M_PLAN] = $childPlan;
                    }
                    $this->formatList($childPlan, $v, $name, $query);
                    break;

                case QueryShapeType::MAP:
                    $childPlan = $member[QueryEncodePlan::M_PLAN];
                    if ($childPlan === null) {
                        $childPlan = $this->planProvider->get($member[QueryEncodePlan::M_SHAPE]);
                        $plan->members[$k][QueryEncodePlan::M_PLAN] = $childPlan;
                    }
                    $this->formatMap($childPlan, $v, $name, $query);
                    break;

                case QueryShapeType::BLOB:
                    $query[$name] = base64_encode($v);
                    break;

                case QueryShapeType::TIMESTAMP:
                    $query[$name] = TimestampShape::formatAsString(
                        $v,
                        $member[QueryEncodePlan::M_TSFORMAT]
                    );
                    break;

                case QueryShapeType::BOOLEAN:
                    $query[$name] = $v ? 'true' : 'false';
                    break;

                case QueryShapeType::UNRESOLVED:
                    // Same exception StructureShape::getMember() raises.
                    throw new \InvalidArgumentException('Unknown member ' . $k);

                default:
                    $query[$name] = (string) $v;
            }
        }
    }

    protected function formatList(
        QueryEncodePlan $plan,
        array $value,
        $prefix,
        array &$query
    ) {
        // Handle empty list serialization
        if (!$value) {
            $query[$prefix] = '';
            return;
        }

        if (!$plan->flattened) {
            $prefix .= $plan->listMemberSegment;
        } elseif ($plan->listFlatName !== null) {
            // Flattened lists replace the last prefix segment with their name.
            $pos = strrpos($prefix, '.');
            $prefix = $pos === false
                ? $plan->listFlatName
                : substr($prefix, 0, $pos + 1) . $plan->listFlatName;
        }

        $this->formatItems($plan, $value, $prefix . '.', $query);
    }

    /**
     * Writes list items as "<prefix><index>", where the index is the item's
     * key plus one. Branches on the item type once per list.
     */
    protected function formatItems(
        QueryEncodePlan $plan,
        array $value,
        $prefix,
        array &$query
    ) {
        switch ($plan->itemType) {
            case QueryShapeType::STRUCTURE:
                $childPlan = $plan->itemPlan ??= $this->planProvider->get($plan->itemShape);
                foreach ($value as $k => $v) {
                    $this->formatStructure($childPlan, $v, $prefix . ($k + 1), $query);
                }
                break;

            case QueryShapeType::LIST:
                $childPlan = $plan->itemPlan ??= $this->planProvider->get($plan->itemShape);
                foreach ($value as $k => $v) {
                    $this->formatList($childPlan, $v, $prefix . ($k + 1), $query);
                }
                break;

            case QueryShapeType::MAP:
                $childPlan = $plan->itemPlan ??= $this->planProvider->get($plan->itemShape);
                foreach ($value as $k => $v) {
                    $this->formatMap($childPlan, $v, $prefix . ($k + 1), $query);
                }
                break;

            case QueryShapeType::BLOB:
                foreach ($value as $k => $v) {
                    $query[$prefix . ($k + 1)] = base64_encode($v);
                }
                break;

            case QueryShapeType::TIMESTAMP:
                $format = $plan->itemTimestampFormat;
                foreach ($value as $k => $v) {
                    $query[$prefix . ($k + 1)] = TimestampShape::formatAsString($v, $format);
                }
                break;

            case QueryShapeType::BOOLEAN:
                foreach ($value as $k => $v) {
                    $query[$prefix . ($k + 1)] = $v ? 'true' : 'false';
                }
                break;

            case QueryShapeType::MISSING:
                // Same exception ListShape::getMember() raises.
                throw new \RuntimeException('No member attribute specified');

            default:
                foreach ($value as $k => $v) {
                    $query[$prefix . ($k + 1)] = (string) $v;
                }
        }
    }

    protected function formatMap(
        QueryEncodePlan $plan,
        array $value,
        $prefix,
        array &$query
    ) {
        if (!$value) {
            return;
        }

        $prefix .= $plan->mapEntrySegment;

        if ($plan->mapSprintf) {
            $this->formatMapWithSprintf($plan, $value, $prefix, $query);
            return;
        }

        $keySuffix = $plan->mapKeySuffix;
        $valueSuffix = $plan->mapValueSuffix;
        $prefix .= '.';
        $i = 0;

        if ($plan->mapKeyType === QueryShapeType::SCALAR && $plan->itemType === QueryShapeType::SCALAR) {
            foreach ($value as $k => $v) {
                $base = $prefix . ++$i;
                $query[$base . $keySuffix] = (string) $k;
                $query[$base . $valueSuffix] = (string) $v;
            }
            return;
        }

        $keyPlan = self::isComposite($plan->mapKeyType)
            ? ($plan->mapKeyPlan ??= $this->planProvider->get($plan->mapKeyShape))
            : null;
        $valuePlan = self::isComposite($plan->itemType)
            ? ($plan->itemPlan ??= $this->planProvider->get($plan->itemShape))
            : null;

        foreach ($value as $k => $v) {
            $base = $prefix . ++$i;
            $this->formatResolvedValue(
                $plan->mapKeyType,
                $keyPlan,
                $plan->mapKeyTimestampFormat,
                $k,
                $base . $keySuffix,
                $query
            );
            $this->formatResolvedValue(
                $plan->itemType,
                $valuePlan,
                $plan->itemTimestampFormat,
                $v,
                $base . $valueSuffix,
                $query
            );
        }
    }

    /**
     * Map path for key or value names that contain "%". The legacy builder
     * built these keys with sprintf(), so "%%" becomes "%" and other
     * directives raise the same errors as before.
     */
    private function formatMapWithSprintf(
        QueryEncodePlan $plan,
        array $value,
        $prefix,
        array &$query
    ) {
        $keyName = '%s.%d' . $plan->mapKeySuffix;
        $valueName = '%s.%s' . $plan->mapValueSuffix;
        $keyPlan = self::isComposite($plan->mapKeyType)
            ? ($plan->mapKeyPlan ??= $this->planProvider->get($plan->mapKeyShape))
            : null;
        $valuePlan = self::isComposite($plan->itemType)
            ? ($plan->itemPlan ??= $this->planProvider->get($plan->itemShape))
            : null;
        $i = 0;

        foreach ($value as $k => $v) {
            $i++;
            $this->formatResolvedValue(
                $plan->mapKeyType,
                $keyPlan,
                $plan->mapKeyTimestampFormat,
                $k,
                sprintf($keyName, $prefix, $i),
                $query
            );
            $this->formatResolvedValue(
                $plan->itemType,
                $valuePlan,
                $plan->itemTimestampFormat,
                $v,
                sprintf($valueName, $prefix, $i),
                $query
            );
        }
    }

    /**
     * Formats one map key or value whose type and child plan were resolved
     * before the loop.
     */
    private function formatResolvedValue(
        int $type,
        ?QueryEncodePlan $childPlan,
        ?string $timestampFormat,
        $value,
        $name,
        array &$query
    ) {
        switch ($type) {
            case QueryShapeType::STRUCTURE:
                $this->formatStructure($childPlan, $value, $name, $query);
                break;
            case QueryShapeType::LIST:
                $this->formatList($childPlan, $value, $name, $query);
                break;
            case QueryShapeType::MAP:
                $this->formatMap($childPlan, $value, $name, $query);
                break;
            case QueryShapeType::BLOB:
                $query[$name] = base64_encode($value);
                break;
            case QueryShapeType::TIMESTAMP:
                $query[$name] = TimestampShape::formatAsString($value, $timestampFormat);
                break;
            case QueryShapeType::BOOLEAN:
                $query[$name] = $value ? 'true' : 'false';
                break;
            default:
                $query[$name] = (string) $value;
        }
    }

    private static function isComposite(int $type): bool
    {
        return $type === QueryShapeType::STRUCTURE
            || $type === QueryShapeType::LIST
            || $type === QueryShapeType::MAP;
    }
}
