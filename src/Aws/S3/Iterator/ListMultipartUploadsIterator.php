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

use Guzzle\Service\Resource\Model;

/**
 * Iterate over a ListMultipartUploads command
 *
 * This iterator includes the following additional options:
 * @option bool return_prefixes Set to true to return both prefixes and uploads
 */
class ListMultipartUploadsIterator extends AbstractS3ResourceIterator
{
    protected static $limitParam = 'MaxUploads';

    /**
     * {@inheritdoc}
     */
    protected function handleResults(Model $result)
    {
        // Get the list of uploads
        $uploads = $result['Uploads'];

        // If there are prefixes and we want them, merge them in
        if ($this->get('return_prefixes') && $result['CommonPrefixes']) {
            $uploads = array_merge($uploads, $result['CommonPrefixes']);
        }

        return $uploads;
    }

    /**
     * {@inheritdoc}
     */
    protected function determineNextToken(Model $result)
    {
        $this->nextToken = false;
        if ($result['IsTruncated']) {
            $this->nextToken = array(
                'KeyMarker'      => $result['NextKeyMarker'],
                'UploadIdMarker' => $result['NextUploadIdMarker']
            );
        }
    }
}
