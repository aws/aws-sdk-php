<?php
namespace Aws\CodeCatalyst;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodeCatalyst** service.
 * @method \Aws\Result createAccessToken(array $args = [])
 * @phpstan-method \Aws\Result createAccessToken(array{name?: string, expiresTime?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessTokenAsync(array{name?: string, expiresTime?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result createDevEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createDevEnvironment(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     repositories?: list<array{repositoryName?: string, branchName?: string, ...}>,
 *     clientToken?: string,
 *     alias?: string,
 *     ides?: list<array{runtime?: string, name?: string, ...}>,
 *     instanceType?: 'dev.standard1.large'|'dev.standard1.medium'|'dev.standard1.small'|'dev.standard1.xlarge',
 *     inactivityTimeoutMinutes?: int,
 *     persistentStorage?: array{sizeInGiB?: int, ...},
 *     vpcConnectionName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDevEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDevEnvironmentAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     repositories?: list<array{repositoryName?: string, branchName?: string, ...}>,
 *     clientToken?: string,
 *     alias?: string,
 *     ides?: list<array{runtime?: string, name?: string, ...}>,
 *     instanceType?: 'dev.standard1.large'|'dev.standard1.medium'|'dev.standard1.small'|'dev.standard1.xlarge',
 *     inactivityTimeoutMinutes?: int,
 *     persistentStorage?: array{sizeInGiB?: int, ...},
 *     vpcConnectionName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{spaceName?: string, displayName?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{spaceName?: string, displayName?: string, description?: string, ...} $args = [])
 * @method \Aws\Result createSourceRepository(array $args = [])
 * @phpstan-method \Aws\Result createSourceRepository(array{spaceName?: string, projectName?: string, name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSourceRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSourceRepositoryAsync(array{spaceName?: string, projectName?: string, name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result createSourceRepositoryBranch(array $args = [])
 * @phpstan-method \Aws\Result createSourceRepositoryBranch(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     sourceRepositoryName?: string,
 *     name?: string,
 *     headCommitId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSourceRepositoryBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSourceRepositoryBranchAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     sourceRepositoryName?: string,
 *     name?: string,
 *     headCommitId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessToken(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessToken(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessTokenAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteDevEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteDevEnvironment(array{spaceName?: string, projectName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDevEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDevEnvironmentAsync(array{spaceName?: string, projectName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{spaceName?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{spaceName?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteSourceRepository(array $args = [])
 * @phpstan-method \Aws\Result deleteSourceRepository(array{spaceName?: string, projectName?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSourceRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSourceRepositoryAsync(array{spaceName?: string, projectName?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteSpace(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getDevEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getDevEnvironment(array{spaceName?: string, projectName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevEnvironmentAsync(array{spaceName?: string, projectName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getProject(array $args = [])
 * @phpstan-method \Aws\Result getProject(array{spaceName?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProjectAsync(array{spaceName?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getSourceRepository(array $args = [])
 * @phpstan-method \Aws\Result getSourceRepository(array{spaceName?: string, projectName?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSourceRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSourceRepositoryAsync(array{spaceName?: string, projectName?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getSourceRepositoryCloneUrls(array $args = [])
 * @phpstan-method \Aws\Result getSourceRepositoryCloneUrls(array{spaceName?: string, projectName?: string, sourceRepositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSourceRepositoryCloneUrlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSourceRepositoryCloneUrlsAsync(array{spaceName?: string, projectName?: string, sourceRepositoryName?: string, ...} $args = [])
 * @method \Aws\Result getSpace(array $args = [])
 * @phpstan-method \Aws\Result getSpace(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpaceAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getSubscription(array $args = [])
 * @phpstan-method \Aws\Result getSubscription(array{spaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionAsync(array{spaceName?: string, ...} $args = [])
 * @method \Aws\Result getUserDetails(array $args = [])
 * @phpstan-method \Aws\Result getUserDetails(array{id?: string, userName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserDetailsAsync(array{id?: string, userName?: string, ...} $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getWorkflow(array{spaceName?: string, id?: string, projectName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowAsync(array{spaceName?: string, id?: string, projectName?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowRun(array{spaceName?: string, id?: string, projectName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array{spaceName?: string, id?: string, projectName?: string, ...} $args = [])
 * @method \Aws\Result listAccessTokens(array $args = [])
 * @phpstan-method \Aws\Result listAccessTokens(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessTokensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessTokensAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDevEnvironmentSessions(array $args = [])
 * @phpstan-method \Aws\Result listDevEnvironmentSessions(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     devEnvironmentId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevEnvironmentSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevEnvironmentSessionsAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     devEnvironmentId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDevEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listDevEnvironments(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     filters?: list<array{key?: string, values?: list<string>, comparisonOperator?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevEnvironmentsAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     filters?: list<array{key?: string, values?: list<string>, comparisonOperator?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEventLogs(array $args = [])
 * @phpstan-method \Aws\Result listEventLogs(array{
 *     spaceName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     eventName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventLogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventLogsAsync(array{
 *     spaceName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     eventName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @phpstan-method \Aws\Result listProjects(array{
 *     spaceName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         key?: 'hasAccessTo'|'name',
 *         values?: list<string>,
 *         comparisonOperator?: 'BEGINS_WITH'|'EQ'|'GE'|'GT'|'LE'|'LT',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectsAsync(array{
 *     spaceName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{
 *         key?: 'hasAccessTo'|'name',
 *         values?: list<string>,
 *         comparisonOperator?: 'BEGINS_WITH'|'EQ'|'GE'|'GT'|'LE'|'LT',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSourceRepositories(array $args = [])
 * @phpstan-method \Aws\Result listSourceRepositories(array{spaceName?: string, projectName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceRepositoriesAsync(array{spaceName?: string, projectName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSourceRepositoryBranches(array $args = [])
 * @phpstan-method \Aws\Result listSourceRepositoryBranches(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     sourceRepositoryName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceRepositoryBranchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceRepositoryBranchesAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     sourceRepositoryName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSpaces(array $args = [])
 * @phpstan-method \Aws\Result listSpaces(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpacesAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowRuns(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowRuns(array{
 *     spaceName?: string,
 *     workflowId?: string,
 *     projectName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortBy?: list<array>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array{
 *     spaceName?: string,
 *     workflowId?: string,
 *     projectName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortBy?: list<array>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortBy?: list<array>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortBy?: list<array>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDevEnvironment(array $args = [])
 * @phpstan-method \Aws\Result startDevEnvironment(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     id?: string,
 *     ides?: list<array{runtime?: string, name?: string, ...}>,
 *     instanceType?: 'dev.standard1.large'|'dev.standard1.medium'|'dev.standard1.small'|'dev.standard1.xlarge',
 *     inactivityTimeoutMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDevEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDevEnvironmentAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     id?: string,
 *     ides?: list<array{runtime?: string, name?: string, ...}>,
 *     instanceType?: 'dev.standard1.large'|'dev.standard1.medium'|'dev.standard1.small'|'dev.standard1.xlarge',
 *     inactivityTimeoutMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDevEnvironmentSession(array $args = [])
 * @phpstan-method \Aws\Result startDevEnvironmentSession(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     id?: string,
 *     sessionConfiguration?: array{
 *         sessionType?: 'SSH'|'SSM',
 *         executeCommandSessionConfiguration?: array{command?: string, arguments?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDevEnvironmentSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDevEnvironmentSessionAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     id?: string,
 *     sessionConfiguration?: array{
 *         sessionType?: 'SSH'|'SSM',
 *         executeCommandSessionConfiguration?: array{command?: string, arguments?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result startWorkflowRun(array{spaceName?: string, projectName?: string, workflowId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWorkflowRunAsync(array{spaceName?: string, projectName?: string, workflowId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result stopDevEnvironment(array $args = [])
 * @phpstan-method \Aws\Result stopDevEnvironment(array{spaceName?: string, projectName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDevEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDevEnvironmentAsync(array{spaceName?: string, projectName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result stopDevEnvironmentSession(array $args = [])
 * @phpstan-method \Aws\Result stopDevEnvironmentSession(array{spaceName?: string, projectName?: string, id?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDevEnvironmentSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDevEnvironmentSessionAsync(array{spaceName?: string, projectName?: string, id?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result updateDevEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateDevEnvironment(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     id?: string,
 *     alias?: string,
 *     ides?: list<array{runtime?: string, name?: string, ...}>,
 *     instanceType?: 'dev.standard1.large'|'dev.standard1.medium'|'dev.standard1.small'|'dev.standard1.xlarge',
 *     inactivityTimeoutMinutes?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDevEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDevEnvironmentAsync(array{
 *     spaceName?: string,
 *     projectName?: string,
 *     id?: string,
 *     alias?: string,
 *     ides?: list<array{runtime?: string, name?: string, ...}>,
 *     instanceType?: 'dev.standard1.large'|'dev.standard1.medium'|'dev.standard1.small'|'dev.standard1.xlarge',
 *     inactivityTimeoutMinutes?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @phpstan-method \Aws\Result updateProject(array{spaceName?: string, name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectAsync(array{spaceName?: string, name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateSpace(array $args = [])
 * @phpstan-method \Aws\Result updateSpace(array{name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpaceAsync(array{name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result verifySession(array $args = [])
 * @phpstan-method \Aws\Result verifySession(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifySessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifySessionAsync(array{...} $args = [])
 */
class CodeCatalystClient extends AwsClient {}
