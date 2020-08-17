<?php
namespace Aws\Test\S3\Crypto;

use Aws\Crypto\MaterialsProviderInterface;
use Aws\Result;
use Aws\HashingStream;
use Aws\Crypto\AesDecryptingStream;
use Aws\Crypto\AesGcmDecryptingStream;
use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\Crypto\MetadataEnvelope;
use Aws\S3\S3Client;
use Aws\S3\Crypto\HeadersMetadataStrategy;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;
use Aws\S3\Crypto\S3EncryptionClientV2;
use Aws\Test\Crypto\UsesCryptoParamsTraitV2;
use Aws\Test\UsesServiceTrait;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

class S3EncryptionClientV2Test extends TestCase
{
    use UsesServiceTrait, UsesMetadataEnvelopeTrait, UsesCryptoParamsTraitV2;

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

    private function setupProvidedExpectedException($exception)
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException($exception[0]);
            $this->expectExceptionMessage($exception[1]);
        } else {
            $this->setExpectedException($exception[0], $exception[1]);
        }
    }

    /**
     * @dataProvider getValidMaterialsProviders
     */
    public function testPutObjectTakesValidMaterialsProviders(
        $provider,
        $exception
    ) {
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
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

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => [
                'Cipher' => 'gcm',
            ]
        ]);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getInvalidMaterialsProviders
     */
    public function testPutObjectRejectsInvalidMaterialsProviders(
        $provider,
        $exception
    ) {
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ]
        ]);
    }

    /**
     * @dataProvider getValidMetadataStrategies
     */
    public function testPutObjectTakesValidMetadataStrategy(
        $strategy,
        $exception,
        $s3MockCount
    ) {
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();
        $i = 0;
        $results = [];
        while ($i++ < $s3MockCount) {
            $results [] = new Result(['ObjectURL' => 'file_url']);
        }
        $this->addMockResults($s3, $results);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@MetadataStrategy' => $strategy,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ]
        ]);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getInvalidMetadataStrategies
     */
    public function testPutObjectRejectsInvalidMetadataStrategy($strategy, $exception)
    {
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@MetadataStrategy' => $strategy,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ]
        ]);
    }

    public function testPutObjectWithClientInstructionFileSuffix()
    {
        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url']),
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV2(
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
            ]
        ]);
        $this->assertTrue($this->mockQueueEmpty());
    }

    public function testPutObjectWithOperationInstructionFileSuffix()
    {
        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url']),
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@InstructionFileSuffix' => InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ]
        ]);
        $this->assertTrue($this->mockQueueEmpty());
    }

    /**
     * @dataProvider getCiphers
     */
    public function testPutObjectValidatesCipher(
        $cipher,
        $exception = null
    ) {
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => [
                'Cipher' => $cipher
            ]
        ]);
    }

    /**
     * @dataProvider getKeySizes
     */
    public function testPutObjectValidatesKeySize(
        $keySize,
        $exception
    ) {
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
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
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
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

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => $cipherOptions
        ]);
    }

    private function getSuccessfulPutObjectResponse()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<PutObjectResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <ObjectURL>file_url</ObjectURL>
