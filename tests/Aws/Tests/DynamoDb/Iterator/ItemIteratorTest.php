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

namespace Aws\Tests\DynamoDb\Iterator;

use Aws\DynamoDb\Iterator\ItemIterator;
use Guzzle\Service\Resource\Model;
use Aws\Common\Iterator\AwsResourceIterator;

/**
 * @covers Aws\DynamoDb\Iterator\ItemIterator
 */
class ItemIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConvertsItemStructureToSimpleHash()
    {
        $originalItems = array(
            array(
                'a' => array('S' => 'a1'),
                'b' => array('N' => 1),
            ),
            array(
                'a' => array('S' => 'a2'),
                'b' => array('N' => 2),
            )
        );

        $targetItems = array(
            array(
                'a' => 'a1',
                'b' => 1,
            ),
            array(
                'a' => 'a2',
                'b' => 2,
            )
        );

        $actualItems = iterator_to_array(ItemIterator::fromArray($originalItems));
        $this->assertEquals($targetItems, $actualItems);
    }
}
