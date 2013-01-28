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

namespace Aws\Tests\Common\Model\MultipartUpload;

use Aws\Common\Model\MultipartUpload\AbstractUploadId;

/**
 * Concrete test fixture
 */
class UploadId extends AbstractUploadId
{
		protected static $expectedValues = array('foo' => null, 'bar' => null);
}

/**
 * @covers Aws\Common\Model\MultipartUpload\AbstractUploadId
 */
class AbstractUploadIdTest extends \Guzzle\Tests\GuzzleTestCase
{
		public function testUploadIdCorrectlyManagesData()
		{
				$startingParams = array('foo' => 1, 'bar' => 2);
				$uploadId = UploadId::fromParams($startingParams);
				$serialized = serialize($uploadId);
				$unserialized = unserialize($serialized);
				$endingParams = $unserialized->toParams();

				$this->assertEquals($startingParams, $endingParams);
		}

		/**
		 * @expectedException \InvalidArgumentException
		 */
		public function testThrowsExceptionWhenMissingData()
		{
				UploadId::fromParams(array('wrongKey' => 'dummyData'));
		}
}
