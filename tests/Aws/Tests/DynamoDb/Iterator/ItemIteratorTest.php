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

    public function dataForFromResultsTest()
    {
        return array(
            // Scan/Query results
            array(
                array(
                    'Items' => array(
                        array('a' => array('S' => 'a1'), 'b' => array('S' => 'b1')),
                        array('a' => array('S' => 'a2'), 'b' => array('S' => 'b2')),
                    )
                ),
                array(
                    array('a' => 'a1', 'b' => 'b1'),
                    array('a' => 'a2', 'b' => 'b2'),
                )
            ),

            // GetItem results
            array(
                array(
                    'Item' => array(
                        'a' => array('S' => 'a3'),
                        'b' => array('S' => 'b3')
                    ),
                ),
                array(
                    array('a' => 'a3', 'b' => 'b3')
                )
            ),

            // UpdateItem/PutItem results
            array(
                array(
                    'Attributes' => array(
                        'a' => array('S' => 'a4'),
                        'b' => array('S' => 'b4')
                    ),
                ),
                array(
                    array('a' => 'a4', 'b' => 'b4')
                )
            ),

            // BatchGetItem results
            array(
                array(
                    'Responses' => array(
                        'foo' => array(
                            array('a' => array('S' => 'a5'), 'b' => array('S' => 'b5')),
                            array('a' => array('S' => 'a6'), 'b' => array('S' => 'b6')),
                        ),
                        'bar' => array(
                            array('a' => array('S' => 'a7'), 'b' => array('S' => 'b7')),
                            array('a' => array('S' => 'a8'), 'b' => array('S' => 'b8')),
                        ),
                    )
                ),
                array(
                    array('a' => 'a5', 'b' => 'b5'),
                    array('a' => 'a6', 'b' => 'b6'),
                    array('a' => 'a7', 'b' => 'b7'),
                    array('a' => 'a8', 'b' => 'b8'),
                )
            ),

            // ListTables result
            array(
                array('TableNames' => array('foo', 'bar', 'baz')),
                array()
            ),
        );
    }

    /**
     * @dataProvider dataForFromResultsTest
     */
    public function testCanGetItemsFromDifferentKindsOfResults(array $result, array $expectedItems)
    {
        $actualItems = array_map(function (Collection $item) {
            return $item->toArray();
        }, ItemIterator::fromResult(new Model($result))->toArray());

        $this->assertEquals($expectedItems, $actualItems);
    }

    public function testGetFirstWorksNoMatterWhereTheCursorIs()
    {
        $iterator = new ItemIterator(new \ArrayIterator(array(
            array('letter' => array('S' => 'a')),
            array('letter' => array('S' => 'b')),
            array('letter' => array('S' => 'c')),
        )));

        $this->assertEquals('a', $iterator->getFirst()->get('letter'));

        $iterator->next();
        $this->assertEquals('b', $iterator->current()->get('letter'));
        $this->assertEquals('a', $iterator->getFirst()->get('letter'));
    }
}
