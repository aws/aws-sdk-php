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
            return;
        }
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
        $stream = new AesGcmEncryptingStream(
            Psr7\stream_for($knownAnswerTest['PT']),
            $knownAnswerTest['KEY'],
            $knownAnswerTest['IV'],
            $knownAnswerTest['AAD'],
            $knownAnswerTest['TagLength'],
            $knownAnswerTest['KeySize']
        );
        $cipherText = (string) $stream;
        $tag = $stream->getTag();

        $this->assertEquals($cipherText, $knownAnswerTest['CT']);
        $this->assertEquals($tag, $knownAnswerTest['Tag']);
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
