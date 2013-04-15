<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\DynamoDb\Exception;

/**
 * Your request rate is too high, or the request is too large. The AWS SDKs for Amazon DynamoDB automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests, using the strategies listed in Error Retries and Exponential Backoff of the Amazon DynamoDB Developer Guide.
 */
class ProvisionedThroughputExceededException extends DynamoDbException {}
