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

/**
 * Amazon DynamoDB item model
 */
class Item extends AbstractToArray implements \Countable
{
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
        foreach ($attributes as &$value) {
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
        return $this->offsetGet($name);
    }

    /**
     * Get all of the attribute names of the item
     *
     * @return array
     */
    public function keys()
    {
        return array_keys($this->data);
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
        return $this->offsetExists($attribute);
    }

    /**
     * Get all of the {@see Attribute} objects
     *
     * @return array
     */
    public function all()
    {
        return $this->data;
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
        $this->offsetSet($name, $attribute);

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
        $this->offsetUnset($name);

        return $this;
    }

    /**
     * Get the total number of attributes
     *
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }
}
