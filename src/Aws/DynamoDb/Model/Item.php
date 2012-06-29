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

/**
 * Amazon DynamoDB item model
 */
class Item implements ToArrayInterface, \ArrayAccess, \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * @var string
     */
    protected $tableName;

    /**
     * Create an item from a simplified array
     *
     * @param array  $attributes Array of attributes
     * @param string $tableName  Name of the table associated with the item
     *
     * @return self
     */
    public static function fromArray(array $attributes, $tableName = null)
    {
        foreach ($attributes as $key => &$value) {
            $value = Attribute::factory($value);
        }

        return new self($attributes, $tableName);
    }

    /**
     * Construct a new Item
     *
     * @param array  $attributes Array of attributes
     * @param string $tableName  Table of the item (if known)
     */
    public function __construct(array $attributes = array(), $tableName = null)
    {
        $this->replace($attributes);
        $this->tableName = $tableName;
    }

    /**
     * Set the name of the table associated with the item
     *
     * @param string $tableName Table name
     *
     * @return self
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get the name of the table associated with the item
     *
     * @return string|null
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Get an attribute object by name
     *
     * @param string $name Name of the attribute to retrieve
     *
     * @return Attribute|null
     */
    public function get($name)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }
    }

    /**
     * Get all of the attribute names of the item
     *
     * @return array
     */
    public function keys()
    {
        return array_keys($this->attributes);
    }

    /**
     * Check if a particular attribute exists on the item
     *
     * @param string $attribute Attribute name to check
     *
     * @return bool
     */
    public function has($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    /**
     * Get all of the {@see Attribute} objects
     *
     * @return array
     */
    public function all()
    {
        return $this->attributes;
    }

    /**
     * Add an attribute
     *
     * @param string    $name      Name of the attribute to add
     * @param Attribute $attribute Attribute to add
     *
     * @return self
     */
    public function add($name, Attribute $attribute)
    {
        $this->attributes[$name] = $attribute;

        return $this;
    }

    /**
     * Set all of the attributes
     *
     * @param array $attributes Array of {@see Attribute} objects
     *
     * @return self
     */
    public function replace(array $attributes)
    {
        foreach ($attributes as $name => $attribute) {
            if (!($attribute instanceof Attribute)) {
                $attribute = new Attribute(current($attribute), key($attribute));
            }
            $this->add($name, $attribute);
        }

        return $this;
    }

    /**
     * Remove an attribute by name
     *
     * @param string $name Name of the attribute to remove
     *
     * @return self
     */
    public function remove($name)
    {
        unset($this->attributes[$name]);

        return $this;
    }

    /**
     * Check if the item has a specific attribute
     *
     * @param string $offset Name of the attribute
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * Set an attribute by name
     *
     * @param string|Attribute $offset Name of the attribute to retrieve
     * @param mixed            $value  Value to set
     */
    public function offsetSet($offset, $value)
    {
        if (!($value instanceof Attribute)) {
            $value = Attribute::factory($value);
        }

        $this->add($offset, $value);
    }

    /**
     * Remove an attribute from the item
     *
     * @param string $offset Name of the attribute to remove
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * Get an attribute value by name
     *
     * @param string $offset Name of the attribute to retrieve
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        if (isset($this->attributes[$offset])) {
            return $this->attributes[$offset]->getValue();
        }
    }

    /**
     * Get the total number of attributes
     *
     * @return int
     */
    public function count()
    {
        return count($this->attributes);
    }

    /**
     * Get an {@see ArrayIterator} object that allows iteration over each
     * attribute
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $item = array();

        /* @var $attribute Attribute */
        foreach ($this->attributes as $name => $attribute) {
            $item[$name] = $attribute->toArray();
        }

        return $item;
    }
}
