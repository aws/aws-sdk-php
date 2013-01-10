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

use Aws\S3\AcpListener;
use Aws\S3\Enum\Group;
use Aws\S3\Model\Acp;
use Aws\S3\Model\AcpBuilder;
use Aws\S3\Model\Grantee;

/**
 * @covers Aws\S3\AcpListener
 */
class AcpListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasEvents()
    {
        $this->assertNotEmpty(AcpListener::getSubscribedEvents());
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage ACP must be an instance of Aws\S3\Model\Acp
     */
    public function testThrowsExceptionWhenAcpIsInvalid()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $s3->getCommand('PutObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hello',
            'ACP'    => new \stdClass()
        ))->prepare();
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Use either the ACP parameter or the Grants parameter
     */
    public function testThrowsExceptionWhenBothAcpAndGrantsAreSet()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $s3->getCommand('PutObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hello',
            'ACP'    => new Acp(new Grantee('123')),
            'Grants' => array()
        ))->prepare();
    }

    public function testIgnoresOperationsWhereAcpIsNotPresent()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $s3->getCommand('GetObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'ACP'    => new Acp(new Grantee('123')),
            'Grants' => array()
        ))->prepare();
    }

    public function testAppliesAcpHeadersToCommand()
    {
        $acp = $this->getAcp();
        $s3 = $this->getServiceBuilder()->get('s3');
        $command = $s3->getCommand('PutObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hello',
            'ACP'    => $acp
        ));
        $command->prepare();
        $this->assertEquals('emailAddress="test@example.com", emailAddress="baz@example.com"', $command['GrantRead']);
        $this->assertEquals('emailAddress="jar@jar.com"', $command['GrantWrite']);
        $this->assertEquals('uri="http://acs.amazonaws.com/groups/global/AllUsers"', $command['GrantReadACP']);
    }

    public function testAppliesAcpBodyToCommand()
    {
        $acp = $this->getAcp();
        $s3 = $this->getServiceBuilder()->get('s3');
        $command = $s3->getCommand('PutObjectAcl', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'ACP'    => $acp
        ));
        $request = $command->prepare();
        $this->assertContains('Grantee', (string) $request->getBody());
    }

    protected function getAcp()
    {
        return AcpBuilder::newInstance()
            ->setOwner('test')
            ->addGrantForEmail('READ', 'test@example.com')
            ->addGrantForEmail('READ', 'baz@example.com')
            ->addGrantForEmail('WRITE', 'jar@jar.com')
            ->addGrantForGroup('READ_ACP', Group::ALL_USERS)
            ->build();
    }
}
