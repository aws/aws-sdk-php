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
    protected static $limitParam = 'max-keys';

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
        $token = (array) $this->nextToken;
        foreach ($token as $key => $value) {
            $this->command->set($key, $value);
        }
    }

    /**
     * Converts the SimpleXML results in an array and makes sure that all
     * repeatable elements specified are both set and haven't been collapsed
     *
     * Repeatable elements are specified by name. Deep elements (like Bucket)
     * can be specified as a path with dot notation like "Buckets.Bucket"
     *
     * @param \SimpleXMLElement $result          SimpleXML result
     * @param array             $repeatableNodes Names of repeatable XML nodes
     *
     * @return array
     */
    protected function formatResult(\SimpleXMLElement $result, array $repeatableNodes = array())
    {
        // Convert from XML to array
        $results = json_decode(json_encode($result), true);

        // Make sure repeatable nodes end up as indexed arrays
        foreach ($repeatableNodes as $repeatable) {
            $path = explode('.', $repeatable);
            $target = array_pop($path);
            $node =& $results;

            // Navigate to the node (if it is a deep node)
            foreach ($path as $key) {
                if (!isset($node[$key])) {
                    $node[$key] = array();
                }
                $node =& $node[$key];
            }

            // Create or transpose the repeatable into indexed array format
            if (!isset($node[$target][0])) {
                $node[$target] = isset($node[$target]) ? array($node[$target]) : array();
            }

            // Add an item identifying the container element (important for
            // iterators with multiple types of nodes in the result sets
            foreach ($node[$target] as &$item) {
                $item['ContainerElement'] = $target;
            }
        }

        return $results;
    }
}
