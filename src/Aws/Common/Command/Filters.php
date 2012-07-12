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

namespace Aws\Common\Command;

/**
 * Filters for service descriptions
 */
class Filters
{
    /**
     * Convert a value to a boolean string of "true" or "false"
     *
     * @param mixed $value Value to convert
     *
     * @return string
     */
    public static function booleanString($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';
    }

    /**
     * Convert a boolean string to a boolean
     *
     * @param mixed $value Value to convert
     *
     * @return bool
     */
    public static function stringBoolean($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Returns a timestamp for a strtotime string or passes a value through
     * if it is an integer
     *
     * @param mixed $time Time to convert to a timestamp
     *
     * @return int
     */
    public static function getTimestamp($time)
    {
        if (!is_numeric($time)) {
            $time = strtotime($time);
        }

        return $time;
    }
}
