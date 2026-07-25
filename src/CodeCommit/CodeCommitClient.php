<?php
namespace Aws\CodeCommit;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CodeCommit** service.
 *
 * @method \Aws\Result associateApprovalRuleTemplateWithRepository(array $args = [])
 * @phpstan-method \Aws\Result associateApprovalRuleTemplateWithRepository(array{approvalRuleTemplateName?: string, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateApprovalRuleTemplateWithRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateApprovalRuleTemplateWithRepositoryAsync(array{approvalRuleTemplateName?: string, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result batchAssociateApprovalRuleTemplateWithRepositories(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateApprovalRuleTemplateWithRepositories(array{approvalRuleTemplateName?: string, repositoryNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateApprovalRuleTemplateWithRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateApprovalRuleTemplateWithRepositoriesAsync(array{approvalRuleTemplateName?: string, repositoryNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDescribeMergeConflicts(array $args = [])
 * @phpstan-method \Aws\Result batchDescribeMergeConflicts(array{
 *     repositoryName?: string,
 *     destinationCommitSpecifier?: string,
 *     sourceCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     maxMergeHunks?: int,
 *     maxConflictFiles?: int,
 *     filePaths?: list<string>,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDescribeMergeConflictsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDescribeMergeConflictsAsync(array{
 *     repositoryName?: string,
 *     destinationCommitSpecifier?: string,
 *     sourceCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     maxMergeHunks?: int,
 *     maxConflictFiles?: int,
 *     filePaths?: list<string>,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDisassociateApprovalRuleTemplateFromRepositories(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateApprovalRuleTemplateFromRepositories(array{approvalRuleTemplateName?: string, repositoryNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateApprovalRuleTemplateFromRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateApprovalRuleTemplateFromRepositoriesAsync(array{approvalRuleTemplateName?: string, repositoryNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetCommits(array $args = [])
 * @phpstan-method \Aws\Result batchGetCommits(array{commitIds?: list<string>, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCommitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCommitsAsync(array{commitIds?: list<string>, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result batchGetRepositories(array $args = [])
 * @phpstan-method \Aws\Result batchGetRepositories(array{repositoryNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetRepositoriesAsync(array{repositoryNames?: list<string>, ...} $args = [])
 * @method \Aws\Result createApprovalRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result createApprovalRuleTemplate(array{
 *     approvalRuleTemplateName?: string,
 *     approvalRuleTemplateContent?: string,
 *     approvalRuleTemplateDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApprovalRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApprovalRuleTemplateAsync(array{
 *     approvalRuleTemplateName?: string,
 *     approvalRuleTemplateContent?: string,
 *     approvalRuleTemplateDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBranch(array $args = [])
 * @phpstan-method \Aws\Result createBranch(array{repositoryName?: string, branchName?: string, commitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBranchAsync(array{repositoryName?: string, branchName?: string, commitId?: string, ...} $args = [])
 * @method \Aws\Result createCommit(array $args = [])
 * @phpstan-method \Aws\Result createCommit(array{
 *     repositoryName?: string,
 *     branchName?: string,
 *     parentCommitId?: string,
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     putFiles?: list<array{
 *         filePath?: string,
 *         fileMode?: 'EXECUTABLE'|'NORMAL'|'SYMLINK',
 *         fileContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *         sourceFile?: array,
 *         ...,
 *     }>,
 *     deleteFiles?: list<array{filePath?: string, ...}>,
 *     setFileModes?: list<array{filePath?: string, fileMode?: 'EXECUTABLE'|'NORMAL'|'SYMLINK', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCommitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCommitAsync(array{
 *     repositoryName?: string,
 *     branchName?: string,
 *     parentCommitId?: string,
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     putFiles?: list<array{
 *         filePath?: string,
 *         fileMode?: 'EXECUTABLE'|'NORMAL'|'SYMLINK',
 *         fileContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *         sourceFile?: array,
 *         ...,
 *     }>,
 *     deleteFiles?: list<array{filePath?: string, ...}>,
 *     setFileModes?: list<array{filePath?: string, fileMode?: 'EXECUTABLE'|'NORMAL'|'SYMLINK', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPullRequest(array $args = [])
 * @phpstan-method \Aws\Result createPullRequest(array{
 *     title?: string,
 *     description?: string,
 *     targets?: list<array{repositoryName?: string, sourceReference?: string, destinationReference?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPullRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPullRequestAsync(array{
 *     title?: string,
 *     description?: string,
 *     targets?: list<array{repositoryName?: string, sourceReference?: string, destinationReference?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPullRequestApprovalRule(array $args = [])
 * @phpstan-method \Aws\Result createPullRequestApprovalRule(array{pullRequestId?: string, approvalRuleName?: string, approvalRuleContent?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPullRequestApprovalRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPullRequestApprovalRuleAsync(array{pullRequestId?: string, approvalRuleName?: string, approvalRuleContent?: string, ...} $args = [])
 * @method \Aws\Result createRepository(array $args = [])
 * @phpstan-method \Aws\Result createRepository(array{
 *     repositoryName?: string,
 *     repositoryDescription?: string,
 *     tags?: array<string, string>,
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRepositoryAsync(array{
 *     repositoryName?: string,
 *     repositoryDescription?: string,
 *     tags?: array<string, string>,
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUnreferencedMergeCommit(array $args = [])
 * @phpstan-method \Aws\Result createUnreferencedMergeCommit(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUnreferencedMergeCommitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUnreferencedMergeCommitAsync(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApprovalRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteApprovalRuleTemplate(array{approvalRuleTemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApprovalRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApprovalRuleTemplateAsync(array{approvalRuleTemplateName?: string, ...} $args = [])
 * @method \Aws\Result deleteBranch(array $args = [])
 * @phpstan-method \Aws\Result deleteBranch(array{repositoryName?: string, branchName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBranchAsync(array{repositoryName?: string, branchName?: string, ...} $args = [])
 * @method \Aws\Result deleteCommentContent(array $args = [])
 * @phpstan-method \Aws\Result deleteCommentContent(array{commentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCommentContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCommentContentAsync(array{commentId?: string, ...} $args = [])
 * @method \Aws\Result deleteFile(array $args = [])
 * @phpstan-method \Aws\Result deleteFile(array{
 *     repositoryName?: string,
 *     branchName?: string,
 *     filePath?: string,
 *     parentCommitId?: string,
 *     keepEmptyFolders?: bool,
 *     commitMessage?: string,
 *     name?: string,
 *     email?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileAsync(array{
 *     repositoryName?: string,
 *     branchName?: string,
 *     filePath?: string,
 *     parentCommitId?: string,
 *     keepEmptyFolders?: bool,
 *     commitMessage?: string,
 *     name?: string,
 *     email?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePullRequestApprovalRule(array $args = [])
 * @phpstan-method \Aws\Result deletePullRequestApprovalRule(array{pullRequestId?: string, approvalRuleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePullRequestApprovalRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePullRequestApprovalRuleAsync(array{pullRequestId?: string, approvalRuleName?: string, ...} $args = [])
 * @method \Aws\Result deleteRepository(array $args = [])
 * @phpstan-method \Aws\Result deleteRepository(array{repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array{repositoryName?: string, ...} $args = [])
 * @method \Aws\Result describeMergeConflicts(array $args = [])
 * @phpstan-method \Aws\Result describeMergeConflicts(array{
 *     repositoryName?: string,
 *     destinationCommitSpecifier?: string,
 *     sourceCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     maxMergeHunks?: int,
 *     filePath?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMergeConflictsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMergeConflictsAsync(array{
 *     repositoryName?: string,
 *     destinationCommitSpecifier?: string,
 *     sourceCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     maxMergeHunks?: int,
 *     filePath?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePullRequestEvents(array $args = [])
 * @phpstan-method \Aws\Result describePullRequestEvents(array{
 *     pullRequestId?: string,
 *     pullRequestEventType?: 'PULL_REQUEST_APPROVAL_RULE_CREATED'|'PULL_REQUEST_APPROVAL_RULE_DELETED'|'PULL_REQUEST_APPROVAL_RULE_OVERRIDDEN'|'PULL_REQUEST_APPROVAL_RULE_UPDATED'|'PULL_REQUEST_APPROVAL_STATE_CHANGED'|'PULL_REQUEST_CREATED'|'PULL_REQUEST_MERGE_STATE_CHANGED'|'PULL_REQUEST_SOURCE_REFERENCE_UPDATED'|'PULL_REQUEST_STATUS_CHANGED',
 *     actorArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePullRequestEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePullRequestEventsAsync(array{
 *     pullRequestId?: string,
 *     pullRequestEventType?: 'PULL_REQUEST_APPROVAL_RULE_CREATED'|'PULL_REQUEST_APPROVAL_RULE_DELETED'|'PULL_REQUEST_APPROVAL_RULE_OVERRIDDEN'|'PULL_REQUEST_APPROVAL_RULE_UPDATED'|'PULL_REQUEST_APPROVAL_STATE_CHANGED'|'PULL_REQUEST_CREATED'|'PULL_REQUEST_MERGE_STATE_CHANGED'|'PULL_REQUEST_SOURCE_REFERENCE_UPDATED'|'PULL_REQUEST_STATUS_CHANGED',
 *     actorArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateApprovalRuleTemplateFromRepository(array $args = [])
 * @phpstan-method \Aws\Result disassociateApprovalRuleTemplateFromRepository(array{approvalRuleTemplateName?: string, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateApprovalRuleTemplateFromRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateApprovalRuleTemplateFromRepositoryAsync(array{approvalRuleTemplateName?: string, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result evaluatePullRequestApprovalRules(array $args = [])
 * @phpstan-method \Aws\Result evaluatePullRequestApprovalRules(array{pullRequestId?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise evaluatePullRequestApprovalRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evaluatePullRequestApprovalRulesAsync(array{pullRequestId?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result getApprovalRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result getApprovalRuleTemplate(array{approvalRuleTemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApprovalRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApprovalRuleTemplateAsync(array{approvalRuleTemplateName?: string, ...} $args = [])
 * @method \Aws\Result getBlob(array $args = [])
 * @phpstan-method \Aws\Result getBlob(array{repositoryName?: string, blobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlobAsync(array{repositoryName?: string, blobId?: string, ...} $args = [])
 * @method \Aws\Result getBranch(array $args = [])
 * @phpstan-method \Aws\Result getBranch(array{repositoryName?: string, branchName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBranchAsync(array{repositoryName?: string, branchName?: string, ...} $args = [])
 * @method \Aws\Result getComment(array $args = [])
 * @phpstan-method \Aws\Result getComment(array{commentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommentAsync(array{commentId?: string, ...} $args = [])
 * @method \Aws\Result getCommentReactions(array $args = [])
 * @phpstan-method \Aws\Result getCommentReactions(array{commentId?: string, reactionUserArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommentReactionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommentReactionsAsync(array{commentId?: string, reactionUserArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getCommentsForComparedCommit(array $args = [])
 * @phpstan-method \Aws\Result getCommentsForComparedCommit(array{
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommentsForComparedCommitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommentsForComparedCommitAsync(array{
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCommentsForPullRequest(array $args = [])
 * @phpstan-method \Aws\Result getCommentsForPullRequest(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommentsForPullRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommentsForPullRequestAsync(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCommit(array $args = [])
 * @phpstan-method \Aws\Result getCommit(array{repositoryName?: string, commitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommitAsync(array{repositoryName?: string, commitId?: string, ...} $args = [])
 * @method \Aws\Result getDifferences(array $args = [])
 * @phpstan-method \Aws\Result getDifferences(array{
 *     repositoryName?: string,
 *     beforeCommitSpecifier?: string,
 *     afterCommitSpecifier?: string,
 *     beforePath?: string,
 *     afterPath?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDifferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDifferencesAsync(array{
 *     repositoryName?: string,
 *     beforeCommitSpecifier?: string,
 *     afterCommitSpecifier?: string,
 *     beforePath?: string,
 *     afterPath?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFile(array $args = [])
 * @phpstan-method \Aws\Result getFile(array{repositoryName?: string, commitSpecifier?: string, filePath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFileAsync(array{repositoryName?: string, commitSpecifier?: string, filePath?: string, ...} $args = [])
 * @method \Aws\Result getFolder(array $args = [])
 * @phpstan-method \Aws\Result getFolder(array{repositoryName?: string, commitSpecifier?: string, folderPath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFolderAsync(array{repositoryName?: string, commitSpecifier?: string, folderPath?: string, ...} $args = [])
 * @method \Aws\Result getMergeCommit(array $args = [])
 * @phpstan-method \Aws\Result getMergeCommit(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMergeCommitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMergeCommitAsync(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMergeConflicts(array $args = [])
 * @phpstan-method \Aws\Result getMergeConflicts(array{
 *     repositoryName?: string,
 *     destinationCommitSpecifier?: string,
 *     sourceCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     maxConflictFiles?: int,
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMergeConflictsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMergeConflictsAsync(array{
 *     repositoryName?: string,
 *     destinationCommitSpecifier?: string,
 *     sourceCommitSpecifier?: string,
 *     mergeOption?: 'FAST_FORWARD_MERGE'|'SQUASH_MERGE'|'THREE_WAY_MERGE',
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     maxConflictFiles?: int,
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMergeOptions(array $args = [])
 * @phpstan-method \Aws\Result getMergeOptions(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMergeOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMergeOptionsAsync(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPullRequest(array $args = [])
 * @phpstan-method \Aws\Result getPullRequest(array{pullRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPullRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPullRequestAsync(array{pullRequestId?: string, ...} $args = [])
 * @method \Aws\Result getPullRequestApprovalStates(array $args = [])
 * @phpstan-method \Aws\Result getPullRequestApprovalStates(array{pullRequestId?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPullRequestApprovalStatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPullRequestApprovalStatesAsync(array{pullRequestId?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result getPullRequestOverrideState(array $args = [])
 * @phpstan-method \Aws\Result getPullRequestOverrideState(array{pullRequestId?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPullRequestOverrideStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPullRequestOverrideStateAsync(array{pullRequestId?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result getRepository(array $args = [])
 * @phpstan-method \Aws\Result getRepository(array{repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryAsync(array{repositoryName?: string, ...} $args = [])
 * @method \Aws\Result getRepositoryTriggers(array $args = [])
 * @phpstan-method \Aws\Result getRepositoryTriggers(array{repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositoryTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryTriggersAsync(array{repositoryName?: string, ...} $args = [])
 * @method \Aws\Result listApprovalRuleTemplates(array $args = [])
 * @phpstan-method \Aws\Result listApprovalRuleTemplates(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApprovalRuleTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApprovalRuleTemplatesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssociatedApprovalRuleTemplatesForRepository(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedApprovalRuleTemplatesForRepository(array{repositoryName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedApprovalRuleTemplatesForRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedApprovalRuleTemplatesForRepositoryAsync(array{repositoryName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBranches(array $args = [])
 * @phpstan-method \Aws\Result listBranches(array{repositoryName?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBranchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBranchesAsync(array{repositoryName?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFileCommitHistory(array $args = [])
 * @phpstan-method \Aws\Result listFileCommitHistory(array{
 *     repositoryName?: string,
 *     commitSpecifier?: string,
 *     filePath?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFileCommitHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFileCommitHistoryAsync(array{
 *     repositoryName?: string,
 *     commitSpecifier?: string,
 *     filePath?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPullRequests(array $args = [])
 * @phpstan-method \Aws\Result listPullRequests(array{
 *     repositoryName?: string,
 *     authorArn?: string,
 *     pullRequestStatus?: 'CLOSED'|'OPEN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPullRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPullRequestsAsync(array{
 *     repositoryName?: string,
 *     authorArn?: string,
 *     pullRequestStatus?: 'CLOSED'|'OPEN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRepositories(array $args = [])
 * @phpstan-method \Aws\Result listRepositories(array{nextToken?: string, sortBy?: 'lastModifiedDate'|'repositoryName', order?: 'ascending'|'descending', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositoriesAsync(array{nextToken?: string, sortBy?: 'lastModifiedDate'|'repositoryName', order?: 'ascending'|'descending', ...} $args = [])
 * @method \Aws\Result listRepositoriesForApprovalRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result listRepositoriesForApprovalRuleTemplate(array{approvalRuleTemplateName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositoriesForApprovalRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositoriesForApprovalRuleTemplateAsync(array{approvalRuleTemplateName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result mergeBranchesByFastForward(array $args = [])
 * @phpstan-method \Aws\Result mergeBranchesByFastForward(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     targetBranch?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergeBranchesByFastForwardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergeBranchesByFastForwardAsync(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     targetBranch?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result mergeBranchesBySquash(array $args = [])
 * @phpstan-method \Aws\Result mergeBranchesBySquash(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     targetBranch?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergeBranchesBySquashAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergeBranchesBySquashAsync(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     targetBranch?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result mergeBranchesByThreeWay(array $args = [])
 * @phpstan-method \Aws\Result mergeBranchesByThreeWay(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     targetBranch?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergeBranchesByThreeWayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergeBranchesByThreeWayAsync(array{
 *     repositoryName?: string,
 *     sourceCommitSpecifier?: string,
 *     destinationCommitSpecifier?: string,
 *     targetBranch?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     authorName?: string,
 *     email?: string,
 *     commitMessage?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result mergePullRequestByFastForward(array $args = [])
 * @phpstan-method \Aws\Result mergePullRequestByFastForward(array{pullRequestId?: string, repositoryName?: string, sourceCommitId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise mergePullRequestByFastForwardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergePullRequestByFastForwardAsync(array{pullRequestId?: string, repositoryName?: string, sourceCommitId?: string, ...} $args = [])
 * @method \Aws\Result mergePullRequestBySquash(array $args = [])
 * @phpstan-method \Aws\Result mergePullRequestBySquash(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     sourceCommitId?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     commitMessage?: string,
 *     authorName?: string,
 *     email?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergePullRequestBySquashAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergePullRequestBySquashAsync(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     sourceCommitId?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     commitMessage?: string,
 *     authorName?: string,
 *     email?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result mergePullRequestByThreeWay(array $args = [])
 * @phpstan-method \Aws\Result mergePullRequestByThreeWay(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     sourceCommitId?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     commitMessage?: string,
 *     authorName?: string,
 *     email?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergePullRequestByThreeWayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergePullRequestByThreeWayAsync(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     sourceCommitId?: string,
 *     conflictDetailLevel?: 'FILE_LEVEL'|'LINE_LEVEL',
 *     conflictResolutionStrategy?: 'ACCEPT_DESTINATION'|'ACCEPT_SOURCE'|'AUTOMERGE'|'NONE',
 *     commitMessage?: string,
 *     authorName?: string,
 *     email?: string,
 *     keepEmptyFolders?: bool,
 *     conflictResolution?: array{replaceContents?: list<array>, deleteFiles?: list<array>, setFileModes?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result overridePullRequestApprovalRules(array $args = [])
 * @phpstan-method \Aws\Result overridePullRequestApprovalRules(array{pullRequestId?: string, revisionId?: string, overrideStatus?: 'OVERRIDE'|'REVOKE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise overridePullRequestApprovalRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise overridePullRequestApprovalRulesAsync(array{pullRequestId?: string, revisionId?: string, overrideStatus?: 'OVERRIDE'|'REVOKE', ...} $args = [])
 * @method \Aws\Result postCommentForComparedCommit(array $args = [])
 * @phpstan-method \Aws\Result postCommentForComparedCommit(array{
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     location?: array{filePath?: string, filePosition?: int, relativeFileVersion?: 'AFTER'|'BEFORE', ...},
 *     content?: string,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postCommentForComparedCommitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postCommentForComparedCommitAsync(array{
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     location?: array{filePath?: string, filePosition?: int, relativeFileVersion?: 'AFTER'|'BEFORE', ...},
 *     content?: string,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result postCommentForPullRequest(array $args = [])
 * @phpstan-method \Aws\Result postCommentForPullRequest(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     location?: array{filePath?: string, filePosition?: int, relativeFileVersion?: 'AFTER'|'BEFORE', ...},
 *     content?: string,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postCommentForPullRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postCommentForPullRequestAsync(array{
 *     pullRequestId?: string,
 *     repositoryName?: string,
 *     beforeCommitId?: string,
 *     afterCommitId?: string,
 *     location?: array{filePath?: string, filePosition?: int, relativeFileVersion?: 'AFTER'|'BEFORE', ...},
 *     content?: string,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result postCommentReply(array $args = [])
 * @phpstan-method \Aws\Result postCommentReply(array{inReplyTo?: string, clientRequestToken?: string, content?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise postCommentReplyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postCommentReplyAsync(array{inReplyTo?: string, clientRequestToken?: string, content?: string, ...} $args = [])
 * @method \Aws\Result putCommentReaction(array $args = [])
 * @phpstan-method \Aws\Result putCommentReaction(array{commentId?: string, reactionValue?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putCommentReactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putCommentReactionAsync(array{commentId?: string, reactionValue?: string, ...} $args = [])
 * @method \Aws\Result putFile(array $args = [])
 * @phpstan-method \Aws\Result putFile(array{
 *     repositoryName?: string,
 *     branchName?: string,
 *     fileContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *     filePath?: string,
 *     fileMode?: 'EXECUTABLE'|'NORMAL'|'SYMLINK',
 *     parentCommitId?: string,
 *     commitMessage?: string,
 *     name?: string,
 *     email?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFileAsync(array{
 *     repositoryName?: string,
 *     branchName?: string,
 *     fileContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *     filePath?: string,
 *     fileMode?: 'EXECUTABLE'|'NORMAL'|'SYMLINK',
 *     parentCommitId?: string,
 *     commitMessage?: string,
 *     name?: string,
 *     email?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRepositoryTriggers(array $args = [])
 * @phpstan-method \Aws\Result putRepositoryTriggers(array{
 *     repositoryName?: string,
 *     triggers?: list<array{
 *         name?: string,
 *         destinationArn?: string,
 *         customData?: string,
 *         branches?: list<string>,
 *         events?: list<'all'|'createReference'|'deleteReference'|'updateReference'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRepositoryTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRepositoryTriggersAsync(array{
 *     repositoryName?: string,
 *     triggers?: list<array{
 *         name?: string,
 *         destinationArn?: string,
 *         customData?: string,
 *         branches?: list<string>,
 *         events?: list<'all'|'createReference'|'deleteReference'|'updateReference'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result testRepositoryTriggers(array $args = [])
 * @phpstan-method \Aws\Result testRepositoryTriggers(array{
 *     repositoryName?: string,
 *     triggers?: list<array{
 *         name?: string,
 *         destinationArn?: string,
 *         customData?: string,
 *         branches?: list<string>,
 *         events?: list<'all'|'createReference'|'deleteReference'|'updateReference'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testRepositoryTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testRepositoryTriggersAsync(array{
 *     repositoryName?: string,
 *     triggers?: list<array{
 *         name?: string,
 *         destinationArn?: string,
 *         customData?: string,
 *         branches?: list<string>,
 *         events?: list<'all'|'createReference'|'deleteReference'|'updateReference'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApprovalRuleTemplateContent(array $args = [])
 * @phpstan-method \Aws\Result updateApprovalRuleTemplateContent(array{approvalRuleTemplateName?: string, newRuleContent?: string, existingRuleContentSha256?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApprovalRuleTemplateContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApprovalRuleTemplateContentAsync(array{approvalRuleTemplateName?: string, newRuleContent?: string, existingRuleContentSha256?: string, ...} $args = [])
 * @method \Aws\Result updateApprovalRuleTemplateDescription(array $args = [])
 * @phpstan-method \Aws\Result updateApprovalRuleTemplateDescription(array{approvalRuleTemplateName?: string, approvalRuleTemplateDescription?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApprovalRuleTemplateDescriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApprovalRuleTemplateDescriptionAsync(array{approvalRuleTemplateName?: string, approvalRuleTemplateDescription?: string, ...} $args = [])
 * @method \Aws\Result updateApprovalRuleTemplateName(array $args = [])
 * @phpstan-method \Aws\Result updateApprovalRuleTemplateName(array{oldApprovalRuleTemplateName?: string, newApprovalRuleTemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApprovalRuleTemplateNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApprovalRuleTemplateNameAsync(array{oldApprovalRuleTemplateName?: string, newApprovalRuleTemplateName?: string, ...} $args = [])
 * @method \Aws\Result updateComment(array $args = [])
 * @phpstan-method \Aws\Result updateComment(array{commentId?: string, content?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCommentAsync(array{commentId?: string, content?: string, ...} $args = [])
 * @method \Aws\Result updateDefaultBranch(array $args = [])
 * @phpstan-method \Aws\Result updateDefaultBranch(array{repositoryName?: string, defaultBranchName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDefaultBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDefaultBranchAsync(array{repositoryName?: string, defaultBranchName?: string, ...} $args = [])
 * @method \Aws\Result updatePullRequestApprovalRuleContent(array $args = [])
 * @phpstan-method \Aws\Result updatePullRequestApprovalRuleContent(array{
 *     pullRequestId?: string,
 *     approvalRuleName?: string,
 *     existingRuleContentSha256?: string,
 *     newRuleContent?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePullRequestApprovalRuleContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePullRequestApprovalRuleContentAsync(array{
 *     pullRequestId?: string,
 *     approvalRuleName?: string,
 *     existingRuleContentSha256?: string,
 *     newRuleContent?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePullRequestApprovalState(array $args = [])
 * @phpstan-method \Aws\Result updatePullRequestApprovalState(array{pullRequestId?: string, revisionId?: string, approvalState?: 'APPROVE'|'REVOKE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePullRequestApprovalStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePullRequestApprovalStateAsync(array{pullRequestId?: string, revisionId?: string, approvalState?: 'APPROVE'|'REVOKE', ...} $args = [])
 * @method \Aws\Result updatePullRequestDescription(array $args = [])
 * @phpstan-method \Aws\Result updatePullRequestDescription(array{pullRequestId?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePullRequestDescriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePullRequestDescriptionAsync(array{pullRequestId?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updatePullRequestStatus(array $args = [])
 * @phpstan-method \Aws\Result updatePullRequestStatus(array{pullRequestId?: string, pullRequestStatus?: 'CLOSED'|'OPEN', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePullRequestStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePullRequestStatusAsync(array{pullRequestId?: string, pullRequestStatus?: 'CLOSED'|'OPEN', ...} $args = [])
 * @method \Aws\Result updatePullRequestTitle(array $args = [])
 * @phpstan-method \Aws\Result updatePullRequestTitle(array{pullRequestId?: string, title?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePullRequestTitleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePullRequestTitleAsync(array{pullRequestId?: string, title?: string, ...} $args = [])
 * @method \Aws\Result updateRepositoryDescription(array $args = [])
 * @phpstan-method \Aws\Result updateRepositoryDescription(array{repositoryName?: string, repositoryDescription?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRepositoryDescriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRepositoryDescriptionAsync(array{repositoryName?: string, repositoryDescription?: string, ...} $args = [])
 * @method \Aws\Result updateRepositoryEncryptionKey(array $args = [])
 * @phpstan-method \Aws\Result updateRepositoryEncryptionKey(array{repositoryName?: string, kmsKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRepositoryEncryptionKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRepositoryEncryptionKeyAsync(array{repositoryName?: string, kmsKeyId?: string, ...} $args = [])
 * @method \Aws\Result updateRepositoryName(array $args = [])
 * @phpstan-method \Aws\Result updateRepositoryName(array{oldName?: string, newName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRepositoryNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRepositoryNameAsync(array{oldName?: string, newName?: string, ...} $args = [])
 */
class CodeCommitClient extends AwsClient {}
