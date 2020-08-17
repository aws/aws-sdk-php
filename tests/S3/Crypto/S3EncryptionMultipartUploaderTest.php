<?php
namespace Aws\Test\S3\Crypto;

use Aws\S3\Crypto\S3EncryptionMultipartUploader;
use Aws\Result;
use Aws\Crypto\KmsMaterialsProvider;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;
use Aws\Test\Crypto\UsesCryptoParamsTrait;
use Aws\Test\UsesServiceTrait;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

class S3EncryptionMultipartUploaderTest extends TestCase
{
    use UsesServiceTrait, UsesMetadataEnvelopeTrait, UsesCryptoParamsTrait;

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
            new Result(['CiphertextBlob' => 'encrypted']),
        ]);

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'cbc',
                ],
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
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'cbc',
                ],
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
        $provider = new KmsMaterialsProvider($kms, $keyId);
        $this->addMockResults($kms, [
            new Result(['CiphertextBlob' => 'encrypted']),
        ]);

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@MetadataStrategy' => $strategy,
                '@CipherOptions' => [
                    'Cipher' => 'cbc',
                ],
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
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $s3 = $this->getS3Client();

        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        $provider = new KmsMaterialsProvider($kms, $keyId);

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@MetadataStrategy' => $strategy,
                '@CipherOptions' => [
                    'Cipher' => 'cbc',
                ],
            ]
        );
        $uploader->upload();
    }

    public function testPutObjectWithClientInstructionFileSuffix()
    {
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
        $provider = new KmsMaterialsProvider($kms, $keyId);
        $this->addMockResults($kms, [
            new Result(['CiphertextBlob' => 'encrypted']),
        ]);

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@InstructionFileSuffix' => InstructionFileMetadataStrategy::DEFAULT_FILE_SUFFIX,
                '@CipherOptions' => [
                    'Cipher' => 'cbc',
                ],
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
        $exception = null,
        callable $skipCheck = null
    ) {
        if ($skipCheck && $skipCheck()) {
            $this->markTestSkipped(
                'AES-GCM decryption is only supported in PHP 7.1 or greater'
            );
        }

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
        $provider = new KmsMaterialsProvider($kms, $keyId);
        $this->addMockResults($kms, [
            new Result(['CiphertextBlob' => 'encrypted']),
        ]);

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => $cipher,
                ],
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
        if ($exception) {
            $this->setupProvidedExpectedException($exception);
        }

        $cipherOptions = [
            'Cipher' => 'cbc'
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
        $provider = new KmsMaterialsProvider($kms, $keyId);
        $this->addMockResults($kms, [
            new Result(['CiphertextBlob' => 'encrypted']),
        ]);

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => $cipherOptions,
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($this->mockQueueEmpty());
        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(self::TEST_URL, $result['ObjectURL']);
    }

    public function testPutObjectAppliesParams()
    {
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
        $provider = new KmsMaterialsProvider($kms, $keyId);
        $this->addMockResults($kms, [
            new Result(['CiphertextBlob' => 'encrypted'])
        ]);

        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            Psr7\stream_for(str_repeat('.', 12 * self::MB)),
            [
                'bucket' => 'foo',
                'key'    => 'bar',
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'cbc',
                ],
                'before_initiate' => function($command) {
                    $this->assertEquals('foo', $command['Bucket']);
                    $this->assertEquals('bar', $command['Key']);
                    $this->assertEquals(
                        'kms',
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
        $provider = new KmsMaterialsProvider($kms, $keyId);
        $this->addMockResults($kms, [
            new Result(['CiphertextBlob' => 'encrypted'])
        ]);

        $state = S3EncryptionMultipartUploader::getStateFromService(
            $s3,
            'foo',
            'bar',
            'baz'
        );
        $source = Psr7\stream_for(str_repeat('.', 9 * self::MB));
        $uploader = new S3EncryptionMultipartUploader(
            $s3,
            $source,
            [
                '@MaterialsProvider' => $provider,
                '@CipherOptions' => [
                    'Cipher' => 'cbc',
                ],
                'state' => $state
            ]
        );
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(4 * self::MB, $uploader->getState()->getPartSize());
        $this->assertEquals($url, $result['ObjectURL']);
    }
}
