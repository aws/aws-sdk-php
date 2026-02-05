<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\EncryptionTraitV3;
use Aws\Crypto\EncryptionTrait;
use Aws\Crypto\DecryptionTraitV3;
use Aws\Crypto\MetadataEnvelope;
use Aws\Crypto\KmsMaterialsProvider;
use Aws\Crypto\KmsMaterialsProviderV3;
use Aws\Crypto\AlgorithmSuite;
use Aws\Exception\CryptoException;
use Aws\Crypto\Cipher\Cbc;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\AppendStream;
use PHPUnit\Framework\MockObject\MockObject;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Crypto\EncryptionTraitV3
 * @covers \Aws\Crypto\DecryptionTraitV3
 */
class EncryptionDecryptionTraitV3Test extends TestCase
{
    use UsesCryptoParamsTraitV3;
    use UsesMetadataEnvelopeTrait;
    use UsesServiceTrait;
    use UsesEncryptionDecryptionV3Trait;

    private $v1EncryptionClass;
    private $encryptionClass;
    private $decryptionClass;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create a concrete test class that uses the trait
        $this->encryptionClass = new class {
            use EncryptionTraitV3;
            
            protected function buildCipherMethod($cipherName, $iv, $keySize)
            {
                // Mock implementation for testing
                return new \stdClass();
            }
            
            protected function getCipherOpenSslName($cipher, $keySize)
            {
                return "aes-{$keySize}-{$cipher}";
            }
            
            public static function isSupportedCipher($cipher): bool
            {
                return in_array($cipher, ['gcm']);
            }
        };
        
        // Create a concrete test class that uses the trait
        $this->decryptionClass = new class {
            use DecryptionTraitV3;
            
            protected function buildCipherMethod($cipherName, $iv, $keySize)
            {
                // Mock implementation for testing
                return new \stdClass();
            }
            
            protected function getCipherFromAesName($aesName)
            {
                switch ($aesName) {
                    case 'AES/GCM/NoPadding':
                        return 'gcm';
                    case 'AES/CBC/PKCS5Padding':
                        return 'cbc';
                    default:
                        throw new CryptoException('Unrecognized or unsupported'
                            . ' AESName for reverse lookup.');
                    }
            }
        };

