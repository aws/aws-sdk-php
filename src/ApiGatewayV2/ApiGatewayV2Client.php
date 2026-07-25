<?php
namespace Aws\ApiGatewayV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonApiGatewayV2** service.
 * @method \Aws\Result createApi(array $args = [])
 * @phpstan-method \Aws\Result createApi(array{
 *     ApiKeySelectionExpression?: string,
 *     CorsConfiguration?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     CredentialsArn?: string,
 *     Description?: string,
 *     DisableSchemaValidation?: bool,
 *     DisableExecuteApiEndpoint?: bool,
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     Name?: string,
 *     ProtocolType?: 'HTTP'|'WEBSOCKET',
 *     RouteKey?: string,
 *     RouteSelectionExpression?: string,
 *     Tags?: array<string, string>,
 *     Target?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiAsync(array{
 *     ApiKeySelectionExpression?: string,
 *     CorsConfiguration?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     CredentialsArn?: string,
 *     Description?: string,
 *     DisableSchemaValidation?: bool,
 *     DisableExecuteApiEndpoint?: bool,
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     Name?: string,
 *     ProtocolType?: 'HTTP'|'WEBSOCKET',
 *     RouteKey?: string,
 *     RouteSelectionExpression?: string,
 *     Tags?: array<string, string>,
 *     Target?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApiMapping(array $args = [])
 * @phpstan-method \Aws\Result createApiMapping(array{ApiId?: string, ApiMappingKey?: string, DomainName?: string, Stage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiMappingAsync(array{ApiId?: string, ApiMappingKey?: string, DomainName?: string, Stage?: string, ...} $args = [])
 * @method \Aws\Result createAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result createAuthorizer(array{
 *     ApiId?: string,
 *     AuthorizerCredentialsArn?: string,
 *     AuthorizerResultTtlInSeconds?: int,
 *     AuthorizerType?: 'JWT'|'REQUEST',
 *     AuthorizerUri?: string,
 *     IdentitySource?: list<string>,
 *     IdentityValidationExpression?: string,
 *     JwtConfiguration?: array{Audience?: list<string>, Issuer?: string, ...},
 *     Name?: string,
 *     AuthorizerPayloadFormatVersion?: string,
 *     EnableSimpleResponses?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAuthorizerAsync(array{
 *     ApiId?: string,
 *     AuthorizerCredentialsArn?: string,
 *     AuthorizerResultTtlInSeconds?: int,
 *     AuthorizerType?: 'JWT'|'REQUEST',
 *     AuthorizerUri?: string,
 *     IdentitySource?: list<string>,
 *     IdentityValidationExpression?: string,
 *     JwtConfiguration?: array{Audience?: list<string>, Issuer?: string, ...},
 *     Name?: string,
 *     AuthorizerPayloadFormatVersion?: string,
 *     EnableSimpleResponses?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{ApiId?: string, Description?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{ApiId?: string, Description?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result createDomainName(array $args = [])
 * @phpstan-method \Aws\Result createDomainName(array{
 *     DomainName?: string,
 *     DomainNameConfigurations?: list<array{
 *         ApiGatewayDomainName?: string,
 *         CertificateArn?: string,
 *         CertificateName?: string,
 *         CertificateUploadDate?: int|string|\DateTimeInterface,
 *         DomainNameStatus?: 'AVAILABLE'|'PENDING_CERTIFICATE_REIMPORT'|'PENDING_OWNERSHIP_VERIFICATION'|'UPDATING',
 *         DomainNameStatusMessage?: string,
 *         EndpointType?: 'EDGE'|'REGIONAL',
 *         HostedZoneId?: string,
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         SecurityPolicy?: 'TLS_1_0'|'TLS_1_2',
 *         OwnershipVerificationCertificateArn?: string,
 *         ...,
 *     }>,
 *     MutualTlsAuthentication?: array{TruststoreUri?: string, TruststoreVersion?: string, ...},
 *     RoutingMode?: 'API_MAPPING_ONLY'|'ROUTING_RULE_ONLY'|'ROUTING_RULE_THEN_API_MAPPING',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainNameAsync(array{
 *     DomainName?: string,
 *     DomainNameConfigurations?: list<array{
 *         ApiGatewayDomainName?: string,
 *         CertificateArn?: string,
 *         CertificateName?: string,
 *         CertificateUploadDate?: int|string|\DateTimeInterface,
 *         DomainNameStatus?: 'AVAILABLE'|'PENDING_CERTIFICATE_REIMPORT'|'PENDING_OWNERSHIP_VERIFICATION'|'UPDATING',
 *         DomainNameStatusMessage?: string,
 *         EndpointType?: 'EDGE'|'REGIONAL',
 *         HostedZoneId?: string,
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         SecurityPolicy?: 'TLS_1_0'|'TLS_1_2',
 *         OwnershipVerificationCertificateArn?: string,
 *         ...,
 *     }>,
 *     MutualTlsAuthentication?: array{TruststoreUri?: string, TruststoreVersion?: string, ...},
 *     RoutingMode?: 'API_MAPPING_ONLY'|'ROUTING_RULE_ONLY'|'ROUTING_RULE_THEN_API_MAPPING',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegration(array $args = [])
 * @phpstan-method \Aws\Result createIntegration(array{
 *     ApiId?: string,
 *     ConnectionId?: string,
 *     ConnectionType?: 'INTERNET'|'VPC_LINK',
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     CredentialsArn?: string,
 *     Description?: string,
 *     IntegrationMethod?: string,
 *     IntegrationSubtype?: string,
 *     IntegrationType?: 'AWS'|'AWS_PROXY'|'HTTP'|'HTTP_PROXY'|'MOCK',
 *     IntegrationUri?: string,
 *     PassthroughBehavior?: 'NEVER'|'WHEN_NO_MATCH'|'WHEN_NO_TEMPLATES',
 *     PayloadFormatVersion?: string,
 *     RequestParameters?: array<string, string>,
 *     ResponseParameters?: array<string, array<string, string>>,
 *     RequestTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     TimeoutInMillis?: int,
 *     TlsConfig?: array{ServerNameToVerify?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAsync(array{
 *     ApiId?: string,
 *     ConnectionId?: string,
 *     ConnectionType?: 'INTERNET'|'VPC_LINK',
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     CredentialsArn?: string,
 *     Description?: string,
 *     IntegrationMethod?: string,
 *     IntegrationSubtype?: string,
 *     IntegrationType?: 'AWS'|'AWS_PROXY'|'HTTP'|'HTTP_PROXY'|'MOCK',
 *     IntegrationUri?: string,
 *     PassthroughBehavior?: 'NEVER'|'WHEN_NO_MATCH'|'WHEN_NO_TEMPLATES',
 *     PayloadFormatVersion?: string,
 *     RequestParameters?: array<string, string>,
 *     ResponseParameters?: array<string, array<string, string>>,
 *     RequestTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     TimeoutInMillis?: int,
 *     TlsConfig?: array{ServerNameToVerify?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result createIntegrationResponse(array{
 *     ApiId?: string,
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     IntegrationId?: string,
 *     IntegrationResponseKey?: string,
 *     ResponseParameters?: array<string, string>,
 *     ResponseTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationResponseAsync(array{
 *     ApiId?: string,
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     IntegrationId?: string,
 *     IntegrationResponseKey?: string,
 *     ResponseParameters?: array<string, string>,
 *     ResponseTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @phpstan-method \Aws\Result createModel(array{ApiId?: string, ContentType?: string, Description?: string, Name?: string, Schema?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelAsync(array{ApiId?: string, ContentType?: string, Description?: string, Name?: string, Schema?: string, ...} $args = [])
 * @method \Aws\Result createPortal(array $args = [])
 * @phpstan-method \Aws\Result createPortal(array{
 *     Authorization?: array{
 *         CognitoConfig?: array{AppClientId?: string, UserPoolArn?: string, UserPoolDomain?: string, ...},
 *         None?: array,
 *         ...,
 *     },
 *     EndpointConfiguration?: array{AcmManaged?: array{CertificateArn?: string, DomainName?: string, ...}, None?: array, ...},
 *     IncludedPortalProductArns?: list<string>,
 *     LogoUri?: string,
 *     PortalContent?: array{
 *         Description?: string,
 *         DisplayName?: string,
 *         Theme?: array{CustomColors?: array, LogoLastUploaded?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     RumAppMonitorName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortalAsync(array{
 *     Authorization?: array{
 *         CognitoConfig?: array{AppClientId?: string, UserPoolArn?: string, UserPoolDomain?: string, ...},
 *         None?: array,
 *         ...,
 *     },
 *     EndpointConfiguration?: array{AcmManaged?: array{CertificateArn?: string, DomainName?: string, ...}, None?: array, ...},
 *     IncludedPortalProductArns?: list<string>,
 *     LogoUri?: string,
 *     PortalContent?: array{
 *         Description?: string,
 *         DisplayName?: string,
 *         Theme?: array{CustomColors?: array, LogoLastUploaded?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     RumAppMonitorName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPortalProduct(array $args = [])
 * @phpstan-method \Aws\Result createPortalProduct(array{Description?: string, DisplayName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortalProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortalProductAsync(array{Description?: string, DisplayName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createProductPage(array $args = [])
 * @phpstan-method \Aws\Result createProductPage(array{DisplayContent?: array{Body?: string, Title?: string, ...}, PortalProductId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProductPageAsync(array{DisplayContent?: array{Body?: string, Title?: string, ...}, PortalProductId?: string, ...} $args = [])
 * @method \Aws\Result createProductRestEndpointPage(array $args = [])
 * @phpstan-method \Aws\Result createProductRestEndpointPage(array{
 *     DisplayContent?: array{None?: array, Overrides?: array{Body?: string, Endpoint?: string, OperationName?: string, ...}, ...},
 *     PortalProductId?: string,
 *     RestEndpointIdentifier?: array{IdentifierParts?: array{Method?: string, Path?: string, RestApiId?: string, Stage?: string, ...}, ...},
 *     TryItState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProductRestEndpointPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProductRestEndpointPageAsync(array{
 *     DisplayContent?: array{None?: array, Overrides?: array{Body?: string, Endpoint?: string, OperationName?: string, ...}, ...},
 *     PortalProductId?: string,
 *     RestEndpointIdentifier?: array{IdentifierParts?: array{Method?: string, Path?: string, RestApiId?: string, Stage?: string, ...}, ...},
 *     TryItState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoute(array $args = [])
 * @phpstan-method \Aws\Result createRoute(array{
 *     ApiId?: string,
 *     ApiKeyRequired?: bool,
 *     AuthorizationScopes?: list<string>,
 *     AuthorizationType?: 'AWS_IAM'|'CUSTOM'|'JWT'|'NONE',
 *     AuthorizerId?: string,
 *     ModelSelectionExpression?: string,
 *     OperationName?: string,
 *     RequestModels?: array<string, string>,
 *     RequestParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteKey?: string,
 *     RouteResponseSelectionExpression?: string,
 *     Target?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouteAsync(array{
 *     ApiId?: string,
 *     ApiKeyRequired?: bool,
 *     AuthorizationScopes?: list<string>,
 *     AuthorizationType?: 'AWS_IAM'|'CUSTOM'|'JWT'|'NONE',
 *     AuthorizerId?: string,
 *     ModelSelectionExpression?: string,
 *     OperationName?: string,
 *     RequestModels?: array<string, string>,
 *     RequestParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteKey?: string,
 *     RouteResponseSelectionExpression?: string,
 *     Target?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRouteResponse(array $args = [])
 * @phpstan-method \Aws\Result createRouteResponse(array{
 *     ApiId?: string,
 *     ModelSelectionExpression?: string,
 *     ResponseModels?: array<string, string>,
 *     ResponseParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteId?: string,
 *     RouteResponseKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouteResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouteResponseAsync(array{
 *     ApiId?: string,
 *     ModelSelectionExpression?: string,
 *     ResponseModels?: array<string, string>,
 *     ResponseParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteId?: string,
 *     RouteResponseKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result createRoutingRule(array{
 *     Actions?: list<array{InvokeApi?: array, ...}>,
 *     Conditions?: list<array{MatchBasePaths?: array, MatchHeaders?: array, ...}>,
 *     DomainName?: string,
 *     DomainNameId?: string,
 *     Priority?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoutingRuleAsync(array{
 *     Actions?: list<array{InvokeApi?: array, ...}>,
 *     Conditions?: list<array{MatchBasePaths?: array, MatchHeaders?: array, ...}>,
 *     DomainName?: string,
 *     DomainNameId?: string,
 *     Priority?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStage(array $args = [])
 * @phpstan-method \Aws\Result createStage(array{
 *     AccessLogSettings?: array{DestinationArn?: string, Format?: string, ...},
 *     ApiId?: string,
 *     AutoDeploy?: bool,
 *     ClientCertificateId?: string,
 *     DefaultRouteSettings?: array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     },
 *     DeploymentId?: string,
 *     Description?: string,
 *     RouteSettings?: array<string, array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     }>,
 *     StageName?: string,
 *     StageVariables?: array<string, string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStageAsync(array{
 *     AccessLogSettings?: array{DestinationArn?: string, Format?: string, ...},
 *     ApiId?: string,
 *     AutoDeploy?: bool,
 *     ClientCertificateId?: string,
 *     DefaultRouteSettings?: array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     },
 *     DeploymentId?: string,
 *     Description?: string,
 *     RouteSettings?: array<string, array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     }>,
 *     StageName?: string,
 *     StageVariables?: array<string, string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcLink(array $args = [])
 * @phpstan-method \Aws\Result createVpcLink(array{
 *     Name?: string,
 *     SecurityGroupIds?: list<string>,
 *     SubnetIds?: list<string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcLinkAsync(array{
 *     Name?: string,
 *     SecurityGroupIds?: list<string>,
 *     SubnetIds?: list<string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessLogSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessLogSettings(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessLogSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessLogSettingsAsync(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result deleteApi(array $args = [])
 * @phpstan-method \Aws\Result deleteApi(array{ApiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiAsync(array{ApiId?: string, ...} $args = [])
 * @method \Aws\Result deleteApiMapping(array $args = [])
 * @phpstan-method \Aws\Result deleteApiMapping(array{ApiMappingId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiMappingAsync(array{ApiMappingId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result deleteAuthorizer(array{ApiId?: string, AuthorizerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAuthorizerAsync(array{ApiId?: string, AuthorizerId?: string, ...} $args = [])
 * @method \Aws\Result deleteCorsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteCorsConfiguration(array{ApiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCorsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCorsConfigurationAsync(array{ApiId?: string, ...} $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @phpstan-method \Aws\Result deleteDeployment(array{ApiId?: string, DeploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array{ApiId?: string, DeploymentId?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainName(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainName(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainNameAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{ApiId?: string, IntegrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{ApiId?: string, IntegrationId?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegrationResponse(array{ApiId?: string, IntegrationId?: string, IntegrationResponseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationResponseAsync(array{ApiId?: string, IntegrationId?: string, IntegrationResponseId?: string, ...} $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @phpstan-method \Aws\Result deleteModel(array{ApiId?: string, ModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelAsync(array{ApiId?: string, ModelId?: string, ...} $args = [])
 * @method \Aws\Result deletePortal(array $args = [])
 * @phpstan-method \Aws\Result deletePortal(array{PortalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortalAsync(array{PortalId?: string, ...} $args = [])
 * @method \Aws\Result deletePortalProduct(array $args = [])
 * @phpstan-method \Aws\Result deletePortalProduct(array{PortalProductId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortalProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortalProductAsync(array{PortalProductId?: string, ...} $args = [])
 * @method \Aws\Result deletePortalProductSharingPolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePortalProductSharingPolicy(array{PortalProductId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortalProductSharingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortalProductSharingPolicyAsync(array{PortalProductId?: string, ...} $args = [])
 * @method \Aws\Result deleteProductPage(array $args = [])
 * @phpstan-method \Aws\Result deleteProductPage(array{PortalProductId?: string, ProductPageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProductPageAsync(array{PortalProductId?: string, ProductPageId?: string, ...} $args = [])
 * @method \Aws\Result deleteProductRestEndpointPage(array $args = [])
 * @phpstan-method \Aws\Result deleteProductRestEndpointPage(array{PortalProductId?: string, ProductRestEndpointPageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductRestEndpointPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProductRestEndpointPageAsync(array{PortalProductId?: string, ProductRestEndpointPageId?: string, ...} $args = [])
 * @method \Aws\Result deleteRoute(array $args = [])
 * @phpstan-method \Aws\Result deleteRoute(array{ApiId?: string, RouteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouteAsync(array{ApiId?: string, RouteId?: string, ...} $args = [])
 * @method \Aws\Result deleteRouteRequestParameter(array $args = [])
 * @phpstan-method \Aws\Result deleteRouteRequestParameter(array{ApiId?: string, RequestParameterKey?: string, RouteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouteRequestParameterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouteRequestParameterAsync(array{ApiId?: string, RequestParameterKey?: string, RouteId?: string, ...} $args = [])
 * @method \Aws\Result deleteRouteResponse(array $args = [])
 * @phpstan-method \Aws\Result deleteRouteResponse(array{ApiId?: string, RouteId?: string, RouteResponseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouteResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouteResponseAsync(array{ApiId?: string, RouteId?: string, RouteResponseId?: string, ...} $args = [])
 * @method \Aws\Result deleteRouteSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteRouteSettings(array{ApiId?: string, RouteKey?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouteSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouteSettingsAsync(array{ApiId?: string, RouteKey?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result deleteRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRoutingRule(array{DomainName?: string, DomainNameId?: string, RoutingRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoutingRuleAsync(array{DomainName?: string, DomainNameId?: string, RoutingRuleId?: string, ...} $args = [])
 * @method \Aws\Result deleteStage(array $args = [])
 * @phpstan-method \Aws\Result deleteStage(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStageAsync(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcLink(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcLink(array{VpcLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcLinkAsync(array{VpcLinkId?: string, ...} $args = [])
 * @method \Aws\Result exportApi(array $args = [])
 * @phpstan-method \Aws\Result exportApi(array{
 *     ApiId?: string,
 *     ExportVersion?: string,
 *     IncludeExtensions?: bool,
 *     OutputType?: string,
 *     Specification?: string,
 *     StageName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportApiAsync(array{
 *     ApiId?: string,
 *     ExportVersion?: string,
 *     IncludeExtensions?: bool,
 *     OutputType?: string,
 *     Specification?: string,
 *     StageName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disablePortal(array $args = [])
 * @phpstan-method \Aws\Result disablePortal(array{PortalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disablePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disablePortalAsync(array{PortalId?: string, ...} $args = [])
 * @method \Aws\Result resetAuthorizersCache(array $args = [])
 * @phpstan-method \Aws\Result resetAuthorizersCache(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetAuthorizersCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetAuthorizersCacheAsync(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result getApiResource(array $args = [])
 * @phpstan-method \Aws\Result getApiResource(array{ApiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiResourceAsync(array{ApiId?: string, ...} $args = [])
 * @method \Aws\Result getApiMapping(array $args = [])
 * @phpstan-method \Aws\Result getApiMapping(array{ApiMappingId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiMappingAsync(array{ApiMappingId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result getApiMappings(array $args = [])
 * @phpstan-method \Aws\Result getApiMappings(array{DomainName?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiMappingsAsync(array{DomainName?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getApis(array $args = [])
 * @phpstan-method \Aws\Result getApis(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApisAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result getAuthorizer(array{ApiId?: string, AuthorizerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthorizerAsync(array{ApiId?: string, AuthorizerId?: string, ...} $args = [])
 * @method \Aws\Result getAuthorizers(array $args = [])
 * @phpstan-method \Aws\Result getAuthorizers(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAuthorizersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthorizersAsync(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{ApiId?: string, DeploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{ApiId?: string, DeploymentId?: string, ...} $args = [])
 * @method \Aws\Result getDeployments(array $args = [])
 * @phpstan-method \Aws\Result getDeployments(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentsAsync(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getDomainName(array $args = [])
 * @phpstan-method \Aws\Result getDomainName(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainNameAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result getDomainNames(array $args = [])
 * @phpstan-method \Aws\Result getDomainNames(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainNamesAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @phpstan-method \Aws\Result getIntegration(array{ApiId?: string, IntegrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationAsync(array{ApiId?: string, IntegrationId?: string, ...} $args = [])
 * @method \Aws\Result getIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result getIntegrationResponse(array{ApiId?: string, IntegrationId?: string, IntegrationResponseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationResponseAsync(array{ApiId?: string, IntegrationId?: string, IntegrationResponseId?: string, ...} $args = [])
 * @method \Aws\Result getIntegrationResponses(array $args = [])
 * @phpstan-method \Aws\Result getIntegrationResponses(array{ApiId?: string, IntegrationId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationResponsesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationResponsesAsync(array{ApiId?: string, IntegrationId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getIntegrations(array $args = [])
 * @phpstan-method \Aws\Result getIntegrations(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationsAsync(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getModel(array $args = [])
 * @phpstan-method \Aws\Result getModel(array{ApiId?: string, ModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelAsync(array{ApiId?: string, ModelId?: string, ...} $args = [])
 * @method \Aws\Result getModelTemplate(array $args = [])
 * @phpstan-method \Aws\Result getModelTemplate(array{ApiId?: string, ModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelTemplateAsync(array{ApiId?: string, ModelId?: string, ...} $args = [])
 * @method \Aws\Result getModels(array $args = [])
 * @phpstan-method \Aws\Result getModels(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelsAsync(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getPortal(array $args = [])
 * @phpstan-method \Aws\Result getPortal(array{PortalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortalAsync(array{PortalId?: string, ...} $args = [])
 * @method \Aws\Result getPortalProduct(array $args = [])
 * @phpstan-method \Aws\Result getPortalProduct(array{PortalProductId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortalProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortalProductAsync(array{PortalProductId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result getPortalProductSharingPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPortalProductSharingPolicy(array{PortalProductId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortalProductSharingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortalProductSharingPolicyAsync(array{PortalProductId?: string, ...} $args = [])
 * @method \Aws\Result getProductPage(array $args = [])
 * @phpstan-method \Aws\Result getProductPage(array{PortalProductId?: string, ProductPageId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductPageAsync(array{PortalProductId?: string, ProductPageId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result getProductRestEndpointPage(array $args = [])
 * @phpstan-method \Aws\Result getProductRestEndpointPage(array{
 *     IncludeRawDisplayContent?: string,
 *     PortalProductId?: string,
 *     ProductRestEndpointPageId?: string,
 *     ResourceOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductRestEndpointPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductRestEndpointPageAsync(array{
 *     IncludeRawDisplayContent?: string,
 *     PortalProductId?: string,
 *     ProductRestEndpointPageId?: string,
 *     ResourceOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRoute(array $args = [])
 * @phpstan-method \Aws\Result getRoute(array{ApiId?: string, RouteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouteAsync(array{ApiId?: string, RouteId?: string, ...} $args = [])
 * @method \Aws\Result getRouteResponse(array $args = [])
 * @phpstan-method \Aws\Result getRouteResponse(array{ApiId?: string, RouteId?: string, RouteResponseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouteResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouteResponseAsync(array{ApiId?: string, RouteId?: string, RouteResponseId?: string, ...} $args = [])
 * @method \Aws\Result getRouteResponses(array $args = [])
 * @phpstan-method \Aws\Result getRouteResponses(array{ApiId?: string, MaxResults?: string, NextToken?: string, RouteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouteResponsesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouteResponsesAsync(array{ApiId?: string, MaxResults?: string, NextToken?: string, RouteId?: string, ...} $args = [])
 * @method \Aws\Result getRoutes(array $args = [])
 * @phpstan-method \Aws\Result getRoutes(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoutesAsync(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result getRoutingRule(array{DomainName?: string, DomainNameId?: string, RoutingRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoutingRuleAsync(array{DomainName?: string, DomainNameId?: string, RoutingRuleId?: string, ...} $args = [])
 * @method \Aws\Result getStage(array $args = [])
 * @phpstan-method \Aws\Result getStage(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStageAsync(array{ApiId?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result getStages(array $args = [])
 * @phpstan-method \Aws\Result getStages(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStagesAsync(array{ApiId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @phpstan-method \Aws\Result getTags(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagsAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getVpcLink(array $args = [])
 * @phpstan-method \Aws\Result getVpcLink(array{VpcLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVpcLinkAsync(array{VpcLinkId?: string, ...} $args = [])
 * @method \Aws\Result getVpcLinks(array $args = [])
 * @phpstan-method \Aws\Result getVpcLinks(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVpcLinksAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result importApi(array $args = [])
 * @phpstan-method \Aws\Result importApi(array{Basepath?: string, Body?: string, FailOnWarnings?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importApiAsync(array{Basepath?: string, Body?: string, FailOnWarnings?: bool, ...} $args = [])
 * @method \Aws\Result listPortalProducts(array $args = [])
 * @phpstan-method \Aws\Result listPortalProducts(array{MaxResults?: string, NextToken?: string, ResourceOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortalProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortalProductsAsync(array{MaxResults?: string, NextToken?: string, ResourceOwner?: string, ...} $args = [])
 * @method \Aws\Result listPortals(array $args = [])
 * @phpstan-method \Aws\Result listPortals(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortalsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listProductPages(array $args = [])
 * @phpstan-method \Aws\Result listProductPages(array{MaxResults?: string, NextToken?: string, PortalProductId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProductPagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProductPagesAsync(array{MaxResults?: string, NextToken?: string, PortalProductId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result listProductRestEndpointPages(array $args = [])
 * @phpstan-method \Aws\Result listProductRestEndpointPages(array{MaxResults?: string, NextToken?: string, PortalProductId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProductRestEndpointPagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProductRestEndpointPagesAsync(array{MaxResults?: string, NextToken?: string, PortalProductId?: string, ResourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result listRoutingRules(array $args = [])
 * @phpstan-method \Aws\Result listRoutingRules(array{DomainName?: string, DomainNameId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutingRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutingRulesAsync(array{DomainName?: string, DomainNameId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result previewPortal(array $args = [])
 * @phpstan-method \Aws\Result previewPortal(array{PortalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise previewPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise previewPortalAsync(array{PortalId?: string, ...} $args = [])
 * @method \Aws\Result publishPortal(array $args = [])
 * @phpstan-method \Aws\Result publishPortal(array{Description?: string, PortalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishPortalAsync(array{Description?: string, PortalId?: string, ...} $args = [])
 * @method \Aws\Result putPortalProductSharingPolicy(array $args = [])
 * @phpstan-method \Aws\Result putPortalProductSharingPolicy(array{PolicyDocument?: string, PortalProductId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putPortalProductSharingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPortalProductSharingPolicyAsync(array{PolicyDocument?: string, PortalProductId?: string, ...} $args = [])
 * @method \Aws\Result putRoutingRule(array $args = [])
 * @phpstan-method \Aws\Result putRoutingRule(array{
 *     Actions?: list<array{InvokeApi?: array, ...}>,
 *     Conditions?: list<array{MatchBasePaths?: array, MatchHeaders?: array, ...}>,
 *     DomainName?: string,
 *     DomainNameId?: string,
 *     Priority?: int,
 *     RoutingRuleId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRoutingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRoutingRuleAsync(array{
 *     Actions?: list<array{InvokeApi?: array, ...}>,
 *     Conditions?: list<array{MatchBasePaths?: array, MatchHeaders?: array, ...}>,
 *     DomainName?: string,
 *     DomainNameId?: string,
 *     Priority?: int,
 *     RoutingRuleId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result reimportApi(array $args = [])
 * @phpstan-method \Aws\Result reimportApi(array{ApiId?: string, Basepath?: string, Body?: string, FailOnWarnings?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise reimportApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reimportApiAsync(array{ApiId?: string, Basepath?: string, Body?: string, FailOnWarnings?: bool, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApi(array $args = [])
 * @phpstan-method \Aws\Result updateApi(array{
 *     ApiId?: string,
 *     ApiKeySelectionExpression?: string,
 *     CorsConfiguration?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     CredentialsArn?: string,
 *     Description?: string,
 *     DisableSchemaValidation?: bool,
 *     DisableExecuteApiEndpoint?: bool,
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     Name?: string,
 *     RouteKey?: string,
 *     RouteSelectionExpression?: string,
 *     Target?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiAsync(array{
 *     ApiId?: string,
 *     ApiKeySelectionExpression?: string,
 *     CorsConfiguration?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     CredentialsArn?: string,
 *     Description?: string,
 *     DisableSchemaValidation?: bool,
 *     DisableExecuteApiEndpoint?: bool,
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     Name?: string,
 *     RouteKey?: string,
 *     RouteSelectionExpression?: string,
 *     Target?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApiMapping(array $args = [])
 * @phpstan-method \Aws\Result updateApiMapping(array{ApiId?: string, ApiMappingId?: string, ApiMappingKey?: string, DomainName?: string, Stage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiMappingAsync(array{ApiId?: string, ApiMappingId?: string, ApiMappingKey?: string, DomainName?: string, Stage?: string, ...} $args = [])
 * @method \Aws\Result updateAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result updateAuthorizer(array{
 *     ApiId?: string,
 *     AuthorizerCredentialsArn?: string,
 *     AuthorizerId?: string,
 *     AuthorizerResultTtlInSeconds?: int,
 *     AuthorizerType?: 'JWT'|'REQUEST',
 *     AuthorizerUri?: string,
 *     IdentitySource?: list<string>,
 *     IdentityValidationExpression?: string,
 *     JwtConfiguration?: array{Audience?: list<string>, Issuer?: string, ...},
 *     Name?: string,
 *     AuthorizerPayloadFormatVersion?: string,
 *     EnableSimpleResponses?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAuthorizerAsync(array{
 *     ApiId?: string,
 *     AuthorizerCredentialsArn?: string,
 *     AuthorizerId?: string,
 *     AuthorizerResultTtlInSeconds?: int,
 *     AuthorizerType?: 'JWT'|'REQUEST',
 *     AuthorizerUri?: string,
 *     IdentitySource?: list<string>,
 *     IdentityValidationExpression?: string,
 *     JwtConfiguration?: array{Audience?: list<string>, Issuer?: string, ...},
 *     Name?: string,
 *     AuthorizerPayloadFormatVersion?: string,
 *     EnableSimpleResponses?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDeployment(array $args = [])
 * @phpstan-method \Aws\Result updateDeployment(array{ApiId?: string, DeploymentId?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array{ApiId?: string, DeploymentId?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateDomainName(array $args = [])
 * @phpstan-method \Aws\Result updateDomainName(array{
 *     DomainName?: string,
 *     DomainNameConfigurations?: list<array{
 *         ApiGatewayDomainName?: string,
 *         CertificateArn?: string,
 *         CertificateName?: string,
 *         CertificateUploadDate?: int|string|\DateTimeInterface,
 *         DomainNameStatus?: 'AVAILABLE'|'PENDING_CERTIFICATE_REIMPORT'|'PENDING_OWNERSHIP_VERIFICATION'|'UPDATING',
 *         DomainNameStatusMessage?: string,
 *         EndpointType?: 'EDGE'|'REGIONAL',
 *         HostedZoneId?: string,
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         SecurityPolicy?: 'TLS_1_0'|'TLS_1_2',
 *         OwnershipVerificationCertificateArn?: string,
 *         ...,
 *     }>,
 *     MutualTlsAuthentication?: array{TruststoreUri?: string, TruststoreVersion?: string, ...},
 *     RoutingMode?: 'API_MAPPING_ONLY'|'ROUTING_RULE_ONLY'|'ROUTING_RULE_THEN_API_MAPPING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainNameAsync(array{
 *     DomainName?: string,
 *     DomainNameConfigurations?: list<array{
 *         ApiGatewayDomainName?: string,
 *         CertificateArn?: string,
 *         CertificateName?: string,
 *         CertificateUploadDate?: int|string|\DateTimeInterface,
 *         DomainNameStatus?: 'AVAILABLE'|'PENDING_CERTIFICATE_REIMPORT'|'PENDING_OWNERSHIP_VERIFICATION'|'UPDATING',
 *         DomainNameStatusMessage?: string,
 *         EndpointType?: 'EDGE'|'REGIONAL',
 *         HostedZoneId?: string,
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         SecurityPolicy?: 'TLS_1_0'|'TLS_1_2',
 *         OwnershipVerificationCertificateArn?: string,
 *         ...,
 *     }>,
 *     MutualTlsAuthentication?: array{TruststoreUri?: string, TruststoreVersion?: string, ...},
 *     RoutingMode?: 'API_MAPPING_ONLY'|'ROUTING_RULE_ONLY'|'ROUTING_RULE_THEN_API_MAPPING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateIntegration(array{
 *     ApiId?: string,
 *     ConnectionId?: string,
 *     ConnectionType?: 'INTERNET'|'VPC_LINK',
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     CredentialsArn?: string,
 *     Description?: string,
 *     IntegrationId?: string,
 *     IntegrationMethod?: string,
 *     IntegrationSubtype?: string,
 *     IntegrationType?: 'AWS'|'AWS_PROXY'|'HTTP'|'HTTP_PROXY'|'MOCK',
 *     IntegrationUri?: string,
 *     PassthroughBehavior?: 'NEVER'|'WHEN_NO_MATCH'|'WHEN_NO_TEMPLATES',
 *     PayloadFormatVersion?: string,
 *     RequestParameters?: array<string, string>,
 *     ResponseParameters?: array<string, array<string, string>>,
 *     RequestTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     TimeoutInMillis?: int,
 *     TlsConfig?: array{ServerNameToVerify?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array{
 *     ApiId?: string,
 *     ConnectionId?: string,
 *     ConnectionType?: 'INTERNET'|'VPC_LINK',
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     CredentialsArn?: string,
 *     Description?: string,
 *     IntegrationId?: string,
 *     IntegrationMethod?: string,
 *     IntegrationSubtype?: string,
 *     IntegrationType?: 'AWS'|'AWS_PROXY'|'HTTP'|'HTTP_PROXY'|'MOCK',
 *     IntegrationUri?: string,
 *     PassthroughBehavior?: 'NEVER'|'WHEN_NO_MATCH'|'WHEN_NO_TEMPLATES',
 *     PayloadFormatVersion?: string,
 *     RequestParameters?: array<string, string>,
 *     ResponseParameters?: array<string, array<string, string>>,
 *     RequestTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     TimeoutInMillis?: int,
 *     TlsConfig?: array{ServerNameToVerify?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegrationResponse(array $args = [])
 * @phpstan-method \Aws\Result updateIntegrationResponse(array{
 *     ApiId?: string,
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     IntegrationId?: string,
 *     IntegrationResponseId?: string,
 *     IntegrationResponseKey?: string,
 *     ResponseParameters?: array<string, string>,
 *     ResponseTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationResponseAsync(array{
 *     ApiId?: string,
 *     ContentHandlingStrategy?: 'CONVERT_TO_BINARY'|'CONVERT_TO_TEXT',
 *     IntegrationId?: string,
 *     IntegrationResponseId?: string,
 *     IntegrationResponseKey?: string,
 *     ResponseParameters?: array<string, string>,
 *     ResponseTemplates?: array<string, string>,
 *     TemplateSelectionExpression?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateModel(array $args = [])
 * @phpstan-method \Aws\Result updateModel(array{
 *     ApiId?: string,
 *     ContentType?: string,
 *     Description?: string,
 *     ModelId?: string,
 *     Name?: string,
 *     Schema?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelAsync(array{
 *     ApiId?: string,
 *     ContentType?: string,
 *     Description?: string,
 *     ModelId?: string,
 *     Name?: string,
 *     Schema?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePortal(array $args = [])
 * @phpstan-method \Aws\Result updatePortal(array{
 *     Authorization?: array{
 *         CognitoConfig?: array{AppClientId?: string, UserPoolArn?: string, UserPoolDomain?: string, ...},
 *         None?: array,
 *         ...,
 *     },
 *     EndpointConfiguration?: array{AcmManaged?: array{CertificateArn?: string, DomainName?: string, ...}, None?: array, ...},
 *     IncludedPortalProductArns?: list<string>,
 *     LogoUri?: string,
 *     PortalContent?: array{
 *         Description?: string,
 *         DisplayName?: string,
 *         Theme?: array{CustomColors?: array, LogoLastUploaded?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     PortalId?: string,
 *     RumAppMonitorName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortalAsync(array{
 *     Authorization?: array{
 *         CognitoConfig?: array{AppClientId?: string, UserPoolArn?: string, UserPoolDomain?: string, ...},
 *         None?: array,
 *         ...,
 *     },
 *     EndpointConfiguration?: array{AcmManaged?: array{CertificateArn?: string, DomainName?: string, ...}, None?: array, ...},
 *     IncludedPortalProductArns?: list<string>,
 *     LogoUri?: string,
 *     PortalContent?: array{
 *         Description?: string,
 *         DisplayName?: string,
 *         Theme?: array{CustomColors?: array, LogoLastUploaded?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     PortalId?: string,
 *     RumAppMonitorName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePortalProduct(array $args = [])
 * @phpstan-method \Aws\Result updatePortalProduct(array{
 *     Description?: string,
 *     DisplayName?: string,
 *     DisplayOrder?: array{Contents?: list<array>, OverviewPageArn?: string, ProductPageArns?: list<string>, ...},
 *     PortalProductId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortalProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortalProductAsync(array{
 *     Description?: string,
 *     DisplayName?: string,
 *     DisplayOrder?: array{Contents?: list<array>, OverviewPageArn?: string, ProductPageArns?: list<string>, ...},
 *     PortalProductId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProductPage(array $args = [])
 * @phpstan-method \Aws\Result updateProductPage(array{
 *     DisplayContent?: array{Body?: string, Title?: string, ...},
 *     PortalProductId?: string,
 *     ProductPageId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProductPageAsync(array{
 *     DisplayContent?: array{Body?: string, Title?: string, ...},
 *     PortalProductId?: string,
 *     ProductPageId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProductRestEndpointPage(array $args = [])
 * @phpstan-method \Aws\Result updateProductRestEndpointPage(array{
 *     DisplayContent?: array{None?: array, Overrides?: array{Body?: string, Endpoint?: string, OperationName?: string, ...}, ...},
 *     PortalProductId?: string,
 *     ProductRestEndpointPageId?: string,
 *     TryItState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProductRestEndpointPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProductRestEndpointPageAsync(array{
 *     DisplayContent?: array{None?: array, Overrides?: array{Body?: string, Endpoint?: string, OperationName?: string, ...}, ...},
 *     PortalProductId?: string,
 *     ProductRestEndpointPageId?: string,
 *     TryItState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRoute(array $args = [])
 * @phpstan-method \Aws\Result updateRoute(array{
 *     ApiId?: string,
 *     ApiKeyRequired?: bool,
 *     AuthorizationScopes?: list<string>,
 *     AuthorizationType?: 'AWS_IAM'|'CUSTOM'|'JWT'|'NONE',
 *     AuthorizerId?: string,
 *     ModelSelectionExpression?: string,
 *     OperationName?: string,
 *     RequestModels?: array<string, string>,
 *     RequestParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteId?: string,
 *     RouteKey?: string,
 *     RouteResponseSelectionExpression?: string,
 *     Target?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouteAsync(array{
 *     ApiId?: string,
 *     ApiKeyRequired?: bool,
 *     AuthorizationScopes?: list<string>,
 *     AuthorizationType?: 'AWS_IAM'|'CUSTOM'|'JWT'|'NONE',
 *     AuthorizerId?: string,
 *     ModelSelectionExpression?: string,
 *     OperationName?: string,
 *     RequestModels?: array<string, string>,
 *     RequestParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteId?: string,
 *     RouteKey?: string,
 *     RouteResponseSelectionExpression?: string,
 *     Target?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRouteResponse(array $args = [])
 * @phpstan-method \Aws\Result updateRouteResponse(array{
 *     ApiId?: string,
 *     ModelSelectionExpression?: string,
 *     ResponseModels?: array<string, string>,
 *     ResponseParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteId?: string,
 *     RouteResponseId?: string,
 *     RouteResponseKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouteResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouteResponseAsync(array{
 *     ApiId?: string,
 *     ModelSelectionExpression?: string,
 *     ResponseModels?: array<string, string>,
 *     ResponseParameters?: array<string, array{Required?: bool, ...}>,
 *     RouteId?: string,
 *     RouteResponseId?: string,
 *     RouteResponseKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStage(array $args = [])
 * @phpstan-method \Aws\Result updateStage(array{
 *     AccessLogSettings?: array{DestinationArn?: string, Format?: string, ...},
 *     ApiId?: string,
 *     AutoDeploy?: bool,
 *     ClientCertificateId?: string,
 *     DefaultRouteSettings?: array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     },
 *     DeploymentId?: string,
 *     Description?: string,
 *     RouteSettings?: array<string, array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     }>,
 *     StageName?: string,
 *     StageVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStageAsync(array{
 *     AccessLogSettings?: array{DestinationArn?: string, Format?: string, ...},
 *     ApiId?: string,
 *     AutoDeploy?: bool,
 *     ClientCertificateId?: string,
 *     DefaultRouteSettings?: array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     },
 *     DeploymentId?: string,
 *     Description?: string,
 *     RouteSettings?: array<string, array{
 *         DataTraceEnabled?: bool,
 *         DetailedMetricsEnabled?: bool,
 *         LoggingLevel?: 'ERROR'|'INFO'|'OFF',
 *         ThrottlingBurstLimit?: int,
 *         ThrottlingRateLimit?: float,
 *         ...,
 *     }>,
 *     StageName?: string,
 *     StageVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcLink(array $args = [])
 * @phpstan-method \Aws\Result updateVpcLink(array{Name?: string, VpcLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcLinkAsync(array{Name?: string, VpcLinkId?: string, ...} $args = [])
 */
class ApiGatewayV2Client extends AwsClient {}
