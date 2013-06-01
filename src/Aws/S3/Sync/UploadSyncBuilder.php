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

use Aws\Common\Model\MultipartUpload\AbstractTransfer;
use \FilesystemIterator as FI;
use Aws\Common\Exception\UnexpectedValueException;
use Aws\S3\S3Client;
use Aws\Common\Exception\RuntimeException;
use Guzzle\Common\Event;
use Guzzle\Iterator\FilterIterator;
use Guzzle\Service\Command\CommandInterface;

class UploadSyncBuilder
{
    /**
     * @var S3Client Amazon S3 client used to send requests
     */
    protected $client;

    /**
     * @var string Bucket that will contain the objects
     */
    protected $bucket;

    /**
     * @var \Iterator Iterator that returns SplFileInfo objects to upload
     */
    protected $fileIterator;

    /**
     * @var int Number of files that can be transferred concurrently
     */
    protected $concurrency = 10;

    /**
     * @var string|Acp Access control policy to set on each object
     */
    protected $acp = 'private';

    /**
     * @var bool Whether or not to compute Content-MD5 of uploads for data integrity
     */
    protected $computeMd5 = true;

    /**
     * @var array Custom parameters to add to each PutObject operation
     */
    protected $params = array();

    /**
     * @var FilenameObjectKeyProviderInterface Key provided used to translate filenames to object keys
     */
    protected $keyProvider;

    /**
     * @var string Directory separator for Amazon S3 keys
     */
    protected $directorySeparator = '/';

    /**
     * @var string Prefix at prepend to each Amazon S3 object key
     */
    protected $keyPrefix = '';

    /**
     * @var string Base directory to remove from each file path before converting to an object key
     */
    protected $baseDir;

    /**
     * @var bool Whether or not to only upload modified or new files
     */
    protected $forcingUploads = false;

    /**
     * @var bool Whether or not debug output is enable
     */
    protected $debug;

    /**
     * Get an instance of a builder object
     *
     * @return self
     */
    public static function getInstance()
    {
        return new self();
    }

    /**
     * Set the bucket that will store the Amazon S3 objects
     *
     * @param string $bucket Bucket that will contain the objects
     *
     * @return self
     */
    public function setBucket($bucket)
    {
        $this->bucket = $bucket;

        return $this;
    }

