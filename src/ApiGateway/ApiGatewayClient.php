<?php
namespace Aws\ApiGateway;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **AWS API Gateway** service.
 *
 * @method \Aws\Result createApiKey(array $args = [])
 * @phpstan-method \Aws\Result createApiKey(array{
 *     name?: string,
 *     description?: string,
 *     enabled?: bool,
 *     generateDistinctId?: bool,
 *     value?: string,
 *     stageKeys?: list<array{restApiId?: string, stageName?: string, ...}>,
 *     customerId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiKeyAsync(array{
 *     name?: string,
 *     description?: string,
 *     enabled?: bool,
 *     generateDistinctId?: bool,
 *     value?: string,
 *     stageKeys?: list<array{restApiId?: string, stageName?: string, ...}>,
 *     customerId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result createAuthorizer(array{
 *     restApiId?: string,
 *     name?: string,
 *     type?: 'COGNITO_USER_POOLS'|'REQUEST'|'TOKEN',
 *     providerARNs?: list<string>,
 *     authType?: string,
 *     authorizerUri?: string,
 *     authorizerCredentials?: string,
 *     identitySource?: string,
 *     identityValidationExpression?: string,
 *     authorizerResultTtlInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAuthorizerAsync(array{
 *     restApiId?: string,
 *     name?: string,
 *     type?: 'COGNITO_USER_POOLS'|'REQUEST'|'TOKEN',
 *     providerARNs?: list<string>,
 *     authType?: string,
 *     authorizerUri?: string,
 *     authorizerCredentials?: string,
 *     identitySource?: string,
 *     identityValidationExpression?: string,
 *     authorizerResultTtlInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBasePathMapping(array $args = [])
 * @phpstan-method \Aws\Result createBasePathMapping(array{domainName?: string, domainNameId?: string, basePath?: string, restApiId?: string, stage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBasePathMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBasePathMappingAsync(array{domainName?: string, domainNameId?: string, basePath?: string, restApiId?: string, stage?: string, ...} $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     stageDescription?: string,
 *     description?: string,
 *     cacheClusterEnabled?: bool,
 *     cacheClusterSize?: '0.5'|'1.6'|'118'|'13.5'|'237'|'28.4'|'58.2'|'6.1',
 *     variables?: array<string, string>,
 *     canarySettings?: array{percentTraffic?: float, stageVariableOverrides?: array<string, string>, useStageCache?: bool, ...},
 *     tracingEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     stageDescription?: string,
 *     description?: string,
 *     cacheClusterEnabled?: bool,
 *     cacheClusterSize?: '0.5'|'1.6'|'118'|'13.5'|'237'|'28.4'|'58.2'|'6.1',
 *     variables?: array<string, string>,
 *     canarySettings?: array{percentTraffic?: float, stageVariableOverrides?: array<string, string>, useStageCache?: bool, ...},
 *     tracingEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDocumentationPart(array $args = [])
 * @phpstan-method \Aws\Result createDocumentationPart(array{
 *     restApiId?: string,
 *     location?: array{
 *         type?: 'API'|'AUTHORIZER'|'METHOD'|'MODEL'|'PATH_PARAMETER'|'QUERY_PARAMETER'|'REQUEST_BODY'|'REQUEST_HEADER'|'RESOURCE'|'RESPONSE'|'RESPONSE_BODY'|'RESPONSE_HEADER',
 *         path?: string,
 *         method?: string,
 *         statusCode?: string,
 *         name?: string,
 *         ...,
 *     },
 *     properties?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDocumentationPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDocumentationPartAsync(array{
 *     restApiId?: string,
 *     location?: array{
 *         type?: 'API'|'AUTHORIZER'|'METHOD'|'MODEL'|'PATH_PARAMETER'|'QUERY_PARAMETER'|'REQUEST_BODY'|'REQUEST_HEADER'|'RESOURCE'|'RESPONSE'|'RESPONSE_BODY'|'RESPONSE_HEADER',
 *         path?: string,
 *         method?: string,
 *         statusCode?: string,
 *         name?: string,
 *         ...,
 *     },
 *     properties?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDocumentationVersion(array $args = [])
 * @phpstan-method \Aws\Result createDocumentationVersion(array{restApiId?: string, documentationVersion?: string, stageName?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDocumentationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDocumentationVersionAsync(array{restApiId?: string, documentationVersion?: string, stageName?: string, description?: string, ...} $args = [])
 * @method \Aws\Result createDomainName(array $args = [])
 * @phpstan-method \Aws\Result createDomainName(array{
 *     domainName?: string,
 *     certificateName?: string,
 *     certificateBody?: string,
 *     certificatePrivateKey?: string,
 *     certificateChain?: string,
 *     certificateArn?: string,
 *     regionalCertificateName?: string,
 *     regionalCertificateArn?: string,
 *     endpointConfiguration?: array{
 *         types?: list<'EDGE'|'PRIVATE'|'REGIONAL'>,
 *         ipAddressType?: 'dualstack'|'ipv4',
 *         vpcEndpointIds?: list<string>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     securityPolicy?: 'SecurityPolicy_TLS12_2018_EDGE'|'SecurityPolicy_TLS12_PFS_2025_EDGE'|'SecurityPolicy_TLS13_1_2_2021_06'|'SecurityPolicy_TLS13_1_2_FIPS_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_FIPS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PQ_2025_09'|'SecurityPolicy_TLS13_1_3_2025_09'|'SecurityPolicy_TLS13_1_3_FIPS_2025_09'|'SecurityPolicy_TLS13_2025_EDGE'|'TLS_1_0'|'TLS_1_2',
 *     endpointAccessMode?: 'BASIC'|'STRICT',
 *     mutualTlsAuthentication?: array{truststoreUri?: string, truststoreVersion?: string, ...},
 *     ownershipVerificationCertificateArn?: string,
 *     policy?: string,
 *     routingMode?: 'BASE_PATH_MAPPING_ONLY'|'ROUTING_RULE_ONLY'|'ROUTING_RULE_THEN_BASE_PATH_MAPPING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainNameAsync(array{
 *     domainName?: string,
 *     certificateName?: string,
 *     certificateBody?: string,
 *     certificatePrivateKey?: string,
 *     certificateChain?: string,
 *     certificateArn?: string,
 *     regionalCertificateName?: string,
 *     regionalCertificateArn?: string,
 *     endpointConfiguration?: array{
 *         types?: list<'EDGE'|'PRIVATE'|'REGIONAL'>,
 *         ipAddressType?: 'dualstack'|'ipv4',
 *         vpcEndpointIds?: list<string>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     securityPolicy?: 'SecurityPolicy_TLS12_2018_EDGE'|'SecurityPolicy_TLS12_PFS_2025_EDGE'|'SecurityPolicy_TLS13_1_2_2021_06'|'SecurityPolicy_TLS13_1_2_FIPS_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_FIPS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PQ_2025_09'|'SecurityPolicy_TLS13_1_3_2025_09'|'SecurityPolicy_TLS13_1_3_FIPS_2025_09'|'SecurityPolicy_TLS13_2025_EDGE'|'TLS_1_0'|'TLS_1_2',
 *     endpointAccessMode?: 'BASIC'|'STRICT',
 *     mutualTlsAuthentication?: array{truststoreUri?: string, truststoreVersion?: string, ...},
 *     ownershipVerificationCertificateArn?: string,
 *     policy?: string,
 *     routingMode?: 'BASE_PATH_MAPPING_ONLY'|'ROUTING_RULE_ONLY'|'ROUTING_RULE_THEN_BASE_PATH_MAPPING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomainNameAccessAssociation(array $args = [])
 * @phpstan-method \Aws\Result createDomainNameAccessAssociation(array{
 *     domainNameArn?: string,
 *     accessAssociationSourceType?: 'VPCE',
 *     accessAssociationSource?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainNameAccessAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainNameAccessAssociationAsync(array{
 *     domainNameArn?: string,
 *     accessAssociationSourceType?: 'VPCE',
 *     accessAssociationSource?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @phpstan-method \Aws\Result createModel(array{restApiId?: string, name?: string, description?: string, schema?: string, contentType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelAsync(array{restApiId?: string, name?: string, description?: string, schema?: string, contentType?: string, ...} $args = [])
 * @method \Aws\Result createRequestValidator(array $args = [])
 * @phpstan-method \Aws\Result createRequestValidator(array{restApiId?: string, name?: string, validateRequestBody?: bool, validateRequestParameters?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRequestValidatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRequestValidatorAsync(array{restApiId?: string, name?: string, validateRequestBody?: bool, validateRequestParameters?: bool, ...} $args = [])
 * @method \Aws\Result createResource(array $args = [])
 * @phpstan-method \Aws\Result createResource(array{restApiId?: string, parentId?: string, pathPart?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceAsync(array{restApiId?: string, parentId?: string, pathPart?: string, ...} $args = [])
 * @method \Aws\Result createRestApi(array $args = [])
 * @phpstan-method \Aws\Result createRestApi(array{
 *     name?: string,
 *     description?: string,
 *     version?: string,
 *     cloneFrom?: string,
 *     binaryMediaTypes?: list<string>,
 *     minimumCompressionSize?: int,
 *     apiKeySource?: 'AUTHORIZER'|'HEADER',
 *     endpointConfiguration?: array{
 *         types?: list<'EDGE'|'PRIVATE'|'REGIONAL'>,
 *         ipAddressType?: 'dualstack'|'ipv4',
 *         vpcEndpointIds?: list<string>,
 *         ...,
 *     },
 *     policy?: string,
 *     tags?: array<string, string>,
 *     disableExecuteApiEndpoint?: bool,
 *     securityPolicy?: 'SecurityPolicy_TLS12_2018_EDGE'|'SecurityPolicy_TLS12_PFS_2025_EDGE'|'SecurityPolicy_TLS13_1_2_2021_06'|'SecurityPolicy_TLS13_1_2_FIPS_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_FIPS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PQ_2025_09'|'SecurityPolicy_TLS13_1_3_2025_09'|'SecurityPolicy_TLS13_1_3_FIPS_2025_09'|'SecurityPolicy_TLS13_2025_EDGE'|'TLS_1_0'|'TLS_1_2',
 *     endpointAccessMode?: 'BASIC'|'STRICT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRestApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRestApiAsync(array{
 *     name?: string,
 *     description?: string,
 *     version?: string,
 *     cloneFrom?: string,
 *     binaryMediaTypes?: list<string>,
 *     minimumCompressionSize?: int,
 *     apiKeySource?: 'AUTHORIZER'|'HEADER',
 *     endpointConfiguration?: array{
 *         types?: list<'EDGE'|'PRIVATE'|'REGIONAL'>,
 *         ipAddressType?: 'dualstack'|'ipv4',
 *         vpcEndpointIds?: list<string>,
 *         ...,
 *     },
 *     policy?: string,
 *     tags?: array<string, string>,
 *     disableExecuteApiEndpoint?: bool,
 *     securityPolicy?: 'SecurityPolicy_TLS12_2018_EDGE'|'SecurityPolicy_TLS12_PFS_2025_EDGE'|'SecurityPolicy_TLS13_1_2_2021_06'|'SecurityPolicy_TLS13_1_2_FIPS_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_FIPS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PFS_PQ_2025_09'|'SecurityPolicy_TLS13_1_2_PQ_2025_09'|'SecurityPolicy_TLS13_1_3_2025_09'|'SecurityPolicy_TLS13_1_3_FIPS_2025_09'|'SecurityPolicy_TLS13_2025_EDGE'|'TLS_1_0'|'TLS_1_2',
 *     endpointAccessMode?: 'BASIC'|'STRICT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStage(array $args = [])
 * @phpstan-method \Aws\Result createStage(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     deploymentId?: string,
 *     description?: string,
 *     cacheClusterEnabled?: bool,
 *     cacheClusterSize?: '0.5'|'1.6'|'118'|'13.5'|'237'|'28.4'|'58.2'|'6.1',
 *     variables?: array<string, string>,
 *     documentationVersion?: string,
 *     canarySettings?: array{
 *         percentTraffic?: float,
 *         deploymentId?: string,
 *         stageVariableOverrides?: array<string, string>,
 *         useStageCache?: bool,
 *         ...,
 *     },
 *     tracingEnabled?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStageAsync(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     deploymentId?: string,
 *     description?: string,
 *     cacheClusterEnabled?: bool,
 *     cacheClusterSize?: '0.5'|'1.6'|'118'|'13.5'|'237'|'28.4'|'58.2'|'6.1',
 *     variables?: array<string, string>,
 *     documentationVersion?: string,
 *     canarySettings?: array{
 *         percentTraffic?: float,
 *         deploymentId?: string,
 *         stageVariableOverrides?: array<string, string>,
 *         useStageCache?: bool,
 *         ...,
 *     },
 *     tracingEnabled?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUsagePlan(array $args = [])
 * @phpstan-method \Aws\Result createUsagePlan(array{
 *     name?: string,
 *     description?: string,
 *     apiStages?: list<array{apiId?: string, stage?: string, throttle?: array<string, array>, ...}>,
 *     throttle?: array{burstLimit?: int, rateLimit?: float, ...},
 *     quota?: array{limit?: int, offset?: int, period?: 'DAY'|'MONTH'|'WEEK', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUsagePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUsagePlanAsync(array{
 *     name?: string,
 *     description?: string,
 *     apiStages?: list<array{apiId?: string, stage?: string, throttle?: array<string, array>, ...}>,
 *     throttle?: array{burstLimit?: int, rateLimit?: float, ...},
 *     quota?: array{limit?: int, offset?: int, period?: 'DAY'|'MONTH'|'WEEK', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUsagePlanKey(array $args = [])
 * @phpstan-method \Aws\Result createUsagePlanKey(array{usagePlanId?: string, keyId?: string, keyType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUsagePlanKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUsagePlanKeyAsync(array{usagePlanId?: string, keyId?: string, keyType?: string, ...} $args = [])
 * @method \Aws\Result createVpcLink(array $args = [])
 * @phpstan-method \Aws\Result createVpcLink(array{name?: string, description?: string, targetArns?: list<string>, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcLinkAsync(array{name?: string, description?: string, targetArns?: list<string>, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteApiKey(array $args = [])
 * @phpstan-method \Aws\Result deleteApiKey(array{apiKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiKeyAsync(array{apiKey?: string, ...} $args = [])
 * @method \Aws\Result deleteAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result deleteAuthorizer(array{restApiId?: string, authorizerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAuthorizerAsync(array{restApiId?: string, authorizerId?: string, ...} $args = [])
 * @method \Aws\Result deleteBasePathMapping(array $args = [])
 * @phpstan-method \Aws\Result deleteBasePathMapping(array{domainName?: string, domainNameId?: string, basePath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBasePathMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBasePathMappingAsync(array{domainName?: string, domainNameId?: string, basePath?: string, ...} $args = [])
 * @method \Aws\Result deleteClientCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteClientCertificate(array{clientCertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClientCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClientCertificateAsync(array{clientCertificateId?: string, ...} $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @phpstan-method \Aws\Result deleteDeployment(array{restApiId?: string, deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array{restApiId?: string, deploymentId?: string, ...} $args = [])
 * @method \Aws\Result deleteDocumentationPart(array $args = [])
 * @phpstan-method \Aws\Result deleteDocumentationPart(array{restApiId?: string, documentationPartId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentationPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDocumentationPartAsync(array{restApiId?: string, documentationPartId?: string, ...} $args = [])
 * @method \Aws\Result deleteDocumentationVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteDocumentationVersion(array{restApiId?: string, documentationVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDocumentationVersionAsync(array{restApiId?: string, documentationVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainName(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainName(array{domainName?: string, domainNameId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainNameAsync(array{domainName?: string, domainNameId?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainNameAccessAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainNameAccessAssociation(array{domainNameAccessAssociationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainNameAccessAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainNameAccessAssociationAsync(array{domainNameAccessAssociationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteGatewayResponse(array $args = [])
 * @phpstan-method \Aws\Result deleteGatewayResponse(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayResponseAsync(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegrationResponse(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationResponseAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \Aws\Result deleteMethod(array $args = [])
 * @phpstan-method \Aws\Result deleteMethod(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMethodAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \Aws\Result deleteMethodResponse(array $args = [])
 * @phpstan-method \Aws\Result deleteMethodResponse(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMethodResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMethodResponseAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @phpstan-method \Aws\Result deleteModel(array{restApiId?: string, modelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelAsync(array{restApiId?: string, modelName?: string, ...} $args = [])
 * @method \Aws\Result deleteRequestValidator(array $args = [])
 * @phpstan-method \Aws\Result deleteRequestValidator(array{restApiId?: string, requestValidatorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRequestValidatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRequestValidatorAsync(array{restApiId?: string, requestValidatorId?: string, ...} $args = [])
 * @method \Aws\Result deleteResource(array $args = [])
 * @phpstan-method \Aws\Result deleteResource(array{restApiId?: string, resourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceAsync(array{restApiId?: string, resourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteRestApi(array $args = [])
 * @phpstan-method \Aws\Result deleteRestApi(array{restApiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRestApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRestApiAsync(array{restApiId?: string, ...} $args = [])
 * @method \Aws\Result deleteStage(array $args = [])
 * @phpstan-method \Aws\Result deleteStage(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStageAsync(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \Aws\Result deleteUsagePlan(array $args = [])
 * @phpstan-method \Aws\Result deleteUsagePlan(array{usagePlanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUsagePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUsagePlanAsync(array{usagePlanId?: string, ...} $args = [])
 * @method \Aws\Result deleteUsagePlanKey(array $args = [])
 * @phpstan-method \Aws\Result deleteUsagePlanKey(array{usagePlanId?: string, keyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUsagePlanKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUsagePlanKeyAsync(array{usagePlanId?: string, keyId?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcLink(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcLink(array{vpcLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcLinkAsync(array{vpcLinkId?: string, ...} $args = [])
 * @method \Aws\Result flushStageAuthorizersCache(array $args = [])
 * @phpstan-method \Aws\Result flushStageAuthorizersCache(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise flushStageAuthorizersCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise flushStageAuthorizersCacheAsync(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \Aws\Result flushStageCache(array $args = [])
 * @phpstan-method \Aws\Result flushStageCache(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise flushStageCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise flushStageCacheAsync(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \Aws\Result generateClientCertificate(array $args = [])
 * @phpstan-method \Aws\Result generateClientCertificate(array{description?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateClientCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateClientCertificateAsync(array{description?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result getAccount(array $args = [])
 * @phpstan-method \Aws\Result getAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountAsync(array{...} $args = [])
 * @method \Aws\Result getApiKey(array $args = [])
 * @phpstan-method \Aws\Result getApiKey(array{apiKey?: string, includeValue?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiKeyAsync(array{apiKey?: string, includeValue?: bool, ...} $args = [])
 * @method \Aws\Result getApiKeys(array $args = [])
 * @phpstan-method \Aws\Result getApiKeys(array{position?: string, limit?: int, nameQuery?: string, customerId?: string, includeValues?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiKeysAsync(array{position?: string, limit?: int, nameQuery?: string, customerId?: string, includeValues?: bool, ...} $args = [])
 * @method \Aws\Result getAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result getAuthorizer(array{restApiId?: string, authorizerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthorizerAsync(array{restApiId?: string, authorizerId?: string, ...} $args = [])
 * @method \Aws\Result getAuthorizers(array $args = [])
 * @phpstan-method \Aws\Result getAuthorizers(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAuthorizersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthorizersAsync(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getBasePathMapping(array $args = [])
 * @phpstan-method \Aws\Result getBasePathMapping(array{domainName?: string, domainNameId?: string, basePath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBasePathMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBasePathMappingAsync(array{domainName?: string, domainNameId?: string, basePath?: string, ...} $args = [])
 * @method \Aws\Result getBasePathMappings(array $args = [])
 * @phpstan-method \Aws\Result getBasePathMappings(array{domainName?: string, domainNameId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBasePathMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBasePathMappingsAsync(array{domainName?: string, domainNameId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getClientCertificate(array $args = [])
 * @phpstan-method \Aws\Result getClientCertificate(array{clientCertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClientCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClientCertificateAsync(array{clientCertificateId?: string, ...} $args = [])
 * @method \Aws\Result getClientCertificates(array $args = [])
 * @phpstan-method \Aws\Result getClientCertificates(array{position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClientCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClientCertificatesAsync(array{position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{restApiId?: string, deploymentId?: string, embed?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{restApiId?: string, deploymentId?: string, embed?: list<string>, ...} $args = [])
 * @method \Aws\Result getDeployments(array $args = [])
 * @phpstan-method \Aws\Result getDeployments(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentsAsync(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getDocumentationPart(array $args = [])
 * @phpstan-method \Aws\Result getDocumentationPart(array{restApiId?: string, documentationPartId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentationPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentationPartAsync(array{restApiId?: string, documentationPartId?: string, ...} $args = [])
 * @method \Aws\Result getDocumentationParts(array $args = [])
 * @phpstan-method \Aws\Result getDocumentationParts(array{
 *     restApiId?: string,
 *     type?: 'API'|'AUTHORIZER'|'METHOD'|'MODEL'|'PATH_PARAMETER'|'QUERY_PARAMETER'|'REQUEST_BODY'|'REQUEST_HEADER'|'RESOURCE'|'RESPONSE'|'RESPONSE_BODY'|'RESPONSE_HEADER',
 *     nameQuery?: string,
 *     path?: string,
 *     position?: string,
 *     limit?: int,
 *     locationStatus?: 'DOCUMENTED'|'UNDOCUMENTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentationPartsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentationPartsAsync(array{
 *     restApiId?: string,
 *     type?: 'API'|'AUTHORIZER'|'METHOD'|'MODEL'|'PATH_PARAMETER'|'QUERY_PARAMETER'|'REQUEST_BODY'|'REQUEST_HEADER'|'RESOURCE'|'RESPONSE'|'RESPONSE_BODY'|'RESPONSE_HEADER',
 *     nameQuery?: string,
 *     path?: string,
 *     position?: string,
 *     limit?: int,
 *     locationStatus?: 'DOCUMENTED'|'UNDOCUMENTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDocumentationVersion(array $args = [])
 * @phpstan-method \Aws\Result getDocumentationVersion(array{restApiId?: string, documentationVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentationVersionAsync(array{restApiId?: string, documentationVersion?: string, ...} $args = [])
 * @method \Aws\Result getDocumentationVersions(array $args = [])
 * @phpstan-method \Aws\Result getDocumentationVersions(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentationVersionsAsync(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getDomainName(array $args = [])
 * @phpstan-method \Aws\Result getDomainName(array{domainName?: string, domainNameId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainNameAsync(array{domainName?: string, domainNameId?: string, ...} $args = [])
 * @method \Aws\Result getDomainNameAccessAssociations(array $args = [])
 * @phpstan-method \Aws\Result getDomainNameAccessAssociations(array{position?: string, limit?: int, resourceOwner?: 'OTHER_ACCOUNTS'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainNameAccessAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainNameAccessAssociationsAsync(array{position?: string, limit?: int, resourceOwner?: 'OTHER_ACCOUNTS'|'SELF', ...} $args = [])
 * @method \Aws\Result getDomainNames(array $args = [])
 * @phpstan-method \Aws\Result getDomainNames(array{position?: string, limit?: int, resourceOwner?: 'OTHER_ACCOUNTS'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainNamesAsync(array{position?: string, limit?: int, resourceOwner?: 'OTHER_ACCOUNTS'|'SELF', ...} $args = [])
 * @method \Aws\Result getExport(array $args = [])
 * @phpstan-method \Aws\Result getExport(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     exportType?: string,
 *     parameters?: array<string, string>,
 *     accepts?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportAsync(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     exportType?: string,
 *     parameters?: array<string, string>,
 *     accepts?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getGatewayResponse(array $args = [])
 * @phpstan-method \Aws\Result getGatewayResponse(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getGatewayResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGatewayResponseAsync(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getGatewayResponses(array $args = [])
 * @phpstan-method \Aws\Result getGatewayResponses(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGatewayResponsesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGatewayResponsesAsync(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @phpstan-method \Aws\Result getIntegration(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \Aws\Result getIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result getIntegrationResponse(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationResponseAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \Aws\Result getMethod(array $args = [])
 * @phpstan-method \Aws\Result getMethod(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMethodAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, ...} $args = [])
 * @method \Aws\Result getMethodResponse(array $args = [])
 * @phpstan-method \Aws\Result getMethodResponse(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMethodResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMethodResponseAsync(array{restApiId?: string, resourceId?: string, httpMethod?: string, statusCode?: string, ...} $args = [])
 * @method \Aws\Result getModel(array $args = [])
 * @phpstan-method \Aws\Result getModel(array{restApiId?: string, modelName?: string, flatten?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelAsync(array{restApiId?: string, modelName?: string, flatten?: bool, ...} $args = [])
 * @method \Aws\Result getModelTemplate(array $args = [])
 * @phpstan-method \Aws\Result getModelTemplate(array{restApiId?: string, modelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelTemplateAsync(array{restApiId?: string, modelName?: string, ...} $args = [])
 * @method \Aws\Result getModels(array $args = [])
 * @phpstan-method \Aws\Result getModels(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelsAsync(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getRequestValidator(array $args = [])
 * @phpstan-method \Aws\Result getRequestValidator(array{restApiId?: string, requestValidatorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRequestValidatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRequestValidatorAsync(array{restApiId?: string, requestValidatorId?: string, ...} $args = [])
 * @method \Aws\Result getRequestValidators(array $args = [])
 * @phpstan-method \Aws\Result getRequestValidators(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRequestValidatorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRequestValidatorsAsync(array{restApiId?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getResource(array $args = [])
 * @phpstan-method \Aws\Result getResource(array{restApiId?: string, resourceId?: string, embed?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceAsync(array{restApiId?: string, resourceId?: string, embed?: list<string>, ...} $args = [])
 * @method \Aws\Result getResources(array $args = [])
 * @phpstan-method \Aws\Result getResources(array{restApiId?: string, position?: string, limit?: int, embed?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcesAsync(array{restApiId?: string, position?: string, limit?: int, embed?: list<string>, ...} $args = [])
 * @method \Aws\Result getRestApi(array $args = [])
 * @phpstan-method \Aws\Result getRestApi(array{restApiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRestApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRestApiAsync(array{restApiId?: string, ...} $args = [])
 * @method \Aws\Result getRestApis(array $args = [])
 * @phpstan-method \Aws\Result getRestApis(array{position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRestApisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRestApisAsync(array{position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getSdk(array $args = [])
 * @phpstan-method \Aws\Result getSdk(array{restApiId?: string, stageName?: string, sdkType?: string, parameters?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSdkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSdkAsync(array{restApiId?: string, stageName?: string, sdkType?: string, parameters?: array<string, string>, ...} $args = [])
 * @method \Aws\Result getSdkType(array $args = [])
 * @phpstan-method \Aws\Result getSdkType(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSdkTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSdkTypeAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getSdkTypes(array $args = [])
 * @phpstan-method \Aws\Result getSdkTypes(array{position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSdkTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSdkTypesAsync(array{position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getStage(array $args = [])
 * @phpstan-method \Aws\Result getStage(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStageAsync(array{restApiId?: string, stageName?: string, ...} $args = [])
 * @method \Aws\Result getStages(array $args = [])
 * @phpstan-method \Aws\Result getStages(array{restApiId?: string, deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStagesAsync(array{restApiId?: string, deploymentId?: string, ...} $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @phpstan-method \Aws\Result getTags(array{resourceArn?: string, position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagsAsync(array{resourceArn?: string, position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getUsage(array $args = [])
 * @phpstan-method \Aws\Result getUsage(array{
 *     usagePlanId?: string,
 *     keyId?: string,
 *     startDate?: string,
 *     endDate?: string,
 *     position?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsageAsync(array{
 *     usagePlanId?: string,
 *     keyId?: string,
 *     startDate?: string,
 *     endDate?: string,
 *     position?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUsagePlan(array $args = [])
 * @phpstan-method \Aws\Result getUsagePlan(array{usagePlanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsagePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsagePlanAsync(array{usagePlanId?: string, ...} $args = [])
 * @method \Aws\Result getUsagePlanKey(array $args = [])
 * @phpstan-method \Aws\Result getUsagePlanKey(array{usagePlanId?: string, keyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsagePlanKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsagePlanKeyAsync(array{usagePlanId?: string, keyId?: string, ...} $args = [])
 * @method \Aws\Result getUsagePlanKeys(array $args = [])
 * @phpstan-method \Aws\Result getUsagePlanKeys(array{usagePlanId?: string, position?: string, limit?: int, nameQuery?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsagePlanKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsagePlanKeysAsync(array{usagePlanId?: string, position?: string, limit?: int, nameQuery?: string, ...} $args = [])
 * @method \Aws\Result getUsagePlans(array $args = [])
 * @phpstan-method \Aws\Result getUsagePlans(array{position?: string, keyId?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsagePlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsagePlansAsync(array{position?: string, keyId?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result getVpcLink(array $args = [])
 * @phpstan-method \Aws\Result getVpcLink(array{vpcLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVpcLinkAsync(array{vpcLinkId?: string, ...} $args = [])
 * @method \Aws\Result getVpcLinks(array $args = [])
 * @phpstan-method \Aws\Result getVpcLinks(array{position?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVpcLinksAsync(array{position?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result importApiKeys(array $args = [])
 * @phpstan-method \Aws\Result importApiKeys(array{body?: string|resource|\Psr\Http\Message\StreamInterface, format?: 'csv', failOnWarnings?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importApiKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importApiKeysAsync(array{body?: string|resource|\Psr\Http\Message\StreamInterface, format?: 'csv', failOnWarnings?: bool, ...} $args = [])
 * @method \Aws\Result importDocumentationParts(array $args = [])
 * @phpstan-method \Aws\Result importDocumentationParts(array{
 *     restApiId?: string,
 *     mode?: 'merge'|'overwrite',
 *     failOnWarnings?: bool,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importDocumentationPartsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importDocumentationPartsAsync(array{
 *     restApiId?: string,
 *     mode?: 'merge'|'overwrite',
 *     failOnWarnings?: bool,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importRestApi(array $args = [])
 * @phpstan-method \Aws\Result importRestApi(array{
 *     failOnWarnings?: bool,
 *     parameters?: array<string, string>,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importRestApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importRestApiAsync(array{
 *     failOnWarnings?: bool,
 *     parameters?: array<string, string>,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putGatewayResponse(array $args = [])
 * @phpstan-method \Aws\Result putGatewayResponse(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     statusCode?: string,
 *     responseParameters?: array<string, string>,
 *     responseTemplates?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putGatewayResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putGatewayResponseAsync(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     statusCode?: string,
 *     responseParameters?: array<string, string>,
 *     responseTemplates?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putIntegration(array $args = [])
 * @phpstan-method \Aws\Result putIntegration(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     type?: 'AWS'|'AWS_PROXY'|'HTTP'|'HTTP_PROXY'|'MOCK',
 *     integrationHttpMethod?: string,
 *     uri?: string,
 *     connectionType?: 'INTERNET'|'VPC_LINK',
 *     connectionId?: string,
 *     credentials?: string,
 *     requestParameters?: array<string, string>,
 *     requestTemplates?: array<string, string>,
 *     passthroughBehavior?: string,
 *     cacheNamespace?: string,
 *     cacheKeyParameters?: list<string>,
 *     contentHandling?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     timeoutInMillis?: int,
 *     tlsConfig?: array{insecureSkipVerification?: bool, ...},
 *     responseTransferMode?: 'BUFFERED'|'STREAM',
 *     integrationTarget?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIntegrationAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     type?: 'AWS'|'AWS_PROXY'|'HTTP'|'HTTP_PROXY'|'MOCK',
 *     integrationHttpMethod?: string,
 *     uri?: string,
 *     connectionType?: 'INTERNET'|'VPC_LINK',
 *     connectionId?: string,
 *     credentials?: string,
 *     requestParameters?: array<string, string>,
 *     requestTemplates?: array<string, string>,
 *     passthroughBehavior?: string,
 *     cacheNamespace?: string,
 *     cacheKeyParameters?: list<string>,
 *     contentHandling?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     timeoutInMillis?: int,
 *     tlsConfig?: array{insecureSkipVerification?: bool, ...},
 *     responseTransferMode?: 'BUFFERED'|'STREAM',
 *     integrationTarget?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result putIntegrationResponse(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     selectionPattern?: string,
 *     responseParameters?: array<string, string>,
 *     responseTemplates?: array<string, string>,
 *     contentHandling?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIntegrationResponseAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     selectionPattern?: string,
 *     responseParameters?: array<string, string>,
 *     responseTemplates?: array<string, string>,
 *     contentHandling?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMethod(array $args = [])
 * @phpstan-method \Aws\Result putMethod(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     authorizationType?: string,
 *     authorizerId?: string,
 *     apiKeyRequired?: bool,
 *     operationName?: string,
 *     requestParameters?: array<string, bool>,
 *     requestModels?: array<string, string>,
 *     requestValidatorId?: string,
 *     authorizationScopes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMethodAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     authorizationType?: string,
 *     authorizerId?: string,
 *     apiKeyRequired?: bool,
 *     operationName?: string,
 *     requestParameters?: array<string, bool>,
 *     requestModels?: array<string, string>,
 *     requestValidatorId?: string,
 *     authorizationScopes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMethodResponse(array $args = [])
 * @phpstan-method \Aws\Result putMethodResponse(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     responseParameters?: array<string, bool>,
 *     responseModels?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMethodResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMethodResponseAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     responseParameters?: array<string, bool>,
 *     responseModels?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRestApi(array $args = [])
 * @phpstan-method \Aws\Result putRestApi(array{
 *     restApiId?: string,
 *     mode?: 'merge'|'overwrite',
 *     failOnWarnings?: bool,
 *     parameters?: array<string, string>,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRestApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRestApiAsync(array{
 *     restApiId?: string,
 *     mode?: 'merge'|'overwrite',
 *     failOnWarnings?: bool,
 *     parameters?: array<string, string>,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectDomainNameAccessAssociation(array $args = [])
 * @phpstan-method \Aws\Result rejectDomainNameAccessAssociation(array{domainNameAccessAssociationArn?: string, domainNameArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectDomainNameAccessAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectDomainNameAccessAssociationAsync(array{domainNameAccessAssociationArn?: string, domainNameArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result testInvokeAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result testInvokeAuthorizer(array{
 *     restApiId?: string,
 *     authorizerId?: string,
 *     headers?: array<string, string>,
 *     multiValueHeaders?: array<string, list<string>>,
 *     pathWithQueryString?: string,
 *     body?: string,
 *     stageVariables?: array<string, string>,
 *     additionalContext?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testInvokeAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testInvokeAuthorizerAsync(array{
 *     restApiId?: string,
 *     authorizerId?: string,
 *     headers?: array<string, string>,
 *     multiValueHeaders?: array<string, list<string>>,
 *     pathWithQueryString?: string,
 *     body?: string,
 *     stageVariables?: array<string, string>,
 *     additionalContext?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result testInvokeMethod(array $args = [])
 * @phpstan-method \Aws\Result testInvokeMethod(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     pathWithQueryString?: string,
 *     body?: string,
 *     headers?: array<string, string>,
 *     multiValueHeaders?: array<string, list<string>>,
 *     clientCertificateId?: string,
 *     stageVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testInvokeMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testInvokeMethodAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     pathWithQueryString?: string,
 *     body?: string,
 *     headers?: array<string, string>,
 *     multiValueHeaders?: array<string, list<string>>,
 *     clientCertificateId?: string,
 *     stageVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccount(array $args = [])
 * @phpstan-method \Aws\Result updateAccount(array{
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountAsync(array{
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApiKey(array $args = [])
 * @phpstan-method \Aws\Result updateApiKey(array{
 *     apiKey?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiKeyAsync(array{
 *     apiKey?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result updateAuthorizer(array{
 *     restApiId?: string,
 *     authorizerId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAuthorizerAsync(array{
 *     restApiId?: string,
 *     authorizerId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBasePathMapping(array $args = [])
 * @phpstan-method \Aws\Result updateBasePathMapping(array{
 *     domainName?: string,
 *     domainNameId?: string,
 *     basePath?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBasePathMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBasePathMappingAsync(array{
 *     domainName?: string,
 *     domainNameId?: string,
 *     basePath?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClientCertificate(array $args = [])
 * @phpstan-method \Aws\Result updateClientCertificate(array{
 *     clientCertificateId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClientCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClientCertificateAsync(array{
 *     clientCertificateId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDeployment(array $args = [])
 * @phpstan-method \Aws\Result updateDeployment(array{
 *     restApiId?: string,
 *     deploymentId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array{
 *     restApiId?: string,
 *     deploymentId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDocumentationPart(array $args = [])
 * @phpstan-method \Aws\Result updateDocumentationPart(array{
 *     restApiId?: string,
 *     documentationPartId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDocumentationPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDocumentationPartAsync(array{
 *     restApiId?: string,
 *     documentationPartId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDocumentationVersion(array $args = [])
 * @phpstan-method \Aws\Result updateDocumentationVersion(array{
 *     restApiId?: string,
 *     documentationVersion?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDocumentationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDocumentationVersionAsync(array{
 *     restApiId?: string,
 *     documentationVersion?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainName(array $args = [])
 * @phpstan-method \Aws\Result updateDomainName(array{
 *     domainName?: string,
 *     domainNameId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainNameAsync(array{
 *     domainName?: string,
 *     domainNameId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGatewayResponse(array $args = [])
 * @phpstan-method \Aws\Result updateGatewayResponse(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayResponseAsync(array{
 *     restApiId?: string,
 *     responseType?: 'ACCESS_DENIED'|'API_CONFIGURATION_ERROR'|'AUTHORIZER_CONFIGURATION_ERROR'|'AUTHORIZER_FAILURE'|'BAD_REQUEST_BODY'|'BAD_REQUEST_PARAMETERS'|'DEFAULT_4XX'|'DEFAULT_5XX'|'EXPIRED_TOKEN'|'INTEGRATION_FAILURE'|'INTEGRATION_TIMEOUT'|'INVALID_API_KEY'|'INVALID_SIGNATURE'|'MISSING_AUTHENTICATION_TOKEN'|'QUOTA_EXCEEDED'|'REQUEST_TOO_LARGE'|'RESOURCE_NOT_FOUND'|'THROTTLED'|'UNAUTHORIZED'|'UNSUPPORTED_MEDIA_TYPE'|'WAF_FILTERED',
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateIntegration(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result updateIntegrationResponse(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationResponseAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMethod(array $args = [])
 * @phpstan-method \Aws\Result updateMethod(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMethodAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMethodAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMethodResponse(array $args = [])
 * @phpstan-method \Aws\Result updateMethodResponse(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMethodResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMethodResponseAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     httpMethod?: string,
 *     statusCode?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateModel(array $args = [])
 * @phpstan-method \Aws\Result updateModel(array{
 *     restApiId?: string,
 *     modelName?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelAsync(array{
 *     restApiId?: string,
 *     modelName?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRequestValidator(array $args = [])
 * @phpstan-method \Aws\Result updateRequestValidator(array{
 *     restApiId?: string,
 *     requestValidatorId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRequestValidatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRequestValidatorAsync(array{
 *     restApiId?: string,
 *     requestValidatorId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResource(array $args = [])
 * @phpstan-method \Aws\Result updateResource(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceAsync(array{
 *     restApiId?: string,
 *     resourceId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRestApi(array $args = [])
 * @phpstan-method \Aws\Result updateRestApi(array{
 *     restApiId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRestApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRestApiAsync(array{
 *     restApiId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStage(array $args = [])
 * @phpstan-method \Aws\Result updateStage(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStageAsync(array{
 *     restApiId?: string,
 *     stageName?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUsage(array $args = [])
 * @phpstan-method \Aws\Result updateUsage(array{
 *     usagePlanId?: string,
 *     keyId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUsageAsync(array{
 *     usagePlanId?: string,
 *     keyId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUsagePlan(array $args = [])
 * @phpstan-method \Aws\Result updateUsagePlan(array{
 *     usagePlanId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUsagePlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUsagePlanAsync(array{
 *     usagePlanId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcLink(array $args = [])
 * @phpstan-method \Aws\Result updateVpcLink(array{
 *     vpcLinkId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcLinkAsync(array{
 *     vpcLinkId?: string,
 *     patchOperations?: list<array{op?: 'add'|'copy'|'move'|'remove'|'replace'|'test', path?: string, value?: string, from?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class ApiGatewayClient extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $stack = $this->getHandlerList();
        $stack->appendBuild([__CLASS__, '_add_accept_header']);
    }

    public static function _add_accept_header(callable $handler)
    {
        return function (
            CommandInterface $command,
            RequestInterface $request
        ) use ($handler) {
            $request = $request->withHeader('Accept', 'application/json');

            return $handler($command, $request);
        };
    }
}
