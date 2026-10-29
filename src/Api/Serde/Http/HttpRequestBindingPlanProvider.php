<?php
namespace Aws\Api\Serde\Http;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Operation;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * Builds and caches HttpRequestBindingPlan objects, one per operation.
 *
 * Plans attach to the operation via the shared ShapePlanCache (slot
 * HTTP_REQUEST_BINDINGS). Mutating the operation, its input shape or any
 * shape in the ShapeMap advances the shared generation and drops the plan.
 *
 * @internal
 */
final class HttpRequestBindingPlanProvider
{
    private const TEMPLATE_STRING_REGEX = '/\{([^\}]+)\}/';

    private const EXCLUDE_CONTENT_TYPE = [
        's3' => true,
        'glacier' => true,
    ];

    /** @var Service */
    private $api;

    public function __construct(Service $api)
    {
        $this->api = $api;
    }

    public function get(Operation $operation): HttpRequestBindingPlan
    {
        return $operation->getSerdePlan(ShapePlanCache::HTTP_REQUEST_BINDINGS)
            ?? $operation->cacheSerdePlan(
                ShapePlanCache::HTTP_REQUEST_BINDINGS,
                $this->compile($operation)
            );
    }

    private function compile(Operation $operation): HttpRequestBindingPlan
    {
        $plan = new HttpRequestBindingPlan();
        $plan->method = $operation['http']['method'];
        $plan->isS3 = $this->api->getServiceName() === 's3';

        $input = $operation->getInput();
        $plan->input = $input;
        $payload = $input['payload'];

        $uriMembers = [];
        $resolved = $input->getMembers();
        foreach ($resolved as $name => $member) {
            $location = $member['location'];
            if (!$payload && !$location) {
                $plan->bindings[$name] = [HttpRequestBindingPlan::D_TAG => HttpRequestBindingPlan::BODY];
            } elseif ($location === 'header') {
                $plan->bindings[$name] = self::headerBinding($name, $member);
            } elseif ($location === 'querystring') {
                $plan->bindings[$name] = self::queryBinding($name, $member);
            } elseif ($location === 'headers') {
                $plan->bindings[$name] = [
                    HttpRequestBindingPlan::D_TAG  => HttpRequestBindingPlan::HEADER_MAP,
                    HttpRequestBindingPlan::D_NAME => $member['locationName'],
                ];
            } elseif ($location === 'uri') {
                $uriMembers[] = [
                    HttpRequestBindingPlan::U_NAME     => $name,
                    HttpRequestBindingPlan::U_LABEL    => $member['locationName'] ?: $name,
                    HttpRequestBindingPlan::U_CONVERT  => self::conversion($member),
                    HttpRequestBindingPlan::U_TSFORMAT => $member['timestampFormat'] ?? 'iso8601',
                ];
            }
        }

        // A failed shape resolution leaves a partial member hash that getMembers() never retries. 
        $defined = $input['members'];
        if (is_array($defined) && count($resolved) !== count($defined)) {
            foreach ($defined as $name => $definition) {
                if (!isset($resolved[$name])) {
                    $plan->bindings[$name] = [
                        HttpRequestBindingPlan::D_TAG => HttpRequestBindingPlan::UNRESOLVED,
                    ];
                }
            }
        }

        $plan->uriMembers = $uriMembers;
        self::compileUriTemplate($plan, $operation['http']['requestUri']);

        if ($payload) {
            $plan->payloadName = $payload;
            $this->compilePayload($plan, $input, $payload);
        } else {
            $plan->hasPayloadParam = self::hasUnboundMember($input);
        }

        return $plan;
    }

    private static function headerBinding(string $name, Shape $member): array
    {
        $binding = [
            HttpRequestBindingPlan::D_TAG       => HttpRequestBindingPlan::HEADER,
            HttpRequestBindingPlan::D_NAME      => $member['locationName'] ?: $name,
            HttpRequestBindingPlan::D_CONVERT   => self::conversion($member),
            HttpRequestBindingPlan::D_TSFORMAT  => $member['timestampFormat'] ?? 'rfc822',
            HttpRequestBindingPlan::D_JSONVALUE => (bool) $member['jsonvalue'],
            HttpRequestBindingPlan::D_SHAPE     => $member,
        ];

        if ($member instanceof ListShape) {
            // Legacy serializes each item under the item's own locationName
            // and then reads it back as "temp", and recurses into nested
            // lists. Those cases keep the legacy path. A list with no member
            // definition is never resolved here, so an unsent member cannot
            // throw at compile time.
            $item = isset($member['member']) ? $member->getMember() : null;
            if ($item === null || $item instanceof ListShape || $item['locationName']) {
                $binding[HttpRequestBindingPlan::D_TAG] = HttpRequestBindingPlan::HEADER_SHAPE;
                return $binding;
            }

            $binding[HttpRequestBindingPlan::D_TAG] = HttpRequestBindingPlan::HEADER_LIST;
            $binding[HttpRequestBindingPlan::D_ITEM_CONVERT] = self::conversion($item);
            $binding[HttpRequestBindingPlan::D_ITEM_TSFORMAT] = $item['timestampFormat'] ?? 'rfc822';
            $binding[HttpRequestBindingPlan::D_ITEM_JSONVALUE] = (bool) $item['jsonvalue'];
        }

        return $binding;
    }

