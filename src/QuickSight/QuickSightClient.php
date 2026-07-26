<?php
namespace Aws\QuickSight;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon QuickSight** service.
 * @method \Aws\Result batchCreateTopicReviewedAnswer(array $args = [])
 * @phpstan-method \Aws\Result batchCreateTopicReviewedAnswer(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     Answers?: list<array{
 *         AnswerId?: string,
 *         DatasetArn?: string,
 *         Question?: string,
 *         Mir?: array,
 *         PrimaryVisual?: array,
 *         Template?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateTopicReviewedAnswerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateTopicReviewedAnswerAsync(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     Answers?: list<array{
 *         AnswerId?: string,
 *         DatasetArn?: string,
 *         Question?: string,
 *         Mir?: array,
 *         PrimaryVisual?: array,
 *         Template?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteKnowledgeBase(array{AwsAccountId?: string, KnowledgeBaseIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteKnowledgeBaseAsync(array{AwsAccountId?: string, KnowledgeBaseIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteTopicReviewedAnswer(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteTopicReviewedAnswer(array{AwsAccountId?: string, TopicId?: string, AnswerIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteTopicReviewedAnswerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteTopicReviewedAnswerAsync(array{AwsAccountId?: string, TopicId?: string, AnswerIds?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelIngestion(array $args = [])
 * @phpstan-method \Aws\Result cancelIngestion(array{AwsAccountId?: string, DataSetId?: string, IngestionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelIngestionAsync(array{AwsAccountId?: string, DataSetId?: string, IngestionId?: string, ...} $args = [])
 * @method \Aws\Result createAccountCustomization(array $args = [])
 * @phpstan-method \Aws\Result createAccountCustomization(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     AccountCustomization?: array{DefaultTheme?: string, DefaultEmailCustomizationTemplate?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountCustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountCustomizationAsync(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     AccountCustomization?: array{DefaultTheme?: string, DefaultEmailCustomizationTemplate?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccountSubscription(array $args = [])
 * @phpstan-method \Aws\Result createAccountSubscription(array{
 *     Edition?: 'ENTERPRISE'|'ENTERPRISE_AND_Q'|'STANDARD',
 *     AuthenticationMethod?: 'ACTIVE_DIRECTORY'|'IAM_AND_QUICKSIGHT'|'IAM_IDENTITY_CENTER'|'IAM_ONLY',
 *     AwsAccountId?: string,
 *     AccountName?: string,
 *     NotificationEmail?: string,
 *     ActiveDirectoryName?: string,
 *     Realm?: string,
 *     DirectoryId?: string,
 *     AdminGroup?: list<string>,
 *     AuthorGroup?: list<string>,
 *     ReaderGroup?: list<string>,
 *     AdminProGroup?: list<string>,
 *     AuthorProGroup?: list<string>,
 *     ReaderProGroup?: list<string>,
 *     FirstName?: string,
 *     LastName?: string,
 *     EmailAddress?: string,
 *     ContactNumber?: string,
 *     IAMIdentityCenterInstanceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountSubscriptionAsync(array{
 *     Edition?: 'ENTERPRISE'|'ENTERPRISE_AND_Q'|'STANDARD',
 *     AuthenticationMethod?: 'ACTIVE_DIRECTORY'|'IAM_AND_QUICKSIGHT'|'IAM_IDENTITY_CENTER'|'IAM_ONLY',
 *     AwsAccountId?: string,
 *     AccountName?: string,
 *     NotificationEmail?: string,
 *     ActiveDirectoryName?: string,
 *     Realm?: string,
 *     DirectoryId?: string,
 *     AdminGroup?: list<string>,
 *     AuthorGroup?: list<string>,
 *     ReaderGroup?: list<string>,
 *     AdminProGroup?: list<string>,
 *     AuthorProGroup?: list<string>,
 *     ReaderProGroup?: list<string>,
 *     FirstName?: string,
 *     LastName?: string,
 *     EmailAddress?: string,
 *     ContactNumber?: string,
 *     IAMIdentityCenterInstanceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createActionConnector(array $args = [])
 * @phpstan-method \Aws\Result createActionConnector(array{
 *     AwsAccountId?: string,
 *     ActionConnectorId?: string,
 *     Name?: string,
 *     Type?: 'AMAZON_BEDROCK_AGENT_RUNTIME'|'AMAZON_BEDROCK_DATA_AUTOMATION_RUNTIME'|'AMAZON_BEDROCK_RUNTIME'|'AMAZON_COMPREHEND'|'AMAZON_COMPREHEND_MEDICAL'|'AMAZON_S3'|'AMAZON_TEXTRACT'|'ASANA'|'ATLASSIAN_CONFLUENCE'|'BAMBOO_HR'|'GENERIC_HTTP'|'JIRA_CLOUD'|'MICROSOFT_ONEDRIVE'|'MICROSOFT_OUTLOOK'|'MICROSOFT_SHAREPOINT'|'MICROSOFT_TEAMS'|'PAGERDUTY_ADVANCE'|'SALESFORCE_CRM'|'SAP_BILLOFMATERIALS'|'SAP_BUSINESSPARTNER'|'SAP_MATERIALSTOCK'|'SAP_PHYSICALINVENTORY'|'SAP_PRODUCTMASTERDATA'|'SERVICENOW_NOW_PLATFORM'|'SLACK'|'SMARTSHEET'|'ZENDESK_SUITE',
 *     AuthenticationConfig?: array{
 *         AuthenticationType?: 'API_KEY'|'BASIC'|'IAM'|'NONE'|'OAUTH2_AUTHORIZATION_CODE'|'OAUTH2_CLIENT_CREDENTIALS',
 *         AuthenticationMetadata?: array{
 *             AuthorizationCodeGrantMetadata?: array,
 *             ClientCredentialsGrantMetadata?: array,
 *             BasicAuthConnectionMetadata?: array,
 *             ApiKeyConnectionMetadata?: array,
 *             NoneConnectionMetadata?: array,
 *             IamConnectionMetadata?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     VpcConnectionArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createActionConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createActionConnectorAsync(array{
 *     AwsAccountId?: string,
 *     ActionConnectorId?: string,
 *     Name?: string,
 *     Type?: 'AMAZON_BEDROCK_AGENT_RUNTIME'|'AMAZON_BEDROCK_DATA_AUTOMATION_RUNTIME'|'AMAZON_BEDROCK_RUNTIME'|'AMAZON_COMPREHEND'|'AMAZON_COMPREHEND_MEDICAL'|'AMAZON_S3'|'AMAZON_TEXTRACT'|'ASANA'|'ATLASSIAN_CONFLUENCE'|'BAMBOO_HR'|'GENERIC_HTTP'|'JIRA_CLOUD'|'MICROSOFT_ONEDRIVE'|'MICROSOFT_OUTLOOK'|'MICROSOFT_SHAREPOINT'|'MICROSOFT_TEAMS'|'PAGERDUTY_ADVANCE'|'SALESFORCE_CRM'|'SAP_BILLOFMATERIALS'|'SAP_BUSINESSPARTNER'|'SAP_MATERIALSTOCK'|'SAP_PHYSICALINVENTORY'|'SAP_PRODUCTMASTERDATA'|'SERVICENOW_NOW_PLATFORM'|'SLACK'|'SMARTSHEET'|'ZENDESK_SUITE',
 *     AuthenticationConfig?: array{
 *         AuthenticationType?: 'API_KEY'|'BASIC'|'IAM'|'NONE'|'OAUTH2_AUTHORIZATION_CODE'|'OAUTH2_CLIENT_CREDENTIALS',
 *         AuthenticationMetadata?: array{
 *             AuthorizationCodeGrantMetadata?: array,
 *             ClientCredentialsGrantMetadata?: array,
 *             BasicAuthConnectionMetadata?: array,
 *             ApiKeyConnectionMetadata?: array,
 *             NoneConnectionMetadata?: array,
 *             IamConnectionMetadata?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     VpcConnectionArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgent(array $args = [])
 * @phpstan-method \Aws\Result createAgent(array{
 *     Spaces?: list<string>,
 *     ActionConnectors?: list<string>,
 *     AwsAccountId?: string,
 *     AgentId?: string,
 *     Name?: string,
 *     Description?: string,
 *     IconId?: string,
 *     StarterPrompts?: list<string>,
 *     WelcomeMessage?: string,
 *     AgentLifecycle?: 'PREVIEW'|'PUBLISHED',
 *     CustomPromptInput?: array{
 *         ExistingPrompt?: array{ModelProfileId?: string, SubscriptionId?: string, QbsAwsAccountId?: string, ...},
 *         NewPrompt?: array{
 *             ResponseLength?: string,
 *             OutputStyle?: string,
 *             Identity?: string,
 *             Tone?: string,
 *             CustomInstructions?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentAsync(array{
 *     Spaces?: list<string>,
 *     ActionConnectors?: list<string>,
 *     AwsAccountId?: string,
 *     AgentId?: string,
 *     Name?: string,
 *     Description?: string,
 *     IconId?: string,
 *     StarterPrompts?: list<string>,
 *     WelcomeMessage?: string,
 *     AgentLifecycle?: 'PREVIEW'|'PUBLISHED',
 *     CustomPromptInput?: array{
 *         ExistingPrompt?: array{ModelProfileId?: string, SubscriptionId?: string, QbsAwsAccountId?: string, ...},
 *         NewPrompt?: array{
 *             ResponseLength?: string,
 *             OutputStyle?: string,
 *             Identity?: string,
 *             Tone?: string,
 *             CustomInstructions?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnalysis(array $args = [])
 * @phpstan-method \Aws\Result createAnalysis(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     Name?: string,
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     ThemeArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     FolderArns?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnalysisAsync(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     Name?: string,
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     ThemeArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     FolderArns?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBrand(array $args = [])
 * @phpstan-method \Aws\Result createBrand(array{
 *     AwsAccountId?: string,
 *     BrandId?: string,
 *     BrandDefinition?: array{
 *         BrandName?: string,
 *         Description?: string,
 *         ApplicationTheme?: array{BrandColorPalette?: array, ContextualAccentPalette?: array, BrandElementStyle?: array, ...},
 *         LogoConfiguration?: array{AltText?: string, LogoSet?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrandAsync(array{
 *     AwsAccountId?: string,
 *     BrandId?: string,
 *     BrandDefinition?: array{
 *         BrandName?: string,
 *         Description?: string,
 *         ApplicationTheme?: array{BrandColorPalette?: array, ContextualAccentPalette?: array, BrandElementStyle?: array, ...},
 *         LogoConfiguration?: array{AltText?: string, LogoSet?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomPermissions(array $args = [])
 * @phpstan-method \Aws\Result createCustomPermissions(array{
 *     AwsAccountId?: string,
 *     CustomPermissionsName?: string,
 *     Capabilities?: array{
 *         ExportToCsv?: 'DENY',
 *         ExportToExcel?: 'DENY',
 *         ExportToPdf?: 'DENY',
 *         PrintReports?: 'DENY',
 *         CreateAndUpdateThemes?: 'DENY',
 *         AddOrRunAnomalyDetectionForAnalyses?: 'DENY',
 *         ShareAnalyses?: 'DENY',
 *         CreateAndUpdateDatasets?: 'DENY',
 *         ShareDatasets?: 'DENY',
 *         SubscribeDashboardEmailReports?: 'DENY',
 *         CreateAndUpdateDashboardEmailReports?: 'DENY',
 *         ShareDashboards?: 'DENY',
 *         CreateAndUpdateThresholdAlerts?: 'DENY',
 *         RenameSharedFolders?: 'DENY',
 *         CreateSharedFolders?: 'DENY',
 *         CreateAndUpdateDataSources?: 'DENY',
 *         ShareDataSources?: 'DENY',
 *         ViewAccountSPICECapacity?: 'DENY',
 *         CreateSPICEDataset?: 'DENY',
 *         ExportToPdfInScheduledReports?: 'DENY',
 *         ExportToCsvInScheduledReports?: 'DENY',
 *         ExportToExcelInScheduledReports?: 'DENY',
 *         IncludeContentInScheduledReportsEmail?: 'DENY',
 *         Dashboard?: 'DENY',
 *         Analysis?: 'DENY',
 *         Automate?: 'DENY',
 *         Flow?: 'DENY',
 *         Apps?: 'DENY',
 *         CreateAndUpdateApps?: 'DENY',
 *         ShareApps?: 'DENY',
 *         InvokeAppsAIInference?: 'DENY',
 *         AccessAppsNativeDataStore?: 'DENY',
 *         PublishWithoutApproval?: 'DENY',
 *         UseBedrockModels?: 'DENY',
 *         PerformFlowUiTask?: 'DENY',
 *         ApproveFlowShareRequests?: 'DENY',
 *         UseAgentWebSearch?: 'DENY',
 *         KnowledgeBase?: 'DENY',
 *         Action?: 'DENY',
 *         GenericHTTPAction?: 'DENY',
 *         CreateAndUpdateGenericHTTPAction?: 'DENY',
 *         ShareGenericHTTPAction?: 'DENY',
 *         UseGenericHTTPAction?: 'DENY',
 *         AsanaAction?: 'DENY',
 *         CreateAndUpdateAsanaAction?: 'DENY',
 *         ShareAsanaAction?: 'DENY',
 *         UseAsanaAction?: 'DENY',
 *         SlackAction?: 'DENY',
 *         CreateAndUpdateSlackAction?: 'DENY',
 *         ShareSlackAction?: 'DENY',
 *         UseSlackAction?: 'DENY',
 *         ServiceNowAction?: 'DENY',
 *         CreateAndUpdateServiceNowAction?: 'DENY',
 *         ShareServiceNowAction?: 'DENY',
 *         UseServiceNowAction?: 'DENY',
 *         SalesforceAction?: 'DENY',
 *         CreateAndUpdateSalesforceAction?: 'DENY',
 *         ShareSalesforceAction?: 'DENY',
 *         UseSalesforceAction?: 'DENY',
 *         MSExchangeAction?: 'DENY',
 *         CreateAndUpdateMSExchangeAction?: 'DENY',
 *         ShareMSExchangeAction?: 'DENY',
 *         UseMSExchangeAction?: 'DENY',
 *         PagerDutyAction?: 'DENY',
 *         CreateAndUpdatePagerDutyAction?: 'DENY',
 *         SharePagerDutyAction?: 'DENY',
 *         UsePagerDutyAction?: 'DENY',
 *         JiraAction?: 'DENY',
 *         CreateAndUpdateJiraAction?: 'DENY',
 *         ShareJiraAction?: 'DENY',
 *         UseJiraAction?: 'DENY',
 *         ConfluenceAction?: 'DENY',
 *         CreateAndUpdateConfluenceAction?: 'DENY',
 *         ShareConfluenceAction?: 'DENY',
 *         UseConfluenceAction?: 'DENY',
 *         OneDriveAction?: 'DENY',
 *         CreateAndUpdateOneDriveAction?: 'DENY',
 *         ShareOneDriveAction?: 'DENY',
 *         UseOneDriveAction?: 'DENY',
 *         SharePointAction?: 'DENY',
 *         CreateAndUpdateSharePointAction?: 'DENY',
 *         ShareSharePointAction?: 'DENY',
 *         UseSharePointAction?: 'DENY',
 *         MSTeamsAction?: 'DENY',
 *         CreateAndUpdateMSTeamsAction?: 'DENY',
 *         ShareMSTeamsAction?: 'DENY',
 *         UseMSTeamsAction?: 'DENY',
 *         GoogleCalendarAction?: 'DENY',
 *         CreateAndUpdateGoogleCalendarAction?: 'DENY',
 *         ShareGoogleCalendarAction?: 'DENY',
 *         UseGoogleCalendarAction?: 'DENY',
 *         ZendeskAction?: 'DENY',
 *         CreateAndUpdateZendeskAction?: 'DENY',
 *         ShareZendeskAction?: 'DENY',
 *         UseZendeskAction?: 'DENY',
 *         SmartsheetAction?: 'DENY',
 *         CreateAndUpdateSmartsheetAction?: 'DENY',
 *         ShareSmartsheetAction?: 'DENY',
 *         UseSmartsheetAction?: 'DENY',
 *         SAPBusinessPartnerAction?: 'DENY',
 *         CreateAndUpdateSAPBusinessPartnerAction?: 'DENY',
 *         ShareSAPBusinessPartnerAction?: 'DENY',
 *         UseSAPBusinessPartnerAction?: 'DENY',
 *         SAPProductMasterDataAction?: 'DENY',
 *         CreateAndUpdateSAPProductMasterDataAction?: 'DENY',
 *         ShareSAPProductMasterDataAction?: 'DENY',
 *         UseSAPProductMasterDataAction?: 'DENY',
 *         SAPPhysicalInventoryAction?: 'DENY',
 *         CreateAndUpdateSAPPhysicalInventoryAction?: 'DENY',
 *         ShareSAPPhysicalInventoryAction?: 'DENY',
 *         UseSAPPhysicalInventoryAction?: 'DENY',
 *         SAPBillOfMaterialAction?: 'DENY',
 *         CreateAndUpdateSAPBillOfMaterialAction?: 'DENY',
 *         ShareSAPBillOfMaterialAction?: 'DENY',
 *         UseSAPBillOfMaterialAction?: 'DENY',
 *         SAPMaterialStockAction?: 'DENY',
 *         CreateAndUpdateSAPMaterialStockAction?: 'DENY',
 *         ShareSAPMaterialStockAction?: 'DENY',
 *         UseSAPMaterialStockAction?: 'DENY',
 *         FactSetAction?: 'DENY',
 *         CreateAndUpdateFactSetAction?: 'DENY',
 *         ShareFactSetAction?: 'DENY',
 *         UseFactSetAction?: 'DENY',
 *         AmazonSThreeAction?: 'DENY',
 *         CreateAndUpdateAmazonSThreeAction?: 'DENY',
 *         ShareAmazonSThreeAction?: 'DENY',
 *         UseAmazonSThreeAction?: 'DENY',
 *         TextractAction?: 'DENY',
 *         CreateAndUpdateTextractAction?: 'DENY',
 *         ShareTextractAction?: 'DENY',
 *         UseTextractAction?: 'DENY',
 *         ComprehendAction?: 'DENY',
 *         CreateAndUpdateComprehendAction?: 'DENY',
 *         ShareComprehendAction?: 'DENY',
 *         UseComprehendAction?: 'DENY',
 *         ComprehendMedicalAction?: 'DENY',
 *         CreateAndUpdateComprehendMedicalAction?: 'DENY',
 *         ShareComprehendMedicalAction?: 'DENY',
 *         UseComprehendMedicalAction?: 'DENY',
 *         AmazonBedrockARSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockARSAction?: 'DENY',
 *         ShareAmazonBedrockARSAction?: 'DENY',
 *         UseAmazonBedrockARSAction?: 'DENY',
 *         AmazonBedrockFSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockFSAction?: 'DENY',
 *         ShareAmazonBedrockFSAction?: 'DENY',
 *         UseAmazonBedrockFSAction?: 'DENY',
 *         AmazonBedrockKRSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockKRSAction?: 'DENY',
 *         ShareAmazonBedrockKRSAction?: 'DENY',
 *         UseAmazonBedrockKRSAction?: 'DENY',
 *         MCPAction?: 'DENY',
 *         CreateAndUpdateMCPAction?: 'DENY',
 *         ShareMCPAction?: 'DENY',
 *         UseMCPAction?: 'DENY',
 *         OpenAPIAction?: 'DENY',
 *         CreateAndUpdateOpenAPIAction?: 'DENY',
 *         ShareOpenAPIAction?: 'DENY',
 *         UseOpenAPIAction?: 'DENY',
 *         SandPGMIAction?: 'DENY',
 *         CreateAndUpdateSandPGMIAction?: 'DENY',
 *         ShareSandPGMIAction?: 'DENY',
 *         UseSandPGMIAction?: 'DENY',
 *         SandPGlobalEnergyAction?: 'DENY',
 *         CreateAndUpdateSandPGlobalEnergyAction?: 'DENY',
 *         ShareSandPGlobalEnergyAction?: 'DENY',
 *         UseSandPGlobalEnergyAction?: 'DENY',
 *         BambooHRAction?: 'DENY',
 *         CreateAndUpdateBambooHRAction?: 'DENY',
 *         ShareBambooHRAction?: 'DENY',
 *         UseBambooHRAction?: 'DENY',
 *         BoxAgentAction?: 'DENY',
 *         CreateAndUpdateBoxAgentAction?: 'DENY',
 *         ShareBoxAgentAction?: 'DENY',
 *         UseBoxAgentAction?: 'DENY',
 *         CanvaAgentAction?: 'DENY',
 *         CreateAndUpdateCanvaAgentAction?: 'DENY',
 *         ShareCanvaAgentAction?: 'DENY',
 *         UseCanvaAgentAction?: 'DENY',
 *         GithubAction?: 'DENY',
 *         CreateAndUpdateGithubAction?: 'DENY',
 *         ShareGithubAction?: 'DENY',
 *         UseGithubAction?: 'DENY',
 *         NotionAction?: 'DENY',
 *         CreateAndUpdateNotionAction?: 'DENY',
 *         ShareNotionAction?: 'DENY',
 *         UseNotionAction?: 'DENY',
 *         LinearAction?: 'DENY',
 *         CreateAndUpdateLinearAction?: 'DENY',
 *         ShareLinearAction?: 'DENY',
 *         UseLinearAction?: 'DENY',
 *         HuggingFaceAction?: 'DENY',
 *         CreateAndUpdateHuggingFaceAction?: 'DENY',
 *         ShareHuggingFaceAction?: 'DENY',
 *         UseHuggingFaceAction?: 'DENY',
 *         MondayAction?: 'DENY',
 *         CreateAndUpdateMondayAction?: 'DENY',
 *         ShareMondayAction?: 'DENY',
 *         UseMondayAction?: 'DENY',
 *         HubspotAction?: 'DENY',
 *         CreateAndUpdateHubspotAction?: 'DENY',
 *         ShareHubspotAction?: 'DENY',
 *         UseHubspotAction?: 'DENY',
 *         IntercomAction?: 'DENY',
 *         CreateAndUpdateIntercomAction?: 'DENY',
 *         ShareIntercomAction?: 'DENY',
 *         UseIntercomAction?: 'DENY',
 *         NewRelicAction?: 'DENY',
 *         CreateAndUpdateNewRelicAction?: 'DENY',
 *         ShareNewRelicAction?: 'DENY',
 *         UseNewRelicAction?: 'DENY',
 *         Topic?: 'DENY',
 *         EditVisualWithQ?: 'DENY',
 *         BuildCalculatedFieldWithQ?: 'DENY',
 *         CreateDashboardExecutiveSummaryWithQ?: 'DENY',
 *         Space?: 'DENY',
 *         CreateSpaces?: 'DENY',
 *         ShareSpaces?: 'DENY',
 *         ChatAgent?: 'DENY',
 *         CreateChatAgents?: 'DENY',
 *         ShareChatAgents?: 'DENY',
 *         Research?: 'DENY',
 *         SelfUpgradeUserRole?: 'DENY',
 *         Extension?: 'DENY',
 *         UseBrowserExtension?: 'DENY',
 *         UseWordAddInExtension?: 'DENY',
 *         UseOutlookAddInExtension?: 'DENY',
 *         UseExcelAddInExtension?: 'DENY',
 *         UsePowerpointAddInExtension?: 'DENY',
 *         ManageSharedFolders?: 'DENY',
 *         GenerateAnalyses?: 'DENY',
 *         Story?: 'DENY',
 *         Scenario?: 'DENY',
 *         Trigger?: 'DENY',
 *         ScheduleTrigger?: 'DENY',
 *         InboundEmailTrigger?: 'DENY',
 *         QuickEventTrigger?: 'DENY',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     CustomPermissionsName?: string,
 *     Capabilities?: array{
 *         ExportToCsv?: 'DENY',
 *         ExportToExcel?: 'DENY',
 *         ExportToPdf?: 'DENY',
 *         PrintReports?: 'DENY',
 *         CreateAndUpdateThemes?: 'DENY',
 *         AddOrRunAnomalyDetectionForAnalyses?: 'DENY',
 *         ShareAnalyses?: 'DENY',
 *         CreateAndUpdateDatasets?: 'DENY',
 *         ShareDatasets?: 'DENY',
 *         SubscribeDashboardEmailReports?: 'DENY',
 *         CreateAndUpdateDashboardEmailReports?: 'DENY',
 *         ShareDashboards?: 'DENY',
 *         CreateAndUpdateThresholdAlerts?: 'DENY',
 *         RenameSharedFolders?: 'DENY',
 *         CreateSharedFolders?: 'DENY',
 *         CreateAndUpdateDataSources?: 'DENY',
 *         ShareDataSources?: 'DENY',
 *         ViewAccountSPICECapacity?: 'DENY',
 *         CreateSPICEDataset?: 'DENY',
 *         ExportToPdfInScheduledReports?: 'DENY',
 *         ExportToCsvInScheduledReports?: 'DENY',
 *         ExportToExcelInScheduledReports?: 'DENY',
 *         IncludeContentInScheduledReportsEmail?: 'DENY',
 *         Dashboard?: 'DENY',
 *         Analysis?: 'DENY',
 *         Automate?: 'DENY',
 *         Flow?: 'DENY',
 *         Apps?: 'DENY',
 *         CreateAndUpdateApps?: 'DENY',
 *         ShareApps?: 'DENY',
 *         InvokeAppsAIInference?: 'DENY',
 *         AccessAppsNativeDataStore?: 'DENY',
 *         PublishWithoutApproval?: 'DENY',
 *         UseBedrockModels?: 'DENY',
 *         PerformFlowUiTask?: 'DENY',
 *         ApproveFlowShareRequests?: 'DENY',
 *         UseAgentWebSearch?: 'DENY',
 *         KnowledgeBase?: 'DENY',
 *         Action?: 'DENY',
 *         GenericHTTPAction?: 'DENY',
 *         CreateAndUpdateGenericHTTPAction?: 'DENY',
 *         ShareGenericHTTPAction?: 'DENY',
 *         UseGenericHTTPAction?: 'DENY',
 *         AsanaAction?: 'DENY',
 *         CreateAndUpdateAsanaAction?: 'DENY',
 *         ShareAsanaAction?: 'DENY',
 *         UseAsanaAction?: 'DENY',
 *         SlackAction?: 'DENY',
 *         CreateAndUpdateSlackAction?: 'DENY',
 *         ShareSlackAction?: 'DENY',
 *         UseSlackAction?: 'DENY',
 *         ServiceNowAction?: 'DENY',
 *         CreateAndUpdateServiceNowAction?: 'DENY',
 *         ShareServiceNowAction?: 'DENY',
 *         UseServiceNowAction?: 'DENY',
 *         SalesforceAction?: 'DENY',
 *         CreateAndUpdateSalesforceAction?: 'DENY',
 *         ShareSalesforceAction?: 'DENY',
 *         UseSalesforceAction?: 'DENY',
 *         MSExchangeAction?: 'DENY',
 *         CreateAndUpdateMSExchangeAction?: 'DENY',
 *         ShareMSExchangeAction?: 'DENY',
 *         UseMSExchangeAction?: 'DENY',
 *         PagerDutyAction?: 'DENY',
 *         CreateAndUpdatePagerDutyAction?: 'DENY',
 *         SharePagerDutyAction?: 'DENY',
 *         UsePagerDutyAction?: 'DENY',
 *         JiraAction?: 'DENY',
 *         CreateAndUpdateJiraAction?: 'DENY',
 *         ShareJiraAction?: 'DENY',
 *         UseJiraAction?: 'DENY',
 *         ConfluenceAction?: 'DENY',
 *         CreateAndUpdateConfluenceAction?: 'DENY',
 *         ShareConfluenceAction?: 'DENY',
 *         UseConfluenceAction?: 'DENY',
 *         OneDriveAction?: 'DENY',
 *         CreateAndUpdateOneDriveAction?: 'DENY',
 *         ShareOneDriveAction?: 'DENY',
 *         UseOneDriveAction?: 'DENY',
 *         SharePointAction?: 'DENY',
 *         CreateAndUpdateSharePointAction?: 'DENY',
 *         ShareSharePointAction?: 'DENY',
 *         UseSharePointAction?: 'DENY',
 *         MSTeamsAction?: 'DENY',
 *         CreateAndUpdateMSTeamsAction?: 'DENY',
 *         ShareMSTeamsAction?: 'DENY',
 *         UseMSTeamsAction?: 'DENY',
 *         GoogleCalendarAction?: 'DENY',
 *         CreateAndUpdateGoogleCalendarAction?: 'DENY',
 *         ShareGoogleCalendarAction?: 'DENY',
 *         UseGoogleCalendarAction?: 'DENY',
 *         ZendeskAction?: 'DENY',
 *         CreateAndUpdateZendeskAction?: 'DENY',
 *         ShareZendeskAction?: 'DENY',
 *         UseZendeskAction?: 'DENY',
 *         SmartsheetAction?: 'DENY',
 *         CreateAndUpdateSmartsheetAction?: 'DENY',
 *         ShareSmartsheetAction?: 'DENY',
 *         UseSmartsheetAction?: 'DENY',
 *         SAPBusinessPartnerAction?: 'DENY',
 *         CreateAndUpdateSAPBusinessPartnerAction?: 'DENY',
 *         ShareSAPBusinessPartnerAction?: 'DENY',
 *         UseSAPBusinessPartnerAction?: 'DENY',
 *         SAPProductMasterDataAction?: 'DENY',
 *         CreateAndUpdateSAPProductMasterDataAction?: 'DENY',
 *         ShareSAPProductMasterDataAction?: 'DENY',
 *         UseSAPProductMasterDataAction?: 'DENY',
 *         SAPPhysicalInventoryAction?: 'DENY',
 *         CreateAndUpdateSAPPhysicalInventoryAction?: 'DENY',
 *         ShareSAPPhysicalInventoryAction?: 'DENY',
 *         UseSAPPhysicalInventoryAction?: 'DENY',
 *         SAPBillOfMaterialAction?: 'DENY',
 *         CreateAndUpdateSAPBillOfMaterialAction?: 'DENY',
 *         ShareSAPBillOfMaterialAction?: 'DENY',
 *         UseSAPBillOfMaterialAction?: 'DENY',
 *         SAPMaterialStockAction?: 'DENY',
 *         CreateAndUpdateSAPMaterialStockAction?: 'DENY',
 *         ShareSAPMaterialStockAction?: 'DENY',
 *         UseSAPMaterialStockAction?: 'DENY',
 *         FactSetAction?: 'DENY',
 *         CreateAndUpdateFactSetAction?: 'DENY',
 *         ShareFactSetAction?: 'DENY',
 *         UseFactSetAction?: 'DENY',
 *         AmazonSThreeAction?: 'DENY',
 *         CreateAndUpdateAmazonSThreeAction?: 'DENY',
 *         ShareAmazonSThreeAction?: 'DENY',
 *         UseAmazonSThreeAction?: 'DENY',
 *         TextractAction?: 'DENY',
 *         CreateAndUpdateTextractAction?: 'DENY',
 *         ShareTextractAction?: 'DENY',
 *         UseTextractAction?: 'DENY',
 *         ComprehendAction?: 'DENY',
 *         CreateAndUpdateComprehendAction?: 'DENY',
 *         ShareComprehendAction?: 'DENY',
 *         UseComprehendAction?: 'DENY',
 *         ComprehendMedicalAction?: 'DENY',
 *         CreateAndUpdateComprehendMedicalAction?: 'DENY',
 *         ShareComprehendMedicalAction?: 'DENY',
 *         UseComprehendMedicalAction?: 'DENY',
 *         AmazonBedrockARSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockARSAction?: 'DENY',
 *         ShareAmazonBedrockARSAction?: 'DENY',
 *         UseAmazonBedrockARSAction?: 'DENY',
 *         AmazonBedrockFSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockFSAction?: 'DENY',
 *         ShareAmazonBedrockFSAction?: 'DENY',
 *         UseAmazonBedrockFSAction?: 'DENY',
 *         AmazonBedrockKRSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockKRSAction?: 'DENY',
 *         ShareAmazonBedrockKRSAction?: 'DENY',
 *         UseAmazonBedrockKRSAction?: 'DENY',
 *         MCPAction?: 'DENY',
 *         CreateAndUpdateMCPAction?: 'DENY',
 *         ShareMCPAction?: 'DENY',
 *         UseMCPAction?: 'DENY',
 *         OpenAPIAction?: 'DENY',
 *         CreateAndUpdateOpenAPIAction?: 'DENY',
 *         ShareOpenAPIAction?: 'DENY',
 *         UseOpenAPIAction?: 'DENY',
 *         SandPGMIAction?: 'DENY',
 *         CreateAndUpdateSandPGMIAction?: 'DENY',
 *         ShareSandPGMIAction?: 'DENY',
 *         UseSandPGMIAction?: 'DENY',
 *         SandPGlobalEnergyAction?: 'DENY',
 *         CreateAndUpdateSandPGlobalEnergyAction?: 'DENY',
 *         ShareSandPGlobalEnergyAction?: 'DENY',
 *         UseSandPGlobalEnergyAction?: 'DENY',
 *         BambooHRAction?: 'DENY',
 *         CreateAndUpdateBambooHRAction?: 'DENY',
 *         ShareBambooHRAction?: 'DENY',
 *         UseBambooHRAction?: 'DENY',
 *         BoxAgentAction?: 'DENY',
 *         CreateAndUpdateBoxAgentAction?: 'DENY',
 *         ShareBoxAgentAction?: 'DENY',
 *         UseBoxAgentAction?: 'DENY',
 *         CanvaAgentAction?: 'DENY',
 *         CreateAndUpdateCanvaAgentAction?: 'DENY',
 *         ShareCanvaAgentAction?: 'DENY',
 *         UseCanvaAgentAction?: 'DENY',
 *         GithubAction?: 'DENY',
 *         CreateAndUpdateGithubAction?: 'DENY',
 *         ShareGithubAction?: 'DENY',
 *         UseGithubAction?: 'DENY',
 *         NotionAction?: 'DENY',
 *         CreateAndUpdateNotionAction?: 'DENY',
 *         ShareNotionAction?: 'DENY',
 *         UseNotionAction?: 'DENY',
 *         LinearAction?: 'DENY',
 *         CreateAndUpdateLinearAction?: 'DENY',
 *         ShareLinearAction?: 'DENY',
 *         UseLinearAction?: 'DENY',
 *         HuggingFaceAction?: 'DENY',
 *         CreateAndUpdateHuggingFaceAction?: 'DENY',
 *         ShareHuggingFaceAction?: 'DENY',
 *         UseHuggingFaceAction?: 'DENY',
 *         MondayAction?: 'DENY',
 *         CreateAndUpdateMondayAction?: 'DENY',
 *         ShareMondayAction?: 'DENY',
 *         UseMondayAction?: 'DENY',
 *         HubspotAction?: 'DENY',
 *         CreateAndUpdateHubspotAction?: 'DENY',
 *         ShareHubspotAction?: 'DENY',
 *         UseHubspotAction?: 'DENY',
 *         IntercomAction?: 'DENY',
 *         CreateAndUpdateIntercomAction?: 'DENY',
 *         ShareIntercomAction?: 'DENY',
 *         UseIntercomAction?: 'DENY',
 *         NewRelicAction?: 'DENY',
 *         CreateAndUpdateNewRelicAction?: 'DENY',
 *         ShareNewRelicAction?: 'DENY',
 *         UseNewRelicAction?: 'DENY',
 *         Topic?: 'DENY',
 *         EditVisualWithQ?: 'DENY',
 *         BuildCalculatedFieldWithQ?: 'DENY',
 *         CreateDashboardExecutiveSummaryWithQ?: 'DENY',
 *         Space?: 'DENY',
 *         CreateSpaces?: 'DENY',
 *         ShareSpaces?: 'DENY',
 *         ChatAgent?: 'DENY',
 *         CreateChatAgents?: 'DENY',
 *         ShareChatAgents?: 'DENY',
 *         Research?: 'DENY',
 *         SelfUpgradeUserRole?: 'DENY',
 *         Extension?: 'DENY',
 *         UseBrowserExtension?: 'DENY',
 *         UseWordAddInExtension?: 'DENY',
 *         UseOutlookAddInExtension?: 'DENY',
 *         UseExcelAddInExtension?: 'DENY',
 *         UsePowerpointAddInExtension?: 'DENY',
 *         ManageSharedFolders?: 'DENY',
 *         GenerateAnalyses?: 'DENY',
 *         Story?: 'DENY',
 *         Scenario?: 'DENY',
 *         Trigger?: 'DENY',
 *         ScheduleTrigger?: 'DENY',
 *         InboundEmailTrigger?: 'DENY',
 *         QuickEventTrigger?: 'DENY',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDashboard(array $args = [])
 * @phpstan-method \Aws\Result createDashboard(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     Name?: string,
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VersionDescription?: string,
 *     DashboardPublishOptions?: array{
 *         AdHocFilteringOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportToCSVOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         SheetControlsOption?: array{VisibilityState?: 'COLLAPSED'|'EXPANDED', ...},
 *         VisualPublishOptions?: array{ExportHiddenFieldsOption?: array, ...},
 *         SheetLayoutElementMaximizationOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualMenuOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualAxisSortOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportWithHiddenFieldsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointDrillUpDownOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointMenuLabelOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointTooltipOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataQAEnabledOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         QuickSuiteActionsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExecutiveSummaryOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataStoriesSharingOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ThemeArn?: string,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     FolderArns?: list<string>,
 *     LinkSharingConfiguration?: array{Permissions?: list<array>, ...},
 *     LinkEntities?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDashboardAsync(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     Name?: string,
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VersionDescription?: string,
 *     DashboardPublishOptions?: array{
 *         AdHocFilteringOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportToCSVOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         SheetControlsOption?: array{VisibilityState?: 'COLLAPSED'|'EXPANDED', ...},
 *         VisualPublishOptions?: array{ExportHiddenFieldsOption?: array, ...},
 *         SheetLayoutElementMaximizationOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualMenuOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualAxisSortOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportWithHiddenFieldsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointDrillUpDownOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointMenuLabelOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointTooltipOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataQAEnabledOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         QuickSuiteActionsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExecutiveSummaryOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataStoriesSharingOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ThemeArn?: string,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     FolderArns?: list<string>,
 *     LinkSharingConfiguration?: array{Permissions?: list<array>, ...},
 *     LinkEntities?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSet(array $args = [])
 * @phpstan-method \Aws\Result createDataSet(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     Name?: string,
 *     PhysicalTableMap?: array<string, array{
 *         RelationalTable?: array,
 *         CustomSql?: array,
 *         S3Source?: array,
 *         SaaSTable?: array,
 *         FileSource?: array,
 *         ...,
 *     }>,
 *     LogicalTableMap?: array<string, array{Alias?: string, DataTransforms?: list<array>, Source?: array, ...}>,
 *     ImportMode?: 'DIRECT_QUERY'|'SPICE',
 *     ColumnGroups?: list<array{GeoSpatialColumnGroup?: array, ...}>,
 *     FieldFolders?: array<string, array{description?: string, columns?: list<string>, ...}>,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RowLevelPermissionDataSet?: array{
 *         Namespace?: string,
 *         Arn?: string,
 *         PermissionPolicy?: 'DENY_ACCESS'|'GRANT_ACCESS',
 *         FormatVersion?: 'VERSION_1'|'VERSION_2',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     RowLevelPermissionTagConfiguration?: array{Status?: 'DISABLED'|'ENABLED', TagRules?: list<array>, TagRuleConfigurations?: list<list<string>>, ...},
 *     ColumnLevelPermissionRules?: list<array{Principals?: list<string>, ColumnNames?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataSetUsageConfiguration?: array{DisableUseAsDirectQuerySource?: bool, DisableUseAsImportedSource?: bool, ...},
 *     DatasetParameters?: list<array{
 *         StringDatasetParameter?: array,
 *         DecimalDatasetParameter?: array,
 *         IntegerDatasetParameter?: array,
 *         DateTimeDatasetParameter?: array,
 *         ...,
 *     }>,
 *     FolderArns?: list<string>,
 *     PerformanceConfiguration?: array{UniqueKeys?: list<array>, ...},
 *     UseAs?: 'RLS_RULES',
 *     DataPrepConfiguration?: array{
 *         SourceTableMap?: array<string, array>,
 *         TransformStepMap?: array<string, array>,
 *         DestinationTableMap?: array<string, array>,
 *         ...,
 *     },
 *     SemanticModelConfiguration?: array{TableMap?: array<string, array>, SemanticMetadata?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSetAsync(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     Name?: string,
 *     PhysicalTableMap?: array<string, array{
 *         RelationalTable?: array,
 *         CustomSql?: array,
 *         S3Source?: array,
 *         SaaSTable?: array,
 *         FileSource?: array,
 *         ...,
 *     }>,
 *     LogicalTableMap?: array<string, array{Alias?: string, DataTransforms?: list<array>, Source?: array, ...}>,
 *     ImportMode?: 'DIRECT_QUERY'|'SPICE',
 *     ColumnGroups?: list<array{GeoSpatialColumnGroup?: array, ...}>,
 *     FieldFolders?: array<string, array{description?: string, columns?: list<string>, ...}>,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RowLevelPermissionDataSet?: array{
 *         Namespace?: string,
 *         Arn?: string,
 *         PermissionPolicy?: 'DENY_ACCESS'|'GRANT_ACCESS',
 *         FormatVersion?: 'VERSION_1'|'VERSION_2',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     RowLevelPermissionTagConfiguration?: array{Status?: 'DISABLED'|'ENABLED', TagRules?: list<array>, TagRuleConfigurations?: list<list<string>>, ...},
 *     ColumnLevelPermissionRules?: list<array{Principals?: list<string>, ColumnNames?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataSetUsageConfiguration?: array{DisableUseAsDirectQuerySource?: bool, DisableUseAsImportedSource?: bool, ...},
 *     DatasetParameters?: list<array{
 *         StringDatasetParameter?: array,
 *         DecimalDatasetParameter?: array,
 *         IntegerDatasetParameter?: array,
 *         DateTimeDatasetParameter?: array,
 *         ...,
 *     }>,
 *     FolderArns?: list<string>,
 *     PerformanceConfiguration?: array{UniqueKeys?: list<array>, ...},
 *     UseAs?: 'RLS_RULES',
 *     DataPrepConfiguration?: array{
 *         SourceTableMap?: array<string, array>,
 *         TransformStepMap?: array<string, array>,
 *         DestinationTableMap?: array<string, array>,
 *         ...,
 *     },
 *     SemanticModelConfiguration?: array{TableMap?: array<string, array>, SemanticMetadata?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSource(array $args = [])
 * @phpstan-method \Aws\Result createDataSource(array{
 *     AwsAccountId?: string,
 *     DataSourceId?: string,
 *     Name?: string,
 *     Type?: 'ADOBE_ANALYTICS'|'AMAZON_ELASTICSEARCH'|'AMAZON_OPENSEARCH'|'ATHENA'|'AURORA'|'AURORA_POSTGRESQL'|'AWS_IOT_ANALYTICS'|'BIGQUERY'|'CONFLUENCE'|'DATABRICKS'|'EXASOL'|'GITHUB'|'GOOGLESHEETS'|'GOOGLE_DRIVE'|'JIRA'|'MARIADB'|'MYSQL'|'ONE_DRIVE'|'ORACLE'|'POSTGRESQL'|'PRESTO'|'QBUSINESS'|'REDSHIFT'|'S3'|'S3_KNOWLEDGE_BASE'|'S3_TABLES'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'STARBURST'|'TERADATA'|'TIMESTREAM'|'TRINO'|'TWITTER'|'WEB_CRAWLER',
 *     DataSourceParameters?: array{
 *         AmazonElasticsearchParameters?: array{Domain?: string, ...},
 *         AthenaParameters?: array{
 *             WorkGroup?: string,
 *             RoleArn?: string,
 *             ConsumerAccountRoleArn?: string,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         AuroraParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AuroraPostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AwsIotAnalyticsParameters?: array{DataSetName?: string, ...},
 *         JiraParameters?: array{SiteBaseUrl?: string, ...},
 *         MariaDbParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         MySqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         OracleParameters?: array{Host?: string, Port?: int, Database?: string, UseServiceName?: bool, ...},
 *         PostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         PrestoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         RdsParameters?: array{InstanceId?: string, Database?: string, ...},
 *         RedshiftParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Database?: string,
 *             ClusterId?: string,
 *             IAMParameters?: array,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         S3Parameters?: array{ManifestFileLocation?: array, RoleArn?: string, ...},
 *         S3TablesParameters?: array{TableBucketArn?: string, ...},
 *         S3KnowledgeBaseParameters?: array{RoleArn?: string, BucketUrl?: string, MetadataFilesLocation?: string, ...},
 *         ServiceNowParameters?: array{SiteBaseUrl?: string, ...},
 *         SnowflakeParameters?: array{
 *             Host?: string,
 *             Database?: string,
 *             Warehouse?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             DatabaseAccessControlRole?: string,
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         SparkParameters?: array{Host?: string, Port?: int, ...},
 *         SqlServerParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TeradataParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TwitterParameters?: array{Query?: string, MaxRows?: int, ...},
 *         AmazonOpenSearchParameters?: array{Domain?: string, ...},
 *         ExasolParameters?: array{Host?: string, Port?: int, ...},
 *         DatabricksParameters?: array{Host?: string, Port?: int, SqlEndpointPath?: string, ...},
 *         StarburstParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Catalog?: string,
 *             ProductType?: 'ENTERPRISE'|'GALAXY',
 *             DatabaseAccessControlRole?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         TrinoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         BigQueryParameters?: array{ProjectId?: string, DataSetRegion?: string, ...},
 *         ImpalaParameters?: array{Host?: string, Port?: int, Database?: string, SqlEndpointPath?: string, ...},
 *         CustomConnectionParameters?: array{ConnectionType?: string, ...},
 *         WebCrawlerParameters?: array{
 *             WebCrawlerAuthType?: 'BASIC_AUTH'|'FORM'|'NO_AUTH'|'SAML',
 *             UsernameFieldXpath?: string,
 *             PasswordFieldXpath?: string,
 *             UsernameButtonXpath?: string,
 *             PasswordButtonXpath?: string,
 *             LoginPageUrl?: string,
 *             WebProxyHostName?: string,
 *             WebProxyPortNumber?: int,
 *             ...,
 *         },
 *         ConfluenceParameters?: array{ConfluenceUrl?: string, ...},
 *         QBusinessParameters?: array{ApplicationArn?: string, ...},
 *         SharePointParameters?: array{
 *             SharePointDomain?: string,
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         GoogleDriveParameters?: array{AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH', ...},
 *         OneDriveParameters?: array{
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         FMKBParameters?: array{KnowledgeBaseArn?: string, LinkedDataSourceIds?: list<string>, ...},
 *         ...,
 *     },
 *     Credentials?: array{
 *         CredentialPair?: array{Username?: string, Password?: string, AlternateDataSourceParameters?: list<array>, ...},
 *         CopySourceArn?: string,
 *         SecretArn?: string,
 *         KeyPairCredentials?: array{KeyPairUsername?: string, PrivateKey?: string, PrivateKeyPassphrase?: string, ...},
 *         WebProxyCredentials?: array{WebProxyUsername?: string, WebProxyPassword?: string, ...},
 *         OAuthClientCredentials?: array{ClientId?: string, ClientSecret?: string, Username?: string, ...},
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     VpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     SslProperties?: array{DisableSsl?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FolderArns?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceAsync(array{
 *     AwsAccountId?: string,
 *     DataSourceId?: string,
 *     Name?: string,
 *     Type?: 'ADOBE_ANALYTICS'|'AMAZON_ELASTICSEARCH'|'AMAZON_OPENSEARCH'|'ATHENA'|'AURORA'|'AURORA_POSTGRESQL'|'AWS_IOT_ANALYTICS'|'BIGQUERY'|'CONFLUENCE'|'DATABRICKS'|'EXASOL'|'GITHUB'|'GOOGLESHEETS'|'GOOGLE_DRIVE'|'JIRA'|'MARIADB'|'MYSQL'|'ONE_DRIVE'|'ORACLE'|'POSTGRESQL'|'PRESTO'|'QBUSINESS'|'REDSHIFT'|'S3'|'S3_KNOWLEDGE_BASE'|'S3_TABLES'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'STARBURST'|'TERADATA'|'TIMESTREAM'|'TRINO'|'TWITTER'|'WEB_CRAWLER',
 *     DataSourceParameters?: array{
 *         AmazonElasticsearchParameters?: array{Domain?: string, ...},
 *         AthenaParameters?: array{
 *             WorkGroup?: string,
 *             RoleArn?: string,
 *             ConsumerAccountRoleArn?: string,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         AuroraParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AuroraPostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AwsIotAnalyticsParameters?: array{DataSetName?: string, ...},
 *         JiraParameters?: array{SiteBaseUrl?: string, ...},
 *         MariaDbParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         MySqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         OracleParameters?: array{Host?: string, Port?: int, Database?: string, UseServiceName?: bool, ...},
 *         PostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         PrestoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         RdsParameters?: array{InstanceId?: string, Database?: string, ...},
 *         RedshiftParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Database?: string,
 *             ClusterId?: string,
 *             IAMParameters?: array,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         S3Parameters?: array{ManifestFileLocation?: array, RoleArn?: string, ...},
 *         S3TablesParameters?: array{TableBucketArn?: string, ...},
 *         S3KnowledgeBaseParameters?: array{RoleArn?: string, BucketUrl?: string, MetadataFilesLocation?: string, ...},
 *         ServiceNowParameters?: array{SiteBaseUrl?: string, ...},
 *         SnowflakeParameters?: array{
 *             Host?: string,
 *             Database?: string,
 *             Warehouse?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             DatabaseAccessControlRole?: string,
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         SparkParameters?: array{Host?: string, Port?: int, ...},
 *         SqlServerParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TeradataParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TwitterParameters?: array{Query?: string, MaxRows?: int, ...},
 *         AmazonOpenSearchParameters?: array{Domain?: string, ...},
 *         ExasolParameters?: array{Host?: string, Port?: int, ...},
 *         DatabricksParameters?: array{Host?: string, Port?: int, SqlEndpointPath?: string, ...},
 *         StarburstParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Catalog?: string,
 *             ProductType?: 'ENTERPRISE'|'GALAXY',
 *             DatabaseAccessControlRole?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         TrinoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         BigQueryParameters?: array{ProjectId?: string, DataSetRegion?: string, ...},
 *         ImpalaParameters?: array{Host?: string, Port?: int, Database?: string, SqlEndpointPath?: string, ...},
 *         CustomConnectionParameters?: array{ConnectionType?: string, ...},
 *         WebCrawlerParameters?: array{
 *             WebCrawlerAuthType?: 'BASIC_AUTH'|'FORM'|'NO_AUTH'|'SAML',
 *             UsernameFieldXpath?: string,
 *             PasswordFieldXpath?: string,
 *             UsernameButtonXpath?: string,
 *             PasswordButtonXpath?: string,
 *             LoginPageUrl?: string,
 *             WebProxyHostName?: string,
 *             WebProxyPortNumber?: int,
 *             ...,
 *         },
 *         ConfluenceParameters?: array{ConfluenceUrl?: string, ...},
 *         QBusinessParameters?: array{ApplicationArn?: string, ...},
 *         SharePointParameters?: array{
 *             SharePointDomain?: string,
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         GoogleDriveParameters?: array{AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH', ...},
 *         OneDriveParameters?: array{
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         FMKBParameters?: array{KnowledgeBaseArn?: string, LinkedDataSourceIds?: list<string>, ...},
 *         ...,
 *     },
 *     Credentials?: array{
 *         CredentialPair?: array{Username?: string, Password?: string, AlternateDataSourceParameters?: list<array>, ...},
 *         CopySourceArn?: string,
 *         SecretArn?: string,
 *         KeyPairCredentials?: array{KeyPairUsername?: string, PrivateKey?: string, PrivateKeyPassphrase?: string, ...},
 *         WebProxyCredentials?: array{WebProxyUsername?: string, WebProxyPassword?: string, ...},
 *         OAuthClientCredentials?: array{ClientId?: string, ClientSecret?: string, Username?: string, ...},
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     VpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     SslProperties?: array{DisableSsl?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FolderArns?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlow(array $args = [])
 * @phpstan-method \Aws\Result createFlow(array{
 *     AwsAccountId?: string,
 *     Name?: string,
 *     Description?: string,
 *     FlowDefinition?: array,
 *     Permissions?: list<array{Actions?: list<string>, Principal?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowAsync(array{
 *     AwsAccountId?: string,
 *     Name?: string,
 *     Description?: string,
 *     FlowDefinition?: array,
 *     Permissions?: list<array{Actions?: list<string>, Principal?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFolder(array $args = [])
 * @phpstan-method \Aws\Result createFolder(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     Name?: string,
 *     FolderType?: 'RESTRICTED'|'SHARED',
 *     ParentFolderArn?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SharingModel?: 'ACCOUNT'|'NAMESPACE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFolderAsync(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     Name?: string,
 *     FolderType?: 'RESTRICTED'|'SHARED',
 *     ParentFolderArn?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SharingModel?: 'ACCOUNT'|'NAMESPACE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFolderMembership(array $args = [])
 * @phpstan-method \Aws\Result createFolderMembership(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     MemberId?: string,
 *     MemberType?: 'ANALYSIS'|'DASHBOARD'|'DATASET'|'DATASOURCE'|'TOPIC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFolderMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFolderMembershipAsync(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     MemberId?: string,
 *     MemberType?: 'ANALYSIS'|'DASHBOARD'|'DATASET'|'DATASOURCE'|'TOPIC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{GroupName?: string, Description?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{GroupName?: string, Description?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result createGroupMembership(array $args = [])
 * @phpstan-method \Aws\Result createGroupMembership(array{MemberName?: string, GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupMembershipAsync(array{MemberName?: string, GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result createIAMPolicyAssignment(array $args = [])
 * @phpstan-method \Aws\Result createIAMPolicyAssignment(array{
 *     AwsAccountId?: string,
 *     AssignmentName?: string,
 *     AssignmentStatus?: 'DISABLED'|'DRAFT'|'ENABLED',
 *     PolicyArn?: string,
 *     Identities?: array<string, list<string>>,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIAMPolicyAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIAMPolicyAssignmentAsync(array{
 *     AwsAccountId?: string,
 *     AssignmentName?: string,
 *     AssignmentStatus?: 'DISABLED'|'DRAFT'|'ENABLED',
 *     PolicyArn?: string,
 *     Identities?: array<string, list<string>>,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIngestion(array $args = [])
 * @phpstan-method \Aws\Result createIngestion(array{
 *     DataSetId?: string,
 *     IngestionId?: string,
 *     AwsAccountId?: string,
 *     IngestionType?: 'FULL_REFRESH'|'INCREMENTAL_REFRESH',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIngestionAsync(array{
 *     DataSetId?: string,
 *     IngestionId?: string,
 *     AwsAccountId?: string,
 *     IngestionType?: 'FULL_REFRESH'|'INCREMENTAL_REFRESH',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result createKnowledgeBase(array{
 *     AwsAccountId?: string,
 *     KnowledgeBaseId?: string,
 *     Name?: string,
 *     DataSourceArn?: string,
 *     KnowledgeBaseConfiguration?: array{templateConfiguration?: array{template?: array, ...}, ...},
 *     Description?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     MediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{
 *             videoExtractionStatus?: 'DISABLED'|'ENABLED',
 *             videoExtractionType?: 'AUDIO_TRANSCRIPTION_ONLY'|'VISUAL_CONTENT_AND_AUDIO_TRANSCRIPTION',
 *             ...,
 *         },
 *         ...,
 *     },
 *     AccessControlConfiguration?: array{isACLEnabled?: bool, ...},
 *     PrimaryOwnerArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array{
 *     AwsAccountId?: string,
 *     KnowledgeBaseId?: string,
 *     Name?: string,
 *     DataSourceArn?: string,
 *     KnowledgeBaseConfiguration?: array{templateConfiguration?: array{template?: array, ...}, ...},
 *     Description?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     MediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{
 *             videoExtractionStatus?: 'DISABLED'|'ENABLED',
 *             videoExtractionType?: 'AUDIO_TRANSCRIPTION_ONLY'|'VISUAL_CONTENT_AND_AUDIO_TRANSCRIPTION',
 *             ...,
 *         },
 *         ...,
 *     },
 *     AccessControlConfiguration?: array{isACLEnabled?: bool, ...},
 *     PrimaryOwnerArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNamespace(array $args = [])
 * @phpstan-method \Aws\Result createNamespace(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     IdentityStore?: 'QUICKSIGHT',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNamespaceAsync(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     IdentityStore?: 'QUICKSIGHT',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOAuthClientApplication(array $args = [])
 * @phpstan-method \Aws\Result createOAuthClientApplication(array{
 *     AwsAccountId?: string,
 *     OAuthClientApplicationId?: string,
 *     Name?: string,
 *     OAuthClientAuthenticationType?: 'TOKEN',
 *     ClientId?: string,
 *     ClientSecret?: string,
 *     OAuthTokenEndpointUrl?: string,
 *     OAuthAuthorizationEndpointUrl?: string,
 *     OAuthScopes?: string,
 *     DataSourceType?: 'ADOBE_ANALYTICS'|'AMAZON_ELASTICSEARCH'|'AMAZON_OPENSEARCH'|'ATHENA'|'AURORA'|'AURORA_POSTGRESQL'|'AWS_IOT_ANALYTICS'|'BIGQUERY'|'CONFLUENCE'|'DATABRICKS'|'EXASOL'|'GITHUB'|'GOOGLESHEETS'|'GOOGLE_DRIVE'|'JIRA'|'MARIADB'|'MYSQL'|'ONE_DRIVE'|'ORACLE'|'POSTGRESQL'|'PRESTO'|'QBUSINESS'|'REDSHIFT'|'S3'|'S3_KNOWLEDGE_BASE'|'S3_TABLES'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'STARBURST'|'TERADATA'|'TIMESTREAM'|'TRINO'|'TWITTER'|'WEB_CRAWLER',
 *     IdentityProviderVpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOAuthClientApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOAuthClientApplicationAsync(array{
 *     AwsAccountId?: string,
 *     OAuthClientApplicationId?: string,
 *     Name?: string,
 *     OAuthClientAuthenticationType?: 'TOKEN',
 *     ClientId?: string,
 *     ClientSecret?: string,
 *     OAuthTokenEndpointUrl?: string,
 *     OAuthAuthorizationEndpointUrl?: string,
 *     OAuthScopes?: string,
 *     DataSourceType?: 'ADOBE_ANALYTICS'|'AMAZON_ELASTICSEARCH'|'AMAZON_OPENSEARCH'|'ATHENA'|'AURORA'|'AURORA_POSTGRESQL'|'AWS_IOT_ANALYTICS'|'BIGQUERY'|'CONFLUENCE'|'DATABRICKS'|'EXASOL'|'GITHUB'|'GOOGLESHEETS'|'GOOGLE_DRIVE'|'JIRA'|'MARIADB'|'MYSQL'|'ONE_DRIVE'|'ORACLE'|'POSTGRESQL'|'PRESTO'|'QBUSINESS'|'REDSHIFT'|'S3'|'S3_KNOWLEDGE_BASE'|'S3_TABLES'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'STARBURST'|'TERADATA'|'TIMESTREAM'|'TRINO'|'TWITTER'|'WEB_CRAWLER',
 *     IdentityProviderVpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result createRefreshSchedule(array{
 *     DataSetId?: string,
 *     AwsAccountId?: string,
 *     Schedule?: array{
 *         ScheduleId?: string,
 *         ScheduleFrequency?: array{
 *             Interval?: 'DAILY'|'HOURLY'|'MINUTE15'|'MINUTE30'|'MONTHLY'|'WEEKLY',
 *             RefreshOnDay?: array,
 *             Timezone?: string,
 *             TimeOfTheDay?: string,
 *             ...,
 *         },
 *         StartAfterDateTime?: int|string|\DateTimeInterface,
 *         RefreshType?: 'FULL_REFRESH'|'INCREMENTAL_REFRESH',
 *         Arn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRefreshScheduleAsync(array{
 *     DataSetId?: string,
 *     AwsAccountId?: string,
 *     Schedule?: array{
 *         ScheduleId?: string,
 *         ScheduleFrequency?: array{
 *             Interval?: 'DAILY'|'HOURLY'|'MINUTE15'|'MINUTE30'|'MONTHLY'|'WEEKLY',
 *             RefreshOnDay?: array,
 *             Timezone?: string,
 *             TimeOfTheDay?: string,
 *             ...,
 *         },
 *         StartAfterDateTime?: int|string|\DateTimeInterface,
 *         RefreshType?: 'FULL_REFRESH'|'INCREMENTAL_REFRESH',
 *         Arn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoleMembership(array $args = [])
 * @phpstan-method \Aws\Result createRoleMembership(array{
 *     MemberName?: string,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoleMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoleMembershipAsync(array{
 *     MemberName?: string,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSpace(array $args = [])
 * @phpstan-method \Aws\Result createSpace(array{AwsAccountId?: string, SpaceId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSpaceAsync(array{AwsAccountId?: string, SpaceId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result createTemplate(array $args = [])
 * @phpstan-method \Aws\Result createTemplate(array{
 *     AwsAccountId?: string,
 *     TemplateId?: string,
 *     Name?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     SourceEntity?: array{
 *         SourceAnalysis?: array{Arn?: string, DataSetReferences?: list<array>, ...},
 *         SourceTemplate?: array{Arn?: string, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VersionDescription?: string,
 *     Definition?: array{
 *         DataSetConfigurations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateAsync(array{
 *     AwsAccountId?: string,
 *     TemplateId?: string,
 *     Name?: string,
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     SourceEntity?: array{
 *         SourceAnalysis?: array{Arn?: string, DataSetReferences?: list<array>, ...},
 *         SourceTemplate?: array{Arn?: string, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VersionDescription?: string,
 *     Definition?: array{
 *         DataSetConfigurations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTemplateAlias(array $args = [])
 * @phpstan-method \Aws\Result createTemplateAlias(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, TemplateVersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateAliasAsync(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, TemplateVersionNumber?: int, ...} $args = [])
 * @method \Aws\Result createTheme(array $args = [])
 * @phpstan-method \Aws\Result createTheme(array{
 *     AwsAccountId?: string,
 *     ThemeId?: string,
 *     Name?: string,
 *     BaseThemeId?: string,
 *     VersionDescription?: string,
 *     Configuration?: array{
 *         DataColorPalette?: array{Colors?: list<string>, MinMaxGradient?: list<string>, EmptyFillColor?: string, ...},
 *         UIColorPalette?: array{
 *             PrimaryForeground?: string,
 *             PrimaryBackground?: string,
 *             SecondaryForeground?: string,
 *             SecondaryBackground?: string,
 *             Accent?: string,
 *             AccentForeground?: string,
 *             Danger?: string,
 *             DangerForeground?: string,
 *             Warning?: string,
 *             WarningForeground?: string,
 *             Success?: string,
 *             SuccessForeground?: string,
 *             Dimension?: string,
 *             DimensionForeground?: string,
 *             Measure?: string,
 *             MeasureForeground?: string,
 *             ...,
 *         },
 *         Sheet?: array{Tile?: array, TileLayout?: array, Background?: array, ...},
 *         Typography?: array{
 *             FontFamilies?: list<array>,
 *             AxisTitleFontConfiguration?: array,
 *             AxisLabelFontConfiguration?: array,
 *             LegendTitleFontConfiguration?: array,
 *             LegendValueFontConfiguration?: array,
 *             DataLabelFontConfiguration?: array,
 *             VisualTitleFontConfiguration?: array,
 *             VisualSubtitleFontConfiguration?: array,
 *             ControlTitleFontConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThemeAsync(array{
 *     AwsAccountId?: string,
 *     ThemeId?: string,
 *     Name?: string,
 *     BaseThemeId?: string,
 *     VersionDescription?: string,
 *     Configuration?: array{
 *         DataColorPalette?: array{Colors?: list<string>, MinMaxGradient?: list<string>, EmptyFillColor?: string, ...},
 *         UIColorPalette?: array{
 *             PrimaryForeground?: string,
 *             PrimaryBackground?: string,
 *             SecondaryForeground?: string,
 *             SecondaryBackground?: string,
 *             Accent?: string,
 *             AccentForeground?: string,
 *             Danger?: string,
 *             DangerForeground?: string,
 *             Warning?: string,
 *             WarningForeground?: string,
 *             Success?: string,
 *             SuccessForeground?: string,
 *             Dimension?: string,
 *             DimensionForeground?: string,
 *             Measure?: string,
 *             MeasureForeground?: string,
 *             ...,
 *         },
 *         Sheet?: array{Tile?: array, TileLayout?: array, Background?: array, ...},
 *         Typography?: array{
 *             FontFamilies?: list<array>,
 *             AxisTitleFontConfiguration?: array,
 *             AxisLabelFontConfiguration?: array,
 *             LegendTitleFontConfiguration?: array,
 *             LegendValueFontConfiguration?: array,
 *             DataLabelFontConfiguration?: array,
 *             VisualTitleFontConfiguration?: array,
 *             VisualSubtitleFontConfiguration?: array,
 *             ControlTitleFontConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Permissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThemeAlias(array $args = [])
 * @phpstan-method \Aws\Result createThemeAlias(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ThemeVersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createThemeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThemeAliasAsync(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ThemeVersionNumber?: int, ...} $args = [])
 * @method \Aws\Result createTopic(array $args = [])
 * @phpstan-method \Aws\Result createTopic(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     Topic?: array{
 *         Name?: string,
 *         Description?: string,
 *         UserExperienceVersion?: 'LEGACY'|'NEW_READER_EXPERIENCE',
 *         DataSets?: list<array>,
 *         ConfigOptions?: array{QBusinessInsightsEnabled?: bool, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FolderArns?: list<string>,
 *     CustomInstructions?: array{CustomInstructionsString?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTopicAsync(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     Topic?: array{
 *         Name?: string,
 *         Description?: string,
 *         UserExperienceVersion?: 'LEGACY'|'NEW_READER_EXPERIENCE',
 *         DataSets?: list<array>,
 *         ConfigOptions?: array{QBusinessInsightsEnabled?: bool, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FolderArns?: list<string>,
 *     CustomInstructions?: array{CustomInstructionsString?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTopicRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result createTopicRefreshSchedule(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     DatasetArn?: string,
 *     DatasetName?: string,
 *     RefreshSchedule?: array{
 *         IsEnabled?: bool,
 *         BasedOnSpiceSchedule?: bool,
 *         StartingAt?: int|string|\DateTimeInterface,
 *         Timezone?: string,
 *         RepeatAt?: string,
 *         TopicScheduleType?: 'DAILY'|'HOURLY'|'MONTHLY'|'WEEKLY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTopicRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTopicRefreshScheduleAsync(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     DatasetArn?: string,
 *     DatasetName?: string,
 *     RefreshSchedule?: array{
 *         IsEnabled?: bool,
 *         BasedOnSpiceSchedule?: bool,
 *         StartingAt?: int|string|\DateTimeInterface,
 *         Timezone?: string,
 *         RepeatAt?: string,
 *         TopicScheduleType?: 'DAILY'|'HOURLY'|'MONTHLY'|'WEEKLY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVPCConnection(array $args = [])
 * @phpstan-method \Aws\Result createVPCConnection(array{
 *     AwsAccountId?: string,
 *     VPCConnectionId?: string,
 *     Name?: string,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     DnsResolvers?: list<string>,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVPCConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVPCConnectionAsync(array{
 *     AwsAccountId?: string,
 *     VPCConnectionId?: string,
 *     Name?: string,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     DnsResolvers?: list<string>,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountCustomPermission(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountCustomPermissionAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteAccountCustomization(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountCustomization(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountCustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountCustomizationAsync(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteAccountSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountSubscription(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountSubscriptionAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteActionConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteActionConnector(array{AwsAccountId?: string, ActionConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteActionConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteActionConnectorAsync(array{AwsAccountId?: string, ActionConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteAgent(array $args = [])
 * @phpstan-method \Aws\Result deleteAgent(array{AgentId?: string, AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentAsync(array{AgentId?: string, AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteAnalysis(array $args = [])
 * @phpstan-method \Aws\Result deleteAnalysis(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     RecoveryWindowInDays?: int,
 *     ForceDeleteWithoutRecovery?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnalysisAsync(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     RecoveryWindowInDays?: int,
 *     ForceDeleteWithoutRecovery?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBrand(array $args = [])
 * @phpstan-method \Aws\Result deleteBrand(array{AwsAccountId?: string, BrandId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrandAsync(array{AwsAccountId?: string, BrandId?: string, ...} $args = [])
 * @method \Aws\Result deleteBrandAssignment(array $args = [])
 * @phpstan-method \Aws\Result deleteBrandAssignment(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrandAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrandAssignmentAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomPermissions(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomPermissions(array{AwsAccountId?: string, CustomPermissionsName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomPermissionsAsync(array{AwsAccountId?: string, CustomPermissionsName?: string, ...} $args = [])
 * @method \Aws\Result deleteDashboard(array $args = [])
 * @phpstan-method \Aws\Result deleteDashboard(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteDataSet(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSet(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSetAsync(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSetRefreshProperties(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSetRefreshProperties(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSetRefreshPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSetRefreshPropertiesAsync(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{AwsAccountId?: string, DataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{AwsAccountId?: string, DataSourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteDefaultQBusinessApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteDefaultQBusinessApplication(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDefaultQBusinessApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDefaultQBusinessApplicationAsync(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteFlow(array{AwsAccountId?: string, FlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowAsync(array{AwsAccountId?: string, FlowId?: string, ...} $args = [])
 * @method \Aws\Result deleteFolder(array $args = [])
 * @phpstan-method \Aws\Result deleteFolder(array{AwsAccountId?: string, FolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFolderAsync(array{AwsAccountId?: string, FolderId?: string, ...} $args = [])
 * @method \Aws\Result deleteFolderMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteFolderMembership(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     MemberId?: string,
 *     MemberType?: 'ANALYSIS'|'DASHBOARD'|'DATASET'|'DATASOURCE'|'TOPIC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFolderMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFolderMembershipAsync(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     MemberId?: string,
 *     MemberType?: 'ANALYSIS'|'DASHBOARD'|'DATASET'|'DATASOURCE'|'TOPIC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteGroupMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteGroupMembership(array{MemberName?: string, GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupMembershipAsync(array{MemberName?: string, GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteIAMPolicyAssignment(array $args = [])
 * @phpstan-method \Aws\Result deleteIAMPolicyAssignment(array{AwsAccountId?: string, AssignmentName?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIAMPolicyAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIAMPolicyAssignmentAsync(array{AwsAccountId?: string, AssignmentName?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteIdentityPropagationConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentityPropagationConfig(array{AwsAccountId?: string, Service?: 'ATHENA'|'GLUE_DATA_CATALOG'|'QBUSINESS'|'REDSHIFT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityPropagationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityPropagationConfigAsync(array{AwsAccountId?: string, Service?: 'ATHENA'|'GLUE_DATA_CATALOG'|'QBUSINESS'|'REDSHIFT', ...} $args = [])
 * @method \Aws\Result deleteKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result deleteKnowledgeBase(array{AwsAccountId?: string, KnowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array{AwsAccountId?: string, KnowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteNamespace(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteOAuthClientApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteOAuthClientApplication(array{AwsAccountId?: string, OAuthClientApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOAuthClientApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOAuthClientApplicationAsync(array{AwsAccountId?: string, OAuthClientApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteRefreshSchedule(array{DataSetId?: string, AwsAccountId?: string, ScheduleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRefreshScheduleAsync(array{DataSetId?: string, AwsAccountId?: string, ScheduleId?: string, ...} $args = [])
 * @method \Aws\Result deleteRoleCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result deleteRoleCustomPermission(array{
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoleCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoleCustomPermissionAsync(array{
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteRoleMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteRoleMembership(array{
 *     MemberName?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoleMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoleMembershipAsync(array{
 *     MemberName?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteSpace(array{AwsAccountId?: string, SpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array{AwsAccountId?: string, SpaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplate(array{AwsAccountId?: string, TemplateId?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array{AwsAccountId?: string, TemplateId?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteTemplateAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplateAlias(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateAliasAsync(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, ...} $args = [])
 * @method \Aws\Result deleteTheme(array $args = [])
 * @phpstan-method \Aws\Result deleteTheme(array{AwsAccountId?: string, ThemeId?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThemeAsync(array{AwsAccountId?: string, ThemeId?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteThemeAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteThemeAlias(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThemeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThemeAliasAsync(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ...} $args = [])
 * @method \Aws\Result deleteTopic(array $args = [])
 * @phpstan-method \Aws\Result deleteTopic(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTopicAsync(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \Aws\Result deleteTopicRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteTopicRefreshSchedule(array{AwsAccountId?: string, TopicId?: string, DatasetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTopicRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTopicRefreshScheduleAsync(array{AwsAccountId?: string, TopicId?: string, DatasetId?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{UserName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{UserName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteUserByPrincipalId(array $args = [])
 * @phpstan-method \Aws\Result deleteUserByPrincipalId(array{PrincipalId?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserByPrincipalIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserByPrincipalIdAsync(array{PrincipalId?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteUserCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result deleteUserCustomPermission(array{UserName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserCustomPermissionAsync(array{UserName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result deleteVPCConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteVPCConnection(array{AwsAccountId?: string, VPCConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVPCConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVPCConnectionAsync(array{AwsAccountId?: string, VPCConnectionId?: string, ...} $args = [])
 * @method \Aws\Result describeAccountCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result describeAccountCustomPermission(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountCustomPermissionAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeAccountCustomization(array $args = [])
 * @phpstan-method \Aws\Result describeAccountCustomization(array{AwsAccountId?: string, Namespace?: string, Resolved?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountCustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountCustomizationAsync(array{AwsAccountId?: string, Namespace?: string, Resolved?: bool, ...} $args = [])
 * @method \Aws\Result describeAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result describeAccountSettings(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountSettingsAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeAccountSubscription(array $args = [])
 * @phpstan-method \Aws\Result describeAccountSubscription(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountSubscriptionAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeActionConnector(array $args = [])
 * @phpstan-method \Aws\Result describeActionConnector(array{AwsAccountId?: string, ActionConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActionConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActionConnectorAsync(array{AwsAccountId?: string, ActionConnectorId?: string, ...} $args = [])
 * @method \Aws\Result describeActionConnectorPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeActionConnectorPermissions(array{AwsAccountId?: string, ActionConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActionConnectorPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActionConnectorPermissionsAsync(array{AwsAccountId?: string, ActionConnectorId?: string, ...} $args = [])
 * @method \Aws\Result describeAgent(array $args = [])
 * @phpstan-method \Aws\Result describeAgent(array{AgentId?: string, AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAgentAsync(array{AgentId?: string, AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeAgentPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeAgentPermissions(array{AgentId?: string, AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgentPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAgentPermissionsAsync(array{AgentId?: string, AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeAnalysis(array $args = [])
 * @phpstan-method \Aws\Result describeAnalysis(array{AwsAccountId?: string, AnalysisId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAnalysisAsync(array{AwsAccountId?: string, AnalysisId?: string, ...} $args = [])
 * @method \Aws\Result describeAnalysisDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeAnalysisDefinition(array{AwsAccountId?: string, AnalysisId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAnalysisDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAnalysisDefinitionAsync(array{AwsAccountId?: string, AnalysisId?: string, ...} $args = [])
 * @method \Aws\Result describeAnalysisPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeAnalysisPermissions(array{AwsAccountId?: string, AnalysisId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAnalysisPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAnalysisPermissionsAsync(array{AwsAccountId?: string, AnalysisId?: string, ...} $args = [])
 * @method \Aws\Result describeAssetBundleExportJob(array $args = [])
 * @phpstan-method \Aws\Result describeAssetBundleExportJob(array{AwsAccountId?: string, AssetBundleExportJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetBundleExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetBundleExportJobAsync(array{AwsAccountId?: string, AssetBundleExportJobId?: string, ...} $args = [])
 * @method \Aws\Result describeAssetBundleImportJob(array $args = [])
 * @phpstan-method \Aws\Result describeAssetBundleImportJob(array{AwsAccountId?: string, AssetBundleImportJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetBundleImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetBundleImportJobAsync(array{AwsAccountId?: string, AssetBundleImportJobId?: string, ...} $args = [])
 * @method \Aws\Result describeAutomationJob(array $args = [])
 * @phpstan-method \Aws\Result describeAutomationJob(array{
 *     AwsAccountId?: string,
 *     AutomationGroupId?: string,
 *     AutomationId?: string,
 *     IncludeInputPayload?: bool,
 *     IncludeOutputPayload?: bool,
 *     JobId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutomationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutomationJobAsync(array{
 *     AwsAccountId?: string,
 *     AutomationGroupId?: string,
 *     AutomationId?: string,
 *     IncludeInputPayload?: bool,
 *     IncludeOutputPayload?: bool,
 *     JobId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBrand(array $args = [])
 * @phpstan-method \Aws\Result describeBrand(array{AwsAccountId?: string, BrandId?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBrandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBrandAsync(array{AwsAccountId?: string, BrandId?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result describeBrandAssignment(array $args = [])
 * @phpstan-method \Aws\Result describeBrandAssignment(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBrandAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBrandAssignmentAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeBrandPublishedVersion(array $args = [])
 * @phpstan-method \Aws\Result describeBrandPublishedVersion(array{AwsAccountId?: string, BrandId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBrandPublishedVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBrandPublishedVersionAsync(array{AwsAccountId?: string, BrandId?: string, ...} $args = [])
 * @method \Aws\Result describeCustomPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeCustomPermissions(array{AwsAccountId?: string, CustomPermissionsName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomPermissionsAsync(array{AwsAccountId?: string, CustomPermissionsName?: string, ...} $args = [])
 * @method \Aws\Result describeDashboard(array $args = [])
 * @phpstan-method \Aws\Result describeDashboard(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDashboardAsync(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \Aws\Result describeDashboardDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeDashboardDefinition(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDashboardDefinitionAsync(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \Aws\Result describeDashboardPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeDashboardPermissions(array{AwsAccountId?: string, DashboardId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDashboardPermissionsAsync(array{AwsAccountId?: string, DashboardId?: string, ...} $args = [])
 * @method \Aws\Result describeDashboardSnapshotJob(array $args = [])
 * @phpstan-method \Aws\Result describeDashboardSnapshotJob(array{AwsAccountId?: string, DashboardId?: string, SnapshotJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardSnapshotJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDashboardSnapshotJobAsync(array{AwsAccountId?: string, DashboardId?: string, SnapshotJobId?: string, ...} $args = [])
 * @method \Aws\Result describeDashboardSnapshotJobResult(array $args = [])
 * @phpstan-method \Aws\Result describeDashboardSnapshotJobResult(array{AwsAccountId?: string, DashboardId?: string, SnapshotJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardSnapshotJobResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDashboardSnapshotJobResultAsync(array{AwsAccountId?: string, DashboardId?: string, SnapshotJobId?: string, ...} $args = [])
 * @method \Aws\Result describeDashboardsQAConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeDashboardsQAConfiguration(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardsQAConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDashboardsQAConfigurationAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeDataSet(array $args = [])
 * @phpstan-method \Aws\Result describeDataSet(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSetAsync(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \Aws\Result describeDataSetPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeDataSetPermissions(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSetPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSetPermissionsAsync(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \Aws\Result describeDataSetRefreshProperties(array $args = [])
 * @phpstan-method \Aws\Result describeDataSetRefreshProperties(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSetRefreshPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSetRefreshPropertiesAsync(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \Aws\Result describeDataSource(array $args = [])
 * @phpstan-method \Aws\Result describeDataSource(array{AwsAccountId?: string, DataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSourceAsync(array{AwsAccountId?: string, DataSourceId?: string, ...} $args = [])
 * @method \Aws\Result describeDataSourcePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeDataSourcePermissions(array{AwsAccountId?: string, DataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSourcePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSourcePermissionsAsync(array{AwsAccountId?: string, DataSourceId?: string, ...} $args = [])
 * @method \Aws\Result describeDefaultQBusinessApplication(array $args = [])
 * @phpstan-method \Aws\Result describeDefaultQBusinessApplication(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDefaultQBusinessApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDefaultQBusinessApplicationAsync(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result describeFlow(array $args = [])
 * @phpstan-method \Aws\Result describeFlow(array{AwsAccountId?: string, FlowId?: string, PublishState?: 'DRAFT'|'PENDING_APPROVAL'|'PUBLISHED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowAsync(array{AwsAccountId?: string, FlowId?: string, PublishState?: 'DRAFT'|'PENDING_APPROVAL'|'PUBLISHED', ...} $args = [])
 * @method \Aws\Result describeFolder(array $args = [])
 * @phpstan-method \Aws\Result describeFolder(array{AwsAccountId?: string, FolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFolderAsync(array{AwsAccountId?: string, FolderId?: string, ...} $args = [])
 * @method \Aws\Result describeFolderPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeFolderPermissions(array{AwsAccountId?: string, FolderId?: string, Namespace?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFolderPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFolderPermissionsAsync(array{AwsAccountId?: string, FolderId?: string, Namespace?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFolderResolvedPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeFolderResolvedPermissions(array{AwsAccountId?: string, FolderId?: string, Namespace?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFolderResolvedPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFolderResolvedPermissionsAsync(array{AwsAccountId?: string, FolderId?: string, Namespace?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeGroup(array $args = [])
 * @phpstan-method \Aws\Result describeGroup(array{GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGroupAsync(array{GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result describeGroupMembership(array $args = [])
 * @phpstan-method \Aws\Result describeGroupMembership(array{MemberName?: string, GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGroupMembershipAsync(array{MemberName?: string, GroupName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result describeIAMPolicyAssignment(array $args = [])
 * @phpstan-method \Aws\Result describeIAMPolicyAssignment(array{AwsAccountId?: string, AssignmentName?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIAMPolicyAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIAMPolicyAssignmentAsync(array{AwsAccountId?: string, AssignmentName?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result describeIngestion(array $args = [])
 * @phpstan-method \Aws\Result describeIngestion(array{AwsAccountId?: string, DataSetId?: string, IngestionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIngestionAsync(array{AwsAccountId?: string, DataSetId?: string, IngestionId?: string, ...} $args = [])
 * @method \Aws\Result describeIpRestriction(array $args = [])
 * @phpstan-method \Aws\Result describeIpRestriction(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIpRestrictionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIpRestrictionAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeKeyRegistration(array $args = [])
 * @phpstan-method \Aws\Result describeKeyRegistration(array{AwsAccountId?: string, DefaultKeyOnly?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKeyRegistrationAsync(array{AwsAccountId?: string, DefaultKeyOnly?: bool, ...} $args = [])
 * @method \Aws\Result describeKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result describeKnowledgeBase(array{AwsAccountId?: string, KnowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKnowledgeBaseAsync(array{AwsAccountId?: string, KnowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result describeKnowledgeBasePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeKnowledgeBasePermissions(array{AwsAccountId?: string, KnowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKnowledgeBasePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKnowledgeBasePermissionsAsync(array{AwsAccountId?: string, KnowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result describeNamespace(array $args = [])
 * @phpstan-method \Aws\Result describeNamespace(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNamespaceAsync(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result describeOAuthClientApplication(array $args = [])
 * @phpstan-method \Aws\Result describeOAuthClientApplication(array{AwsAccountId?: string, OAuthClientApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOAuthClientApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOAuthClientApplicationAsync(array{AwsAccountId?: string, OAuthClientApplicationId?: string, ...} $args = [])
 * @method \Aws\Result describeQPersonalizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeQPersonalizationConfiguration(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQPersonalizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQPersonalizationConfigurationAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeQuickSightQSearchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeQuickSightQSearchConfiguration(array{AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQuickSightQSearchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQuickSightQSearchConfigurationAsync(array{AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeRefreshSchedule(array{AwsAccountId?: string, DataSetId?: string, ScheduleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRefreshScheduleAsync(array{AwsAccountId?: string, DataSetId?: string, ScheduleId?: string, ...} $args = [])
 * @method \Aws\Result describeRoleCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result describeRoleCustomPermission(array{
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRoleCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRoleCustomPermissionAsync(array{
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSelfUpgradeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeSelfUpgradeConfiguration(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSelfUpgradeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSelfUpgradeConfigurationAsync(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result describeSpace(array $args = [])
 * @phpstan-method \Aws\Result describeSpace(array{AwsAccountId?: string, SpaceId?: string, MaxContributors?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSpaceAsync(array{AwsAccountId?: string, SpaceId?: string, MaxContributors?: int, ...} $args = [])
 * @method \Aws\Result describeSpacePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeSpacePermissions(array{AwsAccountId?: string, SpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSpacePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSpacePermissionsAsync(array{AwsAccountId?: string, SpaceId?: string, ...} $args = [])
 * @method \Aws\Result describeTemplate(array $args = [])
 * @phpstan-method \Aws\Result describeTemplate(array{AwsAccountId?: string, TemplateId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTemplateAsync(array{AwsAccountId?: string, TemplateId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \Aws\Result describeTemplateAlias(array $args = [])
 * @phpstan-method \Aws\Result describeTemplateAlias(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTemplateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTemplateAliasAsync(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, ...} $args = [])
 * @method \Aws\Result describeTemplateDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeTemplateDefinition(array{AwsAccountId?: string, TemplateId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTemplateDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTemplateDefinitionAsync(array{AwsAccountId?: string, TemplateId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \Aws\Result describeTemplatePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeTemplatePermissions(array{AwsAccountId?: string, TemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTemplatePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTemplatePermissionsAsync(array{AwsAccountId?: string, TemplateId?: string, ...} $args = [])
 * @method \Aws\Result describeTheme(array $args = [])
 * @phpstan-method \Aws\Result describeTheme(array{AwsAccountId?: string, ThemeId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThemeAsync(array{AwsAccountId?: string, ThemeId?: string, VersionNumber?: int, AliasName?: string, ...} $args = [])
 * @method \Aws\Result describeThemeAlias(array $args = [])
 * @phpstan-method \Aws\Result describeThemeAlias(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThemeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThemeAliasAsync(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ...} $args = [])
 * @method \Aws\Result describeThemePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeThemePermissions(array{AwsAccountId?: string, ThemeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThemePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThemePermissionsAsync(array{AwsAccountId?: string, ThemeId?: string, ...} $args = [])
 * @method \Aws\Result describeTopic(array $args = [])
 * @phpstan-method \Aws\Result describeTopic(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTopicAsync(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \Aws\Result describeTopicPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeTopicPermissions(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTopicPermissionsAsync(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \Aws\Result describeTopicRefresh(array $args = [])
 * @phpstan-method \Aws\Result describeTopicRefresh(array{AwsAccountId?: string, TopicId?: string, RefreshId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTopicRefreshAsync(array{AwsAccountId?: string, TopicId?: string, RefreshId?: string, ...} $args = [])
 * @method \Aws\Result describeTopicRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeTopicRefreshSchedule(array{AwsAccountId?: string, TopicId?: string, DatasetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTopicRefreshScheduleAsync(array{AwsAccountId?: string, TopicId?: string, DatasetId?: string, ...} $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @phpstan-method \Aws\Result describeUser(array{UserName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserAsync(array{UserName?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result describeVPCConnection(array $args = [])
 * @phpstan-method \Aws\Result describeVPCConnection(array{AwsAccountId?: string, VPCConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVPCConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVPCConnectionAsync(array{AwsAccountId?: string, VPCConnectionId?: string, ...} $args = [])
 * @method \Aws\Result generateEmbedUrlForAnonymousUser(array $args = [])
 * @phpstan-method \Aws\Result generateEmbedUrlForAnonymousUser(array{
 *     AwsAccountId?: string,
 *     SessionLifetimeInMinutes?: int,
 *     Namespace?: string,
 *     SessionTags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuthorizedResourceArns?: list<string>,
 *     ExperienceConfiguration?: array{
 *         Dashboard?: array{
 *             InitialDashboardId?: string,
 *             EnabledFeatures?: list<'SHARED_VIEW'>,
 *             DisabledFeatures?: list<'SHARED_VIEW'>,
 *             FeatureConfigurations?: array,
 *             ...,
 *         },
 *         DashboardVisual?: array{InitialDashboardVisualId?: array, ...},
 *         QSearchBar?: array{InitialTopicId?: string, ...},
 *         GenerativeQnA?: array{InitialTopicId?: string, ...},
 *         ...,
 *     },
 *     AllowedDomains?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateEmbedUrlForAnonymousUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateEmbedUrlForAnonymousUserAsync(array{
 *     AwsAccountId?: string,
 *     SessionLifetimeInMinutes?: int,
 *     Namespace?: string,
 *     SessionTags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuthorizedResourceArns?: list<string>,
 *     ExperienceConfiguration?: array{
 *         Dashboard?: array{
 *             InitialDashboardId?: string,
 *             EnabledFeatures?: list<'SHARED_VIEW'>,
 *             DisabledFeatures?: list<'SHARED_VIEW'>,
 *             FeatureConfigurations?: array,
 *             ...,
 *         },
 *         DashboardVisual?: array{InitialDashboardVisualId?: array, ...},
 *         QSearchBar?: array{InitialTopicId?: string, ...},
 *         GenerativeQnA?: array{InitialTopicId?: string, ...},
 *         ...,
 *     },
 *     AllowedDomains?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateEmbedUrlForRegisteredUser(array $args = [])
 * @phpstan-method \Aws\Result generateEmbedUrlForRegisteredUser(array{
 *     AwsAccountId?: string,
 *     SessionLifetimeInMinutes?: int,
 *     UserArn?: string,
 *     ExperienceConfiguration?: array{
 *         Dashboard?: array{InitialDashboardId?: string, FeatureConfigurations?: array, ...},
 *         QuickSightConsole?: array{InitialPath?: string, FeatureConfigurations?: array, ...},
 *         QSearchBar?: array{InitialTopicId?: string, ...},
 *         DashboardVisual?: array{InitialDashboardVisualId?: array, ...},
 *         GenerativeQnA?: array{InitialTopicId?: string, ...},
 *         QuickChat?: array,
 *         ...,
 *     },
 *     AllowedDomains?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateEmbedUrlForRegisteredUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateEmbedUrlForRegisteredUserAsync(array{
 *     AwsAccountId?: string,
 *     SessionLifetimeInMinutes?: int,
 *     UserArn?: string,
 *     ExperienceConfiguration?: array{
 *         Dashboard?: array{InitialDashboardId?: string, FeatureConfigurations?: array, ...},
 *         QuickSightConsole?: array{InitialPath?: string, FeatureConfigurations?: array, ...},
 *         QSearchBar?: array{InitialTopicId?: string, ...},
 *         DashboardVisual?: array{InitialDashboardVisualId?: array, ...},
 *         GenerativeQnA?: array{InitialTopicId?: string, ...},
 *         QuickChat?: array,
 *         ...,
 *     },
 *     AllowedDomains?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result generateEmbedUrlForRegisteredUserWithIdentity(array $args = [])
 * @phpstan-method \Aws\Result generateEmbedUrlForRegisteredUserWithIdentity(array{
 *     AwsAccountId?: string,
 *     SessionLifetimeInMinutes?: int,
 *     ExperienceConfiguration?: array{
 *         Dashboard?: array{InitialDashboardId?: string, FeatureConfigurations?: array, ...},
 *         QuickSightConsole?: array{InitialPath?: string, FeatureConfigurations?: array, ...},
 *         QSearchBar?: array{InitialTopicId?: string, ...},
 *         DashboardVisual?: array{InitialDashboardVisualId?: array, ...},
 *         GenerativeQnA?: array{InitialTopicId?: string, ...},
 *         QuickChat?: array,
 *         ...,
 *     },
 *     AllowedDomains?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateEmbedUrlForRegisteredUserWithIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateEmbedUrlForRegisteredUserWithIdentityAsync(array{
 *     AwsAccountId?: string,
 *     SessionLifetimeInMinutes?: int,
 *     ExperienceConfiguration?: array{
 *         Dashboard?: array{InitialDashboardId?: string, FeatureConfigurations?: array, ...},
 *         QuickSightConsole?: array{InitialPath?: string, FeatureConfigurations?: array, ...},
 *         QSearchBar?: array{InitialTopicId?: string, ...},
 *         DashboardVisual?: array{InitialDashboardVisualId?: array, ...},
 *         GenerativeQnA?: array{InitialTopicId?: string, ...},
 *         QuickChat?: array,
 *         ...,
 *     },
 *     AllowedDomains?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDashboardEmbedUrl(array $args = [])
 * @phpstan-method \Aws\Result getDashboardEmbedUrl(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     IdentityType?: 'ANONYMOUS'|'IAM'|'QUICKSIGHT',
 *     SessionLifetimeInMinutes?: int,
 *     UndoRedoDisabled?: bool,
 *     ResetDisabled?: bool,
 *     StatePersistenceEnabled?: bool,
 *     UserArn?: string,
 *     Namespace?: string,
 *     AdditionalDashboardIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDashboardEmbedUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDashboardEmbedUrlAsync(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     IdentityType?: 'ANONYMOUS'|'IAM'|'QUICKSIGHT',
 *     SessionLifetimeInMinutes?: int,
 *     UndoRedoDisabled?: bool,
 *     ResetDisabled?: bool,
 *     StatePersistenceEnabled?: bool,
 *     UserArn?: string,
 *     Namespace?: string,
 *     AdditionalDashboardIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFlowMetadata(array $args = [])
 * @phpstan-method \Aws\Result getFlowMetadata(array{AwsAccountId?: string, FlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowMetadataAsync(array{AwsAccountId?: string, FlowId?: string, ...} $args = [])
 * @method \Aws\Result getFlowPermissions(array $args = [])
 * @phpstan-method \Aws\Result getFlowPermissions(array{AwsAccountId?: string, FlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowPermissionsAsync(array{AwsAccountId?: string, FlowId?: string, ...} $args = [])
 * @method \Aws\Result getIdentityContext(array $args = [])
 * @phpstan-method \Aws\Result getIdentityContext(array{
 *     AwsAccountId?: string,
 *     UserIdentifier?: array{UserName?: string, Email?: string, UserArn?: string, ...},
 *     Namespace?: string,
 *     SessionExpiresAt?: int|string|\DateTimeInterface,
 *     ContextRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityContextAsync(array{
 *     AwsAccountId?: string,
 *     UserIdentifier?: array{UserName?: string, Email?: string, UserArn?: string, ...},
 *     Namespace?: string,
 *     SessionExpiresAt?: int|string|\DateTimeInterface,
 *     ContextRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSessionEmbedUrl(array $args = [])
 * @phpstan-method \Aws\Result getSessionEmbedUrl(array{AwsAccountId?: string, EntryPoint?: string, SessionLifetimeInMinutes?: int, UserArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionEmbedUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionEmbedUrlAsync(array{AwsAccountId?: string, EntryPoint?: string, SessionLifetimeInMinutes?: int, UserArn?: string, ...} $args = [])
 * @method \Aws\Result listActionConnectors(array $args = [])
 * @phpstan-method \Aws\Result listActionConnectors(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActionConnectorsAsync(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgents(array $args = [])
 * @phpstan-method \Aws\Result listAgents(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentsAsync(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAnalyses(array $args = [])
 * @phpstan-method \Aws\Result listAnalyses(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalysesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalysesAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssetBundleExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listAssetBundleExportJobs(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetBundleExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetBundleExportJobsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssetBundleImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listAssetBundleImportJobs(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetBundleImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetBundleImportJobsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listBrands(array $args = [])
 * @phpstan-method \Aws\Result listBrands(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrandsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrandsAsync(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomPermissions(array $args = [])
 * @phpstan-method \Aws\Result listCustomPermissions(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomPermissionsAsync(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDashboardVersions(array $args = [])
 * @phpstan-method \Aws\Result listDashboardVersions(array{AwsAccountId?: string, DashboardId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDashboardVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDashboardVersionsAsync(array{AwsAccountId?: string, DashboardId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDashboards(array $args = [])
 * @phpstan-method \Aws\Result listDashboards(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDashboardsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataSets(array $args = [])
 * @phpstan-method \Aws\Result listDataSets(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSetsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDataSources(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFlows(array $args = [])
 * @phpstan-method \Aws\Result listFlows(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFolderMembers(array $args = [])
 * @phpstan-method \Aws\Result listFolderMembers(array{AwsAccountId?: string, FolderId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFolderMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFolderMembersAsync(array{AwsAccountId?: string, FolderId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFolders(array $args = [])
 * @phpstan-method \Aws\Result listFolders(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFoldersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFoldersAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFoldersForResource(array $args = [])
 * @phpstan-method \Aws\Result listFoldersForResource(array{AwsAccountId?: string, ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFoldersForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFoldersForResourceAsync(array{AwsAccountId?: string, ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listGroupMemberships(array $args = [])
 * @phpstan-method \Aws\Result listGroupMemberships(array{
 *     GroupName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupMembershipsAsync(array{
 *     GroupName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, Namespace?: string, ...} $args = [])
 * @method \Aws\Result listIAMPolicyAssignments(array $args = [])
 * @phpstan-method \Aws\Result listIAMPolicyAssignments(array{
 *     AwsAccountId?: string,
 *     AssignmentStatus?: 'DISABLED'|'DRAFT'|'ENABLED',
 *     Namespace?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIAMPolicyAssignmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIAMPolicyAssignmentsAsync(array{
 *     AwsAccountId?: string,
 *     AssignmentStatus?: 'DISABLED'|'DRAFT'|'ENABLED',
 *     Namespace?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIAMPolicyAssignmentsForUser(array $args = [])
 * @phpstan-method \Aws\Result listIAMPolicyAssignmentsForUser(array{AwsAccountId?: string, UserName?: string, NextToken?: string, MaxResults?: int, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIAMPolicyAssignmentsForUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIAMPolicyAssignmentsForUserAsync(array{AwsAccountId?: string, UserName?: string, NextToken?: string, MaxResults?: int, Namespace?: string, ...} $args = [])
 * @method \Aws\Result listIdentityPropagationConfigs(array $args = [])
 * @phpstan-method \Aws\Result listIdentityPropagationConfigs(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityPropagationConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityPropagationConfigsAsync(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listIngestions(array $args = [])
 * @phpstan-method \Aws\Result listIngestions(array{DataSetId?: string, NextToken?: string, AwsAccountId?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIngestionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIngestionsAsync(array{DataSetId?: string, NextToken?: string, AwsAccountId?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listKnowledgeBases(array $args = [])
 * @phpstan-method \Aws\Result listKnowledgeBases(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array{AwsAccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listNamespaces(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNamespacesAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOAuthClientApplications(array $args = [])
 * @phpstan-method \Aws\Result listOAuthClientApplications(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOAuthClientApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOAuthClientApplicationsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRefreshSchedules(array $args = [])
 * @phpstan-method \Aws\Result listRefreshSchedules(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRefreshSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRefreshSchedulesAsync(array{AwsAccountId?: string, DataSetId?: string, ...} $args = [])
 * @method \Aws\Result listRoleMemberships(array $args = [])
 * @phpstan-method \Aws\Result listRoleMemberships(array{
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoleMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoleMembershipsAsync(array{
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSelfUpgrades(array $args = [])
 * @phpstan-method \Aws\Result listSelfUpgrades(array{AwsAccountId?: string, Namespace?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSelfUpgradesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSelfUpgradesAsync(array{AwsAccountId?: string, Namespace?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSpaceResources(array $args = [])
 * @phpstan-method \Aws\Result listSpaceResources(array{AwsAccountId?: string, SpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpaceResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpaceResourcesAsync(array{AwsAccountId?: string, SpaceId?: string, ...} $args = [])
 * @method \Aws\Result listSpaces(array $args = [])
 * @phpstan-method \Aws\Result listSpaces(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpacesAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplateAliases(array $args = [])
 * @phpstan-method \Aws\Result listTemplateAliases(array{AwsAccountId?: string, TemplateId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateAliasesAsync(array{AwsAccountId?: string, TemplateId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTemplateVersions(array $args = [])
 * @phpstan-method \Aws\Result listTemplateVersions(array{AwsAccountId?: string, TemplateId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateVersionsAsync(array{AwsAccountId?: string, TemplateId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTemplates(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplatesAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listThemeAliases(array $args = [])
 * @phpstan-method \Aws\Result listThemeAliases(array{AwsAccountId?: string, ThemeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThemeAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThemeAliasesAsync(array{AwsAccountId?: string, ThemeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listThemeVersions(array $args = [])
 * @phpstan-method \Aws\Result listThemeVersions(array{AwsAccountId?: string, ThemeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThemeVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThemeVersionsAsync(array{AwsAccountId?: string, ThemeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listThemes(array $args = [])
 * @phpstan-method \Aws\Result listThemes(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, Type?: 'ALL'|'CUSTOM'|'QUICKSIGHT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThemesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThemesAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, Type?: 'ALL'|'CUSTOM'|'QUICKSIGHT', ...} $args = [])
 * @method \Aws\Result listTopicRefreshSchedules(array $args = [])
 * @phpstan-method \Aws\Result listTopicRefreshSchedules(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicRefreshSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicRefreshSchedulesAsync(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \Aws\Result listTopicReviewedAnswers(array $args = [])
 * @phpstan-method \Aws\Result listTopicReviewedAnswers(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicReviewedAnswersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicReviewedAnswersAsync(array{AwsAccountId?: string, TopicId?: string, ...} $args = [])
 * @method \Aws\Result listTopics(array $args = [])
 * @phpstan-method \Aws\Result listTopics(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listUserGroups(array $args = [])
 * @phpstan-method \Aws\Result listUserGroups(array{UserName?: string, AwsAccountId?: string, Namespace?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserGroupsAsync(array{UserName?: string, AwsAccountId?: string, Namespace?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, Namespace?: string, ...} $args = [])
 * @method \Aws\Result listUsersIndexCapacity(array $args = [])
 * @phpstan-method \Aws\Result listUsersIndexCapacity(array{
 *     awsAccountId?: string,
 *     namespace?: string,
 *     filters?: list<array{userNameOrEmail?: array, totalCapacityBytes?: array, ...}>,
 *     sortBy?: 'TOTAL_CAPACITY_BYTES',
 *     sortOrder?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersIndexCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersIndexCapacityAsync(array{
 *     awsAccountId?: string,
 *     namespace?: string,
 *     filters?: list<array{userNameOrEmail?: array, totalCapacityBytes?: array, ...}>,
 *     sortBy?: 'TOTAL_CAPACITY_BYTES',
 *     sortOrder?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listVPCConnections(array $args = [])
 * @phpstan-method \Aws\Result listVPCConnections(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVPCConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVPCConnectionsAsync(array{AwsAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result predictQAResults(array $args = [])
 * @phpstan-method \Aws\Result predictQAResults(array{
 *     AwsAccountId?: string,
 *     QueryText?: string,
 *     IncludeQuickSightQIndex?: 'EXCLUDE'|'INCLUDE',
 *     IncludeGeneratedAnswer?: 'EXCLUDE'|'INCLUDE',
 *     MaxTopicsToConsider?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise predictQAResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise predictQAResultsAsync(array{
 *     AwsAccountId?: string,
 *     QueryText?: string,
 *     IncludeQuickSightQIndex?: 'EXCLUDE'|'INCLUDE',
 *     IncludeGeneratedAnswer?: 'EXCLUDE'|'INCLUDE',
 *     MaxTopicsToConsider?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDataSetRefreshProperties(array $args = [])
 * @phpstan-method \Aws\Result putDataSetRefreshProperties(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     DataSetRefreshProperties?: array{
 *         RefreshConfiguration?: array{IncrementalRefresh?: array, ...},
 *         FailureConfiguration?: array{EmailAlert?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDataSetRefreshPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDataSetRefreshPropertiesAsync(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     DataSetRefreshProperties?: array{
 *         RefreshConfiguration?: array{IncrementalRefresh?: array, ...},
 *         FailureConfiguration?: array{EmailAlert?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerUser(array $args = [])
 * @phpstan-method \Aws\Result registerUser(array{
 *     IdentityType?: 'IAM'|'IAM_IDENTITY_CENTER'|'QUICKSIGHT',
 *     Email?: string,
 *     UserRole?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO'|'RESTRICTED_AUTHOR'|'RESTRICTED_READER',
 *     IamArn?: string,
 *     SessionName?: string,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     UserName?: string,
 *     CustomPermissionsName?: string,
 *     ExternalLoginFederationProviderType?: string,
 *     CustomFederationProviderUrl?: string,
 *     ExternalLoginId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerUserAsync(array{
 *     IdentityType?: 'IAM'|'IAM_IDENTITY_CENTER'|'QUICKSIGHT',
 *     Email?: string,
 *     UserRole?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO'|'RESTRICTED_AUTHOR'|'RESTRICTED_READER',
 *     IamArn?: string,
 *     SessionName?: string,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     UserName?: string,
 *     CustomPermissionsName?: string,
 *     ExternalLoginFederationProviderType?: string,
 *     CustomFederationProviderUrl?: string,
 *     ExternalLoginId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreAnalysis(array $args = [])
 * @phpstan-method \Aws\Result restoreAnalysis(array{AwsAccountId?: string, AnalysisId?: string, RestoreToFolders?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreAnalysisAsync(array{AwsAccountId?: string, AnalysisId?: string, RestoreToFolders?: bool, ...} $args = [])
 * @method \Aws\Result searchActionConnectors(array $args = [])
 * @phpstan-method \Aws\Result searchActionConnectors(array{
 *     AwsAccountId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Name?: 'ACTION_CONNECTOR_NAME'|'ACTION_CONNECTOR_TYPE'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Operator?: 'StringEquals'|'StringLike',
 *         Value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchActionConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchActionConnectorsAsync(array{
 *     AwsAccountId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Name?: 'ACTION_CONNECTOR_NAME'|'ACTION_CONNECTOR_TYPE'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Operator?: 'StringEquals'|'StringLike',
 *         Value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchAgents(array $args = [])
 * @phpstan-method \Aws\Result searchAgents(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Name?: 'AGENT_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER',
 *         Operator?: 'StringEquals'|'StringLike',
 *         Value?: string,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAgentsAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Name?: 'AGENT_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER',
 *         Operator?: 'StringEquals'|'StringLike',
 *         Value?: string,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchAnalyses(array $args = [])
 * @phpstan-method \Aws\Result searchAnalyses(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'ANALYSIS_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_USER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAnalysesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAnalysesAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'ANALYSIS_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_USER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchDashboards(array $args = [])
 * @phpstan-method \Aws\Result searchDashboards(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DASHBOARD_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_USER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDashboardsAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DASHBOARD_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_USER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchDataSets(array $args = [])
 * @phpstan-method \Aws\Result searchDataSets(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DATASET_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchDataSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDataSetsAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DATASET_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchDataSources(array $args = [])
 * @phpstan-method \Aws\Result searchDataSources(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DATASOURCE_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDataSourcesAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DATASOURCE_NAME'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchFlows(array $args = [])
 * @phpstan-method \Aws\Result searchFlows(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Name?: 'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'assetDescription'|'assetName',
 *         Operator?: 'StringEquals'|'StringLike',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFlowsAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Name?: 'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'assetDescription'|'assetName',
 *         Operator?: 'StringEquals'|'StringLike',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchFolders(array $args = [])
 * @phpstan-method \Aws\Result searchFolders(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'FOLDER_NAME'|'PARENT_FOLDER_ARN'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFoldersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFoldersAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'FOLDER_NAME'|'PARENT_FOLDER_ARN'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_VIEWER_OR_OWNER',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchGroups(array $args = [])
 * @phpstan-method \Aws\Result searchGroups(array{
 *     AwsAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Namespace?: string,
 *     Filters?: list<array{Operator?: 'StartsWith', Name?: 'GROUP_NAME', Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchGroupsAsync(array{
 *     AwsAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Namespace?: string,
 *     Filters?: list<array{Operator?: 'StartsWith', Name?: 'GROUP_NAME', Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchKnowledgeBases(array $args = [])
 * @phpstan-method \Aws\Result searchKnowledgeBases(array{
 *     AwsAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         name?: 'DATASOURCE_ARN'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'KNOWLEDGE_BASE_ID'|'KNOWLEDGE_BASE_NAME'|'KNOWLEDGE_BASE_SIZE_BYTES'|'PRIMARY_OWNER',
 *         operator?: 'GREATER_THAN_OR_EQUALS'|'LESS_THAN_OR_EQUALS'|'STRING_EQUALS'|'STRING_LIKE',
 *         value?: string,
 *         ...,
 *     }>,
 *     SortBy?: array{sortByField?: 'CREATED_AT'|'KNOWLEDGE_BASE_SIZE_BYTES', sortOrder?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchKnowledgeBasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchKnowledgeBasesAsync(array{
 *     AwsAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         name?: 'DATASOURCE_ARN'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'KNOWLEDGE_BASE_ID'|'KNOWLEDGE_BASE_NAME'|'KNOWLEDGE_BASE_SIZE_BYTES'|'PRIMARY_OWNER',
 *         operator?: 'GREATER_THAN_OR_EQUALS'|'LESS_THAN_OR_EQUALS'|'STRING_EQUALS'|'STRING_LIKE',
 *         value?: string,
 *         ...,
 *     }>,
 *     SortBy?: array{sortByField?: 'CREATED_AT'|'KNOWLEDGE_BASE_SIZE_BYTES', sortOrder?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSpaces(array $args = [])
 * @phpstan-method \Aws\Result searchSpaces(array{
 *     AwsAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         name?: 'CONSUMED_SOURCE_SIZE'|'CONTRIBUTED_BY'|'CREATED_BY'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'SPACE_ID'|'SPACE_NAME',
 *         operator?: 'NUMBER_RANGE'|'STRING_EQUALS'|'STRING_LIKE',
 *         value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSpacesAsync(array{
 *     AwsAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         name?: 'CONSUMED_SOURCE_SIZE'|'CONTRIBUTED_BY'|'CREATED_BY'|'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'SPACE_ID'|'SPACE_NAME',
 *         operator?: 'NUMBER_RANGE'|'STRING_EQUALS'|'STRING_LIKE',
 *         value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchTopics(array $args = [])
 * @phpstan-method \Aws\Result searchTopics(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_USER'|'QUICKSIGHT_VIEWER_OR_OWNER'|'TOPIC_NAME',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTopicsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTopicsAsync(array{
 *     AwsAccountId?: string,
 *     Filters?: list<array{
 *         Operator?: 'StringEquals'|'StringLike',
 *         Name?: 'DIRECT_QUICKSIGHT_OWNER'|'DIRECT_QUICKSIGHT_SOLE_OWNER'|'DIRECT_QUICKSIGHT_VIEWER_OR_OWNER'|'QUICKSIGHT_OWNER'|'QUICKSIGHT_USER'|'QUICKSIGHT_VIEWER_OR_OWNER'|'TOPIC_NAME',
 *         Value?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAssetBundleExportJob(array $args = [])
 * @phpstan-method \Aws\Result startAssetBundleExportJob(array{
 *     AwsAccountId?: string,
 *     AssetBundleExportJobId?: string,
 *     ResourceArns?: list<string>,
 *     IncludeAllDependencies?: bool,
 *     ExportFormat?: 'CLOUDFORMATION_JSON'|'QUICKSIGHT_JSON',
 *     CloudFormationOverridePropertyConfiguration?: array{
 *         ResourceIdOverrideConfiguration?: array{PrefixForAllResources?: bool, ...},
 *         VPCConnections?: list<array>,
 *         RefreshSchedules?: list<array>,
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     IncludePermissions?: bool,
 *     IncludeTags?: bool,
 *     ValidationStrategy?: array{StrictModeForAllResources?: bool, ...},
 *     IncludeFolderMemberships?: bool,
 *     IncludeFolderMembers?: 'NONE'|'ONE_LEVEL'|'RECURSE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAssetBundleExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAssetBundleExportJobAsync(array{
 *     AwsAccountId?: string,
 *     AssetBundleExportJobId?: string,
 *     ResourceArns?: list<string>,
 *     IncludeAllDependencies?: bool,
 *     ExportFormat?: 'CLOUDFORMATION_JSON'|'QUICKSIGHT_JSON',
 *     CloudFormationOverridePropertyConfiguration?: array{
 *         ResourceIdOverrideConfiguration?: array{PrefixForAllResources?: bool, ...},
 *         VPCConnections?: list<array>,
 *         RefreshSchedules?: list<array>,
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     IncludePermissions?: bool,
 *     IncludeTags?: bool,
 *     ValidationStrategy?: array{StrictModeForAllResources?: bool, ...},
 *     IncludeFolderMemberships?: bool,
 *     IncludeFolderMembers?: 'NONE'|'ONE_LEVEL'|'RECURSE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAssetBundleImportJob(array $args = [])
 * @phpstan-method \Aws\Result startAssetBundleImportJob(array{
 *     AwsAccountId?: string,
 *     AssetBundleImportJobId?: string,
 *     AssetBundleImportSource?: array{Body?: string|resource|\Psr\Http\Message\StreamInterface, S3Uri?: string, ...},
 *     OverrideParameters?: array{
 *         ResourceIdOverrideConfiguration?: array{PrefixForAllResources?: string, ...},
 *         VPCConnections?: list<array>,
 *         RefreshSchedules?: list<array>,
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     FailureAction?: 'DO_NOTHING'|'ROLLBACK',
 *     OverridePermissions?: array{
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     OverrideTags?: array{
 *         VPCConnections?: list<array>,
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     OverrideValidationStrategy?: array{StrictModeForAllResources?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAssetBundleImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAssetBundleImportJobAsync(array{
 *     AwsAccountId?: string,
 *     AssetBundleImportJobId?: string,
 *     AssetBundleImportSource?: array{Body?: string|resource|\Psr\Http\Message\StreamInterface, S3Uri?: string, ...},
 *     OverrideParameters?: array{
 *         ResourceIdOverrideConfiguration?: array{PrefixForAllResources?: string, ...},
 *         VPCConnections?: list<array>,
 *         RefreshSchedules?: list<array>,
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     FailureAction?: 'DO_NOTHING'|'ROLLBACK',
 *     OverridePermissions?: array{
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     OverrideTags?: array{
 *         VPCConnections?: list<array>,
 *         DataSources?: list<array>,
 *         DataSets?: list<array>,
 *         Themes?: list<array>,
 *         Analyses?: list<array>,
 *         Dashboards?: list<array>,
 *         Folders?: list<array>,
 *         ...,
 *     },
 *     OverrideValidationStrategy?: array{StrictModeForAllResources?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAutomationJob(array $args = [])
 * @phpstan-method \Aws\Result startAutomationJob(array{AwsAccountId?: string, AutomationGroupId?: string, AutomationId?: string, InputPayload?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAutomationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAutomationJobAsync(array{AwsAccountId?: string, AutomationGroupId?: string, AutomationId?: string, InputPayload?: string, ...} $args = [])
 * @method \Aws\Result startDashboardSnapshotJob(array $args = [])
 * @phpstan-method \Aws\Result startDashboardSnapshotJob(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     SnapshotJobId?: string,
 *     UserConfiguration?: array{AnonymousUsers?: list<array>, ...},
 *     SnapshotConfiguration?: array{
 *         FileGroups?: list<array>,
 *         DestinationConfiguration?: array{S3Destinations?: list<array>, ...},
 *         Parameters?: array{
 *             StringParameters?: list<array>,
 *             IntegerParameters?: list<array>,
 *             DecimalParameters?: list<array>,
 *             DateTimeParameters?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDashboardSnapshotJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDashboardSnapshotJobAsync(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     SnapshotJobId?: string,
 *     UserConfiguration?: array{AnonymousUsers?: list<array>, ...},
 *     SnapshotConfiguration?: array{
 *         FileGroups?: list<array>,
 *         DestinationConfiguration?: array{S3Destinations?: list<array>, ...},
 *         Parameters?: array{
 *             StringParameters?: list<array>,
 *             IntegerParameters?: list<array>,
 *             DecimalParameters?: list<array>,
 *             DateTimeParameters?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDashboardSnapshotJobSchedule(array $args = [])
 * @phpstan-method \Aws\Result startDashboardSnapshotJobSchedule(array{AwsAccountId?: string, DashboardId?: string, ScheduleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDashboardSnapshotJobScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDashboardSnapshotJobScheduleAsync(array{AwsAccountId?: string, DashboardId?: string, ScheduleId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccountCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result updateAccountCustomPermission(array{CustomPermissionsName?: string, AwsAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountCustomPermissionAsync(array{CustomPermissionsName?: string, AwsAccountId?: string, ...} $args = [])
 * @method \Aws\Result updateAccountCustomization(array $args = [])
 * @phpstan-method \Aws\Result updateAccountCustomization(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     AccountCustomization?: array{DefaultTheme?: string, DefaultEmailCustomizationTemplate?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountCustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountCustomizationAsync(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     AccountCustomization?: array{DefaultTheme?: string, DefaultEmailCustomizationTemplate?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{
 *     AwsAccountId?: string,
 *     DefaultNamespace?: string,
 *     NotificationEmail?: string,
 *     TerminationProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{
 *     AwsAccountId?: string,
 *     DefaultNamespace?: string,
 *     NotificationEmail?: string,
 *     TerminationProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateActionConnector(array $args = [])
 * @phpstan-method \Aws\Result updateActionConnector(array{
 *     AwsAccountId?: string,
 *     ActionConnectorId?: string,
 *     Name?: string,
 *     AuthenticationConfig?: array{
 *         AuthenticationType?: 'API_KEY'|'BASIC'|'IAM'|'NONE'|'OAUTH2_AUTHORIZATION_CODE'|'OAUTH2_CLIENT_CREDENTIALS',
 *         AuthenticationMetadata?: array{
 *             AuthorizationCodeGrantMetadata?: array,
 *             ClientCredentialsGrantMetadata?: array,
 *             BasicAuthConnectionMetadata?: array,
 *             ApiKeyConnectionMetadata?: array,
 *             NoneConnectionMetadata?: array,
 *             IamConnectionMetadata?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     VpcConnectionArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActionConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateActionConnectorAsync(array{
 *     AwsAccountId?: string,
 *     ActionConnectorId?: string,
 *     Name?: string,
 *     AuthenticationConfig?: array{
 *         AuthenticationType?: 'API_KEY'|'BASIC'|'IAM'|'NONE'|'OAUTH2_AUTHORIZATION_CODE'|'OAUTH2_CLIENT_CREDENTIALS',
 *         AuthenticationMetadata?: array{
 *             AuthorizationCodeGrantMetadata?: array,
 *             ClientCredentialsGrantMetadata?: array,
 *             BasicAuthConnectionMetadata?: array,
 *             ApiKeyConnectionMetadata?: array,
 *             NoneConnectionMetadata?: array,
 *             IamConnectionMetadata?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     VpcConnectionArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateActionConnectorPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateActionConnectorPermissions(array{
 *     AwsAccountId?: string,
 *     ActionConnectorId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActionConnectorPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateActionConnectorPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     ActionConnectorId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgent(array $args = [])
 * @phpstan-method \Aws\Result updateAgent(array{
 *     AgentId?: string,
 *     AwsAccountId?: string,
 *     Name?: string,
 *     Description?: string,
 *     IconId?: string,
 *     StarterPrompts?: list<string>,
 *     WelcomeMessage?: string,
 *     CustomPromptInput?: array{
 *         ExistingPrompt?: array{ModelProfileId?: string, SubscriptionId?: string, QbsAwsAccountId?: string, ...},
 *         NewPrompt?: array{
 *             ResponseLength?: string,
 *             OutputStyle?: string,
 *             Identity?: string,
 *             Tone?: string,
 *             CustomInstructions?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SpacesToAdd?: list<string>,
 *     SpacesToRemove?: list<string>,
 *     ActionConnectorsToAdd?: list<string>,
 *     ActionConnectorsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentAsync(array{
 *     AgentId?: string,
 *     AwsAccountId?: string,
 *     Name?: string,
 *     Description?: string,
 *     IconId?: string,
 *     StarterPrompts?: list<string>,
 *     WelcomeMessage?: string,
 *     CustomPromptInput?: array{
 *         ExistingPrompt?: array{ModelProfileId?: string, SubscriptionId?: string, QbsAwsAccountId?: string, ...},
 *         NewPrompt?: array{
 *             ResponseLength?: string,
 *             OutputStyle?: string,
 *             Identity?: string,
 *             Tone?: string,
 *             CustomInstructions?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SpacesToAdd?: list<string>,
 *     SpacesToRemove?: list<string>,
 *     ActionConnectorsToAdd?: list<string>,
 *     ActionConnectorsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateAgentPermissions(array{
 *     AgentId?: string,
 *     AwsAccountId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentPermissionsAsync(array{
 *     AgentId?: string,
 *     AwsAccountId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAnalysis(array $args = [])
 * @phpstan-method \Aws\Result updateAnalysis(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     Name?: string,
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     ThemeArn?: string,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnalysisAsync(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     Name?: string,
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     ThemeArn?: string,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAnalysisPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateAnalysisPermissions(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnalysisPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnalysisPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     AnalysisId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApplicationWithTokenExchangeGrant(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationWithTokenExchangeGrant(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationWithTokenExchangeGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationWithTokenExchangeGrantAsync(array{AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result updateBrand(array $args = [])
 * @phpstan-method \Aws\Result updateBrand(array{
 *     AwsAccountId?: string,
 *     BrandId?: string,
 *     BrandDefinition?: array{
 *         BrandName?: string,
 *         Description?: string,
 *         ApplicationTheme?: array{BrandColorPalette?: array, ContextualAccentPalette?: array, BrandElementStyle?: array, ...},
 *         LogoConfiguration?: array{AltText?: string, LogoSet?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrandAsync(array{
 *     AwsAccountId?: string,
 *     BrandId?: string,
 *     BrandDefinition?: array{
 *         BrandName?: string,
 *         Description?: string,
 *         ApplicationTheme?: array{BrandColorPalette?: array, ContextualAccentPalette?: array, BrandElementStyle?: array, ...},
 *         LogoConfiguration?: array{AltText?: string, LogoSet?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBrandAssignment(array $args = [])
 * @phpstan-method \Aws\Result updateBrandAssignment(array{AwsAccountId?: string, BrandArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrandAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrandAssignmentAsync(array{AwsAccountId?: string, BrandArn?: string, ...} $args = [])
 * @method \Aws\Result updateBrandPublishedVersion(array $args = [])
 * @phpstan-method \Aws\Result updateBrandPublishedVersion(array{AwsAccountId?: string, BrandId?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrandPublishedVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrandPublishedVersionAsync(array{AwsAccountId?: string, BrandId?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result updateCustomPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateCustomPermissions(array{
 *     AwsAccountId?: string,
 *     CustomPermissionsName?: string,
 *     Capabilities?: array{
 *         ExportToCsv?: 'DENY',
 *         ExportToExcel?: 'DENY',
 *         ExportToPdf?: 'DENY',
 *         PrintReports?: 'DENY',
 *         CreateAndUpdateThemes?: 'DENY',
 *         AddOrRunAnomalyDetectionForAnalyses?: 'DENY',
 *         ShareAnalyses?: 'DENY',
 *         CreateAndUpdateDatasets?: 'DENY',
 *         ShareDatasets?: 'DENY',
 *         SubscribeDashboardEmailReports?: 'DENY',
 *         CreateAndUpdateDashboardEmailReports?: 'DENY',
 *         ShareDashboards?: 'DENY',
 *         CreateAndUpdateThresholdAlerts?: 'DENY',
 *         RenameSharedFolders?: 'DENY',
 *         CreateSharedFolders?: 'DENY',
 *         CreateAndUpdateDataSources?: 'DENY',
 *         ShareDataSources?: 'DENY',
 *         ViewAccountSPICECapacity?: 'DENY',
 *         CreateSPICEDataset?: 'DENY',
 *         ExportToPdfInScheduledReports?: 'DENY',
 *         ExportToCsvInScheduledReports?: 'DENY',
 *         ExportToExcelInScheduledReports?: 'DENY',
 *         IncludeContentInScheduledReportsEmail?: 'DENY',
 *         Dashboard?: 'DENY',
 *         Analysis?: 'DENY',
 *         Automate?: 'DENY',
 *         Flow?: 'DENY',
 *         Apps?: 'DENY',
 *         CreateAndUpdateApps?: 'DENY',
 *         ShareApps?: 'DENY',
 *         InvokeAppsAIInference?: 'DENY',
 *         AccessAppsNativeDataStore?: 'DENY',
 *         PublishWithoutApproval?: 'DENY',
 *         UseBedrockModels?: 'DENY',
 *         PerformFlowUiTask?: 'DENY',
 *         ApproveFlowShareRequests?: 'DENY',
 *         UseAgentWebSearch?: 'DENY',
 *         KnowledgeBase?: 'DENY',
 *         Action?: 'DENY',
 *         GenericHTTPAction?: 'DENY',
 *         CreateAndUpdateGenericHTTPAction?: 'DENY',
 *         ShareGenericHTTPAction?: 'DENY',
 *         UseGenericHTTPAction?: 'DENY',
 *         AsanaAction?: 'DENY',
 *         CreateAndUpdateAsanaAction?: 'DENY',
 *         ShareAsanaAction?: 'DENY',
 *         UseAsanaAction?: 'DENY',
 *         SlackAction?: 'DENY',
 *         CreateAndUpdateSlackAction?: 'DENY',
 *         ShareSlackAction?: 'DENY',
 *         UseSlackAction?: 'DENY',
 *         ServiceNowAction?: 'DENY',
 *         CreateAndUpdateServiceNowAction?: 'DENY',
 *         ShareServiceNowAction?: 'DENY',
 *         UseServiceNowAction?: 'DENY',
 *         SalesforceAction?: 'DENY',
 *         CreateAndUpdateSalesforceAction?: 'DENY',
 *         ShareSalesforceAction?: 'DENY',
 *         UseSalesforceAction?: 'DENY',
 *         MSExchangeAction?: 'DENY',
 *         CreateAndUpdateMSExchangeAction?: 'DENY',
 *         ShareMSExchangeAction?: 'DENY',
 *         UseMSExchangeAction?: 'DENY',
 *         PagerDutyAction?: 'DENY',
 *         CreateAndUpdatePagerDutyAction?: 'DENY',
 *         SharePagerDutyAction?: 'DENY',
 *         UsePagerDutyAction?: 'DENY',
 *         JiraAction?: 'DENY',
 *         CreateAndUpdateJiraAction?: 'DENY',
 *         ShareJiraAction?: 'DENY',
 *         UseJiraAction?: 'DENY',
 *         ConfluenceAction?: 'DENY',
 *         CreateAndUpdateConfluenceAction?: 'DENY',
 *         ShareConfluenceAction?: 'DENY',
 *         UseConfluenceAction?: 'DENY',
 *         OneDriveAction?: 'DENY',
 *         CreateAndUpdateOneDriveAction?: 'DENY',
 *         ShareOneDriveAction?: 'DENY',
 *         UseOneDriveAction?: 'DENY',
 *         SharePointAction?: 'DENY',
 *         CreateAndUpdateSharePointAction?: 'DENY',
 *         ShareSharePointAction?: 'DENY',
 *         UseSharePointAction?: 'DENY',
 *         MSTeamsAction?: 'DENY',
 *         CreateAndUpdateMSTeamsAction?: 'DENY',
 *         ShareMSTeamsAction?: 'DENY',
 *         UseMSTeamsAction?: 'DENY',
 *         GoogleCalendarAction?: 'DENY',
 *         CreateAndUpdateGoogleCalendarAction?: 'DENY',
 *         ShareGoogleCalendarAction?: 'DENY',
 *         UseGoogleCalendarAction?: 'DENY',
 *         ZendeskAction?: 'DENY',
 *         CreateAndUpdateZendeskAction?: 'DENY',
 *         ShareZendeskAction?: 'DENY',
 *         UseZendeskAction?: 'DENY',
 *         SmartsheetAction?: 'DENY',
 *         CreateAndUpdateSmartsheetAction?: 'DENY',
 *         ShareSmartsheetAction?: 'DENY',
 *         UseSmartsheetAction?: 'DENY',
 *         SAPBusinessPartnerAction?: 'DENY',
 *         CreateAndUpdateSAPBusinessPartnerAction?: 'DENY',
 *         ShareSAPBusinessPartnerAction?: 'DENY',
 *         UseSAPBusinessPartnerAction?: 'DENY',
 *         SAPProductMasterDataAction?: 'DENY',
 *         CreateAndUpdateSAPProductMasterDataAction?: 'DENY',
 *         ShareSAPProductMasterDataAction?: 'DENY',
 *         UseSAPProductMasterDataAction?: 'DENY',
 *         SAPPhysicalInventoryAction?: 'DENY',
 *         CreateAndUpdateSAPPhysicalInventoryAction?: 'DENY',
 *         ShareSAPPhysicalInventoryAction?: 'DENY',
 *         UseSAPPhysicalInventoryAction?: 'DENY',
 *         SAPBillOfMaterialAction?: 'DENY',
 *         CreateAndUpdateSAPBillOfMaterialAction?: 'DENY',
 *         ShareSAPBillOfMaterialAction?: 'DENY',
 *         UseSAPBillOfMaterialAction?: 'DENY',
 *         SAPMaterialStockAction?: 'DENY',
 *         CreateAndUpdateSAPMaterialStockAction?: 'DENY',
 *         ShareSAPMaterialStockAction?: 'DENY',
 *         UseSAPMaterialStockAction?: 'DENY',
 *         FactSetAction?: 'DENY',
 *         CreateAndUpdateFactSetAction?: 'DENY',
 *         ShareFactSetAction?: 'DENY',
 *         UseFactSetAction?: 'DENY',
 *         AmazonSThreeAction?: 'DENY',
 *         CreateAndUpdateAmazonSThreeAction?: 'DENY',
 *         ShareAmazonSThreeAction?: 'DENY',
 *         UseAmazonSThreeAction?: 'DENY',
 *         TextractAction?: 'DENY',
 *         CreateAndUpdateTextractAction?: 'DENY',
 *         ShareTextractAction?: 'DENY',
 *         UseTextractAction?: 'DENY',
 *         ComprehendAction?: 'DENY',
 *         CreateAndUpdateComprehendAction?: 'DENY',
 *         ShareComprehendAction?: 'DENY',
 *         UseComprehendAction?: 'DENY',
 *         ComprehendMedicalAction?: 'DENY',
 *         CreateAndUpdateComprehendMedicalAction?: 'DENY',
 *         ShareComprehendMedicalAction?: 'DENY',
 *         UseComprehendMedicalAction?: 'DENY',
 *         AmazonBedrockARSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockARSAction?: 'DENY',
 *         ShareAmazonBedrockARSAction?: 'DENY',
 *         UseAmazonBedrockARSAction?: 'DENY',
 *         AmazonBedrockFSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockFSAction?: 'DENY',
 *         ShareAmazonBedrockFSAction?: 'DENY',
 *         UseAmazonBedrockFSAction?: 'DENY',
 *         AmazonBedrockKRSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockKRSAction?: 'DENY',
 *         ShareAmazonBedrockKRSAction?: 'DENY',
 *         UseAmazonBedrockKRSAction?: 'DENY',
 *         MCPAction?: 'DENY',
 *         CreateAndUpdateMCPAction?: 'DENY',
 *         ShareMCPAction?: 'DENY',
 *         UseMCPAction?: 'DENY',
 *         OpenAPIAction?: 'DENY',
 *         CreateAndUpdateOpenAPIAction?: 'DENY',
 *         ShareOpenAPIAction?: 'DENY',
 *         UseOpenAPIAction?: 'DENY',
 *         SandPGMIAction?: 'DENY',
 *         CreateAndUpdateSandPGMIAction?: 'DENY',
 *         ShareSandPGMIAction?: 'DENY',
 *         UseSandPGMIAction?: 'DENY',
 *         SandPGlobalEnergyAction?: 'DENY',
 *         CreateAndUpdateSandPGlobalEnergyAction?: 'DENY',
 *         ShareSandPGlobalEnergyAction?: 'DENY',
 *         UseSandPGlobalEnergyAction?: 'DENY',
 *         BambooHRAction?: 'DENY',
 *         CreateAndUpdateBambooHRAction?: 'DENY',
 *         ShareBambooHRAction?: 'DENY',
 *         UseBambooHRAction?: 'DENY',
 *         BoxAgentAction?: 'DENY',
 *         CreateAndUpdateBoxAgentAction?: 'DENY',
 *         ShareBoxAgentAction?: 'DENY',
 *         UseBoxAgentAction?: 'DENY',
 *         CanvaAgentAction?: 'DENY',
 *         CreateAndUpdateCanvaAgentAction?: 'DENY',
 *         ShareCanvaAgentAction?: 'DENY',
 *         UseCanvaAgentAction?: 'DENY',
 *         GithubAction?: 'DENY',
 *         CreateAndUpdateGithubAction?: 'DENY',
 *         ShareGithubAction?: 'DENY',
 *         UseGithubAction?: 'DENY',
 *         NotionAction?: 'DENY',
 *         CreateAndUpdateNotionAction?: 'DENY',
 *         ShareNotionAction?: 'DENY',
 *         UseNotionAction?: 'DENY',
 *         LinearAction?: 'DENY',
 *         CreateAndUpdateLinearAction?: 'DENY',
 *         ShareLinearAction?: 'DENY',
 *         UseLinearAction?: 'DENY',
 *         HuggingFaceAction?: 'DENY',
 *         CreateAndUpdateHuggingFaceAction?: 'DENY',
 *         ShareHuggingFaceAction?: 'DENY',
 *         UseHuggingFaceAction?: 'DENY',
 *         MondayAction?: 'DENY',
 *         CreateAndUpdateMondayAction?: 'DENY',
 *         ShareMondayAction?: 'DENY',
 *         UseMondayAction?: 'DENY',
 *         HubspotAction?: 'DENY',
 *         CreateAndUpdateHubspotAction?: 'DENY',
 *         ShareHubspotAction?: 'DENY',
 *         UseHubspotAction?: 'DENY',
 *         IntercomAction?: 'DENY',
 *         CreateAndUpdateIntercomAction?: 'DENY',
 *         ShareIntercomAction?: 'DENY',
 *         UseIntercomAction?: 'DENY',
 *         NewRelicAction?: 'DENY',
 *         CreateAndUpdateNewRelicAction?: 'DENY',
 *         ShareNewRelicAction?: 'DENY',
 *         UseNewRelicAction?: 'DENY',
 *         Topic?: 'DENY',
 *         EditVisualWithQ?: 'DENY',
 *         BuildCalculatedFieldWithQ?: 'DENY',
 *         CreateDashboardExecutiveSummaryWithQ?: 'DENY',
 *         Space?: 'DENY',
 *         CreateSpaces?: 'DENY',
 *         ShareSpaces?: 'DENY',
 *         ChatAgent?: 'DENY',
 *         CreateChatAgents?: 'DENY',
 *         ShareChatAgents?: 'DENY',
 *         Research?: 'DENY',
 *         SelfUpgradeUserRole?: 'DENY',
 *         Extension?: 'DENY',
 *         UseBrowserExtension?: 'DENY',
 *         UseWordAddInExtension?: 'DENY',
 *         UseOutlookAddInExtension?: 'DENY',
 *         UseExcelAddInExtension?: 'DENY',
 *         UsePowerpointAddInExtension?: 'DENY',
 *         ManageSharedFolders?: 'DENY',
 *         GenerateAnalyses?: 'DENY',
 *         Story?: 'DENY',
 *         Scenario?: 'DENY',
 *         Trigger?: 'DENY',
 *         ScheduleTrigger?: 'DENY',
 *         InboundEmailTrigger?: 'DENY',
 *         QuickEventTrigger?: 'DENY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     CustomPermissionsName?: string,
 *     Capabilities?: array{
 *         ExportToCsv?: 'DENY',
 *         ExportToExcel?: 'DENY',
 *         ExportToPdf?: 'DENY',
 *         PrintReports?: 'DENY',
 *         CreateAndUpdateThemes?: 'DENY',
 *         AddOrRunAnomalyDetectionForAnalyses?: 'DENY',
 *         ShareAnalyses?: 'DENY',
 *         CreateAndUpdateDatasets?: 'DENY',
 *         ShareDatasets?: 'DENY',
 *         SubscribeDashboardEmailReports?: 'DENY',
 *         CreateAndUpdateDashboardEmailReports?: 'DENY',
 *         ShareDashboards?: 'DENY',
 *         CreateAndUpdateThresholdAlerts?: 'DENY',
 *         RenameSharedFolders?: 'DENY',
 *         CreateSharedFolders?: 'DENY',
 *         CreateAndUpdateDataSources?: 'DENY',
 *         ShareDataSources?: 'DENY',
 *         ViewAccountSPICECapacity?: 'DENY',
 *         CreateSPICEDataset?: 'DENY',
 *         ExportToPdfInScheduledReports?: 'DENY',
 *         ExportToCsvInScheduledReports?: 'DENY',
 *         ExportToExcelInScheduledReports?: 'DENY',
 *         IncludeContentInScheduledReportsEmail?: 'DENY',
 *         Dashboard?: 'DENY',
 *         Analysis?: 'DENY',
 *         Automate?: 'DENY',
 *         Flow?: 'DENY',
 *         Apps?: 'DENY',
 *         CreateAndUpdateApps?: 'DENY',
 *         ShareApps?: 'DENY',
 *         InvokeAppsAIInference?: 'DENY',
 *         AccessAppsNativeDataStore?: 'DENY',
 *         PublishWithoutApproval?: 'DENY',
 *         UseBedrockModels?: 'DENY',
 *         PerformFlowUiTask?: 'DENY',
 *         ApproveFlowShareRequests?: 'DENY',
 *         UseAgentWebSearch?: 'DENY',
 *         KnowledgeBase?: 'DENY',
 *         Action?: 'DENY',
 *         GenericHTTPAction?: 'DENY',
 *         CreateAndUpdateGenericHTTPAction?: 'DENY',
 *         ShareGenericHTTPAction?: 'DENY',
 *         UseGenericHTTPAction?: 'DENY',
 *         AsanaAction?: 'DENY',
 *         CreateAndUpdateAsanaAction?: 'DENY',
 *         ShareAsanaAction?: 'DENY',
 *         UseAsanaAction?: 'DENY',
 *         SlackAction?: 'DENY',
 *         CreateAndUpdateSlackAction?: 'DENY',
 *         ShareSlackAction?: 'DENY',
 *         UseSlackAction?: 'DENY',
 *         ServiceNowAction?: 'DENY',
 *         CreateAndUpdateServiceNowAction?: 'DENY',
 *         ShareServiceNowAction?: 'DENY',
 *         UseServiceNowAction?: 'DENY',
 *         SalesforceAction?: 'DENY',
 *         CreateAndUpdateSalesforceAction?: 'DENY',
 *         ShareSalesforceAction?: 'DENY',
 *         UseSalesforceAction?: 'DENY',
 *         MSExchangeAction?: 'DENY',
 *         CreateAndUpdateMSExchangeAction?: 'DENY',
 *         ShareMSExchangeAction?: 'DENY',
 *         UseMSExchangeAction?: 'DENY',
 *         PagerDutyAction?: 'DENY',
 *         CreateAndUpdatePagerDutyAction?: 'DENY',
 *         SharePagerDutyAction?: 'DENY',
 *         UsePagerDutyAction?: 'DENY',
 *         JiraAction?: 'DENY',
 *         CreateAndUpdateJiraAction?: 'DENY',
 *         ShareJiraAction?: 'DENY',
 *         UseJiraAction?: 'DENY',
 *         ConfluenceAction?: 'DENY',
 *         CreateAndUpdateConfluenceAction?: 'DENY',
 *         ShareConfluenceAction?: 'DENY',
 *         UseConfluenceAction?: 'DENY',
 *         OneDriveAction?: 'DENY',
 *         CreateAndUpdateOneDriveAction?: 'DENY',
 *         ShareOneDriveAction?: 'DENY',
 *         UseOneDriveAction?: 'DENY',
 *         SharePointAction?: 'DENY',
 *         CreateAndUpdateSharePointAction?: 'DENY',
 *         ShareSharePointAction?: 'DENY',
 *         UseSharePointAction?: 'DENY',
 *         MSTeamsAction?: 'DENY',
 *         CreateAndUpdateMSTeamsAction?: 'DENY',
 *         ShareMSTeamsAction?: 'DENY',
 *         UseMSTeamsAction?: 'DENY',
 *         GoogleCalendarAction?: 'DENY',
 *         CreateAndUpdateGoogleCalendarAction?: 'DENY',
 *         ShareGoogleCalendarAction?: 'DENY',
 *         UseGoogleCalendarAction?: 'DENY',
 *         ZendeskAction?: 'DENY',
 *         CreateAndUpdateZendeskAction?: 'DENY',
 *         ShareZendeskAction?: 'DENY',
 *         UseZendeskAction?: 'DENY',
 *         SmartsheetAction?: 'DENY',
 *         CreateAndUpdateSmartsheetAction?: 'DENY',
 *         ShareSmartsheetAction?: 'DENY',
 *         UseSmartsheetAction?: 'DENY',
 *         SAPBusinessPartnerAction?: 'DENY',
 *         CreateAndUpdateSAPBusinessPartnerAction?: 'DENY',
 *         ShareSAPBusinessPartnerAction?: 'DENY',
 *         UseSAPBusinessPartnerAction?: 'DENY',
 *         SAPProductMasterDataAction?: 'DENY',
 *         CreateAndUpdateSAPProductMasterDataAction?: 'DENY',
 *         ShareSAPProductMasterDataAction?: 'DENY',
 *         UseSAPProductMasterDataAction?: 'DENY',
 *         SAPPhysicalInventoryAction?: 'DENY',
 *         CreateAndUpdateSAPPhysicalInventoryAction?: 'DENY',
 *         ShareSAPPhysicalInventoryAction?: 'DENY',
 *         UseSAPPhysicalInventoryAction?: 'DENY',
 *         SAPBillOfMaterialAction?: 'DENY',
 *         CreateAndUpdateSAPBillOfMaterialAction?: 'DENY',
 *         ShareSAPBillOfMaterialAction?: 'DENY',
 *         UseSAPBillOfMaterialAction?: 'DENY',
 *         SAPMaterialStockAction?: 'DENY',
 *         CreateAndUpdateSAPMaterialStockAction?: 'DENY',
 *         ShareSAPMaterialStockAction?: 'DENY',
 *         UseSAPMaterialStockAction?: 'DENY',
 *         FactSetAction?: 'DENY',
 *         CreateAndUpdateFactSetAction?: 'DENY',
 *         ShareFactSetAction?: 'DENY',
 *         UseFactSetAction?: 'DENY',
 *         AmazonSThreeAction?: 'DENY',
 *         CreateAndUpdateAmazonSThreeAction?: 'DENY',
 *         ShareAmazonSThreeAction?: 'DENY',
 *         UseAmazonSThreeAction?: 'DENY',
 *         TextractAction?: 'DENY',
 *         CreateAndUpdateTextractAction?: 'DENY',
 *         ShareTextractAction?: 'DENY',
 *         UseTextractAction?: 'DENY',
 *         ComprehendAction?: 'DENY',
 *         CreateAndUpdateComprehendAction?: 'DENY',
 *         ShareComprehendAction?: 'DENY',
 *         UseComprehendAction?: 'DENY',
 *         ComprehendMedicalAction?: 'DENY',
 *         CreateAndUpdateComprehendMedicalAction?: 'DENY',
 *         ShareComprehendMedicalAction?: 'DENY',
 *         UseComprehendMedicalAction?: 'DENY',
 *         AmazonBedrockARSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockARSAction?: 'DENY',
 *         ShareAmazonBedrockARSAction?: 'DENY',
 *         UseAmazonBedrockARSAction?: 'DENY',
 *         AmazonBedrockFSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockFSAction?: 'DENY',
 *         ShareAmazonBedrockFSAction?: 'DENY',
 *         UseAmazonBedrockFSAction?: 'DENY',
 *         AmazonBedrockKRSAction?: 'DENY',
 *         CreateAndUpdateAmazonBedrockKRSAction?: 'DENY',
 *         ShareAmazonBedrockKRSAction?: 'DENY',
 *         UseAmazonBedrockKRSAction?: 'DENY',
 *         MCPAction?: 'DENY',
 *         CreateAndUpdateMCPAction?: 'DENY',
 *         ShareMCPAction?: 'DENY',
 *         UseMCPAction?: 'DENY',
 *         OpenAPIAction?: 'DENY',
 *         CreateAndUpdateOpenAPIAction?: 'DENY',
 *         ShareOpenAPIAction?: 'DENY',
 *         UseOpenAPIAction?: 'DENY',
 *         SandPGMIAction?: 'DENY',
 *         CreateAndUpdateSandPGMIAction?: 'DENY',
 *         ShareSandPGMIAction?: 'DENY',
 *         UseSandPGMIAction?: 'DENY',
 *         SandPGlobalEnergyAction?: 'DENY',
 *         CreateAndUpdateSandPGlobalEnergyAction?: 'DENY',
 *         ShareSandPGlobalEnergyAction?: 'DENY',
 *         UseSandPGlobalEnergyAction?: 'DENY',
 *         BambooHRAction?: 'DENY',
 *         CreateAndUpdateBambooHRAction?: 'DENY',
 *         ShareBambooHRAction?: 'DENY',
 *         UseBambooHRAction?: 'DENY',
 *         BoxAgentAction?: 'DENY',
 *         CreateAndUpdateBoxAgentAction?: 'DENY',
 *         ShareBoxAgentAction?: 'DENY',
 *         UseBoxAgentAction?: 'DENY',
 *         CanvaAgentAction?: 'DENY',
 *         CreateAndUpdateCanvaAgentAction?: 'DENY',
 *         ShareCanvaAgentAction?: 'DENY',
 *         UseCanvaAgentAction?: 'DENY',
 *         GithubAction?: 'DENY',
 *         CreateAndUpdateGithubAction?: 'DENY',
 *         ShareGithubAction?: 'DENY',
 *         UseGithubAction?: 'DENY',
 *         NotionAction?: 'DENY',
 *         CreateAndUpdateNotionAction?: 'DENY',
 *         ShareNotionAction?: 'DENY',
 *         UseNotionAction?: 'DENY',
 *         LinearAction?: 'DENY',
 *         CreateAndUpdateLinearAction?: 'DENY',
 *         ShareLinearAction?: 'DENY',
 *         UseLinearAction?: 'DENY',
 *         HuggingFaceAction?: 'DENY',
 *         CreateAndUpdateHuggingFaceAction?: 'DENY',
 *         ShareHuggingFaceAction?: 'DENY',
 *         UseHuggingFaceAction?: 'DENY',
 *         MondayAction?: 'DENY',
 *         CreateAndUpdateMondayAction?: 'DENY',
 *         ShareMondayAction?: 'DENY',
 *         UseMondayAction?: 'DENY',
 *         HubspotAction?: 'DENY',
 *         CreateAndUpdateHubspotAction?: 'DENY',
 *         ShareHubspotAction?: 'DENY',
 *         UseHubspotAction?: 'DENY',
 *         IntercomAction?: 'DENY',
 *         CreateAndUpdateIntercomAction?: 'DENY',
 *         ShareIntercomAction?: 'DENY',
 *         UseIntercomAction?: 'DENY',
 *         NewRelicAction?: 'DENY',
 *         CreateAndUpdateNewRelicAction?: 'DENY',
 *         ShareNewRelicAction?: 'DENY',
 *         UseNewRelicAction?: 'DENY',
 *         Topic?: 'DENY',
 *         EditVisualWithQ?: 'DENY',
 *         BuildCalculatedFieldWithQ?: 'DENY',
 *         CreateDashboardExecutiveSummaryWithQ?: 'DENY',
 *         Space?: 'DENY',
 *         CreateSpaces?: 'DENY',
 *         ShareSpaces?: 'DENY',
 *         ChatAgent?: 'DENY',
 *         CreateChatAgents?: 'DENY',
 *         ShareChatAgents?: 'DENY',
 *         Research?: 'DENY',
 *         SelfUpgradeUserRole?: 'DENY',
 *         Extension?: 'DENY',
 *         UseBrowserExtension?: 'DENY',
 *         UseWordAddInExtension?: 'DENY',
 *         UseOutlookAddInExtension?: 'DENY',
 *         UseExcelAddInExtension?: 'DENY',
 *         UsePowerpointAddInExtension?: 'DENY',
 *         ManageSharedFolders?: 'DENY',
 *         GenerateAnalyses?: 'DENY',
 *         Story?: 'DENY',
 *         Scenario?: 'DENY',
 *         Trigger?: 'DENY',
 *         ScheduleTrigger?: 'DENY',
 *         InboundEmailTrigger?: 'DENY',
 *         QuickEventTrigger?: 'DENY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDashboard(array $args = [])
 * @phpstan-method \Aws\Result updateDashboard(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     Name?: string,
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     VersionDescription?: string,
 *     DashboardPublishOptions?: array{
 *         AdHocFilteringOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportToCSVOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         SheetControlsOption?: array{VisibilityState?: 'COLLAPSED'|'EXPANDED', ...},
 *         VisualPublishOptions?: array{ExportHiddenFieldsOption?: array, ...},
 *         SheetLayoutElementMaximizationOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualMenuOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualAxisSortOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportWithHiddenFieldsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointDrillUpDownOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointMenuLabelOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointTooltipOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataQAEnabledOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         QuickSuiteActionsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExecutiveSummaryOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataStoriesSharingOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ThemeArn?: string,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardAsync(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     Name?: string,
 *     SourceEntity?: array{SourceTemplate?: array{DataSetReferences?: list<array>, Arn?: string, ...}, ...},
 *     Parameters?: array{
 *         StringParameters?: list<array>,
 *         IntegerParameters?: list<array>,
 *         DecimalParameters?: list<array>,
 *         DateTimeParameters?: list<array>,
 *         ...,
 *     },
 *     VersionDescription?: string,
 *     DashboardPublishOptions?: array{
 *         AdHocFilteringOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportToCSVOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         SheetControlsOption?: array{VisibilityState?: 'COLLAPSED'|'EXPANDED', ...},
 *         VisualPublishOptions?: array{ExportHiddenFieldsOption?: array, ...},
 *         SheetLayoutElementMaximizationOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualMenuOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         VisualAxisSortOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExportWithHiddenFieldsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointDrillUpDownOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointMenuLabelOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataPointTooltipOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataQAEnabledOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         QuickSuiteActionsOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ExecutiveSummaryOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         DataStoriesSharingOption?: array{AvailabilityStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ThemeArn?: string,
 *     Definition?: array{
 *         DataSetIdentifierDeclarations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDashboardLinks(array $args = [])
 * @phpstan-method \Aws\Result updateDashboardLinks(array{AwsAccountId?: string, DashboardId?: string, LinkEntities?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardLinksAsync(array{AwsAccountId?: string, DashboardId?: string, LinkEntities?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDashboardPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateDashboardPermissions(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     GrantLinkPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokeLinkPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     DashboardId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     GrantLinkPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokeLinkPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDashboardPublishedVersion(array $args = [])
 * @phpstan-method \Aws\Result updateDashboardPublishedVersion(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardPublishedVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardPublishedVersionAsync(array{AwsAccountId?: string, DashboardId?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result updateDashboardsQAConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateDashboardsQAConfiguration(array{AwsAccountId?: string, DashboardsQAStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardsQAConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardsQAConfigurationAsync(array{AwsAccountId?: string, DashboardsQAStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updateDataSet(array $args = [])
 * @phpstan-method \Aws\Result updateDataSet(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     Name?: string,
 *     PhysicalTableMap?: array<string, array{
 *         RelationalTable?: array,
 *         CustomSql?: array,
 *         S3Source?: array,
 *         SaaSTable?: array,
 *         FileSource?: array,
 *         ...,
 *     }>,
 *     LogicalTableMap?: array<string, array{Alias?: string, DataTransforms?: list<array>, Source?: array, ...}>,
 *     ImportMode?: 'DIRECT_QUERY'|'SPICE',
 *     ColumnGroups?: list<array{GeoSpatialColumnGroup?: array, ...}>,
 *     FieldFolders?: array<string, array{description?: string, columns?: list<string>, ...}>,
 *     RowLevelPermissionDataSet?: array{
 *         Namespace?: string,
 *         Arn?: string,
 *         PermissionPolicy?: 'DENY_ACCESS'|'GRANT_ACCESS',
 *         FormatVersion?: 'VERSION_1'|'VERSION_2',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     RowLevelPermissionTagConfiguration?: array{Status?: 'DISABLED'|'ENABLED', TagRules?: list<array>, TagRuleConfigurations?: list<list<string>>, ...},
 *     ColumnLevelPermissionRules?: list<array{Principals?: list<string>, ColumnNames?: list<string>, ...}>,
 *     DataSetUsageConfiguration?: array{DisableUseAsDirectQuerySource?: bool, DisableUseAsImportedSource?: bool, ...},
 *     DatasetParameters?: list<array{
 *         StringDatasetParameter?: array,
 *         DecimalDatasetParameter?: array,
 *         IntegerDatasetParameter?: array,
 *         DateTimeDatasetParameter?: array,
 *         ...,
 *     }>,
 *     PerformanceConfiguration?: array{UniqueKeys?: list<array>, ...},
 *     DataPrepConfiguration?: array{
 *         SourceTableMap?: array<string, array>,
 *         TransformStepMap?: array<string, array>,
 *         DestinationTableMap?: array<string, array>,
 *         ...,
 *     },
 *     SemanticModelConfiguration?: array{TableMap?: array<string, array>, SemanticMetadata?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSetAsync(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     Name?: string,
 *     PhysicalTableMap?: array<string, array{
 *         RelationalTable?: array,
 *         CustomSql?: array,
 *         S3Source?: array,
 *         SaaSTable?: array,
 *         FileSource?: array,
 *         ...,
 *     }>,
 *     LogicalTableMap?: array<string, array{Alias?: string, DataTransforms?: list<array>, Source?: array, ...}>,
 *     ImportMode?: 'DIRECT_QUERY'|'SPICE',
 *     ColumnGroups?: list<array{GeoSpatialColumnGroup?: array, ...}>,
 *     FieldFolders?: array<string, array{description?: string, columns?: list<string>, ...}>,
 *     RowLevelPermissionDataSet?: array{
 *         Namespace?: string,
 *         Arn?: string,
 *         PermissionPolicy?: 'DENY_ACCESS'|'GRANT_ACCESS',
 *         FormatVersion?: 'VERSION_1'|'VERSION_2',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     RowLevelPermissionTagConfiguration?: array{Status?: 'DISABLED'|'ENABLED', TagRules?: list<array>, TagRuleConfigurations?: list<list<string>>, ...},
 *     ColumnLevelPermissionRules?: list<array{Principals?: list<string>, ColumnNames?: list<string>, ...}>,
 *     DataSetUsageConfiguration?: array{DisableUseAsDirectQuerySource?: bool, DisableUseAsImportedSource?: bool, ...},
 *     DatasetParameters?: list<array{
 *         StringDatasetParameter?: array,
 *         DecimalDatasetParameter?: array,
 *         IntegerDatasetParameter?: array,
 *         DateTimeDatasetParameter?: array,
 *         ...,
 *     }>,
 *     PerformanceConfiguration?: array{UniqueKeys?: list<array>, ...},
 *     DataPrepConfiguration?: array{
 *         SourceTableMap?: array<string, array>,
 *         TransformStepMap?: array<string, array>,
 *         DestinationTableMap?: array<string, array>,
 *         ...,
 *     },
 *     SemanticModelConfiguration?: array{TableMap?: array<string, array>, SemanticMetadata?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSetPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateDataSetPermissions(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSetPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSetPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     DataSetId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{
 *     AwsAccountId?: string,
 *     DataSourceId?: string,
 *     Name?: string,
 *     DataSourceParameters?: array{
 *         AmazonElasticsearchParameters?: array{Domain?: string, ...},
 *         AthenaParameters?: array{
 *             WorkGroup?: string,
 *             RoleArn?: string,
 *             ConsumerAccountRoleArn?: string,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         AuroraParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AuroraPostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AwsIotAnalyticsParameters?: array{DataSetName?: string, ...},
 *         JiraParameters?: array{SiteBaseUrl?: string, ...},
 *         MariaDbParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         MySqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         OracleParameters?: array{Host?: string, Port?: int, Database?: string, UseServiceName?: bool, ...},
 *         PostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         PrestoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         RdsParameters?: array{InstanceId?: string, Database?: string, ...},
 *         RedshiftParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Database?: string,
 *             ClusterId?: string,
 *             IAMParameters?: array,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         S3Parameters?: array{ManifestFileLocation?: array, RoleArn?: string, ...},
 *         S3TablesParameters?: array{TableBucketArn?: string, ...},
 *         S3KnowledgeBaseParameters?: array{RoleArn?: string, BucketUrl?: string, MetadataFilesLocation?: string, ...},
 *         ServiceNowParameters?: array{SiteBaseUrl?: string, ...},
 *         SnowflakeParameters?: array{
 *             Host?: string,
 *             Database?: string,
 *             Warehouse?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             DatabaseAccessControlRole?: string,
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         SparkParameters?: array{Host?: string, Port?: int, ...},
 *         SqlServerParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TeradataParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TwitterParameters?: array{Query?: string, MaxRows?: int, ...},
 *         AmazonOpenSearchParameters?: array{Domain?: string, ...},
 *         ExasolParameters?: array{Host?: string, Port?: int, ...},
 *         DatabricksParameters?: array{Host?: string, Port?: int, SqlEndpointPath?: string, ...},
 *         StarburstParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Catalog?: string,
 *             ProductType?: 'ENTERPRISE'|'GALAXY',
 *             DatabaseAccessControlRole?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         TrinoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         BigQueryParameters?: array{ProjectId?: string, DataSetRegion?: string, ...},
 *         ImpalaParameters?: array{Host?: string, Port?: int, Database?: string, SqlEndpointPath?: string, ...},
 *         CustomConnectionParameters?: array{ConnectionType?: string, ...},
 *         WebCrawlerParameters?: array{
 *             WebCrawlerAuthType?: 'BASIC_AUTH'|'FORM'|'NO_AUTH'|'SAML',
 *             UsernameFieldXpath?: string,
 *             PasswordFieldXpath?: string,
 *             UsernameButtonXpath?: string,
 *             PasswordButtonXpath?: string,
 *             LoginPageUrl?: string,
 *             WebProxyHostName?: string,
 *             WebProxyPortNumber?: int,
 *             ...,
 *         },
 *         ConfluenceParameters?: array{ConfluenceUrl?: string, ...},
 *         QBusinessParameters?: array{ApplicationArn?: string, ...},
 *         SharePointParameters?: array{
 *             SharePointDomain?: string,
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         GoogleDriveParameters?: array{AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH', ...},
 *         OneDriveParameters?: array{
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         FMKBParameters?: array{KnowledgeBaseArn?: string, LinkedDataSourceIds?: list<string>, ...},
 *         ...,
 *     },
 *     Credentials?: array{
 *         CredentialPair?: array{Username?: string, Password?: string, AlternateDataSourceParameters?: list<array>, ...},
 *         CopySourceArn?: string,
 *         SecretArn?: string,
 *         KeyPairCredentials?: array{KeyPairUsername?: string, PrivateKey?: string, PrivateKeyPassphrase?: string, ...},
 *         WebProxyCredentials?: array{WebProxyUsername?: string, WebProxyPassword?: string, ...},
 *         OAuthClientCredentials?: array{ClientId?: string, ClientSecret?: string, Username?: string, ...},
 *         ...,
 *     },
 *     VpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     SslProperties?: array{DisableSsl?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{
 *     AwsAccountId?: string,
 *     DataSourceId?: string,
 *     Name?: string,
 *     DataSourceParameters?: array{
 *         AmazonElasticsearchParameters?: array{Domain?: string, ...},
 *         AthenaParameters?: array{
 *             WorkGroup?: string,
 *             RoleArn?: string,
 *             ConsumerAccountRoleArn?: string,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         AuroraParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AuroraPostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         AwsIotAnalyticsParameters?: array{DataSetName?: string, ...},
 *         JiraParameters?: array{SiteBaseUrl?: string, ...},
 *         MariaDbParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         MySqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         OracleParameters?: array{Host?: string, Port?: int, Database?: string, UseServiceName?: bool, ...},
 *         PostgreSqlParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         PrestoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         RdsParameters?: array{InstanceId?: string, Database?: string, ...},
 *         RedshiftParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Database?: string,
 *             ClusterId?: string,
 *             IAMParameters?: array,
 *             IdentityCenterConfiguration?: array,
 *             ...,
 *         },
 *         S3Parameters?: array{ManifestFileLocation?: array, RoleArn?: string, ...},
 *         S3TablesParameters?: array{TableBucketArn?: string, ...},
 *         S3KnowledgeBaseParameters?: array{RoleArn?: string, BucketUrl?: string, MetadataFilesLocation?: string, ...},
 *         ServiceNowParameters?: array{SiteBaseUrl?: string, ...},
 *         SnowflakeParameters?: array{
 *             Host?: string,
 *             Database?: string,
 *             Warehouse?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             DatabaseAccessControlRole?: string,
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         SparkParameters?: array{Host?: string, Port?: int, ...},
 *         SqlServerParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TeradataParameters?: array{Host?: string, Port?: int, Database?: string, ...},
 *         TwitterParameters?: array{Query?: string, MaxRows?: int, ...},
 *         AmazonOpenSearchParameters?: array{Domain?: string, ...},
 *         ExasolParameters?: array{Host?: string, Port?: int, ...},
 *         DatabricksParameters?: array{Host?: string, Port?: int, SqlEndpointPath?: string, ...},
 *         StarburstParameters?: array{
 *             Host?: string,
 *             Port?: int,
 *             Catalog?: string,
 *             ProductType?: 'ENTERPRISE'|'GALAXY',
 *             DatabaseAccessControlRole?: string,
 *             AuthenticationType?: 'KEYPAIR'|'PASSWORD'|'TOKEN'|'X509',
 *             OAuthParameters?: array,
 *             ...,
 *         },
 *         TrinoParameters?: array{Host?: string, Port?: int, Catalog?: string, ...},
 *         BigQueryParameters?: array{ProjectId?: string, DataSetRegion?: string, ...},
 *         ImpalaParameters?: array{Host?: string, Port?: int, Database?: string, SqlEndpointPath?: string, ...},
 *         CustomConnectionParameters?: array{ConnectionType?: string, ...},
 *         WebCrawlerParameters?: array{
 *             WebCrawlerAuthType?: 'BASIC_AUTH'|'FORM'|'NO_AUTH'|'SAML',
 *             UsernameFieldXpath?: string,
 *             PasswordFieldXpath?: string,
 *             UsernameButtonXpath?: string,
 *             PasswordButtonXpath?: string,
 *             LoginPageUrl?: string,
 *             WebProxyHostName?: string,
 *             WebProxyPortNumber?: int,
 *             ...,
 *         },
 *         ConfluenceParameters?: array{ConfluenceUrl?: string, ...},
 *         QBusinessParameters?: array{ApplicationArn?: string, ...},
 *         SharePointParameters?: array{
 *             SharePointDomain?: string,
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         GoogleDriveParameters?: array{AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH', ...},
 *         OneDriveParameters?: array{
 *             TenantId?: string,
 *             ClientId?: string,
 *             AuthType?: 'SERVICE_ACCOUNT'|'THREE_LEGGED_OAUTH'|'TWO_LEGGED_OAUTH',
 *             ...,
 *         },
 *         FMKBParameters?: array{KnowledgeBaseArn?: string, LinkedDataSourceIds?: list<string>, ...},
 *         ...,
 *     },
 *     Credentials?: array{
 *         CredentialPair?: array{Username?: string, Password?: string, AlternateDataSourceParameters?: list<array>, ...},
 *         CopySourceArn?: string,
 *         SecretArn?: string,
 *         KeyPairCredentials?: array{KeyPairUsername?: string, PrivateKey?: string, PrivateKeyPassphrase?: string, ...},
 *         WebProxyCredentials?: array{WebProxyUsername?: string, WebProxyPassword?: string, ...},
 *         OAuthClientCredentials?: array{ClientId?: string, ClientSecret?: string, Username?: string, ...},
 *         ...,
 *     },
 *     VpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     SslProperties?: array{DisableSsl?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSourcePermissions(array $args = [])
 * @phpstan-method \Aws\Result updateDataSourcePermissions(array{
 *     AwsAccountId?: string,
 *     DataSourceId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourcePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourcePermissionsAsync(array{
 *     AwsAccountId?: string,
 *     DataSourceId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDefaultQBusinessApplication(array $args = [])
 * @phpstan-method \Aws\Result updateDefaultQBusinessApplication(array{AwsAccountId?: string, Namespace?: string, ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDefaultQBusinessApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDefaultQBusinessApplicationAsync(array{AwsAccountId?: string, Namespace?: string, ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result updateFlow(array $args = [])
 * @phpstan-method \Aws\Result updateFlow(array{
 *     AwsAccountId?: string,
 *     FlowId?: string,
 *     Name?: string,
 *     Description?: string,
 *     FlowDefinition?: array,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowAsync(array{
 *     AwsAccountId?: string,
 *     FlowId?: string,
 *     Name?: string,
 *     Description?: string,
 *     FlowDefinition?: array,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlowPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateFlowPermissions(array{
 *     AwsAccountId?: string,
 *     FlowId?: string,
 *     GrantPermissions?: list<array{Actions?: list<string>, Principal?: string, ...}>,
 *     RevokePermissions?: list<array{Actions?: list<string>, Principal?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     FlowId?: string,
 *     GrantPermissions?: list<array{Actions?: list<string>, Principal?: string, ...}>,
 *     RevokePermissions?: list<array{Actions?: list<string>, Principal?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFolder(array $args = [])
 * @phpstan-method \Aws\Result updateFolder(array{AwsAccountId?: string, FolderId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFolderAsync(array{AwsAccountId?: string, FolderId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateFolderPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateFolderPermissions(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFolderPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFolderPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     FolderId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{GroupName?: string, Description?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{GroupName?: string, Description?: string, AwsAccountId?: string, Namespace?: string, ...} $args = [])
 * @method \Aws\Result updateIAMPolicyAssignment(array $args = [])
 * @phpstan-method \Aws\Result updateIAMPolicyAssignment(array{
 *     AwsAccountId?: string,
 *     AssignmentName?: string,
 *     Namespace?: string,
 *     AssignmentStatus?: 'DISABLED'|'DRAFT'|'ENABLED',
 *     PolicyArn?: string,
 *     Identities?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIAMPolicyAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIAMPolicyAssignmentAsync(array{
 *     AwsAccountId?: string,
 *     AssignmentName?: string,
 *     Namespace?: string,
 *     AssignmentStatus?: 'DISABLED'|'DRAFT'|'ENABLED',
 *     PolicyArn?: string,
 *     Identities?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIdentityPropagationConfig(array $args = [])
 * @phpstan-method \Aws\Result updateIdentityPropagationConfig(array{
 *     AwsAccountId?: string,
 *     Service?: 'ATHENA'|'GLUE_DATA_CATALOG'|'QBUSINESS'|'REDSHIFT',
 *     AuthorizedTargets?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdentityPropagationConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdentityPropagationConfigAsync(array{
 *     AwsAccountId?: string,
 *     Service?: 'ATHENA'|'GLUE_DATA_CATALOG'|'QBUSINESS'|'REDSHIFT',
 *     AuthorizedTargets?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIpRestriction(array $args = [])
 * @phpstan-method \Aws\Result updateIpRestriction(array{
 *     AwsAccountId?: string,
 *     IpRestrictionRuleMap?: array<string, string>,
 *     VpcIdRestrictionRuleMap?: array<string, string>,
 *     VpcEndpointIdRestrictionRuleMap?: array<string, string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIpRestrictionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIpRestrictionAsync(array{
 *     AwsAccountId?: string,
 *     IpRestrictionRuleMap?: array<string, string>,
 *     VpcIdRestrictionRuleMap?: array<string, string>,
 *     VpcEndpointIdRestrictionRuleMap?: array<string, string>,
 *     Enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKeyRegistration(array $args = [])
 * @phpstan-method \Aws\Result updateKeyRegistration(array{AwsAccountId?: string, KeyRegistration?: list<array{KeyArn?: string, DefaultKey?: bool, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKeyRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKeyRegistrationAsync(array{AwsAccountId?: string, KeyRegistration?: list<array{KeyArn?: string, DefaultKey?: bool, ...}>, ...} $args = [])
 * @method \Aws\Result updateKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result updateKnowledgeBase(array{
 *     AwsAccountId?: string,
 *     KnowledgeBaseId?: string,
 *     Name?: string,
 *     Description?: string,
 *     KnowledgeBaseConfiguration?: array{templateConfiguration?: array{template?: array, ...}, ...},
 *     MediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{
 *             videoExtractionStatus?: 'DISABLED'|'ENABLED',
 *             videoExtractionType?: 'AUDIO_TRANSCRIPTION_ONLY'|'VISUAL_CONTENT_AND_AUDIO_TRANSCRIPTION',
 *             ...,
 *         },
 *         ...,
 *     },
 *     IsEmailNotificationOptedForIngestionFailures?: bool,
 *     AccessControlConfiguration?: array{isACLEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKnowledgeBaseAsync(array{
 *     AwsAccountId?: string,
 *     KnowledgeBaseId?: string,
 *     Name?: string,
 *     Description?: string,
 *     KnowledgeBaseConfiguration?: array{templateConfiguration?: array{template?: array, ...}, ...},
 *     MediaExtractionConfiguration?: array{
 *         imageExtractionConfiguration?: array{imageExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         audioExtractionConfiguration?: array{audioExtractionStatus?: 'DISABLED'|'ENABLED', ...},
 *         videoExtractionConfiguration?: array{
 *             videoExtractionStatus?: 'DISABLED'|'ENABLED',
 *             videoExtractionType?: 'AUDIO_TRANSCRIPTION_ONLY'|'VISUAL_CONTENT_AND_AUDIO_TRANSCRIPTION',
 *             ...,
 *         },
 *         ...,
 *     },
 *     IsEmailNotificationOptedForIngestionFailures?: bool,
 *     AccessControlConfiguration?: array{isACLEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKnowledgeBasePermissions(array $args = [])
 * @phpstan-method \Aws\Result updateKnowledgeBasePermissions(array{
 *     AwsAccountId?: string,
 *     KnowledgeBaseId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKnowledgeBasePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKnowledgeBasePermissionsAsync(array{
 *     AwsAccountId?: string,
 *     KnowledgeBaseId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOAuthClientApplication(array $args = [])
 * @phpstan-method \Aws\Result updateOAuthClientApplication(array{
 *     AwsAccountId?: string,
 *     OAuthClientApplicationId?: string,
 *     Name?: string,
 *     ClientId?: string,
 *     ClientSecret?: string,
 *     OAuthTokenEndpointUrl?: string,
 *     OAuthAuthorizationEndpointUrl?: string,
 *     OAuthScopes?: string,
 *     DataSourceType?: 'ADOBE_ANALYTICS'|'AMAZON_ELASTICSEARCH'|'AMAZON_OPENSEARCH'|'ATHENA'|'AURORA'|'AURORA_POSTGRESQL'|'AWS_IOT_ANALYTICS'|'BIGQUERY'|'CONFLUENCE'|'DATABRICKS'|'EXASOL'|'GITHUB'|'GOOGLESHEETS'|'GOOGLE_DRIVE'|'JIRA'|'MARIADB'|'MYSQL'|'ONE_DRIVE'|'ORACLE'|'POSTGRESQL'|'PRESTO'|'QBUSINESS'|'REDSHIFT'|'S3'|'S3_KNOWLEDGE_BASE'|'S3_TABLES'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'STARBURST'|'TERADATA'|'TIMESTREAM'|'TRINO'|'TWITTER'|'WEB_CRAWLER',
 *     IdentityProviderVpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOAuthClientApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOAuthClientApplicationAsync(array{
 *     AwsAccountId?: string,
 *     OAuthClientApplicationId?: string,
 *     Name?: string,
 *     ClientId?: string,
 *     ClientSecret?: string,
 *     OAuthTokenEndpointUrl?: string,
 *     OAuthAuthorizationEndpointUrl?: string,
 *     OAuthScopes?: string,
 *     DataSourceType?: 'ADOBE_ANALYTICS'|'AMAZON_ELASTICSEARCH'|'AMAZON_OPENSEARCH'|'ATHENA'|'AURORA'|'AURORA_POSTGRESQL'|'AWS_IOT_ANALYTICS'|'BIGQUERY'|'CONFLUENCE'|'DATABRICKS'|'EXASOL'|'GITHUB'|'GOOGLESHEETS'|'GOOGLE_DRIVE'|'JIRA'|'MARIADB'|'MYSQL'|'ONE_DRIVE'|'ORACLE'|'POSTGRESQL'|'PRESTO'|'QBUSINESS'|'REDSHIFT'|'S3'|'S3_KNOWLEDGE_BASE'|'S3_TABLES'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'STARBURST'|'TERADATA'|'TIMESTREAM'|'TRINO'|'TWITTER'|'WEB_CRAWLER',
 *     IdentityProviderVpcConnectionProperties?: array{VpcConnectionArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePublicSharingSettings(array $args = [])
 * @phpstan-method \Aws\Result updatePublicSharingSettings(array{AwsAccountId?: string, PublicSharingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePublicSharingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePublicSharingSettingsAsync(array{AwsAccountId?: string, PublicSharingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result updateQPersonalizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateQPersonalizationConfiguration(array{AwsAccountId?: string, PersonalizationMode?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQPersonalizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQPersonalizationConfigurationAsync(array{AwsAccountId?: string, PersonalizationMode?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updateQuickSightQSearchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateQuickSightQSearchConfiguration(array{AwsAccountId?: string, QSearchStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuickSightQSearchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuickSightQSearchConfigurationAsync(array{AwsAccountId?: string, QSearchStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updateRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateRefreshSchedule(array{
 *     DataSetId?: string,
 *     AwsAccountId?: string,
 *     Schedule?: array{
 *         ScheduleId?: string,
 *         ScheduleFrequency?: array{
 *             Interval?: 'DAILY'|'HOURLY'|'MINUTE15'|'MINUTE30'|'MONTHLY'|'WEEKLY',
 *             RefreshOnDay?: array,
 *             Timezone?: string,
 *             TimeOfTheDay?: string,
 *             ...,
 *         },
 *         StartAfterDateTime?: int|string|\DateTimeInterface,
 *         RefreshType?: 'FULL_REFRESH'|'INCREMENTAL_REFRESH',
 *         Arn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRefreshScheduleAsync(array{
 *     DataSetId?: string,
 *     AwsAccountId?: string,
 *     Schedule?: array{
 *         ScheduleId?: string,
 *         ScheduleFrequency?: array{
 *             Interval?: 'DAILY'|'HOURLY'|'MINUTE15'|'MINUTE30'|'MONTHLY'|'WEEKLY',
 *             RefreshOnDay?: array,
 *             Timezone?: string,
 *             TimeOfTheDay?: string,
 *             ...,
 *         },
 *         StartAfterDateTime?: int|string|\DateTimeInterface,
 *         RefreshType?: 'FULL_REFRESH'|'INCREMENTAL_REFRESH',
 *         Arn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRoleCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result updateRoleCustomPermission(array{
 *     CustomPermissionsName?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoleCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoleCustomPermissionAsync(array{
 *     CustomPermissionsName?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO',
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSPICECapacityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSPICECapacityConfiguration(array{AwsAccountId?: string, PurchaseMode?: 'AUTO_PURCHASE'|'MANUAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSPICECapacityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSPICECapacityConfigurationAsync(array{AwsAccountId?: string, PurchaseMode?: 'AUTO_PURCHASE'|'MANUAL', ...} $args = [])
 * @method \Aws\Result updateSelfUpgrade(array $args = [])
 * @phpstan-method \Aws\Result updateSelfUpgrade(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     UpgradeRequestId?: string,
 *     Action?: 'APPROVE'|'DENY'|'VERIFY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSelfUpgradeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSelfUpgradeAsync(array{
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     UpgradeRequestId?: string,
 *     Action?: 'APPROVE'|'DENY'|'VERIFY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSelfUpgradeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSelfUpgradeConfiguration(array{AwsAccountId?: string, Namespace?: string, SelfUpgradeStatus?: 'ADMIN_APPROVAL'|'AUTO_APPROVAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSelfUpgradeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSelfUpgradeConfigurationAsync(array{AwsAccountId?: string, Namespace?: string, SelfUpgradeStatus?: 'ADMIN_APPROVAL'|'AUTO_APPROVAL', ...} $args = [])
 * @method \Aws\Result updateSpace(array $args = [])
 * @phpstan-method \Aws\Result updateSpace(array{AwsAccountId?: string, SpaceId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpaceAsync(array{AwsAccountId?: string, SpaceId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateSpacePermissions(array $args = [])
 * @phpstan-method \Aws\Result updateSpacePermissions(array{
 *     AwsAccountId?: string,
 *     SpaceId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpacePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpacePermissionsAsync(array{
 *     AwsAccountId?: string,
 *     SpaceId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSpaceResources(array $args = [])
 * @phpstan-method \Aws\Result updateSpaceResources(array{
 *     AwsAccountId?: string,
 *     SpaceId?: string,
 *     AddResources?: list<array{
 *         ResourceType?: 'ACTION_CONNECTOR'|'DASHBOARD'|'DATA_SET'|'KNOWLEDGE_BASE'|'TOPIC',
 *         ResourceDetails?: array,
 *         ...,
 *     }>,
 *     RemoveResources?: list<array{
 *         ResourceType?: 'ACTION_CONNECTOR'|'DASHBOARD'|'DATA_SET'|'KNOWLEDGE_BASE'|'TOPIC',
 *         ResourceDetails?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpaceResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpaceResourcesAsync(array{
 *     AwsAccountId?: string,
 *     SpaceId?: string,
 *     AddResources?: list<array{
 *         ResourceType?: 'ACTION_CONNECTOR'|'DASHBOARD'|'DATA_SET'|'KNOWLEDGE_BASE'|'TOPIC',
 *         ResourceDetails?: array,
 *         ...,
 *     }>,
 *     RemoveResources?: list<array{
 *         ResourceType?: 'ACTION_CONNECTOR'|'DASHBOARD'|'DATA_SET'|'KNOWLEDGE_BASE'|'TOPIC',
 *         ResourceDetails?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateTemplate(array{
 *     AwsAccountId?: string,
 *     TemplateId?: string,
 *     SourceEntity?: array{
 *         SourceAnalysis?: array{Arn?: string, DataSetReferences?: list<array>, ...},
 *         SourceTemplate?: array{Arn?: string, ...},
 *         ...,
 *     },
 *     VersionDescription?: string,
 *     Name?: string,
 *     Definition?: array{
 *         DataSetConfigurations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateAsync(array{
 *     AwsAccountId?: string,
 *     TemplateId?: string,
 *     SourceEntity?: array{
 *         SourceAnalysis?: array{Arn?: string, DataSetReferences?: list<array>, ...},
 *         SourceTemplate?: array{Arn?: string, ...},
 *         ...,
 *     },
 *     VersionDescription?: string,
 *     Name?: string,
 *     Definition?: array{
 *         DataSetConfigurations?: list<array>,
 *         Sheets?: list<array>,
 *         TooltipSheets?: list<array>,
 *         CalculatedFields?: list<array>,
 *         ParameterDeclarations?: list<array>,
 *         FilterGroups?: list<array>,
 *         ColumnConfigurations?: list<array>,
 *         AnalysisDefaults?: array{DefaultNewSheetConfiguration?: array, ...},
 *         Options?: array{
 *             Timezone?: string,
 *             WeekStart?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             QBusinessInsightsStatus?: 'DISABLED'|'ENABLED',
 *             ExcludedDataSetArns?: list<string>,
 *             CustomActionDefaults?: array,
 *             ...,
 *         },
 *         QueryExecutionOptions?: array{QueryExecutionMode?: 'AUTO'|'MANUAL', ...},
 *         StaticFiles?: list<array>,
 *         ...,
 *     },
 *     ValidationStrategy?: array{Mode?: 'LENIENT'|'STRICT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplateAlias(array $args = [])
 * @phpstan-method \Aws\Result updateTemplateAlias(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, TemplateVersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateAliasAsync(array{AwsAccountId?: string, TemplateId?: string, AliasName?: string, TemplateVersionNumber?: int, ...} $args = [])
 * @method \Aws\Result updateTemplatePermissions(array $args = [])
 * @phpstan-method \Aws\Result updateTemplatePermissions(array{
 *     AwsAccountId?: string,
 *     TemplateId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplatePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplatePermissionsAsync(array{
 *     AwsAccountId?: string,
 *     TemplateId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTheme(array $args = [])
 * @phpstan-method \Aws\Result updateTheme(array{
 *     AwsAccountId?: string,
 *     ThemeId?: string,
 *     Name?: string,
 *     BaseThemeId?: string,
 *     VersionDescription?: string,
 *     Configuration?: array{
 *         DataColorPalette?: array{Colors?: list<string>, MinMaxGradient?: list<string>, EmptyFillColor?: string, ...},
 *         UIColorPalette?: array{
 *             PrimaryForeground?: string,
 *             PrimaryBackground?: string,
 *             SecondaryForeground?: string,
 *             SecondaryBackground?: string,
 *             Accent?: string,
 *             AccentForeground?: string,
 *             Danger?: string,
 *             DangerForeground?: string,
 *             Warning?: string,
 *             WarningForeground?: string,
 *             Success?: string,
 *             SuccessForeground?: string,
 *             Dimension?: string,
 *             DimensionForeground?: string,
 *             Measure?: string,
 *             MeasureForeground?: string,
 *             ...,
 *         },
 *         Sheet?: array{Tile?: array, TileLayout?: array, Background?: array, ...},
 *         Typography?: array{
 *             FontFamilies?: list<array>,
 *             AxisTitleFontConfiguration?: array,
 *             AxisLabelFontConfiguration?: array,
 *             LegendTitleFontConfiguration?: array,
 *             LegendValueFontConfiguration?: array,
 *             DataLabelFontConfiguration?: array,
 *             VisualTitleFontConfiguration?: array,
 *             VisualSubtitleFontConfiguration?: array,
 *             ControlTitleFontConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThemeAsync(array{
 *     AwsAccountId?: string,
 *     ThemeId?: string,
 *     Name?: string,
 *     BaseThemeId?: string,
 *     VersionDescription?: string,
 *     Configuration?: array{
 *         DataColorPalette?: array{Colors?: list<string>, MinMaxGradient?: list<string>, EmptyFillColor?: string, ...},
 *         UIColorPalette?: array{
 *             PrimaryForeground?: string,
 *             PrimaryBackground?: string,
 *             SecondaryForeground?: string,
 *             SecondaryBackground?: string,
 *             Accent?: string,
 *             AccentForeground?: string,
 *             Danger?: string,
 *             DangerForeground?: string,
 *             Warning?: string,
 *             WarningForeground?: string,
 *             Success?: string,
 *             SuccessForeground?: string,
 *             Dimension?: string,
 *             DimensionForeground?: string,
 *             Measure?: string,
 *             MeasureForeground?: string,
 *             ...,
 *         },
 *         Sheet?: array{Tile?: array, TileLayout?: array, Background?: array, ...},
 *         Typography?: array{
 *             FontFamilies?: list<array>,
 *             AxisTitleFontConfiguration?: array,
 *             AxisLabelFontConfiguration?: array,
 *             LegendTitleFontConfiguration?: array,
 *             LegendValueFontConfiguration?: array,
 *             DataLabelFontConfiguration?: array,
 *             VisualTitleFontConfiguration?: array,
 *             VisualSubtitleFontConfiguration?: array,
 *             ControlTitleFontConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThemeAlias(array $args = [])
 * @phpstan-method \Aws\Result updateThemeAlias(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ThemeVersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThemeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThemeAliasAsync(array{AwsAccountId?: string, ThemeId?: string, AliasName?: string, ThemeVersionNumber?: int, ...} $args = [])
 * @method \Aws\Result updateThemePermissions(array $args = [])
 * @phpstan-method \Aws\Result updateThemePermissions(array{
 *     AwsAccountId?: string,
 *     ThemeId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThemePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThemePermissionsAsync(array{
 *     AwsAccountId?: string,
 *     ThemeId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTopic(array $args = [])
 * @phpstan-method \Aws\Result updateTopic(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     Topic?: array{
 *         Name?: string,
 *         Description?: string,
 *         UserExperienceVersion?: 'LEGACY'|'NEW_READER_EXPERIENCE',
 *         DataSets?: list<array>,
 *         ConfigOptions?: array{QBusinessInsightsEnabled?: bool, ...},
 *         ...,
 *     },
 *     CustomInstructions?: array{CustomInstructionsString?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTopicAsync(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     Topic?: array{
 *         Name?: string,
 *         Description?: string,
 *         UserExperienceVersion?: 'LEGACY'|'NEW_READER_EXPERIENCE',
 *         DataSets?: list<array>,
 *         ConfigOptions?: array{QBusinessInsightsEnabled?: bool, ...},
 *         ...,
 *     },
 *     CustomInstructions?: array{CustomInstructionsString?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTopicPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateTopicPermissions(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTopicPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTopicPermissionsAsync(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     GrantPermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     RevokePermissions?: list<array{Principal?: string, Actions?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTopicRefreshSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateTopicRefreshSchedule(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     DatasetId?: string,
 *     RefreshSchedule?: array{
 *         IsEnabled?: bool,
 *         BasedOnSpiceSchedule?: bool,
 *         StartingAt?: int|string|\DateTimeInterface,
 *         Timezone?: string,
 *         RepeatAt?: string,
 *         TopicScheduleType?: 'DAILY'|'HOURLY'|'MONTHLY'|'WEEKLY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTopicRefreshScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTopicRefreshScheduleAsync(array{
 *     AwsAccountId?: string,
 *     TopicId?: string,
 *     DatasetId?: string,
 *     RefreshSchedule?: array{
 *         IsEnabled?: bool,
 *         BasedOnSpiceSchedule?: bool,
 *         StartingAt?: int|string|\DateTimeInterface,
 *         Timezone?: string,
 *         RepeatAt?: string,
 *         TopicScheduleType?: 'DAILY'|'HOURLY'|'MONTHLY'|'WEEKLY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     UserName?: string,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     Email?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO'|'RESTRICTED_AUTHOR'|'RESTRICTED_READER',
 *     CustomPermissionsName?: string,
 *     UnapplyCustomPermissions?: bool,
 *     ExternalLoginFederationProviderType?: string,
 *     CustomFederationProviderUrl?: string,
 *     ExternalLoginId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     UserName?: string,
 *     AwsAccountId?: string,
 *     Namespace?: string,
 *     Email?: string,
 *     Role?: 'ADMIN'|'ADMIN_PRO'|'AUTHOR'|'AUTHOR_PRO'|'READER'|'READER_PRO'|'RESTRICTED_AUTHOR'|'RESTRICTED_READER',
 *     CustomPermissionsName?: string,
 *     UnapplyCustomPermissions?: bool,
 *     ExternalLoginFederationProviderType?: string,
 *     CustomFederationProviderUrl?: string,
 *     ExternalLoginId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserCustomPermission(array $args = [])
 * @phpstan-method \Aws\Result updateUserCustomPermission(array{UserName?: string, AwsAccountId?: string, Namespace?: string, CustomPermissionsName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserCustomPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserCustomPermissionAsync(array{UserName?: string, AwsAccountId?: string, Namespace?: string, CustomPermissionsName?: string, ...} $args = [])
 * @method \Aws\Result updateVPCConnection(array $args = [])
 * @phpstan-method \Aws\Result updateVPCConnection(array{
 *     AwsAccountId?: string,
 *     VPCConnectionId?: string,
 *     Name?: string,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     DnsResolvers?: list<string>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVPCConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVPCConnectionAsync(array{
 *     AwsAccountId?: string,
 *     VPCConnectionId?: string,
 *     Name?: string,
 *     SubnetIds?: list<string>,
 *     SecurityGroupIds?: list<string>,
 *     DnsResolvers?: list<string>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 */
class QuickSightClient extends AwsClient {}
