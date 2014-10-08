<?php
namespace Aws\S3;

use Aws\Common\Paginator\ResourceIterator;
use Aws\S3\Exception\S3Exception;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Mimetypes;
use GuzzleHttp\Stream\CachingStream;

/**
 * Amazon S3 stream wrapper to use "s3://<bucket>/<key>" files with PHP
 * streams, supporting "r", "w", "a", "x".
 *
 * # Opening "r" (read only) streams:
 *
 * Read only streams are truly streaming by default and will not allow you to
 * seek. This is because data read from the stream is not kept in memory or on
 * the local filesystem. You can force a "r" stream to be seekable by setting
 * the "seekable" stream context option true. This will allow true streaming of
 * data from Amazon S3, but will maintain a buffer of previously read bytes in
 * a 'php://temp' stream to allow seeking to previously read bytes from the
 * stream.
 *
 * You may pass any GetObject parameters as 's3' stream context options. These
 * options will affect how the data is downloaded from Amazon S3.
 *
 * # Opening "w" and "x" (write only) streams:
 *
 * Because Amazon S3 requires a Content-Length header, write only streams will
 * maintain a 'php://temp' stream to buffer data written to the stream until
 * the stream is flushed (usually by closing the stream with fclose).
 *
 * You may pass any PutObject parameters as 's3' stream context options. These
 * options will affect how the data is uploaded to Amazon S3.
 *
 * When opening an "x" stream, the file must exist on Amazon S3 for the stream
 * to open successfully.
 *
 * # Opening "a" (write only append) streams:
 *
 * Similar to "w" streams, opening append streams requires that the data be
 * buffered in a "php://temp" stream. Append streams will attempt to download
 * the contents of an object in Amazon S3, seek to the end of the object, then
 * allow you to append to the contents of the object. The data will then be
 * uploaded using a PutObject operation when the stream is flushed (usually
 * with fclose).
 *
 * You may pass any GetObject and/or PutObject parameters as 's3' stream
 * context options. These options will affect how the data is downloaded and
 * uploaded from Amazon S3.
 *
 * Stream context options:
 *
 * - "seekable": Set to true to create a seekable "r" (read only) stream by
 *   using a php://temp stream buffer
 * - For "unlink" only: Any option that can be passed to the DeleteObject
 *   operation
 */
class StreamWrapper
{
    /** @var resource|null Stream context (this is set by PHP) */
    public $context;

    /** @var StreamInterface Underlying stream resource */
    private $body;

    /** @var array Hash of opened stream parameters */
    private $params = [];

    /** @var string Mode in which the stream was opened */
    private $mode;

    /** @var ResourceIterator Iterator used with opendir() related calls */
    private $objectIterator;

    /** @var string The bucket that was opened when opendir() was called */
    private $openedBucket;

    /** @var string The prefix of the bucket that was opened with opendir() */
    private $openedBucketPrefix;

    /**
     * The next key to retrieve when using a directory iterator. Helps for
     * fast directory traversal.
     * @var array
     */
    private static $nextStat = [];

    /**
     * Register the 's3://' stream wrapper
     *
     * @param S3Client $client Client to use with the stream wrapper
     */
    public static function register(S3Client $client)
    {
        if (in_array('s3', stream_get_wrappers())) {
            stream_wrapper_unregister('s3');
        }

        // Set the client passed in as the default stream context client
        stream_wrapper_register('s3', get_called_class(), STREAM_IS_URL);
        $default = stream_context_get_options(stream_context_get_default());
        $default['s3']['client'] = $client;
        stream_context_set_default($default);
    }

    public function stream_close()
    {
        $this->body = null;
    }

    public function stream_open($path, $mode, $options, &$opened_path)
    {
        $this->params = $this->getBucketKey($path);
        $this->mode = rtrim($mode, 'bt');

        if ($errors = $this->validate($path, $this->mode)) {
            return $this->triggerError($errors);
        }

        switch ($this->mode) {
            case 'r':
                return $this->openReadStream($path);
            case 'a':
                return $this->openAppendStream($path);
            default:
                return $this->openWriteStream($path);
        }
    }

