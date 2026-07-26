<?php
namespace Aws\SecurityHub;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SecurityHub** service.
 * @method \Aws\Result acceptAdministratorInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptAdministratorInvitation(array{AdministratorId?: string, InvitationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAdministratorInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptAdministratorInvitationAsync(array{AdministratorId?: string, InvitationId?: string, ...} $args = [])
 * @method \Aws\Result acceptInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptInvitation(array{MasterId?: string, InvitationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array{MasterId?: string, InvitationId?: string, ...} $args = [])
 * @method \Aws\Result batchDeleteAutomationRules(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteAutomationRules(array{AutomationRulesArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteAutomationRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteAutomationRulesAsync(array{AutomationRulesArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDisableStandards(array $args = [])
 * @phpstan-method \Aws\Result batchDisableStandards(array{StandardsSubscriptionArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisableStandardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisableStandardsAsync(array{StandardsSubscriptionArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchEnableStandards(array $args = [])
 * @phpstan-method \Aws\Result batchEnableStandards(array{
 *     StandardsSubscriptionRequests?: list<array{StandardsArn?: string, StandardsInput?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchEnableStandardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchEnableStandardsAsync(array{
 *     StandardsSubscriptionRequests?: list<array{StandardsArn?: string, StandardsInput?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetAutomationRules(array $args = [])
 * @phpstan-method \Aws\Result batchGetAutomationRules(array{AutomationRulesArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAutomationRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAutomationRulesAsync(array{AutomationRulesArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetConfigurationPolicyAssociations(array $args = [])
 * @phpstan-method \Aws\Result batchGetConfigurationPolicyAssociations(array{ConfigurationPolicyAssociationIdentifiers?: list<array{Target?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetConfigurationPolicyAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetConfigurationPolicyAssociationsAsync(array{ConfigurationPolicyAssociationIdentifiers?: list<array{Target?: array, ...}>, ...} $args = [])
 * @method \Aws\Result batchGetSecurityControls(array $args = [])
 * @phpstan-method \Aws\Result batchGetSecurityControls(array{SecurityControlIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSecurityControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSecurityControlsAsync(array{SecurityControlIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetStandardsControlAssociations(array $args = [])
 * @phpstan-method \Aws\Result batchGetStandardsControlAssociations(array{
 *     StandardsControlAssociationIds?: list<array{SecurityControlId?: string, StandardsArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetStandardsControlAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetStandardsControlAssociationsAsync(array{
 *     StandardsControlAssociationIds?: list<array{SecurityControlId?: string, StandardsArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchImportFindings(array $args = [])
 * @phpstan-method \Aws\Result batchImportFindings(array{
 *     Findings?: list<array{
 *         SchemaVersion?: string,
 *         Id?: string,
 *         ProductArn?: string,
 *         ProductName?: string,
 *         CompanyName?: string,
 *         Region?: string,
 *         GeneratorId?: string,
 *         AwsAccountId?: string,
 *         Types?: list<string>,
 *         FirstObservedAt?: string,
 *         LastObservedAt?: string,
 *         CreatedAt?: string,
 *         UpdatedAt?: string,
 *         Severity?: array,
 *         Confidence?: int,
 *         Criticality?: int,
 *         Title?: string,
 *         Description?: string,
 *         Remediation?: array,
 *         SourceUrl?: string,
 *         ProductFields?: array<string, string>,
 *         UserDefinedFields?: array<string, string>,
 *         Malware?: list<array>,
 *         Network?: array,
 *         NetworkPath?: list<array>,
 *         Process?: array,
 *         Threats?: list<array>,
 *         ThreatIntelIndicators?: list<array>,
 *         Resources?: list<array>,
 *         Compliance?: array,
 *         VerificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *         WorkflowState?: 'ASSIGNED'|'DEFERRED'|'IN_PROGRESS'|'NEW'|'RESOLVED',
 *         Workflow?: array,
 *         RecordState?: 'ACTIVE'|'ARCHIVED',
 *         RelatedFindings?: list<array>,
 *         Note?: array,
 *         Vulnerabilities?: list<array>,
 *         PatchSummary?: array,
 *         Action?: array,
 *         FindingProviderFields?: array,
 *         Sample?: bool,
 *         GeneratorDetails?: array,
 *         ProcessedAt?: string,
 *         AwsAccountName?: string,
 *         Detection?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchImportFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchImportFindingsAsync(array{
 *     Findings?: list<array{
 *         SchemaVersion?: string,
 *         Id?: string,
 *         ProductArn?: string,
 *         ProductName?: string,
 *         CompanyName?: string,
 *         Region?: string,
 *         GeneratorId?: string,
 *         AwsAccountId?: string,
 *         Types?: list<string>,
 *         FirstObservedAt?: string,
 *         LastObservedAt?: string,
 *         CreatedAt?: string,
 *         UpdatedAt?: string,
 *         Severity?: array,
 *         Confidence?: int,
 *         Criticality?: int,
 *         Title?: string,
 *         Description?: string,
 *         Remediation?: array,
 *         SourceUrl?: string,
 *         ProductFields?: array<string, string>,
 *         UserDefinedFields?: array<string, string>,
 *         Malware?: list<array>,
 *         Network?: array,
 *         NetworkPath?: list<array>,
 *         Process?: array,
 *         Threats?: list<array>,
 *         ThreatIntelIndicators?: list<array>,
 *         Resources?: list<array>,
 *         Compliance?: array,
 *         VerificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *         WorkflowState?: 'ASSIGNED'|'DEFERRED'|'IN_PROGRESS'|'NEW'|'RESOLVED',
 *         Workflow?: array,
 *         RecordState?: 'ACTIVE'|'ARCHIVED',
 *         RelatedFindings?: list<array>,
 *         Note?: array,
 *         Vulnerabilities?: list<array>,
 *         PatchSummary?: array,
 *         Action?: array,
 *         FindingProviderFields?: array,
 *         Sample?: bool,
 *         GeneratorDetails?: array,
 *         ProcessedAt?: string,
 *         AwsAccountName?: string,
 *         Detection?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateAutomationRules(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateAutomationRules(array{
 *     UpdateAutomationRulesRequestItems?: list<array{
 *         RuleArn?: string,
 *         RuleStatus?: 'DISABLED'|'ENABLED',
 *         RuleOrder?: int,
 *         Description?: string,
 *         RuleName?: string,
 *         IsTerminal?: bool,
 *         Criteria?: array,
 *         Actions?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateAutomationRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateAutomationRulesAsync(array{
 *     UpdateAutomationRulesRequestItems?: list<array{
 *         RuleArn?: string,
 *         RuleStatus?: 'DISABLED'|'ENABLED',
 *         RuleOrder?: int,
 *         Description?: string,
 *         RuleName?: string,
 *         IsTerminal?: bool,
 *         Criteria?: array,
 *         Actions?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateFindings(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateFindings(array{
 *     FindingIdentifiers?: list<array{Id?: string, ProductArn?: string, ...}>,
 *     Note?: array{Text?: string, UpdatedBy?: string, ...},
 *     Severity?: array{Normalized?: int, Product?: float, Label?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM', ...},
 *     VerificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     Confidence?: int,
 *     Criticality?: int,
 *     Types?: list<string>,
 *     UserDefinedFields?: array<string, string>,
 *     Workflow?: array{Status?: 'NEW'|'NOTIFIED'|'RESOLVED'|'SUPPRESSED', ...},
 *     RelatedFindings?: list<array{ProductArn?: string, Id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateFindingsAsync(array{
 *     FindingIdentifiers?: list<array{Id?: string, ProductArn?: string, ...}>,
 *     Note?: array{Text?: string, UpdatedBy?: string, ...},
 *     Severity?: array{Normalized?: int, Product?: float, Label?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM', ...},
 *     VerificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     Confidence?: int,
 *     Criticality?: int,
 *     Types?: list<string>,
 *     UserDefinedFields?: array<string, string>,
 *     Workflow?: array{Status?: 'NEW'|'NOTIFIED'|'RESOLVED'|'SUPPRESSED', ...},
 *     RelatedFindings?: list<array{ProductArn?: string, Id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateFindingsV2(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateFindingsV2(array{
 *     MetadataUids?: list<string>,
 *     FindingIdentifiers?: list<array{CloudAccountUid?: string, FindingInfoUid?: string, MetadataProductUid?: string, ...}>,
 *     Comment?: string,
 *     SeverityId?: int,
 *     StatusId?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateFindingsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateFindingsV2Async(array{
 *     MetadataUids?: list<string>,
 *     FindingIdentifiers?: list<array{CloudAccountUid?: string, FindingInfoUid?: string, MetadataProductUid?: string, ...}>,
 *     Comment?: string,
 *     SeverityId?: int,
 *     StatusId?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateStandardsControlAssociations(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateStandardsControlAssociations(array{
 *     StandardsControlAssociationUpdates?: list<array{
 *         StandardsArn?: string,
 *         SecurityControlId?: string,
 *         AssociationStatus?: 'DISABLED'|'ENABLED',
 *         UpdatedReason?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateStandardsControlAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateStandardsControlAssociationsAsync(array{
 *     StandardsControlAssociationUpdates?: list<array{
 *         StandardsArn?: string,
 *         SecurityControlId?: string,
 *         AssociationStatus?: 'DISABLED'|'ENABLED',
 *         UpdatedReason?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createActionTarget(array $args = [])
 * @phpstan-method \Aws\Result createActionTarget(array{Name?: string, Description?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createActionTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createActionTargetAsync(array{Name?: string, Description?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result createAggregatorV2(array $args = [])
 * @phpstan-method \Aws\Result createAggregatorV2(array{
 *     RegionLinkingMode?: string,
 *     LinkedRegions?: list<string>,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAggregatorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAggregatorV2Async(array{
 *     RegionLinkingMode?: string,
 *     LinkedRegions?: list<string>,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutomationRule(array $args = [])
 * @phpstan-method \Aws\Result createAutomationRule(array{
 *     Tags?: array<string, string>,
 *     RuleStatus?: 'DISABLED'|'ENABLED',
 *     RuleOrder?: int,
 *     RuleName?: string,
 *     Description?: string,
 *     IsTerminal?: bool,
 *     Criteria?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         SeverityLabel?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ...,
 *     },
 *     Actions?: list<array{Type?: 'FINDING_FIELDS_UPDATE', FindingFieldsUpdate?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutomationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutomationRuleAsync(array{
 *     Tags?: array<string, string>,
 *     RuleStatus?: 'DISABLED'|'ENABLED',
 *     RuleOrder?: int,
 *     RuleName?: string,
 *     Description?: string,
 *     IsTerminal?: bool,
 *     Criteria?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         SeverityLabel?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ...,
 *     },
 *     Actions?: list<array{Type?: 'FINDING_FIELDS_UPDATE', FindingFieldsUpdate?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutomationRuleV2(array $args = [])
 * @phpstan-method \Aws\Result createAutomationRuleV2(array{
 *     RuleName?: string,
 *     RuleStatus?: 'DISABLED'|'ENABLED',
 *     Description?: string,
 *     RuleOrder?: float,
 *     Criteria?: array{OcsfFindingCriteria?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...}, ...},
 *     Actions?: list<array{
 *         Type?: 'EXTERNAL_INTEGRATION'|'FINDING_FIELDS_UPDATE',
 *         FindingFieldsUpdate?: array,
 *         ExternalIntegrationConfiguration?: array,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutomationRuleV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutomationRuleV2Async(array{
 *     RuleName?: string,
 *     RuleStatus?: 'DISABLED'|'ENABLED',
 *     Description?: string,
 *     RuleOrder?: float,
 *     Criteria?: array{OcsfFindingCriteria?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...}, ...},
 *     Actions?: list<array{
 *         Type?: 'EXTERNAL_INTEGRATION'|'FINDING_FIELDS_UPDATE',
 *         FindingFieldsUpdate?: array,
 *         ExternalIntegrationConfiguration?: array,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfigurationPolicy(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationPolicy(array{
 *     Name?: string,
 *     Description?: string,
 *     ConfigurationPolicy?: array{
 *         SecurityHub?: array{
 *             ServiceEnabled?: bool,
 *             EnabledStandardIdentifiers?: list<string>,
 *             SecurityControlsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationPolicyAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ConfigurationPolicy?: array{
 *         SecurityHub?: array{
 *             ServiceEnabled?: bool,
 *             EnabledStandardIdentifiers?: list<string>,
 *             SecurityControlsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnector(array $args = [])
 * @phpstan-method \Aws\Result createConnector(array{
 *     Name?: string,
 *     Description?: string,
 *     Provider?: array{
 *         Azure?: array{AWSConfigConnectorArn?: string, ScopeConfiguration?: array, AzureRegions?: list<string>, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Provider?: array{
 *         Azure?: array{AWSConfigConnectorArn?: string, ScopeConfiguration?: array, AzureRegions?: list<string>, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnectorV2(array $args = [])
 * @phpstan-method \Aws\Result createConnectorV2(array{
 *     Name?: string,
 *     Description?: string,
 *     Provider?: array{
 *         JiraCloud?: array{ProjectKey?: string, ...},
 *         ServiceNow?: array{InstanceName?: string, SecretArn?: string, ...},
 *         Azure?: array{AWSConfigConnectorArn?: string, ScopeConfiguration?: array, AzureRegions?: list<string>, ...},
 *         ...,
 *     },
 *     KmsKeyArn?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorV2Async(array{
 *     Name?: string,
 *     Description?: string,
 *     Provider?: array{
 *         JiraCloud?: array{ProjectKey?: string, ...},
 *         ServiceNow?: array{InstanceName?: string, SecretArn?: string, ...},
 *         Azure?: array{AWSConfigConnectorArn?: string, ScopeConfiguration?: array, AzureRegions?: list<string>, ...},
 *         ...,
 *     },
 *     KmsKeyArn?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFindingAggregator(array $args = [])
 * @phpstan-method \Aws\Result createFindingAggregator(array{RegionLinkingMode?: string, Regions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFindingAggregatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFindingAggregatorAsync(array{RegionLinkingMode?: string, Regions?: list<string>, ...} $args = [])
 * @method \Aws\Result createInsight(array $args = [])
 * @phpstan-method \Aws\Result createInsight(array{
 *     Name?: string,
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     GroupByAttribute?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInsightAsync(array{
 *     Name?: string,
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     GroupByAttribute?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMembers(array $args = [])
 * @phpstan-method \Aws\Result createMembers(array{AccountDetails?: list<array{AccountId?: string, Email?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMembersAsync(array{AccountDetails?: list<array{AccountId?: string, Email?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createTicketV2(array $args = [])
 * @phpstan-method \Aws\Result createTicketV2(array{ConnectorId?: string, FindingMetadataUid?: string, ClientToken?: string, Mode?: 'DRYRUN', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTicketV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTicketV2Async(array{ConnectorId?: string, FindingMetadataUid?: string, ClientToken?: string, Mode?: 'DRYRUN', ...} $args = [])
 * @method \Aws\Result declineInvitations(array $args = [])
 * @phpstan-method \Aws\Result declineInvitations(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise declineInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise declineInvitationsAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteActionTarget(array $args = [])
 * @phpstan-method \Aws\Result deleteActionTarget(array{ActionTargetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteActionTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteActionTargetAsync(array{ActionTargetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAggregatorV2(array $args = [])
 * @phpstan-method \Aws\Result deleteAggregatorV2(array{AggregatorV2Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAggregatorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAggregatorV2Async(array{AggregatorV2Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteAutomationRuleV2(array $args = [])
 * @phpstan-method \Aws\Result deleteAutomationRuleV2(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutomationRuleV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutomationRuleV2Async(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationPolicy(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationPolicyAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteConnector(array{ConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array{ConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectorV2(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectorV2(array{ConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorV2Async(array{ConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteFindingAggregator(array $args = [])
 * @phpstan-method \Aws\Result deleteFindingAggregator(array{FindingAggregatorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFindingAggregatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFindingAggregatorAsync(array{FindingAggregatorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteInsight(array $args = [])
 * @phpstan-method \Aws\Result deleteInsight(array{InsightArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInsightAsync(array{InsightArn?: string, ...} $args = [])
 * @method \Aws\Result deleteInvitations(array $args = [])
 * @phpstan-method \Aws\Result deleteInvitations(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInvitationsAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteMembers(array $args = [])
 * @phpstan-method \Aws\Result deleteMembers(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMembersAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeActionTargets(array $args = [])
 * @phpstan-method \Aws\Result describeActionTargets(array{ActionTargetArns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActionTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActionTargetsAsync(array{ActionTargetArns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeHub(array $args = [])
 * @phpstan-method \Aws\Result describeHub(array{HubArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHubAsync(array{HubArn?: string, ...} $args = [])
 * @method \Aws\Result describeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result describeProducts(array $args = [])
 * @phpstan-method \Aws\Result describeProducts(array{NextToken?: string, MaxResults?: int, ProductArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProductsAsync(array{NextToken?: string, MaxResults?: int, ProductArn?: string, ...} $args = [])
 * @method \Aws\Result describeProductsV2(array $args = [])
 * @phpstan-method \Aws\Result describeProductsV2(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProductsV2Async(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeSecurityHubV2(array $args = [])
 * @phpstan-method \Aws\Result describeSecurityHubV2(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecurityHubV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSecurityHubV2Async(array{...} $args = [])
 * @method \Aws\Result describeStandards(array $args = [])
 * @phpstan-method \Aws\Result describeStandards(array{NextToken?: string, MaxResults?: int, Providers?: list<'AWS'|'Azure'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStandardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStandardsAsync(array{NextToken?: string, MaxResults?: int, Providers?: list<'AWS'|'Azure'>, ...} $args = [])
 * @method \Aws\Result describeStandardsControls(array $args = [])
 * @phpstan-method \Aws\Result describeStandardsControls(array{StandardsSubscriptionArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStandardsControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStandardsControlsAsync(array{StandardsSubscriptionArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result disableImportFindingsForProduct(array $args = [])
 * @phpstan-method \Aws\Result disableImportFindingsForProduct(array{ProductSubscriptionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableImportFindingsForProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableImportFindingsForProductAsync(array{ProductSubscriptionArn?: string, ...} $args = [])
 * @method \Aws\Result disableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result disableOrganizationAdminAccount(array{AdminAccountId?: string, Feature?: 'SecurityHub'|'SecurityHubV2', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array{AdminAccountId?: string, Feature?: 'SecurityHub'|'SecurityHubV2', ...} $args = [])
 * @method \Aws\Result disableSecurityHub(array $args = [])
 * @phpstan-method \Aws\Result disableSecurityHub(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSecurityHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableSecurityHubAsync(array{...} $args = [])
 * @method \Aws\Result disableSecurityHubFeatureV2(array $args = [])
 * @phpstan-method \Aws\Result disableSecurityHubFeatureV2(array{FeatureName?: 'NETWORK_SCANNING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSecurityHubFeatureV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableSecurityHubFeatureV2Async(array{FeatureName?: 'NETWORK_SCANNING', ...} $args = [])
 * @method \Aws\Result disableSecurityHubV2(array $args = [])
 * @phpstan-method \Aws\Result disableSecurityHubV2(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSecurityHubV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableSecurityHubV2Async(array{...} $args = [])
 * @method \Aws\Result disassociateFromAdministratorAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateFromAdministratorAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array{...} $args = [])
 * @method \Aws\Result disassociateFromMasterAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateFromMasterAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromMasterAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFromMasterAccountAsync(array{...} $args = [])
 * @method \Aws\Result disassociateMembers(array $args = [])
 * @phpstan-method \Aws\Result disassociateMembers(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMembersAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result enableImportFindingsForProduct(array $args = [])
 * @phpstan-method \Aws\Result enableImportFindingsForProduct(array{ProductArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableImportFindingsForProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableImportFindingsForProductAsync(array{ProductArn?: string, ...} $args = [])
 * @method \Aws\Result enableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result enableOrganizationAdminAccount(array{AdminAccountId?: string, Feature?: 'SecurityHub'|'SecurityHubV2', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array{AdminAccountId?: string, Feature?: 'SecurityHub'|'SecurityHubV2', ...} $args = [])
 * @method \Aws\Result enableSecurityHub(array $args = [])
 * @phpstan-method \Aws\Result enableSecurityHub(array{
 *     Tags?: array<string, string>,
 *     EnableDefaultStandards?: bool,
 *     ControlFindingGenerator?: 'SECURITY_CONTROL'|'STANDARD_CONTROL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSecurityHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableSecurityHubAsync(array{
 *     Tags?: array<string, string>,
 *     EnableDefaultStandards?: bool,
 *     ControlFindingGenerator?: 'SECURITY_CONTROL'|'STANDARD_CONTROL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableSecurityHubFeatureV2(array $args = [])
 * @phpstan-method \Aws\Result enableSecurityHubFeatureV2(array{FeatureName?: 'NETWORK_SCANNING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSecurityHubFeatureV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableSecurityHubFeatureV2Async(array{FeatureName?: 'NETWORK_SCANNING', ...} $args = [])
 * @method \Aws\Result enableSecurityHubV2(array $args = [])
 * @phpstan-method \Aws\Result enableSecurityHubV2(array{Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSecurityHubV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableSecurityHubV2Async(array{Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result generateRecommendedPolicyV2(array $args = [])
 * @phpstan-method \Aws\Result generateRecommendedPolicyV2(array{MetadataUid?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateRecommendedPolicyV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateRecommendedPolicyV2Async(array{MetadataUid?: string, ...} $args = [])
 * @method \Aws\Result getAdministratorAccount(array $args = [])
 * @phpstan-method \Aws\Result getAdministratorAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdministratorAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdministratorAccountAsync(array{...} $args = [])
 * @method \Aws\Result getAggregatorV2(array $args = [])
 * @phpstan-method \Aws\Result getAggregatorV2(array{AggregatorV2Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAggregatorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAggregatorV2Async(array{AggregatorV2Arn?: string, ...} $args = [])
 * @method \Aws\Result getAutomationRuleV2(array $args = [])
 * @phpstan-method \Aws\Result getAutomationRuleV2(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomationRuleV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomationRuleV2Async(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getConfigurationPolicy(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationPolicy(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationPolicyAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getConfigurationPolicyAssociation(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationPolicyAssociation(array{Target?: array{AccountId?: string, OrganizationalUnitId?: string, RootId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationPolicyAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationPolicyAssociationAsync(array{Target?: array{AccountId?: string, OrganizationalUnitId?: string, RootId?: string, ...}, ...} $args = [])
 * @method \Aws\Result getConnector(array $args = [])
 * @phpstan-method \Aws\Result getConnector(array{ConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectorAsync(array{ConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getConnectorV2(array $args = [])
 * @phpstan-method \Aws\Result getConnectorV2(array{ConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectorV2Async(array{ConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getEnabledStandards(array $args = [])
 * @phpstan-method \Aws\Result getEnabledStandards(array{
 *     StandardsSubscriptionArns?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Providers?: list<'AWS'|'Azure'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnabledStandardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnabledStandardsAsync(array{
 *     StandardsSubscriptionArns?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Providers?: list<'AWS'|'Azure'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindingAggregator(array $args = [])
 * @phpstan-method \Aws\Result getFindingAggregator(array{FindingAggregatorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingAggregatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingAggregatorAsync(array{FindingAggregatorArn?: string, ...} $args = [])
 * @method \Aws\Result getFindingHistory(array $args = [])
 * @phpstan-method \Aws\Result getFindingHistory(array{
 *     FindingIdentifier?: array{Id?: string, ProductArn?: string, ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingHistoryAsync(array{
 *     FindingIdentifier?: array{Id?: string, ProductArn?: string, ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindingStatisticsV2(array $args = [])
 * @phpstan-method \Aws\Result getFindingStatisticsV2(array{
 *     GroupByRules?: list<array{
 *         Filters?: array,
 *         GroupByField?: 'activity_name'|'class_name'|'cloud.account.name'|'cloud.account.uid'|'cloud.provider'|'cloud.region'|'compliance.assessments.name'|'compliance.control'|'compliance.standards'|'compliance.status'|'finding_info.analytic.name'|'finding_info.related_events.traits.category'|'finding_info.title'|'finding_info.types'|'metadata.product.name'|'metadata.product.uid'|'metadata.product.vendor_name'|'resources.cloud_partition'|'resources.name'|'resources.owner.account.name'|'resources.owner.account.uid'|'resources.owner.org.uid'|'resources.provider'|'resources.region'|'resources.type'|'resources.uid'|'severity'|'status'|'vendor_attributes.severity'|'vulnerabilities.affected_packages.name'|'vulnerabilities.fix_coverage',
 *         ...,
 *     }>,
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortOrder?: 'asc'|'desc',
 *     MaxStatisticResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingStatisticsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingStatisticsV2Async(array{
 *     GroupByRules?: list<array{
 *         Filters?: array,
 *         GroupByField?: 'activity_name'|'class_name'|'cloud.account.name'|'cloud.account.uid'|'cloud.provider'|'cloud.region'|'compliance.assessments.name'|'compliance.control'|'compliance.standards'|'compliance.status'|'finding_info.analytic.name'|'finding_info.related_events.traits.category'|'finding_info.title'|'finding_info.types'|'metadata.product.name'|'metadata.product.uid'|'metadata.product.vendor_name'|'resources.cloud_partition'|'resources.name'|'resources.owner.account.name'|'resources.owner.account.uid'|'resources.owner.org.uid'|'resources.provider'|'resources.region'|'resources.type'|'resources.uid'|'severity'|'status'|'vendor_attributes.severity'|'vulnerabilities.affected_packages.name'|'vulnerabilities.fix_coverage',
 *         ...,
 *     }>,
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortOrder?: 'asc'|'desc',
 *     MaxStatisticResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindings(array $args = [])
 * @phpstan-method \Aws\Result getFindings(array{
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     SortCriteria?: list<array{Field?: string, SortOrder?: 'asc'|'desc', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsAsync(array{
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     SortCriteria?: list<array{Field?: string, SortOrder?: 'asc'|'desc', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindingsTrendsV2(array $args = [])
 * @phpstan-method \Aws\Result getFindingsTrendsV2(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsTrendsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsTrendsV2Async(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindingsV2(array $args = [])
 * @phpstan-method \Aws\Result getFindingsV2(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortCriteria?: list<array{Field?: string, SortOrder?: 'asc'|'desc', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsV2Async(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortCriteria?: list<array{Field?: string, SortOrder?: 'asc'|'desc', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInsightResults(array $args = [])
 * @phpstan-method \Aws\Result getInsightResults(array{InsightArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightResultsAsync(array{InsightArn?: string, ...} $args = [])
 * @method \Aws\Result getInsights(array $args = [])
 * @phpstan-method \Aws\Result getInsights(array{InsightArns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightsAsync(array{InsightArns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getInvitationsCount(array $args = [])
 * @phpstan-method \Aws\Result getInvitationsCount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvitationsCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvitationsCountAsync(array{...} $args = [])
 * @method \Aws\Result getMasterAccount(array $args = [])
 * @phpstan-method \Aws\Result getMasterAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMasterAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMasterAccountAsync(array{...} $args = [])
 * @method \Aws\Result getMembers(array $args = [])
 * @phpstan-method \Aws\Result getMembers(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMembersAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getRecommendedPolicyV2(array $args = [])
 * @phpstan-method \Aws\Result getRecommendedPolicyV2(array{MetadataUid?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendedPolicyV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendedPolicyV2Async(array{MetadataUid?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getResourcesStatisticsV2(array $args = [])
 * @phpstan-method \Aws\Result getResourcesStatisticsV2(array{
 *     GroupByRules?: list<array{
 *         GroupByField?: 'AccountId'|'AccountName'|'DiscoveryType'|'FindingsSummary.FindingType'|'Region'|'ResourceCategory'|'ResourceCloudPartition'|'ResourceInfo.AIDetails.CanonicalId'|'ResourceInfo.AIDetails.HostResourceType'|'ResourceName'|'ResourceOwnerAccountId'|'ResourceOwnerOrgId'|'ResourceProvider'|'ResourceRegion'|'ResourceSubCategory'|'ResourceType',
 *         Filters?: array,
 *         ...,
 *     }>,
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortOrder?: 'asc'|'desc',
 *     MaxStatisticResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcesStatisticsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcesStatisticsV2Async(array{
 *     GroupByRules?: list<array{
 *         GroupByField?: 'AccountId'|'AccountName'|'DiscoveryType'|'FindingsSummary.FindingType'|'Region'|'ResourceCategory'|'ResourceCloudPartition'|'ResourceInfo.AIDetails.CanonicalId'|'ResourceInfo.AIDetails.HostResourceType'|'ResourceName'|'ResourceOwnerAccountId'|'ResourceOwnerOrgId'|'ResourceProvider'|'ResourceRegion'|'ResourceSubCategory'|'ResourceType',
 *         Filters?: array,
 *         ...,
 *     }>,
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortOrder?: 'asc'|'desc',
 *     MaxStatisticResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcesTrendsV2(array $args = [])
 * @phpstan-method \Aws\Result getResourcesTrendsV2(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcesTrendsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcesTrendsV2Async(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcesV2(array $args = [])
 * @phpstan-method \Aws\Result getResourcesV2(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortCriteria?: list<array{Field?: string, SortOrder?: 'asc'|'desc', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcesV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcesV2Async(array{
 *     Filters?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...},
 *     Scopes?: array{AwsOrganizations?: list<array>, ...},
 *     SortCriteria?: list<array{Field?: string, SortOrder?: 'asc'|'desc', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSecurityControlDefinition(array $args = [])
 * @phpstan-method \Aws\Result getSecurityControlDefinition(array{SecurityControlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityControlDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecurityControlDefinitionAsync(array{SecurityControlId?: string, ...} $args = [])
 * @method \Aws\Result inviteMembers(array $args = [])
 * @phpstan-method \Aws\Result inviteMembers(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inviteMembersAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result listAggregatorsV2(array $args = [])
 * @phpstan-method \Aws\Result listAggregatorsV2(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAggregatorsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAggregatorsV2Async(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAutomationRules(array $args = [])
 * @phpstan-method \Aws\Result listAutomationRules(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationRulesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAutomationRulesV2(array $args = [])
 * @phpstan-method \Aws\Result listAutomationRulesV2(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationRulesV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomationRulesV2Async(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listConfigurationPolicies(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationPolicies(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationPoliciesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listConfigurationPolicyAssociations(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationPolicyAssociations(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{
 *         ConfigurationPolicyId?: string,
 *         AssociationType?: 'APPLIED'|'INHERITED',
 *         AssociationStatus?: 'FAILED'|'PENDING'|'SUCCESS',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationPolicyAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationPolicyAssociationsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array{
 *         ConfigurationPolicyId?: string,
 *         AssociationType?: 'APPLIED'|'INHERITED',
 *         AssociationStatus?: 'FAILED'|'PENDING'|'SUCCESS',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProviderName?: 'AZURE',
 *     ConnectorStatus?: 'CONNECTED'|'DEGRADED'|'FAILED_TO_CONNECT'|'UNKNOWN',
 *     EnablementStatus?: 'ENABLED'|'PENDING_DELETION'|'PENDING_ENABLEMENT'|'PENDING_UPDATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProviderName?: 'AZURE',
 *     ConnectorStatus?: 'CONNECTED'|'DEGRADED'|'FAILED_TO_CONNECT'|'UNKNOWN',
 *     EnablementStatus?: 'ENABLED'|'PENDING_DELETION'|'PENDING_ENABLEMENT'|'PENDING_UPDATE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnectorsV2(array $args = [])
 * @phpstan-method \Aws\Result listConnectorsV2(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProviderName?: 'AZURE'|'JIRA_CLOUD'|'SERVICENOW',
 *     ConnectorStatus?: 'CONNECTED'|'DEGRADED'|'FAILED_TO_CONNECT'|'PENDING_AUTHORIZATION'|'PENDING_CONFIGURATION'|'UNKNOWN',
 *     EnablementStatus?: 'ENABLED'|'FAILED_TO_DELETE'|'FAILED_TO_ENABLE'|'FAILED_TO_UPDATE'|'PENDING_DELETION'|'PENDING_ENABLEMENT'|'PENDING_UPDATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsV2Async(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProviderName?: 'AZURE'|'JIRA_CLOUD'|'SERVICENOW',
 *     ConnectorStatus?: 'CONNECTED'|'DEGRADED'|'FAILED_TO_CONNECT'|'PENDING_AUTHORIZATION'|'PENDING_CONFIGURATION'|'UNKNOWN',
 *     EnablementStatus?: 'ENABLED'|'FAILED_TO_DELETE'|'FAILED_TO_ENABLE'|'FAILED_TO_UPDATE'|'PENDING_DELETION'|'PENDING_ENABLEMENT'|'PENDING_UPDATE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnabledProductsForImport(array $args = [])
 * @phpstan-method \Aws\Result listEnabledProductsForImport(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnabledProductsForImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnabledProductsForImportAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFindingAggregators(array $args = [])
 * @phpstan-method \Aws\Result listFindingAggregators(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingAggregatorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingAggregatorsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listInvitations(array $args = [])
 * @phpstan-method \Aws\Result listInvitations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvitationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @phpstan-method \Aws\Result listMembers(array{OnlyAssociated?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersAsync(array{OnlyAssociated?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOrganizationAdminAccounts(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationAdminAccounts(array{MaxResults?: int, NextToken?: string, Feature?: 'SecurityHub'|'SecurityHubV2', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array{MaxResults?: int, NextToken?: string, Feature?: 'SecurityHub'|'SecurityHubV2', ...} $args = [])
 * @method \Aws\Result listSecurityControlDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listSecurityControlDefinitions(array{StandardsArn?: string, NextToken?: string, MaxResults?: int, Providers?: list<'AWS'|'Azure'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityControlDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityControlDefinitionsAsync(array{StandardsArn?: string, NextToken?: string, MaxResults?: int, Providers?: list<'AWS'|'Azure'>, ...} $args = [])
 * @method \Aws\Result listStandardsControlAssociations(array $args = [])
 * @phpstan-method \Aws\Result listStandardsControlAssociations(array{SecurityControlId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStandardsControlAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStandardsControlAssociationsAsync(array{SecurityControlId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerConnectorV2(array $args = [])
 * @phpstan-method \Aws\Result registerConnectorV2(array{AuthCode?: string, AuthState?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerConnectorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerConnectorV2Async(array{AuthCode?: string, AuthState?: string, ...} $args = [])
 * @method \Aws\Result startConfigurationPolicyAssociation(array $args = [])
 * @phpstan-method \Aws\Result startConfigurationPolicyAssociation(array{
 *     ConfigurationPolicyIdentifier?: string,
 *     Target?: array{AccountId?: string, OrganizationalUnitId?: string, RootId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startConfigurationPolicyAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startConfigurationPolicyAssociationAsync(array{
 *     ConfigurationPolicyIdentifier?: string,
 *     Target?: array{AccountId?: string, OrganizationalUnitId?: string, RootId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startConfigurationPolicyDisassociation(array $args = [])
 * @phpstan-method \Aws\Result startConfigurationPolicyDisassociation(array{
 *     Target?: array{AccountId?: string, OrganizationalUnitId?: string, RootId?: string, ...},
 *     ConfigurationPolicyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startConfigurationPolicyDisassociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startConfigurationPolicyDisassociationAsync(array{
 *     Target?: array{AccountId?: string, OrganizationalUnitId?: string, RootId?: string, ...},
 *     ConfigurationPolicyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateActionTarget(array $args = [])
 * @phpstan-method \Aws\Result updateActionTarget(array{ActionTargetArn?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActionTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateActionTargetAsync(array{ActionTargetArn?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateAggregatorV2(array $args = [])
 * @phpstan-method \Aws\Result updateAggregatorV2(array{AggregatorV2Arn?: string, RegionLinkingMode?: string, LinkedRegions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAggregatorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAggregatorV2Async(array{AggregatorV2Arn?: string, RegionLinkingMode?: string, LinkedRegions?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAutomationRuleV2(array $args = [])
 * @phpstan-method \Aws\Result updateAutomationRuleV2(array{
 *     Identifier?: string,
 *     RuleStatus?: 'DISABLED'|'ENABLED',
 *     RuleOrder?: float,
 *     Description?: string,
 *     RuleName?: string,
 *     Criteria?: array{OcsfFindingCriteria?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...}, ...},
 *     Actions?: list<array{
 *         Type?: 'EXTERNAL_INTEGRATION'|'FINDING_FIELDS_UPDATE',
 *         FindingFieldsUpdate?: array,
 *         ExternalIntegrationConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutomationRuleV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutomationRuleV2Async(array{
 *     Identifier?: string,
 *     RuleStatus?: 'DISABLED'|'ENABLED',
 *     RuleOrder?: float,
 *     Description?: string,
 *     RuleName?: string,
 *     Criteria?: array{OcsfFindingCriteria?: array{CompositeFilters?: list<array>, CompositeOperator?: 'AND'|'OR', ...}, ...},
 *     Actions?: list<array{
 *         Type?: 'EXTERNAL_INTEGRATION'|'FINDING_FIELDS_UPDATE',
 *         FindingFieldsUpdate?: array,
 *         ExternalIntegrationConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfigurationPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationPolicy(array{
 *     Identifier?: string,
 *     Name?: string,
 *     Description?: string,
 *     UpdatedReason?: string,
 *     ConfigurationPolicy?: array{
 *         SecurityHub?: array{
 *             ServiceEnabled?: bool,
 *             EnabledStandardIdentifiers?: list<string>,
 *             SecurityControlsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationPolicyAsync(array{
 *     Identifier?: string,
 *     Name?: string,
 *     Description?: string,
 *     UpdatedReason?: string,
 *     ConfigurationPolicy?: array{
 *         SecurityHub?: array{
 *             ServiceEnabled?: bool,
 *             EnabledStandardIdentifiers?: list<string>,
 *             SecurityControlsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnector(array $args = [])
 * @phpstan-method \Aws\Result updateConnector(array{
 *     ConnectorId?: string,
 *     Description?: string,
 *     Provider?: array{Azure?: array{ScopeConfiguration?: array, AzureRegions?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorAsync(array{
 *     ConnectorId?: string,
 *     Description?: string,
 *     Provider?: array{Azure?: array{ScopeConfiguration?: array, AzureRegions?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnectorV2(array $args = [])
 * @phpstan-method \Aws\Result updateConnectorV2(array{
 *     ConnectorId?: string,
 *     Description?: string,
 *     Provider?: array{
 *         JiraCloud?: array{ProjectKey?: string, ...},
 *         ServiceNow?: array{SecretArn?: string, ...},
 *         Azure?: array{ScopeConfiguration?: array, AzureRegions?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorV2Async(array{
 *     ConnectorId?: string,
 *     Description?: string,
 *     Provider?: array{
 *         JiraCloud?: array{ProjectKey?: string, ...},
 *         ServiceNow?: array{SecretArn?: string, ...},
 *         Azure?: array{ScopeConfiguration?: array, AzureRegions?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFindingAggregator(array $args = [])
 * @phpstan-method \Aws\Result updateFindingAggregator(array{FindingAggregatorArn?: string, RegionLinkingMode?: string, Regions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingAggregatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFindingAggregatorAsync(array{FindingAggregatorArn?: string, RegionLinkingMode?: string, Regions?: list<string>, ...} $args = [])
 * @method \Aws\Result updateFindings(array $args = [])
 * @phpstan-method \Aws\Result updateFindings(array{
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     Note?: array{Text?: string, UpdatedBy?: string, ...},
 *     RecordState?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFindingsAsync(array{
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     Note?: array{Text?: string, UpdatedBy?: string, ...},
 *     RecordState?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInsight(array $args = [])
 * @phpstan-method \Aws\Result updateInsight(array{
 *     InsightArn?: string,
 *     Name?: string,
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     GroupByAttribute?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInsightAsync(array{
 *     InsightArn?: string,
 *     Name?: string,
 *     Filters?: array{
 *         ProductArn?: list<array>,
 *         AwsAccountId?: list<array>,
 *         Id?: list<array>,
 *         GeneratorId?: list<array>,
 *         Region?: list<array>,
 *         Type?: list<array>,
 *         FirstObservedAt?: list<array>,
 *         LastObservedAt?: list<array>,
 *         CreatedAt?: list<array>,
 *         UpdatedAt?: list<array>,
 *         SeverityProduct?: list<array>,
 *         SeverityNormalized?: list<array>,
 *         SeverityLabel?: list<array>,
 *         Confidence?: list<array>,
 *         Criticality?: list<array>,
 *         Title?: list<array>,
 *         Description?: list<array>,
 *         RecommendationText?: list<array>,
 *         SourceUrl?: list<array>,
 *         ProductFields?: list<array>,
 *         ProductName?: list<array>,
 *         CompanyName?: list<array>,
 *         UserDefinedFields?: list<array>,
 *         MalwareName?: list<array>,
 *         MalwareType?: list<array>,
 *         MalwarePath?: list<array>,
 *         MalwareState?: list<array>,
 *         NetworkDirection?: list<array>,
 *         NetworkProtocol?: list<array>,
 *         NetworkSourceIpV4?: list<array>,
 *         NetworkSourceIpV6?: list<array>,
 *         NetworkSourcePort?: list<array>,
 *         NetworkSourceDomain?: list<array>,
 *         NetworkSourceMac?: list<array>,
 *         NetworkDestinationIpV4?: list<array>,
 *         NetworkDestinationIpV6?: list<array>,
 *         NetworkDestinationPort?: list<array>,
 *         NetworkDestinationDomain?: list<array>,
 *         ProcessName?: list<array>,
 *         ProcessPath?: list<array>,
 *         ProcessPid?: list<array>,
 *         ProcessParentPid?: list<array>,
 *         ProcessLaunchedAt?: list<array>,
 *         ProcessTerminatedAt?: list<array>,
 *         ThreatIntelIndicatorType?: list<array>,
 *         ThreatIntelIndicatorValue?: list<array>,
 *         ThreatIntelIndicatorCategory?: list<array>,
 *         ThreatIntelIndicatorLastObservedAt?: list<array>,
 *         ThreatIntelIndicatorSource?: list<array>,
 *         ThreatIntelIndicatorSourceUrl?: list<array>,
 *         ResourceType?: list<array>,
 *         ResourceId?: list<array>,
 *         ResourcePartition?: list<array>,
 *         ResourceRegion?: list<array>,
 *         ResourceTags?: list<array>,
 *         ResourceAwsEc2InstanceType?: list<array>,
 *         ResourceAwsEc2InstanceImageId?: list<array>,
 *         ResourceAwsEc2InstanceIpV4Addresses?: list<array>,
 *         ResourceAwsEc2InstanceIpV6Addresses?: list<array>,
 *         ResourceAwsEc2InstanceKeyName?: list<array>,
 *         ResourceAwsEc2InstanceIamInstanceProfileArn?: list<array>,
 *         ResourceAwsEc2InstanceVpcId?: list<array>,
 *         ResourceAwsEc2InstanceSubnetId?: list<array>,
 *         ResourceAwsEc2InstanceLaunchedAt?: list<array>,
 *         ResourceAwsS3BucketOwnerId?: list<array>,
 *         ResourceAwsS3BucketOwnerName?: list<array>,
 *         ResourceAwsIamAccessKeyUserName?: list<array>,
 *         ResourceAwsIamAccessKeyPrincipalName?: list<array>,
 *         ResourceAwsIamAccessKeyStatus?: list<array>,
 *         ResourceAwsIamAccessKeyCreatedAt?: list<array>,
 *         ResourceAwsIamUserUserName?: list<array>,
 *         ResourceContainerName?: list<array>,
 *         ResourceContainerImageId?: list<array>,
 *         ResourceContainerImageName?: list<array>,
 *         ResourceContainerLaunchedAt?: list<array>,
 *         ResourceDetailsOther?: list<array>,
 *         ComplianceStatus?: list<array>,
 *         VerificationState?: list<array>,
 *         WorkflowState?: list<array>,
 *         WorkflowStatus?: list<array>,
 *         RecordState?: list<array>,
 *         RelatedFindingsProductArn?: list<array>,
 *         RelatedFindingsId?: list<array>,
 *         NoteText?: list<array>,
 *         NoteUpdatedAt?: list<array>,
 *         NoteUpdatedBy?: list<array>,
 *         Keyword?: list<array>,
 *         FindingProviderFieldsConfidence?: list<array>,
 *         FindingProviderFieldsCriticality?: list<array>,
 *         FindingProviderFieldsRelatedFindingsId?: list<array>,
 *         FindingProviderFieldsRelatedFindingsProductArn?: list<array>,
 *         FindingProviderFieldsSeverityLabel?: list<array>,
 *         FindingProviderFieldsSeverityOriginal?: list<array>,
 *         FindingProviderFieldsTypes?: list<array>,
 *         Sample?: list<array>,
 *         ComplianceSecurityControlId?: list<array>,
 *         ComplianceAssociatedStandardsId?: list<array>,
 *         VulnerabilitiesExploitAvailable?: list<array>,
 *         VulnerabilitiesFixAvailable?: list<array>,
 *         ComplianceSecurityControlParametersName?: list<array>,
 *         ComplianceSecurityControlParametersValue?: list<array>,
 *         AwsAccountName?: list<array>,
 *         ResourceApplicationName?: list<array>,
 *         ResourceApplicationArn?: list<array>,
 *         ResourceOwnerAccountId?: list<array>,
 *         ResourceOwnerOrgId?: list<array>,
 *         ResourceProvider?: list<array>,
 *         ...,
 *     },
 *     GroupByAttribute?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateOrganizationConfiguration(array{
 *     AutoEnable?: bool,
 *     AutoEnableStandards?: 'DEFAULT'|'NONE',
 *     OrganizationConfiguration?: array{
 *         ConfigurationType?: 'CENTRAL'|'LOCAL',
 *         Status?: 'ENABLED'|'FAILED'|'PENDING',
 *         StatusMessage?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array{
 *     AutoEnable?: bool,
 *     AutoEnableStandards?: 'DEFAULT'|'NONE',
 *     OrganizationConfiguration?: array{
 *         ConfigurationType?: 'CENTRAL'|'LOCAL',
 *         Status?: 'ENABLED'|'FAILED'|'PENDING',
 *         StatusMessage?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurityControl(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityControl(array{
 *     SecurityControlId?: string,
 *     Parameters?: array<string, array{ValueType?: 'CUSTOM'|'DEFAULT', Value?: array, ...}>,
 *     LastUpdateReason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityControlAsync(array{
 *     SecurityControlId?: string,
 *     Parameters?: array<string, array{ValueType?: 'CUSTOM'|'DEFAULT', Value?: array, ...}>,
 *     LastUpdateReason?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurityHubConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityHubConfiguration(array{AutoEnableControls?: bool, ControlFindingGenerator?: 'SECURITY_CONTROL'|'STANDARD_CONTROL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityHubConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityHubConfigurationAsync(array{AutoEnableControls?: bool, ControlFindingGenerator?: 'SECURITY_CONTROL'|'STANDARD_CONTROL', ...} $args = [])
 * @method \Aws\Result updateStandardsControl(array $args = [])
 * @phpstan-method \Aws\Result updateStandardsControl(array{StandardsControlArn?: string, ControlStatus?: 'DISABLED'|'ENABLED', DisabledReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStandardsControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStandardsControlAsync(array{StandardsControlArn?: string, ControlStatus?: 'DISABLED'|'ENABLED', DisabledReason?: string, ...} $args = [])
 */
class SecurityHubClient extends AwsClient {}
