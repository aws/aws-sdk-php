<?php
namespace Aws\Uxc;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS User Experience Customization** service.
 * @method \Aws\Result getAccountCustomizations(array $args = [])
 * @phpstan-method \Aws\Result getAccountCustomizations(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountCustomizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountCustomizationsAsync(array{...} $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result updateAccountCustomizations(array $args = [])
 * @phpstan-method \Aws\Result updateAccountCustomizations(array{
 *     accountColor?: 'darkBlue'|'green'|'lightBlue'|'none'|'orange'|'pink'|'purple'|'red'|'teal'|'yellow',
 *     visibleServices?: list<string>,
 *     visibleRegions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountCustomizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountCustomizationsAsync(array{
 *     accountColor?: 'darkBlue'|'green'|'lightBlue'|'none'|'orange'|'pink'|'purple'|'red'|'teal'|'yellow',
 *     visibleServices?: list<string>,
 *     visibleRegions?: list<string>,
 *     ...,
 * } $args = [])
 */
class UxcClient extends AwsClient {}
