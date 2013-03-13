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

namespace Aws\Tests\Sns\MessageValidator;

use Aws\Sns\MessageValidator\SubscriptionConfirmationMessage;
use Guzzle\Common\Collection;

class SubscriptionConfirmationMessageTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testBuildsStringToSignCorrectly(/* ... */)
    {
        $this->markTestIncomplete('Not yet implemented.');
    }

    public function testRequiredKeysIncludeParentKeys()
    {
        $parentClass = new \ReflectionClass('Aws\Sns\MessageValidator\AbstractMessage');
        $parentMethod = $parentClass->getMethod('getRequiredKeys');
        $parentMethod->setAccessible(true);
        $parentRequiredKeys = $parentMethod->invoke(null);
        $this->assertNotEmpty($parentRequiredKeys);

        $childClass = new \ReflectionClass('Aws\Sns\MessageValidator\SubscriptionConfirmationMessage');
        $childMethod = $childClass->getMethod('getRequiredKeys');
        $childMethod->setAccessible(true);
        $childRequiredKeys = $childMethod->invoke(null);
        $this->assertNotEmpty($childRequiredKeys);

        $this->assertNotSameSize($parentRequiredKeys, $childRequiredKeys);
        $this->assertEquals(array('SubscribeURL', 'Token'), array_values(array_diff($childRequiredKeys, $parentRequiredKeys)));
    }
}
