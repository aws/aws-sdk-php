<?php
namespace Aws\PartnerCentralBenefits;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Benefits API** service.
 * @method \Aws\Result amendBenefitApplication(array $args = [])
 * @phpstan-method \Aws\Result amendBenefitApplication(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Revision?: string,
 *     Identifier?: string,
 *     AmendmentReason?: string,
 *     Amendments?: list<array{FieldPath?: string, NewValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise amendBenefitApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise amendBenefitApplicationAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Revision?: string,
 *     Identifier?: string,
 *     AmendmentReason?: string,
 *     Amendments?: list<array{FieldPath?: string, NewValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateBenefitApplicationResource(array $args = [])
 * @phpstan-method \Aws\Result associateBenefitApplicationResource(array{Catalog?: string, BenefitApplicationIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateBenefitApplicationResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateBenefitApplicationResourceAsync(array{Catalog?: string, BenefitApplicationIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result cancelBenefitApplication(array $args = [])
 * @phpstan-method \Aws\Result cancelBenefitApplication(array{Catalog?: string, ClientToken?: string, Identifier?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelBenefitApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelBenefitApplicationAsync(array{Catalog?: string, ClientToken?: string, Identifier?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result createBenefitApplication(array $args = [])
 * @phpstan-method \Aws\Result createBenefitApplication(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     BenefitIdentifier?: string,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     BenefitApplicationDetails?: array,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AssociatedResources?: list<string>,
 *     PartnerContacts?: list<array{Email?: string, FirstName?: string, LastName?: string, BusinessTitle?: string, Phone?: string, ...}>,
 *     FileDetails?: list<array{FileURI?: string, BusinessUseCase?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBenefitApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBenefitApplicationAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     BenefitIdentifier?: string,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     BenefitApplicationDetails?: array,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AssociatedResources?: list<string>,
 *     PartnerContacts?: list<array{Email?: string, FirstName?: string, LastName?: string, BusinessTitle?: string, Phone?: string, ...}>,
 *     FileDetails?: list<array{FileURI?: string, BusinessUseCase?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateBenefitApplicationResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateBenefitApplicationResource(array{Catalog?: string, BenefitApplicationIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateBenefitApplicationResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateBenefitApplicationResourceAsync(array{Catalog?: string, BenefitApplicationIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getBenefit(array $args = [])
 * @phpstan-method \Aws\Result getBenefit(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBenefitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBenefitAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getBenefitAllocation(array $args = [])
 * @phpstan-method \Aws\Result getBenefitAllocation(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBenefitAllocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBenefitAllocationAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getBenefitApplication(array $args = [])
 * @phpstan-method \Aws\Result getBenefitApplication(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBenefitApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBenefitApplicationAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result listBenefitAllocations(array $args = [])
 * @phpstan-method \Aws\Result listBenefitAllocations(array{
 *     Catalog?: string,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     BenefitIdentifiers?: list<string>,
 *     BenefitApplicationIdentifiers?: list<string>,
 *     Status?: list<'ACTIVE'|'FULFILLED'|'INACTIVE'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBenefitAllocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBenefitAllocationsAsync(array{
 *     Catalog?: string,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     BenefitIdentifiers?: list<string>,
 *     BenefitApplicationIdentifiers?: list<string>,
 *     Status?: list<'ACTIVE'|'FULFILLED'|'INACTIVE'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBenefitApplications(array $args = [])
 * @phpstan-method \Aws\Result listBenefitApplications(array{
 *     Catalog?: string,
 *     Programs?: list<string>,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     BenefitIdentifiers?: list<string>,
 *     Status?: list<'ACTION_REQUIRED'|'APPROVED'|'CANCELED'|'IN_REVIEW'|'PENDING_SUBMISSION'|'REJECTED'>,
 *     Stages?: list<string>,
 *     AssociatedResources?: list<array{
 *         ResourceType?: 'BENEFIT_ALLOCATION'|'OPPORTUNITY',
 *         ResourceIdentifier?: string,
 *         ResourceArn?: string,
 *         ...,
 *     }>,
 *     AssociatedResourceArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBenefitApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBenefitApplicationsAsync(array{
 *     Catalog?: string,
 *     Programs?: list<string>,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     BenefitIdentifiers?: list<string>,
 *     Status?: list<'ACTION_REQUIRED'|'APPROVED'|'CANCELED'|'IN_REVIEW'|'PENDING_SUBMISSION'|'REJECTED'>,
 *     Stages?: list<string>,
 *     AssociatedResources?: list<array{
 *         ResourceType?: 'BENEFIT_ALLOCATION'|'OPPORTUNITY',
 *         ResourceIdentifier?: string,
 *         ResourceArn?: string,
 *         ...,
 *     }>,
 *     AssociatedResourceArns?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBenefits(array $args = [])
 * @phpstan-method \Aws\Result listBenefits(array{
 *     Catalog?: string,
 *     Programs?: list<string>,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     Status?: list<'ACTIVE'|'INACTIVE'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBenefitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBenefitsAsync(array{
 *     Catalog?: string,
 *     Programs?: list<string>,
 *     FulfillmentTypes?: list<'ACCESS'|'CASH'|'CREDITS'>,
 *     Status?: list<'ACTIVE'|'INACTIVE'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result recallBenefitApplication(array $args = [])
 * @phpstan-method \Aws\Result recallBenefitApplication(array{Catalog?: string, ClientToken?: string, Identifier?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise recallBenefitApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recallBenefitApplicationAsync(array{Catalog?: string, ClientToken?: string, Identifier?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result submitBenefitApplication(array $args = [])
 * @phpstan-method \Aws\Result submitBenefitApplication(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise submitBenefitApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitBenefitApplicationAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBenefitApplication(array $args = [])
 * @phpstan-method \Aws\Result updateBenefitApplication(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Identifier?: string,
 *     Revision?: string,
 *     BenefitApplicationDetails?: array,
 *     PartnerContacts?: list<array{Email?: string, FirstName?: string, LastName?: string, BusinessTitle?: string, Phone?: string, ...}>,
 *     FileDetails?: list<array{FileURI?: string, BusinessUseCase?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBenefitApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBenefitApplicationAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Identifier?: string,
 *     Revision?: string,
 *     BenefitApplicationDetails?: array,
 *     PartnerContacts?: list<array{Email?: string, FirstName?: string, LastName?: string, BusinessTitle?: string, Phone?: string, ...}>,
 *     FileDetails?: list<array{FileURI?: string, BusinessUseCase?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class PartnerCentralBenefitsClient extends AwsClient {}
