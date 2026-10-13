<?php
namespace Aws\Api\Serde\Http;

use Aws\Api\StructureShape;

/**
 * Compiled REST request bindings for one operation.
 *
 * A plan is built once per operation and cached on the operation
 * (ShapePlanCache::HTTP_REQUEST_BINDINGS). It removes the per-request model
 * reads RestSerializer would otherwise perform: member location lookups,
 * header and query name derivation, conversion dispatch, payload decisions,
 * and the URI template regular expression.
 *
 * @internal
 */
final class HttpRequestBindingPlan
{
    // Binding tags (D_TAG).
    public const BODY         = 0;
    public const HEADER       = 1;
    public const HEADER_LIST  = 2;
    public const HEADER_MAP   = 3;
    public const QUERY        = 4;
    public const QUERY_LIST   = 5;
    public const QUERY_MAP    = 6;
    public const HEADER_SHAPE = 7; // cold path: legacy recursive header logic
    public const QUERY_SHAPE  = 8; // cold path: legacy recursive query logic

    // Value conversions.
    public const CONVERT_NONE      = 0;
    public const CONVERT_TIMESTAMP = 1;
    public const CONVERT_BOOLEAN   = 2;

    // Binding descriptor: bindings[sdkName] = [...]
    public const D_TAG            = 0; // binding tag
    public const D_NAME           = 1; // wire header/query name, or header-map prefix
    public const D_CONVERT        = 2; // value conversion
    public const D_TSFORMAT       = 3; // timestamp format, or null
    public const D_JSONVALUE      = 4; // member carries jsonvalue
    public const D_ITEM_CONVERT   = 5; // list item conversion
    public const D_ITEM_TSFORMAT  = 6; // list item timestamp format, or null
    public const D_ITEM_JSONVALUE = 7; // list item carries jsonvalue
    public const D_SHAPE          = 8; // member Shape, for cold paths

    // URI member descriptor: uriMembers[] = [...], in input member order
    public const U_NAME     = 0; // SDK input name
    public const U_LABEL    = 1; // template label (locationName ?: name)
    public const U_CONVERT  = 2; // value conversion
    public const U_TSFORMAT = 3; // timestamp format

    // URI template part: uriParts[] = string literal | [...]
    public const P_LABEL  = 0; // label name, without the greedy "+"
    public const P_GREEDY = 1; // greedy ("{Key+}") label

    // Payload kinds.
    public const PAYLOAD_NONE      = 0;
    public const PAYLOAD_RAW       = 1; // streaming, string or blob payload
    public const PAYLOAD_STRUCTURE = 2; // payload serialized by the body codec
    public const PAYLOAD_MISSING   = 3; // payload names an unknown member

    /** @var string HTTP method. */
    public $method;

    /** @var StructureShape Operation input shape. */
    public $input;

    /** @var array<string,array> Binding descriptors keyed by SDK input name. */
    public $bindings = [];

    /** @var string|null Request URI when it has no labels. */
    public $uriLiteral;

    /** @var array<int,string|array> Literal segments and label descriptors. */
    public $uriParts = [];

    /**
     * @var array<int,array> URI member descriptors in input member order.
     * Every URI member is formatted, in this order, before the template is
     * expanded, and a later member with the same label wins. That matches
     * legacy, including which invalid timestamp throws first.
     */
    public $uriMembers = [];

    /** @var string|null Payload member name. */
    public $payloadName;

    /** @var int Payload kind. */
    public $payloadKind = self::PAYLOAD_NONE;

    /** @var \Aws\Api\Shape|null Resolved payload member. */
    public $payloadMember;

    /** @var bool Payload member is streaming. */
    public $payloadStreaming = false;

    /** @var string|null Content-Type to set for a raw payload. */
    public $payloadContentType;

    /** @var bool Serialize an empty body when no body members were sent. */
    public $hasPayloadParam = false;

    /** @var bool Service is S3, for path preservation. */
    public $isS3 = false;
}
