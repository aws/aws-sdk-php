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

namespace Aws\Tests\Common;

use Aws\Common\HostNameUtils;
use Guzzle\Http\Url;

class HostNameUtilsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function regionAndServiceProvider()
    {
        return array(
            array('iam.amazonaws.com', 'iam', 'us-east-1'),
            array('cloudformation.us-east-1.amazonaws.com', 'cloudformation', 'us-east-1'),
            array('cloudformation.us-west-2.amazonaws.com', 'cloudformation', 'us-west-2'),
            array('cloudformation.us-west-1.amazonaws.com', 'cloudformation', 'us-west-1'),
            array('cloudformation.eu-west-1.amazonaws.com', 'cloudformation', 'eu-west-1'),
            array('cloudformation.ap-southeast-1.amazonaws.com', 'cloudformation', 'ap-southeast-1'),
            array('cloudformation.ap-northeast-1.amazonaws.com', 'cloudformation', 'ap-northeast-1'),
            array('cloudformation.sa-east-1.amazonaws.com', 'cloudformation', 'sa-east-1'),
            array('cloudsearch.us-east-1.amazonaws.com', 'cloudsearch', 'us-east-1'),
            array('monitoring.us-east-1.amazonaws.com', 'monitoring', 'us-east-1'),
            array('monitoring.us-west-2.amazonaws.com', 'monitoring', 'us-west-2'),
            array('monitoring.us-west-1.amazonaws.com', 'monitoring', 'us-west-1'),
            array('monitoring.eu-west-1.amazonaws.com', 'monitoring', 'eu-west-1'),
            array('monitoring.ap-southeast-1.amazonaws.com', 'monitoring', 'ap-southeast-1'),
            array('monitoring.ap-northeast-1.amazonaws.com', 'monitoring', 'ap-northeast-1'),
            array('monitoring.sa-east-1.amazonaws.com', 'monitoring', 'sa-east-1'),
            array('email.us-east-1.amazonaws.com', 'email', 'us-east-1'),
            array('email-smtp.us-east-1.amazonaws.com', 'email-smtp', 'us-east-1'),
            array('sdb.amazonaws.com', 'sdb', 'us-east-1'),
            array('sdb.us-west-2.amazonaws.com', 'sdb', 'us-west-2'),
            array('sdb.us-west-1.amazonaws.com', 'sdb', 'us-west-1'),
            array('sdb.eu-west-1.amazonaws.com', 'sdb', 'eu-west-1'),
            array('sdb.ap-southeast-1.amazonaws.com', 'sdb', 'ap-southeast-1'),
            array('sdb.ap-northeast-1.amazonaws.com', 'sdb', 'ap-northeast-1'),
            array('sdb.sa-east-1.amazonaws.com', 'sdb', 'sa-east-1'),
            array('s3-us-west-2.amazonaws.com', 's3', 'us-west-2'),
            array('s3-us-west-1.amazonaws.com', 's3', 'us-west-1'),
            array('s3-eu-west-1.amazonaws.com', 's3', 'eu-west-1'),
            array('s3-ap-southeast-1.amazonaws.com', 's3', 'ap-southeast-1'),
            array('s3-ap-northeast-1.amazonaws.com', 's3', 'ap-northeast-1'),
            array('s3-sa-east-1.amazonaws.com', 's3', 'sa-east-1'),
            array('s3-website-us-east-1.amazonaws.com', 's3', 'website-us-east-1'),
            array('s3-website-us-west-2.amazonaws.com', 's3', 'website-us-west-2'),
            array('ec2.us-gov-west-1.amazonaws.com', 'ec2', 'us-gov-west-1'),
            array('monitoring.us-gov-west-1.amazonaws.com', 'monitoring', 'us-gov-west-1'),
            array('iam.us-gov.amazonaws.com', 'iam', 'us-gov-west-1'),
            array('amazon.com', 'amazon', 'us-east-1'),
        );
    }

    /**
     * @covers Aws\Common\HostNameUtils::parseServiceName
     * @covers Aws\Common\HostNameUtils::parseRegionName
     * @dataProvider regionAndServiceProvider
     */
    public function testParsesRegionsAndServices($host, $service, $region)
    {
        $url = Url::factory('https://' . $host);
        $this->assertEquals($service, HostNameUtils::parseServiceName($url), 'Service name mismatch');
        $this->assertEquals($region, HostNameUtils::parseRegionName($url), 'Region mismatch');
    }
}
