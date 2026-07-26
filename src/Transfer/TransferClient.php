<?php
namespace Aws\Transfer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Transfer for SFTP** service.
 * @method \Aws\Result createAccess(array $args = [])
 * @phpstan-method \Aws\Result createAccess(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     ExternalId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessAsync(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     ExternalId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgreement(array $args = [])
 * @phpstan-method \Aws\Result createAgreement(array{
 *     Description?: string,
 *     ServerId?: string,
 *     LocalProfileId?: string,
 *     PartnerProfileId?: string,
 *     BaseDirectory?: string,
 *     AccessRole?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PreserveFilename?: 'DISABLED'|'ENABLED',
 *     EnforceMessageSigning?: 'DISABLED'|'ENABLED',
 *     CustomDirectories?: array{
 *         FailedFilesDirectory?: string,
 *         MdnFilesDirectory?: string,
 *         PayloadFilesDirectory?: string,
 *         StatusFilesDirectory?: string,
 *         TemporaryFilesDirectory?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgreementAsync(array{
 *     Description?: string,
 *     ServerId?: string,
 *     LocalProfileId?: string,
 *     PartnerProfileId?: string,
 *     BaseDirectory?: string,
 *     AccessRole?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PreserveFilename?: 'DISABLED'|'ENABLED',
 *     EnforceMessageSigning?: 'DISABLED'|'ENABLED',
 *     CustomDirectories?: array{
 *         FailedFilesDirectory?: string,
 *         MdnFilesDirectory?: string,
 *         PayloadFilesDirectory?: string,
 *         StatusFilesDirectory?: string,
 *         TemporaryFilesDirectory?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnector(array $args = [])
 * @phpstan-method \Aws\Result createConnector(array{
 *     Url?: string,
 *     As2Config?: array{
 *         LocalProfileId?: string,
 *         PartnerProfileId?: string,
 *         MessageSubject?: string,
 *         Compression?: 'DISABLED'|'ZLIB',
 *         EncryptionAlgorithm?: 'AES128_CBC'|'AES192_CBC'|'AES256_CBC'|'DES_EDE3_CBC'|'NONE',
 *         SigningAlgorithm?: 'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnSigningAlgorithm?: 'DEFAULT'|'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnResponse?: 'ASYNC'|'NONE'|'SYNC',
 *         BasicAuthSecretId?: string,
 *         PreserveContentType?: 'DISABLED'|'ENABLED',
 *         AsyncMdnConfig?: array{Url?: string, ServerIds?: list<string>, ...},
 *         ...,
 *     },
 *     AccessRole?: string,
 *     LoggingRole?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SftpConfig?: array{UserSecretId?: string, TrustedHostKeys?: list<string>, MaxConcurrentConnections?: int, ...},
 *     SecurityPolicyName?: string,
 *     EgressConfig?: array{VpcLattice?: array{ResourceConfigurationArn?: string, PortNumber?: int, ...}, ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorAsync(array{
 *     Url?: string,
 *     As2Config?: array{
 *         LocalProfileId?: string,
 *         PartnerProfileId?: string,
 *         MessageSubject?: string,
 *         Compression?: 'DISABLED'|'ZLIB',
 *         EncryptionAlgorithm?: 'AES128_CBC'|'AES192_CBC'|'AES256_CBC'|'DES_EDE3_CBC'|'NONE',
 *         SigningAlgorithm?: 'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnSigningAlgorithm?: 'DEFAULT'|'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnResponse?: 'ASYNC'|'NONE'|'SYNC',
 *         BasicAuthSecretId?: string,
 *         PreserveContentType?: 'DISABLED'|'ENABLED',
 *         AsyncMdnConfig?: array{Url?: string, ServerIds?: list<string>, ...},
 *         ...,
 *     },
 *     AccessRole?: string,
 *     LoggingRole?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SftpConfig?: array{UserSecretId?: string, TrustedHostKeys?: list<string>, MaxConcurrentConnections?: int, ...},
 *     SecurityPolicyName?: string,
 *     EgressConfig?: array{VpcLattice?: array{ResourceConfigurationArn?: string, PortNumber?: int, ...}, ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProfile(array $args = [])
 * @phpstan-method \Aws\Result createProfile(array{
 *     As2Id?: string,
 *     ProfileType?: 'LOCAL'|'PARTNER',
 *     CertificateIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfileAsync(array{
 *     As2Id?: string,
 *     ProfileType?: 'LOCAL'|'PARTNER',
 *     CertificateIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServer(array $args = [])
 * @phpstan-method \Aws\Result createServer(array{
 *     Certificate?: string,
 *     Domain?: 'EFS'|'S3',
 *     EndpointDetails?: array{
 *         AddressAllocationIds?: list<string>,
 *         SubnetIds?: list<string>,
 *         VpcEndpointId?: string,
 *         VpcId?: string,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     EndpointType?: 'PUBLIC'|'VPC'|'VPC_ENDPOINT',
 *     HostKey?: string,
 *     IdentityProviderDetails?: array{
 *         Url?: string,
 *         InvocationRole?: string,
 *         DirectoryId?: string,
 *         Function?: string,
 *         SftpAuthenticationMethods?: 'PASSWORD'|'PUBLIC_KEY'|'PUBLIC_KEY_AND_PASSWORD'|'PUBLIC_KEY_OR_PASSWORD',
 *         ...,
 *     },
 *     IdentityProviderType?: 'API_GATEWAY'|'AWS_DIRECTORY_SERVICE'|'AWS_LAMBDA'|'SERVICE_MANAGED',
 *     LoggingRole?: string,
 *     PostAuthenticationLoginBanner?: string,
 *     PreAuthenticationLoginBanner?: string,
 *     Protocols?: list<'AS2'|'FTP'|'FTPS'|'SFTP'>,
 *     ProtocolDetails?: array{
 *         PassiveIp?: string,
 *         TlsSessionResumptionMode?: 'DISABLED'|'ENABLED'|'ENFORCED',
 *         SetStatOption?: 'DEFAULT'|'ENABLE_NO_OP',
 *         As2Transports?: list<'HTTP'>,
 *         ...,
 *     },
 *     SecurityPolicyName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WorkflowDetails?: array{OnUpload?: list<array>, OnPartialUpload?: list<array>, ...},
 *     StructuredLogDestinations?: list<string>,
 *     S3StorageOptions?: array{DirectoryListingOptimization?: 'DISABLED'|'ENABLED', ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServerAsync(array{
 *     Certificate?: string,
 *     Domain?: 'EFS'|'S3',
 *     EndpointDetails?: array{
 *         AddressAllocationIds?: list<string>,
 *         SubnetIds?: list<string>,
 *         VpcEndpointId?: string,
 *         VpcId?: string,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     EndpointType?: 'PUBLIC'|'VPC'|'VPC_ENDPOINT',
 *     HostKey?: string,
 *     IdentityProviderDetails?: array{
 *         Url?: string,
 *         InvocationRole?: string,
 *         DirectoryId?: string,
 *         Function?: string,
 *         SftpAuthenticationMethods?: 'PASSWORD'|'PUBLIC_KEY'|'PUBLIC_KEY_AND_PASSWORD'|'PUBLIC_KEY_OR_PASSWORD',
 *         ...,
 *     },
 *     IdentityProviderType?: 'API_GATEWAY'|'AWS_DIRECTORY_SERVICE'|'AWS_LAMBDA'|'SERVICE_MANAGED',
 *     LoggingRole?: string,
 *     PostAuthenticationLoginBanner?: string,
 *     PreAuthenticationLoginBanner?: string,
 *     Protocols?: list<'AS2'|'FTP'|'FTPS'|'SFTP'>,
 *     ProtocolDetails?: array{
 *         PassiveIp?: string,
 *         TlsSessionResumptionMode?: 'DISABLED'|'ENABLED'|'ENFORCED',
 *         SetStatOption?: 'DEFAULT'|'ENABLE_NO_OP',
 *         As2Transports?: list<'HTTP'>,
 *         ...,
 *     },
 *     SecurityPolicyName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WorkflowDetails?: array{OnUpload?: list<array>, OnPartialUpload?: list<array>, ...},
 *     StructuredLogDestinations?: list<string>,
 *     S3StorageOptions?: array{DirectoryListingOptimization?: 'DISABLED'|'ENABLED', ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     SshPublicKeyBody?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     SshPublicKeyBody?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebApp(array $args = [])
 * @phpstan-method \Aws\Result createWebApp(array{
 *     IdentityProviderDetails?: array{IdentityCenterConfig?: array{InstanceArn?: string, Role?: string, ...}, ...},
 *     AccessEndpoint?: string,
 *     WebAppUnits?: array{Provisioned?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WebAppEndpointPolicy?: 'FIPS'|'STANDARD',
 *     EndpointDetails?: array{
 *         Vpc?: array{
 *             SubnetIds?: list<string>,
 *             VpcId?: string,
 *             SecurityGroupIds?: list<string>,
 *             IpAddressType?: 'DUALSTACK'|'IPV4',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebAppAsync(array{
 *     IdentityProviderDetails?: array{IdentityCenterConfig?: array{InstanceArn?: string, Role?: string, ...}, ...},
 *     AccessEndpoint?: string,
 *     WebAppUnits?: array{Provisioned?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WebAppEndpointPolicy?: 'FIPS'|'STANDARD',
 *     EndpointDetails?: array{
 *         Vpc?: array{
 *             SubnetIds?: list<string>,
 *             VpcId?: string,
 *             SecurityGroupIds?: list<string>,
 *             IpAddressType?: 'DUALSTACK'|'IPV4',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createWorkflow(array{
 *     Description?: string,
 *     Steps?: list<array{
 *         Type?: 'COPY'|'CUSTOM'|'DECRYPT'|'DELETE'|'TAG',
 *         CopyStepDetails?: array,
 *         CustomStepDetails?: array,
 *         DeleteStepDetails?: array,
 *         TagStepDetails?: array,
 *         DecryptStepDetails?: array,
 *         ...,
 *     }>,
 *     OnExceptionSteps?: list<array{
 *         Type?: 'COPY'|'CUSTOM'|'DECRYPT'|'DELETE'|'TAG',
 *         CopyStepDetails?: array,
 *         CustomStepDetails?: array,
 *         DeleteStepDetails?: array,
 *         TagStepDetails?: array,
 *         DecryptStepDetails?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowAsync(array{
 *     Description?: string,
 *     Steps?: list<array{
 *         Type?: 'COPY'|'CUSTOM'|'DECRYPT'|'DELETE'|'TAG',
 *         CopyStepDetails?: array,
 *         CustomStepDetails?: array,
 *         DeleteStepDetails?: array,
 *         TagStepDetails?: array,
 *         DecryptStepDetails?: array,
 *         ...,
 *     }>,
 *     OnExceptionSteps?: list<array{
 *         Type?: 'COPY'|'CUSTOM'|'DECRYPT'|'DELETE'|'TAG',
 *         CopyStepDetails?: array,
 *         CustomStepDetails?: array,
 *         DeleteStepDetails?: array,
 *         TagStepDetails?: array,
 *         DecryptStepDetails?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccess(array $args = [])
 * @phpstan-method \Aws\Result deleteAccess(array{ServerId?: string, ExternalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessAsync(array{ServerId?: string, ExternalId?: string, ...} $args = [])
 * @method \Aws\Result deleteAgreement(array $args = [])
 * @phpstan-method \Aws\Result deleteAgreement(array{AgreementId?: string, ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgreementAsync(array{AgreementId?: string, ServerId?: string, ...} $args = [])
 * @method \Aws\Result deleteCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteCertificate(array{CertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array{CertificateId?: string, ...} $args = [])
 * @method \Aws\Result deleteConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteConnector(array{ConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array{ConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteHostKey(array $args = [])
 * @phpstan-method \Aws\Result deleteHostKey(array{ServerId?: string, HostKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHostKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHostKeyAsync(array{ServerId?: string, HostKeyId?: string, ...} $args = [])
 * @method \Aws\Result deleteProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteProfile(array{ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileAsync(array{ProfileId?: string, ...} $args = [])
 * @method \Aws\Result deleteServer(array $args = [])
 * @phpstan-method \Aws\Result deleteServer(array{ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServerAsync(array{ServerId?: string, ...} $args = [])
 * @method \Aws\Result deleteSshPublicKey(array $args = [])
 * @phpstan-method \Aws\Result deleteSshPublicKey(array{ServerId?: string, SshPublicKeyId?: string, UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSshPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSshPublicKeyAsync(array{ServerId?: string, SshPublicKeyId?: string, UserName?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{ServerId?: string, UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{ServerId?: string, UserName?: string, ...} $args = [])
 * @method \Aws\Result deleteWebApp(array $args = [])
 * @phpstan-method \Aws\Result deleteWebApp(array{WebAppId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebAppAsync(array{WebAppId?: string, ...} $args = [])
 * @method \Aws\Result deleteWebAppCustomization(array $args = [])
 * @phpstan-method \Aws\Result deleteWebAppCustomization(array{WebAppId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebAppCustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebAppCustomizationAsync(array{WebAppId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflow(array{WorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array{WorkflowId?: string, ...} $args = [])
 * @method \Aws\Result describeAccess(array $args = [])
 * @phpstan-method \Aws\Result describeAccess(array{ServerId?: string, ExternalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccessAsync(array{ServerId?: string, ExternalId?: string, ...} $args = [])
 * @method \Aws\Result describeAgreement(array $args = [])
 * @phpstan-method \Aws\Result describeAgreement(array{AgreementId?: string, ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAgreementAsync(array{AgreementId?: string, ServerId?: string, ...} $args = [])
 * @method \Aws\Result describeCertificate(array $args = [])
 * @phpstan-method \Aws\Result describeCertificate(array{CertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificateAsync(array{CertificateId?: string, ...} $args = [])
 * @method \Aws\Result describeConnector(array $args = [])
 * @phpstan-method \Aws\Result describeConnector(array{ConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectorAsync(array{ConnectorId?: string, ...} $args = [])
 * @method \Aws\Result describeExecution(array $args = [])
 * @phpstan-method \Aws\Result describeExecution(array{ExecutionId?: string, WorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExecutionAsync(array{ExecutionId?: string, WorkflowId?: string, ...} $args = [])
 * @method \Aws\Result describeHostKey(array $args = [])
 * @phpstan-method \Aws\Result describeHostKey(array{ServerId?: string, HostKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHostKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHostKeyAsync(array{ServerId?: string, HostKeyId?: string, ...} $args = [])
 * @method \Aws\Result describeProfile(array $args = [])
 * @phpstan-method \Aws\Result describeProfile(array{ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProfileAsync(array{ProfileId?: string, ...} $args = [])
 * @method \Aws\Result describeSecurityPolicy(array $args = [])
 * @phpstan-method \Aws\Result describeSecurityPolicy(array{SecurityPolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecurityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSecurityPolicyAsync(array{SecurityPolicyName?: string, ...} $args = [])
 * @method \Aws\Result describeServer(array $args = [])
 * @phpstan-method \Aws\Result describeServer(array{ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServerAsync(array{ServerId?: string, ...} $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @phpstan-method \Aws\Result describeUser(array{ServerId?: string, UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserAsync(array{ServerId?: string, UserName?: string, ...} $args = [])
 * @method \Aws\Result describeWebApp(array $args = [])
 * @phpstan-method \Aws\Result describeWebApp(array{WebAppId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWebAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWebAppAsync(array{WebAppId?: string, ...} $args = [])
 * @method \Aws\Result describeWebAppCustomization(array $args = [])
 * @phpstan-method \Aws\Result describeWebAppCustomization(array{WebAppId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWebAppCustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWebAppCustomizationAsync(array{WebAppId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkflow(array $args = [])
 * @phpstan-method \Aws\Result describeWorkflow(array{WorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkflowAsync(array{WorkflowId?: string, ...} $args = [])
 * @method \Aws\Result importCertificate(array $args = [])
 * @phpstan-method \Aws\Result importCertificate(array{
 *     Usage?: 'ENCRYPTION'|'SIGNING'|'TLS',
 *     Certificate?: string,
 *     CertificateChain?: string,
 *     PrivateKey?: string,
 *     ActiveDate?: int|string|\DateTimeInterface,
 *     InactiveDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importCertificateAsync(array{
 *     Usage?: 'ENCRYPTION'|'SIGNING'|'TLS',
 *     Certificate?: string,
 *     CertificateChain?: string,
 *     PrivateKey?: string,
 *     ActiveDate?: int|string|\DateTimeInterface,
 *     InactiveDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importHostKey(array $args = [])
 * @phpstan-method \Aws\Result importHostKey(array{
 *     ServerId?: string,
 *     HostKeyBody?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importHostKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importHostKeyAsync(array{
 *     ServerId?: string,
 *     HostKeyBody?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importSshPublicKey(array $args = [])
 * @phpstan-method \Aws\Result importSshPublicKey(array{ServerId?: string, SshPublicKeyBody?: string, UserName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importSshPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importSshPublicKeyAsync(array{ServerId?: string, SshPublicKeyBody?: string, UserName?: string, ...} $args = [])
 * @method \Aws\Result listAccesses(array $args = [])
 * @phpstan-method \Aws\Result listAccesses(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessesAsync(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \Aws\Result listAgreements(array $args = [])
 * @phpstan-method \Aws\Result listAgreements(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgreementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgreementsAsync(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \Aws\Result listCertificates(array $args = [])
 * @phpstan-method \Aws\Result listCertificates(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificatesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listExecutions(array $args = [])
 * @phpstan-method \Aws\Result listExecutions(array{MaxResults?: int, NextToken?: string, WorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExecutionsAsync(array{MaxResults?: int, NextToken?: string, WorkflowId?: string, ...} $args = [])
 * @method \Aws\Result listFileTransferResults(array $args = [])
 * @phpstan-method \Aws\Result listFileTransferResults(array{ConnectorId?: string, TransferId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFileTransferResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFileTransferResultsAsync(array{ConnectorId?: string, TransferId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listHostKeys(array $args = [])
 * @phpstan-method \Aws\Result listHostKeys(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHostKeysAsync(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \Aws\Result listProfiles(array $args = [])
 * @phpstan-method \Aws\Result listProfiles(array{MaxResults?: int, NextToken?: string, ProfileType?: 'LOCAL'|'PARTNER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfilesAsync(array{MaxResults?: int, NextToken?: string, ProfileType?: 'LOCAL'|'PARTNER', ...} $args = [])
 * @method \Aws\Result listSecurityPolicies(array $args = [])
 * @phpstan-method \Aws\Result listSecurityPolicies(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityPoliciesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listServers(array $args = [])
 * @phpstan-method \Aws\Result listServers(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{Arn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{Arn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{MaxResults?: int, NextToken?: string, ServerId?: string, ...} $args = [])
 * @method \Aws\Result listWebApps(array $args = [])
 * @phpstan-method \Aws\Result listWebApps(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebAppsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result sendWorkflowStepState(array $args = [])
 * @phpstan-method \Aws\Result sendWorkflowStepState(array{WorkflowId?: string, ExecutionId?: string, Token?: string, Status?: 'FAILURE'|'SUCCESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendWorkflowStepStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendWorkflowStepStateAsync(array{WorkflowId?: string, ExecutionId?: string, Token?: string, Status?: 'FAILURE'|'SUCCESS', ...} $args = [])
 * @method \Aws\Result startDirectoryListing(array $args = [])
 * @phpstan-method \Aws\Result startDirectoryListing(array{ConnectorId?: string, RemoteDirectoryPath?: string, MaxItems?: int, OutputDirectoryPath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDirectoryListingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDirectoryListingAsync(array{ConnectorId?: string, RemoteDirectoryPath?: string, MaxItems?: int, OutputDirectoryPath?: string, ...} $args = [])
 * @method \Aws\Result startFileTransfer(array $args = [])
 * @phpstan-method \Aws\Result startFileTransfer(array{
 *     ConnectorId?: string,
 *     SendFilePaths?: list<string>,
 *     RetrieveFilePaths?: list<string>,
 *     LocalDirectoryPath?: string,
 *     RemoteDirectoryPath?: string,
 *     CustomHttpHeaders?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFileTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFileTransferAsync(array{
 *     ConnectorId?: string,
 *     SendFilePaths?: list<string>,
 *     RetrieveFilePaths?: list<string>,
 *     LocalDirectoryPath?: string,
 *     RemoteDirectoryPath?: string,
 *     CustomHttpHeaders?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startRemoteDelete(array $args = [])
 * @phpstan-method \Aws\Result startRemoteDelete(array{ConnectorId?: string, DeletePath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRemoteDeleteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRemoteDeleteAsync(array{ConnectorId?: string, DeletePath?: string, ...} $args = [])
 * @method \Aws\Result startRemoteMove(array $args = [])
 * @phpstan-method \Aws\Result startRemoteMove(array{ConnectorId?: string, SourcePath?: string, TargetPath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRemoteMoveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRemoteMoveAsync(array{ConnectorId?: string, SourcePath?: string, TargetPath?: string, ...} $args = [])
 * @method \Aws\Result startServer(array $args = [])
 * @phpstan-method \Aws\Result startServer(array{ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startServerAsync(array{ServerId?: string, ...} $args = [])
 * @method \Aws\Result stopServer(array $args = [])
 * @phpstan-method \Aws\Result stopServer(array{ServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopServerAsync(array{ServerId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Arn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Arn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testConnection(array $args = [])
 * @phpstan-method \Aws\Result testConnection(array{ConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testConnectionAsync(array{ConnectorId?: string, ...} $args = [])
 * @method \Aws\Result testIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result testIdentityProvider(array{
 *     ServerId?: string,
 *     ServerProtocol?: 'AS2'|'FTP'|'FTPS'|'SFTP',
 *     SourceIp?: string,
 *     UserName?: string,
 *     UserPassword?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testIdentityProviderAsync(array{
 *     ServerId?: string,
 *     ServerProtocol?: 'AS2'|'FTP'|'FTPS'|'SFTP',
 *     SourceIp?: string,
 *     UserName?: string,
 *     UserPassword?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccess(array $args = [])
 * @phpstan-method \Aws\Result updateAccess(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     ExternalId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessAsync(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     ExternalId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgreement(array $args = [])
 * @phpstan-method \Aws\Result updateAgreement(array{
 *     AgreementId?: string,
 *     ServerId?: string,
 *     Description?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     LocalProfileId?: string,
 *     PartnerProfileId?: string,
 *     BaseDirectory?: string,
 *     AccessRole?: string,
 *     PreserveFilename?: 'DISABLED'|'ENABLED',
 *     EnforceMessageSigning?: 'DISABLED'|'ENABLED',
 *     CustomDirectories?: array{
 *         FailedFilesDirectory?: string,
 *         MdnFilesDirectory?: string,
 *         PayloadFilesDirectory?: string,
 *         StatusFilesDirectory?: string,
 *         TemporaryFilesDirectory?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgreementAsync(array{
 *     AgreementId?: string,
 *     ServerId?: string,
 *     Description?: string,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     LocalProfileId?: string,
 *     PartnerProfileId?: string,
 *     BaseDirectory?: string,
 *     AccessRole?: string,
 *     PreserveFilename?: 'DISABLED'|'ENABLED',
 *     EnforceMessageSigning?: 'DISABLED'|'ENABLED',
 *     CustomDirectories?: array{
 *         FailedFilesDirectory?: string,
 *         MdnFilesDirectory?: string,
 *         PayloadFilesDirectory?: string,
 *         StatusFilesDirectory?: string,
 *         TemporaryFilesDirectory?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCertificate(array $args = [])
 * @phpstan-method \Aws\Result updateCertificate(array{
 *     CertificateId?: string,
 *     ActiveDate?: int|string|\DateTimeInterface,
 *     InactiveDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCertificateAsync(array{
 *     CertificateId?: string,
 *     ActiveDate?: int|string|\DateTimeInterface,
 *     InactiveDate?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnector(array $args = [])
 * @phpstan-method \Aws\Result updateConnector(array{
 *     ConnectorId?: string,
 *     Url?: string,
 *     As2Config?: array{
 *         LocalProfileId?: string,
 *         PartnerProfileId?: string,
 *         MessageSubject?: string,
 *         Compression?: 'DISABLED'|'ZLIB',
 *         EncryptionAlgorithm?: 'AES128_CBC'|'AES192_CBC'|'AES256_CBC'|'DES_EDE3_CBC'|'NONE',
 *         SigningAlgorithm?: 'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnSigningAlgorithm?: 'DEFAULT'|'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnResponse?: 'ASYNC'|'NONE'|'SYNC',
 *         BasicAuthSecretId?: string,
 *         PreserveContentType?: 'DISABLED'|'ENABLED',
 *         AsyncMdnConfig?: array{Url?: string, ServerIds?: list<string>, ...},
 *         ...,
 *     },
 *     AccessRole?: string,
 *     LoggingRole?: string,
 *     SftpConfig?: array{UserSecretId?: string, TrustedHostKeys?: list<string>, MaxConcurrentConnections?: int, ...},
 *     SecurityPolicyName?: string,
 *     EgressConfig?: array{VpcLattice?: array{ResourceConfigurationArn?: string, PortNumber?: int, ...}, ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorAsync(array{
 *     ConnectorId?: string,
 *     Url?: string,
 *     As2Config?: array{
 *         LocalProfileId?: string,
 *         PartnerProfileId?: string,
 *         MessageSubject?: string,
 *         Compression?: 'DISABLED'|'ZLIB',
 *         EncryptionAlgorithm?: 'AES128_CBC'|'AES192_CBC'|'AES256_CBC'|'DES_EDE3_CBC'|'NONE',
 *         SigningAlgorithm?: 'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnSigningAlgorithm?: 'DEFAULT'|'NONE'|'SHA1'|'SHA256'|'SHA384'|'SHA512',
 *         MdnResponse?: 'ASYNC'|'NONE'|'SYNC',
 *         BasicAuthSecretId?: string,
 *         PreserveContentType?: 'DISABLED'|'ENABLED',
 *         AsyncMdnConfig?: array{Url?: string, ServerIds?: list<string>, ...},
 *         ...,
 *     },
 *     AccessRole?: string,
 *     LoggingRole?: string,
 *     SftpConfig?: array{UserSecretId?: string, TrustedHostKeys?: list<string>, MaxConcurrentConnections?: int, ...},
 *     SecurityPolicyName?: string,
 *     EgressConfig?: array{VpcLattice?: array{ResourceConfigurationArn?: string, PortNumber?: int, ...}, ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHostKey(array $args = [])
 * @phpstan-method \Aws\Result updateHostKey(array{ServerId?: string, HostKeyId?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHostKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHostKeyAsync(array{ServerId?: string, HostKeyId?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateProfile(array $args = [])
 * @phpstan-method \Aws\Result updateProfile(array{ProfileId?: string, CertificateIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfileAsync(array{ProfileId?: string, CertificateIds?: list<string>, ...} $args = [])
 * @method \Aws\Result updateServer(array $args = [])
 * @phpstan-method \Aws\Result updateServer(array{
 *     Certificate?: string,
 *     ProtocolDetails?: array{
 *         PassiveIp?: string,
 *         TlsSessionResumptionMode?: 'DISABLED'|'ENABLED'|'ENFORCED',
 *         SetStatOption?: 'DEFAULT'|'ENABLE_NO_OP',
 *         As2Transports?: list<'HTTP'>,
 *         ...,
 *     },
 *     EndpointDetails?: array{
 *         AddressAllocationIds?: list<string>,
 *         SubnetIds?: list<string>,
 *         VpcEndpointId?: string,
 *         VpcId?: string,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     EndpointType?: 'PUBLIC'|'VPC'|'VPC_ENDPOINT',
 *     HostKey?: string,
 *     IdentityProviderDetails?: array{
 *         Url?: string,
 *         InvocationRole?: string,
 *         DirectoryId?: string,
 *         Function?: string,
 *         SftpAuthenticationMethods?: 'PASSWORD'|'PUBLIC_KEY'|'PUBLIC_KEY_AND_PASSWORD'|'PUBLIC_KEY_OR_PASSWORD',
 *         ...,
 *     },
 *     LoggingRole?: string,
 *     PostAuthenticationLoginBanner?: string,
 *     PreAuthenticationLoginBanner?: string,
 *     Protocols?: list<'AS2'|'FTP'|'FTPS'|'SFTP'>,
 *     SecurityPolicyName?: string,
 *     ServerId?: string,
 *     WorkflowDetails?: array{OnUpload?: list<array>, OnPartialUpload?: list<array>, ...},
 *     StructuredLogDestinations?: list<string>,
 *     S3StorageOptions?: array{DirectoryListingOptimization?: 'DISABLED'|'ENABLED', ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     IdentityProviderType?: 'API_GATEWAY'|'AWS_DIRECTORY_SERVICE'|'AWS_LAMBDA'|'SERVICE_MANAGED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServerAsync(array{
 *     Certificate?: string,
 *     ProtocolDetails?: array{
 *         PassiveIp?: string,
 *         TlsSessionResumptionMode?: 'DISABLED'|'ENABLED'|'ENFORCED',
 *         SetStatOption?: 'DEFAULT'|'ENABLE_NO_OP',
 *         As2Transports?: list<'HTTP'>,
 *         ...,
 *     },
 *     EndpointDetails?: array{
 *         AddressAllocationIds?: list<string>,
 *         SubnetIds?: list<string>,
 *         VpcEndpointId?: string,
 *         VpcId?: string,
 *         SecurityGroupIds?: list<string>,
 *         ...,
 *     },
 *     EndpointType?: 'PUBLIC'|'VPC'|'VPC_ENDPOINT',
 *     HostKey?: string,
 *     IdentityProviderDetails?: array{
 *         Url?: string,
 *         InvocationRole?: string,
 *         DirectoryId?: string,
 *         Function?: string,
 *         SftpAuthenticationMethods?: 'PASSWORD'|'PUBLIC_KEY'|'PUBLIC_KEY_AND_PASSWORD'|'PUBLIC_KEY_OR_PASSWORD',
 *         ...,
 *     },
 *     LoggingRole?: string,
 *     PostAuthenticationLoginBanner?: string,
 *     PreAuthenticationLoginBanner?: string,
 *     Protocols?: list<'AS2'|'FTP'|'FTPS'|'SFTP'>,
 *     SecurityPolicyName?: string,
 *     ServerId?: string,
 *     WorkflowDetails?: array{OnUpload?: list<array>, OnPartialUpload?: list<array>, ...},
 *     StructuredLogDestinations?: list<string>,
 *     S3StorageOptions?: array{DirectoryListingOptimization?: 'DISABLED'|'ENABLED', ...},
 *     IpAddressType?: 'DUALSTACK'|'IPV4',
 *     IdentityProviderType?: 'API_GATEWAY'|'AWS_DIRECTORY_SERVICE'|'AWS_LAMBDA'|'SERVICE_MANAGED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     UserName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     HomeDirectory?: string,
 *     HomeDirectoryType?: 'LOGICAL'|'PATH',
 *     HomeDirectoryMappings?: list<array{Entry?: string, Target?: string, Type?: 'DIRECTORY'|'FILE', ...}>,
 *     Policy?: string,
 *     PosixProfile?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     Role?: string,
 *     ServerId?: string,
 *     UserName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWebApp(array $args = [])
 * @phpstan-method \Aws\Result updateWebApp(array{
 *     WebAppId?: string,
 *     IdentityProviderDetails?: array{IdentityCenterConfig?: array{Role?: string, ...}, ...},
 *     AccessEndpoint?: string,
 *     WebAppUnits?: array{Provisioned?: int, ...},
 *     EndpointDetails?: array{Vpc?: array{SubnetIds?: list<string>, IpAddressType?: 'DUALSTACK'|'IPV4', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebAppAsync(array{
 *     WebAppId?: string,
 *     IdentityProviderDetails?: array{IdentityCenterConfig?: array{Role?: string, ...}, ...},
 *     AccessEndpoint?: string,
 *     WebAppUnits?: array{Provisioned?: int, ...},
 *     EndpointDetails?: array{Vpc?: array{SubnetIds?: list<string>, IpAddressType?: 'DUALSTACK'|'IPV4', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWebAppCustomization(array $args = [])
 * @phpstan-method \Aws\Result updateWebAppCustomization(array{
 *     WebAppId?: string,
 *     Title?: string,
 *     LogoFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     FaviconFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebAppCustomizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebAppCustomizationAsync(array{
 *     WebAppId?: string,
 *     Title?: string,
 *     LogoFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     FaviconFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class TransferClient extends AwsClient {}
