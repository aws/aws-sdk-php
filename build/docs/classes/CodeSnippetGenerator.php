<?php
namespace Aws\Build\Docs;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Service as SdkService;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * @internal
 */
class CodeSnippetGenerator
{
    /** @var SdkService */
    private $service;

    /** @var bool[][] */
    private $issues = [];

    public function __construct(SdkService $service)
    {
        $this->service = $service;
    }

    private function logIssue($shapeName, $message, $level=E_WARNING)
    {
        if (!isset($this->issues[$shapeName])) {
            $this->issues[$shapeName] = [];
        }

        if (!isset($this->issues[$shapeName][$message])) {
            $this->issues[$shapeName][$level][$message] = true;
        }
    }

    public function getIssues()
    {
        return $this->issues;
    }

    public function generateInput($operation, $params, $comments)
    {
        $messageShape = $this->service->getOperation($operation)->getInput();
        $code = $this->visit($messageShape, $params, '', [], $comments);

        return "\$result = \$client->" . lcfirst($operation) . "($code);";
    }

    public function generateOutput($operation, $params, $comments)
    {
        $messageShape = $this->service->getOperation($operation)->getOutput();
        return $this->visit($messageShape, $params, '', [], $comments);
    }

    public function __invoke($operation, $params, $comments, $isInput = true)
    {
        return $isInput
            ? $this->generateInput($operation, $params, $comments)
            : $this->generateOutput($operation, $params, $comments);
    }

    private static function isTraversableShapeValue($value) {
        return is_array($value) || $value instanceof \Traversable;
    }

    private function visit(Shape $shape, $value, $indent, $path, $comments)
    {
        switch ($shape['type']) {
            case 'structure':
                return $this->structure($shape, $value, $indent, $path, $comments);
            case 'list':
                return $this->arr($shape, $value, $indent, $path, $comments);
            case 'map':
                return $this->map($shape, $value, $indent, $path, $comments);
            case 'string':
                if (self::isTraversableShapeValue($value)) {
                    $this->logIssue($shape->getName(), 'Invalid Conversion To String');
                }
                return "'{$value}'";
            case 'timestamp':
                return "<DateTimeInterface>";
            case 'blob':
                return "<binary string>";
            default:
                return $value;
        }
    }

    private function structure(StructureShape $shape, $value, $indent, $path, $comments)
    {
        if (!self::isTraversableShapeValue($value)) {
            $this->logIssue($shape->getName(), 'Invalid Conversion to Structure');
        }

        $lines = ['['];
        foreach ($value as $key => $val) {
            $path[] = ".{$key}";
            $comment = $this->getCommentFor($path, $comments);
            try {
                $shapeVal = $this->visit($shape->getMember($key), $val, "{$indent}    ", $path, $comments);
            } catch (\InvalidArgumentException $e) {
                $this->logIssue($shape->getName(), 'Example Shape Discrepancy');
                break;
            }
            $lines[] = rtrim("{$indent}    '{$key}' => {$shapeVal}, {$comment}");
            array_pop($path);
        }
        $lines[] = "{$indent}]";
        return implode("\n", $lines);
    }

    private function arr(ListShape $shape, $value, $indent, $path, $comments)
    {
        if (!self::isTraversableShapeValue($value)) {
            $this->logIssue($shape->getName(), 'Invalid Conversion to Array');
        }

        $lines = ['['];
        foreach ($value as $ind => $val) {
            $path[] = "[{ind}]";
            $comment = $this->getCommentFor($path, $comments);
            $shapeVal = $this->visit($shape->getMember(), $val, "{$indent}    ", $path, $comments);
            $lines[] = rtrim("{$indent}    {$shapeVal}, {$comment}");
            array_pop($path);
        }
        $lines[] = "{$indent}]";
        
        return implode("\n", $lines);
    }

    private function map(MapShape $shape, $value, $indent, $path, $comments)
    {
        if (!self::isTraversableShapeValue($value)) {
            $this->logIssue($shape->getName(), 'Invalid Conversion to Map');
        }

        $lines = ['['];
        foreach ($value as $key => $val) {
            $path[] = ".{$key}";
            $comment = $this->getCommentFor($path, $comments);
            $shapeVal = $this->visit($shape->getValue(), $val, "{$indent}    ", $path, $comments);
            $lines[] = rtrim("{$indent}    '{$key}' => {$shapeVal}, {$comment}");
            array_pop($path);
        }
        $lines[] = "{$indent}]";

        return implode("\n", $lines);
    }

    private function getCommentFor($path, $comments)
    {
        $key = preg_replace('/^\./', '', implode('', $path));
        if (isset($comments[$key])) {
            return '// ' . $comments[$key];
        } else {
            return '';
        }
    }

    private function isAssociative(array $arr)
    {
        return $arr = array_values($arr);
    }
}
