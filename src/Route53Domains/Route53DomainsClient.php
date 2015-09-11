<?php
namespace Aws\Route53Domains;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Domains** service.
 *
 * @method \Aws\Result checkDomainAvailability(array $args = [])
 * @method \Aws\Result deleteTagsForDomain(array $args = [])
 * @method \Aws\Result disableDomainAutoRenew(array $args = [])
 * @method \Aws\Result disableDomainTransferLock(array $args = [])
 * @method \Aws\Result enableDomainAutoRenew(array $args = [])
 * @method \Aws\Result enableDomainTransferLock(array $args = [])
 * @method \Aws\Result getDomainDetail(array $args = [])
 * @method \Aws\Result getOperationDetail(array $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @method \Aws\Result listOperations(array $args = [])
 * @method \Aws\Result listTagsForDomain(array $args = [])
 * @method \Aws\Result registerDomain(array $args = [])
 * @method \Aws\Result retrieveDomainAuthCode(array $args = [])
 * @method \Aws\Result transferDomain(array $args = [])
 * @method \Aws\Result updateDomainContact(array $args = [])
 * @method \Aws\Result updateDomainContactPrivacy(array $args = [])
 * @method \Aws\Result updateDomainNameservers(array $args = [])
 * @method \Aws\Result updateTagsForDomain(array $args = [])
 */
class Route53DomainsClient extends AwsClient {}