    public function stream_eof()
    {
        return $this->body->eof();
    }

    public function stream_flush()
    {
        if ($this->mode == 'r') {
            return false;
        }

        $this->body->seek(0);
        $params = $this->getOptions();
        $params['Body'] = $this->body;

        // Attempt to guess the ContentType of the upload based on the
        // file extension of the key
        if (!isset($params['ContentType']) &&
            ($type = Mimetypes::getInstance()->fromFilename($params['Key']))
        ) {
            $params['ContentType'] = $type;
        }

        return $this->boolCall(function () use ($params) {
            return (bool) $this->getClient()->putObject($params);
        });
    }

    public function stream_read($count)
    {
        return $this->body->read($count);
    }

    public function stream_seek($offset, $whence = SEEK_SET)
    {
        return $this->body->seek($offset, $whence);
    }

    public function stream_tell()
    {
        return $this->body->tell();
    }

    public function stream_write($data)
    {
        return $this->body->write($data);
    }

    public function unlink($path)
    {
        return $this->boolCall(function () use ($path) {
            $this->clearStatInfo($path);
            $this->getClient()->deleteObject($this->withPath($path));
            return true;
        });
    }

    public function stream_stat()
    {
        $stat = $this->getStatTemplate();
        $stat[7] = $stat['size'] = (int) $this->body->getSize();
        $stat[2] = $stat['mode'] = $this->mode;

        return $stat;
    }

    /**
     * Provides information for is_dir, is_file, filesize, etc. Works on
     * buckets, keys, and prefixes.
     * @link http://www.php.net/manual/en/streamwrapper.url-stat.php
     */
    public function url_stat($path, $flags)
    {
        // Check if this path is in the url_stat cache
        if (isset(self::$nextStat[$path])) {
            return self::$nextStat[$path];
        }

        $parts = $this->withPath($path);

        if (!$parts['Key']) {
            return $this->statDirectory($parts, $path, $flags);
        }

        return $this->boolCall(function () use ($parts, $path) {
            try {
                $result = $this->getClient()->headObject($parts)->toArray();
                if (substr($parts['Key'], -1, 1) == '/' &&
                    $result['ContentLength'] == 0
                ) {
                    // Return as if it is a bucket to account for console
                    // bucket objects (e.g., zero-byte object "foo/")
                    return $this->formatUrlStat($path);
                } else {
                    // Attempt to stat and cache regular object
                    return $this->formatUrlStat($result);
                }
            } catch (S3Exception $e) {
                // Maybe this isn't an actual key, but a prefix. Do a prefix
                // listing of objects to determine.
                $result = $this->getClient()->listObjects([
                    'Bucket'  => $parts['Bucket'],
                    'Prefix'  => rtrim($parts['Key'], '/') . '/',
                    'MaxKeys' => 1
                ]);
                if (!$result['Contents'] && !$result['CommonPrefixes']) {
                    throw new \Exception("File or directory not found: $path");
                }
                return $this->formatUrlStat($path);
            }
        }, $flags);
    }

    private function statDirectory($parts, $path, $flags)
    {
        // Stat "directories": buckets, or "s3://"
        if (!$parts['Bucket'] ||
            $this->getClient()->doesBucketExist($parts['Bucket'])
        ) {
            return $this->formatUrlStat($path);
        } else {
            return $this->triggerError(
                "File or directory not found: {$path}",
                $flags
            );
        }
    }

