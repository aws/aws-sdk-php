<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AesGcmDecryptingStream;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(AesGcmDecryptingStream::class)]
class AesGcmDecryptingStreamTest extends TestCase
{
    use AesEncryptionStreamTestTrait;

    #[DataProvider('cartesianJoinInputKeySizeProvider')]
    public function testStreamOutputSameAsOpenSSL(
        StreamInterface $plainText,
        $keySize
    ) {
        $plainText->rewind();
        $plainText = (string) $plainText;
        $key = 'foo';
        $iv = random_bytes(openssl_cipher_iv_length('aes-256-gcm'));
        $additionalData = json_encode(['foo' => 'bar']);
        $tag = null;
        $cipherText = openssl_encrypt(
            $plainText,
            "aes-{$keySize}-gcm",
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag,
            $additionalData,
            16
        );

        $decryptingStream = new AesGcmDecryptingStream(
            Psr7\Utils::streamFor($cipherText),
            $key,
            $iv,
            $tag,
            $additionalData,
            16,
            $keySize
        );
        $this->assertSame($iv, $decryptingStream->getCurrentIv());
        $this->assertSame(
            'AES/GCM/NoPadding',
            $decryptingStream->getAesName()
        );
        $this->assertSame((string) $decryptingStream, $plainText);
    }

    #[DataProvider('cartesianJoinInputKeySizeProvider')]
    public function testThrowsForInvalidTag(
        StreamInterface $plainText,
        $keySize
    ) {
        $this->expectExceptionMessage("The requested object could not be decrypted due to an invalid authentication tag");
        $this->expectException(\Aws\Exception\CryptoException::class);
        $plainText->rewind();
        $plainText = (string) $plainText;
        $key = 'foo';
        $iv = random_bytes(openssl_cipher_iv_length('aes-256-gcm'));
        $additionalData = json_encode(['foo' => 'bar']);
        $tag = null;
        $cipherText = openssl_encrypt(
            $plainText,
            "aes-{$keySize}-gcm",
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag,
            $additionalData,
            16
        );

        $decryptingStream = new AesGcmDecryptingStream(
            Psr7\Utils::streamFor($cipherText),
            $key,
            $iv,
            str_repeat('x', 16),
            $additionalData,
            16,
            $keySize
        );
        $decryptingStream->getContents();
    }

    public function testThrowsForUnsupportedTagLength()
    {
        $this->expectExceptionMessage('Unsupported GCM tag length');
        $this->expectException(\Aws\Exception\CryptoException::class);

        $decryptingStream = new AesGcmDecryptingStream(
            Psr7\Utils::streamFor('some ciphertext bytes'),
            'key',
            random_bytes(openssl_cipher_iv_length('aes-256-gcm')),
            'x', // 8-bit tag; only 128-bit tags are permitted
            json_encode(['foo' => 'bar']),
            1,
            256
        );
        $decryptingStream->getContents();
    }

    public function testIsNotWritable()
    {
        $decryptingStream = new AesGcmDecryptingStream(
            Psr7\Utils::streamFor(''),
            'key',
            random_bytes(openssl_cipher_iv_length('aes-256-gcm')),
            'tag'
        );

        $this->assertFalse($decryptingStream->isWritable());
    }
}
