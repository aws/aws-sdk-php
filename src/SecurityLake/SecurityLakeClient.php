<?php
namespace Aws\SecurityLake;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Security Lake** service.
 * @method \Aws\Result createAwsLogSource(array $args = [])
 * @phpstan-method \Aws\Result createAwsLogSource(array{
 *     sources?: list<array{
 *         accounts?: list<string>,
 *         regions?: list<string>,
 *         sourceName?: 'CLOUD_TRAIL_MGMT'|'EKS_AUDIT'|'LAMBDA_EXECUTION'|'ROUTE53'|'S3_DATA'|'SH_FINDINGS'|'VPC_FLOW'|'WAF',
 *         sourceVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAwsLogSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAwsLogSourceAsync(array{
 *     sources?: list<array{
 *         accounts?: list<string>,
 *         regions?: list<string>,
 *         sourceName?: 'CLOUD_TRAIL_MGMT'|'EKS_AUDIT'|'LAMBDA_EXECUTION'|'ROUTE53'|'S3_DATA'|'SH_FINDINGS'|'VPC_FLOW'|'WAF',
 *         sourceVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomLogSource(array $args = [])
 * @phpstan-method \Aws\Result createCustomLogSource(array{
 *     configuration?: array{
 *         crawlerConfiguration?: array{roleArn?: string, ...},
 *         providerIdentity?: array{externalId?: string, principal?: string, ...},
 *         ...,
 *     },
 *     eventClasses?: list<string>,
 *     sourceName?: string,
 *     sourceVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomLogSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomLogSourceAsync(array{
 *     configuration?: array{
 *         crawlerConfiguration?: array{roleArn?: string, ...},
 *         providerIdentity?: array{externalId?: string, principal?: string, ...},
 *         ...,
 *     },
 *     eventClasses?: list<string>,
 *     sourceName?: string,
 *     sourceVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataLake(array $args = [])
 * @phpstan-method \Aws\Result createDataLake(array{
 *     configurations?: list<array{
 *         encryptionConfiguration?: array,
 *         lifecycleConfiguration?: array,
 *         region?: string,
 *         replicationConfiguration?: array,
 *         ...,
 *     }>,
 *     metaStoreManagerRoleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataLakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataLakeAsync(array{
 *     configurations?: list<array{
 *         encryptionConfiguration?: array,
 *         lifecycleConfiguration?: array,
 *         region?: string,
 *         replicationConfiguration?: array,
 *         ...,
 *     }>,
 *     metaStoreManagerRoleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataLakeExceptionSubscription(array $args = [])
 * @phpstan-method \Aws\Result createDataLakeExceptionSubscription(array{exceptionTimeToLive?: int, notificationEndpoint?: string, subscriptionProtocol?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataLakeExceptionSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataLakeExceptionSubscriptionAsync(array{exceptionTimeToLive?: int, notificationEndpoint?: string, subscriptionProtocol?: string, ...} $args = [])
 * @method \Aws\Result createDataLakeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createDataLakeOrganizationConfiguration(array{autoEnableNewAccount?: list<array{region?: string, sources?: list<array>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataLakeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataLakeOrganizationConfigurationAsync(array{autoEnableNewAccount?: list<array{region?: string, sources?: list<array>, ...}>, ...} $args = [])
 * @method \Aws\Result createSubscriber(array $args = [])
 * @phpstan-method \Aws\Result createSubscriber(array{
 *     accessTypes?: list<'LAKEFORMATION'|'S3'>,
 *     sources?: list<array{awsLogSource?: array, customLogSource?: array, ...}>,
 *     subscriberDescription?: string,
 *     subscriberIdentity?: array{externalId?: string, principal?: string, ...},
 *     subscriberName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriberAsync(array{
 *     accessTypes?: list<'LAKEFORMATION'|'S3'>,
 *     sources?: list<array{awsLogSource?: array, customLogSource?: array, ...}>,
 *     subscriberDescription?: string,
 *     subscriberIdentity?: array{externalId?: string, principal?: string, ...},
 *     subscriberName?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriberNotification(array $args = [])
 * @phpstan-method \Aws\Result createSubscriberNotification(array{
 *     configuration?: array{
 *         httpsNotificationConfiguration?: array{
 *             authorizationApiKeyName?: string,
 *             authorizationApiKeyValue?: string,
 *             endpoint?: string,
 *             httpMethod?: 'POST'|'PUT',
 *             targetRoleArn?: string,
 *             ...,
 *         },
 *         sqsNotificationConfiguration?: array,
 *         ...,
 *     },
 *     subscriberId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriberNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriberNotificationAsync(array{
 *     configuration?: array{
 *         httpsNotificationConfiguration?: array{
 *             authorizationApiKeyName?: string,
 *             authorizationApiKeyValue?: string,
 *             endpoint?: string,
 *             httpMethod?: 'POST'|'PUT',
 *             targetRoleArn?: string,
 *             ...,
 *         },
 *         sqsNotificationConfiguration?: array,
 *         ...,
 *     },
 *     subscriberId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAwsLogSource(array $args = [])
 * @phpstan-method \Aws\Result deleteAwsLogSource(array{
 *     sources?: list<array{
 *         accounts?: list<string>,
 *         regions?: list<string>,
 *         sourceName?: 'CLOUD_TRAIL_MGMT'|'EKS_AUDIT'|'LAMBDA_EXECUTION'|'ROUTE53'|'S3_DATA'|'SH_FINDINGS'|'VPC_FLOW'|'WAF',
 *         sourceVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAwsLogSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAwsLogSourceAsync(array{
 *     sources?: list<array{
 *         accounts?: list<string>,
 *         regions?: list<string>,
 *         sourceName?: 'CLOUD_TRAIL_MGMT'|'EKS_AUDIT'|'LAMBDA_EXECUTION'|'ROUTE53'|'S3_DATA'|'SH_FINDINGS'|'VPC_FLOW'|'WAF',
 *         sourceVersion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCustomLogSource(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomLogSource(array{sourceName?: string, sourceVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomLogSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomLogSourceAsync(array{sourceName?: string, sourceVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteDataLake(array $args = [])
 * @phpstan-method \Aws\Result deleteDataLake(array{regions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataLakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataLakeAsync(array{regions?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteDataLakeExceptionSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteDataLakeExceptionSubscription(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataLakeExceptionSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataLakeExceptionSubscriptionAsync(array{...} $args = [])
 * @method \Aws\Result deleteDataLakeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteDataLakeOrganizationConfiguration(array{autoEnableNewAccount?: list<array{region?: string, sources?: list<array>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataLakeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataLakeOrganizationConfigurationAsync(array{autoEnableNewAccount?: list<array{region?: string, sources?: list<array>, ...}>, ...} $args = [])
 * @method \Aws\Result deleteSubscriber(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriber(array{subscriberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriberAsync(array{subscriberId?: string, ...} $args = [])
 * @method \Aws\Result deleteSubscriberNotification(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriberNotification(array{subscriberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriberNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriberNotificationAsync(array{subscriberId?: string, ...} $args = [])
 * @method \Aws\Result deregisterDataLakeDelegatedAdministrator(array $args = [])
 * @phpstan-method \Aws\Result deregisterDataLakeDelegatedAdministrator(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterDataLakeDelegatedAdministratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterDataLakeDelegatedAdministratorAsync(array{...} $args = [])
 * @method \Aws\Result getDataLakeExceptionSubscription(array $args = [])
 * @phpstan-method \Aws\Result getDataLakeExceptionSubscription(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataLakeExceptionSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataLakeExceptionSubscriptionAsync(array{...} $args = [])
 * @method \Aws\Result getDataLakeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getDataLakeOrganizationConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataLakeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataLakeOrganizationConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getDataLakeSources(array $args = [])
 * @phpstan-method \Aws\Result getDataLakeSources(array{accounts?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataLakeSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataLakeSourcesAsync(array{accounts?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getSubscriber(array $args = [])
 * @phpstan-method \Aws\Result getSubscriber(array{subscriberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriberAsync(array{subscriberId?: string, ...} $args = [])
 * @method \Aws\Result listDataLakeExceptions(array $args = [])
 * @phpstan-method \Aws\Result listDataLakeExceptions(array{maxResults?: int, nextToken?: string, regions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataLakeExceptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataLakeExceptionsAsync(array{maxResults?: int, nextToken?: string, regions?: list<string>, ...} $args = [])
 * @method \Aws\Result listDataLakes(array $args = [])
 * @phpstan-method \Aws\Result listDataLakes(array{regions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataLakesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataLakesAsync(array{regions?: list<string>, ...} $args = [])
 * @method \Aws\Result listLogSources(array $args = [])
 * @phpstan-method \Aws\Result listLogSources(array{
 *     accounts?: list<string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     regions?: list<string>,
 *     sources?: list<array{awsLogSource?: array, customLogSource?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLogSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLogSourcesAsync(array{
 *     accounts?: list<string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     regions?: list<string>,
 *     sources?: list<array{awsLogSource?: array, customLogSource?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSubscribers(array $args = [])
 * @phpstan-method \Aws\Result listSubscribers(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscribersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscribersAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerDataLakeDelegatedAdministrator(array $args = [])
 * @phpstan-method \Aws\Result registerDataLakeDelegatedAdministrator(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDataLakeDelegatedAdministratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDataLakeDelegatedAdministratorAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDataLake(array $args = [])
 * @phpstan-method \Aws\Result updateDataLake(array{
 *     configurations?: list<array{
 *         encryptionConfiguration?: array,
 *         lifecycleConfiguration?: array,
 *         region?: string,
 *         replicationConfiguration?: array,
 *         ...,
 *     }>,
 *     metaStoreManagerRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataLakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataLakeAsync(array{
 *     configurations?: list<array{
 *         encryptionConfiguration?: array,
 *         lifecycleConfiguration?: array,
 *         region?: string,
 *         replicationConfiguration?: array,
 *         ...,
 *     }>,
 *     metaStoreManagerRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataLakeExceptionSubscription(array $args = [])
 * @phpstan-method \Aws\Result updateDataLakeExceptionSubscription(array{exceptionTimeToLive?: int, notificationEndpoint?: string, subscriptionProtocol?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataLakeExceptionSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataLakeExceptionSubscriptionAsync(array{exceptionTimeToLive?: int, notificationEndpoint?: string, subscriptionProtocol?: string, ...} $args = [])
 * @method \Aws\Result updateSubscriber(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriber(array{
 *     sources?: list<array{awsLogSource?: array, customLogSource?: array, ...}>,
 *     subscriberDescription?: string,
 *     subscriberId?: string,
 *     subscriberIdentity?: array{externalId?: string, principal?: string, ...},
 *     subscriberName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriberAsync(array{
 *     sources?: list<array{awsLogSource?: array, customLogSource?: array, ...}>,
 *     subscriberDescription?: string,
 *     subscriberId?: string,
 *     subscriberIdentity?: array{externalId?: string, principal?: string, ...},
 *     subscriberName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubscriberNotification(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriberNotification(array{
 *     configuration?: array{
 *         httpsNotificationConfiguration?: array{
 *             authorizationApiKeyName?: string,
 *             authorizationApiKeyValue?: string,
 *             endpoint?: string,
 *             httpMethod?: 'POST'|'PUT',
 *             targetRoleArn?: string,
 *             ...,
 *         },
 *         sqsNotificationConfiguration?: array,
 *         ...,
 *     },
 *     subscriberId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriberNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriberNotificationAsync(array{
 *     configuration?: array{
 *         httpsNotificationConfiguration?: array{
 *             authorizationApiKeyName?: string,
 *             authorizationApiKeyValue?: string,
 *             endpoint?: string,
 *             httpMethod?: 'POST'|'PUT',
 *             targetRoleArn?: string,
 *             ...,
 *         },
 *         sqsNotificationConfiguration?: array,
 *         ...,
 *     },
 *     subscriberId?: string,
 *     ...,
 * } $args = [])
 */
class SecurityLakeClient extends AwsClient {}
