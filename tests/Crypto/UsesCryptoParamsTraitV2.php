<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\KmsMaterialsProvider;
use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\S3\Crypto\HeadersMetadataStrategy;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;

trait UsesCryptoParamsTraitV2
{
    use UsesCryptoParamsTrait;

    public function getInvalidMaterialsProviders()
    {

        return [
            [
                new \stdClass(),
                [
                    'InvalidArgumentException',
                    'An instance of MaterialsProviderInterfaceV2'
                    . ' must be passed in the "MaterialsProvider" field.'
                ]
            ]
        ];
    }

    public function getValidMaterialsProviders()
    {
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';
        return [
            [
                new KmsMaterialsProviderV2($kms, $keyId),
                false
            ]
        ];
    }

    public function getCiphers()
    {
        return [
            [
                'gcm',
                null,
            ],
            [
                'cbc',
                [
                    'InvalidArgumentException',
                    'The cipher requested is not supported by the SDK.'
                ]
            ],
            [
                'unsupported',
                [
                    'InvalidArgumentException',
                    'The cipher requested is not supported by the SDK.'
                ]
            ],
            [
                null,
                [
                    'InvalidArgumentException',
                    'An encryption cipher must be specified in @CipherOptions["Cipher"].'
                ]
            ],
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
                192,
                [
                    'InvalidArgumentException',
                    'The cipher "KeySize" requested'
                    . ' is not supported by AES (128 or 256).'
                ]
            ],
            [
                512,
                [
                    'InvalidArgumentException',
                    'The cipher "KeySize" requested'
                    . ' is not supported by AES (128 or 256).'
                ]
            ]
        ];
    }
}
