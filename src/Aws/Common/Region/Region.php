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

namespace Aws\Common\Region;

/**
 * Data access object encapsulating AWS region information
 */
class Region
{
    /**
     * @var string The name of the region (e.g. us-east-1)
     */
    protected $name;

    /**
     * Create a new Region object
     *
     * @param string $name Name of the region
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Convert to a string representing the region name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get the name of the region (e.g. us-west-1)
     */
    public function getName()
    {
        return $this->name;
    }
}
