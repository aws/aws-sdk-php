<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2010-03-31',
    'endpointPrefix' => 'sns',
    'serviceAbbreviation' => 'Amazon SNS',
    'serviceFullName' => 'Amazon Simple Notification Service',
    'signatureVersion' => 'v4',
    'xmlNamespace' => 'http://sns.amazonaws.com/doc/2010-03-31/',
    'protocol' => 'query',
  ],
  'operations' =>
  [
    'AddPermission' =>
    [
      'name' => 'AddPermission',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'AddPermissionInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ConfirmSubscription' =>
    [
      'name' => 'ConfirmSubscription',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ConfirmSubscriptionInput',
      ],
      'output' =>
      [
        'shape' => 'ConfirmSubscriptionResponse',
        'resultWrapper' => 'ConfirmSubscriptionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'SubscriptionLimitExceededException',
          'error' =>
          [
            'code' => 'SubscriptionLimitExceeded',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        4 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreatePlatformApplication' =>
    [
      'name' => 'CreatePlatformApplication',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreatePlatformApplicationInput',
      ],
      'output' =>
      [
        'shape' => 'CreatePlatformApplicationResponse',
        'resultWrapper' => 'CreatePlatformApplicationResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreatePlatformEndpoint' =>
    [
      'name' => 'CreatePlatformEndpoint',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreatePlatformEndpointInput',
      ],
      'output' =>
      [
        'shape' => 'CreateEndpointResponse',
        'resultWrapper' => 'CreatePlatformEndpointResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateTopic' =>
    [
      'name' => 'CreateTopic',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateTopicInput',
      ],
      'output' =>
      [
        'shape' => 'CreateTopicResponse',
        'resultWrapper' => 'CreateTopicResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'TopicLimitExceededException',
          'error' =>
          [
            'code' => 'TopicLimitExceeded',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        3 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteEndpoint' =>
    [
      'name' => 'DeleteEndpoint',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteEndpointInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeletePlatformApplication' =>
    [
      'name' => 'DeletePlatformApplication',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeletePlatformApplicationInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteTopic' =>
    [
      'name' => 'DeleteTopic',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteTopicInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetEndpointAttributes' =>
    [
      'name' => 'GetEndpointAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetEndpointAttributesInput',
      ],
      'output' =>
      [
        'shape' => 'GetEndpointAttributesResponse',
        'resultWrapper' => 'GetEndpointAttributesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetPlatformApplicationAttributes' =>
    [
      'name' => 'GetPlatformApplicationAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetPlatformApplicationAttributesInput',
      ],
      'output' =>
      [
        'shape' => 'GetPlatformApplicationAttributesResponse',
        'resultWrapper' => 'GetPlatformApplicationAttributesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetSubscriptionAttributes' =>
    [
      'name' => 'GetSubscriptionAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetSubscriptionAttributesInput',
      ],
      'output' =>
      [
        'shape' => 'GetSubscriptionAttributesResponse',
        'resultWrapper' => 'GetSubscriptionAttributesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetTopicAttributes' =>
    [
      'name' => 'GetTopicAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetTopicAttributesInput',
      ],
      'output' =>
      [
        'shape' => 'GetTopicAttributesResponse',
        'resultWrapper' => 'GetTopicAttributesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListEndpointsByPlatformApplication' =>
    [
      'name' => 'ListEndpointsByPlatformApplication',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListEndpointsByPlatformApplicationInput',
      ],
      'output' =>
      [
        'shape' => 'ListEndpointsByPlatformApplicationResponse',
        'resultWrapper' => 'ListEndpointsByPlatformApplicationResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListPlatformApplications' =>
    [
      'name' => 'ListPlatformApplications',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListPlatformApplicationsInput',
      ],
      'output' =>
      [
        'shape' => 'ListPlatformApplicationsResponse',
        'resultWrapper' => 'ListPlatformApplicationsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListSubscriptions' =>
    [
      'name' => 'ListSubscriptions',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListSubscriptionsInput',
      ],
      'output' =>
      [
        'shape' => 'ListSubscriptionsResponse',
        'resultWrapper' => 'ListSubscriptionsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListSubscriptionsByTopic' =>
    [
      'name' => 'ListSubscriptionsByTopic',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListSubscriptionsByTopicInput',
      ],
      'output' =>
      [
        'shape' => 'ListSubscriptionsByTopicResponse',
        'resultWrapper' => 'ListSubscriptionsByTopicResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListTopics' =>
    [
      'name' => 'ListTopics',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListTopicsInput',
      ],
      'output' =>
      [
        'shape' => 'ListTopicsResponse',
        'resultWrapper' => 'ListTopicsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'Publish' =>
    [
      'name' => 'Publish',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PublishInput',
      ],
      'output' =>
      [
        'shape' => 'PublishResponse',
        'resultWrapper' => 'PublishResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterValueException',
          'error' =>
          [
            'code' => 'ParameterValueInvalid',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'EndpointDisabledException',
          'error' =>
          [
            'code' => 'EndpointDisabled',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'PlatformApplicationDisabledException',
          'error' =>
          [
            'code' => 'PlatformApplicationDisabled',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RemovePermission' =>
    [
      'name' => 'RemovePermission',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RemovePermissionInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetEndpointAttributes' =>
    [
      'name' => 'SetEndpointAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetEndpointAttributesInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetPlatformApplicationAttributes' =>
    [
      'name' => 'SetPlatformApplicationAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetPlatformApplicationAttributesInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetSubscriptionAttributes' =>
    [
      'name' => 'SetSubscriptionAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetSubscriptionAttributesInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'SetTopicAttributes' =>
    [
      'name' => 'SetTopicAttributes',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SetTopicAttributesInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'Subscribe' =>
    [
      'name' => 'Subscribe',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SubscribeInput',
      ],
      'output' =>
      [
        'shape' => 'SubscribeResponse',
        'resultWrapper' => 'SubscribeResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'SubscriptionLimitExceededException',
          'error' =>
          [
            'code' => 'SubscriptionLimitExceeded',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
            'httpStatusCode' => 404,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
      ],
    ],
    'Unsubscribe' =>
    [
      'name' => 'Unsubscribe',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UnsubscribeInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidParameterException',
          'error' =>
          [
            'code' => 'InvalidParameter',
            'httpStatusCode' => 400,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InternalErrorException',
          'error' =>
          [
            'code' => 'InternalError',
            'httpStatusCode' => 500,
          ],
          'exception' => true,
          'fault' => true,
        ],
        2 =>
        [
          'shape' => 'AuthorizationErrorException',
          'error' =>
          [
            'code' => 'AuthorizationError',
            'httpStatusCode' => 403,
            'senderFault' => true,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NotFoundException',
          'error' =>
          [
            'code' => 'NotFound',
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
    'ActionsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'action',
      ],
    ],
    'AddPermissionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
        1 => 'Label',
        2 => 'AWSAccountId',
        3 => 'ActionName',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
        'Label' =>
        [
          'shape' => 'label',
        ],
        'AWSAccountId' =>
        [
          'shape' => 'DelegatesList',
        ],
        'ActionName' =>
        [
          'shape' => 'ActionsList',
        ],
      ],
    ],
    'AuthorizationErrorException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'AuthorizationError',
        'httpStatusCode' => 403,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'Binary' =>
    [
      'type' => 'blob',
    ],
    'ConfirmSubscriptionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
        1 => 'Token',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
        'Token' =>
        [
          'shape' => 'token',
        ],
        'AuthenticateOnUnsubscribe' =>
        [
          'shape' => 'authenticateOnUnsubscribe',
        ],
      ],
    ],
    'ConfirmSubscriptionResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SubscriptionArn' =>
        [
          'shape' => 'subscriptionARN',
        ],
      ],
    ],
    'CreateEndpointResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'EndpointArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreatePlatformApplicationInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'Platform',
        2 => 'Attributes',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'String',
        ],
        'Platform' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'CreatePlatformApplicationResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PlatformApplicationArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'CreatePlatformEndpointInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PlatformApplicationArn',
        1 => 'Token',
      ],
      'members' =>
      [
        'PlatformApplicationArn' =>
        [
          'shape' => 'String',
        ],
        'Token' =>
        [
          'shape' => 'String',
        ],
        'CustomUserData' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'CreateTopicInput' =>
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
          'shape' => 'topicName',
        ],
      ],
    ],
    'CreateTopicResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
      ],
    ],
    'DelegatesList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'delegate',
      ],
    ],
    'DeleteEndpointInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'EndpointArn',
      ],
      'members' =>
      [
        'EndpointArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeletePlatformApplicationInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PlatformApplicationArn',
      ],
      'members' =>
      [
        'PlatformApplicationArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'DeleteTopicInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
      ],
    ],
    'Endpoint' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'EndpointArn' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'EndpointDisabledException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'EndpointDisabled',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'GetEndpointAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'EndpointArn',
      ],
      'members' =>
      [
        'EndpointArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'GetEndpointAttributesResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'GetPlatformApplicationAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PlatformApplicationArn',
      ],
      'members' =>
      [
        'PlatformApplicationArn' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'GetPlatformApplicationAttributesResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'GetSubscriptionAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionArn',
      ],
      'members' =>
      [
        'SubscriptionArn' =>
        [
          'shape' => 'subscriptionARN',
        ],
      ],
    ],
    'GetSubscriptionAttributesResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Attributes' =>
        [
          'shape' => 'SubscriptionAttributesMap',
        ],
      ],
    ],
    'GetTopicAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
      ],
    ],
    'GetTopicAttributesResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Attributes' =>
        [
          'shape' => 'TopicAttributesMap',
        ],
      ],
    ],
    'InternalErrorException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'InternalError',
        'httpStatusCode' => 500,
      ],
      'exception' => true,
      'fault' => true,
    ],
    'InvalidParameterException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'InvalidParameter',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'InvalidParameterValueException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'ParameterValueInvalid',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'ListEndpointsByPlatformApplicationInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PlatformApplicationArn',
      ],
      'members' =>
      [
        'PlatformApplicationArn' =>
        [
          'shape' => 'String',
        ],
        'NextToken' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ListEndpointsByPlatformApplicationResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Endpoints' =>
        [
          'shape' => 'ListOfEndpoints',
        ],
        'NextToken' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ListOfEndpoints' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Endpoint',
      ],
    ],
    'ListOfPlatformApplications' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'PlatformApplication',
      ],
    ],
    'ListPlatformApplicationsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'NextToken' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ListPlatformApplicationsResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PlatformApplications' =>
        [
          'shape' => 'ListOfPlatformApplications',
        ],
        'NextToken' =>
        [
          'shape' => 'String',
        ],
      ],
    ],
    'ListSubscriptionsByTopicInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
        'NextToken' =>
        [
          'shape' => 'nextToken',
        ],
      ],
    ],
    'ListSubscriptionsByTopicResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Subscriptions' =>
        [
          'shape' => 'SubscriptionsList',
        ],
        'NextToken' =>
        [
          'shape' => 'nextToken',
        ],
      ],
    ],
    'ListSubscriptionsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'NextToken' =>
        [
          'shape' => 'nextToken',
        ],
      ],
    ],
    'ListSubscriptionsResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Subscriptions' =>
        [
          'shape' => 'SubscriptionsList',
        ],
        'NextToken' =>
        [
          'shape' => 'nextToken',
        ],
      ],
    ],
    'ListTopicsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'NextToken' =>
        [
          'shape' => 'nextToken',
        ],
      ],
    ],
    'ListTopicsResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Topics' =>
        [
          'shape' => 'TopicsList',
        ],
        'NextToken' =>
        [
          'shape' => 'nextToken',
        ],
      ],
    ],
    'MapStringToString' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'String',
      ],
      'value' =>
      [
        'shape' => 'String',
      ],
    ],
    'MessageAttributeMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'String',
        'locationName' => 'Name',
      ],
      'value' =>
      [
        'shape' => 'MessageAttributeValue',
        'locationName' => 'Value',
      ],
    ],
    'MessageAttributeValue' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DataType',
      ],
      'members' =>
      [
        'DataType' =>
        [
          'shape' => 'String',
        ],
        'StringValue' =>
        [
          'shape' => 'String',
        ],
        'BinaryValue' =>
        [
          'shape' => 'Binary',
        ],
      ],
    ],
    'NotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'NotFound',
        'httpStatusCode' => 404,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'PlatformApplication' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PlatformApplicationArn' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'PlatformApplicationDisabledException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'PlatformApplicationDisabled',
        'httpStatusCode' => 400,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'PublishInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Message',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
        'TargetArn' =>
        [
          'shape' => 'String',
        ],
        'Message' =>
        [
          'shape' => 'message',
        ],
        'Subject' =>
        [
          'shape' => 'subject',
        ],
        'MessageStructure' =>
        [
          'shape' => 'messageStructure',
        ],
        'MessageAttributes' =>
        [
          'shape' => 'MessageAttributeMap',
        ],
      ],
    ],
    'PublishResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'MessageId' =>
        [
          'shape' => 'messageId',
        ],
      ],
    ],
    'RemovePermissionInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
        1 => 'Label',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
        'Label' =>
        [
          'shape' => 'label',
        ],
      ],
    ],
    'SetEndpointAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'EndpointArn',
        1 => 'Attributes',
      ],
      'members' =>
      [
        'EndpointArn' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'SetPlatformApplicationAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PlatformApplicationArn',
        1 => 'Attributes',
      ],
      'members' =>
      [
        'PlatformApplicationArn' =>
        [
          'shape' => 'String',
        ],
        'Attributes' =>
        [
          'shape' => 'MapStringToString',
        ],
      ],
    ],
    'SetSubscriptionAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionArn',
        1 => 'AttributeName',
      ],
      'members' =>
      [
        'SubscriptionArn' =>
        [
          'shape' => 'subscriptionARN',
        ],
        'AttributeName' =>
        [
          'shape' => 'attributeName',
        ],
        'AttributeValue' =>
        [
          'shape' => 'attributeValue',
        ],
      ],
    ],
    'SetTopicAttributesInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
        1 => 'AttributeName',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
        'AttributeName' =>
        [
          'shape' => 'attributeName',
        ],
        'AttributeValue' =>
        [
          'shape' => 'attributeValue',
        ],
      ],
    ],
    'String' =>
    [
      'type' => 'string',
    ],
    'SubscribeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TopicArn',
        1 => 'Protocol',
      ],
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
        'Protocol' =>
        [
          'shape' => 'protocol',
        ],
        'Endpoint' =>
        [
          'shape' => 'endpoint',
        ],
      ],
    ],
    'SubscribeResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SubscriptionArn' =>
        [
          'shape' => 'subscriptionARN',
        ],
      ],
    ],
    'Subscription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'SubscriptionArn' =>
        [
          'shape' => 'subscriptionARN',
        ],
        'Owner' =>
        [
          'shape' => 'account',
        ],
        'Protocol' =>
        [
          'shape' => 'protocol',
        ],
        'Endpoint' =>
        [
          'shape' => 'endpoint',
        ],
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
      ],
    ],
    'SubscriptionAttributesMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'attributeName',
      ],
      'value' =>
      [
        'shape' => 'attributeValue',
      ],
    ],
    'SubscriptionLimitExceededException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'SubscriptionLimitExceeded',
        'httpStatusCode' => 403,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'SubscriptionsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Subscription',
      ],
    ],
    'Topic' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TopicArn' =>
        [
          'shape' => 'topicARN',
        ],
      ],
    ],
    'TopicAttributesMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'attributeName',
      ],
      'value' =>
      [
        'shape' => 'attributeValue',
      ],
    ],
    'TopicLimitExceededException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'code' => 'TopicLimitExceeded',
        'httpStatusCode' => 403,
        'senderFault' => true,
      ],
      'exception' => true,
    ],
    'TopicsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Topic',
      ],
    ],
    'UnsubscribeInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SubscriptionArn',
      ],
      'members' =>
      [
        'SubscriptionArn' =>
        [
          'shape' => 'subscriptionARN',
        ],
      ],
    ],
    'account' =>
    [
      'type' => 'string',
    ],
    'action' =>
    [
      'type' => 'string',
    ],
    'attributeName' =>
    [
      'type' => 'string',
    ],
    'attributeValue' =>
    [
      'type' => 'string',
    ],
    'authenticateOnUnsubscribe' =>
    [
      'type' => 'string',
    ],
    'delegate' =>
    [
      'type' => 'string',
    ],
    'endpoint' =>
    [
      'type' => 'string',
    ],
    'label' =>
    [
      'type' => 'string',
    ],
    'message' =>
    [
      'type' => 'string',
    ],
    'messageId' =>
    [
      'type' => 'string',
    ],
    'messageStructure' =>
    [
      'type' => 'string',
    ],
    'nextToken' =>
    [
      'type' => 'string',
    ],
    'protocol' =>
    [
      'type' => 'string',
    ],
    'string' =>
    [
      'type' => 'string',
    ],
    'subject' =>
    [
      'type' => 'string',
    ],
    'subscriptionARN' =>
    [
      'type' => 'string',
    ],
    'token' =>
    [
      'type' => 'string',
    ],
    'topicARN' =>
    [
      'type' => 'string',
    ],
    'topicName' =>
    [
      'type' => 'string',
    ],
  ],
];