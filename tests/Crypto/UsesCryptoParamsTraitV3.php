<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\KmsMaterialsProvider;
use Aws\Crypto\KmsMaterialsProviderV3;
use Aws\S3\Crypto\HeadersMetadataStrategy;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;

trait UsesCryptoParamsTraitV3
{
    use UsesCryptoParamsTrait;

    public function getInvalidMaterialsProviders(): array
    {
        return [
            [
                new \stdClass(),
                [
                    'InvalidArgumentException',
                    'An instance of MaterialsProviderInterfaceV3'
                    . ' must be passed in the "MaterialsProvider" field.'
                ]
            ]
        ];
    }

    public function getCiphersAndKCPolicies(): array
    {
        return [
            [
                'gcm',
                256,
                'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
                1
            ],
            [
                'gcm',
                256,
                'REQUIRE_ENCRYPT_ALLOW_DECRYPT',
                1
            ],
            [
                'gcm',
                256,
                'FORBID_ENCRYPT_ALLOW_DECRYPT',
                1
            ],
        ];
    }
    
    public function getIncompatibleCiphersAndKCPolicies(): array
    {
        return [
            [
                'gcm',
                128,
                'REQUIRE_ENCRYPT_REQUIRE_DECRYPT'
            ],
            [
                'gcm',
                128,
                'REQUIRE_ENCRYPT_ALLOW_DECRYPT'
            ],
            [
                'gcm',
                128,
                'FORBID_ENCRYPT_ALLOW_DECRYPT'
            ],
            [
                'cbc',
                256,
                'REQUIRE_ENCRYPT_REQUIRE_DECRYPT'
            ],
            [
                'cbc',
                256,
                'REQUIRE_ENCRYPT_ALLOW_DECRYPT'
            ],
            [
                'cbc',
                256,
                'FORBID_ENCRYPT_ALLOW_DECRYPT'
            ],
        ];
    }

    public function getKCPolicies(): array
    {
        return [
            ["REQUIRE_ENCRYPT_REQUIRE_DECRYPT"],
            ["REQUIRE_ENCRYPT_ALLOW_DECRYPT"],
            ["FORBID_ENCRYPT_ALLOW_DECRYPT"]
        ];
    }

    public function getValidMaterialsProviders(): array
    {
        $kms = $this->getKmsClient();
        $keyId = '11111111-2222-3333-4444-555555555555';

        return [
            [
                new KmsMaterialsProviderV3($kms, $keyId),
                false
            ]
        ];
    }

    public function getCiphers(): array
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

    public function getKeySizes(): array
    {
        return [
            [
                128,
                [
                    'InvalidArgumentException',
                    'The cipher "KeySize" requested'
                    . ' is not supported by AES (256).'
                ]
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
                    . ' is not supported by AES (256).'
                ]
            ],
            [
                512,
                [
                    'InvalidArgumentException',
                    'The cipher "KeySize" requested'
                    . ' is not supported by AES (256).'
                ]
            ]
        ];
    }
    
    /**
     * Data provider for invalid commitment policies
     */
    public function getInvalidCommitmentPolicies(): array
    {
        return [
            [
                'INVALID_POLICY',
                [
                    'InvalidArgumentException',
                    'The CommitmentPolicy requested is not supported by the SDK'
                ]
            ]
        ];
    }

    /**
     * Data provider for V2 security profiles (should be rejected in V3)
     */
    public function getV2SecurityProfiles(): array
    {
        return [
            ['V2'],
            ['V2_AND_LEGACY'],
        ];
    }

    /**
     * Data provider for valid V3 security profiles
     */
    public function getValidV3SecurityProfiles(): array
    {
        return [
            ['V3'],
            ['V3_AND_LEGACY'],
        ];
    }
}
