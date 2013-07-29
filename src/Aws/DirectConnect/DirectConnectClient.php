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

namespace Aws\DirectConnect;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Direct Connect
 *
 * @method Model createConnection(array $args = array()) {@command DirectConnect CreateConnection}
 * @method Model createPrivateVirtualInterface(array $args = array()) {@command DirectConnect CreatePrivateVirtualInterface}
 * @method Model createPublicVirtualInterface(array $args = array()) {@command DirectConnect CreatePublicVirtualInterface}
 * @method Model deleteConnection(array $args = array()) {@command DirectConnect DeleteConnection}
 * @method Model deleteVirtualInterface(array $args = array()) {@command DirectConnect DeleteVirtualInterface}
 * @method Model describeConnectionDetail(array $args = array()) {@command DirectConnect DescribeConnectionDetail}
 * @method Model describeConnections(array $args = array()) {@command DirectConnect DescribeConnections}
 * @method Model describeOfferingDetail(array $args = array()) {@command DirectConnect DescribeOfferingDetail}
 * @method Model describeOfferings(array $args = array()) {@command DirectConnect DescribeOfferings}
 * @method Model describeVirtualGateways(array $args = array()) {@command DirectConnect DescribeVirtualGateways}
 * @method Model describeVirtualInterfaces(array $args = array()) {@command DirectConnect DescribeVirtualInterfaces}
 * @method ResourceIteratorInterface getDescribeConnectionsIterator(array $args = array()) The input array uses the parameters of the DescribeConnections operation
 * @method ResourceIteratorInterface getDescribeOfferingsIterator(array $args = array()) The input array uses the parameters of the DescribeOfferings operation
 * @method ResourceIteratorInterface getDescribeVirtualGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeVirtualGateways operation
 * @method ResourceIteratorInterface getDescribeVirtualInterfacesIterator(array $args = array()) The input array uses the parameters of the DescribeVirtualInterfaces operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-directconnect.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.DirectConnect.DirectConnectClient.html API docs
 */
class DirectConnectClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-10-25';

    /**
     * Factory method to create a new AWS Direct Connect client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/directconnect-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->setIteratorsConfig(array(
                'operations'  => array(
                    'DescribeConnections' => array(
                        'result_key' => 'connections',
                    ),
                    'DescribeOfferings' => array(
                        'result_key' => 'offerings',
                    ),
                    'DescribeVirtualGateways' => array(
                        'result_key' => 'virtualGateways',
                    ),
                    'DescribeVirtualInterfaces' => array(
                        'result_key' => 'virtualInterfaces',
                    ),
                )
            ))
            ->build();
    }
}
