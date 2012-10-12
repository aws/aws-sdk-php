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
 * Iterate over a ListObjects command
 *
 * This iterator includes the following additional options:
 * @option bool return_prefixes Set to true to receive both prefixes and objects in results
 * @option bool sort_results    Set to true to sort mixed (object/prefix) results
 * @option bool names_only      Set to true to receive only the object/prefix names
 */
class ListObjectsIterator extends AbstractS3ResourceIterator
{
    /**
     * @var string The last key in the objects returned which can be used for the next token
     */
    protected $lastKey;

    /**
     * {@inheritdoc}
     */
    protected function handleResults(Model $result)
    {
        // Get the list of objects and find the last key
        $objects = (array) $result['Contents'];
        $numObjects = count($objects);
        $this->lastKey = $numObjects ? $objects[$numObjects - 1]['Key'] : false;

        // Closure for getting the name of an object or prefix
        $getName = function ($object) {
            return isset($object['Key']) ? $object['Key'] : $object['Prefix'];
        };

        // If there are common prefixes returned (i.e. a delimiter was set)
        // and we care about them, then there is some additional work to do
        if ($this->get('return_prefixes') && $result['CommonPrefixes']) {
            // Collect and format the prefixes to include with the objects
            $objects = array_merge($objects, $result['CommonPrefixes']);

            //Sort the objects and prefixes to maintain alphabetical order,
            //but only if some of each were returned
            if ($this->get('sort_results') && $this->lastKey && $objects) {
                usort($objects, function ($object1, $object2) use ($getName) {
                    return strcmp($getName($object1), $getName($object2));
                });
            }
        }

        // If only the names are desired, iterate through the results and
        // convert the arrays to the object/prefix names
        if ($this->get('names_only')) {
            $objects = array_map($getName, $objects);
        }

        return $objects;
    }

    /**
     * {@inheritdoc}
     */
    protected function determineNextToken(Model $result)
    {
        $this->nextToken = false;
        if ($result['IsTruncated']) {
            // Note: NextMarker is only available when a delimiter was specified
            $nextMarker = $result['NextMarker'];
            if ($nextMarker || $this->lastKey) {
                $this->nextToken = array('Marker' => $nextMarker ?: $this->lastKey);
            }
        }
    }
}
