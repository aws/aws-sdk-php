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

namespace Aws\Tests\Ses\Integration;

use Aws\Ses\SesClient;
use Aws\Ses\Enum\VerificationStatus;
use Aws\Ses\Enum\MailboxSimulator;
use Aws\Ses\Enum\IdentityType;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var SesClient An SES client
     */
    protected $ses;

    /**
     * @var string An email address already verified with SES
     */
    protected static $verifiedEmail;

    /**
     * The SES integration tests use the VERIFIED_EMAIL value set in your phpunit.functional.xml as the sender. This
     * setup method ensures that the value has been provided and is already verified.
     */
    public static function setUpBeforeClass()
    {
        self::log('Make sure a verified email address was set in phpunit.functional.xml.');
        $emailAddress = isset($_SERVER['VERIFIED_EMAIL']) ? $_SERVER['VERIFIED_EMAIL'] : null;
        if ($emailAddress) {
            /** @var $ses SesClient */
            $ses = self::getServiceBuilder()->get('ses');
            try {
                $result = $ses->getIdentityVerificationAttributes(array(
                    'Identities' => array($emailAddress),
                ));
                $status = $result->getPath("VerificationAttributes/{$emailAddress}/VerificationStatus");
                if ($status === VerificationStatus::SUCCESS) {
                    self::log('Good! The provided email address is a verified email identity for SES.');
                } else {
                    self::log('Uh oh! The provided email address is NOT a verified email identity for SES.');
                    $emailAddress = null;
                }
            } catch (\Exception $e) {
                self::log('There was an error checking if the email address provided in your phpunit.functional.xml is verified.');
                $emailAddress = null;
            }
        } else {
            self::log('No verified email address was provided in your phpunit.functional.xml.');
            $emailAddress = null;
        }

        self::$verifiedEmail = $emailAddress;
    }

    public function setUp()
    {
        $this->ses = $this->getServiceBuilder()->get('ses');
        if (!self::$verifiedEmail) {
            $this->markTestSkipped();
        }
    }

    public function testBasicIdentityCrudOperations()
    {
        $emailAddress = 'noreply@amazon.com';

        self::log('Create a new identity.');
        $this->ses->getCommand('VerifyEmailIdentity', array('EmailAddress' => $emailAddress))->execute();
        $this->ses->waitUntil('IdentityExists', array('Identities' => array($emailAddress)));

        self::log('Check the status and make sure it\'s pending.');
        $result = $this->ses->getCommand('GetIdentityVerificationAttributes', array(
            'Identities' => array($emailAddress),
        ))->getResult();
        $this->assertEquals(VerificationStatus::PENDING, $result->getPath("VerificationAttributes/{$emailAddress}/VerificationStatus"));

        self::log('Make sure the identity is in the identity list.');
        $identities = $this->ses->getIterator('ListIdentities', array(
            'IdentityType' => IdentityType::EMAIL_ADDRESS
        ));
        $this->assertContains($emailAddress, iterator_to_array($identities));

        self::log('Delete the identity.');
        $this->ses->getCommand('DeleteIdentity', array('Identity' => $emailAddress))->execute();
        self::log('Sleep after deleting to allow propagation of delete.');
        sleep(5);

        self::log('Make sure the identity is no longer in the identity list.');
        $identities = $this->ses->getIterator('ListIdentities', array(
            'IdentityType' => IdentityType::EMAIL_ADDRESS
        ));
        $this->assertNotContains($emailAddress, iterator_to_array($identities));
    }

    public function testSendEmail()
    {
        $this->ses->getCommand('SendEmail', array(
            'Source' => self::$verifiedEmail,
            'Destination' => array(
                'ToAddresses' => array(MailboxSimulator::SUCCESS)
            ),
            'Message' => array(
                'Subject' => array(
                    'Data' => 'Test Email',
                ),
                'Body' => array(
                    'Text' => array(
                        'Data' => 'This is a test email.',
                    ),
                ),
            ),
        ))->execute();
    }

    /**
     * @expectedException \Aws\Ses\Exception\MessageRejectedException
     */
    public function testSendErroneousEmailToBlacklistedAddress()
    {
        $this->ses->getCommand('SendEmail', array(
            'Source' => self::$verifiedEmail,
            'Destination' => array(
                'ToAddresses' => array(MailboxSimulator::BLACKLIST)
            ),
            'Message' => array(
                'Subject' => array(
                    'Data' => 'Test Email',
                ),
                'Body' => array(
                    'Text' => array(
                        'Data' => 'This is a test email.',
                    ),
                ),
            ),
        ))->execute();
    }
}
