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

namespace Aws\Tests\Kinesis\Integration;

/**
 * @group integration
 * @group example
 */
class Kinesis_20131104_Test extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\Kinesis\KinesisClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('kinesis');
    }

    /**
     * Execute the CreateStream operation
     *
     * @example Aws\Kinesis\KinesisClient::createStream
     */
    public function testCreateStream()
    {
        $client = $this->client;

        // @begin
        $client->createStream(array(
            'StreamName' => 'php-test-stream',
            'ShardCount' => 1,
        ));
    }

    /**
     * Execute the DeleteStream operation
     *
     * @example Aws\Kinesis\KinesisClient::deleteStream
     */
    public function testDeleteStream()
    {
        $client = $this->client;

        // @begin
        $client->deleteStream(array(
            'StreamName' => 'php-test-stream',
        ));
    }
}
