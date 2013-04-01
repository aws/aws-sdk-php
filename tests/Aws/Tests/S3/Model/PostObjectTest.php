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

namespace Aws\Tests\S3;

use Aws\S3\Enum\CannedAcl;
use Aws\S3\Model\PostObject;
use Aws\S3\S3Client;

/**
 * @covers Aws\S3\Model\PostObject
 */
class PostObjectTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var S3Client
     */
    protected $client;

    public function setUp()
    {
        $credentials = $this->getMockBuilder('Aws\Common\Credentials\Credentials')
            ->disableOriginalConstructor()
            ->getMock();
        $credentials->expects($this->any())
            ->method('getAccessKeyId')
            ->will($this->returnValue('AKIAXXXXXXXXXXXXXXX'));
        $credentials->expects($this->any())
            ->method('getSecretKey')
            ->will($this->returnValue('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'));

        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3');
        $class = new \ReflectionObject($client);
        $property = $class->getProperty('credentials');
        $property->setAccessible(true);
        $property->setValue($client, $credentials);

        $this->client = $client;
    }

    public function getDataForPostObjectTest()
    {
        $cases = array();

        // Inputs capturing starts-with and success_action_status behaviors
        $cases[] = array(
            // Options
            array(
                'Content-Type' => '^text/',
                'ttd' => 'Nov 24, 1984, midnight GMT',
                'acl' => CannedAcl::PRIVATE_ACCESS,
                'success_action_status' => 201,
                'key' => '^foo/bar/${filename}'
            ),
            // Expected Results
            array(
                'attributes' => array(
                    'action' => 'https://foo.s3.amazonaws.com',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data'
                ),
                'inputs' => array(
                    'AWSAccessKeyId' => 'AKIAXXXXXXXXXXXXXXX',
                    'success_action_status' => '201',
                    'key' => 'foo/bar/${filename}',
                    'Content-Type' => 'text/',
                    'acl' => 'private',
                    'policy' => 'eyJleHBpcmF0aW9uIjoiMTk4NC0xMS0yNFQwMDowMDowMFoiLCJjb25kaXRpb25zIjpbeyJidWNrZXQiOiJmb'
                        . '28ifSx7InN1Y2Nlc3NfYWN0aW9uX3N0YXR1cyI6IjIwMSJ9LFsic3RhcnRzLXdpdGgiLCIka2V5IiwiZm9vXC9iYXJc'
                        . 'LyJdLFsic3RhcnRzLXdpdGgiLCIkQ29udGVudC1UeXBlIiwidGV4dFwvIl0seyJhY2wiOiJwcml2YXRlIn1dfQ==',
                    'signature' => 'rSOwG7EilzRkYcCbpfwqaoMVzs4='
                ),
                'policy' => '{"expiration":"1984-11-24T00:00:00Z","conditions":[{"bucket":"foo"},{"success_action_stat'
                    . 'us":"201"},["starts-with","$key","foo\/bar\/"],["starts-with","$Content-Type","text\/"],{"acl":'
                    . '"private"}]}'
            )
        );

        // Passing in a raw policy
        $cases[] = array(
            // Options
            array(
                'policy' => '{"expiration":"1984-11-24T00:00:00Z","conditions":[{"bucket":"foo"},{"success_action_stat'
                    . 'us":"201"},["starts-with","$key","foo\\/bar\\/"],["starts-with","$Content-Type","text\\/"]]}'
            ),
            // Expected Results
            array(
                'attributes' => array(
                    'action' => 'https://foo.s3.amazonaws.com',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data'
                ),
                'inputs' => array(
                    'AWSAccessKeyId' => 'AKIAXXXXXXXXXXXXXXX',
                    'key' => '${filename}',
                    'policy' => 'eyJleHBpcmF0aW9uIjoiMTk4NC0xMS0yNFQwMDowMDowMFoiLCJjb25kaXRpb25zIjpbeyJidWNrZXQiOiJmb'
                        . '28ifSx7InN1Y2Nlc3NfYWN0aW9uX3N0YXR1cyI6IjIwMSJ9LFsic3RhcnRzLXdpdGgiLCIka2V5IiwiZm9vXC9iYXJc'
                        . 'LyJdLFsic3RhcnRzLXdpdGgiLCIkQ29udGVudC1UeXBlIiwidGV4dFwvIl1dfQ==',
                    'signature' => 'h92mKuUkaKTNmJMqnHDZ51+2+GY='
                ),
                'policy' => '{"expiration":"1984-11-24T00:00:00Z","conditions":[{"bucket":"foo"},{"success_action_stat'
                    . 'us":"201"},["starts-with","$key","foo\\/bar\\/"],["starts-with","$Content-Type","text\\/"]]}'
            )
        );

        return $cases;
    }

    /**
     * @dataProvider getDataForPostObjectTest
     */
    public function testGetPostObjectData(array $options, array $expected)
    {
        $postObject = new PostObject($this->client, 'foo', $options);
        $postObject->prepareData();

        $this->assertSame($expected['attributes'], $postObject->getFormAttributes());
        $this->assertSame($expected['inputs'], $postObject->getFormInputs());
        $this->assertSame($expected['policy'], $postObject->getJsonPolicy());
    }

    public function testClientAndBucketGettersAndSetters()
    {
        $postObject = new PostObject($this->client, 'foo');
        $client2 = $this->getServiceBuilder()->get('s3');

        $this->assertSame($this->client, $postObject->getClient());
        $this->assertSame('foo', $postObject->getBucket());

        $postObject->setClient($client2)->setBucket('bar');

        $this->assertSame($client2, $postObject->getClient());
        $this->assertSame('bar', $postObject->getBucket());
    }
}
