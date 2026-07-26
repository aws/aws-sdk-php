<?php
namespace Aws\RolesAnywhere;

use Aws\AwsClient;

/**
 * This client is used to interact with the **IAM Roles Anywhere** service.
 * @method \Aws\Result createProfile(array $args = [])
 * @phpstan-method \Aws\Result createProfile(array{
 *     name?: string,
 *     requireInstanceProperties?: bool,
 *     sessionPolicy?: string,
 *     roleArns?: list<string>,
 *     managedPolicyArns?: list<string>,
 *     durationSeconds?: int,
 *     enabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     acceptRoleSessionName?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfileAsync(array{
 *     name?: string,
 *     requireInstanceProperties?: bool,
 *     sessionPolicy?: string,
 *     roleArns?: list<string>,
 *     managedPolicyArns?: list<string>,
 *     durationSeconds?: int,
 *     enabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     acceptRoleSessionName?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrustAnchor(array $args = [])
 * @phpstan-method \Aws\Result createTrustAnchor(array{
 *     name?: string,
 *     source?: array{
 *         sourceType?: 'AWS_ACM_PCA'|'CERTIFICATE_BUNDLE'|'SELF_SIGNED_REPOSITORY',
 *         sourceData?: array{x509CertificateData?: string, acmPcaArn?: string, ...},
 *         ...,
 *     },
 *     enabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     notificationSettings?: list<array{
 *         enabled?: bool,
 *         event?: 'CA_CERTIFICATE_EXPIRY'|'END_ENTITY_CERTIFICATE_EXPIRY',
 *         threshold?: int,
 *         channel?: 'ALL',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustAnchorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrustAnchorAsync(array{
 *     name?: string,
 *     source?: array{
 *         sourceType?: 'AWS_ACM_PCA'|'CERTIFICATE_BUNDLE'|'SELF_SIGNED_REPOSITORY',
 *         sourceData?: array{x509CertificateData?: string, acmPcaArn?: string, ...},
 *         ...,
 *     },
 *     enabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     notificationSettings?: list<array{
 *         enabled?: bool,
 *         event?: 'CA_CERTIFICATE_EXPIRY'|'END_ENTITY_CERTIFICATE_EXPIRY',
 *         threshold?: int,
 *         channel?: 'ALL',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAttributeMapping(array $args = [])
 * @phpstan-method \Aws\Result deleteAttributeMapping(array{
 *     profileId?: string,
 *     certificateField?: 'x509Issuer'|'x509SAN'|'x509Subject',
 *     specifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttributeMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttributeMappingAsync(array{
 *     profileId?: string,
 *     certificateField?: 'x509Issuer'|'x509SAN'|'x509Subject',
 *     specifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCrl(array $args = [])
 * @phpstan-method \Aws\Result deleteCrl(array{crlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCrlAsync(array{crlId?: string, ...} $args = [])
 * @method \Aws\Result deleteProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteProfile(array{profileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileAsync(array{profileId?: string, ...} $args = [])
 * @method \Aws\Result deleteTrustAnchor(array $args = [])
 * @phpstan-method \Aws\Result deleteTrustAnchor(array{trustAnchorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustAnchorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrustAnchorAsync(array{trustAnchorId?: string, ...} $args = [])
 * @method \Aws\Result disableCrl(array $args = [])
 * @phpstan-method \Aws\Result disableCrl(array{crlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableCrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableCrlAsync(array{crlId?: string, ...} $args = [])
 * @method \Aws\Result disableProfile(array $args = [])
 * @phpstan-method \Aws\Result disableProfile(array{profileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableProfileAsync(array{profileId?: string, ...} $args = [])
 * @method \Aws\Result disableTrustAnchor(array $args = [])
 * @phpstan-method \Aws\Result disableTrustAnchor(array{trustAnchorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableTrustAnchorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableTrustAnchorAsync(array{trustAnchorId?: string, ...} $args = [])
 * @method \Aws\Result enableCrl(array $args = [])
 * @phpstan-method \Aws\Result enableCrl(array{crlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableCrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableCrlAsync(array{crlId?: string, ...} $args = [])
 * @method \Aws\Result enableProfile(array $args = [])
 * @phpstan-method \Aws\Result enableProfile(array{profileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableProfileAsync(array{profileId?: string, ...} $args = [])
 * @method \Aws\Result enableTrustAnchor(array $args = [])
 * @phpstan-method \Aws\Result enableTrustAnchor(array{trustAnchorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableTrustAnchorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableTrustAnchorAsync(array{trustAnchorId?: string, ...} $args = [])
 * @method \Aws\Result getCrl(array $args = [])
 * @phpstan-method \Aws\Result getCrl(array{crlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCrlAsync(array{crlId?: string, ...} $args = [])
 * @method \Aws\Result getProfile(array $args = [])
 * @phpstan-method \Aws\Result getProfile(array{profileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileAsync(array{profileId?: string, ...} $args = [])
 * @method \Aws\Result getSubject(array $args = [])
 * @phpstan-method \Aws\Result getSubject(array{subjectId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubjectAsync(array{subjectId?: string, ...} $args = [])
 * @method \Aws\Result getTrustAnchor(array $args = [])
 * @phpstan-method \Aws\Result getTrustAnchor(array{trustAnchorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrustAnchorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrustAnchorAsync(array{trustAnchorId?: string, ...} $args = [])
 * @method \Aws\Result importCrl(array $args = [])
 * @phpstan-method \Aws\Result importCrl(array{
 *     name?: string,
 *     crlData?: string|resource|\Psr\Http\Message\StreamInterface,
 *     enabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     trustAnchorArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importCrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importCrlAsync(array{
 *     name?: string,
 *     crlData?: string|resource|\Psr\Http\Message\StreamInterface,
 *     enabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     trustAnchorArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCrls(array $args = [])
 * @phpstan-method \Aws\Result listCrls(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCrlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCrlsAsync(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \Aws\Result listProfiles(array $args = [])
 * @phpstan-method \Aws\Result listProfiles(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfilesAsync(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \Aws\Result listSubjects(array $args = [])
 * @phpstan-method \Aws\Result listSubjects(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubjectsAsync(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTrustAnchors(array $args = [])
 * @phpstan-method \Aws\Result listTrustAnchors(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrustAnchorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrustAnchorsAsync(array{nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \Aws\Result putAttributeMapping(array $args = [])
 * @phpstan-method \Aws\Result putAttributeMapping(array{
 *     profileId?: string,
 *     certificateField?: 'x509Issuer'|'x509SAN'|'x509Subject',
 *     mappingRules?: list<array{specifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAttributeMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAttributeMappingAsync(array{
 *     profileId?: string,
 *     certificateField?: 'x509Issuer'|'x509SAN'|'x509Subject',
 *     mappingRules?: list<array{specifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putNotificationSettings(array $args = [])
 * @phpstan-method \Aws\Result putNotificationSettings(array{
 *     trustAnchorId?: string,
 *     notificationSettings?: list<array{
 *         enabled?: bool,
 *         event?: 'CA_CERTIFICATE_EXPIRY'|'END_ENTITY_CERTIFICATE_EXPIRY',
 *         threshold?: int,
 *         channel?: 'ALL',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putNotificationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putNotificationSettingsAsync(array{
 *     trustAnchorId?: string,
 *     notificationSettings?: list<array{
 *         enabled?: bool,
 *         event?: 'CA_CERTIFICATE_EXPIRY'|'END_ENTITY_CERTIFICATE_EXPIRY',
 *         threshold?: int,
 *         channel?: 'ALL',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resetNotificationSettings(array $args = [])
 * @phpstan-method \Aws\Result resetNotificationSettings(array{
 *     trustAnchorId?: string,
 *     notificationSettingKeys?: list<array{event?: 'CA_CERTIFICATE_EXPIRY'|'END_ENTITY_CERTIFICATE_EXPIRY', channel?: 'ALL', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetNotificationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetNotificationSettingsAsync(array{
 *     trustAnchorId?: string,
 *     notificationSettingKeys?: list<array{event?: 'CA_CERTIFICATE_EXPIRY'|'END_ENTITY_CERTIFICATE_EXPIRY', channel?: 'ALL', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCrl(array $args = [])
 * @phpstan-method \Aws\Result updateCrl(array{crlId?: string, name?: string, crlData?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCrlAsync(array{crlId?: string, name?: string, crlData?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result updateProfile(array $args = [])
 * @phpstan-method \Aws\Result updateProfile(array{
 *     profileId?: string,
 *     name?: string,
 *     sessionPolicy?: string,
 *     roleArns?: list<string>,
 *     managedPolicyArns?: list<string>,
 *     durationSeconds?: int,
 *     acceptRoleSessionName?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfileAsync(array{
 *     profileId?: string,
 *     name?: string,
 *     sessionPolicy?: string,
 *     roleArns?: list<string>,
 *     managedPolicyArns?: list<string>,
 *     durationSeconds?: int,
 *     acceptRoleSessionName?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrustAnchor(array $args = [])
 * @phpstan-method \Aws\Result updateTrustAnchor(array{
 *     trustAnchorId?: string,
 *     name?: string,
 *     source?: array{
 *         sourceType?: 'AWS_ACM_PCA'|'CERTIFICATE_BUNDLE'|'SELF_SIGNED_REPOSITORY',
 *         sourceData?: array{x509CertificateData?: string, acmPcaArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrustAnchorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrustAnchorAsync(array{
 *     trustAnchorId?: string,
 *     name?: string,
 *     source?: array{
 *         sourceType?: 'AWS_ACM_PCA'|'CERTIFICATE_BUNDLE'|'SELF_SIGNED_REPOSITORY',
 *         sourceData?: array{x509CertificateData?: string, acmPcaArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class RolesAnywhereClient extends AwsClient {}
