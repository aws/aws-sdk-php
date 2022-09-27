<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\Kms\KmsClient;
use Aws\Middleware;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Crypto\KmsMaterialsProviderV2
 */
class KmsMaterialsProviderV2Test extends TestCase
{
    use UsesServiceTrait;

    public function testProviderBasics()
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $keyId = '11111111-2222-3333-4444-555555555555';

        $provider = new KmsMaterialsProviderV2($client, $keyId);
        $this->assertSame('kms+context', $provider->getWrapAlgorithmName());
    }

    public function testGeneratesCek()
    {
        $keyId = '11111111-2222-3333-4444-555555555555';

        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) use ($keyId) {
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

        $provider = new KmsMaterialsProviderV2($client, $keyId);
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

    public function testGenerateThrowsForNoKmsId()
    {
        $this->expectExceptionMessage("A KMS key id is required for encryption with KMS keywrap");
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV2($client);
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

    public function testGenerateThrowsForNoEncryptionContext()
    {
        $this->expectExceptionMessage("'@KmsEncryptionContext' is a required argument when using KmsMaterialsProviderV2");
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV2($client, 'foo');
        $provider->generateCek(
            256,
            [
                'my_material' => 'material_value'
            ],
            []
        );
    }

    public function testGenerateThrowsForContextConflict()
    {
        $this->expectExceptionMessage("Conflict in reserved @KmsEncryptionContext key aws:x-amz-cek-alg");
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV2($client, 'foo');
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

    public function testDecryptCek()
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
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

        $provider = new KmsMaterialsProviderV2($client, $keyId);
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

    public function testDecryptCekThrowsForNoKmsId()
    {
        $this->expectExceptionMessage("KMS CMK ID was not specified and the operation is not opted-in to attempting to use any valid CMK");
        $this->expectException(\Aws\Exception\CryptoException::class);
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $provider = new KmsMaterialsProviderV2($client);
        $provider->decryptCek(
            'encrypted',
            [
                'my_material' => 'material_value'
            ],
            []
        );
    }

    public function testDecryptWithAnyCmk()
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
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

        $provider = new KmsMaterialsProviderV2($client);
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
