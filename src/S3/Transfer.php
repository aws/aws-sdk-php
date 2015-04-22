<?php
namespace Aws\S3;

use Aws;
use Aws\CommandInterface;
use Aws\ResultInterface;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Promise\PromisorInterface;
use Symfony\Component\Yaml\Exception\RuntimeException;
use transducers as t;

/**
 * Transfers files from the local filesystem to S3 or from S3 to the local
 * filesystem.
 *
 * This class does not support copying from the local filesystem to somewhere
 * else on the local filesystem or from one S3 bucket to another.
 */
class Transfer implements PromisorInterface
{
    private $client;
    private $promise;
    private $source;
    private $destination;
    private $concurrency;
    private $mup_threshold;
    private $before;
    private $s3Args = [];

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
        $this->client = $client;

        // Prepare the destination.
        $this->destination = $this->prepareTarget($dest);
        if ($this->destination['scheme'] === 's3') {
            $this->s3Args = $this->getS3Args($this->destination['path']);
        }

        // Prepare the source.
        if (is_string($source)) {
            $this->source = $this->prepareTarget($source);
        } elseif ($source instanceof \Iterator) {
            if (isset($options['base_dir'])) {
                $this->source = $this->prepareTarget($options['base_dir']);
            } else {
                throw new \InvalidArgumentException('You must provide the source'
                    . ' argument as a string or provide the "base_dir" option.');
            }
        } else {
            throw new \InvalidArgumentException('source must be the path to a '
                . 'directory or an iterator that yields file names.');
        }

        // Validate schemes.
        if ($this->source['scheme'] === $this->destination['scheme']) {
            throw new \InvalidArgumentException("You cannot copy from "
                . "{$this->source['scheme']} to {$this->destination['scheme']}."
            );
        }

        // Handle multipart-related options.
        $this->concurrency = isset($options['concurrency'])
            ? $options['concurrency']
            : MultipartUploader::DEFAULT_CONCURRENCY;
        $this->mupThreshold = isset($options['mup_threshold'])
            ? $options['mup_threshold']
            : 16777216;
        if ($this->mupThreshold < MultipartUploader::PART_MIN_SIZE) {
            throw new \InvalidArgumentException('mup_threshold must be >= 5MB');
        }

        // Handle "before" callback option.
        if (isset($options['before'])) {
            $this->before = $options['before'];
            if (!is_callable($this->before)) {
                throw new \InvalidArgumentException('before must be a callable.');
            }
        }

