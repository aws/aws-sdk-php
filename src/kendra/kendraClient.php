<?php
namespace Aws\kendra;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWSKendraFrontendService** service.
 * @method \Aws\Result associateEntitiesToExperience(array $args = [])
 * @phpstan-method \Aws\Result associateEntitiesToExperience(array{
 *     Id?: string,
 *     IndexId?: string,
 *     EntityList?: list<array{EntityId?: string, EntityType?: 'GROUP'|'USER', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateEntitiesToExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateEntitiesToExperienceAsync(array{
 *     Id?: string,
 *     IndexId?: string,
 *     EntityList?: list<array{EntityId?: string, EntityType?: 'GROUP'|'USER', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associatePersonasToEntities(array $args = [])
 * @phpstan-method \Aws\Result associatePersonasToEntities(array{
 *     Id?: string,
 *     IndexId?: string,
 *     Personas?: list<array{EntityId?: string, Persona?: 'OWNER'|'VIEWER', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePersonasToEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePersonasToEntitiesAsync(array{
 *     Id?: string,
 *     IndexId?: string,
 *     Personas?: list<array{EntityId?: string, Persona?: 'OWNER'|'VIEWER', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteDocument(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteDocument(array{
 *     IndexId?: string,
 *     DocumentIdList?: list<string>,
 *     DataSourceSyncJobMetricTarget?: array{DataSourceId?: string, DataSourceSyncJobId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteDocumentAsync(array{
 *     IndexId?: string,
 *     DocumentIdList?: list<string>,
 *     DataSourceSyncJobMetricTarget?: array{DataSourceId?: string, DataSourceSyncJobId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteFeaturedResultsSet(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteFeaturedResultsSet(array{IndexId?: string, FeaturedResultsSetIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteFeaturedResultsSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteFeaturedResultsSetAsync(array{IndexId?: string, FeaturedResultsSetIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetDocumentStatus(array $args = [])
 * @phpstan-method \Aws\Result batchGetDocumentStatus(array{
 *     IndexId?: string,
 *     DocumentInfoList?: list<array{DocumentId?: string, Attributes?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDocumentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDocumentStatusAsync(array{
 *     IndexId?: string,
 *     DocumentInfoList?: list<array{DocumentId?: string, Attributes?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchPutDocument(array $args = [])
 * @phpstan-method \Aws\Result batchPutDocument(array{
 *     IndexId?: string,
 *     RoleArn?: string,
 *     Documents?: list<array{
 *         Id?: string,
 *         Title?: string,
 *         Blob?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Path?: array,
 *         Attributes?: list<array>,
 *         AccessControlList?: list<array>,
 *         HierarchicalAccessControlList?: list<array>,
 *         ContentType?: 'CSV'|'HTML'|'JSON'|'MD'|'MS_EXCEL'|'MS_WORD'|'PDF'|'PLAIN_TEXT'|'PPT'|'RTF'|'XML'|'XSLT',
 *         AccessControlConfigurationId?: string,
 *         ...,
 *     }>,
 *     CustomDocumentEnrichmentConfiguration?: array{
 *         InlineConfigurations?: list<array>,
 *         PreExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         PostExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         RoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutDocumentAsync(array{
 *     IndexId?: string,
 *     RoleArn?: string,
 *     Documents?: list<array{
 *         Id?: string,
 *         Title?: string,
 *         Blob?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Path?: array,
 *         Attributes?: list<array>,
 *         AccessControlList?: list<array>,
 *         HierarchicalAccessControlList?: list<array>,
 *         ContentType?: 'CSV'|'HTML'|'JSON'|'MD'|'MS_EXCEL'|'MS_WORD'|'PDF'|'PLAIN_TEXT'|'PPT'|'RTF'|'XML'|'XSLT',
 *         AccessControlConfigurationId?: string,
 *         ...,
 *     }>,
 *     CustomDocumentEnrichmentConfiguration?: array{
 *         InlineConfigurations?: list<array>,
 *         PreExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         PostExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         RoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result clearQuerySuggestions(array $args = [])
 * @phpstan-method \Aws\Result clearQuerySuggestions(array{IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise clearQuerySuggestionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise clearQuerySuggestionsAsync(array{IndexId?: string, ...} $args = [])
 * @method \Aws\Result createAccessControlConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createAccessControlConfiguration(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     AccessControlList?: list<array{Name?: string, Type?: 'GROUP'|'USER', Access?: 'ALLOW'|'DENY', DataSourceId?: string, ...}>,
 *     HierarchicalAccessControlList?: list<array{PrincipalList?: list<array>, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessControlConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessControlConfigurationAsync(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     AccessControlList?: list<array{Name?: string, Type?: 'GROUP'|'USER', Access?: 'ALLOW'|'DENY', DataSourceId?: string, ...}>,
 *     HierarchicalAccessControlList?: list<array{PrincipalList?: list<array>, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSource(array $args = [])
 * @phpstan-method \Aws\Result createDataSource(array{
 *     Name?: string,
 *     IndexId?: string,
 *     Type?: 'ALFRESCO'|'BOX'|'CONFLUENCE'|'CUSTOM'|'DATABASE'|'FSX'|'GITHUB'|'GOOGLEDRIVE'|'JIRA'|'ONEDRIVE'|'QUIP'|'S3'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SLACK'|'TEMPLATE'|'WEBCRAWLER'|'WORKDOCS',
 *     Configuration?: array{
 *         S3Configuration?: array{
 *             BucketName?: string,
 *             InclusionPrefixes?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             DocumentsMetadataConfiguration?: array,
 *             AccessControlListConfiguration?: array,
 *             ...,
 *         },
 *         SharePointConfiguration?: array{
 *             SharePointVersion?: 'SHAREPOINT_2013'|'SHAREPOINT_2016'|'SHAREPOINT_2019'|'SHAREPOINT_ONLINE',
 *             Urls?: list<string>,
 *             SecretArn?: string,
 *             CrawlAttachments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             FieldMappings?: list<array>,
 *             DocumentTitleFieldName?: string,
 *             DisableLocalGroups?: bool,
 *             SslCertificateS3Path?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ProxyConfiguration?: array,
 *             ...,
 *         },
 *         DatabaseConfiguration?: array{
 *             DatabaseEngineType?: 'RDS_AURORA_MYSQL'|'RDS_AURORA_POSTGRESQL'|'RDS_MYSQL'|'RDS_POSTGRESQL',
 *             ConnectionConfiguration?: array,
 *             VpcConfiguration?: array,
 *             ColumnConfiguration?: array,
 *             AclConfiguration?: array,
 *             SqlConfiguration?: array,
 *             ...,
 *         },
 *         SalesforceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             StandardObjectConfigurations?: list<array>,
 *             KnowledgeArticleConfiguration?: array,
 *             ChatterFeedConfiguration?: array,
 *             CrawlAttachments?: bool,
 *             StandardObjectAttachmentConfiguration?: array,
 *             IncludeAttachmentFilePatterns?: list<string>,
 *             ExcludeAttachmentFilePatterns?: list<string>,
 *             ...,
 *         },
 *         OneDriveConfiguration?: array{
 *             TenantDomain?: string,
 *             SecretArn?: string,
 *             OneDriveUsers?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             DisableLocalGroups?: bool,
 *             ...,
 *         },
 *         ServiceNowConfiguration?: array{
 *             HostUrl?: string,
 *             SecretArn?: string,
 *             ServiceNowBuildVersion?: 'LONDON'|'OTHERS',
 *             KnowledgeArticleConfiguration?: array,
 *             ServiceCatalogConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ...,
 *         },
 *         ConfluenceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             Version?: 'CLOUD'|'SERVER',
 *             SpaceConfiguration?: array,
 *             PageConfiguration?: array,
 *             BlogConfiguration?: array,
 *             AttachmentConfiguration?: array,
 *             VpcConfiguration?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'PAT',
 *             ...,
 *         },
 *         GoogleDriveConfiguration?: array{
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ExcludeMimeTypes?: list<string>,
 *             ExcludeUserAccounts?: list<string>,
 *             ExcludeSharedDrives?: list<string>,
 *             ...,
 *         },
 *         WebCrawlerConfiguration?: array{
 *             Urls?: array,
 *             CrawlDepth?: int,
 *             MaxLinksPerPage?: int,
 *             MaxContentSizePerPageInMegaBytes?: float,
 *             MaxUrlsPerMinuteCrawlRate?: int,
 *             UrlInclusionPatterns?: list<string>,
 *             UrlExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationConfiguration?: array,
 *             ...,
 *         },
 *         WorkDocsConfiguration?: array{
 *             OrganizationId?: string,
 *             CrawlComments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         FsxConfiguration?: array{
 *             FileSystemId?: string,
 *             FileSystemType?: 'WINDOWS',
 *             VpcConfiguration?: array,
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         SlackConfiguration?: array{
 *             TeamId?: string,
 *             SecretArn?: string,
 *             VpcConfiguration?: array,
 *             SlackEntityList?: list<'DIRECT_MESSAGE'|'GROUP_MESSAGE'|'PRIVATE_CHANNEL'|'PUBLIC_CHANNEL'>,
 *             UseChangeLog?: bool,
 *             CrawlBotMessage?: bool,
 *             ExcludeArchived?: bool,
 *             SinceCrawlDate?: string,
 *             LookBackPeriod?: int,
 *             PrivateChannelFilter?: list<string>,
 *             PublicChannelFilter?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         BoxConfiguration?: array{
 *             EnterpriseId?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             CrawlComments?: bool,
 *             CrawlTasks?: bool,
 *             CrawlWebLinks?: bool,
 *             FileFieldMappings?: list<array>,
 *             TaskFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             WebLinkFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         QuipConfiguration?: array{
 *             Domain?: string,
 *             SecretArn?: string,
 *             CrawlFileComments?: bool,
 *             CrawlChatRooms?: bool,
 *             CrawlAttachments?: bool,
 *             FolderIds?: list<string>,
 *             ThreadFieldMappings?: list<array>,
 *             MessageFieldMappings?: list<array>,
 *             AttachmentFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         JiraConfiguration?: array{
 *             JiraAccountUrl?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             Project?: list<string>,
 *             IssueType?: list<string>,
 *             Status?: list<string>,
 *             IssueSubEntityFilter?: list<'ATTACHMENTS'|'COMMENTS'|'WORKLOGS'>,
 *             AttachmentFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             IssueFieldMappings?: list<array>,
 *             ProjectFieldMappings?: list<array>,
 *             WorkLogFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         GitHubConfiguration?: array{
 *             SaaSConfiguration?: array,
 *             OnPremiseConfiguration?: array,
 *             Type?: 'ON_PREMISE'|'SAAS',
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             GitHubDocumentCrawlProperties?: array,
 *             RepositoryFilter?: list<string>,
 *             InclusionFolderNamePatterns?: list<string>,
 *             InclusionFileTypePatterns?: list<string>,
 *             InclusionFileNamePatterns?: list<string>,
 *             ExclusionFolderNamePatterns?: list<string>,
 *             ExclusionFileTypePatterns?: list<string>,
 *             ExclusionFileNamePatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             GitHubRepositoryConfigurationFieldMappings?: list<array>,
 *             GitHubCommitConfigurationFieldMappings?: list<array>,
 *             GitHubIssueDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueCommentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueAttachmentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestCommentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentAttachmentConfigurationFieldMappings?: list<array>,
 *             ...,
 *         },
 *         AlfrescoConfiguration?: array{
 *             SiteUrl?: string,
 *             SiteId?: string,
 *             SecretArn?: string,
 *             SslCertificateS3Path?: array,
 *             CrawlSystemFolders?: bool,
 *             CrawlComments?: bool,
 *             EntityFilter?: list<'blog'|'documentLibrary'|'wiki'>,
 *             DocumentLibraryFieldMappings?: list<array>,
 *             BlogFieldMappings?: list<array>,
 *             WikiFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{Template?: array, ...},
 *         ...,
 *     },
 *     VpcConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     Description?: string,
 *     Schedule?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     LanguageCode?: string,
 *     CustomDocumentEnrichmentConfiguration?: array{
 *         InlineConfigurations?: list<array>,
 *         PreExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         PostExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         RoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceAsync(array{
 *     Name?: string,
 *     IndexId?: string,
 *     Type?: 'ALFRESCO'|'BOX'|'CONFLUENCE'|'CUSTOM'|'DATABASE'|'FSX'|'GITHUB'|'GOOGLEDRIVE'|'JIRA'|'ONEDRIVE'|'QUIP'|'S3'|'SALESFORCE'|'SERVICENOW'|'SHAREPOINT'|'SLACK'|'TEMPLATE'|'WEBCRAWLER'|'WORKDOCS',
 *     Configuration?: array{
 *         S3Configuration?: array{
 *             BucketName?: string,
 *             InclusionPrefixes?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             DocumentsMetadataConfiguration?: array,
 *             AccessControlListConfiguration?: array,
 *             ...,
 *         },
 *         SharePointConfiguration?: array{
 *             SharePointVersion?: 'SHAREPOINT_2013'|'SHAREPOINT_2016'|'SHAREPOINT_2019'|'SHAREPOINT_ONLINE',
 *             Urls?: list<string>,
 *             SecretArn?: string,
 *             CrawlAttachments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             FieldMappings?: list<array>,
 *             DocumentTitleFieldName?: string,
 *             DisableLocalGroups?: bool,
 *             SslCertificateS3Path?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ProxyConfiguration?: array,
 *             ...,
 *         },
 *         DatabaseConfiguration?: array{
 *             DatabaseEngineType?: 'RDS_AURORA_MYSQL'|'RDS_AURORA_POSTGRESQL'|'RDS_MYSQL'|'RDS_POSTGRESQL',
 *             ConnectionConfiguration?: array,
 *             VpcConfiguration?: array,
 *             ColumnConfiguration?: array,
 *             AclConfiguration?: array,
 *             SqlConfiguration?: array,
 *             ...,
 *         },
 *         SalesforceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             StandardObjectConfigurations?: list<array>,
 *             KnowledgeArticleConfiguration?: array,
 *             ChatterFeedConfiguration?: array,
 *             CrawlAttachments?: bool,
 *             StandardObjectAttachmentConfiguration?: array,
 *             IncludeAttachmentFilePatterns?: list<string>,
 *             ExcludeAttachmentFilePatterns?: list<string>,
 *             ...,
 *         },
 *         OneDriveConfiguration?: array{
 *             TenantDomain?: string,
 *             SecretArn?: string,
 *             OneDriveUsers?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             DisableLocalGroups?: bool,
 *             ...,
 *         },
 *         ServiceNowConfiguration?: array{
 *             HostUrl?: string,
 *             SecretArn?: string,
 *             ServiceNowBuildVersion?: 'LONDON'|'OTHERS',
 *             KnowledgeArticleConfiguration?: array,
 *             ServiceCatalogConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ...,
 *         },
 *         ConfluenceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             Version?: 'CLOUD'|'SERVER',
 *             SpaceConfiguration?: array,
 *             PageConfiguration?: array,
 *             BlogConfiguration?: array,
 *             AttachmentConfiguration?: array,
 *             VpcConfiguration?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'PAT',
 *             ...,
 *         },
 *         GoogleDriveConfiguration?: array{
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ExcludeMimeTypes?: list<string>,
 *             ExcludeUserAccounts?: list<string>,
 *             ExcludeSharedDrives?: list<string>,
 *             ...,
 *         },
 *         WebCrawlerConfiguration?: array{
 *             Urls?: array,
 *             CrawlDepth?: int,
 *             MaxLinksPerPage?: int,
 *             MaxContentSizePerPageInMegaBytes?: float,
 *             MaxUrlsPerMinuteCrawlRate?: int,
 *             UrlInclusionPatterns?: list<string>,
 *             UrlExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationConfiguration?: array,
 *             ...,
 *         },
 *         WorkDocsConfiguration?: array{
 *             OrganizationId?: string,
 *             CrawlComments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         FsxConfiguration?: array{
 *             FileSystemId?: string,
 *             FileSystemType?: 'WINDOWS',
 *             VpcConfiguration?: array,
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         SlackConfiguration?: array{
 *             TeamId?: string,
 *             SecretArn?: string,
 *             VpcConfiguration?: array,
 *             SlackEntityList?: list<'DIRECT_MESSAGE'|'GROUP_MESSAGE'|'PRIVATE_CHANNEL'|'PUBLIC_CHANNEL'>,
 *             UseChangeLog?: bool,
 *             CrawlBotMessage?: bool,
 *             ExcludeArchived?: bool,
 *             SinceCrawlDate?: string,
 *             LookBackPeriod?: int,
 *             PrivateChannelFilter?: list<string>,
 *             PublicChannelFilter?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         BoxConfiguration?: array{
 *             EnterpriseId?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             CrawlComments?: bool,
 *             CrawlTasks?: bool,
 *             CrawlWebLinks?: bool,
 *             FileFieldMappings?: list<array>,
 *             TaskFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             WebLinkFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         QuipConfiguration?: array{
 *             Domain?: string,
 *             SecretArn?: string,
 *             CrawlFileComments?: bool,
 *             CrawlChatRooms?: bool,
 *             CrawlAttachments?: bool,
 *             FolderIds?: list<string>,
 *             ThreadFieldMappings?: list<array>,
 *             MessageFieldMappings?: list<array>,
 *             AttachmentFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         JiraConfiguration?: array{
 *             JiraAccountUrl?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             Project?: list<string>,
 *             IssueType?: list<string>,
 *             Status?: list<string>,
 *             IssueSubEntityFilter?: list<'ATTACHMENTS'|'COMMENTS'|'WORKLOGS'>,
 *             AttachmentFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             IssueFieldMappings?: list<array>,
 *             ProjectFieldMappings?: list<array>,
 *             WorkLogFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         GitHubConfiguration?: array{
 *             SaaSConfiguration?: array,
 *             OnPremiseConfiguration?: array,
 *             Type?: 'ON_PREMISE'|'SAAS',
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             GitHubDocumentCrawlProperties?: array,
 *             RepositoryFilter?: list<string>,
 *             InclusionFolderNamePatterns?: list<string>,
 *             InclusionFileTypePatterns?: list<string>,
 *             InclusionFileNamePatterns?: list<string>,
 *             ExclusionFolderNamePatterns?: list<string>,
 *             ExclusionFileTypePatterns?: list<string>,
 *             ExclusionFileNamePatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             GitHubRepositoryConfigurationFieldMappings?: list<array>,
 *             GitHubCommitConfigurationFieldMappings?: list<array>,
 *             GitHubIssueDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueCommentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueAttachmentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestCommentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentAttachmentConfigurationFieldMappings?: list<array>,
 *             ...,
 *         },
 *         AlfrescoConfiguration?: array{
 *             SiteUrl?: string,
 *             SiteId?: string,
 *             SecretArn?: string,
 *             SslCertificateS3Path?: array,
 *             CrawlSystemFolders?: bool,
 *             CrawlComments?: bool,
 *             EntityFilter?: list<'blog'|'documentLibrary'|'wiki'>,
 *             DocumentLibraryFieldMappings?: list<array>,
 *             BlogFieldMappings?: list<array>,
 *             WikiFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{Template?: array, ...},
 *         ...,
 *     },
 *     VpcConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     Description?: string,
 *     Schedule?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     LanguageCode?: string,
 *     CustomDocumentEnrichmentConfiguration?: array{
 *         InlineConfigurations?: list<array>,
 *         PreExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         PostExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         RoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExperience(array $args = [])
 * @phpstan-method \Aws\Result createExperience(array{
 *     Name?: string,
 *     IndexId?: string,
 *     RoleArn?: string,
 *     Configuration?: array{
 *         ContentSourceConfiguration?: array{DataSourceIds?: list<string>, FaqIds?: list<string>, DirectPutContent?: bool, ...},
 *         UserIdentityConfiguration?: array{IdentityAttributeName?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExperienceAsync(array{
 *     Name?: string,
 *     IndexId?: string,
 *     RoleArn?: string,
 *     Configuration?: array{
 *         ContentSourceConfiguration?: array{DataSourceIds?: list<string>, FaqIds?: list<string>, DirectPutContent?: bool, ...},
 *         UserIdentityConfiguration?: array{IdentityAttributeName?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFaq(array $args = [])
 * @phpstan-method \Aws\Result createFaq(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     S3Path?: array{Bucket?: string, Key?: string, ...},
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileFormat?: 'CSV'|'CSV_WITH_HEADER'|'JSON',
 *     ClientToken?: string,
 *     LanguageCode?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFaqAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFaqAsync(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     S3Path?: array{Bucket?: string, Key?: string, ...},
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileFormat?: 'CSV'|'CSV_WITH_HEADER'|'JSON',
 *     ClientToken?: string,
 *     LanguageCode?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFeaturedResultsSet(array $args = [])
 * @phpstan-method \Aws\Result createFeaturedResultsSet(array{
 *     IndexId?: string,
 *     FeaturedResultsSetName?: string,
 *     Description?: string,
 *     ClientToken?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     QueryTexts?: list<string>,
 *     FeaturedDocuments?: list<array{Id?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFeaturedResultsSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFeaturedResultsSetAsync(array{
 *     IndexId?: string,
 *     FeaturedResultsSetName?: string,
 *     Description?: string,
 *     ClientToken?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     QueryTexts?: list<string>,
 *     FeaturedDocuments?: list<array{Id?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIndex(array $args = [])
 * @phpstan-method \Aws\Result createIndex(array{
 *     Name?: string,
 *     Edition?: 'DEVELOPER_EDITION'|'ENTERPRISE_EDITION'|'GEN_AI_ENTERPRISE_EDITION',
 *     RoleArn?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyId?: string, ...},
 *     Description?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserTokenConfigurations?: list<array{JwtTokenTypeConfiguration?: array, JsonTokenTypeConfiguration?: array, ...}>,
 *     UserContextPolicy?: 'ATTRIBUTE_FILTER'|'USER_TOKEN',
 *     UserGroupResolutionConfiguration?: array{UserGroupResolutionMode?: 'AWS_SSO'|'NONE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIndexAsync(array{
 *     Name?: string,
 *     Edition?: 'DEVELOPER_EDITION'|'ENTERPRISE_EDITION'|'GEN_AI_ENTERPRISE_EDITION',
 *     RoleArn?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyId?: string, ...},
 *     Description?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserTokenConfigurations?: list<array{JwtTokenTypeConfiguration?: array, JsonTokenTypeConfiguration?: array, ...}>,
 *     UserContextPolicy?: 'ATTRIBUTE_FILTER'|'USER_TOKEN',
 *     UserGroupResolutionConfiguration?: array{UserGroupResolutionMode?: 'AWS_SSO'|'NONE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuerySuggestionsBlockList(array $args = [])
 * @phpstan-method \Aws\Result createQuerySuggestionsBlockList(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     ClientToken?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuerySuggestionsBlockListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuerySuggestionsBlockListAsync(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     ClientToken?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThesaurus(array $args = [])
 * @phpstan-method \Aws\Result createThesaurus(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThesaurusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThesaurusAsync(array{
 *     IndexId?: string,
 *     Name?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessControlConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessControlConfiguration(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessControlConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessControlConfigurationAsync(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result deleteExperience(array $args = [])
 * @phpstan-method \Aws\Result deleteExperience(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExperienceAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result deleteFaq(array $args = [])
 * @phpstan-method \Aws\Result deleteFaq(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFaqAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFaqAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result deleteIndex(array $args = [])
 * @phpstan-method \Aws\Result deleteIndex(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deletePrincipalMapping(array $args = [])
 * @phpstan-method \Aws\Result deletePrincipalMapping(array{IndexId?: string, DataSourceId?: string, GroupId?: string, OrderingId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePrincipalMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePrincipalMappingAsync(array{IndexId?: string, DataSourceId?: string, GroupId?: string, OrderingId?: int, ...} $args = [])
 * @method \Aws\Result deleteQuerySuggestionsBlockList(array $args = [])
 * @phpstan-method \Aws\Result deleteQuerySuggestionsBlockList(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuerySuggestionsBlockListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuerySuggestionsBlockListAsync(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result deleteThesaurus(array $args = [])
 * @phpstan-method \Aws\Result deleteThesaurus(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThesaurusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThesaurusAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result describeAccessControlConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeAccessControlConfiguration(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccessControlConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccessControlConfigurationAsync(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result describeDataSource(array $args = [])
 * @phpstan-method \Aws\Result describeDataSource(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataSourceAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result describeExperience(array $args = [])
 * @phpstan-method \Aws\Result describeExperience(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExperienceAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result describeFaq(array $args = [])
 * @phpstan-method \Aws\Result describeFaq(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFaqAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFaqAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result describeFeaturedResultsSet(array $args = [])
 * @phpstan-method \Aws\Result describeFeaturedResultsSet(array{IndexId?: string, FeaturedResultsSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFeaturedResultsSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFeaturedResultsSetAsync(array{IndexId?: string, FeaturedResultsSetId?: string, ...} $args = [])
 * @method \Aws\Result describeIndex(array $args = [])
 * @phpstan-method \Aws\Result describeIndex(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIndexAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describePrincipalMapping(array $args = [])
 * @phpstan-method \Aws\Result describePrincipalMapping(array{IndexId?: string, DataSourceId?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePrincipalMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePrincipalMappingAsync(array{IndexId?: string, DataSourceId?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result describeQuerySuggestionsBlockList(array $args = [])
 * @phpstan-method \Aws\Result describeQuerySuggestionsBlockList(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQuerySuggestionsBlockListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQuerySuggestionsBlockListAsync(array{IndexId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result describeQuerySuggestionsConfig(array $args = [])
 * @phpstan-method \Aws\Result describeQuerySuggestionsConfig(array{IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQuerySuggestionsConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQuerySuggestionsConfigAsync(array{IndexId?: string, ...} $args = [])
 * @method \Aws\Result describeThesaurus(array $args = [])
 * @phpstan-method \Aws\Result describeThesaurus(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThesaurusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThesaurusAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result disassociateEntitiesFromExperience(array $args = [])
 * @phpstan-method \Aws\Result disassociateEntitiesFromExperience(array{
 *     Id?: string,
 *     IndexId?: string,
 *     EntityList?: list<array{EntityId?: string, EntityType?: 'GROUP'|'USER', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateEntitiesFromExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateEntitiesFromExperienceAsync(array{
 *     Id?: string,
 *     IndexId?: string,
 *     EntityList?: list<array{EntityId?: string, EntityType?: 'GROUP'|'USER', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociatePersonasFromEntities(array $args = [])
 * @phpstan-method \Aws\Result disassociatePersonasFromEntities(array{Id?: string, IndexId?: string, EntityIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePersonasFromEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePersonasFromEntitiesAsync(array{Id?: string, IndexId?: string, EntityIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getQuerySuggestions(array $args = [])
 * @phpstan-method \Aws\Result getQuerySuggestions(array{
 *     IndexId?: string,
 *     QueryText?: string,
 *     MaxSuggestionsCount?: int,
 *     SuggestionTypes?: list<'DOCUMENT_ATTRIBUTES'|'QUERY'>,
 *     AttributeSuggestionsConfig?: array{
 *         SuggestionAttributes?: list<string>,
 *         AdditionalResponseAttributes?: list<string>,
 *         AttributeFilter?: array{
 *             AndAllFilters?: list<array>,
 *             OrAllFilters?: list<array>,
 *             NotFilter?: array,
 *             EqualsTo?: array,
 *             ContainsAll?: array,
 *             ContainsAny?: array,
 *             GreaterThan?: array,
 *             GreaterThanOrEquals?: array,
 *             LessThan?: array,
 *             LessThanOrEquals?: array,
 *             ...,
 *         },
 *         UserContext?: array{Token?: string, UserId?: string, Groups?: list<string>, DataSourceGroups?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getQuerySuggestionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQuerySuggestionsAsync(array{
 *     IndexId?: string,
 *     QueryText?: string,
 *     MaxSuggestionsCount?: int,
 *     SuggestionTypes?: list<'DOCUMENT_ATTRIBUTES'|'QUERY'>,
 *     AttributeSuggestionsConfig?: array{
 *         SuggestionAttributes?: list<string>,
 *         AdditionalResponseAttributes?: list<string>,
 *         AttributeFilter?: array{
 *             AndAllFilters?: list<array>,
 *             OrAllFilters?: list<array>,
 *             NotFilter?: array,
 *             EqualsTo?: array,
 *             ContainsAll?: array,
 *             ContainsAny?: array,
 *             GreaterThan?: array,
 *             GreaterThanOrEquals?: array,
 *             LessThan?: array,
 *             LessThanOrEquals?: array,
 *             ...,
 *         },
 *         UserContext?: array{Token?: string, UserId?: string, Groups?: list<string>, DataSourceGroups?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSnapshots(array $args = [])
 * @phpstan-method \Aws\Result getSnapshots(array{
 *     IndexId?: string,
 *     Interval?: 'ONE_MONTH_AGO'|'ONE_WEEK_AGO'|'THIS_MONTH'|'THIS_WEEK'|'TWO_MONTHS_AGO'|'TWO_WEEKS_AGO',
 *     MetricType?: 'AGG_QUERY_DOC_METRICS'|'DOCS_BY_CLICK_COUNT'|'QUERIES_BY_COUNT'|'QUERIES_BY_ZERO_CLICK_RATE'|'QUERIES_BY_ZERO_RESULT_RATE'|'TREND_QUERY_DOC_METRICS',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSnapshotsAsync(array{
 *     IndexId?: string,
 *     Interval?: 'ONE_MONTH_AGO'|'ONE_WEEK_AGO'|'THIS_MONTH'|'THIS_WEEK'|'TWO_MONTHS_AGO'|'TWO_WEEKS_AGO',
 *     MetricType?: 'AGG_QUERY_DOC_METRICS'|'DOCS_BY_CLICK_COUNT'|'QUERIES_BY_COUNT'|'QUERIES_BY_ZERO_CLICK_RATE'|'QUERIES_BY_ZERO_RESULT_RATE'|'TREND_QUERY_DOC_METRICS',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccessControlConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listAccessControlConfigurations(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessControlConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessControlConfigurationsAsync(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataSourceSyncJobs(array $args = [])
 * @phpstan-method \Aws\Result listDataSourceSyncJobs(array{
 *     Id?: string,
 *     IndexId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTimeFilter?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     StatusFilter?: 'ABORTED'|'FAILED'|'INCOMPLETE'|'STOPPING'|'SUCCEEDED'|'SYNCING'|'SYNCING_INDEXING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourceSyncJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourceSyncJobsAsync(array{
 *     Id?: string,
 *     IndexId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTimeFilter?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     StatusFilter?: 'ABORTED'|'FAILED'|'INCOMPLETE'|'STOPPING'|'SUCCEEDED'|'SYNCING'|'SYNCING_INDEXING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDataSources(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEntityPersonas(array $args = [])
 * @phpstan-method \Aws\Result listEntityPersonas(array{Id?: string, IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityPersonasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntityPersonasAsync(array{Id?: string, IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listExperienceEntities(array $args = [])
 * @phpstan-method \Aws\Result listExperienceEntities(array{Id?: string, IndexId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperienceEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperienceEntitiesAsync(array{Id?: string, IndexId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listExperiences(array $args = [])
 * @phpstan-method \Aws\Result listExperiences(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperiencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperiencesAsync(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFaqs(array $args = [])
 * @phpstan-method \Aws\Result listFaqs(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFaqsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFaqsAsync(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFeaturedResultsSets(array $args = [])
 * @phpstan-method \Aws\Result listFeaturedResultsSets(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFeaturedResultsSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFeaturedResultsSetsAsync(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listGroupsOlderThanOrderingId(array $args = [])
 * @phpstan-method \Aws\Result listGroupsOlderThanOrderingId(array{IndexId?: string, DataSourceId?: string, OrderingId?: int, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsOlderThanOrderingIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsOlderThanOrderingIdAsync(array{IndexId?: string, DataSourceId?: string, OrderingId?: int, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIndices(array $args = [])
 * @phpstan-method \Aws\Result listIndices(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndicesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQuerySuggestionsBlockLists(array $args = [])
 * @phpstan-method \Aws\Result listQuerySuggestionsBlockLists(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuerySuggestionsBlockListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuerySuggestionsBlockListsAsync(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listThesauri(array $args = [])
 * @phpstan-method \Aws\Result listThesauri(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThesauriAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThesauriAsync(array{IndexId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result putPrincipalMapping(array $args = [])
 * @phpstan-method \Aws\Result putPrincipalMapping(array{
 *     IndexId?: string,
 *     DataSourceId?: string,
 *     GroupId?: string,
 *     GroupMembers?: array{
 *         MemberGroups?: list<array>,
 *         MemberUsers?: list<array>,
 *         S3PathforGroupMembers?: array{Bucket?: string, Key?: string, ...},
 *         ...,
 *     },
 *     OrderingId?: int,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPrincipalMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPrincipalMappingAsync(array{
 *     IndexId?: string,
 *     DataSourceId?: string,
 *     GroupId?: string,
 *     GroupMembers?: array{
 *         MemberGroups?: list<array>,
 *         MemberUsers?: list<array>,
 *         S3PathforGroupMembers?: array{Bucket?: string, Key?: string, ...},
 *         ...,
 *     },
 *     OrderingId?: int,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result query(array $args = [])
 * @phpstan-method \Aws\Result query(array{
 *     IndexId?: string,
 *     QueryText?: string,
 *     AttributeFilter?: array{
 *         AndAllFilters?: list<array>,
 *         OrAllFilters?: list<array>,
 *         NotFilter?: array,
 *         EqualsTo?: array{Key?: string, Value?: array, ...},
 *         ContainsAll?: array{Key?: string, Value?: array, ...},
 *         ContainsAny?: array{Key?: string, Value?: array, ...},
 *         GreaterThan?: array{Key?: string, Value?: array, ...},
 *         GreaterThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         LessThan?: array{Key?: string, Value?: array, ...},
 *         LessThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         ...,
 *     },
 *     Facets?: list<array{DocumentAttributeKey?: string, Facets?: list<array>, MaxResults?: int, ...}>,
 *     RequestedDocumentAttributes?: list<string>,
 *     QueryResultTypeFilter?: 'ANSWER'|'DOCUMENT'|'QUESTION_ANSWER',
 *     DocumentRelevanceOverrideConfigurations?: list<array{Name?: string, Relevance?: array, ...}>,
 *     PageNumber?: int,
 *     PageSize?: int,
 *     SortingConfiguration?: array{DocumentAttributeKey?: string, SortOrder?: 'ASC'|'DESC', ...},
 *     SortingConfigurations?: list<array{DocumentAttributeKey?: string, SortOrder?: 'ASC'|'DESC', ...}>,
 *     UserContext?: array{Token?: string, UserId?: string, Groups?: list<string>, DataSourceGroups?: list<array>, ...},
 *     VisitorId?: string,
 *     SpellCorrectionConfiguration?: array{IncludeQuerySpellCheckSuggestions?: bool, ...},
 *     CollapseConfiguration?: array{
 *         DocumentAttributeKey?: string,
 *         SortingConfigurations?: list<array>,
 *         MissingAttributeKeyStrategy?: 'COLLAPSE'|'EXPAND'|'IGNORE',
 *         Expand?: bool,
 *         ExpandConfiguration?: array{MaxResultItemsToExpand?: int, MaxExpandedResultsPerItem?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryAsync(array{
 *     IndexId?: string,
 *     QueryText?: string,
 *     AttributeFilter?: array{
 *         AndAllFilters?: list<array>,
 *         OrAllFilters?: list<array>,
 *         NotFilter?: array,
 *         EqualsTo?: array{Key?: string, Value?: array, ...},
 *         ContainsAll?: array{Key?: string, Value?: array, ...},
 *         ContainsAny?: array{Key?: string, Value?: array, ...},
 *         GreaterThan?: array{Key?: string, Value?: array, ...},
 *         GreaterThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         LessThan?: array{Key?: string, Value?: array, ...},
 *         LessThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         ...,
 *     },
 *     Facets?: list<array{DocumentAttributeKey?: string, Facets?: list<array>, MaxResults?: int, ...}>,
 *     RequestedDocumentAttributes?: list<string>,
 *     QueryResultTypeFilter?: 'ANSWER'|'DOCUMENT'|'QUESTION_ANSWER',
 *     DocumentRelevanceOverrideConfigurations?: list<array{Name?: string, Relevance?: array, ...}>,
 *     PageNumber?: int,
 *     PageSize?: int,
 *     SortingConfiguration?: array{DocumentAttributeKey?: string, SortOrder?: 'ASC'|'DESC', ...},
 *     SortingConfigurations?: list<array{DocumentAttributeKey?: string, SortOrder?: 'ASC'|'DESC', ...}>,
 *     UserContext?: array{Token?: string, UserId?: string, Groups?: list<string>, DataSourceGroups?: list<array>, ...},
 *     VisitorId?: string,
 *     SpellCorrectionConfiguration?: array{IncludeQuerySpellCheckSuggestions?: bool, ...},
 *     CollapseConfiguration?: array{
 *         DocumentAttributeKey?: string,
 *         SortingConfigurations?: list<array>,
 *         MissingAttributeKeyStrategy?: 'COLLAPSE'|'EXPAND'|'IGNORE',
 *         Expand?: bool,
 *         ExpandConfiguration?: array{MaxResultItemsToExpand?: int, MaxExpandedResultsPerItem?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result retrieve(array $args = [])
 * @phpstan-method \Aws\Result retrieve(array{
 *     IndexId?: string,
 *     QueryText?: string,
 *     AttributeFilter?: array{
 *         AndAllFilters?: list<array>,
 *         OrAllFilters?: list<array>,
 *         NotFilter?: array,
 *         EqualsTo?: array{Key?: string, Value?: array, ...},
 *         ContainsAll?: array{Key?: string, Value?: array, ...},
 *         ContainsAny?: array{Key?: string, Value?: array, ...},
 *         GreaterThan?: array{Key?: string, Value?: array, ...},
 *         GreaterThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         LessThan?: array{Key?: string, Value?: array, ...},
 *         LessThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         ...,
 *     },
 *     RequestedDocumentAttributes?: list<string>,
 *     DocumentRelevanceOverrideConfigurations?: list<array{Name?: string, Relevance?: array, ...}>,
 *     PageNumber?: int,
 *     PageSize?: int,
 *     UserContext?: array{Token?: string, UserId?: string, Groups?: list<string>, DataSourceGroups?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveAsync(array{
 *     IndexId?: string,
 *     QueryText?: string,
 *     AttributeFilter?: array{
 *         AndAllFilters?: list<array>,
 *         OrAllFilters?: list<array>,
 *         NotFilter?: array,
 *         EqualsTo?: array{Key?: string, Value?: array, ...},
 *         ContainsAll?: array{Key?: string, Value?: array, ...},
 *         ContainsAny?: array{Key?: string, Value?: array, ...},
 *         GreaterThan?: array{Key?: string, Value?: array, ...},
 *         GreaterThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         LessThan?: array{Key?: string, Value?: array, ...},
 *         LessThanOrEquals?: array{Key?: string, Value?: array, ...},
 *         ...,
 *     },
 *     RequestedDocumentAttributes?: list<string>,
 *     DocumentRelevanceOverrideConfigurations?: list<array{Name?: string, Relevance?: array, ...}>,
 *     PageNumber?: int,
 *     PageSize?: int,
 *     UserContext?: array{Token?: string, UserId?: string, Groups?: list<string>, DataSourceGroups?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDataSourceSyncJob(array $args = [])
 * @phpstan-method \Aws\Result startDataSourceSyncJob(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataSourceSyncJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataSourceSyncJobAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result stopDataSourceSyncJob(array $args = [])
 * @phpstan-method \Aws\Result stopDataSourceSyncJob(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDataSourceSyncJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDataSourceSyncJobAsync(array{Id?: string, IndexId?: string, ...} $args = [])
 * @method \Aws\Result submitFeedback(array $args = [])
 * @phpstan-method \Aws\Result submitFeedback(array{
 *     IndexId?: string,
 *     QueryId?: string,
 *     ClickFeedbackItems?: list<array{ResultId?: string, ClickTime?: int|string|\DateTimeInterface, ...}>,
 *     RelevanceFeedbackItems?: list<array{ResultId?: string, RelevanceValue?: 'NOT_RELEVANT'|'RELEVANT', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitFeedbackAsync(array{
 *     IndexId?: string,
 *     QueryId?: string,
 *     ClickFeedbackItems?: list<array{ResultId?: string, ClickTime?: int|string|\DateTimeInterface, ...}>,
 *     RelevanceFeedbackItems?: list<array{ResultId?: string, RelevanceValue?: 'NOT_RELEVANT'|'RELEVANT', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccessControlConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAccessControlConfiguration(array{
 *     IndexId?: string,
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     AccessControlList?: list<array{Name?: string, Type?: 'GROUP'|'USER', Access?: 'ALLOW'|'DENY', DataSourceId?: string, ...}>,
 *     HierarchicalAccessControlList?: list<array{PrincipalList?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessControlConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessControlConfigurationAsync(array{
 *     IndexId?: string,
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     AccessControlList?: list<array{Name?: string, Type?: 'GROUP'|'USER', Access?: 'ALLOW'|'DENY', DataSourceId?: string, ...}>,
 *     HierarchicalAccessControlList?: list<array{PrincipalList?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{
 *     Id?: string,
 *     Name?: string,
 *     IndexId?: string,
 *     Configuration?: array{
 *         S3Configuration?: array{
 *             BucketName?: string,
 *             InclusionPrefixes?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             DocumentsMetadataConfiguration?: array,
 *             AccessControlListConfiguration?: array,
 *             ...,
 *         },
 *         SharePointConfiguration?: array{
 *             SharePointVersion?: 'SHAREPOINT_2013'|'SHAREPOINT_2016'|'SHAREPOINT_2019'|'SHAREPOINT_ONLINE',
 *             Urls?: list<string>,
 *             SecretArn?: string,
 *             CrawlAttachments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             FieldMappings?: list<array>,
 *             DocumentTitleFieldName?: string,
 *             DisableLocalGroups?: bool,
 *             SslCertificateS3Path?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ProxyConfiguration?: array,
 *             ...,
 *         },
 *         DatabaseConfiguration?: array{
 *             DatabaseEngineType?: 'RDS_AURORA_MYSQL'|'RDS_AURORA_POSTGRESQL'|'RDS_MYSQL'|'RDS_POSTGRESQL',
 *             ConnectionConfiguration?: array,
 *             VpcConfiguration?: array,
 *             ColumnConfiguration?: array,
 *             AclConfiguration?: array,
 *             SqlConfiguration?: array,
 *             ...,
 *         },
 *         SalesforceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             StandardObjectConfigurations?: list<array>,
 *             KnowledgeArticleConfiguration?: array,
 *             ChatterFeedConfiguration?: array,
 *             CrawlAttachments?: bool,
 *             StandardObjectAttachmentConfiguration?: array,
 *             IncludeAttachmentFilePatterns?: list<string>,
 *             ExcludeAttachmentFilePatterns?: list<string>,
 *             ...,
 *         },
 *         OneDriveConfiguration?: array{
 *             TenantDomain?: string,
 *             SecretArn?: string,
 *             OneDriveUsers?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             DisableLocalGroups?: bool,
 *             ...,
 *         },
 *         ServiceNowConfiguration?: array{
 *             HostUrl?: string,
 *             SecretArn?: string,
 *             ServiceNowBuildVersion?: 'LONDON'|'OTHERS',
 *             KnowledgeArticleConfiguration?: array,
 *             ServiceCatalogConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ...,
 *         },
 *         ConfluenceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             Version?: 'CLOUD'|'SERVER',
 *             SpaceConfiguration?: array,
 *             PageConfiguration?: array,
 *             BlogConfiguration?: array,
 *             AttachmentConfiguration?: array,
 *             VpcConfiguration?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'PAT',
 *             ...,
 *         },
 *         GoogleDriveConfiguration?: array{
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ExcludeMimeTypes?: list<string>,
 *             ExcludeUserAccounts?: list<string>,
 *             ExcludeSharedDrives?: list<string>,
 *             ...,
 *         },
 *         WebCrawlerConfiguration?: array{
 *             Urls?: array,
 *             CrawlDepth?: int,
 *             MaxLinksPerPage?: int,
 *             MaxContentSizePerPageInMegaBytes?: float,
 *             MaxUrlsPerMinuteCrawlRate?: int,
 *             UrlInclusionPatterns?: list<string>,
 *             UrlExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationConfiguration?: array,
 *             ...,
 *         },
 *         WorkDocsConfiguration?: array{
 *             OrganizationId?: string,
 *             CrawlComments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         FsxConfiguration?: array{
 *             FileSystemId?: string,
 *             FileSystemType?: 'WINDOWS',
 *             VpcConfiguration?: array,
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         SlackConfiguration?: array{
 *             TeamId?: string,
 *             SecretArn?: string,
 *             VpcConfiguration?: array,
 *             SlackEntityList?: list<'DIRECT_MESSAGE'|'GROUP_MESSAGE'|'PRIVATE_CHANNEL'|'PUBLIC_CHANNEL'>,
 *             UseChangeLog?: bool,
 *             CrawlBotMessage?: bool,
 *             ExcludeArchived?: bool,
 *             SinceCrawlDate?: string,
 *             LookBackPeriod?: int,
 *             PrivateChannelFilter?: list<string>,
 *             PublicChannelFilter?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         BoxConfiguration?: array{
 *             EnterpriseId?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             CrawlComments?: bool,
 *             CrawlTasks?: bool,
 *             CrawlWebLinks?: bool,
 *             FileFieldMappings?: list<array>,
 *             TaskFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             WebLinkFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         QuipConfiguration?: array{
 *             Domain?: string,
 *             SecretArn?: string,
 *             CrawlFileComments?: bool,
 *             CrawlChatRooms?: bool,
 *             CrawlAttachments?: bool,
 *             FolderIds?: list<string>,
 *             ThreadFieldMappings?: list<array>,
 *             MessageFieldMappings?: list<array>,
 *             AttachmentFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         JiraConfiguration?: array{
 *             JiraAccountUrl?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             Project?: list<string>,
 *             IssueType?: list<string>,
 *             Status?: list<string>,
 *             IssueSubEntityFilter?: list<'ATTACHMENTS'|'COMMENTS'|'WORKLOGS'>,
 *             AttachmentFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             IssueFieldMappings?: list<array>,
 *             ProjectFieldMappings?: list<array>,
 *             WorkLogFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         GitHubConfiguration?: array{
 *             SaaSConfiguration?: array,
 *             OnPremiseConfiguration?: array,
 *             Type?: 'ON_PREMISE'|'SAAS',
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             GitHubDocumentCrawlProperties?: array,
 *             RepositoryFilter?: list<string>,
 *             InclusionFolderNamePatterns?: list<string>,
 *             InclusionFileTypePatterns?: list<string>,
 *             InclusionFileNamePatterns?: list<string>,
 *             ExclusionFolderNamePatterns?: list<string>,
 *             ExclusionFileTypePatterns?: list<string>,
 *             ExclusionFileNamePatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             GitHubRepositoryConfigurationFieldMappings?: list<array>,
 *             GitHubCommitConfigurationFieldMappings?: list<array>,
 *             GitHubIssueDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueCommentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueAttachmentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestCommentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentAttachmentConfigurationFieldMappings?: list<array>,
 *             ...,
 *         },
 *         AlfrescoConfiguration?: array{
 *             SiteUrl?: string,
 *             SiteId?: string,
 *             SecretArn?: string,
 *             SslCertificateS3Path?: array,
 *             CrawlSystemFolders?: bool,
 *             CrawlComments?: bool,
 *             EntityFilter?: list<'blog'|'documentLibrary'|'wiki'>,
 *             DocumentLibraryFieldMappings?: list<array>,
 *             BlogFieldMappings?: list<array>,
 *             WikiFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{Template?: array, ...},
 *         ...,
 *     },
 *     VpcConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     Description?: string,
 *     Schedule?: string,
 *     RoleArn?: string,
 *     LanguageCode?: string,
 *     CustomDocumentEnrichmentConfiguration?: array{
 *         InlineConfigurations?: list<array>,
 *         PreExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         PostExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         RoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     IndexId?: string,
 *     Configuration?: array{
 *         S3Configuration?: array{
 *             BucketName?: string,
 *             InclusionPrefixes?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             DocumentsMetadataConfiguration?: array,
 *             AccessControlListConfiguration?: array,
 *             ...,
 *         },
 *         SharePointConfiguration?: array{
 *             SharePointVersion?: 'SHAREPOINT_2013'|'SHAREPOINT_2016'|'SHAREPOINT_2019'|'SHAREPOINT_ONLINE',
 *             Urls?: list<string>,
 *             SecretArn?: string,
 *             CrawlAttachments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             FieldMappings?: list<array>,
 *             DocumentTitleFieldName?: string,
 *             DisableLocalGroups?: bool,
 *             SslCertificateS3Path?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ProxyConfiguration?: array,
 *             ...,
 *         },
 *         DatabaseConfiguration?: array{
 *             DatabaseEngineType?: 'RDS_AURORA_MYSQL'|'RDS_AURORA_POSTGRESQL'|'RDS_MYSQL'|'RDS_POSTGRESQL',
 *             ConnectionConfiguration?: array,
 *             VpcConfiguration?: array,
 *             ColumnConfiguration?: array,
 *             AclConfiguration?: array,
 *             SqlConfiguration?: array,
 *             ...,
 *         },
 *         SalesforceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             StandardObjectConfigurations?: list<array>,
 *             KnowledgeArticleConfiguration?: array,
 *             ChatterFeedConfiguration?: array,
 *             CrawlAttachments?: bool,
 *             StandardObjectAttachmentConfiguration?: array,
 *             IncludeAttachmentFilePatterns?: list<string>,
 *             ExcludeAttachmentFilePatterns?: list<string>,
 *             ...,
 *         },
 *         OneDriveConfiguration?: array{
 *             TenantDomain?: string,
 *             SecretArn?: string,
 *             OneDriveUsers?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             DisableLocalGroups?: bool,
 *             ...,
 *         },
 *         ServiceNowConfiguration?: array{
 *             HostUrl?: string,
 *             SecretArn?: string,
 *             ServiceNowBuildVersion?: 'LONDON'|'OTHERS',
 *             KnowledgeArticleConfiguration?: array,
 *             ServiceCatalogConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'OAUTH2',
 *             ...,
 *         },
 *         ConfluenceConfiguration?: array{
 *             ServerUrl?: string,
 *             SecretArn?: string,
 *             Version?: 'CLOUD'|'SERVER',
 *             SpaceConfiguration?: array,
 *             PageConfiguration?: array,
 *             BlogConfiguration?: array,
 *             AttachmentConfiguration?: array,
 *             VpcConfiguration?: array,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationType?: 'HTTP_BASIC'|'PAT',
 *             ...,
 *         },
 *         GoogleDriveConfiguration?: array{
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ExcludeMimeTypes?: list<string>,
 *             ExcludeUserAccounts?: list<string>,
 *             ExcludeSharedDrives?: list<string>,
 *             ...,
 *         },
 *         WebCrawlerConfiguration?: array{
 *             Urls?: array,
 *             CrawlDepth?: int,
 *             MaxLinksPerPage?: int,
 *             MaxContentSizePerPageInMegaBytes?: float,
 *             MaxUrlsPerMinuteCrawlRate?: int,
 *             UrlInclusionPatterns?: list<string>,
 *             UrlExclusionPatterns?: list<string>,
 *             ProxyConfiguration?: array,
 *             AuthenticationConfiguration?: array,
 *             ...,
 *         },
 *         WorkDocsConfiguration?: array{
 *             OrganizationId?: string,
 *             CrawlComments?: bool,
 *             UseChangeLog?: bool,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         FsxConfiguration?: array{
 *             FileSystemId?: string,
 *             FileSystemType?: 'WINDOWS',
 *             VpcConfiguration?: array,
 *             SecretArn?: string,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         SlackConfiguration?: array{
 *             TeamId?: string,
 *             SecretArn?: string,
 *             VpcConfiguration?: array,
 *             SlackEntityList?: list<'DIRECT_MESSAGE'|'GROUP_MESSAGE'|'PRIVATE_CHANNEL'|'PUBLIC_CHANNEL'>,
 *             UseChangeLog?: bool,
 *             CrawlBotMessage?: bool,
 *             ExcludeArchived?: bool,
 *             SinceCrawlDate?: string,
 *             LookBackPeriod?: int,
 *             PrivateChannelFilter?: list<string>,
 *             PublicChannelFilter?: list<string>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             FieldMappings?: list<array>,
 *             ...,
 *         },
 *         BoxConfiguration?: array{
 *             EnterpriseId?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             CrawlComments?: bool,
 *             CrawlTasks?: bool,
 *             CrawlWebLinks?: bool,
 *             FileFieldMappings?: list<array>,
 *             TaskFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             WebLinkFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         QuipConfiguration?: array{
 *             Domain?: string,
 *             SecretArn?: string,
 *             CrawlFileComments?: bool,
 *             CrawlChatRooms?: bool,
 *             CrawlAttachments?: bool,
 *             FolderIds?: list<string>,
 *             ThreadFieldMappings?: list<array>,
 *             MessageFieldMappings?: list<array>,
 *             AttachmentFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         JiraConfiguration?: array{
 *             JiraAccountUrl?: string,
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             Project?: list<string>,
 *             IssueType?: list<string>,
 *             Status?: list<string>,
 *             IssueSubEntityFilter?: list<'ATTACHMENTS'|'COMMENTS'|'WORKLOGS'>,
 *             AttachmentFieldMappings?: list<array>,
 *             CommentFieldMappings?: list<array>,
 *             IssueFieldMappings?: list<array>,
 *             ProjectFieldMappings?: list<array>,
 *             WorkLogFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         GitHubConfiguration?: array{
 *             SaaSConfiguration?: array,
 *             OnPremiseConfiguration?: array,
 *             Type?: 'ON_PREMISE'|'SAAS',
 *             SecretArn?: string,
 *             UseChangeLog?: bool,
 *             GitHubDocumentCrawlProperties?: array,
 *             RepositoryFilter?: list<string>,
 *             InclusionFolderNamePatterns?: list<string>,
 *             InclusionFileTypePatterns?: list<string>,
 *             InclusionFileNamePatterns?: list<string>,
 *             ExclusionFolderNamePatterns?: list<string>,
 *             ExclusionFileTypePatterns?: list<string>,
 *             ExclusionFileNamePatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             GitHubRepositoryConfigurationFieldMappings?: list<array>,
 *             GitHubCommitConfigurationFieldMappings?: list<array>,
 *             GitHubIssueDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueCommentConfigurationFieldMappings?: list<array>,
 *             GitHubIssueAttachmentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestCommentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentConfigurationFieldMappings?: list<array>,
 *             GitHubPullRequestDocumentAttachmentConfigurationFieldMappings?: list<array>,
 *             ...,
 *         },
 *         AlfrescoConfiguration?: array{
 *             SiteUrl?: string,
 *             SiteId?: string,
 *             SecretArn?: string,
 *             SslCertificateS3Path?: array,
 *             CrawlSystemFolders?: bool,
 *             CrawlComments?: bool,
 *             EntityFilter?: list<'blog'|'documentLibrary'|'wiki'>,
 *             DocumentLibraryFieldMappings?: list<array>,
 *             BlogFieldMappings?: list<array>,
 *             WikiFieldMappings?: list<array>,
 *             InclusionPatterns?: list<string>,
 *             ExclusionPatterns?: list<string>,
 *             VpcConfiguration?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{Template?: array, ...},
 *         ...,
 *     },
 *     VpcConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     Description?: string,
 *     Schedule?: string,
 *     RoleArn?: string,
 *     LanguageCode?: string,
 *     CustomDocumentEnrichmentConfiguration?: array{
 *         InlineConfigurations?: list<array>,
 *         PreExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         PostExtractionHookConfiguration?: array{InvocationCondition?: array, LambdaArn?: string, S3Bucket?: string, ...},
 *         RoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExperience(array $args = [])
 * @phpstan-method \Aws\Result updateExperience(array{
 *     Id?: string,
 *     Name?: string,
 *     IndexId?: string,
 *     RoleArn?: string,
 *     Configuration?: array{
 *         ContentSourceConfiguration?: array{DataSourceIds?: list<string>, FaqIds?: list<string>, DirectPutContent?: bool, ...},
 *         UserIdentityConfiguration?: array{IdentityAttributeName?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExperienceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExperienceAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     IndexId?: string,
 *     RoleArn?: string,
 *     Configuration?: array{
 *         ContentSourceConfiguration?: array{DataSourceIds?: list<string>, FaqIds?: list<string>, DirectPutContent?: bool, ...},
 *         UserIdentityConfiguration?: array{IdentityAttributeName?: string, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFeaturedResultsSet(array $args = [])
 * @phpstan-method \Aws\Result updateFeaturedResultsSet(array{
 *     IndexId?: string,
 *     FeaturedResultsSetId?: string,
 *     FeaturedResultsSetName?: string,
 *     Description?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     QueryTexts?: list<string>,
 *     FeaturedDocuments?: list<array{Id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFeaturedResultsSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFeaturedResultsSetAsync(array{
 *     IndexId?: string,
 *     FeaturedResultsSetId?: string,
 *     FeaturedResultsSetName?: string,
 *     Description?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     QueryTexts?: list<string>,
 *     FeaturedDocuments?: list<array{Id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIndex(array $args = [])
 * @phpstan-method \Aws\Result updateIndex(array{
 *     Id?: string,
 *     Name?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     DocumentMetadataConfigurationUpdates?: list<array{
 *         Name?: string,
 *         Type?: 'DATE_VALUE'|'LONG_VALUE'|'STRING_LIST_VALUE'|'STRING_VALUE',
 *         Relevance?: array,
 *         Search?: array,
 *         ...,
 *     }>,
 *     CapacityUnits?: array{StorageCapacityUnits?: int, QueryCapacityUnits?: int, ...},
 *     UserTokenConfigurations?: list<array{JwtTokenTypeConfiguration?: array, JsonTokenTypeConfiguration?: array, ...}>,
 *     UserContextPolicy?: 'ATTRIBUTE_FILTER'|'USER_TOKEN',
 *     UserGroupResolutionConfiguration?: array{UserGroupResolutionMode?: 'AWS_SSO'|'NONE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIndexAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     DocumentMetadataConfigurationUpdates?: list<array{
 *         Name?: string,
 *         Type?: 'DATE_VALUE'|'LONG_VALUE'|'STRING_LIST_VALUE'|'STRING_VALUE',
 *         Relevance?: array,
 *         Search?: array,
 *         ...,
 *     }>,
 *     CapacityUnits?: array{StorageCapacityUnits?: int, QueryCapacityUnits?: int, ...},
 *     UserTokenConfigurations?: list<array{JwtTokenTypeConfiguration?: array, JsonTokenTypeConfiguration?: array, ...}>,
 *     UserContextPolicy?: 'ATTRIBUTE_FILTER'|'USER_TOKEN',
 *     UserGroupResolutionConfiguration?: array{UserGroupResolutionMode?: 'AWS_SSO'|'NONE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQuerySuggestionsBlockList(array $args = [])
 * @phpstan-method \Aws\Result updateQuerySuggestionsBlockList(array{
 *     IndexId?: string,
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuerySuggestionsBlockListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuerySuggestionsBlockListAsync(array{
 *     IndexId?: string,
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQuerySuggestionsConfig(array $args = [])
 * @phpstan-method \Aws\Result updateQuerySuggestionsConfig(array{
 *     IndexId?: string,
 *     Mode?: 'ENABLED'|'LEARN_ONLY',
 *     QueryLogLookBackWindowInDays?: int,
 *     IncludeQueriesWithoutUserInformation?: bool,
 *     MinimumNumberOfQueryingUsers?: int,
 *     MinimumQueryCount?: int,
 *     AttributeSuggestionsConfig?: array{SuggestableConfigList?: list<array>, AttributeSuggestionsMode?: 'ACTIVE'|'INACTIVE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuerySuggestionsConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuerySuggestionsConfigAsync(array{
 *     IndexId?: string,
 *     Mode?: 'ENABLED'|'LEARN_ONLY',
 *     QueryLogLookBackWindowInDays?: int,
 *     IncludeQueriesWithoutUserInformation?: bool,
 *     MinimumNumberOfQueryingUsers?: int,
 *     MinimumQueryCount?: int,
 *     AttributeSuggestionsConfig?: array{SuggestableConfigList?: list<array>, AttributeSuggestionsMode?: 'ACTIVE'|'INACTIVE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThesaurus(array $args = [])
 * @phpstan-method \Aws\Result updateThesaurus(array{
 *     Id?: string,
 *     Name?: string,
 *     IndexId?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThesaurusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThesaurusAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     IndexId?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     SourceS3Path?: array{Bucket?: string, Key?: string, ...},
 *     ...,
 * } $args = [])
 */
class kendraClient extends AwsClient {}
