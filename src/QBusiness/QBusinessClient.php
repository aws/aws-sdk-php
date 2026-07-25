<?php
namespace Aws\QBusiness;

use Aws\AwsClient;

/**
 * This client is used to interact with the **QBusiness** service.
 * @method \Aws\Result associatePermission(array $args = [])
 * @phpstan-method \Aws\Result associatePermission(array{
 *     applicationId?: string,
 *     statementId?: string,
 *     actions?: list<string>,
 *     conditions?: list<array{conditionOperator?: 'StringEquals', conditionKey?: string, conditionValues?: list<string>, ...}>,
 *     principal?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePermissionAsync(array{
 *     applicationId?: string,
 *     statementId?: string,
 *     actions?: list<string>,
 *     conditions?: list<array{conditionOperator?: 'StringEquals', conditionKey?: string, conditionValues?: list<string>, ...}>,
 *     principal?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteDocument(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteDocument(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     documents?: list<array{documentId?: string, ...}>,
 *     dataSourceSyncId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteDocumentAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     documents?: list<array{documentId?: string, ...}>,
 *     dataSourceSyncId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchPutDocument(array $args = [])
 * @phpstan-method \Aws\Result batchPutDocument(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     documents?: list<array{
 *         id?: string,
 *         attributes?: list<array>,
 *         content?: array,
 *         contentType?: 'CSV'|'HTML'|'JSON'|'MD'|'MS_EXCEL'|'MS_WORD'|'PDF'|'PLAIN_TEXT'|'PPT'|'RTF'|'XML'|'XSLT',
 *         title?: string,
 *         accessConfiguration?: array,
 *         documentEnrichmentConfiguration?: array,
 *         mediaExtractionConfiguration?: array,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     dataSourceSyncId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutDocumentAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     documents?: list<array{
 *         id?: string,
 *         attributes?: list<array>,
 *         content?: array,
 *         contentType?: 'CSV'|'HTML'|'JSON'|'MD'|'MS_EXCEL'|'MS_WORD'|'PDF'|'PLAIN_TEXT'|'PPT'|'RTF'|'XML'|'XSLT',
 *         title?: string,
 *         accessConfiguration?: array,
 *         documentEnrichmentConfiguration?: array,
 *         mediaExtractionConfiguration?: array,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     dataSourceSyncId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelSubscription(array $args = [])
 * @phpstan-method \Aws\Result cancelSubscription(array{applicationId?: string, subscriptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelSubscriptionAsync(array{applicationId?: string, subscriptionId?: string, ...} $args = [])
 * @method \Aws\Result chatSync(array $args = [])
 * @phpstan-method \Aws\Result chatSync(array{
 *     applicationId?: string,
 *     userId?: string,
 *     userGroups?: list<string>,
 *     userMessage?: string,
 *     attachments?: list<array{data?: string|resource|\Psr\Http\Message\StreamInterface, name?: string, copyFrom?: array, ...}>,
 *     actionExecution?: array{pluginId?: string, payload?: array<string, array>, payloadFieldNameSeparator?: string, ...},
 *     authChallengeResponse?: array{responseMap?: array<string, string>, ...},
 *     conversationId?: string,
 *     parentMessageId?: string,
 *     attributeFilter?: array{
 *         andAllFilters?: list<array>,
 *         orAllFilters?: list<array>,
 *         notFilter?: array,
 *         equalsTo?: array{name?: string, value?: array, ...},
 *         containsAll?: array{name?: string, value?: array, ...},
 *         containsAny?: array{name?: string, value?: array, ...},
 *         greaterThan?: array{name?: string, value?: array, ...},
 *         greaterThanOrEquals?: array{name?: string, value?: array, ...},
 *         lessThan?: array{name?: string, value?: array, ...},
 *         lessThanOrEquals?: array{name?: string, value?: array, ...},
 *         ...,
 *     },
 *     chatMode?: 'CREATOR_MODE'|'PLUGIN_MODE'|'RETRIEVAL_MODE',
 *     chatModeConfiguration?: array{pluginConfiguration?: array{pluginId?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise chatSyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise chatSyncAsync(array{
 *     applicationId?: string,
 *     userId?: string,
 *     userGroups?: list<string>,
 *     userMessage?: string,
 *     attachments?: list<array{data?: string|resource|\Psr\Http\Message\StreamInterface, name?: string, copyFrom?: array, ...}>,
 *     actionExecution?: array{pluginId?: string, payload?: array<string, array>, payloadFieldNameSeparator?: string, ...},
 *     authChallengeResponse?: array{responseMap?: array<string, string>, ...},
 *     conversationId?: string,
 *     parentMessageId?: string,
 *     attributeFilter?: array{
 *         andAllFilters?: list<array>,
 *         orAllFilters?: list<array>,
 *         notFilter?: array,
 *         equalsTo?: array{name?: string, value?: array, ...},
 *         containsAll?: array{name?: string, value?: array, ...},
 *         containsAny?: array{name?: string, value?: array, ...},
 *         greaterThan?: array{name?: string, value?: array, ...},
 *         greaterThanOrEquals?: array{name?: string, value?: array, ...},
 *         lessThan?: array{name?: string, value?: array, ...},
 *         lessThanOrEquals?: array{name?: string, value?: array, ...},
 *         ...,
 *     },
 *     chatMode?: 'CREATOR_MODE'|'PLUGIN_MODE'|'RETRIEVAL_MODE',
 *     chatModeConfiguration?: array{pluginConfiguration?: array{pluginId?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result checkDocumentAccess(array $args = [])
 * @phpstan-method \Aws\Result checkDocumentAccess(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     userId?: string,
 *     documentId?: string,
 *     dataSourceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkDocumentAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkDocumentAccessAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     userId?: string,
 *     documentId?: string,
 *     dataSourceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnonymousWebExperienceUrl(array $args = [])
 * @phpstan-method \Aws\Result createAnonymousWebExperienceUrl(array{applicationId?: string, webExperienceId?: string, sessionDurationInMinutes?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnonymousWebExperienceUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnonymousWebExperienceUrlAsync(array{applicationId?: string, webExperienceId?: string, sessionDurationInMinutes?: int, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     displayName?: string,
 *     roleArn?: string,
 *     identityType?: 'ANONYMOUS'|'AWS_IAM_IDC'|'AWS_IAM_IDP_OIDC'|'AWS_IAM_IDP_SAML'|'AWS_QUICKSIGHT_IDP',
 *     iamIdentityProviderArn?: string,
 *     identityCenterInstanceArn?: string,
 *     clientIdsForOIDC?: list<string>,
 *     description?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     attachmentsConfiguration?: array{attachmentsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     qAppsConfiguration?: array{qAppsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     personalizationConfiguration?: array{personalizationControlMode?: 'DISABLED'|'ENABLED', ...},
 *     quickSightConfiguration?: array{clientNamespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     displayName?: string,
 *     roleArn?: string,
 *     identityType?: 'ANONYMOUS'|'AWS_IAM_IDC'|'AWS_IAM_IDP_OIDC'|'AWS_IAM_IDP_SAML'|'AWS_QUICKSIGHT_IDP',
 *     iamIdentityProviderArn?: string,
 *     identityCenterInstanceArn?: string,
 *     clientIdsForOIDC?: list<string>,
 *     description?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     attachmentsConfiguration?: array{attachmentsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     qAppsConfiguration?: array{qAppsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     personalizationConfiguration?: array{personalizationControlMode?: 'DISABLED'|'ENABLED', ...},
 *     quickSightConfiguration?: array{clientNamespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChatResponseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createChatResponseConfiguration(array{
 *     applicationId?: string,
 *     displayName?: string,
 *     clientToken?: string,
 *     responseConfigurations?: array<string, array{instructionCollection?: array, ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChatResponseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChatResponseConfigurationAsync(array{
 *     applicationId?: string,
 *     displayName?: string,
 *     clientToken?: string,
 *     responseConfigurations?: array<string, array{instructionCollection?: array, ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataAccessor(array $args = [])
 * @phpstan-method \Aws\Result createDataAccessor(array{
 *     applicationId?: string,
 *     principal?: string,
 *     actionConfigurations?: list<array{action?: string, filterConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     displayName?: string,
 *     authenticationDetail?: array{
 *         authenticationType?: 'AWS_IAM_IDC_AUTH_CODE'|'AWS_IAM_IDC_TTI',
 *         authenticationConfiguration?: array{idcTrustedTokenIssuerConfiguration?: array, ...},
 *         externalIds?: list<string>,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataAccessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataAccessorAsync(array{
 *     applicationId?: string,
 *     principal?: string,
 *     actionConfigurations?: list<array{action?: string, filterConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     displayName?: string,
 *     authenticationDetail?: array{
 *         authenticationType?: 'AWS_IAM_IDC_AUTH_CODE'|'AWS_IAM_IDC_TTI',
 *         authenticationConfiguration?: array{idcTrustedTokenIssuerConfiguration?: array, ...},
 *         externalIds?: list<string>,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSource(array $args = [])
 * @phpstan-method \Aws\Result createDataSource(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     displayName?: string,
 *     configuration?: array,
 *     vpcConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     syncSchedule?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     documentEnrichmentConfiguration?: array{
 *         inlineConfigurations?: list<array>,
 *         preExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         postExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     mediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{videoExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     displayName?: string,
 *     configuration?: array,
 *     vpcConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     syncSchedule?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     documentEnrichmentConfiguration?: array{
 *         inlineConfigurations?: list<array>,
 *         preExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         postExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     mediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{videoExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIndex(array $args = [])
 * @phpstan-method \Aws\Result createIndex(array{
 *     applicationId?: string,
 *     displayName?: string,
 *     description?: string,
 *     type?: 'ENTERPRISE'|'STARTER',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     capacityConfiguration?: array{units?: int, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIndexAsync(array{
 *     applicationId?: string,
 *     displayName?: string,
 *     description?: string,
 *     type?: 'ENTERPRISE'|'STARTER',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     capacityConfiguration?: array{units?: int, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPlugin(array $args = [])
 * @phpstan-method \Aws\Result createPlugin(array{
 *     applicationId?: string,
 *     displayName?: string,
 *     type?: 'ASANA'|'ATLASSIAN_CONFLUENCE'|'CUSTOM'|'GOOGLE_CALENDAR'|'JIRA'|'JIRA_CLOUD'|'MICROSOFT_EXCHANGE'|'MICROSOFT_TEAMS'|'PAGERDUTY_ADVANCE'|'QUICKSIGHT'|'SALESFORCE'|'SALESFORCE_CRM'|'SERVICENOW_NOW_PLATFORM'|'SERVICE_NOW'|'SMARTSHEET'|'ZENDESK'|'ZENDESK_SUITE',
 *     authConfiguration?: array{
 *         basicAuthConfiguration?: array{secretArn?: string, roleArn?: string, ...},
 *         oAuth2ClientCredentialConfiguration?: array{secretArn?: string, roleArn?: string, authorizationUrl?: string, tokenUrl?: string, ...},
 *         noAuthConfiguration?: array,
 *         idcAuthConfiguration?: array{idcApplicationArn?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     serverUrl?: string,
 *     customPluginConfiguration?: array{
 *         description?: string,
 *         apiSchemaType?: 'OPEN_API_V3',
 *         apiSchema?: array{payload?: string, s3?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPluginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPluginAsync(array{
 *     applicationId?: string,
 *     displayName?: string,
 *     type?: 'ASANA'|'ATLASSIAN_CONFLUENCE'|'CUSTOM'|'GOOGLE_CALENDAR'|'JIRA'|'JIRA_CLOUD'|'MICROSOFT_EXCHANGE'|'MICROSOFT_TEAMS'|'PAGERDUTY_ADVANCE'|'QUICKSIGHT'|'SALESFORCE'|'SALESFORCE_CRM'|'SERVICENOW_NOW_PLATFORM'|'SERVICE_NOW'|'SMARTSHEET'|'ZENDESK'|'ZENDESK_SUITE',
 *     authConfiguration?: array{
 *         basicAuthConfiguration?: array{secretArn?: string, roleArn?: string, ...},
 *         oAuth2ClientCredentialConfiguration?: array{secretArn?: string, roleArn?: string, authorizationUrl?: string, tokenUrl?: string, ...},
 *         noAuthConfiguration?: array,
 *         idcAuthConfiguration?: array{idcApplicationArn?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     serverUrl?: string,
 *     customPluginConfiguration?: array{
 *         description?: string,
 *         apiSchemaType?: 'OPEN_API_V3',
 *         apiSchema?: array{payload?: string, s3?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRetriever(array $args = [])
 * @phpstan-method \Aws\Result createRetriever(array{
 *     applicationId?: string,
 *     type?: 'KENDRA_INDEX'|'NATIVE_INDEX',
 *     displayName?: string,
 *     configuration?: array{
 *         nativeIndexConfiguration?: array{indexId?: string, version?: int, boostingOverride?: array<string, array>, ...},
 *         kendraIndexConfiguration?: array{indexId?: string, ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRetrieverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRetrieverAsync(array{
 *     applicationId?: string,
 *     type?: 'KENDRA_INDEX'|'NATIVE_INDEX',
 *     displayName?: string,
 *     configuration?: array{
 *         nativeIndexConfiguration?: array{indexId?: string, version?: int, boostingOverride?: array<string, array>, ...},
 *         kendraIndexConfiguration?: array{indexId?: string, ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscription(array $args = [])
 * @phpstan-method \Aws\Result createSubscription(array{
 *     applicationId?: string,
 *     principal?: array{user?: string, group?: string, ...},
 *     type?: 'Q_BUSINESS'|'Q_LITE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionAsync(array{
 *     applicationId?: string,
 *     principal?: array{user?: string, group?: string, ...},
 *     type?: 'Q_BUSINESS'|'Q_LITE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     applicationId?: string,
 *     userId?: string,
 *     userAliases?: list<array{indexId?: string, dataSourceId?: string, userId?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     applicationId?: string,
 *     userId?: string,
 *     userAliases?: list<array{indexId?: string, dataSourceId?: string, userId?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebExperience(array $args = [])
 * @phpstan-method \Aws\Result createWebExperience(array{
 *     applicationId?: string,
 *     title?: string,
 *     subtitle?: string,
 *     welcomeMessage?: string,
 *     samplePromptsControlMode?: 'DISABLED'|'ENABLED',
 *     origins?: list<string>,
 *     roleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     identityProviderConfiguration?: array{
 *         samlConfiguration?: array{authenticationUrl?: string, ...},
 *         openIDConnectConfiguration?: array{secretsArn?: string, secretsRole?: string, ...},
 *         ...,
 *     },
 *     browserExtensionConfiguration?: array{enabledBrowserExtensions?: list<'CHROME'|'FIREFOX'>, ...},
 *     customizationConfiguration?: array{customCSSUrl?: string, logoUrl?: string, fontUrl?: string, faviconUrl?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebExperienceAsync(array{
 *     applicationId?: string,
 *     title?: string,
 *     subtitle?: string,
 *     welcomeMessage?: string,
 *     samplePromptsControlMode?: 'DISABLED'|'ENABLED',
 *     origins?: list<string>,
 *     roleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     identityProviderConfiguration?: array{
 *         samlConfiguration?: array{authenticationUrl?: string, ...},
 *         openIDConnectConfiguration?: array{secretsArn?: string, secretsRole?: string, ...},
 *         ...,
 *     },
 *     browserExtensionConfiguration?: array{enabledBrowserExtensions?: list<'CHROME'|'FIREFOX'>, ...},
 *     customizationConfiguration?: array{customCSSUrl?: string, logoUrl?: string, fontUrl?: string, faviconUrl?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteAttachment(array $args = [])
 * @phpstan-method \Aws\Result deleteAttachment(array{applicationId?: string, conversationId?: string, attachmentId?: string, userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttachmentAsync(array{applicationId?: string, conversationId?: string, attachmentId?: string, userId?: string, ...} $args = [])
 * @method \Aws\Result deleteChatControlsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteChatControlsConfiguration(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChatControlsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChatControlsConfigurationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteChatResponseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteChatResponseConfiguration(array{applicationId?: string, chatResponseConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChatResponseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChatResponseConfigurationAsync(array{applicationId?: string, chatResponseConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result deleteConversation(array $args = [])
 * @phpstan-method \Aws\Result deleteConversation(array{conversationId?: string, applicationId?: string, userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConversationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConversationAsync(array{conversationId?: string, applicationId?: string, userId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataAccessor(array $args = [])
 * @phpstan-method \Aws\Result deleteDataAccessor(array{applicationId?: string, dataAccessorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataAccessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataAccessorAsync(array{applicationId?: string, dataAccessorId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{applicationId?: string, indexId?: string, dataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{applicationId?: string, indexId?: string, dataSourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{applicationId?: string, indexId?: string, groupName?: string, dataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{applicationId?: string, indexId?: string, groupName?: string, dataSourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteIndex(array $args = [])
 * @phpstan-method \Aws\Result deleteIndex(array{applicationId?: string, indexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexAsync(array{applicationId?: string, indexId?: string, ...} $args = [])
 * @method \Aws\Result deletePlugin(array $args = [])
 * @phpstan-method \Aws\Result deletePlugin(array{applicationId?: string, pluginId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePluginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePluginAsync(array{applicationId?: string, pluginId?: string, ...} $args = [])
 * @method \Aws\Result deleteRetriever(array $args = [])
 * @phpstan-method \Aws\Result deleteRetriever(array{applicationId?: string, retrieverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRetrieverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRetrieverAsync(array{applicationId?: string, retrieverId?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{applicationId?: string, userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{applicationId?: string, userId?: string, ...} $args = [])
 * @method \Aws\Result deleteWebExperience(array $args = [])
 * @phpstan-method \Aws\Result deleteWebExperience(array{applicationId?: string, webExperienceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebExperienceAsync(array{applicationId?: string, webExperienceId?: string, ...} $args = [])
 * @method \Aws\Result disassociatePermission(array $args = [])
 * @phpstan-method \Aws\Result disassociatePermission(array{applicationId?: string, statementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePermissionAsync(array{applicationId?: string, statementId?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result getChatControlsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getChatControlsConfiguration(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChatControlsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChatControlsConfigurationAsync(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getChatResponseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getChatResponseConfiguration(array{applicationId?: string, chatResponseConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChatResponseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChatResponseConfigurationAsync(array{applicationId?: string, chatResponseConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result getDataAccessor(array $args = [])
 * @phpstan-method \Aws\Result getDataAccessor(array{applicationId?: string, dataAccessorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataAccessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAccessorAsync(array{applicationId?: string, dataAccessorId?: string, ...} $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @phpstan-method \Aws\Result getDataSource(array{applicationId?: string, indexId?: string, dataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceAsync(array{applicationId?: string, indexId?: string, dataSourceId?: string, ...} $args = [])
 * @method \Aws\Result getDocumentContent(array $args = [])
 * @phpstan-method \Aws\Result getDocumentContent(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     dataSourceId?: string,
 *     documentId?: string,
 *     outputFormat?: 'EXTRACTED'|'RAW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentContentAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     dataSourceId?: string,
 *     documentId?: string,
 *     outputFormat?: 'EXTRACTED'|'RAW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @phpstan-method \Aws\Result getGroup(array{applicationId?: string, indexId?: string, groupName?: string, dataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupAsync(array{applicationId?: string, indexId?: string, groupName?: string, dataSourceId?: string, ...} $args = [])
 * @method \Aws\Result getIndex(array $args = [])
 * @phpstan-method \Aws\Result getIndex(array{applicationId?: string, indexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIndexAsync(array{applicationId?: string, indexId?: string, ...} $args = [])
 * @method \Aws\Result getMedia(array $args = [])
 * @phpstan-method \Aws\Result getMedia(array{applicationId?: string, conversationId?: string, messageId?: string, mediaId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaAsync(array{applicationId?: string, conversationId?: string, messageId?: string, mediaId?: string, ...} $args = [])
 * @method \Aws\Result getPlugin(array $args = [])
 * @phpstan-method \Aws\Result getPlugin(array{applicationId?: string, pluginId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPluginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPluginAsync(array{applicationId?: string, pluginId?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result getRetriever(array $args = [])
 * @phpstan-method \Aws\Result getRetriever(array{applicationId?: string, retrieverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRetrieverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRetrieverAsync(array{applicationId?: string, retrieverId?: string, ...} $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @phpstan-method \Aws\Result getUser(array{applicationId?: string, userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAsync(array{applicationId?: string, userId?: string, ...} $args = [])
 * @method \Aws\Result getWebExperience(array $args = [])
 * @phpstan-method \Aws\Result getWebExperience(array{applicationId?: string, webExperienceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebExperienceAsync(array{applicationId?: string, webExperienceId?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAttachments(array $args = [])
 * @phpstan-method \Aws\Result listAttachments(array{
 *     applicationId?: string,
 *     conversationId?: string,
 *     userId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachmentsAsync(array{
 *     applicationId?: string,
 *     conversationId?: string,
 *     userId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChatResponseConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listChatResponseConfigurations(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChatResponseConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChatResponseConfigurationsAsync(array{applicationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listConversations(array $args = [])
 * @phpstan-method \Aws\Result listConversations(array{applicationId?: string, userId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConversationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConversationsAsync(array{applicationId?: string, userId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataAccessors(array $args = [])
 * @phpstan-method \Aws\Result listDataAccessors(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataAccessorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataAccessorsAsync(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataSourceSyncJobs(array $args = [])
 * @phpstan-method \Aws\Result listDataSourceSyncJobs(array{
 *     dataSourceId?: string,
 *     applicationId?: string,
 *     indexId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     statusFilter?: 'ABORTED'|'FAILED'|'INCOMPLETE'|'STOPPING'|'SUCCEEDED'|'SYNCING'|'SYNCING_INDEXING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourceSyncJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourceSyncJobsAsync(array{
 *     dataSourceId?: string,
 *     applicationId?: string,
 *     indexId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     statusFilter?: 'ABORTED'|'FAILED'|'INCOMPLETE'|'STOPPING'|'SUCCEEDED'|'SYNCING'|'SYNCING_INDEXING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDataSources(array{applicationId?: string, indexId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array{applicationId?: string, indexId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDocuments(array $args = [])
 * @phpstan-method \Aws\Result listDocuments(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     dataSourceIds?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDocumentsAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     dataSourceIds?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     updatedEarlierThan?: int|string|\DateTimeInterface,
 *     dataSourceId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     updatedEarlierThan?: int|string|\DateTimeInterface,
 *     dataSourceId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIndices(array $args = [])
 * @phpstan-method \Aws\Result listIndices(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndicesAsync(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMessages(array $args = [])
 * @phpstan-method \Aws\Result listMessages(array{
 *     conversationId?: string,
 *     applicationId?: string,
 *     userId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMessagesAsync(array{
 *     conversationId?: string,
 *     applicationId?: string,
 *     userId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPluginActions(array $args = [])
 * @phpstan-method \Aws\Result listPluginActions(array{applicationId?: string, pluginId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPluginActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPluginActionsAsync(array{applicationId?: string, pluginId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPluginTypeActions(array $args = [])
 * @phpstan-method \Aws\Result listPluginTypeActions(array{
 *     pluginType?: 'ASANA'|'ATLASSIAN_CONFLUENCE'|'CUSTOM'|'GOOGLE_CALENDAR'|'JIRA'|'JIRA_CLOUD'|'MICROSOFT_EXCHANGE'|'MICROSOFT_TEAMS'|'PAGERDUTY_ADVANCE'|'QUICKSIGHT'|'SALESFORCE'|'SALESFORCE_CRM'|'SERVICENOW_NOW_PLATFORM'|'SERVICE_NOW'|'SMARTSHEET'|'ZENDESK'|'ZENDESK_SUITE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPluginTypeActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPluginTypeActionsAsync(array{
 *     pluginType?: 'ASANA'|'ATLASSIAN_CONFLUENCE'|'CUSTOM'|'GOOGLE_CALENDAR'|'JIRA'|'JIRA_CLOUD'|'MICROSOFT_EXCHANGE'|'MICROSOFT_TEAMS'|'PAGERDUTY_ADVANCE'|'QUICKSIGHT'|'SALESFORCE'|'SALESFORCE_CRM'|'SERVICENOW_NOW_PLATFORM'|'SERVICE_NOW'|'SMARTSHEET'|'ZENDESK'|'ZENDESK_SUITE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPluginTypeMetadata(array $args = [])
 * @phpstan-method \Aws\Result listPluginTypeMetadata(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPluginTypeMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPluginTypeMetadataAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPlugins(array $args = [])
 * @phpstan-method \Aws\Result listPlugins(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPluginsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPluginsAsync(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRetrievers(array $args = [])
 * @phpstan-method \Aws\Result listRetrievers(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRetrieversAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRetrieversAsync(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptions(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, ...} $args = [])
 * @method \Aws\Result listWebExperiences(array $args = [])
 * @phpstan-method \Aws\Result listWebExperiences(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebExperiencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebExperiencesAsync(array{applicationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putFeedback(array $args = [])
 * @phpstan-method \Aws\Result putFeedback(array{
 *     applicationId?: string,
 *     userId?: string,
 *     conversationId?: string,
 *     messageId?: string,
 *     messageCopiedAt?: int|string|\DateTimeInterface,
 *     messageUsefulness?: array{
 *         usefulness?: 'NOT_USEFUL'|'USEFUL',
 *         reason?: 'COMPLETE'|'FACTUALLY_CORRECT'|'HARMFUL_OR_UNSAFE'|'HELPFUL'|'INCORRECT_OR_MISSING_SOURCES'|'NOT_BASED_ON_DOCUMENTS'|'NOT_COMPLETE'|'NOT_CONCISE'|'NOT_FACTUALLY_CORRECT'|'NOT_HELPFUL'|'OTHER'|'RELEVANT_SOURCES',
 *         comment?: string,
 *         submittedAt?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFeedbackAsync(array{
 *     applicationId?: string,
 *     userId?: string,
 *     conversationId?: string,
 *     messageId?: string,
 *     messageCopiedAt?: int|string|\DateTimeInterface,
 *     messageUsefulness?: array{
 *         usefulness?: 'NOT_USEFUL'|'USEFUL',
 *         reason?: 'COMPLETE'|'FACTUALLY_CORRECT'|'HARMFUL_OR_UNSAFE'|'HELPFUL'|'INCORRECT_OR_MISSING_SOURCES'|'NOT_BASED_ON_DOCUMENTS'|'NOT_COMPLETE'|'NOT_CONCISE'|'NOT_FACTUALLY_CORRECT'|'NOT_HELPFUL'|'OTHER'|'RELEVANT_SOURCES',
 *         comment?: string,
 *         submittedAt?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putGroup(array $args = [])
 * @phpstan-method \Aws\Result putGroup(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     groupName?: string,
 *     dataSourceId?: string,
 *     type?: 'DATASOURCE'|'INDEX',
 *     groupMembers?: array{
 *         memberGroups?: list<array>,
 *         memberUsers?: list<array>,
 *         s3PathForGroupMembers?: array{bucket?: string, key?: string, ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putGroupAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     groupName?: string,
 *     dataSourceId?: string,
 *     type?: 'DATASOURCE'|'INDEX',
 *     groupMembers?: array{
 *         memberGroups?: list<array>,
 *         memberUsers?: list<array>,
 *         s3PathForGroupMembers?: array{bucket?: string, key?: string, ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchRelevantContent(array $args = [])
 * @phpstan-method \Aws\Result searchRelevantContent(array{
 *     applicationId?: string,
 *     queryText?: string,
 *     contentSource?: array{retriever?: array{retrieverId?: string, ...}, ...},
 *     attributeFilter?: array{
 *         andAllFilters?: list<array>,
 *         orAllFilters?: list<array>,
 *         notFilter?: array,
 *         equalsTo?: array{name?: string, value?: array, ...},
 *         containsAll?: array{name?: string, value?: array, ...},
 *         containsAny?: array{name?: string, value?: array, ...},
 *         greaterThan?: array{name?: string, value?: array, ...},
 *         greaterThanOrEquals?: array{name?: string, value?: array, ...},
 *         lessThan?: array{name?: string, value?: array, ...},
 *         lessThanOrEquals?: array{name?: string, value?: array, ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchRelevantContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchRelevantContentAsync(array{
 *     applicationId?: string,
 *     queryText?: string,
 *     contentSource?: array{retriever?: array{retrieverId?: string, ...}, ...},
 *     attributeFilter?: array{
 *         andAllFilters?: list<array>,
 *         orAllFilters?: list<array>,
 *         notFilter?: array,
 *         equalsTo?: array{name?: string, value?: array, ...},
 *         containsAll?: array{name?: string, value?: array, ...},
 *         containsAny?: array{name?: string, value?: array, ...},
 *         greaterThan?: array{name?: string, value?: array, ...},
 *         greaterThanOrEquals?: array{name?: string, value?: array, ...},
 *         lessThan?: array{name?: string, value?: array, ...},
 *         lessThanOrEquals?: array{name?: string, value?: array, ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDataSourceSyncJob(array $args = [])
 * @phpstan-method \Aws\Result startDataSourceSyncJob(array{dataSourceId?: string, applicationId?: string, indexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataSourceSyncJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataSourceSyncJobAsync(array{dataSourceId?: string, applicationId?: string, indexId?: string, ...} $args = [])
 * @method \Aws\Result stopDataSourceSyncJob(array $args = [])
 * @phpstan-method \Aws\Result stopDataSourceSyncJob(array{dataSourceId?: string, applicationId?: string, indexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDataSourceSyncJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDataSourceSyncJobAsync(array{dataSourceId?: string, applicationId?: string, indexId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     applicationId?: string,
 *     identityCenterInstanceArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     attachmentsConfiguration?: array{attachmentsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     qAppsConfiguration?: array{qAppsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     personalizationConfiguration?: array{personalizationControlMode?: 'DISABLED'|'ENABLED', ...},
 *     autoSubscriptionConfiguration?: array{autoSubscribe?: 'DISABLED'|'ENABLED', defaultSubscriptionType?: 'Q_BUSINESS'|'Q_LITE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     applicationId?: string,
 *     identityCenterInstanceArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     attachmentsConfiguration?: array{attachmentsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     qAppsConfiguration?: array{qAppsControlMode?: 'DISABLED'|'ENABLED', ...},
 *     personalizationConfiguration?: array{personalizationControlMode?: 'DISABLED'|'ENABLED', ...},
 *     autoSubscriptionConfiguration?: array{autoSubscribe?: 'DISABLED'|'ENABLED', defaultSubscriptionType?: 'Q_BUSINESS'|'Q_LITE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChatControlsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateChatControlsConfiguration(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     responseScope?: 'ENTERPRISE_CONTENT_ONLY'|'EXTENDED_KNOWLEDGE_ENABLED',
 *     orchestrationConfiguration?: array{control?: 'DISABLED'|'ENABLED', ...},
 *     blockedPhrasesConfigurationUpdate?: array{
 *         blockedPhrasesToCreateOrUpdate?: list<string>,
 *         blockedPhrasesToDelete?: list<string>,
 *         systemMessageOverride?: string,
 *         ...,
 *     },
 *     topicConfigurationsToCreateOrUpdate?: list<array{name?: string, description?: string, exampleChatMessages?: list<string>, rules?: list<array>, ...}>,
 *     topicConfigurationsToDelete?: list<array{name?: string, description?: string, exampleChatMessages?: list<string>, rules?: list<array>, ...}>,
 *     creatorModeConfiguration?: array{creatorModeControl?: 'DISABLED'|'ENABLED', ...},
 *     hallucinationReductionConfiguration?: array{hallucinationReductionControl?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChatControlsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChatControlsConfigurationAsync(array{
 *     applicationId?: string,
 *     clientToken?: string,
 *     responseScope?: 'ENTERPRISE_CONTENT_ONLY'|'EXTENDED_KNOWLEDGE_ENABLED',
 *     orchestrationConfiguration?: array{control?: 'DISABLED'|'ENABLED', ...},
 *     blockedPhrasesConfigurationUpdate?: array{
 *         blockedPhrasesToCreateOrUpdate?: list<string>,
 *         blockedPhrasesToDelete?: list<string>,
 *         systemMessageOverride?: string,
 *         ...,
 *     },
 *     topicConfigurationsToCreateOrUpdate?: list<array{name?: string, description?: string, exampleChatMessages?: list<string>, rules?: list<array>, ...}>,
 *     topicConfigurationsToDelete?: list<array{name?: string, description?: string, exampleChatMessages?: list<string>, rules?: list<array>, ...}>,
 *     creatorModeConfiguration?: array{creatorModeControl?: 'DISABLED'|'ENABLED', ...},
 *     hallucinationReductionConfiguration?: array{hallucinationReductionControl?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChatResponseConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateChatResponseConfiguration(array{
 *     applicationId?: string,
 *     chatResponseConfigurationId?: string,
 *     displayName?: string,
 *     responseConfigurations?: array<string, array{instructionCollection?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChatResponseConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChatResponseConfigurationAsync(array{
 *     applicationId?: string,
 *     chatResponseConfigurationId?: string,
 *     displayName?: string,
 *     responseConfigurations?: array<string, array{instructionCollection?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataAccessor(array $args = [])
 * @phpstan-method \Aws\Result updateDataAccessor(array{
 *     applicationId?: string,
 *     dataAccessorId?: string,
 *     actionConfigurations?: list<array{action?: string, filterConfiguration?: array, ...}>,
 *     authenticationDetail?: array{
 *         authenticationType?: 'AWS_IAM_IDC_AUTH_CODE'|'AWS_IAM_IDC_TTI',
 *         authenticationConfiguration?: array{idcTrustedTokenIssuerConfiguration?: array, ...},
 *         externalIds?: list<string>,
 *         ...,
 *     },
 *     displayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataAccessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataAccessorAsync(array{
 *     applicationId?: string,
 *     dataAccessorId?: string,
 *     actionConfigurations?: list<array{action?: string, filterConfiguration?: array, ...}>,
 *     authenticationDetail?: array{
 *         authenticationType?: 'AWS_IAM_IDC_AUTH_CODE'|'AWS_IAM_IDC_TTI',
 *         authenticationConfiguration?: array{idcTrustedTokenIssuerConfiguration?: array, ...},
 *         externalIds?: list<string>,
 *         ...,
 *     },
 *     displayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     dataSourceId?: string,
 *     displayName?: string,
 *     configuration?: array,
 *     vpcConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     description?: string,
 *     syncSchedule?: string,
 *     roleArn?: string,
 *     documentEnrichmentConfiguration?: array{
 *         inlineConfigurations?: list<array>,
 *         preExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         postExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     mediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{videoExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     dataSourceId?: string,
 *     displayName?: string,
 *     configuration?: array,
 *     vpcConfiguration?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     description?: string,
 *     syncSchedule?: string,
 *     roleArn?: string,
 *     documentEnrichmentConfiguration?: array{
 *         inlineConfigurations?: list<array>,
 *         preExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         postExtractionHookConfiguration?: array{invocationCondition?: array, lambdaArn?: string, s3BucketName?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     mediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{videoExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIndex(array $args = [])
 * @phpstan-method \Aws\Result updateIndex(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     displayName?: string,
 *     description?: string,
 *     capacityConfiguration?: array{units?: int, ...},
 *     documentAttributeConfigurations?: list<array{name?: string, type?: 'DATE'|'NUMBER'|'STRING'|'STRING_LIST', search?: 'DISABLED'|'ENABLED', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIndexAsync(array{
 *     applicationId?: string,
 *     indexId?: string,
 *     displayName?: string,
 *     description?: string,
 *     capacityConfiguration?: array{units?: int, ...},
 *     documentAttributeConfigurations?: list<array{name?: string, type?: 'DATE'|'NUMBER'|'STRING'|'STRING_LIST', search?: 'DISABLED'|'ENABLED', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePlugin(array $args = [])
 * @phpstan-method \Aws\Result updatePlugin(array{
 *     applicationId?: string,
 *     pluginId?: string,
 *     displayName?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     serverUrl?: string,
 *     customPluginConfiguration?: array{
 *         description?: string,
 *         apiSchemaType?: 'OPEN_API_V3',
 *         apiSchema?: array{payload?: string, s3?: array, ...},
 *         ...,
 *     },
 *     authConfiguration?: array{
 *         basicAuthConfiguration?: array{secretArn?: string, roleArn?: string, ...},
 *         oAuth2ClientCredentialConfiguration?: array{secretArn?: string, roleArn?: string, authorizationUrl?: string, tokenUrl?: string, ...},
 *         noAuthConfiguration?: array,
 *         idcAuthConfiguration?: array{idcApplicationArn?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePluginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePluginAsync(array{
 *     applicationId?: string,
 *     pluginId?: string,
 *     displayName?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     serverUrl?: string,
 *     customPluginConfiguration?: array{
 *         description?: string,
 *         apiSchemaType?: 'OPEN_API_V3',
 *         apiSchema?: array{payload?: string, s3?: array, ...},
 *         ...,
 *     },
 *     authConfiguration?: array{
 *         basicAuthConfiguration?: array{secretArn?: string, roleArn?: string, ...},
 *         oAuth2ClientCredentialConfiguration?: array{secretArn?: string, roleArn?: string, authorizationUrl?: string, tokenUrl?: string, ...},
 *         noAuthConfiguration?: array,
 *         idcAuthConfiguration?: array{idcApplicationArn?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRetriever(array $args = [])
 * @phpstan-method \Aws\Result updateRetriever(array{
 *     applicationId?: string,
 *     retrieverId?: string,
 *     configuration?: array{
 *         nativeIndexConfiguration?: array{indexId?: string, version?: int, boostingOverride?: array<string, array>, ...},
 *         kendraIndexConfiguration?: array{indexId?: string, ...},
 *         ...,
 *     },
 *     displayName?: string,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRetrieverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRetrieverAsync(array{
 *     applicationId?: string,
 *     retrieverId?: string,
 *     configuration?: array{
 *         nativeIndexConfiguration?: array{indexId?: string, version?: int, boostingOverride?: array<string, array>, ...},
 *         kendraIndexConfiguration?: array{indexId?: string, ...},
 *         ...,
 *     },
 *     displayName?: string,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubscription(array $args = [])
 * @phpstan-method \Aws\Result updateSubscription(array{applicationId?: string, subscriptionId?: string, type?: 'Q_BUSINESS'|'Q_LITE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriptionAsync(array{applicationId?: string, subscriptionId?: string, type?: 'Q_BUSINESS'|'Q_LITE', ...} $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     applicationId?: string,
 *     userId?: string,
 *     userAliasesToUpdate?: list<array{indexId?: string, dataSourceId?: string, userId?: string, ...}>,
 *     userAliasesToDelete?: list<array{indexId?: string, dataSourceId?: string, userId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     applicationId?: string,
 *     userId?: string,
 *     userAliasesToUpdate?: list<array{indexId?: string, dataSourceId?: string, userId?: string, ...}>,
 *     userAliasesToDelete?: list<array{indexId?: string, dataSourceId?: string, userId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWebExperience(array $args = [])
 * @phpstan-method \Aws\Result updateWebExperience(array{
 *     applicationId?: string,
 *     webExperienceId?: string,
 *     roleArn?: string,
 *     authenticationConfiguration?: array{
 *         samlConfiguration?: array{metadataXML?: string, roleArn?: string, userIdAttribute?: string, userGroupAttribute?: string, ...},
 *         ...,
 *     },
 *     title?: string,
 *     subtitle?: string,
 *     welcomeMessage?: string,
 *     samplePromptsControlMode?: 'DISABLED'|'ENABLED',
 *     identityProviderConfiguration?: array{
 *         samlConfiguration?: array{authenticationUrl?: string, ...},
 *         openIDConnectConfiguration?: array{secretsArn?: string, secretsRole?: string, ...},
 *         ...,
 *     },
 *     origins?: list<string>,
 *     browserExtensionConfiguration?: array{enabledBrowserExtensions?: list<'CHROME'|'FIREFOX'>, ...},
 *     customizationConfiguration?: array{customCSSUrl?: string, logoUrl?: string, fontUrl?: string, faviconUrl?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebExperienceAsync(array{
 *     applicationId?: string,
 *     webExperienceId?: string,
 *     roleArn?: string,
 *     authenticationConfiguration?: array{
 *         samlConfiguration?: array{metadataXML?: string, roleArn?: string, userIdAttribute?: string, userGroupAttribute?: string, ...},
 *         ...,
 *     },
 *     title?: string,
 *     subtitle?: string,
 *     welcomeMessage?: string,
 *     samplePromptsControlMode?: 'DISABLED'|'ENABLED',
 *     identityProviderConfiguration?: array{
 *         samlConfiguration?: array{authenticationUrl?: string, ...},
 *         openIDConnectConfiguration?: array{secretsArn?: string, secretsRole?: string, ...},
 *         ...,
 *     },
 *     origins?: list<string>,
 *     browserExtensionConfiguration?: array{enabledBrowserExtensions?: list<'CHROME'|'FIREFOX'>, ...},
 *     customizationConfiguration?: array{customCSSUrl?: string, logoUrl?: string, fontUrl?: string, faviconUrl?: string, ...},
 *     ...,
 * } $args = [])
 */
class QBusinessClient extends AwsClient {}
