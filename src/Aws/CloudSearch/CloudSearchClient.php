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

namespace Aws\CloudSearch;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon CloudSearch
 *
 * @method Model createDomain(array $args = array()) {@command CloudSearch CreateDomain}
 * @method Model defineIndexField(array $args = array()) {@command CloudSearch DefineIndexField}
 * @method Model defineRankExpression(array $args = array()) {@command CloudSearch DefineRankExpression}
 * @method Model deleteDomain(array $args = array()) {@command CloudSearch DeleteDomain}
 * @method Model deleteIndexField(array $args = array()) {@command CloudSearch DeleteIndexField}
 * @method Model deleteRankExpression(array $args = array()) {@command CloudSearch DeleteRankExpression}
 * @method Model describeDefaultSearchField(array $args = array()) {@command CloudSearch DescribeDefaultSearchField}
 * @method Model describeDomains(array $args = array()) {@command CloudSearch DescribeDomains}
 * @method Model describeIndexFields(array $args = array()) {@command CloudSearch DescribeIndexFields}
 * @method Model describeRankExpressions(array $args = array()) {@command CloudSearch DescribeRankExpressions}
 * @method Model describeServiceAccessPolicies(array $args = array()) {@command CloudSearch DescribeServiceAccessPolicies}
 * @method Model describeStemmingOptions(array $args = array()) {@command CloudSearch DescribeStemmingOptions}
 * @method Model describeStopwordOptions(array $args = array()) {@command CloudSearch DescribeStopwordOptions}
 * @method Model describeSynonymOptions(array $args = array()) {@command CloudSearch DescribeSynonymOptions}
 * @method Model indexDocuments(array $args = array()) {@command CloudSearch IndexDocuments}
 * @method Model updateDefaultSearchField(array $args = array()) {@command CloudSearch UpdateDefaultSearchField}
 * @method Model updateServiceAccessPolicies(array $args = array()) {@command CloudSearch UpdateServiceAccessPolicies}
 * @method Model updateStemmingOptions(array $args = array()) {@command CloudSearch UpdateStemmingOptions}
 * @method Model updateStopwordOptions(array $args = array()) {@command CloudSearch UpdateStopwordOptions}
 * @method Model updateSynonymOptions(array $args = array()) {@command CloudSearch UpdateSynonymOptions}
 * @method ResourceIteratorInterface getDescribeDomainsIterator(array $args = array()) The input array uses the parameters of the DescribeDomains operation
 * @method ResourceIteratorInterface getDescribeIndexFieldsIterator(array $args = array()) The input array uses the parameters of the DescribeIndexFields operation
 * @method ResourceIteratorInterface getDescribeRankExpressionsIterator(array $args = array()) The input array uses the parameters of the DescribeRankExpressions operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-cloudsearch.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.CloudSearch.CloudSearchClient.html API docs
 */
class CloudSearchClient extends AbstractClient
{
    const LATEST_API_VERSION = '2011-02-01';

    /**
     * Factory method to create a new Amazon CloudSearch client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudsearch-%s.php'
            ))
            ->build();
    }
}
