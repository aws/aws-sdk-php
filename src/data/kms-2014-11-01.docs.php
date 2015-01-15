<?php return [
  'operations' => [
    'CreateAlias' => '<p> Creates a display name for a customer master key. An alias can be used to identify a key and should be unique. The console enforces a one-to-one mapping between the alias and a key. An alias name can contain only alphanumeric characters, forward slashes (/], underscores (_], and dashes (-]. An alias must start with the word "alias" followed by a forward slash (alias/]. An alias that begins with "aws" after the forward slash (alias/aws...] is reserved by Amazon Web Services (AWS]. </p>',
    'CreateGrant' => '<p>Adds a grant to a key to specify who can access the key and under what conditions. Grants are alternate permission mechanisms to key policies. If absent, access to the key is evaluated based on IAM policies attached to the user. By default, grants do not expire. Grants can be listed, retired, or revoked as indicated by the following APIs. Typically, when you are finished using a grant, you retire it. When you want to end a grant immediately, revoke it. For more information about grants, see <a href="http://docs.aws.amazon.com/kms/latest/developerguide/grants.html">Grants</a>. <ol> <li><a>ListGrants</a></li> <li><a>RetireGrant</a></li> <li><a>RevokeGrant</a></li> </ol> </p>',
    'CreateKey' => '<p>Creates a customer master key. Customer master keys can be used to encrypt small amounts of data (less than 4K] directly, but they are most commonly used to encrypt or envelope data keys that are then used to encrypt customer data. For more information about data keys, see <a>GenerateDataKey</a> and <a>GenerateDataKeyWithoutPlaintext</a>.</p>',
    'Decrypt' => '<p>Decrypts ciphertext. Ciphertext is plaintext that has been previously encrypted by using the <a>Encrypt</a> function.</p>',
    'DeleteAlias' => '<p>Deletes the specified alias.</p>',
    'DescribeKey' => '<p>Provides detailed information about the specified customer master key.</p>',
    'DisableKey' => '<p>Marks a key as disabled, thereby preventing its use.</p>',
    'DisableKeyRotation' => 'Disables rotation of the specified key.',
    'EnableKey' => 'Marks a key as enabled, thereby permitting its use. You can have up to 25 enabled keys at one time.',
    'EnableKeyRotation' => 'Enables rotation of the specified customer master key.',
    'Encrypt' => '<p>Encrypts plaintext into ciphertext by using a customer master key.</p>',
    'GenerateDataKey' => '<p>Generates a secure data key. Data keys are used to encrypt and decrypt data. They are wrapped by customer master keys. </p>',
    'GenerateDataKeyWithoutPlaintext' => '<p>Returns a key wrapped by a customer master key without the plaintext copy of that key. To retrieve the plaintext, see <a>GenerateDataKey</a>. </p>',
    'GenerateRandom' => '<p>Generates an unpredictable byte string. </p>',
    'GetKeyPolicy' => '<p>Retrieves a policy attached to the specified key.</p>',
    'GetKeyRotationStatus' => 'Retrieves a Boolean value that indicates whether key rotation is enabled for the specified key.',
    'ListAliases' => '<p>Lists all of the key aliases in the account.</p>',
    'ListGrants' => '<p>List the grants for a specified key.</p>',
    'ListKeyPolicies' => '<p>Retrieves a list of policies attached to a key.</p>',
    'ListKeys' => '<p>Lists the customer master keys.</p>',
    'PutKeyPolicy' => '<p>Attaches a policy to the specified key.</p>',
    'ReEncrypt' => '<p>Encrypts data on the server side with a new customer master key without exposing the plaintext of the data on the client side. The data is first decrypted and then encrypted. This operation can also be used to change the encryption context of a ciphertext. </p>',
    'RetireGrant' => 'Retires a grant. You can retire a grant when you\'re done using it to clean up. You should revoke a grant when you intend to actively deny operations that depend on it.',
    'RevokeGrant' => 'Revokes a grant. You can revoke a grant to actively deny operations that depend on it.',
    'UpdateKeyDescription' => '<p>Updates the description of a key.</p>',
  ],
  'service' => '<fullname>AWS Key Management Service</fullname> <p> AWS Key Management Service (KMS] is an encryption and key management web service. This guide describes the KMS actions that you can call programmatically. For general information about KMS, see (need an address here]. For the KMS developer guide, see (need address here]. </p> <note> AWS provides SDKs that consist of libraries and sample code for various programming languages and platforms (Java, Ruby, .Net, iOS, Android, etc.]. The SDKs provide a convenient way to create programmatic access to KMS and AWS. For example, the SDKs take care of tasks such as signing requests (see below], managing errors, and retrying requests automatically. For more information about the AWS SDKs, including how to download and install them, see <a href="http://aws.amazon.com/tools/">Tools for Amazon Web Services</a>. </note> <p> We recommend that you use the AWS SDKs to make programmatic API calls to KMS. However, you can also use the KMS Query API to make to make direct calls to the KMS web service. </p> <p><b>Signing Requests</b></p> <p> Requests must be signed by using an access key ID and a secret access key. We strongly recommend that you do not use your AWS account access key ID and secret key for everyday work with KMS. Instead, use the access key ID and secret access key for an IAM user, or you can use the AWS Security Token Service to generate temporary security credentials that you can use to sign requests. </p> <p> All KMS operations require <a href="http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html">Signature Version 4</a>. </p> <p><b>Recording API Requests</b></p> <p> KMS supports AWS CloudTrail, a service that records AWS API calls and related events for your AWS account and delivers them to an Amazon S3 bucket that you specify. By using the information collected by CloudTrail, you can determine what requests were made to KMS, who made the request, when it was made, and so on. To learn more about CloudTrail, including how to turn it on and find your log files, see the <a href="http://docs.aws.amazon.com/awscloudtrail/latest/userguide/whatiscloudtrail.html">AWS CloudTrail User Guide</a> </p> <p><b>Additional Resources</b></p> <p>For more information about credentials and request signing, see the following:</p> <ul> <li> <a href="http://docs.aws.amazon.com/general/latest/gr/aws-security-credentials.html">AWS Security Credentials</a>. This topic provides general information about the types of credentials used for accessing AWS. </li> <li> <a href="http://docs.aws.amazon.com/STS/latest/UsingSTS/">AWS Security Token Service</a>. This guide describes how to create and use temporary security credentials. </li> <li> <a href="http://docs.aws.amazon.com/general/latest/gr/signing_aws_api_requests.html">Signing AWS API Requests</a>. This set of topics walks you through the process of signing a request using an access key ID and a secret access key. </li> </ul>',
  'shapes' => [
    'AWSAccountIdType' => [
      'base' => NULL,
      'refs' => [
        'KeyMetadata$AWSAccountId' => '<p>Account ID number.</p>',
      ],
    ],
    'AliasList' => [
      'base' => NULL,
      'refs' => [
        'ListAliasesResponse$Aliases' => '<p>A list of key aliases in the user\'s account.</p>',
      ],
    ],
    'AliasListEntry' => [
      'base' => 'Contains information about an alias.',
      'refs' => [
        'AliasList$member' => NULL,
      ],
    ],
    'AliasNameType' => [
      'base' => NULL,
      'refs' => [
        'AliasListEntry$AliasName' => '<p>String that contains the alias.</p>',
        'CreateAliasRequest$AliasName' => '<p>String that contains the display name. Aliases that begin with AWS are reserved.</p>',
        'DeleteAliasRequest$AliasName' => '<p>The alias to be deleted.</p>',
      ],
    ],
    'AlreadyExistsException' => [
      'base' => '<p>The request was rejected because it attempted to create a resource that already exists.</p>',
      'refs' => [],
    ],
    'ArnType' => [
      'base' => NULL,
      'refs' => [
        'AliasListEntry$AliasArn' => '<p>String that contains the key ARN.</p>',
        'KeyListEntry$KeyArn' => '<p>ARN of the key.</p>',
        'KeyMetadata$Arn' => '<p>Key ARN (Amazon Resource Name].</p>',
      ],
    ],
    'BooleanType' => [
      'base' => NULL,
      'refs' => [
        'GetKeyRotationStatusResponse$KeyRotationEnabled' => 'A Boolean value that specifies whether key rotation is enabled.',
        'KeyMetadata$Enabled' => '<p>Value that specifies whether the key is enabled.</p>',
        'ListAliasesResponse$Truncated' => '<p>A flag that indicates whether there are more items in the list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more aliases in the list. </p>',
        'ListGrantsResponse$Truncated' => '<p>A flag that indicates whether there are more items in the list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more grants in the list. </p>',
        'ListKeyPoliciesResponse$Truncated' => '<p>A flag that indicates whether there are more items in the list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more policies in the list. </p>',
        'ListKeysResponse$Truncated' => '<p>A flag that indicates whether there are more items in the list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more keys in the list. </p>',
      ],
    ],
    'CiphertextType' => [
      'base' => NULL,
      'refs' => [
        'DecryptRequest$CiphertextBlob' => '<p>Ciphertext including metadata.</p>',
        'EncryptResponse$CiphertextBlob' => '<p>The encrypted plaintext.</p>',
        'GenerateDataKeyResponse$CiphertextBlob' => '<p>Ciphertext that contains the wrapped key. You must store the blob and encryption context so that the ciphertext can be decrypted. You must provide both the ciphertext blob and the encryption context. </p>',
        'GenerateDataKeyWithoutPlaintextResponse$CiphertextBlob' => '<p>Ciphertext that contains the wrapped key. You must store the blob and encryption context so that the key can be used in a future operation. </p>',
        'ReEncryptRequest$CiphertextBlob' => '<p>Ciphertext of the data to re-encrypt.</p>',
        'ReEncryptResponse$CiphertextBlob' => '<p>The re-encrypted data.</p>',
      ],
    ],
    'CreateAliasRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateGrantRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateGrantResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateKeyResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DataKeySpec' => [
      'base' => NULL,
      'refs' => [
        'GenerateDataKeyRequest$KeySpec' => '<p>Value that identifies the encryption algorithm and key size to generate a data key for. Currently this can be AES_128 or AES_256. </p>',
        'GenerateDataKeyWithoutPlaintextRequest$KeySpec' => '<p>Value that identifies the encryption algorithm and key size. Currently this can be AES_128 or AES_256. </p>',
      ],
    ],
    'DateType' => [
      'base' => NULL,
      'refs' => [
        'KeyMetadata$CreationDate' => '<p>Date the key was created.</p>',
      ],
    ],
    'DecryptRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DecryptResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteAliasRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DependencyTimeoutException' => [
      'base' => '<p>The system timed out while trying to fulfill the request.</p>',
      'refs' => [],
    ],
    'DescribeKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeKeyResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescriptionType' => [
      'base' => NULL,
      'refs' => [
        'CreateKeyRequest$Description' => '<p>Description of the key. We recommend that you choose a description that helps your customer decide whether the key is appropriate for a task. </p>',
        'KeyMetadata$Description' => '<p>The description of the key.</p>',
        'UpdateKeyDescriptionRequest$Description' => '<p>New description for the key.</p>',
      ],
    ],
    'DisableKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DisableKeyRotationRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DisabledException' => [
      'base' => '<p>A request was rejected because the specified key was marked as disabled.</p>',
      'refs' => [],
    ],
    'EnableKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'EnableKeyRotationRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'EncryptRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'EncryptResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'EncryptionContextKey' => [
      'base' => NULL,
      'refs' => [
        'EncryptionContextType$key' => NULL,
      ],
    ],
    'EncryptionContextType' => [
      'base' => NULL,
      'refs' => [
        'DecryptRequest$EncryptionContext' => '<p>The encryption context. If this was specified in the <a>Encrypt</a> function, it must be specified here or the decryption operation will fail. For more information, see <a href="http://docs.aws.amazon.com/kms/latest/developerguide/encrypt-context.html">Encryption Context</a>. </p>',
        'EncryptRequest$EncryptionContext' => '<p>Name:value pair that specifies the encryption context to be used for authenticated encryption. For more information, see <a href="http://docs.aws.amazon.com/kms/latest/developerguide/crypto_authen.html">Authenticated Encryption</a>. </p>',
        'GenerateDataKeyRequest$EncryptionContext' => '<p>Name/value pair that contains additional data to be authenticated during the encryption and decryption processes that use the key. This value is logged by AWS CloudTrail to provide context around the data encrypted by the key. </p>',
        'GenerateDataKeyWithoutPlaintextRequest$EncryptionContext' => '<p>Name:value pair that contains additional data to be authenticated during the encryption and decryption processes. </p>',
        'GrantConstraints$EncryptionContextSubset' => 'The constraint equals the full encryption context.',
        'GrantConstraints$EncryptionContextEquals' => 'The constraint contains additional key/value pairs that serve to further limit the grant.',
        'ReEncryptRequest$SourceEncryptionContext' => '<p>Encryption context used to encrypt and decrypt the data specified in the <code>CiphertextBlob</code> parameter. </p>',
        'ReEncryptRequest$DestinationEncryptionContext' => '<p>Encryption context to be used when the data is re-encrypted.</p>',
      ],
    ],
    'EncryptionContextValue' => [
      'base' => NULL,
      'refs' => [
        'EncryptionContextType$value' => NULL,
      ],
    ],
    'ErrorMessageType' => [
      'base' => NULL,
      'refs' => [
        'AlreadyExistsException$message' => NULL,
        'DependencyTimeoutException$message' => NULL,
        'DisabledException$message' => NULL,
        'InvalidAliasNameException$message' => NULL,
        'InvalidArnException$message' => NULL,
        'InvalidCiphertextException$message' => NULL,
        'InvalidGrantTokenException$message' => NULL,
        'InvalidKeyUsageException$message' => NULL,
        'InvalidMarkerException$message' => NULL,
        'KMSInternalException$message' => NULL,
        'KeyUnavailableException$message' => NULL,
        'LimitExceededException$message' => NULL,
        'MalformedPolicyDocumentException$message' => NULL,
        'NotFoundException$message' => NULL,
        'UnsupportedOperationException$message' => NULL,
      ],
    ],
    'GenerateDataKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GenerateDataKeyResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GenerateDataKeyWithoutPlaintextRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GenerateDataKeyWithoutPlaintextResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GenerateRandomRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GenerateRandomResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetKeyPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetKeyPolicyResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetKeyRotationStatusRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetKeyRotationStatusResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GrantConstraints' => [
      'base' => 'Contains constraints on the grant.',
      'refs' => [
        'CreateGrantRequest$Constraints' => '<p>Specifies the conditions under which the actions specified by the <code>Operations</code> parameter are allowed. </p>',
        'GrantListEntry$Constraints' => '<p>Specifies the conditions under which the actions specified by the <code>Operations</code> parameter are allowed. </p>',
      ],
    ],
    'GrantIdType' => [
      'base' => NULL,
      'refs' => [
        'CreateGrantResponse$GrantId' => '<p>Unique grant identifier. You can use the <i>GrantId</i> value to revoke a grant.</p>',
        'GrantListEntry$GrantId' => '<p>Unique grant identifier.</p>',
        'RevokeGrantRequest$GrantId' => '<p>Identifier of the grant to be revoked.</p>',
      ],
    ],
    'GrantList' => [
      'base' => NULL,
      'refs' => [
        'ListGrantsResponse$Grants' => '<p>A list of grants.</p>',
      ],
    ],
    'GrantListEntry' => [
      'base' => '<p>Contains information about each entry in the grant list.</p>',
      'refs' => [
        'GrantList$member' => NULL,
      ],
    ],
    'GrantOperation' => [
      'base' => NULL,
      'refs' => [
        'GrantOperationList$member' => NULL,
      ],
    ],
    'GrantOperationList' => [
      'base' => NULL,
      'refs' => [
        'CreateGrantRequest$Operations' => '<p>List of operations permitted by the grant. This can be any combination of one or more of the following values: <ol> <li>Decrypt</li> <li>Encrypt</li> <li>GenerateDataKey</li> <li>GenerateDataKeyWithoutPlaintext</li> <li>ReEncryptFrom</li> <li>ReEncryptTo</li> <li>CreateGrant</li> </ol> </p>',
        'GrantListEntry$Operations' => '<p>List of operations permitted by the grant. This can be any combination of one or more of the following values: <ol> <li>Decrypt</li> <li>Encrypt</li> <li>GenerateDataKey</li> <li>GenerateDataKeyWithoutPlaintext</li> <li>ReEncryptFrom</li> <li>ReEncryptTo</li> <li>CreateGrant</li> </ol></p>',
      ],
    ],
    'GrantTokenList' => [
      'base' => NULL,
      'refs' => [
        'CreateGrantRequest$GrantTokens' => '<p>List of grant tokens.</p>',
        'DecryptRequest$GrantTokens' => '<p>A list of grant tokens that represent grants which can be used to provide long term permissions to perform decryption.</p>',
        'EncryptRequest$GrantTokens' => '<p>A list of grant tokens that represent grants which can be used to provide long term permissions to perform encryption.</p>',
        'GenerateDataKeyRequest$GrantTokens' => '<p>A list of grant tokens that represent grants which can be used to provide long term permissions to generate a key.</p>',
        'GenerateDataKeyWithoutPlaintextRequest$GrantTokens' => '<p>A list of grant tokens that represent grants which can be used to provide long term permissions to generate a key.</p>',
        'ReEncryptRequest$GrantTokens' => '<p> Grant tokens that identify the grants that have permissions for the encryption and decryption process.</p>',
      ],
    ],
    'GrantTokenType' => [
      'base' => NULL,
      'refs' => [
        'CreateGrantResponse$GrantToken' => '<p>The grant token. A grant token is a string that identifies a grant and which can be used to make a grant take effect immediately. A token contains all of the information necessary to create a grant.</p>',
        'GrantTokenList$member' => NULL,
        'RetireGrantRequest$GrantToken' => '<p>Token that identifies the grant to be retired.</p>',
      ],
    ],
    'InvalidAliasNameException' => [
      'base' => '<p>The request was rejected because the specified alias name is not valid.</p>',
      'refs' => [],
    ],
    'InvalidArnException' => [
      'base' => '<p>The request was rejected because a specified ARN was not valid.</p>',
      'refs' => [],
    ],
    'InvalidCiphertextException' => [
      'base' => '<p>The request was rejected because the specified ciphertext has been corrupted or is otherwise invalid.</p>',
      'refs' => [],
    ],
    'InvalidGrantTokenException' => [
      'base' => '<p>A grant token provided as part of the request is invalid.</p>',
      'refs' => [],
    ],
    'InvalidKeyUsageException' => [
      'base' => '<p>The request was rejected because the specified KeySpec parameter is not valid. The currently supported value is ENCRYPT/DECRYPT. </p>',
      'refs' => [],
    ],
    'InvalidMarkerException' => [
      'base' => '<p>The request was rejected because the marker that specifies where pagination should next begin is not valid. </p>',
      'refs' => [],
    ],
    'KMSInternalException' => [
      'base' => '<b>The request was rejected because an internal exception occurred. This error can be retried.</b>',
      'refs' => [],
    ],
    'KeyIdType' => [
      'base' => NULL,
      'refs' => [
        'AliasListEntry$TargetKeyId' => '<p>String that contains the key identifier pointed to by the alias.</p>',
        'CreateAliasRequest$TargetKeyId' => '<p>An identifier of the key for which you are creating the alias. This value cannot be another alias.</p>',
        'CreateGrantRequest$KeyId' => '<p>A unique key identifier for a customer master key. This value can be a globally unique identifier, an ARN, or an alias. </p>',
        'DecryptResponse$KeyId' => '<p>Unique identifier created by the system for the key. This value is always returned as long as no errors are encountered during the operation.</p>',
        'DescribeKeyRequest$KeyId' => '<p>Unique identifier of the customer master key to be described. This can be an ARN, an alias, or a globally unique identifier. </p>',
        'DisableKeyRequest$KeyId' => '<p>Unique identifier of the customer master key to be disabled. This can be an ARN, an alias, or a globally unique identifier. </p>',
        'DisableKeyRotationRequest$KeyId' => '<p>Unique identifier of the customer master key for which rotation is to be disabled. This can be an ARN, an alias, or a globally unique identifier. </p>',
        'EnableKeyRequest$KeyId' => '<p>Unique identifier of the customer master key to be enabled. This can be an ARN, an alias, or a globally unique identifier. </p>',
        'EnableKeyRotationRequest$KeyId' => '<p>Unique identifier of the customer master key for which rotation is to be enabled. This can be an ARN, an alias, or a globally unique identifier. </p>',
        'EncryptRequest$KeyId' => '<p>Unique identifier of the customer master. This can be an ARN, an alias, or the Key ID. </p>',
        'EncryptResponse$KeyId' => '<p>The ID of the key used during encryption.</p>',
        'GenerateDataKeyRequest$KeyId' => '<p>Unique identifier of the key. This can be an ARN, an alias, or a globally unique identifier.</p>',
        'GenerateDataKeyResponse$KeyId' => '<p>System generated unique identifier for the key.</p>',
        'GenerateDataKeyWithoutPlaintextRequest$KeyId' => '<p>Unique identifier of the key. This can be an ARN, an alias, or a globally unique identifier.</p>',
        'GenerateDataKeyWithoutPlaintextResponse$KeyId' => '<p>System generated unique identifier for the key.</p>',
        'GetKeyPolicyRequest$KeyId' => '<p>Unique identifier of the key. This can be an ARN, an alias, or a globally unique identifier.</p>',
        'GetKeyRotationStatusRequest$KeyId' => '<p>Unique identifier of the key. This can be an ARN, an alias, or a globally unique identifier.</p>',
        'KeyListEntry$KeyId' => '<p>Unique identifier of the key.</p>',
        'KeyMetadata$KeyId' => '<p>Unique identifier for the key.</p>',
        'ListGrantsRequest$KeyId' => '<p>Unique identifier of the key. This can be an ARN, an alias, or a globally unique identifier.</p>',
        'ListKeyPoliciesRequest$KeyId' => '<p>Unique identifier of the key. This can be an ARN, an alias, or a globally unique identifier.</p>',
        'PutKeyPolicyRequest$KeyId' => '<p>Unique identifier of the key. This can be an ARN, an alias, or a globally unique identifier.</p>',
        'ReEncryptRequest$DestinationKeyId' => '<p>Key identifier of the key used to re-encrypt the data.</p>',
        'ReEncryptResponse$SourceKeyId' => '<p>Unique identifier of the key used to originally encrypt the data.</p>',
        'ReEncryptResponse$KeyId' => '<p>Unique identifier of the key used to re-encrypt the data.</p>',
        'RevokeGrantRequest$KeyId' => '<p>Unique identifier of the key associated with the grant.</p>',
        'UpdateKeyDescriptionRequest$KeyId' => '<p>Unique value that identifies the key for which the description is to be changed.</p>',
      ],
    ],
    'KeyList' => [
      'base' => NULL,
      'refs' => [
        'ListKeysResponse$Keys' => '<p>A list of keys.</p>',
      ],
    ],
    'KeyListEntry' => [
      'base' => '<p>Contains information about each entry in the key list.</p>',
      'refs' => [
        'KeyList$member' => NULL,
      ],
    ],
    'KeyMetadata' => [
      'base' => 'Contains metadata associated with a specific key.',
      'refs' => [
        'CreateKeyResponse$KeyMetadata' => '<p>Metadata associated with the key.</p>',
        'DescribeKeyResponse$KeyMetadata' => '<p>Metadata associated with the key.</p>',
      ],
    ],
    'KeyUnavailableException' => [
      'base' => '<p>The request was rejected because the key was disabled, not found, or otherwise not available.</p>',
      'refs' => [],
    ],
    'KeyUsageType' => [
      'base' => NULL,
      'refs' => [
        'CreateKeyRequest$KeyUsage' => '<p>Specifies the intended use of the key. Currently this defaults to ENCRYPT/DECRYPT, and only symmetric encryption and decryption are supported. </p>',
        'KeyMetadata$KeyUsage' => '<p>A value that specifies what operation(s] the key can perform.</p>',
      ],
    ],
    'LimitExceededException' => [
      'base' => '<p>The request was rejected because a quota was exceeded.</p>',
      'refs' => [],
    ],
    'LimitType' => [
      'base' => NULL,
      'refs' => [
        'ListAliasesRequest$Limit' => '<p>Specify this parameter when paginating results to indicate the maximum number of aliases you want in each response. If there are additional aliases beyond the maximum you specify, the <code>Truncated</code> response element will be set to <code>true.</code> </p>',
        'ListGrantsRequest$Limit' => '<p>Specify this parameter only when paginating results to indicate the maximum number of grants you want listed in the response. If there are additional grants beyond the maximum you specify, the <code>Truncated</code> response element will be set to <code>true.</code> </p>',
        'ListKeyPoliciesRequest$Limit' => '<p>Specify this parameter only when paginating results to indicate the maximum number of policies you want listed in the response. If there are additional policies beyond the maximum you specify, the <code>Truncated</code> response element will be set to <code>true.</code> </p>',
        'ListKeysRequest$Limit' => '<p>Specify this parameter only when paginating results to indicate the maximum number of keys you want listed in the response. If there are additional keys beyond the maximum you specify, the <code>Truncated</code> response element will be set to <code>true.</code> </p>',
      ],
    ],
    'ListAliasesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListAliasesResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListGrantsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListGrantsResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListKeyPoliciesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListKeyPoliciesResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListKeysRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListKeysResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'MalformedPolicyDocumentException' => [
      'base' => '<p>The request was rejected because the specified policy is not syntactically or semantically correct. </p>',
      'refs' => [],
    ],
    'MarkerType' => [
      'base' => NULL,
      'refs' => [
        'ListAliasesRequest$Marker' => '<p>Use this parameter when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>NextMarker</code> element in the response you just received. </p>',
        'ListAliasesResponse$NextMarker' => '<p>If <code>Truncated</code> is true, this value is present and contains the value to use for the <code>Marker</code> request parameter in a subsequent pagination request. </p>',
        'ListGrantsRequest$Marker' => '<p>Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>NextMarker</code> in the response you just received. </p>',
        'ListGrantsResponse$NextMarker' => '<p>If <code>Truncated</code> is true, this value is present and contains the value to use for the <code>Marker</code> request parameter in a subsequent pagination request. </p>',
        'ListKeyPoliciesRequest$Marker' => '<p>Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>NextMarker</code> in the response you just received. </p>',
        'ListKeyPoliciesResponse$NextMarker' => '<p>If <code>Truncated</code> is true, this value is present and contains the value to use for the <code>Marker</code> request parameter in a subsequent pagination request. </p>',
        'ListKeysRequest$Marker' => '<p>Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>NextMarker</code> in the response you just received. </p>',
        'ListKeysResponse$NextMarker' => '<p>If <code>Truncated</code> is true, this value is present and contains the value to use for the <code>Marker</code> request parameter in a subsequent pagination request. </p>',
      ],
    ],
    'NotFoundException' => [
      'base' => '<p>The request was rejected because the specified entity or resource could not be found. </p>',
      'refs' => [],
    ],
    'NumberOfBytesType' => [
      'base' => NULL,
      'refs' => [
        'GenerateDataKeyRequest$NumberOfBytes' => '<p>Integer that contains the number of bytes to generate. Common values are 128, 256, 512, 1024 and so on. 1024 is the current limit. </p>',
        'GenerateDataKeyWithoutPlaintextRequest$NumberOfBytes' => '<p>Integer that contains the number of bytes to generate. Common values are 128, 256, 512, 1024 and so on. </p>',
        'GenerateRandomRequest$NumberOfBytes' => '<p>Integer that contains the number of bytes to generate. Common values are 128, 256, 512, 1024 and so on. The current limit is 1024 bytes. </p>',
      ],
    ],
    'PlaintextType' => [
      'base' => NULL,
      'refs' => [
        'DecryptResponse$Plaintext' => '<p>Decrypted plaintext data. This value may not be returned if the customer master key is not available or if you didn\'t have permission to use it.</p>',
        'EncryptRequest$Plaintext' => '<p>Data to be encrypted.</p>',
        'GenerateDataKeyResponse$Plaintext' => '<p>Plaintext that contains the unwrapped key. Use this for encryption and decryption and then remove it from memory as soon as possible. </p>',
        'GenerateRandomResponse$Plaintext' => '<p>Plaintext that contains the unpredictable byte string.</p>',
      ],
    ],
    'PolicyNameList' => [
      'base' => NULL,
      'refs' => [
        'ListKeyPoliciesResponse$PolicyNames' => '<p>A list of policy names. Currently, there is only one policy and it is named "Default".</p>',
      ],
    ],
    'PolicyNameType' => [
      'base' => NULL,
      'refs' => [
        'GetKeyPolicyRequest$PolicyName' => '<p>String that contains the name of the policy. Currently, this must be "default". Policy names can be discovered by calling <a>ListKeyPolicies</a>. </p>',
        'PolicyNameList$member' => NULL,
        'PutKeyPolicyRequest$PolicyName' => '<p>Name of the policy to be attached. Currently, the only supported name is "default".</p>',
      ],
    ],
    'PolicyType' => [
      'base' => NULL,
      'refs' => [
        'CreateKeyRequest$Policy' => '<p>Policy to be attached to the key. This is required and delegates back to the account. The key is the root of trust. </p>',
        'GetKeyPolicyResponse$Policy' => '<p>A policy document in JSON format.</p>',
        'PutKeyPolicyRequest$Policy' => '<p>The policy, in JSON format, to be attached to the key.</p>',
      ],
    ],
    'PrincipalIdType' => [
      'base' => NULL,
      'refs' => [
        'CreateGrantRequest$GranteePrincipal' => '<p>Principal given permission by the grant to use the key identified by the <code>keyId</code> parameter.</p>',
        'CreateGrantRequest$RetiringPrincipal' => '<p>Principal given permission to retire the grant. For more information, see <a>RetireGrant</a>.</p>',
        'GrantListEntry$GranteePrincipal' => '<p>The principal that receives the grant permission.</p>',
        'GrantListEntry$RetiringPrincipal' => '<p>The principal that can retire the account.</p>',
        'GrantListEntry$IssuingAccount' => '<p>The account under which the grant was issued.</p>',
      ],
    ],
    'PutKeyPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ReEncryptRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ReEncryptResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RetireGrantRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RevokeGrantRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UnsupportedOperationException' => [
      'base' => '<p>The request was rejected because a specified parameter is not supported.</p>',
      'refs' => [],
    ],
    'UpdateKeyDescriptionRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
  ],
];
