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

namespace Aws\DynamoDb\Enum;

use Aws\Common\Enum;

/**
 * Contains enumerable ComparisonOperator values
 */
class ComparisonOperator extends Enum
{
    const EQ = 'EQ';
    const NE = 'NE';
    const LE = 'LE';
    const LT = 'LT';
    const GE = 'GE';
    const GT = 'GT';

    const EQUAL = 'EQ';
    const NOT_EQUAL = 'NE';
    const LESS_THAN_OR_EQUAL = 'LE';
    const LESS_THAN = 'LT';
    const GREATER_THAN_OR_EQUAL = 'GE';
    const GREATER_THAN = 'GT';

    const IN = 'IN';
    const BETWEEN = 'BETWEEN';
    const NOT_NULL = 'NOT_NULL';
    const NULL = 'NULL';
    const CONTAINS = 'CONTAINS';
    const NOT_CONTAINS = 'NOT_CONTAINS';
    const BEGINS_WITH = 'BEGINS_WITH';
}
