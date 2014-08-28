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

namespace Aws\MobileAnalytics;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Service\Resource\Model;


/**
 * Client to interact with Amazon Mobile Analytics
 *
 * @method Model PutEvents(array $args = array()) {@command MobileAnalytics PutEvents}
 *
 * @link http://docs.aws.amazon.com/mobileanalytics/latest/
 */
class MobileAnalyticsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-08-21';

    /**
     * Factory method to create a new Amazon MobileAnalytics client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/mobileanalytics/latest/ug/server-reference.html
     */
    public static function factory($config = array())
    {
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/mobileanalytics-%s.php',
            ))
            ->setExceptionParser(new JsonQueryExceptionParser)
            ->build();

        return $client;
    }
}
