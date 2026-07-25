<?php
namespace Aws\ConnectHealth;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Connect Health** service.
 * @method \Aws\Result activateSubscription(array $args = [])
 * @phpstan-method \Aws\Result activateSubscription(array{domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateSubscriptionAsync(array{domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{
 *     name?: string,
 *     kmsKeyArn?: string,
 *     webAppSetupConfiguration?: array{ehrRole?: string, idcInstanceId?: string, idcRegion?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{
 *     name?: string,
 *     kmsKeyArn?: string,
 *     webAppSetupConfiguration?: array{ehrRole?: string, idcInstanceId?: string, idcRegion?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscription(array $args = [])
 * @phpstan-method \Aws\Result createSubscription(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result deactivateSubscription(array $args = [])
 * @phpstan-method \Aws\Result deactivateSubscription(array{domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateSubscriptionAsync(array{domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result getDomain(array $args = [])
 * @phpstan-method \Aws\Result getDomain(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result getMedicalScribeListeningSession(array $args = [])
 * @phpstan-method \Aws\Result getMedicalScribeListeningSession(array{sessionId?: string, domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMedicalScribeListeningSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMedicalScribeListeningSessionAsync(array{sessionId?: string, domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \Aws\Result getPatientInsightsJob(array $args = [])
 * @phpstan-method \Aws\Result getPatientInsightsJob(array{domainId?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPatientInsightsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPatientInsightsJobAsync(array{domainId?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result getSubscription(array $args = [])
 * @phpstan-method \Aws\Result getSubscription(array{domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionAsync(array{domainId?: string, subscriptionId?: string, ...} $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{status?: 'ACTIVE'|'DELETED'|'DELETING', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{status?: 'ACTIVE'|'DELETED'|'DELETING', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptions(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startPatientInsightsJob(array $args = [])
 * @phpstan-method \Aws\Result startPatientInsightsJob(array{
 *     domainId?: string,
 *     patientContext?: array{patientId?: string, dateOfBirth?: string, pronouns?: 'HE_HIM'|'SHE_HER'|'THEY_THEM', ...},
 *     insightsContext?: array{insightsType?: 'PRE_VISIT', ...},
 *     encounterContext?: array{encounterReason?: string, ...},
 *     userContext?: array{role?: 'CLINICIAN', userId?: string, specialty?: 'PRIMARY_CARE', ...},
 *     inputDataConfig?: array{fhirServer?: array{fhirEndpoint?: string, oauthToken?: string, ...}, s3Sources?: list<array>, ...},
 *     outputDataConfig?: array{s3OutputPath?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPatientInsightsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPatientInsightsJobAsync(array{
 *     domainId?: string,
 *     patientContext?: array{patientId?: string, dateOfBirth?: string, pronouns?: 'HE_HIM'|'SHE_HER'|'THEY_THEM', ...},
 *     insightsContext?: array{insightsType?: 'PRE_VISIT', ...},
 *     encounterContext?: array{encounterReason?: string, ...},
 *     userContext?: array{role?: 'CLINICIAN', userId?: string, specialty?: 'PRIMARY_CARE', ...},
 *     inputDataConfig?: array{fhirServer?: array{fhirEndpoint?: string, oauthToken?: string, ...}, s3Sources?: list<array>, ...},
 *     outputDataConfig?: array{s3OutputPath?: string, ...},
 *     clientToken?: string,
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
class ConnectHealthClient extends AwsClient {}
