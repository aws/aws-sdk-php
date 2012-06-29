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

namespace Aws\Common\Waiter;

use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Inflection\Inflector;
use Guzzle\Common\Inflection\InflectorInterface;

/**
 * Factory for creating {@see WaiterInterface} objects using a convention of
 * storing waiter classes in the Waiter folder of a client class namespace using
 * a snake_case to CamelCase conversion (e.g. camel_case => CamelCase).
 */
class WaiterClassFactory implements WaiterFactoryInterface
{
    /**
     * @var string Base namespace used to look for classes
     */
    protected $baseNamespace;

    /**
     * @var InflectorInterface Inflector used to inflect class names
     */
    protected $inflector;

    /**
     * @param string             $baseNamespace Base namespace of all waiter objects
     * @param InflectorInterface $inflector     Inflector used to resolve class names
     */
    public function __construct($baseNamespace, InflectorInterface $inflector = null)
    {
        $this->baseNamespace = $baseNamespace;
        $this->inflector = $inflector ?: Inflector::getDefault();
    }

    /**
     * {@inheritdoc}
     */
    public function factory($waiter)
    {
        // Determine the name of the class to load
        $className = $this->baseNamespace . '\\' . $this->inflector->camel($waiter);

        if (!class_exists($className)) {
            throw new InvalidArgumentException("Waiter was not found matching {$waiter}: {$className}");
        }

        return new $className();
    }
}
