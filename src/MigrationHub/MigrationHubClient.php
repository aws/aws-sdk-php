<?php
namespace Aws\MigrationHub;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub** service.
 * @method \Aws\Result associateCreatedArtifact(array $args = [])
 * @phpstan-method \Aws\Result associateCreatedArtifact(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     CreatedArtifact?: array{Name?: string, Description?: string, ...},
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCreatedArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateCreatedArtifactAsync(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     CreatedArtifact?: array{Name?: string, Description?: string, ...},
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateDiscoveredResource(array $args = [])
 * @phpstan-method \Aws\Result associateDiscoveredResource(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     DiscoveredResource?: array{ConfigurationId?: string, Description?: string, ...},
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDiscoveredResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDiscoveredResourceAsync(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     DiscoveredResource?: array{ConfigurationId?: string, Description?: string, ...},
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateSourceResource(array $args = [])
 * @phpstan-method \Aws\Result associateSourceResource(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     SourceResource?: array{Name?: string, Description?: string, StatusDetail?: string, ...},
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSourceResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSourceResourceAsync(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     SourceResource?: array{Name?: string, Description?: string, StatusDetail?: string, ...},
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProgressUpdateStream(array $args = [])
 * @phpstan-method \Aws\Result createProgressUpdateStream(array{ProgressUpdateStreamName?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createProgressUpdateStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProgressUpdateStreamAsync(array{ProgressUpdateStreamName?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result deleteProgressUpdateStream(array $args = [])
 * @phpstan-method \Aws\Result deleteProgressUpdateStream(array{ProgressUpdateStreamName?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProgressUpdateStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProgressUpdateStreamAsync(array{ProgressUpdateStreamName?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result describeApplicationState(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationState(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationStateAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result describeMigrationTask(array $args = [])
 * @phpstan-method \Aws\Result describeMigrationTask(array{ProgressUpdateStream?: string, MigrationTaskName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMigrationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMigrationTaskAsync(array{ProgressUpdateStream?: string, MigrationTaskName?: string, ...} $args = [])
 * @method \Aws\Result disassociateCreatedArtifact(array $args = [])
 * @phpstan-method \Aws\Result disassociateCreatedArtifact(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     CreatedArtifactName?: string,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCreatedArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateCreatedArtifactAsync(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     CreatedArtifactName?: string,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateDiscoveredResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateDiscoveredResource(array{ProgressUpdateStream?: string, MigrationTaskName?: string, ConfigurationId?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDiscoveredResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDiscoveredResourceAsync(array{ProgressUpdateStream?: string, MigrationTaskName?: string, ConfigurationId?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result disassociateSourceResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateSourceResource(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     SourceResourceName?: string,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSourceResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSourceResourceAsync(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     SourceResourceName?: string,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importMigrationTask(array $args = [])
 * @phpstan-method \Aws\Result importMigrationTask(array{ProgressUpdateStream?: string, MigrationTaskName?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importMigrationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importMigrationTaskAsync(array{ProgressUpdateStream?: string, MigrationTaskName?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result listApplicationStates(array $args = [])
 * @phpstan-method \Aws\Result listApplicationStates(array{ApplicationIds?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationStatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationStatesAsync(array{ApplicationIds?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listCreatedArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listCreatedArtifacts(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCreatedArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCreatedArtifactsAsync(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDiscoveredResources(array $args = [])
 * @phpstan-method \Aws\Result listDiscoveredResources(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoveredResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoveredResourcesAsync(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMigrationTaskUpdates(array $args = [])
 * @phpstan-method \Aws\Result listMigrationTaskUpdates(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMigrationTaskUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMigrationTaskUpdatesAsync(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMigrationTasks(array $args = [])
 * @phpstan-method \Aws\Result listMigrationTasks(array{NextToken?: string, MaxResults?: int, ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMigrationTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMigrationTasksAsync(array{NextToken?: string, MaxResults?: int, ResourceName?: string, ...} $args = [])
 * @method \Aws\Result listProgressUpdateStreams(array $args = [])
 * @phpstan-method \Aws\Result listProgressUpdateStreams(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProgressUpdateStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProgressUpdateStreamsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSourceResources(array $args = [])
 * @phpstan-method \Aws\Result listSourceResources(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceResourcesAsync(array{ProgressUpdateStream?: string, MigrationTaskName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result notifyApplicationState(array $args = [])
 * @phpstan-method \Aws\Result notifyApplicationState(array{
 *     ApplicationId?: string,
 *     Status?: 'COMPLETED'|'IN_PROGRESS'|'NOT_STARTED',
 *     UpdateDateTime?: int|string|\DateTimeInterface,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyApplicationStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyApplicationStateAsync(array{
 *     ApplicationId?: string,
 *     Status?: 'COMPLETED'|'IN_PROGRESS'|'NOT_STARTED',
 *     UpdateDateTime?: int|string|\DateTimeInterface,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result notifyMigrationTaskState(array $args = [])
 * @phpstan-method \Aws\Result notifyMigrationTaskState(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     Task?: array{
 *         Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'NOT_STARTED',
 *         StatusDetail?: string,
 *         ProgressPercent?: int,
 *         ...,
 *     },
 *     UpdateDateTime?: int|string|\DateTimeInterface,
 *     NextUpdateSeconds?: int,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyMigrationTaskStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyMigrationTaskStateAsync(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     Task?: array{
 *         Status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'NOT_STARTED',
 *         StatusDetail?: string,
 *         ProgressPercent?: int,
 *         ...,
 *     },
 *     UpdateDateTime?: int|string|\DateTimeInterface,
 *     NextUpdateSeconds?: int,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourceAttributes(array $args = [])
 * @phpstan-method \Aws\Result putResourceAttributes(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     ResourceAttributeList?: list<array{
 *         Type?: 'BIOS_ID'|'FQDN'|'IPV4_ADDRESS'|'IPV6_ADDRESS'|'MAC_ADDRESS'|'MOTHERBOARD_SERIAL_NUMBER'|'VM_MANAGED_OBJECT_REFERENCE'|'VM_MANAGER_ID'|'VM_NAME'|'VM_PATH',
 *         Value?: string,
 *         ...,
 *     }>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourceAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourceAttributesAsync(array{
 *     ProgressUpdateStream?: string,
 *     MigrationTaskName?: string,
 *     ResourceAttributeList?: list<array{
 *         Type?: 'BIOS_ID'|'FQDN'|'IPV4_ADDRESS'|'IPV6_ADDRESS'|'MAC_ADDRESS'|'MOTHERBOARD_SERIAL_NUMBER'|'VM_MANAGED_OBJECT_REFERENCE'|'VM_MANAGER_ID'|'VM_NAME'|'VM_PATH',
 *         Value?: string,
 *         ...,
 *     }>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 */
class MigrationHubClient extends AwsClient {}
