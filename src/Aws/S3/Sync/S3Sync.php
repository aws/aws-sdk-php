<?php

namespace Aws\S3\Sync;

use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\UnexpectedValueException;
use Aws\S3\S3Client;
use Aws\S3\Model\Acp;
use FilesystemIterator as FI;
use Guzzle\Common\AbstractHasDispatcher;
use Guzzle\Common\Event;
use Guzzle\Iterator\ChunkedIterator;
use Guzzle\Iterator\FilterIterator;

/**
 * Uploads a local directory tree to Amazon S3
 */
class S3Sync extends AbstractHasDispatcher
{
    const BEFORE_UPLOAD_EVENT = 's3.sync.before_upload';
    const AFTER_UPLOAD_EVENT = 's3.sync.after_upload';
    const PROGRESS_EVENT = 's3.sync.progress';

    /**
     * @var S3Client Client used to transfer requests
     */
    protected $client;

    /**
     * @var \Iterator Iterator that returns SplFileInfo objects to upload
     */
    protected $fileIterator;

    /**
     * @var string Directory separator for Amazon S3 keys
     */
    protected $directorySeparator = '/';

    /**
     * @var int Number of files that can be transferred concurrently
     */
    protected $concurrency = 3;

    /**
     * @var string|Acp Access control policy to set on each object
     */
    protected $acp = 'private';

    /**
     * Create a new S3Sync object that recursively uploads all of the files from a directory
     *
     * @param S3Client $client       Client used to transfer requests
     * @param string   $path         Path to the directory to transfer
     * @param bool     $onlyModified Set to true to only transfer files that don't exist in Amazon S3, have been
     *                               modified since they were uploaded, or the size of the file has changed.
     * @return self
     */
    public static function fromDirectory(S3Client $client, $path, $onlyModified = true)
    {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(
            $path,
            FI::SKIP_DOTS | FI::UNIX_PATHS | FI::FOLLOW_SYMLINKS
        ));

        return new self($client, $iterator);
    }

    /**
     * Create a new S3Sync object that recursively uploads all of the files from a directory that matches a glob pattern
     *
     * @param S3Client $client       Client used to transfer requests
     * @param string   $path         Glob expression path to the directory to transfer
     * @param bool     $onlyModified Set to true to only transfer files that don't exist in Amazon S3, have been
     *                               modified since they were uploaded, or the size of the file has changed.
     *
     * @return self
     * @link http://www.php.net/manual/en/function.glob.php
     */
    public static function fromGlob(S3Client $client, $path, $onlyModified = true)
    {
        $iterator = new \GlobIterator($path, FI::SKIP_DOTS | FI::UNIX_PATHS | FI::FOLLOW_SYMLINKS);

        return new self($client, $iterator);
    }

    /**
     * @param S3Client  $client       Client used to transfer requests
     * @param \Iterator $fileIterator Iterator that returns SplFileInfo objects to upload
     */
    public function __construct(S3Client $client, \Iterator $fileIterator)
    {
        $this->client = $client;
        $this->fileIterator = $this->filterIterator($fileIterator);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAllEvents()
    {
        return array(self::BEFORE_UPLOAD_EVENT, self::AFTER_UPLOAD_EVENT, self::PROGRESS_EVENT);
    }

    /**
     * Set the access control policy to apply to each uploaded object
     *
     * @param string|Acp $acp Access control policy object or a canned-ACL string (e.g. public-read, private, etc)
     *
     * @return self
     * @throws InvalidArgumentException
     */
    public function setAcp($acp)
    {
        if (!is_string($acp) && !($acp instanceof Acp)) {
            throw new InvalidArgumentException('Access control policy must be an Acp object or a canned-ACL');
        }

        $this->acp = $acp;

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
     * Set the number of files that can be transferred concurrently
     *
     * @param int $concurrency Number of concurrent transfers
     *
     * @return self
     */
    public function setConcurrentTransferLimit($concurrency)
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    /**
     * Add an object key filter that uses a regular expression to replace parts of an object key before uploading.
     *
     * Uses PHP's preg_replace to find and replace the full path of an object before uploading.
     *
     * @param string $search  Regular expression search (in preg_replace format)
     * @param string $replace Regular expression replace
     *
     * @return self
     * @link http://php.net/manual/en/function.preg-replace.php
     */
    public function addRegexKeyReplacement($search, $replace)
    {
        $this->getEventDispatcher()->addListener(
            self::BEFORE_UPLOAD_EVENT,
            function (Event $e) use ($search, $replace) {
                $e['command']->set('Key', preg_replace($search, $replace, $e['command']->get('Key')));
            }
        );

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
        $this->fileIterator = new FilterIterator($this->fileIterator, function ($i) use ($search) {
            return !preg_match($search, (string) $i);
        });
        $this->fileIterator->rewind();

        return $this;
    }

    /**
     * Begin uploading files to Amazon S3
     */
    public function transfer()
    {
        $iterator = new ChunkedIterator($this->fileIterator, $this->concurrency);

        foreach ($iterator as $files) {
            $commands = array();
            foreach ($files as $f) {
                $commands[] = $this->client->putObject(array(
                    'Bucket' =>
                ));
            }
            echo "\n";
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
                throw new UnexpectedValueException('All iterators for S3Sync must return SplFileInfo objects');
            }
            // Never fake the upload of an empty directory
            return !$i->isDir();
        });

        $f->rewind();

        return $f;
    }
}
