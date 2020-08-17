<?php
namespace Aws\Test\S3\Crypto;

use Aws\CommandInterface;
use Aws\Middleware;
use Aws\S3\Crypto\S3EncryptionMultipartUploaderV2;
use Aws\Result;
use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;
use Aws\Test\Crypto\UsesCryptoParamsTraitV2;
use Aws\Test\UsesServiceTrait;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class S3EncryptionMultipartUploaderV2Test extends TestCase
{
    use UsesServiceTrait, UsesMetadataEnvelopeTrait, UsesCryptoParamsTraitV2;

    const MB = 1048576;
    const TEST_URL = 'http://foo.s3.amazonaws.com/bar';

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
        $this->skipTestForPolyfillPhpVersions();

        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => self::TEST_URL]),
        ]);

        $kms = $this->getKmsClient();
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ]),
        ]);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($this->mockQueueEmpty());
        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(self::TEST_URL, $result['ObjectURL']);
    }

    /**
     * @dataProvider getInvalidMaterialsProviders
     */
    public function testPutObjectRejectsInvalidMaterialsProviders(
        $provider,
        $exception
    ) {
        $this->skipTestForPolyfillPhpVersions();

        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
            ]
        );
        $uploader->upload();
    }

    /**
     * @dataProvider getValidMetadataStrategies
     */
    public function testPutObjectTakesValidMetadataStrategy(
        $strategy,
        $exception,
        $s3MockCount
    ) {
        $this->skipTestForPolyfillPhpVersions();

        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();
        $i = 1;
        $results = [];
        while ($i++ < $s3MockCount) {
            $results [] = new Result(['ObjectURL' => 'file_url']);
        }
        $results []= new Result(['UploadId' => 'baz']);
        $results []= new Result(['ETag' => 'A']);
        $results []= new Result(['ETag' => 'B']);
        $results []= new Result(['ETag' => 'C']);
        $results []= new Result(['Location' => self::TEST_URL]);
        $this->addMockResults($s3, $results);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ]),
        ]);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@MetadataStrategy' => $strategy,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($this->mockQueueEmpty());
        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(self::TEST_URL, $result['ObjectURL']);
    }

    /**
     * @dataProvider getInvalidMetadataStrategies
     */
    public function testPutObjectRejectsInvalidMetadataStrategy(
        $strategy,
        $exception
    ) {
        $this->skipTestForPolyfillPhpVersions();

        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@MetadataStrategy' => $strategy,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
            ]
        );
        $uploader->upload();
    }

    public function testPutObjectWithClientInstructionFileSuffix()
    {
        $this->skipTestForPolyfillPhpVersions();

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['ObjectURL' => 'file_url']),
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => self::TEST_URL]),
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ]),
        ]);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@InstructionFileSuffix' => InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($this->mockQueueEmpty());
        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(self::TEST_URL, $result['ObjectURL']);
    }

    /**
     * @dataProvider getCiphers
     */
    public function testPutObjectValidatesCipher(
        $cipher,
        $exception = null
    ) {
        $this->skipTestForPolyfillPhpVersions();

        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => self::TEST_URL]),
        ]);

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ]),
        ]);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => $cipher,
                ],
                '@KmsEncryptionContext' => [],
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($this->mockQueueEmpty());
        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(self::TEST_URL, $result['ObjectURL']);
    }

    /**
     * @dataProvider getKeySizes
     */
    public function testPutObjectValidatesKeySize(
        $keySize,
        $exception
    ) {
        $this->skipTestForPolyfillPhpVersions();

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
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => self::TEST_URL]),
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
            ]),
        ]);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => $cipherOptions,
                '@KmsEncryptionContext' => [],
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($this->mockQueueEmpty());
        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(self::TEST_URL, $result['ObjectURL']);
    }

    public function testPutObjectAppliesParams()
    {
        $this->skipTestForPolyfillPhpVersions();

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => self::TEST_URL]),
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

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
                'before_initiate' => function($command) {
                    $this->assertEquals('foo', $command['Bucket']);
                    $this->assertEquals('bar', $command['Key']);
                    $this->assertEquals(
                        'kms+context',
                        $command['Metadata']['x-amz-wrap-alg']
                    );
                },
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($this->mockQueueEmpty());
        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(self::TEST_URL, $result['ObjectURL']);
    }

    public function testCanLoadStateFromService()
    {
        $this->skipTestForPolyfillPhpVersions();

        $s3 = $this->getS3Client();
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($s3, [
            new Result(['Parts' => [
                ['PartNumber' => 1, 'ETag' => 'A', 'Size' => 4 * self::MB],
            ]]),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url]),
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

        $state = S3EncryptionMultipartUploaderV2::getStateFromService(
            $s3,
            'foo',
            'bar',
            'baz'
        );
        $source = Psr7\stream_for(str_repeat('.', 9 * self::MB));
        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            $source,
            [
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
                'state' => $state
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(4 * self::MB, $uploader->getState()->getPartSize());
        $this->assertEquals($url, $result['ObjectURL']);
    }

    public function testAddsCryptoUserAgent()
    {
        $this->skipTestForPolyfillPhpVersions();

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => self::TEST_URL]),
        ]);
        $list = $s3->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $this->assertContains(
                'S3CryptoV' . S3EncryptionMultipartUploaderV2::CRYPTO_VERSION,
                $req->getHeaderLine('User-Agent')
            );
        }));

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [],
            ]
        );
        $uploader->upload();
    }

    public function testAddsUpdatedEncryptionContext()
    {
        $this->skipTestForPolyfillPhpVersions();

        $s3 = $this->getS3Client();
        $this->addMockResults($s3, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => self::TEST_URL]),
        ]);
        $list = $s3->getHandlerList();
        $list->appendSign(Middleware::tap(function(
                CommandInterface $cmd,
                RequestInterface $req
            ) {
                if ($cmd->getName() === 'CreateMultipartUpload') {
                    $this->assertEquals(
                        [
                            'aws:x-amz-cek-alg' => 'AES/GCM/NoPadding',
                            'marco' => 'polo'
                        ],
                        json_decode(
                            $req->getHeaderLine('x-amz-meta-x-amz-matdesc'),
                            true
                        )
                    );
                }
            }
        ));

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProviderV2($kms, $keyId);
        $this->addMockResults($kms, [
            new Result([
                'CiphertextBlob' => 'encrypted',
                'Plaintext' => random_bytes(32),
            ])
        ]);

        $uploader = new S3EncryptionMultipartUploaderV2(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'gcm',
                ],
                '@KmsEncryptionContext' => [
                    'marco' => 'polo'
                ],
            ]
        );
        $uploader->upload();
    }

    private function skipTestForPolyfillPhpVersions()
    {
        if (version_compare(PHP_VERSION, '7.1', '<')) {
            $this->markTestSkipped(
                'The input sizes for the multipart uploader tests are too large'
                . ' to reasonably use with the AES-GCM polyfill that was added'
                . ' for PHP versions earlier than 7.1'
            );
        }
    }
}
