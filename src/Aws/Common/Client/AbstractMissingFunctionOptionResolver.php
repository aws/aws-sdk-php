<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Common\Client;

use Aws\Common\Exception\InvalidArgumentException;

/**
 * Adds base functionality to an option resolver so that if an option is
 * missing, it can be retrieved by calling a callable function and then
 * ensuring that the created object implements a specific interface.
 */
abstract class AbstractMissingFunctionOptionResolver implements OptionResolverInterface
{
    /**
     * @var null|string Function to call if the option is missing
     */
    protected $missingFunction;

    /**
     * @var string|null Ensure that the option implements this class/interface
     */
    protected $mustImplement;

    /**
     * Provide a callable function to call if an expected parameter is not found
     *
     * @param mixed $missingFunction Callable to execute if the param is missing
     *
     * @return self
     */
    public function setMissingFunction($missingFunction)
    {
        if (!is_callable($missingFunction)) {
            throw new InvalidArgumentException('Method is not callable');
        }

        $this->missingFunction = $missingFunction;

        return $this;
    }

    /**
     * Set the name of a class or interface that the option must implement if
     * it is explicitly provided.
     *
     * @param string $mustImplement Name of the class or interface
     *
     * @return self
     */
    public function setMustImplement($mustImplement)
    {
        $this->mustImplement = $mustImplement;

        return $this;
    }
}
