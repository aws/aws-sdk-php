<?php

namespace Aws\Tests\Common\Command;

use Aws\Common\ToArrayInterface;
use Aws\Common\Command\JsonCommand;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ApiCommand;

/**
 * @covers Aws\Common\Command\JsonCommand
 * @covers Aws\Common\Command\JsonBodyVisitor
 */
class JsonCommandTest extends \Guzzle\Tests\GuzzleTestCase implements ToArrayInterface
{
    public function testAddsToJsonBody()
    {
        $api = new ApiCommand(array(
            'name'   => 'foobar',
            'method' => 'POST',
            'params' => array(
                'test' => array(
                    'location' => 'json'
                ),
                'named' => array(
                    'location'     => 'json',
                    'location_key' => 'Foo'
                ),
                'ignore_me' => array(
                    'location' => 'header'
                )
            )
        ));

        $command = new JsonCommand(array(
            'test'  => '123',
            'named' => 'abc'
        ), $api);

        $command->setClient(new Client());

        $request = $command->prepare();
        $json = json_decode((string) $request->getBody(), true);

        $this->assertEquals('123', $json['test']);
        $this->assertEquals('abc', $json['Foo']);
    }

    public function testAllowsToArrayParameters()
    {
        $api = new ApiCommand(array(
            'name'   => 'foo',
            'method' => 'POST',
            'params' => array(
                'test' => array('location' => 'json'),
                'foo'  => array('location' => 'json', 'type' => 'object')
            )
        ));

        $command = new JsonCommand(array(
            'test' => $this,
            'foo'  => array('baz' => $this)
        ), $api);

        $command->setClient(new Client());
        $request = $command->prepare();
        $json = json_decode((string) $request->getBody(), true);
        $this->assertEquals(array('baz' => 'bar'), $json['test']);
        $this->assertEquals(array('baz' => array('baz' => 'bar')), $json['foo']);
    }

    public function toArray()
    {
        return $this->data;
    }

    /**
     * @var array Data
     */
    protected $data = array('baz' => 'bar');

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }
}
