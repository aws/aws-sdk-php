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

    /**
     * Returns a function that invokes the provided variadic functions one
     * after the other until one of the functions returns a non-null value.
     * The return function will call each passed function with any arguments it
     * is provided.
     *
     *     $a = function ($x, $y) { return null; };
     *     $b = function ($x, $y) { return $x + $y; };
     *     $fn = Utils::orFn($a, $b);
     *     echo $fn(1, 2); // 3
     *
     * @return callable
     */
    public static function orFn()
    {
        $fns = func_get_args();
        return function () use ($fns) {
            $args = func_get_args();
            foreach ($fns as $fn) {
                $result = $args ? call_user_func_array($fn, $args) : $fn();
                if ($result) {
                    return $result;
                }
            }
            return null;
        };
    }

    /**
     * Returns a function that always returns the same value;
     *
     * @param mixed $value Value to return.
     *
     * @return callable
     */
    public static function constantly($value)
    {
        return function () use ($value) { return $value; };
    }

    /**
     * Debug function used to describe the provided value type and class.
     *
     * @param mixed $input
     *
     * @return string Returns a string containing the type of the variable and
     *                if a class is provided, the class name.
     */
    public static function describeType($input)
    {
        switch (gettype($input)) {
            case 'object':
                return 'object(' . get_class($input) . ')';
            case 'array':
                return 'array(' . count($input) . ')';
            default:
                ob_start();
                var_dump($input);
                // normalize float vs double
                return str_replace('double(', 'float(', rtrim(ob_get_clean()));
        }
    }
}
