<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AesGcmDecryptingStream;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\TestCase;

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
        if (version_compare(PHP_VERSION, '7.1', '<')) {
            $this->markTestSkipped(
                'AES-GCM decryption is only supported in PHP 7.1 or greater'
            );
        }
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
            Psr7\stream_for($cipherText),
            $key,
            $iv,
            $tag,
            $additionalData,
            16,
            $keySize
        );
        $this->assertSame($iv, $decryptingStream->getCurrentIv());
        $this->assertEquals(
            'AES/GCM/NoPadding',
            $decryptingStream->getAesName()
        );
        $this->assertSame((string) $decryptingStream, $plainText);
    }

    /**
     * @dataProvider cartesianJoinInputKeySizeProvider
     * @expectedException \Aws\Exception\CryptoException
     * @expectedExceptionMessage The requested object could not be decrypted due to an invalid authentication tag
     *
     * @param StreamInterface $plainText
     * @param int $keySize
     */
    public function testThrowsForInvalidTag(
        StreamInterface $plainText,
        $keySize
    ) {
        if (version_compare(PHP_VERSION, '7.1', '<')) {
            $this->markTestSkipped(
                'AES-GCM decryption is only supported in PHP 7.1 or greater'
            );
        }
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
            Psr7\stream_for($cipherText),
            $key,
            $iv,
            'invalid_tag',
            $additionalData,
            16,
            $keySize
        );
        $decryptingStream->getContents();
    }

    public function testStreamLegacyPHP()
    {
        if (version_compare(PHP_VERSION, '7.1', '>=')) {
            $this->markTestSkipped(
                'Test is unnecessary on PHP 7.1 and newer'
            );
            return;
        }
        $knownAnswerTest = [
            'KEY' => "foo\0\0\0\0\0\0\0\0\0\0\0\0\0",
            'KeySize' => 128,
            'TagLength' => 16,
            'CT' => hex2bin('cbb92a00adfaa91fbee308603a1c21b87f12c30246dc01097b0f000dc1a2f872748bd6b41a37a2d7d89b9cfd'),
            'PT' => hex2bin('546865207261696e20696e20537061696e2066616c6c73206d61696e6c79206f6e2074686520706c61696e2e'),
            'IV' => hex2bin('43a29bcfb3322d134a4ef364'),
            'AAD' => json_encode(['foo' => 'bar']),
            'Tag' => hex2bin('cba38431a0c28712778de8e8c6ec4594')
        ];
        $stream = new AesGcmDecryptingStream(
            Psr7\stream_for($knownAnswerTest['CT']),
            $knownAnswerTest['KEY'],
            $knownAnswerTest['IV'],
            $knownAnswerTest['Tag'],
            $knownAnswerTest['AAD'],
            $knownAnswerTest['TagLength'],
            $knownAnswerTest['KeySize']
        );
        $cipherText = (string) $stream;

        $this->assertEquals($cipherText, $knownAnswerTest['PT']);
    }

    public function testIsNotWritable()
    {
        $decryptingStream = new AesGcmDecryptingStream(
            Psr7\stream_for(''),
            'key',
            random_bytes(openssl_cipher_iv_length('aes-256-gcm')),
            'tag'
        );

        $this->assertFalse($decryptingStream->isWritable());
    }
}
