<?php
namespace Aws\Payments;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Payments** service.
 * @method \Aws\Result batchGetFinancialRecord(array $args = [])
 * @phpstan-method \Aws\Result batchGetFinancialRecord(array{keys?: list<array{identifier?: string, invoiceIdentifier?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFinancialRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFinancialRecordAsync(array{keys?: list<array{identifier?: string, invoiceIdentifier?: string, ...}>, ...} $args = [])
 * @method \Aws\Result getAccountBalance(array $args = [])
 * @phpstan-method \Aws\Result getAccountBalance(array{
 *     balanceType?: 'INVOICES_DUE'|'INVOICES_PAST_DUE'|'OUTSTANDING_CREDIT_MEMOS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountBalanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountBalanceAsync(array{
 *     balanceType?: 'INVOICES_DUE'|'INVOICES_PAST_DUE'|'OUTSTANDING_CREDIT_MEMOS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFinancialRecord(array $args = [])
 * @phpstan-method \Aws\Result getFinancialRecord(array{identifier?: string, invoiceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFinancialRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFinancialRecordAsync(array{identifier?: string, invoiceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getPaymentInstrument(array $args = [])
 * @phpstan-method \Aws\Result getPaymentInstrument(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPaymentInstrumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPaymentInstrumentAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result listFinancialRecords(array $args = [])
 * @phpstan-method \Aws\Result listFinancialRecords(array{
 *     types?: list<'CREDIT_MEMO'|'INVOICE'>,
 *     settlementStatuses?: list<'CLOSED'|'OPEN'>,
 *     issuedAfter?: int|string|\DateTimeInterface,
 *     issuedBefore?: int|string|\DateTimeInterface,
 *     sortBy?: 'ISSUED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFinancialRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFinancialRecordsAsync(array{
 *     types?: list<'CREDIT_MEMO'|'INVOICE'>,
 *     settlementStatuses?: list<'CLOSED'|'OPEN'>,
 *     issuedAfter?: int|string|\DateTimeInterface,
 *     issuedBefore?: int|string|\DateTimeInterface,
 *     sortBy?: 'ISSUED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPaymentInstruments(array $args = [])
 * @phpstan-method \Aws\Result listPaymentInstruments(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPaymentInstrumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPaymentInstrumentsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 */
class PaymentsClient extends AwsClient {}