</PutObjectResult>
EOXML;
    }

    public function testPutObjectWrapsBodyInAesGcmEncryptingStream()
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
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $client = new S3EncryptionClientV2($s3);
        $client->putObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Body' => 'test',
            '@MaterialsProvider' => $provider,
            '@CipherOptions' => [
                'Cipher' => 'gcm'
            ]
        ]);
        $this->assertTrue($this->mockQueueEmpty());
    }

    private function getInvalidCipherMetadataFields(MaterialsProviderInterface $provider)
    {
        $fields = [];
        $fields[MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER]
            = $provider->getWrapAlgorithmName();
        $fields[MetadataEnvelope::IV_HEADER]
            = base64_encode($provider->generateIv('aes-256-cbc'));
        $fields[MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER]
            = 0;
        $fields[MetadataEnvelope::CONTENT_KEY_V2_HEADER]
            = base64_encode('cek');
        $fields[MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER]
            = json_encode(['kms_cmk_id' => '11111111-2222-3333-4444-555555555555']);
        $fields[MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER]
            = 'Not a cipher';

        return $fields;
    }

    private function getValidCbcMetadataFields(MaterialsProviderInterface $provider)
    {
        $fields = [];
        $fields[MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER]
            = $provider->getWrapAlgorithmName();
        $fields[MetadataEnvelope::IV_HEADER]
            = base64_encode($provider->generateIv('aes-256-cbc'));
        $fields[MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER]
            = 0;
        $fields[MetadataEnvelope::CONTENT_KEY_V2_HEADER]
            = base64_encode('cek');
        $fields[MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER]
            = json_encode(['kms_cmk_id' => '11111111-2222-3333-4444-555555555555']);
        $fields[MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER]
            = 'AES/CBC/PKCS5Padding';

        return $fields;
    }

    private function getValidGcmMetadataFields(MaterialsProviderInterface $provider)
    {
        $fields = [];
        $fields[MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER]
            = $provider->getWrapAlgorithmName();
        $fields[MetadataEnvelope::IV_HEADER]
            = base64_encode($provider->generateIv('aes-256-gcm'));
        $fields[MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER]
            = 0;
        $fields[MetadataEnvelope::CONTENT_KEY_V2_HEADER]
            = base64_encode('cek');
        $fields[MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER]
            = json_encode(['aws:x-amz-cek-alg' => 'AES/GCM/NoPadding']);
        $fields[MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER]
            = 'AES/GCM/NoPadding';

        return $fields;
    }

    private function getValidLegacysGcmMetadataFields(MaterialsProviderInterface $provider)
    {
        $fields = [];
        $fields[MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER]
            = $provider->getWrapAlgorithmName();
        $fields[MetadataEnvelope::IV_HEADER]
            = base64_encode($provider->generateIv('aes-256-gcm'));
        $fields[MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER]
            = 0;
        $fields[MetadataEnvelope::CONTENT_KEY_V2_HEADER]
            = base64_encode('cek');
        $fields[MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER]
            = json_encode(['kms_cmk_id' => '11111111-2222-3333-4444-555555555555']);
        $fields[MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER]
            = 'AES/GCM/NoPadding';

        return $fields;
    }

    /**
     * @expectedException RuntimeException
     * @expectedExceptionMessage Unrecognized or unsupported AESName for reverse lookup.
     */
    public function testGetObjectThrowsOnInvalidCipher()
    {
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV2($kms);
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

        $client = new S3EncryptionClientV2($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider
        ]);
        $this->assertInstanceOf(AesDecryptingStream::class, $result['Body']);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Not able to detect the materials description.
     */
    public function testFromDecryptionEnvelopeEmptyKmsMaterialException()
    {
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $strategy = new HeadersMetadataStrategy();
        $envelope = $strategy->load([]);
        $provider->fromDecryptionEnvelope($envelope);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Not able to detect kms_cmk_id (legacy implementation) or aws:x-amz-cek-alg (current implementation)
     */
    public function testFromDecryptionEnvelopeInvalidKmsMaterialException()
    {
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $strategy = new HeadersMetadataStrategy();
        $args['Metadata'][MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER] = 'foo';
        $envelope = $strategy->load($args);
        $provider->fromDecryptionEnvelope($envelope);
    }

    public function testGetObjectWithLegacyCbcMetadata()
    {
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertEquals('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\promise_for(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProviderV2($kms);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidCbcMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV2($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider
        ]);
        $this->assertInstanceOf(AesDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithLegacyGcmMetadata()
    {
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertEquals('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'kms_cmk_id' => '11111111-2222-3333-4444-555555555555'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\promise_for(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProviderV2($kms);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidLegacysGcmMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV2($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider
        ]);
        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithV2GcmMetadata()
    {
        $kms = $this->getKmsClient();
        $list = $kms->getHandlerList();
        $list->setHandler(function($cmd, $req) {
            // Verify decryption command has correct parameters
            $this->assertEquals('cek', $cmd['CiphertextBlob']);
            $this->assertEquals(
                [
                    'aws:x-amz-cek-alg' => 'AES/GCM/NoPadding'
                ],
                $cmd['EncryptionContext']
            );
            return Promise\promise_for(
                new Result(['Plaintext' => random_bytes(32)])
            );
        });
        $provider = new KmsMaterialsProviderV2($kms);

        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use ($provider) {
                return new FulfilledPromise(new Response(
                    200,
                    $this->getFieldsAsMetaHeaders(
                        $this->getValidGcmMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV2($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider
        ]);
        $this->assertInstanceOf(AesGcmDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithClientInstructionFileSuffix()
    {
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV2($kms);
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $responded = false;
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use (
                $provider,
                &$responded
            ) {
                if ($responded) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        json_encode(
                            $this->getValidCbcMetadataFields($provider)
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

        $client = new S3EncryptionClientV2(
            $s3,
            InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX
        );
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider
        ]);
        $this->assertInstanceOf(AesDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectWithOperationInstructionFileSuffix()
    {
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV2($kms);
        $this->addMockResults($kms, [
            new Result(['Plaintext' => random_bytes(32)])
        ]);

        $responded = false;
        $s3 = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () use (
                $provider,
                &$responded
            ) {
                if ($responded) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        json_encode(
                            $this->getValidCbcMetadataFields($provider)
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

        $client = new S3EncryptionClientV2($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            '@InstructionFileSuffix' =>
                InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX
        ]);
        $this->assertInstanceOf(AesDecryptingStream::class, $result['Body']);
    }

    public function testGetObjectSavesFile()
    {
        $file = sys_get_temp_dir() . '/CSE_Save_Test.txt';
        $kms = $this->getKmsClient();
        $provider = new KmsMaterialsProviderV2($kms);
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
                        $this->getValidCbcMetadataFields($provider)
                    ),
                    'test'
                ));
            },
        ]);

        $client = new S3EncryptionClientV2($s3);
        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key' => 'bar',
            '@MaterialsProvider' => $provider,
            'SaveAs' => $file
        ]);
        $this->assertStringEqualsFile($file, (string)$result['Body']);
    }
}
