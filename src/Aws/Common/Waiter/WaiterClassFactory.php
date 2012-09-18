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
use Guzzle\Inflection\Inflector;
use Guzzle\Inflection\InflectorInterface;

/**
 * Factory for creating {@see WaiterInterface} objects using a convention of
 * storing waiter classes in the Waiter folder of a client class namespace using
 * a snake_case to CamelCase conversion (e.g. camel_case => CamelCase).
 */
class WaiterClassFactory implements WaiterFactoryInterface
{
    /**
     * @var array List of namespaces used to look for classes
     */
    protected $namespaces;

    /**
     * @var InflectorInterface Inflector used to inflect class names
     */
    protected $inflector;

    /**
     * @param array|string       $namespaces Namespaces of waiter objects
     * @param InflectorInterface $inflector  Inflector used to resolve class names
     */
    public function __construct($namespaces = array(), InflectorInterface $inflector = null)
    {
        $this->namespaces = (array) $namespaces;
        $this->inflector = $inflector ?: Inflector::getDefault();
    }

    /**
     * Registers a namespace to check for Waiters
     *
     * @param string $namespace Namespace which contains Waiter classes
     *
     * @return self
     */
    public function registerNamespace($namespace)
    {
        array_unshift($this->namespaces, $namespace);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function factory($waiter)
    {
        $waiterName = $this->inflector->camel($waiter);

        // Determine the name of the class to load
        $className = null;
        foreach ($this->namespaces as $namespace) {
            $potentialClassName = $namespace . '\\' . $waiterName;
            if (class_exists($potentialClassName)) {
                $className = $potentialClassName;
                break;
            }
        }

        if (!$className) {
            throw new InvalidArgumentException("Waiter was not found matching {$waiterName}.");
        }

        return new $className();
    }
}
