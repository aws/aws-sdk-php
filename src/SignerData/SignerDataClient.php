<?php
namespace Aws\SignerData;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Signer Data Plane** service.
 * @method \Aws\Result getRevocationStatus(array $args = [])
 * @phpstan-method \Aws\Result getRevocationStatus(array{
 *     signatureTimestamp?: int|string|\DateTimeInterface,
 *     platformId?: string,
 *     profileVersionArn?: string,
 *     jobArn?: string,
 *     certificateHashes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevocationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevocationStatusAsync(array{
 *     signatureTimestamp?: int|string|\DateTimeInterface,
 *     platformId?: string,
 *     profileVersionArn?: string,
 *     jobArn?: string,
 *     certificateHashes?: list<string>,
 *     ...,
 * } $args = [])
 */
class SignerDataClient extends AwsClient {}
