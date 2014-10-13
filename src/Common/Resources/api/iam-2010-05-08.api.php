<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2010-05-08',
    'endpointPrefix' => 'iam',
    'globalEndpoint' => 'iam.amazonaws.com',
    'serviceAbbreviation' => 'IAM',
    'serviceFullName' => 'AWS Identity and Access Management',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'https://iam.amazonaws.com/doc/2010-05-08/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'AddRoleToInstanceProfile' =>
    [
      'name' => 'AddRoleToInstanceProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddRoleToInstanceProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'AddUserToGroup' =>
    [
      'name' => 'AddUserToGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddUserToGroupRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ChangePassword' =>
    [
      'name' => 'ChangePassword',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ChangePasswordRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidUserTypeException',
          'error' =>
          [
            'code' => 'InvalidUserType',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'EntityTemporarilyUnmodifiableException',
          'error' =>
          [
            'code' => 'EntityTemporarilyUnmodifiable',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'PasswordPolicyViolationException',
          'error' =>
          [
            'code' => 'PasswordPolicyViolation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateAccessKey' =>
    [
      'name' => 'CreateAccessKey',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateAccessKeyRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateAccessKeyResponse',
        'resultWrapper' => 'CreateAccessKeyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateAccountAlias' =>
    [
      'name' => 'CreateAccountAlias',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateAccountAliasRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateGroup' =>
    [
      'name' => 'CreateGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateGroupRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateGroupResponse',
        'resultWrapper' => 'CreateGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateInstanceProfile' =>
    [
      'name' => 'CreateInstanceProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateInstanceProfileRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateInstanceProfileResponse',
        'resultWrapper' => 'CreateInstanceProfileResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateLoginProfile' =>
    [
      'name' => 'CreateLoginProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateLoginProfileRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateLoginProfileResponse',
        'resultWrapper' => 'CreateLoginProfileResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'PasswordPolicyViolationException',
          'error' =>
          [
            'code' => 'PasswordPolicyViolation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateRole' =>
    [
      'name' => 'CreateRole',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateRoleRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateRoleResponse',
        'resultWrapper' => 'CreateRoleResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
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
      ],
    ],
    'CreateSAMLProvider' =>
    [
      'name' => 'CreateSAMLProvider',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateSAMLProviderRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateSAMLProviderResponse',
        'resultWrapper' => 'CreateSAMLProviderResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInputException',
          'error' =>
          [
            'code' => 'InvalidInput',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateUser' =>
    [
      'name' => 'CreateUser',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateUserRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateUserResponse',
        'resultWrapper' => 'CreateUserResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateVirtualMFADevice' =>
    [
      'name' => 'CreateVirtualMFADevice',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateVirtualMFADeviceRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateVirtualMFADeviceResponse',
        'resultWrapper' => 'CreateVirtualMFADeviceResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeactivateMFADevice' =>
    [
      'name' => 'DeactivateMFADevice',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeactivateMFADeviceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EntityTemporarilyUnmodifiableException',
          'error' =>
          [
            'code' => 'EntityTemporarilyUnmodifiable',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteAccessKey' =>
    [
      'name' => 'DeleteAccessKey',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteAccessKeyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteAccountAlias' =>
    [
      'name' => 'DeleteAccountAlias',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteAccountAliasRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteAccountPasswordPolicy' =>
    [
      'name' => 'DeleteAccountPasswordPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteGroup' =>
    [
      'name' => 'DeleteGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteGroupRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DeleteConflictException',
          'error' =>
          [
            'code' => 'DeleteConflict',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteGroupPolicy' =>
    [
      'name' => 'DeleteGroupPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteGroupPolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteInstanceProfile' =>
    [
      'name' => 'DeleteInstanceProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteInstanceProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DeleteConflictException',
          'error' =>
          [
            'code' => 'DeleteConflict',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteLoginProfile' =>
    [
      'name' => 'DeleteLoginProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteLoginProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EntityTemporarilyUnmodifiableException',
          'error' =>
          [
            'code' => 'EntityTemporarilyUnmodifiable',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteRole' =>
    [
      'name' => 'DeleteRole',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteRoleRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DeleteConflictException',
          'error' =>
          [
            'code' => 'DeleteConflict',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteRolePolicy' =>
    [
      'name' => 'DeleteRolePolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteRolePolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteSAMLProvider' =>
    [
      'name' => 'DeleteSAMLProvider',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteSAMLProviderRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInputException',
          'error' =>
          [
            'code' => 'InvalidInput',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteServerCertificate' =>
    [
      'name' => 'DeleteServerCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteServerCertificateRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DeleteConflictException',
          'error' =>
          [
            'code' => 'DeleteConflict',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteSigningCertificate' =>
    [
      'name' => 'DeleteSigningCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteSigningCertificateRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteUser' =>
    [
      'name' => 'DeleteUser',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteUserRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DeleteConflictException',
          'error' =>
          [
            'code' => 'DeleteConflict',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteUserPolicy' =>
    [
      'name' => 'DeleteUserPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteUserPolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteVirtualMFADevice' =>
    [
      'name' => 'DeleteVirtualMFADevice',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteVirtualMFADeviceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DeleteConflictException',
          'error' =>
          [
            'code' => 'DeleteConflict',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'EnableMFADevice' =>
    [
      'name' => 'EnableMFADevice',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'EnableMFADeviceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityTemporarilyUnmodifiableException',
          'error' =>
          [
            'code' => 'EntityTemporarilyUnmodifiable',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidAuthenticationCodeException',
          'error' =>
          [
            'code' => 'InvalidAuthenticationCode',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GenerateCredentialReport' =>
    [
      'name' => 'GenerateCredentialReport',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'GenerateCredentialReportResponse',
        'resultWrapper' => 'GenerateCredentialReportResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetAccountPasswordPolicy' =>
    [
      'name' => 'GetAccountPasswordPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'GetAccountPasswordPolicyResponse',
        'resultWrapper' => 'GetAccountPasswordPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetAccountSummary' =>
    [
      'name' => 'GetAccountSummary',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'GetAccountSummaryResponse',
        'resultWrapper' => 'GetAccountSummaryResult',
      ],
    ],
    'GetCredentialReport' =>
    [
      'name' => 'GetCredentialReport',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'output' =>
      [
        'shape' => 'GetCredentialReportResponse',
        'resultWrapper' => 'GetCredentialReportResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'CredentialReportNotPresentException',
          'error' =>
          [
            'code' => 'ReportNotPresent',
            'httpStatusCode' => 410,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'CredentialReportExpiredException',
          'error' =>
          [
            'code' => 'ReportExpired',
            'httpStatusCode' => 410,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'CredentialReportNotReadyException',
          'error' =>
          [
            'code' => 'ReportInProgress',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetGroup' =>
    [
      'name' => 'GetGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetGroupRequest',
      ],
      'output' =>
      [
        'shape' => 'GetGroupResponse',
        'resultWrapper' => 'GetGroupResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetGroupPolicy' =>
    [
      'name' => 'GetGroupPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetGroupPolicyRequest',
      ],
      'output' =>
      [
        'shape' => 'GetGroupPolicyResponse',
        'resultWrapper' => 'GetGroupPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetInstanceProfile' =>
    [
      'name' => 'GetInstanceProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetInstanceProfileRequest',
      ],
      'output' =>
      [
        'shape' => 'GetInstanceProfileResponse',
        'resultWrapper' => 'GetInstanceProfileResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetLoginProfile' =>
    [
      'name' => 'GetLoginProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetLoginProfileRequest',
      ],
      'output' =>
      [
        'shape' => 'GetLoginProfileResponse',
        'resultWrapper' => 'GetLoginProfileResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetRole' =>
    [
      'name' => 'GetRole',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetRoleRequest',
      ],
      'output' =>
      [
        'shape' => 'GetRoleResponse',
        'resultWrapper' => 'GetRoleResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetRolePolicy' =>
    [
      'name' => 'GetRolePolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetRolePolicyRequest',
      ],
      'output' =>
      [
        'shape' => 'GetRolePolicyResponse',
        'resultWrapper' => 'GetRolePolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetSAMLProvider' =>
    [
      'name' => 'GetSAMLProvider',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetSAMLProviderRequest',
      ],
      'output' =>
      [
        'shape' => 'GetSAMLProviderResponse',
        'resultWrapper' => 'GetSAMLProviderResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidInputException',
          'error' =>
          [
            'code' => 'InvalidInput',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetServerCertificate' =>
    [
      'name' => 'GetServerCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetServerCertificateRequest',
      ],
      'output' =>
      [
        'shape' => 'GetServerCertificateResponse',
        'resultWrapper' => 'GetServerCertificateResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetUser' =>
    [
      'name' => 'GetUser',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetUserRequest',
      ],
      'output' =>
      [
        'shape' => 'GetUserResponse',
        'resultWrapper' => 'GetUserResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetUserPolicy' =>
    [
      'name' => 'GetUserPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetUserPolicyRequest',
      ],
      'output' =>
      [
        'shape' => 'GetUserPolicyResponse',
        'resultWrapper' => 'GetUserPolicyResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListAccessKeys' =>
    [
      'name' => 'ListAccessKeys',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListAccessKeysRequest',
      ],
      'output' =>
      [
        'shape' => 'ListAccessKeysResponse',
        'resultWrapper' => 'ListAccessKeysResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListAccountAliases' =>
    [
      'name' => 'ListAccountAliases',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListAccountAliasesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListAccountAliasesResponse',
        'resultWrapper' => 'ListAccountAliasesResult',
      ],
    ],
    'ListGroupPolicies' =>
    [
      'name' => 'ListGroupPolicies',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListGroupPoliciesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListGroupPoliciesResponse',
        'resultWrapper' => 'ListGroupPoliciesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListGroups' =>
    [
      'name' => 'ListGroups',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListGroupsRequest',
      ],
      'output' =>
      [
        'shape' => 'ListGroupsResponse',
        'resultWrapper' => 'ListGroupsResult',
      ],
    ],
    'ListGroupsForUser' =>
    [
      'name' => 'ListGroupsForUser',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListGroupsForUserRequest',
      ],
      'output' =>
      [
        'shape' => 'ListGroupsForUserResponse',
        'resultWrapper' => 'ListGroupsForUserResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListInstanceProfiles' =>
    [
      'name' => 'ListInstanceProfiles',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListInstanceProfilesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListInstanceProfilesResponse',
        'resultWrapper' => 'ListInstanceProfilesResult',
      ],
    ],
    'ListInstanceProfilesForRole' =>
    [
      'name' => 'ListInstanceProfilesForRole',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListInstanceProfilesForRoleRequest',
      ],
      'output' =>
      [
        'shape' => 'ListInstanceProfilesForRoleResponse',
        'resultWrapper' => 'ListInstanceProfilesForRoleResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListMFADevices' =>
    [
      'name' => 'ListMFADevices',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListMFADevicesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListMFADevicesResponse',
        'resultWrapper' => 'ListMFADevicesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListRolePolicies' =>
    [
      'name' => 'ListRolePolicies',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListRolePoliciesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListRolePoliciesResponse',
        'resultWrapper' => 'ListRolePoliciesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListRoles' =>
    [
      'name' => 'ListRoles',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListRolesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListRolesResponse',
        'resultWrapper' => 'ListRolesResult',
      ],
    ],
    'ListSAMLProviders' =>
    [
      'name' => 'ListSAMLProviders',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListSAMLProvidersRequest',
      ],
      'output' =>
      [
        'shape' => 'ListSAMLProvidersResponse',
        'resultWrapper' => 'ListSAMLProvidersResult',
      ],
    ],
    'ListServerCertificates' =>
    [
      'name' => 'ListServerCertificates',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListServerCertificatesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListServerCertificatesResponse',
        'resultWrapper' => 'ListServerCertificatesResult',
      ],
    ],
    'ListSigningCertificates' =>
    [
      'name' => 'ListSigningCertificates',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListSigningCertificatesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListSigningCertificatesResponse',
        'resultWrapper' => 'ListSigningCertificatesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListUserPolicies' =>
    [
      'name' => 'ListUserPolicies',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListUserPoliciesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListUserPoliciesResponse',
        'resultWrapper' => 'ListUserPoliciesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListUsers' =>
    [
      'name' => 'ListUsers',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListUsersRequest',
      ],
      'output' =>
      [
        'shape' => 'ListUsersResponse',
        'resultWrapper' => 'ListUsersResult',
      ],
    ],
    'ListVirtualMFADevices' =>
    [
      'name' => 'ListVirtualMFADevices',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListVirtualMFADevicesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListVirtualMFADevicesResponse',
        'resultWrapper' => 'ListVirtualMFADevicesResult',
      ],
    ],
    'PutGroupPolicy' =>
    [
      'name' => 'PutGroupPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutGroupPolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
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
        2 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PutRolePolicy' =>
    [
      'name' => 'PutRolePolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutRolePolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
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
        2 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'PutUserPolicy' =>
    [
      'name' => 'PutUserPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutUserPolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
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
        2 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RemoveRoleFromInstanceProfile' =>
    [
      'name' => 'RemoveRoleFromInstanceProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RemoveRoleFromInstanceProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RemoveUserFromGroup' =>
    [
      'name' => 'RemoveUserFromGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RemoveUserFromGroupRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ResyncMFADevice' =>
    [
      'name' => 'ResyncMFADevice',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ResyncMFADeviceRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidAuthenticationCodeException',
          'error' =>
          [
            'code' => 'InvalidAuthenticationCode',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateAccessKey' =>
    [
      'name' => 'UpdateAccessKey',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateAccessKeyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateAccountPasswordPolicy' =>
    [
      'name' => 'UpdateAccountPasswordPolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateAccountPasswordPolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
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
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateAssumeRolePolicy' =>
    [
      'name' => 'UpdateAssumeRolePolicy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateAssumeRolePolicyRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
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
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateGroup' =>
    [
      'name' => 'UpdateGroup',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateGroupRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateLoginProfile' =>
    [
      'name' => 'UpdateLoginProfile',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateLoginProfileRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'EntityTemporarilyUnmodifiableException',
          'error' =>
          [
            'code' => 'EntityTemporarilyUnmodifiable',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'PasswordPolicyViolationException',
          'error' =>
          [
            'code' => 'PasswordPolicyViolation',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateSAMLProvider' =>
    [
      'name' => 'UpdateSAMLProvider',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateSAMLProviderRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateSAMLProviderResponse',
        'resultWrapper' => 'UpdateSAMLProviderResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidInputException',
          'error' =>
          [
            'code' => 'InvalidInput',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateServerCertificate' =>
    [
      'name' => 'UpdateServerCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateServerCertificateRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateSigningCertificate' =>
    [
      'name' => 'UpdateSigningCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateSigningCertificateRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateUser' =>
    [
      'name' => 'UpdateUser',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateUserRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'EntityTemporarilyUnmodifiableException',
          'error' =>
          [
            'code' => 'EntityTemporarilyUnmodifiable',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UploadServerCertificate' =>
    [
      'name' => 'UploadServerCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UploadServerCertificateRequest',
      ],
      'output' =>
      [
        'shape' => 'UploadServerCertificateResponse',
        'resultWrapper' => 'UploadServerCertificateResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MalformedCertificateException',
          'error' =>
          [
            'code' => 'MalformedCertificate',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'KeyPairMismatchException',
          'error' =>
          [
            'code' => 'KeyPairMismatch',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UploadSigningCertificate' =>
    [
      'name' => 'UploadSigningCertificate',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UploadSigningCertificateRequest',
      ],
      'output' =>
      [
        'shape' => 'UploadSigningCertificateResponse',
        'resultWrapper' => 'UploadSigningCertificateResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'error' =>
          [
            'code' => 'LimitExceeded',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'EntityAlreadyExistsException',
          'error' =>
          [
            'code' => 'EntityAlreadyExists',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'MalformedCertificateException',
          'error' =>
          [
            'code' => 'MalformedCertificate',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidCertificateException',
          'error' =>
          [
            'code' => 'InvalidCertificate',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'DuplicateCertificateException',
          'error' =>
          [
            'code' => 'DuplicateCertificate',
            'httpStatusCode' => 409,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'NoSuchEntityException',
          'error' =>
          [
            'code' => 'NoSuchEntity',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AccessKey' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'AccessKeyId',
        2 => 'Status',
        3 => 'SecretAccessKey',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'AccessKeyId' =>
        [
          'shape' => 'accessKeyIdType',
        ],
        'Status' =>
        [
          'shape' => 'statusType',
        ],
        'SecretAccessKey' =>
        [
          'shape' => 'accessKeySecretType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'AccessKeyMetadata' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'AccessKeyId' =>
        [
          'shape' => 'accessKeyIdType',
        ],
        'Status' =>
        [
          'shape' => 'statusType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'AddRoleToInstanceProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfileName',
        1 => 'RoleName',
      ],
      'members' =>
      [
        'InstanceProfileName' =>
        [
          'shape' => 'instanceProfileNameType',
        ],
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
      ],
    ],
    'AddUserToGroupRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
        1 => 'UserName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
      ],
    ],
    'BootstrapDatum' =>
    [
      'type' => 'blob',
      'sensitive' => true,
    ],
    'ChangePasswordRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OldPassword',
        1 => 'NewPassword',
      ],
      'members' =>
      [
        'OldPassword' =>
        [
          'shape' => 'passwordType',
        ],
        'NewPassword' =>
        [
          'shape' => 'passwordType',
        ],
      ],
    ],
    'CreateAccessKeyRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
      ],
    ],
    'CreateAccessKeyResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccessKey',
      ],
      'members' =>
      [
        'AccessKey' =>
        [
          'shape' => 'AccessKey',
        ],
      ],
    ],
    'CreateAccountAliasRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccountAlias',
      ],
      'members' =>
      [
        'AccountAlias' =>
        [
          'shape' => 'accountAliasType',
        ],
      ],
    ],
    'CreateGroupRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
      ],
    ],
    'CreateGroupResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Group',
      ],
      'members' =>
      [
        'Group' =>
        [
          'shape' => 'Group',
        ],
      ],
    ],
    'CreateInstanceProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfileName',
      ],
      'members' =>
      [
        'InstanceProfileName' =>
        [
          'shape' => 'instanceProfileNameType',
        ],
        'Path' =>
        [
          'shape' => 'pathType',
        ],
      ],
    ],
    'CreateInstanceProfileResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfile',
      ],
      'members' =>
      [
        'InstanceProfile' =>
        [
          'shape' => 'InstanceProfile',
        ],
      ],
    ],
    'CreateLoginProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'Password',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'Password' =>
        [
          'shape' => 'passwordType',
        ],
        'PasswordResetRequired' =>
        [
          'shape' => 'booleanType',
        ],
      ],
    ],
    'CreateLoginProfileResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoginProfile',
      ],
      'members' =>
      [
        'LoginProfile' =>
        [
          'shape' => 'LoginProfile',
        ],
      ],
    ],
    'CreateRoleRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
        1 => 'AssumeRolePolicyDocument',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'AssumeRolePolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'CreateRoleResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Role',
      ],
      'members' =>
      [
        'Role' =>
        [
          'shape' => 'Role',
        ],
      ],
    ],
    'CreateSAMLProviderRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SAMLMetadataDocument',
        1 => 'Name',
      ],
      'members' =>
      [
        'SAMLMetadataDocument' =>
        [
          'shape' => 'SAMLMetadataDocumentType',
        ],
        'Name' =>
        [
          'shape' => 'SAMLProviderNameType',
        ],
      ],
    ],
    'CreateSAMLProviderResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SAMLProviderArn' =>
        [
          'shape' => 'arnType',
        ],
      ],
    ],
    'CreateUserRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
      ],
    ],
    'CreateUserResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'User' =>
        [
          'shape' => 'User',
        ],
      ],
    ],
    'CreateVirtualMFADeviceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'VirtualMFADeviceName',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'VirtualMFADeviceName' =>
        [
          'shape' => 'virtualMFADeviceName',
        ],
      ],
    ],
    'CreateVirtualMFADeviceResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'VirtualMFADevice',
      ],
      'members' =>
      [
        'VirtualMFADevice' =>
        [
          'shape' => 'VirtualMFADevice',
        ],
      ],
    ],
    'CredentialReportExpiredException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'credentialReportExpiredExceptionMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'ReportExpired',
        'httpStatusCode' => 410,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'CredentialReportNotPresentException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'credentialReportNotPresentExceptionMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'ReportNotPresent',
        'httpStatusCode' => 410,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'CredentialReportNotReadyException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'credentialReportNotReadyExceptionMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'ReportInProgress',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DeactivateMFADeviceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'SerialNumber',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
      ],
    ],
    'DeleteAccessKeyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccessKeyId',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'AccessKeyId' =>
        [
          'shape' => 'accessKeyIdType',
        ],
      ],
    ],
    'DeleteAccountAliasRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccountAlias',
      ],
      'members' =>
      [
        'AccountAlias' =>
        [
          'shape' => 'accountAliasType',
        ],
      ],
    ],
    'DeleteConflictException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'deleteConflictMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'DeleteConflict',
        'httpStatusCode' => 409,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'DeleteGroupPolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
      ],
    ],
    'DeleteGroupRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
      ],
    ],
    'DeleteInstanceProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfileName',
      ],
      'members' =>
      [
        'InstanceProfileName' =>
        [
          'shape' => 'instanceProfileNameType',
        ],
      ],
    ],
    'DeleteLoginProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
      ],
    ],
    'DeleteRolePolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
      ],
    ],
    'DeleteRoleRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
      ],
    ],
    'DeleteSAMLProviderRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SAMLProviderArn',
      ],
      'members' =>
      [
        'SAMLProviderArn' =>
        [
          'shape' => 'arnType',
        ],
      ],
    ],
    'DeleteServerCertificateRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ServerCertificateName',
      ],
      'members' =>
      [
        'ServerCertificateName' =>
        [
          'shape' => 'serverCertificateNameType',
        ],
      ],
    ],
    'DeleteSigningCertificateRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CertificateId',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'CertificateId' =>
        [
          'shape' => 'certificateIdType',
        ],
      ],
    ],
    'DeleteUserPolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
      ],
    ],
    'DeleteUserRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
      ],
    ],
    'DeleteVirtualMFADeviceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SerialNumber',
      ],
      'members' =>
      [
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
      ],
    ],
    'DuplicateCertificateException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'duplicateCertificateMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'DuplicateCertificate',
        'httpStatusCode' => 409,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'EnableMFADeviceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'SerialNumber',
        2 => 'AuthenticationCode1',
        3 => 'AuthenticationCode2',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
        'AuthenticationCode1' =>
        [
          'shape' => 'authenticationCodeType',
        ],
        'AuthenticationCode2' =>
        [
          'shape' => 'authenticationCodeType',
        ],
      ],
    ],
    'EntityAlreadyExistsException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'entityAlreadyExistsMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'EntityAlreadyExists',
        'httpStatusCode' => 409,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'EntityTemporarilyUnmodifiableException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'entityTemporarilyUnmodifiableMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'EntityTemporarilyUnmodifiable',
        'httpStatusCode' => 409,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'GenerateCredentialReportResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'State' =>
        [
          'shape' => 'ReportStateType',
        ],
        'Description' =>
        [
          'shape' => 'ReportStateDescriptionType',
        ],
      ],
    ],
    'GetAccountPasswordPolicyResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PasswordPolicy',
      ],
      'members' =>
      [
        'PasswordPolicy' =>
        [
          'shape' => 'PasswordPolicy',
        ],
      ],
    ],
    'GetAccountSummaryResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SummaryMap' =>
        [
          'shape' => 'summaryMapType',
        ],
      ],
    ],
    'GetCredentialReportResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Content' =>
        [
          'shape' => 'ReportContentType',
        ],
        'ReportFormat' =>
        [
          'shape' => 'ReportFormatType',
        ],
        'GeneratedTime' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'GetGroupPolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
      ],
    ],
    'GetGroupPolicyResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
        1 => 'PolicyName',
        2 => 'PolicyDocument',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
        'PolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'GetGroupRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'GetGroupResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Group',
        1 => 'Users',
      ],
      'members' =>
      [
        'Group' =>
        [
          'shape' => 'Group',
        ],
        'Users' =>
        [
          'shape' => 'userListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'GetInstanceProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfileName',
      ],
      'members' =>
      [
        'InstanceProfileName' =>
        [
          'shape' => 'instanceProfileNameType',
        ],
      ],
    ],
    'GetInstanceProfileResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfile',
      ],
      'members' =>
      [
        'InstanceProfile' =>
        [
          'shape' => 'InstanceProfile',
        ],
      ],
    ],
    'GetLoginProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
      ],
    ],
    'GetLoginProfileResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'LoginProfile',
      ],
      'members' =>
      [
        'LoginProfile' =>
        [
          'shape' => 'LoginProfile',
        ],
      ],
    ],
    'GetRolePolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
      ],
    ],
    'GetRolePolicyResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
        1 => 'PolicyName',
        2 => 'PolicyDocument',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
        'PolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'GetRoleRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
      ],
    ],
    'GetRoleResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Role',
      ],
      'members' =>
      [
        'Role' =>
        [
          'shape' => 'Role',
        ],
      ],
    ],
    'GetSAMLProviderRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SAMLProviderArn',
      ],
      'members' =>
      [
        'SAMLProviderArn' =>
        [
          'shape' => 'arnType',
        ],
      ],
    ],
    'GetSAMLProviderResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SAMLMetadataDocument' =>
        [
          'shape' => 'SAMLMetadataDocumentType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
        'ValidUntil' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'GetServerCertificateRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ServerCertificateName',
      ],
      'members' =>
      [
        'ServerCertificateName' =>
        [
          'shape' => 'serverCertificateNameType',
        ],
      ],
    ],
    'GetServerCertificateResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ServerCertificate',
      ],
      'members' =>
      [
        'ServerCertificate' =>
        [
          'shape' => 'ServerCertificate',
        ],
      ],
    ],
    'GetUserPolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'PolicyName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
      ],
    ],
    'GetUserPolicyResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'PolicyName',
        2 => 'PolicyDocument',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
        'PolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'GetUserRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
      ],
    ],
    'GetUserResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'User',
      ],
      'members' =>
      [
        'User' =>
        [
          'shape' => 'User',
        ],
      ],
    ],
    'Group' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Path',
        1 => 'GroupName',
        2 => 'GroupId',
        3 => 'Arn',
        4 => 'CreateDate',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'GroupId' =>
        [
          'shape' => 'idType',
        ],
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'InstanceProfile' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Path',
        1 => 'InstanceProfileName',
        2 => 'InstanceProfileId',
        3 => 'Arn',
        4 => 'CreateDate',
        5 => 'Roles',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'InstanceProfileName' =>
        [
          'shape' => 'instanceProfileNameType',
        ],
        'InstanceProfileId' =>
        [
          'shape' => 'idType',
        ],
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
        'Roles' =>
        [
          'shape' => 'roleListType',
        ],
      ],
    ],
    'InvalidAuthenticationCodeException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'invalidAuthenticationCodeMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidAuthenticationCode',
        'httpStatusCode' => 403,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidCertificateException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'invalidCertificateMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidCertificate',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidInputException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'invalidInputMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidInput',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidUserTypeException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'invalidUserTypeMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidUserType',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'KeyPairMismatchException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'keyPairMismatchMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'KeyPairMismatch',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'LimitExceededException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'limitExceededMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'LimitExceeded',
        'httpStatusCode' => 409,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ListAccessKeysRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListAccessKeysResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccessKeyMetadata',
      ],
      'members' =>
      [
        'AccessKeyMetadata' =>
        [
          'shape' => 'accessKeyMetadataListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListAccountAliasesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListAccountAliasesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccountAliases',
      ],
      'members' =>
      [
        'AccountAliases' =>
        [
          'shape' => 'accountAliasListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListGroupPoliciesRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListGroupPoliciesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PolicyNames',
      ],
      'members' =>
      [
        'PolicyNames' =>
        [
          'shape' => 'policyNameListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListGroupsForUserRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListGroupsForUserResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Groups',
      ],
      'members' =>
      [
        'Groups' =>
        [
          'shape' => 'groupListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListGroupsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PathPrefix' =>
        [
          'shape' => 'pathPrefixType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListGroupsResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Groups',
      ],
      'members' =>
      [
        'Groups' =>
        [
          'shape' => 'groupListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListInstanceProfilesForRoleRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListInstanceProfilesForRoleResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfiles',
      ],
      'members' =>
      [
        'InstanceProfiles' =>
        [
          'shape' => 'instanceProfileListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListInstanceProfilesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PathPrefix' =>
        [
          'shape' => 'pathPrefixType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListInstanceProfilesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfiles',
      ],
      'members' =>
      [
        'InstanceProfiles' =>
        [
          'shape' => 'instanceProfileListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListMFADevicesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListMFADevicesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'MFADevices',
      ],
      'members' =>
      [
        'MFADevices' =>
        [
          'shape' => 'mfaDeviceListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListRolePoliciesRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListRolePoliciesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PolicyNames',
      ],
      'members' =>
      [
        'PolicyNames' =>
        [
          'shape' => 'policyNameListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListRolesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PathPrefix' =>
        [
          'shape' => 'pathPrefixType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListRolesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Roles',
      ],
      'members' =>
      [
        'Roles' =>
        [
          'shape' => 'roleListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListSAMLProvidersRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'ListSAMLProvidersResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SAMLProviderList' =>
        [
          'shape' => 'SAMLProviderListType',
        ],
      ],
    ],
    'ListServerCertificatesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PathPrefix' =>
        [
          'shape' => 'pathPrefixType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListServerCertificatesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ServerCertificateMetadataList',
      ],
      'members' =>
      [
        'ServerCertificateMetadataList' =>
        [
          'shape' => 'serverCertificateMetadataListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListSigningCertificatesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListSigningCertificatesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Certificates',
      ],
      'members' =>
      [
        'Certificates' =>
        [
          'shape' => 'certificateListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListUserPoliciesRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListUserPoliciesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PolicyNames',
      ],
      'members' =>
      [
        'PolicyNames' =>
        [
          'shape' => 'policyNameListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListUsersRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PathPrefix' =>
        [
          'shape' => 'pathPrefixType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListUsersResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Users',
      ],
      'members' =>
      [
        'Users' =>
        [
          'shape' => 'userListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'ListVirtualMFADevicesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AssignmentStatus' =>
        [
          'shape' => 'assignmentStatusType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
        'MaxItems' =>
        [
          'shape' => 'maxItemsType',
        ],
      ],
    ],
    'ListVirtualMFADevicesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'VirtualMFADevices',
      ],
      'members' =>
      [
        'VirtualMFADevices' =>
        [
          'shape' => 'virtualMFADeviceListType',
        ],
        'IsTruncated' =>
        [
          'shape' => 'booleanType',
        ],
        'Marker' =>
        [
          'shape' => 'markerType',
        ],
      ],
    ],
    'LoginProfile' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'CreateDate',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
        'PasswordResetRequired' =>
        [
          'shape' => 'booleanType',
        ],
      ],
    ],
    'MFADevice' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'SerialNumber',
        2 => 'EnableDate',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
        'EnableDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'MalformedCertificateException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'malformedCertificateMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'MalformedCertificate',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
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
    'NoSuchEntityException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'noSuchEntityMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'NoSuchEntity',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'PasswordPolicy' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MinimumPasswordLength' =>
        [
          'shape' => 'minimumPasswordLengthType',
        ],
        'RequireSymbols' =>
        [
          'shape' => 'booleanType',
        ],
        'RequireNumbers' =>
        [
          'shape' => 'booleanType',
        ],
        'RequireUppercaseCharacters' =>
        [
          'shape' => 'booleanType',
        ],
        'RequireLowercaseCharacters' =>
        [
          'shape' => 'booleanType',
        ],
        'AllowUsersToChangePassword' =>
        [
          'shape' => 'booleanType',
        ],
        'ExpirePasswords' =>
        [
          'shape' => 'booleanType',
        ],
        'MaxPasswordAge' =>
        [
          'shape' => 'maxPasswordAgeType',
        ],
        'PasswordReusePrevention' =>
        [
          'shape' => 'passwordReusePreventionType',
        ],
        'HardExpiry' =>
        [
          'shape' => 'booleanObjectType',
        ],
      ],
    ],
    'PasswordPolicyViolationException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'passwordPolicyViolationMessage',
        ],
      ],
      'error' =>
      [
        'code' => 'PasswordPolicyViolation',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'PutGroupPolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
        1 => 'PolicyName',
        2 => 'PolicyDocument',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
        'PolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'PutRolePolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
        1 => 'PolicyName',
        2 => 'PolicyDocument',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
        'PolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'PutUserPolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'PolicyName',
        2 => 'PolicyDocument',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'PolicyName' =>
        [
          'shape' => 'policyNameType',
        ],
        'PolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'RemoveRoleFromInstanceProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'InstanceProfileName',
        1 => 'RoleName',
      ],
      'members' =>
      [
        'InstanceProfileName' =>
        [
          'shape' => 'instanceProfileNameType',
        ],
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
      ],
    ],
    'RemoveUserFromGroupRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
        1 => 'UserName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
      ],
    ],
    'ReportContentType' =>
    [
      'type' => 'blob',
    ],
    'ReportFormatType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'text/csv',
      ],
    ],
    'ReportStateDescriptionType' =>
    [
      'type' => 'string',
    ],
    'ReportStateType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'STARTED',
        1 => 'INPROGRESS',
        2 => 'COMPLETE',
      ],
    ],
    'ResyncMFADeviceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'SerialNumber',
        2 => 'AuthenticationCode1',
        3 => 'AuthenticationCode2',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
        'AuthenticationCode1' =>
        [
          'shape' => 'authenticationCodeType',
        ],
        'AuthenticationCode2' =>
        [
          'shape' => 'authenticationCodeType',
        ],
      ],
    ],
    'Role' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Path',
        1 => 'RoleName',
        2 => 'RoleId',
        3 => 'Arn',
        4 => 'CreateDate',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'RoleId' =>
        [
          'shape' => 'idType',
        ],
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
        'AssumeRolePolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'SAMLMetadataDocumentType' =>
    [
      'type' => 'string',
      'min' => 1000,
      'max' => 10000000,
    ],
    'SAMLProviderListEntry' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
        'ValidUntil' =>
        [
          'shape' => 'dateType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'SAMLProviderListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'SAMLProviderListEntry',
      ],
    ],
    'SAMLProviderNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\w._-]*',
    ],
    'ServerCertificate' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ServerCertificateMetadata',
        1 => 'CertificateBody',
      ],
      'members' =>
      [
        'ServerCertificateMetadata' =>
        [
          'shape' => 'ServerCertificateMetadata',
        ],
        'CertificateBody' =>
        [
          'shape' => 'certificateBodyType',
        ],
        'CertificateChain' =>
        [
          'shape' => 'certificateChainType',
        ],
      ],
    ],
    'ServerCertificateMetadata' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Path',
        1 => 'ServerCertificateName',
        2 => 'ServerCertificateId',
        3 => 'Arn',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'ServerCertificateName' =>
        [
          'shape' => 'serverCertificateNameType',
        ],
        'ServerCertificateId' =>
        [
          'shape' => 'idType',
        ],
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
        'UploadDate' =>
        [
          'shape' => 'dateType',
        ],
        'Expiration' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'SigningCertificate' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
        1 => 'CertificateId',
        2 => 'CertificateBody',
        3 => 'Status',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'CertificateId' =>
        [
          'shape' => 'certificateIdType',
        ],
        'CertificateBody' =>
        [
          'shape' => 'certificateBodyType',
        ],
        'Status' =>
        [
          'shape' => 'statusType',
        ],
        'UploadDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'UpdateAccessKeyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AccessKeyId',
        1 => 'Status',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'AccessKeyId' =>
        [
          'shape' => 'accessKeyIdType',
        ],
        'Status' =>
        [
          'shape' => 'statusType',
        ],
      ],
    ],
    'UpdateAccountPasswordPolicyRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MinimumPasswordLength' =>
        [
          'shape' => 'minimumPasswordLengthType',
        ],
        'RequireSymbols' =>
        [
          'shape' => 'booleanType',
        ],
        'RequireNumbers' =>
        [
          'shape' => 'booleanType',
        ],
        'RequireUppercaseCharacters' =>
        [
          'shape' => 'booleanType',
        ],
        'RequireLowercaseCharacters' =>
        [
          'shape' => 'booleanType',
        ],
        'AllowUsersToChangePassword' =>
        [
          'shape' => 'booleanType',
        ],
        'MaxPasswordAge' =>
        [
          'shape' => 'maxPasswordAgeType',
        ],
        'PasswordReusePrevention' =>
        [
          'shape' => 'passwordReusePreventionType',
        ],
        'HardExpiry' =>
        [
          'shape' => 'booleanObjectType',
        ],
      ],
    ],
    'UpdateAssumeRolePolicyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RoleName',
        1 => 'PolicyDocument',
      ],
      'members' =>
      [
        'RoleName' =>
        [
          'shape' => 'roleNameType',
        ],
        'PolicyDocument' =>
        [
          'shape' => 'policyDocumentType',
        ],
      ],
    ],
    'UpdateGroupRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GroupName',
      ],
      'members' =>
      [
        'GroupName' =>
        [
          'shape' => 'groupNameType',
        ],
        'NewPath' =>
        [
          'shape' => 'pathType',
        ],
        'NewGroupName' =>
        [
          'shape' => 'groupNameType',
        ],
      ],
    ],
    'UpdateLoginProfileRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'Password' =>
        [
          'shape' => 'passwordType',
        ],
        'PasswordResetRequired' =>
        [
          'shape' => 'booleanObjectType',
        ],
      ],
    ],
    'UpdateSAMLProviderRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SAMLMetadataDocument',
        1 => 'SAMLProviderArn',
      ],
      'members' =>
      [
        'SAMLMetadataDocument' =>
        [
          'shape' => 'SAMLMetadataDocumentType',
        ],
        'SAMLProviderArn' =>
        [
          'shape' => 'arnType',
        ],
      ],
    ],
    'UpdateSAMLProviderResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SAMLProviderArn' =>
        [
          'shape' => 'arnType',
        ],
      ],
    ],
    'UpdateServerCertificateRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ServerCertificateName',
      ],
      'members' =>
      [
        'ServerCertificateName' =>
        [
          'shape' => 'serverCertificateNameType',
        ],
        'NewPath' =>
        [
          'shape' => 'pathType',
        ],
        'NewServerCertificateName' =>
        [
          'shape' => 'serverCertificateNameType',
        ],
      ],
    ],
    'UpdateSigningCertificateRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CertificateId',
        1 => 'Status',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'CertificateId' =>
        [
          'shape' => 'certificateIdType',
        ],
        'Status' =>
        [
          'shape' => 'statusType',
        ],
      ],
    ],
    'UpdateUserRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'UserName',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'NewPath' =>
        [
          'shape' => 'pathType',
        ],
        'NewUserName' =>
        [
          'shape' => 'userNameType',
        ],
      ],
    ],
    'UploadServerCertificateRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ServerCertificateName',
        1 => 'CertificateBody',
        2 => 'PrivateKey',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'ServerCertificateName' =>
        [
          'shape' => 'serverCertificateNameType',
        ],
        'CertificateBody' =>
        [
          'shape' => 'certificateBodyType',
        ],
        'PrivateKey' =>
        [
          'shape' => 'privateKeyType',
        ],
        'CertificateChain' =>
        [
          'shape' => 'certificateChainType',
        ],
      ],
    ],
    'UploadServerCertificateResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ServerCertificateMetadata' =>
        [
          'shape' => 'ServerCertificateMetadata',
        ],
      ],
    ],
    'UploadSigningCertificateRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CertificateBody',
      ],
      'members' =>
      [
        'UserName' =>
        [
          'shape' => 'existingUserNameType',
        ],
        'CertificateBody' =>
        [
          'shape' => 'certificateBodyType',
        ],
      ],
    ],
    'UploadSigningCertificateResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Certificate',
      ],
      'members' =>
      [
        'Certificate' =>
        [
          'shape' => 'SigningCertificate',
        ],
      ],
    ],
    'User' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Path',
        1 => 'UserName',
        2 => 'UserId',
        3 => 'Arn',
        4 => 'CreateDate',
      ],
      'members' =>
      [
        'Path' =>
        [
          'shape' => 'pathType',
        ],
        'UserName' =>
        [
          'shape' => 'userNameType',
        ],
        'UserId' =>
        [
          'shape' => 'idType',
        ],
        'Arn' =>
        [
          'shape' => 'arnType',
        ],
        'CreateDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'VirtualMFADevice' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SerialNumber',
      ],
      'members' =>
      [
        'SerialNumber' =>
        [
          'shape' => 'serialNumberType',
        ],
        'Base32StringSeed' =>
        [
          'shape' => 'BootstrapDatum',
        ],
        'QRCodePNG' =>
        [
          'shape' => 'BootstrapDatum',
        ],
        'User' =>
        [
          'shape' => 'User',
        ],
        'EnableDate' =>
        [
          'shape' => 'dateType',
        ],
      ],
    ],
    'accessKeyIdType' =>
    [
      'type' => 'string',
      'min' => 16,
      'max' => 32,
      'pattern' => '[\\w]*',
    ],
    'accessKeyMetadataListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AccessKeyMetadata',
      ],
    ],
    'accessKeySecretType' =>
    [
      'type' => 'string',
      'sensitive' => true,
    ],
    'accountAliasListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'accountAliasType',
      ],
    ],
    'accountAliasType' =>
    [
      'type' => 'string',
      'min' => 3,
      'max' => 63,
      'pattern' => '^[a-z0-9](([a-z0-9]|-(?!-]]*[a-z0-9]]?$',
    ],
    'arnType' =>
    [
      'type' => 'string',
      'min' => 20,
      'max' => 2048,
    ],
    'assignmentStatusType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'Assigned',
        1 => 'Unassigned',
        2 => 'Any',
      ],
    ],
    'authenticationCodeType' =>
    [
      'type' => 'string',
      'min' => 6,
      'max' => 6,
      'pattern' => '[\\d]*',
    ],
    'booleanObjectType' =>
    [
      'type' => 'boolean',
      'box' => true,
    ],
    'booleanType' =>
    [
      'type' => 'boolean',
    ],
    'certificateBodyType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 16384,
      'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u00FF]+',
    ],
    'certificateChainType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 2097152,
      'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u00FF]*',
    ],
    'certificateIdType' =>
    [
      'type' => 'string',
      'min' => 24,
      'max' => 128,
      'pattern' => '[\\w]*',
    ],
    'certificateListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'SigningCertificate',
      ],
    ],
    'credentialReportExpiredExceptionMessage' =>
    [
      'type' => 'string',
    ],
    'credentialReportNotPresentExceptionMessage' =>
    [
      'type' => 'string',
    ],
    'credentialReportNotReadyExceptionMessage' =>
    [
      'type' => 'string',
    ],
    'dateType' =>
    [
      'type' => 'timestamp',
    ],
    'deleteConflictMessage' =>
    [
      'type' => 'string',
    ],
    'duplicateCertificateMessage' =>
    [
      'type' => 'string',
    ],
    'entityAlreadyExistsMessage' =>
    [
      'type' => 'string',
    ],
    'entityTemporarilyUnmodifiableMessage' =>
    [
      'type' => 'string',
    ],
    'existingUserNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'groupListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Group',
      ],
    ],
    'groupNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'idType' =>
    [
      'type' => 'string',
      'min' => 16,
      'max' => 32,
      'pattern' => '[\\w]*',
    ],
    'instanceProfileListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InstanceProfile',
      ],
    ],
    'instanceProfileNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'invalidAuthenticationCodeMessage' =>
    [
      'type' => 'string',
    ],
    'invalidCertificateMessage' =>
    [
      'type' => 'string',
    ],
    'invalidInputMessage' =>
    [
      'type' => 'string',
    ],
    'invalidUserTypeMessage' =>
    [
      'type' => 'string',
    ],
    'keyPairMismatchMessage' =>
    [
      'type' => 'string',
    ],
    'limitExceededMessage' =>
    [
      'type' => 'string',
    ],
    'malformedCertificateMessage' =>
    [
      'type' => 'string',
    ],
    'malformedPolicyDocumentMessage' =>
    [
      'type' => 'string',
    ],
    'markerType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 320,
      'pattern' => '[\\u0020-\\u00FF]*',
    ],
    'maxItemsType' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 1000,
    ],
    'maxPasswordAgeType' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 1095,
      'box' => true,
    ],
    'mfaDeviceListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'MFADevice',
      ],
    ],
    'minimumPasswordLengthType' =>
    [
      'type' => 'integer',
      'min' => 6,
      'max' => 128,
    ],
    'noSuchEntityMessage' =>
    [
      'type' => 'string',
    ],
    'passwordPolicyViolationMessage' =>
    [
      'type' => 'string',
    ],
    'passwordReusePreventionType' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 24,
      'box' => true,
    ],
    'passwordType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u00FF]+',
      'sensitive' => true,
    ],
    'pathPrefixType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 512,
      'pattern' => '\\u002F[\\u0021-\\u007F]*',
    ],
    'pathType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 512,
      'pattern' => '(\\u002F]|(\\u002F[\\u0021-\\u007F]+\\u002F]',
    ],
    'policyDocumentType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 131072,
      'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u00FF]+',
    ],
    'policyNameListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'policyNameType',
      ],
    ],
    'policyNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'privateKeyType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 16384,
      'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u00FF]*',
      'sensitive' => true,
    ],
    'roleListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Role',
      ],
    ],
    'roleNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'serialNumberType' =>
    [
      'type' => 'string',
      'min' => 9,
      'max' => 256,
      'pattern' => '[\\w+=/:,.@-]*',
    ],
    'serverCertificateMetadataListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ServerCertificateMetadata',
      ],
    ],
    'serverCertificateNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'statusType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'Active',
        1 => 'Inactive',
      ],
    ],
    'summaryKeyType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'Users',
        1 => 'UsersQuota',
        2 => 'Groups',
        3 => 'GroupsQuota',
        4 => 'ServerCertificates',
        5 => 'ServerCertificatesQuota',
        6 => 'UserPolicySizeQuota',
        7 => 'GroupPolicySizeQuota',
        8 => 'GroupsPerUserQuota',
        9 => 'SigningCertificatesPerUserQuota',
        10 => 'AccessKeysPerUserQuota',
        11 => 'MFADevices',
        12 => 'MFADevicesInUse',
        13 => 'AccountMFAEnabled',
      ],
    ],
    'summaryMapType' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'summaryKeyType',
      ],
      'value' =>
      [
        'shape' => 'summaryValueType',
      ],
    ],
    'summaryValueType' =>
    [
      'type' => 'integer',
    ],
    'userListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'User',
      ],
    ],
    'userNameType' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
      'pattern' => '[\\w+=,.@-]*',
    ],
    'virtualMFADeviceListType' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'VirtualMFADevice',
      ],
    ],
    'virtualMFADeviceName' =>
    [
      'type' => 'string',
      'min' => 1,
      'pattern' => '[\\w+=,.@-]*',
    ],
  ],
];