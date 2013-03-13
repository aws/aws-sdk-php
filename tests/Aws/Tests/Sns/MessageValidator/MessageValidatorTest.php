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

namespace Aws\Tests\Sns\MessageValidator;

use Aws\Sns\MessageValidator\AbstractMessage;
use Aws\Sns\MessageValidator\MessageValidator;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Client;

class MessageValidatorTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function setUp()
    {
        if (!extension_loaded('openssl')) {
            $this->markTestSkipped('The OpenSSL extension is required to run the tests for MessageValidator.');
        }
    }

    public function testValidateFailsWhenCertUrlDoesNotMatchAws()
    {
        $this->setExpectedException('Aws\Sns\MessageValidator\Exception\CertificateFromUnrecognizedSourceException');

        $validator = new MessageValidator();

        /** @var $message AbstractMessage */
        $message = $this->getMockMessage();
        $validator->validate($message);
    }

    public function testValidateFailsWhenCannotDeterminePublicKey()
    {
        $this->setExpectedException('Aws\Sns\MessageValidator\Exception\CannotGetPublicKeyFromCertificateException');

        // Create the validator with a mock HTTP client
        $plugin = new MockPlugin();
        $plugin->addResponse(new Response(200));
        $client = new Client();
        $client->addSubscriber($plugin);
        $validator = new MessageValidator($client);

        /** @/var $message AbstractMessage */
        $message = $this->getMockMessage(array('SigningCertURL' => 'https://foo.amazonaws.com/bar'));
        $validator->validate($message);
    }

    public function testValidateFailsWhenMessageIsInvalid()
    {
        $this->markTestIncomplete('Not yet implemented.');
    }

    public function testValidateSucceedsWhenMessageIsValid()
    {
        $this->markTestIncomplete('Not yet implemented.');
    }

    public function testCheckReturnsFalseOnFailedValidation()
    {
        $validator = new MessageValidator();
        $message = $this->getMockMessage();
        $this->assertFalse($validator->checkIfValid($message));
    }

    public function testCheckReturnsTrueOnSuccessfulValidation()
    {
        $this->markTestIncomplete('Not yet implemented.');
    }

    protected function getMockMessage(array $data = array())
    {
        return $this->getMockForAbstractClass('Aws\Sns\MessageValidator\AbstractMessage', array(new Collection($data)));
    }
}
