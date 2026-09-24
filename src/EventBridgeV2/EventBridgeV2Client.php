<?php
namespace Aws\EventBridgeV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EventBridgeV2** service.
 * @method \Aws\Result createEventBus(array $args = [])
 * @phpstan-method \Aws\Result createEventBus(array{
 *     Name?: string,
 *     Description?: string,
 *     EncryptionConfiguration?: array{KmsKeyIdentifier?: string, ...},
 *     StorageConfiguration?: array{RetentionPeriodInDays?: int, ...},
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventBusAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     EncryptionConfiguration?: array{KmsKeyIdentifier?: string, ...},
 *     StorageConfiguration?: array{RetentionPeriodInDays?: int, ...},
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventSource(array $args = [])
 * @phpstan-method \Aws\Result createEventSource(array{
 *     Name?: string,
 *     EventBusArn?: string,
 *     Configuration?: array{
 *         AwsServiceEventsConfiguration?: array{AwsService?: string, Pattern?: string, OnFailureConfiguration?: array, ...},
 *         PartnerEventsConfiguration?: array{
 *             PartnerEventSourceArn?: string,
 *             Pattern?: string,
 *             PartnerBusKmsKeyIdentifier?: string,
 *             OnFailureConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventSourceAsync(array{
 *     Name?: string,
 *     EventBusArn?: string,
 *     Configuration?: array{
 *         AwsServiceEventsConfiguration?: array{AwsService?: string, Pattern?: string, OnFailureConfiguration?: array, ...},
 *         PartnerEventsConfiguration?: array{
 *             PartnerEventSourceArn?: string,
 *             Pattern?: string,
 *             PartnerBusKmsKeyIdentifier?: string,
 *             OnFailureConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriber(array $args = [])
 * @phpstan-method \Aws\Result createSubscriber(array{
 *     Name?: string,
 *     EventBusArn?: string,
 *     InvokeConfiguration?: array{
 *         RoleArn?: string,
 *         LambdaParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Qualifier?: string,
 *             DurableExecutionName?: string,
 *             TenantId?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         SqsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             DelaySeconds?: string,
 *             MessageAttributes?: array<string, array>,
 *             MessageSystemAttributes?: array<string, array>,
 *             ...,
 *         },
 *         SnsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             Subject?: string,
 *             MessageStructure?: string,
 *             MessageAttributes?: array<string, array>,
 *             ...,
 *         },
 *         KinesisParameters?: array{PartitionKey?: string, ExplicitHashKey?: string, ...},
 *         StepFunctionsParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Name?: string,
 *             TraceHeader?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         HttpParameters?: array{
 *             PathParameterValues?: list<string>,
 *             HeaderParameters?: array<string, string>,
 *             QueryStringParameters?: array<string, string>,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         UniversalTargetParameters?: array{Input?: string, InvocationTimeoutSeconds?: string, ...},
 *         EventBusV2Parameters?: array{Metadata?: array<string, string>, SystemMetadata?: array, DeduplicationConfiguration?: array, ...},
 *         TargetArn?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     FilterConfiguration?: array{Language?: 'EVENT_BRIDGE_PATTERN', Filters?: list<array>, ...},
 *     Type?: 'FIFO'|'UNORDERED',
 *     StartingPosition?: 'LATEST'|'POINT_IN_TIME',
 *     PointInTimeConfiguration?: array{
 *         PointType?: 'HORIZON'|'TIMESTAMP',
 *         StartingPoint?: int|string|\DateTimeInterface,
 *         EndPoint?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     BatchConfiguration?: array{MaxBatchSize?: int, MaxBatchWindowInSeconds?: int, ...},
 *     Transformer?: array{Type?: 'JSONATA'|'RAW'|'WITH_METADATA', JsonataConfiguration?: array{Expression?: string, ...}, ...},
 *     RetryPolicy?: array{MaxRetryAttempts?: int, MaxEventAgeInSeconds?: int, RetryStrategy?: 'ALL', ...},
 *     OnFailureConfiguration?: array{Arn?: string, ...},
 *     LogConfiguration?: array{Level?: 'ERROR'|'INFO'|'OFF', IncludePayload?: 'FULL'|'ON_ERROR_ONLY', ...},
 *     State?: 'RUNNING'|'STOPPED',
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriberAsync(array{
 *     Name?: string,
 *     EventBusArn?: string,
 *     InvokeConfiguration?: array{
 *         RoleArn?: string,
 *         LambdaParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Qualifier?: string,
 *             DurableExecutionName?: string,
 *             TenantId?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         SqsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             DelaySeconds?: string,
 *             MessageAttributes?: array<string, array>,
 *             MessageSystemAttributes?: array<string, array>,
 *             ...,
 *         },
 *         SnsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             Subject?: string,
 *             MessageStructure?: string,
 *             MessageAttributes?: array<string, array>,
 *             ...,
 *         },
 *         KinesisParameters?: array{PartitionKey?: string, ExplicitHashKey?: string, ...},
 *         StepFunctionsParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Name?: string,
 *             TraceHeader?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         HttpParameters?: array{
 *             PathParameterValues?: list<string>,
 *             HeaderParameters?: array<string, string>,
 *             QueryStringParameters?: array<string, string>,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         UniversalTargetParameters?: array{Input?: string, InvocationTimeoutSeconds?: string, ...},
 *         EventBusV2Parameters?: array{Metadata?: array<string, string>, SystemMetadata?: array, DeduplicationConfiguration?: array, ...},
 *         TargetArn?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     FilterConfiguration?: array{Language?: 'EVENT_BRIDGE_PATTERN', Filters?: list<array>, ...},
 *     Type?: 'FIFO'|'UNORDERED',
 *     StartingPosition?: 'LATEST'|'POINT_IN_TIME',
 *     PointInTimeConfiguration?: array{
 *         PointType?: 'HORIZON'|'TIMESTAMP',
 *         StartingPoint?: int|string|\DateTimeInterface,
 *         EndPoint?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     BatchConfiguration?: array{MaxBatchSize?: int, MaxBatchWindowInSeconds?: int, ...},
 *     Transformer?: array{Type?: 'JSONATA'|'RAW'|'WITH_METADATA', JsonataConfiguration?: array{Expression?: string, ...}, ...},
 *     RetryPolicy?: array{MaxRetryAttempts?: int, MaxEventAgeInSeconds?: int, RetryStrategy?: 'ALL', ...},
 *     OnFailureConfiguration?: array{Arn?: string, ...},
 *     LogConfiguration?: array{Level?: 'ERROR'|'INFO'|'OFF', IncludePayload?: 'FULL'|'ON_ERROR_ONLY', ...},
 *     State?: 'RUNNING'|'STOPPED',
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEventBus(array $args = [])
 * @phpstan-method \Aws\Result deleteEventBus(array{EventBusArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventBusAsync(array{EventBusArn?: string, ...} $args = [])
 * @method \Aws\Result deleteEventSource(array $args = [])
 * @phpstan-method \Aws\Result deleteEventSource(array{EventSourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventSourceAsync(array{EventSourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, PolicyName?: string, ExpectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, PolicyName?: string, ExpectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteSubscriber(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriber(array{SubscriberArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriberAsync(array{SubscriberArn?: string, ...} $args = [])
 * @method \Aws\Result describeEventBus(array $args = [])
 * @phpstan-method \Aws\Result describeEventBus(array{EventBusArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventBusAsync(array{EventBusArn?: string, ...} $args = [])
 * @method \Aws\Result describeEventSource(array $args = [])
 * @phpstan-method \Aws\Result describeEventSource(array{EventSourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventSourceAsync(array{EventSourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeSubscriber(array $args = [])
 * @phpstan-method \Aws\Result describeSubscriber(array{SubscriberArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSubscriberAsync(array{SubscriberArn?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result listEventBuses(array $args = [])
 * @phpstan-method \Aws\Result listEventBuses(array{NamePrefix?: string, EventBusAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventBusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventBusesAsync(array{NamePrefix?: string, EventBusAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventSources(array $args = [])
 * @phpstan-method \Aws\Result listEventSources(array{EventBusArn?: string, NamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventSourcesAsync(array{EventBusArn?: string, NamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result listResourcePolicies(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcePoliciesAsync(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSubscribers(array $args = [])
 * @phpstan-method \Aws\Result listSubscribers(array{EventBusArn?: string, NamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscribersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscribersAsync(array{EventBusArn?: string, NamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putEvents(array $args = [])
 * @phpstan-method \Aws\Result putEvents(array{
 *     EventBusArn?: string,
 *     Entries?: list<array{
 *         Source?: string,
 *         DetailType?: string,
 *         Detail?: string,
 *         Resources?: list<string>,
 *         Time?: int|string|\DateTimeInterface,
 *         SystemMetadata?: array,
 *         ...,
 *     }>,
 *     DeduplicationConfiguration?: array{DeduplicationType?: 'CONTENT_BASED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventsAsync(array{
 *     EventBusArn?: string,
 *     Entries?: list<array{
 *         Source?: string,
 *         DetailType?: string,
 *         Detail?: string,
 *         Resources?: list<string>,
 *         Time?: int|string|\DateTimeInterface,
 *         SystemMetadata?: array,
 *         ...,
 *     }>,
 *     DeduplicationConfiguration?: array{DeduplicationType?: 'CONTENT_BASED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRawEvents(array $args = [])
 * @phpstan-method \Aws\Result putRawEvents(array{
 *     EventBusArn?: string,
 *     Entries?: list<array{
 *         Data?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Metadata?: array<string, string>,
 *         SystemMetadata?: array,
 *         ...,
 *     }>,
 *     SchemaRegistryConfiguration?: array{RegistryUri?: string, ConfluentPublicRegistryConfiguration?: array{ConnectionArn?: string, ...}, ...},
 *     DeduplicationConfiguration?: array{DeduplicationType?: 'CONTENT_BASED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRawEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRawEventsAsync(array{
 *     EventBusArn?: string,
 *     Entries?: list<array{
 *         Data?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Metadata?: array<string, string>,
 *         SystemMetadata?: array,
 *         ...,
 *     }>,
 *     SchemaRegistryConfiguration?: array{RegistryUri?: string, ConfluentPublicRegistryConfiguration?: array{ConnectionArn?: string, ...}, ...},
 *     DeduplicationConfiguration?: array{DeduplicationType?: 'CONTENT_BASED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, PolicyDocument?: string, PolicyName?: string, ExpectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, PolicyDocument?: string, PolicyName?: string, ExpectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result revokeResource(array $args = [])
 * @phpstan-method \Aws\Result revokeResource(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeResourceAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEventBus(array $args = [])
 * @phpstan-method \Aws\Result updateEventBus(array{
 *     EventBusArn?: string,
 *     Description?: string,
 *     EncryptionConfiguration?: array{KmsKeyIdentifier?: string, ...},
 *     StorageConfiguration?: array{RetentionPeriodInDays?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventBusAsync(array{
 *     EventBusArn?: string,
 *     Description?: string,
 *     EncryptionConfiguration?: array{KmsKeyIdentifier?: string, ...},
 *     StorageConfiguration?: array{RetentionPeriodInDays?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventSource(array $args = [])
 * @phpstan-method \Aws\Result updateEventSource(array{
 *     EventSourceArn?: string,
 *     Configuration?: array{
 *         AwsServiceEventsConfiguration?: array{AwsService?: string, Pattern?: string, OnFailureConfiguration?: array, ...},
 *         PartnerEventsConfiguration?: array{
 *             PartnerEventSourceArn?: string,
 *             Pattern?: string,
 *             PartnerBusKmsKeyIdentifier?: string,
 *             OnFailureConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventSourceAsync(array{
 *     EventSourceArn?: string,
 *     Configuration?: array{
 *         AwsServiceEventsConfiguration?: array{AwsService?: string, Pattern?: string, OnFailureConfiguration?: array, ...},
 *         PartnerEventsConfiguration?: array{
 *             PartnerEventSourceArn?: string,
 *             Pattern?: string,
 *             PartnerBusKmsKeyIdentifier?: string,
 *             OnFailureConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubscriber(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriber(array{
 *     SubscriberArn?: string,
 *     Description?: string,
 *     State?: 'RUNNING'|'STOPPED',
 *     ResumePosition?: 'LAST_PROCESSED'|'LATEST',
 *     InvokeConfiguration?: array{
 *         RoleArn?: string,
 *         LambdaParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Qualifier?: string,
 *             DurableExecutionName?: string,
 *             TenantId?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         SqsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             DelaySeconds?: string,
 *             MessageAttributes?: array<string, array>,
 *             MessageSystemAttributes?: array<string, array>,
 *             ...,
 *         },
 *         SnsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             Subject?: string,
 *             MessageStructure?: string,
 *             MessageAttributes?: array<string, array>,
 *             ...,
 *         },
 *         KinesisParameters?: array{PartitionKey?: string, ExplicitHashKey?: string, ...},
 *         StepFunctionsParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Name?: string,
 *             TraceHeader?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         HttpParameters?: array{
 *             PathParameterValues?: list<string>,
 *             HeaderParameters?: array<string, string>,
 *             QueryStringParameters?: array<string, string>,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         UniversalTargetParameters?: array{Input?: string, InvocationTimeoutSeconds?: string, ...},
 *         EventBusV2Parameters?: array{Metadata?: array<string, string>, SystemMetadata?: array, DeduplicationConfiguration?: array, ...},
 *         ...,
 *     },
 *     FilterConfiguration?: array{Language?: 'EVENT_BRIDGE_PATTERN', Filters?: list<array>, ...},
 *     BatchConfiguration?: array{MaxBatchSize?: int, MaxBatchWindowInSeconds?: int, ...},
 *     Transformer?: array{Type?: 'JSONATA'|'RAW'|'WITH_METADATA', JsonataConfiguration?: array{Expression?: string, ...}, ...},
 *     RetryPolicy?: array{MaxRetryAttempts?: int, MaxEventAgeInSeconds?: int, RetryStrategy?: 'ALL', ...},
 *     OnFailureConfiguration?: array{Arn?: string, ...},
 *     LogConfiguration?: array{Level?: 'ERROR'|'INFO'|'OFF', IncludePayload?: 'FULL'|'ON_ERROR_ONLY', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriberAsync(array{
 *     SubscriberArn?: string,
 *     Description?: string,
 *     State?: 'RUNNING'|'STOPPED',
 *     ResumePosition?: 'LAST_PROCESSED'|'LATEST',
 *     InvokeConfiguration?: array{
 *         RoleArn?: string,
 *         LambdaParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Qualifier?: string,
 *             DurableExecutionName?: string,
 *             TenantId?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         SqsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             DelaySeconds?: string,
 *             MessageAttributes?: array<string, array>,
 *             MessageSystemAttributes?: array<string, array>,
 *             ...,
 *         },
 *         SnsParameters?: array{
 *             MessageGroupId?: string,
 *             MessageDeduplicationId?: string,
 *             Subject?: string,
 *             MessageStructure?: string,
 *             MessageAttributes?: array<string, array>,
 *             ...,
 *         },
 *         KinesisParameters?: array{PartitionKey?: string, ExplicitHashKey?: string, ...},
 *         StepFunctionsParameters?: array{
 *             InvocationType?: 'EVENT'|'REQUEST_RESPONSE',
 *             Name?: string,
 *             TraceHeader?: string,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         HttpParameters?: array{
 *             PathParameterValues?: list<string>,
 *             HeaderParameters?: array<string, string>,
 *             QueryStringParameters?: array<string, string>,
 *             InvocationTimeoutSeconds?: string,
 *             ...,
 *         },
 *         UniversalTargetParameters?: array{Input?: string, InvocationTimeoutSeconds?: string, ...},
 *         EventBusV2Parameters?: array{Metadata?: array<string, string>, SystemMetadata?: array, DeduplicationConfiguration?: array, ...},
 *         ...,
 *     },
 *     FilterConfiguration?: array{Language?: 'EVENT_BRIDGE_PATTERN', Filters?: list<array>, ...},
 *     BatchConfiguration?: array{MaxBatchSize?: int, MaxBatchWindowInSeconds?: int, ...},
 *     Transformer?: array{Type?: 'JSONATA'|'RAW'|'WITH_METADATA', JsonataConfiguration?: array{Expression?: string, ...}, ...},
 *     RetryPolicy?: array{MaxRetryAttempts?: int, MaxEventAgeInSeconds?: int, RetryStrategy?: 'ALL', ...},
 *     OnFailureConfiguration?: array{Arn?: string, ...},
 *     LogConfiguration?: array{Level?: 'ERROR'|'INFO'|'OFF', IncludePayload?: 'FULL'|'ON_ERROR_ONLY', ...},
 *     ...,
 * } $args = [])
 */
class EventBridgeV2Client extends AwsClient {}
