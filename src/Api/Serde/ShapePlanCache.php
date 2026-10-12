<?php
namespace Aws\Api\Serde;

/**
 * Central registry of serde plan cache slots.
 *
 * Each slot identifies both a protocol and a direction. A model object caches
 * at most one plan per slot. Slots are never reused, so a single integer always
 * means the same protocol and direction across the codebase.
 *
 * @internal
 */
final class ShapePlanCache
{
    public const JSON_ENCODE = 0;
    public const JSON_DECODE = 1;
    public const HTTP_REQUEST_BINDINGS = 2;
    public const HTTP_RESPONSE_BINDINGS = 3;
    public const XML_ENCODE = 4;
    public const XML_DECODE = 5;
    public const QUERY_ENCODE = 6;
    public const EC2_QUERY_ENCODE = 7;

    private function __construct()
    {
        // Slot registry only. Plan storage lives on AbstractModel.
    }
}
