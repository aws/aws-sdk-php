<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AesDecryptingStream;
use Aws\Crypto\AesEncryptingStream;
use Aws\Crypto\Cipher\Cbc;
use Aws\Crypto\Cipher\CipherMethod;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(AesEncryptingStream::class)]
class AesEncryptingStreamTest extends TestCase
{
    const KB = 1024;
    const MB = 1048576;

    use AesEncryptionStreamTestTrait;

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testStreamOutputSameAsOpenSSL(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $plainText->rewind();
        $key = 'foo';
        $cipherText = new AesEncryptingStream($plainText, $key, $iv);

        $this->assertSame(
            (string) $cipherText,
            openssl_encrypt(
                (string) $plainText,
                $iv->getOpenSslName(),
                $key,
                OPENSSL_RAW_DATA,
                $iv->getCurrentIv()
            )
        );
    }

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testGetOpenSslName(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $plainText->rewind();
        $key = 'foo';
        $cipherText = new AesEncryptingStream($plainText, $key, $iv);

        $this->assertSame(
            $iv->getOpenSslName(),
            $cipherText->getOpenSslName()
        );
    }

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testGetCurrentIv(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $plainText->rewind();
        $key = 'foo';
        $cipherText = new AesEncryptingStream($plainText, $key, $iv);

        $this->assertSame(
            $iv->getCurrentIv(),
            $cipherText->getCurrentIv()
        );
    }

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testSupportsRewinding(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $plainText->rewind();
        $cipherText = new AesEncryptingStream($plainText, 'foo', $iv);
        $firstBytes = $cipherText->read(256 * 2 + 3);
        $cipherText->rewind();
        $this->assertSame($firstBytes, $cipherText->read(256 * 2 + 3));
    }

    #[DataProvider('cartesianJoinInputCipherMethodProvider')]
    public function testAccuratelyReportsSizeOfCipherText(
        StreamInterface $plainText,
        CipherMethod $iv
    ) {
        $plainText->rewind();
        $cipherText = new AesEncryptingStream($plainText, 'foo', $iv);
        $this->assertSame($cipherText->getSize(), strlen((string) $cipherText));
    }

    #[DataProvider('cipherMethodProvider')]
    public function testMemoryUsageRemainsConstant(CipherMethod $cipherMethod)
    {
        $memory = memory_get_usage();

        $stream = new AesDecryptingStream(
            new RandomByteStream(6 * self::MB),
            'foo',
            $cipherMethod
        );

        while (!$stream->eof()) {
            $stream->read(self::MB);
        }

        // Reading 1MB chunks should take 2MB
        $this->assertLessThanOrEqual($memory + 2 * self::MB, memory_get_usage());
    }

    public function testIsNotWritable()
    {
        $stream = new AesEncryptingStream(
            new RandomByteStream(124 * self::MB),
            'foo',
            new Cbc(openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')))
        );

        $this->assertFalse($stream->isWritable());
    }

    #[DataProvider('cipherMethodProvider')]
    public function testReturnsPaddedOrEmptyStringWhenSourceStreamEmpty(
        CipherMethod $cipherMethod
    ) {
        $stream = new AesEncryptingStream(
            Psr7\Utils::streamFor(''),
            'foo',
            $cipherMethod
        );

        $paddingLength = $cipherMethod->requiresPadding() ? 16 : 0;

        $this->assertSame($paddingLength, strlen($stream->read(self::MB)));
        $this->assertSame($stream->read(self::MB), '');
    }

    #[DataProvider('cipherMethodProvider')]
    public function testDoesNotSupportSeekingFromEnd(CipherMethod $cipherMethod)
    {
        $this->expectException(\LogicException::class);
        $stream = new AesEncryptingStream(Psr7\Utils::streamFor('foo'), 'foo', $cipherMethod);

        $stream->seek(1, SEEK_END);
    }

    #[DataProvider('seekableCipherMethodProvider')]
    public function testSupportsSeekingFromCurrentPosition(
        ?CipherMethod $cipherMethod,
        bool $skipTest
    ) {
        if ($skipTest) {
            $this->markTestSkipped();
        }

        $stream = new AesEncryptingStream(
            Psr7\Utils::streamFor(openssl_random_pseudo_bytes(2 * self::MB)),
            'foo',
            $cipherMethod
        );

        $lastFiveBytes = substr($stream->read(self::MB), self::MB - 5);
        $stream->seek(-5, SEEK_CUR);
        $this->assertSame($lastFiveBytes, $stream->read(5));
    }
}
