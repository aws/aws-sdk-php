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

namespace Aws\Tests\StorageGateway\Integration;

use Aws\StorageGateway\Enum\GatewayTimezone;
use Aws\StorageGateway\Enum\GatewayType;
use Aws\StorageGateway\StorageGatewayClient;
use Aws\Common\Enum\Region;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var StorageGatewayClient
     */
    protected $sg;

    public function setUp()
    {
        $this->sg = $this->getServiceBuilder()->get('storagegateway');
        $this->sg->setRegion(Region::US_WEST_2);
    }

    public function testListOperation()
    {
        $result = $this->sg->listGateways();
        $this->assertArrayHasKey('Gateways', $result->toArray());
    }

    /**
     * @expectedException \Aws\StorageGateway\Exception\InvalidGatewayRequestException
     * @expectedExceptionMessage The specified activation key was not found.
     */
    public function testFailsToActivateInvalidGateway()
    {
        $this->sg->activateGateway(array(
            'ActivationKey'   => 'fooV1-barV9-VVIUB-NKT0I-LRO6V',
            'GatewayName'     => 'mygateway',
            'GatewayTimezone' => GatewayTimezone::GMT_MINUS_1200,
            'GatewayRegion'   => Region::US_WEST_2,
            'GatewayType'     => GatewayType::CACHED,
        ));
    }
}
