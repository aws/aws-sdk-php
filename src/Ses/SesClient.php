<?php
namespace Aws\Ses;

/**
 * This client is used to interact with the **Amazon Simple Email Service (Amazon SES)**.
 *
 * @method \Aws\Result deleteIdentity(array $args = [])
 * @method \Aws\Result deleteIdentityPolicy(array $args = [])
 * @method \Aws\Result deleteVerifiedEmailAddress(array $args = [])
 * @method \Aws\Result getIdentityDkimAttributes(array $args = [])
 * @method \Aws\Result getIdentityNotificationAttributes(array $args = [])
 * @method \Aws\Result getIdentityPolicies(array $args = [])
 * @method \Aws\Result getIdentityVerificationAttributes(array $args = [])
 * @method \Aws\Result getSendQuota(array $args = [])
 * @method \Aws\Result getSendStatistics(array $args = [])
 * @method \Aws\Result listIdentities(array $args = [])
 * @method \Aws\Result listIdentityPolicies(array $args = [])
 * @method \Aws\Result listVerifiedEmailAddresses(array $args = [])
 * @method \Aws\Result putIdentityPolicy(array $args = [])
 * @method \Aws\Result sendEmail(array $args = [])
 * @method \Aws\Result sendRawEmail(array $args = [])
 * @method \Aws\Result setIdentityDkimEnabled(array $args = [])
 * @method \Aws\Result setIdentityFeedbackForwardingEnabled(array $args = [])
 * @method \Aws\Result setIdentityNotificationTopic(array $args = [])
 * @method \Aws\Result verifyDomainDkim(array $args = [])
 * @method \Aws\Result verifyDomainIdentity(array $args = [])
 * @method \Aws\Result verifyEmailAddress(array $args = [])
 * @method \Aws\Result verifyEmailIdentity(array $args = [])
 */
class SesClient extends \Aws\AwsClient {}
