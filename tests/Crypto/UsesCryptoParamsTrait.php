<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\KmsMaterialsProvider;
use Aws\S3\Crypto\HeadersMetadataStrategy;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;

trait UsesCryptoParamsTrait
{
    abstract protected function getS3Client();

    abstract protected function getKmsClient();

    public function getValidMaterialsProviders()
    {
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        return [
            [
                new KmsMaterialsProvider($kms, $keyId),
                false
            ]
        ];
    }

    public function getInvalidMaterialsProviders()
    {

        return [
            [
                new \stdClass(),
                [
                    'InvalidArgumentException',
                    'An instance of MaterialsProvider'
                    . ' must be passed in the "MaterialsProvider" field.'
                ]
            ]
        ];
    }

    public function getValidMetadataStrategies()
    {
        $s3 = $this->getS3Client();
        return [
            [
                null,
                false,
                1
            ],
            [
                HeadersMetadataStrategy::class,
                false,
                1
            ],
            [
                InstructionFileMetadataStrategy::class,
                false,
                2
            ],
            [
                new HeadersMetadataStrategy(),
                false,
                1
            ],
            [
                new InstructionFileMetadataStrategy($s3),
                false,
                2
            ]
        ];
    }

    public function getInvalidMetadataStrategies()
    {
        return [
            [
                new \stdClass(),
                [
                    'InvalidArgumentException',
                    'The metadata strategy that'
                    . ' was passed to "MetadataStrategy" was unrecognized.'
                ]

            ],
            [
                'Not Predefined Strategy',
                [
                    'InvalidArgumentException',
                    'Could not match the'
                    . ' specified string in "MetadataStrategy" to a'
                    . ' predefined strategy.'
                ]
            ]
        ];
    }

    public function getCiphers()
    {
        return [
            [
                'cbc'
            ],
            [
                'gcm',
                null,
                function () {
                    return version_compare(PHP_VERSION, '7.1', '<');
                }
            ],
            [
                'unsupported',
                [
                    'InvalidArgumentException',
                    'The cipher requested is not supported by the SDK.'
                ]
            ]
        ];
    }

    public function getKeySizes()
    {
        return [
            [
                128,
                []
            ],
            [
                192,
                []
            ],
            [
                256,
                []
            ],
            [
                'gcm',
                [
                    'InvalidArgumentException',
                    'The cipher "KeySize" must be an integer.'
                ]
            ],
            [
                512,
                [
                    'InvalidArgumentException',
                    'The cipher "KeySize" requested'
                    . ' is not supported by AES (128, 192, or 256).'
                ]
            ]
        ];
    }
}