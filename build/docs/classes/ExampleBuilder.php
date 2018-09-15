<?php
namespace Aws\Build\Docs;

/**
 * @internal
 */
class ExampleBuilder
{
    private $buffer;
    private $operation;
    private $skipLevel;
    private $tabLevel;
    private $isInput;

    public function __construct($operation, $isInput = true)
    {
        $this->buffer = '';
        $this->operation = $operation;
        $this->skipLevel = 0;
        $this->tabLevel = 1;
        $this->isInput = $isInput;
    }

    public function getCode()
    {
        if ($this->isInput) {
            $code = '$result = $client->'
                . lcfirst($this->operation)
                . "([\n{$this->buffer}]);\n";
        } else {
            $code = "[\n{$this->buffer}]";
        }

        return str_replace("\t", '    ', $code);
    }

    public function addShape(array $shape)
    {
        // Handle skips and closers
        if ($this->skipLevel) {
            $this->skipLevel--;
            return;
        } elseif ($shape['name'] === 'closer') {
            if ($shape['type'] === 'list' || $shape['type'] === 'map') {
                $this->buffer .= $this->tab() . "// ...\n";
            }
            $this->tabLevel--;
            $this->buffer .= $this->tab() . "],\n";
            return;
        }

        // Write the parameter key.
        $this->buffer .= $this->tab();
        if ($shape['param'] !== '<index>') {
            $this->buffer .= "{$shape['param']} => ";
        }

        // Write the parameter value.
        if ($shape['complex']) {
            if ($shape['recursive']) {
                $this->buffer .= "[...],";
            } elseif (!in_array($shape['complex'], ['structure', 'list', 'map', 'mixed'])) {
                $this->buffer .= "[" . $this->getSimpleValue(['type' => $shape['complex']]) . ", ...],";
                $this->skipLevel += 2;
            } else {
                $this->buffer .= "[";
                $this->tabLevel++;
            }
        } else {
            $this->buffer .= $this->getSimpleValue($shape) . ",";
        }

        $this->buffer .= $this->getTags($shape);

        $this->buffer .= "\n";
    }

    private function getSimpleValue(array $shape)
    {
        switch ($shape['type']) {
            case 'integer':
                return '<integer>';
            case 'string':
                return isset($shape['enum'])
                    ? "'" . implode('|', $shape['enum']) . "'"
                    : "'<string>'";
            case 'boolean':
                return 'true || false';
            case 'stream':
                return '<string || resource || Psr\\Http\\Message\\StreamInterface>';
            case 'timestamp':
                return $this->isInput
                    ? '<integer || string || DateTime>'
                    : '<DateTime>';
            case 'float':
                return '<float>';
            default:
                return '<value>';
        }
    }

    private function getTags(array $shape)
    {
        $tags = [];
        if ($this->isInput && $shape['required']) {
            $tags[] = 'REQUIRED';
        }
        if ($shape['recursive']) {
            $tags[] = 'RECURSIVE';
        }
        if (!empty($shape['eventstream'])) {
            $tags[] = 'EventParsingIterator';
        }

        return $tags ? ' // ' . implode(', ', $tags) : '';
    }

    private function tab()
    {
        return str_repeat("\t", $this->tabLevel);
    }
}
