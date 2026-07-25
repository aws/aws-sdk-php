<?php
namespace Aws\Sqs;

use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Sqs\Exception\SqsException;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;
use Psr\Http\Message\RequestInterface;

/**
 * Client used to interact with **Amazon Simple Queue Service (Amazon SQS)**.
 *
 * @method \Aws\Result addPermission(array $args = [])
 * @phpstan-method \Aws\Result addPermission(array{QueueUrl?: string, Label?: string, AWSAccountIds?: list<string>, Actions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addPermissionAsync(array{QueueUrl?: string, Label?: string, AWSAccountIds?: list<string>, Actions?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelMessageMoveTask(array $args = [])
 * @phpstan-method \Aws\Result cancelMessageMoveTask(array{TaskHandle?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMessageMoveTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMessageMoveTaskAsync(array{TaskHandle?: string, ...} $args = [])
 * @method \Aws\Result changeMessageVisibility(array $args = [])
 * @phpstan-method \Aws\Result changeMessageVisibility(array{QueueUrl?: string, ReceiptHandle?: string, VisibilityTimeout?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise changeMessageVisibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changeMessageVisibilityAsync(array{QueueUrl?: string, ReceiptHandle?: string, VisibilityTimeout?: int, ...} $args = [])
 * @method \Aws\Result changeMessageVisibilityBatch(array $args = [])
 * @phpstan-method \Aws\Result changeMessageVisibilityBatch(array{
 *     QueueUrl?: string,
 *     Entries?: list<array{Id?: string, ReceiptHandle?: string, VisibilityTimeout?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise changeMessageVisibilityBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changeMessageVisibilityBatchAsync(array{
 *     QueueUrl?: string,
 *     Entries?: list<array{Id?: string, ReceiptHandle?: string, VisibilityTimeout?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueue(array $args = [])
 * @phpstan-method \Aws\Result createQueue(array{QueueName?: string, Attributes?: array<string, string>, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueAsync(array{QueueName?: string, Attributes?: array<string, string>, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteMessage(array $args = [])
 * @phpstan-method \Aws\Result deleteMessage(array{QueueUrl?: string, ReceiptHandle?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMessageAsync(array{QueueUrl?: string, ReceiptHandle?: string, ...} $args = [])
 * @method \Aws\Result deleteMessageBatch(array $args = [])
 * @phpstan-method \Aws\Result deleteMessageBatch(array{QueueUrl?: string, Entries?: list<array{Id?: string, ReceiptHandle?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMessageBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMessageBatchAsync(array{QueueUrl?: string, Entries?: list<array{Id?: string, ReceiptHandle?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteQueue(array $args = [])
 * @phpstan-method \Aws\Result deleteQueue(array{QueueUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueAsync(array{QueueUrl?: string, ...} $args = [])
 * @method \Aws\Result getQueueAttributes(array $args = [])
 * @phpstan-method \Aws\Result getQueueAttributes(array{
 *     QueueUrl?: string,
 *     AttributeNames?: list<'All'|'ApproximateNumberOfMessages'|'ApproximateNumberOfMessagesDelayed'|'ApproximateNumberOfMessagesNotVisible'|'ContentBasedDeduplication'|'CreatedTimestamp'|'DeduplicationScope'|'DelaySeconds'|'FifoQueue'|'FifoThroughputLimit'|'KmsDataKeyReusePeriodSeconds'|'KmsMasterKeyId'|'LastModifiedTimestamp'|'MaximumMessageSize'|'MessageRetentionPeriod'|'Policy'|'QueueArn'|'ReceiveMessageWaitTimeSeconds'|'RedriveAllowPolicy'|'RedrivePolicy'|'SqsManagedSseEnabled'|'VisibilityTimeout'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueAttributesAsync(array{
 *     QueueUrl?: string,
 *     AttributeNames?: list<'All'|'ApproximateNumberOfMessages'|'ApproximateNumberOfMessagesDelayed'|'ApproximateNumberOfMessagesNotVisible'|'ContentBasedDeduplication'|'CreatedTimestamp'|'DeduplicationScope'|'DelaySeconds'|'FifoQueue'|'FifoThroughputLimit'|'KmsDataKeyReusePeriodSeconds'|'KmsMasterKeyId'|'LastModifiedTimestamp'|'MaximumMessageSize'|'MessageRetentionPeriod'|'Policy'|'QueueArn'|'ReceiveMessageWaitTimeSeconds'|'RedriveAllowPolicy'|'RedrivePolicy'|'SqsManagedSseEnabled'|'VisibilityTimeout'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getQueueUrl(array $args = [])
 * @phpstan-method \Aws\Result getQueueUrl(array{QueueName?: string, QueueOwnerAWSAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueUrlAsync(array{QueueName?: string, QueueOwnerAWSAccountId?: string, ...} $args = [])
 * @method \Aws\Result listDeadLetterSourceQueues(array $args = [])
 * @phpstan-method \Aws\Result listDeadLetterSourceQueues(array{QueueUrl?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeadLetterSourceQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeadLetterSourceQueuesAsync(array{QueueUrl?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMessageMoveTasks(array $args = [])
 * @phpstan-method \Aws\Result listMessageMoveTasks(array{SourceArn?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMessageMoveTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMessageMoveTasksAsync(array{SourceArn?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueueTags(array $args = [])
 * @phpstan-method \Aws\Result listQueueTags(array{QueueUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueueTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueueTagsAsync(array{QueueUrl?: string, ...} $args = [])
 * @method \Aws\Result listQueues(array $args = [])
 * @phpstan-method \Aws\Result listQueues(array{QueueNamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueuesAsync(array{QueueNamePrefix?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result purgeQueue(array $args = [])
 * @phpstan-method \Aws\Result purgeQueue(array{QueueUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise purgeQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purgeQueueAsync(array{QueueUrl?: string, ...} $args = [])
 * @method \Aws\Result receiveMessage(array $args = [])
 * @phpstan-method \Aws\Result receiveMessage(array{
 *     QueueUrl?: string,
 *     AttributeNames?: list<'All'|'ApproximateNumberOfMessages'|'ApproximateNumberOfMessagesDelayed'|'ApproximateNumberOfMessagesNotVisible'|'ContentBasedDeduplication'|'CreatedTimestamp'|'DeduplicationScope'|'DelaySeconds'|'FifoQueue'|'FifoThroughputLimit'|'KmsDataKeyReusePeriodSeconds'|'KmsMasterKeyId'|'LastModifiedTimestamp'|'MaximumMessageSize'|'MessageRetentionPeriod'|'Policy'|'QueueArn'|'ReceiveMessageWaitTimeSeconds'|'RedriveAllowPolicy'|'RedrivePolicy'|'SqsManagedSseEnabled'|'VisibilityTimeout'>,
 *     MessageSystemAttributeNames?: list<'AWSTraceHeader'|'All'|'ApproximateFirstReceiveTimestamp'|'ApproximateReceiveCount'|'DeadLetterQueueSourceArn'|'MessageDeduplicationId'|'MessageGroupId'|'SenderId'|'SentTimestamp'|'SequenceNumber'>,
 *     MessageAttributeNames?: list<string>,
 *     MaxNumberOfMessages?: int,
 *     VisibilityTimeout?: int,
 *     WaitTimeSeconds?: int,
 *     ReceiveRequestAttemptId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise receiveMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise receiveMessageAsync(array{
 *     QueueUrl?: string,
 *     AttributeNames?: list<'All'|'ApproximateNumberOfMessages'|'ApproximateNumberOfMessagesDelayed'|'ApproximateNumberOfMessagesNotVisible'|'ContentBasedDeduplication'|'CreatedTimestamp'|'DeduplicationScope'|'DelaySeconds'|'FifoQueue'|'FifoThroughputLimit'|'KmsDataKeyReusePeriodSeconds'|'KmsMasterKeyId'|'LastModifiedTimestamp'|'MaximumMessageSize'|'MessageRetentionPeriod'|'Policy'|'QueueArn'|'ReceiveMessageWaitTimeSeconds'|'RedriveAllowPolicy'|'RedrivePolicy'|'SqsManagedSseEnabled'|'VisibilityTimeout'>,
 *     MessageSystemAttributeNames?: list<'AWSTraceHeader'|'All'|'ApproximateFirstReceiveTimestamp'|'ApproximateReceiveCount'|'DeadLetterQueueSourceArn'|'MessageDeduplicationId'|'MessageGroupId'|'SenderId'|'SentTimestamp'|'SequenceNumber'>,
 *     MessageAttributeNames?: list<string>,
 *     MaxNumberOfMessages?: int,
 *     VisibilityTimeout?: int,
 *     WaitTimeSeconds?: int,
 *     ReceiveRequestAttemptId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removePermission(array $args = [])
 * @phpstan-method \Aws\Result removePermission(array{QueueUrl?: string, Label?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removePermissionAsync(array{QueueUrl?: string, Label?: string, ...} $args = [])
 * @method \Aws\Result sendMessage(array $args = [])
 * @phpstan-method \Aws\Result sendMessage(array{
 *     QueueUrl?: string,
 *     MessageBody?: string,
 *     DelaySeconds?: int,
 *     MessageAttributes?: array<string, array{
 *         StringValue?: string,
 *         BinaryValue?: string|resource|\Psr\Http\Message\StreamInterface,
 *         StringListValues?: list<string>,
 *         BinaryListValues?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         DataType?: string,
 *         ...,
 *     }>,
 *     MessageSystemAttributes?: array<string, array{
 *         StringValue?: string,
 *         BinaryValue?: string|resource|\Psr\Http\Message\StreamInterface,
 *         StringListValues?: list<string>,
 *         BinaryListValues?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         DataType?: string,
 *         ...,
 *     }>,
 *     MessageDeduplicationId?: string,
 *     MessageGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendMessageAsync(array{
 *     QueueUrl?: string,
 *     MessageBody?: string,
 *     DelaySeconds?: int,
 *     MessageAttributes?: array<string, array{
 *         StringValue?: string,
 *         BinaryValue?: string|resource|\Psr\Http\Message\StreamInterface,
 *         StringListValues?: list<string>,
 *         BinaryListValues?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         DataType?: string,
 *         ...,
 *     }>,
 *     MessageSystemAttributes?: array<string, array{
 *         StringValue?: string,
 *         BinaryValue?: string|resource|\Psr\Http\Message\StreamInterface,
 *         StringListValues?: list<string>,
 *         BinaryListValues?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *         DataType?: string,
 *         ...,
 *     }>,
 *     MessageDeduplicationId?: string,
 *     MessageGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendMessageBatch(array $args = [])
 * @phpstan-method \Aws\Result sendMessageBatch(array{
 *     QueueUrl?: string,
 *     Entries?: list<array{
 *         Id?: string,
 *         MessageBody?: string,
 *         DelaySeconds?: int,
 *         MessageAttributes?: array<string, array>,
 *         MessageSystemAttributes?: array<string, array>,
 *         MessageDeduplicationId?: string,
 *         MessageGroupId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendMessageBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendMessageBatchAsync(array{
 *     QueueUrl?: string,
 *     Entries?: list<array{
 *         Id?: string,
 *         MessageBody?: string,
 *         DelaySeconds?: int,
 *         MessageAttributes?: array<string, array>,
 *         MessageSystemAttributes?: array<string, array>,
 *         MessageDeduplicationId?: string,
 *         MessageGroupId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setQueueAttributes(array $args = [])
 * @phpstan-method \Aws\Result setQueueAttributes(array{QueueUrl?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setQueueAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setQueueAttributesAsync(array{QueueUrl?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result startMessageMoveTask(array $args = [])
 * @phpstan-method \Aws\Result startMessageMoveTask(array{SourceArn?: string, DestinationArn?: string, MaxNumberOfMessagesPerSecond?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMessageMoveTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMessageMoveTaskAsync(array{SourceArn?: string, DestinationArn?: string, MaxNumberOfMessagesPerSecond?: int, ...} $args = [])
 * @method \Aws\Result tagQueue(array $args = [])
 * @phpstan-method \Aws\Result tagQueue(array{QueueUrl?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagQueueAsync(array{QueueUrl?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagQueue(array $args = [])
 * @phpstan-method \Aws\Result untagQueue(array{QueueUrl?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagQueueAsync(array{QueueUrl?: string, TagKeys?: list<string>, ...} $args = [])
 */
