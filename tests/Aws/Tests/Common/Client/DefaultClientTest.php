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

use Aws\Common\Client\DefaultClient;
use Aws\Common\Enum\ClientOptions as Options;

class DefaultClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Client\DefaultClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $credentials = $this->getMock('Aws\Common\Credentials\CredentialsInterface');
        $client = DefaultClient::factory(array(
            Options::CREDENTIALS => $credentials,
            Options::SERVICE_DESCRIPTION => __DIR__ . '/../../../../../src/Aws/Sts/Resources/sts-2011-06-15.php'
        ));
        $this->assertInstanceOf('Aws\Common\Signature\SignatureInterface', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\CredentialsInterface', $client->getCredentials());
        $this->assertSame($credentials, $client->getCredentials());
        $this->assertEquals('https://sts.amazonaws.com', $client->getBaseUrl());
    }
}
