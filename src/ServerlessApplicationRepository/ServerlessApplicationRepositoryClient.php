<?php
namespace Aws\ServerlessApplicationRepository;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWSServerlessApplicationRepository** service.
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     Author?: string,
 *     Description?: string,
 *     HomePageUrl?: string,
 *     Labels?: list<string>,
 *     LicenseBody?: string,
 *     LicenseUrl?: string,
 *     Name?: string,
 *     ReadmeBody?: string,
 *     ReadmeUrl?: string,
 *     SemanticVersion?: string,
 *     SourceCodeArchiveUrl?: string,
 *     SourceCodeUrl?: string,
 *     SpdxLicenseId?: string,
 *     TemplateBody?: string,
 *     TemplateUrl?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     Author?: string,
 *     Description?: string,
 *     HomePageUrl?: string,
 *     Labels?: list<string>,
 *     LicenseBody?: string,
 *     LicenseUrl?: string,
 *     Name?: string,
 *     ReadmeBody?: string,
 *     ReadmeUrl?: string,
 *     SemanticVersion?: string,
 *     SourceCodeArchiveUrl?: string,
 *     SourceCodeUrl?: string,
 *     SpdxLicenseId?: string,
 *     TemplateBody?: string,
 *     TemplateUrl?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplicationVersion(array $args = [])
 * @phpstan-method \Aws\Result createApplicationVersion(array{
 *     ApplicationId?: string,
 *     SemanticVersion?: string,
 *     SourceCodeArchiveUrl?: string,
 *     SourceCodeUrl?: string,
 *     TemplateBody?: string,
 *     TemplateUrl?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationVersionAsync(array{
 *     ApplicationId?: string,
 *     SemanticVersion?: string,
 *     SourceCodeArchiveUrl?: string,
 *     SourceCodeUrl?: string,
 *     TemplateBody?: string,
 *     TemplateUrl?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudFormationChangeSet(array $args = [])
 * @phpstan-method \Aws\Result createCloudFormationChangeSet(array{
 *     ApplicationId?: string,
 *     Capabilities?: list<string>,
 *     ChangeSetName?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     NotificationArns?: list<string>,
 *     ParameterOverrides?: list<array{Name?: string, Value?: string, ...}>,
 *     ResourceTypes?: list<string>,
 *     RollbackConfiguration?: array{MonitoringTimeInMinutes?: int, RollbackTriggers?: list<array>, ...},
 *     SemanticVersion?: string,
 *     StackName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TemplateId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudFormationChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudFormationChangeSetAsync(array{
 *     ApplicationId?: string,
 *     Capabilities?: list<string>,
 *     ChangeSetName?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     NotificationArns?: list<string>,
 *     ParameterOverrides?: list<array{Name?: string, Value?: string, ...}>,
 *     ResourceTypes?: list<string>,
 *     RollbackConfiguration?: array{MonitoringTimeInMinutes?: int, RollbackTriggers?: list<array>, ...},
 *     SemanticVersion?: string,
 *     StackName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TemplateId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudFormationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createCloudFormationTemplate(array{ApplicationId?: string, SemanticVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudFormationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudFormationTemplateAsync(array{ApplicationId?: string, SemanticVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{ApplicationId?: string, SemanticVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{ApplicationId?: string, SemanticVersion?: string, ...} $args = [])
 * @method \Aws\Result getApplicationPolicy(array $args = [])
 * @phpstan-method \Aws\Result getApplicationPolicy(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationPolicyAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getCloudFormationTemplate(array $args = [])
 * @phpstan-method \Aws\Result getCloudFormationTemplate(array{ApplicationId?: string, TemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudFormationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudFormationTemplateAsync(array{ApplicationId?: string, TemplateId?: string, ...} $args = [])
 * @method \Aws\Result listApplicationDependencies(array $args = [])
 * @phpstan-method \Aws\Result listApplicationDependencies(array{ApplicationId?: string, MaxItems?: int, NextToken?: string, SemanticVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationDependenciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationDependenciesAsync(array{ApplicationId?: string, MaxItems?: int, NextToken?: string, SemanticVersion?: string, ...} $args = [])
 * @method \Aws\Result listApplicationVersions(array $args = [])
 * @phpstan-method \Aws\Result listApplicationVersions(array{ApplicationId?: string, MaxItems?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationVersionsAsync(array{ApplicationId?: string, MaxItems?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{MaxItems?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{MaxItems?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putApplicationPolicy(array $args = [])
 * @phpstan-method \Aws\Result putApplicationPolicy(array{
 *     ApplicationId?: string,
 *     Statements?: list<array{
 *         Actions?: list<string>,
 *         PrincipalOrgIDs?: list<string>,
 *         Principals?: list<string>,
 *         StatementId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putApplicationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putApplicationPolicyAsync(array{
 *     ApplicationId?: string,
 *     Statements?: list<array{
 *         Actions?: list<string>,
 *         PrincipalOrgIDs?: list<string>,
 *         Principals?: list<string>,
 *         StatementId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result unshareApplication(array $args = [])
 * @phpstan-method \Aws\Result unshareApplication(array{ApplicationId?: string, OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unshareApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unshareApplicationAsync(array{ApplicationId?: string, OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     ApplicationId?: string,
 *     Author?: string,
 *     Description?: string,
 *     HomePageUrl?: string,
 *     Labels?: list<string>,
 *     ReadmeBody?: string,
 *     ReadmeUrl?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     ApplicationId?: string,
 *     Author?: string,
 *     Description?: string,
 *     HomePageUrl?: string,
 *     Labels?: list<string>,
 *     ReadmeBody?: string,
 *     ReadmeUrl?: string,
 *     ...,
 * } $args = [])
 */
class ServerlessApplicationRepositoryClient extends AwsClient {}
