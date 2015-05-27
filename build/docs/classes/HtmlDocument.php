<?php
namespace Aws\Build\Docs;

/**
 * @internal
 */
class HtmlDocument
{
    /** @var array */
    private $lines;

    /** @var int */
    private $currentLine;

    /** @var \SplStack */
    private $stack;

    public function __construct()
    {
        $this->lines = [];
        $this->currentLine = 0;
        $this->stack = new \SplStack();
    }

    public function render($baseTabLevel = 0)
    {
        return implode("\n", array_map(function ($line) use ($baseTabLevel) {
            return str_repeat("\t", $baseTabLevel) . $line;
        }, $this->lines));
    }

    public function section($num, $text, $anchorPrefix = null, $class = null)
    {
        $anchor = $this->slug($anchorPrefix . '-' . $text);
        $link = ' <a href="#' . $anchor . '" class="anchor-link">' . $this->glyph('link') . '</a>';
        $attrs = ['id' => $anchor];
        if ($class) {
            $attrs['class'] = $class;
        }
        $this->elem("h{$num}", $attrs, $text . $link);

        return $this;
    }

    public function open($tag, $attr = null)
    {
        $startingLine = $this->currentLine;
        $this->elem($tag, $attr);
        $this->stack->push([$tag, $startingLine]);

        return $this;
    }

    public function close($collapse = false)
    {
        list($tag, $startLine) = $this->stack->pop();
        $this->lines[$this->currentLine++] = $this->getTab() . '</' . $tag . '>';

        if ($collapse) {
            $this->lines[$startLine] = $this->lines[$startLine] . implode('', array_map('trim',
                array_slice($this->lines, $startLine + 1, $this->currentLine - $startLine + 1)
            ));
            $this->currentLine = $startLine + 1;
            for ($i = $this->currentLine; isset($this->lines[$i]); $i++) {
                unset($this->lines[$i]);
            }
        }

        return $this;
    }

    public function elem($tag, $attr = null, $content = null)
    {
        $attr = $attr
            ? (is_string($attr) ? ['class' => $attr] : (array) $attr)
            : [];

        $buffer = $this->getTab() . '<' . $tag;
        foreach ($attr as $k => $v) {
            $buffer .= ' ' . $k . '="' . $v . '"';
        }
        $buffer .= '>';

        if ($content !== null) {
            $buffer .= $content . '</' . $tag . '>';
        }

        $this->lines[$this->currentLine++] = $buffer;

        return $this;
    }

    public function slug($text)
    {
        $sanitized = preg_replace('/[^A-Za-z0-9-]/', '', strip_tags($text));

        return strtolower(str_replace(' ', '-', trim($sanitized, ' -')));
    }

    public function glyph($type)
    {
        return '<span class="glyphicon glyphicon-' . $type . '"></span>';
    }

    public function append(HtmlDocument $html)
    {
        $this->lines = array_merge($this->lines, $html->lines);
        $this->currentLine += count($html->lines);

        return $this;
    }

    private function getTab()
    {
        return str_repeat("\t", count($this->stack));
    }
}
