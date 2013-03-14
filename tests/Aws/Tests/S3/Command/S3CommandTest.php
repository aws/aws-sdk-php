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

namespace Aws\Tests\S3\Command;

use Guzzle\Http\Message\Response;

/**
 * @covers Aws\S3\Command\S3Command
 */
class S3CommandTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testPreparesAndCreatesSignatures()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $command = $client->getCommand('GetObject', array(
            'Bucket' => 'foobazbar',
            'Key'    => 'test'
        ));
        $url = $command->createPresignedUrl('+100');
        $this->assertContains('foobazbar', $url);
        $this->assertContains('test', $url);
        $this->assertContains('AWSAccessKeyId', $url);
        $this->assertContains('Expires', $url);
        $this->assertContains('Signature', $url);
    }

    public function testAddsUrlToPutObject()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $command = $client->getCommand('PutObject', array(
            'Bucket' => 'foobazbar',
            'Key'    => 'test',
            'Body'   => 'test'
        ));
        $this->setMockResponse($client, array(
            new Response(200)
        ));
        $result = $command->execute();
        $this->assertEquals('https://foobazbar.s3.amazonaws.com/test', $result['ObjectURL']);
    }
}
