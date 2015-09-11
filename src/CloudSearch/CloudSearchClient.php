<?php
namespace Aws\CloudSearch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudSearch** service.
 *
 * @method \Aws\Result buildSuggesters(array $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @method \Aws\Result defineAnalysisScheme(array $args = [])
 * @method \Aws\Result defineExpression(array $args = [])
 * @method \Aws\Result defineIndexField(array $args = [])
 * @method \Aws\Result defineSuggester(array $args = [])
 * @method \Aws\Result deleteAnalysisScheme(array $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @method \Aws\Result deleteExpression(array $args = [])
 * @method \Aws\Result deleteIndexField(array $args = [])
 * @method \Aws\Result deleteSuggester(array $args = [])
 * @method \Aws\Result describeAnalysisSchemes(array $args = [])
 * @method \Aws\Result describeAvailabilityOptions(array $args = [])
 * @method \Aws\Result describeDomains(array $args = [])
 * @method \Aws\Result describeExpressions(array $args = [])
 * @method \Aws\Result describeIndexFields(array $args = [])
 * @method \Aws\Result describeScalingParameters(array $args = [])
 * @method \Aws\Result describeServiceAccessPolicies(array $args = [])
 * @method \Aws\Result describeSuggesters(array $args = [])
 * @method \Aws\Result indexDocuments(array $args = [])
 * @method \Aws\Result listDomainNames(array $args = [])
 * @method \Aws\Result updateAvailabilityOptions(array $args = [])
 * @method \Aws\Result updateScalingParameters(array $args = [])
 * @method \Aws\Result updateServiceAccessPolicies(array $args = [])
 */
class CloudSearchClient extends AwsClient {}
