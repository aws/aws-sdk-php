<?php
namespace Aws\S3;

use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Event\PreparedEvent;
use transducers as t;

/**
 * Transfers files from the local filesystem to S3 or from S3 to the local
 * filesystem.
 *
 * This class does not support copying from the local filesystem to somewhere
 * else on the local filesystem or from one S3 bucket to another.
 */
class Transfer
{
    private $client;
    private $source;
    private $sourceScheme;
    private $dest;
    private $destScheme;
    private $s3Args = [];

    // Available options.
    private $concurrency = 5;
    private $mup_threshold = 20971520;
    private $base_dir;
    private $before;
    private $debug = false;

    /**
     * When providing the $source argument, you may provide a string referencing
     * the path to a directory on disk to upload, an s3 scheme URI that contains
     * the bucket and key (e.g., "s3://bucket/key"), or an \Iterator object
     * that yields strings containing filenames that are the path to a file on
     * disk or an s3 scheme URI. The "/key" portion of an s3 URI is optional.
     *
     * When providing an iterator for the $source argument, you must also
     * provide a 'base_dir' key value pair in the $options argument.
     *
     * The $dest argument can be the path to a directory on disk or an s3
     * scheme URI (e.g., "s3://bucket/key").
     *
     * The options array can contain the following key value pairs:
     *
     * - base_dir: The directory to remove from the filename when saving.
     * - before: A callable that accepts the following positional arguments:
     *   source, dest, command; where command is an instance of a Command
     *   object. The provided command will be either a GetObject, PutObject,
     *   InitiateMultipartUpload, or UploadPart command.
     * - mup_threshold: Size in bytes in which a multipart upload should be
     *   used instead of PutObject. Defaults to 20971520 (20 MB).
     * - concurrency: Number of files to upload concurrently. Defaults to 5.
     * - debug: Set to true to print out debug information for transfers. Set
     *   to an fopen() resource to write to a specific stream.
     *
     * @param S3Client         $client  Client used for transfers.
     * @param string|\Iterator $source  Where the files are transferred from.
     * @param string           $dest    Where the files are transferred to.
     * @param array            $options Hash of options.
     */
    public function __construct(
        S3Client $client,
        $source,
        $dest,
        array $options = []
    ) {
        $client->registerStreamWrapper();
        if (is_string($source)) {
            $this->base_dir = $source;
            $source = self::recursiveDirIterator($source, $client);
        } elseif (!$source instanceof \Iterator) {
            throw new \InvalidArgumentException('source must be the path to a '
                . 'directory or an iterator that yields file names.');
        } elseif (!$this->base_dir) {
            throw new \InvalidArgumentException('You must provide the source '
                . 'argument as a string or provide the "base_dir" option.');
        }

        $valid = ['mup_threshold', 'base_dir', 'before', 'concurrency', 'debug'];
        foreach ($valid as $opt) {
            if (isset($options[$opt])) {
                $this->{$opt} = $options[$opt];
            }
        }

        if ($this->mup_threshold < 5248000) {
            throw new \InvalidArgumentException('mup_threshold must be >= 5248000');
        }

        // Normalize the destination and source directory.
        $this->dest = rtrim(str_replace('\\', '/', $dest), '/');
        $this->base_dir = rtrim(str_replace('\\', '/', $this->base_dir), '/');
        $this->destScheme = $this->getScheme($this->dest);
        $this->sourceScheme = $this->getScheme($this->base_dir);
        $this->client = $client;

        if ($this->destScheme == 's3') {
            $this->s3Args = $this->getS3Args($this->dest);
        }

        if ($this->debug) {
            $this->wrapDebug();
        }

        $this->source = $this->wrapIterator($source);
    }

    /**
     * Returns a recursive directory iterator that yields filenames only and
     * is not broken like PHP's built-in DirectoryIterator (which will read
     * the first file from a stream wrapper, then rewind, then read it again).
     *
     * @param string $path Path on disk to traverse
     *
     * @return \Iterator Returns an iterator that yields absolute filenames.
     */
    public static function recursiveDirIterator($path)
    {
        $invalid = ['.' => true, '..' => true];
        $pathLen = strlen($path) + 1;
        $queue = new \SplDoublyLinkedList();
        foreach (scandir($path) as $item) {
            $queue->push($item);
        }

        while (!$queue->isEmpty()) {
            $file = $queue->shift();
            if (isset($invalid[basename($file)])) {
                continue;
            }
            $fullPath = $path . '/' . $file;
            yield $fullPath;
            if (is_dir($fullPath)) {
                // Push these files to the front of the queue, in order.
                $push = scandir($fullPath);
                for ($i = count($push) - 1; $i > -1; $i--) {
                    $queue->unshift(substr("$fullPath/{$push[$i]}", $pathLen));
                }
            }
        }
    }

    /**
     * Transfers the files.
     */
    public function transfer()
    {
        if (!$this->source->valid()) {
            $this->source->rewind();
        }

        $options = ['pool_size' => $this->concurrency];
        $this->client->executeAll($this->source, $options);
    }

