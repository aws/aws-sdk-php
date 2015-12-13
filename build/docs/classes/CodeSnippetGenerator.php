<?php
namespace Aws\Build\Docs;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * @internal
 */
class CodeSnippetGenerator
{
    /** @var Service */
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function __invoke($operation, $params, $comments, $isInput = true)
    {
        $messageShape = $isInput
            ? $this->service->getOperation($operation)->getInput()
            : $this->service->getOperation($operation)->getOutput();
        $code = $this->visit($messageShape, $params, '', [], $comments);

        return $isInput
            ? "\$result = \$client->" . lcfirst($operation) . "($code);"
            : $code;
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
        $lines = ['['];
        foreach ($value as $key => $val) {
            $path[] = ".{$key}";
            $comment = $this->getCommentFor($path, $comments);
            $shapeVal = $this->visit($shape->getMember($key), $val, "{$indent}    ", $path, $comments);
            $lines[] = rtrim("{$indent}    '{$key}' => {$shapeVal}, {$comment}");
            array_pop($path);
        }
        $lines[] = "{$indent}]";

        return implode("\n", $lines);
    }

    private function arr(ListShape $shape, $value, $indent, $path, $comments)
    {
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
