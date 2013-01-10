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

namespace Aws\Tests\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\AbstractCredentialsDecorator;

/**
 * @covers Aws\Common\Credentials\AbstractCredentialsDecorator
 */
class AbstractCredentialsDecoratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testProxiesToWrappedObject()
    {
        $credentials = new Credentials('a', 'b', 'c', 1000);

        $c = new AbstractCredentialsDecorator($credentials);

        $this->assertEquals('a', $c->getAccessKeyId());
        $this->assertEquals('b', $c->getSecretKey());
        $this->assertEquals('c', $c->getSecurityToken());
        $this->assertEquals(1000, $c->getExpiration());

        $this->assertSame($c, $c->setAccessKeyId('foo'));
        $this->assertSame($c, $c->setSecretKey('baz'));
        $this->assertSame($c, $c->setSecurityToken('bar'));
        $this->assertSame($c, $c->setExpiration(500));

        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertEquals('bar', $c->getSecurityToken());
        $this->assertEquals(500, $c->getExpiration());

        $this->assertTrue($c->isExpired());

        $this->assertSame($c->serialize(), $credentials->serialize());
        $this->assertEquals(unserialize(serialize($c)), $c);
    }
}