    /**
     * Creates an array that contains Bucket and Key by parsing the filename.
     *
     * @param string $filename Filename to parse.
     *
     * @return array
     */
    private function getS3Args($filename)
    {
        $parts = explode('/', str_replace('s3://', '', $filename), 2);
        $args = ['Bucket' => $parts[0]];
        if (isset($parts[1])) {
            $args['Key'] = $parts[1];
        }

        return $args;
    }

    /**
     * Creates an iterator that yields Commands from each filename.
     *
     * @param \Iterator $iter Iterator to wrap.
     *
     * @return \Iterator
     */
    private function wrapIterator(\Iterator $iter)
    {
        $comp = [];
        // Filter out MUP uploads to send separate operations.
        if ($this->destScheme == 's3' && $this->sourceScheme == 'file') {
            $comp[] = t\filter(function ($file) {
                if ($this->sourceScheme == 'file'
                    && filesize($file) >= $this->mup_threshold
                ) {
                    $this->mup($file);
                    return false;
                }
                // Filter out "/" files stored on S3 as buckets.
                return substr($file, -1, 1) != '/';
            });
        }
        $comp[] = t\map($this->getTransferFunction($this->sourceScheme, $this->destScheme));

        return t\to_iter($iter, call_user_func_array('transducers\comp', $comp));
    }

    /**
     * Parses the scheme from a filename.
     *
     * @param string $file Filename to parse.
     *
     * @return string
     */
    private function getScheme($file)
    {
        return !strpos($file, '://') ? 'file' : explode('://', $file)[0];
    }

    private function createS3Key($filename)
    {
        if (!isset($this->s3Args['Key'])) {
            return '';
        }

        $args = $this->s3Args;
        $args['Key'] = rtrim($args['Key'], '/');
        $args['Key'] .= preg_replace('#^' . preg_quote($this->base_dir) . '#', '', $filename);

        return $args['Key'];
    }

    private function wrapBefore($source, $dest, Command $command)
    {
        if ($this->before) {
            $command->getEmitter()->on(
                'init',
                function () use ($source, $dest, $command) {
                    call_user_func($this->before, $source, $dest, $command);
                }
            );
        }

        return $command;
    }

    private function getObject($filename)
    {
        $args = $this->getS3Args($filename);
        $dest = preg_replace('#^' . preg_quote($this->base_dir) . '#', '', $filename);
        $dest = $this->dest . '/' . ltrim($dest, '/');
        $args['SaveAs'] = $dest;
        $cmd = $this->client->getCommand('GetObject', $args);
        $dir = dirname($args['SaveAs']);

        // Create the directory if needed.
        if (!is_dir($dir) && !mkdir($dir, 0777, true)) {
            throw new \RuntimeException("Could not create dir: $dir");
        }

        return $this->wrapBefore($filename, $dest, $cmd);
    }

    private function putObject($filename)
    {
        $args = $this->s3Args;
        $args['SourceFile'] = $filename;
        $args['Key'] = $this->createS3Key($filename);
        $cmd = $this->client->getCommand('PutObject', $args);
        $dest = 's3://' . $args['Bucket'] . '/' . $args['Key'];

        return $this->wrapBefore($filename, $dest, $cmd);
    }

    private function getTransferFunction($source, $dest)
    {
        if ($dest == 's3' && $source == 's3') {
            throw new \InvalidArgumentException('Cannot copy from s3 to s3');
        } elseif ($dest == 's3') {
            return function ($f) { return $this->putObject($f); };
        } elseif ($source == 's3') {
            return function ($f) { return $this->getObject($f); };
        }

        throw new \InvalidArgumentException('Cannot copy local file to local file');
    }

    private function mup($filename)
    {
        $dest = 's3://' . $this->s3Args['Bucket']
            . '/' . $this->createS3Key($filename);
        $uploader = (new UploadBuilder())
            ->setBucket($this->s3Args['Bucket'])
            ->setKey($this->createS3Key($filename))
            ->setSource($filename)
            ->setClient($this->client)
            ->build();

        $fn = null;
        if ($this->before) {
            $fn = function(PreparedEvent $e) use ($filename, $dest) {
                $cmd = $e->getCommand();
                $cmd->debugStr = "Part={$cmd['PartNumber']}";
                call_user_func($this->before, $filename, $dest, $cmd);
            };
        }

        $uploader->upload($this->concurrency, $fn);
    }

    private function wrapDebug()
    {
        if ($this->debug === true) {
            $this->debug = fopen('php://output', 'w');
        }

        $before = $this->before;
        $this->before = function ($source, $dest, CommandInterface $command) use ($before) {
            $before and $before($source, $dest, $command);
            $ctx = sprintf('%s -> %s (%s)', $source, $dest, $command->getName());
            if (!empty($command->debugStr)) {
                $ctx .= ' : ' . $command->debugStr;
            }
            fwrite($this->debug, "Transferring {$ctx}\n");
        };
    }
}
