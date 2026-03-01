<?php
namespace Aws\Test\S3\Crypto;

use Aws\Crypto\AesDecryptingStream;
use Aws\Crypto\AesGcmDecryptingStream;
use Aws\Crypto\KmsMaterialsProvider;
use Aws\Crypto\KmsMaterialsProviderV3;
use Aws\Crypto\MetadataEnvelope;
use Aws\Exception\CryptoException;
use Aws\HashingStream;
use Aws\MetricsBuilder;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;
use Aws\S3\Crypto\S3EncryptionClientV3;
use Aws\Test\Crypto\UsesCryptoParamsTraitV3;
use Aws\Test\MetricsBuilderTestTrait;
use Aws\Test\UsesServiceTrait;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use TypeError;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(S3EncryptionClientV3::class)]
class S3EncryptionClientV3Test extends TestCase
{
    use S3EncryptionClientTestingTrait;
    use UsesCryptoParamsTraitV3;
    use UsesMetadataEnvelopeTrait;
    use UsesServiceTrait;
    use MetricsBuilderTestTrait;

    protected function getS3Client(): mixed
    {
        static $client = null;

        if (!$client) {
            $client = $this->getTestClient('S3');
        }

        return $client;
    }

    protected function getKmsClient(): mixed
    {
        static $client = null;

        if (!$client) {
            $client = $this->getTestClient('Kms');
        }

        return $client;
    }