    private static function queryBinding(string $name, Shape $member): array
    {
        $binding = [
            HttpRequestBindingPlan::D_TAG      => HttpRequestBindingPlan::QUERY,
            HttpRequestBindingPlan::D_NAME     => $member['locationName'] ?: $name,
            HttpRequestBindingPlan::D_CONVERT  => self::conversion($member),
            HttpRequestBindingPlan::D_TSFORMAT => $member['timestampFormat'] ?? 'iso8601',
            HttpRequestBindingPlan::D_SHAPE    => $member,
        ];

        if ($member instanceof MapShape) {
            $binding[HttpRequestBindingPlan::D_TAG] = HttpRequestBindingPlan::QUERY_MAP;
        } elseif ($member instanceof ListShape) {
            // Same item-name quirk as headers: legacy writes the item under
            // its own locationName and reads "temp", so keep the legacy path
            // for those and for nested collections.
            $item = isset($member['member']) ? $member->getMember() : null;
            if ($item === null
                || $item instanceof ListShape
                || $item instanceof MapShape
                || $item['locationName']
            ) {
                $binding[HttpRequestBindingPlan::D_TAG] = HttpRequestBindingPlan::QUERY_SHAPE;
            } else {
                $binding[HttpRequestBindingPlan::D_TAG] = HttpRequestBindingPlan::QUERY_LIST;
                $binding[HttpRequestBindingPlan::D_ITEM_CONVERT] = self::conversion($item);
                $binding[HttpRequestBindingPlan::D_ITEM_TSFORMAT] = $item['timestampFormat'] ?? 'iso8601';
            }
        }

        return $binding;
    }

    private static function conversion(Shape $shape): int
    {
        switch ($shape['type']) {
            case 'timestamp':
                return HttpRequestBindingPlan::CONVERT_TIMESTAMP;
            case 'boolean':
                return HttpRequestBindingPlan::CONVERT_BOOLEAN;
            default:
                return HttpRequestBindingPlan::CONVERT_NONE;
        }
    }

    /**
     * Splits the request URI into literal segments and label descriptors so
     * requests concatenate parts instead of running a regex callback.
     */
    private static function compileUriTemplate(HttpRequestBindingPlan $plan, string $requestUri): void
    {
        $count = preg_match_all(
            self::TEMPLATE_STRING_REGEX,
            $requestUri,
            $matches,
            PREG_OFFSET_CAPTURE | PREG_SET_ORDER
        );

        if (!$count) {
            if ($plan->uriMembers) {
                // Legacy still formats URI members (and can throw) when the
                // template has no labels, so keep the expansion path.
                $plan->uriParts = [$requestUri];
            } else {
                $plan->uriLiteral = $requestUri;
            }
            return;
        }

        $parts = [];
        $offset = 0;
        foreach ($matches as $match) {
            [$token, $position] = $match[0];
            if ($position > $offset) {
                $parts[] = substr($requestUri, $offset, $position - $offset);
            }

            $label = $match[1][0];
            $greedy = str_ends_with($label, '+');
            $parts[] = [
                HttpRequestBindingPlan::P_LABEL  => $greedy ? substr($label, 0, -1) : $label,
                HttpRequestBindingPlan::P_GREEDY => $greedy,
            ];
            $offset = $position + strlen($token);
        }

        if ($offset < strlen($requestUri)) {
            $parts[] = substr($requestUri, $offset);
        }

        $plan->uriParts = $parts;
    }

    private function compilePayload(HttpRequestBindingPlan $plan, StructureShape $input, string $payload): void
    {
        if (!$input->hasMember($payload)) {
            // Legacy throws from getMember() on every request. The serializer
            // calls getMember() at the same points to keep that behavior.
            $plan->payloadKind = HttpRequestBindingPlan::PAYLOAD_MISSING;
            return;
        }

        $member = $input->getMember($payload);
        $type = $member->getType();
        $plan->payloadMember = $member;
        $plan->payloadStreaming = (bool) $member['streaming'];

        if ($plan->payloadStreaming || $type === 'string' || $type === 'blob') {
            $plan->payloadKind = HttpRequestBindingPlan::PAYLOAD_RAW;
            // S3 and Glacier set content type in Middleware::ContentType().
            if (!isset(self::EXCLUDE_CONTENT_TYPE[$this->api->getServiceName() ?? ''])) {
                if ($type === 'string') {
                    $plan->payloadContentType = 'text/plain';
                } elseif ($type === 'blob') {
                    $plan->payloadContentType = 'application/octet-stream';
                }
            }
        } else {
            $plan->payloadKind = HttpRequestBindingPlan::PAYLOAD_STRUCTURE;
        }

        $potentiallyEmptyTypes = ['blob', 'string'];
        if ($this->api->getProtocol() === 'rest-xml') {
            $potentiallyEmptyTypes[] = 'structure';
        }

        // Unions may also be empty or unset.
        $plan->hasPayloadParam = empty($member['union'])
            && !in_array($member['type'], $potentiallyEmptyTypes)
            && self::hasUnboundMember($input);
    }

    private static function hasUnboundMember(StructureShape $input): bool
    {
        foreach ($input->getMembers() as $member) {
            if (!isset($member['location'])) {
                return true;
            }
        }

        return false;
    }
}
