<?php
namespace Aws\MarketplaceCommerceAnalytics;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Commerce Analytics** service.
 *
 * @method \Aws\Result generateDataSet(array $args = [])
 * @phpstan-method \Aws\Result generateDataSet(array{
 *     dataSetType?: 'customer_profile_by_geography'|'customer_profile_by_industry'|'customer_profile_by_revenue'|'customer_subscriber_annual_subscriptions'|'customer_subscriber_hourly_monthly_subscriptions'|'daily_business_canceled_product_subscribers'|'daily_business_fees'|'daily_business_free_trial_conversions'|'daily_business_new_instances'|'daily_business_new_product_subscribers'|'daily_business_usage_by_instance_type'|'disbursed_amount_by_age_of_disbursed_funds'|'disbursed_amount_by_age_of_past_due_funds'|'disbursed_amount_by_age_of_uncollected_funds'|'disbursed_amount_by_customer_geo'|'disbursed_amount_by_instance_hours'|'disbursed_amount_by_product'|'disbursed_amount_by_product_with_uncollected_funds'|'disbursed_amount_by_uncollected_funds_breakdown'|'monthly_revenue_annual_subscriptions'|'monthly_revenue_billing_and_revenue_data'|'monthly_revenue_field_demonstration_usage'|'monthly_revenue_flexible_payment_schedule'|'sales_compensation_billed_revenue'|'us_sales_and_use_tax_records',
 *     dataSetPublicationDate?: int|string|\DateTimeInterface,
 *     roleNameArn?: string,
 *     destinationS3BucketName?: string,
 *     destinationS3Prefix?: string,
 *     snsTopicArn?: string,
 *     customerDefinedValues?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateDataSetAsync(array{
 *     dataSetType?: 'customer_profile_by_geography'|'customer_profile_by_industry'|'customer_profile_by_revenue'|'customer_subscriber_annual_subscriptions'|'customer_subscriber_hourly_monthly_subscriptions'|'daily_business_canceled_product_subscribers'|'daily_business_fees'|'daily_business_free_trial_conversions'|'daily_business_new_instances'|'daily_business_new_product_subscribers'|'daily_business_usage_by_instance_type'|'disbursed_amount_by_age_of_disbursed_funds'|'disbursed_amount_by_age_of_past_due_funds'|'disbursed_amount_by_age_of_uncollected_funds'|'disbursed_amount_by_customer_geo'|'disbursed_amount_by_instance_hours'|'disbursed_amount_by_product'|'disbursed_amount_by_product_with_uncollected_funds'|'disbursed_amount_by_uncollected_funds_breakdown'|'monthly_revenue_annual_subscriptions'|'monthly_revenue_billing_and_revenue_data'|'monthly_revenue_field_demonstration_usage'|'monthly_revenue_flexible_payment_schedule'|'sales_compensation_billed_revenue'|'us_sales_and_use_tax_records',
 *     dataSetPublicationDate?: int|string|\DateTimeInterface,
 *     roleNameArn?: string,
 *     destinationS3BucketName?: string,
 *     destinationS3Prefix?: string,
 *     snsTopicArn?: string,
 *     customerDefinedValues?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSupportDataExport(array $args = [])
 * @phpstan-method \Aws\Result startSupportDataExport(array{
 *     dataSetType?: 'customer_support_contacts_data'|'test_customer_support_contacts_data',
 *     fromDate?: int|string|\DateTimeInterface,
 *     roleNameArn?: string,
 *     destinationS3BucketName?: string,
 *     destinationS3Prefix?: string,
 *     snsTopicArn?: string,
 *     customerDefinedValues?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSupportDataExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSupportDataExportAsync(array{
 *     dataSetType?: 'customer_support_contacts_data'|'test_customer_support_contacts_data',
 *     fromDate?: int|string|\DateTimeInterface,
 *     roleNameArn?: string,
 *     destinationS3BucketName?: string,
 *     destinationS3Prefix?: string,
 *     snsTopicArn?: string,
 *     customerDefinedValues?: array<string, string>,
 *     ...,
 * } $args = [])
 */
class MarketplaceCommerceAnalyticsClient extends AwsClient {}
