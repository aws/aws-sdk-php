<?php

namespace Aws\Common\Command;

use Aws\Common\ToArrayInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\LocationVisitor\JsonBodyVisitor as ParentJson;

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
    public function visit(CommandInterface $command, RequestInterface $request, $key, $value)
    {
        $json = isset($this->data[$command]) ? $this->data[$command] : array();

        // Account for the fact that PHP 5.3 does not have JsonSerializable
        // We may remove the ToArrayInterface in the future and just rely
        // on JsonSerializable.
        if ($value instanceof ToArrayInterface) {
            $value = $value->toArray();
        } elseif (is_array($value)) {
            // Convert nested ToArray objects
            array_walk_recursive($value, function (&$value) {
                if ($value instanceof ToArrayInterface) {
                    $value = $value->toArray();
                }
            });
        }

        $json[$key] = $value;
        $this->data[$command] = $json;
    }
}
