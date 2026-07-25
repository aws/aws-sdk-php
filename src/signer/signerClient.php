<?php
namespace Aws\signer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Signer** service.
 * @method \Aws\Result addProfilePermission(array $args = [])
 * @phpstan-method \Aws\Result addProfilePermission(array{
 *     profileName?: string,
 *     profileVersion?: string,
 *     action?: string,
 *     principal?: string,
 *     revisionId?: string,
 *     statementId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addProfilePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addProfilePermissionAsync(array{
 *     profileName?: string,
 *     profileVersion?: string,
 *     action?: string,
 *     principal?: string,
 *     revisionId?: string,
 *     statementId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelSigningProfile(array $args = [])
 * @phpstan-method \Aws\Result cancelSigningProfile(array{profileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelSigningProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelSigningProfileAsync(array{profileName?: string, ...} $args = [])
 * @method \Aws\Result describeSigningJob(array $args = [])
 * @phpstan-method \Aws\Result describeSigningJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSigningJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSigningJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result getRevocationStatus(array $args = [])
 * @phpstan-method \Aws\Result getRevocationStatus(array{
 *     signatureTimestamp?: int|string|\DateTimeInterface,
 *     platformId?: string,
 *     profileVersionArn?: string,
 *     jobArn?: string,
 *     certificateHashes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevocationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevocationStatusAsync(array{
 *     signatureTimestamp?: int|string|\DateTimeInterface,
 *     platformId?: string,
 *     profileVersionArn?: string,
 *     jobArn?: string,
 *     certificateHashes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSigningPlatform(array $args = [])
 * @phpstan-method \Aws\Result getSigningPlatform(array{platformId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSigningPlatformAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSigningPlatformAsync(array{platformId?: string, ...} $args = [])
 * @method \Aws\Result getSigningProfile(array $args = [])
 * @phpstan-method \Aws\Result getSigningProfile(array{profileName?: string, profileOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSigningProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSigningProfileAsync(array{profileName?: string, profileOwner?: string, ...} $args = [])
 * @method \Aws\Result listProfilePermissions(array $args = [])
 * @phpstan-method \Aws\Result listProfilePermissions(array{profileName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfilePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfilePermissionsAsync(array{profileName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSigningJobs(array $args = [])
 * @phpstan-method \Aws\Result listSigningJobs(array{
 *     status?: 'Failed'|'InProgress'|'Succeeded',
 *     platformId?: string,
 *     requestedBy?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     isRevoked?: bool,
 *     signatureExpiresBefore?: int|string|\DateTimeInterface,
 *     signatureExpiresAfter?: int|string|\DateTimeInterface,
 *     jobInvoker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSigningJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSigningJobsAsync(array{
 *     status?: 'Failed'|'InProgress'|'Succeeded',
 *     platformId?: string,
 *     requestedBy?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     isRevoked?: bool,
 *     signatureExpiresBefore?: int|string|\DateTimeInterface,
 *     signatureExpiresAfter?: int|string|\DateTimeInterface,
 *     jobInvoker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSigningPlatforms(array $args = [])
 * @phpstan-method \Aws\Result listSigningPlatforms(array{category?: string, partner?: string, target?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSigningPlatformsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSigningPlatformsAsync(array{category?: string, partner?: string, target?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSigningProfiles(array $args = [])
 * @phpstan-method \Aws\Result listSigningProfiles(array{
 *     includeCanceled?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     platformId?: string,
 *     statuses?: list<'Active'|'Canceled'|'Revoked'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSigningProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSigningProfilesAsync(array{
 *     includeCanceled?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     platformId?: string,
 *     statuses?: list<'Active'|'Canceled'|'Revoked'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putSigningProfile(array $args = [])
 * @phpstan-method \Aws\Result putSigningProfile(array{
 *     profileName?: string,
 *     signingMaterial?: array{certificateArn?: string, ...},
 *     signatureValidityPeriod?: array{value?: int, type?: 'DAYS'|'MONTHS'|'YEARS', ...},
 *     platformId?: string,
 *     overrides?: array{
 *         signingConfiguration?: array{encryptionAlgorithm?: 'ECDSA'|'RSA', hashAlgorithm?: 'SHA1'|'SHA256', ...},
 *         signingImageFormat?: 'JSON'|'JSONDetached'|'JSONEmbedded',
 *         ...,
 *     },
 *     signingParameters?: array<string, string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSigningProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSigningProfileAsync(array{
 *     profileName?: string,
 *     signingMaterial?: array{certificateArn?: string, ...},
 *     signatureValidityPeriod?: array{value?: int, type?: 'DAYS'|'MONTHS'|'YEARS', ...},
 *     platformId?: string,
 *     overrides?: array{
 *         signingConfiguration?: array{encryptionAlgorithm?: 'ECDSA'|'RSA', hashAlgorithm?: 'SHA1'|'SHA256', ...},
 *         signingImageFormat?: 'JSON'|'JSONDetached'|'JSONEmbedded',
 *         ...,
 *     },
 *     signingParameters?: array<string, string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeProfilePermission(array $args = [])
 * @phpstan-method \Aws\Result removeProfilePermission(array{profileName?: string, revisionId?: string, statementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeProfilePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeProfilePermissionAsync(array{profileName?: string, revisionId?: string, statementId?: string, ...} $args = [])
 * @method \Aws\Result revokeSignature(array $args = [])
 * @phpstan-method \Aws\Result revokeSignature(array{jobId?: string, jobOwner?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeSignatureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeSignatureAsync(array{jobId?: string, jobOwner?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result revokeSigningProfile(array $args = [])
 * @phpstan-method \Aws\Result revokeSigningProfile(array{
 *     profileName?: string,
 *     profileVersion?: string,
 *     reason?: string,
 *     effectiveTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeSigningProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeSigningProfileAsync(array{
 *     profileName?: string,
 *     profileVersion?: string,
 *     reason?: string,
 *     effectiveTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result signPayload(array $args = [])
 * @phpstan-method \Aws\Result signPayload(array{
 *     profileName?: string,
 *     profileOwner?: string,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     payloadFormat?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise signPayloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise signPayloadAsync(array{
 *     profileName?: string,
 *     profileOwner?: string,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     payloadFormat?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSigningJob(array $args = [])
 * @phpstan-method \Aws\Result startSigningJob(array{
 *     source?: array{s3?: array{bucketName?: string, key?: string, version?: string, ...}, ...},
 *     destination?: array{s3?: array{bucketName?: string, prefix?: string, ...}, ...},
 *     profileName?: string,
 *     clientRequestToken?: string,
 *     profileOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSigningJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSigningJobAsync(array{
 *     source?: array{s3?: array{bucketName?: string, key?: string, version?: string, ...}, ...},
 *     destination?: array{s3?: array{bucketName?: string, prefix?: string, ...}, ...},
 *     profileName?: string,
 *     clientRequestToken?: string,
 *     profileOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class signerClient extends AwsClient {}
