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

namespace Aws\DynamoDb\Enum;

use Aws\Common\Enum;

/**
 * Contains enumerable DynamoDB condition values
 */
class Conditions extends Enum
{
    const EQ           = 'EQ';
    const NE           = 'NE';
    const LT           = 'LT';
    const LE           = 'LE';
    const GT           = 'GT';
    const GE           = 'GE';
    const NULL         = 'NULL';
    const NOT_NULL     = 'NOT_NULL';
    const CONTAINS     = 'CONTAINS';
    const NOT_CONTAINS = 'NOT_CONTAINS';
    const BEGINS_WITH  = 'BEGINS_WITH';
    const IN           = 'IN';
    const BETWEEN      = 'BETWEEN';
}
