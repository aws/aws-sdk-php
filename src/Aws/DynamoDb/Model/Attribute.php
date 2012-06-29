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

use Aws\Common\ToArrayInterface;
use Aws\DynamoDb\Enum\Types;
use Aws\Common\Exception\InvalidArgumentException;

/**
 * Class representing a DynamoDB item attribute. Contains helpers for building
 * attributes and arrays of attributes.
 */
class Attribute implements ToArrayInterface
{
    const FORMAT_PUT = 'put';
    const FORMAT_UPDATE = 'update';
    const FORMAT_EXPECTED = 'expected';

    /**
     * @var string The DynamoDB attribute type (e.g. N, S, NS, SS).
     */
    protected $type;

    /**
     * @var string|array The DynamoDB attribute value.
     */
    protected $value;

    /**
     * Creates a DynamoDB attribute, validates it, and prepares the type and
     * value. Some objects can be used as values as well. If the object has a
     * __toString method or implements the Traversable interface, it can be
     * converted to a string or array, respectively.
     *
     * @param mixed $value The DynamoDB attribute value
     * @param int $depth A variable used internally to keep track of recursion
     * depth of array processing
     *
     * @return Attribute
     * @throws InvalidArgumentException
     */
    public static function factory($value, $depth = 0)
    {
        // Do some validation on the value up-front
        if ($value instanceof self) {
            return $value;
        } elseif ($depth > 1) {
            throw new InvalidArgumentException('Number and string sets must be at most one level deep.');
        } elseif ($value === null || $value === array() || $value === '') {
            // Empty values are not allowed. Zero and false are OK.
            throw new InvalidArgumentException('The value must not be semantically empty.');
        } elseif (is_resource($value)) {
            throw new InvalidArgumentException('The value must be able to be converted to string or array.');
        } elseif (is_object($value) && !method_exists($value, '__toString') && !$value instanceof \Traversable) {
            throw new InvalidArgumentException('The value must be able to be converted to string or array.');
        }

        // Create the attribute to return
        if (is_int($value) || is_float($value)) {
            // Handle numeric values
            $attribute = new Attribute((string) $value, Types::NUMBER);
        } elseif (is_bool($value)) {
            // Handle boolean values
            $attribute = new Attribute($value ? '1' : '0', Types::NUMBER);
        } elseif (is_array($value) || $value instanceof \Traversable) {
            // Handle arrays
            $setType = null;
            $attribute = new Attribute(array());

            // Loop through each value to analyze and prepare it
            foreach ($value as $subValue) {
                // Recursively get the attribute for the set. The depth param only allows one level of recursion
                $subAttribute = static::factory($subValue, $depth + 1);

                // The type of each sub-value must be the same, or else the whole array is invalid
                if ($setType === null) {
                    $setType = $subAttribute->type;
                } elseif ($setType !== $subAttribute->type) {
                    throw new InvalidArgumentException('The set did not contain values of a uniform type.');
                }

                // Save the value for the upstream array
                $attribute->value[] = (string) $subAttribute->value;
            }

            // Make sure the type is changed to be the appropriate array type
            $attribute->type = (Types::STRING === $setType) ? Types::STRING_SET : Types::NUMBER_SET;
        } else {
            $attribute = new Attribute((string) $value);
        }

        return $attribute;
    }

    /**
     * Instantiates a DynamoDB attribute.
     *
     * @param string|array $value The DynamoDB attribute value
     * @param string $type The DynamoDB attribute type (N, S, NS, SS)
     * @throws InvalidArgumentException
     */
    public function __construct($value, $type = Types::STRING)
    {
        if (!is_string($value) && !is_array($value)) {
            throw new InvalidArgumentException('An attribute value may only be a string or array.');
        } elseif (!in_array($type, Types::values())) {
            throw new InvalidArgumentException('An attribute type must be a valid DynamoDB type.');
        }

        $this->value = $value;
        $this->type = $type;
    }

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
     * Returns the attribute formatted in the DynamoDB-specific array format.
     *
     * @param string $format Format of the attribute
     *
     * @return array
     */
    public function getFormatted($format = self::FORMAT_PUT)
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
     * Returns the attribute type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the attribute value.
     *
     * @return array|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->getFormatted();
    }
}
