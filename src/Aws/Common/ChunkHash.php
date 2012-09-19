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

namespace Aws\Common;

use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\LogicException;

/**
 * Encapsulates the creation of a hash from streamed chunks of data
 */
class ChunkHash implements ChunkHashInterface
{
    /**
     * @var resource The hash context as created by `hash_init()`
     */
    protected $context;

    /**
     * @var bool Whether or not `hash_final()` has been called on the hash context
     */
    protected $isFinalized;

    /**
     * @var string The resulting hash in hex form
     */
    protected $hash;

    /**
     * @var string The resulting hash in binary form
     */
    protected $hashRaw;

    /**
     * Converts a hash in hex form to binary form
     *
     * @param string $hash Hash in hex form
     *
     * @return string Hash in binary form
     */
    public static function hexToBinary($hash)
    {
        // If using PHP 5.4, there is a native function to convert from hex to binary
        static $useNative;
        if ($useNative === null) {
            $useNative = function_exists('hex2bin');
        }

        return $useNative ? hex2bin($hash) : pack("H*" , $hash);
    }

    /**
     * Converts a hash in binary form to hex form
     *
     * @param string $hash Hash in binary form
     *
     * @return string Hash in hex form
     */
    public static function binaryToHex($hash)
    {
        return bin2hex($hash);
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($algorithm = 'sha256')
    {
        if (!in_array($algorithm, hash_algos())) {
            throw new InvalidArgumentException("The hashing algorithm you specified ({$algorithm}) does not exist.");
        }

        $this->context = hash_init($algorithm);
        $this->isFinalized = false;
    }

    /**
     * {@inheritdoc}
     */
    public function addData($data)
    {
        if ($this->isFinalized) {
            throw new LogicException('You may not add more data to a finalized chunk hash.');
        }

        hash_update($this->context, $data);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHash($returnBinaryForm = false)
    {
        if (!$this->hash) {
            $this->hashRaw = hash_final($this->context, true);
            $this->hash = self::binaryToHex($this->hashRaw);
        }

        return $returnBinaryForm ? $this->hashRaw : $this->hash;
    }
}
