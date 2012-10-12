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

namespace Aws\S3\Iterator;

use Aws\Common\Iterator\AbstractResourceIterator;

/**
 * Iterates over a S3 list-style command results
 */
abstract class AbstractS3ResourceIterator extends AbstractResourceIterator
{
    /**
     * @var string Name of the limiting param for the command (e.g. max-keys)
     */
    protected static $limitParam = 'MaxKeys';

    /**
     * {@inheritdoc}
     */
    protected function prepareRequest()
    {
        // If both a limiting parameter of a command and a iterator page size
        // are specified, use the smaller of the two
        $pageSize = $this->calculatePageSize();
        $limit = $this->command->get(self::$limitParam);
        if ($limit && $pageSize) {
            $this->command->set(self::$limitParam, min($pageSize, $limit));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function applyNextToken()
    {
        foreach ((array) $this->nextToken as $key => $value) {
            $this->command->set($key, $value);
        }
    }
}
