<?php
namespace Aws\Api\Serde\Http;

use Aws\Api\ListShape;
use Aws\Api\Operation;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * Builds and caches HttpResponseBindingPlan objects, one per operation.
 *
 * Plans attach to the operation via the shared ShapePlanCache. Mutating the
 * operation or any shape in its ShapeMap advances the shared generation and
 * drops the plan.
 *
 * @internal
 */
final class HttpResponseBindingPlanProvider
{
    public function getCached(
        Operation $operation
    ): ?HttpResponseBindingPlan
    {
        return $operation->getSerdePlan(
            ShapePlanCache::HTTP_RESPONSE_BINDINGS
        );
    }

    public function get(Operation $operation): HttpResponseBindingPlan
    {
        return $this->getCached($operation)
            ?? $operation->cacheSerdePlan(
                ShapePlanCache::HTTP_RESPONSE_BINDINGS,
                $this->compile($operation)
            );
    }

    private function compile(Operation $operation): HttpResponseBindingPlan
    {
        $plan = new HttpResponseBindingPlan();
        $output = $operation->getOutput();

        if ($payloadName = $output['payload']) {
            // Preserve legacy getMember() failures. Retain the resolved member
            // only when a warm route passes it to a decoder or event parser.
            $payloadMember = $output->getMember($payloadName);
            $plan->payloadName = $payloadName;

            if (!empty($payloadMember['eventstream'])) {
                $plan->payloadKind = HttpResponseBindingPlan::PAYLOAD_EVENT_STREAM;
                $plan->payloadMember = $payloadMember;
            } elseif ($payloadMember instanceof StructureShape) {
                $plan->payloadKind = HttpResponseBindingPlan::PAYLOAD_STRUCTURE;
                $plan->payloadMember = $payloadMember;
                $plan->payloadUnion = !empty($payloadMember['union']);
            } else {
                $plan->payloadKind = HttpResponseBindingPlan::PAYLOAD_RAW;
            }
        } else {
            $plan->output = $output;
        }

        // Resolve the complete top-level member list before publishing the
        // plan. Failures intentionally propagate and leave the operation's
        // response-plan cache empty.
        $members = $output->getMembers();
        $plan->hasMembers = count($members) > 0;

        foreach ($members as $name => $member) {
            switch ($member['location']) {
                case 'header':
                    $plan->bindings[] = self::headerBinding($name, $member);
                    break;
                case 'headers':
                    $prefix = $member['locationName'];
                    if ($prefix === null || is_string($prefix)) {
                        $plan->bindings[] = [
                            HttpResponseBindingPlan::PREFIX_HEADERS,
                            $name,
                            $prefix,
                            $prefix !== null ? strlen($prefix) : 0,
                        ];
                    } else {
                        $plan->bindings[] = [
                            HttpResponseBindingPlan::PREFIX_HEADERS_SHAPE,
                            $name,
                            $member,
                        ];
                    }
                    break;
                case 'statusCode':
                    $plan->bindings[] = [
                        HttpResponseBindingPlan::STATUS_CODE,
                        $name,
                    ];
                    break;
            }
        }

        return $plan;
    }

    private static function headerBinding(string $name, Shape $member): array
    {
        $wireName = $member['locationName'] ?: $name;

        if ($member instanceof ListShape) {
            $item = self::listItem($member);
            if ($item === null) {
                return [
                    HttpResponseBindingPlan::HEADER_SHAPE,
                    $name,
                    $member,
                ];
            }

            $conversion = $item->getType() === 'boolean'
                ? HttpResponseBindingPlan::CONVERT_BOOLEAN_LIST
                : HttpResponseBindingPlan::CONVERT_NONE;
        } else {
            $conversion = self::conversion($member);
        }

        return [
            HttpResponseBindingPlan::HEADER,
            $name,
            $wireName,
            $conversion,
            $conversion === HttpResponseBindingPlan::CONVERT_TIMESTAMP
                ? (!empty($member['timestampFormat'])
                    ? $member['timestampFormat']
                    : null)
                : null,
        ];
    }

    private static function listItem(ListShape $member): ?Shape
    {
        // Do not call getMember() until the raw item definition proves that
        // Shape::create() has a discriminator to inspect. This keeps malformed
        // definitions cold without adding an undefined-key diagnostic.
        if (!$member->offsetExists('member')) {
            return null;
        }

        $definition = $member['member'];
        if (!is_array($definition)
            || (!isset($definition['shape']) && !isset($definition['type']))
        ) {
            return null;
        }

        try {
            return $member->getMember();
        } catch (\Throwable $e) {
            return null;
        }
    }

    private static function conversion(Shape $shape): int
    {
        switch ($shape->getType()) {
            case 'float':
            case 'double':
                return HttpResponseBindingPlan::CONVERT_FLOAT;
            case 'long':
            case 'integer':
                return HttpResponseBindingPlan::CONVERT_INT;
            case 'boolean':
                return HttpResponseBindingPlan::CONVERT_BOOLEAN;
            case 'blob':
                return HttpResponseBindingPlan::CONVERT_BLOB;
            case 'timestamp':
                return HttpResponseBindingPlan::CONVERT_TIMESTAMP;
            case 'string':
                return $shape['jsonvalue']
                    ? HttpResponseBindingPlan::CONVERT_JSONVALUE
                    : HttpResponseBindingPlan::CONVERT_NONE;
            default:
                return HttpResponseBindingPlan::CONVERT_NONE;
        }
    }
}
