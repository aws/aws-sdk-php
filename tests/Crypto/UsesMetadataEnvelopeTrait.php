<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\MetadataEnvelope;

trait UsesMetadataEnvelopeTrait
{
    public function getIndividualMetadataFields()
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
                MetadataEnvelope::UNENCRYPTED_CONTENT_MD5_HEADER,
                7
            ],
            [
                MetadataEnvelope::UNENCRYPTED_CONTENT_LENGTH_HEADER,
                8
            ],
        ];
    }

    public function getCondensedFields()
    {
        $individualMetadataFields = $this->getIndividualMetadataFields();
        $fields = [];
        foreach ($individualMetadataFields as $fieldInfo) {
            $fields[$fieldInfo[0]] = $fieldInfo[1];
        }
        return $fields;
    }

    public function getFieldsAsMetaHeaders($fields)
    {
        $metadataFields = [];
        foreach ($fields as $header => $fieldInfo) {
            $metadataFields['x-amz-meta-' . $header] = $fieldInfo;
        }
        return $metadataFields;
    }

    public function getMetadataFields()
    {
        $fields = $this->getCondensedFields();
        return [
            [
                $fields
            ]
        ];
    }

    public function getMetadataResult()
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

    public function getMetadataEnvelope($fields)
    {
        $envelope = new MetadataEnvelope();
        foreach ($fields as $field => $value) {
            $envelope[$field] = $value;
        }
        return $envelope;
    }

    public function getIndividualInvalidMetadataFields()
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
