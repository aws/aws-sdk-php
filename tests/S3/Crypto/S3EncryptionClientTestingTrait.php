<?php
namespace Aws\Test\S3\Crypto;

use Aws\Crypto\MaterialsProviderInterface;
use Aws\Crypto\MetadataEnvelope;

trait S3EncryptionClientTestingTrait
{
    private function getInvalidCipherMetadataFields($provider)
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

    private function getInvalidKeywrapMetadataFields($provider)
    {
        $fields = [];
        $fields[MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER]
            = 'my_first_keywrap';
        $fields[MetadataEnvelope::IV_HEADER]
            = base64_encode($provider->generateIv('aes-256-cbc'));
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

    private function getLegacyKeywrapMetadataFields($provider)
    {
        $fields = [];
        $fields[MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER]
            = 'kms';
        $fields[MetadataEnvelope::IV_HEADER]
            = base64_encode($provider->generateIv('aes-256-cbc'));
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

    private function getMismatchV2GcmMetadataFields($provider)
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
            = json_encode(['aws:x-amz-cek-alg' => 'AES/GCM/Custom']);
        $fields[MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER]
            = 'AES/GCM/NoPadding';

        return $fields;
    }

    private function getValidV1CbcMetadataFields($provider)
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

    private function getValidV2GcmMetadataFields($provider)
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

    private function getValidV1GcmMetadataFields($provider)
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
}