    /**
     * Support for mkdir().
     *
     * @param string $path    Directory which should be created.
     * @param int    $mode    Permissions. 700-range permissions map to
     *                        ACL_PUBLIC. 600-range permissions map to
     *                        ACL_AUTH_READ. All other permissions map to
     *                        ACL_PRIVATE. Expects octal form.
     * @param int    $options A bitwise mask of values, such as
     *                        STREAM_MKDIR_RECURSIVE.
     *
     * @return bool
     * @link http://www.php.net/manual/en/streamwrapper.mkdir.php
     */
    public function mkdir($path, $mode, $options)
    {
        $params = $this->withPath($path);
        if (!$params['Bucket']) {
            return false;
        }

        if (!isset($params['ACL'])) {
            $params['ACL'] = $this->determineAcl($mode);
        }

        return empty($params['Key'])
            ? $this->createBucket($path, $params)
            : $this->createSubfolder($path, $params);
    }

    public function rmdir($path)
    {
        $this->clearStatInfo($path);
        $params = $this->withPath($path);
        $client = $this->getClient();

        if (!$params['Bucket']) {
            return $this->triggerError('You must specify a bucket');
        }

        return $this->boolCall(function () use ($params, $path, $client) {
            if (!$params['Key']) {
                $client->deleteBucket(['Bucket' => $params['Bucket']]);
                return true;
            }
            return $this->deleteSubfolder($path, $params);
        });
    }

    /**
     * Support for opendir().
     *
     * The opendir() method of the Amazon S3 stream wrapper supports a stream
     * context option of "listFilter". listFilter must be a callable that
     * accepts an associative array of object data and returns true if the
     * object should be yielded when iterating the keys in a bucket.
     *
     * @param string $path    The path to the directory
     *                        (e.g. "s3://dir[</prefix>]")
     * @param string $options Unused option variable
     *
     * @return bool true on success
     * @see http://www.php.net/manual/en/function.opendir.php
     */
    public function dir_opendir($path, $options)
    {
        $this->clearStatInfo();
        $params = $this->withPath($path);
        $delimiter = $this->getOption('delimiter');
        $filterFn = $this->getOption('listFilter');
        $operationParams = ['Bucket' => $params['Bucket']];
        $this->openedBucket = $params['Bucket'];

        if ($delimiter === null) {
            $delimiter = '/';
        }

        if ($delimiter) {
            $operationParams['Delimiter'] = $delimiter;
        }

        if ($params['Key']) {
            $params['Key'] = rtrim($params['Key'], $delimiter) . $delimiter;
            $operationParams['Prefix'] = $params['Key'];
        }

        $this->openedBucketPrefix = $params['Key'];

        // Filter our "/" keys added by the console as directories, and ensure
        // that if a filter function is provided that it passes the filter.
        $this->objectIterator = new \CallbackFilterIterator(
            $this->getClient()->getIterator('ListObjects', $operationParams),
            function ($key) use ($filterFn) {
                // Each yielded results can contain a "Key" or "Prefix"
                return (!$filterFn || call_user_func($filterFn, $key)) &&
                    (!isset($key['Key']) || substr($key['Key'], -1, 1) !== '/');
            }
        );

        $this->objectIterator->next();

        return true;
    }

    /**
     * Close the directory listing handles
     *
     * @return bool true on success
     */
    public function dir_closedir()
    {
        $this->objectIterator = null;

        return true;
    }

    /**
     * This method is called in response to rewinddir()
     *
     * @return boolean true on success
     */
    public function dir_rewinddir()
    {
        return $this->boolCall(function () {
            $this->clearStatInfo();
            $this->objectIterator->rewind();
            return true;
        });
    }

