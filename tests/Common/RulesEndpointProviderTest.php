<?php
namespace Aws\Test\Common;

use Aws\Common\RulesEndpointProvider;
use Aws\Common\Exception\UnresolvedEndpointException;

/**
 * @covers Aws\Common\Api\RulesEndpointProvider
 */
class RulesEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Aws\Common\Exception\UnresolvedEndpointException
     * @expectedExceptionMessage Unable to resolve an endpoint for the foo service based on the provided configuration values: foo=baz, bam=boo, service=foo, scheme=https
     */
    public function testThrowsWhenEndpointIsNotResolved()
    {
        $e = new RulesEndpointProvider(['foo' => []]);
        $e->getEndpoint('foo', ['foo' => 'baz', 'bam' => 'boo']);
    }

    /**
     * @expectedException \Aws\Common\Exception\UnresolvedEndpointException
     * @expectedExceptionMessage No service found
     */
    public function testThrowsWhenEndpointIsMissing()
    {
        $e = new RulesEndpointProvider([]);
        $e->getEndpoint('foo', []);
    }

    public function testThrowsWithHelpfulRegionError()
    {
        try {
            $e = new RulesEndpointProvider([
                'foo' => [
                    [
                        'uri'         => 'foo',
                        'constraints' => [["region", "notEquals", null]]
                    ]
                ]
            ]);
            $e->getEndpoint('foo', []);
            $this->fail('Did not throw');
        } catch (UnresolvedEndpointException $e) {
            $this->assertContains(
                'Try specifying a valid \'region\' argument',
                $e->getMessage()
            );
        }
    }

    public function endpointProvider()
    {
        return [
            [['foo' => [['uri' => '/abc']]], 'foo', [], ['uri' => '/abc', 'properties' => []]],
            [['_default' => [['uri' => '/abc']]], 'foo', [], ['uri' => '/abc', 'properties' => []]],

            // startsWith true
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'startsWith', 'foo-']]
                        ]
                    ]
                ],
                'foo',
                ['region' => 'foo-east-2'],
                ['uri' => '/abc/foo-east-2', 'properties' => []]
            ],

            // startsWith pass
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'startsWith', 'foo-']]
                        ],
                        ['uri' => '{scheme}://{service}.other/{region}']
                    ]
                ],
                'foo',
                ['region' => 'bar'],
                ['uri' => 'https://foo.other/bar', 'properties' => []]
            ],

            // oneOf true
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'oneOf', ['foo']]]
                        ]
                    ]
                ],
                'foo',
                ['region' => 'foo'],
                ['uri' => '/abc/foo', 'properties' => []]
            ],

            // oneOf pass
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'oneOf', ['foo']]]
                        ],
                        ['uri' => '{scheme}://{service}.other/{region}']
                    ]
                ],
                'foo',
                ['region' => 'bar'],
                ['uri' => 'https://foo.other/bar', 'properties' => []]
            ],

            // equals true
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'equals', 'foo']]
                        ]
                    ]
                ],
                'foo',
                ['region' => 'foo'],
                ['uri' => '/abc/foo', 'properties' => []]
            ],

            // Equals pass
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'equals', 'foo']]
                        ],
                        ['uri' => '{scheme}://{service}.other/{region}']
                    ]
                ],
                'foo',
                ['region' => 'bar'],
                ['uri' => 'https://foo.other/bar', 'properties' => []]
            ],

            // notEquals true
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'notEquals', 'foo']]
                        ]
                    ]
                ],
                'foo',
                ['region' => 'bar'],
                ['uri' => '/abc/bar', 'properties' => []]
            ],

            // notEquals pass
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'notEquals', 'bar']]
                        ],
                        ['uri' => '{scheme}://{service}.other/{region}']
                    ]
                ],
                'foo',
                ['region' => 'bar'],
                ['uri' => 'https://foo.other/bar', 'properties' => []]
            ],

            // Skips unknown constraints
            [
                [
                    '_default' => [
                        [
                            'uri' => '/abc/{region}',
                            'constraints' => [['region', 'wha?', 'bar']]
                        ],
                        ['uri' => 'jarjar.binks']
                    ]
                ],
                'foo',
                ['region' => 'bar'],
                ['uri' => 'jarjar.binks', 'properties' => []]
            ],
        ];
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testResolvesEndpoints($data, $service, $input, $output)
    {
        $p = new RulesEndpointProvider($data);
        $this->assertEquals($output, $p->getEndpoint($service, $input));
    }

    public function testCanPrependRules()
    {
        $p = new RulesEndpointProvider([
            '_default' => [['uri' => '/abc']]
        ]);
        $this->assertEquals('/abc', $p->getEndpoint('foo')['uri']);
        $p->prependRule('_default', ['uri' => '/bar']);
        $this->assertEquals('/bar', $p->getEndpoint('foo')['uri']);
    }

    public function testCanAppendRules()
    {
        $p = new RulesEndpointProvider([
            '_default' => [
                ['uri' => '/abc', 'constraints' => ['foo', 'equals', 'bar']]
            ]
        ]);
        $p->appendRule('_default', ['uri' => '/bar']);
        $this->assertEquals('/bar', $p->getEndpoint('foo')['uri']);
    }

    public function testCanPrependRulesToEmptyList()
    {
        $p = new RulesEndpointProvider([]);
        $p->prependRule('foo', ['uri' => '/bar']);
        $this->assertEquals('/bar', $p->getEndpoint('foo')['uri']);
    }
}
