<?php
namespace Aws\NotificationsContacts;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS User Notifications Contacts** service.
 * @method \Aws\Result activateEmailContact(array $args = [])
 * @phpstan-method \Aws\Result activateEmailContact(array{arn?: string, code?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateEmailContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateEmailContactAsync(array{arn?: string, code?: string, ...} $args = [])
 * @method \Aws\Result createEmailContact(array $args = [])
 * @phpstan-method \Aws\Result createEmailContact(array{name?: string, emailAddress?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEmailContactAsync(array{name?: string, emailAddress?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteEmailContact(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailContact(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailContactAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getEmailContact(array $args = [])
 * @phpstan-method \Aws\Result getEmailContact(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailContactAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result listEmailContacts(array $args = [])
 * @phpstan-method \Aws\Result listEmailContacts(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEmailContactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEmailContactsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result sendActivationCode(array $args = [])
 * @phpstan-method \Aws\Result sendActivationCode(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendActivationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendActivationCodeAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class NotificationsContactsClient extends AwsClient {}
