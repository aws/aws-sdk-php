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

namespace Aws\Tests\Common;

use Aws\Common\Aws;

/**
 * @covers Aws\Common\Aws
 */
class AwsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInstantiatesAwsObjectUsingDefaultConfig()
    {
        $builder = Aws::factory();
        $this->assertTrue($builder->offsetExists('dynamodb'));
        $this->assertTrue($builder->offsetExists('sts'));
        $this->assertArrayHasKey('s3', $builder->getConfig());
    }

    public function testTreatsArrayInFirstArgAsGlobalParametersUsingDefaultConfigFile()
    {
        $builder = Aws::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertEquals('foo', $builder->get('dynamodb')->getConfig('key'));
        $this->assertEquals('bar', $builder->get('dynamodb')->getConfig('secret'));
    }

    public function testReturnsDefaultConfigPath()
    {
        $this->assertContains('aws-config.php', Aws::getDefaultServiceDefinition());
    }

    public function testCanEnableFacades()
    {
        Aws::factory()->enableFacades();
        $this->assertTrue(class_exists('DynamoDb'));
    }
}
