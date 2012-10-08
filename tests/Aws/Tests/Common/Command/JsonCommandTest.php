<?php

namespace Aws\Tests\Common\Command;

use Aws\Common\ToArrayInterface;
use Aws\Common\Command\JsonCommand;
use Guzzle\Http\Message\Response;
use Guzzle\Service\Client;
use Guzzle\Service\Description\Operation;
use Guzzle\Service\Description\ServiceDescription;

/**
 * @covers Aws\Common\Command\JsonCommand
 */
class JsonCommandTest extends \Guzzle\Tests\GuzzleTestCase implements \IteratorAggregate, ToArrayInterface
{
    public function testAddsToJsonBody()
    {
        $api = new Operation(array(
            'name'       => 'foobar',
            'httpMethod' => 'POST',
            'parameters' => array(
                'test'      => array('location' => 'json'),
                'named'     => array('location' => 'json', 'sentAs' => 'Foo'),
                'ignore_me' => array('location' => 'header')
            )
        ));

        $command = new JsonCommand(array('test'  => '123', 'named' => 'abc'), $api);
        $command->setClient(new Client());
        $request = $command->prepare();
        $json = json_decode((string) $request->getBody(), true);
        $this->assertEquals('123', $json['test']);
        $this->assertEquals('abc', $json['Foo']);
    }

    public function testAllowsToArrayParameters()
    {
        $api = new Operation(array(
            'name'       => 'foo',
            'httpMethod' => 'POST',
            'parameters' => array(
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

    public function testEnsuresThatBodyIsAlwaysSet()
    {
        $command = new JsonCommand();
        $command->setClient(new Client());
        $request = $command->prepare();
        $this->assertEquals('{}', (string) $request->getBody());
    }

    public function toArray()
    {
        return $this->data;
    }

    protected $data = array('baz' => 'bar');

    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function testUsesProcessedModelsWhenEnabled()
    {
        $d = ServiceDescription::factory(array(
            'operations' => array(
                'foobar' =>array(
                    'name'          => 'foobar',
                    'httpMethod'    => 'PUT',
                    'responseClass' => 'foo',
                    'responseType'  => 'model',
                    'class'         => 'Aws\Common\Command\JsonCommand',
                    'parameters' => array(
                        'test'      => array('location' => 'query')
                    )
                )
            ),
            'models' => array(
                'foo' => array(
                    'type'       => 'object',
                    'properties' => array(
                        'test' => array(
                            'type'     => 'string',
                            'location' => 'json',
                            'filters'  => array('strtoupper')
                        )
                    )
                )
            )
        ));

        $response = new Response(200, array('Content-Type' => 'application/json'), '{"test":"bar"}');
        $client = new Client('http://localhost:1245');
        $client->setDescription($d);
        $this->setMockResponse($client, array($response));
        $command = $client->getCommand('foobar');
        $this->assertEquals(array('test' => 'bar'), $command->execute()->toArray());
        $this->setMockResponse($client, array($response));
        $command = $client->getCommand('foobar');
        $command->set('command.model_processing', true);
        $this->assertEquals(array('test' => 'BAR'), $command->execute()->toArray());
    }
}
