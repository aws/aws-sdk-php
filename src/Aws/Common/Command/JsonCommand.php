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

use Guzzle\Service\Command\DefaultResponseParser;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Command\OperationResponseParser;
use Guzzle\Service\Command\NoTranslationOperationResponseParser;
use Guzzle\Service\Description\OperationInterface;

/**
 * Adds AWS JSON body functionality to dynamically generated HTTP requests
 */
class JsonCommand extends OperationCommand
{
    /**
     * @var NoTranslationOperationResponseParser
     */
    protected static $cachedResponseParser;

    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        // By default, JSON commands with AWS require no response model processing
        if ($this->operation->getResponseType() == OperationInterface::TYPE_MODEL
            && $this->get(self::RESPONSE_PROCESSING) == self::TYPE_MODEL) {
            $this->responseParser = $this->get('command.model_processing')
                ? OperationResponseParser::getInstance()
                : NoTranslationOperationResponseParser::getInstance();
        } else {
            $this->responseParser = DefaultResponseParser::getInstance();
        }

        parent::build();

        // Ensure that the body of the request ALWAYS includes some JSON. By default, this is an empty object.
        if (!$this->request->getBody()) {
            $this->request->setBody('{}');
        }

        // Never send the Expect header when interacting with a JSON query service
        $this->request->removeHeader('Expect');
    }
}
