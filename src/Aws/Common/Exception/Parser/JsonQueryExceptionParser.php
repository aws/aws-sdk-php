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

namespace Aws\Common\Exception\Parser;

use Guzzle\Http\Message\Response;

/**
 * Parses JSON encoded exception responses from query services
 */
class JsonQueryExceptionParser extends AbstractJsonExceptionParser
{
    /**
     * {@inheritdoc}
     */
    protected function doParse(array $data, array $json)
    {
        $parts = explode('#', $json['__type']);
        $data['code'] = isset($parts[1]) ? $parts[1] : $parts[0];
        $data['message'] = $json['message'];

        return $data;
    }
}
