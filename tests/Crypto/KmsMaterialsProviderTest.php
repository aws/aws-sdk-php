<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\KmsMaterialsProvider;
use Aws\Kms\KmsClient;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Crypto\KmsMaterialsProvider
 */
class KmsMaterialsProviderTest extends TestCase
{
    use UsesServiceTrait;

    public function testProviderBasics()
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $keyId = '11111111-2222-3333-4444-555555555555';

        $provider = new KmsMaterialsProvider($client, $keyId);

        $this->assertEquals(
            ['kms_cmk_id' => $keyId],
            $provider->getMaterialsDescription()
        );
        $this->assertEquals('kms', $provider->getWrapAlgorithmName());
    }

    public function testEncryptCek()
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $keyId = '11111111-2222-3333-4444-555555555555';
        $this->addMockResults($client, [
            new Result(['CiphertextBlob' => 'encrypted'])
        ]);

        $provider = new KmsMaterialsProvider($client, $keyId);
        $this->assertEquals(
            base64_encode('encrypted'),
            $provider->encryptCek(
                'plaintext',
                $provider->getMaterialsDescription()
            )
        );
    }

    public function testDecryptCek()
    {
        /** @var KmsClient $client */
        $client = $this->getTestClient('Kms', []);
        $keyId = '11111111-2222-3333-4444-555555555555';
        $this->addMockResults($client, [
            new Result(['Plaintext' => 'plaintext'])
        ]);

        $provider = new KmsMaterialsProvider($client, $keyId);
        $this->assertEquals(
            'plaintext',
            $provider->decryptCek(
                'encrypted',
                $provider->getMaterialsDescription()
            )
        );
    }
}
