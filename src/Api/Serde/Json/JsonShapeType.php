<?php
namespace Aws\Api\Serde\Json;

use Aws\Api\Shape;

/**
 * Maps a modeled shape to an integer category tag.
 *
 * Integer tags replace repeated model-string reads and string-switch dispatch
 * inside the JSON encode and decode collection loops.
 *
 * @internal
 */
final class JsonShapeType
{
    public const SCALAR    = 0;
    public const STRUCTURE = 1;
    public const LIST      = 2;
    public const MAP       = 3;
    public const BLOB      = 4;
    public const TIMESTAMP = 5;
    public const DOCUMENT  = 6;

    /**
     * Categorizes a shape once, at plan-compile time.
     *
     * @param Shape $shape
     *
     * @return int One of the class constants.
     */
    public static function fromShape(Shape $shape): int
    {
        switch ($shape['type']) {
            case 'structure':
                return ($shape['document'] ?? false)
                    ? self::DOCUMENT
                    : self::STRUCTURE;
            case 'list':
                return self::LIST;
            case 'map':
                return self::MAP;
            case 'blob':
                return self::BLOB;
            case 'timestamp':
                return self::TIMESTAMP;
            default:
                return self::SCALAR;
        }
    }
}
