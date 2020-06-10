<?php
namespace Aws\Test\Crypto\Polyfill;

use Aws\Crypto\Polyfill\ByteArray;
use PHPUnit\Framework\TestCase;

/**
 * Class ByteArrayTest
 * @package Aws\Test\Crypto\Polyfill
 */
class ByteArrayTest extends TestCase
{
    /**
     * Test the constructor logic.
     */
    public function testConstructor()
    {
        $a = new ByteArray(16);
        $this->assertSame(16, $a->count(), 'Invalid ByteArray size');

        $b = new ByteArray('Amazon Web Services');
        $this->assertSame(19, $b->count(), 'String to array produced incorrect size');

        $c = new ByteArray(
            [65, 109, 97, 122, 111, 110, 32, 87, 101, 98, 32, 83, 101, 114, 118, 105, 99, 101, 115]
        );
        $this->assertSame(19, $c->count(), 'Array produced incorrect size');

        $this->assertEquals($b->toArray(), $c->toArray(), 'String serialization error');

        $d = new ByteArray($c);
        $this->assertEquals($d->toArray(), $c->toArray(), 'Passing a ByteArray should return a clone');
    }

    public function testConstructorInvalidType()
    {
        $thrown = false;
        try {
            new ByteArray(false);
        } catch (\InvalidArgumentException $ex) {
            $thrown = true;
        }
        $this->assertTrue($thrown, 'Expected an exception to be thrown');
    }

    /**
     * Tests the behavior of converting a ByteArray to a string
     */
    public function testToString()
    {
        $buf = new ByteArray(
            [65, 109, 97, 122, 111, 110, 32, 87, 101, 98, 32, 83, 101, 114, 118, 105, 99, 101, 115]
        );
        $this->assertSame('Amazon Web Services', $buf->toString());
        $this->assertSame('', (new ByteArray())->toString());
    }

    public function testEquals()
    {
        $buf1 = new ByteArray(
            [65, 109, 97, 122, 111, 110, 32, 87, 101, 98, 32, 83, 101, 114, 118, 105, 99, 101, 115]
        );
        $buf2 = new ByteArray('Amazon Web Services');
        $this->assertTrue($buf1->equals($buf2), 'Equal ByteArrays should return true');

        $buf3 = new ByteArray(
            [65, 109, 97, 122, 111, 110, 32, 87, 101, 98, 32, 83, 101, 114, 118, 105, 99, 101, 116]
        );
        $this->assertFalse($buf1->equals($buf3), 'Non-equal ByteArrays should return false');

        $this->assertFalse($buf1->equals(new ByteArray()), 'Mismatched ByteArray lengths should never be equal');
    }

    /**
     * Verifies the correct behavior of getIncremented()
     *
     * @throws \Exception
     */
    public function testIncrement()
    {
        $random = new ByteArray(\random_bytes(16));
        $increase = $random->getIncremented();
        $this->assertNotSame($random->toString(), $increase->toString());

        $random[15] = 0xff;
        $increase = $random->getIncremented();
        $this->assertSame(0, $increase[15]);
        $this->assertTrue(
            $increase[14] === 0 || $increase[14] > $random[14],
            "Error: Increment doesn't carry over"
        );
    }

    public function testRshift()
    {
        $a = new ByteArray([0x12, 0x34, 0x56, 0x78]);
        $this->assertSame(
            [0x09, 0x1A, 0x2B, 0x3C],
            $a->rshift()->toArray()
        );
    }

    public function testEnc32be()
    {
        $this->assertSame(
            [0x12, 0x34, 0x56, 0x78],
            ByteArray::enc32be(0x12345678)->toArray()
        );
    }

    public function testSelect()
    {
        $a = new ByteArray(
            [65, 109, 97, 122, 111, 110, 32, 87, 101, 98, 32, 83, 101, 114, 118, 105, 99, 101, 115]
        );
        $b = new ByteArray(19);

        $this->assertSame($a->toArray(), ByteArray::select(1, $a, $b)->toArray());
        $this->assertSame($b->toArray(), ByteArray::select(0, $a, $b)->toArray());
    }

    public function testXor()
    {
        $a = new ByteArray([65, 87, 83]);
        $b = new ByteArray([255, 255, 255]);
        $this->assertSame([190, 168, 172], $a->exclusiveOr($b)->toArray());
    }
}
