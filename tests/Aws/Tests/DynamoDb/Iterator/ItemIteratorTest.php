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
use Guzzle\Common\Collection;
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
            ),
            array(
                'a' => array('S' => 'a3'),
                'c' => array('B' => base64_encode('c3')),
            ),
            array(
                'a' => array('S' => 'a4'),
                'd' => array('SS' => array('d4a', 'd4b')),
            ),
            array(
                'a' => array('S' => 'a5'),
                'e' => array('BS' => array(base64_encode('e5a'), base64_encode('e5b'))),
            )
        );

        $targetItems = array(
            new Collection(array(
                'a' => 'a1',
                'b' => 1,
            )),
            new Collection(array(
                'a' => 'a2',
                'b' => 2,
            )),
            new Collection(array(
                'a' => 'a3',
                'c' => 'c3',
            )),
            new Collection(array(
                'a' => 'a4',
                'd' => array('d4a', 'd4b'),
            )),
            new Collection(array(
                'a' => 'a5',
                'e' => array('e5a', 'e5b'),
            ))
        );

        $iterator = new ItemIterator(new \ArrayIterator($originalItems));
        $this->assertCount(5, $iterator);
        $actualItems = $iterator->toArray();
        foreach ($actualItems as $index => $item) {
            $this->assertInstanceOf('Guzzle\Common\Collection', $item);
            $this->assertEquals($item->toArray(), $targetItems[$index]->toArray());
        }

    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFailsOnNonCountableIterator()
    {
        $inner = new \InfiniteIterator(new \ArrayIterator(range(0, 9)));
        $items = new ItemIterator($inner);
    }
}
