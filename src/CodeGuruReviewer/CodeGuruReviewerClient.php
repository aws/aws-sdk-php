<?php
namespace Aws\CodeGuruReviewer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodeGuru Reviewer** service.
 * @method \Aws\Result associateRepository(array $args = [])
 * @phpstan-method \Aws\Result associateRepository(array{
 *     Repository?: array{
 *         CodeCommit?: array{Name?: string, ...},
 *         Bitbucket?: array{Name?: string, ConnectionArn?: string, Owner?: string, ...},
 *         GitHubEnterpriseServer?: array{Name?: string, ConnectionArn?: string, Owner?: string, ...},
 *         S3Bucket?: array{Name?: string, BucketName?: string, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     KMSKeyDetails?: array{KMSKeyId?: string, EncryptionOption?: 'AWS_OWNED_CMK'|'CUSTOMER_MANAGED_CMK', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateRepositoryAsync(array{
 *     Repository?: array{
 *         CodeCommit?: array{Name?: string, ...},
 *         Bitbucket?: array{Name?: string, ConnectionArn?: string, Owner?: string, ...},
 *         GitHubEnterpriseServer?: array{Name?: string, ConnectionArn?: string, Owner?: string, ...},
 *         S3Bucket?: array{Name?: string, BucketName?: string, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     KMSKeyDetails?: array{KMSKeyId?: string, EncryptionOption?: 'AWS_OWNED_CMK'|'CUSTOMER_MANAGED_CMK', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCodeReview(array $args = [])
 * @phpstan-method \Aws\Result createCodeReview(array{
 *     Name?: string,
 *     RepositoryAssociationArn?: string,
 *     Type?: array{
 *         RepositoryAnalysis?: array{RepositoryHead?: array, SourceCodeType?: array, ...},
 *         AnalysisTypes?: list<'CodeQuality'|'Security'>,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeReviewAsync(array{
 *     Name?: string,
 *     RepositoryAssociationArn?: string,
 *     Type?: array{
 *         RepositoryAnalysis?: array{RepositoryHead?: array, SourceCodeType?: array, ...},
 *         AnalysisTypes?: list<'CodeQuality'|'Security'>,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCodeReview(array $args = [])
 * @phpstan-method \Aws\Result describeCodeReview(array{CodeReviewArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCodeReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCodeReviewAsync(array{CodeReviewArn?: string, ...} $args = [])
 * @method \Aws\Result describeRecommendationFeedback(array $args = [])
 * @phpstan-method \Aws\Result describeRecommendationFeedback(array{CodeReviewArn?: string, RecommendationId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecommendationFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecommendationFeedbackAsync(array{CodeReviewArn?: string, RecommendationId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result describeRepositoryAssociation(array $args = [])
 * @phpstan-method \Aws\Result describeRepositoryAssociation(array{AssociationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRepositoryAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRepositoryAssociationAsync(array{AssociationArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateRepository(array $args = [])
 * @phpstan-method \Aws\Result disassociateRepository(array{AssociationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateRepositoryAsync(array{AssociationArn?: string, ...} $args = [])
 * @method \Aws\Result listCodeReviews(array $args = [])
 * @phpstan-method \Aws\Result listCodeReviews(array{
 *     ProviderTypes?: list<'Bitbucket'|'CodeCommit'|'GitHub'|'GitHubEnterpriseServer'|'S3Bucket'>,
 *     States?: list<'Completed'|'Deleting'|'Failed'|'Pending'>,
 *     RepositoryNames?: list<string>,
 *     Type?: 'PullRequest'|'RepositoryAnalysis',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeReviewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeReviewsAsync(array{
 *     ProviderTypes?: list<'Bitbucket'|'CodeCommit'|'GitHub'|'GitHubEnterpriseServer'|'S3Bucket'>,
 *     States?: list<'Completed'|'Deleting'|'Failed'|'Pending'>,
 *     RepositoryNames?: list<string>,
 *     Type?: 'PullRequest'|'RepositoryAnalysis',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendationFeedback(array $args = [])
 * @phpstan-method \Aws\Result listRecommendationFeedback(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CodeReviewArn?: string,
 *     UserIds?: list<string>,
 *     RecommendationIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationFeedbackAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CodeReviewArn?: string,
 *     UserIds?: list<string>,
 *     RecommendationIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{NextToken?: string, MaxResults?: int, CodeReviewArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{NextToken?: string, MaxResults?: int, CodeReviewArn?: string, ...} $args = [])
 * @method \Aws\Result listRepositoryAssociations(array $args = [])
 * @phpstan-method \Aws\Result listRepositoryAssociations(array{
 *     ProviderTypes?: list<'Bitbucket'|'CodeCommit'|'GitHub'|'GitHubEnterpriseServer'|'S3Bucket'>,
 *     States?: list<'Associated'|'Associating'|'Disassociated'|'Disassociating'|'Failed'>,
 *     Names?: list<string>,
 *     Owners?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositoryAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositoryAssociationsAsync(array{
 *     ProviderTypes?: list<'Bitbucket'|'CodeCommit'|'GitHub'|'GitHubEnterpriseServer'|'S3Bucket'>,
 *     States?: list<'Associated'|'Associating'|'Disassociated'|'Disassociating'|'Failed'>,
 *     Names?: list<string>,
 *     Owners?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putRecommendationFeedback(array $args = [])
 * @phpstan-method \Aws\Result putRecommendationFeedback(array{CodeReviewArn?: string, RecommendationId?: string, Reactions?: list<'ThumbsDown'|'ThumbsUp'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putRecommendationFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRecommendationFeedbackAsync(array{CodeReviewArn?: string, RecommendationId?: string, Reactions?: list<'ThumbsDown'|'ThumbsUp'>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 */
class CodeGuruReviewerClient extends AwsClient {}
