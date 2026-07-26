<?php
namespace Aws\Kms;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Key Management Service**.
 *
 * @method \Aws\Result cancelKeyDeletion(array $args = [])
 * @phpstan-method \Aws\Result cancelKeyDeletion(array{KeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelKeyDeletionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelKeyDeletionAsync(array{KeyId?: string, ...} $args = [])
 * @method \Aws\Result connectCustomKeyStore(array $args = [])
 * @phpstan-method \Aws\Result connectCustomKeyStore(array{CustomKeyStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise connectCustomKeyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise connectCustomKeyStoreAsync(array{CustomKeyStoreId?: string, ...} $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @phpstan-method \Aws\Result createAlias(array{AliasName?: string, TargetKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAliasAsync(array{AliasName?: string, TargetKeyId?: string, ...} $args = [])
 * @method \Aws\Result createCustomKeyStore(array $args = [])
 * @phpstan-method \Aws\Result createCustomKeyStore(array{
 *     CustomKeyStoreName?: string,
 *     CloudHsmClusterId?: string,
 *     TrustAnchorCertificate?: string,
 *     KeyStorePassword?: string,
 *     CustomKeyStoreType?: 'AWS_CLOUDHSM'|'EXTERNAL_KEY_STORE',
 *     XksProxyUriEndpoint?: string,
 *     XksProxyUriPath?: string,
 *     XksProxyVpcEndpointServiceName?: string,
 *     XksProxyVpcEndpointServiceOwner?: string,
 *     XksProxyAuthenticationCredential?: array{AccessKeyId?: string, RawSecretAccessKey?: string, ...},
 *     XksProxyConnectivity?: 'PUBLIC_ENDPOINT'|'VPC_ENDPOINT_SERVICE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomKeyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomKeyStoreAsync(array{
 *     CustomKeyStoreName?: string,
 *     CloudHsmClusterId?: string,
 *     TrustAnchorCertificate?: string,
 *     KeyStorePassword?: string,
 *     CustomKeyStoreType?: 'AWS_CLOUDHSM'|'EXTERNAL_KEY_STORE',
 *     XksProxyUriEndpoint?: string,
 *     XksProxyUriPath?: string,
 *     XksProxyVpcEndpointServiceName?: string,
 *     XksProxyVpcEndpointServiceOwner?: string,
 *     XksProxyAuthenticationCredential?: array{AccessKeyId?: string, RawSecretAccessKey?: string, ...},
 *     XksProxyConnectivity?: 'PUBLIC_ENDPOINT'|'VPC_ENDPOINT_SERVICE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGrant(array $args = [])
 * @phpstan-method \Aws\Result createGrant(array{
 *     KeyId?: string,
 *     GranteePrincipal?: string,
 *     RetiringPrincipal?: string,
 *     Operations?: list<'CreateGrant'|'Decrypt'|'DeriveSharedSecret'|'DescribeKey'|'Encrypt'|'GenerateDataKey'|'GenerateDataKeyPair'|'GenerateDataKeyPairWithoutPlaintext'|'GenerateDataKeyWithoutPlaintext'|'GenerateMac'|'GetPublicKey'|'ReEncryptFrom'|'ReEncryptTo'|'RetireGrant'|'Sign'|'Verify'|'VerifyMac'>,
 *     Constraints?: array{
 *         EncryptionContextSubset?: array<string, string>,
 *         EncryptionContextEquals?: array<string, string>,
 *         SourceArn?: string,
 *         ...,
 *     },
 *     GrantTokens?: list<string>,
 *     Name?: string,
 *     DryRun?: bool,
 *     GranteeServicePrincipal?: string,
 *     RetiringServicePrincipal?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGrantAsync(array{
 *     KeyId?: string,
 *     GranteePrincipal?: string,
 *     RetiringPrincipal?: string,
 *     Operations?: list<'CreateGrant'|'Decrypt'|'DeriveSharedSecret'|'DescribeKey'|'Encrypt'|'GenerateDataKey'|'GenerateDataKeyPair'|'GenerateDataKeyPairWithoutPlaintext'|'GenerateDataKeyWithoutPlaintext'|'GenerateMac'|'GetPublicKey'|'ReEncryptFrom'|'ReEncryptTo'|'RetireGrant'|'Sign'|'Verify'|'VerifyMac'>,
 *     Constraints?: array{
 *         EncryptionContextSubset?: array<string, string>,
 *         EncryptionContextEquals?: array<string, string>,
 *         SourceArn?: string,
 *         ...,
 *     },
 *     GrantTokens?: list<string>,
 *     Name?: string,
 *     DryRun?: bool,
 *     GranteeServicePrincipal?: string,
 *     RetiringServicePrincipal?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKey(array $args = [])
 * @phpstan-method \Aws\Result createKey(array{
 *     Policy?: string,
 *     Description?: string,
 *     KeyUsage?: 'ENCRYPT_DECRYPT'|'GENERATE_VERIFY_MAC'|'KEY_AGREEMENT'|'SIGN_VERIFY',
 *     CustomerMasterKeySpec?: 'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'HMAC_224'|'HMAC_256'|'HMAC_384'|'HMAC_512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2'|'SYMMETRIC_DEFAULT',
 *     KeySpec?: 'ECC_NIST_EDWARDS25519'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'HMAC_224'|'HMAC_256'|'HMAC_384'|'HMAC_512'|'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2'|'SYMMETRIC_DEFAULT',
 *     Origin?: 'AWS_CLOUDHSM'|'AWS_KMS'|'EXTERNAL'|'EXTERNAL_KEY_STORE',
 *     CustomKeyStoreId?: string,
 *     BypassPolicyLockoutSafetyCheck?: bool,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     MultiRegion?: bool,
 *     XksKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeyAsync(array{
 *     Policy?: string,
 *     Description?: string,
 *     KeyUsage?: 'ENCRYPT_DECRYPT'|'GENERATE_VERIFY_MAC'|'KEY_AGREEMENT'|'SIGN_VERIFY',
 *     CustomerMasterKeySpec?: 'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'HMAC_224'|'HMAC_256'|'HMAC_384'|'HMAC_512'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2'|'SYMMETRIC_DEFAULT',
 *     KeySpec?: 'ECC_NIST_EDWARDS25519'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'HMAC_224'|'HMAC_256'|'HMAC_384'|'HMAC_512'|'ML_DSA_44'|'ML_DSA_65'|'ML_DSA_87'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2'|'SYMMETRIC_DEFAULT',
 *     Origin?: 'AWS_CLOUDHSM'|'AWS_KMS'|'EXTERNAL'|'EXTERNAL_KEY_STORE',
 *     CustomKeyStoreId?: string,
 *     BypassPolicyLockoutSafetyCheck?: bool,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     MultiRegion?: bool,
 *     XksKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result decrypt(array $args = [])
 * @phpstan-method \Aws\Result decrypt(array{
 *     CiphertextBlob?: string|resource|\Psr\Http\Message\StreamInterface,
 *     EncryptionContext?: array<string, string>,
 *     GrantTokens?: list<string>,
 *     KeyId?: string,
 *     EncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     DryRunModifiers?: list<'IGNORE_CIPHERTEXT'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise decryptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise decryptAsync(array{
 *     CiphertextBlob?: string|resource|\Psr\Http\Message\StreamInterface,
 *     EncryptionContext?: array<string, string>,
 *     GrantTokens?: list<string>,
 *     KeyId?: string,
 *     EncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     DryRunModifiers?: list<'IGNORE_CIPHERTEXT'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAlias(array{AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAliasAsync(array{AliasName?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomKeyStore(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomKeyStore(array{CustomKeyStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomKeyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomKeyStoreAsync(array{CustomKeyStoreId?: string, ...} $args = [])
 * @method \Aws\Result deleteImportedKeyMaterial(array $args = [])
 * @phpstan-method \Aws\Result deleteImportedKeyMaterial(array{KeyId?: string, KeyMaterialId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImportedKeyMaterialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImportedKeyMaterialAsync(array{KeyId?: string, KeyMaterialId?: string, ...} $args = [])
 * @method \Aws\Result deriveSharedSecret(array $args = [])
 * @phpstan-method \Aws\Result deriveSharedSecret(array{
 *     KeyId?: string,
 *     KeyAgreementAlgorithm?: 'ECDH',
 *     PublicKey?: string|resource|\Psr\Http\Message\StreamInterface,
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deriveSharedSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deriveSharedSecretAsync(array{
 *     KeyId?: string,
 *     KeyAgreementAlgorithm?: 'ECDH',
 *     PublicKey?: string|resource|\Psr\Http\Message\StreamInterface,
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCustomKeyStores(array $args = [])
 * @phpstan-method \Aws\Result describeCustomKeyStores(array{CustomKeyStoreId?: string, CustomKeyStoreName?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomKeyStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomKeyStoresAsync(array{CustomKeyStoreId?: string, CustomKeyStoreName?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeKey(array $args = [])
 * @phpstan-method \Aws\Result describeKey(array{KeyId?: string, GrantTokens?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKeyAsync(array{KeyId?: string, GrantTokens?: list<string>, ...} $args = [])
 * @method \Aws\Result disableKey(array $args = [])
 * @phpstan-method \Aws\Result disableKey(array{KeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableKeyAsync(array{KeyId?: string, ...} $args = [])
 * @method \Aws\Result disableKeyRotation(array $args = [])
 * @phpstan-method \Aws\Result disableKeyRotation(array{KeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableKeyRotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableKeyRotationAsync(array{KeyId?: string, ...} $args = [])
 * @method \Aws\Result disconnectCustomKeyStore(array $args = [])
 * @phpstan-method \Aws\Result disconnectCustomKeyStore(array{CustomKeyStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disconnectCustomKeyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disconnectCustomKeyStoreAsync(array{CustomKeyStoreId?: string, ...} $args = [])
 * @method \Aws\Result enableKey(array $args = [])
 * @phpstan-method \Aws\Result enableKey(array{KeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableKeyAsync(array{KeyId?: string, ...} $args = [])
 * @method \Aws\Result enableKeyRotation(array $args = [])
 * @phpstan-method \Aws\Result enableKeyRotation(array{KeyId?: string, RotationPeriodInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableKeyRotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableKeyRotationAsync(array{KeyId?: string, RotationPeriodInDays?: int, ...} $args = [])
 * @method \Aws\Result encrypt(array $args = [])
 * @phpstan-method \Aws\Result encrypt(array{
 *     KeyId?: string,
 *     Plaintext?: string|resource|\Psr\Http\Message\StreamInterface,
 *     EncryptionContext?: array<string, string>,
 *     GrantTokens?: list<string>,
 *     EncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise encryptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise encryptAsync(array{
 *     KeyId?: string,
 *     Plaintext?: string|resource|\Psr\Http\Message\StreamInterface,
 *     EncryptionContext?: array<string, string>,
 *     GrantTokens?: list<string>,
 *     EncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateDataKey(array $args = [])
 * @phpstan-method \Aws\Result generateDataKey(array{
 *     KeyId?: string,
 *     EncryptionContext?: array<string, string>,
 *     NumberOfBytes?: int,
 *     KeySpec?: 'AES_128'|'AES_256',
 *     GrantTokens?: list<string>,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateDataKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateDataKeyAsync(array{
 *     KeyId?: string,
 *     EncryptionContext?: array<string, string>,
 *     NumberOfBytes?: int,
 *     KeySpec?: 'AES_128'|'AES_256',
 *     GrantTokens?: list<string>,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateDataKeyPair(array $args = [])
 * @phpstan-method \Aws\Result generateDataKeyPair(array{
 *     EncryptionContext?: array<string, string>,
 *     KeyId?: string,
 *     KeyPairSpec?: 'ECC_NIST_EDWARDS25519'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *     GrantTokens?: list<string>,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateDataKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateDataKeyPairAsync(array{
 *     EncryptionContext?: array<string, string>,
 *     KeyId?: string,
 *     KeyPairSpec?: 'ECC_NIST_EDWARDS25519'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *     GrantTokens?: list<string>,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateDataKeyPairWithoutPlaintext(array $args = [])
 * @phpstan-method \Aws\Result generateDataKeyPairWithoutPlaintext(array{
 *     EncryptionContext?: array<string, string>,
 *     KeyId?: string,
 *     KeyPairSpec?: 'ECC_NIST_EDWARDS25519'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateDataKeyPairWithoutPlaintextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateDataKeyPairWithoutPlaintextAsync(array{
 *     EncryptionContext?: array<string, string>,
 *     KeyId?: string,
 *     KeyPairSpec?: 'ECC_NIST_EDWARDS25519'|'ECC_NIST_P256'|'ECC_NIST_P384'|'ECC_NIST_P521'|'ECC_SECG_P256K1'|'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateDataKeyWithoutPlaintext(array $args = [])
 * @phpstan-method \Aws\Result generateDataKeyWithoutPlaintext(array{
 *     KeyId?: string,
 *     EncryptionContext?: array<string, string>,
 *     KeySpec?: 'AES_128'|'AES_256',
 *     NumberOfBytes?: int,
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateDataKeyWithoutPlaintextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateDataKeyWithoutPlaintextAsync(array{
 *     KeyId?: string,
 *     EncryptionContext?: array<string, string>,
 *     KeySpec?: 'AES_128'|'AES_256',
 *     NumberOfBytes?: int,
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateMac(array $args = [])
 * @phpstan-method \Aws\Result generateMac(array{
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KeyId?: string,
 *     MacAlgorithm?: 'HMAC_SHA_224'|'HMAC_SHA_256'|'HMAC_SHA_384'|'HMAC_SHA_512',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateMacAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateMacAsync(array{
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KeyId?: string,
 *     MacAlgorithm?: 'HMAC_SHA_224'|'HMAC_SHA_256'|'HMAC_SHA_384'|'HMAC_SHA_512',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateRandom(array $args = [])
 * @phpstan-method \Aws\Result generateRandom(array{
 *     NumberOfBytes?: int,
 *     CustomKeyStoreId?: string,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateRandomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateRandomAsync(array{
 *     NumberOfBytes?: int,
 *     CustomKeyStoreId?: string,
 *     Recipient?: array{
 *         KeyEncryptionAlgorithm?: 'RSAES_OAEP_SHA_256',
 *         AttestationDocument?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getKeyLastUsage(array $args = [])
 * @phpstan-method \Aws\Result getKeyLastUsage(array{KeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyLastUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyLastUsageAsync(array{KeyId?: string, ...} $args = [])
 * @method \Aws\Result getKeyPolicy(array $args = [])
 * @phpstan-method \Aws\Result getKeyPolicy(array{KeyId?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyPolicyAsync(array{KeyId?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result getKeyRotationStatus(array $args = [])
 * @phpstan-method \Aws\Result getKeyRotationStatus(array{KeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKeyRotationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKeyRotationStatusAsync(array{KeyId?: string, ...} $args = [])
 * @method \Aws\Result getParametersForImport(array $args = [])
 * @phpstan-method \Aws\Result getParametersForImport(array{
 *     KeyId?: string,
 *     WrappingAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'RSAES_PKCS1_V1_5'|'RSA_AES_KEY_WRAP_SHA_1'|'RSA_AES_KEY_WRAP_SHA_256'|'SM2PKE',
 *     WrappingKeySpec?: 'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getParametersForImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParametersForImportAsync(array{
 *     KeyId?: string,
 *     WrappingAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'RSAES_PKCS1_V1_5'|'RSA_AES_KEY_WRAP_SHA_1'|'RSA_AES_KEY_WRAP_SHA_256'|'SM2PKE',
 *     WrappingKeySpec?: 'RSA_2048'|'RSA_3072'|'RSA_4096'|'SM2',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPublicKey(array $args = [])
 * @phpstan-method \Aws\Result getPublicKey(array{KeyId?: string, GrantTokens?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublicKeyAsync(array{KeyId?: string, GrantTokens?: list<string>, ...} $args = [])
 * @method \Aws\Result importKeyMaterial(array $args = [])
 * @phpstan-method \Aws\Result importKeyMaterial(array{
 *     KeyId?: string,
 *     ImportToken?: string|resource|\Psr\Http\Message\StreamInterface,
 *     EncryptedKeyMaterial?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ValidTo?: int|string|\DateTimeInterface,
 *     ExpirationModel?: 'KEY_MATERIAL_DOES_NOT_EXPIRE'|'KEY_MATERIAL_EXPIRES',
 *     ImportType?: 'EXISTING_KEY_MATERIAL'|'NEW_KEY_MATERIAL',
 *     KeyMaterialDescription?: string,
 *     KeyMaterialId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importKeyMaterialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importKeyMaterialAsync(array{
 *     KeyId?: string,
 *     ImportToken?: string|resource|\Psr\Http\Message\StreamInterface,
 *     EncryptedKeyMaterial?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ValidTo?: int|string|\DateTimeInterface,
 *     ExpirationModel?: 'KEY_MATERIAL_DOES_NOT_EXPIRE'|'KEY_MATERIAL_EXPIRES',
 *     ImportType?: 'EXISTING_KEY_MATERIAL'|'NEW_KEY_MATERIAL',
 *     KeyMaterialDescription?: string,
 *     KeyMaterialId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @phpstan-method \Aws\Result listAliases(array{KeyId?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAliasesAsync(array{KeyId?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result listGrants(array $args = [])
 * @phpstan-method \Aws\Result listGrants(array{
 *     Limit?: int,
 *     Marker?: string,
 *     KeyId?: string,
 *     GrantId?: string,
 *     GranteePrincipal?: string,
 *     GranteeServicePrincipal?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGrantsAsync(array{
 *     Limit?: int,
 *     Marker?: string,
 *     KeyId?: string,
 *     GrantId?: string,
 *     GranteePrincipal?: string,
 *     GranteeServicePrincipal?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listKeyPolicies(array $args = [])
 * @phpstan-method \Aws\Result listKeyPolicies(array{KeyId?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeyPoliciesAsync(array{KeyId?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result listKeyRotations(array $args = [])
 * @phpstan-method \Aws\Result listKeyRotations(array{
 *     KeyId?: string,
 *     IncludeKeyMaterial?: 'ALL_KEY_MATERIAL'|'ROTATIONS_ONLY',
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyRotationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeyRotationsAsync(array{
 *     KeyId?: string,
 *     IncludeKeyMaterial?: 'ALL_KEY_MATERIAL'|'ROTATIONS_ONLY',
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listKeys(array $args = [])
 * @phpstan-method \Aws\Result listKeys(array{Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeysAsync(array{Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result listResourceTags(array $args = [])
 * @phpstan-method \Aws\Result listResourceTags(array{KeyId?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceTagsAsync(array{KeyId?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result listRetirableGrants(array $args = [])
 * @phpstan-method \Aws\Result listRetirableGrants(array{Limit?: int, Marker?: string, RetiringPrincipal?: string, RetiringServicePrincipal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRetirableGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRetirableGrantsAsync(array{Limit?: int, Marker?: string, RetiringPrincipal?: string, RetiringServicePrincipal?: string, ...} $args = [])
 * @method \Aws\Result putKeyPolicy(array $args = [])
 * @phpstan-method \Aws\Result putKeyPolicy(array{KeyId?: string, PolicyName?: string, Policy?: string, BypassPolicyLockoutSafetyCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putKeyPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putKeyPolicyAsync(array{KeyId?: string, PolicyName?: string, Policy?: string, BypassPolicyLockoutSafetyCheck?: bool, ...} $args = [])
 * @method \Aws\Result reEncrypt(array $args = [])
 * @phpstan-method \Aws\Result reEncrypt(array{
 *     CiphertextBlob?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SourceEncryptionContext?: array<string, string>,
 *     SourceKeyId?: string,
 *     DestinationKeyId?: string,
 *     DestinationEncryptionContext?: array<string, string>,
 *     SourceEncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     DestinationEncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     DryRunModifiers?: list<'IGNORE_CIPHERTEXT'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise reEncryptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reEncryptAsync(array{
 *     CiphertextBlob?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SourceEncryptionContext?: array<string, string>,
 *     SourceKeyId?: string,
 *     DestinationKeyId?: string,
 *     DestinationEncryptionContext?: array<string, string>,
 *     SourceEncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     DestinationEncryptionAlgorithm?: 'RSAES_OAEP_SHA_1'|'RSAES_OAEP_SHA_256'|'SM2PKE'|'SYMMETRIC_DEFAULT',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     DryRunModifiers?: list<'IGNORE_CIPHERTEXT'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result replicateKey(array $args = [])
 * @phpstan-method \Aws\Result replicateKey(array{
 *     KeyId?: string,
 *     ReplicaRegion?: string,
 *     Policy?: string,
 *     BypassPolicyLockoutSafetyCheck?: bool,
 *     Description?: string,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise replicateKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise replicateKeyAsync(array{
 *     KeyId?: string,
 *     ReplicaRegion?: string,
 *     Policy?: string,
 *     BypassPolicyLockoutSafetyCheck?: bool,
 *     Description?: string,
 *     Tags?: list<array{TagKey?: string, TagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result retireGrant(array $args = [])
 * @phpstan-method \Aws\Result retireGrant(array{GrantToken?: string, KeyId?: string, GrantId?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retireGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retireGrantAsync(array{GrantToken?: string, KeyId?: string, GrantId?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result revokeGrant(array $args = [])
 * @phpstan-method \Aws\Result revokeGrant(array{KeyId?: string, GrantId?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeGrantAsync(array{KeyId?: string, GrantId?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result rotateKeyOnDemand(array $args = [])
 * @phpstan-method \Aws\Result rotateKeyOnDemand(array{KeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rotateKeyOnDemandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rotateKeyOnDemandAsync(array{KeyId?: string, ...} $args = [])
 * @method \Aws\Result scheduleKeyDeletion(array $args = [])
 * @phpstan-method \Aws\Result scheduleKeyDeletion(array{KeyId?: string, PendingWindowInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise scheduleKeyDeletionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise scheduleKeyDeletionAsync(array{KeyId?: string, PendingWindowInDays?: int, ...} $args = [])
 * @method \Aws\Result sign(array $args = [])
 * @phpstan-method \Aws\Result sign(array{
 *     KeyId?: string,
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     MessageType?: 'DIGEST'|'EXTERNAL_MU'|'RAW',
 *     GrantTokens?: list<string>,
 *     SigningAlgorithm?: 'ECDSA_SHA_256'|'ECDSA_SHA_384'|'ECDSA_SHA_512'|'ED25519_PH_SHA_512'|'ED25519_SHA_512'|'ML_DSA_SHAKE_256'|'RSASSA_PKCS1_V1_5_SHA_256'|'RSASSA_PKCS1_V1_5_SHA_384'|'RSASSA_PKCS1_V1_5_SHA_512'|'RSASSA_PSS_SHA_256'|'RSASSA_PSS_SHA_384'|'RSASSA_PSS_SHA_512'|'SM2DSA',
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise signAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise signAsync(array{
 *     KeyId?: string,
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     MessageType?: 'DIGEST'|'EXTERNAL_MU'|'RAW',
 *     GrantTokens?: list<string>,
 *     SigningAlgorithm?: 'ECDSA_SHA_256'|'ECDSA_SHA_384'|'ECDSA_SHA_512'|'ED25519_PH_SHA_512'|'ED25519_SHA_512'|'ML_DSA_SHAKE_256'|'RSASSA_PKCS1_V1_5_SHA_256'|'RSASSA_PKCS1_V1_5_SHA_384'|'RSASSA_PKCS1_V1_5_SHA_512'|'RSASSA_PSS_SHA_256'|'RSASSA_PSS_SHA_384'|'RSASSA_PSS_SHA_512'|'SM2DSA',
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{KeyId?: string, Tags?: list<array{TagKey?: string, TagValue?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{KeyId?: string, Tags?: list<array{TagKey?: string, TagValue?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{KeyId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{KeyId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAlias(array $args = [])
 * @phpstan-method \Aws\Result updateAlias(array{AliasName?: string, TargetKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAliasAsync(array{AliasName?: string, TargetKeyId?: string, ...} $args = [])
 * @method \Aws\Result updateCustomKeyStore(array $args = [])
 * @phpstan-method \Aws\Result updateCustomKeyStore(array{
 *     CustomKeyStoreId?: string,
 *     NewCustomKeyStoreName?: string,
 *     KeyStorePassword?: string,
 *     CloudHsmClusterId?: string,
 *     XksProxyUriEndpoint?: string,
 *     XksProxyUriPath?: string,
 *     XksProxyVpcEndpointServiceName?: string,
 *     XksProxyVpcEndpointServiceOwner?: string,
 *     XksProxyAuthenticationCredential?: array{AccessKeyId?: string, RawSecretAccessKey?: string, ...},
 *     XksProxyConnectivity?: 'PUBLIC_ENDPOINT'|'VPC_ENDPOINT_SERVICE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomKeyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomKeyStoreAsync(array{
 *     CustomKeyStoreId?: string,
 *     NewCustomKeyStoreName?: string,
 *     KeyStorePassword?: string,
 *     CloudHsmClusterId?: string,
 *     XksProxyUriEndpoint?: string,
 *     XksProxyUriPath?: string,
 *     XksProxyVpcEndpointServiceName?: string,
 *     XksProxyVpcEndpointServiceOwner?: string,
 *     XksProxyAuthenticationCredential?: array{AccessKeyId?: string, RawSecretAccessKey?: string, ...},
 *     XksProxyConnectivity?: 'PUBLIC_ENDPOINT'|'VPC_ENDPOINT_SERVICE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKeyDescription(array $args = [])
 * @phpstan-method \Aws\Result updateKeyDescription(array{KeyId?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKeyDescriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKeyDescriptionAsync(array{KeyId?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updatePrimaryRegion(array $args = [])
 * @phpstan-method \Aws\Result updatePrimaryRegion(array{KeyId?: string, PrimaryRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePrimaryRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePrimaryRegionAsync(array{KeyId?: string, PrimaryRegion?: string, ...} $args = [])
 * @method \Aws\Result verify(array $args = [])
 * @phpstan-method \Aws\Result verify(array{
 *     KeyId?: string,
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     MessageType?: 'DIGEST'|'EXTERNAL_MU'|'RAW',
 *     Signature?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SigningAlgorithm?: 'ECDSA_SHA_256'|'ECDSA_SHA_384'|'ECDSA_SHA_512'|'ED25519_PH_SHA_512'|'ED25519_SHA_512'|'ML_DSA_SHAKE_256'|'RSASSA_PKCS1_V1_5_SHA_256'|'RSASSA_PKCS1_V1_5_SHA_384'|'RSASSA_PKCS1_V1_5_SHA_512'|'RSASSA_PSS_SHA_256'|'RSASSA_PSS_SHA_384'|'RSASSA_PSS_SHA_512'|'SM2DSA',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyAsync(array{
 *     KeyId?: string,
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     MessageType?: 'DIGEST'|'EXTERNAL_MU'|'RAW',
 *     Signature?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SigningAlgorithm?: 'ECDSA_SHA_256'|'ECDSA_SHA_384'|'ECDSA_SHA_512'|'ED25519_PH_SHA_512'|'ED25519_SHA_512'|'ML_DSA_SHAKE_256'|'RSASSA_PKCS1_V1_5_SHA_256'|'RSASSA_PKCS1_V1_5_SHA_384'|'RSASSA_PKCS1_V1_5_SHA_512'|'RSASSA_PSS_SHA_256'|'RSASSA_PSS_SHA_384'|'RSASSA_PSS_SHA_512'|'SM2DSA',
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyMac(array $args = [])
 * @phpstan-method \Aws\Result verifyMac(array{
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KeyId?: string,
 *     MacAlgorithm?: 'HMAC_SHA_224'|'HMAC_SHA_256'|'HMAC_SHA_384'|'HMAC_SHA_512',
 *     Mac?: string|resource|\Psr\Http\Message\StreamInterface,
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyMacAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyMacAsync(array{
 *     Message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KeyId?: string,
 *     MacAlgorithm?: 'HMAC_SHA_224'|'HMAC_SHA_256'|'HMAC_SHA_384'|'HMAC_SHA_512',
 *     Mac?: string|resource|\Psr\Http\Message\StreamInterface,
 *     GrantTokens?: list<string>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 */
class KmsClient extends AwsClient {}
