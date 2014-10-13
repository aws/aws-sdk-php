<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2014-05-31',
    'endpointPrefix' => 'cloudfront',
    'globalEndpoint' => 'cloudfront.amazonaws.com',
    'serviceAbbreviation' => 'CloudFront',
    'serviceFullName' => 'Amazon CloudFront',
    'signatureVersion' => 'v4',
    'protocol' => 'rest-xml',
  ],
  'operations' =>
  [
    'CreateCloudFrontOriginAccessIdentity' =>
    [
      'name' => 'CreateCloudFrontOriginAccessIdentity2014_05_31',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2014-05-31/origin-access-identity/cloudfront',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CreateCloudFrontOriginAccessIdentityRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateCloudFrontOriginAccessIdentityResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'CloudFrontOriginAccessIdentityAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'MissingBody',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TooManyCloudFrontOriginAccessIdentities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InconsistentQuantities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateDistribution' =>
    [
      'name' => 'CreateDistribution2014_05_31',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2014-05-31/distribution',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CreateDistributionRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateDistributionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'CNAMEAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DistributionAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidOrigin',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'TooManyTrustedSigners',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'TrustedSignerDoesNotExist',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'InvalidViewerCertificate',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'MissingBody',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'TooManyDistributionCNAMEs',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'TooManyDistributions',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'InvalidDefaultRootObject',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'InvalidRelativePath',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'InvalidErrorCode',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        14 =>
        [
          'shape' => 'InvalidResponseCode',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        15 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        16 =>
        [
          'shape' => 'InvalidRequiredProtocol',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        17 =>
        [
          'shape' => 'NoSuchOrigin',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        18 =>
        [
          'shape' => 'TooManyOrigins',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        19 =>
        [
          'shape' => 'TooManyCacheBehaviors',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        20 =>
        [
          'shape' => 'TooManyCookieNamesInWhiteList',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        21 =>
        [
          'shape' => 'InvalidForwardCookies',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        22 =>
        [
          'shape' => 'TooManyHeadersInForwardedValues',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        23 =>
        [
          'shape' => 'InvalidHeadersForS3Origin',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        24 =>
        [
          'shape' => 'InconsistentQuantities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        25 =>
        [
          'shape' => 'TooManyCertificates',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        26 =>
        [
          'shape' => 'InvalidLocationCode',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        27 =>
        [
          'shape' => 'InvalidGeoRestrictionParameter',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateInvalidation' =>
    [
      'name' => 'CreateInvalidation2014_05_31',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2014-05-31/distribution/{DistributionId}/invalidation',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CreateInvalidationRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateInvalidationResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'MissingBody',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NoSuchDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'BatchTooLarge',
          'error' =>
          [
            'httpStatusCode' => 413,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'TooManyInvalidationsInProgress',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'InconsistentQuantities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateStreamingDistribution' =>
    [
      'name' => 'CreateStreamingDistribution2014_05_31',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2014-05-31/streaming-distribution',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CreateStreamingDistributionRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateStreamingDistributionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'CNAMEAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'StreamingDistributionAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidOrigin',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'TooManyTrustedSigners',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'TrustedSignerDoesNotExist',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'MissingBody',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'TooManyStreamingDistributionCNAMEs',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'TooManyStreamingDistributions',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'InconsistentQuantities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteCloudFrontOriginAccessIdentity' =>
    [
      'name' => 'DeleteCloudFrontOriginAccessIdentity2014_05_31',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/2014-05-31/origin-access-identity/cloudfront/{Id}',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'DeleteCloudFrontOriginAccessIdentityRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidIfMatchVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'NoSuchCloudFrontOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'PreconditionFailed',
          'error' =>
          [
            'httpStatusCode' => 412,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'CloudFrontOriginAccessIdentityInUse',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteDistribution' =>
    [
      'name' => 'DeleteDistribution2014_05_31',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/2014-05-31/distribution/{Id}',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'DeleteDistributionRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DistributionNotDisabled',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidIfMatchVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NoSuchDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'PreconditionFailed',
          'error' =>
          [
            'httpStatusCode' => 412,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteStreamingDistribution' =>
    [
      'name' => 'DeleteStreamingDistribution2014_05_31',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/2014-05-31/streaming-distribution/{Id}',
        'responseCode' => 204,
      ],
      'input' =>
      [
        'shape' => 'DeleteStreamingDistributionRequest',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'StreamingDistributionNotDisabled',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidIfMatchVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'NoSuchStreamingDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'PreconditionFailed',
          'error' =>
          [
            'httpStatusCode' => 412,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetCloudFrontOriginAccessIdentity' =>
    [
      'name' => 'GetCloudFrontOriginAccessIdentity2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/origin-access-identity/cloudfront/{Id}',
      ],
      'input' =>
      [
        'shape' => 'GetCloudFrontOriginAccessIdentityRequest',
      ],
      'output' =>
      [
        'shape' => 'GetCloudFrontOriginAccessIdentityResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchCloudFrontOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetCloudFrontOriginAccessIdentityConfig' =>
    [
      'name' => 'GetCloudFrontOriginAccessIdentityConfig2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/origin-access-identity/cloudfront/{Id}/config',
      ],
      'input' =>
      [
        'shape' => 'GetCloudFrontOriginAccessIdentityConfigRequest',
      ],
      'output' =>
      [
        'shape' => 'GetCloudFrontOriginAccessIdentityConfigResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchCloudFrontOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetDistribution' =>
    [
      'name' => 'GetDistribution2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/distribution/{Id}',
      ],
      'input' =>
      [
        'shape' => 'GetDistributionRequest',
      ],
      'output' =>
      [
        'shape' => 'GetDistributionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetDistributionConfig' =>
    [
      'name' => 'GetDistributionConfig2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/distribution/{Id}/config',
      ],
      'input' =>
      [
        'shape' => 'GetDistributionConfigRequest',
      ],
      'output' =>
      [
        'shape' => 'GetDistributionConfigResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetInvalidation' =>
    [
      'name' => 'GetInvalidation2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/distribution/{DistributionId}/invalidation/{Id}',
      ],
      'input' =>
      [
        'shape' => 'GetInvalidationRequest',
      ],
      'output' =>
      [
        'shape' => 'GetInvalidationResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchInvalidation',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetStreamingDistribution' =>
    [
      'name' => 'GetStreamingDistribution2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/streaming-distribution/{Id}',
      ],
      'input' =>
      [
        'shape' => 'GetStreamingDistributionRequest',
      ],
      'output' =>
      [
        'shape' => 'GetStreamingDistributionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchStreamingDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetStreamingDistributionConfig' =>
    [
      'name' => 'GetStreamingDistributionConfig2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/streaming-distribution/{Id}/config',
      ],
      'input' =>
      [
        'shape' => 'GetStreamingDistributionConfigRequest',
      ],
      'output' =>
      [
        'shape' => 'GetStreamingDistributionConfigResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchStreamingDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListCloudFrontOriginAccessIdentities' =>
    [
      'name' => 'ListCloudFrontOriginAccessIdentities2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/origin-access-identity/cloudfront',
      ],
      'input' =>
      [
        'shape' => 'ListCloudFrontOriginAccessIdentitiesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListCloudFrontOriginAccessIdentitiesResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListDistributions' =>
    [
      'name' => 'ListDistributions2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/distribution',
      ],
      'input' =>
      [
        'shape' => 'ListDistributionsRequest',
      ],
      'output' =>
      [
        'shape' => 'ListDistributionsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListInvalidations' =>
    [
      'name' => 'ListInvalidations2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/distribution/{DistributionId}/invalidation',
      ],
      'input' =>
      [
        'shape' => 'ListInvalidationsRequest',
      ],
      'output' =>
      [
        'shape' => 'ListInvalidationsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListStreamingDistributions' =>
    [
      'name' => 'ListStreamingDistributions2014_05_31',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2014-05-31/streaming-distribution',
      ],
      'input' =>
      [
        'shape' => 'ListStreamingDistributionsRequest',
      ],
      'output' =>
      [
        'shape' => 'ListStreamingDistributionsResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateCloudFrontOriginAccessIdentity' =>
    [
      'name' => 'UpdateCloudFrontOriginAccessIdentity2014_05_31',
      'http' =>
      [
        'method' => 'PUT',
        'requestUri' => '/2014-05-31/origin-access-identity/cloudfront/{Id}/config',
      ],
      'input' =>
      [
        'shape' => 'UpdateCloudFrontOriginAccessIdentityRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateCloudFrontOriginAccessIdentityResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'IllegalUpdate',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidIfMatchVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'MissingBody',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'NoSuchCloudFrontOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'PreconditionFailed',
          'error' =>
          [
            'httpStatusCode' => 412,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'InconsistentQuantities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateDistribution' =>
    [
      'name' => 'UpdateDistribution2014_05_31',
      'http' =>
      [
        'method' => 'PUT',
        'requestUri' => '/2014-05-31/distribution/{Id}/config',
      ],
      'input' =>
      [
        'shape' => 'UpdateDistributionRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateDistributionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'CNAMEAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'IllegalUpdate',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidIfMatchVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'MissingBody',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'NoSuchDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'PreconditionFailed',
          'error' =>
          [
            'httpStatusCode' => 412,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'TooManyDistributionCNAMEs',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'InvalidDefaultRootObject',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'InvalidRelativePath',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'InvalidErrorCode',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'InvalidResponseCode',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        13 =>
        [
          'shape' => 'InvalidOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        14 =>
        [
          'shape' => 'TooManyTrustedSigners',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        15 =>
        [
          'shape' => 'TrustedSignerDoesNotExist',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        16 =>
        [
          'shape' => 'InvalidViewerCertificate',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        17 =>
        [
          'shape' => 'InvalidRequiredProtocol',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        18 =>
        [
          'shape' => 'NoSuchOrigin',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        19 =>
        [
          'shape' => 'TooManyOrigins',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        20 =>
        [
          'shape' => 'TooManyCacheBehaviors',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        21 =>
        [
          'shape' => 'TooManyCookieNamesInWhiteList',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        22 =>
        [
          'shape' => 'InvalidForwardCookies',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        23 =>
        [
          'shape' => 'TooManyHeadersInForwardedValues',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        24 =>
        [
          'shape' => 'InvalidHeadersForS3Origin',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        25 =>
        [
          'shape' => 'InconsistentQuantities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        26 =>
        [
          'shape' => 'TooManyCertificates',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        27 =>
        [
          'shape' => 'InvalidLocationCode',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        28 =>
        [
          'shape' => 'InvalidGeoRestrictionParameter',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateStreamingDistribution' =>
    [
      'name' => 'UpdateStreamingDistribution2014_05_31',
      'http' =>
      [
        'method' => 'PUT',
        'requestUri' => '/2014-05-31/streaming-distribution/{Id}/config',
      ],
      'input' =>
      [
        'shape' => 'UpdateStreamingDistributionRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateStreamingDistributionResult',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'AccessDenied',
          'error' =>
          [
            'httpStatusCode' => 403,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'CNAMEAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'IllegalUpdate',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidIfMatchVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'MissingBody',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'NoSuchStreamingDistribution',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        6 =>
        [
          'shape' => 'PreconditionFailed',
          'error' =>
          [
            'httpStatusCode' => 412,
          ],
          'exception' => true,
        ],
        7 =>
        [
          'shape' => 'TooManyStreamingDistributionCNAMEs',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        8 =>
        [
          'shape' => 'InvalidArgument',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        9 =>
        [
          'shape' => 'InvalidOriginAccessIdentity',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        10 =>
        [
          'shape' => 'TooManyTrustedSigners',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        11 =>
        [
          'shape' => 'TrustedSignerDoesNotExist',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        12 =>
        [
          'shape' => 'InconsistentQuantities',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AccessDenied' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 403,
      ],
      'exception' => true,
    ],
    'ActiveTrustedSigners' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Enabled',
        1 => 'Quantity',
      ],
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'SignerList',
        ],
      ],
    ],
    'AliasList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
        'locationName' => 'CNAME',
      ],
    ],
    'Aliases' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'AliasList',
        ],
      ],
    ],
    'AllowedMethods' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'AllowedMethodsList',
        ],
      ],
    ],
    'AllowedMethodsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Method',
        'locationName' => 'Method',
      ],
    ],
    'AwsAccountNumberList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
        'locationName' => 'AwsAccountNumber',
      ],
    ],
    'BatchTooLarge' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 413,
      ],
      'exception' => true,
    ],
    'CNAMEAlreadyExists' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'CacheBehavior' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'PathPattern',
        1 => 'TargetOriginId',
        2 => 'ForwardedValues',
        3 => 'TrustedSigners',
        4 => 'ViewerProtocolPolicy',
        5 => 'MinTTL',
      ],
      'members' =>
      [
        'PathPattern' =>
        [
          'shape' => 'string',
        ],
        'TargetOriginId' =>
        [
          'shape' => 'string',
        ],
        'ForwardedValues' =>
        [
          'shape' => 'ForwardedValues',
        ],
        'TrustedSigners' =>
        [
          'shape' => 'TrustedSigners',
        ],
        'ViewerProtocolPolicy' =>
        [
          'shape' => 'ViewerProtocolPolicy',
        ],
        'MinTTL' =>
        [
          'shape' => 'long',
        ],
        'AllowedMethods' =>
        [
          'shape' => 'AllowedMethods',
        ],
        'SmoothStreaming' =>
        [
          'shape' => 'boolean',
        ],
      ],
    ],
    'CacheBehaviorList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'CacheBehavior',
        'locationName' => 'CacheBehavior',
      ],
    ],
    'CacheBehaviors' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'CacheBehaviorList',
        ],
      ],
    ],
    'CloudFrontOriginAccessIdentity' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'S3CanonicalUserId',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'S3CanonicalUserId' =>
        [
          'shape' => 'string',
        ],
        'CloudFrontOriginAccessIdentityConfig' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentityConfig',
        ],
      ],
    ],
    'CloudFrontOriginAccessIdentityAlreadyExists' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'CloudFrontOriginAccessIdentityConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CallerReference',
        1 => 'Comment',
      ],
      'members' =>
      [
        'CallerReference' =>
        [
          'shape' => 'string',
        ],
        'Comment' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'CloudFrontOriginAccessIdentityInUse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'CloudFrontOriginAccessIdentityList' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Marker',
        1 => 'MaxItems',
        2 => 'IsTruncated',
        3 => 'Quantity',
      ],
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'string',
        ],
        'NextMarker' =>
        [
          'shape' => 'string',
        ],
        'MaxItems' =>
        [
          'shape' => 'integer',
        ],
        'IsTruncated' =>
        [
          'shape' => 'boolean',
        ],
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentitySummaryList',
        ],
      ],
    ],
    'CloudFrontOriginAccessIdentitySummary' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'S3CanonicalUserId',
        2 => 'Comment',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'S3CanonicalUserId' =>
        [
          'shape' => 'string',
        ],
        'Comment' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'CloudFrontOriginAccessIdentitySummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'CloudFrontOriginAccessIdentitySummary',
        'locationName' => 'CloudFrontOriginAccessIdentitySummary',
      ],
    ],
    'CookieNameList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
        'locationName' => 'Name',
      ],
    ],
    'CookieNames' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'CookieNameList',
        ],
      ],
    ],
    'CookiePreference' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Forward',
      ],
      'members' =>
      [
        'Forward' =>
        [
          'shape' => 'ItemSelection',
        ],
        'WhitelistedNames' =>
        [
          'shape' => 'CookieNames',
        ],
      ],
    ],
    'CreateCloudFrontOriginAccessIdentityRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CloudFrontOriginAccessIdentityConfig',
      ],
      'members' =>
      [
        'CloudFrontOriginAccessIdentityConfig' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentityConfig',
          'xmlNamespace' =>
          [
            'uri' => 'http://cloudfront.amazonaws.com/doc/2014-05-31/',
          ],
          'locationName' => 'CloudFrontOriginAccessIdentityConfig',
        ],
      ],
      'payload' => 'CloudFrontOriginAccessIdentityConfig',
    ],
    'CreateCloudFrontOriginAccessIdentityResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CloudFrontOriginAccessIdentity' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentity',
        ],
        'Location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'CloudFrontOriginAccessIdentity',
    ],
    'CreateDistributionRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DistributionConfig',
      ],
      'members' =>
      [
        'DistributionConfig' =>
        [
          'shape' => 'DistributionConfig',
          'xmlNamespace' =>
          [
            'uri' => 'http://cloudfront.amazonaws.com/doc/2014-05-31/',
          ],
          'locationName' => 'DistributionConfig',
        ],
      ],
      'payload' => 'DistributionConfig',
    ],
    'CreateDistributionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Distribution' =>
        [
          'shape' => 'Distribution',
        ],
        'Location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'Distribution',
    ],
    'CreateInvalidationRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DistributionId',
        1 => 'InvalidationBatch',
      ],
      'members' =>
      [
        'DistributionId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'DistributionId',
        ],
        'InvalidationBatch' =>
        [
          'shape' => 'InvalidationBatch',
          'xmlNamespace' =>
          [
            'uri' => 'http://cloudfront.amazonaws.com/doc/2014-05-31/',
          ],
          'locationName' => 'InvalidationBatch',
        ],
      ],
      'payload' => 'InvalidationBatch',
    ],
    'CreateInvalidationResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
        'Invalidation' =>
        [
          'shape' => 'Invalidation',
        ],
      ],
      'payload' => 'Invalidation',
    ],
    'CreateStreamingDistributionRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamingDistributionConfig',
      ],
      'members' =>
      [
        'StreamingDistributionConfig' =>
        [
          'shape' => 'StreamingDistributionConfig',
          'xmlNamespace' =>
          [
            'uri' => 'http://cloudfront.amazonaws.com/doc/2014-05-31/',
          ],
          'locationName' => 'StreamingDistributionConfig',
        ],
      ],
      'payload' => 'StreamingDistributionConfig',
    ],
    'CreateStreamingDistributionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StreamingDistribution' =>
        [
          'shape' => 'StreamingDistribution',
        ],
        'Location' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'Location',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'StreamingDistribution',
    ],
    'CustomErrorResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ErrorCode',
      ],
      'members' =>
      [
        'ErrorCode' =>
        [
          'shape' => 'integer',
        ],
        'ResponsePagePath' =>
        [
          'shape' => 'string',
        ],
        'ResponseCode' =>
        [
          'shape' => 'string',
        ],
        'ErrorCachingMinTTL' =>
        [
          'shape' => 'long',
        ],
      ],
    ],
    'CustomErrorResponseList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'CustomErrorResponse',
        'locationName' => 'CustomErrorResponse',
      ],
    ],
    'CustomErrorResponses' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'CustomErrorResponseList',
        ],
      ],
    ],
    'CustomOriginConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HTTPPort',
        1 => 'HTTPSPort',
        2 => 'OriginProtocolPolicy',
      ],
      'members' =>
      [
        'HTTPPort' =>
        [
          'shape' => 'integer',
        ],
        'HTTPSPort' =>
        [
          'shape' => 'integer',
        ],
        'OriginProtocolPolicy' =>
        [
          'shape' => 'OriginProtocolPolicy',
        ],
      ],
    ],
    'DefaultCacheBehavior' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TargetOriginId',
        1 => 'ForwardedValues',
        2 => 'TrustedSigners',
        3 => 'ViewerProtocolPolicy',
        4 => 'MinTTL',
      ],
      'members' =>
      [
        'TargetOriginId' =>
        [
          'shape' => 'string',
        ],
        'ForwardedValues' =>
        [
          'shape' => 'ForwardedValues',
        ],
        'TrustedSigners' =>
        [
          'shape' => 'TrustedSigners',
        ],
        'ViewerProtocolPolicy' =>
        [
          'shape' => 'ViewerProtocolPolicy',
        ],
        'MinTTL' =>
        [
          'shape' => 'long',
        ],
        'AllowedMethods' =>
        [
          'shape' => 'AllowedMethods',
        ],
        'SmoothStreaming' =>
        [
          'shape' => 'boolean',
        ],
      ],
    ],
    'DeleteCloudFrontOriginAccessIdentityRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'IfMatch' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'If-Match',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'DeleteDistributionRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'IfMatch' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'If-Match',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'DeleteStreamingDistributionRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'IfMatch' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'If-Match',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'Distribution' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'Status',
        2 => 'LastModifiedTime',
        3 => 'InProgressInvalidationBatches',
        4 => 'DomainName',
        5 => 'ActiveTrustedSigners',
        6 => 'DistributionConfig',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'Status' =>
        [
          'shape' => 'string',
        ],
        'LastModifiedTime' =>
        [
          'shape' => 'timestamp',
        ],
        'InProgressInvalidationBatches' =>
        [
          'shape' => 'integer',
        ],
        'DomainName' =>
        [
          'shape' => 'string',
        ],
        'ActiveTrustedSigners' =>
        [
          'shape' => 'ActiveTrustedSigners',
        ],
        'DistributionConfig' =>
        [
          'shape' => 'DistributionConfig',
        ],
      ],
    ],
    'DistributionAlreadyExists' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'DistributionConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CallerReference',
        1 => 'Aliases',
        2 => 'DefaultRootObject',
        3 => 'Origins',
        4 => 'DefaultCacheBehavior',
        5 => 'CacheBehaviors',
        6 => 'Comment',
        7 => 'Logging',
        8 => 'PriceClass',
        9 => 'Enabled',
      ],
      'members' =>
      [
        'CallerReference' =>
        [
          'shape' => 'string',
        ],
        'Aliases' =>
        [
          'shape' => 'Aliases',
        ],
        'DefaultRootObject' =>
        [
          'shape' => 'string',
        ],
        'Origins' =>
        [
          'shape' => 'Origins',
        ],
        'DefaultCacheBehavior' =>
        [
          'shape' => 'DefaultCacheBehavior',
        ],
        'CacheBehaviors' =>
        [
          'shape' => 'CacheBehaviors',
        ],
        'CustomErrorResponses' =>
        [
          'shape' => 'CustomErrorResponses',
        ],
        'Comment' =>
        [
          'shape' => 'string',
        ],
        'Logging' =>
        [
          'shape' => 'LoggingConfig',
        ],
        'PriceClass' =>
        [
          'shape' => 'PriceClass',
        ],
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
        'ViewerCertificate' =>
        [
          'shape' => 'ViewerCertificate',
        ],
        'Restrictions' =>
        [
          'shape' => 'Restrictions',
        ],
      ],
    ],
    'DistributionList' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Marker',
        1 => 'MaxItems',
        2 => 'IsTruncated',
        3 => 'Quantity',
      ],
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'string',
        ],
        'NextMarker' =>
        [
          'shape' => 'string',
        ],
        'MaxItems' =>
        [
          'shape' => 'integer',
        ],
        'IsTruncated' =>
        [
          'shape' => 'boolean',
        ],
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'DistributionSummaryList',
        ],
      ],
    ],
    'DistributionNotDisabled' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'DistributionSummary' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'Status',
        2 => 'LastModifiedTime',
        3 => 'DomainName',
        4 => 'Aliases',
        5 => 'Origins',
        6 => 'DefaultCacheBehavior',
        7 => 'CacheBehaviors',
        8 => 'CustomErrorResponses',
        9 => 'Comment',
        10 => 'PriceClass',
        11 => 'Enabled',
        12 => 'ViewerCertificate',
        13 => 'Restrictions',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'Status' =>
        [
          'shape' => 'string',
        ],
        'LastModifiedTime' =>
        [
          'shape' => 'timestamp',
        ],
        'DomainName' =>
        [
          'shape' => 'string',
        ],
        'Aliases' =>
        [
          'shape' => 'Aliases',
        ],
        'Origins' =>
        [
          'shape' => 'Origins',
        ],
        'DefaultCacheBehavior' =>
        [
          'shape' => 'DefaultCacheBehavior',
        ],
        'CacheBehaviors' =>
        [
          'shape' => 'CacheBehaviors',
        ],
        'CustomErrorResponses' =>
        [
          'shape' => 'CustomErrorResponses',
        ],
        'Comment' =>
        [
          'shape' => 'string',
        ],
        'PriceClass' =>
        [
          'shape' => 'PriceClass',
        ],
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
        'ViewerCertificate' =>
        [
          'shape' => 'ViewerCertificate',
        ],
        'Restrictions' =>
        [
          'shape' => 'Restrictions',
        ],
      ],
    ],
    'DistributionSummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DistributionSummary',
        'locationName' => 'DistributionSummary',
      ],
    ],
    'ForwardedValues' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'QueryString',
        1 => 'Cookies',
      ],
      'members' =>
      [
        'QueryString' =>
        [
          'shape' => 'boolean',
        ],
        'Cookies' =>
        [
          'shape' => 'CookiePreference',
        ],
        'Headers' =>
        [
          'shape' => 'Headers',
        ],
      ],
    ],
    'GeoRestriction' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RestrictionType',
        1 => 'Quantity',
      ],
      'members' =>
      [
        'RestrictionType' =>
        [
          'shape' => 'GeoRestrictionType',
        ],
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'LocationList',
        ],
      ],
    ],
    'GeoRestrictionType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'blacklist',
        1 => 'whitelist',
        2 => 'none',
      ],
    ],
    'GetCloudFrontOriginAccessIdentityConfigRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'GetCloudFrontOriginAccessIdentityConfigResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CloudFrontOriginAccessIdentityConfig' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentityConfig',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'CloudFrontOriginAccessIdentityConfig',
    ],
    'GetCloudFrontOriginAccessIdentityRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'GetCloudFrontOriginAccessIdentityResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CloudFrontOriginAccessIdentity' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentity',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'CloudFrontOriginAccessIdentity',
    ],
    'GetDistributionConfigRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'GetDistributionConfigResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DistributionConfig' =>
        [
          'shape' => 'DistributionConfig',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'DistributionConfig',
    ],
    'GetDistributionRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'GetDistributionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Distribution' =>
        [
          'shape' => 'Distribution',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'Distribution',
    ],
    'GetInvalidationRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DistributionId',
        1 => 'Id',
      ],
      'members' =>
      [
        'DistributionId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'DistributionId',
        ],
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
    ],
    'GetInvalidationResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Invalidation' =>
        [
          'shape' => 'Invalidation',
        ],
      ],
      'payload' => 'Invalidation',
    ],
    'GetStreamingDistributionConfigRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'GetStreamingDistributionConfigResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StreamingDistributionConfig' =>
        [
          'shape' => 'StreamingDistributionConfig',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'StreamingDistributionConfig',
    ],
    'GetStreamingDistributionRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'required' =>
      [
        0 => 'Id',
      ],
    ],
    'GetStreamingDistributionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StreamingDistribution' =>
        [
          'shape' => 'StreamingDistribution',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'StreamingDistribution',
    ],
    'HeaderList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
        'locationName' => 'Name',
      ],
    ],
    'Headers' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'HeaderList',
        ],
      ],
    ],
    'IllegalUpdate' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InconsistentQuantities' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidArgument' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidDefaultRootObject' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidErrorCode' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidForwardCookies' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidGeoRestrictionParameter' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidHeadersForS3Origin' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidIfMatchVersion' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidLocationCode' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidOrigin' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidOriginAccessIdentity' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidRelativePath' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidRequiredProtocol' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidResponseCode' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidViewerCertificate' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'Invalidation' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'Status',
        2 => 'CreateTime',
        3 => 'InvalidationBatch',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'Status' =>
        [
          'shape' => 'string',
        ],
        'CreateTime' =>
        [
          'shape' => 'timestamp',
        ],
        'InvalidationBatch' =>
        [
          'shape' => 'InvalidationBatch',
        ],
      ],
    ],
    'InvalidationBatch' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Paths',
        1 => 'CallerReference',
      ],
      'members' =>
      [
        'Paths' =>
        [
          'shape' => 'Paths',
        ],
        'CallerReference' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'InvalidationList' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Marker',
        1 => 'MaxItems',
        2 => 'IsTruncated',
        3 => 'Quantity',
      ],
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'string',
        ],
        'NextMarker' =>
        [
          'shape' => 'string',
        ],
        'MaxItems' =>
        [
          'shape' => 'integer',
        ],
        'IsTruncated' =>
        [
          'shape' => 'boolean',
        ],
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'InvalidationSummaryList',
        ],
      ],
    ],
    'InvalidationSummary' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'CreateTime',
        2 => 'Status',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'CreateTime' =>
        [
          'shape' => 'timestamp',
        ],
        'Status' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'InvalidationSummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'InvalidationSummary',
        'locationName' => 'InvalidationSummary',
      ],
    ],
    'ItemSelection' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'none',
        1 => 'whitelist',
        2 => 'all',
      ],
    ],
    'KeyPairIdList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
        'locationName' => 'KeyPairId',
      ],
    ],
    'KeyPairIds' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'KeyPairIdList',
        ],
      ],
    ],
    'ListCloudFrontOriginAccessIdentitiesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'Marker',
        ],
        'MaxItems' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'MaxItems',
        ],
      ],
    ],
    'ListCloudFrontOriginAccessIdentitiesResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CloudFrontOriginAccessIdentityList' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentityList',
        ],
      ],
      'payload' => 'CloudFrontOriginAccessIdentityList',
    ],
    'ListDistributionsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'Marker',
        ],
        'MaxItems' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'MaxItems',
        ],
      ],
    ],
    'ListDistributionsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'DistributionList' =>
        [
          'shape' => 'DistributionList',
        ],
      ],
      'payload' => 'DistributionList',
    ],
    'ListInvalidationsRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DistributionId',
      ],
      'members' =>
      [
        'DistributionId' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'DistributionId',
        ],
        'Marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'Marker',
        ],
        'MaxItems' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'MaxItems',
        ],
      ],
    ],
    'ListInvalidationsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'InvalidationList' =>
        [
          'shape' => 'InvalidationList',
        ],
      ],
      'payload' => 'InvalidationList',
    ],
    'ListStreamingDistributionsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'Marker',
        ],
        'MaxItems' =>
        [
          'shape' => 'string',
          'location' => 'querystring',
          'locationName' => 'MaxItems',
        ],
      ],
    ],
    'ListStreamingDistributionsResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StreamingDistributionList' =>
        [
          'shape' => 'StreamingDistributionList',
        ],
      ],
      'payload' => 'StreamingDistributionList',
    ],
    'LocationList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
        'locationName' => 'Location',
      ],
    ],
    'LoggingConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Enabled',
        1 => 'IncludeCookies',
        2 => 'Bucket',
        3 => 'Prefix',
      ],
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
        'IncludeCookies' =>
        [
          'shape' => 'boolean',
        ],
        'Bucket' =>
        [
          'shape' => 'string',
        ],
        'Prefix' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'Method' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'OPTIONS',
        6 => 'DELETE',
      ],
    ],
    'MissingBody' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'NoSuchCloudFrontOriginAccessIdentity' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchDistribution' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchInvalidation' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchOrigin' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchStreamingDistribution' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'Origin' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'DomainName',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'DomainName' =>
        [
          'shape' => 'string',
        ],
        'S3OriginConfig' =>
        [
          'shape' => 'S3OriginConfig',
        ],
        'CustomOriginConfig' =>
        [
          'shape' => 'CustomOriginConfig',
        ],
      ],
    ],
    'OriginList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Origin',
        'locationName' => 'Origin',
      ],
      'min' => 1,
    ],
    'OriginProtocolPolicy' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'http-only',
        1 => 'match-viewer',
      ],
    ],
    'Origins' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'OriginList',
        ],
      ],
    ],
    'PathList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'string',
        'locationName' => 'Path',
      ],
    ],
    'Paths' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Quantity',
      ],
      'members' =>
      [
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'PathList',
        ],
      ],
    ],
    'PreconditionFailed' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 412,
      ],
      'exception' => true,
    ],
    'PriceClass' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'PriceClass_100',
        1 => 'PriceClass_200',
        2 => 'PriceClass_All',
      ],
    ],
    'Restrictions' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GeoRestriction',
      ],
      'members' =>
      [
        'GeoRestriction' =>
        [
          'shape' => 'GeoRestriction',
        ],
      ],
    ],
    'S3Origin' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
        1 => 'OriginAccessIdentity',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'string',
        ],
        'OriginAccessIdentity' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'S3OriginConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OriginAccessIdentity',
      ],
      'members' =>
      [
        'OriginAccessIdentity' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'SSLSupportMethod' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'sni-only',
        1 => 'vip',
      ],
    ],
    'Signer' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AwsAccountNumber' =>
        [
          'shape' => 'string',
        ],
        'KeyPairIds' =>
        [
          'shape' => 'KeyPairIds',
        ],
      ],
    ],
    'SignerList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Signer',
        'locationName' => 'Signer',
      ],
    ],
    'StreamingDistribution' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'Status',
        2 => 'DomainName',
        3 => 'ActiveTrustedSigners',
        4 => 'StreamingDistributionConfig',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'Status' =>
        [
          'shape' => 'string',
        ],
        'LastModifiedTime' =>
        [
          'shape' => 'timestamp',
        ],
        'DomainName' =>
        [
          'shape' => 'string',
        ],
        'ActiveTrustedSigners' =>
        [
          'shape' => 'ActiveTrustedSigners',
        ],
        'StreamingDistributionConfig' =>
        [
          'shape' => 'StreamingDistributionConfig',
        ],
      ],
    ],
    'StreamingDistributionAlreadyExists' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'StreamingDistributionConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CallerReference',
        1 => 'S3Origin',
        2 => 'Aliases',
        3 => 'Comment',
        4 => 'Logging',
        5 => 'TrustedSigners',
        6 => 'PriceClass',
        7 => 'Enabled',
      ],
      'members' =>
      [
        'CallerReference' =>
        [
          'shape' => 'string',
        ],
        'S3Origin' =>
        [
          'shape' => 'S3Origin',
        ],
        'Aliases' =>
        [
          'shape' => 'Aliases',
        ],
        'Comment' =>
        [
          'shape' => 'string',
        ],
        'Logging' =>
        [
          'shape' => 'StreamingLoggingConfig',
        ],
        'TrustedSigners' =>
        [
          'shape' => 'TrustedSigners',
        ],
        'PriceClass' =>
        [
          'shape' => 'PriceClass',
        ],
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
      ],
    ],
    'StreamingDistributionList' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Marker',
        1 => 'MaxItems',
        2 => 'IsTruncated',
        3 => 'Quantity',
      ],
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'string',
        ],
        'NextMarker' =>
        [
          'shape' => 'string',
        ],
        'MaxItems' =>
        [
          'shape' => 'integer',
        ],
        'IsTruncated' =>
        [
          'shape' => 'boolean',
        ],
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'StreamingDistributionSummaryList',
        ],
      ],
    ],
    'StreamingDistributionNotDisabled' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'StreamingDistributionSummary' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'Status',
        2 => 'LastModifiedTime',
        3 => 'DomainName',
        4 => 'S3Origin',
        5 => 'Aliases',
        6 => 'TrustedSigners',
        7 => 'Comment',
        8 => 'PriceClass',
        9 => 'Enabled',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'string',
        ],
        'Status' =>
        [
          'shape' => 'string',
        ],
        'LastModifiedTime' =>
        [
          'shape' => 'timestamp',
        ],
        'DomainName' =>
        [
          'shape' => 'string',
        ],
        'S3Origin' =>
        [
          'shape' => 'S3Origin',
        ],
        'Aliases' =>
        [
          'shape' => 'Aliases',
        ],
        'TrustedSigners' =>
        [
          'shape' => 'TrustedSigners',
        ],
        'Comment' =>
        [
          'shape' => 'string',
        ],
        'PriceClass' =>
        [
          'shape' => 'PriceClass',
        ],
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
      ],
    ],
    'StreamingDistributionSummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'StreamingDistributionSummary',
        'locationName' => 'StreamingDistributionSummary',
      ],
    ],
    'StreamingLoggingConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Enabled',
        1 => 'Bucket',
        2 => 'Prefix',
      ],
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
        'Bucket' =>
        [
          'shape' => 'string',
        ],
        'Prefix' =>
        [
          'shape' => 'string',
        ],
      ],
    ],
    'TooManyCacheBehaviors' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyCertificates' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyCloudFrontOriginAccessIdentities' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyCookieNamesInWhiteList' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyDistributionCNAMEs' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyDistributions' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyHeadersInForwardedValues' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyInvalidationsInProgress' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyOrigins' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyStreamingDistributionCNAMEs' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyStreamingDistributions' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TooManyTrustedSigners' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TrustedSignerDoesNotExist' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Message' =>
        [
          'shape' => 'string',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TrustedSigners' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Enabled',
        1 => 'Quantity',
      ],
      'members' =>
      [
        'Enabled' =>
        [
          'shape' => 'boolean',
        ],
        'Quantity' =>
        [
          'shape' => 'integer',
        ],
        'Items' =>
        [
          'shape' => 'AwsAccountNumberList',
        ],
      ],
    ],
    'UpdateCloudFrontOriginAccessIdentityRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CloudFrontOriginAccessIdentityConfig',
        1 => 'Id',
      ],
      'members' =>
      [
        'CloudFrontOriginAccessIdentityConfig' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentityConfig',
          'xmlNamespace' =>
          [
            'uri' => 'http://cloudfront.amazonaws.com/doc/2014-05-31/',
          ],
          'locationName' => 'CloudFrontOriginAccessIdentityConfig',
        ],
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'IfMatch' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'If-Match',
        ],
      ],
      'payload' => 'CloudFrontOriginAccessIdentityConfig',
    ],
    'UpdateCloudFrontOriginAccessIdentityResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CloudFrontOriginAccessIdentity' =>
        [
          'shape' => 'CloudFrontOriginAccessIdentity',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'CloudFrontOriginAccessIdentity',
    ],
    'UpdateDistributionRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DistributionConfig',
        1 => 'Id',
      ],
      'members' =>
      [
        'DistributionConfig' =>
        [
          'shape' => 'DistributionConfig',
          'xmlNamespace' =>
          [
            'uri' => 'http://cloudfront.amazonaws.com/doc/2014-05-31/',
          ],
          'locationName' => 'DistributionConfig',
        ],
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'IfMatch' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'If-Match',
        ],
      ],
      'payload' => 'DistributionConfig',
    ],
    'UpdateDistributionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Distribution' =>
        [
          'shape' => 'Distribution',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'Distribution',
    ],
    'UpdateStreamingDistributionRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamingDistributionConfig',
        1 => 'Id',
      ],
      'members' =>
      [
        'StreamingDistributionConfig' =>
        [
          'shape' => 'StreamingDistributionConfig',
          'xmlNamespace' =>
          [
            'uri' => 'http://cloudfront.amazonaws.com/doc/2014-05-31/',
          ],
          'locationName' => 'StreamingDistributionConfig',
        ],
        'Id' =>
        [
          'shape' => 'string',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'IfMatch' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'If-Match',
        ],
      ],
      'payload' => 'StreamingDistributionConfig',
    ],
    'UpdateStreamingDistributionResult' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StreamingDistribution' =>
        [
          'shape' => 'StreamingDistribution',
        ],
        'ETag' =>
        [
          'shape' => 'string',
          'location' => 'header',
          'locationName' => 'ETag',
        ],
      ],
      'payload' => 'StreamingDistribution',
    ],
    'ViewerCertificate' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IAMCertificateId' =>
        [
          'shape' => 'string',
        ],
        'CloudFrontDefaultCertificate' =>
        [
          'shape' => 'boolean',
        ],
        'SSLSupportMethod' =>
        [
          'shape' => 'SSLSupportMethod',
        ],
      ],
    ],
    'ViewerProtocolPolicy' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'allow-all',
        1 => 'https-only',
        2 => 'redirect-to-https',
      ],
    ],
    'boolean' =>
    [
      'type' => 'boolean',
    ],
    'integer' =>
    [
      'type' => 'integer',
    ],
    'long' =>
    [
      'type' => 'long',
    ],
    'string' =>
    [
      'type' => 'string',
    ],
    'timestamp' =>
    [
      'type' => 'timestamp',
    ],
  ],
];