    /**
     * This method is called in response to readdir()
     *
     * @return string Should return a string representing the next filename, or
     *                false if there is no next file.
     * @link http://www.php.net/manual/en/function.readdir.php
     */
    public function dir_readdir()
    {
        // Skip empty result keys
        if (!$this->objectIterator->valid()) {
            return false;
        }

        $cur = $this->objectIterator->current();
        if (isset($cur['Prefix'])) {
            // Include "directories". Be sure to strip a trailing "/"
            // on prefixes.
            $prefix = rtrim($cur['Prefix'], '/');
            $result = str_replace($this->openedBucketPrefix, '', $prefix);
            $key = "s3://{$this->openedBucket}/{$prefix}";
            $stat = $this->formatUrlStat($prefix);
        } else {
            // Remove the prefix from the result to emulate other
            // stream wrappers.
            $result = str_replace($this->openedBucketPrefix, '', $cur['Key']);
            $key = "s3://{$this->openedBucket}/{$cur['Key']}";
            $stat = $this->formatUrlStat($cur);
        }

        // Cache the object data for quick url_stat lookups used with
        // RecursiveDirectoryIterator.
        self::$nextStat = [$key => $stat];
        $this->objectIterator->next();

        return $result;
    }

    /**
     * Called in response to rename() to rename a file or directory. Currently
     * only supports renaming objects.
     *
     * @param string $path_from the path to the file to rename
     * @param string $path_to   the new path to the file
     *
     * @return bool true if file was successfully renamed
     * @link http://www.php.net/manual/en/function.rename.php
     */
    public function rename($path_from, $path_to)
    {
        $partsFrom = $this->withPath($path_from);
        $partsTo = $this->withPath($path_to);
        $this->clearStatInfo($path_from, $path_to);

        if (!$partsFrom['Key'] || !$partsTo['Key']) {
            return $this->triggerError('The Amazon S3 stream wrapper only '
                . 'supports copying objects');
        }

        return $this->boolCall(function () use ($partsFrom, $partsTo) {
            // Copy the object and allow overriding default parameters if
            // desired, but by default copy metadata
            $this->getClient()->copyObject($this->getOptions() + [
                'Bucket'            => $partsTo['Bucket'],
                'Key'               => $partsTo['Key'],
                'MetadataDirective' => 'COPY',
                'CopySource'        => '/' . $partsFrom['Bucket'] . '/'
                                           . rawurlencode($partsFrom['Key']),
            ]);
            // Delete the original object
            $this->getClient()->deleteObject([
                'Bucket' => $partsFrom['Bucket'],
                'Key'    => $partsFrom['Key']
            ] + $this->getOptions());
            return true;
        });
    }

    public function stream_cast($cast_as)
    {
        return false;
    }

    /**
     * Validates the provided stream arguments for fopen and returns an array
     * of errors.
     */
    private function validate($path, $mode)
    {
        $errors = [];

        if (!$this->getOption('Key')) {
            $errors[] = 'Cannot open a bucket. You must specify a path in the '
                . 'form of s3://bucket/key';
        }

        if (!in_array($mode, ['r', 'w', 'a', 'x'])) {
            $errors[] = "Mode not supported: {$mode}. "
                . "Use one 'r', 'w', 'a', or 'x'.";
        }

        // When using mode "x" validate if the file exists before attempting
        // to read
        if ($mode == 'x' &&
            $this->getClient()->doesObjectExist(
                $this->getOption('Bucket'),
                $this->getOption('Key'),
                $this->getOptions()
            )
        ) {
            $errors[] = "{$path} already exists on Amazon S3";
        }

        return $errors;
    }

    /**
     * Get the stream context options available to the current stream
     *
     * @return array
     */
    private function getOptions()
    {
        // Context is not set when doing things like stat
        if ($this->context === null) {
            $options = [];
        } else {
            $options = stream_context_get_options($this->context);
            $options = isset($options['s3']) ? $options['s3'] : [];
        }

        $default = stream_context_get_options(stream_context_get_default());
        $default = isset($default['s3']) ? $default['s3'] : [];

        return $this->params + $options + $default;
    }

    /**
     * Get a specific stream context option
     *
     * @param string $name Name of the option to retrieve
     *
     * @return mixed|null
     */
    private function getOption($name)
    {
        $options = $this->getOptions();

        return isset($options[$name]) ? $options[$name] : null;
    }

