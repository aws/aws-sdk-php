<?php
namespace Aws\mgn;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Application Migration Service** service.
 * @method \Aws\Result archiveApplication(array $args = [])
 * @phpstan-method \Aws\Result archiveApplication(array{applicationID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise archiveApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise archiveApplicationAsync(array{applicationID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result archiveWave(array $args = [])
 * @phpstan-method \Aws\Result archiveWave(array{waveID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise archiveWaveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise archiveWaveAsync(array{waveID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result associateApplications(array $args = [])
 * @phpstan-method \Aws\Result associateApplications(array{waveID?: string, applicationIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateApplicationsAsync(array{waveID?: string, applicationIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result associateSourceServers(array $args = [])
 * @phpstan-method \Aws\Result associateSourceServers(array{applicationID?: string, sourceServerIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSourceServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSourceServersAsync(array{applicationID?: string, sourceServerIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result changeServerLifeCycleState(array $args = [])
 * @phpstan-method \Aws\Result changeServerLifeCycleState(array{
 *     sourceServerID?: string,
 *     lifeCycle?: array{state?: 'CUTOVER'|'READY_FOR_CUTOVER'|'READY_FOR_TEST', ...},
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise changeServerLifeCycleStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changeServerLifeCycleStateAsync(array{
 *     sourceServerID?: string,
 *     lifeCycle?: array{state?: 'CUTOVER'|'READY_FOR_CUTOVER'|'READY_FOR_TEST', ...},
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{name?: string, description?: string, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{name?: string, description?: string, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result createConnector(array $args = [])
 * @phpstan-method \Aws\Result createConnector(array{
 *     name?: string,
 *     ssmInstanceID?: string,
 *     tags?: array<string, string>,
 *     ssmCommandConfig?: array{
 *         s3OutputEnabled?: bool,
 *         outputS3BucketName?: string,
 *         cloudWatchOutputEnabled?: bool,
 *         cloudWatchLogGroupName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorAsync(array{
 *     name?: string,
 *     ssmInstanceID?: string,
 *     tags?: array<string, string>,
 *     ssmCommandConfig?: array{
 *         s3OutputEnabled?: bool,
 *         outputS3BucketName?: string,
 *         cloudWatchOutputEnabled?: bool,
 *         cloudWatchLogGroupName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLaunchConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createLaunchConfigurationTemplate(array{
 *     postLaunchActions?: array{
 *         deployment?: 'CUTOVER_ONLY'|'TEST_AND_CUTOVER'|'TEST_ONLY',
 *         s3LogBucket?: string,
 *         s3OutputKeyPrefix?: string,
 *         cloudWatchLogGroupName?: string,
 *         ssmDocuments?: list<array>,
 *         ...,
 *     },
 *     enableMapAutoTagging?: bool,
 *     mapAutoTaggingMpeID?: string,
 *     tags?: array<string, string>,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'NONE',
 *     copyPrivateIp?: bool,
 *     associatePublicIpAddress?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     bootMode?: 'LEGACY_BIOS'|'UEFI'|'USE_SOURCE',
 *     smallVolumeMaxSize?: int,
 *     smallVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     largeVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     enableParametersEncryption?: bool,
 *     parametersEncryptionKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLaunchConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLaunchConfigurationTemplateAsync(array{
 *     postLaunchActions?: array{
 *         deployment?: 'CUTOVER_ONLY'|'TEST_AND_CUTOVER'|'TEST_ONLY',
 *         s3LogBucket?: string,
 *         s3OutputKeyPrefix?: string,
 *         cloudWatchLogGroupName?: string,
 *         ssmDocuments?: list<array>,
 *         ...,
 *     },
 *     enableMapAutoTagging?: bool,
 *     mapAutoTaggingMpeID?: string,
 *     tags?: array<string, string>,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'NONE',
 *     copyPrivateIp?: bool,
 *     associatePublicIpAddress?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     bootMode?: 'LEGACY_BIOS'|'UEFI'|'USE_SOURCE',
 *     smallVolumeMaxSize?: int,
 *     smallVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     largeVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     enableParametersEncryption?: bool,
 *     parametersEncryptionKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNetworkMigrationDefinition(array $args = [])
 * @phpstan-method \Aws\Result createNetworkMigrationDefinition(array{
 *     name?: string,
 *     description?: string,
 *     sourceConfigurations?: list<array{
 *         sourceEnvironment?: 'AWS_DISCOVERY_COLLECTOR'|'CISCO_ACI'|'FORTIGATE_FIREWALL'|'LOGICAL_MODEL'|'MODELIZE_IT'|'NSX'|'PALO_ALTO_FIREWALL'|'VSPHERE',
 *         sourceS3Configuration?: array,
 *         ...,
 *     }>,
 *     targetS3Configuration?: array{s3Bucket?: string, s3BucketOwner?: string, ...},
 *     targetNetwork?: array{
 *         topology?: 'HUB_AND_SPOKE'|'ISOLATED_VPC',
 *         inboundCidr?: string,
 *         outboundCidr?: string,
 *         inspectionCidr?: string,
 *         ...,
 *     },
 *     targetDeployment?: 'MULTI_ACCOUNT'|'SINGLE_ACCOUNT',
 *     tags?: array<string, string>,
 *     scopeTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkMigrationDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkMigrationDefinitionAsync(array{
 *     name?: string,
 *     description?: string,
 *     sourceConfigurations?: list<array{
 *         sourceEnvironment?: 'AWS_DISCOVERY_COLLECTOR'|'CISCO_ACI'|'FORTIGATE_FIREWALL'|'LOGICAL_MODEL'|'MODELIZE_IT'|'NSX'|'PALO_ALTO_FIREWALL'|'VSPHERE',
 *         sourceS3Configuration?: array,
 *         ...,
 *     }>,
 *     targetS3Configuration?: array{s3Bucket?: string, s3BucketOwner?: string, ...},
 *     targetNetwork?: array{
 *         topology?: 'HUB_AND_SPOKE'|'ISOLATED_VPC',
 *         inboundCidr?: string,
 *         outboundCidr?: string,
 *         inspectionCidr?: string,
 *         ...,
 *     },
 *     targetDeployment?: 'MULTI_ACCOUNT'|'SINGLE_ACCOUNT',
 *     tags?: array<string, string>,
 *     scopeTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicationConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createReplicationConfigurationTemplate(array{
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     useFipsEndpoint?: bool,
 *     tags?: array<string, string>,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     storeSnapshotOnLocalZone?: bool,
 *     storageConfiguration?: array{
 *         storageType?: 'EBS'|'FSX_ONTAP',
 *         fsxOntapConfiguration?: array{storageVirtualMachineId?: string, credentialsSecretArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicationConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationConfigurationTemplateAsync(array{
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     useFipsEndpoint?: bool,
 *     tags?: array<string, string>,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     storeSnapshotOnLocalZone?: bool,
 *     storageConfiguration?: array{
 *         storageType?: 'EBS'|'FSX_ONTAP',
 *         fsxOntapConfiguration?: array{storageVirtualMachineId?: string, credentialsSecretArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWave(array $args = [])
 * @phpstan-method \Aws\Result createWave(array{name?: string, description?: string, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWaveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWaveAsync(array{name?: string, description?: string, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{applicationID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{applicationID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result deleteConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteConnector(array{connectorID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array{connectorID?: string, ...} $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @phpstan-method \Aws\Result deleteJob(array{jobID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobAsync(array{jobID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result deleteLaunchConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteLaunchConfigurationTemplate(array{launchConfigurationTemplateID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLaunchConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLaunchConfigurationTemplateAsync(array{launchConfigurationTemplateID?: string, ...} $args = [])
 * @method \Aws\Result deleteNetworkMigrationDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkMigrationDefinition(array{networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkMigrationDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkMigrationDefinitionAsync(array{networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicationConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationConfigurationTemplate(array{replicationConfigurationTemplateID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicationConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationConfigurationTemplateAsync(array{replicationConfigurationTemplateID?: string, ...} $args = [])
 * @method \Aws\Result deleteSourceServer(array $args = [])
 * @phpstan-method \Aws\Result deleteSourceServer(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSourceServerAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result deleteVcenterClient(array $args = [])
 * @phpstan-method \Aws\Result deleteVcenterClient(array{vcenterClientID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVcenterClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVcenterClientAsync(array{vcenterClientID?: string, ...} $args = [])
 * @method \Aws\Result deleteWave(array $args = [])
 * @phpstan-method \Aws\Result deleteWave(array{waveID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWaveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWaveAsync(array{waveID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result describeJobLogItems(array $args = [])
 * @phpstan-method \Aws\Result describeJobLogItems(array{jobID?: string, maxResults?: int, nextToken?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobLogItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobLogItemsAsync(array{jobID?: string, maxResults?: int, nextToken?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result describeJobs(array $args = [])
 * @phpstan-method \Aws\Result describeJobs(array{
 *     filters?: array{jobIDs?: list<string>, fromDate?: string, toDate?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobsAsync(array{
 *     filters?: array{jobIDs?: list<string>, fromDate?: string, toDate?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLaunchConfigurationTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeLaunchConfigurationTemplates(array{launchConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLaunchConfigurationTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLaunchConfigurationTemplatesAsync(array{launchConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeReplicationConfigurationTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationConfigurationTemplates(array{replicationConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicationConfigurationTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationConfigurationTemplatesAsync(array{replicationConfigurationTemplateIDs?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeSourceServers(array $args = [])
 * @phpstan-method \Aws\Result describeSourceServers(array{
 *     filters?: array{
 *         sourceServerIDs?: list<string>,
 *         isArchived?: bool,
 *         replicationTypes?: list<'AGENT_BASED'|'SNAPSHOT_SHIPPING'>,
 *         lifeCycleStates?: list<'CUTOVER'|'CUTTING_OVER'|'DISCONNECTED'|'DISCOVERED'|'NOT_READY'|'PENDING_INSTALLATION'|'READY_FOR_CUTOVER'|'READY_FOR_TEST'|'STOPPED'|'TESTING'>,
 *         applicationIDs?: list<string>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSourceServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSourceServersAsync(array{
 *     filters?: array{
 *         sourceServerIDs?: list<string>,
 *         isArchived?: bool,
 *         replicationTypes?: list<'AGENT_BASED'|'SNAPSHOT_SHIPPING'>,
 *         lifeCycleStates?: list<'CUTOVER'|'CUTTING_OVER'|'DISCONNECTED'|'DISCOVERED'|'NOT_READY'|'PENDING_INSTALLATION'|'READY_FOR_CUTOVER'|'READY_FOR_TEST'|'STOPPED'|'TESTING'>,
 *         applicationIDs?: list<string>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeVcenterClients(array $args = [])
 * @phpstan-method \Aws\Result describeVcenterClients(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVcenterClientsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVcenterClientsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateApplications(array $args = [])
 * @phpstan-method \Aws\Result disassociateApplications(array{waveID?: string, applicationIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateApplicationsAsync(array{waveID?: string, applicationIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result disassociateSourceServers(array $args = [])
 * @phpstan-method \Aws\Result disassociateSourceServers(array{applicationID?: string, sourceServerIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSourceServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSourceServersAsync(array{applicationID?: string, sourceServerIDs?: list<string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result disconnectFromService(array $args = [])
 * @phpstan-method \Aws\Result disconnectFromService(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disconnectFromServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disconnectFromServiceAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result finalizeCutover(array $args = [])
 * @phpstan-method \Aws\Result finalizeCutover(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise finalizeCutoverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise finalizeCutoverAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result getLaunchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLaunchConfiguration(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLaunchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLaunchConfigurationAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result getNetworkMigrationDefinition(array $args = [])
 * @phpstan-method \Aws\Result getNetworkMigrationDefinition(array{networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkMigrationDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkMigrationDefinitionAsync(array{networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \Aws\Result getNetworkMigrationMapperSegmentConstruct(array $args = [])
 * @phpstan-method \Aws\Result getNetworkMigrationMapperSegmentConstruct(array{
 *     networkMigrationDefinitionID?: string,
 *     networkMigrationExecutionID?: string,
 *     segmentID?: string,
 *     constructID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkMigrationMapperSegmentConstructAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkMigrationMapperSegmentConstructAsync(array{
 *     networkMigrationDefinitionID?: string,
 *     networkMigrationExecutionID?: string,
 *     segmentID?: string,
 *     constructID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getReplicationConfiguration(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReplicationConfigurationAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result initializeService(array $args = [])
 * @phpstan-method \Aws\Result initializeService(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise initializeServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initializeServiceAsync(array{...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{
 *     filters?: array{applicationIDs?: list<string>, isArchived?: bool, waveIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{
 *     filters?: array{applicationIDs?: list<string>, isArchived?: bool, waveIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{filters?: array{connectorIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{filters?: array{connectorIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExportErrors(array $args = [])
 * @phpstan-method \Aws\Result listExportErrors(array{exportID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportErrorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportErrorsAsync(array{exportID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExports(array $args = [])
 * @phpstan-method \Aws\Result listExports(array{filters?: array{exportIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportsAsync(array{filters?: array{exportIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImportErrors(array $args = [])
 * @phpstan-method \Aws\Result listImportErrors(array{importID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportErrorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportErrorsAsync(array{importID?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImportFileEnrichments(array $args = [])
 * @phpstan-method \Aws\Result listImportFileEnrichments(array{filters?: array{jobIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportFileEnrichmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportFileEnrichmentsAsync(array{filters?: array{jobIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImports(array $args = [])
 * @phpstan-method \Aws\Result listImports(array{filters?: array{importIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportsAsync(array{filters?: array{importIDs?: list<string>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedAccounts(array $args = [])
 * @phpstan-method \Aws\Result listManagedAccounts(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedAccountsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listNetworkMigrationAnalyses(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationAnalyses(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationAnalysesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationAnalysesAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationAnalysisResults(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationAnalysisResults(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{vpcIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationAnalysisResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationAnalysisResultsAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{vpcIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationCodeGenerationSegments(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationCodeGenerationSegments(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{segmentIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationCodeGenerationSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationCodeGenerationSegmentsAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{segmentIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationCodeGenerations(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationCodeGenerations(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationCodeGenerationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationCodeGenerationsAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationDefinitions(array{
 *     filters?: array{networkMigrationDefinitionIDs?: list<string>, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationDefinitionsAsync(array{
 *     filters?: array{networkMigrationDefinitionIDs?: list<string>, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationDeployedStacks(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationDeployedStacks(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationDeployedStacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationDeployedStacksAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationDeployments(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationDeployments(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationDeploymentsAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationExecutions(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationExecutions(array{
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{
 *         networkMigrationExecutionIDs?: list<string>,
 *         networkMigrationExecutionStatuses?: list<'FAILED'|'PENDING'|'STARTED'|'SUCCEEDED'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationExecutionsAsync(array{
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{
 *         networkMigrationExecutionIDs?: list<string>,
 *         networkMigrationExecutionStatuses?: list<'FAILED'|'PENDING'|'STARTED'|'SUCCEEDED'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationMapperSegmentConstructs(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationMapperSegmentConstructs(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     segmentID?: string,
 *     filters?: array{constructIDs?: list<string>, constructTypes?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationMapperSegmentConstructsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationMapperSegmentConstructsAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     segmentID?: string,
 *     filters?: array{constructIDs?: list<string>, constructTypes?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationMapperSegments(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationMapperSegments(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{segmentIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationMapperSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationMapperSegmentsAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{segmentIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationMappingUpdates(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationMappingUpdates(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationMappingUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationMappingUpdatesAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkMigrationMappings(array $args = [])
 * @phpstan-method \Aws\Result listNetworkMigrationMappings(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkMigrationMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkMigrationMappingsAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     filters?: array{jobIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSourceServerActions(array $args = [])
 * @phpstan-method \Aws\Result listSourceServerActions(array{
 *     sourceServerID?: string,
 *     filters?: array{actionIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceServerActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceServerActionsAsync(array{
 *     sourceServerID?: string,
 *     filters?: array{actionIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplateActions(array $args = [])
 * @phpstan-method \Aws\Result listTemplateActions(array{
 *     launchConfigurationTemplateID?: string,
 *     filters?: array{actionIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateActionsAsync(array{
 *     launchConfigurationTemplateID?: string,
 *     filters?: array{actionIDs?: list<string>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWaves(array $args = [])
 * @phpstan-method \Aws\Result listWaves(array{
 *     filters?: array{waveIDs?: list<string>, isArchived?: bool, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWavesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWavesAsync(array{
 *     filters?: array{waveIDs?: list<string>, isArchived?: bool, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result markAsArchived(array $args = [])
 * @phpstan-method \Aws\Result markAsArchived(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise markAsArchivedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise markAsArchivedAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result pauseReplication(array $args = [])
 * @phpstan-method \Aws\Result pauseReplication(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pauseReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pauseReplicationAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result putSourceServerAction(array $args = [])
 * @phpstan-method \Aws\Result putSourceServerAction(array{
 *     sourceServerID?: string,
 *     actionName?: string,
 *     documentIdentifier?: string,
 *     order?: int,
 *     actionID?: string,
 *     documentVersion?: string,
 *     active?: bool,
 *     timeoutSeconds?: int,
 *     mustSucceedForCutover?: bool,
 *     parameters?: array<string, list<array>>,
 *     externalParameters?: array<string, array{dynamicPath?: string, ...}>,
 *     description?: string,
 *     category?: 'BACKUP'|'CONFIGURATION'|'DISASTER_RECOVERY'|'LICENSE_AND_SUBSCRIPTION'|'NETWORKING'|'OBSERVABILITY'|'OPERATING_SYSTEM'|'OTHER'|'REFACTORING'|'SECURITY'|'VALIDATION',
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSourceServerActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSourceServerActionAsync(array{
 *     sourceServerID?: string,
 *     actionName?: string,
 *     documentIdentifier?: string,
 *     order?: int,
 *     actionID?: string,
 *     documentVersion?: string,
 *     active?: bool,
 *     timeoutSeconds?: int,
 *     mustSucceedForCutover?: bool,
 *     parameters?: array<string, list<array>>,
 *     externalParameters?: array<string, array{dynamicPath?: string, ...}>,
 *     description?: string,
 *     category?: 'BACKUP'|'CONFIGURATION'|'DISASTER_RECOVERY'|'LICENSE_AND_SUBSCRIPTION'|'NETWORKING'|'OBSERVABILITY'|'OPERATING_SYSTEM'|'OTHER'|'REFACTORING'|'SECURITY'|'VALIDATION',
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTemplateAction(array $args = [])
 * @phpstan-method \Aws\Result putTemplateAction(array{
 *     launchConfigurationTemplateID?: string,
 *     actionName?: string,
 *     documentIdentifier?: string,
 *     order?: int,
 *     actionID?: string,
 *     documentVersion?: string,
 *     active?: bool,
 *     timeoutSeconds?: int,
 *     mustSucceedForCutover?: bool,
 *     parameters?: array<string, list<array>>,
 *     operatingSystem?: string,
 *     externalParameters?: array<string, array{dynamicPath?: string, ...}>,
 *     description?: string,
 *     category?: 'BACKUP'|'CONFIGURATION'|'DISASTER_RECOVERY'|'LICENSE_AND_SUBSCRIPTION'|'NETWORKING'|'OBSERVABILITY'|'OPERATING_SYSTEM'|'OTHER'|'REFACTORING'|'SECURITY'|'VALIDATION',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTemplateActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTemplateActionAsync(array{
 *     launchConfigurationTemplateID?: string,
 *     actionName?: string,
 *     documentIdentifier?: string,
 *     order?: int,
 *     actionID?: string,
 *     documentVersion?: string,
 *     active?: bool,
 *     timeoutSeconds?: int,
 *     mustSucceedForCutover?: bool,
 *     parameters?: array<string, list<array>>,
 *     operatingSystem?: string,
 *     externalParameters?: array<string, array{dynamicPath?: string, ...}>,
 *     description?: string,
 *     category?: 'BACKUP'|'CONFIGURATION'|'DISASTER_RECOVERY'|'LICENSE_AND_SUBSCRIPTION'|'NETWORKING'|'OBSERVABILITY'|'OPERATING_SYSTEM'|'OTHER'|'REFACTORING'|'SECURITY'|'VALIDATION',
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeSourceServerAction(array $args = [])
 * @phpstan-method \Aws\Result removeSourceServerAction(array{sourceServerID?: string, actionID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeSourceServerActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeSourceServerActionAsync(array{sourceServerID?: string, actionID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result removeTemplateAction(array $args = [])
 * @phpstan-method \Aws\Result removeTemplateAction(array{launchConfigurationTemplateID?: string, actionID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTemplateActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTemplateActionAsync(array{launchConfigurationTemplateID?: string, actionID?: string, ...} $args = [])
 * @method \Aws\Result resumeReplication(array $args = [])
 * @phpstan-method \Aws\Result resumeReplication(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeReplicationAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result retryDataReplication(array $args = [])
 * @phpstan-method \Aws\Result retryDataReplication(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retryDataReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryDataReplicationAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result startCutover(array $args = [])
 * @phpstan-method \Aws\Result startCutover(array{sourceServerIDs?: list<string>, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCutoverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCutoverAsync(array{sourceServerIDs?: list<string>, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result startExport(array $args = [])
 * @phpstan-method \Aws\Result startExport(array{s3Bucket?: string, s3Key?: string, s3BucketOwner?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExportAsync(array{s3Bucket?: string, s3Key?: string, s3BucketOwner?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result startImport(array $args = [])
 * @phpstan-method \Aws\Result startImport(array{
 *     clientToken?: string,
 *     s3BucketSource?: array{s3Bucket?: string, s3Key?: string, s3BucketOwner?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportAsync(array{
 *     clientToken?: string,
 *     s3BucketSource?: array{s3Bucket?: string, s3Key?: string, s3BucketOwner?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startImportFileEnrichment(array $args = [])
 * @phpstan-method \Aws\Result startImportFileEnrichment(array{
 *     clientToken?: string,
 *     s3BucketSource?: array{s3Bucket?: string, s3BucketOwner?: string, s3Key?: string, ...},
 *     s3BucketTarget?: array{s3Bucket?: string, s3BucketOwner?: string, s3Key?: string, ...},
 *     ipAssignmentStrategy?: 'DYNAMIC'|'STATIC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportFileEnrichmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportFileEnrichmentAsync(array{
 *     clientToken?: string,
 *     s3BucketSource?: array{s3Bucket?: string, s3BucketOwner?: string, s3Key?: string, ...},
 *     s3BucketTarget?: array{s3Bucket?: string, s3BucketOwner?: string, s3Key?: string, ...},
 *     ipAssignmentStrategy?: 'DYNAMIC'|'STATIC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNetworkMigrationAnalysis(array $args = [])
 * @phpstan-method \Aws\Result startNetworkMigrationAnalysis(array{networkMigrationExecutionID?: string, networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startNetworkMigrationAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNetworkMigrationAnalysisAsync(array{networkMigrationExecutionID?: string, networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \Aws\Result startNetworkMigrationCodeGeneration(array $args = [])
 * @phpstan-method \Aws\Result startNetworkMigrationCodeGeneration(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     codeGenerationOutputFormatTypes?: list<'CDK_L1'|'CDK_L2'|'LZA'|'TERRAFORM'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNetworkMigrationCodeGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNetworkMigrationCodeGenerationAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     codeGenerationOutputFormatTypes?: list<'CDK_L1'|'CDK_L2'|'LZA'|'TERRAFORM'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNetworkMigrationDeployment(array $args = [])
 * @phpstan-method \Aws\Result startNetworkMigrationDeployment(array{networkMigrationExecutionID?: string, networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startNetworkMigrationDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNetworkMigrationDeploymentAsync(array{networkMigrationExecutionID?: string, networkMigrationDefinitionID?: string, ...} $args = [])
 * @method \Aws\Result startNetworkMigrationMapping(array $args = [])
 * @phpstan-method \Aws\Result startNetworkMigrationMapping(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     securityGroupMappingStrategy?: 'MAP'|'MAP_DHCP'|'SKIP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNetworkMigrationMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNetworkMigrationMappingAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     securityGroupMappingStrategy?: 'MAP'|'MAP_DHCP'|'SKIP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNetworkMigrationMappingUpdate(array $args = [])
 * @phpstan-method \Aws\Result startNetworkMigrationMappingUpdate(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     constructs?: list<array{segmentID?: string, constructID?: string, constructType?: string, operation?: array, ...}>,
 *     segments?: list<array{segmentID?: string, targetAccount?: string, scopeTags?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNetworkMigrationMappingUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNetworkMigrationMappingUpdateAsync(array{
 *     networkMigrationExecutionID?: string,
 *     networkMigrationDefinitionID?: string,
 *     constructs?: list<array{segmentID?: string, constructID?: string, constructType?: string, operation?: array, ...}>,
 *     segments?: list<array{segmentID?: string, targetAccount?: string, scopeTags?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReplication(array $args = [])
 * @phpstan-method \Aws\Result startReplication(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReplicationAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result startTest(array $args = [])
 * @phpstan-method \Aws\Result startTest(array{sourceServerIDs?: list<string>, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTestAsync(array{sourceServerIDs?: list<string>, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result stopReplication(array $args = [])
 * @phpstan-method \Aws\Result stopReplication(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopReplicationAsync(array{sourceServerID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result terminateTargetInstances(array $args = [])
 * @phpstan-method \Aws\Result terminateTargetInstances(array{sourceServerIDs?: list<string>, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateTargetInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateTargetInstancesAsync(array{sourceServerIDs?: list<string>, tags?: array<string, string>, accountID?: string, ...} $args = [])
 * @method \Aws\Result unarchiveApplication(array $args = [])
 * @phpstan-method \Aws\Result unarchiveApplication(array{applicationID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unarchiveApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unarchiveApplicationAsync(array{applicationID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result unarchiveWave(array $args = [])
 * @phpstan-method \Aws\Result unarchiveWave(array{waveID?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unarchiveWaveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unarchiveWaveAsync(array{waveID?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{applicationID?: string, name?: string, description?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{applicationID?: string, name?: string, description?: string, accountID?: string, ...} $args = [])
 * @method \Aws\Result updateConnector(array $args = [])
 * @phpstan-method \Aws\Result updateConnector(array{
 *     connectorID?: string,
 *     name?: string,
 *     ssmCommandConfig?: array{
 *         s3OutputEnabled?: bool,
 *         outputS3BucketName?: string,
 *         cloudWatchOutputEnabled?: bool,
 *         cloudWatchLogGroupName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorAsync(array{
 *     connectorID?: string,
 *     name?: string,
 *     ssmCommandConfig?: array{
 *         s3OutputEnabled?: bool,
 *         outputS3BucketName?: string,
 *         cloudWatchOutputEnabled?: bool,
 *         cloudWatchLogGroupName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLaunchConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLaunchConfiguration(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     bootMode?: 'LEGACY_BIOS'|'UEFI'|'USE_SOURCE',
 *     postLaunchActions?: array{
 *         deployment?: 'CUTOVER_ONLY'|'TEST_AND_CUTOVER'|'TEST_ONLY',
 *         s3LogBucket?: string,
 *         s3OutputKeyPrefix?: string,
 *         cloudWatchLogGroupName?: string,
 *         ssmDocuments?: list<array>,
 *         ...,
 *     },
 *     enableMapAutoTagging?: bool,
 *     mapAutoTaggingMpeID?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLaunchConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLaunchConfigurationAsync(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'NONE',
 *     copyPrivateIp?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     bootMode?: 'LEGACY_BIOS'|'UEFI'|'USE_SOURCE',
 *     postLaunchActions?: array{
 *         deployment?: 'CUTOVER_ONLY'|'TEST_AND_CUTOVER'|'TEST_ONLY',
 *         s3LogBucket?: string,
 *         s3OutputKeyPrefix?: string,
 *         cloudWatchLogGroupName?: string,
 *         ssmDocuments?: list<array>,
 *         ...,
 *     },
 *     enableMapAutoTagging?: bool,
 *     mapAutoTaggingMpeID?: string,
 *     accountID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLaunchConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateLaunchConfigurationTemplate(array{
 *     launchConfigurationTemplateID?: string,
 *     postLaunchActions?: array{
 *         deployment?: 'CUTOVER_ONLY'|'TEST_AND_CUTOVER'|'TEST_ONLY',
 *         s3LogBucket?: string,
 *         s3OutputKeyPrefix?: string,
 *         cloudWatchLogGroupName?: string,
 *         ssmDocuments?: list<array>,
 *         ...,
 *     },
 *     enableMapAutoTagging?: bool,
 *     mapAutoTaggingMpeID?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'NONE',
 *     copyPrivateIp?: bool,
 *     associatePublicIpAddress?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     bootMode?: 'LEGACY_BIOS'|'UEFI'|'USE_SOURCE',
 *     smallVolumeMaxSize?: int,
 *     smallVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     largeVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     enableParametersEncryption?: bool,
 *     parametersEncryptionKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLaunchConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLaunchConfigurationTemplateAsync(array{
 *     launchConfigurationTemplateID?: string,
 *     postLaunchActions?: array{
 *         deployment?: 'CUTOVER_ONLY'|'TEST_AND_CUTOVER'|'TEST_ONLY',
 *         s3LogBucket?: string,
 *         s3OutputKeyPrefix?: string,
 *         cloudWatchLogGroupName?: string,
 *         ssmDocuments?: list<array>,
 *         ...,
 *     },
 *     enableMapAutoTagging?: bool,
 *     mapAutoTaggingMpeID?: string,
 *     launchDisposition?: 'STARTED'|'STOPPED',
 *     targetInstanceTypeRightSizingMethod?: 'BASIC'|'NONE',
 *     copyPrivateIp?: bool,
 *     associatePublicIpAddress?: bool,
 *     copyTags?: bool,
 *     licensing?: array{osByol?: bool, ...},
 *     bootMode?: 'LEGACY_BIOS'|'UEFI'|'USE_SOURCE',
 *     smallVolumeMaxSize?: int,
 *     smallVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     largeVolumeConf?: array{volumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard', iops?: int, throughput?: int, ...},
 *     enableParametersEncryption?: bool,
 *     parametersEncryptionKey?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetworkMigrationDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkMigrationDefinition(array{
 *     networkMigrationDefinitionID?: string,
 *     name?: string,
 *     description?: string,
 *     sourceConfigurations?: list<array{
 *         sourceEnvironment?: 'AWS_DISCOVERY_COLLECTOR'|'CISCO_ACI'|'FORTIGATE_FIREWALL'|'LOGICAL_MODEL'|'MODELIZE_IT'|'NSX'|'PALO_ALTO_FIREWALL'|'VSPHERE',
 *         sourceS3Configuration?: array,
 *         ...,
 *     }>,
 *     targetS3Configuration?: array{s3Bucket?: string, s3BucketOwner?: string, ...},
 *     targetNetwork?: array{
 *         topology?: 'HUB_AND_SPOKE'|'ISOLATED_VPC',
 *         inboundCidr?: string,
 *         outboundCidr?: string,
 *         inspectionCidr?: string,
 *         ...,
 *     },
 *     targetDeployment?: 'MULTI_ACCOUNT'|'SINGLE_ACCOUNT',
 *     scopeTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkMigrationDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkMigrationDefinitionAsync(array{
 *     networkMigrationDefinitionID?: string,
 *     name?: string,
 *     description?: string,
 *     sourceConfigurations?: list<array{
 *         sourceEnvironment?: 'AWS_DISCOVERY_COLLECTOR'|'CISCO_ACI'|'FORTIGATE_FIREWALL'|'LOGICAL_MODEL'|'MODELIZE_IT'|'NSX'|'PALO_ALTO_FIREWALL'|'VSPHERE',
 *         sourceS3Configuration?: array,
 *         ...,
 *     }>,
 *     targetS3Configuration?: array{s3Bucket?: string, s3BucketOwner?: string, ...},
 *     targetNetwork?: array{
 *         topology?: 'HUB_AND_SPOKE'|'ISOLATED_VPC',
 *         inboundCidr?: string,
 *         outboundCidr?: string,
 *         inspectionCidr?: string,
 *         ...,
 *     },
 *     targetDeployment?: 'MULTI_ACCOUNT'|'SINGLE_ACCOUNT',
 *     scopeTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetworkMigrationMapperSegment(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkMigrationMapperSegment(array{
 *     networkMigrationDefinitionID?: string,
 *     networkMigrationExecutionID?: string,
 *     segmentID?: string,
 *     scopeTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkMigrationMapperSegmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkMigrationMapperSegmentAsync(array{
 *     networkMigrationDefinitionID?: string,
 *     networkMigrationExecutionID?: string,
 *     segmentID?: string,
 *     scopeTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateReplicationConfiguration(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'GP2'|'GP3'|'ST1',
 *     replicatedDisks?: list<array{
 *         deviceName?: string,
 *         isBootDisk?: bool,
 *         stagingDiskType?: 'AUTO'|'FSX_ONTAP'|'GP2'|'GP3'|'IO1'|'IO2'|'SC1'|'ST1'|'STANDARD',
 *         iops?: int,
 *         throughput?: int,
 *         ...,
 *     }>,
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     useFipsEndpoint?: bool,
 *     accountID?: string,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     storeSnapshotOnLocalZone?: bool,
 *     storageConfiguration?: array{
 *         storageType?: 'EBS'|'FSX_ONTAP',
 *         fsxOntapConfiguration?: array{storageVirtualMachineId?: string, credentialsSecretArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReplicationConfigurationAsync(array{
 *     sourceServerID?: string,
 *     name?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'GP2'|'GP3'|'ST1',
 *     replicatedDisks?: list<array{
 *         deviceName?: string,
 *         isBootDisk?: bool,
 *         stagingDiskType?: 'AUTO'|'FSX_ONTAP'|'GP2'|'GP3'|'IO1'|'IO2'|'SC1'|'ST1'|'STANDARD',
 *         iops?: int,
 *         throughput?: int,
 *         ...,
 *     }>,
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     useFipsEndpoint?: bool,
 *     accountID?: string,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     storeSnapshotOnLocalZone?: bool,
 *     storageConfiguration?: array{
 *         storageType?: 'EBS'|'FSX_ONTAP',
 *         fsxOntapConfiguration?: array{storageVirtualMachineId?: string, credentialsSecretArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReplicationConfigurationTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateReplicationConfigurationTemplate(array{
 *     replicationConfigurationTemplateID?: string,
 *     arn?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     useFipsEndpoint?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     storeSnapshotOnLocalZone?: bool,
 *     storageConfiguration?: array{
 *         storageType?: 'EBS'|'FSX_ONTAP',
 *         fsxOntapConfiguration?: array{storageVirtualMachineId?: string, credentialsSecretArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReplicationConfigurationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReplicationConfigurationTemplateAsync(array{
 *     replicationConfigurationTemplateID?: string,
 *     arn?: string,
 *     stagingAreaSubnetId?: string,
 *     associateDefaultSecurityGroup?: bool,
 *     replicationServersSecurityGroupsIDs?: list<string>,
 *     replicationServerInstanceType?: string,
 *     useDedicatedReplicationServer?: bool,
 *     defaultLargeStagingDiskType?: 'GP2'|'GP3'|'ST1',
 *     ebsEncryption?: 'CUSTOM'|'DEFAULT',
 *     ebsEncryptionKeyArn?: string,
 *     bandwidthThrottling?: int,
 *     dataPlaneRouting?: 'PRIVATE_IP'|'PUBLIC_IP',
 *     createPublicIP?: bool,
 *     stagingAreaTags?: array<string, string>,
 *     useFipsEndpoint?: bool,
 *     internetProtocol?: 'IPV4'|'IPV6',
 *     storeSnapshotOnLocalZone?: bool,
 *     storageConfiguration?: array{
 *         storageType?: 'EBS'|'FSX_ONTAP',
 *         fsxOntapConfiguration?: array{storageVirtualMachineId?: string, credentialsSecretArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSourceServer(array $args = [])
 * @phpstan-method \Aws\Result updateSourceServer(array{
 *     accountID?: string,
 *     sourceServerID?: string,
 *     connectorAction?: array{credentialsSecretArn?: string, connectorArn?: string, ...},
 *     userProvidedID?: string,
 *     fqdnForActionFramework?: string,
 *     platform?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSourceServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSourceServerAsync(array{
 *     accountID?: string,
 *     sourceServerID?: string,
 *     connectorAction?: array{credentialsSecretArn?: string, connectorArn?: string, ...},
 *     userProvidedID?: string,
 *     fqdnForActionFramework?: string,
 *     platform?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSourceServerReplicationType(array $args = [])
 * @phpstan-method \Aws\Result updateSourceServerReplicationType(array{sourceServerID?: string, replicationType?: 'AGENT_BASED'|'SNAPSHOT_SHIPPING', accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSourceServerReplicationTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSourceServerReplicationTypeAsync(array{sourceServerID?: string, replicationType?: 'AGENT_BASED'|'SNAPSHOT_SHIPPING', accountID?: string, ...} $args = [])
 * @method \Aws\Result updateWave(array $args = [])
 * @phpstan-method \Aws\Result updateWave(array{waveID?: string, name?: string, description?: string, accountID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWaveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWaveAsync(array{waveID?: string, name?: string, description?: string, accountID?: string, ...} $args = [])
 */
class mgnClient extends AwsClient {}
