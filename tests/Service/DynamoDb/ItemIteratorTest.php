<?php
namespace Aws\Test\Service\DynamoDb;

use Aws\Result;
use Aws\Service\DynamoDb\ItemIterator;
use GuzzleHttp\Collection;

/**
 * @covers Aws\Service\DynamoDb\ItemIterator
 */
class ItemIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertsItemStructureToSimpleHash()
    {
        $originalItems = [
            [
                'a' => ['S' => 'a1'],
                'b' => ['N' => 1],
            ],
            [
                'a' => ['S' => 'a2'],
                'b' => ['N' => 2],
            ],
            [
                'a' => ['S' => 'a3'],
                'c' => ['SS' => ['c3a', 'c3b']],
            ],
        ];

        $targetItems = [
            new Collection([
                'a' => 'a1',
                'b' => 1,
            ]),
            new Collection([
                'a' => 'a2',
                'b' => 2,
            ]),
            new Collection([
                'a' => 'a3',
                'c' => ['c3a', 'c3b'],
            ]),
        ];

        $iterator = new ItemIterator(new \ArrayIterator($originalItems));
        $this->assertCount(3, $iterator);
        $actualItems = $iterator->toArray();
        foreach ($actualItems as $index => $item) {
            $this->assertInstanceOf('GuzzleHttp\Collection', $item);
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
        return [
            // Scan/Query results
            [
                [
                    'Items' => [
                        ['a' => ['S' => 'a1'], 'b' => ['S' => 'b1']],
                        ['a' => ['S' => 'a2'], 'b' => ['S' => 'b2']],
                    ]
                ],
                [
                    ['a' => 'a1', 'b' => 'b1'],
                    ['a' => 'a2', 'b' => 'b2'],
                ]
            ],

            // GetItem results
            [
                [
                    'Item' => [
                        'a' => ['S' => 'a3'],
                        'b' => ['S' => 'b3']
                    ],
                ],
                [
                    ['a' => 'a3', 'b' => 'b3']
                ]
            ],

            // UpdateItem/PutItem results
            [
                [
                    'Attributes' => [
                        'a' => ['S' => 'a4'],
                        'b' => ['S' => 'b4']
                    ],
                ],
                [
                    ['a' => 'a4', 'b' => 'b4']
                ]
            ],

            // BatchGetItem results
            [
                [
                    'Responses' => [
                        'foo' => [
                            ['a' => ['S' => 'a5'], 'b' => ['S' => 'b5']],
                            ['a' => ['S' => 'a6'], 'b' => ['S' => 'b6']],
                        ],
                        'bar' => [
                            ['a' => ['S' => 'a7'], 'b' => ['S' => 'b7']],
                            ['a' => ['S' => 'a8'], 'b' => ['S' => 'b8']],
                        ],
                    ]
                ],
                [
                    ['a' => 'a5', 'b' => 'b5'],
                    ['a' => 'a6', 'b' => 'b6'],
                    ['a' => 'a7', 'b' => 'b7'],
                    ['a' => 'a8', 'b' => 'b8'],
                ]
            ],

            // ListTables result
            [
                ['TableNames' => ['foo', 'bar', 'baz']],
                []
            ],
        ];
    }

    /**
     * @dataProvider dataForFromResultsTest
     */
    public function testCanGetItemsFromDifferentKindsOfResults(array $result, array $expectedItems)
    {
        $actualItems = array_map(function (Collection $item) {
            return $item->toArray();
        }, ItemIterator::fromResult(new Result($result))->toArray());

        $this->assertEquals($expectedItems, $actualItems);
    }

    public function testGetFirstWorksNoMatterWhereTheCursorIs()
    {
        $iterator = new ItemIterator(new \ArrayIterator([
            ['letter' => ['S' => 'a']],
            ['letter' => ['S' => 'b']],
            ['letter' => ['S' => 'c']],
        ]));

        $this->assertEquals('a', $iterator->getFirst()->get('letter'));

        $iterator->next();
        $this->assertEquals('b', $iterator->current()->get('letter'));
        $this->assertEquals('a', $iterator->getFirst()->get('letter'));
    }
}
