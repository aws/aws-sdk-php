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
 * Class representing a DynamoDB key
 */
class Key extends AbstractToArray
{
    /**
     * @param mixed $hashKey  Hash key element value, or a raw key array
     * @param mixed $rangeKey Optional range key element value
     */
    public function __construct($hashKey, $rangeKey = null)
    {
        // Marshall a raw key back into attributes
        if (is_array($hashKey) && isset($hashKey['HashKeyElement'])) {
            $rangeKey = isset($hashKey['RangeKeyElement']) ? $hashKey['RangeKeyElement'] : null;
            $hashKey  = new Attribute(current($hashKey['HashKeyElement']), key($hashKey['HashKeyElement']));

            if ($rangeKey) {
                $rangeKey = new Attribute(current($rangeKey), key($rangeKey));
            }
        }

        // Set the keys (will use the Attribute factory)
        $this->setHashKey($hashKey);
        if ($rangeKey) {
            $this->setRangeKey($rangeKey);
        }
    }

    /**
     * Get the hash key element value
     *
     * @return mixed
     */
    public function getHashKey()
    {
        return isset($this['HashKeyElement']) ? $this['HashKeyElement']->getValue() : null;
    }

    /**
     * Get the range key element value
     *
     * @return mixed
     */
    public function getRangeKey()
    {
        return isset($this['RangeKeyElement']) ? $this['RangeKeyElement']->getValue() : null;
    }

    /**
     * Set the hash key element value
     *
     * @param mixed $hashKey Hash key
     *
     * @return self
     */
    public function setHashKey($hashKey)
    {
        $this['HashKeyElement'] = Attribute::factory($hashKey);

        return $this;
    }

    /**
     * Set the range key element value
     *
     * @param mixed $rangeKey Range key
     *
     * @return self
     */
    public function setRangeKey($rangeKey)
    {
        $this['RangeKeyElement'] = Attribute::factory($rangeKey);

        return $this;
    }
}
