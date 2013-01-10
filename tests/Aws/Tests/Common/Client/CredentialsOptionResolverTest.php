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

namespace Aws\Tests\Common\Client;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Client\CredentialsOptionResolver;
use Guzzle\Common\Collection;

/**
 * @covers Aws\Common\Client\CredentialsOptionResolver
 */
class CredentialsOptionResolverTestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testInitializesCredentials()
    {
        // Create a config object that has no credential object
        $config = new Collection(array(
            'key'    => 'abc',
            'secret' => '123'
        ));

        $resolver = new CredentialsOptionResolver();
        $resolver->resolve($config);

        // Ensure that the credentials object was added
        $creds = $config->get('credentials');
        $this->assertInstanceOf('Aws\\Common\\Credentials\\Credentials', $creds);

        // Ensure that instances of Credentials are not overwritten
        $resolver->resolve($config);
        $this->assertSame($creds, $config->get('credentials'));
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage The credentials you provided do not implement Aws\Common\Credentials\CredentialsInterface
     */
    public function testValidatesCredentials()
    {
        $resolver = new CredentialsOptionResolver();

        // Create a config object that has an invalid credentials object
        $resolver->resolve(new Collection(array(
            'credentials' => 'foo'
        )));
    }

    public function testUsesInstanceCredentialsByDefault()
    {
        $config = new Collection();
        $resolver = new CredentialsOptionResolver();
        $resolver->resolve($config);

        $this->assertInstanceOf('Aws\Common\Credentials\RefreshableInstanceProfileCredentials', $config->get('credentials'));
    }

    public function testCanUseCustomMissingFunction()
    {
        $creds = new Credentials('a', 'b');
        $config = new Collection();
        $resolver = new CredentialsOptionResolver(function() use ($creds) {
            return $creds;
        });
        $resolver->resolve($config);

        $this->assertSame($creds, $config->get('credentials'));
    }
}
