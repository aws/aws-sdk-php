<?php
namespace Aws\AccessAnalyzer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Access Analyzer** service.
 * @method \Aws\Result applyArchiveRule(array $args = [])
 * @phpstan-method \Aws\Result applyArchiveRule(array{analyzerArn?: string, ruleName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise applyArchiveRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applyArchiveRuleAsync(array{analyzerArn?: string, ruleName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result cancelPolicyGeneration(array $args = [])
 * @phpstan-method \Aws\Result cancelPolicyGeneration(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelPolicyGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelPolicyGenerationAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result checkAccessNotGranted(array $args = [])
 * @phpstan-method \Aws\Result checkAccessNotGranted(array{
 *     policyDocument?: string,
 *     access?: list<array{actions?: list<string>, resources?: list<string>, ...}>,
 *     policyType?: 'IDENTITY_POLICY'|'RESOURCE_POLICY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkAccessNotGrantedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkAccessNotGrantedAsync(array{
 *     policyDocument?: string,
 *     access?: list<array{actions?: list<string>, resources?: list<string>, ...}>,
 *     policyType?: 'IDENTITY_POLICY'|'RESOURCE_POLICY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result checkNoNewAccess(array $args = [])
 * @phpstan-method \Aws\Result checkNoNewAccess(array{
 *     newPolicyDocument?: string,
 *     existingPolicyDocument?: string,
 *     policyType?: 'IDENTITY_POLICY'|'RESOURCE_POLICY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkNoNewAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkNoNewAccessAsync(array{
 *     newPolicyDocument?: string,
 *     existingPolicyDocument?: string,
 *     policyType?: 'IDENTITY_POLICY'|'RESOURCE_POLICY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result checkNoPublicAccess(array $args = [])
 * @phpstan-method \Aws\Result checkNoPublicAccess(array{
 *     policyDocument?: string,
 *     resourceType?: 'AWS::ApiGateway::RestApi'|'AWS::Backup::BackupVault'|'AWS::CloudTrail::Dashboard'|'AWS::CloudTrail::EventDataStore'|'AWS::CodeArtifact::Domain'|'AWS::DynamoDB::Stream'|'AWS::DynamoDB::Table'|'AWS::EFS::FileSystem'|'AWS::IAM::AssumeRolePolicyDocument'|'AWS::KMS::Key'|'AWS::Kinesis::Stream'|'AWS::Kinesis::StreamConsumer'|'AWS::Lambda::Function'|'AWS::OpenSearchService::Domain'|'AWS::S3::AccessPoint'|'AWS::S3::Bucket'|'AWS::S3::Glacier'|'AWS::S3Express::AccessPoint'|'AWS::S3Express::DirectoryBucket'|'AWS::S3Outposts::AccessPoint'|'AWS::S3Outposts::Bucket'|'AWS::S3Tables::Table'|'AWS::S3Tables::TableBucket'|'AWS::SNS::Topic'|'AWS::SQS::Queue'|'AWS::SecretsManager::Secret',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkNoPublicAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkNoPublicAccessAsync(array{
 *     policyDocument?: string,
 *     resourceType?: 'AWS::ApiGateway::RestApi'|'AWS::Backup::BackupVault'|'AWS::CloudTrail::Dashboard'|'AWS::CloudTrail::EventDataStore'|'AWS::CodeArtifact::Domain'|'AWS::DynamoDB::Stream'|'AWS::DynamoDB::Table'|'AWS::EFS::FileSystem'|'AWS::IAM::AssumeRolePolicyDocument'|'AWS::KMS::Key'|'AWS::Kinesis::Stream'|'AWS::Kinesis::StreamConsumer'|'AWS::Lambda::Function'|'AWS::OpenSearchService::Domain'|'AWS::S3::AccessPoint'|'AWS::S3::Bucket'|'AWS::S3::Glacier'|'AWS::S3Express::AccessPoint'|'AWS::S3Express::DirectoryBucket'|'AWS::S3Outposts::AccessPoint'|'AWS::S3Outposts::Bucket'|'AWS::S3Tables::Table'|'AWS::S3Tables::TableBucket'|'AWS::SNS::Topic'|'AWS::SQS::Queue'|'AWS::SecretsManager::Secret',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccessPreview(array $args = [])
 * @phpstan-method \Aws\Result createAccessPreview(array{
 *     analyzerArn?: string,
 *     configurations?: array<string, array{
 *         ebsSnapshot?: array,
 *         ecrRepository?: array,
 *         iamRole?: array,
 *         efsFileSystem?: array,
 *         kmsKey?: array,
 *         rdsDbClusterSnapshot?: array,
 *         rdsDbSnapshot?: array,
 *         secretsManagerSecret?: array,
 *         s3Bucket?: array,
 *         snsTopic?: array,
 *         sqsQueue?: array,
 *         s3ExpressDirectoryBucket?: array,
 *         dynamodbStream?: array,
 *         dynamodbTable?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessPreviewAsync(array{
 *     analyzerArn?: string,
 *     configurations?: array<string, array{
 *         ebsSnapshot?: array,
 *         ecrRepository?: array,
 *         iamRole?: array,
 *         efsFileSystem?: array,
 *         kmsKey?: array,
 *         rdsDbClusterSnapshot?: array,
 *         rdsDbSnapshot?: array,
 *         secretsManagerSecret?: array,
 *         s3Bucket?: array,
 *         snsTopic?: array,
 *         sqsQueue?: array,
 *         s3ExpressDirectoryBucket?: array,
 *         dynamodbStream?: array,
 *         dynamodbTable?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result createAnalyzer(array{
 *     analyzerName?: string,
 *     type?: 'ACCOUNT'|'ACCOUNT_INTERNAL_ACCESS'|'ACCOUNT_UNUSED_ACCESS'|'ORGANIZATION'|'ORGANIZATION_INTERNAL_ACCESS'|'ORGANIZATION_UNUSED_ACCESS',
 *     archiveRules?: list<array{ruleName?: string, filter?: array<string, array>, ...}>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     configuration?: array{
 *         unusedAccess?: array{unusedAccessAge?: int, analysisRule?: array, ...},
 *         internalAccess?: array{analysisRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnalyzerAsync(array{
 *     analyzerName?: string,
 *     type?: 'ACCOUNT'|'ACCOUNT_INTERNAL_ACCESS'|'ACCOUNT_UNUSED_ACCESS'|'ORGANIZATION'|'ORGANIZATION_INTERNAL_ACCESS'|'ORGANIZATION_UNUSED_ACCESS',
 *     archiveRules?: list<array{ruleName?: string, filter?: array<string, array>, ...}>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     configuration?: array{
 *         unusedAccess?: array{unusedAccessAge?: int, analysisRule?: array, ...},
 *         internalAccess?: array{analysisRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createArchiveRule(array $args = [])
 * @phpstan-method \Aws\Result createArchiveRule(array{
 *     analyzerName?: string,
 *     ruleName?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createArchiveRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createArchiveRuleAsync(array{
 *     analyzerName?: string,
 *     ruleName?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceLinkedAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result createServiceLinkedAnalyzer(array{
 *     type?: 'ACCOUNT'|'ACCOUNT_INTERNAL_ACCESS'|'ACCOUNT_UNUSED_ACCESS'|'ORGANIZATION'|'ORGANIZATION_INTERNAL_ACCESS'|'ORGANIZATION_UNUSED_ACCESS',
 *     archiveRules?: list<array{ruleName?: string, filter?: array<string, array>, ...}>,
 *     clientToken?: string,
 *     configuration?: array{
 *         unusedAccess?: array{unusedAccessAge?: int, analysisRule?: array, ...},
 *         internalAccess?: array{analysisRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceLinkedAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceLinkedAnalyzerAsync(array{
 *     type?: 'ACCOUNT'|'ACCOUNT_INTERNAL_ACCESS'|'ACCOUNT_UNUSED_ACCESS'|'ORGANIZATION'|'ORGANIZATION_INTERNAL_ACCESS'|'ORGANIZATION_UNUSED_ACCESS',
 *     archiveRules?: list<array{ruleName?: string, filter?: array<string, array>, ...}>,
 *     clientToken?: string,
 *     configuration?: array{
 *         unusedAccess?: array{unusedAccessAge?: int, analysisRule?: array, ...},
 *         internalAccess?: array{analysisRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result deleteAnalyzer(array{analyzerName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnalyzerAsync(array{analyzerName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteArchiveRule(array $args = [])
 * @phpstan-method \Aws\Result deleteArchiveRule(array{analyzerName?: string, ruleName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteArchiveRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteArchiveRuleAsync(array{analyzerName?: string, ruleName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceLinkedAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceLinkedAnalyzer(array{analyzerName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceLinkedAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceLinkedAnalyzerAsync(array{analyzerName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result generateFindingRecommendation(array $args = [])
 * @phpstan-method \Aws\Result generateFindingRecommendation(array{analyzerArn?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateFindingRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateFindingRecommendationAsync(array{analyzerArn?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getAccessPreview(array $args = [])
 * @phpstan-method \Aws\Result getAccessPreview(array{accessPreviewId?: string, analyzerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPreviewAsync(array{accessPreviewId?: string, analyzerArn?: string, ...} $args = [])
 * @method \Aws\Result getAnalyzedResource(array $args = [])
 * @phpstan-method \Aws\Result getAnalyzedResource(array{analyzerArn?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnalyzedResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnalyzedResourceAsync(array{analyzerArn?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result getAnalyzer(array{analyzerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnalyzerAsync(array{analyzerName?: string, ...} $args = [])
 * @method \Aws\Result getArchiveRule(array $args = [])
 * @phpstan-method \Aws\Result getArchiveRule(array{analyzerName?: string, ruleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArchiveRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchiveRuleAsync(array{analyzerName?: string, ruleName?: string, ...} $args = [])
 * @method \Aws\Result getFinding(array $args = [])
 * @phpstan-method \Aws\Result getFinding(array{analyzerArn?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingAsync(array{analyzerArn?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getFindingRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getFindingRecommendation(array{analyzerArn?: string, id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingRecommendationAsync(array{analyzerArn?: string, id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getFindingV2(array $args = [])
 * @phpstan-method \Aws\Result getFindingV2(array{analyzerArn?: string, id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingV2Async(array{analyzerArn?: string, id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getFindingsStatistics(array $args = [])
 * @phpstan-method \Aws\Result getFindingsStatistics(array{analyzerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsStatisticsAsync(array{analyzerArn?: string, ...} $args = [])
 * @method \Aws\Result getGeneratedPolicy(array $args = [])
 * @phpstan-method \Aws\Result getGeneratedPolicy(array{jobId?: string, includeResourcePlaceholders?: bool, includeServiceLevelTemplate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGeneratedPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGeneratedPolicyAsync(array{jobId?: string, includeResourcePlaceholders?: bool, includeServiceLevelTemplate?: bool, ...} $args = [])
 * @method \Aws\Result listAccessPreviewFindings(array $args = [])
 * @phpstan-method \Aws\Result listAccessPreviewFindings(array{
 *     accessPreviewId?: string,
 *     analyzerArn?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPreviewFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPreviewFindingsAsync(array{
 *     accessPreviewId?: string,
 *     analyzerArn?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccessPreviews(array $args = [])
 * @phpstan-method \Aws\Result listAccessPreviews(array{analyzerArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPreviewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPreviewsAsync(array{analyzerArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAnalyzedResources(array $args = [])
 * @phpstan-method \Aws\Result listAnalyzedResources(array{
 *     analyzerArn?: string,
 *     resourceType?: 'AWS::DynamoDB::Stream'|'AWS::DynamoDB::Table'|'AWS::EC2::Snapshot'|'AWS::ECR::Repository'|'AWS::EFS::FileSystem'|'AWS::IAM::Role'|'AWS::IAM::User'|'AWS::KMS::Key'|'AWS::Lambda::Function'|'AWS::Lambda::LayerVersion'|'AWS::RDS::DBClusterSnapshot'|'AWS::RDS::DBSnapshot'|'AWS::S3::Bucket'|'AWS::S3Express::DirectoryBucket'|'AWS::SNS::Topic'|'AWS::SQS::Queue'|'AWS::SecretsManager::Secret',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalyzedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalyzedResourcesAsync(array{
 *     analyzerArn?: string,
 *     resourceType?: 'AWS::DynamoDB::Stream'|'AWS::DynamoDB::Table'|'AWS::EC2::Snapshot'|'AWS::ECR::Repository'|'AWS::EFS::FileSystem'|'AWS::IAM::Role'|'AWS::IAM::User'|'AWS::KMS::Key'|'AWS::Lambda::Function'|'AWS::Lambda::LayerVersion'|'AWS::RDS::DBClusterSnapshot'|'AWS::RDS::DBSnapshot'|'AWS::S3::Bucket'|'AWS::S3Express::DirectoryBucket'|'AWS::SNS::Topic'|'AWS::SQS::Queue'|'AWS::SecretsManager::Secret',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnalyzers(array $args = [])
 * @phpstan-method \Aws\Result listAnalyzers(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: 'ACCOUNT'|'ACCOUNT_INTERNAL_ACCESS'|'ACCOUNT_UNUSED_ACCESS'|'ORGANIZATION'|'ORGANIZATION_INTERNAL_ACCESS'|'ORGANIZATION_UNUSED_ACCESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalyzersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalyzersAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: 'ACCOUNT'|'ACCOUNT_INTERNAL_ACCESS'|'ACCOUNT_UNUSED_ACCESS'|'ORGANIZATION'|'ORGANIZATION_INTERNAL_ACCESS'|'ORGANIZATION_UNUSED_ACCESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listArchiveRules(array $args = [])
 * @phpstan-method \Aws\Result listArchiveRules(array{analyzerName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listArchiveRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArchiveRulesAsync(array{analyzerName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listFindings(array $args = [])
 * @phpstan-method \Aws\Result listFindings(array{
 *     analyzerArn?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     sort?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsAsync(array{
 *     analyzerArn?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     sort?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFindingsV2(array $args = [])
 * @phpstan-method \Aws\Result listFindingsV2(array{
 *     analyzerArn?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sort?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsV2Async(array{
 *     analyzerArn?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sort?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPolicyGenerations(array $args = [])
 * @phpstan-method \Aws\Result listPolicyGenerations(array{principalArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyGenerationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyGenerationsAsync(array{principalArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startPolicyGeneration(array $args = [])
 * @phpstan-method \Aws\Result startPolicyGeneration(array{
 *     policyGenerationDetails?: array{principalArn?: string, ...},
 *     cloudTrailDetails?: array{
 *         trails?: list<array>,
 *         accessRole?: string,
 *         startTime?: int|string|\DateTimeInterface,
 *         endTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPolicyGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPolicyGenerationAsync(array{
 *     policyGenerationDetails?: array{principalArn?: string, ...},
 *     cloudTrailDetails?: array{
 *         trails?: list<array>,
 *         accessRole?: string,
 *         startTime?: int|string|\DateTimeInterface,
 *         endTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startResourceScan(array $args = [])
 * @phpstan-method \Aws\Result startResourceScan(array{analyzerArn?: string, resourceArn?: string, resourceOwnerAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startResourceScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startResourceScanAsync(array{analyzerArn?: string, resourceArn?: string, resourceOwnerAccount?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result updateAnalyzer(array{
 *     analyzerName?: string,
 *     configuration?: array{
 *         unusedAccess?: array{unusedAccessAge?: int, analysisRule?: array, ...},
 *         internalAccess?: array{analysisRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnalyzerAsync(array{
 *     analyzerName?: string,
 *     configuration?: array{
 *         unusedAccess?: array{unusedAccessAge?: int, analysisRule?: array, ...},
 *         internalAccess?: array{analysisRule?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateArchiveRule(array $args = [])
 * @phpstan-method \Aws\Result updateArchiveRule(array{
 *     analyzerName?: string,
 *     ruleName?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateArchiveRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateArchiveRuleAsync(array{
 *     analyzerName?: string,
 *     ruleName?: string,
 *     filter?: array<string, array{eq?: list<string>, neq?: list<string>, contains?: list<string>, exists?: bool, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFindings(array $args = [])
 * @phpstan-method \Aws\Result updateFindings(array{
 *     analyzerArn?: string,
 *     status?: 'ACTIVE'|'ARCHIVED',
 *     ids?: list<string>,
 *     resourceArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFindingsAsync(array{
 *     analyzerArn?: string,
 *     status?: 'ACTIVE'|'ARCHIVED',
 *     ids?: list<string>,
 *     resourceArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validatePolicy(array $args = [])
 * @phpstan-method \Aws\Result validatePolicy(array{
 *     locale?: 'DE'|'EN'|'ES'|'FR'|'IT'|'JA'|'KO'|'PT_BR'|'ZH_CN'|'ZH_TW',
 *     maxResults?: int,
 *     nextToken?: string,
 *     policyDocument?: string,
 *     policyType?: 'IDENTITY_POLICY'|'RESOURCE_CONTROL_POLICY'|'RESOURCE_POLICY'|'SERVICE_CONTROL_POLICY',
 *     validatePolicyResourceType?: 'AWS::DynamoDB::Table'|'AWS::IAM::AssumeRolePolicyDocument'|'AWS::S3::AccessPoint'|'AWS::S3::Bucket'|'AWS::S3::MultiRegionAccessPoint'|'AWS::S3ObjectLambda::AccessPoint',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise validatePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validatePolicyAsync(array{
 *     locale?: 'DE'|'EN'|'ES'|'FR'|'IT'|'JA'|'KO'|'PT_BR'|'ZH_CN'|'ZH_TW',
 *     maxResults?: int,
 *     nextToken?: string,
 *     policyDocument?: string,
 *     policyType?: 'IDENTITY_POLICY'|'RESOURCE_CONTROL_POLICY'|'RESOURCE_POLICY'|'SERVICE_CONTROL_POLICY',
 *     validatePolicyResourceType?: 'AWS::DynamoDB::Table'|'AWS::IAM::AssumeRolePolicyDocument'|'AWS::S3::AccessPoint'|'AWS::S3::Bucket'|'AWS::S3::MultiRegionAccessPoint'|'AWS::S3ObjectLambda::AccessPoint',
 *     ...,
 * } $args = [])
 */
class AccessAnalyzerClient extends AwsClient {}
