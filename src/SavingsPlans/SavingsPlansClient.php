<?php
namespace Aws\SavingsPlans;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Savings Plans** service.
 * @method \Aws\Result createSavingsPlan(array $args = [])
 * @phpstan-method \Aws\Result createSavingsPlan(array{
 *     savingsPlanOfferingId?: string,
 *     commitment?: string,
 *     upfrontPaymentAmount?: string,
 *     purchaseTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSavingsPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSavingsPlanAsync(array{
 *     savingsPlanOfferingId?: string,
 *     commitment?: string,
 *     upfrontPaymentAmount?: string,
 *     purchaseTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteQueuedSavingsPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteQueuedSavingsPlan(array{savingsPlanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueuedSavingsPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueuedSavingsPlanAsync(array{savingsPlanId?: string, ...} $args = [])
 * @method \Aws\Result describeSavingsPlanRates(array $args = [])
 * @phpstan-method \Aws\Result describeSavingsPlanRates(array{
 *     savingsPlanId?: string,
 *     filters?: list<array{
 *         name?: 'instanceType'|'operation'|'productDescription'|'productType'|'region'|'serviceCode'|'tenancy'|'usageType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSavingsPlanRatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSavingsPlanRatesAsync(array{
 *     savingsPlanId?: string,
 *     filters?: list<array{
 *         name?: 'instanceType'|'operation'|'productDescription'|'productType'|'region'|'serviceCode'|'tenancy'|'usageType',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSavingsPlans(array $args = [])
 * @phpstan-method \Aws\Result describeSavingsPlans(array{
 *     savingsPlanArns?: list<string>,
 *     savingsPlanIds?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     states?: list<'active'|'payment-failed'|'payment-pending'|'pending-return'|'queued'|'queued-deleted'|'retired'|'returned'>,
 *     filters?: list<array{
 *         name?: 'commitment'|'ec2-instance-family'|'end'|'instance-family'|'payment-option'|'region'|'savings-plan-type'|'start'|'term'|'upfront',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSavingsPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSavingsPlansAsync(array{
 *     savingsPlanArns?: list<string>,
 *     savingsPlanIds?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     states?: list<'active'|'payment-failed'|'payment-pending'|'pending-return'|'queued'|'queued-deleted'|'retired'|'returned'>,
 *     filters?: list<array{
 *         name?: 'commitment'|'ec2-instance-family'|'end'|'instance-family'|'payment-option'|'region'|'savings-plan-type'|'start'|'term'|'upfront',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSavingsPlansOfferingRates(array $args = [])
 * @phpstan-method \Aws\Result describeSavingsPlansOfferingRates(array{
 *     savingsPlanOfferingIds?: list<string>,
 *     savingsPlanPaymentOptions?: list<'All Upfront'|'No Upfront'|'Partial Upfront'>,
 *     savingsPlanTypes?: list<'Compute'|'Database'|'EC2Instance'|'SageMaker'>,
 *     products?: list<'DMS'|'DSQL'|'DocDB'|'DynamoDB'|'EC2'|'ElastiCache'|'Fargate'|'Keyspaces'|'Lambda'|'Neptune'|'OpenSearch'|'RDS'|'SageMaker'|'Timestream'>,
 *     serviceCodes?: list<'AWSDatabaseMigrationSvc'|'AWSLambda'|'AmazonDocDB'|'AmazonDynamoDB'|'AmazonEC2'|'AmazonECS'|'AmazonEKS'|'AmazonES'|'AmazonElastiCache'|'AmazonMCS'|'AmazonNeptune'|'AmazonRDS'|'AmazonSageMaker'|'AmazonTimestream'|'AuroraDSQL'>,
 *     usageTypes?: list<string>,
 *     operations?: list<string>,
 *     filters?: list<array{
 *         name?: 'instanceFamily'|'instanceType'|'productDescription'|'productId'|'region'|'tenancy',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSavingsPlansOfferingRatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSavingsPlansOfferingRatesAsync(array{
 *     savingsPlanOfferingIds?: list<string>,
 *     savingsPlanPaymentOptions?: list<'All Upfront'|'No Upfront'|'Partial Upfront'>,
 *     savingsPlanTypes?: list<'Compute'|'Database'|'EC2Instance'|'SageMaker'>,
 *     products?: list<'DMS'|'DSQL'|'DocDB'|'DynamoDB'|'EC2'|'ElastiCache'|'Fargate'|'Keyspaces'|'Lambda'|'Neptune'|'OpenSearch'|'RDS'|'SageMaker'|'Timestream'>,
 *     serviceCodes?: list<'AWSDatabaseMigrationSvc'|'AWSLambda'|'AmazonDocDB'|'AmazonDynamoDB'|'AmazonEC2'|'AmazonECS'|'AmazonEKS'|'AmazonES'|'AmazonElastiCache'|'AmazonMCS'|'AmazonNeptune'|'AmazonRDS'|'AmazonSageMaker'|'AmazonTimestream'|'AuroraDSQL'>,
 *     usageTypes?: list<string>,
 *     operations?: list<string>,
 *     filters?: list<array{
 *         name?: 'instanceFamily'|'instanceType'|'productDescription'|'productId'|'region'|'tenancy',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSavingsPlansOfferings(array $args = [])
 * @phpstan-method \Aws\Result describeSavingsPlansOfferings(array{
 *     offeringIds?: list<string>,
 *     paymentOptions?: list<'All Upfront'|'No Upfront'|'Partial Upfront'>,
 *     productType?: 'DMS'|'DSQL'|'DocDB'|'DynamoDB'|'EC2'|'ElastiCache'|'Fargate'|'Keyspaces'|'Lambda'|'Neptune'|'OpenSearch'|'RDS'|'SageMaker'|'Timestream',
 *     planTypes?: list<'Compute'|'Database'|'EC2Instance'|'SageMaker'>,
 *     durations?: list<int>,
 *     currencies?: list<'CNY'|'EUR'|'USD'>,
 *     descriptions?: list<string>,
 *     serviceCodes?: list<string>,
 *     usageTypes?: list<string>,
 *     operations?: list<string>,
 *     filters?: list<array{name?: 'instanceFamily'|'region', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSavingsPlansOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSavingsPlansOfferingsAsync(array{
 *     offeringIds?: list<string>,
 *     paymentOptions?: list<'All Upfront'|'No Upfront'|'Partial Upfront'>,
 *     productType?: 'DMS'|'DSQL'|'DocDB'|'DynamoDB'|'EC2'|'ElastiCache'|'Fargate'|'Keyspaces'|'Lambda'|'Neptune'|'OpenSearch'|'RDS'|'SageMaker'|'Timestream',
 *     planTypes?: list<'Compute'|'Database'|'EC2Instance'|'SageMaker'>,
 *     durations?: list<int>,
 *     currencies?: list<'CNY'|'EUR'|'USD'>,
 *     descriptions?: list<string>,
 *     serviceCodes?: list<string>,
 *     usageTypes?: list<string>,
 *     operations?: list<string>,
 *     filters?: list<array{name?: 'instanceFamily'|'region', values?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result returnSavingsPlan(array $args = [])
 * @phpstan-method \Aws\Result returnSavingsPlan(array{savingsPlanId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise returnSavingsPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise returnSavingsPlanAsync(array{savingsPlanId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class SavingsPlansClient extends AwsClient {}
