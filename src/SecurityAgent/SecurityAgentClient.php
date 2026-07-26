<?php
namespace Aws\SecurityAgent;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Security Agent** service.
 * @method \Aws\Result addArtifact(array $args = [])
 * @phpstan-method \Aws\Result addArtifact(array{
 *     agentSpaceId?: string,
 *     artifactContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *     artifactType?: 'DOC'|'DOCX'|'JPEG'|'JSON'|'MD'|'PDF'|'PNG'|'TXT'|'YAML',
 *     fileName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addArtifactAsync(array{
 *     agentSpaceId?: string,
 *     artifactContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *     artifactType?: 'DOC'|'DOCX'|'JPEG'|'JSON'|'MD'|'PDF'|'PNG'|'TXT'|'YAML',
 *     fileName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchCreateSecurityRequirements(array $args = [])
 * @phpstan-method \Aws\Result batchCreateSecurityRequirements(array{
 *     packId?: string,
 *     securityRequirements?: list<array{name?: string, description?: string, domain?: string, evaluation?: string, remediation?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateSecurityRequirementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateSecurityRequirementsAsync(array{
 *     packId?: string,
 *     securityRequirements?: list<array{name?: string, description?: string, domain?: string, evaluation?: string, remediation?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteCodeReviews(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteCodeReviews(array{codeReviewIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteCodeReviewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteCodeReviewsAsync(array{codeReviewIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchDeletePentests(array $args = [])
 * @phpstan-method \Aws\Result batchDeletePentests(array{pentestIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeletePentestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeletePentestsAsync(array{pentestIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchDeleteSecurityRequirements(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteSecurityRequirements(array{packId?: string, securityRequirementNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteSecurityRequirementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteSecurityRequirementsAsync(array{packId?: string, securityRequirementNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteThreatModels(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteThreatModels(array{threatModelIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteThreatModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteThreatModelsAsync(array{threatModelIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetAgentSpaces(array $args = [])
 * @phpstan-method \Aws\Result batchGetAgentSpaces(array{agentSpaceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAgentSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAgentSpacesAsync(array{agentSpaceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetArtifactMetadata(array $args = [])
 * @phpstan-method \Aws\Result batchGetArtifactMetadata(array{agentSpaceId?: string, artifactIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetArtifactMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetArtifactMetadataAsync(array{agentSpaceId?: string, artifactIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetCodeReviewJobTasks(array $args = [])
 * @phpstan-method \Aws\Result batchGetCodeReviewJobTasks(array{agentSpaceId?: string, codeReviewJobTaskIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCodeReviewJobTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCodeReviewJobTasksAsync(array{agentSpaceId?: string, codeReviewJobTaskIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetCodeReviewJobs(array $args = [])
 * @phpstan-method \Aws\Result batchGetCodeReviewJobs(array{codeReviewJobIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCodeReviewJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCodeReviewJobsAsync(array{codeReviewJobIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetCodeReviews(array $args = [])
 * @phpstan-method \Aws\Result batchGetCodeReviews(array{codeReviewIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCodeReviewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCodeReviewsAsync(array{codeReviewIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetFindings(array $args = [])
 * @phpstan-method \Aws\Result batchGetFindings(array{findingIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFindingsAsync(array{findingIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetPentestJobTasks(array $args = [])
 * @phpstan-method \Aws\Result batchGetPentestJobTasks(array{agentSpaceId?: string, taskIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetPentestJobTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetPentestJobTasksAsync(array{agentSpaceId?: string, taskIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetPentestJobs(array $args = [])
 * @phpstan-method \Aws\Result batchGetPentestJobs(array{pentestJobIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetPentestJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetPentestJobsAsync(array{pentestJobIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetPentests(array $args = [])
 * @phpstan-method \Aws\Result batchGetPentests(array{pentestIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetPentestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetPentestsAsync(array{pentestIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetSecurityRequirements(array $args = [])
 * @phpstan-method \Aws\Result batchGetSecurityRequirements(array{packId?: string, securityRequirementNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSecurityRequirementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSecurityRequirementsAsync(array{packId?: string, securityRequirementNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetTargetDomains(array $args = [])
 * @phpstan-method \Aws\Result batchGetTargetDomains(array{targetDomainIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTargetDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetTargetDomainsAsync(array{targetDomainIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetThreatModelJobTasks(array $args = [])
 * @phpstan-method \Aws\Result batchGetThreatModelJobTasks(array{agentSpaceId?: string, threatModelJobTaskIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetThreatModelJobTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetThreatModelJobTasksAsync(array{agentSpaceId?: string, threatModelJobTaskIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetThreatModelJobs(array $args = [])
 * @phpstan-method \Aws\Result batchGetThreatModelJobs(array{threatModelJobIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetThreatModelJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetThreatModelJobsAsync(array{threatModelJobIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetThreatModels(array $args = [])
 * @phpstan-method \Aws\Result batchGetThreatModels(array{threatModelIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetThreatModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetThreatModelsAsync(array{threatModelIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchGetThreats(array $args = [])
 * @phpstan-method \Aws\Result batchGetThreats(array{threatIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetThreatsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetThreatsAsync(array{threatIds?: list<string>, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result batchUpdateSecurityRequirements(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateSecurityRequirements(array{
 *     packId?: string,
 *     securityRequirements?: list<array{name?: string, description?: string, domain?: string, evaluation?: string, remediation?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateSecurityRequirementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateSecurityRequirementsAsync(array{
 *     packId?: string,
 *     securityRequirements?: list<array{name?: string, description?: string, domain?: string, evaluation?: string, remediation?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentSpace(array $args = [])
 * @phpstan-method \Aws\Result createAgentSpace(array{
 *     name?: string,
 *     description?: string,
 *     awsResources?: array{
 *         vpcs?: list<array>,
 *         logGroups?: list<string>,
 *         s3Buckets?: list<string>,
 *         secretArns?: list<string>,
 *         lambdaFunctionArns?: list<string>,
 *         iamRoles?: list<string>,
 *         ...,
 *     },
 *     targetDomainIds?: list<string>,
 *     codeReviewSettings?: array{controlsScanning?: bool, generalPurposeScanning?: bool, ...},
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentSpaceAsync(array{
 *     name?: string,
 *     description?: string,
 *     awsResources?: array{
 *         vpcs?: list<array>,
 *         logGroups?: list<string>,
 *         s3Buckets?: list<string>,
 *         secretArns?: list<string>,
 *         lambdaFunctionArns?: list<string>,
 *         iamRoles?: list<string>,
 *         ...,
 *     },
 *     targetDomainIds?: list<string>,
 *     codeReviewSettings?: array{controlsScanning?: bool, generalPurposeScanning?: bool, ...},
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{idcInstanceArn?: string, roleArn?: string, defaultKmsKeyId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{idcInstanceArn?: string, roleArn?: string, defaultKmsKeyId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createCodeReview(array $args = [])
 * @phpstan-method \Aws\Result createCodeReview(array{
 *     title?: string,
 *     agentSpaceId?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     validationMode?: 'DISABLED'|'SIMULATED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeReviewAsync(array{
 *     title?: string,
 *     agentSpaceId?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     validationMode?: 'DISABLED'|'SIMULATED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegration(array $args = [])
 * @phpstan-method \Aws\Result createIntegration(array{
 *     provider?: 'BITBUCKET'|'CONFLUENCE'|'GITHUB'|'GITLAB',
 *     input?: array{
 *         github?: array{
 *             code?: string,
 *             state?: string,
 *             organizationName?: string,
 *             targetUrl?: string,
 *             installationId?: string,
 *             ...,
 *         },
 *         gitlab?: array{accessToken?: string, targetUrl?: string, tokenType?: 'GROUP'|'PERSONAL', groupId?: string, ...},
 *         bitbucket?: array{installationId?: string, workspace?: string, code?: string, state?: string, ...},
 *         confluence?: array{installationId?: string, code?: string, state?: string, siteUrl?: string, ...},
 *         ...,
 *     },
 *     integrationDisplayName?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     privateConnectionName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAsync(array{
 *     provider?: 'BITBUCKET'|'CONFLUENCE'|'GITHUB'|'GITLAB',
 *     input?: array{
 *         github?: array{
 *             code?: string,
 *             state?: string,
 *             organizationName?: string,
 *             targetUrl?: string,
 *             installationId?: string,
 *             ...,
 *         },
 *         gitlab?: array{accessToken?: string, targetUrl?: string, tokenType?: 'GROUP'|'PERSONAL', groupId?: string, ...},
 *         bitbucket?: array{installationId?: string, workspace?: string, code?: string, state?: string, ...},
 *         confluence?: array{installationId?: string, code?: string, state?: string, siteUrl?: string, ...},
 *         ...,
 *     },
 *     integrationDisplayName?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     privateConnectionName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMembership(array $args = [])
 * @phpstan-method \Aws\Result createMembership(array{
 *     applicationId?: string,
 *     agentSpaceId?: string,
 *     membershipId?: string,
 *     memberType?: 'USER',
 *     config?: array{user?: array{role?: 'MEMBER', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMembershipAsync(array{
 *     applicationId?: string,
 *     agentSpaceId?: string,
 *     membershipId?: string,
 *     memberType?: 'USER',
 *     config?: array{user?: array{role?: 'MEMBER', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPentest(array $args = [])
 * @phpstan-method \Aws\Result createPentest(array{
 *     title?: string,
 *     agentSpaceId?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     excludeRiskTypes?: list<'ARBITRARY_FILE_UPLOAD'|'BUSINESS_LOGIC_VULNERABILITIES'|'CODE_INJECTION'|'COMMAND_INJECTION'|'CROSS_SITE_SCRIPTING'|'CRYPTOGRAPHIC_VULNERABILITIES'|'DATABASE_ACCESS'|'DATABASE_MODIFICATION'|'DEFAULT_CREDENTIALS'|'DENIAL_OF_SERVICE'|'FILE_ACCESS'|'FILE_CREATION'|'FILE_DELETION'|'GRAPHQL_VULNERABILITIES'|'INFORMATION_DISCLOSURE'|'INSECURE_DESERIALIZATION'|'INSECURE_DIRECT_OBJECT_REFERENCE'|'JSON_WEB_TOKEN_VULNERABILITIES'|'LOCAL_FILE_INCLUSION'|'OTHER'|'OUTBOUND_SERVICE_REQUEST'|'PATH_TRAVERSAL'|'PRIVILEGE_ESCALATION'|'SERVER_SIDE_REQUEST_FORGERY'|'SERVER_SIDE_TEMPLATE_INJECTION'|'SQL_INJECTION'|'UNKNOWN'|'XML_EXTERNAL_ENTITY'>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     vpcConfig?: array{vpcArn?: string, securityGroupArns?: list<string>, subnetArns?: list<string>, ...},
 *     networkTrafficConfig?: array{rules?: list<array>, customHeaders?: list<array>, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     disableManagedSkills?: list<'FINDING_PERSONALIZATION'|'LOGIN_OPTIMIZATION'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPentestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPentestAsync(array{
 *     title?: string,
 *     agentSpaceId?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     excludeRiskTypes?: list<'ARBITRARY_FILE_UPLOAD'|'BUSINESS_LOGIC_VULNERABILITIES'|'CODE_INJECTION'|'COMMAND_INJECTION'|'CROSS_SITE_SCRIPTING'|'CRYPTOGRAPHIC_VULNERABILITIES'|'DATABASE_ACCESS'|'DATABASE_MODIFICATION'|'DEFAULT_CREDENTIALS'|'DENIAL_OF_SERVICE'|'FILE_ACCESS'|'FILE_CREATION'|'FILE_DELETION'|'GRAPHQL_VULNERABILITIES'|'INFORMATION_DISCLOSURE'|'INSECURE_DESERIALIZATION'|'INSECURE_DIRECT_OBJECT_REFERENCE'|'JSON_WEB_TOKEN_VULNERABILITIES'|'LOCAL_FILE_INCLUSION'|'OTHER'|'OUTBOUND_SERVICE_REQUEST'|'PATH_TRAVERSAL'|'PRIVILEGE_ESCALATION'|'SERVER_SIDE_REQUEST_FORGERY'|'SERVER_SIDE_TEMPLATE_INJECTION'|'SQL_INJECTION'|'UNKNOWN'|'XML_EXTERNAL_ENTITY'>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     vpcConfig?: array{vpcArn?: string, securityGroupArns?: list<string>, subnetArns?: list<string>, ...},
 *     networkTrafficConfig?: array{rules?: list<array>, customHeaders?: list<array>, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     disableManagedSkills?: list<'FINDING_PERSONALIZATION'|'LOGIN_OPTIMIZATION'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrivateConnection(array $args = [])
 * @phpstan-method \Aws\Result createPrivateConnection(array{
 *     privateConnectionName?: string,
 *     mode?: array{
 *         serviceManaged?: array{
 *             hostAddress?: string,
 *             vpcId?: string,
 *             subnetIds?: list<string>,
 *             securityGroupIds?: list<string>,
 *             ipAddressType?: 'DUAL_STACK'|'IPV4'|'IPV6',
 *             ipv4AddressesPerEni?: int,
 *             portRanges?: list<string>,
 *             certificate?: string,
 *             dnsResolution?: 'IN_VPC'|'PUBLIC',
 *             ...,
 *         },
 *         selfManaged?: array{resourceConfigurationId?: string, certificate?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPrivateConnectionAsync(array{
 *     privateConnectionName?: string,
 *     mode?: array{
 *         serviceManaged?: array{
 *             hostAddress?: string,
 *             vpcId?: string,
 *             subnetIds?: list<string>,
 *             securityGroupIds?: list<string>,
 *             ipAddressType?: 'DUAL_STACK'|'IPV4'|'IPV6',
 *             ipv4AddressesPerEni?: int,
 *             portRanges?: list<string>,
 *             certificate?: string,
 *             dnsResolution?: 'IN_VPC'|'PUBLIC',
 *             ...,
 *         },
 *         selfManaged?: array{resourceConfigurationId?: string, certificate?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityRequirementPack(array $args = [])
 * @phpstan-method \Aws\Result createSecurityRequirementPack(array{
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityRequirementPackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityRequirementPackAsync(array{
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTargetDomain(array $args = [])
 * @phpstan-method \Aws\Result createTargetDomain(array{
 *     targetDomainName?: string,
 *     verificationMethod?: 'DNS_TXT'|'HTTP_ROUTE'|'PRIVATE_VPC',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTargetDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTargetDomainAsync(array{
 *     targetDomainName?: string,
 *     verificationMethod?: 'DNS_TXT'|'HTTP_ROUTE'|'PRIVATE_VPC',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThreat(array $args = [])
 * @phpstan-method \Aws\Result createThreat(array{
 *     agentSpaceId?: string,
 *     threatJobId?: string,
 *     title?: string,
 *     statement?: string,
 *     severity?: 'CRITICAL'|'HIGH'|'INFO'|'LOW'|'MEDIUM',
 *     comments?: string,
 *     stride?: list<'DENIAL_OF_SERVICE'|'ELEVATION_OF_PRIVILEGE'|'INFORMATION_DISCLOSURE'|'REPUDIATION'|'SPOOFING'|'TAMPERING'>,
 *     threatSource?: string,
 *     prerequisites?: string,
 *     threatAction?: string,
 *     threatImpact?: string,
 *     impactedGoal?: list<string>,
 *     impactedAssets?: list<string>,
 *     anchor?: array{kind?: string, id?: string, packageId?: string, ...},
 *     evidence?: list<array{packageId?: string, path?: string, ...}>,
 *     recommendation?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThreatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThreatAsync(array{
 *     agentSpaceId?: string,
 *     threatJobId?: string,
 *     title?: string,
 *     statement?: string,
 *     severity?: 'CRITICAL'|'HIGH'|'INFO'|'LOW'|'MEDIUM',
 *     comments?: string,
 *     stride?: list<'DENIAL_OF_SERVICE'|'ELEVATION_OF_PRIVILEGE'|'INFORMATION_DISCLOSURE'|'REPUDIATION'|'SPOOFING'|'TAMPERING'>,
 *     threatSource?: string,
 *     prerequisites?: string,
 *     threatAction?: string,
 *     threatImpact?: string,
 *     impactedGoal?: list<string>,
 *     impactedAssets?: list<string>,
 *     anchor?: array{kind?: string, id?: string, packageId?: string, ...},
 *     evidence?: list<array{packageId?: string, path?: string, ...}>,
 *     recommendation?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThreatModel(array $args = [])
 * @phpstan-method \Aws\Result createThreatModel(array{
 *     title?: string,
 *     agentSpaceId?: string,
 *     description?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     scopeDocs?: list<array{s3Location?: string, artifactId?: string, integratedDocument?: array, ...}>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     reportDestination?: array{integrationId?: string, containerId?: string, parentId?: string, documentId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThreatModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThreatModelAsync(array{
 *     title?: string,
 *     agentSpaceId?: string,
 *     description?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     scopeDocs?: list<array{s3Location?: string, artifactId?: string, integratedDocument?: array, ...}>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     reportDestination?: array{integrationId?: string, containerId?: string, parentId?: string, documentId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAgentSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentSpace(array{agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentSpaceAsync(array{agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteArtifact(array $args = [])
 * @phpstan-method \Aws\Result deleteArtifact(array{agentSpaceId?: string, artifactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteArtifactAsync(array{agentSpaceId?: string, artifactId?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{integrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{integrationId?: string, ...} $args = [])
 * @method \Aws\Result deleteMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteMembership(array{applicationId?: string, agentSpaceId?: string, membershipId?: string, memberType?: 'USER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMembershipAsync(array{applicationId?: string, agentSpaceId?: string, membershipId?: string, memberType?: 'USER', ...} $args = [])
 * @method \Aws\Result deletePrivateConnection(array $args = [])
 * @phpstan-method \Aws\Result deletePrivateConnection(array{privateConnectionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePrivateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePrivateConnectionAsync(array{privateConnectionName?: string, ...} $args = [])
 * @method \Aws\Result deleteSecurityRequirementPack(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityRequirementPack(array{packId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityRequirementPackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityRequirementPackAsync(array{packId?: string, ...} $args = [])
 * @method \Aws\Result deleteTargetDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteTargetDomain(array{targetDomainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTargetDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTargetDomainAsync(array{targetDomainId?: string, ...} $args = [])
 * @method \Aws\Result describePrivateConnection(array $args = [])
 * @phpstan-method \Aws\Result describePrivateConnection(array{privateConnectionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePrivateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePrivateConnectionAsync(array{privateConnectionName?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{applicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{applicationId?: string, ...} $args = [])
 * @method \Aws\Result getArtifact(array $args = [])
 * @phpstan-method \Aws\Result getArtifact(array{agentSpaceId?: string, artifactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArtifactAsync(array{agentSpaceId?: string, artifactId?: string, ...} $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @phpstan-method \Aws\Result getIntegration(array{integrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationAsync(array{integrationId?: string, ...} $args = [])
 * @method \Aws\Result getSecurityRequirementPack(array $args = [])
 * @phpstan-method \Aws\Result getSecurityRequirementPack(array{packId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityRequirementPackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecurityRequirementPackAsync(array{packId?: string, ...} $args = [])
 * @method \Aws\Result importSecurityRequirements(array $args = [])
 * @phpstan-method \Aws\Result importSecurityRequirements(array{packId?: string, input?: array{documents?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importSecurityRequirementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importSecurityRequirementsAsync(array{packId?: string, input?: array{documents?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result initiateProviderRegistration(array $args = [])
 * @phpstan-method \Aws\Result initiateProviderRegistration(array{provider?: 'BITBUCKET'|'CONFLUENCE'|'GITHUB'|'GITLAB', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise initiateProviderRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateProviderRegistrationAsync(array{provider?: 'BITBUCKET'|'CONFLUENCE'|'GITHUB'|'GITLAB', ...} $args = [])
 * @method \Aws\Result listAgentSpaces(array $args = [])
 * @phpstan-method \Aws\Result listAgentSpaces(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentSpacesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listArtifacts(array{agentSpaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArtifactsAsync(array{agentSpaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCodeReviewJobTasks(array $args = [])
 * @phpstan-method \Aws\Result listCodeReviewJobTasks(array{
 *     agentSpaceId?: string,
 *     maxResults?: int,
 *     codeReviewJobId?: string,
 *     stepName?: 'FINALIZING'|'PENTEST'|'PREFLIGHT'|'STATIC_ANALYSIS'|'VALIDATION',
 *     categoryName?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeReviewJobTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeReviewJobTasksAsync(array{
 *     agentSpaceId?: string,
 *     maxResults?: int,
 *     codeReviewJobId?: string,
 *     stepName?: 'FINALIZING'|'PENTEST'|'PREFLIGHT'|'STATIC_ANALYSIS'|'VALIDATION',
 *     categoryName?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCodeReviewJobsForCodeReview(array $args = [])
 * @phpstan-method \Aws\Result listCodeReviewJobsForCodeReview(array{maxResults?: int, codeReviewId?: string, agentSpaceId?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeReviewJobsForCodeReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeReviewJobsForCodeReviewAsync(array{maxResults?: int, codeReviewId?: string, agentSpaceId?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCodeReviews(array $args = [])
 * @phpstan-method \Aws\Result listCodeReviews(array{maxResults?: int, nextToken?: string, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeReviewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeReviewsAsync(array{maxResults?: int, nextToken?: string, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result listDiscoveredEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listDiscoveredEndpoints(array{
 *     maxResults?: int,
 *     pentestJobId?: string,
 *     agentSpaceId?: string,
 *     prefix?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoveredEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoveredEndpointsAsync(array{
 *     maxResults?: int,
 *     pentestJobId?: string,
 *     agentSpaceId?: string,
 *     prefix?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFindings(array $args = [])
 * @phpstan-method \Aws\Result listFindings(array{
 *     maxResults?: int,
 *     pentestJobId?: string,
 *     codeReviewJobId?: string,
 *     agentSpaceId?: string,
 *     nextToken?: string,
 *     riskType?: string,
 *     riskLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNKNOWN',
 *     status?: 'ACCEPTED'|'ACTIVE'|'FALSE_POSITIVE'|'RESOLVED',
 *     confidence?: 'FALSE_POSITIVE'|'HIGH'|'LOW'|'MEDIUM'|'UNCONFIRMED',
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsAsync(array{
 *     maxResults?: int,
 *     pentestJobId?: string,
 *     codeReviewJobId?: string,
 *     agentSpaceId?: string,
 *     nextToken?: string,
 *     riskType?: string,
 *     riskLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNKNOWN',
 *     status?: 'ACCEPTED'|'ACTIVE'|'FALSE_POSITIVE'|'RESOLVED',
 *     confidence?: 'FALSE_POSITIVE'|'HIGH'|'LOW'|'MEDIUM'|'UNCONFIRMED',
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntegratedResources(array $args = [])
 * @phpstan-method \Aws\Result listIntegratedResources(array{
 *     agentSpaceId?: string,
 *     integrationId?: string,
 *     resourceType?: 'CODE_REPOSITORY'|'DOCUMENT',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegratedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegratedResourcesAsync(array{
 *     agentSpaceId?: string,
 *     integrationId?: string,
 *     resourceType?: 'CODE_REPOSITORY'|'DOCUMENT',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listIntegrations(array{
 *     filter?: array{
 *         provider?: 'BITBUCKET'|'CONFLUENCE'|'GITHUB'|'GITLAB',
 *         providerType?: 'DOCUMENTATION'|'SOURCE_CODE',
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array{
 *     filter?: array{
 *         provider?: 'BITBUCKET'|'CONFLUENCE'|'GITHUB'|'GITLAB',
 *         providerType?: 'DOCUMENTATION'|'SOURCE_CODE',
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMemberships(array $args = [])
 * @phpstan-method \Aws\Result listMemberships(array{
 *     applicationId?: string,
 *     agentSpaceId?: string,
 *     memberType?: 'ALL'|'USER',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembershipsAsync(array{
 *     applicationId?: string,
 *     agentSpaceId?: string,
 *     memberType?: 'ALL'|'USER',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPentestJobTasks(array $args = [])
 * @phpstan-method \Aws\Result listPentestJobTasks(array{
 *     agentSpaceId?: string,
 *     maxResults?: int,
 *     pentestJobId?: string,
 *     stepName?: 'FINALIZING'|'PENTEST'|'PREFLIGHT'|'STATIC_ANALYSIS'|'VALIDATION',
 *     categoryName?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPentestJobTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPentestJobTasksAsync(array{
 *     agentSpaceId?: string,
 *     maxResults?: int,
 *     pentestJobId?: string,
 *     stepName?: 'FINALIZING'|'PENTEST'|'PREFLIGHT'|'STATIC_ANALYSIS'|'VALIDATION',
 *     categoryName?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPentestJobsForPentest(array $args = [])
 * @phpstan-method \Aws\Result listPentestJobsForPentest(array{maxResults?: int, pentestId?: string, agentSpaceId?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPentestJobsForPentestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPentestJobsForPentestAsync(array{maxResults?: int, pentestId?: string, agentSpaceId?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPentests(array $args = [])
 * @phpstan-method \Aws\Result listPentests(array{maxResults?: int, nextToken?: string, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPentestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPentestsAsync(array{maxResults?: int, nextToken?: string, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result listPrivateConnections(array $args = [])
 * @phpstan-method \Aws\Result listPrivateConnections(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrivateConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrivateConnectionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSecurityRequirementPacks(array $args = [])
 * @phpstan-method \Aws\Result listSecurityRequirementPacks(array{
 *     filter?: array{managementType?: 'AWS_MANAGED'|'CUSTOMER_MANAGED', status?: 'DISABLED'|'ENABLED', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityRequirementPacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityRequirementPacksAsync(array{
 *     filter?: array{managementType?: 'AWS_MANAGED'|'CUSTOMER_MANAGED', status?: 'DISABLED'|'ENABLED', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSecurityRequirements(array $args = [])
 * @phpstan-method \Aws\Result listSecurityRequirements(array{packId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityRequirementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityRequirementsAsync(array{packId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTargetDomains(array $args = [])
 * @phpstan-method \Aws\Result listTargetDomains(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetDomainsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listThreatModelJobTasks(array $args = [])
 * @phpstan-method \Aws\Result listThreatModelJobTasks(array{agentSpaceId?: string, maxResults?: int, threatModelJobId?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThreatModelJobTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThreatModelJobTasksAsync(array{agentSpaceId?: string, maxResults?: int, threatModelJobId?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listThreatModelJobs(array $args = [])
 * @phpstan-method \Aws\Result listThreatModelJobs(array{maxResults?: int, threatModelId?: string, agentSpaceId?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThreatModelJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThreatModelJobsAsync(array{maxResults?: int, threatModelId?: string, agentSpaceId?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listThreatModels(array $args = [])
 * @phpstan-method \Aws\Result listThreatModels(array{maxResults?: int, nextToken?: string, agentSpaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThreatModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThreatModelsAsync(array{maxResults?: int, nextToken?: string, agentSpaceId?: string, ...} $args = [])
 * @method \Aws\Result listThreats(array $args = [])
 * @phpstan-method \Aws\Result listThreats(array{threatJobId?: string, agentSpaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThreatsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThreatsAsync(array{threatJobId?: string, agentSpaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result startCodeRemediation(array $args = [])
 * @phpstan-method \Aws\Result startCodeRemediation(array{agentSpaceId?: string, pentestJobId?: string, codeReviewJobId?: string, findingIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCodeRemediationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCodeRemediationAsync(array{agentSpaceId?: string, pentestJobId?: string, codeReviewJobId?: string, findingIds?: list<string>, ...} $args = [])
 * @method \Aws\Result startCodeReviewJob(array $args = [])
 * @phpstan-method \Aws\Result startCodeReviewJob(array{agentSpaceId?: string, codeReviewId?: string, diffSource?: array{s3Uri?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCodeReviewJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCodeReviewJobAsync(array{agentSpaceId?: string, codeReviewId?: string, diffSource?: array{s3Uri?: string, ...}, ...} $args = [])
 * @method \Aws\Result startPentestJob(array $args = [])
 * @phpstan-method \Aws\Result startPentestJob(array{agentSpaceId?: string, pentestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startPentestJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPentestJobAsync(array{agentSpaceId?: string, pentestId?: string, ...} $args = [])
 * @method \Aws\Result startThreatModelJob(array $args = [])
 * @phpstan-method \Aws\Result startThreatModelJob(array{agentSpaceId?: string, threatModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startThreatModelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startThreatModelJobAsync(array{agentSpaceId?: string, threatModelId?: string, ...} $args = [])
 * @method \Aws\Result stopCodeReviewJob(array $args = [])
 * @phpstan-method \Aws\Result stopCodeReviewJob(array{agentSpaceId?: string, codeReviewJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCodeReviewJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCodeReviewJobAsync(array{agentSpaceId?: string, codeReviewJobId?: string, ...} $args = [])
 * @method \Aws\Result stopPentestJob(array $args = [])
 * @phpstan-method \Aws\Result stopPentestJob(array{agentSpaceId?: string, pentestJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopPentestJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopPentestJobAsync(array{agentSpaceId?: string, pentestJobId?: string, ...} $args = [])
 * @method \Aws\Result stopThreatModelJob(array $args = [])
 * @phpstan-method \Aws\Result stopThreatModelJob(array{agentSpaceId?: string, threatModelJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopThreatModelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopThreatModelJobAsync(array{agentSpaceId?: string, threatModelJobId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAgentSpace(array $args = [])
 * @phpstan-method \Aws\Result updateAgentSpace(array{
 *     agentSpaceId?: string,
 *     name?: string,
 *     description?: string,
 *     awsResources?: array{
 *         vpcs?: list<array>,
 *         logGroups?: list<string>,
 *         s3Buckets?: list<string>,
 *         secretArns?: list<string>,
 *         lambdaFunctionArns?: list<string>,
 *         iamRoles?: list<string>,
 *         ...,
 *     },
 *     targetDomainIds?: list<string>,
 *     codeReviewSettings?: array{controlsScanning?: bool, generalPurposeScanning?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentSpaceAsync(array{
 *     agentSpaceId?: string,
 *     name?: string,
 *     description?: string,
 *     awsResources?: array{
 *         vpcs?: list<array>,
 *         logGroups?: list<string>,
 *         s3Buckets?: list<string>,
 *         secretArns?: list<string>,
 *         lambdaFunctionArns?: list<string>,
 *         iamRoles?: list<string>,
 *         ...,
 *     },
 *     targetDomainIds?: list<string>,
 *     codeReviewSettings?: array{controlsScanning?: bool, generalPurposeScanning?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{applicationId?: string, roleArn?: string, defaultKmsKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{applicationId?: string, roleArn?: string, defaultKmsKeyId?: string, ...} $args = [])
 * @method \Aws\Result updateCodeReview(array $args = [])
 * @phpstan-method \Aws\Result updateCodeReview(array{
 *     codeReviewId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     validationMode?: 'DISABLED'|'SIMULATED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCodeReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCodeReviewAsync(array{
 *     codeReviewId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     validationMode?: 'DISABLED'|'SIMULATED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFinding(array $args = [])
 * @phpstan-method \Aws\Result updateFinding(array{
 *     findingId?: string,
 *     agentSpaceId?: string,
 *     name?: string,
 *     description?: string,
 *     riskType?: string,
 *     riskLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNKNOWN',
 *     riskScore?: string,
 *     attackScript?: string,
 *     reasoning?: string,
 *     status?: 'ACCEPTED'|'ACTIVE'|'FALSE_POSITIVE'|'RESOLVED',
 *     customerNote?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFindingAsync(array{
 *     findingId?: string,
 *     agentSpaceId?: string,
 *     name?: string,
 *     description?: string,
 *     riskType?: string,
 *     riskLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNKNOWN',
 *     riskScore?: string,
 *     attackScript?: string,
 *     reasoning?: string,
 *     status?: 'ACCEPTED'|'ACTIVE'|'FALSE_POSITIVE'|'RESOLVED',
 *     customerNote?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegratedResources(array $args = [])
 * @phpstan-method \Aws\Result updateIntegratedResources(array{
 *     agentSpaceId?: string,
 *     integrationId?: string,
 *     items?: list<array{resource?: array, capabilities?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegratedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegratedResourcesAsync(array{
 *     agentSpaceId?: string,
 *     integrationId?: string,
 *     items?: list<array{resource?: array, capabilities?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePentest(array $args = [])
 * @phpstan-method \Aws\Result updatePentest(array{
 *     pentestId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     excludeRiskTypes?: list<'ARBITRARY_FILE_UPLOAD'|'BUSINESS_LOGIC_VULNERABILITIES'|'CODE_INJECTION'|'COMMAND_INJECTION'|'CROSS_SITE_SCRIPTING'|'CRYPTOGRAPHIC_VULNERABILITIES'|'DATABASE_ACCESS'|'DATABASE_MODIFICATION'|'DEFAULT_CREDENTIALS'|'DENIAL_OF_SERVICE'|'FILE_ACCESS'|'FILE_CREATION'|'FILE_DELETION'|'GRAPHQL_VULNERABILITIES'|'INFORMATION_DISCLOSURE'|'INSECURE_DESERIALIZATION'|'INSECURE_DIRECT_OBJECT_REFERENCE'|'JSON_WEB_TOKEN_VULNERABILITIES'|'LOCAL_FILE_INCLUSION'|'OTHER'|'OUTBOUND_SERVICE_REQUEST'|'PATH_TRAVERSAL'|'PRIVILEGE_ESCALATION'|'SERVER_SIDE_REQUEST_FORGERY'|'SERVER_SIDE_TEMPLATE_INJECTION'|'SQL_INJECTION'|'UNKNOWN'|'XML_EXTERNAL_ENTITY'>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     vpcConfig?: array{vpcArn?: string, securityGroupArns?: list<string>, subnetArns?: list<string>, ...},
 *     networkTrafficConfig?: array{rules?: list<array>, customHeaders?: list<array>, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     disableManagedSkills?: list<'FINDING_PERSONALIZATION'|'LOGIN_OPTIMIZATION'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePentestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePentestAsync(array{
 *     pentestId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     excludeRiskTypes?: list<'ARBITRARY_FILE_UPLOAD'|'BUSINESS_LOGIC_VULNERABILITIES'|'CODE_INJECTION'|'COMMAND_INJECTION'|'CROSS_SITE_SCRIPTING'|'CRYPTOGRAPHIC_VULNERABILITIES'|'DATABASE_ACCESS'|'DATABASE_MODIFICATION'|'DEFAULT_CREDENTIALS'|'DENIAL_OF_SERVICE'|'FILE_ACCESS'|'FILE_CREATION'|'FILE_DELETION'|'GRAPHQL_VULNERABILITIES'|'INFORMATION_DISCLOSURE'|'INSECURE_DESERIALIZATION'|'INSECURE_DIRECT_OBJECT_REFERENCE'|'JSON_WEB_TOKEN_VULNERABILITIES'|'LOCAL_FILE_INCLUSION'|'OTHER'|'OUTBOUND_SERVICE_REQUEST'|'PATH_TRAVERSAL'|'PRIVILEGE_ESCALATION'|'SERVER_SIDE_REQUEST_FORGERY'|'SERVER_SIDE_TEMPLATE_INJECTION'|'SQL_INJECTION'|'UNKNOWN'|'XML_EXTERNAL_ENTITY'>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     vpcConfig?: array{vpcArn?: string, securityGroupArns?: list<string>, subnetArns?: list<string>, ...},
 *     networkTrafficConfig?: array{rules?: list<array>, customHeaders?: list<array>, ...},
 *     codeRemediationStrategy?: 'AUTOMATIC'|'DISABLED',
 *     disableManagedSkills?: list<'FINDING_PERSONALIZATION'|'LOGIN_OPTIMIZATION'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePrivateConnectionCertificate(array $args = [])
 * @phpstan-method \Aws\Result updatePrivateConnectionCertificate(array{privateConnectionName?: string, certificate?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePrivateConnectionCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePrivateConnectionCertificateAsync(array{privateConnectionName?: string, certificate?: string, ...} $args = [])
 * @method \Aws\Result updateSecurityRequirementPack(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityRequirementPack(array{packId?: string, name?: string, description?: string, status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityRequirementPackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityRequirementPackAsync(array{packId?: string, name?: string, description?: string, status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updateTargetDomain(array $args = [])
 * @phpstan-method \Aws\Result updateTargetDomain(array{targetDomainId?: string, verificationMethod?: 'DNS_TXT'|'HTTP_ROUTE'|'PRIVATE_VPC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTargetDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTargetDomainAsync(array{targetDomainId?: string, verificationMethod?: 'DNS_TXT'|'HTTP_ROUTE'|'PRIVATE_VPC', ...} $args = [])
 * @method \Aws\Result updateThreat(array $args = [])
 * @phpstan-method \Aws\Result updateThreat(array{
 *     threatId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     status?: 'DISMISSED'|'OPEN'|'RESOLVED',
 *     comments?: string,
 *     statement?: string,
 *     severity?: 'CRITICAL'|'HIGH'|'INFO'|'LOW'|'MEDIUM',
 *     threatSource?: string,
 *     prerequisites?: string,
 *     threatAction?: string,
 *     threatImpact?: string,
 *     impactedGoal?: list<string>,
 *     impactedAssets?: list<string>,
 *     anchor?: array{kind?: string, id?: string, packageId?: string, ...},
 *     evidence?: list<array{packageId?: string, path?: string, ...}>,
 *     recommendation?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThreatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThreatAsync(array{
 *     threatId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     status?: 'DISMISSED'|'OPEN'|'RESOLVED',
 *     comments?: string,
 *     statement?: string,
 *     severity?: 'CRITICAL'|'HIGH'|'INFO'|'LOW'|'MEDIUM',
 *     threatSource?: string,
 *     prerequisites?: string,
 *     threatAction?: string,
 *     threatImpact?: string,
 *     impactedGoal?: list<string>,
 *     impactedAssets?: list<string>,
 *     anchor?: array{kind?: string, id?: string, packageId?: string, ...},
 *     evidence?: list<array{packageId?: string, path?: string, ...}>,
 *     recommendation?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThreatModel(array $args = [])
 * @phpstan-method \Aws\Result updateThreatModel(array{
 *     threatModelId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     description?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     scopeDocs?: list<array{s3Location?: string, artifactId?: string, integratedDocument?: array, ...}>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThreatModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThreatModelAsync(array{
 *     threatModelId?: string,
 *     agentSpaceId?: string,
 *     title?: string,
 *     description?: string,
 *     assets?: array{
 *         endpoints?: list<array>,
 *         actors?: list<array>,
 *         documents?: list<array>,
 *         sourceCode?: list<array>,
 *         integratedRepositories?: list<array>,
 *         ...,
 *     },
 *     scopeDocs?: list<array{s3Location?: string, artifactId?: string, integratedDocument?: array, ...}>,
 *     serviceRole?: string,
 *     logConfig?: array{logGroup?: string, logStream?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyTargetDomain(array $args = [])
 * @phpstan-method \Aws\Result verifyTargetDomain(array{targetDomainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyTargetDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyTargetDomainAsync(array{targetDomainId?: string, ...} $args = [])
 */
class SecurityAgentClient extends AwsClient {}
