<?php
namespace Aws\Test\S3\Crypto;

use Aws\Crypto\AesDecryptingStream;
use Aws\Crypto\AesGcmDecryptingStream;
use Aws\Crypto\KmsMaterialsProvider;
use Aws\Crypto\KmsMaterialsProviderV3;
use Aws\Crypto\MetadataEnvelope;
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
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;

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

    /**
     * @dataProvider getValidMaterialsProviders
     */
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
            '@CipherOptions' => [
                'Cipher' => 'gcm',
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getInvalidMaterialsProviders
     */
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
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);
    }

    /**
     * @dataProvider getValidMetadataStrategies
     */
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
            '@MetadataStrategy' => $strategy,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getInvalidMetadataStrategies
     */
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
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@InstructionFileSuffix' => InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getCiphers
     */
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
            '@CipherOptions' => [
                'Cipher' => $cipher
            ],
            '@KmsEncryptionContext' => [],
        ]);
    }

    /**
     * @dataProvider getKeySizes
     */
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
        $this->expectExceptionMessage('\'Aad\' has been supplied for content encryption'
            . ' with AES/GCM/NoPadding');
        $this->expectWarning();
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
            '@CipherOptions' => [
                'Cipher' => 'gcm',
                'Aad' => 'test'
            ],
            '@KmsEncryptionContext' => [],
        ]);

        $this->assertTrue($this->mockQueueEmpty());
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
            '@SecurityProfile' => 'V2',
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
            '@SecurityProfile' => 'V2',
        ]);
    }

    public function testGetObjectThrowsOnLegacyKeywrap(): void
    {
        $this->expectExceptionMessage('The requested object is encrypted'
            . ' with V1 encryption schemas that have been disabled'
            . ' by client configuration @SecurityProfile=V2');
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
            '@SecurityProfile' => 'V2',
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
            '@SecurityProfile' => 'V2',
        ]);
    }

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

        // Suppressing known warning for 'V2_AND_LEGACY' security profile warning
        // Necessary to test decrypting with legacy metadata
        $result = @$client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $providerV3,
            '@SecurityProfile' => 'V2_AND_LEGACY',
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
            '@KmsAllowDecryptWithAnyCmk' => true,
            '@SecurityProfile' => 'V2',
        ]);

        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithV3GcmMetadata(): void
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
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@SecurityProfile' => 'V2',
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
            '@SecurityProfile' => 'V2',
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
            '@SecurityProfile' => 'V2',
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
            '@SecurityProfile' => 'V2_AND_LEGACY',
            'SaveAs' => $file
        ]);

        $this->assertStringEqualsFile($file, (string) $result['Body']);
    }

    public function testEmitsWarningForLegacySecurityProfile(): void
    {
        $this->expectExceptionMessage('This S3 Encryption Client operation'
            . ' is configured to read encrypted data with legacy encryption modes');
        $this->expectWarning();
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
            '@SecurityProfile' => 'V2_AND_LEGACY',
        ]);
    }

    public function testThrowsForV3ProfileAndLegacyObject(): void
    {
        $this->expectExceptionMessage('The requested object is encrypted with'
            . ' V1 encryption schemas that have been disabled'
            . ' by client configuration @SecurityProfile=V2');
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
            '@SecurityProfile' => 'V2',
            '@KmsAllowDecryptWithAnyCmk' => true,
        ]);
    }

    public function testThrowsForNoSecurityProfile(): void
    {
        $this->expectExceptionMessage('@SecurityProfile is required and must be set to \'V2\' '
            . 'or \'V2_AND_LEGACY\'');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => new KmsMaterialsProviderV3(
                $this->getKmsClient()
            ),
        ]);
    }

    public function testThrowsForIncorrectSecurityProfile(): void
    {
        $this->expectExceptionMessage('@SecurityProfile is required and must be set to \'V2\' '
            . 'or \'V2_AND_LEGACY\'');
        $this->expectException(\Aws\Exception\CryptoException::class);
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
        ]);

        $client = new S3EncryptionClientV3($s3);
        $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
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
                        MetricsBuilder::S3_CRYPTO_V2,
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
            '@SecurityProfile' => 'V2',
        ]);
    }
}
