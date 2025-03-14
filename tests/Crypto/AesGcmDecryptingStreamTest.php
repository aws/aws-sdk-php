<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AesGcmDecryptingStream;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class AesGcmDecryptingStreamTest extends TestCase
{
    use AesEncryptionStreamTestTrait;

    /**
     * @dataProvider cartesianJoinInputKeySizeProvider
     *
     * @param StreamInterface $plainText
     * @param int $keySize
     */
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

    /**
     * @dataProvider cartesianJoinInputKeySizeProvider
     *
     * @param StreamInterface $plainText
     * @param int $keySize
     */
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
            'invalid_tag',
            $additionalData,
            16,
            $keySize
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
