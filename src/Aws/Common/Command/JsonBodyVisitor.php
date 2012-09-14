<?php

namespace Aws\Common\Command;

use Aws\Common\ToArrayInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\LocationVisitor\JsonBodyVisitor as ParentJson;
use Guzzle\Service\Description\ApiParam;

/**
 * Adds AWS JSON bodies that can contain nested ToArrayInterface objects
 */
class JsonBodyVisitor extends ParentJson
{
    /**
     * @var self Instance of the visitor
     */
    protected static $instance;

    /**
     * Get an instance of the visitor
     *
     * @return self
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * {@inheritdoc}
     */
    public function visit(ApiParam $param, RequestInterface $request, $value)
    {
        $json = isset($this->data[$request]) ? $this->data[$request] : array();

        if ($value instanceof ToArrayInterface) {
            $value = $value->toArray();
        }

        $json[$param->getLocationKey() ?: $param->getName()] = $param && is_array($value)
            ? $this->resolveRecursively($value, $param)
            : $value;

        $this->data[$request] = $json;
    }

    /**
     * Map nested parameters into the location_key based parameters
     *
     * @param array    $value Value to map
     * @param ApiParam $param Parameter that holds information about the current key
     *
     * @return array Returns the mapped array
     */
    protected function resolveRecursively(array $value, ApiParam $param)
    {
        foreach ($value as $name => $v) {
            if ($sub = $param->getProperty($name)) {
                $key = $sub->getLocationKey() ?: $name;
                if ($v instanceof ToArrayInterface) {
                    $value[$sub->getLocationKey() ?: $name] = $this->resolveRecursively($v->toArray(), $sub);
                } elseif (is_array($v)) {
                    $value[$sub->getLocationKey() ?: $name] = $this->resolveRecursively($v, $sub);
                } elseif ($name != $key) {
                    $value[$sub->getLocationKey() ?: $name] = $v;
                    unset($value[$name]);
                }
            } elseif ($v instanceof ToArrayInterface) {
                $value[$name] = $v->toArray();
            }
        }

        return $value;
    }
}
