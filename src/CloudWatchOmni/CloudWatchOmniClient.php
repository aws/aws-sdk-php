<?php
namespace Aws\CloudWatchOmni;

use Aws\AwsClient;

/**
 * This client is used to interact with the **CloudWatch Omni** service.
 * @method \Aws\Result createAccessGrant(array $args = [])
 * @phpstan-method \Aws\Result createAccessGrant(array{
 *     domainId?: string,
 *     spaceId?: string,
 *     name?: string,
 *     principal?: array{
 *         principalType?: 'ACCESS_PROFILE'|'AGENT'|'ALERT'|'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *         principalId?: string,
 *         principalAttributes?: list<array>,
 *         ...,
 *     },
 *     permission?: 'CUSTOM'|'READ'|'READ_WRITE_DELETE'|'SPACE_ADMIN',
 *     scopedActions?: list<array{actions?: list<string>, resources?: list<array>, contextConditions?: array<string, list<string>>, ...}>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessGrantAsync(array{
 *     domainId?: string,
 *     spaceId?: string,
 *     name?: string,
 *     principal?: array{
 *         principalType?: 'ACCESS_PROFILE'|'AGENT'|'ALERT'|'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *         principalId?: string,
 *         principalAttributes?: list<array>,
 *         ...,
 *     },
 *     permission?: 'CUSTOM'|'READ'|'READ_WRITE_DELETE'|'SPACE_ADMIN',
 *     scopedActions?: list<array{actions?: list<string>, resources?: list<array>, contextConditions?: array<string, list<string>>, ...}>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessProfile(array $args = [])
 * @phpstan-method \Aws\Result createAccessProfile(array{
 *     spaceId?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessProfileAsync(array{
 *     spaceId?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAlert(array $args = [])
 * @phpstan-method \Aws\Result createAlert(array{
 *     spaceId?: string,
 *     profileId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{telemetryRule?: array{query?: array, condition?: array, evaluation?: array, noData?: array, ...}, ...},
 *     notificationsEnabled?: bool,
 *     tags?: array<string, string>,
 *     notificationRules?: list<array{trigger?: array, target?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAlertAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAlertAsync(array{
 *     spaceId?: string,
 *     profileId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{telemetryRule?: array{query?: array, condition?: array, evaluation?: array, noData?: array, ...}, ...},
 *     notificationsEnabled?: bool,
 *     tags?: array<string, string>,
 *     notificationRules?: list<array{trigger?: array, target?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomainAccessGrantForOrganization(array $args = [])
 * @phpstan-method \Aws\Result createDomainAccessGrantForOrganization(array{
 *     domainId?: string,
 *     name?: string,
 *     principal?: array{
 *         principalType?: 'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *         principalId?: string,
 *         principalAttributes?: list<array>,
 *         ...,
 *     },
 *     permission?: 'ADMIN',
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAccessGrantForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAccessGrantForOrganizationAsync(array{
 *     domainId?: string,
 *     name?: string,
 *     principal?: array{
 *         principalType?: 'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *         principalId?: string,
 *         principalAttributes?: list<array>,
 *         ...,
 *     },
 *     permission?: 'ADMIN',
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomainForOrganization(array $args = [])
 * @phpstan-method \Aws\Result createDomainForOrganization(array{
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     domainAccessRoleArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainForOrganizationAsync(array{
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     domainAccessRoleArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegration(array $args = [])
 * @phpstan-method \Aws\Result createIntegration(array{
 *     integrationType?: 'AWS_CONFIG_SLREC'|'AWS_INTEGRATION'|'EXTERNAL_AGENT'|'SLACK',
 *     name?: string,
 *     credential?: array{
 *         oauthCodeCredential?: array{authCode?: string, ...},
 *         oauthClientCredential?: array{clientId?: string, clientSecret?: string, providerId?: string, ...},
 *         apiKeyCredential?: array{apiKeyValue?: string, ...},
 *         ...,
 *     },
 *     integrationAttributes?: array<string, string>,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAsync(array{
 *     integrationType?: 'AWS_CONFIG_SLREC'|'AWS_INTEGRATION'|'EXTERNAL_AGENT'|'SLACK',
 *     name?: string,
 *     credential?: array{
 *         oauthCodeCredential?: array{authCode?: string, ...},
 *         oauthClientCredential?: array{clientId?: string, clientSecret?: string, providerId?: string, ...},
 *         apiKeyCredential?: array{apiKeyValue?: string, ...},
 *         ...,
 *     },
 *     integrationAttributes?: array<string, string>,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOmniDashboard(array $args = [])
 * @phpstan-method \Aws\Result createOmniDashboard(array{
 *     spaceId?: string,
 *     name?: string,
 *     body?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOmniDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOmniDashboardAsync(array{
 *     spaceId?: string,
 *     name?: string,
 *     body?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOneTimeDeepLinkCode(array $args = [])
 * @phpstan-method \Aws\Result createOneTimeDeepLinkCode(array{domainId?: string, ttlSeconds?: int, redirectUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createOneTimeDeepLinkCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOneTimeDeepLinkCodeAsync(array{domainId?: string, ttlSeconds?: int, redirectUrl?: string, ...} $args = [])
 * @method \Aws\Result createSpace(array $args = [])
 * @phpstan-method \Aws\Result createSpace(array{
 *     name?: string,
 *     domainId?: string,
 *     dataAccessRoleArn?: string,
 *     agentCoreEvaluationRoleArn?: string,
 *     encryptionConfiguration?: array{encryptionStrategy?: 'AWS_OWNED'|'CUSTOMER_MANAGED', kmsKeyArn?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSpaceAsync(array{
 *     name?: string,
 *     domainId?: string,
 *     dataAccessRoleArn?: string,
 *     agentCoreEvaluationRoleArn?: string,
 *     encryptionConfiguration?: array{encryptionStrategy?: 'AWS_OWNED'|'CUSTOMER_MANAGED', kmsKeyArn?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createView(array $args = [])
 * @phpstan-method \Aws\Result createView(array{
 *     name?: string,
 *     definition?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createViewAsync(array{
 *     name?: string,
 *     definition?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessGrant(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessGrant(array{grantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessGrantAsync(array{grantId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccessProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessProfile(array{spaceId?: string, profileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessProfileAsync(array{spaceId?: string, profileId?: string, ...} $args = [])
 * @method \Aws\Result deleteAlert(array $args = [])
 * @phpstan-method \Aws\Result deleteAlert(array{spaceId?: string, alertId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAlertAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlertAsync(array{spaceId?: string, alertId?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainAccessGrantForOrganization(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainAccessGrantForOrganization(array{grantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAccessGrantForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAccessGrantForOrganizationAsync(array{grantId?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainForOrganization(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainForOrganization(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainForOrganizationAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{identifier?: array{integrationId?: string, integrationArn?: string, integrationName?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{identifier?: array{integrationId?: string, integrationArn?: string, integrationName?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteOmniDashboard(array $args = [])
 * @phpstan-method \Aws\Result deleteOmniDashboard(array{spaceId?: string, dashboardId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOmniDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOmniDashboardAsync(array{spaceId?: string, dashboardId?: string, ...} $args = [])
 * @method \Aws\Result deleteSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteSpace(array{spaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array{spaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteView(array $args = [])
 * @phpstan-method \Aws\Result deleteView(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteViewAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getAccessGrant(array $args = [])
 * @phpstan-method \Aws\Result getAccessGrant(array{grantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessGrantAsync(array{grantId?: string, ...} $args = [])
 * @method \Aws\Result getAccessProfile(array $args = [])
 * @phpstan-method \Aws\Result getAccessProfile(array{spaceId?: string, profileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessProfileAsync(array{spaceId?: string, profileId?: string, ...} $args = [])
 * @method \Aws\Result getAlert(array $args = [])
 * @phpstan-method \Aws\Result getAlert(array{spaceId?: string, alertId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAlertAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAlertAsync(array{spaceId?: string, alertId?: string, ...} $args = [])
 * @method \Aws\Result getContextGraph(array $args = [])
 * @phpstan-method \Aws\Result getContextGraph(array{
 *     nodeFilters?: array{
 *         nodeId?: string,
 *         nodeType?: 'REMOTE_SERVICE'|'RESOURCE'|'SERVICE',
 *         name?: string,
 *         tags?: list<array>,
 *         telemetryAttributes?: list<array>,
 *         region?: list<string>,
 *         cloudProvider?: list<string>,
 *         sourceAccountId?: list<string>,
 *         namespace?: list<string>,
 *         category?: list<'COMPUTE'|'DATABASE'|'GEN_AI_AGENT'|'GEN_AI_MODEL'|'MESSAGING_QUEUE'|'NETWORK'|'STORAGE'>,
 *         stage?: list<string>,
 *         sources?: list<'AWS_INTEGRATION'|'AZURE_VNET_FLOW_LOG'|'CLOUDFRONT_ACCESS_LOG'|'CLOUDTRAIL'|'CODE_SEMANTICS'|'CONFIG'|'ELB_ACCESS_LOG'|'IAM_POLICY'|'S3_ACCESS_LOG'|'TELEMETRY'|'VPC_FLOW_LOG'|'WAF_ACCESS_LOG'>,
 *         ...,
 *     },
 *     edgeFilters?: array{
 *         edgeId?: string,
 *         from?: string,
 *         to?: string,
 *         edgeType?: 'ACCESSES'|'CALLS'|'RUNS_ON',
 *         operations?: list<string>,
 *         telemetryAttributes?: list<array>,
 *         sources?: list<'AWS_INTEGRATION'|'AZURE_VNET_FLOW_LOG'|'CLOUDFRONT_ACCESS_LOG'|'CLOUDTRAIL'|'CODE_SEMANTICS'|'CONFIG'|'ELB_ACCESS_LOG'|'IAM_POLICY'|'S3_ACCESS_LOG'|'TELEMETRY'|'VPC_FLOW_LOG'|'WAF_ACCESS_LOG'>,
 *         ...,
 *     },
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     depth?: int,
 *     maxResults?: int,
 *     maxEdgesPerNode?: int,
 *     includeMetadata?: bool,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getContextGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContextGraphAsync(array{
 *     nodeFilters?: array{
 *         nodeId?: string,
 *         nodeType?: 'REMOTE_SERVICE'|'RESOURCE'|'SERVICE',
 *         name?: string,
 *         tags?: list<array>,
 *         telemetryAttributes?: list<array>,
 *         region?: list<string>,
 *         cloudProvider?: list<string>,
 *         sourceAccountId?: list<string>,
 *         namespace?: list<string>,
 *         category?: list<'COMPUTE'|'DATABASE'|'GEN_AI_AGENT'|'GEN_AI_MODEL'|'MESSAGING_QUEUE'|'NETWORK'|'STORAGE'>,
 *         stage?: list<string>,
 *         sources?: list<'AWS_INTEGRATION'|'AZURE_VNET_FLOW_LOG'|'CLOUDFRONT_ACCESS_LOG'|'CLOUDTRAIL'|'CODE_SEMANTICS'|'CONFIG'|'ELB_ACCESS_LOG'|'IAM_POLICY'|'S3_ACCESS_LOG'|'TELEMETRY'|'VPC_FLOW_LOG'|'WAF_ACCESS_LOG'>,
 *         ...,
 *     },
 *     edgeFilters?: array{
 *         edgeId?: string,
 *         from?: string,
 *         to?: string,
 *         edgeType?: 'ACCESSES'|'CALLS'|'RUNS_ON',
 *         operations?: list<string>,
 *         telemetryAttributes?: list<array>,
 *         sources?: list<'AWS_INTEGRATION'|'AZURE_VNET_FLOW_LOG'|'CLOUDFRONT_ACCESS_LOG'|'CLOUDTRAIL'|'CODE_SEMANTICS'|'CONFIG'|'ELB_ACCESS_LOG'|'IAM_POLICY'|'S3_ACCESS_LOG'|'TELEMETRY'|'VPC_FLOW_LOG'|'WAF_ACCESS_LOG'>,
 *         ...,
 *     },
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     depth?: int,
 *     maxResults?: int,
 *     maxEdgesPerNode?: int,
 *     includeMetadata?: bool,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDomain(array $args = [])
 * @phpstan-method \Aws\Result getDomain(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result getDomainAccessGrantForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getDomainAccessGrantForOrganization(array{grantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAccessGrantForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAccessGrantForOrganizationAsync(array{grantId?: string, ...} $args = [])
 * @method \Aws\Result getDomainForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getDomainForOrganization(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainForOrganizationAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @phpstan-method \Aws\Result getIntegration(array{identifier?: array{integrationId?: string, integrationArn?: string, integrationName?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationAsync(array{identifier?: array{integrationId?: string, integrationArn?: string, integrationName?: string, ...}, ...} $args = [])
 * @method \Aws\Result getIntelligenceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getIntelligenceConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntelligenceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntelligenceConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getOmniDashboard(array $args = [])
 * @phpstan-method \Aws\Result getOmniDashboard(array{spaceId?: string, dashboardId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOmniDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOmniDashboardAsync(array{spaceId?: string, dashboardId?: string, ...} $args = [])
 * @method \Aws\Result getSpace(array $args = [])
 * @phpstan-method \Aws\Result getSpace(array{spaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpaceAsync(array{spaceId?: string, ...} $args = [])
 * @method \Aws\Result getSpaceCredentialsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getSpaceCredentialsForOrganization(array{
 *     context?: array{spaceId?: string, domainId?: string, targetAccountId?: string, ...},
 *     credentialType?: 'SPACE_OPERATION',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpaceCredentialsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpaceCredentialsForOrganizationAsync(array{
 *     context?: array{spaceId?: string, domainId?: string, targetAccountId?: string, ...},
 *     credentialType?: 'SPACE_OPERATION',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTelemetryQueryResults(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryQueryResults(array{queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryQueryResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryQueryResultsAsync(array{queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getView(array $args = [])
 * @phpstan-method \Aws\Result getView(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getViewAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result listAccessGrants(array $args = [])
 * @phpstan-method \Aws\Result listAccessGrants(array{
 *     domainId?: string,
 *     spaceId?: string,
 *     principalId?: string,
 *     principalType?: 'ACCESS_PROFILE'|'AGENT'|'ALERT'|'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *     permission?: 'CUSTOM'|'READ'|'READ_WRITE_DELETE'|'SPACE_ADMIN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessGrantsAsync(array{
 *     domainId?: string,
 *     spaceId?: string,
 *     principalId?: string,
 *     principalType?: 'ACCESS_PROFILE'|'AGENT'|'ALERT'|'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *     permission?: 'CUSTOM'|'READ'|'READ_WRITE_DELETE'|'SPACE_ADMIN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccessProfiles(array $args = [])
 * @phpstan-method \Aws\Result listAccessProfiles(array{spaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessProfilesAsync(array{spaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAlerts(array $args = [])
 * @phpstan-method \Aws\Result listAlerts(array{
 *     spaceId?: string,
 *     filterCriteria?: array{
 *         names?: list<string>,
 *         namePrefix?: string,
 *         ids?: list<string>,
 *         stateValue?: list<'CRITICAL'|'NODATA'|'OK'|'WARNING'>,
 *         notificationsEnabled?: bool,
 *         ...,
 *     },
 *     sortBy?: 'NAME'|'STATE',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAlertsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAlertsAsync(array{
 *     spaceId?: string,
 *     filterCriteria?: array{
 *         names?: list<string>,
 *         namePrefix?: string,
 *         ids?: list<string>,
 *         stateValue?: list<'CRITICAL'|'NODATA'|'OK'|'WARNING'>,
 *         notificationsEnabled?: bool,
 *         ...,
 *     },
 *     sortBy?: 'NAME'|'STATE',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDomainAccessGrantsForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listDomainAccessGrantsForOrganization(array{
 *     domainId?: string,
 *     principalId?: string,
 *     principalType?: 'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *     permission?: 'ADMIN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainAccessGrantsForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainAccessGrantsForOrganizationAsync(array{
 *     domainId?: string,
 *     principalId?: string,
 *     principalType?: 'IAM_ROLE'|'IAM_ROOT'|'IAM_USER'|'IDC_GROUP'|'IDC_USER',
 *     permission?: 'ADMIN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listIntegrations(array{
 *     integrationType?: 'AWS_CONFIG_SLREC'|'AWS_INTEGRATION'|'EXTERNAL_AGENT'|'SLACK',
 *     status?: 'ACTIVE'|'DELETED'|'ERROR'|'FAILED'|'PENDING'|'PENDING_OAUTH',
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array{
 *     integrationType?: 'AWS_CONFIG_SLREC'|'AWS_INTEGRATION'|'EXTERNAL_AGENT'|'SLACK',
 *     status?: 'ACTIVE'|'DELETED'|'ERROR'|'FAILED'|'PENDING'|'PENDING_OAUTH',
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOmniDashboards(array $args = [])
 * @phpstan-method \Aws\Result listOmniDashboards(array{spaceId?: string, namePrefix?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOmniDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOmniDashboardsAsync(array{spaceId?: string, namePrefix?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSpaces(array $args = [])
 * @phpstan-method \Aws\Result listSpaces(array{domainId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpacesAsync(array{domainId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSpacesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listSpacesForOrganization(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpacesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpacesForOrganizationAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTelemetryFields(array $args = [])
 * @phpstan-method \Aws\Result listTelemetryFields(array{
 *     dataSetName?: string,
 *     telemetryType?: 'LOGS'|'TRACES',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTelemetryFieldsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTelemetryFieldsAsync(array{
 *     dataSetName?: string,
 *     telemetryType?: 'LOGS'|'TRACES',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTelemetryQuerySessions(array $args = [])
 * @phpstan-method \Aws\Result listTelemetryQuerySessions(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTelemetryQuerySessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTelemetryQuerySessionsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listViews(array $args = [])
 * @phpstan-method \Aws\Result listViews(array{type?: 'MANAGED'|'USER', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listViewsAsync(array{type?: 'MANAGED'|'USER', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result putIntelligenceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putIntelligenceConfiguration(array{kmsKeyArn?: string, removeKmsKey?: bool, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putIntelligenceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIntelligenceConfigurationAsync(array{kmsKeyArn?: string, removeKmsKey?: bool, clientToken?: string, ...} $args = [])
 * @method \Aws\Result searchPrincipals(array $args = [])
 * @phpstan-method \Aws\Result searchPrincipals(array{domainId?: string, searchQuery?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchPrincipalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchPrincipalsAsync(array{domainId?: string, searchQuery?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result startTelemetryQuery(array $args = [])
 * @phpstan-method \Aws\Result startTelemetryQuery(array{queryString?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTelemetryQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTelemetryQueryAsync(array{queryString?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result startTelemetryQuerySession(array $args = [])
 * @phpstan-method \Aws\Result startTelemetryQuerySession(array{sessionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTelemetryQuerySessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTelemetryQuerySessionAsync(array{sessionName?: string, ...} $args = [])
 * @method \Aws\Result stopTelemetryQuery(array $args = [])
 * @phpstan-method \Aws\Result stopTelemetryQuery(array{queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTelemetryQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTelemetryQueryAsync(array{queryId?: string, ...} $args = [])
 * @method \Aws\Result stopTelemetryQuerySession(array $args = [])
 * @phpstan-method \Aws\Result stopTelemetryQuerySession(array{sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTelemetryQuerySessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTelemetryQuerySessionAsync(array{sessionId?: string, ...} $args = [])
 * @method \Aws\Result updateAccessProfile(array $args = [])
 * @phpstan-method \Aws\Result updateAccessProfile(array{spaceId?: string, profileId?: string, name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessProfileAsync(array{spaceId?: string, profileId?: string, name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateAlert(array $args = [])
 * @phpstan-method \Aws\Result updateAlert(array{
 *     spaceId?: string,
 *     alertId?: string,
 *     profileId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{telemetryRule?: array{query?: array, condition?: array, evaluation?: array, noData?: array, ...}, ...},
 *     notificationsEnabled?: bool,
 *     notificationRules?: list<array{trigger?: array, target?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAlertAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAlertAsync(array{
 *     spaceId?: string,
 *     alertId?: string,
 *     profileId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{telemetryRule?: array{query?: array, condition?: array, evaluation?: array, noData?: array, ...}, ...},
 *     notificationsEnabled?: bool,
 *     notificationRules?: list<array{trigger?: array, target?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomain(array $args = [])
 * @phpstan-method \Aws\Result updateDomain(array{
 *     domainId?: string,
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainAsync(array{
 *     domainId?: string,
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainForOrganization(array $args = [])
 * @phpstan-method \Aws\Result updateDomainForOrganization(array{
 *     domainId?: string,
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainForOrganizationAsync(array{
 *     domainId?: string,
 *     name?: string,
 *     identityProviders?: list<'IAM'|'IDC'>,
 *     identityProviderConfiguration?: array{identityCenterConfiguration?: array{identityCenterInstanceArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateIntegration(array{
 *     identifier?: array{integrationId?: string, integrationArn?: string, integrationName?: string, ...},
 *     credential?: array{
 *         oauthCodeCredential?: array{authCode?: string, ...},
 *         oauthClientCredential?: array{clientId?: string, clientSecret?: string, providerId?: string, ...},
 *         apiKeyCredential?: array{apiKeyValue?: string, ...},
 *         ...,
 *     },
 *     integrationAttributes?: array<string, string>,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array{
 *     identifier?: array{integrationId?: string, integrationArn?: string, integrationName?: string, ...},
 *     credential?: array{
 *         oauthCodeCredential?: array{authCode?: string, ...},
 *         oauthClientCredential?: array{clientId?: string, clientSecret?: string, providerId?: string, ...},
 *         apiKeyCredential?: array{apiKeyValue?: string, ...},
 *         ...,
 *     },
 *     integrationAttributes?: array<string, string>,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOmniDashboard(array $args = [])
 * @phpstan-method \Aws\Result updateOmniDashboard(array{spaceId?: string, dashboardId?: string, body?: string, name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOmniDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOmniDashboardAsync(array{spaceId?: string, dashboardId?: string, body?: string, name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateSpace(array $args = [])
 * @phpstan-method \Aws\Result updateSpace(array{
 *     spaceId?: string,
 *     name?: string,
 *     encryptionConfiguration?: array{encryptionStrategy?: 'AWS_OWNED'|'CUSTOMER_MANAGED', kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpaceAsync(array{
 *     spaceId?: string,
 *     name?: string,
 *     encryptionConfiguration?: array{encryptionStrategy?: 'AWS_OWNED'|'CUSTOMER_MANAGED', kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateView(array $args = [])
 * @phpstan-method \Aws\Result updateView(array{name?: string, definition?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateViewAsync(array{name?: string, definition?: string, description?: string, ...} $args = [])
 */
class CloudWatchOmniClient extends AwsClient {}
