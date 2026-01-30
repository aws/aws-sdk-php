<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\KmsMaterialsProviderV3;
use Aws\Kms\KmsClient;
use Aws\Middleware;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(KmsMaterialsProviderV3::class)]
class KmsMaterialsProviderV3Test extends TestCase
{
    use UsesServiceTrait;

    public function testProviderBasics(): void
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $keyId = '11111111-2222-3333-4444-555555555555';

        $provider = new KmsMaterialsProviderV3($client, $keyId);

        $this->assertSame('kms+context', $provider->getWrapAlgorithmName());
    }

    public function testGeneratesCek(): void
    {
        $keyId = '11111111-2222-3333-4444-555555555555';

        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function ($cmd, $req) use ($keyId) {
            // Test that command is populated correctly
            $this->assertEquals(
                [
                    'my_material' => 'material_value',
                    'kms_specific' => 'kms_value'
                ],
                $cmd['EncryptionContext']
            );
            $this->assertSame(
                'AES_256',
                $cmd['KeySpec']
            );
            $this->assertSame(
                $keyId,
                $cmd['KeyId']
            );
        }));

        $this->addMockResults($client, [
            new Result([
                'CiphertextBlob' => 'encryptedkey',
                'KeyId' => $keyId,
                'Plaintext' => 'plaintextkey'
            ])
        ]);

        $provider = new KmsMaterialsProviderV3($client, $keyId);

        $this->assertEquals(
            [
                'Ciphertext' => base64_encode('encryptedkey'),
                'Plaintext' => 'plaintextkey',
                'UpdatedContext' => [
                    'my_material' => 'material_value',
                    'kms_specific' => 'kms_value'
                ]
            ],
            $provider->generateCek(
                256,
                [
                    'my_material' => 'material_value'
                ],
                [
                    '@KmsEncryptionContext' => [
                        'kms_specific' => 'kms_value'
                    ]
                ]
            )
        );
    }

    public function testGenerateThrowsForNoKmsId(): void
    {
        $this->expectExceptionMessage("A KMS key id is required for encryption with KMS keywrap");
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV3($client);
        $provider->generateCek(
            256,
            [
                'my_material' => 'material_value'
            ],
            [
                '@KmsEncryptionContext' => [
                    'kms_specific' => 'kms_value'
                ]
            ]
        );
    }

    public function testGenerateThrowsForNoEncryptionContext(): void
    {
        $this->expectExceptionMessage('\'@KmsEncryptionContext\' is a required argument'
            . ' when using KmsMaterialsProviderV3');
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV3($client, 'foo');
        $provider->generateCek(
            256,
            [
                'my_material' => 'material_value'
            ],
            []
        );
    }

    public function testGenerateThrowsForContextConflictForCekAlg(): void
    {
        $this->expectExceptionMessage("Conflict in reserved @KmsEncryptionContext key aws:x-amz-cek-alg");
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV3($client, 'foo');
        $provider->generateCek(
            256,
            [
                'aws:x-amz-cek-alg' => 'bar_alg'
            ],
            [
                '@KmsEncryptionContext' => [
                    'aws:x-amz-cek-alg' => 'custom_alg'
                ]
            ]
        );
    }

    public function testGenerateThrowsForContextConflictForCmkId(): void
    {
        $this->expectExceptionMessage("Conflict in reserved @KmsEncryptionContext key kms_cmk_id");
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV3($client, 'foo');
        $provider->generateCek(
            256,
            [
                'kms_cmk_id' => 'some_cmk'
            ],
            [
                '@KmsEncryptionContext' => [
                    'kms_cmk_id' => 'some_cmk'
                ]
            ]
        );
    }

    public function testDecryptCek(): void
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function ($cmd, $req): void {
            // Test that command is populated correctly
            $this->assertEquals(
                [
                    'my_material' => 'material_value'
                ],
                $cmd['EncryptionContext']
            );
            $this->assertSame(
                'encrypted',
                $cmd['CiphertextBlob']
            );
        }));

        $keyId = '11111111-2222-3333-4444-555555555555';
        $this->addMockResults($client, [
            new Result(['Plaintext' => 'plaintext'])
        ]);

        $provider = new KmsMaterialsProviderV3($client, $keyId);

        $this->assertSame(
            'plaintext',
            $provider->decryptCek(
                'encrypted',
                [
                    'my_material' => 'material_value'
                ],
                []
            )
        );
    }

    public function testDecryptCekWithSameEc(): void
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function ($cmd, $req): void {
            // Test that command is populated correctly
            $this->assertEquals(
                [
                    'my_material' => 'material_value'
                ],
                $cmd['EncryptionContext']
            );
            $this->assertSame(
                'encrypted',
                $cmd['CiphertextBlob']
            );
        }));

        $keyId = '11111111-2222-3333-4444-555555555555';
        $this->addMockResults($client, [
            new Result(['Plaintext' => 'plaintext'])
        ]);

        $provider = new KmsMaterialsProviderV3($client, $keyId);

        $this->assertSame(
            'plaintext',
            $provider->decryptCek(
                'encrypted',
                [
                    'my_material' => 'material_value'
                ],
                [
                    '@KmsEncryptionContext' => [
                        'my_material' => 'material_value'
                    ]
                ]
            )
        );
    }

    public function testDecryptCekWithMismatchEc(): void
    {
        $this->expectExceptionMessage('Provided encryption context does not match'
            . ' information retrieved from S3');
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function ($cmd, $req) {
            // Test that command is populated correctly
            $this->assertEquals(
                [
                    'my_material' => 'material_value'
                ],
                $cmd['EncryptionContext']
            );
            $this->assertSame(
                'encrypted',
                $cmd['CiphertextBlob']
            );
        }));

        $keyId = '11111111-2222-3333-4444-555555555555';
        $this->addMockResults($client, [
            new Result(['Plaintext' => 'plaintext'])
        ]);

        $provider = new KmsMaterialsProviderV3($client, $keyId);

        $this->assertSame(
            'plaintext',
            $provider->decryptCek(
                'encrypted',
                [
                    'my_material' => 'material_value'
                ],
                [
                    '@KmsEncryptionContext' => [
                        'kms_specific' => 'kms_value'
                    ]
                ]
            )
        );
    }

    public function testDecryptCekThrowsForNoKmsId(): void
    {
        $this->expectExceptionMessage('KMS CMK ID was not specified and the operation'
            . ' is not opted-in to attempting to use any valid CMK');
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV3($client);
        $provider->decryptCek(
            'encrypted',
            [
                'my_material' => 'material_value'
            ],
            []
        );
    }

    public function testDecryptWithAnyCmk(): void
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function ($cmd, $req) {
            // Test that command is populated correctly
            $this->assertEquals(
                [
                    'my_material' => 'material_value'
                ],
                $cmd['EncryptionContext']
            );
            $this->assertSame(
                'encrypted',
                $cmd['CiphertextBlob']
            );
        }));

        $this->addMockResults($client, [
            new Result(['Plaintext' => 'plaintext'])
        ]);

        $provider = new KmsMaterialsProviderV3($client);

        $this->assertSame(
            'plaintext',
            $provider->decryptCek(
                'encrypted',
                [
                    'my_material' => 'material_value'
                ],
                [
                    '@KmsAllowDecryptWithAnyCmk' => true
                ]
            )
        );
    }
}