        // Create a concrete test class that uses the trait
        $this->v1EncryptionClass = new class {
            use EncryptionTrait;
            protected function buildCipherMethod($cipherName, $iv, $keySize)
            {
                switch ($cipherName) {
                    case 'cbc':
                        return new Cbc(
                            $iv,
                            $keySize
                        );
                    default:
                        return null;
                }
            }
            
            public static function isSupportedCipher($cipher): bool
            {
                return in_array($cipher, ['gcm', 'cbc']);
            }
            
            protected function getCipherOpenSslName($cipher, $keySize)
            {
                return "aes-{$keySize}-{$cipher}";
            }
        };
    }

    protected function getS3Client()
    {
        static $client = null;
        if (!$client) {
            $client = $this->getTestClient('S3');
        }
        return $client;
    }

    protected function getKmsClient()
    {
        static $client = null;
        if (!$client) {
            $client = $this->getTestClient('Kms');
        }
        return $client;
    }

    /**
     * Test basic encryption with valid GCM cipher options
     */
    public function testEncryptWithNonCommitingAlgSuiteV2Format(): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF;

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );
        
        //= ../specification/s3-encryption/data-format/content-metadata.md#determining-s3ec-object-status
        //= type=test
        //# - If the metadata contains "x-amz-iv" and "x-amz-metadata-x-amz-key-v2" then the object MUST be considered as an S3EC-encrypted object using the V2 format.
        $this->assertTrue(MetadataEnvelope::isV2Envelope($envelope));
    }

    public function testValidV2ObjectHasV2EnvelopeFields(): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF;

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );
        
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-key-v2" MUST be present for V2 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::CONTENT_KEY_V2_HEADER, $envelope);
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-matdesc" MUST be present for V2 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER, $envelope);
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-iv" MUST be present for V2 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::IV_HEADER, $envelope);
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-wrap-alg" MUST be present for V2 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER, $envelope);
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-cek-alg" MUST be present for V2 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER, $envelope);
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-tag-len" MUST be present for V2 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER, $envelope);
    }

    /**
     * Tests that a V2 envelope with V3 fields appropriately errors 
     * @return void
     */
    public function testV2EnvelopeWithV3FieldsThrows(): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF;

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );
        
        $this->assertTrue(MetadataEnvelope::isV2Envelope($envelope));
        // manually update the envelope to assert we error
        $envelope[MetadataEnvelope::MESSAGE_ID_V3] = "some value, not really important what i put here.";
        //= ../specification/s3-encryption/data-format/content-metadata.md#determining-s3ec-object-status
        //= type=test
        //# If there are multiple mapkeys which are meant to be exclusive,
        //# such as "x-amz-key", "x-amz-key-v2", and "x-amz-3" then the S3EC SHOULD throw an exception.
        $this->expectExceptionMessage("Expected V2 only fields but found V3 fields in header metadata");
        
        $result = $this->decryptionClass->decrypt(
            "some value",
            $provider,
            $envelope,
            "FORBID_ENCRYPT_ALLOW_DECRYPT"
        );
    }
    
    /**
     * Tests that a V3 envelope with V2 fields appropriately errors 
     * @return void
     */
    public function testV3EnvelopeWithV2FieldsThrows(): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY;

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );
        
        $this->assertTrue(MetadataEnvelope::isV3Envelope($envelope));
        // manually update the envelope to assert we error
        $envelope[MetadataEnvelope::IV_HEADER] = "some value, not really important what i put here.";
        //= ../specification/s3-encryption/data-format/content-metadata.md#determining-s3ec-object-status
        //= type=test
        //# If there are multiple mapkeys which are meant to be exclusive,
        //# such as "x-amz-key", "x-amz-key-v2", and "x-amz-3" then the S3EC SHOULD throw an exception.
        $this->expectExceptionMessage("Expected V3 only fields but found V2 fields in header metadata");
        
        $result = $this->decryptionClass->decrypt(
            "some value",
            $provider,
            $envelope,
            "REQUIRE_ENCRYPT_REQUIRE_DECRYPT"
        );
    }

    public function testV3EnvelopeECValidSetCorrectly(): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY;

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );
        
        $this->assertTrue(MetadataEnvelope::isV3Envelope($envelope));
        //= ../specification/s3-encryption/data-format/content-metadata.md#v3-only
        //= type=test
        //# The Encryption Context value MUST be used for wrapping algorithm `kms+context` or `12`.
        $this->assertEquals($envelope[MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3], 12);
    }

    /**
     * Summary of testDiffAlgorithmSuitesProduceDiffObjectVersions
     * @dataProvider getAlgorithmSuites
     * @return void
     */
    public function testDiffAlgorithmSuitesProduceDiffObjectVersions(AlgorithmSuite $algorithmSuite): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );
        // this test only deals with aes gcm commiting and non commiting alg suites
        if ($algorithmSuite === AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY) {
            //= ../specification/s3-encryption/data-format/content-metadata.md#algorithm-suite-and-message-format-version-compatibility
            //= type=implication
            //# Objects encrypted with ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY MUST use the V3 message format version only.
            $this->assertTrue(MetadataEnvelope::isV3Envelope($envelope));
        } else {
            //= ../specification/s3-encryption/data-format/content-metadata.md#algorithm-suite-and-message-format-version-compatibility
            //= type=implication
            //# Objects encrypted with ALG_AES_256_GCM_IV12_TAG16_NO_KDF MUST use the V2 message format version only.
            $this->assertTrue(MetadataEnvelope::isV2Envelope($envelope));
        }
    }
    
    /**
     * Summary of testDiffAlgorithmSuitesProduceDiffObjectVersions
     * @return void
     */
    public function testCbcAlgSuiteProducesV2Envelope(): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProvider($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
                'Cipher' => 'cbc'
        ];

        $result = $this->v1EncryptionClass->encrypt(
            $plaintext,
            $options,
            $provider,
            $envelope
        );
        //= ../specification/s3-encryption/data-format/content-metadata.md#algorithm-suite-and-message-format-version-compatibility
        //= type=implication
        //# Objects encrypted with ALG_AES_256_CBC_IV16_NO_KDF MAY use either the V1 or V2 message format version.
        $this->assertTrue(MetadataEnvelope::isV1Envelope($envelope));

        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-matdesc" MUST be present for V1 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER, $envelope);
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-iv" MUST be present for V1 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::IV_HEADER, $envelope);
        //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
        //= type=test
        //# - The mapkey "x-amz-unencrypted-content-length" SHOULD be present for V1 format objects.
        $this->assertArrayHasKey(MetadataEnvelope::UNENCRYPTED_CONTENT_LENGTH_HEADER, $envelope);
    }

    /**
     * Given a CommitmentPolicy assert error gets appropriately thrown if the key commitment policy
     * does not support decryption of the object.
     * @dataProvider getCommitmentPolicies
     */
    public function testThrowsOnInvalidKCPolicyAndNoKeyCommitmentAlgSuite($commitmentPolicy): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        // No Key Commitment Algorithm Suite
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF;

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ]),
            new Result(['Plaintext' => 'plaintext'])
        ]);
        
        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $envelope = new MetadataEnvelope();
        
        $encryptOptions = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
            '@SecurityProfile' => 'V3_AND_LEGACY'
        ];
        
        $decryptOptions = [
            '@CipherOptions' => [],
            '@KmsEncryptionContext' => [],
            '@SecurityProfile' => 'V3_AND_LEGACY'
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $encryptOptions,
            $provider,
            $envelope
        );
        
        $this->assertTrue(MetadataEnvelope::isV2Envelope($envelope));

        if ($commitmentPolicy == "REQUIRE_ENCRYPT_REQUIRE_DECRYPT") 
        {
            //= ../specification/s3-encryption/decryption.md#key-commitment
            //= type=test
            //# If the commitment policy requires decryption using a committing algorithm suite,
            //# and the algorithm suite associated with the object does not support key commitment,
            //# then the S3EC MUST throw an exception.
            $this->expectException(\Aws\Exception\CryptoException::class);
            $this->expectExceptionMessage("Message is encrypted with a non commiting algorithm"
                . " but commitment policy is set to REQUIRE_ENCRYPT_REQUIRE_DECRYPT."
                . " Select a valid commitment policy to decrypt this object"
            );
        }

        
        $result = $this->decryptionClass->decrypt(
            $result,
            $provider,
            $envelope,
            $commitmentPolicy,
            $decryptOptions

        );
    }
    
    /**
     * Given a CommitmentPolicy assert error gets appropriately thrown if the key commitment policy
     * does not support decryption of the object.
     * @dataProvider getCommitmentPolicies
     */
    public function testThrowsOnInvalidKCPolicyAndKeyCommitmentAlgSuite($commitmentPolicy): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        // No Key Commitment Algorithm Suite
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY;

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ]),
            new Result(['Plaintext' => 'plaintext'])
        ]);
        
        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
            '@SecurityProfile' => 'V3'
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );
        $this->assertTrue(MetadataEnvelope::isV3Envelope($envelope));
        $this->expectExceptionMessage("Calculated commitment key does not match expected commitment key value");
        $this->expectException(\Aws\Exception\CryptoException::class);
        $result = $this->decryptionClass->decrypt(
            $result,
            $provider,
            $envelope,
            $commitmentPolicy,
            $options
        );
    }
    
    /**
     * Test that IV is of the appropriate length
     */
    public function testValidateIvIsSetAndAppropriateLength(): void
    {
        $plaintext = new Stream(fopen('data://text/plain,Hello World', 'r'));
        //= ../specification/s3-encryption/encryption.md#content-encryption
        //= type=test
        //# The client MUST generate an IV or Message ID using the length of the IV or Message ID defined in the algorithm suite.
        $algorithmSuite = AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF;
        $ivLength = $algorithmSuite->getIvLengthBytes();

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ]),
        ]);

        $envelope = new MetadataEnvelope();
        
        $options = [
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'KeySize' => 256
            ],
            '@KmsEncryptionContext' => [],
            '@SecurityProfile' => 'V3'
        ];

        $result = $this->encryptionClass->encrypt(
            $plaintext,
            $algorithmSuite,
            $options,
            $provider,
            $envelope
        );

        //= ../specification/s3-encryption/encryption.md#content-encryption
        //= type=test
        //# The generated IV or Message ID MUST be set or returned from the encryption process such that it can be included in the content metadata.

        $this->assertEquals($ivLength, strlen(base64_decode($envelope[MetadataEnvelope::IV_HEADER])));
    }
}
