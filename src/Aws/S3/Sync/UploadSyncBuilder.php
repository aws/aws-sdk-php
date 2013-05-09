<?php

namespace Aws\S3\Sync;

use \FilesystemIterator as FI;
use Aws\S3\S3Client;
use Aws\Common\Exception\RuntimeException;
use Guzzle\Common\Event;
use Guzzle\Iterator\FilterIterator;

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
    protected $concurrency = 3;

    /**
     * @var string|Acp Access control policy to set on each object
     */
    protected $acp = 'private';

    /**
     * @var bool Whether or not to compute Content-MD5 of uploads for data integrity
     */
    protected $computeMd5 = true;

    /**
     * @var array Extra headers to apply to each upload
     */
    protected $customHeaders = array();

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
    protected $onlyNewOrModified = true;

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
     * Specify an array of custom HTTP headers to add to each uploaded object
     *
     * @param array $headers Associative array of HTTP headers
     *
     * @return self
     */
    public function setCustomHeaders(array $headers)
    {
        $this->customHeaders = $headers;

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
     * Specify whether or not to upload only modified or new files to Amazon S3
     *
     * @param bool $onlyModifiedOrNew Set to true to only upload modified or new files, false to upload all files
     *
     * @return self
     */
    public function disableCheck($onlyModifiedOrNew = true)
    {
        $this->onlyNewOrModified = $onlyModifiedOrNew;

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

        if ($this->onlyNewOrModified) {
            $this->fileIterator = new ChangedFilesIterator(
                $this->fileIterator,
                $this->client,
                $this->bucket,
                $this->keyProvider
            );
        }

        $sync = new UploadSync(
            $this->client,
            $this->bucket,
            $this->fileIterator,
            $this->keyProvider
        );

        $sync->setConcurrency($this->concurrency);

        if ($this->computeMd5) {
            $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_UPLOAD_EVENT, function (Event $e) {
                $e['command']->set('ContentMD5', md5_file($e['file']));
            });
        }

        if ($acp = $this->acp) {
            $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_UPLOAD_EVENT, function (Event $e) use ($acp) {
                if (is_string($acp)) {
                    $e['command']->set('ACL', $acp);
                } else {
                    $e['command']->set('ACP', $acp);
                }
            });
        }

        if ($headers = $this->customHeaders) {
            $sync->getEventDispatcher()->addListener(UploadSync::BEFORE_UPLOAD_EVENT, function (Event $e) use ($headers) {
                $e['command']['command.headers'] = $headers + $e['command']['command.headers'];
            });
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
}
