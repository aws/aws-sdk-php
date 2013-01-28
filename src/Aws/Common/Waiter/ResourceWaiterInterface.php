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

namespace Aws\Common\Waiter;

use Aws\Common\Client\AwsClientInterface;

/**
 * Interface used in conjunction with clients to wait on a resource
 */
interface ResourceWaiterInterface extends WaiterInterface
{
		/**
		 * Set the client associated with the waiter
		 *
		 * @param AwsClientInterface $client Client to use with the waiter
		 *
		 * @return self
		 */
		public function setClient(AwsClientInterface $client);

		/**
		 * Set the way in which a resource is uniquely identified
		 *
		 * @param string $resourceId Resource ID
		 *
		 * @return self
		 */
		public function setResourceId($resourceId);
}
