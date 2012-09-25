<?php

namespace Aws\Tests\S3\Command;

use Aws\S3\Command\FakeModelResponseParser;
use Guzzle\Common\Event;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Client;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Message\Request;

/**
 * @covers Aws\S3\Command\FakeModelResponseParser
 */
class FakeModelResponseParserTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasEvents()
    {
        $this->assertNotEmpty(FakeModelResponseParser::getSubscribedEvents());
    }

    public function testAddsResponseParserOnCommandCreate()
    {
        $fake = new FakeModelResponseParser();
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->setMethods(array('setResponseParser'))
            ->getMock();
        $command->expects($this->once())
            ->method('setResponseParser')
            ->with($fake);
        $event = new Event(array('command' => $command));
        $fake->onCommandCreate($event);
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
        $fake = new FakeModelResponseParser();
        $formatResult = new \ReflectionMethod($fake, 'formatResult');
        $formatResult->setAccessible(true);
        $actual = $formatResult->invoke($fake, $xml, $repeatables);
        $this->assertSame($expected, $actual);
    }

    public function testConvertsXmlToArrayWhenNoMatchingOperationIsFound()
    {
        $fake = new FakeModelResponseParser();
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->setMethods(array('getName'))
            ->getMock();
        $command->expects($this->once())->method('getName')->will($this->returnValue('foo'));
        $client = new Client();
        $this->setMockResponse($client, array(
            new Response(200, array('Content-Type' => 'application/xml'), '<foo><baz>Bar</baz></foo>')
        ));
        $command->setClient($client);
        $command->setResponseParser($fake);
        $command->execute();
        $this->assertEquals(array(
            'baz' => 'Bar'
        ), $command->getResult());
    }

    public function testConvertsXmlToArrayWhenMatchingOperationIsFound()
    {
        $fake = new FakeModelResponseParser();
        $command = $this->getMockBuilder('Guzzle\Service\Command\OperationCommand')
            ->setMethods(array('getName'))
            ->getMock();
        $command->expects($this->once())->method('getName')->will($this->returnValue('ListParts'));
        $client = new Client();
        $this->setMockResponse($client, 's3/list_parts_single');
        $command->setClient($client);
        $command->setResponseParser($fake);
        $result = $command->execute();
        $this->assertArrayHasKey('Part', $result);
        $this->assertInternalType('array', $result['Part']);
        $this->assertEquals(array(
            array(
                'PartNumber'       => '1',
                'LastModified'     => '2010-11-10T20:48:34.000Z',
                'ETag'             => '"7778aef83f66abc1fa1e8477f296d394"',
                'Size'             => '10485760',
                'ContainerElement' => 'Part'
            )
        ), $result['Part']);
    }
}
