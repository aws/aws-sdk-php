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

namespace Aws\Tests\SimpleDb\Integration;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\SimpleDb\SimpleDbClient
     */
    protected $client;
    protected $domainName;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('sdb');
        $this->domainName = 'foo123';
    }

    public function testCreatesDomain()
    {
        $this->client->createDomain(array('DomainName' => $this->domainName));
    }

    /**
     * @depends testCreatesDomain
     */
    public function testListsDomainsResultIsProcessedCorrectly()
    {
        $result = $this->client->listDomains();
        $this->assertInternalType('array', $result['DomainNames']);
        $this->assertNull($result['DomainName']);

        $found = false;
        foreach ($result['DomainNames'] as $n) {
            if ($n == $this->domainName) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->fail('Did not find ' . $this->domainName . ' in domain list');
        }

        // Ensure that the iterator works
        $i = $this->client->getIterator('ListDomains');
        $found = false;
        foreach ($i as $n) {
            if ($n == $this->domainName) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->fail('Did not find ' . $this->domainName . ' in domain list');
        }
    }

    /**
     * @depends testCreatesDomain
     */
    public function testAddsItem()
    {
        $this->client->putAttributes(array(
            'DomainName' => $this->domainName,
            'ItemName'   => 'test',
            'Attributes' => array(
                array('Name' => 'a', 'Value' => 1, 'Replace' => true),
                array('Name' => 'b', 'Value' => 2),
            )
        ));

        $result = $this->client->getAttributes(array(
            'DomainName' => $this->domainName,
            'ItemName'   => 'test',
            'Attributes' => array(
                'a', 'b'
            ),
            'ConsistentRead' => true
        ));

        $this->assertEquals('b', $result->getPath('Attributes/0/Name'));
        $this->assertEquals('2', $result->getPath('Attributes/0/Value'));
        $this->assertEquals('a', $result->getPath('Attributes/1/Name'));
        $this->assertEquals('1', $result->getPath('Attributes/1/Value'));
        $this->assertArrayHasKey('ResponseMetadata', $result->toArray());
    }

    /**
     * @depends testAddsItem
     */
    public function testSelectsItems()
    {
        $result = $this->client->select(array(
            'SelectExpression' => 'select * from ' . $this->domainName,
            'ConsistentRead' => true
        ));
        $this->assertCount(1, $result['Items']);
        $this->assertEquals(array(
            'Name' => 'test',
            'Attributes' => array(
                array(
                    'Name' => 'b',
                    'Value' => '2',
                ),
                array(
                    'Name' => 'a',
                    'Value' => '1',
                ),
            ),
        ), $result['Items'][0]);

        // Ensure that the select iterator works
        $i = $this->client->getIterator('Select', array(
            'SelectExpression' => 'select * from ' . $this->domainName,
            'ConsistentRead' => true
        ));
        $this->assertEquals(array(
            array(
                'Name' => 'test',
                'Attributes' => array(
                    array(
                        'Name' => 'b',
                        'Value' => '2',
                    ),
                    array(
                        'Name' => 'a',
                        'Value' => '1',
                    ),
                ),
            )
        ), iterator_to_array($i));
    }

    /**
     * @depends testSelectsItems
     */
    public function testDeleteDomains()
    {
        $this->client->deleteDomain(array('DomainName' => $this->domainName));
    }
}
