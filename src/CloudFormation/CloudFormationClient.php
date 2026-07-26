<?php
namespace Aws\CloudFormation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudFormation** service.
 *
 * @method \Aws\Result activateOrganizationsAccess(array $args = [])
 * @phpstan-method \Aws\Result activateOrganizationsAccess(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateOrganizationsAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateOrganizationsAccessAsync(array{...} $args = [])
 * @method \Aws\Result activateType(array $args = [])
 * @phpstan-method \Aws\Result activateType(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     PublicTypeArn?: string,
 *     PublisherId?: string,
 *     TypeName?: string,
 *     TypeNameAlias?: string,
 *     AutoUpdate?: bool,
 *     LoggingConfig?: array{LogRoleArn?: string, LogGroupName?: string, ...},
 *     ExecutionRoleArn?: string,
 *     VersionBump?: 'MAJOR'|'MINOR',
 *     MajorVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise activateTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateTypeAsync(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     PublicTypeArn?: string,
 *     PublisherId?: string,
 *     TypeName?: string,
 *     TypeNameAlias?: string,
 *     AutoUpdate?: bool,
 *     LoggingConfig?: array{LogRoleArn?: string, LogGroupName?: string, ...},
 *     ExecutionRoleArn?: string,
 *     VersionBump?: 'MAJOR'|'MINOR',
 *     MajorVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDescribeTypeConfigurations(array $args = [])
 * @phpstan-method \Aws\Result batchDescribeTypeConfigurations(array{
 *     TypeConfigurationIdentifiers?: list<array{
 *         TypeArn?: string,
 *         TypeConfigurationAlias?: string,
 *         TypeConfigurationArn?: string,
 *         Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *         TypeName?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDescribeTypeConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDescribeTypeConfigurationsAsync(array{
 *     TypeConfigurationIdentifiers?: list<array{
 *         TypeArn?: string,
 *         TypeConfigurationAlias?: string,
 *         TypeConfigurationArn?: string,
 *         Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *         TypeName?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelUpdateStack(array $args = [])
 * @phpstan-method \Aws\Result cancelUpdateStack(array{StackName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelUpdateStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelUpdateStackAsync(array{StackName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result continueUpdateRollback(array $args = [])
 * @phpstan-method \Aws\Result continueUpdateRollback(array{StackName?: string, RoleARN?: string, ResourcesToSkip?: list<string>, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise continueUpdateRollbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise continueUpdateRollbackAsync(array{StackName?: string, RoleARN?: string, ResourcesToSkip?: list<string>, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createChangeSet(array $args = [])
 * @phpstan-method \Aws\Result createChangeSet(array{
 *     StackName?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     UsePreviousTemplate?: bool,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     ResourceTypes?: list<string>,
 *     RoleARN?: string,
 *     RollbackConfiguration?: array{RollbackTriggers?: list<array>, MonitoringTimeInMinutes?: int, ...},
 *     NotificationARNs?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ChangeSetName?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     ChangeSetType?: 'CREATE'|'IMPORT'|'UPDATE',
 *     ResourcesToImport?: list<array{ResourceType?: string, LogicalResourceId?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     IncludeNestedStacks?: bool,
 *     OnStackFailure?: 'DELETE'|'DO_NOTHING'|'ROLLBACK',
 *     ImportExistingResources?: bool,
 *     DeploymentMode?: 'REVERT_DRIFT',
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     DisableValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChangeSetAsync(array{
 *     StackName?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     UsePreviousTemplate?: bool,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     ResourceTypes?: list<string>,
 *     RoleARN?: string,
 *     RollbackConfiguration?: array{RollbackTriggers?: list<array>, MonitoringTimeInMinutes?: int, ...},
 *     NotificationARNs?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ChangeSetName?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     ChangeSetType?: 'CREATE'|'IMPORT'|'UPDATE',
 *     ResourcesToImport?: list<array{ResourceType?: string, LogicalResourceId?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     IncludeNestedStacks?: bool,
 *     OnStackFailure?: 'DELETE'|'DO_NOTHING'|'ROLLBACK',
 *     ImportExistingResources?: bool,
 *     DeploymentMode?: 'REVERT_DRIFT',
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     DisableValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGeneratedTemplate(array $args = [])
 * @phpstan-method \Aws\Result createGeneratedTemplate(array{
 *     Resources?: list<array{ResourceType?: string, LogicalResourceId?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     GeneratedTemplateName?: string,
 *     StackName?: string,
 *     TemplateConfiguration?: array{DeletionPolicy?: 'DELETE'|'RETAIN', UpdateReplacePolicy?: 'DELETE'|'RETAIN', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGeneratedTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGeneratedTemplateAsync(array{
 *     Resources?: list<array{ResourceType?: string, LogicalResourceId?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     GeneratedTemplateName?: string,
 *     StackName?: string,
 *     TemplateConfiguration?: array{DeletionPolicy?: 'DELETE'|'RETAIN', UpdateReplacePolicy?: 'DELETE'|'RETAIN', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStack(array $args = [])
 * @phpstan-method \Aws\Result createStack(array{
 *     StackName?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     DisableRollback?: bool,
 *     RollbackConfiguration?: array{RollbackTriggers?: list<array>, MonitoringTimeInMinutes?: int, ...},
 *     TimeoutInMinutes?: int,
 *     NotificationARNs?: list<string>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     ResourceTypes?: list<string>,
 *     RoleARN?: string,
 *     OnFailure?: 'DELETE'|'DO_NOTHING'|'ROLLBACK',
 *     StackPolicyBody?: string,
 *     StackPolicyURL?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     EnableTerminationProtection?: bool,
 *     RetainExceptOnCreate?: bool,
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     DisableValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStackAsync(array{
 *     StackName?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     DisableRollback?: bool,
 *     RollbackConfiguration?: array{RollbackTriggers?: list<array>, MonitoringTimeInMinutes?: int, ...},
 *     TimeoutInMinutes?: int,
 *     NotificationARNs?: list<string>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     ResourceTypes?: list<string>,
 *     RoleARN?: string,
 *     OnFailure?: 'DELETE'|'DO_NOTHING'|'ROLLBACK',
 *     StackPolicyBody?: string,
 *     StackPolicyURL?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     EnableTerminationProtection?: bool,
 *     RetainExceptOnCreate?: bool,
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     DisableValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStackInstances(array $args = [])
 * @phpstan-method \Aws\Result createStackInstances(array{
 *     StackSetName?: string,
 *     Accounts?: list<string>,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     Regions?: list<string>,
 *     ParameterOverrides?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStackInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStackInstancesAsync(array{
 *     StackSetName?: string,
 *     Accounts?: list<string>,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     Regions?: list<string>,
 *     ParameterOverrides?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStackRefactor(array $args = [])
 * @phpstan-method \Aws\Result createStackRefactor(array{
 *     Description?: string,
 *     EnableStackCreation?: bool,
 *     ResourceMappings?: list<array{Source?: array, Destination?: array, ...}>,
 *     StackDefinitions?: list<array{StackName?: string, TemplateBody?: string, TemplateURL?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStackRefactorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStackRefactorAsync(array{
 *     Description?: string,
 *     EnableStackCreation?: bool,
 *     ResourceMappings?: list<array{Source?: array, Destination?: array, ...}>,
 *     StackDefinitions?: list<array{StackName?: string, TemplateBody?: string, TemplateURL?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStackSet(array $args = [])
 * @phpstan-method \Aws\Result createStackSet(array{
 *     StackSetName?: string,
 *     Description?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     StackId?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AdministrationRoleARN?: string,
 *     ExecutionRoleName?: string,
 *     PermissionModel?: 'SELF_MANAGED'|'SERVICE_MANAGED',
 *     AutoDeployment?: array{Enabled?: bool, RetainStacksOnAccountRemoval?: bool, DependsOn?: list<string>, ...},
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ClientRequestToken?: string,
 *     ManagedExecution?: array{Active?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStackSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStackSetAsync(array{
 *     StackSetName?: string,
 *     Description?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     StackId?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AdministrationRoleARN?: string,
 *     ExecutionRoleName?: string,
 *     PermissionModel?: 'SELF_MANAGED'|'SERVICE_MANAGED',
 *     AutoDeployment?: array{Enabled?: bool, RetainStacksOnAccountRemoval?: bool, DependsOn?: list<string>, ...},
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ClientRequestToken?: string,
 *     ManagedExecution?: array{Active?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivateOrganizationsAccess(array $args = [])
 * @phpstan-method \Aws\Result deactivateOrganizationsAccess(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateOrganizationsAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateOrganizationsAccessAsync(array{...} $args = [])
 * @method \Aws\Result deactivateType(array $args = [])
 * @phpstan-method \Aws\Result deactivateType(array{TypeName?: string, Type?: 'HOOK'|'MODULE'|'RESOURCE', Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateTypeAsync(array{TypeName?: string, Type?: 'HOOK'|'MODULE'|'RESOURCE', Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteChangeSet(array $args = [])
 * @phpstan-method \Aws\Result deleteChangeSet(array{ChangeSetName?: string, StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChangeSetAsync(array{ChangeSetName?: string, StackName?: string, ...} $args = [])
 * @method \Aws\Result deleteGeneratedTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteGeneratedTemplate(array{GeneratedTemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGeneratedTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGeneratedTemplateAsync(array{GeneratedTemplateName?: string, ...} $args = [])
 * @method \Aws\Result deleteStack(array $args = [])
 * @phpstan-method \Aws\Result deleteStack(array{
 *     StackName?: string,
 *     RetainResources?: list<string>,
 *     RoleARN?: string,
 *     ClientRequestToken?: string,
 *     DeletionMode?: 'FORCE_DELETE_STACK'|'STANDARD',
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStackAsync(array{
 *     StackName?: string,
 *     RetainResources?: list<string>,
 *     RoleARN?: string,
 *     ClientRequestToken?: string,
 *     DeletionMode?: 'FORCE_DELETE_STACK'|'STANDARD',
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteStackInstances(array $args = [])
 * @phpstan-method \Aws\Result deleteStackInstances(array{
 *     StackSetName?: string,
 *     Accounts?: list<string>,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     Regions?: list<string>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     RetainStacks?: bool,
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStackInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStackInstancesAsync(array{
 *     StackSetName?: string,
 *     Accounts?: list<string>,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     Regions?: list<string>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     RetainStacks?: bool,
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteStackSet(array $args = [])
 * @phpstan-method \Aws\Result deleteStackSet(array{StackSetName?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStackSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStackSetAsync(array{StackSetName?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \Aws\Result deregisterType(array $args = [])
 * @phpstan-method \Aws\Result deregisterType(array{Arn?: string, Type?: 'HOOK'|'MODULE'|'RESOURCE', TypeName?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterTypeAsync(array{Arn?: string, Type?: 'HOOK'|'MODULE'|'RESOURCE', TypeName?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result describeAccountLimits(array $args = [])
 * @phpstan-method \Aws\Result describeAccountLimits(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeChangeSet(array $args = [])
 * @phpstan-method \Aws\Result describeChangeSet(array{ChangeSetName?: string, StackName?: string, NextToken?: string, IncludePropertyValues?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChangeSetAsync(array{ChangeSetName?: string, StackName?: string, NextToken?: string, IncludePropertyValues?: bool, ...} $args = [])
 * @method \Aws\Result describeChangeSetHooks(array $args = [])
 * @phpstan-method \Aws\Result describeChangeSetHooks(array{ChangeSetName?: string, StackName?: string, NextToken?: string, LogicalResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChangeSetHooksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChangeSetHooksAsync(array{ChangeSetName?: string, StackName?: string, NextToken?: string, LogicalResourceId?: string, ...} $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @phpstan-method \Aws\Result describeEvents(array{
 *     StackName?: string,
 *     ChangeSetName?: string,
 *     OperationId?: string,
 *     Filters?: array{FailedEvents?: bool, ...},
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsAsync(array{
 *     StackName?: string,
 *     ChangeSetName?: string,
 *     OperationId?: string,
 *     Filters?: array{FailedEvents?: bool, ...},
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeGeneratedTemplate(array $args = [])
 * @phpstan-method \Aws\Result describeGeneratedTemplate(array{GeneratedTemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGeneratedTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGeneratedTemplateAsync(array{GeneratedTemplateName?: string, ...} $args = [])
 * @method \Aws\Result describeOrganizationsAccess(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationsAccess(array{CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationsAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationsAccessAsync(array{CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \Aws\Result describePublisher(array $args = [])
 * @phpstan-method \Aws\Result describePublisher(array{PublisherId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePublisherAsync(array{PublisherId?: string, ...} $args = [])
 * @method \Aws\Result describeResourceScan(array $args = [])
 * @phpstan-method \Aws\Result describeResourceScan(array{ResourceScanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourceScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourceScanAsync(array{ResourceScanId?: string, ...} $args = [])
 * @method \Aws\Result describeStackDriftDetectionStatus(array $args = [])
 * @phpstan-method \Aws\Result describeStackDriftDetectionStatus(array{StackDriftDetectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackDriftDetectionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackDriftDetectionStatusAsync(array{StackDriftDetectionId?: string, ...} $args = [])
 * @method \Aws\Result describeStackEvents(array $args = [])
 * @phpstan-method \Aws\Result describeStackEvents(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackEventsAsync(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeStackInstance(array $args = [])
 * @phpstan-method \Aws\Result describeStackInstance(array{
 *     StackSetName?: string,
 *     StackInstanceAccount?: string,
 *     StackInstanceRegion?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackInstanceAsync(array{
 *     StackSetName?: string,
 *     StackInstanceAccount?: string,
 *     StackInstanceRegion?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeStackRefactor(array $args = [])
 * @phpstan-method \Aws\Result describeStackRefactor(array{StackRefactorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackRefactorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackRefactorAsync(array{StackRefactorId?: string, ...} $args = [])
 * @method \Aws\Result describeStackResource(array $args = [])
 * @phpstan-method \Aws\Result describeStackResource(array{StackName?: string, LogicalResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackResourceAsync(array{StackName?: string, LogicalResourceId?: string, ...} $args = [])
 * @method \Aws\Result describeStackResourceDrifts(array $args = [])
 * @phpstan-method \Aws\Result describeStackResourceDrifts(array{
 *     StackName?: string,
 *     StackResourceDriftStatusFilters?: list<'DELETED'|'IN_SYNC'|'MODIFIED'|'NOT_CHECKED'|'UNKNOWN'|'UNSUPPORTED'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackResourceDriftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackResourceDriftsAsync(array{
 *     StackName?: string,
 *     StackResourceDriftStatusFilters?: list<'DELETED'|'IN_SYNC'|'MODIFIED'|'NOT_CHECKED'|'UNKNOWN'|'UNSUPPORTED'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeStackResources(array $args = [])
 * @phpstan-method \Aws\Result describeStackResources(array{StackName?: string, LogicalResourceId?: string, PhysicalResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackResourcesAsync(array{StackName?: string, LogicalResourceId?: string, PhysicalResourceId?: string, ...} $args = [])
 * @method \Aws\Result describeStackSet(array $args = [])
 * @phpstan-method \Aws\Result describeStackSet(array{StackSetName?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackSetAsync(array{StackSetName?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \Aws\Result describeStackSetOperation(array $args = [])
 * @phpstan-method \Aws\Result describeStackSetOperation(array{StackSetName?: string, OperationId?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackSetOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStackSetOperationAsync(array{StackSetName?: string, OperationId?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \Aws\Result describeStacks(array $args = [])
 * @phpstan-method \Aws\Result describeStacks(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStacksAsync(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeType(array $args = [])
 * @phpstan-method \Aws\Result describeType(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     Arn?: string,
 *     VersionId?: string,
 *     PublisherId?: string,
 *     PublicVersionNumber?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTypeAsync(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     Arn?: string,
 *     VersionId?: string,
 *     PublisherId?: string,
 *     PublicVersionNumber?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTypeRegistration(array $args = [])
 * @phpstan-method \Aws\Result describeTypeRegistration(array{RegistrationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTypeRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTypeRegistrationAsync(array{RegistrationToken?: string, ...} $args = [])
 * @method \Aws\Result detectStackDrift(array $args = [])
 * @phpstan-method \Aws\Result detectStackDrift(array{StackName?: string, LogicalResourceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectStackDriftAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectStackDriftAsync(array{StackName?: string, LogicalResourceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result detectStackResourceDrift(array $args = [])
 * @phpstan-method \Aws\Result detectStackResourceDrift(array{StackName?: string, LogicalResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectStackResourceDriftAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectStackResourceDriftAsync(array{StackName?: string, LogicalResourceId?: string, ...} $args = [])
 * @method \Aws\Result detectStackSetDrift(array $args = [])
 * @phpstan-method \Aws\Result detectStackSetDrift(array{
 *     StackSetName?: string,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectStackSetDriftAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectStackSetDriftAsync(array{
 *     StackSetName?: string,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result estimateTemplateCost(array $args = [])
 * @phpstan-method \Aws\Result estimateTemplateCost(array{
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise estimateTemplateCostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise estimateTemplateCostAsync(array{
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeChangeSet(array $args = [])
 * @phpstan-method \Aws\Result executeChangeSet(array{
 *     ChangeSetName?: string,
 *     StackName?: string,
 *     ClientRequestToken?: string,
 *     DisableRollback?: bool,
 *     RetainExceptOnCreate?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeChangeSetAsync(array{
 *     ChangeSetName?: string,
 *     StackName?: string,
 *     ClientRequestToken?: string,
 *     DisableRollback?: bool,
 *     RetainExceptOnCreate?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeStackRefactor(array $args = [])
 * @phpstan-method \Aws\Result executeStackRefactor(array{StackRefactorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeStackRefactorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeStackRefactorAsync(array{StackRefactorId?: string, ...} $args = [])
 * @method \Aws\Result getGeneratedTemplate(array $args = [])
 * @phpstan-method \Aws\Result getGeneratedTemplate(array{Format?: 'JSON'|'YAML', GeneratedTemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGeneratedTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGeneratedTemplateAsync(array{Format?: 'JSON'|'YAML', GeneratedTemplateName?: string, ...} $args = [])
 * @method \Aws\Result getHookResult(array $args = [])
 * @phpstan-method \Aws\Result getHookResult(array{HookResultId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHookResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHookResultAsync(array{HookResultId?: string, ...} $args = [])
 * @method \Aws\Result getStackPolicy(array $args = [])
 * @phpstan-method \Aws\Result getStackPolicy(array{StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStackPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStackPolicyAsync(array{StackName?: string, ...} $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @phpstan-method \Aws\Result getTemplate(array{StackName?: string, ChangeSetName?: string, TemplateStage?: 'Original'|'Processed', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateAsync(array{StackName?: string, ChangeSetName?: string, TemplateStage?: 'Original'|'Processed', ...} $args = [])
 * @method \Aws\Result getTemplateSummary(array $args = [])
 * @phpstan-method \Aws\Result getTemplateSummary(array{
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     StackName?: string,
 *     StackSetName?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     TemplateSummaryConfig?: array{TreatUnrecognizedResourceTypesAsWarnings?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateSummaryAsync(array{
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     StackName?: string,
 *     StackSetName?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     TemplateSummaryConfig?: array{TreatUnrecognizedResourceTypesAsWarnings?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result importStacksToStackSet(array $args = [])
 * @phpstan-method \Aws\Result importStacksToStackSet(array{
 *     StackSetName?: string,
 *     StackIds?: list<string>,
 *     StackIdsUrl?: string,
 *     OrganizationalUnitIds?: list<string>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importStacksToStackSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importStacksToStackSetAsync(array{
 *     StackSetName?: string,
 *     StackIds?: list<string>,
 *     StackIdsUrl?: string,
 *     OrganizationalUnitIds?: list<string>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChangeSets(array $args = [])
 * @phpstan-method \Aws\Result listChangeSets(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChangeSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChangeSetsAsync(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listExports(array $args = [])
 * @phpstan-method \Aws\Result listExports(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGeneratedTemplates(array $args = [])
 * @phpstan-method \Aws\Result listGeneratedTemplates(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGeneratedTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGeneratedTemplatesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listHookResults(array $args = [])
 * @phpstan-method \Aws\Result listHookResults(array{
 *     TargetType?: 'CHANGE_SET'|'CLOUD_CONTROL'|'RESOURCE'|'STACK',
 *     TargetId?: string,
 *     TypeArn?: string,
 *     Status?: 'HOOK_COMPLETE_FAILED'|'HOOK_COMPLETE_SUCCEEDED'|'HOOK_FAILED'|'HOOK_IN_PROGRESS',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHookResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHookResultsAsync(array{
 *     TargetType?: 'CHANGE_SET'|'CLOUD_CONTROL'|'RESOURCE'|'STACK',
 *     TargetId?: string,
 *     TypeArn?: string,
 *     Status?: 'HOOK_COMPLETE_FAILED'|'HOOK_COMPLETE_SUCCEEDED'|'HOOK_FAILED'|'HOOK_IN_PROGRESS',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImports(array $args = [])
 * @phpstan-method \Aws\Result listImports(array{ExportName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportsAsync(array{ExportName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceScanRelatedResources(array $args = [])
 * @phpstan-method \Aws\Result listResourceScanRelatedResources(array{
 *     ResourceScanId?: string,
 *     Resources?: list<array{ResourceType?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceScanRelatedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceScanRelatedResourcesAsync(array{
 *     ResourceScanId?: string,
 *     Resources?: list<array{ResourceType?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceScanResources(array $args = [])
 * @phpstan-method \Aws\Result listResourceScanResources(array{
 *     ResourceScanId?: string,
 *     ResourceIdentifier?: string,
 *     ResourceTypePrefix?: string,
 *     TagKey?: string,
 *     TagValue?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceScanResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceScanResourcesAsync(array{
 *     ResourceScanId?: string,
 *     ResourceIdentifier?: string,
 *     ResourceTypePrefix?: string,
 *     TagKey?: string,
 *     TagValue?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceScans(array $args = [])
 * @phpstan-method \Aws\Result listResourceScans(array{NextToken?: string, MaxResults?: int, ScanTypeFilter?: 'FULL'|'PARTIAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceScansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceScansAsync(array{NextToken?: string, MaxResults?: int, ScanTypeFilter?: 'FULL'|'PARTIAL', ...} $args = [])
 * @method \Aws\Result listStackInstanceResourceDrifts(array $args = [])
 * @phpstan-method \Aws\Result listStackInstanceResourceDrifts(array{
 *     StackSetName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StackInstanceResourceDriftStatuses?: list<'DELETED'|'IN_SYNC'|'MODIFIED'|'NOT_CHECKED'|'UNKNOWN'|'UNSUPPORTED'>,
 *     StackInstanceAccount?: string,
 *     StackInstanceRegion?: string,
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackInstanceResourceDriftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackInstanceResourceDriftsAsync(array{
 *     StackSetName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StackInstanceResourceDriftStatuses?: list<'DELETED'|'IN_SYNC'|'MODIFIED'|'NOT_CHECKED'|'UNKNOWN'|'UNSUPPORTED'>,
 *     StackInstanceAccount?: string,
 *     StackInstanceRegion?: string,
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStackInstances(array $args = [])
 * @phpstan-method \Aws\Result listStackInstances(array{
 *     StackSetName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: 'DETAILED_STATUS'|'DRIFT_STATUS'|'LAST_OPERATION_ID', Values?: string, ...}>,
 *     StackInstanceAccount?: string,
 *     StackInstanceRegion?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackInstancesAsync(array{
 *     StackSetName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: 'DETAILED_STATUS'|'DRIFT_STATUS'|'LAST_OPERATION_ID', Values?: string, ...}>,
 *     StackInstanceAccount?: string,
 *     StackInstanceRegion?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStackRefactorActions(array $args = [])
 * @phpstan-method \Aws\Result listStackRefactorActions(array{StackRefactorId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackRefactorActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackRefactorActionsAsync(array{StackRefactorId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listStackRefactors(array $args = [])
 * @phpstan-method \Aws\Result listStackRefactors(array{
 *     ExecutionStatusFilter?: list<'AVAILABLE'|'EXECUTE_COMPLETE'|'EXECUTE_FAILED'|'EXECUTE_IN_PROGRESS'|'OBSOLETE'|'ROLLBACK_COMPLETE'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'UNAVAILABLE'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackRefactorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackRefactorsAsync(array{
 *     ExecutionStatusFilter?: list<'AVAILABLE'|'EXECUTE_COMPLETE'|'EXECUTE_FAILED'|'EXECUTE_IN_PROGRESS'|'OBSOLETE'|'ROLLBACK_COMPLETE'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'UNAVAILABLE'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStackResources(array $args = [])
 * @phpstan-method \Aws\Result listStackResources(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackResourcesAsync(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listStackSetAutoDeploymentTargets(array $args = [])
 * @phpstan-method \Aws\Result listStackSetAutoDeploymentTargets(array{StackSetName?: string, NextToken?: string, MaxResults?: int, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackSetAutoDeploymentTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackSetAutoDeploymentTargetsAsync(array{StackSetName?: string, NextToken?: string, MaxResults?: int, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \Aws\Result listStackSetOperationResults(array $args = [])
 * @phpstan-method \Aws\Result listStackSetOperationResults(array{
 *     StackSetName?: string,
 *     OperationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     Filters?: list<array{Name?: 'OPERATION_RESULT_STATUS', Values?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackSetOperationResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackSetOperationResultsAsync(array{
 *     StackSetName?: string,
 *     OperationId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     Filters?: list<array{Name?: 'OPERATION_RESULT_STATUS', Values?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStackSetOperations(array $args = [])
 * @phpstan-method \Aws\Result listStackSetOperations(array{StackSetName?: string, NextToken?: string, MaxResults?: int, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackSetOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackSetOperationsAsync(array{StackSetName?: string, NextToken?: string, MaxResults?: int, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \Aws\Result listStackSets(array $args = [])
 * @phpstan-method \Aws\Result listStackSets(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACTIVE'|'DELETED',
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackSetsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACTIVE'|'DELETED',
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStacks(array $args = [])
 * @phpstan-method \Aws\Result listStacks(array{
 *     NextToken?: string,
 *     StackStatusFilter?: list<'CREATE_COMPLETE'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'DELETE_COMPLETE'|'DELETE_FAILED'|'DELETE_IN_PROGRESS'|'IMPORT_COMPLETE'|'IMPORT_IN_PROGRESS'|'IMPORT_ROLLBACK_COMPLETE'|'IMPORT_ROLLBACK_FAILED'|'IMPORT_ROLLBACK_IN_PROGRESS'|'REVIEW_IN_PROGRESS'|'ROLLBACK_COMPLETE'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'UPDATE_COMPLETE'|'UPDATE_COMPLETE_CLEANUP_IN_PROGRESS'|'UPDATE_FAILED'|'UPDATE_IN_PROGRESS'|'UPDATE_ROLLBACK_COMPLETE'|'UPDATE_ROLLBACK_COMPLETE_CLEANUP_IN_PROGRESS'|'UPDATE_ROLLBACK_FAILED'|'UPDATE_ROLLBACK_IN_PROGRESS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStacksAsync(array{
 *     NextToken?: string,
 *     StackStatusFilter?: list<'CREATE_COMPLETE'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'DELETE_COMPLETE'|'DELETE_FAILED'|'DELETE_IN_PROGRESS'|'IMPORT_COMPLETE'|'IMPORT_IN_PROGRESS'|'IMPORT_ROLLBACK_COMPLETE'|'IMPORT_ROLLBACK_FAILED'|'IMPORT_ROLLBACK_IN_PROGRESS'|'REVIEW_IN_PROGRESS'|'ROLLBACK_COMPLETE'|'ROLLBACK_FAILED'|'ROLLBACK_IN_PROGRESS'|'UPDATE_COMPLETE'|'UPDATE_COMPLETE_CLEANUP_IN_PROGRESS'|'UPDATE_FAILED'|'UPDATE_IN_PROGRESS'|'UPDATE_ROLLBACK_COMPLETE'|'UPDATE_ROLLBACK_COMPLETE_CLEANUP_IN_PROGRESS'|'UPDATE_ROLLBACK_FAILED'|'UPDATE_ROLLBACK_IN_PROGRESS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTypeRegistrations(array $args = [])
 * @phpstan-method \Aws\Result listTypeRegistrations(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     TypeArn?: string,
 *     RegistrationStatusFilter?: 'COMPLETE'|'FAILED'|'IN_PROGRESS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypeRegistrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypeRegistrationsAsync(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     TypeArn?: string,
 *     RegistrationStatusFilter?: 'COMPLETE'|'FAILED'|'IN_PROGRESS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTypeVersions(array $args = [])
 * @phpstan-method \Aws\Result listTypeVersions(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     Arn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     DeprecatedStatus?: 'DEPRECATED'|'LIVE',
 *     PublisherId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypeVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypeVersionsAsync(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     Arn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     DeprecatedStatus?: 'DEPRECATED'|'LIVE',
 *     PublisherId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTypes(array $args = [])
 * @phpstan-method \Aws\Result listTypes(array{
 *     Visibility?: 'PRIVATE'|'PUBLIC',
 *     ProvisioningType?: 'FULLY_MUTABLE'|'IMMUTABLE'|'NON_PROVISIONABLE',
 *     DeprecatedStatus?: 'DEPRECATED'|'LIVE',
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     Filters?: array{
 *         Category?: 'ACTIVATED'|'AWS_TYPES'|'REGISTERED'|'THIRD_PARTY',
 *         PublisherId?: string,
 *         TypeNamePrefix?: string,
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypesAsync(array{
 *     Visibility?: 'PRIVATE'|'PUBLIC',
 *     ProvisioningType?: 'FULLY_MUTABLE'|'IMMUTABLE'|'NON_PROVISIONABLE',
 *     DeprecatedStatus?: 'DEPRECATED'|'LIVE',
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     Filters?: array{
 *         Category?: 'ACTIVATED'|'AWS_TYPES'|'REGISTERED'|'THIRD_PARTY',
 *         PublisherId?: string,
 *         TypeNamePrefix?: string,
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result publishType(array $args = [])
 * @phpstan-method \Aws\Result publishType(array{Type?: 'HOOK'|'MODULE'|'RESOURCE', Arn?: string, TypeName?: string, PublicVersionNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishTypeAsync(array{Type?: 'HOOK'|'MODULE'|'RESOURCE', Arn?: string, TypeName?: string, PublicVersionNumber?: string, ...} $args = [])
 * @method \Aws\Result recordHandlerProgress(array $args = [])
 * @phpstan-method \Aws\Result recordHandlerProgress(array{
 *     BearerToken?: string,
 *     OperationStatus?: 'FAILED'|'IN_PROGRESS'|'PENDING'|'SUCCESS',
 *     CurrentOperationStatus?: 'FAILED'|'IN_PROGRESS'|'PENDING'|'SUCCESS',
 *     StatusMessage?: string,
 *     ErrorCode?: 'AccessDenied'|'AlreadyExists'|'GeneralServiceException'|'HandlerInternalFailure'|'InternalFailure'|'InvalidCredentials'|'InvalidRequest'|'InvalidTypeConfiguration'|'NetworkFailure'|'NonCompliant'|'NotFound'|'NotStabilized'|'NotUpdatable'|'ResourceConflict'|'ServiceInternalError'|'ServiceLimitExceeded'|'Throttling'|'Unknown'|'UnsupportedTarget',
 *     ResourceModel?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise recordHandlerProgressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recordHandlerProgressAsync(array{
 *     BearerToken?: string,
 *     OperationStatus?: 'FAILED'|'IN_PROGRESS'|'PENDING'|'SUCCESS',
 *     CurrentOperationStatus?: 'FAILED'|'IN_PROGRESS'|'PENDING'|'SUCCESS',
 *     StatusMessage?: string,
 *     ErrorCode?: 'AccessDenied'|'AlreadyExists'|'GeneralServiceException'|'HandlerInternalFailure'|'InternalFailure'|'InvalidCredentials'|'InvalidRequest'|'InvalidTypeConfiguration'|'NetworkFailure'|'NonCompliant'|'NotFound'|'NotStabilized'|'NotUpdatable'|'ResourceConflict'|'ServiceInternalError'|'ServiceLimitExceeded'|'Throttling'|'Unknown'|'UnsupportedTarget',
 *     ResourceModel?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerPublisher(array $args = [])
 * @phpstan-method \Aws\Result registerPublisher(array{AcceptTermsAndConditions?: bool, ConnectionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerPublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerPublisherAsync(array{AcceptTermsAndConditions?: bool, ConnectionArn?: string, ...} $args = [])
 * @method \Aws\Result registerType(array $args = [])
 * @phpstan-method \Aws\Result registerType(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     SchemaHandlerPackage?: string,
 *     LoggingConfig?: array{LogRoleArn?: string, LogGroupName?: string, ...},
 *     ExecutionRoleArn?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerTypeAsync(array{
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     SchemaHandlerPackage?: string,
 *     LoggingConfig?: array{LogRoleArn?: string, LogGroupName?: string, ...},
 *     ExecutionRoleArn?: string,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rollbackStack(array $args = [])
 * @phpstan-method \Aws\Result rollbackStack(array{
 *     StackName?: string,
 *     RoleARN?: string,
 *     ClientRequestToken?: string,
 *     RetainExceptOnCreate?: bool,
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise rollbackStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rollbackStackAsync(array{
 *     StackName?: string,
 *     RoleARN?: string,
 *     ClientRequestToken?: string,
 *     RetainExceptOnCreate?: bool,
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result setStackPolicy(array $args = [])
 * @phpstan-method \Aws\Result setStackPolicy(array{StackName?: string, StackPolicyBody?: string, StackPolicyURL?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setStackPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setStackPolicyAsync(array{StackName?: string, StackPolicyBody?: string, StackPolicyURL?: string, ...} $args = [])
 * @method \Aws\Result setTypeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result setTypeConfiguration(array{
 *     TypeArn?: string,
 *     Configuration?: string,
 *     ConfigurationAlias?: string,
 *     TypeName?: string,
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setTypeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTypeConfigurationAsync(array{
 *     TypeArn?: string,
 *     Configuration?: string,
 *     ConfigurationAlias?: string,
 *     TypeName?: string,
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result setTypeDefaultVersion(array $args = [])
 * @phpstan-method \Aws\Result setTypeDefaultVersion(array{Arn?: string, Type?: 'HOOK'|'MODULE'|'RESOURCE', TypeName?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setTypeDefaultVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTypeDefaultVersionAsync(array{Arn?: string, Type?: 'HOOK'|'MODULE'|'RESOURCE', TypeName?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result signalResource(array $args = [])
 * @phpstan-method \Aws\Result signalResource(array{StackName?: string, LogicalResourceId?: string, UniqueId?: string, Status?: 'FAILURE'|'SUCCESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise signalResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise signalResourceAsync(array{StackName?: string, LogicalResourceId?: string, UniqueId?: string, Status?: 'FAILURE'|'SUCCESS', ...} $args = [])
 * @method \Aws\Result startResourceScan(array $args = [])
 * @phpstan-method \Aws\Result startResourceScan(array{ClientRequestToken?: string, ScanFilters?: list<array{Types?: list<string>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startResourceScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startResourceScanAsync(array{ClientRequestToken?: string, ScanFilters?: list<array{Types?: list<string>, ...}>, ...} $args = [])
 * @method \Aws\Result stopStackSetOperation(array $args = [])
 * @phpstan-method \Aws\Result stopStackSetOperation(array{StackSetName?: string, OperationId?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopStackSetOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopStackSetOperationAsync(array{StackSetName?: string, OperationId?: string, CallAs?: 'DELEGATED_ADMIN'|'SELF', ...} $args = [])
 * @method \Aws\Result testType(array $args = [])
 * @phpstan-method \Aws\Result testType(array{
 *     Arn?: string,
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     VersionId?: string,
 *     LogDeliveryBucket?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testTypeAsync(array{
 *     Arn?: string,
 *     Type?: 'HOOK'|'MODULE'|'RESOURCE',
 *     TypeName?: string,
 *     VersionId?: string,
 *     LogDeliveryBucket?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGeneratedTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateGeneratedTemplate(array{
 *     GeneratedTemplateName?: string,
 *     NewGeneratedTemplateName?: string,
 *     AddResources?: list<array{ResourceType?: string, LogicalResourceId?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     RemoveResources?: list<string>,
 *     RefreshAllResources?: bool,
 *     TemplateConfiguration?: array{DeletionPolicy?: 'DELETE'|'RETAIN', UpdateReplacePolicy?: 'DELETE'|'RETAIN', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGeneratedTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGeneratedTemplateAsync(array{
 *     GeneratedTemplateName?: string,
 *     NewGeneratedTemplateName?: string,
 *     AddResources?: list<array{ResourceType?: string, LogicalResourceId?: string, ResourceIdentifier?: array<string, string>, ...}>,
 *     RemoveResources?: list<string>,
 *     RefreshAllResources?: bool,
 *     TemplateConfiguration?: array{DeletionPolicy?: 'DELETE'|'RETAIN', UpdateReplacePolicy?: 'DELETE'|'RETAIN', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStack(array $args = [])
 * @phpstan-method \Aws\Result updateStack(array{
 *     StackName?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     UsePreviousTemplate?: bool,
 *     StackPolicyDuringUpdateBody?: string,
 *     StackPolicyDuringUpdateURL?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     ResourceTypes?: list<string>,
 *     RoleARN?: string,
 *     RollbackConfiguration?: array{RollbackTriggers?: list<array>, MonitoringTimeInMinutes?: int, ...},
 *     StackPolicyBody?: string,
 *     StackPolicyURL?: string,
 *     NotificationARNs?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DisableRollback?: bool,
 *     ClientRequestToken?: string,
 *     RetainExceptOnCreate?: bool,
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     DisableValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStackAsync(array{
 *     StackName?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     UsePreviousTemplate?: bool,
 *     StackPolicyDuringUpdateBody?: string,
 *     StackPolicyDuringUpdateURL?: string,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     ResourceTypes?: list<string>,
 *     RoleARN?: string,
 *     RollbackConfiguration?: array{RollbackTriggers?: list<array>, MonitoringTimeInMinutes?: int, ...},
 *     StackPolicyBody?: string,
 *     StackPolicyURL?: string,
 *     NotificationARNs?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DisableRollback?: bool,
 *     ClientRequestToken?: string,
 *     RetainExceptOnCreate?: bool,
 *     DeploymentConfig?: array{Mode?: 'EXPRESS'|'STANDARD', DisableRollback?: bool, ...},
 *     DisableValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStackInstances(array $args = [])
 * @phpstan-method \Aws\Result updateStackInstances(array{
 *     StackSetName?: string,
 *     Accounts?: list<string>,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     Regions?: list<string>,
 *     ParameterOverrides?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStackInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStackInstancesAsync(array{
 *     StackSetName?: string,
 *     Accounts?: list<string>,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     Regions?: list<string>,
 *     ParameterOverrides?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     OperationId?: string,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStackSet(array $args = [])
 * @phpstan-method \Aws\Result updateStackSet(array{
 *     StackSetName?: string,
 *     Description?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     UsePreviousTemplate?: bool,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     AdministrationRoleARN?: string,
 *     ExecutionRoleName?: string,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     PermissionModel?: 'SELF_MANAGED'|'SERVICE_MANAGED',
 *     AutoDeployment?: array{Enabled?: bool, RetainStacksOnAccountRemoval?: bool, DependsOn?: list<string>, ...},
 *     OperationId?: string,
 *     Accounts?: list<string>,
 *     Regions?: list<string>,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ManagedExecution?: array{Active?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStackSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStackSetAsync(array{
 *     StackSetName?: string,
 *     Description?: string,
 *     TemplateBody?: string,
 *     TemplateURL?: string,
 *     UsePreviousTemplate?: bool,
 *     Parameters?: list<array{ParameterKey?: string, ParameterValue?: string, UsePreviousValue?: bool, ResolvedValue?: string, ...}>,
 *     Capabilities?: list<'CAPABILITY_AUTO_EXPAND'|'CAPABILITY_IAM'|'CAPABILITY_NAMED_IAM'>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     OperationPreferences?: array{
 *         RegionConcurrencyType?: 'PARALLEL'|'SEQUENTIAL',
 *         RegionOrder?: list<string>,
 *         FailureToleranceCount?: int,
 *         FailureTolerancePercentage?: int,
 *         MaxConcurrentCount?: int,
 *         MaxConcurrentPercentage?: int,
 *         ConcurrencyMode?: 'SOFT_FAILURE_TOLERANCE'|'STRICT_FAILURE_TOLERANCE',
 *         ...,
 *     },
 *     AdministrationRoleARN?: string,
 *     ExecutionRoleName?: string,
 *     DeploymentTargets?: array{
 *         Accounts?: list<string>,
 *         AccountsUrl?: string,
 *         OrganizationalUnitIds?: list<string>,
 *         AccountFilterType?: 'DIFFERENCE'|'INTERSECTION'|'NONE'|'UNION',
 *         ...,
 *     },
 *     PermissionModel?: 'SELF_MANAGED'|'SERVICE_MANAGED',
 *     AutoDeployment?: array{Enabled?: bool, RetainStacksOnAccountRemoval?: bool, DependsOn?: list<string>, ...},
 *     OperationId?: string,
 *     Accounts?: list<string>,
 *     Regions?: list<string>,
 *     CallAs?: 'DELEGATED_ADMIN'|'SELF',
 *     ManagedExecution?: array{Active?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTerminationProtection(array $args = [])
 * @phpstan-method \Aws\Result updateTerminationProtection(array{EnableTerminationProtection?: bool, StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTerminationProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTerminationProtectionAsync(array{EnableTerminationProtection?: bool, StackName?: string, ...} $args = [])
 * @method \Aws\Result validateTemplate(array $args = [])
 * @phpstan-method \Aws\Result validateTemplate(array{TemplateBody?: string, TemplateURL?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateTemplateAsync(array{TemplateBody?: string, TemplateURL?: string, ...} $args = [])
 */
class CloudFormationClient extends AwsClient {}
