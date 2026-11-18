<?php
namespace Aws\AbuseSignal;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Abuse Signal API** service.
 * @method \Aws\Result createAbuseReport(array $args = [])
 * @phpstan-method \Aws\Result createAbuseReport(array{report?: array{xarf?: array, ...}, correlationId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAbuseReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAbuseReportAsync(array{report?: array{xarf?: array, ...}, correlationId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getAbuseReportStatus(array $args = [])
 * @phpstan-method \Aws\Result getAbuseReportStatus(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAbuseReportStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAbuseReportStatusAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result listAbuseReportStatuses(array $args = [])
 * @phpstan-method \Aws\Result listAbuseReportStatuses(array{correlationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAbuseReportStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAbuseReportStatusesAsync(array{correlationId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 */
class AbuseSignalClient extends AwsClient {}