    #[DataProvider('getValidMaterialsProviders')]
    public function testPutObjectTakesValidMaterialsProviders(
        $provider,
        $exception
    ): void
    {
        if ($exception) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        }

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => [
                'Cipher' => 'gcm',
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    #[DataProvider('getInvalidMaterialsProviders')]
    public function testPutObjectRejectsInvalidMaterialsProviders(
        $provider,
        $exception
    ): void 
    {
        if ($exception) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        }

        $s3 = $this->getS3Client();

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);
    }

    #[DataProvider('getValidMetadataStrategies')]
    public function testPutObjectTakesValidMetadataStrategy(
        $strategy,
        $exception,
        $s3MockCount
    ): void
    {
        if ($exception) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        }

        $s3 = $this->getS3Client();
        $i = 0;
        $results = [];
        while ($i++ < $s3MockCount) {
            $results[] = new Result(['ObjectURL' => 'file_url']);
        }
        $this->addMockResults($s3, $results);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@MetadataStrategy' => $strategy,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    #[DataProvider('getInvalidMetadataStrategies')]
    public function testPutObjectRejectsInvalidMetadataStrategy(
        $strategy,
        $exception
    ): void
    {
        if ($exception) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        }

        $s3 = $this->getS3Client();

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@MetadataStrategy' => $strategy,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);
    }

    public function testPutObjectWithClientInstructionFileSuffix(): void
    {
        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url']),
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3(
            $s3,
            InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX
        );
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    public function testPutObjectWithOperationInstructionFileSuffix(): void
    {
        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url']),
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#instruction-file
        //= type=test
        //# Instruction File writes MUST be optionally configured during client creation or on each PutObject request.
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@InstructionFileSuffix' => InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * Test that by default, S3EC stores content metadata in S3 Object Metadata (headers)
     * This verifies the specification requirement that metadata is stored in object headers by default.
     * */
    public function testV2MetadataStorageInObjectHeaders(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                // Verify ALL required encryption metadata is present in headers
                //= ../specification/s3-encryption/data-format/metadata-strategy.md#object-metadata
                //= type=test
                //# By default, the S3EC MUST store content metadata in the S3 Object Metadata.
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_KEY_V2_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::IV_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER));
                
                // Verify this is NOT an instruction file request
                $uri = $request->getUri();
                $this->assertStringNotContainsString('.instruction', $uri->getPath(), 
                    'Default metadata strategy should not create instruction files');
                    
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key-id');
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted-key',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        
        // NOTE: Intentionally NOT specifying @MetadataStrategy to test default behavior
        $client->putObject([
            'Bucket' => 'test-bucket',
            'Key' => 'test-key',
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
            // Deliberately omitting @MetadataStrategy to test default
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }
    
    /**
     * Test that by default, S3EC stores content metadata in S3 Object Metadata (headers)
     * This verifies the specification requirement that metadata is stored in object headers by default.
     */
    public function testV3MetadataStorageInObjectHeaders(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                // Verify ALL required encryption metadata is present in headers
                //= ../specification/s3-encryption/data-format/metadata-strategy.md#object-metadata
                //= type=test
                //# By default, the S3EC MUST store content metadata in the S3 Object Metadata.
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTED_DATA_KEY_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_CIPHER_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::KEY_COMMITMENT_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::MESSAGE_ID_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTION_CONTEXT_V3));
                
                // Verify this is NOT an instruction file request
                $uri = $request->getUri();
                $this->assertStringNotContainsString('.instruction', $uri->getPath(), 
                    'Default metadata strategy should not create instruction files');
                    
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key-id');
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted-key',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        
        // NOTE: Intentionally NOT specifying @MetadataStrategy to test default behavior
        $client->putObject([
            'Bucket' => 'test-bucket',
            'Key' => 'test-key',
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
            // Deliberately omitting @MetadataStrategy to test default
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * Test that the default metadata strategy does not write instruction files
     * This verifies the specification requirement that instruction files are not enabled by default.
     */
    public function testDefaultMetadataStrategyDoesNotWriteInstructionFile(): void
    {
        $requestCount = 0;
        $requests = [];
        
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) use (&$requestCount, &$requests) {
                $requestCount++;
                $requests[] = $request;
                
                $uri = $request->getUri();
                
                //= ../specification/s3-encryption/data-format/metadata-strategy.md#instruction-file
                //= type=test
                //# Instruction File writes MUST NOT be enabled by default.
                $this->assertStringNotContainsString('.instruction', $uri->getPath(), 
                    'Default metadata strategy should not create instruction files');
                
                // Verify encryption metadata is stored in headers (default behavior)
                //= ../specification/s3-encryption/data-format/metadata-strategy.md#object-metadata
                //= type=test
                //# By default, the S3EC MUST store content metadata in the S3 Object Metadata.
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_KEY_V2_HEADER),
                    'Default strategy should store encryption metadata in object headers');
                
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key-id');
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted-key',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        
        // Test with NO @MetadataStrategy specified - should use default HeadersMetadataStrategy
        $client->putObject([
            'Bucket' => 'test-bucket',
            'Key' => 'test-key',
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
            // Deliberately omitting @MetadataStrategy to test default behavior
        ]);

        // Assert exactly 1 request was made (main object only, no instruction file)
        $this->assertEquals(1, $requestCount, 
            'Default metadata strategy should make exactly 1 S3 request (no instruction file)');
        
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * Test that default metadata strategy differs from instruction file strategy
     * This ensures we're actually testing the default behavior vs explicit strategies.
     */
    public function testDefaultVsInstructionFileMetadataStorage(): void
    {
        $requestCount = 0;
        $s3 = new S3Client([
            'region' => 'us-west-2', 
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) use (&$requestCount) {
                $requestCount++;
                $uri = $request->getUri();
                
                if ($requestCount === 1) {
                    // First request: Default strategy (object with metadata headers)
                    $this->assertStringNotContainsString('.instruction', $uri->getPath());
                    $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_KEY_V2_HEADER));
                } elseif ($requestCount === 2) {
                    // Second request: Instruction file upload
                    $this->assertStringContainsString('.instruction', $uri->getPath());
                } else {
                    // Third request: Main object data for instruction file strategy (without metadata headers)
                    $this->assertStringNotContainsString('.instruction', $uri->getPath());
                    $this->assertEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_KEY_V2_HEADER));
                }
                
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key');
        $this->addMockResults($kms, [
            new Result(['CiphertextBlob' => 'encrypted', 'Plaintext' => random_bytes(32)]),
            new Result(['CiphertextBlob' => 'encrypted', 'Plaintext' => random_bytes(32)]),
        ]);

        $client = new S3EncryptionClientV3($s3);

        // Test 1: Default strategy (should store in headers)
        $client->putObject([
            'Bucket' => 'test-bucket', 
            'Key' => 'test-key1', 
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
            // No @MetadataStrategy = default headers strategy
        ]);

        // Test 2: Explicit instruction file strategy
        $client->putObject([
            'Bucket' => 'test-bucket', 
            'Key' => 'test-key2', 
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@MetadataStrategy' => new InstructionFileMetadataStrategy($s3),
            '@InstructionFileSuffix' => '.instruction',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertEquals(3, $requestCount, 'Should make 3 requests: headers object, instruction file, main object');
        $this->assertTrue($this->mockQueueEmpty());
    }

    #[DataProvider('getCiphers')]
    public function testPutObjectValidatesCipher(
        $cipher,
        $exception = null
    ): void 
    {
        if ($exception) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        } else {
            $this->addToAssertionCount(1); // To be replaced with $this->expectNotToPerformAssertions();
        }

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => [
                'Cipher' => $cipher
            ],
            '@KmsEncryptionContext' => [],
        ]);
    }

    #[DataProvider('getKeySizes')]
    public function testPutObjectValidatesKeySize(
        $keySize,
        $exception
    ): void 
    {
        if ($exception) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        } else {
            $this->addToAssertionCount(1); // To be replaced with $this->expectNotToPerformAssertions();
        }

        $cipherOptions = [
            'Cipher' => 'gcm'
        ];
        if ($keySize) {
            $cipherOptions['KeySize'] = $keySize;
        }

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        if (is_int($keySize)) {
            $bytes = $keySize / 8;
        } else {
            // Placeholder, client should throw for non-int key size
            $bytes = 1;
        }
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes($bytes),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => $cipherOptions,
            '@KmsEncryptionContext' => [],
        ]);
    }

    private function getSuccessfulPutObjectResponse(): string
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<PutObjectResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <ObjectURL>file_url</ObjectURL>
</PutObjectResult>
EOXML;
    }

    public function testPutObjectWrapsBodyInAesGcmEncryptingStream(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                $this->assertNotEmpty($request->getHeader(
                    'x-amz-meta-' . MetadataEnvelope::CONTENT_KEY_V2_HEADER
                ));
                $this->assertInstanceOf(HashingStream::class, $request->getBody());
                return new FulfilledPromise(new Response(
                    200,
                    [],
                    $this->getSuccessfulPutObjectResponse()
                ));
            },
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => [
                'Cipher' => 'gcm',
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * Note that outside of PHPUnit, normal code execution will continue through
     * this warning unless configured otherwise. PHPUnit throws it as an
     * exception here for testing.
     */
    public function testTriggersWarningForGcmEncryptionWithAad(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('\'Aad\' has been supplied for content encryption'
            . ' with AES/GCM/NoPadding');
        set_error_handler(function ($errno, $errstr) {
            throw new \RuntimeException($errstr, $errno);
        }, E_USER_WARNING);
        try {
            $s3 = new S3Client([
                'region' => 'us-west-2',
                'version' => 'latest',
                'http_handler' => function (RequestInterface $request) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        $this->getSuccessfulPutObjectResponse()
                    ));
                },
            ]);

            $kms = $this->getKmsClient();
            $keyId = '11111111-2222-3333-4444-555555555555';
            $provider = new KmsMaterialsProviderV3($kms, $keyId);
            $this->addMockResults($kms, [
                new Result([
                    'CiphertextBlob' => 'encrypted',
                    'Plaintext' => random_bytes(32),
                ])
            ]);

            $client = new S3EncryptionClientV3($s3);
            $client->putObject([
                'Bucket' => 'foo',
                'Key' => 'bar',
                'Body' => 'test',
                '@MaterialsProvider' => $provider,
                '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                    'Aad' => 'test'
                ],
                '@KmsEncryptionContext' => [],
            ]);

            $this->assertTrue($this->mockQueueEmpty());
        } finally {
            restore_error_handler();
        }
    }

    public function testAddsEncryptionContextForKms(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                $this->assertEquals(
                    [
                        'aws:x-amz-cek-alg' => 'AES/GCM/NoPadding',
                        'marco' => 'polo'
                    ],
                    json_decode(
                        $request->getHeaderLine('x-amz-meta-x-amz-matdesc'),
                        true
                    )
                );

                return new FulfilledPromise(new Response(
                    200,
                    [],
                    $this->getSuccessfulPutObjectResponse()
                ));
            },
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => [
                'Cipher' => 'gcm',
            ],
            '@KmsEncryptionContext' => [
                'marco' => 'polo'
            ],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    public function testGetObjectThrowsOnInvalidCipher(): void
    {
        $this->expectExceptionMessage("Unrecognized or unsupported AESName for reverse lookup.");
        $this->expectException(\Aws\Exception\CryptoException::class);
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getInvalidCipherMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);

        $this->assertInstanceOf(AesDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectThrowsOnInvalidKeywrap(): void
    {
        $this->expectExceptionMessage('The requested object is encrypted'
            . ' with the keywrap schema \'my_first_keywrap\'');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getInvalidKeywrapMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);
    }

    public function testGetObjectThrowsOnLegacyKeywrap(): void
    {
        //= ../specification/s3-encryption/decryption.md#legacy-decryption
        //= type=test
        //# If the S3EC is not configured to enable legacy unauthenticated content decryption,
        //# the client MUST throw an exception when attempting to decrypt an object encrypted 
        //# with a legacy unauthenticated algorithm suite.
        $this->expectExceptionMessage('The requested object is encrypted'
            . ' with V1 encryption schemas that have been disabled'
            . ' by client configuration @SecurityProfile=V3');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getLegacyKeywrapMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);
    }

    public function testGetObjectThrowsOnMismatchAlgorithm(): void
    {
        $this->expectExceptionMessage('There is a mismatch in specified content'
            . ' encryption algrithm between the materials description'
            . ' value and the metadata envelope value');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getMismatchV2GcmMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);
    }

    //= ../specification/s3-encryption/client.md#enable-legacy-wrapping-algorithms
    //= type=test
    //# When enabled, the S3EC MUST be able to decrypt objects encrypted with all supported wrapping algorithms (both legacy and fully supported).
    public function testGetObjectWithLegacyCbcMetadata(): void
    {
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $providerV1 = new KmsMaterialsProvider($kms);
        $providerV3 = new KmsMaterialsProviderV3($kms);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($providerV1) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidV1CbcMetadataFields($providerV1)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);

        // Suppressing known warning for 'V3_AND_LEGACY' security profile warning
        // Necessary to test decrypting with legacy metadata
        $result = @$client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $providerV3,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            //= ../specification/s3-encryption/decryption.md#legacy-decryption
            //= type=test
            //# The S3EC MUST NOT decrypt objects encrypted using legacy unauthenticated algorithm suites unless specifically configured to do so.
            '@SecurityProfile' => 'V3_AND_LEGACY',
            '@KmsAllowDecryptWithAnyCmk' => true,
        ]);

        $this->assertInstanceOf(AesDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithLegacyGcmMetadata(): void
    {
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProviderV3($kms);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidV1GcmMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@KmsAllowDecryptWithAnyCmk' => true,
            '@SecurityProfile' => 'V3',
        ]);

        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithV2GcmMetadata(): void
    {
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'aws:x-amz-cek-alg' => 'AES/GCM/NoPadding'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProviderV3($kms, 'foo');

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidV2GcmMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        //= ../specification/s3-encryption/key-commitment.md#commitment-policy
        //= type=test
        //# When the commitment policy is FORBID_ENCRYPT_ALLOW_DECRYPT,
        //# the S3EC MUST allow decryption using algorithm suites which do not support key commitment.
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);

        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithClientInstructionFileSuffix(): void
    {
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $responded = false;
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider, &$responded) {
                if ($responded) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        json_encode(
                            $this->getValidV2GcmMetadataFields($provider)
                        )
                    ));
                }

                $responded = true;
                return new FulfilledPromise(new Response(
                    200,
                    [],
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3(
            $s3,
            InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX
        );
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);

        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithOperationInstructionFileSuffix(): void
    {
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $responded = false;
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider, &$responded) {
                if ($responded) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        json_encode(
                            $this->getValidV2GcmMetadataFields($provider)
                        )
                    ));
                }

                $responded = true;
                return new FulfilledPromise(new Response(
                    200,
                    [],
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
            '@InstructionFileSuffix' =>
                InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX
        ]);

        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectSavesFile(): void
    {
        $file = sys_get_temp_dir() . '/CSE_Save_Test.txt';
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidV1CbcMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $result = @$client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3_AND_LEGACY',
            'SaveAs' => $file
        ]);

        $this->assertStringEqualsFile($file, (string) $result['Body']);
    }

    public function testEmitsWarningForLegacySecurityProfile(): void
    {
        set_error_handler(function ($errno, $errstr) {
            throw new \RuntimeException($errstr, $errno);
        }, E_USER_WARNING);
        $this->expectExceptionMessage('This S3 Encryption Client operation'
            . ' is configured to read encrypted data with legacy encryption modes');
        $this->expectException(\RuntimeException::class);

        try {
            $kms = $this->getKmsClient();
            $list = $kms->getHandlerList();
            $list->setHandler(function ($cmd, $req) {
                // Verify decryption command has correct parameters
                $this->assertSame('cek', $cmd['CiphertextBlob']);
                $this->assertEquals(
                    [
                        'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                    ],
                    $cmd['EncryptionContext']
                );
                return Promise\Create::promiseFor(
                    new Result(['Plaintext' => random_bytes(32)])
                );
            });
            $providerV1 = new KmsMaterialsProvider($kms);
            $providerV3 = new KmsMaterialsProviderV3($kms);

            $s3 = new S3Client([
                'region' => 'us-west-2',
                'version' => 'latest',
                'http_handler' => function () use ($providerV1) {
                    return new FulfilledPromise(new Response(
                        200,
                        $this->getFieldsAsMetaHeaders(
                            $this->getValidV1CbcMetadataFields($providerV1)
                        ),
                        'test'
                    ));
                },
            ]);

            $client = new S3EncryptionClientV3($s3);
            $client->getObject([
                'Bucket' => 'foo',
                'Key' => 'bar',
                '@MaterialsProvider' => $providerV3,
                '@CommitmentPolicy' => "FORBID_ENCRYPT_ALLOW_DECRYPT",
                '@SecurityProfile' => 'V3_AND_LEGACY',
            ]);
        } finally {
            restore_error_handler();
        }
    }

    public function testThrowsForV3ProfileAndLegacyObject(): void
    {
        $this->expectExceptionMessage('The requested object is encrypted with'
            . ' V1 encryption schemas that have been disabled'
            . ' by client configuration @SecurityProfile=V3');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $providerV1 = new KmsMaterialsProvider($kms);
        $providerV3 = new KmsMaterialsProviderV3($kms);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($providerV1) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidV1CbcMetadataFields($providerV1)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $providerV3,
            '@CommitmentPolicy' => "FORBID_ENCRYPT_ALLOW_DECRYPT",
            '@SecurityProfile' => 'V3',
            '@KmsAllowDecryptWithAnyCmk' => true,
        ]);
    }

    public function testThrowsForNoSecurityProfile(): void
    {
        $this->expectExceptionMessage('@SecurityProfile is required and must be set to \'V3\' '
            . 'or \'V3_AND_LEGACY\'');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@CommitmentPolicy' => "FORBID_ENCRYPT_ALLOW_DECRYPT",
            '@MaterialsProvider' => new KmsMaterialsProviderV3(
                $this->getKmsClient()
            ),
        ]);
    }

    public function testThrowsForIncorrectSecurityProfile(): void
    {
        $this->expectExceptionMessage('@SecurityProfile is required and must be set to \'V3\' '
            . 'or \'V3_AND_LEGACY\'');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@CommitmentPolicy' => "FORBID_ENCRYPT_ALLOW_DECRYPT",
            '@MaterialsProvider' => new KmsMaterialsProviderV3(
                $this->getKmsClient()
            ),
            '@SecurityProfile' => 'AcmeSecurity'
        ]);
    }

    public function testAppendsMetricsCaptureMiddleware(): void
    {
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'foo');
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $req) use ($provider) {
                $this->assertTrue(
                    in_array(
                        MetricsBuilder::S3_CRYPTO_V3,
                        $this->getMetricsAsArray($req)
                    )
                );

                return Promise\Create::promiseFor(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidV2GcmMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);
    }

    // Key Commitment Tests


    #[DataProvider('getValidMaterialsProviders')]
    public function testPutObjectTakesValidMaterialsProvidersKC(
        $provider,
        $exception
    ): void
    {
        if ($exception) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        }

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@CipherOptions' => [
                'Cipher' => 'gcm',
            ],
            '@KmsEncryptionContext' => [
                'marco' => 'polo'
            ],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * Test that putObject requires @CommitmentPolicy parameter
     */
    public function testPutObjectRequiresCommitmentPolicy(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('A commitment policy must be specified in the CommitmentPolicy field.');
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key');
        
        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
            // Missing @CommitmentPolicy
        ]);
    }

    /**
     * Test that putObject rejects invalid commitment policies
     */
    #[DataProvider('getInvalidCommitmentPolicies')]
    public function testPutObjectRejectsInvalidCommitmentPolicy($policy, $expectedException): void
    {
        $this->expectException($expectedException[0]);
        $this->expectExceptionMessage($expectedException[1]);
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key');
        
        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => $policy,
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
        ]);
    }

    /**
     * Test that getObject requires @CommitmentPolicy parameter
     */
    public function testGetObjectRequiresCommitmentPolicy(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('A commitment policy must be specified in the CommitmentPolicy field.');
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key');
        
        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@SecurityProfile' => 'V3',
            // Missing @CommitmentPolicy
        ]);
    }

    /**
     * Test that getObject requires V3 security profiles
     */
    public function testGetObjectRequiresV3SecurityProfile(): void
    {
        $this->expectException(\Aws\Exception\CryptoException::class);
        $this->expectExceptionMessage("@SecurityProfile is required and must be set to 'V3' or 'V3_AND_LEGACY'");
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key');
        
        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            // Missing @SecurityProfile
        ]);
    }

    /**
     * Test that V2 security profiles are rejected in V3
     */
    #[DataProvider('getV2SecurityProfiles')]
    public function testGetObjectRejectsV2SecurityProfiles($securityProfile): void
    {
        $this->expectException(\Aws\Exception\CryptoException::class);
        $this->expectExceptionMessage("@SecurityProfile is required and must be set to 'V3' or 'V3_AND_LEGACY'");
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key');
        
        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@SecurityProfile' => $securityProfile,
        ]);
    }

    /**
     * Test valid V3 security profiles are accepted
     */
    #[DataProvider('getValidV3SecurityProfiles')]
    public function testGetObjectAcceptsValidV3SecurityProfiles($securityProfile): void
    {
        set_error_handler(function ($errno, $errstr) {
            throw new \RuntimeException($errstr, $errno);
        }, E_USER_WARNING);
        if ($securityProfile === 'V3_AND_LEGACY') {
            $this->expectExceptionMessage("This S3 Encryption Client operation is configured to read encrypted data with legacy encryption modes");
            $this->expectException(\RuntimeException::class);
        } elseif ($securityProfile === 'V3') {
            $this->expectExceptionMessage("Invalid MessageId length found in object envelope.");
            $this->expectException(\Aws\Exception\CryptoException::class);
        }
        try {
            $kms = $this->getKmsClient();
            $provider = new KmsMaterialsProviderV3($kms, 'test-key');
            $this->addMockResults($kms, [
                new Result(['Plaintext' => random_bytes(32)])
            ]);

            $s3 = new S3Client([
                'region' => 'us-west-2',
                'version' => 'latest',
                'http_handler' => function () use ($provider) {
                    return new FulfilledPromise(new Response(
                        200,
                        $this->getFieldsAsMetaHeaders(
                            $this->getValidV3MetadataFields($provider)
                        ),
                        'test'
                    ));
                },
            ]);

            $client = new S3EncryptionClientV3($s3);
            $result = $client->getObject([
                'Bucket' => 'foo',
                'Key' => 'bar',
                '@MaterialsProvider' => $provider,
                '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
                '@SecurityProfile' => $securityProfile,
            ]);

            $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
        } finally {
            restore_error_handler();
        }
    }

    /**
     * Test that putObject rejects V2 materials providers
     */
    public function testPutObjectRejectsV2MaterialsProvider(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('An instance of MaterialsProviderInterfaceV3 must be passed in the "MaterialsProvider" field.');
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $providerV2 = new \Aws\Crypto\KmsMaterialsProviderV2($kms, 'test-key'); // V2 provider
        
        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $providerV2, // Wrong interface version
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
        ]);
    }

    /**
     * Test that getObject rejects V2 materials providers
     */
    public function testGetObjectRejectsV2MaterialsProvider(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('An instance of MaterialsProviderInterfaceV3 must be passed in the "MaterialsProvider" field.');
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $providerV2 = new \Aws\Crypto\KmsMaterialsProviderV2($kms, 'test-key'); // V2 provider
        
        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $providerV2, // Wrong interface version
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@SecurityProfile' => 'V3',
        ]);
    }

    /**
     * Test that legacy V1 materials providers are rejected
     */
    public function testRejectsLegacyMaterialsProvider(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('An instance of MaterialsProviderInterfaceV3 must be passed in the "MaterialsProvider" field.');
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $providerV1 = new KmsMaterialsProvider($kms); // V1 provider
        
        $client = new S3EncryptionClientV3($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $providerV1, // Legacy provider
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
        ]);
    }

    /**
     * Test that if supplied with an S3EC on intialization error is thrown
     */
    public function testExceptionThrownForNestedS3ECOnCreation(): void
    {
        $this->expectException(TypeError::class);
        //= ../specification/s3-encryption/client.md#wrapped-s3-client-s
        //= type=test
        //# The S3EC MUST NOT support use of S3EC as the provided S3 client during its initialization; it MUST throw an exception in this case.
        $this->expectExceptionMessage('Aws\S3\Crypto\S3EncryptionClientV3::__construct():'
            . ' Argument #1 ($client) must be of type Aws\S3\S3Client, Aws\S3\Crypto\S3EncryptionClientV3 given'
        );
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $providerV1 = new KmsMaterialsProviderV3($kms); // V1 provider
        
        $client = new S3EncryptionClientV3($s3);

        $nestedClient = new S3EncryptionClientV3($client);
        $nestedClient->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $providerV1, // Legacy provider
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
        ]);
    }

    /**
     * Test that configured algorithm on PUT is not a legacy algorithm
     */
    public function testExceptionThrownForLegacyAlgorithmOnPut(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        //= ../specification/s3-encryption/client.md#encryption-algorithm
        //= type=test
        //# If the configured encryption algorithm is legacy, then the S3EC MUST throw an exception.
        $this->expectExceptionMessage('The cipher requested is not supported by the SDK');
        
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms);
        
        $client = new S3EncryptionClientV3($s3);

        //= ../specification/s3-encryption/client.md#encryption-algorithm
        //= type=test
        //# The S3EC MUST validate that the configured encryption algorithm is not legacy.
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider, // Legacy provider
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'cbc'],
            '@KmsEncryptionContext' => [],
        ]);
    }

    /**
     * Test that we validate the commitment policy with the encryption algorithm
     */
    #[DataProvider('getCiphersAndKCPolicies')]
    public function testCompatibleCipherAndKC(
        $cipherName,
        $keySize,
        $commitmentPolicy,
        $s3MockCount
    ): void
    {
        $s3 = $this->getS3Client();
        $i = 0;
        $results = [];
        while ($i++ < $s3MockCount) {
            $results[] = new Result(['ObjectURL' => 'file_url']);
        }
        $this->addMockResults($s3, $results);
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV3($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);
        
        $client = new S3EncryptionClientV3($s3);

        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => $commitmentPolicy,
            '@CipherOptions' => [
                'Cipher' => $cipherName,
                'KeySize' => $keySize
            ],
            '@KmsEncryptionContext' => [],
        ]);
        //= ../specification/s3-encryption/client.md#key-commitment
        //= type=test
        //# The S3EC MUST validate the configured Encryption Algorithm against the provided key commitment policy.
        $this->assertTrue($this->mockQueueEmpty());
    }
    
    /**
     * Test that we validate the commitment policy with the encryption algorithm
     */
    #[DataProvider('getIncompatibleCiphersAndKCPolicies')]
    public function testIncompatibleCipherAndKC(
        $cipherName,
        $keySize,
        $commitmentPolicy,
    ): void
    {
        //= ../specification/s3-encryption/client.md#key-commitment
        //= type=test
        //# If the configured Encryption Algorithm is incompatible with the key commitment policy, then it MUST throw an exception.
        if ($keySize === 128) {
            $this->expectExceptionMessage('The cipher "KeySize" requested'
                . ' is not supported by AES (256).');
        } elseif ($cipherName == 'cbc') {
            $this->expectExceptionMessage('The cipher requested is not'
                . ' supported by the SDK.');
        }
        $s3 = $this->getS3Client();
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms);
        
        $client = new S3EncryptionClientV3($s3);

        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => $commitmentPolicy,
            '@CipherOptions' => [
                'Cipher' => $cipherName,
                'KeySize' => $keySize
            ],
            '@KmsEncryptionContext' => [],
        ]);
    }
    
    /**
     * Test that we validate the commitment policy with the encryption algorithm
     */
    #[DataProvider('getKCPolicies')]
    public function testIncompatibleCipherCBCAndKCGetObject(
        $commitmentPolicy
    ): void
    {
        if ($commitmentPolicy === 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT')
        {
            //= ../specification/s3-encryption/client.md#key-commitment
            //= type=test
            //# If the configured Encryption Algorithm is incompatible with the key commitment policy, then it MUST throw an exception.
            $this->expectException(CryptoException::class);
            $this->expectExceptionMessage('Message is encrypted with a non commiting algorithm'
                . ' but commitment policy is set to REQUIRE_ENCRYPT_REQUIRE_DECRYPT.'
                . ' Select a valid commitment policy to decrypt this object');
        }
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $providerV1 = new KmsMaterialsProvider($kms);
        $providerV3 = new KmsMaterialsProviderV3($kms);

        // These are cbc legacy objects
        // REQUIRE_ENCRYPT_ALLOW_DECRYPT and FORBID_ENCRYPT_ALLOW_DECRYPT
        // should be able to decrypt 
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($providerV1) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidV1CbcMetadataFields($providerV1)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);

        // Suppressing known warning for 'V3_AND_LEGACY' security profile warning
        // Necessary to test decrypting with legacy metadata
        $result = @$client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $providerV3,
            '@CommitmentPolicy' => $commitmentPolicy,
            '@SecurityProfile' => 'V3_AND_LEGACY',
            '@KmsAllowDecryptWithAnyCmk' => true,
        ]);
        
        //= ../specification/s3-encryption/key-commitment.md#commitment-policy
        //= type=test
        //# When the commitment policy is REQUIRE_ENCRYPT_ALLOW_DECRYPT, the S3EC MUST allow decryption using algorithm suites which do not support key commitment.
        if (
            $commitmentPolicy === 'REQUIRE_ENCRYPT_ALLOW_DECRYPT' ||
            $commitmentPolicy === 'FORBID_ENCRYPT_ALLOW_DECRYPT')
        {
            //= ../specification/s3-encryption/client.md#key-commitment
            //= type=test
            //# The S3EC MUST validate the configured Encryption Algorithm against the provided key commitment policy.
            $this->assertInstanceOf(AesDecryptingStream::class, $result['Body']);
        }
    }
    
    /**
     * Test that we validate the commitment policy with the encryption algorithm
     */
    #[DataProvider('getKCPolicies')]
    public function testIncompatibleCipherGCMAndKCGetObject(
        $commitmentPolicy
    ): void
    {
        if ($commitmentPolicy === 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT')
        {
            //= ../specification/s3-encryption/client.md#key-commitment
            //= type=test
            //# If the configured Encryption Algorithm is incompatible with the key commitment policy, then it MUST throw an exception.
            $this->expectException(CryptoException::class);
            $this->expectExceptionMessage('Message is encrypted with a non commiting algorithm'
                . ' but commitment policy is set to REQUIRE_ENCRYPT_REQUIRE_DECRYPT.'
                . ' Select a valid commitment policy to decrypt this object');
        }
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function ($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertSame('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'aws:x-amz-cek-alg' => 'AES/GCM/NoPadding'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\Create::promiseFor(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProviderV3($kms, 'foo');

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        //= ../specification/s3-encryption/key-commitment.md#commitment-policy
                        //= type=test
                        //# When the commitment policy is REQUIRE_ENCRYPT_REQUIRE_DECRYPT,
                        //# the S3EC MUST NOT allow decryption using algorithm suites which do not support key commitment.
                        $this->getValidV2GcmMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV3($s3);
        //= ../specification/s3-encryption/client.md#key-commitment
        //= type=test
        //# The S3EC MUST validate the configured Encryption Algorithm against the provided key commitment policy.
        $result = @$client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@CommitmentPolicy' => $commitmentPolicy,
            '@SecurityProfile' => 'V3_AND_LEGACY',
        ]);
    }

    public function testFENADEncryptsV2Object(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                // Verify ALL required encryption metadata is present in headers
                //= ../specification/s3-encryption/data-format/metadata-strategy.md#object-metadata
                //= type=test
                //# By default, the S3EC MUST store content metadata in the S3 Object Metadata.
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_KEY_V2_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::IV_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER));
                
                // Verify this is NOT an instruction file request
                $uri = $request->getUri();
                $this->assertStringNotContainsString('.instruction', $uri->getPath(), 
                    'Default metadata strategy should not create instruction files');
                    
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key-id');
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted-key',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        
        // NOTE: Intentionally NOT specifying @MetadataStrategy to test default behavior
        $client->putObject([
            'Bucket' => 'test-bucket',
            'Key' => 'test-key',
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            //= ../specification/s3-encryption/key-commitment.md#commitment-policy
            //= type=test
            //# When the commitment policy is FORBID_ENCRYPT_ALLOW_DECRYPT, the S3EC MUST NOT encrypt using an algorithm suite which supports key commitment.
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    public function testFENADDecryptsV2Object(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                // Verify ALL required encryption metadata is present in headers
                //= ../specification/s3-encryption/data-format/metadata-strategy.md#object-metadata
                //= type=test
                //# By default, the S3EC MUST store content metadata in the S3 Object Metadata.
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_KEY_V2_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::IV_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER));
                
                // Verify this is NOT an instruction file request
                $uri = $request->getUri();
                $this->assertStringNotContainsString('.instruction', $uri->getPath(), 
                    'Default metadata strategy should not create instruction files');
                    
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key-id');
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted-key',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV3($s3);
        
        // NOTE: Intentionally NOT specifying @MetadataStrategy to test default behavior
        $client->putObject([
            'Bucket' => 'test-bucket',
            'Key' => 'test-key',
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            //= ../specification/s3-encryption/key-commitment.md#commitment-policy
            //= type=test
            //# When the commitment policy is FORBID_ENCRYPT_ALLOW_DECRYPT, the S3EC MUST NOT encrypt using an algorithm suite which supports key commitment.
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
            '@CipherOptions' => ['Cipher' => 'gcm'],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }
    
    public function testPutObjectREADKcProducesV3Object(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTED_DATA_KEY_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_CIPHER_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::KEY_COMMITMENT_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::MESSAGE_ID_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTION_CONTEXT_V3));
                
                // Verify this is NOT an instruction file request
                $uri = $request->getUri();
                $this->assertStringNotContainsString('.instruction', $uri->getPath(), 
                    'Default metadata strategy should not create instruction files');
                    
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key-id');
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted-key',
                'Plaintext' => random_bytes(32),
            ])
        ]);


        $client = new S3EncryptionClientV3($s3);
        $result = $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => ['Cipher' => 'gcm'],
            //= ../specification/s3-encryption/key-commitment.md#commitment-policy
            //= type=test
            //# When the commitment policy is REQUIRE_ENCRYPT_ALLOW_DECRYPT, the S3EC MUST only encrypt using an algorithm suite which supports key commitment.
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_ALLOW_DECRYPT',
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }
    
    public function testPutObjectRERDKcProducesV3Object(): void
    {
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function (RequestInterface $request) {
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTED_DATA_KEY_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::CONTENT_CIPHER_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::KEY_COMMITMENT_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::MESSAGE_ID_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3));
                $this->assertNotEmpty($request->getHeader('x-amz-meta-' . MetadataEnvelope::ENCRYPTION_CONTEXT_V3));
                
                // Verify this is NOT an instruction file request
                $uri = $request->getUri();
                $this->assertStringNotContainsString('.instruction', $uri->getPath(), 
                    'Default metadata strategy should not create instruction files');
                    
                return new FulfilledPromise(new Response(200, [], $this->getSuccessfulPutObjectResponse()));
            },
        ]);

        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV3($kms, 'test-key-id');
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted-key',
                'Plaintext' => random_bytes(32),
            ])
        ]);


        $client = new S3EncryptionClientV3($s3);
        $result = $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test-data',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => ['Cipher' => 'gcm'],
            //= ../specification/s3-encryption/key-commitment.md#commitment-policy
            //= type=test
            //# When the commitment policy is REQUIRE_ENCRYPT_REQUIRE_DECRYPT, the S3EC MUST only encrypt using an algorithm suite which supports key commitment.
            '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }
}
