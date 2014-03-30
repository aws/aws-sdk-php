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

class MockPhpStream
{
    protected static $startingData = '';
    protected $index;
    protected $length;
    protected $data;

    public static function setStartingData($data)
    {
        self::$startingData = $data;
    }

    public function __construct()
    {
        $this->data = self::$startingData;
        $this->index = 0;
        $this->length = strlen(self::$startingData);
    }

    public function stream_open($path, $mode, $options, &$opened_path)
    {
        return true;
    }

    public function stream_close()
    {
    }

    public function stream_stat()
    {
        return array();
    }

    public function stream_flush()
    {
        return true;
    }

    public function stream_read($count)
    {
        $length = min($count, $this->length - $this->index);
        $data = substr($this->data, $this->index);
        $this->index = $this->index + $length;

        return $data;
    }

    public function stream_eof()
    {
        return ($this->index >= $this->length);
    }

    public function stream_write($data)
    {
        return 0;
    }
}
