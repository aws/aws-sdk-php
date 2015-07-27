<?php
namespace Aws\Build\Docs;

/**
 * @internal
 */
class SharedExampleBuilder
{
    private $isInput;
    private $params;
    private $operation;
    private $comments;

    public function __construct($params, $operation, $comments, $isInput = true)
    {
        $this->isInput = $isInput;
        $this->params = $params;
        $this->operation = $operation;
        $this->comments = $comments;
    }

    public function getCode()
    {
        if ($this->isInput) {
            $code = '$result = $client->'
                . lcfirst($this->operation)
                . '('
                . $this->visit($this->params, '', [])
                . ');';
        } else {
            $code = $this->visit($this->params, '', []);
        }

        return $code;
    }

    private function visit($value, $indent, $path)
    {
        switch (gettype($value)) {
            case 'array':
                if ($this->isAssociative($value)) {
                    return $this->object($value, $indent, $path);
                } else {
                    return $this->arr($value, $indent, $path);
                }
            case 'string':
                return "'{$value}'";
            default:
                return $value;
        }
    }

    private function object($value, $indent, $path)
    {
        $lines = ['['];
        foreach ($value as $key => $val) {
            $path[] = ".{$key}";
            $comment = $this->applyComment($path);
            $shapeVal = $this->visit($val, "{$indent}    ", $path);
            $lines[] = "{$indent}    '{$key}' => {$shapeVal}, {$comment}";
            array_pop($path);
        }
        $lines[] = "{$indent}]";

        return implode("\n", $lines);
    }

    private function arr($value, $indent, $path)
    {
        $lines = ['['];
        foreach ($value as $ind => $val) {
            $path[] = "[{ind}]";
            $comment = $this->applyComment($path);
            $shapeVal = $this->visit($val, "{$indent}    ", $path);
            $lines[] = "{$indent}    {$shapeVal}, {$comment}";
            array_pop($path);
        }
        $lines[] = "{$indent}]";
        
        return implode("\n", $lines);
    }

    private function applyComment($path)
    {
        $key = preg_replace('/^\./', '', implode('', $path));
        if (!empty($this->comments) && isset($this->comments[$key])) {
            return '// ' . $this->comments[$key];
        } else {
            return '';
        }
    }

    private function isAssociative($arr)
    {
        reset($arr);
        return !is_int(key($arr));
    }
}
