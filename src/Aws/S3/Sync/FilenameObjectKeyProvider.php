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

namespace Aws\S3\Sync;

/**
 * Generates Amazon S3 object keys from local filenames
 */
class FilenameObjectKeyProvider implements FilenameObjectKeyProviderInterface
{
    /**
     * @var string Directory separator for Amazon S3 keys
     */
    protected $delimiter;

    /**
     * @var string Prefix to prepend to each Amazon S3 object key
     */
    protected $prefix;

    /**
     * @var string Base directory to remove from each file path before converting to an object key
     */
    protected $baseDir;

    /**
     * @param string $baseDir   Base directory to remove from each file path before converting to an object key
     * @param string $prefix    Prefix at prepend to each Amazon S3 object key
     * @param string $delimiter Directory separator for Amazon S3 keys
     */
    public function __construct($baseDir, $prefix = '', $delimiter = '/')
    {
        $this->baseDir = $baseDir;
        $this->prefix = $prefix;
        $this->delimiter = $delimiter;
    }

    public function generateKey($filename)
    {
        // Remove the base directory from the key
        $key = str_replace($this->baseDir, '', $filename);
        // Replace Windows directory separators to become Unix style, and convert that to the custom dir separator
        $key = str_replace('/', $this->delimiter, str_replace('\\', '/', $key));
        // Add the key prefix
        $key = $this->prefix . $key;

        return $key;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }
}
