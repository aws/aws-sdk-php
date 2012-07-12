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

/**
 * Iterate over a ListParts command
 */
class ListPartsIterator extends AbstractS3ResourceIterator
{
    protected static $limitParam = 'max-parts';

    /**
     * {@inheritdoc}
     */
    protected function handleResults($result)
    {
        $result = $this->formatResult($result, array('Part'));
        return $result['Part'];
    }

    /**
     * {@inheritdoc}
     */
    protected function determineNextToken($result)
    {
        $this->nextToken = false;
        if ((string) $result->IsTruncated === 'true') {
            $this->nextToken = array(
                'part-number-marker' => (string) $result->NextPartNumberMarker
            );
        }
    }
}
