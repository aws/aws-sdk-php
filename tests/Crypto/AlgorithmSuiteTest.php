<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AlgorithmSuite;
use Aws\Crypto\AlgorithmConstants;
use Aws\Crypto\MaterialsProviderV3;
use Aws\S3\Crypto\S3EncryptionClientV3;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Aws\Crypto\AlgorithmSuite::class)]
class AlgorithmSuiteTest extends TestCase
{
    /**
     * Test that all enum cases exist and have correct backing values
     */
    public function testEnumCasesAndValues(): void
    {
        $this->assertSame(0x0073, AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->value);
        $this->assertSame(0x0072, AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->value);
        $this->assertSame(0x0070, AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->value);
    }

    /**
     * Test getId() method returns correct values
     */
    public function testGetId(): void
    {
        $this->assertSame(0x0073, AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getId());
        $this->assertSame(0x0072, AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getId());
        $this->assertSame(0x0070, AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getId());
    }

    /**
     * Test isLegacy() method - only CBC algorithm should be considered legacy
     */
    public function testIsLegacy(): void
    {
        $this->assertFalse(AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->isLegacy());
        $this->assertFalse(AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->isLegacy());
        $this->assertTrue(AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->isLegacy());
    }

    /**
     * Test isKeyCommitting() method - only HKDF SHA512 algorithm should be key committing
     */
    public function testIsKeyCommitting(): void
    {
        $this->assertTrue(AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->isKeyCommitting());
        $this->assertFalse(AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->isKeyCommitting());
        $this->assertFalse(AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->isKeyCommitting());
    }

    /**
     * Test getDataKeyAlgorithm() method - all should return AES
     */
    public function testGetDataKeyAlgorithm(): void
    {
        $this->assertSame("AES", AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getDataKeyAlgorithm());
        $this->assertSame("AES", AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getDataKeyAlgorithm());
        $this->assertSame("AES", AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getDataKeyAlgorithm());
    }

    /**
     * Test getDataKeyLengthBits() method - all should return 256
     */
    public function testGetDataKeyLengthBits(): void
    {
        $this->assertSame("256", AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getDataKeyLengthBits());
        $this->assertSame("256", AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getDataKeyLengthBits());
        $this->assertSame("256", AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getDataKeyLengthBits());
    }

    /**
     * Data provider for cipher name tests
     */
    public static function cipherNameProvider(): array
    {
        return [
            'HKDF SHA512 Commit Key uses GCM' => [
                AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY,
                'gcm'
            ],
            'GCM IV12 TAG16 uses GCM' => [
                AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF,
                'gcm'
            ],
            'CBC IV16 uses CBC' => [
                AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF,
                'cbc'
            ],
        ];
    }

    /**
     * Test getCipherName() method

 */
    #[DataProvider('cipherNameProvider')]
    public function testGetCipherName(AlgorithmSuite $suite, string $expectedCipher): void
    {
        $this->assertSame($expectedCipher, $suite->getCipherName());
    }

    /**
     * Test getCipherBlockSizeBits() method - all should return 128 bits
     */
    public function testGetCipherBlockSizeBits(): void
    {
        $this->assertSame(128, AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getCipherBlockSizeBits());
        $this->assertSame(128, AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getCipherBlockSizeBits());
        $this->assertSame(128, AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getCipherBlockSizeBits());
    }

    /**
     * Test getCipherBlockSizeBytes() method - all should return 16 bytes
     */
    public function testGetCipherBlockSizeBytes(): void
    {
        $this->assertSame(16, AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getCipherBlockSizeBytes());
        $this->assertSame(16, AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getCipherBlockSizeBytes());
        $this->assertSame(16, AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getCipherBlockSizeBytes());
    }

    /**
     * Data provider for IV length tests
     */
    public static function ivLengthProvider(): array
    {
        return [
            'HKDF SHA512 Commit Key uses 96-bit IV' => [
                AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY,
                96,
                12
            ],
            'GCM IV12 TAG16 uses 96-bit IV' => [
                AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF,
                96,
                12
            ],
            'CBC IV16 uses 128-bit IV' => [
                AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF,
                128,
                16
            ],
        ];
    }

    /**
     * Test getIvLengthBits() and getIvLengthBytes() methods

 */
    #[DataProvider('ivLengthProvider')]
    public function testGetIvLength(AlgorithmSuite $suite, int $expectedBits, int $expectedBytes): void
    {
        $this->assertSame($expectedBits, $suite->getIvLengthBits());
        $this->assertSame($expectedBytes, $suite->getIvLengthBytes());
    }

