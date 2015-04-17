<?php
namespace Aws\Build\Docs;

/**
 * Builds HTML for operation input and output parameters.
 */
class ParameterHtmlBuilder
{
    private $html;
    private $operation;
    private $skipLevel;
    private $isInput;

    public function __construct($operation, $isInput = true)
    {
        $this->html = new HtmlDocument();
        $this->operation = $operation;
        $this->skipLevel = 0;
        $this->isInput = $isInput;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function addShape(array $shape)
    {
        // Handle skips and closers
        if ($this->skipLevel) {
            $this->skipLevel--;
            return;
        } elseif ($shape['name'] === 'closer') {
            $this->html->close();
            $this->html->close();
            $this->html->close();
            return;
        }

        // Write the parameter key.
        $this->html->open('li', 'parameter');
        $this->html->open('div', $shape['complex'] ? 'notlast' : 'last');

        $key = htmlentities($shape['param'] . ' => ' . $this->getTypeLabel($shape));
        $this->html->open('div', ['class' => 'param-name', 'id' => $this->getPathAnchor($shape['path'])]);
        $this->html->elem('span', 'param-title', $key);
        if ($this->isInput && $shape['required']) {
            $this->html->elem('span', 'required label label-danger', 'required');
        }
        $this->html->close(true);

        $this->addConstraintHtml($shape);

        if ($shape['docs']) {
            $this->html->elem('div', 'param-docs', $shape['docs']);
        }

        // Write the parameter value.
        if (!$shape['complex']) {
            $this->html->close();
        } elseif ($shape['recursive']) {
            $path = implode('.', $shape['recursive']);
            $this->html->elem('div', 'alert alert-warning', '<strong>This '
                . 'is a recursive parameter.</strong> Click <a href="#'
                . $this->getPathAnchor($path) . '">here</a> to jump back to'
                . ' <code>' . htmlentities($path) . '</code>.');
            $this->html->close();
        } elseif (!in_array($shape['complex'], ['structure', 'list', 'map', 'mixed'])) {
            $this->skipLevel += 2;
            $this->html->close();
        } else {
            $this->html->open('ul', 'complex-shape');
        }
    }

    private function getPathAnchor($path)
    {
        if (is_array($path)) {
            $path = implode('', $path);
        }
        $path = strtr($path, ['<' => '', '>' => '']);

        return $this->html->slug($this->operation . '-' . $path);
    }

    private function getEnumConstraint(array $shape)
    {
        $values = array_map(
            function ($v) { return "<em>{$v}</em>"; },
            $shape['enum']
        );
        $last = array_pop($values);
        $comma = count($values) > 1 ? ',' : '';
        $content = implode(', ', $values) . $comma . ' or ' . $last;

        return "The value must be one of the following: {$content}.";
    }

    private function addMinMaxConstraint(array $shape)
    {
        if ($shape['type'] === 'integer') {
            $message = ['be', '>= %s', '<= %s'];
        } elseif ($shape['type'] === 'string' || $shape['type'] === 'stream') {
            $message = ['have', 'a minimum length of %s', 'a maximum length of %s'];
        } elseif ($shape['type'] === 'list' || $shape['type'] === 'map') {
            $message = ['have', 'at least %s item%s', 'at most %s items'];
        } else {
            throw new \UnexpectedValueException('Type ' . $shape['type'] . ' not handled for min/max constraints.');
        }

        $content = $message[0];
        if (isset($shape['min'])) {
            $content .= ' '
                . sprintf($message[1], $shape['min'], ($shape['min'] > 1) ? 's' : '')
                . (isset($shape['max']) ? ' and' : '');
        }
        if (isset($shape['max'])) {
            $content .= ' ' . sprintf($message[2], $shape['max']);
        }

        return "The value must {$content}.";
    }

    private function getTypeLabel($shape)
    {
        if (!is_array($shape)) {
            $shape = ['type' => $shape, 'complex' => null];
        }

        switch ($shape['type']) {
            case 'structure':
                return ($shape['complex']) ? 'array<string, mixed>' : 'array';
            case 'map':
                $type = 'array';
                if ($subType = $shape['complex']) {
                    $subType = $this->getTypeLabel($subType);
                    $type .= "<string, {$subType}>";
                }
                return $type;
            case 'list':
                $type = 'array';
                if ($subType = $shape['complex']) {
                    $subType = $this->getTypeLabel($subType);
                    $type .= "<{$subType}>";
                }
                return $type;
            case 'timestamp':
                return 'string|int|\\DateTime';
            case 'stream':
                return 'Psr\\Http\\Message\\StreamInterface';
            default:
                return $shape['type'];
        }
    }

    private function addConstraintHtml($shape)
    {
        $constraints = [];
        if (is_array($shape['enum'])) {
            $constraints[] = $this->getEnumConstraint($shape);
        }

        if ($shape['min'] || $shape['max']) {
            $constraints[] = $this->addMinMaxConstraint($shape);
        }

        if ($constraints) {
            $constraintHtml = '<ul>';
            foreach ($constraints as $c) {
                $constraintHtml .= '<li>' . $c . '</li>';
            }
            $constraintHtml .= '</ul>';
            $this->html->elem('div', 'param-constraints', $constraintHtml);
        }
    }
}
