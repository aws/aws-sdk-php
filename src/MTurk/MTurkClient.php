<?php
namespace Aws\MTurk;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Mechanical Turk Requester Service** service.
 * @method \Aws\Result acceptQualificationRequest(array $args = [])
 * @phpstan-method \Aws\Result acceptQualificationRequest(array{QualificationRequestId?: string, IntegerValue?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptQualificationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptQualificationRequestAsync(array{QualificationRequestId?: string, IntegerValue?: int, ...} $args = [])
 * @method \Aws\Result approveAssignment(array $args = [])
 * @phpstan-method \Aws\Result approveAssignment(array{AssignmentId?: string, RequesterFeedback?: string, OverrideRejection?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise approveAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise approveAssignmentAsync(array{AssignmentId?: string, RequesterFeedback?: string, OverrideRejection?: bool, ...} $args = [])
 * @method \Aws\Result associateQualificationWithWorker(array $args = [])
 * @phpstan-method \Aws\Result associateQualificationWithWorker(array{QualificationTypeId?: string, WorkerId?: string, IntegerValue?: int, SendNotification?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateQualificationWithWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateQualificationWithWorkerAsync(array{QualificationTypeId?: string, WorkerId?: string, IntegerValue?: int, SendNotification?: bool, ...} $args = [])
 * @method \Aws\Result createAdditionalAssignmentsForHIT(array $args = [])
 * @phpstan-method \Aws\Result createAdditionalAssignmentsForHIT(array{HITId?: string, NumberOfAdditionalAssignments?: int, UniqueRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAdditionalAssignmentsForHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAdditionalAssignmentsForHITAsync(array{HITId?: string, NumberOfAdditionalAssignments?: int, UniqueRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createHIT(array $args = [])
 * @phpstan-method \Aws\Result createHIT(array{
 *     MaxAssignments?: int,
 *     AutoApprovalDelayInSeconds?: int,
 *     LifetimeInSeconds?: int,
 *     AssignmentDurationInSeconds?: int,
 *     Reward?: string,
 *     Title?: string,
 *     Keywords?: string,
 *     Description?: string,
 *     Question?: string,
 *     RequesterAnnotation?: string,
 *     QualificationRequirements?: list<array{
 *         QualificationTypeId?: string,
 *         Comparator?: 'DoesNotExist'|'EqualTo'|'Exists'|'GreaterThan'|'GreaterThanOrEqualTo'|'In'|'LessThan'|'LessThanOrEqualTo'|'NotEqualTo'|'NotIn',
 *         IntegerValues?: list<int>,
 *         LocaleValues?: list<array>,
 *         RequiredToPreview?: bool,
 *         ActionsGuarded?: 'Accept'|'DiscoverPreviewAndAccept'|'PreviewAndAccept',
 *         ...,
 *     }>,
 *     UniqueRequestToken?: string,
 *     AssignmentReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITLayoutId?: string,
 *     HITLayoutParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHITAsync(array{
 *     MaxAssignments?: int,
 *     AutoApprovalDelayInSeconds?: int,
 *     LifetimeInSeconds?: int,
 *     AssignmentDurationInSeconds?: int,
 *     Reward?: string,
 *     Title?: string,
 *     Keywords?: string,
 *     Description?: string,
 *     Question?: string,
 *     RequesterAnnotation?: string,
 *     QualificationRequirements?: list<array{
 *         QualificationTypeId?: string,
 *         Comparator?: 'DoesNotExist'|'EqualTo'|'Exists'|'GreaterThan'|'GreaterThanOrEqualTo'|'In'|'LessThan'|'LessThanOrEqualTo'|'NotEqualTo'|'NotIn',
 *         IntegerValues?: list<int>,
 *         LocaleValues?: list<array>,
 *         RequiredToPreview?: bool,
 *         ActionsGuarded?: 'Accept'|'DiscoverPreviewAndAccept'|'PreviewAndAccept',
 *         ...,
 *     }>,
 *     UniqueRequestToken?: string,
 *     AssignmentReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITLayoutId?: string,
 *     HITLayoutParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHITType(array $args = [])
 * @phpstan-method \Aws\Result createHITType(array{
 *     AutoApprovalDelayInSeconds?: int,
 *     AssignmentDurationInSeconds?: int,
 *     Reward?: string,
 *     Title?: string,
 *     Keywords?: string,
 *     Description?: string,
 *     QualificationRequirements?: list<array{
 *         QualificationTypeId?: string,
 *         Comparator?: 'DoesNotExist'|'EqualTo'|'Exists'|'GreaterThan'|'GreaterThanOrEqualTo'|'In'|'LessThan'|'LessThanOrEqualTo'|'NotEqualTo'|'NotIn',
 *         IntegerValues?: list<int>,
 *         LocaleValues?: list<array>,
 *         RequiredToPreview?: bool,
 *         ActionsGuarded?: 'Accept'|'DiscoverPreviewAndAccept'|'PreviewAndAccept',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHITTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHITTypeAsync(array{
 *     AutoApprovalDelayInSeconds?: int,
 *     AssignmentDurationInSeconds?: int,
 *     Reward?: string,
 *     Title?: string,
 *     Keywords?: string,
 *     Description?: string,
 *     QualificationRequirements?: list<array{
 *         QualificationTypeId?: string,
 *         Comparator?: 'DoesNotExist'|'EqualTo'|'Exists'|'GreaterThan'|'GreaterThanOrEqualTo'|'In'|'LessThan'|'LessThanOrEqualTo'|'NotEqualTo'|'NotIn',
 *         IntegerValues?: list<int>,
 *         LocaleValues?: list<array>,
 *         RequiredToPreview?: bool,
 *         ActionsGuarded?: 'Accept'|'DiscoverPreviewAndAccept'|'PreviewAndAccept',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHITWithHITType(array $args = [])
 * @phpstan-method \Aws\Result createHITWithHITType(array{
 *     HITTypeId?: string,
 *     MaxAssignments?: int,
 *     LifetimeInSeconds?: int,
 *     Question?: string,
 *     RequesterAnnotation?: string,
 *     UniqueRequestToken?: string,
 *     AssignmentReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITLayoutId?: string,
 *     HITLayoutParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHITWithHITTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHITWithHITTypeAsync(array{
 *     HITTypeId?: string,
 *     MaxAssignments?: int,
 *     LifetimeInSeconds?: int,
 *     Question?: string,
 *     RequesterAnnotation?: string,
 *     UniqueRequestToken?: string,
 *     AssignmentReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITReviewPolicy?: array{PolicyName?: string, Parameters?: list<array>, ...},
 *     HITLayoutId?: string,
 *     HITLayoutParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQualificationType(array $args = [])
 * @phpstan-method \Aws\Result createQualificationType(array{
 *     Name?: string,
 *     Keywords?: string,
 *     Description?: string,
 *     QualificationTypeStatus?: 'Active'|'Inactive',
 *     RetryDelayInSeconds?: int,
 *     Test?: string,
 *     AnswerKey?: string,
 *     TestDurationInSeconds?: int,
 *     AutoGranted?: bool,
 *     AutoGrantedValue?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQualificationTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQualificationTypeAsync(array{
 *     Name?: string,
 *     Keywords?: string,
 *     Description?: string,
 *     QualificationTypeStatus?: 'Active'|'Inactive',
 *     RetryDelayInSeconds?: int,
 *     Test?: string,
 *     AnswerKey?: string,
 *     TestDurationInSeconds?: int,
 *     AutoGranted?: bool,
 *     AutoGrantedValue?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkerBlock(array $args = [])
 * @phpstan-method \Aws\Result createWorkerBlock(array{WorkerId?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkerBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkerBlockAsync(array{WorkerId?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result deleteHIT(array $args = [])
 * @phpstan-method \Aws\Result deleteHIT(array{HITId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHITAsync(array{HITId?: string, ...} $args = [])
 * @method \Aws\Result deleteQualificationType(array $args = [])
 * @phpstan-method \Aws\Result deleteQualificationType(array{QualificationTypeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQualificationTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQualificationTypeAsync(array{QualificationTypeId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkerBlock(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkerBlock(array{WorkerId?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkerBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkerBlockAsync(array{WorkerId?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result disassociateQualificationFromWorker(array $args = [])
 * @phpstan-method \Aws\Result disassociateQualificationFromWorker(array{WorkerId?: string, QualificationTypeId?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateQualificationFromWorkerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateQualificationFromWorkerAsync(array{WorkerId?: string, QualificationTypeId?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result getAccountBalance(array $args = [])
 * @phpstan-method \Aws\Result getAccountBalance(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountBalanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountBalanceAsync(array{...} $args = [])
 * @method \Aws\Result getAssignment(array $args = [])
 * @phpstan-method \Aws\Result getAssignment(array{AssignmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssignmentAsync(array{AssignmentId?: string, ...} $args = [])
 * @method \Aws\Result getFileUploadURL(array $args = [])
 * @phpstan-method \Aws\Result getFileUploadURL(array{AssignmentId?: string, QuestionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFileUploadURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFileUploadURLAsync(array{AssignmentId?: string, QuestionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getHIT(array $args = [])
 * @phpstan-method \Aws\Result getHIT(array{HITId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHITAsync(array{HITId?: string, ...} $args = [])
 * @method \Aws\Result getQualificationScore(array $args = [])
 * @phpstan-method \Aws\Result getQualificationScore(array{QualificationTypeId?: string, WorkerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQualificationScoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQualificationScoreAsync(array{QualificationTypeId?: string, WorkerId?: string, ...} $args = [])
 * @method \Aws\Result getQualificationType(array $args = [])
 * @phpstan-method \Aws\Result getQualificationType(array{QualificationTypeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQualificationTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQualificationTypeAsync(array{QualificationTypeId?: string, ...} $args = [])
 * @method \Aws\Result listAssignmentsForHIT(array $args = [])
 * @phpstan-method \Aws\Result listAssignmentsForHIT(array{
 *     HITId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AssignmentStatuses?: list<'Approved'|'Rejected'|'Submitted'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssignmentsForHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssignmentsForHITAsync(array{
 *     HITId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AssignmentStatuses?: list<'Approved'|'Rejected'|'Submitted'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBonusPayments(array $args = [])
 * @phpstan-method \Aws\Result listBonusPayments(array{HITId?: string, AssignmentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBonusPaymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBonusPaymentsAsync(array{HITId?: string, AssignmentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listHITs(array $args = [])
 * @phpstan-method \Aws\Result listHITs(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHITsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHITsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listHITsForQualificationType(array $args = [])
 * @phpstan-method \Aws\Result listHITsForQualificationType(array{QualificationTypeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHITsForQualificationTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHITsForQualificationTypeAsync(array{QualificationTypeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQualificationRequests(array $args = [])
 * @phpstan-method \Aws\Result listQualificationRequests(array{QualificationTypeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQualificationRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQualificationRequestsAsync(array{QualificationTypeId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQualificationTypes(array $args = [])
 * @phpstan-method \Aws\Result listQualificationTypes(array{
 *     Query?: string,
 *     MustBeRequestable?: bool,
 *     MustBeOwnedByCaller?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listQualificationTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQualificationTypesAsync(array{
 *     Query?: string,
 *     MustBeRequestable?: bool,
 *     MustBeOwnedByCaller?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReviewPolicyResultsForHIT(array $args = [])
 * @phpstan-method \Aws\Result listReviewPolicyResultsForHIT(array{
 *     HITId?: string,
 *     PolicyLevels?: list<'Assignment'|'HIT'>,
 *     RetrieveActions?: bool,
 *     RetrieveResults?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReviewPolicyResultsForHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReviewPolicyResultsForHITAsync(array{
 *     HITId?: string,
 *     PolicyLevels?: list<'Assignment'|'HIT'>,
 *     RetrieveActions?: bool,
 *     RetrieveResults?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReviewableHITs(array $args = [])
 * @phpstan-method \Aws\Result listReviewableHITs(array{HITTypeId?: string, Status?: 'Reviewable'|'Reviewing', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReviewableHITsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReviewableHITsAsync(array{HITTypeId?: string, Status?: 'Reviewable'|'Reviewing', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listWorkerBlocks(array $args = [])
 * @phpstan-method \Aws\Result listWorkerBlocks(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkerBlocksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkerBlocksAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listWorkersWithQualificationType(array $args = [])
 * @phpstan-method \Aws\Result listWorkersWithQualificationType(array{QualificationTypeId?: string, Status?: 'Granted'|'Revoked', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkersWithQualificationTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkersWithQualificationTypeAsync(array{QualificationTypeId?: string, Status?: 'Granted'|'Revoked', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result notifyWorkers(array $args = [])
 * @phpstan-method \Aws\Result notifyWorkers(array{Subject?: string, MessageText?: string, WorkerIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyWorkersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyWorkersAsync(array{Subject?: string, MessageText?: string, WorkerIds?: list<string>, ...} $args = [])
 * @method \Aws\Result rejectAssignment(array $args = [])
 * @phpstan-method \Aws\Result rejectAssignment(array{AssignmentId?: string, RequesterFeedback?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectAssignmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectAssignmentAsync(array{AssignmentId?: string, RequesterFeedback?: string, ...} $args = [])
 * @method \Aws\Result rejectQualificationRequest(array $args = [])
 * @phpstan-method \Aws\Result rejectQualificationRequest(array{QualificationRequestId?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectQualificationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectQualificationRequestAsync(array{QualificationRequestId?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result sendBonus(array $args = [])
 * @phpstan-method \Aws\Result sendBonus(array{
 *     WorkerId?: string,
 *     BonusAmount?: string,
 *     AssignmentId?: string,
 *     Reason?: string,
 *     UniqueRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendBonusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendBonusAsync(array{
 *     WorkerId?: string,
 *     BonusAmount?: string,
 *     AssignmentId?: string,
 *     Reason?: string,
 *     UniqueRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendTestEventNotification(array $args = [])
 * @phpstan-method \Aws\Result sendTestEventNotification(array{
 *     Notification?: array{
 *         Destination?: string,
 *         Transport?: 'Email'|'SNS'|'SQS',
 *         Version?: string,
 *         EventTypes?: list<'AssignmentAbandoned'|'AssignmentAccepted'|'AssignmentApproved'|'AssignmentRejected'|'AssignmentReturned'|'AssignmentSubmitted'|'HITCreated'|'HITDisposed'|'HITExpired'|'HITExtended'|'HITReviewable'|'Ping'>,
 *         ...,
 *     },
 *     TestEventType?: 'AssignmentAbandoned'|'AssignmentAccepted'|'AssignmentApproved'|'AssignmentRejected'|'AssignmentReturned'|'AssignmentSubmitted'|'HITCreated'|'HITDisposed'|'HITExpired'|'HITExtended'|'HITReviewable'|'Ping',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendTestEventNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendTestEventNotificationAsync(array{
 *     Notification?: array{
 *         Destination?: string,
 *         Transport?: 'Email'|'SNS'|'SQS',
 *         Version?: string,
 *         EventTypes?: list<'AssignmentAbandoned'|'AssignmentAccepted'|'AssignmentApproved'|'AssignmentRejected'|'AssignmentReturned'|'AssignmentSubmitted'|'HITCreated'|'HITDisposed'|'HITExpired'|'HITExtended'|'HITReviewable'|'Ping'>,
 *         ...,
 *     },
 *     TestEventType?: 'AssignmentAbandoned'|'AssignmentAccepted'|'AssignmentApproved'|'AssignmentRejected'|'AssignmentReturned'|'AssignmentSubmitted'|'HITCreated'|'HITDisposed'|'HITExpired'|'HITExtended'|'HITReviewable'|'Ping',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExpirationForHIT(array $args = [])
 * @phpstan-method \Aws\Result updateExpirationForHIT(array{HITId?: string, ExpireAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExpirationForHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExpirationForHITAsync(array{HITId?: string, ExpireAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result updateHITReviewStatus(array $args = [])
 * @phpstan-method \Aws\Result updateHITReviewStatus(array{HITId?: string, Revert?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHITReviewStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHITReviewStatusAsync(array{HITId?: string, Revert?: bool, ...} $args = [])
 * @method \Aws\Result updateHITTypeOfHIT(array $args = [])
 * @phpstan-method \Aws\Result updateHITTypeOfHIT(array{HITId?: string, HITTypeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHITTypeOfHITAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHITTypeOfHITAsync(array{HITId?: string, HITTypeId?: string, ...} $args = [])
 * @method \Aws\Result updateNotificationSettings(array $args = [])
 * @phpstan-method \Aws\Result updateNotificationSettings(array{
 *     HITTypeId?: string,
 *     Notification?: array{
 *         Destination?: string,
 *         Transport?: 'Email'|'SNS'|'SQS',
 *         Version?: string,
 *         EventTypes?: list<'AssignmentAbandoned'|'AssignmentAccepted'|'AssignmentApproved'|'AssignmentRejected'|'AssignmentReturned'|'AssignmentSubmitted'|'HITCreated'|'HITDisposed'|'HITExpired'|'HITExtended'|'HITReviewable'|'Ping'>,
 *         ...,
 *     },
 *     Active?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotificationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotificationSettingsAsync(array{
 *     HITTypeId?: string,
 *     Notification?: array{
 *         Destination?: string,
 *         Transport?: 'Email'|'SNS'|'SQS',
 *         Version?: string,
 *         EventTypes?: list<'AssignmentAbandoned'|'AssignmentAccepted'|'AssignmentApproved'|'AssignmentRejected'|'AssignmentReturned'|'AssignmentSubmitted'|'HITCreated'|'HITDisposed'|'HITExpired'|'HITExtended'|'HITReviewable'|'Ping'>,
 *         ...,
 *     },
 *     Active?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQualificationType(array $args = [])
 * @phpstan-method \Aws\Result updateQualificationType(array{
 *     QualificationTypeId?: string,
 *     Description?: string,
 *     QualificationTypeStatus?: 'Active'|'Inactive',
 *     Test?: string,
 *     AnswerKey?: string,
 *     TestDurationInSeconds?: int,
 *     RetryDelayInSeconds?: int,
 *     AutoGranted?: bool,
 *     AutoGrantedValue?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQualificationTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQualificationTypeAsync(array{
 *     QualificationTypeId?: string,
 *     Description?: string,
 *     QualificationTypeStatus?: 'Active'|'Inactive',
 *     Test?: string,
 *     AnswerKey?: string,
 *     TestDurationInSeconds?: int,
 *     RetryDelayInSeconds?: int,
 *     AutoGranted?: bool,
 *     AutoGrantedValue?: int,
 *     ...,
 * } $args = [])
 */
class MTurkClient extends AwsClient {}
