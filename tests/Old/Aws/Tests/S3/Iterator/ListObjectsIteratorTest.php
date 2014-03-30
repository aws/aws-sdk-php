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

namespace Aws\Tests\S3\Iterator;

use Aws\S3\Iterator\ListObjectsIterator;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\S3\Iterator\ListObjectsIterator
 */
class ListObjectsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testResultHandlingWorks()
    {
        // Prepare an iterator that will execute all LOC in handleResults
        $command = $this->getMock('Guzzle\Service\Command\CommandInterface');
        $iterator = new ListObjectsIterator($command, array(
            'names_only'      => true,
            'return_prefixes' => true,
            'sort_results'    => true,
            'input_token'     => 'Marker',
            'output_token'    => 'NextMarker',
        ));
        $model = new Model(array(
            'Contents' => array(
                array('Key' => 'Foo'),
                array('Key' => 'Bar'),
                array('Key' => 'Baz'),
            ),
            'CommonPrefixes' => array(
                array('Prefix' => 'Fizz'),
                array('Prefix' => 'Buzz'),
            )
        ));

        $class = new \ReflectionObject($iterator);
        $method = $class->getMethod('handleResults');
        $method->setAccessible(true);
        $items = $method->invoke($iterator, $model);

        // We should get the names of all objects and prefixes in a sorted array
        $this->assertSame(array('Bar', 'Baz', 'Buzz', 'Fizz', 'Foo'), $items, print_r($items, true));

        // The last key should be set as the NextMarker in the result
        $this->assertEquals('Baz', $model->get('NextMarker'));
    }
}
