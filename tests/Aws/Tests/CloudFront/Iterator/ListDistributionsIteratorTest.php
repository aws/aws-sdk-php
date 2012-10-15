<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\Tests\CloudFront\Iterator;

/**
 * @covers Aws\CloudFront\Iterator\DefaultIterator
 */
class ListDistributionsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryCreatesClient()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(
            'cloudfront/ListDistributions_page_1',
            'cloudfront/ListDistributions_page_2'
        ));
        $iterator = $client->getIterator('ListDistributions');
        $this->assertInstanceOf('Aws\CloudFront\Iterator\DefaultIterator', $iterator);
        $result = iterator_to_array($client->getIterator('ListDistributions'));
        $this->assertEquals(3, count($result));
        $this->assertEquals('EXAMPLE1', $result[0]['Id']);
        $this->assertEquals('EXAMPLE2', $result[1]['Id']);
        $this->assertEquals('EXAMPLE3', $result[2]['Id']);
    }
}
