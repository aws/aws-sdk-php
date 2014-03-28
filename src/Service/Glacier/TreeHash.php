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

namespace Aws\Service\Glacier;

use GuzzleHttp\Stream;
use GuzzleHttp\Subscriber\MessageIntegrity\HashInterface;

/**
 * Encapsulates the creation of a tree hash from streamed data
 */
class TreeHash implements HashInterface
{
    /** @var string Algorithm used for hashing */
    private $algorithm;

    /** @var array Binary checksums from which the tree hash is derived */
    private $checksums = [];

    /** @var string Resulting hash in binary form */
    private $hash;

    /**
     * Create a tree hash from an array of existing tree hash checksums
     *
     * @param array  $checksums    Set of checksums
     * @param bool   $inBinaryForm TRUE if checksums are in binary form
     * @param string $algorithm    A valid hash algorithm name
     *
     * @return TreeHash
     */
    public static function fromChecksums(
        array $checksums,
        $inBinaryForm = false,
        $algorithm = 'sha256'
    ) {
        $treeHash = new self($algorithm);

        // Convert checksums to binary form if provided in hex form and add
        // them to the tree hash.
        $treeHash->checksums = $inBinaryForm
            ? $checksums
            : array_map('hex2bin', $checksums);

        // Pre-calculate hash
        $treeHash->complete();

        return $treeHash;
    }

    /**
     * Create a tree hash from a content body
     *
     * @param mixed  $content   Content to create a tree hash for
     * @param string $algorithm A valid hash algorithm name
     *
     * @return TreeHash
     */
    public static function fromContent(
        $content,
        $algorithm = 'sha256'
    ) {
        $treeHash = new self($algorithm);

        // Read the data in 1MB chunks and add to tree hash
        $content = Stream\create($content);
        while ($data = $content->read(1048576)) {
            $treeHash->update($data);
        }

        // Pre-calculate hash
        $treeHash->complete();

        return $treeHash;
    }

    /**
     * Validates an entity body with a tree hash checksum
     *
     * @param mixed  $content   Content to create a tree hash for
     * @param string $checksum  The checksum to use for validation
     * @param string $algorithm A valid hash algorithm name
     *
     * @return bool
     */
    public static function validateChecksum(
        $content,
        $checksum,
        $algorithm = 'sha256'
    ) {
        $treeHash = self::fromContent($content, $algorithm);

        return ($checksum === bin2hex($treeHash->complete()));
    }

    public function __construct($algorithm = 'sha256')
    {
        $this->algorithm = $algorithm;
    }

    /**
     * {@inheritdoc}
     * @throws \LogicException if the root tree hash is already calculated
     * @throws \InvalidArgumentException if the data is larger than 1MB
     */
    public function update($data)
    {
        // Error if hash is already calculated
        if ($this->hash) {
            throw new \LogicException('You may not add more data to a '
                . 'complete tree hash.');
        }

        // Make sure that only 1MB chunks or smaller get passed in
        if (strlen($data) > 1048576) {
            throw new \InvalidArgumentException('You may only update a tree '
                . 'hash with chunks of data that are 1MB or less.');
        }

        // Store the raw hash of this data segment
        $this->checksums[] = hash($this->algorithm, $data, true);

        return $this;
    }

    /**
     * Add a checksum to the tree hash directly
     *
     * @param string $checksum   The checksum to add
     * @param bool $inBinaryForm TRUE if checksum is in binary form
     *
     * @return self
     * @throws \LogicException if the root tree hash is already calculated
     */
    public function addChecksum($checksum, $inBinaryForm = false)
    {
        // Error if hash is already calculated
        if ($this->hash) {
            throw new \LogicException('You may not add more checksums to a '
                . 'complete tree hash.');
        }

        // Convert the checksum to binary form if necessary
        $this->checksums[] = $inBinaryForm ? $checksum : hex2bin($checksum);

        return $this;
    }

    public function complete()
    {
        if (!$this->hash) {
            // Perform hashes up the tree to arrive at the root checksum of the
            // tree hash.
            $hashes = $this->checksums;
            while (count($hashes) > 1) {
                $sets = array_chunk($hashes, 2);
                $hashes = array();
                foreach ($sets as $set) {
                    $hashes[] = (count($set) === 1)
                        ? $set[0]
                        : hash($this->algorithm, $set[0] . $set[1], true);
                }
            }

            $this->hash = $hashes[0];
        }

        return $this->hash;
    }

    /**
     * @return array Array of raw checksums composing the tree hash
     */
    public function getChecksums()
    {
        return $this->checksums;
    }
}
