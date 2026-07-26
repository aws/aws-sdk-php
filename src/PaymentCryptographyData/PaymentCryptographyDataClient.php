<?php
namespace Aws\PaymentCryptographyData;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Payment Cryptography Data Plane** service.
 * @method \Aws\Result decryptData(array $args = [])
 * @phpstan-method \Aws\Result decryptData(array{
 *     KeyIdentifier?: string,
 *     CipherText?: string,
 *     DecryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Asymmetric?: array{PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1', ...},
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         Emv?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionDerivationData?: string,
 *             Mode?: 'CBC'|'ECB',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     WrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise decryptDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise decryptDataAsync(array{
 *     KeyIdentifier?: string,
 *     CipherText?: string,
 *     DecryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Asymmetric?: array{PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1', ...},
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         Emv?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionDerivationData?: string,
 *             Mode?: 'CBC'|'ECB',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     WrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result encryptData(array $args = [])
 * @phpstan-method \Aws\Result encryptData(array{
 *     KeyIdentifier?: string,
 *     PlainText?: string,
 *     EncryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Asymmetric?: array{PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1', ...},
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         Emv?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionDerivationData?: string,
 *             Mode?: 'CBC'|'ECB',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     WrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise encryptDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise encryptDataAsync(array{
 *     KeyIdentifier?: string,
 *     PlainText?: string,
 *     EncryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Asymmetric?: array{PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1', ...},
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         Emv?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionDerivationData?: string,
 *             Mode?: 'CBC'|'ECB',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     WrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateAs2805KekValidation(array $args = [])
 * @phpstan-method \Aws\Result generateAs2805KekValidation(array{
 *     KeyIdentifier?: string,
 *     KekValidationType?: array{
 *         KekValidationRequest?: array{
 *             DeriveKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'TDES_2KEY'|'TDES_3KEY',
 *             RandomKeyMaxLength?: 'BYTES_16'|'BYTES_24'|'BYTES_8',
 *             ...,
 *         },
 *         KekValidationResponse?: array{RandomKeySend?: string, ...},
 *         ...,
 *     },
 *     RandomKeySendVariantMask?: 'VARIANT_MASK_82'|'VARIANT_MASK_82C0',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateAs2805KekValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateAs2805KekValidationAsync(array{
 *     KeyIdentifier?: string,
 *     KekValidationType?: array{
 *         KekValidationRequest?: array{
 *             DeriveKeyAlgorithm?: 'AES_128'|'AES_192'|'AES_256'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'TDES_2KEY'|'TDES_3KEY',
 *             RandomKeyMaxLength?: 'BYTES_16'|'BYTES_24'|'BYTES_8',
 *             ...,
 *         },
 *         KekValidationResponse?: array{RandomKeySend?: string, ...},
 *         ...,
 *     },
 *     RandomKeySendVariantMask?: 'VARIANT_MASK_82'|'VARIANT_MASK_82C0',
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateAuthRequestCryptogram(array $args = [])
 * @phpstan-method \Aws\Result generateAuthRequestCryptogram(array{
 *     KeyIdentifier?: string,
 *     TransactionData?: string,
 *     MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *     SessionKeyDerivationAttributes?: array{
 *         EmvCommon?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Mastercard?: array{
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             UnpredictableNumber?: string,
 *             ...,
 *         },
 *         Emv2000?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Amex?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         Visa?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         UnionPay?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateAuthRequestCryptogramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateAuthRequestCryptogramAsync(array{
 *     KeyIdentifier?: string,
 *     TransactionData?: string,
 *     MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *     SessionKeyDerivationAttributes?: array{
 *         EmvCommon?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Mastercard?: array{
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             UnpredictableNumber?: string,
 *             ...,
 *         },
 *         Emv2000?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Amex?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         Visa?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         UnionPay?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateCardValidationData(array $args = [])
 * @phpstan-method \Aws\Result generateCardValidationData(array{
 *     KeyIdentifier?: string,
 *     PrimaryAccountNumber?: string,
 *     GenerationAttributes?: array{
 *         AmexCardSecurityCodeVersion1?: array{CardExpiryDate?: string, ...},
 *         AmexCardSecurityCodeVersion2?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue1?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue2?: array{CardExpiryDate?: string, ...},
 *         CardHolderVerificationValue?: array{UnpredictableNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         DynamicCardVerificationCode?: array{
 *             UnpredictableNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             TrackData?: string,
 *             ...,
 *         },
 *         DynamicCardVerificationValue?: array{
 *             PanSequenceNumber?: string,
 *             CardExpiryDate?: string,
 *             ServiceCode?: string,
 *             ApplicationTransactionCounter?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ValidationDataLength?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateCardValidationDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateCardValidationDataAsync(array{
 *     KeyIdentifier?: string,
 *     PrimaryAccountNumber?: string,
 *     GenerationAttributes?: array{
 *         AmexCardSecurityCodeVersion1?: array{CardExpiryDate?: string, ...},
 *         AmexCardSecurityCodeVersion2?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue1?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue2?: array{CardExpiryDate?: string, ...},
 *         CardHolderVerificationValue?: array{UnpredictableNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         DynamicCardVerificationCode?: array{
 *             UnpredictableNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             TrackData?: string,
 *             ...,
 *         },
 *         DynamicCardVerificationValue?: array{
 *             PanSequenceNumber?: string,
 *             CardExpiryDate?: string,
 *             ServiceCode?: string,
 *             ApplicationTransactionCounter?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ValidationDataLength?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateMac(array $args = [])
 * @phpstan-method \Aws\Result generateMac(array{
 *     KeyIdentifier?: string,
 *     MessageData?: string,
 *     GenerationAttributes?: array{
 *         Algorithm?: 'AS2805_4_1'|'CMAC'|'HMAC'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'ISO9797_ALGORITHM1'|'ISO9797_ALGORITHM3',
 *         EmvMac?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionKeyDerivationMode?: 'AMEX'|'EMV2000'|'EMV_COMMON_SESSION_KEY'|'MASTERCARD_SESSION_KEY'|'UNION_PAY'|'VISA',
 *             SessionKeyDerivationValue?: array,
 *             ...,
 *         },
 *         DukptIso9797Algorithm1?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptIso9797Algorithm3?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptCmac?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     MacLength?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateMacAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateMacAsync(array{
 *     KeyIdentifier?: string,
 *     MessageData?: string,
 *     GenerationAttributes?: array{
 *         Algorithm?: 'AS2805_4_1'|'CMAC'|'HMAC'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'ISO9797_ALGORITHM1'|'ISO9797_ALGORITHM3',
 *         EmvMac?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionKeyDerivationMode?: 'AMEX'|'EMV2000'|'EMV_COMMON_SESSION_KEY'|'MASTERCARD_SESSION_KEY'|'UNION_PAY'|'VISA',
 *             SessionKeyDerivationValue?: array,
 *             ...,
 *         },
 *         DukptIso9797Algorithm1?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptIso9797Algorithm3?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptCmac?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     MacLength?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateMacEmvPinChange(array $args = [])
 * @phpstan-method \Aws\Result generateMacEmvPinChange(array{
 *     NewPinPekIdentifier?: string,
 *     NewEncryptedPinBlock?: string,
 *     PinBlockFormat?: 'ISO_FORMAT_0'|'ISO_FORMAT_1'|'ISO_FORMAT_3',
 *     SecureMessagingIntegrityKeyIdentifier?: string,
 *     SecureMessagingConfidentialityKeyIdentifier?: string,
 *     MessageData?: string,
 *     DerivationMethodAttributes?: array{
 *         EmvCommon?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationCryptogram?: string,
 *             Mode?: 'CBC'|'ECB',
 *             PinBlockPaddingType?: 'ISO_IEC_7816_4'|'NO_PADDING',
 *             PinBlockLengthPosition?: 'FRONT_OF_PIN_BLOCK'|'NONE',
 *             ...,
 *         },
 *         Amex?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             AuthorizationRequestKeyIdentifier?: string,
 *             CurrentPinAttributes?: array,
 *             ...,
 *         },
 *         Visa?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             AuthorizationRequestKeyIdentifier?: string,
 *             CurrentPinAttributes?: array,
 *             ...,
 *         },
 *         Emv2000?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             ...,
 *         },
 *         Mastercard?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationCryptogram?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateMacEmvPinChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateMacEmvPinChangeAsync(array{
 *     NewPinPekIdentifier?: string,
 *     NewEncryptedPinBlock?: string,
 *     PinBlockFormat?: 'ISO_FORMAT_0'|'ISO_FORMAT_1'|'ISO_FORMAT_3',
 *     SecureMessagingIntegrityKeyIdentifier?: string,
 *     SecureMessagingConfidentialityKeyIdentifier?: string,
 *     MessageData?: string,
 *     DerivationMethodAttributes?: array{
 *         EmvCommon?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationCryptogram?: string,
 *             Mode?: 'CBC'|'ECB',
 *             PinBlockPaddingType?: 'ISO_IEC_7816_4'|'NO_PADDING',
 *             PinBlockLengthPosition?: 'FRONT_OF_PIN_BLOCK'|'NONE',
 *             ...,
 *         },
 *         Amex?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             AuthorizationRequestKeyIdentifier?: string,
 *             CurrentPinAttributes?: array,
 *             ...,
 *         },
 *         Visa?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             AuthorizationRequestKeyIdentifier?: string,
 *             CurrentPinAttributes?: array,
 *             ...,
 *         },
 *         Emv2000?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             ...,
 *         },
 *         Mastercard?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationCryptogram?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result generatePinData(array $args = [])
 * @phpstan-method \Aws\Result generatePinData(array{
 *     GenerationKeyIdentifier?: string,
 *     EncryptionKeyIdentifier?: string,
 *     GenerationAttributes?: array{
 *         VisaPin?: array{PinVerificationKeyIndex?: int, ...},
 *         VisaPinVerificationValue?: array{EncryptedPinBlock?: string, PinVerificationKeyIndex?: int, ...},
 *         Ibm3624PinOffset?: array{
 *             EncryptedPinBlock?: string,
 *             DecimalizationTable?: string,
 *             PinValidationDataPadCharacter?: string,
 *             PinValidationData?: string,
 *             ...,
 *         },
 *         Ibm3624NaturalPin?: array{DecimalizationTable?: string, PinValidationDataPadCharacter?: string, PinValidationData?: string, ...},
 *         Ibm3624RandomPin?: array{DecimalizationTable?: string, PinValidationDataPadCharacter?: string, PinValidationData?: string, ...},
 *         Ibm3624PinFromOffset?: array{
 *             DecimalizationTable?: string,
 *             PinValidationDataPadCharacter?: string,
 *             PinValidationData?: string,
 *             PinOffset?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     PinDataLength?: int,
 *     PrimaryAccountNumber?: string,
 *     PinBlockFormat?: 'ISO_FORMAT_0'|'ISO_FORMAT_1'|'ISO_FORMAT_3'|'ISO_FORMAT_4',
 *     EncryptionWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generatePinDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generatePinDataAsync(array{
 *     GenerationKeyIdentifier?: string,
 *     EncryptionKeyIdentifier?: string,
 *     GenerationAttributes?: array{
 *         VisaPin?: array{PinVerificationKeyIndex?: int, ...},
 *         VisaPinVerificationValue?: array{EncryptedPinBlock?: string, PinVerificationKeyIndex?: int, ...},
 *         Ibm3624PinOffset?: array{
 *             EncryptedPinBlock?: string,
 *             DecimalizationTable?: string,
 *             PinValidationDataPadCharacter?: string,
 *             PinValidationData?: string,
 *             ...,
 *         },
 *         Ibm3624NaturalPin?: array{DecimalizationTable?: string, PinValidationDataPadCharacter?: string, PinValidationData?: string, ...},
 *         Ibm3624RandomPin?: array{DecimalizationTable?: string, PinValidationDataPadCharacter?: string, PinValidationData?: string, ...},
 *         Ibm3624PinFromOffset?: array{
 *             DecimalizationTable?: string,
 *             PinValidationDataPadCharacter?: string,
 *             PinValidationData?: string,
 *             PinOffset?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     PinDataLength?: int,
 *     PrimaryAccountNumber?: string,
 *     PinBlockFormat?: 'ISO_FORMAT_0'|'ISO_FORMAT_1'|'ISO_FORMAT_3'|'ISO_FORMAT_4',
 *     EncryptionWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result reEncryptData(array $args = [])
 * @phpstan-method \Aws\Result reEncryptData(array{
 *     IncomingKeyIdentifier?: string,
 *     OutgoingKeyIdentifier?: string,
 *     CipherText?: string,
 *     IncomingEncryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutgoingEncryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     IncomingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     OutgoingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise reEncryptDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reEncryptDataAsync(array{
 *     IncomingKeyIdentifier?: string,
 *     OutgoingKeyIdentifier?: string,
 *     CipherText?: string,
 *     IncomingEncryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutgoingEncryptionAttributes?: array{
 *         Symmetric?: array{
 *             Mode?: 'CBC'|'CFB'|'CFB1'|'CFB128'|'CFB64'|'CFB8'|'ECB'|'OFB',
 *             InitializationVector?: string,
 *             PaddingType?: 'OAEP_SHA1'|'OAEP_SHA256'|'OAEP_SHA512'|'PKCS1',
 *             ...,
 *         },
 *         Dukpt?: array{
 *             KeySerialNumber?: string,
 *             Mode?: 'CBC'|'ECB',
 *             DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             InitializationVector?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     IncomingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     OutgoingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result translateKeyMaterial(array $args = [])
 * @phpstan-method \Aws\Result translateKeyMaterial(array{
 *     IncomingKeyMaterial?: array{
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
 *         ...,
 *     },
 *     OutgoingKeyMaterial?: array{Tr31KeyBlock?: array{WrappingKeyIdentifier?: string, ...}, ...},
 *     KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise translateKeyMaterialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise translateKeyMaterialAsync(array{
 *     IncomingKeyMaterial?: array{
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
 *         ...,
 *     },
 *     OutgoingKeyMaterial?: array{Tr31KeyBlock?: array{WrappingKeyIdentifier?: string, ...}, ...},
 *     KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *     ...,
 * } $args = [])
 * @method \Aws\Result translatePinData(array $args = [])
 * @phpstan-method \Aws\Result translatePinData(array{
 *     IncomingKeyIdentifier?: string,
 *     OutgoingKeyIdentifier?: string,
 *     IncomingTranslationAttributes?: array{
 *         IsoFormat0?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat1?: array,
 *         IsoFormat3?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat4?: array{PrimaryAccountNumber?: string, ...},
 *         As2805Format0?: array{PrimaryAccountNumber?: string, ...},
 *         ...,
 *     },
 *     OutgoingTranslationAttributes?: array{
 *         IsoFormat0?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat1?: array,
 *         IsoFormat3?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat4?: array{PrimaryAccountNumber?: string, ...},
 *         As2805Format0?: array{PrimaryAccountNumber?: string, ...},
 *         ...,
 *     },
 *     EncryptedPinBlock?: string,
 *     IncomingDukptAttributes?: array{
 *         KeySerialNumber?: string,
 *         DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *         DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *         ...,
 *     },
 *     OutgoingDukptAttributes?: array{
 *         KeySerialNumber?: string,
 *         DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *         DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *         ...,
 *     },
 *     IncomingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     OutgoingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     IncomingAs2805Attributes?: array{SystemTraceAuditNumber?: string, TransactionAmount?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise translatePinDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise translatePinDataAsync(array{
 *     IncomingKeyIdentifier?: string,
 *     OutgoingKeyIdentifier?: string,
 *     IncomingTranslationAttributes?: array{
 *         IsoFormat0?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat1?: array,
 *         IsoFormat3?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat4?: array{PrimaryAccountNumber?: string, ...},
 *         As2805Format0?: array{PrimaryAccountNumber?: string, ...},
 *         ...,
 *     },
 *     OutgoingTranslationAttributes?: array{
 *         IsoFormat0?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat1?: array,
 *         IsoFormat3?: array{PrimaryAccountNumber?: string, ...},
 *         IsoFormat4?: array{PrimaryAccountNumber?: string, ...},
 *         As2805Format0?: array{PrimaryAccountNumber?: string, ...},
 *         ...,
 *     },
 *     EncryptedPinBlock?: string,
 *     IncomingDukptAttributes?: array{
 *         KeySerialNumber?: string,
 *         DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *         DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *         ...,
 *     },
 *     OutgoingDukptAttributes?: array{
 *         KeySerialNumber?: string,
 *         DukptKeyDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *         DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *         ...,
 *     },
 *     IncomingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     OutgoingWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     IncomingAs2805Attributes?: array{SystemTraceAuditNumber?: string, TransactionAmount?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyAuthRequestCryptogram(array $args = [])
 * @phpstan-method \Aws\Result verifyAuthRequestCryptogram(array{
 *     KeyIdentifier?: string,
 *     TransactionData?: string,
 *     AuthRequestCryptogram?: string,
 *     MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *     SessionKeyDerivationAttributes?: array{
 *         EmvCommon?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Mastercard?: array{
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             UnpredictableNumber?: string,
 *             ...,
 *         },
 *         Emv2000?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Amex?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         Visa?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         UnionPay?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         ...,
 *     },
 *     AuthResponseAttributes?: array{
 *         ArpcMethod1?: array{AuthResponseCode?: string, ...},
 *         ArpcMethod2?: array{CardStatusUpdate?: string, ProprietaryAuthenticationData?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyAuthRequestCryptogramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyAuthRequestCryptogramAsync(array{
 *     KeyIdentifier?: string,
 *     TransactionData?: string,
 *     AuthRequestCryptogram?: string,
 *     MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *     SessionKeyDerivationAttributes?: array{
 *         EmvCommon?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Mastercard?: array{
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             UnpredictableNumber?: string,
 *             ...,
 *         },
 *         Emv2000?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         Amex?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         Visa?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ...},
 *         UnionPay?: array{PrimaryAccountNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         ...,
 *     },
 *     AuthResponseAttributes?: array{
 *         ArpcMethod1?: array{AuthResponseCode?: string, ...},
 *         ArpcMethod2?: array{CardStatusUpdate?: string, ProprietaryAuthenticationData?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyCardValidationData(array $args = [])
 * @phpstan-method \Aws\Result verifyCardValidationData(array{
 *     KeyIdentifier?: string,
 *     PrimaryAccountNumber?: string,
 *     VerificationAttributes?: array{
 *         AmexCardSecurityCodeVersion1?: array{CardExpiryDate?: string, ...},
 *         AmexCardSecurityCodeVersion2?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue1?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue2?: array{CardExpiryDate?: string, ...},
 *         CardHolderVerificationValue?: array{UnpredictableNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         DynamicCardVerificationCode?: array{
 *             UnpredictableNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             TrackData?: string,
 *             ...,
 *         },
 *         DynamicCardVerificationValue?: array{
 *             PanSequenceNumber?: string,
 *             CardExpiryDate?: string,
 *             ServiceCode?: string,
 *             ApplicationTransactionCounter?: string,
 *             ...,
 *         },
 *         DiscoverDynamicCardVerificationCode?: array{CardExpiryDate?: string, UnpredictableNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         ...,
 *     },
 *     ValidationData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyCardValidationDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyCardValidationDataAsync(array{
 *     KeyIdentifier?: string,
 *     PrimaryAccountNumber?: string,
 *     VerificationAttributes?: array{
 *         AmexCardSecurityCodeVersion1?: array{CardExpiryDate?: string, ...},
 *         AmexCardSecurityCodeVersion2?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue1?: array{CardExpiryDate?: string, ServiceCode?: string, ...},
 *         CardVerificationValue2?: array{CardExpiryDate?: string, ...},
 *         CardHolderVerificationValue?: array{UnpredictableNumber?: string, PanSequenceNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         DynamicCardVerificationCode?: array{
 *             UnpredictableNumber?: string,
 *             PanSequenceNumber?: string,
 *             ApplicationTransactionCounter?: string,
 *             TrackData?: string,
 *             ...,
 *         },
 *         DynamicCardVerificationValue?: array{
 *             PanSequenceNumber?: string,
 *             CardExpiryDate?: string,
 *             ServiceCode?: string,
 *             ApplicationTransactionCounter?: string,
 *             ...,
 *         },
 *         DiscoverDynamicCardVerificationCode?: array{CardExpiryDate?: string, UnpredictableNumber?: string, ApplicationTransactionCounter?: string, ...},
 *         ...,
 *     },
 *     ValidationData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyMac(array $args = [])
 * @phpstan-method \Aws\Result verifyMac(array{
 *     KeyIdentifier?: string,
 *     MessageData?: string,
 *     Mac?: string,
 *     VerificationAttributes?: array{
 *         Algorithm?: 'AS2805_4_1'|'CMAC'|'HMAC'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'ISO9797_ALGORITHM1'|'ISO9797_ALGORITHM3',
 *         EmvMac?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionKeyDerivationMode?: 'AMEX'|'EMV2000'|'EMV_COMMON_SESSION_KEY'|'MASTERCARD_SESSION_KEY'|'UNION_PAY'|'VISA',
 *             SessionKeyDerivationValue?: array,
 *             ...,
 *         },
 *         DukptIso9797Algorithm1?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptIso9797Algorithm3?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptCmac?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     MacLength?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyMacAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyMacAsync(array{
 *     KeyIdentifier?: string,
 *     MessageData?: string,
 *     Mac?: string,
 *     VerificationAttributes?: array{
 *         Algorithm?: 'AS2805_4_1'|'CMAC'|'HMAC'|'HMAC_SHA224'|'HMAC_SHA256'|'HMAC_SHA384'|'HMAC_SHA512'|'ISO9797_ALGORITHM1'|'ISO9797_ALGORITHM3',
 *         EmvMac?: array{
 *             MajorKeyDerivationMode?: 'EMV_OPTION_A'|'EMV_OPTION_B',
 *             PrimaryAccountNumber?: string,
 *             PanSequenceNumber?: string,
 *             SessionKeyDerivationMode?: 'AMEX'|'EMV2000'|'EMV_COMMON_SESSION_KEY'|'MASTERCARD_SESSION_KEY'|'UNION_PAY'|'VISA',
 *             SessionKeyDerivationValue?: array,
 *             ...,
 *         },
 *         DukptIso9797Algorithm1?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptIso9797Algorithm3?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         DukptCmac?: array{
 *             KeySerialNumber?: string,
 *             DukptKeyVariant?: 'BIDIRECTIONAL'|'REQUEST'|'RESPONSE',
 *             DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     MacLength?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyPinData(array $args = [])
 * @phpstan-method \Aws\Result verifyPinData(array{
 *     VerificationKeyIdentifier?: string,
 *     EncryptionKeyIdentifier?: string,
 *     VerificationAttributes?: array{
 *         VisaPin?: array{PinVerificationKeyIndex?: int, VerificationValue?: string, ...},
 *         Ibm3624Pin?: array{
 *             DecimalizationTable?: string,
 *             PinValidationDataPadCharacter?: string,
 *             PinValidationData?: string,
 *             PinOffset?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     EncryptedPinBlock?: string,
 *     PrimaryAccountNumber?: string,
 *     PinBlockFormat?: 'ISO_FORMAT_0'|'ISO_FORMAT_1'|'ISO_FORMAT_3'|'ISO_FORMAT_4',
 *     PinDataLength?: int,
 *     DukptAttributes?: array{
 *         KeySerialNumber?: string,
 *         DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *         ...,
 *     },
 *     EncryptionWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyPinDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyPinDataAsync(array{
 *     VerificationKeyIdentifier?: string,
 *     EncryptionKeyIdentifier?: string,
 *     VerificationAttributes?: array{
 *         VisaPin?: array{PinVerificationKeyIndex?: int, VerificationValue?: string, ...},
 *         Ibm3624Pin?: array{
 *             DecimalizationTable?: string,
 *             PinValidationDataPadCharacter?: string,
 *             PinValidationData?: string,
 *             PinOffset?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     EncryptedPinBlock?: string,
 *     PrimaryAccountNumber?: string,
 *     PinBlockFormat?: 'ISO_FORMAT_0'|'ISO_FORMAT_1'|'ISO_FORMAT_3'|'ISO_FORMAT_4',
 *     PinDataLength?: int,
 *     DukptAttributes?: array{
 *         KeySerialNumber?: string,
 *         DukptDerivationType?: 'AES_128'|'AES_192'|'AES_256'|'TDES_2KEY'|'TDES_3KEY',
 *         ...,
 *     },
 *     EncryptionWrappedKey?: array{
 *         WrappedKeyMaterial?: array{Tr31KeyBlock?: string, DiffieHellmanSymmetricKey?: array, ...},
 *         KeyCheckValueAlgorithm?: 'ANSI_X9_24'|'CMAC'|'HMAC'|'SHA_1',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class PaymentCryptographyDataClient extends AwsClient {}
