<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\DynamoDb\Model;

use Aws\Common\AbstractToArray;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\DynamoDb\Enum\Type;

/**
 * Class representing a DynamoDB item attribute. Contains helpers for building
 * attributes and arrays of attributes.
 */
abstract class AbstractAttribute extends AbstractToArray implements AttributeInterface
{
    /**
     * @var string The DynamoDB attribute type (e.g. N, S, B, NS, SS, BS)
     */
    protected $type;

    /**
     * @var string|array The DynamoDB attribute value
     */
    protected $value;

    /**
     * Convert the attribute to a string
     *
     * @return string
     */
    public function __toString()
    {
        return implode(', ', (array) $this->value);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormatted($format = AttributeInterface::FORMAT_PUT)
    {
        switch ($format) {
            case self::FORMAT_EXPECTED:
                // no break
            case self::FORMAT_UPDATE:
                $formatted = array('Value' => array($this->type => $this->value));
                break;
            case self::FORMAT_PUT:
                // no break
            default:
                $formatted = array($this->type => $this->value);
        }

        return $formatted;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        if (in_array($type, Type::values())) {
            $this->type = $type;
        } else {
            throw new InvalidArgumentException('An attribute type must be a valid DynamoDB type.');
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        if (is_string($value) || is_array($value)) {
            $this->value = $value;
        } else {
            throw new InvalidArgumentException('An attribute value may only be a string or array.');
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->getFormatted();
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        $data = $this->getFormatted();

        return isset($data[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        $data = $this->getFormatted();

        return isset($data[$offset]) ? $data[$offset] : null;
    }
}
