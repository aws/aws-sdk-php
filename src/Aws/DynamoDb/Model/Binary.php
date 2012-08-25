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

use Aws\DynamoDb\Enum\Type;

/**
 * Class representing a DynamoDB binary attribute.
 */
class Binary extends AbstractAttribute
{
    /**
     * Instantiates a DynamoDB binary attribute.
     *
     * @param string $value The DynamoDB attribute value
     */
    public function __construct($value)
    {
        $this->setValue($value);
        $this->setType(Type::BINARY);
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        return parent::setValue(base64_encode((string) $value));
    }
}
