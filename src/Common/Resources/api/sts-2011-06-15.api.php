<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2011-06-15',
    'endpointPrefix' => 'sts',
    'globalEndpoint' => 'sts.amazonaws.com',
    'serviceAbbreviation' => 'AWS STS',
    'serviceFullName' => 'AWS Security Token Service',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'https://sts.amazonaws.com/doc/2011-06-15/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'AssumeRole' =>
    [
      'name' => 'AssumeRole',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AssumeRoleRequest',
      ],
      'output' =>
      [
        'shape' => 'AssumeRoleResponse',
        'resultWrapper' => 'AssumeRoleResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'MalformedPolicyDocumentException',
          'error' =>
          [
            'code' => 'MalformedPolicyDocument',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PackedPolicyTooLargeException',
          'error' =>
          [
            'code' => 'PackedPolicyTooLarge',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AssumeRoleWithSAML' =>
    [
      'name' => 'AssumeRoleWithSAML',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AssumeRoleWithSAMLRequest',
      ],
      'output' =>
      [
        'shape' => 'AssumeRoleWithSAMLResponse',
        'resultWrapper' => 'AssumeRoleWithSAMLResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'MalformedPolicyDocumentException',
          'error' =>
          [
            'code' => 'MalformedPolicyDocument',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PackedPolicyTooLargeException',
          'error' =>
          [
            'code' => 'PackedPolicyTooLarge',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'IDPRejectedClaimException',
          'error' =>
          [
            'code' => 'IDPRejectedClaim',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidIdentityTokenException',
          'error' =>
          [
            'code' => 'InvalidIdentityToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'ExpiredTokenException',
          'error' =>
          [
            'code' => 'ExpiredTokenException',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AssumeRoleWithWebIdentity' =>
    [
      'name' => 'AssumeRoleWithWebIdentity',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AssumeRoleWithWebIdentityRequest',
      ],
      'output' =>
      [
        'shape' => 'AssumeRoleWithWebIdentityResponse',
        'resultWrapper' => 'AssumeRoleWithWebIdentityResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'MalformedPolicyDocumentException',
          'error' =>
          [
            'code' => 'MalformedPolicyDocument',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PackedPolicyTooLargeException',
          'error' =>
          [
            'code' => 'PackedPolicyTooLarge',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'IDPRejectedClaimException',
          'error' =>
          [
            'code' => 'IDPRejectedClaim',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'IDPCommunicationErrorException',
          'error' =>
          [
            'code' => 'IDPCommunicationError',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InvalidIdentityTokenException',
          'error' =>
          [
            'code' => 'InvalidIdentityToken',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'ExpiredTokenException',
          'error' =>
          [
            'code' => 'ExpiredTokenException',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DecodeAuthorizationMessage' =>
    [
      'name' => 'DecodeAuthorizationMessage',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DecodeAuthorizationMessageRequest',
      ],
      'output' =>
      [
        'shape' => 'DecodeAuthorizationMessageResponse',
        'resultWrapper' => 'DecodeAuthorizationMessageResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidAuthorizationMessageException',
          'error' =>
          [
            'code' => 'InvalidAuthorizationMessageException',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetFederationToken' =>
    [
      'name' => 'GetFederationToken',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetFederationTokenRequest',
      ],
      'output' =>
      [
        'shape' => 'GetFederationTokenResponse',
        'resultWrapper' => 'GetFederationTokenResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'MalformedPolicyDocumentException',
          'error' =>
          [
            'code' => 'MalformedPolicyDocument',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'PackedPolicyTooLargeException',
          'error' =>
          [
            'code' => 'PackedPolicyTooLarge',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetSessionToken' =>
    [
      'name' => 'GetSessionToken',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetSessionTokenRequest',
      ],
      'output' =>
      [
        'shape' => 'GetSessionTokenResponse',
        'resultWrapper' => 'GetSessionTokenResult',
      ],
    ],
  ],
  'shapes' =>
  [
    'AssumeRoleRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleArn',
        1 => 'RoleSessionName',
      ],
      'members' =>
      [
        'RoleArn' =>
        [
          'shape' => 'arnType',
        ],
        'RoleSessionName' =>
        [
          'shape' => 'userNameType',
        ],
        'Policy' =>
        [
          'shape' => 'sessionPolicyDocumentType',
        ],
        'DurationSeconds' =>
        [
          'shape' => 'roleDurationSecondsType',
        ],
        'ExternalId' =>
        [
          'shape' => 'externalIdType',
        ],
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
        'TokenCode' =>
        [
          'shape' => 'tokenCodeType',
        ],
      ],
    ],
    'AssumeRoleResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Credentials' =>
        [
          'shape' => 'Credentials',
        ],
        'AssumedRoleUser' =>
        [
          'shape' => 'AssumedRoleUser',
        ],
        'PackedPolicySize' =>
        [
          'shape' => 'nonNegativeIntegerType',
        ],
      ],
    ],
    'AssumeRoleWithSAMLRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleArn',
        1 => 'PrincipalArn',
        2 => 'SAMLAssertion',
      ],
      'members' =>
      [
        'RoleArn' =>
        [
          'shape' => 'arnType',
        ],
        'PrincipalArn' =>
        [
          'shape' => 'arnType',
        ],
        'SAMLAssertion' =>
        [
          'shape' => 'SAMLAssertionType',
        ],
        'Policy' =>
        [
          'shape' => 'sessionPolicyDocumentType',
        ],
        'DurationSeconds' =>
        [
          'shape' => 'durationSecondsType',
        ],
      ],
    ],
    'AssumeRoleWithSAMLResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Credentials' =>
        [
          'shape' => 'Credentials',
        ],
        'AssumedRoleUser' =>
        [
          'shape' => 'AssumedRoleUser',
        ],
        'PackedPolicySize' =>
        [
          'shape' => 'nonNegativeIntegerType',
        ],
        'Subject' =>
        [
          'shape' => 'Subject',
        ],
        'SubjectType' =>
        [
          'shape' => 'SubjectType',
        ],
        'Issuer' =>
        [
          'shape' => 'Issuer',
        ],
        'Audience' =>
        [
          'shape' => 'Audience',
        ],
        'NameQualifier' =>
        [
          'shape' => 'NameQualifier',
        ],
      ],
    ],
    'AssumeRoleWithWebIdentityRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleArn',
        1 => 'RoleSessionName',
        2 => 'WebIdentityToken',
      ],
      'members' =>
      [
        'RoleArn' =>
        [
          'shape' => 'arnType',
        ],
        'RoleSessionName' =>
        [
          'shape' => 'userNameType',
        ],
        'WebIdentityToken' =>
        [
          'shape' => 'clientTokenType',
        ],
        'ProviderId' =>
        [
          'shape' => 'urlType',
        ],
        'Policy' =>
        [
          'shape' => 'sessionPolicyDocumentType',
        ],
        'DurationSeconds' =>
        [
          'shape' => 'durationSecondsType',
        ],
      ],
    ],
    'AssumeRoleWithWebIdentityResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Credentials' =>
        [
          'shape' => 'Credentials',
        ],
        'SubjectFromWebIdentityToken' =>
        [
          'shape' => 'webIdentitySubjectType',
        ],
        'AssumedRoleUser' =>
        [
          'shape' => 'AssumedRoleUser',
        ],
        'PackedPolicySize' =>
        [
          'shape' => 'nonNegativeIntegerType',
        ],
        'Provider' =>
        [
          'shape' => 'Issuer',
        ],
        'Audience' =>
        [
          'shape' => 'Audience',
        ],
      ],
    ],
    'AssumedRoleUser' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AssumedRoleId',
        1 => 'Arn',
      ],
      'members' =>
      [
        'AssumedRoleId' =>
        [
          'shape' => 'assumedRoleIdType',
        ],
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
      ],
    ],
    'Audience' =>
    [
      'type' => 'string',
    ],
    'Credentials' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccessKeyId',
        1 => 'SecretAccessKey',
        2 => 'SessionToken',
        3 => 'Expiration',
      ],
      'members' =>
      [
        'AccessKeyId' =>
        [
          'shape' => 'accessKeyIdType',
        ],
        'SecretAccessKey' =>
        [
          'shape' => 'accessKeySecretType',
        ],
        'SessionToken' =>
        [
          'shape' => 'tokenType',
        ],
        'Expiration' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'DecodeAuthorizationMessageRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'EncodedMessage',
      ],
      'members' =>
      [
        'EncodedMessage' =>
        [
          'shape' => 'encodedMessageType',
        ],
      ],
    ],
    'DecodeAuthorizationMessageResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DecodedMessage' =>
        [
          'shape' => 'decodedMessageType',
        ],
      ],
    ],
    'ExpiredTokenException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'expiredIdentityTokenMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'ExpiredTokenException',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'FederatedUser' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'FederatedUserId',
        1 => 'Arn',
      ],
      'members' =>
      [
        'FederatedUserId' =>
        [
          'shape' => 'federatedIdType',
        ],
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
      ],
    ],
    'GetFederationTokenRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'userNameType',
        ],
        'Policy' =>
        [
          'shape' => 'sessionPolicyDocumentType',
        ],
        'DurationSeconds' =>
        [
          'shape' => 'durationSecondsType',
        ],
      ],
    ],
    'GetFederationTokenResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Credentials' =>
        [
          'shape' => 'Credentials',
        ],
        'FederatedUser' =>
        [
          'shape' => 'FederatedUser',
        ],
        'PackedPolicySize' =>
        [
          'shape' => 'nonNegativeIntegerType',
        ],
      ],
    ],
    'GetSessionTokenRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DurationSeconds' =>
        [
          'shape' => 'durationSecondsType',
        ],
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
        'TokenCode' =>
        [
          'shape' => 'tokenCodeType',
        ],
      ],
    ],
    'GetSessionTokenResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Credentials' =>
        [
          'shape' => 'Credentials',
        ],
      ],
    ],
    'IDPCommunicationErrorException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'idpCommunicationErrorMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'IDPCommunicationError',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'IDPRejectedClaimException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'idpRejectedClaimMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'IDPRejectedClaim',
        'httpStatusCode' => 403,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidAuthorizationMessageException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'invalidAuthorizationMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidAuthorizationMessageException',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidIdentityTokenException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'invalidIdentityTokenMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidIdentityToken',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Issuer' =>
    [
      'type' => 'string',
    ],
    'MalformedPolicyDocumentException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'malformedPolicyDocumentMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'MalformedPolicyDocument',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'NameQualifier' =>
    [
      'type' => 'string',
    ],
    'PackedPolicyTooLargeException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'packedPolicyTooLargeMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'PackedPolicyTooLarge',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SAMLAssertionType' =>
    [
      'type' => 'string',
      'min' => 4,
      'max' => 50000,
    ],
    'Subject' =>
    [
      'type' => 'string',
    ],
    'SubjectType' =>
    [
      'type' => 'string',
    ],
    'accessKeyIdType' =>
    [
      'type' => 'string',
      'min' => 16,
      'max' => 32,
      'pattern' => '[\\w]*',
    ],
    'accessKeySecretType' =>
    [
      'type' => 'string',
    ],
    'arnType' =>
    [
      'type' => 'string',
      'min' => 20,
      'max' => 2048,
    ],
    'assumedRoleIdType' =>
    [
      'type' => 'string',
      'min' => 2,
      'max' => 96,
      'pattern' => '[\\w+=,.@:-]*',
    ],
    'clientTokenType' =>
    [
      'type' => 'string',
      'min' => 4,
      'max' => 2048,
    ],
    'dateType' =>
    [
      'type' => 'timestamp',
    ],
    'decodedMessageType' =>
    [
      'type' => 'string',
    ],
    'durationSecondsType' =>
    [
      'type' => 'integer',
      'min' => 900,
      'max' => 129600,
    ],
    'encodedMessageType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 10240,
    ],
    'expiredIdentityTokenMessage' =>
    [
      'type' => 'string',
    ],
    'externalIdType' =>
    [
      'type' => 'string',
      'min' => 2,
      'max' => 96,
      'pattern' => '[\\w+=,.@:-]*',
    ],
    'federatedIdType' =>
    [
      'type' => 'string',
      'min' => 2,
      'max' => 96,
      'pattern' => '[\\w+=,.@\\:-]*',
    ],
    'idpCommunicationErrorMessage' =>
    [
      'type' => 'string',
    ],
    'idpRejectedClaimMessage' =>
    [
      'type' => 'string',
    ],
    'invalidAuthorizationMessage' =>
    [
      'type' => 'string',
    ],
    'invalidIdentityTokenMessage' =>
    [
      'type' => 'string',
    ],
    'malformedPolicyDocumentMessage' =>
    [
      'type' => 'string',
    ],
    'nonNegativeIntegerType' =>
    [
      'type' => 'integer',
      'min' => 0,
    ],
    'packedPolicyTooLargeMessage' =>
    [
      'type' => 'string',
    ],
    'roleDurationSecondsType' =>
    [
      'type' => 'integer',
      'min' => 900,
      'max' => 3600,
    ],
    'serialNumberType' =>
    [
      'type' => 'string',
      'min' => 9,
      'max' => 256,
      'pattern' => '[\\w+=/:,.@-]*',
    ],
    'sessionPolicyDocumentType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 2048,
      'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u00FF]+',
    ],
    'tokenCodeType' =>
    [
      'type' => 'string',
      'min' => 6,
      'max' => 6,
      'pattern' => '[\\d]*',
    ],
    'tokenType' =>
    [
      'type' => 'string',
    ],
    'urlType' =>
    [
      'type' => 'string',
      'min' => 4,
      'max' => 2048,
    ],
    'userNameType' =>
    [
      'type' => 'string',
      'min' => 2,
      'max' => 32,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'webIdentitySubjectType' =>
    [
      'type' => 'string',
      'min' => 6,
      'max' => 255,
    ],
  ],
];