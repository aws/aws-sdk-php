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

namespace Aws\Common\Iterator;

use Aws\Common\Enum\UaString as Ua;
Use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIterator;

/**
 * Defines the base logic for iterating over a command and returning resources
 */
abstract class AbstractResourceIterator extends ResourceIterator
{
    /**
     * @var Model Result of a command
     */
    protected $lastResult = null;

    /**
     * Provides access to the most recent result obtained by the iterator.
     *
     * @return Model|null
     */
    public function getLastResult()
    {
        return $this->lastResult;
    }

    /**
     * {@inheritdoc}
     * This AWS specific version of the resource iterator is abstract and
     * provides a template of the typical iterator process. It relies on the
     * child classes to implement the concrete strategies for handling results
     * and nextTokens. The method will loop until resources are acquired or
     * there are no more iterations available.
     */
    protected function sendRequest()
    {
        do {
            // Prepare the request including setting the next token
            $this->prepareRequest();
            if ($this->nextToken) {
                $this->applyNextToken();
            }

            // Execute the request and handle the results
            $this->command->add(Ua::OPTION, Ua::ITERATOR);
            $this->lastResult = $this->command->getResult();
            $resources = $this->handleResults($this->lastResult);
            $this->determineNextToken($this->lastResult);

            // If no resources collected, prepare to reiterate before yielding
            if ($reiterate = empty($resources) && $this->nextToken) {
                $this->command = clone $this->originalCommand;
            }
        } while ($reiterate);

        return $resources;
    }

    /**
     * Prepares a request and makes sure all parameters are set for the command
     */
    protected function prepareRequest()
    {
        // Does nothing by default
    }

    /**
     * Applies the nextToken to the command so the proper result set is returned
     */
    abstract protected function applyNextToken();

    /**
     * Handles the processing of the command results into the resources to be
     * returned by the iterator.
     *
     * @param Model $result The result of the command
     *
     * @return array
     */
    abstract protected function handleResults(Model $result);

    /**
     * Sets the nextToken by examining the results for this iteration
     *
     * @param Model $result The result of the command
     */
    abstract protected function determineNextToken(Model $result);
}
