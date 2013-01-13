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

use Aws\Route53\Route53Client;
use Aws\Route53\Enum\Status;

/**
 * @group integration
 */
class BasicOperationsTest extends \Aws\Tests\IntegrationTestCase
{
    public function testHostedZoneOperations()
    {
        /** @var $route53 Route53Client */
        $route53 = self::getServiceBuilder()->get('route53');

        self::log('Create a hosted zone.');
        $result = $route53->getCommand('CreateHostedZone', array(
            'Name' => 'www.example.com',
            'CallerReference' => uniqid('aws-sdk-php-'),
        ))->getResult();
        $zoneId = $result->getPath('HostedZone/Id');
        $this->assertStringStartsWith('/hostedzone/', $zoneId);

        self::log('List the hosted zones and verify the one we created is there.');
        $zoneIds = array();
        foreach ($route53->getIterator('ListHostedZones') as $zone) {
            $zoneIds[] = $zone['Id'];
        }
        $this->assertContains($zoneId, $zoneIds);

        self::log('Get the hosted zone we created by its ID.');
        $result = $route53->getCommand('GetHostedZone', array(
            'Id' => $zoneId,
        ))->getResult();
        $this->assertEquals($zoneId, $result->getPath('HostedZone/Id'));
        $nameServers = $result->getPath('DelegationSet/NameServers');
        $this->assertInternalType('array', $nameServers);
        $this->assertSame($nameServers, array_values($nameServers));

        self::log('Delete the hosted zone created.');
        $result = $route53->getCommand('DeleteHostedZone', array(
            'Id' => $zoneId,
        ))->getResult();
        $changeId = $result->getPath('ChangeInfo/Id');
        $this->assertStringStartsWith('/change/', $changeId);
        $this->assertEquals(Status::PENDING, $result->getPath('ChangeInfo/Status'));

        self::log('Get the change record and verify that it is being deleted.');
        $result = $route53->getCommand('GetChange', array(
            'Id' => $changeId,
        ))->getResult();
        $this->assertEquals(Status::PENDING, $result->getPath('ChangeInfo/Status'));
    }

}
