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

namespace Aws\Tests\Ec2\Iterator;

use Aws\Ec2\Iterator\DescribeInstancesIterator;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\Ec2\Iterator\DescribeInstancesIterator
 */
class DescribeInstancesIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testResultHandlingWorks()
    {
        // Prepare an iterator that will execute all LOC in handleResults
        $command = $this->getMock('Guzzle\Service\Command\CommandInterface');
        $iterator = new DescribeInstancesIterator($command);
        $model = new Model(array(
            'Reservations' => array(
                array(
                    'ReservationId' => 'R1',
                    'Instances' => array(
                        array('InstanceId' => 'R1I1'),
                        array('InstanceId' => 'R1I2'),
                    )
                ),
                array(
                    'ReservationId' => 'R2',
                    'Instances' => array(
                        array('InstanceId' => 'R2I1'),
                        array('InstanceId' => 'R2I2'),
                    )
                )
            )
        ));

        $class = new \ReflectionObject($iterator);
        $method = $class->getMethod('handleResults');
        $method->setAccessible(true);
        $items = $method->invoke($iterator, $model);

        // We should get an inverted structure based on how the concrete handles the results
        $this->assertSame(array(
            array(
                'InstanceId'  => 'R1I1',
                'Reservation' => array('ReservationId' => 'R1'),
            ),
            array(
                'InstanceId'  => 'R1I2',
                'Reservation' => array('ReservationId' => 'R1'),
            ),
            array(
                'InstanceId'  => 'R2I1',
                'Reservation' => array('ReservationId' => 'R2'),
            ),
            array(
                'InstanceId'  => 'R2I2',
                'Reservation' => array('ReservationId' => 'R2'),
            ),
        ), $items);
    }
}
