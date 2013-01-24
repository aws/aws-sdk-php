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

namespace Aws\Tests\Common\Command;

use Aws\Common\Command\JsonCommand;
use Guzzle\Common\ToArrayInterface;
use Guzzle\Service\Client;
use Guzzle\Service\Description\Operation;

/**
 * @covers Aws\Common\Command\JsonCommand
 */
class JsonCommandTest extends \Guzzle\Tests\GuzzleTestCase implements ToArrayInterface
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
                'foo'  => array(
                    'location' => 'json',
                    'type'     => 'object',
                    'properties' => array(
                        'baz' => array(
                            'type' => 'string'
                        )
                    )
                )
            )
        ));

        $command = new JsonCommand(array(
            'test' => 'hello',
            'foo'  => $this
        ), $api);

        $command->setClient(new Client());
        $request = $command->prepare();
        $json = json_decode((string) $request->getBody(), true);
        $this->assertEquals('hello', $json['test']);
        $this->assertEquals(array('baz' => 'bar'), $json['foo']);
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
        return array('baz' => 'bar');
    }
}
