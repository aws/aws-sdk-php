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

namespace Aws\Tests\ImportExport\Iterator;

use Aws\ImportExport\Iterator\ListJobsIterator;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\ImportExport\Iterator\ListJobsIterator
 */
class ListJobsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function dataForGetNextTokenTest()
    {
        return array(
            // Case where there IS a next token (4)
            array(true, 4),
            // Case where there is NOT a next token
            array(false, null),
        );
    }

    /**
     * @dataProvider dataForGetNextTokenTest
     */
    public function testCanGetNextToken($isTruncated, $expectedNextToken)
    {
        $command = $this->getMock('Guzzle\Service\Command\CommandInterface');
        $iterator = new ListJobsIterator($command, array(
            'result_key' => 'Jobs',
            'more_key'   => 'IsTruncated',
        ));
        $model = new Model(array(
            'Jobs' => array(
                array('JobId' => 1),
                array('JobId' => 2),
                array('JobId' => 3),
                array('JobId' => 4),
            ),
            'IsTruncated' => $isTruncated,
        ));

        $class = new \ReflectionObject($iterator);
        $method = $class->getMethod('determineNextToken');
        $method->setAccessible(true);
        $method->invoke($iterator, $model);

        $this->assertEquals($expectedNextToken, $this->readAttribute($iterator, 'nextToken'));
    }
}
