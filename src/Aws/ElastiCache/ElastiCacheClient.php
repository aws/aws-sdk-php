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

namespace Aws\ElastiCache;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon ElastiCache
 *
 * @method Model authorizeCacheSecurityGroupIngress(array $args = array()) {@command ElastiCache AuthorizeCacheSecurityGroupIngress}
 * @method Model createCacheCluster(array $args = array()) {@command ElastiCache CreateCacheCluster}
 * @method Model createCacheParameterGroup(array $args = array()) {@command ElastiCache CreateCacheParameterGroup}
 * @method Model createCacheSecurityGroup(array $args = array()) {@command ElastiCache CreateCacheSecurityGroup}
 * @method Model createCacheSubnetGroup(array $args = array()) {@command ElastiCache CreateCacheSubnetGroup}
 * @method Model deleteCacheCluster(array $args = array()) {@command ElastiCache DeleteCacheCluster}
 * @method Model deleteCacheParameterGroup(array $args = array()) {@command ElastiCache DeleteCacheParameterGroup}
 * @method Model deleteCacheSecurityGroup(array $args = array()) {@command ElastiCache DeleteCacheSecurityGroup}
 * @method Model deleteCacheSubnetGroup(array $args = array()) {@command ElastiCache DeleteCacheSubnetGroup}
 * @method Model describeCacheClusters(array $args = array()) {@command ElastiCache DescribeCacheClusters}
 * @method Model describeCacheEngineVersions(array $args = array()) {@command ElastiCache DescribeCacheEngineVersions}
 * @method Model describeCacheParameterGroups(array $args = array()) {@command ElastiCache DescribeCacheParameterGroups}
 * @method Model describeCacheParameters(array $args = array()) {@command ElastiCache DescribeCacheParameters}
 * @method Model describeCacheSecurityGroups(array $args = array()) {@command ElastiCache DescribeCacheSecurityGroups}
 * @method Model describeCacheSubnetGroups(array $args = array()) {@command ElastiCache DescribeCacheSubnetGroups}
 * @method Model describeEngineDefaultParameters(array $args = array()) {@command ElastiCache DescribeEngineDefaultParameters}
 * @method Model describeEvents(array $args = array()) {@command ElastiCache DescribeEvents}
 * @method Model describeReservedCacheNodes(array $args = array()) {@command ElastiCache DescribeReservedCacheNodes}
 * @method Model describeReservedCacheNodesOfferings(array $args = array()) {@command ElastiCache DescribeReservedCacheNodesOfferings}
 * @method Model modifyCacheCluster(array $args = array()) {@command ElastiCache ModifyCacheCluster}
 * @method Model modifyCacheParameterGroup(array $args = array()) {@command ElastiCache ModifyCacheParameterGroup}
 * @method Model modifyCacheSubnetGroup(array $args = array()) {@command ElastiCache ModifyCacheSubnetGroup}
 * @method Model purchaseReservedCacheNodesOffering(array $args = array()) {@command ElastiCache PurchaseReservedCacheNodesOffering}
 * @method Model rebootCacheCluster(array $args = array()) {@command ElastiCache RebootCacheCluster}
 * @method Model resetCacheParameterGroup(array $args = array()) {@command ElastiCache ResetCacheParameterGroup}
 * @method Model revokeCacheSecurityGroupIngress(array $args = array()) {@command ElastiCache RevokeCacheSecurityGroupIngress}
 * @method ResourceIteratorInterface getDescribeCacheClustersIterator(array $args = array()) The input array uses the parameters of the DescribeCacheClusters operation
 * @method ResourceIteratorInterface getDescribeCacheEngineVersionsIterator(array $args = array()) The input array uses the parameters of the DescribeCacheEngineVersions operation
 * @method ResourceIteratorInterface getDescribeCacheParameterGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeCacheParameterGroups operation
 * @method ResourceIteratorInterface getDescribeCacheParametersIterator(array $args = array()) The input array uses the parameters of the DescribeCacheParameters operation
 * @method ResourceIteratorInterface getDescribeCacheSecurityGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeCacheSecurityGroups operation
 * @method ResourceIteratorInterface getDescribeCacheSubnetGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeCacheSubnetGroups operation
 * @method ResourceIteratorInterface getDescribeEngineDefaultParametersIterator(array $args = array()) The input array uses the parameters of the DescribeEngineDefaultParameters operation
 * @method ResourceIteratorInterface getDescribeEventsIterator(array $args = array()) The input array uses the parameters of the DescribeEvents operation
 * @method ResourceIteratorInterface getDescribeReservedCacheNodesIterator(array $args = array()) The input array uses the parameters of the DescribeReservedCacheNodes operation
 * @method ResourceIteratorInterface getDescribeReservedCacheNodesOfferingsIterator(array $args = array()) The input array uses the parameters of the DescribeReservedCacheNodesOfferings operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-elasticache.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.ElastiCache.ElastiCacheClient.html API docs
 */
class ElastiCacheClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-11-15';

    /**
     * Factory method to create a new Amazon ElastiCache client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/elasticache-%s.php'
            ))
            ->build();
    }
}
