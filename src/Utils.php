<?php
namespace Aws;

use transducers as t;

final class Utils
{
    /**
     * Iterates over the files in a directory and works with custom wrappers.
     *
     * @param string   $path Path to open (e.g., "s3://foo/bar").
     * @param resource $context Stream wrapper context.
     *
     * @return \Generator Yields relative filename strings.
     */
    public static function dirIterator($path, $context = null)
    {
        $dh = $context ? opendir($path, $context) : opendir($path);
        if (!$dh) {
            throw new \InvalidArgumentException('File not found: ' . $path);
        }
        while (($file = readdir($dh)) !== false) {
            yield $file;
        }
        closedir($dh);
    }

    /**
     * Returns a recursive directory iterator that yields absolute filenames.
     *
     * This iterator is not broken like PHP's built-in DirectoryIterator (which
     * will read the first file from a stream wrapper, then rewind, then read
     * it again).
     *
     * @param string   $path    Path to traverse (e.g., s3://bucket/key, /tmp)
     * @param resource $context Stream context options.
     *
     * @return \Generator Yields absolute filenames.
     */
    public static function recursiveDirIterator($path, $context = null)
    {
        $invalid = ['.' => true, '..' => true];
        $pathLen = strlen($path) + 1;
        $iterator = self::dirIterator($path, $context);
        $queue = [];
        do {
            while ($iterator->valid()) {
                $file = $iterator->current();
                $iterator->next();
                if (isset($invalid[basename($file)])) {
                    continue;
                }
                $fullPath = "{$path}/{$file}";
                yield $fullPath;
                if (is_dir($fullPath)) {
                    $queue[] = $iterator;
                    $iterator = t\to_iter(
                        self::dirIterator($fullPath, $context),
                        t\map(function ($file) use ($fullPath, $pathLen) {
                            return substr("{$fullPath}/{$file}", $pathLen);
                        })
                    );
                    continue;
                }
            }
            $iterator = array_pop($queue);
        } while ($iterator);
    }
}
