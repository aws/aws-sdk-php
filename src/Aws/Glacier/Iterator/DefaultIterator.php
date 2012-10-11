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

namespace Aws\Glacier\Iterator;

use Aws\Common\Iterator\AbstractResourceIterator;
use Guzzle\Service\Resource\Model;

/**
 * Iterate over a Glacier command
 */
class DefaultIterator extends AbstractResourceIterator
{
    protected static $resultKeyMap = array(
        'ListJobs'             => 'JobList',
        'ListMultipartUploads' => 'UploadsList',
        'ListParts'            => 'Parts',
        'ListVaults'           => 'VaultList'
    );

    /**
     * {@inheritdoc}
     */
    protected function prepareRequest()
    {
        // If both a limiting parameter of a command and a iterator page size are specified, use the smaller of the two
        $pageSize = $this->calculatePageSize();
        $limit = $this->command->get('limit');
        if ($limit && $pageSize) {
            $this->command->set('limit', min($pageSize, $limit));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function handleResults(Model $result)
    {
        // Look at the correct key based on the command name
        $resultKey = self::$resultKeyMap[$this->command->getName()];
        return $result->get($resultKey) ?: array();
    }

    /**
     * {@inheritdoc}
     */
    protected function applyNextToken()
    {
        $this->command->set('marker', $this->nextToken);
    }

    /**
     * {@inheritdoc}
     */
    protected function determineNextToken(Model $result)
    {
        $this->nextToken = $result->get('Marker');
    }
}
