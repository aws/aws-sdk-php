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

namespace Aws\Ses;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Simple Email Service
 *
 * @method Model deleteIdentity(array $args = array()) {@command Ses DeleteIdentity}
 * @method Model deleteVerifiedEmailAddress(array $args = array()) {@command Ses DeleteVerifiedEmailAddress}
 * @method Model getIdentityDkimAttributes(array $args = array()) {@command Ses GetIdentityDkimAttributes}
 * @method Model getIdentityNotificationAttributes(array $args = array()) {@command Ses GetIdentityNotificationAttributes}
 * @method Model getIdentityVerificationAttributes(array $args = array()) {@command Ses GetIdentityVerificationAttributes}
 * @method Model getSendQuota(array $args = array()) {@command Ses GetSendQuota}
 * @method Model getSendStatistics(array $args = array()) {@command Ses GetSendStatistics}
 * @method Model listIdentities(array $args = array()) {@command Ses ListIdentities}
 * @method Model listVerifiedEmailAddresses(array $args = array()) {@command Ses ListVerifiedEmailAddresses}
 * @method Model sendEmail(array $args = array()) {@command Ses SendEmail}
 * @method Model sendRawEmail(array $args = array()) {@command Ses SendRawEmail}
 * @method Model setIdentityDkimEnabled(array $args = array()) {@command Ses SetIdentityDkimEnabled}
 * @method Model setIdentityFeedbackForwardingEnabled(array $args = array()) {@command Ses SetIdentityFeedbackForwardingEnabled}
 * @method Model setIdentityNotificationTopic(array $args = array()) {@command Ses SetIdentityNotificationTopic}
 * @method Model verifyDomainDkim(array $args = array()) {@command Ses VerifyDomainDkim}
 * @method Model verifyDomainIdentity(array $args = array()) {@command Ses VerifyDomainIdentity}
 * @method Model verifyEmailAddress(array $args = array()) {@command Ses VerifyEmailAddress}
 * @method Model verifyEmailIdentity(array $args = array()) {@command Ses VerifyEmailIdentity}
 * @method waitUntilIdentityExists(array $input) Wait using the IdentityExists waiter. The input array uses the parameters of the GetIdentityVerificationAttributes operation and waiter specific settings
 * @method ResourceIteratorInterface getListIdentitiesIterator(array $args = array()) The input array uses the parameters of the ListIdentities operation
 * @method ResourceIteratorInterface getListVerifiedEmailAddressesIterator(array $args = array()) The input array uses the parameters of the ListVerifiedEmailAddresses operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-ses.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.Ses.SesClient.html API docs
 */
class SesClient extends AbstractClient
{
    const LATEST_API_VERSION = '2010-12-01';

    /**
     * Factory method to create a new Amazon Simple Email Service client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @see \Aws\Common\Client\DefaultClient for a list of available configuration options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/ses-%s.php',
                Options::SIGNATURE_SERVICE   => 'ses',
            ))
            ->build();
    }
}
