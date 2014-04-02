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

namespace Aws\Tests;

class IntegrationTestCase extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * Log a message to STDERR
     *
     * @param string $message Message to log
     */
    public static function log($message)
    {
        fwrite(STDERR, $message . "\n");
    }

    /**
     * Get the resource prefix to add to created resources
     *
     * @return string
     */
    public static function getResourcePrefix()
    {
        if (!isset($_SERVER['PREFIX']) || $_SERVER['PREFIX'] == 'hostname') {
            $_SERVER['PREFIX'] = crc32(gethostname()) . rand(0, 10000);
        }

        return $_SERVER['PREFIX'];
    }

    /**
     * Check if mock responses should be used for integration tests rather than
     * true service calls
     *
     * @return bool
     */
    public function useMocks()
    {
        return (bool) get_cfg_var('mock');
    }

    /**
     * Mark the test as skipped if not running on EC2
     */
    protected function skipIfNotEc2()
    {
        // If we are not using mocks and the tests are not being run on EC2,
        // then skip these tests
        if (!$this->useMocks()) {
            $errno = $errstr = '';
            $fp = @fsockopen('http://169.254.169.254', 80, $errno, $errstr, 0.1);
            if (!$fp) {
                $this->markTestSkipped('Not on EC2');
            } else {
                fclose($fp);
            }
        }
    }
}
