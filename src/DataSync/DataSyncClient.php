<?php
namespace Aws\DataSync;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS DataSync** service.
 * @method \Aws\Result cancelTaskExecution(array $args = [])
 * @phpstan-method \Aws\Result cancelTaskExecution(array{TaskExecutionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTaskExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTaskExecutionAsync(array{TaskExecutionArn?: string, ...} $args = [])
 * @method \Aws\Result createAgent(array $args = [])
 * @phpstan-method \Aws\Result createAgent(array{
 *     ActivationKey?: string,
 *     AgentName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VpcEndpointId?: string,
 *     SubnetArns?: list<string>,
 *     SecurityGroupArns?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentAsync(array{
 *     ActivationKey?: string,
 *     AgentName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VpcEndpointId?: string,
 *     SubnetArns?: list<string>,
 *     SecurityGroupArns?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationAzureBlob(array $args = [])
 * @phpstan-method \Aws\Result createLocationAzureBlob(array{
 *     ContainerUrl?: string,
 *     AuthenticationType?: 'NONE'|'SAS',
 *     SasConfiguration?: array{Token?: string, ...},
 *     BlobType?: 'BLOCK',
 *     AccessTier?: 'ARCHIVE'|'COOL'|'HOT',
 *     Subdirectory?: string,
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationAzureBlobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationAzureBlobAsync(array{
 *     ContainerUrl?: string,
 *     AuthenticationType?: 'NONE'|'SAS',
 *     SasConfiguration?: array{Token?: string, ...},
 *     BlobType?: 'BLOCK',
 *     AccessTier?: 'ARCHIVE'|'COOL'|'HOT',
 *     Subdirectory?: string,
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationEfs(array $args = [])
 * @phpstan-method \Aws\Result createLocationEfs(array{
 *     Subdirectory?: string,
 *     EfsFilesystemArn?: string,
 *     Ec2Config?: array{SubnetArn?: string, SecurityGroupArns?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AccessPointArn?: string,
 *     FileSystemAccessRoleArn?: string,
 *     InTransitEncryption?: 'NONE'|'TLS1_2',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationEfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationEfsAsync(array{
 *     Subdirectory?: string,
 *     EfsFilesystemArn?: string,
 *     Ec2Config?: array{SubnetArn?: string, SecurityGroupArns?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AccessPointArn?: string,
 *     FileSystemAccessRoleArn?: string,
 *     InTransitEncryption?: 'NONE'|'TLS1_2',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationFsxLustre(array $args = [])
 * @phpstan-method \Aws\Result createLocationFsxLustre(array{
 *     FsxFilesystemArn?: string,
 *     SecurityGroupArns?: list<string>,
 *     Subdirectory?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationFsxLustreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationFsxLustreAsync(array{
 *     FsxFilesystemArn?: string,
 *     SecurityGroupArns?: list<string>,
 *     Subdirectory?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationFsxOntap(array $args = [])
 * @phpstan-method \Aws\Result createLocationFsxOntap(array{
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             ManagedSecretConfig?: array,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SecurityGroupArns?: list<string>,
 *     StorageVirtualMachineArn?: string,
 *     Subdirectory?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationFsxOntapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationFsxOntapAsync(array{
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             ManagedSecretConfig?: array,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SecurityGroupArns?: list<string>,
 *     StorageVirtualMachineArn?: string,
 *     Subdirectory?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationFsxOpenZfs(array $args = [])
 * @phpstan-method \Aws\Result createLocationFsxOpenZfs(array{
 *     FsxFilesystemArn?: string,
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             ManagedSecretConfig?: array,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SecurityGroupArns?: list<string>,
 *     Subdirectory?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationFsxOpenZfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationFsxOpenZfsAsync(array{
 *     FsxFilesystemArn?: string,
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             ManagedSecretConfig?: array,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SecurityGroupArns?: list<string>,
 *     Subdirectory?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationFsxWindows(array $args = [])
 * @phpstan-method \Aws\Result createLocationFsxWindows(array{
 *     Subdirectory?: string,
 *     FsxFilesystemArn?: string,
 *     SecurityGroupArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     User?: string,
 *     Domain?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationFsxWindowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationFsxWindowsAsync(array{
 *     Subdirectory?: string,
 *     FsxFilesystemArn?: string,
 *     SecurityGroupArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     User?: string,
 *     Domain?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationHdfs(array $args = [])
 * @phpstan-method \Aws\Result createLocationHdfs(array{
 *     Subdirectory?: string,
 *     NameNodes?: list<array{Hostname?: string, Port?: int, ...}>,
 *     BlockSize?: int,
 *     ReplicationFactor?: int,
 *     KmsKeyProviderUri?: string,
 *     QopConfiguration?: array{
 *         RpcProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         DataTransferProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         ...,
 *     },
 *     AuthenticationType?: 'KERBEROS'|'SIMPLE',
 *     SimpleUser?: string,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationHdfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationHdfsAsync(array{
 *     Subdirectory?: string,
 *     NameNodes?: list<array{Hostname?: string, Port?: int, ...}>,
 *     BlockSize?: int,
 *     ReplicationFactor?: int,
 *     KmsKeyProviderUri?: string,
 *     QopConfiguration?: array{
 *         RpcProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         DataTransferProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         ...,
 *     },
 *     AuthenticationType?: 'KERBEROS'|'SIMPLE',
 *     SimpleUser?: string,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationNfs(array $args = [])
 * @phpstan-method \Aws\Result createLocationNfs(array{
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     OnPremConfig?: array{AgentArns?: list<string>, ...},
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'NFS3'|'NFS4_0'|'NFS4_1', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationNfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationNfsAsync(array{
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     OnPremConfig?: array{AgentArns?: list<string>, ...},
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'NFS3'|'NFS4_0'|'NFS4_1', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationObjectStorage(array $args = [])
 * @phpstan-method \Aws\Result createLocationObjectStorage(array{
 *     ServerHostname?: string,
 *     ServerPort?: int,
 *     ServerProtocol?: 'HTTP'|'HTTPS',
 *     Subdirectory?: string,
 *     BucketName?: string,
 *     AccessKey?: string,
 *     SecretKey?: string,
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ServerCertificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationObjectStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationObjectStorageAsync(array{
 *     ServerHostname?: string,
 *     ServerPort?: int,
 *     ServerProtocol?: 'HTTP'|'HTTPS',
 *     Subdirectory?: string,
 *     BucketName?: string,
 *     AccessKey?: string,
 *     SecretKey?: string,
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ServerCertificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationS3(array $args = [])
 * @phpstan-method \Aws\Result createLocationS3(array{
 *     Subdirectory?: string,
 *     S3BucketArn?: string,
 *     S3StorageClass?: 'DEEP_ARCHIVE'|'GLACIER'|'GLACIER_INSTANT_RETRIEVAL'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'STANDARD'|'STANDARD_IA',
 *     S3Config?: array{BucketAccessRoleArn?: string, ...},
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationS3Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationS3Async(array{
 *     Subdirectory?: string,
 *     S3BucketArn?: string,
 *     S3StorageClass?: 'DEEP_ARCHIVE'|'GLACIER'|'GLACIER_INSTANT_RETRIEVAL'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'STANDARD'|'STANDARD_IA',
 *     S3Config?: array{BucketAccessRoleArn?: string, ...},
 *     AgentArns?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocationSmb(array $args = [])
 * @phpstan-method \Aws\Result createLocationSmb(array{
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     User?: string,
 *     Domain?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     AgentArns?: list<string>,
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'SMB1'|'SMB2'|'SMB2_0'|'SMB3', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuthenticationType?: 'KERBEROS'|'NTLM',
 *     DnsIpAddresses?: list<string>,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationSmbAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationSmbAsync(array{
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     User?: string,
 *     Domain?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     AgentArns?: list<string>,
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'SMB1'|'SMB2'|'SMB2_0'|'SMB3', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AuthenticationType?: 'KERBEROS'|'NTLM',
 *     DnsIpAddresses?: list<string>,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTask(array $args = [])
 * @phpstan-method \Aws\Result createTask(array{
 *     SourceLocationArn?: string,
 *     DestinationLocationArn?: string,
 *     CloudWatchLogGroupArn?: string,
 *     Name?: string,
 *     Options?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     Excludes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     Schedule?: array{ScheduleExpression?: string, Status?: 'DISABLED'|'ENABLED', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Includes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     ManifestConfig?: array{Action?: 'TRANSFER', Format?: 'CSV', Source?: array{S3?: array, ...}, ...},
 *     TaskReportConfig?: array{
 *         Destination?: array{S3?: array, ...},
 *         OutputType?: 'STANDARD'|'SUMMARY_ONLY',
 *         ReportLevel?: 'ERRORS_ONLY'|'SUCCESSES_AND_ERRORS',
 *         ObjectVersionIds?: 'INCLUDE'|'NONE',
 *         Overrides?: array{Transferred?: array, Verified?: array, Deleted?: array, Skipped?: array, ...},
 *         ...,
 *     },
 *     TaskMode?: 'BASIC'|'ENHANCED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTaskAsync(array{
 *     SourceLocationArn?: string,
 *     DestinationLocationArn?: string,
 *     CloudWatchLogGroupArn?: string,
 *     Name?: string,
 *     Options?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     Excludes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     Schedule?: array{ScheduleExpression?: string, Status?: 'DISABLED'|'ENABLED', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Includes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     ManifestConfig?: array{Action?: 'TRANSFER', Format?: 'CSV', Source?: array{S3?: array, ...}, ...},
 *     TaskReportConfig?: array{
 *         Destination?: array{S3?: array, ...},
 *         OutputType?: 'STANDARD'|'SUMMARY_ONLY',
 *         ReportLevel?: 'ERRORS_ONLY'|'SUCCESSES_AND_ERRORS',
 *         ObjectVersionIds?: 'INCLUDE'|'NONE',
 *         Overrides?: array{Transferred?: array, Verified?: array, Deleted?: array, Skipped?: array, ...},
 *         ...,
 *     },
 *     TaskMode?: 'BASIC'|'ENHANCED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAgent(array $args = [])
 * @phpstan-method \Aws\Result deleteAgent(array{AgentArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentAsync(array{AgentArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLocation(array $args = [])
 * @phpstan-method \Aws\Result deleteLocation(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLocationAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTask(array $args = [])
 * @phpstan-method \Aws\Result deleteTask(array{TaskArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTaskAsync(array{TaskArn?: string, ...} $args = [])
 * @method \Aws\Result describeAgent(array $args = [])
 * @phpstan-method \Aws\Result describeAgent(array{AgentArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAgentAsync(array{AgentArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationAzureBlob(array $args = [])
 * @phpstan-method \Aws\Result describeLocationAzureBlob(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationAzureBlobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationAzureBlobAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationEfs(array $args = [])
 * @phpstan-method \Aws\Result describeLocationEfs(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationEfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationEfsAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationFsxLustre(array $args = [])
 * @phpstan-method \Aws\Result describeLocationFsxLustre(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationFsxLustreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationFsxLustreAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationFsxOntap(array $args = [])
 * @phpstan-method \Aws\Result describeLocationFsxOntap(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationFsxOntapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationFsxOntapAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationFsxOpenZfs(array $args = [])
 * @phpstan-method \Aws\Result describeLocationFsxOpenZfs(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationFsxOpenZfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationFsxOpenZfsAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationFsxWindows(array $args = [])
 * @phpstan-method \Aws\Result describeLocationFsxWindows(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationFsxWindowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationFsxWindowsAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationHdfs(array $args = [])
 * @phpstan-method \Aws\Result describeLocationHdfs(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationHdfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationHdfsAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationNfs(array $args = [])
 * @phpstan-method \Aws\Result describeLocationNfs(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationNfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationNfsAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationObjectStorage(array $args = [])
 * @phpstan-method \Aws\Result describeLocationObjectStorage(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationObjectStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationObjectStorageAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationS3(array $args = [])
 * @phpstan-method \Aws\Result describeLocationS3(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationS3Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationS3Async(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeLocationSmb(array $args = [])
 * @phpstan-method \Aws\Result describeLocationSmb(array{LocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationSmbAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLocationSmbAsync(array{LocationArn?: string, ...} $args = [])
 * @method \Aws\Result describeTask(array $args = [])
 * @phpstan-method \Aws\Result describeTask(array{TaskArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTaskAsync(array{TaskArn?: string, ...} $args = [])
 * @method \Aws\Result describeTaskExecution(array $args = [])
 * @phpstan-method \Aws\Result describeTaskExecution(array{TaskExecutionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTaskExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTaskExecutionAsync(array{TaskExecutionArn?: string, ...} $args = [])
 * @method \Aws\Result listAgents(array $args = [])
 * @phpstan-method \Aws\Result listAgents(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLocations(array $args = [])
 * @phpstan-method \Aws\Result listLocations(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Name?: 'CreationTime'|'LocationType'|'LocationUri',
 *         Values?: list<string>,
 *         Operator?: 'BeginsWith'|'Contains'|'Equals'|'GreaterThan'|'GreaterThanOrEqual'|'In'|'LessThan'|'LessThanOrEqual'|'NotContains'|'NotEquals',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLocationsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Name?: 'CreationTime'|'LocationType'|'LocationUri',
 *         Values?: list<string>,
 *         Operator?: 'BeginsWith'|'Contains'|'Equals'|'GreaterThan'|'GreaterThanOrEqual'|'In'|'LessThan'|'LessThanOrEqual'|'NotContains'|'NotEquals',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTaskExecutions(array $args = [])
 * @phpstan-method \Aws\Result listTaskExecutions(array{TaskArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTaskExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTaskExecutionsAsync(array{TaskArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTasks(array $args = [])
 * @phpstan-method \Aws\Result listTasks(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Name?: 'CreationTime'|'LocationId',
 *         Values?: list<string>,
 *         Operator?: 'BeginsWith'|'Contains'|'Equals'|'GreaterThan'|'GreaterThanOrEqual'|'In'|'LessThan'|'LessThanOrEqual'|'NotContains'|'NotEquals',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTasksAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Name?: 'CreationTime'|'LocationId',
 *         Values?: list<string>,
 *         Operator?: 'BeginsWith'|'Contains'|'Equals'|'GreaterThan'|'GreaterThanOrEqual'|'In'|'LessThan'|'LessThanOrEqual'|'NotContains'|'NotEquals',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTaskExecution(array $args = [])
 * @phpstan-method \Aws\Result startTaskExecution(array{
 *     TaskArn?: string,
 *     OverrideOptions?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     Includes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     Excludes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     ManifestConfig?: array{Action?: 'TRANSFER', Format?: 'CSV', Source?: array{S3?: array, ...}, ...},
 *     TaskReportConfig?: array{
 *         Destination?: array{S3?: array, ...},
 *         OutputType?: 'STANDARD'|'SUMMARY_ONLY',
 *         ReportLevel?: 'ERRORS_ONLY'|'SUCCESSES_AND_ERRORS',
 *         ObjectVersionIds?: 'INCLUDE'|'NONE',
 *         Overrides?: array{Transferred?: array, Verified?: array, Deleted?: array, Skipped?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTaskExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTaskExecutionAsync(array{
 *     TaskArn?: string,
 *     OverrideOptions?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     Includes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     Excludes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     ManifestConfig?: array{Action?: 'TRANSFER', Format?: 'CSV', Source?: array{S3?: array, ...}, ...},
 *     TaskReportConfig?: array{
 *         Destination?: array{S3?: array, ...},
 *         OutputType?: 'STANDARD'|'SUMMARY_ONLY',
 *         ReportLevel?: 'ERRORS_ONLY'|'SUCCESSES_AND_ERRORS',
 *         ObjectVersionIds?: 'INCLUDE'|'NONE',
 *         Overrides?: array{Transferred?: array, Verified?: array, Deleted?: array, Skipped?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, Keys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, Keys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAgent(array $args = [])
 * @phpstan-method \Aws\Result updateAgent(array{AgentArn?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentAsync(array{AgentArn?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateLocationAzureBlob(array $args = [])
 * @phpstan-method \Aws\Result updateLocationAzureBlob(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     AuthenticationType?: 'NONE'|'SAS',
 *     SasConfiguration?: array{Token?: string, ...},
 *     BlobType?: 'BLOCK',
 *     AccessTier?: 'ARCHIVE'|'COOL'|'HOT',
 *     AgentArns?: list<string>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationAzureBlobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationAzureBlobAsync(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     AuthenticationType?: 'NONE'|'SAS',
 *     SasConfiguration?: array{Token?: string, ...},
 *     BlobType?: 'BLOCK',
 *     AccessTier?: 'ARCHIVE'|'COOL'|'HOT',
 *     AgentArns?: list<string>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationEfs(array $args = [])
 * @phpstan-method \Aws\Result updateLocationEfs(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     AccessPointArn?: string,
 *     FileSystemAccessRoleArn?: string,
 *     InTransitEncryption?: 'NONE'|'TLS1_2',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationEfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationEfsAsync(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     AccessPointArn?: string,
 *     FileSystemAccessRoleArn?: string,
 *     InTransitEncryption?: 'NONE'|'TLS1_2',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationFsxLustre(array $args = [])
 * @phpstan-method \Aws\Result updateLocationFsxLustre(array{LocationArn?: string, Subdirectory?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationFsxLustreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationFsxLustreAsync(array{LocationArn?: string, Subdirectory?: string, ...} $args = [])
 * @method \Aws\Result updateLocationFsxOntap(array $args = [])
 * @phpstan-method \Aws\Result updateLocationFsxOntap(array{
 *     LocationArn?: string,
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Subdirectory?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationFsxOntapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationFsxOntapAsync(array{
 *     LocationArn?: string,
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Subdirectory?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationFsxOpenZfs(array $args = [])
 * @phpstan-method \Aws\Result updateLocationFsxOpenZfs(array{
 *     LocationArn?: string,
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             ManagedSecretConfig?: array,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Subdirectory?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationFsxOpenZfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationFsxOpenZfsAsync(array{
 *     LocationArn?: string,
 *     Protocol?: array{
 *         NFS?: array{MountOptions?: array, ...},
 *         SMB?: array{
 *             Domain?: string,
 *             MountOptions?: array,
 *             Password?: string,
 *             User?: string,
 *             ManagedSecretConfig?: array,
 *             CmkSecretConfig?: array,
 *             CustomSecretConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Subdirectory?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationFsxWindows(array $args = [])
 * @phpstan-method \Aws\Result updateLocationFsxWindows(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     Domain?: string,
 *     User?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationFsxWindowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationFsxWindowsAsync(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     Domain?: string,
 *     User?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationHdfs(array $args = [])
 * @phpstan-method \Aws\Result updateLocationHdfs(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     NameNodes?: list<array{Hostname?: string, Port?: int, ...}>,
 *     BlockSize?: int,
 *     ReplicationFactor?: int,
 *     KmsKeyProviderUri?: string,
 *     QopConfiguration?: array{
 *         RpcProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         DataTransferProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         ...,
 *     },
 *     AuthenticationType?: 'KERBEROS'|'SIMPLE',
 *     SimpleUser?: string,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     AgentArns?: list<string>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationHdfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationHdfsAsync(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     NameNodes?: list<array{Hostname?: string, Port?: int, ...}>,
 *     BlockSize?: int,
 *     ReplicationFactor?: int,
 *     KmsKeyProviderUri?: string,
 *     QopConfiguration?: array{
 *         RpcProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         DataTransferProtection?: 'AUTHENTICATION'|'DISABLED'|'INTEGRITY'|'PRIVACY',
 *         ...,
 *     },
 *     AuthenticationType?: 'KERBEROS'|'SIMPLE',
 *     SimpleUser?: string,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     AgentArns?: list<string>,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationNfs(array $args = [])
 * @phpstan-method \Aws\Result updateLocationNfs(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     OnPremConfig?: array{AgentArns?: list<string>, ...},
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'NFS3'|'NFS4_0'|'NFS4_1', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationNfsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationNfsAsync(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     OnPremConfig?: array{AgentArns?: list<string>, ...},
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'NFS3'|'NFS4_0'|'NFS4_1', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationObjectStorage(array $args = [])
 * @phpstan-method \Aws\Result updateLocationObjectStorage(array{
 *     LocationArn?: string,
 *     ServerPort?: int,
 *     ServerProtocol?: 'HTTP'|'HTTPS',
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     AccessKey?: string,
 *     SecretKey?: string,
 *     AgentArns?: list<string>,
 *     ServerCertificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationObjectStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationObjectStorageAsync(array{
 *     LocationArn?: string,
 *     ServerPort?: int,
 *     ServerProtocol?: 'HTTP'|'HTTPS',
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     AccessKey?: string,
 *     SecretKey?: string,
 *     AgentArns?: list<string>,
 *     ServerCertificate?: string|resource|\Psr\Http\Message\StreamInterface,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationS3(array $args = [])
 * @phpstan-method \Aws\Result updateLocationS3(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     S3StorageClass?: 'DEEP_ARCHIVE'|'GLACIER'|'GLACIER_INSTANT_RETRIEVAL'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'STANDARD'|'STANDARD_IA',
 *     S3Config?: array{BucketAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationS3Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationS3Async(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     S3StorageClass?: 'DEEP_ARCHIVE'|'GLACIER'|'GLACIER_INSTANT_RETRIEVAL'|'INTELLIGENT_TIERING'|'ONEZONE_IA'|'OUTPOSTS'|'STANDARD'|'STANDARD_IA',
 *     S3Config?: array{BucketAccessRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLocationSmb(array $args = [])
 * @phpstan-method \Aws\Result updateLocationSmb(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     User?: string,
 *     Domain?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     AgentArns?: list<string>,
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'SMB1'|'SMB2'|'SMB2_0'|'SMB3', ...},
 *     AuthenticationType?: 'KERBEROS'|'NTLM',
 *     DnsIpAddresses?: list<string>,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLocationSmbAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLocationSmbAsync(array{
 *     LocationArn?: string,
 *     Subdirectory?: string,
 *     ServerHostname?: string,
 *     User?: string,
 *     Domain?: string,
 *     Password?: string,
 *     CmkSecretConfig?: array{SecretArn?: string, KmsKeyArn?: string, ...},
 *     CustomSecretConfig?: array{SecretArn?: string, SecretAccessRoleArn?: string, ...},
 *     AgentArns?: list<string>,
 *     MountOptions?: array{Version?: 'AUTOMATIC'|'SMB1'|'SMB2'|'SMB2_0'|'SMB3', ...},
 *     AuthenticationType?: 'KERBEROS'|'NTLM',
 *     DnsIpAddresses?: list<string>,
 *     KerberosPrincipal?: string,
 *     KerberosKeytab?: string|resource|\Psr\Http\Message\StreamInterface,
 *     KerberosKrb5Conf?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTask(array $args = [])
 * @phpstan-method \Aws\Result updateTask(array{
 *     TaskArn?: string,
 *     Options?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     Excludes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     Schedule?: array{ScheduleExpression?: string, Status?: 'DISABLED'|'ENABLED', ...},
 *     Name?: string,
 *     CloudWatchLogGroupArn?: string,
 *     Includes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     ManifestConfig?: array{Action?: 'TRANSFER', Format?: 'CSV', Source?: array{S3?: array, ...}, ...},
 *     TaskReportConfig?: array{
 *         Destination?: array{S3?: array, ...},
 *         OutputType?: 'STANDARD'|'SUMMARY_ONLY',
 *         ReportLevel?: 'ERRORS_ONLY'|'SUCCESSES_AND_ERRORS',
 *         ObjectVersionIds?: 'INCLUDE'|'NONE',
 *         Overrides?: array{Transferred?: array, Verified?: array, Deleted?: array, Skipped?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTaskAsync(array{
 *     TaskArn?: string,
 *     Options?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     Excludes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     Schedule?: array{ScheduleExpression?: string, Status?: 'DISABLED'|'ENABLED', ...},
 *     Name?: string,
 *     CloudWatchLogGroupArn?: string,
 *     Includes?: list<array{FilterType?: 'SIMPLE_PATTERN', Value?: string, ...}>,
 *     ManifestConfig?: array{Action?: 'TRANSFER', Format?: 'CSV', Source?: array{S3?: array, ...}, ...},
 *     TaskReportConfig?: array{
 *         Destination?: array{S3?: array, ...},
 *         OutputType?: 'STANDARD'|'SUMMARY_ONLY',
 *         ReportLevel?: 'ERRORS_ONLY'|'SUCCESSES_AND_ERRORS',
 *         ObjectVersionIds?: 'INCLUDE'|'NONE',
 *         Overrides?: array{Transferred?: array, Verified?: array, Deleted?: array, Skipped?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTaskExecution(array $args = [])
 * @phpstan-method \Aws\Result updateTaskExecution(array{
 *     TaskExecutionArn?: string,
 *     Options?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTaskExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTaskExecutionAsync(array{
 *     TaskExecutionArn?: string,
 *     Options?: array{
 *         VerifyMode?: 'NONE'|'ONLY_FILES_TRANSFERRED'|'POINT_IN_TIME_CONSISTENT',
 *         OverwriteMode?: 'ALWAYS'|'NEVER',
 *         Atime?: 'BEST_EFFORT'|'NONE',
 *         Mtime?: 'NONE'|'PRESERVE',
 *         Uid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         Gid?: 'BOTH'|'INT_VALUE'|'NAME'|'NONE',
 *         PreserveDeletedFiles?: 'PRESERVE'|'REMOVE',
 *         PreserveDevices?: 'NONE'|'PRESERVE',
 *         PosixPermissions?: 'NONE'|'PRESERVE',
 *         BytesPerSecond?: int,
 *         TaskQueueing?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'BASIC'|'OFF'|'TRANSFER',
 *         TransferMode?: 'ALL'|'CHANGED',
 *         SecurityDescriptorCopyFlags?: 'NONE'|'OWNER_DACL'|'OWNER_DACL_SACL',
 *         ObjectTags?: 'NONE'|'PRESERVE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class DataSyncClient extends AwsClient {}
