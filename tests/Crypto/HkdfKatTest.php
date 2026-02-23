<?php
namespace Aws\Test\S3\Crypto;

use Aws\Crypto;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use Aws\Crypto\AesGcmDecryptingStream;
use Aws\Crypto\AlgorithmSuite;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\TestCase;
use Aws\Crypto\Cipher\CipherMethod;
use Aws\Exception\CryptoException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\LimitStream;
use PHPUnit\Framework\Constraint\IsEmpty;
use Psr\Http\Message\StreamInterface;

#[DoesNotPerformAssertions]
class HkdfKatTest extends TestCase
{
    public static function getKats(): array
    {
        return [
            [
                "comment" => "Basic S3EC.ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY",
                "data_key" => "80d90dc4cc7e77d8a6332efa44eba56230a7fe7b89af37d1e501ab2e07c0a163",
                "message_id" => "b8ea76bed24c7b85382a148cb9dcd1cfdfb765f55ded4dfa6e0c4c79",
                "encryption_key" => "6dd14f546cc006e639126e83f5d4d1b118576bb5df97f38c6fb3a1db87bbc338",
                "commitment_key" => "f89818bc0a346d3a3426b68e9509b6b2ae5fe1f904aa329fb73625db"
            ],
            [
                "comment" => "Basic S3EC.ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY",
                "data_key" => "501afb8227d22e75e68010414b8abdaf3064c081e8e922dafef4992036394d60",
                "message_id" => "61a00b4981a5aacfd136c55cb726e32d2a547dc7600a7d4675c69127",
                "encryption_key" => "e14786a714748d1d2c3a4a6816dec56ddf1881bbeabb4f39420ffb9f63700b2f",
                "commitment_key" => "5c1e73e47f6fe3a70d6d094283aceaa76d2975feb829212d88f0afc1"
            ],
            [
                "comment" => "S3EC.ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY with encryption test",
                "data_key" => "f331a37a67de41312aba59889b0a7153beddc8c1603e4b307244c12f7960ebbb",
                "message_id" => "61678bbe745d80302928e5b5a82ba73de86deb959824b4342da62443",
                "encryption_key" => "5c8bc1c3d2d866f3724143a0d48ddc134cd1088312313d503497eac33cca6d4a",
                "commitment_key" => "abe6c3a3f7223dddbbceaa382a1bdbdbf064746b7898aec3a0f4c1ae",
                "plaintext" => "48656c6c6f2c20576f726c6421",
                "ciphertext" => "66295d01a48d699b7da7ec4dae",
                "auth_tag" => "d0f126ec41e62cb2130824ebcc600f12"
            ]
        ];
    }

    public function testHkdf(): void
    {
        $kats = HkdfKatTest::getKats();
        foreach ($kats as $kat) {
            $dataKey = hex2bin($kat["data_key"]);
            $messageId = hex2bin($kat["message_id"]);
            $dek = hash_hkdf(
                "sha512",
                $dataKey,
                32,
                pack('C*', 0x00, 0x73) . "DERIVEKEY",
                $messageId
            );
            $kck = hash_hkdf(
                "sha512",
                $dataKey,
                28,
                pack('C*', 0x00, 0x73) . "COMMITKEY",
                $messageId
            );
            $this->assertIsArray($kat);
            $this->assertEquals($dek, hex2bin($kat["encryption_key"]), "oops");
            $this->assertEquals($kck, hex2bin($kat["commitment_key"]), "oops1");

            if (isset($kat["ciphertext"])) {
                $plaintext = hex2bin($kat["plaintext"]);
                $cipherText = hex2bin($kat["ciphertext"]);
                $authTag = hex2bin($kat["auth_tag"]);
                $cipherTextStream = Psr7\Utils::streamFor($cipherText);
                $algSuiteThatUsesHkdf = AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY;
                $decryptStream = new AesGcmDecryptingStream(
                    $cipherTextStream,
                    $dek,
                    str_repeat("\0", $algSuiteThatUsesHkdf->getIvLengthBytes()),
                    $authTag,
                    pack('C*', 0x00, 0x73),
                    16,
                    256
                );
                $this->assertSame((string) $decryptStream, $plaintext);
            }
        }
    }
}