    /**
     * Gets the client from the stream context
     *
     * @return S3Client
     * @throws \RuntimeException if no client has been configured
     */
    private function getClient()
    {
        if (!$client = $this->getOption('client')) {
            throw new \RuntimeException('No client in stream context');
        }

        return $client;
    }

    private function getBucketKey($path)
    {
        $parts = explode('/', substr($path, 5), 2);

        return [
            'Bucket' => $parts[0],
            'Key'    => isset($parts[1]) ? $parts[1] : null
        ];
    }

    /**
     * Get the bucket and key from the passed path (e.g. s3://bucket/key)
     *
     * @param string $path Path passed to the stream wrapper
     *
     * @return array Hash of 'Bucket', 'Key', and custom params from the context
     */
    private function withPath($path)
    {
        $params = $this->getOptions();
        unset($params['seekable'], $params['client']);

        return $this->getBucketKey($path) + $params;
    }

    private function openReadStream()
    {
        $client = $this->getClient();
        $command = $client->getCommand('GetObject', $this->getOptions());

        // Ensure that a streaming adapter is utilized
        $command->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $e->getRequest()->getConfig()->set('stream', true);
        });

        $result = $client->execute($command);
        $this->body = $result['Body'];

        if ($result['ContentLength']) {
            $this->body->setSize($result['ContentLength']);
        }

        // Wrap the body in a caching entity body if seeking is allowed
        if ($this->getOption('seekable') && !$this->body->isSeekable()) {
            $this->body = new CachingStream($this->body);
        }

        return true;
    }

    private function openWriteStream()
    {
        $this->body = new Stream(fopen('php://temp', 'r+'));
        return true;
    }

    private function openAppendStream()
    {
        try {
            // Get the body of the object and seek to the end of the stream
            $client = $this->getClient();
            $this->body = $client->getObject($this->getOptions())['Body'];
            $this->body->seek(0, SEEK_END);
            return true;
        } catch (S3Exception $e) {
            // The object does not exist, so use a simple write stream
            return $this->openWriteStream();
        }
    }

    /**
     * Trigger one or more errors
     *
     * @param string|array $errors Errors to trigger
     * @param mixed        $flags  If set to STREAM_URL_STAT_QUIET, then no
     *                             error or exception occurs
     *
     * @return bool Returns false
     * @throws \RuntimeException if throw_errors is true
     */
    private function triggerError($errors, $flags = null)
    {
        // This is triggered with things like file_exists()
        if ($flags & STREAM_URL_STAT_QUIET) {
            return $flags & STREAM_URL_STAT_LINK
                // This is triggered for things like is_link()
                ? $this->formatUrlStat(false)
                : false;
        }

        // This is triggered when doing things like lstat() or stat()
        trigger_error(implode("\n", (array) $errors), E_USER_WARNING);

        return false;
    }

    /**
     * Prepare a url_stat result array
     *
     * @param string|array $result Data to add
     *
     * @return array Returns the modified url_stat result
     */
    private function formatUrlStat($result = null)
    {
        $stat = $this->getStatTemplate();

        switch (gettype($result)) {
            case 'NULL':
            case 'string':
                // Directory with 0777 access - see "man 2 stat".
                $stat['mode'] = $stat[2] = 0040777;
                break;
            case 'array':
                if (isset($result['LastModified'])) {
                    // ListObjects or HeadObject result
                    $stat['mtime'] = $stat[9] = $stat['ctime'] = $stat[10]
                        = strtotime($result['LastModified']);
                    $stat['size'] = $stat[7] = (isset($result['ContentLength'])
                        ? $result['ContentLength']
                        : $result['Size']);
                    // Regular file with 0777 access - see "man 2 stat".
                    $stat['mode'] = $stat[2] = 0100777;
                }
        }

        return $stat;
    }

    /**
     * Clear the next stat result from the cache.
     *
     * Accepts an optional variadic number of string paths to clearstatcache on
     */
    private function clearStatInfo()
    {
        self::$nextStat = [];
        foreach (func_get_args() as $path) {
            clearstatcache(true, $path);
        }
    }

    /**
     * Creates a bucket for the given parameters.
     *
     * @param string $path   Stream wrapper path
     * @param array  $params A result of StreamWrapper::withPath()
     *
     * @return bool Returns true on success or false on failure
     */
    private function createBucket($path, array $params)
    {
        if ($this->getClient()->doesBucketExist($params['Bucket'])) {
            return $this->triggerError("Bucket already exists: {$path}");
        }

        return $this->boolCall(function () use ($params, $path) {
            $this->getClient()->createBucket($params);
            $this->clearStatInfo($path);
            return true;
        });
    }

    /**
     * Creates a pseudo-folder by creating an empty "/" suffixed key
     *
     * @param string $path   Stream wrapper path
     * @param array  $params A result of StreamWrapper::withPath()
     *
     * @return bool
     */
    private function createSubfolder($path, array $params)
    {
        // Ensure the path ends in "/" and the body is empty.
        $params['Key'] = rtrim($params['Key'], '/') . '/';
        $params['Body'] = '';

        // Fail if this pseudo directory key already exists
        if ($this->getClient()->doesObjectExist(
            $params['Bucket'],
            $params['Key'])
        ) {
            return $this->triggerError("Subfolder already exists: {$path}");
        }

        return $this->boolCall(function () use ($params, $path) {
            $this->getClient()->putObject($params);
            $this->clearStatInfo($path);
            return true;
        });
    }

    /**
     * Deletes a nested subfolder if it is empty.
     *
     * @param string $path   Path that is being deleted (e.g., 's3://a/b/c')
     * @param array  $params A result of StreamWrapper::withPath()
     *
     * @return bool
     */
    private function deleteSubfolder($path, $params)
    {
        // Use a key that adds a trailing slash if needed.
        $prefix = rtrim($params['Key'], '/') . '/';
        $result = $this->getClient()->listObjects([
            'Bucket'  => $params['Bucket'],
            'Prefix'  => $prefix,
            'MaxKeys' => 1
        ]);

        // Check if the bucket contains keys other than the placeholder
        if ($contents = $result['Contents']) {
            return (count($contents) > 1 || $contents[0]['Key'] != $prefix)
                ? $this->triggerError('Subfolder is not empty')
                : $this->unlink(rtrim($path, '/') . '/');
        }

        return $result['CommonPrefixes']
            ? $this->triggerError('Subfolder contains nested folders')
            : true;
    }


    /**
     * Determine the most appropriate ACL based on a file mode.
     *
     * @param int $mode File mode
     *
     * @return string
     */
    private function determineAcl($mode)
    {
        switch (substr(decoct($mode), 0, 1)) {
            case '7':
                return 'public-read';
            case '6':
                return 'authenticated-read';
            default:
                return 'private';
        }
    }

    /**
     * Gets a URL stat template with default values
     *
     * @return array
     */
    private function getStatTemplate()
    {
        return [
            0  => 0,  'dev'     => 0,
            1  => 0,  'ino'     => 0,
            2  => 0,  'mode'    => 0,
            3  => 0,  'nlink'   => 0,
            4  => 0,  'uid'     => 0,
            5  => 0,  'gid'     => 0,
            6  => -1, 'rdev'    => -1,
            7  => 0,  'size'    => 0,
            8  => 0,  'atime'   => 0,
            9  => 0,  'mtime'   => 0,
            10 => 0,  'ctime'   => 0,
            11 => -1, 'blksize' => -1,
            12 => -1, 'blocks'  => -1,
        ];
    }

    /**
     * Invokes a callable and triggers an error if an exception occurs while
     * calling the function.
     *
     * @param callable $fn
     * @param int      $flags
     *
     * @return bool
     */
    private function boolCall(callable $fn, $flags = null)
    {
        try {
            return $fn();
        } catch (\Exception $e) {
            return $this->triggerError($e->getMessage(), $flags);
        }
    }
}
