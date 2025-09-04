<?php
namespace Aws\Test;

use function Aws\dir_iterator;

class TestsUtility
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

        $files = dir_iterator($dirPath);
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $filePath  = $dirPath . '/' . $file;
            if (is_file($filePath) || !is_dir($filePath)) {
                unlink($filePath);
            } elseif (is_dir($filePath)) {
                self::cleanUpDir($filePath);
            }
        }

        rmdir($dirPath);
    }
}