        // Handle "debug" option.
        if (isset($options['debug'])) {
            if ($options['debug'] === true) {
                $options['debug'] = fopen('php://output', 'w');
            }
            $this->addDebugToBefore($options['debug']);
        }
    }

    /**
     * Transfers the files.
     */
    public function promise()
    {
        // If the promise has been created, just return it.
        if ($this->promise) {
            return $this->promise;
        }

        // Create an upload/download promise for the transfer.
        if ($this->source['scheme'] === 'file') {
            return $this->promise = $this->createUploadPromise();
        } else {
            return $this->promise = $this->createDownloadPromise();
        }
    }

    /**
     * Transfers the files synchronously.
     */
    public function transfer()
    {
        $this->promise()->wait();
    }

    private function prepareTarget($targetPath)
    {
        $target = [
            'path'   => $this->normalizePath($targetPath),
            'scheme' => $this->determineScheme($targetPath),
        ];

        if ($target['scheme'] !== 's3' && $target['scheme'] !== 'file') {
            throw new \InvalidArgumentException('Scheme must be "s3" or "file".');
        }

        return $target;
    }

    /**
     * Creates an array that contains Bucket and Key by parsing the filename.
     *
     * @param string $path Path to parse.
     *
     * @return array
     */
    private function getS3Args($path)
    {
        $parts = explode('/', str_replace('s3://', '', $path), 2);
        $args = ['Bucket' => $parts[0]];
        if (isset($parts[1])) {
            $args['Key'] = $parts[1];
        }

        return $args;
    }

    /**
     * Parses the scheme from a filename.
     *
     * @param string $path Path to parse.
     *
     * @return string
     */
    private function determineScheme($path)
    {
        return !strpos($path, '://') ? 'file' : explode('://', $path)[0];
    }

    /**
     * Normalize a path so that it has a trailing slash.
     *
     * @param string $path
     *
     * @return string
     */
    private function normalizePath($path)
    {
        return rtrim(str_replace('\\', '/', $path), '/');
    }

    private function createDownloadPromise()
    {
        // Prepare args for ListObjects.
        $listArgs = $this->getS3Args($this->source['path']);
        $listArgs['Prefix'] = $listArgs['Key'] . '/';
        unset($listArgs['Key']);

        // Get the Paginator for ListObjects
        $objects = $this->client->getPaginator('ListObjects', $listArgs);

        // Asynchronously execute the paginator, building command pools to
        // download the objects.
        return $this->promise = $objects->each(function (
            ResultInterface $result
        ) use ($listArgs) {
            $commands = [];
            foreach ($result->search('Contents[].Key') as $key) {
                // Skip files on S3 that just mark the existence of a folder.
                if (substr($key, -1, 1) === '/') {
                    continue;
                }

                // Prepare the sink.
                $localKey = $key;
                if (strpos($localKey, $listArgs['Prefix']) === 0) {
                    $localKey = substr($key, strlen($listArgs['Prefix']));
                }
                $sink = $this->destination['path'] . '/' . $localKey;

                // Create the directory if needed.
                $dir = dirname($sink);
                if (!is_dir($dir) && !mkdir($dir, 0777, true)) {
                    return Promise\rejection_for(
                        new \RuntimeException("Could not create dir: {$dir}")
                    );
                }

                // Create the command.
                $commands[] = $this->client->getCommand('GetObject', [
                    'Bucket' => $listArgs['Bucket'],
                    'Key'    => $key,
                    '@http'  => [
                        'sink'  => $sink,
                        'delay' => true
                    ],
                ]);
            }

            // Create a GetObject command pool and return the promise.
            return (new Aws\CommandPool($this->client, $commands, [
                'concurrency' => $this->concurrency,
                'before'      => $this->before
            ]))->promise();
        });
    }

    private function createUploadPromise()
    {
        // Creates an iterator that yields promises for either upload or
        // multipart upload operations for each file in the source directory.
        $filter = t\filter(function ($file) {
            return !is_dir($file);
        });
        $map = t\map(function ($file) {
            return (filesize($file) >= $this->mup_threshold)
                ? $this->uploadMultipart($file)
                : $this->upload($file);
        });
        $files = t\to_iter(
            Aws\recursive_dir_iterator($this->source['path']),
            t\comp($filter, $map)
        );

        // Create an EachPromise, that will concurrently handle the upload
        // operations' yielded promises from the iterator.
        return $this->promise = (new Promise\EachPromise($files, [
            'concurrency' => $this->concurrency
        ]))->promise();
    }

    private function upload($filename)
    {
        $args = $this->s3Args;
        $args['SourceFile'] = $filename;
        $args['Key'] = $this->createS3Key($filename);
        $args['@http'] = ['delay' => true];

        $command = $this->client->getCommand('PutObject', $args);
        call_user_func($this->before, $command);

        return $this->client->executeAsync($command);
    }

    private function uploadMultipart($filename)
    {
        $args = $this->s3Args;
        $args['Key'] = $this->createS3Key($filename);

        return (new MultipartUploader($this->client, $filename, [
            'bucket'          => $args['Bucket'],
            'key'             => $args['Key'],
            'before_initiate' => $this->before,
            'before_upload'   => $this->before,
            'before_complete' => $this->before,
            'concurrency'     => $this->concurrency,
        ]))->promise();
    }

    private function createS3Key($filename)
    {
        if (!isset($this->s3Args['Key'])) {
            return '';
        }

        $args = $this->s3Args;
        $args['Key'] = rtrim($args['Key'], '/');
        $args['Key'] .= preg_replace('#^' . preg_quote($this->source['path']) . '#', '', $filename);

        return $args['Key'];
    }

    private function addDebugToBefore($debug)
    {
        $before = $this->before;
        $sourcePath = $this->source['path'];

        $this->before = static function (
            CommandInterface $command
        ) use ($before, $debug, $sourcePath) {
            // Call the composed before function.
            $before and $before($command);

            // Determine the source and dest values based on operation.
            switch ($operation = $command->getName()) {
                case 'GetObject':
                    $source = "s3://{$command['Bucket']}/{$command['Key']}";
                    $dest = $command['@http']['sink'];
                    break;
                case 'PutObject':
                    $source = $command['SourceFile'];
                    $dest = "s3://{$command['Bucket']}/{$command['Key']}";
                    break;
                case 'UploadPart':
                    $part = $command['PartNumber'];
                case 'CreateMultipartUpload':
                case 'CompleteUploadPart':
                    $source = $sourcePath . $command['Key'];
                    $dest = "s3://{$command['Bucket']}/{$command['Key']}";
                    break;
                default:
                    throw new \UnexpectedValueException(
                        "Transfer encountered an unexpected operation: {$operation}."
                    );
            }

            // Print the debugging message.
            $context = sprintf('%s -> %s (%s)', $source, $dest, $operation);
            if (isset($part)) {
                $context .= " : Part={$part}";
            }
            fwrite($debug, "Transferring {$context}\n");
        };
    }
}
