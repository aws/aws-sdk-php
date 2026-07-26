<?php
namespace Aws\ManagedBlockchain;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Managed Blockchain** service.
 * @method \Aws\Result createAccessor(array $args = [])
 * @phpstan-method \Aws\Result createAccessor(array{
 *     ClientRequestToken?: string,
 *     AccessorType?: 'BILLING_TOKEN',
 *     Tags?: array<string, string>,
 *     NetworkType?: 'ETHEREUM_GOERLI'|'ETHEREUM_MAINNET'|'ETHEREUM_MAINNET_AND_GOERLI'|'POLYGON_MAINNET'|'POLYGON_MUMBAI',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessorAsync(array{
 *     ClientRequestToken?: string,
 *     AccessorType?: 'BILLING_TOKEN',
 *     Tags?: array<string, string>,
 *     NetworkType?: 'ETHEREUM_GOERLI'|'ETHEREUM_MAINNET'|'ETHEREUM_MAINNET_AND_GOERLI'|'POLYGON_MAINNET'|'POLYGON_MUMBAI',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMember(array $args = [])
 * @phpstan-method \Aws\Result createMember(array{
 *     ClientRequestToken?: string,
 *     InvitationId?: string,
 *     NetworkId?: string,
 *     MemberConfiguration?: array{
 *         Name?: string,
 *         Description?: string,
 *         FrameworkConfiguration?: array{Fabric?: array, ...},
 *         LogPublishingConfiguration?: array{Fabric?: array, ...},
 *         Tags?: array<string, string>,
 *         KmsKeyArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMemberAsync(array{
 *     ClientRequestToken?: string,
 *     InvitationId?: string,
 *     NetworkId?: string,
 *     MemberConfiguration?: array{
 *         Name?: string,
 *         Description?: string,
 *         FrameworkConfiguration?: array{Fabric?: array, ...},
 *         LogPublishingConfiguration?: array{Fabric?: array, ...},
 *         Tags?: array<string, string>,
 *         KmsKeyArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNetwork(array $args = [])
 * @phpstan-method \Aws\Result createNetwork(array{
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Framework?: 'ETHEREUM'|'HYPERLEDGER_FABRIC',
 *     FrameworkVersion?: string,
 *     FrameworkConfiguration?: array{Fabric?: array{Edition?: 'STANDARD'|'STARTER', ...}, ...},
 *     VotingPolicy?: array{
 *         ApprovalThresholdPolicy?: array{
 *             ThresholdPercentage?: int,
 *             ProposalDurationInHours?: int,
 *             ThresholdComparator?: 'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     MemberConfiguration?: array{
 *         Name?: string,
 *         Description?: string,
 *         FrameworkConfiguration?: array{Fabric?: array, ...},
 *         LogPublishingConfiguration?: array{Fabric?: array, ...},
 *         Tags?: array<string, string>,
 *         KmsKeyArn?: string,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkAsync(array{
 *     ClientRequestToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Framework?: 'ETHEREUM'|'HYPERLEDGER_FABRIC',
 *     FrameworkVersion?: string,
 *     FrameworkConfiguration?: array{Fabric?: array{Edition?: 'STANDARD'|'STARTER', ...}, ...},
 *     VotingPolicy?: array{
 *         ApprovalThresholdPolicy?: array{
 *             ThresholdPercentage?: int,
 *             ProposalDurationInHours?: int,
 *             ThresholdComparator?: 'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     MemberConfiguration?: array{
 *         Name?: string,
 *         Description?: string,
 *         FrameworkConfiguration?: array{Fabric?: array, ...},
 *         LogPublishingConfiguration?: array{Fabric?: array, ...},
 *         Tags?: array<string, string>,
 *         KmsKeyArn?: string,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNode(array $args = [])
 * @phpstan-method \Aws\Result createNode(array{
 *     ClientRequestToken?: string,
 *     NetworkId?: string,
 *     MemberId?: string,
 *     NodeConfiguration?: array{
 *         InstanceType?: string,
 *         AvailabilityZone?: string,
 *         LogPublishingConfiguration?: array{Fabric?: array, ...},
 *         StateDB?: 'CouchDB'|'LevelDB',
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNodeAsync(array{
 *     ClientRequestToken?: string,
 *     NetworkId?: string,
 *     MemberId?: string,
 *     NodeConfiguration?: array{
 *         InstanceType?: string,
 *         AvailabilityZone?: string,
 *         LogPublishingConfiguration?: array{Fabric?: array, ...},
 *         StateDB?: 'CouchDB'|'LevelDB',
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProposal(array $args = [])
 * @phpstan-method \Aws\Result createProposal(array{
 *     ClientRequestToken?: string,
 *     NetworkId?: string,
 *     MemberId?: string,
 *     Actions?: array{Invitations?: list<array>, Removals?: list<array>, ...},
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProposalAsync(array{
 *     ClientRequestToken?: string,
 *     NetworkId?: string,
 *     MemberId?: string,
 *     Actions?: array{Invitations?: list<array>, Removals?: list<array>, ...},
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessor(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessor(array{AccessorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessorAsync(array{AccessorId?: string, ...} $args = [])
 * @method \Aws\Result deleteMember(array $args = [])
 * @phpstan-method \Aws\Result deleteMember(array{NetworkId?: string, MemberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMemberAsync(array{NetworkId?: string, MemberId?: string, ...} $args = [])
 * @method \Aws\Result deleteNode(array $args = [])
 * @phpstan-method \Aws\Result deleteNode(array{NetworkId?: string, MemberId?: string, NodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNodeAsync(array{NetworkId?: string, MemberId?: string, NodeId?: string, ...} $args = [])
 * @method \Aws\Result getAccessor(array $args = [])
 * @phpstan-method \Aws\Result getAccessor(array{AccessorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessorAsync(array{AccessorId?: string, ...} $args = [])
 * @method \Aws\Result getMember(array $args = [])
 * @phpstan-method \Aws\Result getMember(array{NetworkId?: string, MemberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemberAsync(array{NetworkId?: string, MemberId?: string, ...} $args = [])
 * @method \Aws\Result getNetwork(array $args = [])
 * @phpstan-method \Aws\Result getNetwork(array{NetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkAsync(array{NetworkId?: string, ...} $args = [])
 * @method \Aws\Result getNode(array $args = [])
 * @phpstan-method \Aws\Result getNode(array{NetworkId?: string, MemberId?: string, NodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNodeAsync(array{NetworkId?: string, MemberId?: string, NodeId?: string, ...} $args = [])
 * @method \Aws\Result getProposal(array $args = [])
 * @phpstan-method \Aws\Result getProposal(array{NetworkId?: string, ProposalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProposalAsync(array{NetworkId?: string, ProposalId?: string, ...} $args = [])
 * @method \Aws\Result listAccessors(array $args = [])
 * @phpstan-method \Aws\Result listAccessors(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NetworkType?: 'ETHEREUM_GOERLI'|'ETHEREUM_MAINNET'|'ETHEREUM_MAINNET_AND_GOERLI'|'POLYGON_MAINNET'|'POLYGON_MUMBAI',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessorsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NetworkType?: 'ETHEREUM_GOERLI'|'ETHEREUM_MAINNET'|'ETHEREUM_MAINNET_AND_GOERLI'|'POLYGON_MAINNET'|'POLYGON_MUMBAI',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInvitations(array $args = [])
 * @phpstan-method \Aws\Result listInvitations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvitationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @phpstan-method \Aws\Result listMembers(array{
 *     NetworkId?: string,
 *     Name?: string,
 *     Status?: 'AVAILABLE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'|'INACCESSIBLE_ENCRYPTION_KEY'|'UPDATING',
 *     IsOwned?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersAsync(array{
 *     NetworkId?: string,
 *     Name?: string,
 *     Status?: 'AVAILABLE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'|'INACCESSIBLE_ENCRYPTION_KEY'|'UPDATING',
 *     IsOwned?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworks(array $args = [])
 * @phpstan-method \Aws\Result listNetworks(array{
 *     Name?: string,
 *     Framework?: 'ETHEREUM'|'HYPERLEDGER_FABRIC',
 *     Status?: 'AVAILABLE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworksAsync(array{
 *     Name?: string,
 *     Framework?: 'ETHEREUM'|'HYPERLEDGER_FABRIC',
 *     Status?: 'AVAILABLE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNodes(array $args = [])
 * @phpstan-method \Aws\Result listNodes(array{
 *     NetworkId?: string,
 *     MemberId?: string,
 *     Status?: 'AVAILABLE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'|'FAILED'|'INACCESSIBLE_ENCRYPTION_KEY'|'UNHEALTHY'|'UPDATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNodesAsync(array{
 *     NetworkId?: string,
 *     MemberId?: string,
 *     Status?: 'AVAILABLE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'|'FAILED'|'INACCESSIBLE_ENCRYPTION_KEY'|'UNHEALTHY'|'UPDATING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProposalVotes(array $args = [])
 * @phpstan-method \Aws\Result listProposalVotes(array{NetworkId?: string, ProposalId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProposalVotesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProposalVotesAsync(array{NetworkId?: string, ProposalId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listProposals(array $args = [])
 * @phpstan-method \Aws\Result listProposals(array{NetworkId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProposalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProposalsAsync(array{NetworkId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result rejectInvitation(array $args = [])
 * @phpstan-method \Aws\Result rejectInvitation(array{InvitationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectInvitationAsync(array{InvitationId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateMember(array $args = [])
 * @phpstan-method \Aws\Result updateMember(array{
 *     NetworkId?: string,
 *     MemberId?: string,
 *     LogPublishingConfiguration?: array{Fabric?: array{CaLogs?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMemberAsync(array{
 *     NetworkId?: string,
 *     MemberId?: string,
 *     LogPublishingConfiguration?: array{Fabric?: array{CaLogs?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNode(array $args = [])
 * @phpstan-method \Aws\Result updateNode(array{
 *     NetworkId?: string,
 *     MemberId?: string,
 *     NodeId?: string,
 *     LogPublishingConfiguration?: array{Fabric?: array{ChaincodeLogs?: array, PeerLogs?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNodeAsync(array{
 *     NetworkId?: string,
 *     MemberId?: string,
 *     NodeId?: string,
 *     LogPublishingConfiguration?: array{Fabric?: array{ChaincodeLogs?: array, PeerLogs?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result voteOnProposal(array $args = [])
 * @phpstan-method \Aws\Result voteOnProposal(array{NetworkId?: string, ProposalId?: string, VoterMemberId?: string, Vote?: 'NO'|'YES', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise voteOnProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise voteOnProposalAsync(array{NetworkId?: string, ProposalId?: string, VoterMemberId?: string, Vote?: 'NO'|'YES', ...} $args = [])
 */
class ManagedBlockchainClient extends AwsClient {}
