<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\DynamoDb\Iterator;

/**
 * Converts items to a simple hash format before yielding
 */
class ItemIterator extends \IteratorIterator
{
    /**
     * Creates an ItemIterator from an array (instead of an iterator) of items
     *
     * @param array $items
     *
     * @return ItemIterator
     */
    public static function fromArray(array $items)
    {
        return new ItemIterator(new \ArrayIterator($items));
    }

    /**
     * An item is a hash of hashes, but this method converts the item to a simple hash
     * {@inheritdoc}
     */
    public function current()
    {
        return array_map('current', parent::current());
    }
}
