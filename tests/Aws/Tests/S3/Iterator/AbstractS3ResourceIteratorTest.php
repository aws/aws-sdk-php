<?php

namespace Aws\Tests\Common\Iterator;

use Aws\S3\Iterator\AbstractS3ResourceIterator;
use Guzzle\Service\Command\AbstractCommand;

/**
 * @covers Aws\S3\Iterator\AbstractS3ResourceIterator
 */
class AbstractS3ResourceIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testPrepareRequestSetsPageSizeCorrectly()
    {
        $command = $this->getMockedCommand();
        $command->set('max-keys', 8);

        $iterator = $this->getMockedIterator($command);
        $iterator->setPageSize(10);

        $prepareRequest = new \ReflectionMethod($iterator, 'prepareRequest');
        $prepareRequest->setAccessible(true);
        $prepareRequest->invoke($iterator);

        $this->assertEquals(8, $command->get('max-keys'));
    }

    public function testApplyNextTokenSetsTokenCorrectly()
    {
        $command = $this->getMockedCommand();
        $iterator = $this->getMockedIterator($command);

        $property = new \ReflectionProperty($iterator, 'nextToken');
        $property->setAccessible(true);
        $property->setValue($iterator, array('foo' => 'bar'));

        $applyNextToken = new \ReflectionMethod($iterator, 'applyNextToken');
        $applyNextToken->setAccessible(true);
        $applyNextToken->invoke($iterator);

        $this->assertEquals('bar', $command->get('foo'));
    }

    public function getDataForFormatRequestTest()
    {
        $testCases = array();

        // 1. Not set as repeatable, no transposing
        $testCases[] = array(
            '<Root><Single>foo</Single></Root>',
            array(),
            array('Single' => 'foo')
        );

        // 2. Transpose repeatable at first level
        $testCases[] = array(
            '<Root><Repeatable><Foo>bar</Foo></Repeatable></Root>',
            array('Repeatable'),
            array('Repeatable' => array(
                array(
                    'Foo' => 'bar',
                    'ContainerElement' => 'Repeatable'
                )
            ))
        );

        // 3. Transpose repeatable at second level
        $testCases[] = array(
            '<Root><Container><Repeatable><Foo>bar</Foo></Repeatable></Container></Root>',
            array('Container.Repeatable'),
            array('Container' => array(
                'Repeatable' => array(
                    array(
                        'Foo' => 'bar',
                        'ContainerElement' => 'Repeatable'
                    )
                ))
            )
        );

        // 4. Discover repeatable, do not transpose, still add container element
        $testCases[] = array(
            '<Root><Container><Repeatable><Foo>bar</Foo></Repeatable><Repeatable><Foo>baz</Foo></Repeatable></Container></Root>',
            array('Container.Repeatable'),
            array('Container' => array(
                'Repeatable' => array(
                    array(
                        'Foo' => 'bar',
                        'ContainerElement' => 'Repeatable'
                    ),
                    array(
                        'Foo' => 'baz',
                        'ContainerElement' => 'Repeatable'
                    )
                ))
            )
        );

        // 5. Create empty repeatable at first level
        $testCases[] = array(
            '<Root></Root>',
            array('Repeatable'),
            array('Repeatable' => array())
        );

        // 6. Create empty repeatable at second level
        $testCases[] = array(
            '<Root></Root>',
            array('Container.Repeatable'),
            array('Container' => array('Repeatable' => array()))
        );

        // 7. Create repeatable from empty node (Not actually used)
        $testCases[] = array(
            '<Root><Repeatable/></Root>',
            array('Repeatable'),
            array('Repeatable' => array(
                array('ContainerElement' => 'Repeatable')
            ))
        );

        // Convert xml into simple xml
        foreach ($testCases as &$testCase) {
            $testCase[0] = new \SimpleXMLElement($testCase[0]);
        }

        return $testCases;
    }

    /**
     * @dataProvider getDataForFormatRequestTest
     */
    public function testFormatRequestHandlesRepeatableSituations(
        \SimpleXMLElement $xml,
        array $repeatables,
        array $expected
    ) {
        $command = $this->getMockedCommand();
        $iterator = $this->getMockedIterator($command);

        $formatResult = new \ReflectionMethod($iterator, 'formatResult');
        $formatResult->setAccessible(true);
        $actual = $formatResult->invoke($iterator, $xml, $repeatables);

        $this->assertSame($expected, $actual);
    }

    /**
     * @return AbstractCommand
     */
    protected function getMockedCommand()
    {
        return $this->getMockBuilder('Guzzle\Service\Command\DynamicCommand')
            ->disableOriginalConstructor()
            ->setMethods(array('execute'))
            ->getMock();
    }

    /**
     * @return AbstractS3ResourceIterator
     */
    protected function getMockedIterator(AbstractCommand $command)
    {
        $iterator = $this->getMockForAbstractClass(
            'Aws\S3\Iterator\AbstractS3ResourceIterator', array(), '', false
        );

        $property = new \ReflectionProperty($iterator, 'command');
        $property->setAccessible(true);
        $property->setValue($iterator, $command);

        return $iterator;
    }
}
