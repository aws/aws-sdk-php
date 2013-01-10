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
 * Data access object encapsulating AWS service information
 */
class Service
{
    /**
     * @var string Full name of the service (e.g. AWS Security Token Service)
     */
    protected $fullName;

    /**
     * @var string Name of the service
     */
    protected $name;

    /**
     * Create a new Service object
     *
     * @param string $name     Name of the service (e.g. us-west-1)
     * @param string $fullName Full name of the service (e.g. Amazon Simple Storage Service)
     */
    public function __construct($name, $fullName)
    {
        $this->name = $name;
        $this->fullName = $fullName;
    }

    /**
     * Convert to a string representing the service name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get the name of the service
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the full name of the service
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }
}
