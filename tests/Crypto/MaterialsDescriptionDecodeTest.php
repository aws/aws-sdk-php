<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\DecryptionTraitV2;
use Aws\Crypto\DecryptionTraitV3;
use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\Crypto\KmsMaterialsProviderV3;
use Aws\Crypto\MetadataEnvelope;
use Aws\Exception\CryptoException;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(DecryptionTraitV2::class)]
#[CoversClass(DecryptionTraitV3::class)]
class MaterialsDescriptionDecodeTest extends TestCase
{
    use UsesServiceTrait;

    private const KEY_ID = '11111111-2222-3333-4444-555555555555';

    private $v2DecryptionClass;
    private $v3DecryptionClass;

    protected function setUp(): void
    {
        parent::setUp();

        $this->v2DecryptionClass = new class {
            use DecryptionTraitV2;
            protected function getCipherFromAesName($aesName) { return 'gcm'; }
            protected function buildCipherMethod($cipherName, $iv, $keySize) { return new \stdClass(); }
            protected function getKeyCommitmentPolicy(array $args): string
            {
                return $args['@CommitmentPolicy'] ?? 'FORBID_ENCRYPT_ALLOW_DECRYPT';
            }
        };

        $this->v3DecryptionClass = new class {
            use DecryptionTraitV3;
            protected function getCipherFromAesName($aesName) { return 'gcm'; }
            protected function buildCipherMethod($cipherName, $iv, $keySize) { return new \stdClass(); }
        };
    }

    public static function malformedMaterialDescriptions(): array
    {
        return [
            'mime 0x80'         => ['=?utf-8?B?gA==?='],
            'mime 0xff'         => ['=?utf-8?B?/w==?='],
            'mime abc+0xff'     => ['=?utf-8?B?YWJj/w==?='],
            'raw invalid utf-8' => ["\x80"],
        ];
    }

    #[DataProvider('malformedMaterialDescriptions')]
    public function testV2TraitRejectsMalformedMaterialDescription(string $matdesc): void
    {
        $envelope = new MetadataEnvelope();
        $envelope[MetadataEnvelope::IV_HEADER] = base64_encode(str_repeat("\0", 12));
        $envelope[MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER] = '128';
        $envelope[MetadataEnvelope::CONTENT_KEY_V2_HEADER] = base64_encode(str_repeat("\0", 32));
        $envelope[MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER] = $matdesc;

        $provider = new KmsMaterialsProviderV2($this->getTestClient('Kms'), self::KEY_ID);

        $this->expectException(CryptoException::class);
        $this->v2DecryptionClass->decrypt('ciphertext', $provider, $envelope, [
            '@CipherOptions' => [],
            '@CommitmentPolicy' => 'FORBID_ENCRYPT_ALLOW_DECRYPT',
        ]);
    }

    #[DataProvider('malformedMaterialDescriptions')]
    public function testV3TraitRejectsMalformedEncryptionContext(string $matdesc): void
    {
        $envelope = new MetadataEnvelope();
        $envelope[MetadataEnvelope::ENCRYPTED_DATA_KEY_V3] = base64_encode('encrypted-key');
        $envelope[MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3] = '12';
        $envelope[MetadataEnvelope::ENCRYPTION_CONTEXT_V3] = $matdesc;

        $provider = new KmsMaterialsProviderV3($this->getTestClient('Kms'), self::KEY_ID);

        $this->expectException(CryptoException::class);
        $this->v3DecryptionClass->decrypt('ciphertext', $provider, $envelope, 'FORBID_ENCRYPT_ALLOW_DECRYPT', [
            '@CipherOptions' => [],
        ]);
    }
}
