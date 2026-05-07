<?php

namespace Aws\Test\EndpointV2\Bdd;

/**
 * Helpers for composing synthetic BDDs in tests. The encoder mirrors the
 * on-the-wire format: three signed 32-bit big-endian integers per node,
 * base64-encoded.
 */
final class BddFixtures
{
    /**
     * @param array<int, array{0:int,1:int,2:int}> $nodes
     *     Triples of [conditionIndex, highRef, lowRef], in node order.
     */
    public static function encodeNodes(array $nodes): string
    {
        $binary = '';
        foreach ($nodes as $node) {
            foreach ($node as $int) {
                $binary .= self::packSignedInt32($int);
            }
        }
        return base64_encode($binary);
    }

    private static function packSignedInt32(int $value): string
    {
        if ($value < 0) {
            $value += 0x100000000;
        }
        return pack('N', $value);
    }
}
