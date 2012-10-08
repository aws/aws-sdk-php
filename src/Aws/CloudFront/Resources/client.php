<?php
return array (
    'name' => 'cloudfront',
    'apiVersion' => '2012-05-05',
    'operations' => array(
        'CreateCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '2012-05-05/origin-access-identity/cloudfront',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateCloudFrontOriginAccessIdentityResult',
            'responseType' => 'model',
            'data' => array(
                'root' => 'CloudFrontOriginAccessIdentityConfig',
                'ns' => 'http://cloudfront.amazonaws.com/doc/2012-05-05/',
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'CloudFrontOriginAccessIdentityAlreadyExistsException',
                ),
                array(
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'TooManyCloudFrontOriginAccessIdentitiesException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'CreateDistribution' => array(
            'httpMethod' => 'POST',
            'uri' => '2012-05-05/distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'root' => 'DistributionConfig',
                'ns' => 'http://cloudfront.amazonaws.com/doc/2012-05-05/',
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'DefaultRootObject' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Origins' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => array(
                                'name' => 'Origin',
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'DomainName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'S3OriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'OriginAccessIdentity' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'CustomOriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HTTPPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'HTTPSPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'OriginProtocolPolicy' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'enum' => array(
                                                    'http-only',
                                                    'match-viewer',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DefaultCacheBehavior' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetOriginId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'ForwardedValues' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'QueryString' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ViewerProtocolPolicy' => array(
                            'required' => true,
                            'type' => 'string',
                            'enum' => array(
                                'allow-all',
                                'https-only',
                            ),
                        ),
                        'MinTTL' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'CacheBehaviors' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheBehavior',
                                'type' => 'object',
                                'properties' => array(
                                    'PathPattern' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'TargetOriginId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                            'Quantity' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'enum' => array(
                                            'allow-all',
                                            'https-only',
                                        ),
                                    ),
                                    'MinTTL' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'class' => 'DistributionAlreadyExistsException',
                ),
                array(
                    'class' => 'InvalidOriginException',
                ),
                array(
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'TooManyDistributionCNAMEsException',
                ),
                array(
                    'class' => 'TooManyDistributionsException',
                ),
                array(
                    'class' => 'InvalidDefaultRootObjectException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'InvalidRequiredProtocolException',
                ),
                array(
                    'class' => 'NoSuchOriginException',
                ),
                array(
                    'class' => 'TooManyOriginsException',
                ),
                array(
                    'class' => 'TooManyCacheBehaviorsException',
                ),
                array(
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'CreateInvalidation' => array(
            'httpMethod' => 'POST',
            'uri' => '2012-05-05/distribution/{DistributionId}/invalidation',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateInvalidationResult',
            'responseType' => 'model',
            'data' => array(
                'root' => 'InvalidationBatch',
                'ns' => 'http://cloudfront.amazonaws.com/doc/2012-05-05/',
            ),
            'parameters' => array(
                'DistributionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Paths' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Path',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'class' => 'BatchTooLargeException',
                ),
                array(
                    'class' => 'TooManyInvalidationsInProgressException',
                ),
                array(
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'CreateStreamingDistribution' => array(
            'httpMethod' => 'POST',
            'uri' => '2012-05-05/streaming-distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateStreamingDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'root' => 'StreamingDistributionConfig',
                'ns' => 'http://cloudfront.amazonaws.com/doc/2012-05-05/',
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3Origin' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainName' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'OriginAccessIdentity' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'TrustedSigners' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AwsAccountNumber',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'class' => 'StreamingDistributionAlreadyExistsException',
                ),
                array(
                    'class' => 'InvalidOriginException',
                ),
                array(
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'TooManyStreamingDistributionCNAMEsException',
                ),
                array(
                    'class' => 'TooManyStreamingDistributionsException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'DeleteCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'DELETE',
            'uri' => '2012-05-05/origin-access-identity/cloudfront/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'responseNotes' => 'The result of this operation will be an empty array',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'class' => 'CloudFrontOriginAccessIdentityInUseException',
                ),
            ),
        ),
        'DeleteDistribution' => array(
            'httpMethod' => 'DELETE',
            'uri' => '2012-05-05/distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'responseNotes' => 'The result of this operation will be an empty array',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'DistributionNotDisabledException',
                ),
                array(
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'class' => 'PreconditionFailedException',
                ),
            ),
        ),
        'DeleteStreamingDistribution' => array(
            'httpMethod' => 'DELETE',
            'uri' => '2012-05-05/streaming-distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'array',
            'responseType' => 'primitive',
            'responseNotes' => 'The result of this operation will be an empty array',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'StreamingDistributionNotDisabledException',
                ),
                array(
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'class' => 'PreconditionFailedException',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/origin-access-identity/cloudfront/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetCloudFrontOriginAccessIdentityResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentityConfig' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/origin-access-identity/cloudfront/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetCloudFrontOriginAccessIdentityConfigResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetDistribution' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetDistributionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetDistributionConfig' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetDistributionConfigResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetInvalidation' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/distribution/{DistributionId}/invalidation/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetInvalidationResult',
            'responseType' => 'model',
            'parameters' => array(
                'DistributionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchInvalidationException',
                ),
                array(
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetStreamingDistribution' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/streaming-distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetStreamingDistributionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetStreamingDistributionConfig' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/streaming-distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetStreamingDistributionConfigResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'ListCloudFrontOriginAccessIdentities' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/origin-access-identity/cloudfront',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListCloudFrontOriginAccessIdentitiesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidArgumentException',
                ),
            ),
        ),
        'ListDistributions' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListDistributionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidArgumentException',
                ),
            ),
        ),
        'ListInvalidations' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/distribution/{DistributionId}/invalidation',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListInvalidationsResult',
            'responseType' => 'model',
            'parameters' => array(
                'DistributionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'NoSuchDistributionException',
                ),
            ),
        ),
        'ListStreamingDistributions' => array(
            'httpMethod' => 'GET',
            'uri' => '2012-05-05/streaming-distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListStreamingDistributionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidArgumentException',
                ),
            ),
        ),
        'UpdateCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'PUT',
            'uri' => '2012-05-05/origin-access-identity/cloudfront/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateCloudFrontOriginAccessIdentityResult',
            'responseType' => 'model',
            'data' => array(
                'root' => 'CloudFrontOriginAccessIdentityConfig',
                'ns' => 'http://cloudfront.amazonaws.com/doc/2012-05-05/',
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'IllegalUpdateException',
                ),
                array(
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'UpdateDistribution' => array(
            'httpMethod' => 'PUT',
            'uri' => '2012-05-05/distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'root' => 'DistributionConfig',
                'ns' => 'http://cloudfront.amazonaws.com/doc/2012-05-05/',
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'DefaultRootObject' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Origins' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => array(
                                'name' => 'Origin',
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'DomainName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'S3OriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'OriginAccessIdentity' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'CustomOriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HTTPPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'HTTPSPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'OriginProtocolPolicy' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'enum' => array(
                                                    'http-only',
                                                    'match-viewer',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DefaultCacheBehavior' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetOriginId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'ForwardedValues' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'QueryString' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ViewerProtocolPolicy' => array(
                            'required' => true,
                            'type' => 'string',
                            'enum' => array(
                                'allow-all',
                                'https-only',
                            ),
                        ),
                        'MinTTL' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'CacheBehaviors' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheBehavior',
                                'type' => 'object',
                                'properties' => array(
                                    'PathPattern' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'TargetOriginId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                            'Quantity' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'enum' => array(
                                            'allow-all',
                                            'https-only',
                                        ),
                                    ),
                                    'MinTTL' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'class' => 'IllegalUpdateException',
                ),
                array(
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'class' => 'TooManyDistributionCNAMEsException',
                ),
                array(
                    'class' => 'InvalidDefaultRootObjectException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'class' => 'InvalidRequiredProtocolException',
                ),
                array(
                    'class' => 'NoSuchOriginException',
                ),
                array(
                    'class' => 'TooManyOriginsException',
                ),
                array(
                    'class' => 'TooManyCacheBehaviorsException',
                ),
                array(
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'UpdateStreamingDistribution' => array(
            'httpMethod' => 'PUT',
            'uri' => '2012-05-05/streaming-distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateStreamingDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'root' => 'StreamingDistributionConfig',
                'ns' => 'http://cloudfront.amazonaws.com/doc/2012-05-05/',
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3Origin' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainName' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'OriginAccessIdentity' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'TrustedSigners' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AwsAccountNumber',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'class' => 'IllegalUpdateException',
                ),
                array(
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'class' => 'TooManyStreamingDistributionCNAMEsException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateCloudFrontOriginAccessIdentityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3CanonicalUserId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CloudFrontOriginAccessIdentityConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'CreateDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InProgressInvalidationBatches' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'DefaultRootObject' => array(
                            'type' => 'string',
                        ),
                        'Origins' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Origin',
                                        'type' => 'object',
                                        'sentAs' => 'Origin',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'DomainName' => array(
                                                'type' => 'string',
                                            ),
                                            'S3OriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'OriginAccessIdentity' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'CustomOriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HTTPPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'HTTPSPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'OriginProtocolPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'DefaultCacheBehavior' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TargetOriginId' => array(
                                    'type' => 'string',
                                ),
                                'ForwardedValues' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'QueryString' => array(
                                            'type' => 'boolean',
                                            'filters' => array(
                                                'Aws\\Common\\Command\\Filters::booleanString',
                                            ),
                                        ),
                                    ),
                                ),
                                'TrustedSigners' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Enabled' => array(
                                            'type' => 'boolean',
                                            'filters' => array(
                                                'Aws\\Common\\Command\\Filters::booleanString',
                                            ),
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'AwsAccountNumber',
                                                'type' => 'string',
                                                'sentAs' => 'AwsAccountNumber',
                                            ),
                                        ),
                                    ),
                                ),
                                'ViewerProtocolPolicy' => array(
                                    'type' => 'string',
                                ),
                                'MinTTL' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'CacheBehaviors' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheBehavior',
                                        'type' => 'object',
                                        'sentAs' => 'CacheBehavior',
                                        'properties' => array(
                                            'PathPattern' => array(
                                                'type' => 'string',
                                            ),
                                            'TargetOriginId' => array(
                                                'type' => 'string',
                                            ),
                                            'ForwardedValues' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'QueryString' => array(
                                                        'type' => 'boolean',
                                                        'filters' => array(
                                                            'Aws\\Common\\Command\\Filters::booleanString',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'TrustedSigners' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Enabled' => array(
                                                        'type' => 'boolean',
                                                        'filters' => array(
                                                            'Aws\\Common\\Command\\Filters::booleanString',
                                                        ),
                                                    ),
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'AwsAccountNumber',
                                                            'type' => 'string',
                                                            'sentAs' => 'AwsAccountNumber',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'ViewerProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'MinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'CreateInvalidationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CreateTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InvalidationBatch' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Paths' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Path',
                                        'type' => 'string',
                                        'sentAs' => 'Path',
                                    ),
                                ),
                            ),
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateStreamingDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'StreamingDistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'S3Origin' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DomainName' => array(
                                    'type' => 'string',
                                ),
                                'OriginAccessIdentity' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3CanonicalUserId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CloudFrontOriginAccessIdentityConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentityConfigResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CallerReference' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'GetDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InProgressInvalidationBatches' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'DefaultRootObject' => array(
                            'type' => 'string',
                        ),
                        'Origins' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Origin',
                                        'type' => 'object',
                                        'sentAs' => 'Origin',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'DomainName' => array(
                                                'type' => 'string',
                                            ),
                                            'S3OriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'OriginAccessIdentity' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'CustomOriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HTTPPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'HTTPSPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'OriginProtocolPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'DefaultCacheBehavior' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TargetOriginId' => array(
                                    'type' => 'string',
                                ),
                                'ForwardedValues' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'QueryString' => array(
                                            'type' => 'boolean',
                                            'filters' => array(
                                                'Aws\\Common\\Command\\Filters::booleanString',
                                            ),
                                        ),
                                    ),
                                ),
                                'TrustedSigners' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Enabled' => array(
                                            'type' => 'boolean',
                                            'filters' => array(
                                                'Aws\\Common\\Command\\Filters::booleanString',
                                            ),
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'AwsAccountNumber',
                                                'type' => 'string',
                                                'sentAs' => 'AwsAccountNumber',
                                            ),
                                        ),
                                    ),
                                ),
                                'ViewerProtocolPolicy' => array(
                                    'type' => 'string',
                                ),
                                'MinTTL' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'CacheBehaviors' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheBehavior',
                                        'type' => 'object',
                                        'sentAs' => 'CacheBehavior',
                                        'properties' => array(
                                            'PathPattern' => array(
                                                'type' => 'string',
                                            ),
                                            'TargetOriginId' => array(
                                                'type' => 'string',
                                            ),
                                            'ForwardedValues' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'QueryString' => array(
                                                        'type' => 'boolean',
                                                        'filters' => array(
                                                            'Aws\\Common\\Command\\Filters::booleanString',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'TrustedSigners' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Enabled' => array(
                                                        'type' => 'boolean',
                                                        'filters' => array(
                                                            'Aws\\Common\\Command\\Filters::booleanString',
                                                        ),
                                                    ),
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'AwsAccountNumber',
                                                            'type' => 'string',
                                                            'sentAs' => 'AwsAccountNumber',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'ViewerProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'MinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'GetDistributionConfigResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CallerReference' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Aliases' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                                'sentAs' => 'CNAME',
                            ),
                        ),
                    ),
                ),
                'DefaultRootObject' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Origins' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Origin',
                                'type' => 'object',
                                'sentAs' => 'Origin',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                    ),
                                    'DomainName' => array(
                                        'type' => 'string',
                                    ),
                                    'S3OriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'OriginAccessIdentity' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'CustomOriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HTTPPort' => array(
                                                'type' => 'numeric',
                                            ),
                                            'HTTPSPort' => array(
                                                'type' => 'numeric',
                                            ),
                                            'OriginProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DefaultCacheBehavior' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetOriginId' => array(
                            'type' => 'string',
                        ),
                        'ForwardedValues' => array(
                            'type' => 'object',
                            'properties' => array(
                                'QueryString' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'ViewerProtocolPolicy' => array(
                            'type' => 'string',
                        ),
                        'MinTTL' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'CacheBehaviors' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheBehavior',
                                'type' => 'object',
                                'sentAs' => 'CacheBehavior',
                                'properties' => array(
                                    'PathPattern' => array(
                                        'type' => 'string',
                                    ),
                                    'TargetOriginId' => array(
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                    'sentAs' => 'AwsAccountNumber',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'MinTTL' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'GetInvalidationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CreateTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InvalidationBatch' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Paths' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Path',
                                        'type' => 'string',
                                        'sentAs' => 'Path',
                                    ),
                                ),
                            ),
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetStreamingDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'StreamingDistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'S3Origin' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DomainName' => array(
                                    'type' => 'string',
                                ),
                                'OriginAccessIdentity' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'GetStreamingDistributionConfigResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CallerReference' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3Origin' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainName' => array(
                            'type' => 'string',
                        ),
                        'OriginAccessIdentity' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Aliases' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                                'sentAs' => 'CNAME',
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'TrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AwsAccountNumber',
                                'type' => 'string',
                                'sentAs' => 'AwsAccountNumber',
                            ),
                        ),
                    ),
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'ListCloudFrontOriginAccessIdentitiesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CloudFrontOriginAccessIdentitySummary',
                        'type' => 'object',
                        'sentAs' => 'CloudFrontOriginAccessIdentitySummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'S3CanonicalUserId' => array(
                                'type' => 'string',
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListDistributionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DistributionSummary',
                        'type' => 'object',
                        'sentAs' => 'DistributionSummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedTime' => array(
                                'type' => 'string',
                            ),
                            'DomainName' => array(
                                'type' => 'string',
                            ),
                            'Aliases' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CNAME',
                                            'type' => 'string',
                                            'sentAs' => 'CNAME',
                                        ),
                                    ),
                                ),
                            ),
                            'Origins' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Origin',
                                            'type' => 'object',
                                            'sentAs' => 'Origin',
                                            'properties' => array(
                                                'Id' => array(
                                                    'type' => 'string',
                                                ),
                                                'DomainName' => array(
                                                    'type' => 'string',
                                                ),
                                                'S3OriginConfig' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'OriginAccessIdentity' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                                'CustomOriginConfig' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'HTTPPort' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'HTTPSPort' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'OriginProtocolPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'DefaultCacheBehavior' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'TargetOriginId' => array(
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'type' => 'boolean',
                                                'filters' => array(
                                                    'Aws\\Common\\Command\\Filters::booleanString',
                                                ),
                                            ),
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                    'sentAs' => 'AwsAccountNumber',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'MinTTL' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'CacheBehaviors' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheBehavior',
                                            'type' => 'object',
                                            'sentAs' => 'CacheBehavior',
                                            'properties' => array(
                                                'PathPattern' => array(
                                                    'type' => 'string',
                                                ),
                                                'TargetOriginId' => array(
                                                    'type' => 'string',
                                                ),
                                                'ForwardedValues' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'QueryString' => array(
                                                            'type' => 'boolean',
                                                            'filters' => array(
                                                                'Aws\\Common\\Command\\Filters::booleanString',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'TrustedSigners' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Enabled' => array(
                                                            'type' => 'boolean',
                                                            'filters' => array(
                                                                'Aws\\Common\\Command\\Filters::booleanString',
                                                            ),
                                                        ),
                                                        'Quantity' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'Items' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'AwsAccountNumber',
                                                                'type' => 'string',
                                                                'sentAs' => 'AwsAccountNumber',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'ViewerProtocolPolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'MinTTL' => array(
                                                    'type' => 'numeric',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                                'filters' => array(
                                    'Aws\\Common\\Command\\Filters::booleanString',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListInvalidationsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'InvalidationSummary',
                        'type' => 'object',
                        'sentAs' => 'InvalidationSummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListStreamingDistributionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'StreamingDistributionSummary',
                        'type' => 'object',
                        'sentAs' => 'StreamingDistributionSummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedTime' => array(
                                'type' => 'string',
                            ),
                            'DomainName' => array(
                                'type' => 'string',
                            ),
                            'S3Origin' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DomainName' => array(
                                        'type' => 'string',
                                    ),
                                    'OriginAccessIdentity' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Aliases' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CNAME',
                                            'type' => 'string',
                                            'sentAs' => 'CNAME',
                                        ),
                                    ),
                                ),
                            ),
                            'TrustedSigners' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Enabled' => array(
                                        'type' => 'boolean',
                                        'filters' => array(
                                            'Aws\\Common\\Command\\Filters::booleanString',
                                        ),
                                    ),
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'AwsAccountNumber',
                                            'type' => 'string',
                                            'sentAs' => 'AwsAccountNumber',
                                        ),
                                    ),
                                ),
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                                'filters' => array(
                                    'Aws\\Common\\Command\\Filters::booleanString',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateCloudFrontOriginAccessIdentityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3CanonicalUserId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CloudFrontOriginAccessIdentityConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'UpdateDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InProgressInvalidationBatches' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'DefaultRootObject' => array(
                            'type' => 'string',
                        ),
                        'Origins' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Origin',
                                        'type' => 'object',
                                        'sentAs' => 'Origin',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'DomainName' => array(
                                                'type' => 'string',
                                            ),
                                            'S3OriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'OriginAccessIdentity' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'CustomOriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HTTPPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'HTTPSPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'OriginProtocolPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'DefaultCacheBehavior' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TargetOriginId' => array(
                                    'type' => 'string',
                                ),
                                'ForwardedValues' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'QueryString' => array(
                                            'type' => 'boolean',
                                            'filters' => array(
                                                'Aws\\Common\\Command\\Filters::booleanString',
                                            ),
                                        ),
                                    ),
                                ),
                                'TrustedSigners' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Enabled' => array(
                                            'type' => 'boolean',
                                            'filters' => array(
                                                'Aws\\Common\\Command\\Filters::booleanString',
                                            ),
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'AwsAccountNumber',
                                                'type' => 'string',
                                                'sentAs' => 'AwsAccountNumber',
                                            ),
                                        ),
                                    ),
                                ),
                                'ViewerProtocolPolicy' => array(
                                    'type' => 'string',
                                ),
                                'MinTTL' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'CacheBehaviors' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheBehavior',
                                        'type' => 'object',
                                        'sentAs' => 'CacheBehavior',
                                        'properties' => array(
                                            'PathPattern' => array(
                                                'type' => 'string',
                                            ),
                                            'TargetOriginId' => array(
                                                'type' => 'string',
                                            ),
                                            'ForwardedValues' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'QueryString' => array(
                                                        'type' => 'boolean',
                                                        'filters' => array(
                                                            'Aws\\Common\\Command\\Filters::booleanString',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'TrustedSigners' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Enabled' => array(
                                                        'type' => 'boolean',
                                                        'filters' => array(
                                                            'Aws\\Common\\Command\\Filters::booleanString',
                                                        ),
                                                    ),
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'AwsAccountNumber',
                                                            'type' => 'string',
                                                            'sentAs' => 'AwsAccountNumber',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'ViewerProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'MinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
        'UpdateStreamingDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'StreamingDistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'S3Origin' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DomainName' => array(
                                    'type' => 'string',
                                ),
                                'OriginAccessIdentity' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'filters' => array(
                                        'Aws\\Common\\Command\\Filters::booleanString',
                                    ),
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                            'filters' => array(
                                'Aws\\Common\\Command\\Filters::booleanString',
                            ),
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
            ),
        ),
    ),
);