    /**
     * Set the Amazon S3 client object that will send requests
     *
     * @param S3Client $client Amazon S3 client
     *
     * @return self
     */
    public function setClient(S3Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set a custom iterator that returns \SplFileInfo objects
     *
     * @param \Iterator $iterator File iterator
     *
     * @return self
     */
    public function setFileIterator(\Iterator $iterator)
    {
        $this->fileIterator = $iterator;

        return $this;
    }

    /**
     * Set the path that contains files to recursively upload to Amazon S3
     *
     * @param string $path Path that contains files to upload
     *
     * @return self
     */
    public function uploadFromDirectory($path)
    {
        $this->fileIterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(
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
        $this->fileIterator = new \GlobIterator($glob, FI::SKIP_DOTS | FI::UNIX_PATHS | FI::FOLLOW_SYMLINKS);

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
     * Set a custom object key provider instead of building one internally
     *
     * @param FileNameObjectKeyProviderInterface $keyProvider Filename to object key provider
     *
     * @return self
     */
    public function setObjectKeyProvider(FilenameObjectKeyProviderInterface $keyProvider)
    {
        $this->keyProvider = $keyProvider;

        return $this;
    }

    /**
     * Specify the directory separator to use when uploading. The default separator is "/"
     *
     * @param string $separator Separator to use to separate paths
     *
     * @return self
     */
    public function setDirectorySeparator($separator)
    {
        $this->directorySeparator = $separator;

        return $this;
    }

    /**
     * Set the base directory of the files being uploaded. The base directory is removed from each file path before
     * converting the file path to an object key.
     *
     * @param string $baseDir Base directory, which will be deleted from each uploaded object key
     *
     * @return self
     */
    public function setBaseDir($baseDir)
    {
        $this->baseDir = $baseDir;

        return $this;
    }

    /**
     * Specify a prefix to prepend to each Amazon S3 object key.
     *
     * Can be used to upload files to a pseudo sub-folder key.
     *
     * @param string $keyPrefix Prefix for each uploaded key
     *
     * @return self
     */
    public function setKeyPrefix($keyPrefix)
    {
        $this->keyPrefix = $keyPrefix;

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

    /**
     * Specify an array of PutObject operation parameters to apply to each upload
     *
     * @param array $params Associative array of PutObject paramters
     *
     * @return self
     */
    public function setPutObjectParams(array $params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Set the number of files that can be transferred concurrently
     *
     * @param int $concurrency Number of concurrent transfers
     *
     * @return self
     */
    public function setConcurrency($concurrency)
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    /**
     * Add a filename filter that uses a regular expression to filter out files that you do not wish to upload.
     *
     * @param string $search Regular expression search (in preg_match format). Any filename that matches this regex
     *                       will not be uploaded.
     * @return self
     */
    public function addRegexFilter($search)
    {
        $this->assertFileIteratorSet();
        $this->fileIterator = new FilterIterator($this->fileIterator, function ($i) use ($search) {
            return !preg_match($search, (string) $i);
        });
        $this->fileIterator->rewind();

        return $this;
    }

    /**
     * Set to true to force uploads even if a file exists on Amazon S3 and is the same as the local file
     *
     * @param bool $force Set to true to upload all files and bypass checking if it exists first
     *
     * @return self
     */
    public function forceUploads($force = false)
    {
        $this->forcingUploads = (bool) $force;

        return $this;
    }

    /**
     * Enable debug mode
     *
     * @param bool $enabled Set to true or false to enable or disable debug output
     *
     * @return self
     */
    public function enableDebugOutput($enabled = true)
    {
        $this->debug = $enabled;

        return $this;
    }

    public function build()
    {
        $this->validateRequirements();
        $this->fileIterator = $this->filterIterator($this->fileIterator);

        if (!$this->keyProvider) {
            $this->keyProvider = new FilenameObjectKeyProvider(
                $this->baseDir,
                $this->keyPrefix,
                $this->directorySeparator
            );
        }

        if (!$this->forcingUploads) {
            $this->fileIterator = new ChangedFilesIterator(
                $this->fileIterator,
                $this->client,
                $this->bucket,
                $this->keyProvider
            );
        }

        $sync = new UploadSync($this->client, $this->bucket, $this->fileIterator, $this->keyProvider);
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

    /**
     * Validate that the builder has the minimal requirements
     *
     * @throws RuntimeException if the builder is not configured completely
     */
    protected function validateRequirements()
    {
        $this->assertFileIteratorSet();
        if (!$this->client) {
            throw new RuntimeException('No client was provided');
        }
        if (!$this->bucket) {
            throw new RuntimeException('No bucket was provided');
        }
    }

    /**
     * Ensure that the base file iterator has been provided
     *
     * @throws RuntimeException
     */
    protected function assertFileIteratorSet()
    {
        if (!$this->fileIterator) {
            throw new RuntimeException('A base file iterator must be specified');
        }
    }

    /**
     * Wraps a generated iterator in a filter iterator that removes directories
     *
     * @param \Iterator $iterator Iterator to wrap
     *
     * @return \Iterator
     * @throws UnexpectedValueException
     */
    protected function filterIterator(\Iterator $iterator)
    {
        $f = new FilterIterator($iterator, function ($i) {
            if (!$i instanceof \SplFileInfo) {
                throw new UnexpectedValueException('All iterators for UploadSync must return SplFileInfo objects');
            }
            // Never fake the upload of an empty directory
            return !$i->isDir();
        });

        $f->rewind();

        return $f;
    }

    /**
     * Add the custom param listener to a transfer object
     *
     * @param UploadSync $sync
     */
    private function addCustomParamListener(UploadSync $sync)
    {
        $params = $this->params;
        $sync->getEventDispatcher()->addListener(
            UploadSync::BEFORE_UPLOAD_EVENT,
            function (Event $e) use ($params) {
                if ($e['command'] instanceof CommandInterface) {
                    $e['command']->overwriteWith($params);
                } else {
                    // Multipart upload transfer object
                    foreach ($params as $k => $v) {
                        $e['command']->setOption($k, $v);
                    }
                }
            }
        );
    }

    /**
     * Add a listener to an UploadSync object to set an ACL or ACP
     *
     * @param UploadSync $sync
     */
    private function addAcpListener(UploadSync $sync)
    {
        $acp = $this->acp;
        $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_UPLOAD_EVENT, function (Event $e) use ($acp) {
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
        $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_UPLOAD_EVENT, function (Event $e) use ($compute) {
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
        $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_UPLOAD_EVENT, function (Event $e) {

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