class SqsClient extends AwsClient
{
    public function __construct(array $config)
    {
        parent::__construct($config);
        $list = $this->getHandlerList();
        $list->appendSign($this->validateMd5(), 'sqs.md5');
    }

    /**
     * Converts a queue URL into a queue ARN.
     *
     * @param string $queueUrl The queue URL to perform the action on.
     *                         Retrieved when the queue is first created.
     *
     * @return string An ARN representation of the queue URL.
     */
    public function getQueueArn($queueUrl)
    {
        $queueArn = strtr($queueUrl, [
            'http://'        => 'arn:aws:',
            'https://'       => 'arn:aws:',
            '.amazonaws.com' => '',
            '/'              => ':',
            '.'              => ':',
        ]);

        // Cope with SQS' .fifo / :fifo arn inconsistency
        if (substr($queueArn, -5) === ':fifo') {
            $queueArn = substr_replace($queueArn, '.fifo', -5);
        }
        return $queueArn;
    }

    /**
     * Calculates the expected md5 hash of message attributes according to the encoding
     * scheme detailed in SQS documentation.
     *
     * @param array $message Message containing attributes for validation.
     *                       Retrieved when using MessageAttributeNames on
     *                       ReceiveMessage.
     *
     * @return string|null The md5 hash of the message attributes according to
     *                     the encoding scheme. Returns null when there are no
     *                     attributes.
     * @link http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-message-attributes.html#message-attributes-items-validation
     */
    private static function calculateMessageAttributesMd5($message)
    {
        if (empty($message['MessageAttributes'])
            || !is_array($message['MessageAttributes'])
        ) {
            return null;
        }

        ksort($message['MessageAttributes']);
        $attributeValues = "";
        foreach ($message['MessageAttributes'] as $name => $details) {
            $attributeValues .= self::getEncodedStringPiece($name);
            $attributeValues .= self::getEncodedStringPiece($details['DataType']);
            if (substr($details['DataType'], 0, 6) === 'Binary') {
                $attributeValues .= pack('c', 0x02);
                $attributeValues .= self::getEncodedBinaryPiece(
                    $details['BinaryValue']
                );
            } else {
                $attributeValues .= pack('c', 0x01);
                $attributeValues .= self::getEncodedStringPiece(
                    $details['StringValue']
                );
            }
        }

        return md5($attributeValues);
    }

