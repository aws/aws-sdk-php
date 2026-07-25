<?php
namespace Aws\CustomerProfiles;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Customer Profiles** service.
 * @method \Aws\Result addProfileKey(array $args = [])
 * @phpstan-method \Aws\Result addProfileKey(array{ProfileId?: string, KeyName?: string, Values?: list<string>, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addProfileKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addProfileKeyAsync(array{ProfileId?: string, KeyName?: string, Values?: list<string>, DomainName?: string, ...} $args = [])
 * @method \Aws\Result batchGetCalculatedAttributeForProfile(array $args = [])
 * @phpstan-method \Aws\Result batchGetCalculatedAttributeForProfile(array{
 *     CalculatedAttributeName?: string,
 *     DomainName?: string,
 *     ProfileIds?: list<string>,
 *     ConditionOverrides?: array{Range?: array{Start?: int, End?: int, Unit?: 'DAYS', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCalculatedAttributeForProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCalculatedAttributeForProfileAsync(array{
 *     CalculatedAttributeName?: string,
 *     DomainName?: string,
 *     ProfileIds?: list<string>,
 *     ConditionOverrides?: array{Range?: array{Start?: int, End?: int, Unit?: 'DAYS', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetProfile(array $args = [])
 * @phpstan-method \Aws\Result batchGetProfile(array{DomainName?: string, ProfileIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetProfileAsync(array{DomainName?: string, ProfileIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchPutProfileObject(array $args = [])
 * @phpstan-method \Aws\Result batchPutProfileObject(array{
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     Items?: list<array{Id?: string, Object?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutProfileObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutProfileObjectAsync(array{
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     Items?: list<array{Id?: string, Object?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCalculatedAttributeDefinition(array $args = [])
 * @phpstan-method \Aws\Result createCalculatedAttributeDefinition(array{
 *     DomainName?: string,
 *     CalculatedAttributeName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     AttributeDetails?: array{Attributes?: list<array>, Expression?: string, ...},
 *     Conditions?: array{
 *         Range?: array{Value?: int, Unit?: 'DAYS', ValueRange?: array, TimestampSource?: string, TimestampFormat?: string, ...},
 *         ObjectCount?: int,
 *         Threshold?: array{Value?: string, Operator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL_TO', ...},
 *         ...,
 *     },
 *     Filter?: array{Include?: 'ALL'|'ANY'|'NONE', Groups?: list<array>, ...},
 *     Statistic?: 'AVERAGE'|'COUNT'|'FIRST_OCCURRENCE'|'LAST_OCCURRENCE'|'MAXIMUM'|'MAX_OCCURRENCE'|'MINIMUM'|'SUM',
 *     UseHistoricalData?: bool,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCalculatedAttributeDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCalculatedAttributeDefinitionAsync(array{
 *     DomainName?: string,
 *     CalculatedAttributeName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     AttributeDetails?: array{Attributes?: list<array>, Expression?: string, ...},
 *     Conditions?: array{
 *         Range?: array{Value?: int, Unit?: 'DAYS', ValueRange?: array, TimestampSource?: string, TimestampFormat?: string, ...},
 *         ObjectCount?: int,
 *         Threshold?: array{Value?: string, Operator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL_TO', ...},
 *         ...,
 *     },
 *     Filter?: array{Include?: 'ALL'|'ANY'|'NONE', Groups?: list<array>, ...},
 *     Statistic?: 'AVERAGE'|'COUNT'|'FIRST_OCCURRENCE'|'LAST_OCCURRENCE'|'MAXIMUM'|'MAX_OCCURRENCE'|'MINIMUM'|'SUM',
 *     UseHistoricalData?: bool,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{
 *     DomainName?: string,
 *     DefaultExpirationDays?: int,
 *     DefaultEncryptionKey?: string,
 *     DeadLetterQueueUrl?: string,
 *     Matching?: array{
 *         Enabled?: bool,
 *         JobSchedule?: array{
 *             DayOfTheWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             Time?: string,
 *             ...,
 *         },
 *         AutoMerging?: array{
 *             Enabled?: bool,
 *             Consolidation?: array,
 *             ConflictResolution?: array,
 *             MinAllowedConfidenceScoreForMerging?: float,
 *             ...,
 *         },
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     RuleBasedMatching?: array{
 *         Enabled?: bool,
 *         MatchingRules?: list<array>,
 *         MaxAllowedRuleLevelForMerging?: int,
 *         MaxAllowedRuleLevelForMatching?: int,
 *         AttributeTypesSelector?: array{
 *             AttributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             Address?: list<string>,
 *             PhoneNumber?: list<string>,
 *             EmailAddress?: list<string>,
 *             ...,
 *         },
 *         ConflictResolution?: array{ConflictResolvingModel?: 'RECENCY'|'SOURCE', SourceName?: string, ...},
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     DataStore?: array{Enabled?: bool, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{
 *     DomainName?: string,
 *     DefaultExpirationDays?: int,
 *     DefaultEncryptionKey?: string,
 *     DeadLetterQueueUrl?: string,
 *     Matching?: array{
 *         Enabled?: bool,
 *         JobSchedule?: array{
 *             DayOfTheWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             Time?: string,
 *             ...,
 *         },
 *         AutoMerging?: array{
 *             Enabled?: bool,
 *             Consolidation?: array,
 *             ConflictResolution?: array,
 *             MinAllowedConfidenceScoreForMerging?: float,
 *             ...,
 *         },
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     RuleBasedMatching?: array{
 *         Enabled?: bool,
 *         MatchingRules?: list<array>,
 *         MaxAllowedRuleLevelForMerging?: int,
 *         MaxAllowedRuleLevelForMatching?: int,
 *         AttributeTypesSelector?: array{
 *             AttributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             Address?: list<string>,
 *             PhoneNumber?: list<string>,
 *             EmailAddress?: list<string>,
 *             ...,
 *         },
 *         ConflictResolution?: array{ConflictResolvingModel?: 'RECENCY'|'SOURCE', SourceName?: string, ...},
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     DataStore?: array{Enabled?: bool, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomainLayout(array $args = [])
 * @phpstan-method \Aws\Result createDomainLayout(array{
 *     DomainName?: string,
 *     LayoutDefinitionName?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     IsDefault?: bool,
 *     LayoutType?: 'PROFILE_EXPLORER',
 *     Layout?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainLayoutAsync(array{
 *     DomainName?: string,
 *     LayoutDefinitionName?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     IsDefault?: bool,
 *     LayoutType?: 'PROFILE_EXPLORER',
 *     Layout?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventStream(array $args = [])
 * @phpstan-method \Aws\Result createEventStream(array{DomainName?: string, Uri?: string, EventStreamName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventStreamAsync(array{DomainName?: string, Uri?: string, EventStreamName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createEventTrigger(array $args = [])
 * @phpstan-method \Aws\Result createEventTrigger(array{
 *     DomainName?: string,
 *     EventTriggerName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     EventTriggerConditions?: list<array{EventTriggerDimensions?: list<array>, LogicalOperator?: 'ALL'|'ANY'|'NONE', ...}>,
 *     SegmentFilter?: string,
 *     EventTriggerLimits?: array{EventExpiration?: int, Periods?: list<array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventTriggerAsync(array{
 *     DomainName?: string,
 *     EventTriggerName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     EventTriggerConditions?: list<array{EventTriggerDimensions?: list<array>, LogicalOperator?: 'ALL'|'ANY'|'NONE', ...}>,
 *     SegmentFilter?: string,
 *     EventTriggerLimits?: array{EventExpiration?: int, Periods?: list<array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegrationWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createIntegrationWorkflow(array{
 *     DomainName?: string,
 *     WorkflowType?: 'APPFLOW_INTEGRATION',
 *     IntegrationConfig?: array{AppflowIntegration?: array{FlowDefinition?: array, Batches?: list<array>, ...}, ...},
 *     ObjectTypeName?: string,
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationWorkflowAsync(array{
 *     DomainName?: string,
 *     WorkflowType?: 'APPFLOW_INTEGRATION',
 *     IntegrationConfig?: array{AppflowIntegration?: array{FlowDefinition?: array, Batches?: list<array>, ...}, ...},
 *     ObjectTypeName?: string,
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProfile(array $args = [])
 * @phpstan-method \Aws\Result createProfile(array{
 *     DomainName?: string,
 *     AccountNumber?: string,
 *     AdditionalInformation?: string,
 *     PartyType?: 'BUSINESS'|'INDIVIDUAL'|'OTHER',
 *     BusinessName?: string,
 *     FirstName?: string,
 *     MiddleName?: string,
 *     LastName?: string,
 *     BirthDate?: string,
 *     Gender?: 'FEMALE'|'MALE'|'UNSPECIFIED',
 *     PhoneNumber?: string,
 *     MobilePhoneNumber?: string,
 *     HomePhoneNumber?: string,
 *     BusinessPhoneNumber?: string,
 *     EmailAddress?: string,
 *     PersonalEmailAddress?: string,
 *     BusinessEmailAddress?: string,
 *     Address?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     ShippingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     MailingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     BillingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     Attributes?: array<string, string>,
 *     PartyTypeString?: string,
 *     GenderString?: string,
 *     ProfileType?: 'ACCOUNT_PROFILE'|'PROFILE',
 *     EngagementPreferences?: array{Phone?: list<array>, Email?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfileAsync(array{
 *     DomainName?: string,
 *     AccountNumber?: string,
 *     AdditionalInformation?: string,
 *     PartyType?: 'BUSINESS'|'INDIVIDUAL'|'OTHER',
 *     BusinessName?: string,
 *     FirstName?: string,
 *     MiddleName?: string,
 *     LastName?: string,
 *     BirthDate?: string,
 *     Gender?: 'FEMALE'|'MALE'|'UNSPECIFIED',
 *     PhoneNumber?: string,
 *     MobilePhoneNumber?: string,
 *     HomePhoneNumber?: string,
 *     BusinessPhoneNumber?: string,
 *     EmailAddress?: string,
 *     PersonalEmailAddress?: string,
 *     BusinessEmailAddress?: string,
 *     Address?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     ShippingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     MailingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     BillingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     Attributes?: array<string, string>,
 *     PartyTypeString?: string,
 *     GenderString?: string,
 *     ProfileType?: 'ACCOUNT_PROFILE'|'PROFILE',
 *     EngagementPreferences?: array{Phone?: list<array>, Email?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecommender(array $args = [])
 * @phpstan-method \Aws\Result createRecommender(array{
 *     DomainName?: string,
 *     RecommenderName?: string,
 *     RecommenderRecipeName?: 'frequently-paired-items'|'personalized-ranking'|'popular-items'|'recommended-for-you'|'similar-items'|'trending-now',
 *     RecommenderConfig?: array{
 *         EventsConfig?: array{EventParametersList?: list<array>, ...},
 *         TrainingFrequency?: int,
 *         InferenceConfig?: array{MinProvisionedTPS?: int, ...},
 *         IncludedColumns?: array<string, list<string>>,
 *         ExcludedColumns?: array<string, list<string>>,
 *         DiversityConfig?: array{DiversityColumns?: list<array>, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     RecommenderSchemaName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecommenderAsync(array{
 *     DomainName?: string,
 *     RecommenderName?: string,
 *     RecommenderRecipeName?: 'frequently-paired-items'|'personalized-ranking'|'popular-items'|'recommended-for-you'|'similar-items'|'trending-now',
 *     RecommenderConfig?: array{
 *         EventsConfig?: array{EventParametersList?: list<array>, ...},
 *         TrainingFrequency?: int,
 *         InferenceConfig?: array{MinProvisionedTPS?: int, ...},
 *         IncludedColumns?: array<string, list<string>>,
 *         ExcludedColumns?: array<string, list<string>>,
 *         DiversityConfig?: array{DiversityColumns?: list<array>, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     RecommenderSchemaName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecommenderFilter(array $args = [])
 * @phpstan-method \Aws\Result createRecommenderFilter(array{
 *     DomainName?: string,
 *     RecommenderFilterName?: string,
 *     RecommenderFilterExpression?: string,
 *     RecommenderSchemaName?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecommenderFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecommenderFilterAsync(array{
 *     DomainName?: string,
 *     RecommenderFilterName?: string,
 *     RecommenderFilterExpression?: string,
 *     RecommenderSchemaName?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecommenderSchema(array $args = [])
 * @phpstan-method \Aws\Result createRecommenderSchema(array{
 *     DomainName?: string,
 *     RecommenderSchemaName?: string,
 *     Fields?: array<string, list<array>>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecommenderSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecommenderSchemaAsync(array{
 *     DomainName?: string,
 *     RecommenderSchemaName?: string,
 *     Fields?: array<string, list<array>>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSegmentDefinition(array $args = [])
 * @phpstan-method \Aws\Result createSegmentDefinition(array{
 *     DomainName?: string,
 *     SegmentDefinitionName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     SegmentGroups?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *     SegmentSqlQuery?: string,
 *     SegmentSort?: array{Attributes?: list<array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSegmentDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSegmentDefinitionAsync(array{
 *     DomainName?: string,
 *     SegmentDefinitionName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     SegmentGroups?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *     SegmentSqlQuery?: string,
 *     SegmentSort?: array{Attributes?: list<array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSegmentEstimate(array $args = [])
 * @phpstan-method \Aws\Result createSegmentEstimate(array{
 *     DomainName?: string,
 *     SegmentQuery?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *     SegmentSqlQuery?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSegmentEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSegmentEstimateAsync(array{
 *     DomainName?: string,
 *     SegmentQuery?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *     SegmentSqlQuery?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSegmentSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createSegmentSnapshot(array{
 *     DomainName?: string,
 *     SegmentDefinitionName?: string,
 *     DataFormat?: 'CSV'|'JSONL'|'ORC',
 *     EncryptionKey?: string,
 *     RoleArn?: string,
 *     DestinationUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSegmentSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSegmentSnapshotAsync(array{
 *     DomainName?: string,
 *     SegmentDefinitionName?: string,
 *     DataFormat?: 'CSV'|'JSONL'|'ORC',
 *     EncryptionKey?: string,
 *     RoleArn?: string,
 *     DestinationUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUploadJob(array $args = [])
 * @phpstan-method \Aws\Result createUploadJob(array{
 *     DomainName?: string,
 *     DisplayName?: string,
 *     Fields?: array<string, array{
 *         Source?: string,
 *         Target?: string,
 *         ContentType?: 'EMAIL_ADDRESS'|'NAME'|'NUMBER'|'PHONE_NUMBER'|'STRING',
 *         ...,
 *     }>,
 *     UniqueKey?: string,
 *     DataExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUploadJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUploadJobAsync(array{
 *     DomainName?: string,
 *     DisplayName?: string,
 *     Fields?: array<string, array{
 *         Source?: string,
 *         Target?: string,
 *         ContentType?: 'EMAIL_ADDRESS'|'NAME'|'NUMBER'|'PHONE_NUMBER'|'STRING',
 *         ...,
 *     }>,
 *     UniqueKey?: string,
 *     DataExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCalculatedAttributeDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteCalculatedAttributeDefinition(array{DomainName?: string, CalculatedAttributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCalculatedAttributeDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCalculatedAttributeDefinitionAsync(array{DomainName?: string, CalculatedAttributeName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainLayout(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainLayout(array{DomainName?: string, LayoutDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainLayoutAsync(array{DomainName?: string, LayoutDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainObjectType(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainObjectType(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainObjectTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainObjectTypeAsync(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \Aws\Result deleteEventStream(array $args = [])
 * @phpstan-method \Aws\Result deleteEventStream(array{DomainName?: string, EventStreamName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventStreamAsync(array{DomainName?: string, EventStreamName?: string, ...} $args = [])
 * @method \Aws\Result deleteEventTrigger(array $args = [])
 * @phpstan-method \Aws\Result deleteEventTrigger(array{DomainName?: string, EventTriggerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventTriggerAsync(array{DomainName?: string, EventTriggerName?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{DomainName?: string, Uri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{DomainName?: string, Uri?: string, ...} $args = [])
 * @method \Aws\Result deleteProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteProfile(array{ProfileId?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileAsync(array{ProfileId?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteProfileKey(array $args = [])
 * @phpstan-method \Aws\Result deleteProfileKey(array{ProfileId?: string, KeyName?: string, Values?: list<string>, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileKeyAsync(array{ProfileId?: string, KeyName?: string, Values?: list<string>, DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteProfileObject(array $args = [])
 * @phpstan-method \Aws\Result deleteProfileObject(array{ProfileId?: string, ProfileObjectUniqueKey?: string, ObjectTypeName?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileObjectAsync(array{ProfileId?: string, ProfileObjectUniqueKey?: string, ObjectTypeName?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result deleteProfileObjectType(array $args = [])
 * @phpstan-method \Aws\Result deleteProfileObjectType(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileObjectTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileObjectTypeAsync(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \Aws\Result deleteRecommender(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommender(array{DomainName?: string, RecommenderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommenderAsync(array{DomainName?: string, RecommenderName?: string, ...} $args = [])
 * @method \Aws\Result deleteRecommenderFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommenderFilter(array{DomainName?: string, RecommenderFilterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecommenderFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommenderFilterAsync(array{DomainName?: string, RecommenderFilterName?: string, ...} $args = [])
 * @method \Aws\Result deleteRecommenderSchema(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommenderSchema(array{DomainName?: string, RecommenderSchemaName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecommenderSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommenderSchemaAsync(array{DomainName?: string, RecommenderSchemaName?: string, ...} $args = [])
 * @method \Aws\Result deleteSegmentDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteSegmentDefinition(array{DomainName?: string, SegmentDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSegmentDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSegmentDefinitionAsync(array{DomainName?: string, SegmentDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflow(array{DomainName?: string, WorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array{DomainName?: string, WorkflowId?: string, ...} $args = [])
 * @method \Aws\Result detectProfileObjectType(array $args = [])
 * @phpstan-method \Aws\Result detectProfileObjectType(array{Objects?: list<string>, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectProfileObjectTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectProfileObjectTypeAsync(array{Objects?: list<string>, DomainName?: string, ...} $args = [])
 * @method \Aws\Result getAutoMergingPreview(array $args = [])
 * @phpstan-method \Aws\Result getAutoMergingPreview(array{
 *     DomainName?: string,
 *     Consolidation?: array{MatchingAttributesList?: list<list<string>>, ...},
 *     ConflictResolution?: array{ConflictResolvingModel?: 'RECENCY'|'SOURCE', SourceName?: string, ...},
 *     MinAllowedConfidenceScoreForMerging?: float,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutoMergingPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutoMergingPreviewAsync(array{
 *     DomainName?: string,
 *     Consolidation?: array{MatchingAttributesList?: list<list<string>>, ...},
 *     ConflictResolution?: array{ConflictResolvingModel?: 'RECENCY'|'SOURCE', SourceName?: string, ...},
 *     MinAllowedConfidenceScoreForMerging?: float,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCalculatedAttributeDefinition(array $args = [])
 * @phpstan-method \Aws\Result getCalculatedAttributeDefinition(array{DomainName?: string, CalculatedAttributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCalculatedAttributeDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCalculatedAttributeDefinitionAsync(array{DomainName?: string, CalculatedAttributeName?: string, ...} $args = [])
 * @method \Aws\Result getCalculatedAttributeForProfile(array $args = [])
 * @phpstan-method \Aws\Result getCalculatedAttributeForProfile(array{DomainName?: string, ProfileId?: string, CalculatedAttributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCalculatedAttributeForProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCalculatedAttributeForProfileAsync(array{DomainName?: string, ProfileId?: string, CalculatedAttributeName?: string, ...} $args = [])
 * @method \Aws\Result getDomain(array $args = [])
 * @phpstan-method \Aws\Result getDomain(array{DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAsync(array{DomainName?: string, ...} $args = [])
 * @method \Aws\Result getDomainLayout(array $args = [])
 * @phpstan-method \Aws\Result getDomainLayout(array{DomainName?: string, LayoutDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainLayoutAsync(array{DomainName?: string, LayoutDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result getDomainObjectType(array $args = [])
 * @phpstan-method \Aws\Result getDomainObjectType(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainObjectTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainObjectTypeAsync(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \Aws\Result getEventStream(array $args = [])
 * @phpstan-method \Aws\Result getEventStream(array{DomainName?: string, EventStreamName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventStreamAsync(array{DomainName?: string, EventStreamName?: string, ...} $args = [])
 * @method \Aws\Result getEventTrigger(array $args = [])
 * @phpstan-method \Aws\Result getEventTrigger(array{DomainName?: string, EventTriggerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventTriggerAsync(array{DomainName?: string, EventTriggerName?: string, ...} $args = [])
 * @method \Aws\Result getIdentityResolutionJob(array $args = [])
 * @phpstan-method \Aws\Result getIdentityResolutionJob(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityResolutionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityResolutionJobAsync(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @phpstan-method \Aws\Result getIntegration(array{DomainName?: string, Uri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationAsync(array{DomainName?: string, Uri?: string, ...} $args = [])
 * @method \Aws\Result getMatches(array $args = [])
 * @phpstan-method \Aws\Result getMatches(array{NextToken?: string, MaxResults?: int, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMatchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMatchesAsync(array{NextToken?: string, MaxResults?: int, DomainName?: string, ...} $args = [])
 * @method \Aws\Result getObjectTypeAttributeStatistics(array $args = [])
 * @phpstan-method \Aws\Result getObjectTypeAttributeStatistics(array{DomainName?: string, ObjectTypeName?: string, AttributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectTypeAttributeStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectTypeAttributeStatisticsAsync(array{DomainName?: string, ObjectTypeName?: string, AttributeName?: string, ...} $args = [])
 * @method \Aws\Result getProfileHistoryRecord(array $args = [])
 * @phpstan-method \Aws\Result getProfileHistoryRecord(array{DomainName?: string, ProfileId?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileHistoryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileHistoryRecordAsync(array{DomainName?: string, ProfileId?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result getProfileObjectType(array $args = [])
 * @phpstan-method \Aws\Result getProfileObjectType(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileObjectTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileObjectTypeAsync(array{DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \Aws\Result getProfileObjectTypeTemplate(array $args = [])
 * @phpstan-method \Aws\Result getProfileObjectTypeTemplate(array{TemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileObjectTypeTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileObjectTypeTemplateAsync(array{TemplateId?: string, ...} $args = [])
 * @method \Aws\Result getProfileRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getProfileRecommendations(array{
 *     DomainName?: string,
 *     ProfileId?: string,
 *     RecommenderName?: string,
 *     Context?: array<string, string>,
 *     RecommenderFilters?: list<array{Name?: string, Values?: array<string, string>, ...}>,
 *     RecommenderPromotionalFilters?: list<array{Name?: string, Values?: array<string, string>, PromotionName?: string, PercentPromotedItems?: int, ...}>,
 *     CandidateIds?: list<string>,
 *     MaxResults?: int,
 *     MetadataConfig?: array{MetadataColumns?: list<string>, ...},
 *     DiversityConfig?: array{Enabled?: bool, Values?: array<string, int>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileRecommendationsAsync(array{
 *     DomainName?: string,
 *     ProfileId?: string,
 *     RecommenderName?: string,
 *     Context?: array<string, string>,
 *     RecommenderFilters?: list<array{Name?: string, Values?: array<string, string>, ...}>,
 *     RecommenderPromotionalFilters?: list<array{Name?: string, Values?: array<string, string>, PromotionName?: string, PercentPromotedItems?: int, ...}>,
 *     CandidateIds?: list<string>,
 *     MaxResults?: int,
 *     MetadataConfig?: array{MetadataColumns?: list<string>, ...},
 *     DiversityConfig?: array{Enabled?: bool, Values?: array<string, int>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecommender(array $args = [])
 * @phpstan-method \Aws\Result getRecommender(array{DomainName?: string, RecommenderName?: string, TrainingMetricsCount?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommenderAsync(array{DomainName?: string, RecommenderName?: string, TrainingMetricsCount?: int, ...} $args = [])
 * @method \Aws\Result getRecommenderFilter(array $args = [])
 * @phpstan-method \Aws\Result getRecommenderFilter(array{DomainName?: string, RecommenderFilterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommenderFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommenderFilterAsync(array{DomainName?: string, RecommenderFilterName?: string, ...} $args = [])
 * @method \Aws\Result getRecommenderSchema(array $args = [])
 * @phpstan-method \Aws\Result getRecommenderSchema(array{DomainName?: string, RecommenderSchemaName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommenderSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommenderSchemaAsync(array{DomainName?: string, RecommenderSchemaName?: string, ...} $args = [])
 * @method \Aws\Result getSegmentDefinition(array $args = [])
 * @phpstan-method \Aws\Result getSegmentDefinition(array{DomainName?: string, SegmentDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentDefinitionAsync(array{DomainName?: string, SegmentDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result getSegmentEstimate(array $args = [])
 * @phpstan-method \Aws\Result getSegmentEstimate(array{DomainName?: string, EstimateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentEstimateAsync(array{DomainName?: string, EstimateId?: string, ...} $args = [])
 * @method \Aws\Result getSegmentMembership(array $args = [])
 * @phpstan-method \Aws\Result getSegmentMembership(array{DomainName?: string, SegmentDefinitionName?: string, ProfileIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentMembershipAsync(array{DomainName?: string, SegmentDefinitionName?: string, ProfileIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getSegmentSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getSegmentSnapshot(array{DomainName?: string, SegmentDefinitionName?: string, SnapshotId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentSnapshotAsync(array{DomainName?: string, SegmentDefinitionName?: string, SnapshotId?: string, ...} $args = [])
 * @method \Aws\Result getSimilarProfiles(array $args = [])
 * @phpstan-method \Aws\Result getSimilarProfiles(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     MatchType?: 'ML_BASED_MATCHING'|'RULE_BASED_MATCHING',
 *     SearchKey?: string,
 *     SearchValue?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSimilarProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSimilarProfilesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     MatchType?: 'ML_BASED_MATCHING'|'RULE_BASED_MATCHING',
 *     SearchKey?: string,
 *     SearchValue?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUploadJob(array $args = [])
 * @phpstan-method \Aws\Result getUploadJob(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUploadJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUploadJobAsync(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getUploadJobPath(array $args = [])
 * @phpstan-method \Aws\Result getUploadJobPath(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUploadJobPathAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUploadJobPathAsync(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getWorkflow(array{DomainName?: string, WorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowAsync(array{DomainName?: string, WorkflowId?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowSteps(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowSteps(array{DomainName?: string, WorkflowId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowStepsAsync(array{DomainName?: string, WorkflowId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAccountIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listAccountIntegrations(array{Uri?: string, NextToken?: string, MaxResults?: int, IncludeHidden?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountIntegrationsAsync(array{Uri?: string, NextToken?: string, MaxResults?: int, IncludeHidden?: bool, ...} $args = [])
 * @method \Aws\Result listCalculatedAttributeDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listCalculatedAttributeDefinitions(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCalculatedAttributeDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCalculatedAttributeDefinitionsAsync(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listCalculatedAttributesForProfile(array $args = [])
 * @phpstan-method \Aws\Result listCalculatedAttributesForProfile(array{NextToken?: string, MaxResults?: int, DomainName?: string, ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCalculatedAttributesForProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCalculatedAttributesForProfileAsync(array{NextToken?: string, MaxResults?: int, DomainName?: string, ProfileId?: string, ...} $args = [])
 * @method \Aws\Result listDomainLayouts(array $args = [])
 * @phpstan-method \Aws\Result listDomainLayouts(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainLayoutsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainLayoutsAsync(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDomainObjectTypes(array $args = [])
 * @phpstan-method \Aws\Result listDomainObjectTypes(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainObjectTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainObjectTypesAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventStreams(array $args = [])
 * @phpstan-method \Aws\Result listEventStreams(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventStreamsAsync(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventTriggers(array $args = [])
 * @phpstan-method \Aws\Result listEventTriggers(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventTriggersAsync(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIdentityResolutionJobs(array $args = [])
 * @phpstan-method \Aws\Result listIdentityResolutionJobs(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityResolutionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityResolutionJobsAsync(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listIntegrations(array{DomainName?: string, NextToken?: string, MaxResults?: int, IncludeHidden?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array{DomainName?: string, NextToken?: string, MaxResults?: int, IncludeHidden?: bool, ...} $args = [])
 * @method \Aws\Result listObjectTypeAttributeValues(array $args = [])
 * @phpstan-method \Aws\Result listObjectTypeAttributeValues(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     AttributeName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectTypeAttributeValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectTypeAttributeValuesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     AttributeName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectTypeAttributes(array $args = [])
 * @phpstan-method \Aws\Result listObjectTypeAttributes(array{NextToken?: string, MaxResults?: int, DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectTypeAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectTypeAttributesAsync(array{NextToken?: string, MaxResults?: int, DomainName?: string, ObjectTypeName?: string, ...} $args = [])
 * @method \Aws\Result listProfileAttributeValues(array $args = [])
 * @phpstan-method \Aws\Result listProfileAttributeValues(array{DomainName?: string, AttributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileAttributeValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileAttributeValuesAsync(array{DomainName?: string, AttributeName?: string, ...} $args = [])
 * @method \Aws\Result listProfileHistoryRecords(array $args = [])
 * @phpstan-method \Aws\Result listProfileHistoryRecords(array{
 *     DomainName?: string,
 *     ProfileId?: string,
 *     ObjectTypeName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ActionType?: 'ADDED_PROFILE_KEY'|'CREATED'|'DELETED_BY_CUSTOMER'|'DELETED_BY_MERGE'|'DELETED_PROFILE_KEY'|'EXPIRED'|'INGESTED'|'MERGED'|'UPDATED',
 *     PerformedBy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileHistoryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileHistoryRecordsAsync(array{
 *     DomainName?: string,
 *     ProfileId?: string,
 *     ObjectTypeName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ActionType?: 'ADDED_PROFILE_KEY'|'CREATED'|'DELETED_BY_CUSTOMER'|'DELETED_BY_MERGE'|'DELETED_PROFILE_KEY'|'EXPIRED'|'INGESTED'|'MERGED'|'UPDATED',
 *     PerformedBy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProfileObjectTypeTemplates(array $args = [])
 * @phpstan-method \Aws\Result listProfileObjectTypeTemplates(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileObjectTypeTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileObjectTypeTemplatesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProfileObjectTypes(array $args = [])
 * @phpstan-method \Aws\Result listProfileObjectTypes(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileObjectTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileObjectTypesAsync(array{DomainName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProfileObjects(array $args = [])
 * @phpstan-method \Aws\Result listProfileObjects(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     ProfileId?: string,
 *     ObjectFilter?: array{KeyName?: string, Values?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileObjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileObjectsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     ProfileId?: string,
 *     ObjectFilter?: array{KeyName?: string, Values?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommenderFilters(array $args = [])
 * @phpstan-method \Aws\Result listRecommenderFilters(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommenderFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommenderFiltersAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRecommenderRecipes(array $args = [])
 * @phpstan-method \Aws\Result listRecommenderRecipes(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommenderRecipesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommenderRecipesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRecommenderSchemas(array $args = [])
 * @phpstan-method \Aws\Result listRecommenderSchemas(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommenderSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommenderSchemasAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRecommenders(array $args = [])
 * @phpstan-method \Aws\Result listRecommenders(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendersAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRuleBasedMatches(array $args = [])
 * @phpstan-method \Aws\Result listRuleBasedMatches(array{NextToken?: string, MaxResults?: int, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleBasedMatchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleBasedMatchesAsync(array{NextToken?: string, MaxResults?: int, DomainName?: string, ...} $args = [])
 * @method \Aws\Result listSegmentDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listSegmentDefinitions(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSegmentDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSegmentDefinitionsAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listUploadJobs(array $args = [])
 * @phpstan-method \Aws\Result listUploadJobs(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUploadJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUploadJobsAsync(array{DomainName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{
 *     DomainName?: string,
 *     WorkflowType?: 'APPFLOW_INTEGRATION',
 *     Status?: 'CANCELLED'|'COMPLETE'|'FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'RETRY'|'SPLIT',
 *     QueryStartDate?: int|string|\DateTimeInterface,
 *     QueryEndDate?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{
 *     DomainName?: string,
 *     WorkflowType?: 'APPFLOW_INTEGRATION',
 *     Status?: 'CANCELLED'|'COMPLETE'|'FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'RETRY'|'SPLIT',
 *     QueryStartDate?: int|string|\DateTimeInterface,
 *     QueryEndDate?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result mergeProfiles(array $args = [])
 * @phpstan-method \Aws\Result mergeProfiles(array{
 *     DomainName?: string,
 *     MainProfileId?: string,
 *     ProfileIdsToBeMerged?: list<string>,
 *     FieldSourceProfileIds?: array{
 *         AccountNumber?: string,
 *         AdditionalInformation?: string,
 *         PartyType?: string,
 *         BusinessName?: string,
 *         FirstName?: string,
 *         MiddleName?: string,
 *         LastName?: string,
 *         BirthDate?: string,
 *         Gender?: string,
 *         PhoneNumber?: string,
 *         MobilePhoneNumber?: string,
 *         HomePhoneNumber?: string,
 *         BusinessPhoneNumber?: string,
 *         EmailAddress?: string,
 *         PersonalEmailAddress?: string,
 *         BusinessEmailAddress?: string,
 *         Address?: string,
 *         ShippingAddress?: string,
 *         MailingAddress?: string,
 *         BillingAddress?: string,
 *         Attributes?: array<string, string>,
 *         ProfileType?: string,
 *         EngagementPreferences?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergeProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergeProfilesAsync(array{
 *     DomainName?: string,
 *     MainProfileId?: string,
 *     ProfileIdsToBeMerged?: list<string>,
 *     FieldSourceProfileIds?: array{
 *         AccountNumber?: string,
 *         AdditionalInformation?: string,
 *         PartyType?: string,
 *         BusinessName?: string,
 *         FirstName?: string,
 *         MiddleName?: string,
 *         LastName?: string,
 *         BirthDate?: string,
 *         Gender?: string,
 *         PhoneNumber?: string,
 *         MobilePhoneNumber?: string,
 *         HomePhoneNumber?: string,
 *         BusinessPhoneNumber?: string,
 *         EmailAddress?: string,
 *         PersonalEmailAddress?: string,
 *         BusinessEmailAddress?: string,
 *         Address?: string,
 *         ShippingAddress?: string,
 *         MailingAddress?: string,
 *         BillingAddress?: string,
 *         Attributes?: array<string, string>,
 *         ProfileType?: string,
 *         EngagementPreferences?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDomainObjectType(array $args = [])
 * @phpstan-method \Aws\Result putDomainObjectType(array{
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     EncryptionKey?: string,
 *     Fields?: array<string, array{
 *         Source?: string,
 *         Target?: string,
 *         ContentType?: 'NUMBER'|'STRING',
 *         FeatureType?: 'CATEGORICAL'|'TEXTUAL',
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDomainObjectTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDomainObjectTypeAsync(array{
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     EncryptionKey?: string,
 *     Fields?: array<string, array{
 *         Source?: string,
 *         Target?: string,
 *         ContentType?: 'NUMBER'|'STRING',
 *         FeatureType?: 'CATEGORICAL'|'TEXTUAL',
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putIntegration(array $args = [])
 * @phpstan-method \Aws\Result putIntegration(array{
 *     DomainName?: string,
 *     Uri?: string,
 *     ObjectTypeName?: string,
 *     ObjectTypeNames?: array<string, string>,
 *     Tags?: array<string, string>,
 *     FlowDefinition?: array{
 *         Description?: string,
 *         FlowName?: string,
 *         KmsArn?: string,
 *         SourceFlowConfig?: array{
 *             ConnectorProfileName?: string,
 *             ConnectorType?: 'Marketo'|'S3'|'Salesforce'|'Servicenow'|'Zendesk',
 *             IncrementalPullConfig?: array,
 *             SourceConnectorProperties?: array,
 *             ...,
 *         },
 *         Tasks?: list<array>,
 *         TriggerConfig?: array{TriggerType?: 'Event'|'OnDemand'|'Scheduled', TriggerProperties?: array, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     EventTriggerNames?: list<string>,
 *     Scope?: 'DOMAIN'|'PROFILE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIntegrationAsync(array{
 *     DomainName?: string,
 *     Uri?: string,
 *     ObjectTypeName?: string,
 *     ObjectTypeNames?: array<string, string>,
 *     Tags?: array<string, string>,
 *     FlowDefinition?: array{
 *         Description?: string,
 *         FlowName?: string,
 *         KmsArn?: string,
 *         SourceFlowConfig?: array{
 *             ConnectorProfileName?: string,
 *             ConnectorType?: 'Marketo'|'S3'|'Salesforce'|'Servicenow'|'Zendesk',
 *             IncrementalPullConfig?: array,
 *             SourceConnectorProperties?: array,
 *             ...,
 *         },
 *         Tasks?: list<array>,
 *         TriggerConfig?: array{TriggerType?: 'Event'|'OnDemand'|'Scheduled', TriggerProperties?: array, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     EventTriggerNames?: list<string>,
 *     Scope?: 'DOMAIN'|'PROFILE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putProfileObject(array $args = [])
 * @phpstan-method \Aws\Result putProfileObject(array{ObjectTypeName?: string, Object?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putProfileObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProfileObjectAsync(array{ObjectTypeName?: string, Object?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result putProfileObjectType(array $args = [])
 * @phpstan-method \Aws\Result putProfileObjectType(array{
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     TemplateId?: string,
 *     ExpirationDays?: int,
 *     EncryptionKey?: string,
 *     AllowProfileCreation?: bool,
 *     SourceLastUpdatedTimestampFormat?: string,
 *     MaxProfileObjectCount?: int,
 *     SourcePriority?: int,
 *     Fields?: array<string, array{
 *         Source?: string,
 *         Target?: string,
 *         ContentType?: 'EMAIL_ADDRESS'|'NAME'|'NUMBER'|'PHONE_NUMBER'|'STRING',
 *         ...,
 *     }>,
 *     Keys?: array<string, list<array>>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putProfileObjectTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProfileObjectTypeAsync(array{
 *     DomainName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     TemplateId?: string,
 *     ExpirationDays?: int,
 *     EncryptionKey?: string,
 *     AllowProfileCreation?: bool,
 *     SourceLastUpdatedTimestampFormat?: string,
 *     MaxProfileObjectCount?: int,
 *     SourcePriority?: int,
 *     Fields?: array<string, array{
 *         Source?: string,
 *         Target?: string,
 *         ContentType?: 'EMAIL_ADDRESS'|'NAME'|'NUMBER'|'PHONE_NUMBER'|'STRING',
 *         ...,
 *     }>,
 *     Keys?: array<string, list<array>>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchProfiles(array $args = [])
 * @phpstan-method \Aws\Result searchProfiles(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     KeyName?: string,
 *     Values?: list<string>,
 *     AdditionalSearchKeys?: list<array{KeyName?: string, Values?: list<string>, ...}>,
 *     LogicalOperator?: 'AND'|'OR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchProfilesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DomainName?: string,
 *     KeyName?: string,
 *     Values?: list<string>,
 *     AdditionalSearchKeys?: list<array{KeyName?: string, Values?: list<string>, ...}>,
 *     LogicalOperator?: 'AND'|'OR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startRecommender(array $args = [])
 * @phpstan-method \Aws\Result startRecommender(array{DomainName?: string, RecommenderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRecommenderAsync(array{DomainName?: string, RecommenderName?: string, ...} $args = [])
 * @method \Aws\Result startUploadJob(array $args = [])
 * @phpstan-method \Aws\Result startUploadJob(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startUploadJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startUploadJobAsync(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result stopRecommender(array $args = [])
 * @phpstan-method \Aws\Result stopRecommender(array{DomainName?: string, RecommenderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRecommenderAsync(array{DomainName?: string, RecommenderName?: string, ...} $args = [])
 * @method \Aws\Result stopUploadJob(array $args = [])
 * @phpstan-method \Aws\Result stopUploadJob(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopUploadJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopUploadJobAsync(array{DomainName?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCalculatedAttributeDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateCalculatedAttributeDefinition(array{
 *     DomainName?: string,
 *     CalculatedAttributeName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     Conditions?: array{
 *         Range?: array{Value?: int, Unit?: 'DAYS', ValueRange?: array, TimestampSource?: string, TimestampFormat?: string, ...},
 *         ObjectCount?: int,
 *         Threshold?: array{Value?: string, Operator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL_TO', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCalculatedAttributeDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCalculatedAttributeDefinitionAsync(array{
 *     DomainName?: string,
 *     CalculatedAttributeName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     Conditions?: array{
 *         Range?: array{Value?: int, Unit?: 'DAYS', ValueRange?: array, TimestampSource?: string, TimestampFormat?: string, ...},
 *         ObjectCount?: int,
 *         Threshold?: array{Value?: string, Operator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL_TO', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomain(array $args = [])
 * @phpstan-method \Aws\Result updateDomain(array{
 *     DomainName?: string,
 *     DefaultExpirationDays?: int,
 *     DefaultEncryptionKey?: string,
 *     DeadLetterQueueUrl?: string,
 *     Matching?: array{
 *         Enabled?: bool,
 *         JobSchedule?: array{
 *             DayOfTheWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             Time?: string,
 *             ...,
 *         },
 *         AutoMerging?: array{
 *             Enabled?: bool,
 *             Consolidation?: array,
 *             ConflictResolution?: array,
 *             MinAllowedConfidenceScoreForMerging?: float,
 *             ...,
 *         },
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     RuleBasedMatching?: array{
 *         Enabled?: bool,
 *         MatchingRules?: list<array>,
 *         MaxAllowedRuleLevelForMerging?: int,
 *         MaxAllowedRuleLevelForMatching?: int,
 *         AttributeTypesSelector?: array{
 *             AttributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             Address?: list<string>,
 *             PhoneNumber?: list<string>,
 *             EmailAddress?: list<string>,
 *             ...,
 *         },
 *         ConflictResolution?: array{ConflictResolvingModel?: 'RECENCY'|'SOURCE', SourceName?: string, ...},
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     DataStore?: array{Enabled?: bool, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainAsync(array{
 *     DomainName?: string,
 *     DefaultExpirationDays?: int,
 *     DefaultEncryptionKey?: string,
 *     DeadLetterQueueUrl?: string,
 *     Matching?: array{
 *         Enabled?: bool,
 *         JobSchedule?: array{
 *             DayOfTheWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *             Time?: string,
 *             ...,
 *         },
 *         AutoMerging?: array{
 *             Enabled?: bool,
 *             Consolidation?: array,
 *             ConflictResolution?: array,
 *             MinAllowedConfidenceScoreForMerging?: float,
 *             ...,
 *         },
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     RuleBasedMatching?: array{
 *         Enabled?: bool,
 *         MatchingRules?: list<array>,
 *         MaxAllowedRuleLevelForMerging?: int,
 *         MaxAllowedRuleLevelForMatching?: int,
 *         AttributeTypesSelector?: array{
 *             AttributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             Address?: list<string>,
 *             PhoneNumber?: list<string>,
 *             EmailAddress?: list<string>,
 *             ...,
 *         },
 *         ConflictResolution?: array{ConflictResolvingModel?: 'RECENCY'|'SOURCE', SourceName?: string, ...},
 *         ExportingConfig?: array{S3Exporting?: array, ...},
 *         ...,
 *     },
 *     DataStore?: array{Enabled?: bool, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainLayout(array $args = [])
 * @phpstan-method \Aws\Result updateDomainLayout(array{
 *     DomainName?: string,
 *     LayoutDefinitionName?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     IsDefault?: bool,
 *     LayoutType?: 'PROFILE_EXPLORER',
 *     Layout?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainLayoutAsync(array{
 *     DomainName?: string,
 *     LayoutDefinitionName?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     IsDefault?: bool,
 *     LayoutType?: 'PROFILE_EXPLORER',
 *     Layout?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventTrigger(array $args = [])
 * @phpstan-method \Aws\Result updateEventTrigger(array{
 *     DomainName?: string,
 *     EventTriggerName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     EventTriggerConditions?: list<array{EventTriggerDimensions?: list<array>, LogicalOperator?: 'ALL'|'ANY'|'NONE', ...}>,
 *     SegmentFilter?: string,
 *     EventTriggerLimits?: array{EventExpiration?: int, Periods?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventTriggerAsync(array{
 *     DomainName?: string,
 *     EventTriggerName?: string,
 *     ObjectTypeName?: string,
 *     Description?: string,
 *     EventTriggerConditions?: list<array{EventTriggerDimensions?: list<array>, LogicalOperator?: 'ALL'|'ANY'|'NONE', ...}>,
 *     SegmentFilter?: string,
 *     EventTriggerLimits?: array{EventExpiration?: int, Periods?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProfile(array $args = [])
 * @phpstan-method \Aws\Result updateProfile(array{
 *     DomainName?: string,
 *     ProfileId?: string,
 *     AdditionalInformation?: string,
 *     AccountNumber?: string,
 *     PartyType?: 'BUSINESS'|'INDIVIDUAL'|'OTHER',
 *     BusinessName?: string,
 *     FirstName?: string,
 *     MiddleName?: string,
 *     LastName?: string,
 *     BirthDate?: string,
 *     Gender?: 'FEMALE'|'MALE'|'UNSPECIFIED',
 *     PhoneNumber?: string,
 *     MobilePhoneNumber?: string,
 *     HomePhoneNumber?: string,
 *     BusinessPhoneNumber?: string,
 *     EmailAddress?: string,
 *     PersonalEmailAddress?: string,
 *     BusinessEmailAddress?: string,
 *     Address?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     ShippingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     MailingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     BillingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     Attributes?: array<string, string>,
 *     PartyTypeString?: string,
 *     GenderString?: string,
 *     ProfileType?: 'ACCOUNT_PROFILE'|'PROFILE',
 *     EngagementPreferences?: array{Phone?: list<array>, Email?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfileAsync(array{
 *     DomainName?: string,
 *     ProfileId?: string,
 *     AdditionalInformation?: string,
 *     AccountNumber?: string,
 *     PartyType?: 'BUSINESS'|'INDIVIDUAL'|'OTHER',
 *     BusinessName?: string,
 *     FirstName?: string,
 *     MiddleName?: string,
 *     LastName?: string,
 *     BirthDate?: string,
 *     Gender?: 'FEMALE'|'MALE'|'UNSPECIFIED',
 *     PhoneNumber?: string,
 *     MobilePhoneNumber?: string,
 *     HomePhoneNumber?: string,
 *     BusinessPhoneNumber?: string,
 *     EmailAddress?: string,
 *     PersonalEmailAddress?: string,
 *     BusinessEmailAddress?: string,
 *     Address?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     ShippingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     MailingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     BillingAddress?: array{
 *         Address1?: string,
 *         Address2?: string,
 *         Address3?: string,
 *         Address4?: string,
 *         City?: string,
 *         County?: string,
 *         State?: string,
 *         Province?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     Attributes?: array<string, string>,
 *     PartyTypeString?: string,
 *     GenderString?: string,
 *     ProfileType?: 'ACCOUNT_PROFILE'|'PROFILE',
 *     EngagementPreferences?: array{Phone?: list<array>, Email?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRecommender(array $args = [])
 * @phpstan-method \Aws\Result updateRecommender(array{
 *     DomainName?: string,
 *     RecommenderName?: string,
 *     Description?: string,
 *     RecommenderConfig?: array{
 *         EventsConfig?: array{EventParametersList?: list<array>, ...},
 *         TrainingFrequency?: int,
 *         InferenceConfig?: array{MinProvisionedTPS?: int, ...},
 *         IncludedColumns?: array<string, list<string>>,
 *         ExcludedColumns?: array<string, list<string>>,
 *         DiversityConfig?: array{DiversityColumns?: list<array>, ...},
 *         ...,
 *     },
 *     RecommenderVersionName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecommenderAsync(array{
 *     DomainName?: string,
 *     RecommenderName?: string,
 *     Description?: string,
 *     RecommenderConfig?: array{
 *         EventsConfig?: array{EventParametersList?: list<array>, ...},
 *         TrainingFrequency?: int,
 *         InferenceConfig?: array{MinProvisionedTPS?: int, ...},
 *         IncludedColumns?: array<string, list<string>>,
 *         ExcludedColumns?: array<string, list<string>>,
 *         DiversityConfig?: array{DiversityColumns?: list<array>, ...},
 *         ...,
 *     },
 *     RecommenderVersionName?: string,
 *     ...,
 * } $args = [])
 */
class CustomerProfilesClient extends AwsClient {}
