<?php

namespace Aws\Tests\Common\Command;

use Aws\Common\Command\JsonBodyVisitor;
use Aws\DynamoDb\Model\Attribute;
use Guzzle\Service\Description\ApiParam;
use Guzzle\Http\Message\EntityEnclosingRequest;

/**
 * @covers Aws\Common\Command\JsonBodyVisitor
 */
class JsonBodyVisitorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testNormalizesQuery()
    {
        $param = $this->getApi();

        $request = new EntityEnclosingRequest('PUT', 'http://foo.com');
        $command = $this->getMockBuilder('Guzzle\Service\Command\CommandInterface')->getMockForAbstractClass();
        $visitor = new JsonBodyVisitor();

        $value = array();
        $this->assertEquals(array('[Key][HashKeyElement] is required'), $param->process($value));
        $value = array(
            'HashKeyElement'  => array('SS' => array('test', 'test123')),
            'RangeKeyElement' => array('N' => '123')
        );
        $this->assertTrue($param->process($value));
        $visitor->visit($param, $request, $value);
        $param->setName('Foo');
        $visitor->visit($param, $request, $value);

        $this->assertEquals(array (
            'HashKeyElement'  => array ('SS' => array('test', 'test123')),
            'RangeKeyElement' => array('N' => '123')
        ), $value);

        $visitor->after($command, $request);
        $this->assertEquals(
            '{"Key":{"HashKeyElement":{"SS":["test","test123"]},"RangeKeyElement":{"N":"123"}},'
            . '"Foo":{"HashKeyElement":{"SS":["test","test123"]},"RangeKeyElement":{"N":"123"}}}',
            (string) $request->getBody()
        );
    }

    public function testAllowsNestedToArrayObjects()
    {
        $param = $this->getApi();
        $request = new EntityEnclosingRequest('PUT', 'http://foo.com');
        $command = $this->getMockBuilder('Guzzle\Service\Command\CommandInterface')->getMockForAbstractClass();
        $visitor = new JsonBodyVisitor();
        $value = array('HashKeyElement'  => new Attribute('test'));
        $this->assertTrue($param->process($value));
        $visitor->visit($param, $request, $value);
        $visitor->after($command, $request);
        $this->assertEquals('{"Key":{"HashKeyElement":{"S":"test"}}}', (string) $request->getBody());
    }

    protected function getApi()
    {
        return new ApiParam(array(
            'name'       => 'Key',
            'type'       => 'object',
            'location'   => 'json',
            'properties' => array(
                'HashKeyElement' => array(
                    'type'       => 'object',
                    'properties' => array(
                        'S'  => array('type' => 'string'),
                        'N'  => array('type' => 'string'),
                        'B'  => array('type' => 'string'),
                        'SS' => array(
                            'type'  => 'array',
                            'items' => array('type' => 'string'),
                        ),
                        'NS' => array(
                            'type'  => 'array',
                            'items' => array('type' => 'string'),
                        ),
                        'BS' => array(
                            'type'  => 'array',
                            'items' => array('type' => 'string'),
                        ),
                    ),
                    'required' => true,
                ),
                'RangeKeyElement' => array(
                    'type'       => 'object',
                    'properties' => array(
                        'S'  => array('type' => 'string'),
                        'N'  => array('type' => 'string'),
                        'B'  => array('type' => 'string'),
                        'SS' => array(
                            'type'  => 'array',
                            'items' => array('type' => 'string'),
                        ),
                        'NS' => array(
                            'type'  => 'array',
                            'items' => array('type' => 'string'),
                        ),
                        'BS' => array(
                            'type'  => 'array',
                            'items' => array('type' => 'string'),
                        ),
                    ),
                ),
            ),
            'required' => true
        ));
    }
}
