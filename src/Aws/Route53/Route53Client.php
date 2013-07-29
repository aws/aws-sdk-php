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

namespace Aws\Route53;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Enum\DateFormat;
use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Route 53
 *
 * @method Model changeResourceRecordSets(array $args = array()) {@command Route53 ChangeResourceRecordSets}
 * @method Model createHealthCheck(array $args = array()) {@command Route53 CreateHealthCheck}
 * @method Model createHostedZone(array $args = array()) {@command Route53 CreateHostedZone}
 * @method Model deleteHealthCheck(array $args = array()) {@command Route53 DeleteHealthCheck}
 * @method Model deleteHostedZone(array $args = array()) {@command Route53 DeleteHostedZone}
 * @method Model getChange(array $args = array()) {@command Route53 GetChange}
 * @method Model getHealthCheck(array $args = array()) {@command Route53 GetHealthCheck}
 * @method Model getHostedZone(array $args = array()) {@command Route53 GetHostedZone}
 * @method Model listHealthChecks(array $args = array()) {@command Route53 ListHealthChecks}
 * @method Model listHostedZones(array $args = array()) {@command Route53 ListHostedZones}
 * @method Model listResourceRecordSets(array $args = array()) {@command Route53 ListResourceRecordSets}
 * @method ResourceIteratorInterface getListHealthChecksIterator(array $args = array()) The input array uses the parameters of the ListHealthChecks operation
 * @method ResourceIteratorInterface getListHostedZonesIterator(array $args = array()) The input array uses the parameters of the ListHostedZones operation
 * @method ResourceIteratorInterface getListResourceRecordSetsIterator(array $args = array()) The input array uses the parameters of the ListResourceRecordSets operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-route53.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.Route53.Route53Client.html API docs
 */
class Route53Client extends AbstractClient
{
    const LATEST_API_VERSION = '2012-12-12';

    /**
     * Factory method to create a new Amazon Glacier client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @see \Aws\Common\Client\DefaultClient for a list of available configuration options
     */
    public static function factory($config = array())
    {
        // Setup Route53 client
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/route53-%s.php'
            ))
            ->build();
    }

    /**
     * Retrieves the server time from Route53. Can be useful for detecting and/or preventing clock skew.
     *
     * @return \DateTime The server time from Route53
     * @link http://docs.amazonwebservices.com/Route53/latest/DeveloperGuide/RESTAuthentication.html#FetchingDate
     */
    public function getServerTime()
    {
        try {
            $response = $this->get('https://route53.amazonaws.com/date')->send();
        } catch (ServiceResponseException $e) {
            $response = $e->getResponse();
        }

        $serverTime = trim($response->getHeader('Date', true));
        $serverTime = \DateTime::createFromFormat(DateFormat::RFC1123, $serverTime);

        return $serverTime;
    }

    /**
     * Filter function used to remove ID prefixes. This is used automatically by the client so that Hosted Zone and
     * Change Record IDs can be specified with or without the prefix.
     *
     * @param string $id The ID value to clean
     *
     * @return string
     */
    public static function cleanId($id)
    {
        return str_replace(array('/hostedzone/', '/change/'), '', $id);
    }
}
