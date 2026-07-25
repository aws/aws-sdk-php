<?php
namespace Aws\PaymentCryptography;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Payment Cryptography Control Plane** service.
 * @method \Aws\Result addKeyReplicationRegions(array $args = [])
 * @phpstan-method \Aws\Result addKeyReplicationRegions(array{KeyIdentifier?: string, ReplicationRegions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addKeyReplicationRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addKeyReplicationRegionsAsync(array{KeyIdentifier?: string, ReplicationRegions?: list<string>, ...} $args = [])
 * @method \Aws\Result associateMpaTeam(array $args = [])
 * @phpstan-method \Aws\Result associateMpaTeam(array{Action?: 'IMPORT_ROOT_PUBLIC_KEY_CERTIFICATE', MpaTeamArn?: string, RequesterComment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMpaTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMpaTeamAsync(array{Action?: 'IMPORT_ROOT_PUBLIC_KEY_CERTIFICATE', MpaTeamArn?: string, RequesterComment?: string, ...} $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @phpstan-method \Aws\Result createAlias(array{AliasName?: string, KeyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAliasAsync(array{AliasName?: string, KeyArn?: string, ...} $args = [])
 * @method \Aws\Result createKey(array $args = [])
 * @phpstan-method \Aws\Result createKey(array{
 *     KeyAttributes?: array{
 *         KeyUsage?: 'TR31_B0_BASE_DERIVATION_KEY'|'TR31_C0_CARD_VERIFICATION_KEY'|'TR31_D0_SYMMETRIC_DATA_ENCRYPTION_KEY'|'TR31_D1_ASYMMETRIC_KEY_FOR_DATA_ENCRYPTION'|'TR31_E0_EMV_MKEY_APP_CRYPTOGRAMS'|'TR31_E1_EMV_MKEY_CONFIDENTIALITY'|'TR31_E2_EMV_MKEY_INTEGRITY'|'TR31_E4_EMV_MKEY_DYNAMIC_NUMBERS'|'TR31_E5_EMV_MKEY_CARD_PERSONALIZATION'|'TR31_E6_EMV_MKEY_OTHER'|'TR31_K0_KEY_ENCRYPTION_KEY'|'TR31_K1_KEY_BLOCK_PROTECTION_KEY'|'TR31_K2_TR34_ASYMMETRIC_KEY'|'TR31_K3_ASYMMETRIC_KEY_FOR_KEY_AGREEMENT'|'TR31_M0_ISO_16609_MAC_KEY'|'TR31_M1_ISO_9797_1_MAC_KEY'|'TR31_M3_ISO_9797_3_MAC_KEY'|'TR31_M6_ISO_9797_5_CMAC_KEY'|'TR31_M7_HMAC_KEY'|'TR31_P0_PIN_ENCRYPTION_KEY'|'TR31_P1_PIN_GENERATION_KEY'|'TR31_S0_ASYMMETRIC_KEY_FOR_DIGITAL_SIGNATURE'|'TR31_V1_IBM3624_PIN_VERIFICATION_KEY'|'TR31_V2_VISA_PIN_VERIFICATION_KEY',
 *         KeyClass?: 'ASYMMETRIC_KEY_PAIR'|'PRIVATE_KEY'|'PUBLIC_KEY'|'SYMMETRIC_KEY',
 *         KeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *         KeyModesOfUse?: array{
 *             Encrypt?: bool,
 *             Decrypt?: bool,
 *             Wrap?: bool,
 *             Unwrap?: bool,
 *             Generate?: bool,
 *             Sign?: bool,
 *             Verify?: bool,
 *             DeriveKey?: bool,
 *             NoRestrictions?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *     Exportable?: bool,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DeriveKeyUsage?: 'TR31_B0_BASE_DERIVATION_KEY'|'TR31_C0_CARD_VERIFICATION_KEY'|'TR31_D0_SYMMETRIC_DATA_ENCRYPTION_KEY'|'TR31_E0_EMV_MKEY_APP_CRYPTOGRAMS'|'TR31_E1_EMV_MKEY_CONFIDENTIALITY'|'TR31_E2_EMV_MKEY_INTEGRITY'|'TR31_E4_EMV_MKEY_DYNAMIC_NUMBERS'|'TR31_E5_EMV_MKEY_CARD_PERSONALIZATION'|'TR31_E6_EMV_MKEY_OTHER'|'TR31_K0_KEY_ENCRYPTION_KEY'|'TR31_K1_KEY_BLOCK_PROTECTION_KEY'|'TR31_M1_ISO_9797_1_MAC_KEY'|'TR31_M3_ISO_9797_3_MAC_KEY'|'TR31_M6_ISO_9797_5_CMAC_KEY'|'TR31_M7_HMAC_KEY'|'TR31_P0_PIN_ENCRYPTION_KEY'|'TR31_P1_PIN_GENERATION_KEY'|'TR31_V1_IBM3624_PIN_VERIFICATION_KEY'|'TR31_V2_VISA_PIN_VERIFICATION_KEY',
 *     ReplicationRegions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeyAsync(array{
 *     KeyAttributes?: array{
 *         KeyUsage?: 'TR31_B0_BASE_DERIVATION_KEY'|'TR31_C0_CARD_VERIFICATION_KEY'|'TR31_D0_SYMMETRIC_DATA_ENCRYPTION_KEY'|'TR31_D1_ASYMMETRIC_KEY_FOR_DATA_ENCRYPTION'|'TR31_E0_EMV_MKEY_APP_CRYPTOGRAMS'|'TR31_E1_EMV_MKEY_CONFIDENTIALITY'|'TR31_E2_EMV_MKEY_INTEGRITY'|'TR31_E4_EMV_MKEY_DYNAMIC_NUMBERS'|'TR31_E5_EMV_MKEY_CARD_PERSONALIZATION'|'TR31_E6_EMV_MKEY_OTHER'|'TR31_K0_KEY_ENCRYPTION_KEY'|'TR31_K1_KEY_BLOCK_PROTECTION_KEY'|'TR31_K2_TR34_ASYMMETRIC_KEY'|'TR31_K3_ASYMMETRIC_KEY_FOR_KEY_AGREEMENT'|'TR31_M0_ISO_16609_MAC_KEY'|'TR31_M1_ISO_9797_1_MAC_KEY'|'TR31_M3_ISO_9797_3_MAC_KEY'|'TR31_M6_ISO_9797_5_CMAC_KEY'|'TR31_M7_HMAC_KEY'|'TR31_P0_PIN_ENCRYPTION_KEY'|'TR31_P1_PIN_GENERATION_KEY'|'TR31_S0_ASYMMETRIC_KEY_FOR_DIGITAL_SIGNATURE'|'TR31_V1_IBM3624_PIN_VERIFICATION_KEY'|'TR31_V2_VISA_PIN_VERIFICATION_KEY',
 *         KeyClass?: 'ASYMMETRIC_KEY_PAIR'|'PRIVATE_KEY'|'PUBLIC_KEY'|'SYMMETRIC_KEY',
 *         KeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *         KeyModesOfUse?: array{
 *             Encrypt?: bool,
 *             Decrypt?: bool,
 *             Wrap?: bool,
 *             Unwrap?: bool,
 *             Generate?: bool,
 *             Sign?: bool,
 *             Verify?: bool,
 *             DeriveKey?: bool,
 *             NoRestrictions?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *     Exportable?: bool,
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DeriveKeyUsage?: 'TR31_B0_BASE_DERIVATION_KEY'|'TR31_C0_CARD_VERIFICATION_KEY'|'TR31_D0_SYMMETRIC_DATA_ENCRYPTION_KEY'|'TR31_E0_EMV_MKEY_APP_CRYPTOGRAMS'|'TR31_E1_EMV_MKEY_CONFIDENTIALITY'|'TR31_E2_EMV_MKEY_INTEGRITY'|'TR31_E4_EMV_MKEY_DYNAMIC_NUMBERS'|'TR31_E5_EMV_MKEY_CARD_PERSONALIZATION'|'TR31_E6_EMV_MKEY_OTHER'|'TR31_K0_KEY_ENCRYPTION_KEY'|'TR31_K1_KEY_BLOCK_PROTECTION_KEY'|'TR31_M1_ISO_9797_1_MAC_KEY'|'TR31_M3_ISO_9797_3_MAC_KEY'|'TR31_M6_ISO_9797_5_CMAC_KEY'|'TR31_M7_HMAC_KEY'|'TR31_P0_PIN_ENCRYPTION_KEY'|'TR31_P1_PIN_GENERATION_KEY'|'TR31_V1_IBM3624_PIN_VERIFICATION_KEY'|'TR31_V2_VISA_PIN_VERIFICATION_KEY',
 *     ReplicationRegions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAlias(array{AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAliasAsync(array{AliasName?: string, ...} $args = [])
 * @method \Aws\Result deleteKey(array $args = [])
 * @phpstan-method \Aws\Result deleteKey(array{KeyIdentifier?: string, DeleteKeyInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeyAsync(array{KeyIdentifier?: string, DeleteKeyInDays?: int, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result disableDefaultKeyReplicationRegions(array $args = [])
 * @phpstan-method \Aws\Result disableDefaultKeyReplicationRegions(array{ReplicationRegions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDefaultKeyReplicationRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableDefaultKeyReplicationRegionsAsync(array{ReplicationRegions?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociateMpaTeam(array $args = [])
 * @phpstan-method \Aws\Result disassociateMpaTeam(array{Action?: 'IMPORT_ROOT_PUBLIC_KEY_CERTIFICATE', RequesterComment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMpaTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMpaTeamAsync(array{Action?: 'IMPORT_ROOT_PUBLIC_KEY_CERTIFICATE', RequesterComment?: string, ...} $args = [])
 * @method \Aws\Result enableDefaultKeyReplicationRegions(array $args = [])
 * @phpstan-method \Aws\Result enableDefaultKeyReplicationRegions(array{ReplicationRegions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDefaultKeyReplicationRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableDefaultKeyReplicationRegionsAsync(array{ReplicationRegions?: list<string>, ...} $args = [])
 * @method \Aws\Result exportKey(array $args = [])
 * @phpstan-method \Aws\Result exportKey(array{
 *     KeyMaterial?: array{
 *         Tr31KeyBlock?: array{WrappingKeyIdentifier?: string, KeyBlockHeaders?: array, ...},
 *         Tr34KeyBlock?: array{
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             WrappingKeyCertificate?: string,
 *             ExportToken?: string,
 *             SigningKeyIdentifier?: string,
 *             SigningKeyCertificate?: string,
 *             KeyBlockFormat?: 'X9_TR34_2012',
 *             RandomNonce?: string,
 *             KeyBlockHeaders?: array,
 *             ...,
 *         },
 *         KeyCryptogram?: array{
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             WrappingKeyCertificate?: string,
 *             WrappingSpec?: 'RSA_OAEP_SHA_256'|'RSA_OAEP_SHA_512',
 *             ...,
 *         },
 *         DiffieHellmanTr31KeyBlock?: array{
 *             PrivateKeyIdentifier?: string,
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             PublicKeyCertificate?: string,
 *             DeriveKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'TDES_2KEY'|'TDES_3KEY',
 *             KeyDerivationFunction?: 'ANSI_X963'|'NIST_SP800',
 *             KeyDerivationHashAlgorithm?: 'SHA_256'|'SHA_384'|'SHA_512',
 *             DerivationData?: array,
 *             KeyBlockHeaders?: array,
 *             ...,
 *         },
 *         As2805KeyCryptogram?: array{
 *             WrappingKeyIdentifier?: string,
 *             As2805KeyVariant?: 'DATA_ENCRYPTION_KEY_VARIANT_22'|'MESSAGE_AUTHENTICATION_KEY_VARIANT_24'|'PIN_ENCRYPTION_KEY_VARIANT_28'|'TERMINAL_MAJOR_KEY_VARIANT_00',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExportKeyIdentifier?: string,
 *     ExportAttributes?: array{
 *         ExportDukptInitialKey?: array{KeySerialNumber?: string, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportKeyAsync(array{
 *     KeyMaterial?: array{
 *         Tr31KeyBlock?: array{WrappingKeyIdentifier?: string, KeyBlockHeaders?: array, ...},
 *         Tr34KeyBlock?: array{
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             WrappingKeyCertificate?: string,
 *             ExportToken?: string,
 *             SigningKeyIdentifier?: string,
 *             SigningKeyCertificate?: string,
 *             KeyBlockFormat?: 'X9_TR34_2012',
 *             RandomNonce?: string,
 *             KeyBlockHeaders?: array,
 *             ...,
 *         },
 *         KeyCryptogram?: array{
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             WrappingKeyCertificate?: string,
 *             WrappingSpec?: 'RSA_OAEP_SHA_256'|'RSA_OAEP_SHA_512',
 *             ...,
 *         },
 *         DiffieHellmanTr31KeyBlock?: array{
 *             PrivateKeyIdentifier?: string,
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             PublicKeyCertificate?: string,
 *             DeriveKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'TDES_2KEY'|'TDES_3KEY',
 *             KeyDerivationFunction?: 'ANSI_X963'|'NIST_SP800',
 *             KeyDerivationHashAlgorithm?: 'SHA_256'|'SHA_384'|'SHA_512',
 *             DerivationData?: array,
 *             KeyBlockHeaders?: array,
 *             ...,
 *         },
 *         As2805KeyCryptogram?: array{
 *             WrappingKeyIdentifier?: string,
 *             As2805KeyVariant?: 'DATA_ENCRYPTION_KEY_VARIANT_22'|'MESSAGE_AUTHENTICATION_KEY_VARIANT_24'|'PIN_ENCRYPTION_KEY_VARIANT_28'|'TERMINAL_MAJOR_KEY_VARIANT_00',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExportKeyIdentifier?: string,
 *     ExportAttributes?: array{
 *         ExportDukptInitialKey?: array{KeySerialNumber?: string, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAlias(array $args = [])
 * @phpstan-method \Aws\Result getAlias(array{AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAliasAsync(array{AliasName?: string, ...} $args = [])
 * @method \Aws\Result getCertificateSigningRequest(array $args = [])
 * @phpstan-method \Aws\Result getCertificateSigningRequest(array{
 *     KeyIdentifier?: string,
 *     SigningAlgorithm?: 'SHA224'|'SHA256'|'SHA384'|'SHA512',
 *     CertificateSubject?: array{
 *         CommonName?: string,
 *         OrganizationUnit?: string,
 *         Organization?: string,
 *         City?: string,
 *         Country?: string,
 *         StateOrProvince?: string,
 *         EmailAddress?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCertificateSigningRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCertificateSigningRequestAsync(array{
 *     KeyIdentifier?: string,
 *     SigningAlgorithm?: 'SHA224'|'SHA256'|'SHA384'|'SHA512',
 *     CertificateSubject?: array{
 *         CommonName?: string,
 *         OrganizationUnit?: string,
 *         Organization?: string,
 *         City?: string,
 *         Country?: string,
 *         StateOrProvince?: string,
 *         EmailAddress?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDefaultKeyReplicationRegions(array $args = [])
 * @phpstan-method \Aws\Result getDefaultKeyReplicationRegions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDefaultKeyReplicationRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDefaultKeyReplicationRegionsAsync(array{...} $args = [])
 * @method \Aws\Result getKey(array $args = [])
 * @phpstan-method \Aws\Result getKey(array{KeyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyAsync(array{KeyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getMpaTeamAssociation(array $args = [])
 * @phpstan-method \Aws\Result getMpaTeamAssociation(array{Action?: 'IMPORT_ROOT_PUBLIC_KEY_CERTIFICATE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMpaTeamAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMpaTeamAssociationAsync(array{Action?: 'IMPORT_ROOT_PUBLIC_KEY_CERTIFICATE', ...} $args = [])
 * @method \Aws\Result getParametersForExport(array $args = [])
 * @phpstan-method \Aws\Result getParametersForExport(array{
 *     KeyMaterialType?: 'KEY_CRYPTOGRAM'|'ROOT_PUBLIC_KEY_CERTIFICATE'|'TR31_KEY_BLOCK'|'TR34_KEY_BLOCK'|'TRUSTED_PUBLIC_KEY_CERTIFICATE',
 *     SigningKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *     ReuseLastGeneratedToken?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getParametersForExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParametersForExportAsync(array{
 *     KeyMaterialType?: 'KEY_CRYPTOGRAM'|'ROOT_PUBLIC_KEY_CERTIFICATE'|'TR31_KEY_BLOCK'|'TR34_KEY_BLOCK'|'TRUSTED_PUBLIC_KEY_CERTIFICATE',
 *     SigningKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *     ReuseLastGeneratedToken?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getParametersForImport(array $args = [])
 * @phpstan-method \Aws\Result getParametersForImport(array{
 *     KeyMaterialType?: 'KEY_CRYPTOGRAM'|'ROOT_PUBLIC_KEY_CERTIFICATE'|'TR31_KEY_BLOCK'|'TR34_KEY_BLOCK'|'TRUSTED_PUBLIC_KEY_CERTIFICATE',
 *     WrappingKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *     ReuseLastGeneratedToken?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getParametersForImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParametersForImportAsync(array{
 *     KeyMaterialType?: 'KEY_CRYPTOGRAM'|'ROOT_PUBLIC_KEY_CERTIFICATE'|'TR31_KEY_BLOCK'|'TR34_KEY_BLOCK'|'TRUSTED_PUBLIC_KEY_CERTIFICATE',
 *     WrappingKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *     ReuseLastGeneratedToken?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPublicKeyCertificate(array $args = [])
 * @phpstan-method \Aws\Result getPublicKeyCertificate(array{KeyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublicKeyCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublicKeyCertificateAsync(array{KeyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result importKey(array $args = [])
 * @phpstan-method \Aws\Result importKey(array{
 *     KeyMaterial?: array{
 *         RootCertificatePublicKey?: array{KeyAttributes?: array, PublicKeyCertificate?: string, ...},
 *         TrustedCertificatePublicKey?: array{
 *             KeyAttributes?: array,
 *             PublicKeyCertificate?: string,
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             ...,
 *         },
 *         Tr31KeyBlock?: array{WrappingKeyIdentifier?: string, WrappedKeyBlock?: string, ...},
 *         Tr34KeyBlock?: array{
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             SigningKeyCertificate?: string,
 *             ImportToken?: string,
 *             WrappingKeyIdentifier?: string,
 *             WrappingKeyCertificate?: string,
 *             WrappedKeyBlock?: string,
 *             KeyBlockFormat?: 'X9_TR34_2012',
 *             RandomNonce?: string,
 *             ...,
 *         },
 *         KeyCryptogram?: array{
 *             KeyAttributes?: array,
 *             Exportable?: bool,
 *             WrappedKeyCryptogram?: string,
 *             ImportToken?: string,
 *             WrappingSpec?: 'RSA_OAEP_SHA_256'|'RSA_OAEP_SHA_512',
 *             ...,
 *         },
 *         DiffieHellmanTr31KeyBlock?: array{
 *             PrivateKeyIdentifier?: string,
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             PublicKeyCertificate?: string,
 *             DeriveKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'TDES_2KEY'|'TDES_3KEY',
 *             KeyDerivationFunction?: 'ANSI_X963'|'NIST_SP800',
 *             KeyDerivationHashAlgorithm?: 'SHA_256'|'SHA_384'|'SHA_512',
 *             DerivationData?: array,
 *             WrappedKeyBlock?: string,
 *             ...,
 *         },
 *         As2805KeyCryptogram?: array{
 *             As2805KeyVariant?: 'DATA_ENCRYPTION_KEY_VARIANT_22'|'MESSAGE_AUTHENTICATION_KEY_VARIANT_24'|'PIN_ENCRYPTION_KEY_VARIANT_28'|'TERMINAL_MAJOR_KEY_VARIANT_00',
 *             KeyModesOfUse?: array,
 *             KeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *             Exportable?: bool,
 *             WrappingKeyIdentifier?: string,
 *             WrappedKeyCryptogram?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ReplicationRegions?: list<string>,
 *     RequesterComment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importKeyAsync(array{
 *     KeyMaterial?: array{
 *         RootCertificatePublicKey?: array{KeyAttributes?: array, PublicKeyCertificate?: string, ...},
 *         TrustedCertificatePublicKey?: array{
 *             KeyAttributes?: array,
 *             PublicKeyCertificate?: string,
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             ...,
 *         },
 *         Tr31KeyBlock?: array{WrappingKeyIdentifier?: string, WrappedKeyBlock?: string, ...},
 *         Tr34KeyBlock?: array{
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             SigningKeyCertificate?: string,
 *             ImportToken?: string,
 *             WrappingKeyIdentifier?: string,
 *             WrappingKeyCertificate?: string,
 *             WrappedKeyBlock?: string,
 *             KeyBlockFormat?: 'X9_TR34_2012',
 *             RandomNonce?: string,
 *             ...,
 *         },
 *         KeyCryptogram?: array{
 *             KeyAttributes?: array,
 *             Exportable?: bool,
 *             WrappedKeyCryptogram?: string,
 *             ImportToken?: string,
 *             WrappingSpec?: 'RSA_OAEP_SHA_256'|'RSA_OAEP_SHA_512',
 *             ...,
 *         },
 *         DiffieHellmanTr31KeyBlock?: array{
 *             PrivateKeyIdentifier?: string,
 *             CertificateAuthorityPublicKeyIdentifier?: string,
 *             PublicKeyCertificate?: string,
 *             DeriveKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'TDES_2KEY'|'TDES_3KEY',
 *             KeyDerivationFunction?: 'ANSI_X963'|'NIST_SP800',
 *             KeyDerivationHashAlgorithm?: 'SHA_256'|'SHA_384'|'SHA_512',
 *             DerivationData?: array,
 *             WrappedKeyBlock?: string,
 *             ...,
 *         },
 *         As2805KeyCryptogram?: array{
 *             As2805KeyVariant?: 'DATA_ENCRYPTION_KEY_VARIANT_22'|'MESSAGE_AUTHENTICATION_KEY_VARIANT_24'|'PIN_ENCRYPTION_KEY_VARIANT_28'|'TERMINAL_MAJOR_KEY_VARIANT_00',
 *             KeyModesOfUse?: array,
 *             KeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'TDES_2KEY'|'TDES_3KEY',
 *             Exportable?: bool,
 *             WrappingKeyIdentifier?: string,
 *             WrappedKeyCryptogram?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *     Enabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ReplicationRegions?: list<string>,
 *     RequesterComment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @phpstan-method \Aws\Result listAliases(array{KeyArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAliasesAsync(array{KeyArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listKeys(array $args = [])
 * @phpstan-method \Aws\Result listKeys(array{
 *     KeyState?: 'CREATE_COMPLETE'|'CREATE_IN_PROGRESS'|'DELETE_COMPLETE'|'DELETE_PENDING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeysAsync(array{
 *     KeyState?: 'CREATE_COMPLETE'|'CREATE_IN_PROGRESS'|'DELETE_COMPLETE'|'DELETE_PENDING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result removeKeyReplicationRegions(array $args = [])
 * @phpstan-method \Aws\Result removeKeyReplicationRegions(array{KeyIdentifier?: string, ReplicationRegions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeKeyReplicationRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeKeyReplicationRegionsAsync(array{KeyIdentifier?: string, ReplicationRegions?: list<string>, ...} $args = [])
 * @method \Aws\Result restoreKey(array $args = [])
 * @phpstan-method \Aws\Result restoreKey(array{KeyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreKeyAsync(array{KeyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result startKeyUsage(array $args = [])
 * @phpstan-method \Aws\Result startKeyUsage(array{KeyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startKeyUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startKeyUsageAsync(array{KeyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopKeyUsage(array $args = [])
 * @phpstan-method \Aws\Result stopKeyUsage(array{KeyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopKeyUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopKeyUsageAsync(array{KeyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAlias(array $args = [])
 * @phpstan-method \Aws\Result updateAlias(array{AliasName?: string, KeyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAliasAsync(array{AliasName?: string, KeyArn?: string, ...} $args = [])
 */
class PaymentCryptographyClient extends AwsClient {}
