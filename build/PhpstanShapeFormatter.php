<?php

/**
 * Renders an AWS api-2.json input shape into a PHPStan/Psalm-compatible
 * unsealed array-shape string for use in `@phpstan-method` annotations.
 *
 * Why a separate formatter
 * ------------------------
 * The output of this class is consumed by static-analysis tools (PHPStan,
 * Psalm) only. PhpStorm ignores `@phpstan-*` tags entirely, so its parser
 * limitations on array-shape parameter types in `@method` declarations are
 * not in play here. That lets us emit richer types than the plain `@method`
 * form can carry.
 *
 * Shape contract (per docs/METHOD_ANNOTATIONS_TASK.md)
 * ----------------------------------------------------
 * - Every emitted shape is an `array{ ..., ... }` (unsealed via trailing
 *   bare `...`). Unsealed shapes accept extra keys without flagging them,
 *   which is what we want for SDK input bags.
 * - Every member is rendered with a `?` optional sigil regardless of the
 *   model's `required` list. Runtime enforces required-ness; we'd rather
 *   have false negatives on missing required keys than false positives on
 *   dynamically built `$args`.
 * - Depth is capped at 3 (top-level $args = depth 1). At cap, emit bare
 *   `array`.
 * - Recursive shape references collapse to bare `array`.
 * - Empty-input operations still emit `array{...}` (unsealed empty shape)
 *   so the paired `@method`/`@phpstan-method` invariant holds. Formatter
 *   returns null only for unknown or non-structure input shapes.
 *
 * Type mapping
 * ------------
 * | api-2.json type           | rendered                                      |
 * |---------------------------|-----------------------------------------------|
 * | structure                 | nested array{...} or `array` at cap          |
 * | union (or structure with `union: true`) | nested array{...} or `array` |
 * | list of T                 | list<T>                                       |
 * | map keyed by string -> V  | array<string, V>                              |
 * | string with enum          | 'A'\|'B'\|'C' (sorted, escaped)               |
 * | string                    | string                                        |
 * | integer/long/short/byte   | int                                           |
 * | bigInteger                | int                                           |
 * | float/double              | float                                         |
 * | bigDecimal                | string                                        |
 * | boolean                   | bool                                          |
 * | timestamp                 | int\|string\|\DateTimeInterface               |
 * | blob                      | string\|resource\|\Psr\Http\Message\StreamInterface |
 * | document                  | mixed                                         |
 * | unknown                   | array (safe fallback)                         |
 *
 * Key escaping
 * ------------
 * Member names matching ^[A-Za-z_][A-Za-z0-9_]*$ are emitted unquoted.
 * Otherwise single-quoted with backslash and single-quote escaped.
 *
 * @internal
 */
final class PhpstanShapeFormatter
{
    /**
     * Maximum recursion depth. Top-level `$args` is depth 1, so children are
     * depth 2, grandchildren depth 3, and depth 4+ collapses to bare `array`.
     */
    public const MAX_DEPTH = 3;

    /** Sentinel emitted at depth cap or on a recursive shape cycle. */
    private const COLLAPSED = 'array';

    /** Unsealed empty shape emitted for empty-input operations. */
    private const EMPTY_SHAPE = 'array{...}';

    /** @var array<string, mixed> */
    private array $shapes;

    /**
     * Stack of shape names currently being expanded. Used for cycle detection.
     *
     * @var string[]
     */
    private array $visitedStack = [];

    /**
     * @param array $apiDefinition Decoded api-2.json. Must contain a 'shapes' key.
     */
    public function __construct(array $apiDefinition)
    {
        $this->shapes = $apiDefinition['shapes'] ?? [];
    }

    /**
     * Format the input shape for an operation. Returns the PHPStan/Psalm
     * array-shape string for the operation's input, or null only when the
     * operation has no addressable input shape (missing from shapes map,
     * or not a structure type).
     *
     * Empty-input operations (modeled as a structure with `"members": {}`)
     * return the unsealed empty shape `array{...}`. This keeps the
     * `@method` / `@phpstan-method` pairing invariant in ClientAnnotator —
     * every legacy `@method` we emit must have a matching `@phpstan-method`
     * so consumers and static-analysis tools never see a mixed surface.
     * `array{...}` is an unsealed array shape with no required keys, so it
     * accepts any `array` at runtime without flagging extra keys — exactly
     * the semantics consumers want for an op that takes no modeled args
     * but may receive an empty (or sentinel) array.
     *
     * @param string $inputShapeName Name of the input shape from operations[op].input.shape
     * @return string|null PHPStan/Psalm array-shape string, multi-line for nested shapes
     */
    public function formatInput(string $inputShapeName): ?string
    {
        if (!isset($this->shapes[$inputShapeName])) {
            return null;
        }

        $shape = $this->shapes[$inputShapeName];
        if (($shape['type'] ?? null) !== 'structure') {
            return null;
        }

        $members = $shape['members'] ?? [];
        if (count($members) === 0) {
            // Empty input — emit the unsealed empty shape so the paired
            // emission invariant in ClientAnnotator holds.
            return self::EMPTY_SHAPE;
        }

        return $this->renderStructure($shape, 1);
    }

