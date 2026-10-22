<?php
namespace Aws\Continuum;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Continuum** service.
 * @method \Aws\Result associateCollector(array $args = [])
 * @phpstan-method \Aws\Result associateCollector(array{
 *     environmentId?: string,
 *     clientToken?: string,
 *     collectorArn?: string,
 *     collectorDataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateCollectorAsync(array{
 *     environmentId?: string,
 *     clientToken?: string,
 *     collectorArn?: string,
 *     collectorDataAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCodeFinding(array $args = [])
 * @phpstan-method \Aws\Result createCodeFinding(array{environmentId?: string, ocsfDocument?: array, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeFindingAsync(array{environmentId?: string, ocsfDocument?: array, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createCodeScan(array $args = [])
 * @phpstan-method \Aws\Result createCodeScan(array{environmentId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeScanAsync(array{environmentId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createCollector(array $args = [])
 * @phpstan-method \Aws\Result createCollector(array{
 *     type?: 'AWS_COLLECTOR',
 *     kubernetesClusterRole?: array{roleArn?: string, externalId?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCollectorAsync(array{
 *     type?: 'AWS_COLLECTOR',
 *     kubernetesClusterRole?: array{roleArn?: string, externalId?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     name?: string,
 *     configuration?: array{codeConfiguration?: array{sourceConfiguration?: array, environmentConfiguration?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     name?: string,
 *     configuration?: array{codeConfiguration?: array{sourceConfiguration?: array, environmentConfiguration?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegration(array $args = [])
 * @phpstan-method \Aws\Result createIntegration(array{
 *     clientToken?: string,
 *     name?: string,
 *     providerConfiguration?: array{
 *         github?: array{authorization?: array, organizationName?: string, ...},
 *         gitlab?: array{instanceUrl?: string, targetType?: 'GROUP'|'PROJECT', targetPath?: string, accessToken?: string, ...},
 *         s3?: array{bucket?: string, roleArn?: string, externalId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     providerConfiguration?: array{
 *         github?: array{authorization?: array, organizationName?: string, ...},
 *         gitlab?: array{instanceUrl?: string, targetType?: 'GROUP'|'PROJECT', targetPath?: string, accessToken?: string, ...},
 *         s3?: array{bucket?: string, roleArn?: string, externalId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCollector(array $args = [])
 * @phpstan-method \Aws\Result deleteCollector(array{collectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCollectorAsync(array{collectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{integrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{integrationId?: string, ...} $args = [])
 * @method \Aws\Result disassociateCollector(array $args = [])
 * @phpstan-method \Aws\Result disassociateCollector(array{environmentId?: string, collectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateCollectorAsync(array{environmentId?: string, collectorArn?: string, ...} $args = [])
 * @method \Aws\Result getCodeFinding(array $args = [])
 * @phpstan-method \Aws\Result getCodeFinding(array{environmentId?: string, findingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeFindingAsync(array{environmentId?: string, findingId?: string, ...} $args = [])
 * @method \Aws\Result getCodeIssue(array $args = [])
 * @phpstan-method \Aws\Result getCodeIssue(array{environmentId?: string, issueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeIssueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeIssueAsync(array{environmentId?: string, issueId?: string, ...} $args = [])
 * @method \Aws\Result getCodeIssueArtifact(array $args = [])
 * @phpstan-method \Aws\Result getCodeIssueArtifact(array{environmentId?: string, issueId?: string, artifactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeIssueArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeIssueArtifactAsync(array{environmentId?: string, issueId?: string, artifactId?: string, ...} $args = [])
 * @method \Aws\Result getCodeScan(array $args = [])
 * @phpstan-method \Aws\Result getCodeScan(array{environmentId?: string, scanRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeScanAsync(array{environmentId?: string, scanRunId?: string, ...} $args = [])
 * @method \Aws\Result getCollector(array $args = [])
 * @phpstan-method \Aws\Result getCollector(array{collectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollectorAsync(array{collectorId?: string, ...} $args = [])
 * @method \Aws\Result getCollectorDataAccessAuthorization(array $args = [])
 * @phpstan-method \Aws\Result getCollectorDataAccessAuthorization(array{accountId?: string, collectorId?: string, environmentArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollectorDataAccessAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollectorDataAccessAuthorizationAsync(array{accountId?: string, collectorId?: string, environmentArn?: string, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @phpstan-method \Aws\Result getIntegration(array{integrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationAsync(array{integrationId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result listAssociatedCollectors(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedCollectors(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedCollectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedCollectorsAsync(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssociatedEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedEnvironments(array{collectorId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedEnvironmentsAsync(array{collectorId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCodeFindings(array $args = [])
 * @phpstan-method \Aws\Result listCodeFindings(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeFindingsAsync(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCodeIssueArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listCodeIssueArtifacts(array{
 *     environmentId?: string,
 *     issueId?: string,
 *     artifactType?: 'AGENT_COMMUNICATION'|'DECISION'|'EVIDENCE'|'PATCH'|'REMEDIATION_PROPOSAL'|'VALIDATION_EVIDENCE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeIssueArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeIssueArtifactsAsync(array{
 *     environmentId?: string,
 *     issueId?: string,
 *     artifactType?: 'AGENT_COMMUNICATION'|'DECISION'|'EVIDENCE'|'PATCH'|'REMEDIATION_PROPOSAL'|'VALIDATION_EVIDENCE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCodeIssues(array $args = [])
 * @phpstan-method \Aws\Result listCodeIssues(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeIssuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeIssuesAsync(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCodeScans(array $args = [])
 * @phpstan-method \Aws\Result listCodeScans(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeScansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeScansAsync(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCollectors(array $args = [])
 * @phpstan-method \Aws\Result listCollectors(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollectorsAsync(array{...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listIntegrations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{arn?: string, policy?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{arn?: string, policy?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result startIntegrationAuthorization(array $args = [])
 * @phpstan-method \Aws\Result startIntegrationAuthorization(array{providerType?: 'GITHUB', name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startIntegrationAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startIntegrationAuthorizationAsync(array{providerType?: 'GITHUB', name?: string, ...} $args = [])
 * @method \Aws\Result updateCollector(array $args = [])
 * @phpstan-method \Aws\Result updateCollector(array{
 *     collectorId?: string,
 *     name?: string,
 *     kubernetesClusterRole?: array{set?: array{roleArn?: string, externalId?: string, ...}, remove?: array, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCollectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCollectorAsync(array{
 *     collectorId?: string,
 *     name?: string,
 *     kubernetesClusterRole?: array{set?: array{roleArn?: string, externalId?: string, ...}, remove?: array, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     environmentId?: string,
 *     name?: string,
 *     configuration?: array{codeConfiguration?: array{sourceConfiguration?: array, environmentConfiguration?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     environmentId?: string,
 *     name?: string,
 *     configuration?: array{codeConfiguration?: array{sourceConfiguration?: array, environmentConfiguration?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateIntegration(array{
 *     integrationId?: string,
 *     providerConfiguration?: array{s3?: array{roleArn?: string, externalId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationAsync(array{
 *     integrationId?: string,
 *     providerConfiguration?: array{s3?: array{roleArn?: string, externalId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 */
class ContinuumClient extends AwsClient {}
