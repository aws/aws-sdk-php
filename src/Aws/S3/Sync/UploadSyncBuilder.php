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

use \FilesystemIterator as FI;
use Aws\S3\Iterator\OpendirIterator;
use Aws\S3\Model\Acp;
use Aws\Common\Model\MultipartUpload\AbstractTransfer;
use Aws\S3\S3Client;
use Guzzle\Common\Event;
use Guzzle\Service\Command\CommandInterface;

class UploadSyncBuilder extends AbstractSyncBuilder
{
    /** @var string|Acp Access control policy to set on each object */
    protected $acp = 'private';

    /** @var bool Whether or not to compute Content-MD5 of uploads for data integrity */
    protected $computeMd5 = true;

    /**
     * Set the path that contains files to recursively upload to Amazon S3
     *
     * @param string $path Path that contains files to upload
     *
     * @return self
     */
    public function uploadFromDirectory($path)
    {
        $this->sourceIterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(
            $path,
            FI::SKIP_DOTS | FI::UNIX_PATHS | FI::FOLLOW_SYMLINKS
        ));

        $this->baseDir = $path;

        return $this;
    }

    /**
     * Set a glob expression that will match files to upload to Amazon S3
     *
     * @param string $glob Glob expression
     *
     * @return self
     * @link http://www.php.net/manual/en/function.glob.php
     */
    public function uploadFromGlob($glob)
    {
        $this->sourceIterator = new \GlobIterator($glob, FI::SKIP_DOTS | FI::UNIX_PATHS | FI::FOLLOW_SYMLINKS);

        return $this;
    }

    /**
     * Set a canned ACL to apply to each uploaded object
     *
     * @param string $acl Canned ACL for each upload
     *
     * @return self
     */
    public function setAcl($acl)
    {
        $this->acp = $acl;

        return $this;
    }

    /**
     * Set an Access Control Policy to apply to each uploaded object
     *
     * @param Acp $acp Access control policy
     *
     * @return self
     */
    public function setAcp(Acp $acp)
    {
        $this->acp = $acp;

        return $this;
    }

    /**
     * Disable the calculation of a Content-MD5 value for each upload
     *
     * @return self
     */
    public function disableContentMd5()
    {
        $this->computeMd5 = false;

        return $this;
    }

    protected function specificBuild()
    {
        $sync = new UploadSync($this->client, $this->bucket, $this->sourceIterator, $this->sourceConverter);
        $sync->setConcurrency($this->concurrency);
        $this->addMd5Listener($sync);

        if ($acp = $this->acp) {
            $this->addAcpListener($sync);
        }

        if ($this->params) {
            $this->addCustomParamListener($sync);
        }

        if ($this->debug) {
            $this->addDebugListener($sync);
        }

        return $sync;
    }

    protected function getTargetIterator()
    {
        // Ensure that the stream wrapper is registered
        $this->client->registerStreamWrapper();
        // Calculate the opendir() bucket and optional key prefix location
        // Remove the delimiter as it is not needed for this
        $dir = rtrim('s3://' . $this->bucket . ($this->keyPrefix ? ('/' . $this->keyPrefix) : ''), '/');
        // Use opendir so that we can pass stream context to the iterator
        $dh = opendir($dir, stream_context_create(array('s3' => array('delimiter' => ''))));

        return new OpendirIterator($dh, $dir . '/');
    }

    protected function getDefaultSourceConverter()
    {
        return new KeyConverter($this->baseDir, $this->keyPrefix, $this->delimiter);
    }

    protected function getDefaultTargetConverter()
    {
        return new KeyConverter('s3://' . $this->bucket, '', DIRECTORY_SEPARATOR);
    }

    /**
     * Add a listener to an UploadSync object to set an ACL or ACP
     *
     * @param UploadSync $sync
     */
    private function addAcpListener(UploadSync $sync)
    {
        $acp = $this->acp;
        $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_TRANSFER, function (Event $e) use ($acp) {
            $name = is_string($acp) ? 'ACL' : 'ACP';
            if ($e['command'] instanceof CommandInterface) {
                $command = $e['command'];
                $command[$name] = $acp;
            } else {
                // Multipart upload transfer object
                $e['command']->setOption($name, $acp);
            }
        });
    }

    /**
     * Add a listener to an UploadSync object to set or disable MD5 validation
     *
     * @param UploadSync $sync
     */
    private function addMd5Listener(UploadSync $sync)
    {
        $compute = $this->computeMd5;
        $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_TRANSFER, function (Event $e) use ($compute) {
            if ($e['command'] instanceof CommandInterface) {
                $command = $e['command'];
                $command['ContentMD5'] = $compute ? md5_file($e['file']) : false;
            } else {
                // Multipart upload transfer object
                $e['command']->setOption('part_md5', $compute);
            }
        });
    }

    /**
     * Add a listener to echo debug output while uploading
     *
     * @param UploadSync $sync
     */
    private function addDebugListener(UploadSync $sync)
    {
        $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_TRANSFER, function (Event $e) {

            $c = $e['command'];

            if ($c instanceof CommandInterface) {
                $uri = $c['Body']->getUri();
                $size = $c['Body']->getSize();
                echo "Uploading {$uri} -> {$c['Key']} ({$size} bytes)\n";
                return;
            }

            // Multipart upload
            $body = $c->getSource();
            $totalSize = $body->getSize();
            $progress = 0;
            echo "Beginning multipart upload: " . $body->getUri() . ' -> ';
            echo $c->getState()->getFromId('Key') . " ({$totalSize} bytes)\n";

            $c->getEventDispatcher()->addListener(
                AbstractTransfer::BEFORE_PART_UPLOAD,
                function ($e) use (&$progress, $totalSize) {
                    $command = $e['command'];
                    $size = $command['Body']->getContentLength();
                    $percentage = number_format(($progress / $totalSize) * 100, 2);
                    echo "- Part {$command['PartNumber']} ({$size} bytes, {$percentage}%)\n";
                    $progress .=  $size;
                }
            );
        });
    }
}
