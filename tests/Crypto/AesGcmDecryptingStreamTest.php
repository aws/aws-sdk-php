<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AesGcmDecryptingStream;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\TestCase;

class AesGcmDecryptingStreamTest extends TestCase
{
    use AesEncryptionStreamTestTrait;

    protected function setUp()
    {
        if (version_compare(PHP_VERSION, '7.1', '<')) {
            $this->markTestSkipped(
                'AES-GCM decryption is only supported in PHP 7.1 or greater'
            );
        }
        parent::setUp();
    }

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
