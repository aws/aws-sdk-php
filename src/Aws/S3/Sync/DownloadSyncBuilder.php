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
use Aws\Common\Model\MultipartUpload\AbstractTransfer;
use Aws\S3\S3Client;
use Guzzle\Common\Event;
use Guzzle\Http\EntityBody;

class DownloadSyncBuilder extends AbstractSyncBuilder
{
    /** @var bool */
    protected $resumable = false;

    /** @var string */
    protected $directory;

    /**
     * Set the directory where the objects from be downloaded to
     *
     * @param string $directory Directory
     *
     * @return self
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Call this function to allow partial downloads to be resumed if the download was previously interrupted
     *
     * @return self
     */
    public function allowResumableDownloads()
    {
        $this->resumable = true;

        return $this;
    }

    protected function specificBuild()
    {
        $sync = new DownloadSync(array(
            'client'           => $this->client,
            'bucket'           => $this->bucket,
            'iterator'         => $this->sourceIterator,
            'source_converter' => $this->sourceConverter,
            'target_converter' => $this->targetConverter,
            'concurrency'      => $this->concurrency,
            'resumable'        => $this->resumable,
            'directory'        => $this->directory
        ));

        return $sync;
    }

    protected function getTargetIterator()
    {
        if (!is_dir($this->directory) && !mkdir($this->directory)) {
            // @codeCoverageIgnoreStart
            throw new RuntimeException('Unable to create root download directory: ' . $this->directory);
            // @codeCoverageIgnoreEnd
        }

        return $this->filterIterator(
            new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->directory))
        );
    }

    protected function getDefaultSourceConverter()
    {
        return new KeyConverter('s3://'. $this->bucket . '/' . $this->baseDir, $this->directory, $this->delimiter);
    }

    protected function getDefaultTargetConverter()
    {
        return new KeyConverter('s3://'. $this->bucket . '/' . $this->baseDir, '', $this->delimiter);
    }

    protected function assertFileIteratorSet()
    {
        $this->sourceIterator = $this->sourceIterator ?: $this->createS3Iterator();
    }

    protected function addDebugListener(AbstractSync $sync)
    {
        $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_TRANSFER, function (Event $e) {
            if ($e['command']['SaveAs'] instanceof EntityBodyInterface) {
                $uri = $e['command']['SaveAs']->getUri();
            } else{
                $uri = $e['command']['SaveAs'];
            }
            echo "Downloading {$e['command']['Bucket']}/{$e['command']['Key']} -> {$uri}\n";
        });
    }
}
