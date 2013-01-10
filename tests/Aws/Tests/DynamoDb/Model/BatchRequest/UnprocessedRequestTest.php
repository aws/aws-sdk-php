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

namespace Aws\Tests\DynamoDb\Model\BatchRequest;

use Aws\DynamoDb\Model\BatchRequest\UnprocessedRequest;

/**
 * @covers Aws\DynamoDb\Model\BatchRequest\UnprocessedRequest
 */
class UnprocessedRequestTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorSetsValues()
    {
        $data = array('foo' => 'bar');
        $unprocessedRequest = new UnprocessedRequest($data, 'table');

        $this->assertSame($data, $unprocessedRequest->toArray());
        $this->assertSame('table', $unprocessedRequest->getTableName());
    }
}
