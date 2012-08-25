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

use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\ToArrayInterface;

/**
 * Class representing a DynamoDB item attribute. Contains helpers for building
 * attributes and arrays of attributes.
 */
interface AttributeInterface extends ToArrayInterface
{
    /**
     * @var string A constant used to express the attribute be formatted for expected conditions
     */
    const FORMAT_EXPECTED = 'expected';

    /**
     * @var string A constant used to express the attribute be formatted for put operations
     */
    const FORMAT_PUT = 'put';

    /**
     * @var string A constant used to express the attribute be formatted for update operations
     */
    const FORMAT_UPDATE = 'update';

    /**
     * Returns the attribute formatted in the DynamoDB-specific array format
     *
     * @param string $format Format of the attribute
     *
     * @return array
     */
    public function getFormatted($format = AttributeInterface::FORMAT_PUT);

    /**
     * Returns the attribute type
     *
     * @return string
     */
    public function getType();

    /**
     * Returns the attribute value
     *
     * @return array|string
     */
    public function getValue();

    /**
     * Sets the attribute type
     *
     * @param string $type The attribute type
     *
     * @return AttributeInterface
     *
     * @throws InvalidArgumentException if the type is not valid
     */
    public function setType($type);

    /**
     * Sets the attribute value
     *
     * @param string|array $value The attribute value
     *
     * @return AttributeInterface
     *
     * @throws InvalidArgumentException if the type is not a string or array
     */
    public function setValue($value);
}
