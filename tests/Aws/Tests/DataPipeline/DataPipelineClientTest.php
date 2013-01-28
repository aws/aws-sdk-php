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

namespace Aws\Tests\DataPipeline;

use Aws\Common\Enum\ClientOptions;
use Aws\DataPipeline\DataPipelineClient;

/**
 * @covers Aws\DataPipeline\DataPipelineClient
 */
class DataPipelineClientTest extends \Guzzle\Tests\GuzzleTestCase
{
		public function testFactoryInitializesClient()
		{
				$client = DataPipelineClient::factory(array(
						ClientOptions::KEY		=> 'foo',
						ClientOptions::SECRET => 'bar',
						ClientOptions::REGION => 'us-east-1'
				));

				$this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $this->readAttribute($client, 'signature'));
				$this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
				$this->assertEquals('https://datapipeline.us-east-1.amazonaws.com', $client->getBaseUrl());
		}

		public function testLongPollingEnabledForPollForWorkOperation()
		{
				$client = DataPipelineClient::factory(array(
						ClientOptions::KEY		=> 'foo',
						ClientOptions::SECRET => 'bar',
						ClientOptions::REGION => 'us-east-1'
				));

				$command = $client->getCommand('PollForTask');
				$curlopts = $command->get('curl.options') ?: array();

				$this->assertArrayHasKey('CURLOPT_TIMEOUT', $curlopts);
				$this->assertEquals($curlopts['CURLOPT_TIMEOUT'], 90);
		}
}
