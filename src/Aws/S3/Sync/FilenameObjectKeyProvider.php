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
    protected $directorySeparator;

    /**
     * @var string Prefix at prepend to each Amazon S3 object key
     */
    protected $keyPrefix = '';

    /**
     * @var string Base directory to remove from each file path before converting to an object key
     */
    protected $baseDir;

    /**
     * @param string $baseDir            Base directory to remove from each file path before converting to an object key
     * @param string $keyPrefix          Prefix at prepend to each Amazon S3 object key
     * @param string $directorySeparator Directory separator for Amazon S3 keys
     */
    public function __construct($baseDir, $keyPrefix, $directorySeparator = '/')
    {
        $this->baseDir = $baseDir;
        $this->keyPrefix = $keyPrefix;
        $this->directorySeparator = $directorySeparator;
    }

    /**
     * {@inheritdoc}
     */
    public function generateKey($filename)
    {
        // Remove the base directory from the key
        $key = str_replace($this->baseDir, '', $filename);
        // Replace Windows directory separators to become Unix style, and convert that to the custom dir separator
        $key = str_replace('/', $this->directorySeparator, str_replace('\\', '/', $key));
        // Add the key prefix
        $key = $this->keyPrefix . $key;

        return $key;
    }
}
