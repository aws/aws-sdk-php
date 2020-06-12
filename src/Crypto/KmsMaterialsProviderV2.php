<?php
namespace Aws\Crypto;

use Aws\Kms\KmsClient;

/**
 * Uses KMS to supply materials for encrypting and decrypting data.
 */
class KmsMaterialsProviderV2 extends MaterialsProviderV2 implements MaterialsProviderInterface
{
    private $kmsClient;
    private $kmsKeyId;

    /**
     * @param KmsClient $kmsClient A KMS Client for use encrypting and
     *                             decrypting keys.
     * @param string $kmsKeyId The private KMS key id to be used for encrypting
     *                         and decrypting keys.
     */
    public function __construct(
        KmsClient $kmsClient,
        $kmsKeyId = null
    ) {
        $this->kmsClient = $kmsClient;
        $this->kmsKeyId = $kmsKeyId;
    }

    public function fromDecryptionEnvelope(MetadataEnvelope $envelope)
    {
        if (empty($envelope[MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER])) {
            throw new \RuntimeException('Not able to detect kms_cmk_id from an'
                . ' empty materials description.');
        }

        $materialsDescription = json_decode(
            $envelope[MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER],
            true
        );

        if (empty($materialsDescription['kms_cmk_id'])
            && empty($materialsDescription['aws:x-amz-cek-alg'])) {
            throw new \RuntimeException('Not able to detect kms_cmk_id (legacy'
                . ' implementation) or aws:x-amz-cek-alg (current implementation)'
                . ' from kms materials description.');
        }

        return new self(
            $this->kmsClient,
            isset($materialsDescription['kms_cmk_id'])
                ? $materialsDescription['kms_cmk_id']
                : null
        );
    }

    public function getWrapAlgorithmName()
    {
        return 'kms';
    }

    /**
     * Takes an encrypted content encryption key (CEK) and material description
     * for use decrypting the key by using KMS' Decrypt API.
     *
     * @param string $encryptedCek Encrypted key to be decrypted by the Provider
     *                             for use decrypting other data.
     * @param string $materialDescription Material Description for use in
     *                                    encrypting the $cek.
     *
     * @return string
     */
    public function decryptCek($encryptedCek, $materialDescription)
    {
        $result = $this->kmsClient->decrypt([
            'CiphertextBlob' => $encryptedCek,
            'EncryptionContext' => $materialDescription
        ]);

        return $result['Plaintext'];
    }

    public function generateCek($keySize, $context)
    {
        $result = $this->kmsClient->generateDataKey([
            'KeyId' => $this->kmsKeyId,
            'KeySpec' => "AES_{$keySize}",
            'EncryptionContext' => $context
        ]);
        return [
            'Plaintext' => $result['Plaintext'],
            'Ciphertext' => base64_encode($result['CiphertextBlob'])
        ];
    }
}
