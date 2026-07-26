<?php
namespace Aws\Route53Profiles;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Route 53 Profiles** service.
 * @method \Aws\Result associateProfile(array $args = [])
 * @phpstan-method \Aws\Result associateProfile(array{
 *     Name?: string,
 *     ProfileId?: string,
 *     ResourceId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateProfileAsync(array{
 *     Name?: string,
 *     ProfileId?: string,
 *     ResourceId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateResourceToProfile(array $args = [])
 * @phpstan-method \Aws\Result associateResourceToProfile(array{Name?: string, ProfileId?: string, ResourceArn?: string, ResourceProperties?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResourceToProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResourceToProfileAsync(array{Name?: string, ProfileId?: string, ResourceArn?: string, ResourceProperties?: string, ...} $args = [])
 * @method \Aws\Result createProfile(array $args = [])
 * @phpstan-method \Aws\Result createProfile(array{ClientToken?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfileAsync(array{ClientToken?: string, Name?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteProfile(array{ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfileAsync(array{ProfileId?: string, ...} $args = [])
 * @method \Aws\Result disassociateProfile(array $args = [])
 * @phpstan-method \Aws\Result disassociateProfile(array{ProfileId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateProfileAsync(array{ProfileId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateResourceFromProfile(array $args = [])
 * @phpstan-method \Aws\Result disassociateResourceFromProfile(array{ProfileId?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResourceFromProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResourceFromProfileAsync(array{ProfileId?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getProfile(array $args = [])
 * @phpstan-method \Aws\Result getProfile(array{ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileAsync(array{ProfileId?: string, ...} $args = [])
 * @method \Aws\Result getProfileAssociation(array $args = [])
 * @phpstan-method \Aws\Result getProfileAssociation(array{ProfileAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileAssociationAsync(array{ProfileAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getProfileResourceAssociation(array $args = [])
 * @phpstan-method \Aws\Result getProfileResourceAssociation(array{ProfileResourceAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileResourceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileResourceAssociationAsync(array{ProfileResourceAssociationId?: string, ...} $args = [])
 * @method \Aws\Result listProfileAssociations(array $args = [])
 * @phpstan-method \Aws\Result listProfileAssociations(array{MaxResults?: int, NextToken?: string, ProfileId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileAssociationsAsync(array{MaxResults?: int, NextToken?: string, ProfileId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result listProfileResourceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listProfileResourceAssociations(array{MaxResults?: int, NextToken?: string, ProfileId?: string, ResourceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileResourceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileResourceAssociationsAsync(array{MaxResults?: int, NextToken?: string, ProfileId?: string, ResourceType?: string, ...} $args = [])
 * @method \Aws\Result listProfiles(array $args = [])
 * @phpstan-method \Aws\Result listProfiles(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfilesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateProfileResourceAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateProfileResourceAssociation(array{Name?: string, ProfileResourceAssociationId?: string, ResourceProperties?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfileResourceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfileResourceAssociationAsync(array{Name?: string, ProfileResourceAssociationId?: string, ResourceProperties?: string, ...} $args = [])
 */
class Route53ProfilesClient extends AwsClient {}
