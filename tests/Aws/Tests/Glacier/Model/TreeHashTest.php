<?php

namespace Aws\Tests\DynamoDb;

use Aws\Glacier\Model\TreeHash;
use Aws\Common\Enum\Size;

class TreeHashTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testTreeHashingChecksumsWorksCorrectly()
    {
        // Calculate hashes from test content
        $chunkedContent = array(
            str_repeat('x', Size::MB),
            'foobar',
        );
        $hash = function ($useBinaryForm) use ($chunkedContent) {
            $hashes = array();
            foreach ($chunkedContent as $chunk) {
                $hashes[] = hash('sha256', $chunk, $useBinaryForm);
            }
            return $hashes;
        };
        $binHashes = $hash(true);
        $hexHashes = $hash(false);

        // Calculate expected result
        $finalChecksum = hash('sha256', join('', $binHashes));

        // Make sure that tree hash calculation works from both binary and hex checksums as input
        $this->assertEquals($finalChecksum, TreeHash::fromChecksums($binHashes, true)->getHash());
        $this->assertEquals($finalChecksum, TreeHash::fromChecksums($hexHashes)->getHash());
    }
}
