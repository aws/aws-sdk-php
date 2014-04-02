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

namespace Aws\Tests\ElasticLoadBalancing\Integration;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\ElasticLoadBalancing\ElasticLoadBalancingClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('elasticloadbalancing');
    }

    public function testDescribesLoadBalancers()
    {
        $command = $this->client->getCommand('DescribeLoadBalancers');
        $result = $command->execute();
        $this->assertNotNull($result->getPath('ResponseMetadata/RequestId'));
        $this->assertInternalType('array', $result['LoadBalancerDescriptions']);

        // Gather a list of IDs and pass them to the next test
        $ids = array();

        if (count($result['LoadBalancerDescriptions'])) {
            foreach ($result['LoadBalancerDescriptions'] as $i => $app) {
                // Ensure that the list is enumerated
                $this->assertInternalType('integer', $i);
                $this->assertInternalType('array', $app['SecurityGroups']);
                $this->assertArrayHasKey(0, $app['AvailabilityZones']);
                $this->assertInternalType('string', $app['AvailabilityZones'][0]);
                $this->assertInternalType('string', $app['Scheme']);
                $this->assertInternalType('array', $app['Policies']);
                $ids[] = $app['LoadBalancerName'];
            }
        }

        return $ids;
    }

    /**
     * @depends testDescribesLoadBalancers
     */
    public function testAllowsMemberedListsInInputs(array $ids = array())
    {
        if (!count($ids)) {
            $this->markTestSkipped('No load balancers were found on your account');
            return;
        }

        $command = $this->client->getCommand('DescribeLoadBalancers', array('LoadBalancerNames' => $ids));
        $result = $command->execute();

        if ($result['NextMarker']) {
            $this->assertGreaterThan(0, count($result['LoadBalancerDescriptions']));
        } else {
            $this->assertEquals(count($ids), count($result['LoadBalancerDescriptions']));
        }
    }

    public function testDescribesLoadBalancerPolicyTypes()
    {
        $command = $this->client->getCommand('DescribeLoadBalancerPolicies');
        $result = $command->execute();
        $this->assertNotNull($result->getPath('ResponseMetadata/RequestId'));
        $this->assertInternalType('array', $result['PolicyDescriptions']);

        if (count($result['PolicyDescriptions'])) {
            foreach ($result['PolicyDescriptions'] as $i => $p) {
                // Ensure that the list is enumerated
                $this->assertInternalType('integer', $i);
                $this->assertInternalType('string', $p['PolicyName']);
                $this->assertInternalType('string', $p['PolicyTypeName']);
                $this->assertInternalType('array', $p['PolicyAttributeDescriptions']);
                $this->assertArrayHasKey(0, $p['PolicyAttributeDescriptions']);
            }
        }
    }
}
