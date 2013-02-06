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

namespace Aws\Tests\Route53\Integration;

/**
 * @group integration
 */
class IteratorsTest extends \Aws\Tests\IntegrationTestCase
{
    public function testIteratesListResourceRecordSetsCommand()
    {
        self::log('Test the complex iterator for ListResourceRecordSets.');

        $client = $this->getServiceBuilder()->get('route53');
        $mock = $this->setMockResponse($client, array(
            'route53/list_rrs_page_1',
            'route53/list_rrs_page_2',
            'route53/list_rrs_page_3',
        ));

        $resourceRecordSets = $client->getIterator('ListResourceRecordSets', array(
            'HostedZoneId' => '0123456789'
        ));

        $resourceRecords = array();
        foreach ($resourceRecordSets as $resourceRecordSet) {
            $this->assertEquals('www.example.com.', $resourceRecordSet['Name']);
            foreach ($resourceRecordSet['ResourceRecords'] as $resourceRecord) {
                $resourceRecords[] = $resourceRecord['Value'];
            }
        }

        $this->assertSame(array('a', 'b', 'c', 'd', 'e', 'f'), $resourceRecords);

        $requests = $mock->getReceivedRequests();
        $this->assertEquals(3, count($requests));
    }
}
