<?php
namespace Aws\Build\Docs;

/**
 * @internal
 */
class EventStreamExampleBuilder
{
    private $buffer;
    private $shapeName;
    private $skipLevel;
    private $elseRequired;
    private $closed;
    private $tabLevel;

    public function __construct($shapeName)
    {
        $this->buffer = '';
        $this->shapeName = $shapeName;
        $this->skipLevel = 0;
        $this->elseRequired = false;
        $this->closed = true;
        $this->tabLevel = 1;
    }

    public function getCode()
    {
        $code = 'foreach($result[' . $this->shapeName . '] as $event) {' . "\n";
        $code .= $this->buffer;
        $code .= "\n}";

        return str_replace("\t", '    ', $code);
    }

    public function addShape(array $shape)
    {
        if ($this->tabLevel === 1
            && !empty($shape['param'])
            && $shape['param'] === $this->shapeName
        ) {
            $this->closed = false;
            return;
        }
        if ($this->closed) {
            return;
        }
        // Handle skips and closers
        if ($shape['name'] === 'closer') {
            $this->tabLevel--;
            if ($this->tabLevel === 2) {
                $this->tabLevel--;
                $this->buffer .= $this->tab() . '}';
                $this->elseRequired = true;
            } else if ($this->tabLevel === 0) {
                $this->closed = true;
            }
            return;
        }

        // Write the parameter key.
        if ($shape['param'] !== '<index>') {
            if ($this->tabLevel === 1) {
                if (!$this->elseRequired) {
                    $this->buffer .= $this->tab();
                } else {
                    $this->buffer .= ' else ';
                }
                $this->buffer .= 'if (isset($event[' . $shape['param'] . '])) {' . "\n";
                $this->tabLevel++;
                $this->buffer .= $this->tab() . '// Handle the ' . $shape['param'] . " event.\n";
            } else {
                $this->elseRequired = false;
            }
        }

        if ($shape['complex']) {
            $this->tabLevel++;
        }
    }

    private function tab()
    {
        return str_repeat("\t", $this->tabLevel);
    }
}
