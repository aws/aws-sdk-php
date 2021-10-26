<?php
namespace Aws\FinSpaceData;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **FinSpace Public API** service.
 * @method \Aws\Result createChangeset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChangesetAsync(array $args = [])
 * @method \Aws\Result getProgrammaticAccessCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getProgrammaticAccessCredentialsAsync(array $args = [])
 * @method \Aws\Result getWorkingLocation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkingLocationAsync(array $args = [])
 */
class FinSpaceDataClient extends AwsClient {}
