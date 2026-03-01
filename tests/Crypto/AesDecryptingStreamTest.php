<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AesDecryptingStream;
use Aws\Crypto\Cipher\Cbc;
use Aws\Crypto\Cipher\CipherMethod;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(AesDecryptingStream::class)]
class AesDecryptingStreamTest extends TestCase
{
    const KB = 1024;
    const MB = 1048576;

    use AesEncryptionStreamTestTrait;

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testStreamOutputSameAsOpenSSL(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $key = 'foo';

        $cipherText = openssl_encrypt(
            (string) $plainText,
            $iv->getOpenSslName(),
            $key,
            OPENSSL_RAW_DATA,
            $iv->getCurrentIv()
        );

        $aesDecryptingStream = new AesDecryptingStream(
            Psr7\Utils::streamFor($cipherText),
            $key,
            $iv
        );

        $this->assertSame(
            (string) $aesDecryptingStream,
            (string) $plainText
        );

        $this->assertSame(
            $iv->getOpenSslName(),
            $aesDecryptingStream->getOpenSslName()
        );

        $this->assertSame(
            $iv->getAesName(),
            $aesDecryptingStream->getAesName()
        );
    }

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testReportsSizeOfPlaintextWherePossible(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $key = 'foo';
        $cipherText = openssl_encrypt(
            (string) $plainText,
            $iv->getOpenSslName(),
            $key,
            OPENSSL_RAW_DATA,
            $iv->getCurrentIv()
        );
        $deciphered = new AesDecryptingStream(
            Psr7\Utils::streamFor($cipherText),
            $key,
            $iv
        );

        if ($iv->requiresPadding()) {
            $this->assertNull($deciphered->getSize());
        } else {
            $this->assertSame($plainText->getSize(), $deciphered->getSize());
        }
    }

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testSupportsRewinding(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $key = 'foo';
        $cipherText = openssl_encrypt(
            (string) $plainText,
            $iv->getOpenSslName(),
            $key,
            OPENSSL_RAW_DATA,
            $iv->getCurrentIv()
        );
        $deciphered = new AesDecryptingStream(Psr7\Utils::streamFor($cipherText), $key, $iv);
        $firstBytes = $deciphered->read(256 * 2 + 3);
        $deciphered->rewind();
        $this->assertSame($firstBytes, $deciphered->read(256 * 2 + 3));
    }

    #[DataProvider('cipherMethodProvider')]
    public function testMemoryUsageRemainsConstant(CipherMethod $iv)
    {
        $memory = memory_get_usage();

        $stream = new AesDecryptingStream(new RandomByteStream(6 * self::MB), 'foo', $iv);

        while (!$stream->eof()) {
            $stream->read(self::MB);
        }

        // Reading 1MB chunks should take 2MB
        $this->assertLessThanOrEqual($memory + 2 * self::MB, memory_get_usage());
    }

    public function testIsNotWritable()
    {
        $stream = new AesDecryptingStream(
            new RandomByteStream(124 * self::MB),
            'foo',
            new Cbc(openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')))
        );

        $this->assertFalse($stream->isWritable());
    }

    public function testDoesNotSupportArbitrarySeeking()
    {
        $this->expectException(\LogicException::class);
        $stream = new AesDecryptingStream(
            new RandomByteStream(124 * self::MB),
            'foo',
            new Cbc(openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')))
        );

        $stream->seek(1);
    }

    #[DataProvider('cipherMethodProvider')]
    public function testReturnsEmptyStringWhenSourceStreamEmpty(
        CipherMethod $cipherMethod
    ) {
        $stream = new AesDecryptingStream(Psr7\Utils::streamFor(''), 'foo', $cipherMethod);

        $this->assertEmpty($stream->read(self::MB));
        $this->assertSame($stream->read(self::MB), '');
    }
}
