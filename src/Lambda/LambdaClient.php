<?php
namespace Aws\Lambda;

use Aws\AwsClient;

/**
 * This client is used to interact with AWS Lambda
 *
 * @method \Aws\Result addPermission(array $args = [])
 * @method \Aws\Result createEventSourceMapping(array $args = [])
 * @method \Aws\Result createFunction(array $args = [])
 * @method \Aws\Result deleteEventSourceMapping(array $args = [])
 * @method \Aws\Result deleteFunction(array $args = [])
 * @method \Aws\Result getEventSourceMapping(array $args = [])
 * @method \Aws\Result getFunction(array $args = [])
 * @method \Aws\Result getFunctionConfiguration(array $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @method \Aws\Result invoke(array $args = [])
 * @method \Aws\Result invokeAsync(array $args = [])
 * @method \Aws\Result listEventSourceMappings(array $args = [])
 * @method \Aws\Result listFunctions(array $args = [])
 * @method \Aws\Result removePermission(array $args = [])
 * @method \Aws\Result updateEventSourceMapping(array $args = [])
 * @method \Aws\Result updateFunctionCode(array $args = [])
 * @method \Aws\Result updateFunctionConfiguration(array $args = [])
 */
class LambdaClient extends AwsClient {}
