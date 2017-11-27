<?php
namespace Aws\MediaStore;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaStore** service.
 * @method \Aws\Result createContainer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerAsync(array $args = [])
 * @method \Aws\Result deleteContainer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerAsync(array $args = [])
 * @method \Aws\Result deleteContainerPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerPolicyAsync(array $args = [])
 * @method \Aws\Result describeContainer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContainerAsync(array $args = [])
 * @method \Aws\Result getContainerPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerPolicyAsync(array $args = [])
 * @method \Aws\Result listContainers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainersAsync(array $args = [])
 * @method \Aws\Result putContainerPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putContainerPolicyAsync(array $args = [])
 */
class MediaStoreClient extends AwsClient {}
