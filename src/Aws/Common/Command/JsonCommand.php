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
 * Adds AWS JSON body functionality to dynamically generated HTTP requests
 */
class JsonCommand extends DynamicCommand
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        // Convert toArray objects before normalizing
        array_walk_recursive($this->data, function (&$value) {
            if ($value instanceof ToArrayInterface) {
                $value = $value->toArray();
            }
        });

        parent::build();

        // Always use an empty JSON body
        if (!$this->request->getBody()) {
            $this->request->setBody('{}');
        }

        $this->request->removeHeader('Expect');
    }
}
