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

namespace Aws\Glacier\Model;

use Aws\Common\ChunkHash;
use Aws\Common\ChunkHashInterface;
use Aws\Common\Enum\Size;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\LogicException;
use Guzzle\Http\EntityBody;

/**
 * Encapsulates the creation of a Glacier tree hash from streamed chunks of data
 */
class TreeHash implements ChunkHashInterface
{
    /**
     * @var string The algorithm used for hashing
     */
    protected $algorithm;

    /**
     * @var array Set of checksums from which the tree hash is derived
     */
    protected $checksums = array();

    /**
     * @var string The resulting hash in hex form
     */
    protected $hash;

    /**
     * @var string The resulting hash in binary form
     */
    protected $hashRaw;

    /**
     * Create a tree hash from an array of existing tree hash checksums
     *
     * @param array  $checksums    Set of checksums
     * @param bool   $inBinaryForm Whether or not the checksums are already in binary form
     * @param string $algorithm    A valid hash algorithm name as returned by `hash_algos()`
     *
     * @return TreeHash
     */
    public static function fromChecksums(array $checksums, $inBinaryForm = false, $algorithm = 'sha256')
    {
        $treeHash = new self($algorithm);

        // Convert checksums to binary form if provided in hex form and add them to the tree hash
        $treeHash->checksums = $inBinaryForm ? $checksums : array_map('Aws\Common\ChunkHash::hexToBinary', $checksums);

        // Pre-calculate hash
        $treeHash->getHash();

        return $treeHash;
    }

    /**
     * Create a tree hash from a content body
     *
     * @param string|resource|EntityBody $content   Content to create a tree hash for
     * @param string                     $algorithm A valid hash algorithm name as returned by `hash_algos()`
     *
     * @return TreeHash
     */
    public static function fromContent($content, $algorithm = 'sha256')
    {
        $treeHash = new self($algorithm);

        // Read the data in 1MB chunks and add to tree hash
        $content = EntityBody::factory($content);
        while ($data = $content->read(Size::MB)) {
            $treeHash->addData($data);
        }

        // Pre-calculate hash
        $treeHash->getHash();

        return $treeHash;
    }

    /**
     * Validates an entity body with a tree hash checksum
     *
     * @param string|resource|EntityBody $content   Content to create a tree hash for
     * @param string                     $checksum  The checksum to use for validation
     * @param string                     $algorithm A valid hash algorithm name as returned by `hash_algos()`
     *
     * @return bool
     */
    public static function validateChecksum($content, $checksum, $algorithm = 'sha256')
    {
        $treeHash = self::fromContent($content, $algorithm);

        return ($checksum === $treeHash->getHash());
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($algorithm = 'sha256')
    {
        if (!in_array($algorithm, hash_algos())) {
            throw new InvalidArgumentException("The hashing algorithm you specified ({$algorithm}) does not exist.");
        }

        $this->algorithm = $algorithm;
    }

    /**
     * {@inheritdoc}
     * @throws LogicException if the root tree hash is already calculated
     * @throws InvalidArgumentException if the data is larger than 1MB
     */
    public function addData($data)
    {
        // Error if hash is already calculated
        if ($this->hash) {
            throw new LogicException('You may not add more data to a finalized tree hash.');
        }

        // Make sure that only 1MB chunks or smaller get passed in
        if (strlen($data) > Size::MB) {
            throw new InvalidArgumentException('The chunk of data added is too large for tree hashing.');
        }

        // Store the raw hash of this data
        $this->checksums[] = hash($this->algorithm, $data, true);

        return $this;
    }

    /**
     * Add a checksum to the tree hash directly
     *
     * @param string $checksum     The checksum to add
     * @param bool   $inBinaryForm Whether or not the checksum is already in binary form
     *
     * @return self
     * @throws LogicException if the root tree hash is already calculated
     */
    public function addChecksum($checksum, $inBinaryForm = false)
    {
        // Error if hash is already calculated
        if ($this->hash) {
            throw new LogicException('You may not add more checksums to a finalized tree hash.');
        }

        // Convert the checksum to binary form if necessary
        $this->checksums[] = $inBinaryForm ? $checksum : ChunkHash::hexToBinary($checksum);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHash($returnBinaryForm = false)
    {
        if (!$this->hash) {
            // Perform hashes up the tree to arrive at the root checksum of the tree hash
            $hashes = $this->checksums;
            while (count($hashes) > 1) {
                $sets = array_chunk($hashes, 2);
                $hashes = array();
                foreach ($sets as $set) {
                    $hashes[] = (count($set) === 1) ? $set[0] : hash($this->algorithm, $set[0] . $set[1], true);
                }
            }

            $this->hashRaw = $hashes[0];
            $this->hash = ChunkHash::binaryToHex($this->hashRaw);
        }

        return $returnBinaryForm ? $this->hashRaw : $this->hash;
    }
}
