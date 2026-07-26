<?php
namespace Aws\MigrationHubConfig;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub Config** service.
 * @method \Aws\Result createHomeRegionControl(array $args = [])
 * @phpstan-method \Aws\Result createHomeRegionControl(array{HomeRegion?: string, Target?: array{Type?: 'ACCOUNT', Id?: string, ...}, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createHomeRegionControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHomeRegionControlAsync(array{HomeRegion?: string, Target?: array{Type?: 'ACCOUNT', Id?: string, ...}, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result deleteHomeRegionControl(array $args = [])
 * @phpstan-method \Aws\Result deleteHomeRegionControl(array{ControlId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHomeRegionControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHomeRegionControlAsync(array{ControlId?: string, ...} $args = [])
 * @method \Aws\Result describeHomeRegionControls(array $args = [])
 * @phpstan-method \Aws\Result describeHomeRegionControls(array{
 *     ControlId?: string,
 *     HomeRegion?: string,
 *     Target?: array{Type?: 'ACCOUNT', Id?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHomeRegionControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHomeRegionControlsAsync(array{
 *     ControlId?: string,
 *     HomeRegion?: string,
 *     Target?: array{Type?: 'ACCOUNT', Id?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getHomeRegion(array $args = [])
 * @phpstan-method \Aws\Result getHomeRegion(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHomeRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHomeRegionAsync(array{...} $args = [])
 */
class MigrationHubConfigClient extends AwsClient {}
