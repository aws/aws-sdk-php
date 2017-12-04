<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AesGcmEncryptingStream;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\TestCase;

class AesGcmEncryptingStreamTest extends TestCase
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
     *git s
     * @param StreamInterface $plainText
     * @param int $keySize
     */
    public function testStreamOutputSameAsOpenSSL(
        StreamInterface $plainText,
        $keySize
    ) {
        $plainText->rewind();
        $key = 'foo';
        $iv = random_bytes(openssl_cipher_iv_length('aes-256-gcm'));
        $additionalData = json_encode(['foo' => 'bar']);
        $tag = null;
        $encryptingStream = new AesGcmEncryptingStream(
            $plainText,
            $key,
            $iv,
            $additionalData,
            16,
            $keySize
        );

        $this->assertSame(
            (string) $encryptingStream,
            openssl_encrypt(
                (string) $plainText,
                "aes-{$keySize}-gcm",
                $key,
                OPENSSL_RAW_DATA,
                $iv,
                $tag,
                $additionalData,
                16
            )
        );
        $this->assertSame($iv, $encryptingStream->getCurrentIv());
        $this->assertSame($tag, $encryptingStream->getTag());
    }

    public function testIsNotWritable()
    {
        $decryptingStream = new AesGcmEncryptingStream(
            Psr7\stream_for(''),
            'key',
            random_bytes(openssl_cipher_iv_length('aes-256-gcm'))
        );

        $this->assertFalse($decryptingStream->isWritable());
    }
}
