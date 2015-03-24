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

namespace Aws\CloudHsm;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon CloudHSM
 *
 * @method Model createHapg(array $args = array()) {@command CloudHsm CreateHapg}
 * @method Model createHsm(array $args = array()) {@command CloudHsm CreateHsm}
 * @method Model createLunaClient(array $args = array()) {@command CloudHsm CreateLunaClient}
 * @method Model deleteHapg(array $args = array()) {@command CloudHsm DeleteHapg}
 * @method Model deleteHsm(array $args = array()) {@command CloudHsm DeleteHsm}
 * @method Model deleteLunaClient(array $args = array()) {@command CloudHsm DeleteLunaClient}
 * @method Model describeHapg(array $args = array()) {@command CloudHsm DescribeHapg}
 * @method Model describeHsm(array $args = array()) {@command CloudHsm DescribeHsm}
 * @method Model describeLunaClient(array $args = array()) {@command CloudHsm DescribeLunaClient}
 * @method Model getConfig(array $args = array()) {@command CloudHsm GetConfig}
 * @method Model listAvailableZones(array $args = array()) {@command CloudHsm ListAvailableZones}
 * @method Model listHapgs(array $args = array()) {@command CloudHsm ListHapgs}
 * @method Model listHsms(array $args = array()) {@command CloudHsm ListHsms}
 * @method Model listLunaClients(array $args = array()) {@command CloudHsm ListLunaClients}
 * @method Model modifyHapg(array $args = array()) {@command CloudHsm ModifyHapg}
 * @method Model modifyHsm(array $args = array()) {@command CloudHsm ModifyHsm}
 * @method Model modifyLunaClient(array $args = array()) {@command CloudHsm ModifyLunaClient}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-cloudhsm.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.CloudHsm.CloudHsmClient.html API docs
 */
class CloudHsmClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-05-30';

    /**
     * Factory method to create a new Amazon CloudHSM client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudhsm-%s.php'
            ))
            ->build();
    }
}
