<?php
namespace Aws\InspectorScan;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Inspector Scan** service.
 * @method \Aws\Result scanSbom(array $args = [])
 * @phpstan-method \Aws\Result scanSbom(array{sbom?: array, outputFormat?: 'CYCLONE_DX_1_5'|'INSPECTOR'|'INSPECTOR_ALT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise scanSbomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise scanSbomAsync(array{sbom?: array, outputFormat?: 'CYCLONE_DX_1_5'|'INSPECTOR'|'INSPECTOR_ALT', ...} $args = [])
 */
class InspectorScanClient extends AwsClient {}
