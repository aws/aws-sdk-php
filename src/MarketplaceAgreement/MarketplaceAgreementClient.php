<?php
namespace Aws\MarketplaceAgreement;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Agreement Service** service.
 * @method \Aws\Result cancelAgreementPaymentRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAgreementPaymentRequestAsync(array $args = [])
 * @method \Aws\Result describeAgreement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgreementAsync(array $args = [])
 * @method \Aws\Result getAgreementPaymentRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgreementPaymentRequestAsync(array $args = [])
 * @method \Aws\Result getAgreementTerms(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgreementTermsAsync(array $args = [])
 * @method \Aws\Result listAgreementPaymentRequests(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgreementPaymentRequestsAsync(array $args = [])
 * @method \Aws\Result searchAgreements(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAgreementsAsync(array $args = [])
 * @method \Aws\Result sendAgreementPaymentRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise sendAgreementPaymentRequestAsync(array $args = [])
 */
class MarketplaceAgreementClient extends AwsClient {}
