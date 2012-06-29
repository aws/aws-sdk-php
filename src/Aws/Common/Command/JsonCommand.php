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

namespace Aws\Common\Command;

use Aws\Common\ToArrayInterface;
use Guzzle\Service\Command\DynamicCommand;

/**
 * Adds JSON body functionality to dynamically generated HTTP requests
 */
class JsonCommand extends DynamicCommand
{
    /**
     * {@inheritdoc}
     * Builds the request body for commands using JSON
     */
    protected function build()
    {
        parent::build();

        // Begin building a JSON body
        $json = array();

        // Determine which parameters are actually JSON parameters
        foreach ($this->getApiCommand()->getParams() as $name => $arg) {

            $configValue = $this->get($name);
            if (!$configValue) {
                continue;
            }

            $location = $arg->getLocation();

            if ($location == 'json') {

                // Determine the JSON key to use based on the key mapping
                $key = $arg->getLocationKey() ?: $name;

                // Convert ToArray objects to an array
                if ($configValue instanceof ToArrayInterface) {
                    $configValue = $configValue->toArray();
                } elseif (is_array($configValue)) {
                    array_walk_recursive($configValue, function(&$value, $key) {
                        if ($value instanceof ToArrayInterface) {
                            $value = $value->toArray();
                        }
                    });
                }

                // Add to the JSON array
                $json[$key] = $configValue;
            }
        }

        // Convert '[]' to '{}'
        if (empty($json)) {
            $jsonString = '{}';
        } else {
            $jsonString = json_encode($json);
        }

        // Set the body and ensure that the Expect header is never sent
        $this->request
            ->setBody($jsonString)
            ->removeHeader('Expect');
    }
}
