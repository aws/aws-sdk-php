<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\MetadataEnvelope;

trait UsesMetadataEnvelopeTrait
{
    public static function getIndividualMetadataFields(): array
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

    public static function getIndividualV3MetadataFields(): array
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

    public static function getIndividualV3MetadataOnlyFields(): array
    {
        return [
            [
                MetadataEnvelope::CONTENT_CIPHER_V3,
                1
            ],
            [
                MetadataEnvelope::KEY_COMMITMENT_V3,
                2
            ],
            [
                MetadataEnvelope::MESSAGE_ID_V3,
                3
            ]
        ];
    }

    public static function getIndividualV3InstructionFileOnlyFields(): array
    {
        return [
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_V3,
                4
            ],
            [
                MetadataEnvelope::MAT_DESC_V3,
                5
            ],
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3,
                6
            ],
            [
                MetadataEnvelope::ENCRYPTION_CONTEXT_V3,
                7
            ],
        ];
    }

    public static function getIndividualV3DuplicateKeysInstructionFileOnlyFields(): array
    {
        return [
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_V3,
                4
            ],
            [
                MetadataEnvelope::MAT_DESC_V3,
                5
            ],
            [
                MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3,
                6
            ],
            [
                MetadataEnvelope::ENCRYPTION_CONTEXT_V3,
                7
            ],
            [
                MetadataEnvelope::ENCRYPTION_CONTEXT_V3,
                8
            ],
        ];
    }

    public static function getCondensedFields(): array
    {
        $individualMetadataFields = self::getIndividualMetadataFields();
        $fields = [];
        foreach ($individualMetadataFields as $fieldInfo) {
            $fields[$fieldInfo[0]] = $fieldInfo[1];
        }

        return $fields;
    }

    public static function getCondensedV3Fields(): array
    {
        $individualMetadataFields = self::getIndividualV3MetadataFields();
        $fields = [];
        foreach ($individualMetadataFields as $fieldInfo) {
            $fields[$fieldInfo[0]] = $fieldInfo[1];
        }

        return $fields;
    }

    public static function getMetadataOnlyCondensedV3Fields(): array
    {
        $individualMetadataFields = self::getIndividualV3MetadataOnlyFields();
        $fields = [];
        foreach ($individualMetadataFields as $fieldInfo) {
            $fields[$fieldInfo[0]] = $fieldInfo[1];
        }

        return $fields;
    }

    public static function getInstructionFileOnlyCondensedV3Fields(): array
    {
        $individualMetadataFields = self::getIndividualV3InstructionFileOnlyFields();
        $fields = [];
        foreach ($individualMetadataFields as $fieldInfo) {
            $fields[$fieldInfo[0]] = $fieldInfo[1];
        }

        return $fields;
    }

    public static function getV3DuplicateKeysForInstructionFile(): array
    {
        $individualMetadataFields = self::getIndividualV3DuplicateKeysInstructionFileOnlyFields();
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

    public static function getMetadataFields(): array
    {
        $fields = self::getCondensedFields();

        return [
            [
                $fields
            ]
        ];
    }

    public static function getV3MetadataFields(): array
    {
        $fields = self::getCondensedV3Fields();
        return [
            [$fields]
        ];
    }

    public static function getMetadataResult(): array
    {
        $fields = self::getCondensedFields();

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

    public static function getV3MetadataResult(): array
    {
        $fields = self::getCondensedV3Fields();

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

    public static function getV3FieldsForInstructionFile(): array
    {
        $metadataOnlyFields = self::getMetadataOnlyCondensedV3Fields();
        $instructionFileOnlyFields = self::getInstructionFileOnlyCondensedV3Fields();

        return [
            [
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'Metadata' => $metadataOnlyFields
                ],
                $instructionFileOnlyFields
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

    public static function getIndividualInvalidMetadataFields(): array
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