    /**
     * Data provider for cipher tag length tests
     */
    public static function cipherTagLengthProvider(): array
    {
        return [
            'HKDF SHA512 Commit Key uses 128-bit tag' => [
                AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY,
                128,
                16
            ],
            'GCM IV12 TAG16 uses 128-bit tag' => [
                AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF,
                128,
                16
            ],
            'CBC IV16 uses no tag' => [
                AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF,
                0,
                0
            ],
        ];
    }

    /**
     * Test getCipherTagLengthBits() and getCipherTagLengthInBytes() methods

 */
    #[DataProvider('cipherTagLengthProvider')]
    public function testGetCipherTagLength(AlgorithmSuite $suite, int $expectedBits, int $expectedBytes): void
    {
        $this->assertSame($expectedBits, $suite->getCipherTagLengthBits());
        $this->assertSame($expectedBytes, $suite->getCipherTagLengthInBytes());
    }

    /**
     * Test getHashingAlgorithm() method
     */
    public function testGetHashingAlgorithm(): void
    {
        $this->assertSame("sha512", AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getHashingAlgorithm());
        $this->assertSame("", AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getHashingAlgorithm());
        $this->assertSame("", AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getHashingAlgorithm());
    }

    /**
     * Data provider for key derivation tests
     */
    public static function keyDerivationProvider(): array
    {
        return [
            'HKDF SHA512 Commit Key' => [
                AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY,
                256,
                32,
                256,
                32
            ],
            'GCM IV12 TAG16 (no derivation)' => [
                AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF,
                0,
                0,
                0,
                0
            ],
            'CBC IV16 (no derivation)' => [
                AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF,
                0,
                0,
                0,
                0
            ],
        ];
    }

    /**
     * Test key derivation length methods

 */
    #[DataProvider('keyDerivationProvider')]
    public function testGetDerivationKeyLengths(
        AlgorithmSuite $suite,
        int $expectedInputBits,
        int $expectedInputBytes,
        int $expectedOutputBits,
        int $expectedOutputBytes
    ): void {
        $this->assertSame($expectedInputBits, $suite->getDerivationInputKeyLengthBits());
        $this->assertSame($expectedInputBytes, $suite->getDerivationInputKeyLengthBytes());
        $this->assertSame($expectedOutputBits, $suite->getDerivationOutputKeyLengthBits());
        $this->assertSame($expectedOutputBytes, $suite->getDerivationOutputKeyLengthBytes());
    }

    /**
     * Data provider for commitment key length tests
     */
    public static function commitmentKeyLengthProvider(): array
    {
        return [
            'HKDF SHA512 Commit Key' => [
                AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY,
                256,
                32,
                224,
                28
            ],
            'GCM IV12 TAG16 (no commitment)' => [
                AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF,
                0,
                0,
                0,
                0
            ],
            'CBC IV16 (no commitment)' => [
                AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF,
                0,
                0,
                0,
                0
            ],
        ];
    }

    /**
     * Test commitment key length methods

 */
    #[DataProvider('commitmentKeyLengthProvider')]
    public function testGetCommitmentKeyLengths(
        AlgorithmSuite $suite,
        int $expectedInputBits,
        int $expectedInputBytes,
        int $expectedOutputBits,
        int $expectedOutputBytes
    ): void {
        $this->assertSame($expectedInputBits, $suite->getCommitmentInputKeyLengthBits());
        $this->assertSame($expectedInputBytes, $suite->getCommitmentInputKeyLengthBytes());
        $this->assertSame($expectedOutputBits, $suite->getCommitmentOutputKeyLengthBits());
        $this->assertSame($expectedOutputBytes, $suite->getCommitmentOutputKeyLengthBytes());
    }

    /**
     * Test getKeyCommitmentSaltLengthBits() method
     */
    public function testGetKeyCommitmentSaltLengthBits(): void
    {
        $this->assertSame(224, AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getKeyCommitmentSaltLengthBits());
        $this->assertSame(0, AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getKeyCommitmentSaltLengthBits());
        $this->assertSame(0, AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getKeyCommitmentSaltLengthBits());
    }

    /**
     * Test getCipherMaxContentLengthBits() method
     */
    public function testGetCipherMaxContentLengthBits(): void
    {
        // GCM algorithms use GCM_MAX_CONTENT_LENGTH_BITS
        $this->assertSame(
            AlgorithmConstants::GCM_MAX_CONTENT_LENGTH_BITS,
            AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getCipherMaxContentLengthBits()
        );
        $this->assertSame(
            AlgorithmConstants::GCM_MAX_CONTENT_LENGTH_BITS,
            AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getCipherMaxContentLengthBits()
        );
        
        // CBC algorithm uses CBC_MAX_CONTENT_LENGTH_BYTES
        $this->assertSame(
            AlgorithmConstants::CBC_MAX_CONTENT_LENGTH_BYTES,
            AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getCipherMaxContentLengthBits()
        );
    }