    /**
     * Renders a single shape at the given recursion depth.
     *
     * The depth cap applies only when the target shape is itself a
     * structure or union — scalar/list/map types render unconditionally
     * because they can't directly cause runaway nesting. Lists and maps
     * still bound their inner type via the depth they pass to their
     * recursive `renderShape` call.
     */
    private function renderShape(string $shapeName, int $depth): string
    {
        if (!isset($this->shapes[$shapeName])) {
            return self::COLLAPSED;
        }

        $shape = $this->shapes[$shapeName];
        $type = $shape['type'] ?? null;
        $isContainer = $type === 'structure' || $type === 'union';

        if ($isContainer && $depth > self::MAX_DEPTH) {
            return self::COLLAPSED;
        }

        if ($isContainer && in_array($shapeName, $this->visitedStack, true)) {
            return self::COLLAPSED;
        }

        if ($isContainer) {
            $this->visitedStack[] = $shapeName;
            try {
                return $this->dispatchType($shape, $depth);
            } finally {
                array_pop($this->visitedStack);
            }
        }

        return $this->dispatchType($shape, $depth);
    }

    /**
     * Branches on the api-2.json type and emits the corresponding PHPStan
     * type expression.
     */
    private function dispatchType(array $shape, int $depth): string
    {
        $type = $shape['type'] ?? null;

        switch ($type) {
            case 'structure':
                // AWS unions are encoded as structures with `union: true`.
                // Emit as a nested all-optional shape; static analyzers
                // treat it as "any of these keys may be set" which is
                // close enough to a tagged union for our purposes.
                return $this->renderStructure($shape, $depth);

            case 'union':
                // Standalone `union` type (less common). Same treatment.
                return $this->renderStructure($shape, $depth);

            case 'list':
                $member = $shape['member']['shape'] ?? null;
                if ($member === null) {
                    return 'list<mixed>';
                }
                $inner = $this->renderShape($member, $depth + 1);
                return "list<{$inner}>";

            case 'map':
                $valueShape = $shape['value']['shape'] ?? null;
                if ($valueShape === null) {
                    return 'array<string, mixed>';
                }
                $inner = $this->renderShape($valueShape, $depth + 1);
                return "array<string, {$inner}>";

            case 'string':
                return $this->renderString($shape);

            case 'integer':
            case 'long':
            case 'short':
            case 'byte':
            case 'bigInteger':
                return 'int';

            case 'float':
            case 'double':
                return 'float';

            case 'bigDecimal':
                return 'string';

            case 'boolean':
                return 'bool';

            case 'timestamp':
                return 'int|string|\\DateTimeInterface';

            case 'blob':
                return 'string|resource|\\Psr\\Http\\Message\\StreamInterface';

            case 'document':
                return 'mixed';

            default:
                return 'array';
        }
    }

    /**
     * Renders a structure as `array{ Name?: T, ..., ... }`. Always
     * unsealed (trailing bare `...`) and all-optional regardless of the
     * model's required list. At depth cap or with no members, returns
     * the COLLAPSED sentinel.
     */
    private function renderStructure(array $shape, int $depth): string
    {
        $members = $shape['members'] ?? [];
        if (count($members) === 0) {
            return self::COLLAPSED;
        }

        $segments = [];
        foreach ($members as $name => $member) {
            $memberShape = $member['shape'] ?? null;
            $rendered = $memberShape !== null
                ? $this->renderShape($memberShape, $depth + 1)
                : 'mixed';

            $key = $this->encodeKey($name);
            $segments[] = "{$key}?: {$rendered}";
        }

        // Unsealed via trailing `...`. PHPStan/Psalm won't flag unknown
        // keys, including typos, which AWS then ignores at runtime. This
        // is a deliberate choice: sealing would catch typos
        // but would false-positive on the `array<string, mixed>` values
        // customers routinely build from config, request context, or
        // tracing state.
        $segments[] = '...';

        return $this->compose($segments);
    }

    /**
     * Compose member segments into either a single-line `array{a?: T, b?: U, ...}`
     * or a multi-line indented form. Multi-line is chosen when any segment
     * itself contains a newline (indicating a nested multi-line shape) or
     * when the rendered single-line exceeds a soft 110-char budget.
     *
     * @param string[] $segments Already-formatted member-or-`...` segments
     */
    private function compose(array $segments): string
    {
        $compact = 'array{' . implode(', ', $segments) . '}';

        if (
            strpos($compact, "\n") === false
            && strlen($compact) <= 110
        ) {
            return $compact;
        }

        $innerIndent = '    ';
        $lines = [];
        foreach ($segments as $segment) {
            $lines[] = $innerIndent . $this->reindentNested($segment, $innerIndent);
        }

        return "array{\n" . implode(",\n", $lines) . ",\n}";
    }

    /**
     * When a nested rendered segment already contains newlines, reindent
     * its continuation lines so they align under the current indent.
     */
    private function reindentNested(string $segment, string $indent): string
    {
        if (strpos($segment, "\n") === false) {
            return $segment;
        }
        return str_replace("\n", "\n" . $indent, $segment);
    }

    /**
     * Renders a string-typed shape: literal-string union for enums,
     * plain `string` otherwise.
     */
    private function renderString(array $shape): string
    {
        $enum = $shape['enum'] ?? null;
        if (!is_array($enum) || count($enum) === 0) {
            return 'string';
        }

        $values = $enum;
        sort($values, SORT_STRING);
        $literals = array_map(
            fn (string $v): string => "'" . $this->escapeStringLiteral($v) . "'",
            $values
        );

        return implode('|', $literals);
    }

    /**
     * Escapes the only two characters that break a single-quoted string
     * literal in PHPStan/Psalm: backslash and single-quote.
     */
    private function escapeStringLiteral(string $value): string
    {
        return str_replace(['\\', "'"], ['\\\\', "\\'"], $value);
    }

    /**
     * Emit a member key unquoted if it matches PHP's bare-identifier
     * pattern. Otherwise wrap in single quotes and escape.
     */
    private function encodeKey(string $name): string
    {
        if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name) === 1) {
            return $name;
        }
        return "'" . $this->escapeStringLiteral($name) . "'";
    }
}
