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
                MetadataEnvelope::IV_HEADER,
                2
            ],
            [
                MetadataEnvelope::MATERIALS_DESCRIPTION_HEADER,
                3
            ],
            [
                MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER,
                4
            ],
            [
                MetadataEnvelope::CONTENT_CRYPTO_SCHEME_HEADER,
                5
            ],
            [
                MetadataEnvelope::CRYPTO_TAG_LENGTH_HEADER,
                6
            ],
            [
                MetadataEnvelope::UNENCRYPTED_CONTENT_LENGTH_HEADER,
                7
            ],
        ];
    }

    public function getIndividualV3MetadataFields(): array
    {
        return [
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_V3,
               1 
            ],
            [
                MetadataEnvelope::MAT_DESC_V3,
                2
            ],
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3,
                3
            ],
            [
                MetadataEnvelope::CONTENT_CIPHER_V3,
                4
            ],
            [
                MetadataEnvelope::ENCRYPTION_CONTEXT_V3,
                5
            ],
            [
                MetadataEnvelope::KEY_COMMITMENT_V3,
                6
            ],
            [
                MetadataEnvelope::MESSAGE_ID_V3,
                7
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

    public function getCondensedV3Fields(): array
    {
        $individualMetadataFields = $this->getIndividualV3MetadataFields();
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

    public function getV3MetadataFields(): array
    {
        $fields = $this->getCondensedV3Fields();
        return [
            [$fields]
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

    public function getV3InstructionFileFields($fields): MetadataEnvelope
    {
       $envelope = $this->getMetadataEnvelope($fields);
        unset($envelope[MetadataEnvelope::CONTENT_CIPHER_V3]);
        unset($envelope[MetadataEnvelope::KEY_COMMITMENT_V3]);
        unset($envelope[MetadataEnvelope::MESSAGE_ID_V3]);
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
