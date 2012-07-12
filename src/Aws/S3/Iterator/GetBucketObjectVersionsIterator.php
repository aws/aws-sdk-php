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
 * Iterate over a GetBucketObjectVersions command
 *
 * This iterator includes the following additional options:
 * @option bool return_prefixes Set to true to receive both prefixes and versions in results
 */
class GetBucketObjectVersionsIterator extends AbstractS3ResourceIterator
{
    /**
     * {@inheritdoc}
     */
    protected function handleResults($result)
    {
        // Format the result
        $result = $this->formatResult($result, array(
            'Version', 'DeleteMarker', 'CommonPrefixes'
        ));

        // Get the list of object versions
        $versions = array_merge($result['Version'], $result['DeleteMarker']);

        // If there are prefixes and we want them, merge them in
        if ($this->get('return_prefixes') && $result['CommonPrefixes']) {
            $versions = array_merge($versions, $result['CommonPrefixes']);
        }

        return $versions;
    }

    /**
     * {@inheritdoc}
     */
    protected function determineNextToken($result)
    {
        $this->nextToken = false;
        if ((string) $result->IsTruncated === 'true') {
            $this->nextToken = array(
                'key-marker'        => (string) $result->nextKeyMarker,
                'version-id-marker' => (string) $result->nextVersionIdMarker
            );
        }
    }
}
