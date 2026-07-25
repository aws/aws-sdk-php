<?php
namespace Aws\Repostspace;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS re:Post Private** service.
 * @method \Aws\Result batchAddChannelRoleToAccessors(array $args = [])
 * @phpstan-method \Aws\Result batchAddChannelRoleToAccessors(array{
 *     spaceId?: string,
 *     channelId?: string,
 *     accessorIds?: list<string>,
 *     channelRole?: 'ASKER'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAddChannelRoleToAccessorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAddChannelRoleToAccessorsAsync(array{
 *     spaceId?: string,
 *     channelId?: string,
 *     accessorIds?: list<string>,
 *     channelRole?: 'ASKER'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchAddRole(array $args = [])
 * @phpstan-method \Aws\Result batchAddRole(array{
 *     spaceId?: string,
 *     accessorIds?: list<string>,
 *     role?: 'ADMINISTRATOR'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAddRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAddRoleAsync(array{
 *     spaceId?: string,
 *     accessorIds?: list<string>,
 *     role?: 'ADMINISTRATOR'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchRemoveChannelRoleFromAccessors(array $args = [])
 * @phpstan-method \Aws\Result batchRemoveChannelRoleFromAccessors(array{
 *     spaceId?: string,
 *     channelId?: string,
 *     accessorIds?: list<string>,
 *     channelRole?: 'ASKER'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchRemoveChannelRoleFromAccessorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchRemoveChannelRoleFromAccessorsAsync(array{
 *     spaceId?: string,
 *     channelId?: string,
 *     accessorIds?: list<string>,
 *     channelRole?: 'ASKER'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchRemoveRole(array $args = [])
 * @phpstan-method \Aws\Result batchRemoveRole(array{
 *     spaceId?: string,
 *     accessorIds?: list<string>,
 *     role?: 'ADMINISTRATOR'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchRemoveRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchRemoveRoleAsync(array{
 *     spaceId?: string,
 *     accessorIds?: list<string>,
 *     role?: 'ADMINISTRATOR'|'EXPERT'|'MODERATOR'|'SUPPORTREQUESTOR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{spaceId?: string, channelName?: string, channelDescription?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{spaceId?: string, channelName?: string, channelDescription?: string, ...} $args = [])
 * @method \Aws\Result createSpace(array $args = [])
 * @phpstan-method \Aws\Result createSpace(array{
 *     name?: string,
 *     subdomain?: string,
 *     tier?: 'BASIC'|'STANDARD',
 *     description?: string,
 *     userKMSKey?: string,
 *     tags?: array<string, string>,
 *     roleArn?: string,
 *     supportedEmailDomains?: array{enabled?: 'DISABLED'|'ENABLED', allowedDomains?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSpaceAsync(array{
 *     name?: string,
 *     subdomain?: string,
 *     tier?: 'BASIC'|'STANDARD',
 *     description?: string,
 *     userKMSKey?: string,
 *     tags?: array<string, string>,
 *     roleArn?: string,
 *     supportedEmailDomains?: array{enabled?: 'DISABLED'|'ENABLED', allowedDomains?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteSpace(array{spaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array{spaceId?: string, ...} $args = [])
 * @method \Aws\Result deregisterAdmin(array $args = [])
 * @phpstan-method \Aws\Result deregisterAdmin(array{spaceId?: string, adminId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterAdminAsync(array{spaceId?: string, adminId?: string, ...} $args = [])
 * @method \Aws\Result getChannel(array $args = [])
 * @phpstan-method \Aws\Result getChannel(array{spaceId?: string, channelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelAsync(array{spaceId?: string, channelId?: string, ...} $args = [])
 * @method \Aws\Result getSpace(array $args = [])
 * @phpstan-method \Aws\Result getSpace(array{spaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpaceAsync(array{spaceId?: string, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{spaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{spaceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSpaces(array $args = [])
 * @phpstan-method \Aws\Result listSpaces(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpacesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerAdmin(array $args = [])
 * @phpstan-method \Aws\Result registerAdmin(array{spaceId?: string, adminId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerAdminAsync(array{spaceId?: string, adminId?: string, ...} $args = [])
 * @method \Aws\Result sendInvites(array $args = [])
 * @phpstan-method \Aws\Result sendInvites(array{spaceId?: string, accessorIds?: list<string>, title?: string, body?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendInvitesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendInvitesAsync(array{spaceId?: string, accessorIds?: list<string>, title?: string, body?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @phpstan-method \Aws\Result updateChannel(array{spaceId?: string, channelId?: string, channelName?: string, channelDescription?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{spaceId?: string, channelId?: string, channelName?: string, channelDescription?: string, ...} $args = [])
 * @method \Aws\Result updateSpace(array $args = [])
 * @phpstan-method \Aws\Result updateSpace(array{
 *     spaceId?: string,
 *     description?: string,
 *     tier?: 'BASIC'|'STANDARD',
 *     roleArn?: string,
 *     supportedEmailDomains?: array{enabled?: 'DISABLED'|'ENABLED', allowedDomains?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpaceAsync(array{
 *     spaceId?: string,
 *     description?: string,
 *     tier?: 'BASIC'|'STANDARD',
 *     roleArn?: string,
 *     supportedEmailDomains?: array{enabled?: 'DISABLED'|'ENABLED', allowedDomains?: list<string>, ...},
 *     ...,
 * } $args = [])
 */
class RepostspaceClient extends AwsClient {}
