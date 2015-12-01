<?php

/**
 * A trait that provides a method for linting a PHP file. It will use
 * `opcache_compile` if available and fall back to shelling out to `php -l`
 * otherwise.
 *
 * @internal
 */
trait PhpFileLinterTrait
{
    /**
     * @param string $path
     *
     * @return bool
     */
    private function lintFile($path)
    {
        static $linter;

        if (empty($linter)) {
            $linter = function_exists('opcache_get_status')
                && !empty(opcache_get_status(false)['opcache_enabled'])
                    ? [$this, 'opcacheLint']
                    : [$this, 'commandLineLint'];
        }

        return call_user_func($linter, $path);
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    private function commandLineLint($path)
    {
        list($output, $exitCode) = [[], 1];
        exec("php -l $path", $output, $exitCode);

        return 0 === $exitCode;
    }

    /**
     * Uses the Zend OPCache control functions to perform an in-process
     * validation of a file. This function will fail on code that declares new
     * symbols (e.g., classes or functions) if they have already been loaded
     * into the current process.
     *
     * @param string $path
     *
     * @return bool
     */
    private function opcacheLint($path)
    {
        opcache_invalidate($path, true);

        return @opcache_compile_file($path);
    }
}
