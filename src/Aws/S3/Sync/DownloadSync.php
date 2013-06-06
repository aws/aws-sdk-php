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

use Aws\Common\Exception\RuntimeException;
use Aws\S3\ResumableDownload;
use Aws\S3\S3Client;
use Aws\S3\Model\MultipartUpload\AbstractTransfer;
use Guzzle\Http\EntityBody;

/**
 * Downloads and Amazon S3 bucket to a local directory
 */
class DownloadSync extends AbstractSync
{
    protected function createTransferAction(\SplFileInfo $file)
    {
        list($bucket, $key) = explode('/', substr($file, 5), 2);
        $filename = '/' . $this->options['source_converter']->convert($file);
        $directory = dirname($filename);

        // Create the directory if it does not exist
        if (!is_dir($directory) && !mkdir($directory, 0777, true)) {
            // @codeCoverageIgnoreStart
            throw new RuntimeException('Could not create directory: ' . $directory);
            // @codeCoverageIgnoreEnd
        }

        // Allow a previously interrupted download to resume
        if (file_exists($filename) && $this->options['resumable']) {
            return new ResumableDownload($this->options['client'], $bucket, $key, $filename);
        }

        return $this->options['client']->getCommand('GetObject', array(
            'Bucket' => $bucket,
            'Key'    => $key,
            'SaveAs' => $filename
        ));
    }
}
