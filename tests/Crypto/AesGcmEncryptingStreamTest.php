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

    /**
     * @dataProvider encryptDataProvider
     */
    public function testCorrectlyEncryptsData(
        $plaintext,
        $key,
        $iv,
        $aad,
        $keySize,
        $expectedCipher,
        $expectedTag
    ) {
        $stream = new AesGcmEncryptingStream(
            Psr7\stream_for(hex2bin($plaintext)),
            hex2bin($key),
            hex2bin($iv),
            hex2bin($aad),
            16,
            $keySize
        );

        $this->assertEquals(
            $expectedCipher,
            strtoupper(bin2hex($stream->createStream()->getContents()))
        );
        $this->assertEquals(
            $expectedTag,
            strtoupper(bin2hex($stream->getTag()))
        );
    }

    public function encryptDataProvider()
    {
        // [[ $plaintext, $key, $iv, $aad, $keySize, $expectedCipher, $expectedTag ]]
        return [
            [
                '',
                'DA2FDB0CED551AEB723D8AC1A267CEF3',
                'A5F5160B7B0B025757ACCDAA',
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                128,
                '',
                '7AD0758C4FA9B8660AA0687B3E7BD517'
            ],
            [
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                '4194935CF4524DF93D62FEDBC818D8AC',
                '0C5A8F5AF7F6064C0130EE64',
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                128,
                '3F4CC9A7451717E5E939D294A1362B32C274D06411188DAD76AEE3EE4DA46483EA4C1AF38B9B74D7AD2FD8E310CF82',
                'AD563FD10E1EFA3F26753F46E09DB3A0'
            ],
            [
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                'AD03EE2FD6048DB7158CEC55D3D760BC',
                '1B813A16DDCB7F08D26E2541',
                '',
                128,
                'ADD161BE957AE9EC3CEE6600C77FF81D64A80242A510A9D5AD872096C79073B61E8237FAA7D63A3301EA58EC11332C',
                '01944370EC28601ADC989DE05A794AEB'
            ],
            [
                '',
                '20142E898CD2FD980FBF34DE6BC85C14DA7D57BD28F4AA5CF1728AB64E843142',
                'FB7B4A824E82DAA6C8BC1251',
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                256,
                '',
                '81C0E42BB195E262CB3B3A74A0DAE1C8'
            ],
            [
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                'D211F278A44EAB666B1021F4B4F60BA6B74464FA9CB7B134934D7891E1479169',
                '6B5CD3705A733C1AD943D58A',
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                256,
                '4C25ABD66D3A1BCCE794ACAAF4CEFDF6D2552F4A82C50A98CB15B4812FF557ABE564A9CEFF15F32DCF5A5AA7894888',
                '03EDE71EC952E65AE7B4B85CFEC7D304'
            ],
            [
                '167B5C226177733A782D616D7A2D63656B2D616C675C223A205C224145532F47434D2F4E6F50616464696E675C227D',
                'CFE8BFE61B89AF53D2BECE744D27B78C9E4D74D028CE88ED10A422285B1201C9',
                '5F08EFBFB7BF5BA365D9EB1D',
                '',
                256,
                '0A7E82F1E5C76C69679671EEAEE455936F2C4FCCD9DDF1FAA27075E2040644938920C5D16C69E4D93375487B9A80D4',
                '04347D0C5B0E0DE89E033D04D0493DCA'
            ],
        ];
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
