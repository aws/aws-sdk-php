<?php
// Copyright Amazon.com Inc. or its affiliates. All Rights Reserved.
// SPDX-License-Identifier: Apache-2.0
namespace Aws\Crypto\Polyfill;

/**
 * Class Key
 *
 * Wraps a string to keep it hidden from stack traces.
 *
 * @package Aws\Crypto\Polyfill
 */
class Key
{
    /**
     * @var string $internalString
     */
    private $internalString;

    /**
     * Hide contents of 
     *
     * @return array
     */
    public function __debugInfo()
    {
        return [];
    }

    /**
     * Key constructor.
     * @param string $str
     */
    public function __construct($str)
    {
        $this->internalString = $str;
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->internalString;
    }

    /**
     * @return int
     */
    public function length()
    {
        if (\is_callable('\\mb_strlen')) {
            return (int) \mb_strlen($this->internalString, '8bit');
        }
        return (int) \strlen($this->internalString);
    }
}