    private static function calculateBodyMd5($message)
    {
        return md5($message['Body']);
    }

    private static function getEncodedStringPiece($piece)
    {
        $utf8Piece = iconv(
            mb_detect_encoding($piece, mb_detect_order(), true),
            "UTF-8",
            $piece
        );
        return self::getFourBytePieceLength($utf8Piece) . $utf8Piece;
    }

    private static function getEncodedBinaryPiece($piece)
    {
        return self::getFourBytePieceLength($piece) . $piece;
    }

    private static function getFourBytePieceLength($piece)
    {
        return pack('N', (int)strlen($piece));
    }

    /**
     * Validates ReceiveMessage body and message attribute MD5s.
     *
     * @return callable
     */
    private function validateMd5()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $c,
                ?RequestInterface $r = null
            ) use ($handler) {
                if ($c->getName() !== 'ReceiveMessage') {
                    return $handler($c, $r);
                }

                return $handler($c, $r)
                    ->then(
                        function ($result) use ($c, $r) {
                            foreach ((array) $result['Messages'] as $msg) {
                                $bodyMd5 = self::calculateBodyMd5($msg);
                                if (isset($msg['MD5OfBody'])
                                    && $bodyMd5 !== $msg['MD5OfBody']
                                ) {
                                    throw new SqsException(
                                        sprintf(
                                            'MD5 mismatch. Expected %s, found %s',
                                            $msg['MD5OfBody'],
                                            $bodyMd5
                                        ),
                                        $c,
                                        [
                                            'code' => 'ClientChecksumMismatch',
                                            'request' => $r
                                        ]
                                    );
                                }

                                if (isset($msg['MD5OfMessageAttributes'])) {
                                    $messageAttributesMd5 = self::calculateMessageAttributesMd5($msg);
                                    if ($messageAttributesMd5 !== $msg['MD5OfMessageAttributes']) {
                                        throw new SqsException(
                                            sprintf(
                                                'Attribute MD5 mismatch. Expected %s, found %s',
                                                $msg['MD5OfMessageAttributes'],
                                                $messageAttributesMd5
                                                    ? $messageAttributesMd5
                                                    : 'No Attributes'
                                            ),
                                            $c,
                                            [
                                                'code' => 'ClientChecksumMismatch',
                                                'request' => $r
                                            ]
                                        );
                                    }
                                } else if (!empty($msg['MessageAttributes'])) {
                                    throw new SqsException(
                                        sprintf(
                                            'No Attribute MD5 found. Expected %s',
                                            self::calculateMessageAttributesMd5($msg)
                                        ),
                                        $c,
                                        [
                                            'code' => 'ClientChecksumMismatch',
                                            'request' => $r
                                        ]
                                    );
                                }
                            }
                            return $result;
                        }
                    );
            };
        };
    }
}
