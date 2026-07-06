<?php

namespace Aws\Test\EndpointV2\Bdd;

use Aws\EndpointV2\Bdd\BddNodeDecoder;
use Aws\Exception\UnresolvedEndpointException;
use PHPUnit\Framework\Attributes\CoversClass;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(BddNodeDecoder::class)]
class BddNodeDecoderTest extends TestCase
{
    public function testDecodesEmptyNodeList()
    {
        $this->assertSame([], BddNodeDecoder::decode('', 0));
    }

    public function testDecodesSingleTerminalNode()
    {
        $encoded = BddFixtures::encodeNodes([[-1, 1, -1]]);
        $this->assertSame([-1, 1, -1], BddNodeDecoder::decode($encoded, 1));
    }

    public function testPreservesSignedIntegerBoundaries()
    {
        $encoded = BddFixtures::encodeNodes([
            [-1, 1, -1],
            [0, 100_000_001, -100_000_002],
            [2147483647, -2147483648, 0],
        ]);

        $decoded = BddNodeDecoder::decode($encoded, 3);

        $this->assertSame(
            [
                -1, 1, -1,
                0, 100_000_001, -100_000_002,
                2147483647, -2147483648, 0,
            ],
            $decoded
        );
    }

    public function testRejectsInvalidBase64()
    {
        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Endpoint BDD nodes are not valid base64.');
        BddNodeDecoder::decode('***not-base64***', 1);
    }

    public function testRejectsTruncatedPayload()
    {
        // Encode one node but claim two.
        $encoded = BddFixtures::encodeNodes([[-1, 1, -1]]);

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('12 bytes but 24 were expected for 2 nodes');
        BddNodeDecoder::decode($encoded, 2);
    }
}