    /**
     * Test getCipherMaxContentLengthBytes() method
     */
    public function testGetCipherMaxContentLengthBytes(): void
    {
        // GCM algorithms
        $expectedGcmBytes = AlgorithmConstants::GCM_MAX_CONTENT_LENGTH_BITS / 8;
        $this->assertSame(
            $expectedGcmBytes,
            AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY->getCipherMaxContentLengthBytes()
        );
        $this->assertSame(
            $expectedGcmBytes,
            AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF->getCipherMaxContentLengthBytes()
        );
        
        // CBC algorithm
        $expectedCbcBytes = AlgorithmConstants::CBC_MAX_CONTENT_LENGTH_BYTES / 8;
        $this->assertSame(
            $expectedCbcBytes,
            AlgorithmSuite::ALG_AES_256_CBC_IV16_NO_KDF->getCipherMaxContentLengthBytes()
        );
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt with FORBID_ENCRYPT_ALLOW_DECRYPT policy
     */
    public function testValidateCommitmentPolicyForbidEncrypt(): void
    {
        $cipherOptions = [
            'Cipher' => 'gcm',
            'KeySize' => 256
        ];
        
        $result = AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'FORBID_ENCRYPT_ALLOW_DECRYPT'
        );
        
        $this->assertSame(AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF, $result);
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt with REQUIRE_ENCRYPT_ALLOW_DECRYPT policy
     */
    public function testValidateCommitmentPolicyRequireEncrypt(): void
    {
        $cipherOptions = [
            'Cipher' => 'gcm',
            'KeySize' => 256
        ];
        
        $result = AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'REQUIRE_ENCRYPT_ALLOW_DECRYPT'
        );
        
        $this->assertSame(AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY, $result);
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt with REQUIRE_ENCRYPT_REQUIRE_DECRYPT policy
     */
    public function testValidateCommitmentPolicyRequireEncryptRequireDecrypt(): void
    {
        $cipherOptions = [
            'Cipher' => 'gcm',
            'KeySize' => 256
        ];
        
        $result = AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'REQUIRE_ENCRYPT_REQUIRE_DECRYPT'
        );
        
        $this->assertSame(AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY, $result);
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt with case insensitive cipher names
     */
    public function testValidateCommitmentPolicyWithCaseInsensitiveCipher(): void
    {
        $cipherOptions = [
            'Cipher' => 'GCM', // uppercase
            'KeySize' => 256
        ];
        
        $result = AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'FORBID_ENCRYPT_ALLOW_DECRYPT'
        );
        
        $this->assertSame(AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF, $result);
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt with default key size
     */
    public function testValidateCommitmentPolicyWithDefaultKeySize(): void
    {
        $cipherOptions = [
            'Cipher' => 'gcm'
            // KeySize not provided, should default to 256
        ];
        
        $result = AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'FORBID_ENCRYPT_ALLOW_DECRYPT'
        );
        
        $this->assertSame(AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF, $result);
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt throws exception for unsupported cipher
     */
    public function testValidateCommitmentPolicyThrowsForUnsupportedCipher(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The cipher requested is not supported by the SDK.');
        
        $cipherOptions = [
            'Cipher' => 'unsupported_cipher',
            'KeySize' => 256
        ];
        
        AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'FORBID_ENCRYPT_ALLOW_DECRYPT'
        );
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt throws exception for non-integer key size
     */
    public function testValidateCommitmentPolicyThrowsForNonIntegerKeySize(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The cipher "KeySize" must be an integer.');
        
        $cipherOptions = [
            'Cipher' => 'gcm',
            'KeySize' => '256' // string instead of int
        ];
        
        AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'FORBID_ENCRYPT_ALLOW_DECRYPT'
        );
    }

    /**
     * Test validateCommitmentPolicyOnEncrypt throws exception for unsupported key size
     */
    public function testValidateCommitmentPolicyThrowsForUnsupportedKeySize(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The cipher "KeySize" requested is not supported by AES (256).');
        
        $cipherOptions = [
            'Cipher' => 'gcm',
            'KeySize' => 128 // unsupported key size
        ];
        
        AlgorithmSuite::validateCommitmentPolicyOnEncrypt(
            $cipherOptions,
            'FORBID_ENCRYPT_ALLOW_DECRYPT'
        );
    }
}
