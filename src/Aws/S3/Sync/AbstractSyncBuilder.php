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
use Aws\Common\Model\MultipartUpload\TransferInterface;
use Aws\S3\S3Client;
use Aws\Common\Exception\RuntimeException;
use Aws\Common\Exception\UnexpectedValueException;
use Guzzle\Common\Event;
use Guzzle\Common\HasDispatcherInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Iterator\FilterIterator;

abstract class AbstractSyncBuilder
{
    /** @var \Iterator Iterator that returns SplFileInfo objects to upload */
    protected $sourceIterator;

    /** @var S3Client Amazon S3 client used to send requests */
    protected $client;

    /** @var string Bucket used with the transfer */
    protected $bucket;

    /** @var int Number of files that can be transferred concurrently */
    protected $concurrency = 10;

    /** @var array Custom parameters to add to each operation sent while transferring */
    protected $params = array();

    /** @var FilenameConverterInterface */
    protected $sourceConverter;

    /** @var FilenameConverterInterface */
    protected $targetConverter;

    /** @var string Prefix at prepend to each Amazon S3 object key */
    protected $keyPrefix = '';

    /** @var string Directory separator for Amazon S3 keys */
    protected $delimiter = '/';

    /** @var string Base directory to remove from each file path before converting to an object name or file name */
    protected $baseDir;

    /** @var bool Whether or not to only transfer modified or new files */
    protected $forcing = false;

    /** @var bool Whether or not debug output is enable */
    protected $debug;

    /**
     * @return self
     */
    public static function getInstance()
    {
        return new static();
    }

    /**
     * Set the bucket to use with the sync
     *
     * @param string $bucket Amazon S3 bucket name
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
     * Set a custom iterator that returns \SplFileInfo objects for the source data
     *
     * @param \Iterator $iterator
     *
     * @return self
     */
    public function setSourceIterator(\Iterator $iterator)
    {
        $this->sourceIterator = $iterator;

        return $this;
    }

    /**
     * Set a custom object key provider instead of building one internally
     *
     * @param FileNameConverterInterface $converter Filename to object key provider
     *
     * @return self
     */
    public function setSourceFilenameConverter(FilenameConverterInterface $converter)
    {
        $this->sourceConverter = $converter;

        return $this;
    }

    /**
     * Set a custom object key provider instead of building one internally
     *
     * @param FileNameConverterInterface $converter Filename to object key provider
     *
     * @return self
     */
    public function setTargetFilenameConverter(FilenameConverterInterface $converter)
    {
        $this->targetConverter = $converter;

        return $this;
    }

    /**
     * Set the base directory of the files being transferred. The base directory is removed from each file path before
     * converting the file path to an object key or vice versa.
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
     * Specify a prefix to prepend to each Amazon S3 object key or the prefix where object are stored in a bucket
     *
     * Can be used to upload files to a pseudo sub-folder key or only download files from a pseudo sub-folder
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
     * Specify the delimiter used for the targeted filesystem (default delimiter is "/")
     *
     * @param string $delimiter Delimiter to use to separate paths
     *
     * @return self
     */
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    /**
     * Specify an array of operation parameters to apply to each operation executed by the sync object
     *
     * @param array $params Associative array of PutObject (upload) GetObject (download) parameters
     *
     * @return self
     */
    public function setOperationParams(array $params)
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
     * Set to true to force transfers even if a file already exists and has not changed
     *
     * @param bool $force Set to true to force transfers without checking if it has changed
     *
     * @return self
     */
    public function force($force = false)
    {
        $this->forcing = (bool) $force;

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

    /**
     * Add a filename filter that uses a regular expression to filter out files that you do not wish to transfer.
     *
     * @param string $search Regular expression search (in preg_match format). Any filename that matches this regex
     *                       will not be transferred.
     * @return self
     */
    public function addRegexFilter($search)
    {
        $this->assertFileIteratorSet();
        $this->sourceIterator = new FilterIterator($this->sourceIterator, function ($i) use ($search) {
            return !preg_match($search, (string) $i);
        });
        $this->sourceIterator->rewind();

        return $this;
    }

    public function build()
    {
        $this->validateRequirements();
        $this->sourceIterator = $this->filterIterator($this->sourceIterator);
        $this->sourceConverter = $this->sourceConverter ?: $this->getDefaultSourceConverter();
        $this->targetConverter = $this->targetConverter ?: $this->getDefaultTargetConverter();

        // Only wrap the source iterator in a changed files iterator if we are not forcing the transfers
        if (!$this->forcing) {
            $this->sourceIterator = new ChangedFilesIterator(
                $this->sourceIterator,
                $this->getTargetIterator(),
                $this->sourceConverter,
                $this->targetConverter
            );
        }

        return $this->specificBuild();
    }

    /**
     * Hook to implement in subclasses
     *
     * @return self
     */
    abstract protected function specificBuild();

    /**
     * @return \Iterator
     */
    abstract protected function getTargetIterator();

    /**
     * @return FilenameConverterInterface
     */
    abstract protected function getDefaultSourceConverter();

    /**
     * @return FilenameConverterInterface
     */
    abstract protected function getDefaultTargetConverter();

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
        if (!$this->sourceIterator) {
            throw new RuntimeException('A source file iterator must be specified');
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

        if (!$f->valid()) {
            $f->rewind();
        }

        return $f;
    }

    /**
     * Add the custom param listener to a transfer object
     *
     * @param HasDispatcherInterface $sync
     */
    protected function addCustomParamListener(HasDispatcherInterface $sync)
    {
        $params = $this->params;
        $sync->getEventDispatcher()->addListener(
            UploadSync::BEFORE_TRANSFER,
            function (Event $e) use ($params) {
                if ($e['command'] instanceof CommandInterface) {
                    $e['command']->overwriteWith($params);
                } elseif ($e['command'] instanceof TransferInterface) {
                    // Multipart upload transfer object
                    foreach ($params as $k => $v) {
                        $e['command']->setOption($k, $v);
                    }
                }
            }
        );
    }
}
