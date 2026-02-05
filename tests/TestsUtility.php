<?php
namespace Aws\Test;

use function Aws\dir_iterator;

final class TestsUtility
{
    /**
     * Helper method to clean up temporary dirs.
     *
     * @param $dirPath
     *
     * @return void
     */
    public static function cleanUpDir($dirPath): void
    {
        if (!is_dir($dirPath)) {
            return;
        }

        if (is_link($dirPath)) {
            // Handle how window treats symlinks to directories
            PHP_OS_FAMILY === 'Windows' ? rmdir($dirPath) : unlink($dirPath);
            return;
        }

        $files = dir_iterator($dirPath);
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            if (!str_ends_with($dirPath, DIRECTORY_SEPARATOR)) {
                $dirPath .= DIRECTORY_SEPARATOR;
            }

            $filePath = $dirPath . $file;
            if (!is_dir($filePath)) {
                $value = @unlink($filePath);
                if (!$value) {
                    // Try rmdir
                    @rmdir($filePath);
                }
            } else {
                self::cleanUpDir($filePath);
            }
        }

        rmdir($dirPath);
    }
}
