<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\MetadataEnvelope;

trait UsesMetadataEnvelopeTrait
{
    public function getIndividualMetadataFields(): array
    {
        return [
            [
                MetadataEnvelope::CONTENT_KEY_V2_HEADER,
                1
            ],
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_V3,
                2
            ],
            [
                MetadataEnvelope::IV_HEADER,
                3
            ],
            [
                MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER,
                4
            ],
            [
                MetadataEnvelope::MAT_DESC_V3,
                5
            ],
            [
                MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER,
                6
            ],
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3,
                7
            ],
            [
                MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER,
                8
            ],
            [
                MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER,
                9
            ],
            [
                MetadataEnvelope::CONTENT_CIPHER_V3,
                10
            ],
            [
                MetadataEnvelope::UNENCRYPTED_CONTENT_LENGTH_HEADER,
                11
            ],
            [
                MetadataEnvelope::ENCRYPTION_CONTEXT_V3,
                12
            ],
            [
                MetadataEnvelope::KEY_COMMITMENT_V3,
                13
            ],
            [
                MetadataEnvelope::MESSAGE_ID_V3,
                14
            ]
        ];
    }

    public function getCondensedFields(): array
    {
        $individualMetadataFields = $this->getIndividualMetadataFields();
        $fields = [];
        foreach ($individualMetadataFields as $fieldInfo) {
            $fields[$fieldInfo[0]] = $fieldInfo[1];
        }

        return $fields;
    }

    public function getFieldsAsMetaHeaders($fields): array
    {
        $metadataFields = [];
        foreach ($fields as $header => $fieldInfo) {
            $metadataFields['x-amz-meta-' . $header] = $fieldInfo;
        }

        return $metadataFields;
    }

    public function getMetadataFields(): array
    {
        $fields = $this->getCondensedFields();

        return [
            [
                $fields
            ]
        ];
    }

    public function getMetadataResult(): array
    {
        $fields = $this->getCondensedFields();

        return [
            [
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Metadata' => $fields
                ],
                $fields
            ]
        ];
    }

    public function getMetadataEnvelope($fields): MetadataEnvelope
    {
        $envelope = new MetadataEnvelope();
        foreach ($fields as $field => $value) {
            $envelope[$field] = $value;
        }

        return $envelope;
    }

    public function getIndividualInvalidMetadataFields(): array
    {
        return [
            [
                'Invalid Field',
                1
            ],
            [
                null,
                1
            ]
        ];
    }
}
