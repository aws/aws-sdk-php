<?php
namespace Aws\MarketplaceAgreement;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Agreement Service** service.
 * @method \Aws\Result acceptAgreementCancellationRequest(array $args = [])
 * @phpstan-method \Aws\Result acceptAgreementCancellationRequest(array{agreementId?: string, agreementCancellationRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAgreementCancellationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptAgreementCancellationRequestAsync(array{agreementId?: string, agreementCancellationRequestId?: string, ...} $args = [])
 * @method \Aws\Result acceptAgreementPaymentRequest(array $args = [])
 * @phpstan-method \Aws\Result acceptAgreementPaymentRequest(array{paymentRequestId?: string, agreementId?: string, purchaseOrderReference?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAgreementPaymentRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptAgreementPaymentRequestAsync(array{paymentRequestId?: string, agreementId?: string, purchaseOrderReference?: string, ...} $args = [])
 * @method \Aws\Result acceptAgreementRequest(array $args = [])
 * @phpstan-method \Aws\Result acceptAgreementRequest(array{
 *     agreementRequestId?: string,
 *     purchaseOrders?: list<array{chargeId?: string, chargeRevision?: int, agreementId?: string, purchaseOrderReference?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAgreementRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptAgreementRequestAsync(array{
 *     agreementRequestId?: string,
 *     purchaseOrders?: list<array{chargeId?: string, chargeRevision?: int, agreementId?: string, purchaseOrderReference?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchCreateBillingAdjustmentRequest(array $args = [])
 * @phpstan-method \Aws\Result batchCreateBillingAdjustmentRequest(array{
 *     billingAdjustmentRequestEntries?: list<array{
 *         agreementId?: string,
 *         originalInvoiceId?: string,
 *         adjustmentAmount?: string,
 *         currencyCode?: string,
 *         adjustmentReasonCode?: 'ALTERNATIVE_PROCUREMENT_CHANNEL'|'BUYER_DISSATISFACTION'|'INCORRECT_METERING'|'INCORRECT_TERMS_ACCEPTED'|'OTHER'|'TEST_ENVIRONMENT_CHARGES'|'UNINTENDED_RENEWAL',
 *         description?: string,
 *         clientToken?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateBillingAdjustmentRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateBillingAdjustmentRequestAsync(array{
 *     billingAdjustmentRequestEntries?: list<array{
 *         agreementId?: string,
 *         originalInvoiceId?: string,
 *         adjustmentAmount?: string,
 *         currencyCode?: string,
 *         adjustmentReasonCode?: 'ALTERNATIVE_PROCUREMENT_CHANNEL'|'BUYER_DISSATISFACTION'|'INCORRECT_METERING'|'INCORRECT_TERMS_ACCEPTED'|'OTHER'|'TEST_ENVIRONMENT_CHARGES'|'UNINTENDED_RENEWAL',
 *         description?: string,
 *         clientToken?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelAgreement(array $args = [])
 * @phpstan-method \Aws\Result cancelAgreement(array{agreementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelAgreementAsync(array{agreementId?: string, ...} $args = [])
 * @method \Aws\Result cancelAgreementCancellationRequest(array $args = [])
 * @phpstan-method \Aws\Result cancelAgreementCancellationRequest(array{agreementId?: string, agreementCancellationRequestId?: string, cancellationReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAgreementCancellationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelAgreementCancellationRequestAsync(array{agreementId?: string, agreementCancellationRequestId?: string, cancellationReason?: string, ...} $args = [])
 * @method \Aws\Result cancelAgreementPaymentRequest(array $args = [])
 * @phpstan-method \Aws\Result cancelAgreementPaymentRequest(array{paymentRequestId?: string, agreementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAgreementPaymentRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelAgreementPaymentRequestAsync(array{paymentRequestId?: string, agreementId?: string, ...} $args = [])
 * @method \Aws\Result createAgreementRequest(array $args = [])
 * @phpstan-method \Aws\Result createAgreementRequest(array{
 *     clientToken?: string,
 *     intent?: 'AMEND'|'NEW'|'REPLACE',
 *     requestedTerms?: list<array{id?: string, configuration?: array, ...}>,
 *     sourceAgreementIdentifier?: string,
 *     agreementProposalIdentifier?: string,
 *     taxConfiguration?: array{taxEstimation?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgreementRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgreementRequestAsync(array{
 *     clientToken?: string,
 *     intent?: 'AMEND'|'NEW'|'REPLACE',
 *     requestedTerms?: list<array{id?: string, configuration?: array, ...}>,
 *     sourceAgreementIdentifier?: string,
 *     agreementProposalIdentifier?: string,
 *     taxConfiguration?: array{taxEstimation?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAgreement(array $args = [])
 * @phpstan-method \Aws\Result describeAgreement(array{agreementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAgreementAsync(array{agreementId?: string, ...} $args = [])
 * @method \Aws\Result getAgreementCancellationRequest(array $args = [])
 * @phpstan-method \Aws\Result getAgreementCancellationRequest(array{agreementCancellationRequestId?: string, agreementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgreementCancellationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgreementCancellationRequestAsync(array{agreementCancellationRequestId?: string, agreementId?: string, ...} $args = [])
 * @method \Aws\Result getAgreementEntitlements(array $args = [])
 * @phpstan-method \Aws\Result getAgreementEntitlements(array{agreementId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgreementEntitlementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgreementEntitlementsAsync(array{agreementId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getAgreementPaymentRequest(array $args = [])
 * @phpstan-method \Aws\Result getAgreementPaymentRequest(array{paymentRequestId?: string, agreementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgreementPaymentRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgreementPaymentRequestAsync(array{paymentRequestId?: string, agreementId?: string, ...} $args = [])
 * @method \Aws\Result getAgreementTerms(array $args = [])
 * @phpstan-method \Aws\Result getAgreementTerms(array{agreementId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgreementTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgreementTermsAsync(array{agreementId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getBillingAdjustmentRequest(array $args = [])
 * @phpstan-method \Aws\Result getBillingAdjustmentRequest(array{agreementId?: string, billingAdjustmentRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBillingAdjustmentRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBillingAdjustmentRequestAsync(array{agreementId?: string, billingAdjustmentRequestId?: string, ...} $args = [])
 * @method \Aws\Result listAgreementCancellationRequests(array $args = [])
 * @phpstan-method \Aws\Result listAgreementCancellationRequests(array{
 *     partyType?: string,
 *     agreementId?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'PENDING_APPROVAL'|'REJECTED'|'VALIDATION_FAILED',
 *     agreementType?: string,
 *     catalog?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgreementCancellationRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgreementCancellationRequestsAsync(array{
 *     partyType?: string,
 *     agreementId?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'PENDING_APPROVAL'|'REJECTED'|'VALIDATION_FAILED',
 *     agreementType?: string,
 *     catalog?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgreementCharges(array $args = [])
 * @phpstan-method \Aws\Result listAgreementCharges(array{
 *     catalog?: string,
 *     agreementId?: string,
 *     agreementType?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgreementChargesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgreementChargesAsync(array{
 *     catalog?: string,
 *     agreementId?: string,
 *     agreementType?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgreementInvoiceLineItems(array $args = [])
 * @phpstan-method \Aws\Result listAgreementInvoiceLineItems(array{
 *     agreementId?: string,
 *     groupBy?: 'INVOICE_ID',
 *     invoiceId?: string,
 *     invoiceType?: 'CREDIT_MEMO'|'INVOICE',
 *     invoiceBillingPeriod?: array{month?: int, year?: int, ...},
 *     beforeIssuedTime?: int|string|\DateTimeInterface,
 *     afterIssuedTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgreementInvoiceLineItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgreementInvoiceLineItemsAsync(array{
 *     agreementId?: string,
 *     groupBy?: 'INVOICE_ID',
 *     invoiceId?: string,
 *     invoiceType?: 'CREDIT_MEMO'|'INVOICE',
 *     invoiceBillingPeriod?: array{month?: int, year?: int, ...},
 *     beforeIssuedTime?: int|string|\DateTimeInterface,
 *     afterIssuedTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgreementPaymentRequests(array $args = [])
 * @phpstan-method \Aws\Result listAgreementPaymentRequests(array{
 *     partyType?: string,
 *     agreementType?: string,
 *     catalog?: string,
 *     agreementId?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'PENDING_APPROVAL'|'REJECTED'|'VALIDATING'|'VALIDATION_FAILED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgreementPaymentRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgreementPaymentRequestsAsync(array{
 *     partyType?: string,
 *     agreementType?: string,
 *     catalog?: string,
 *     agreementId?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'PENDING_APPROVAL'|'REJECTED'|'VALIDATING'|'VALIDATION_FAILED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBillingAdjustmentRequests(array $args = [])
 * @phpstan-method \Aws\Result listBillingAdjustmentRequests(array{
 *     agreementId?: string,
 *     status?: 'COMPLETED'|'PENDING'|'VALIDATION_FAILED',
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     catalog?: string,
 *     agreementType?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillingAdjustmentRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillingAdjustmentRequestsAsync(array{
 *     agreementId?: string,
 *     status?: 'COMPLETED'|'PENDING'|'VALIDATION_FAILED',
 *     createdAfter?: int|string|\DateTimeInterface,
 *     createdBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     catalog?: string,
 *     agreementType?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectAgreementCancellationRequest(array $args = [])
 * @phpstan-method \Aws\Result rejectAgreementCancellationRequest(array{agreementId?: string, agreementCancellationRequestId?: string, rejectionReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectAgreementCancellationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectAgreementCancellationRequestAsync(array{agreementId?: string, agreementCancellationRequestId?: string, rejectionReason?: string, ...} $args = [])
 * @method \Aws\Result rejectAgreementPaymentRequest(array $args = [])
 * @phpstan-method \Aws\Result rejectAgreementPaymentRequest(array{paymentRequestId?: string, agreementId?: string, rejectionReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectAgreementPaymentRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectAgreementPaymentRequestAsync(array{paymentRequestId?: string, agreementId?: string, rejectionReason?: string, ...} $args = [])
 * @method \Aws\Result searchAgreements(array $args = [])
 * @phpstan-method \Aws\Result searchAgreements(array{
 *     catalog?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     sort?: array{sortBy?: string, sortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAgreementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAgreementsAsync(array{
 *     catalog?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     sort?: array{sortBy?: string, sortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendAgreementCancellationRequest(array $args = [])
 * @phpstan-method \Aws\Result sendAgreementCancellationRequest(array{
 *     agreementId?: string,
 *     reasonCode?: 'ALTERNATIVE_PROCUREMENT_CHANNEL'|'BUYER_DISSATISFACTION'|'INCORRECT_TERMS_ACCEPTED'|'OTHER'|'PRODUCT_DISCONTINUED'|'REPLACING_AGREEMENT'|'TEST_AGREEMENT'|'UNINTENDED_RENEWAL',
 *     clientToken?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendAgreementCancellationRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendAgreementCancellationRequestAsync(array{
 *     agreementId?: string,
 *     reasonCode?: 'ALTERNATIVE_PROCUREMENT_CHANNEL'|'BUYER_DISSATISFACTION'|'INCORRECT_TERMS_ACCEPTED'|'OTHER'|'PRODUCT_DISCONTINUED'|'REPLACING_AGREEMENT'|'TEST_AGREEMENT'|'UNINTENDED_RENEWAL',
 *     clientToken?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendAgreementPaymentRequest(array $args = [])
 * @phpstan-method \Aws\Result sendAgreementPaymentRequest(array{
 *     clientToken?: string,
 *     agreementId?: string,
 *     termId?: string,
 *     name?: string,
 *     chargeAmount?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendAgreementPaymentRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendAgreementPaymentRequestAsync(array{
 *     clientToken?: string,
 *     agreementId?: string,
 *     termId?: string,
 *     name?: string,
 *     chargeAmount?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePurchaseOrders(array $args = [])
 * @phpstan-method \Aws\Result updatePurchaseOrders(array{
 *     purchaseOrders?: list<array{chargeId?: string, chargeRevision?: int, agreementId?: string, purchaseOrderReference?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePurchaseOrdersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePurchaseOrdersAsync(array{
 *     purchaseOrders?: list<array{chargeId?: string, chargeRevision?: int, agreementId?: string, purchaseOrderReference?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class MarketplaceAgreementClient extends AwsClient {}
