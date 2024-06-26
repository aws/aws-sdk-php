<?php

/**
 *   This script removes `@method` annotations on service client classes prior to doc generation.
 *   Removing these annotations prevents phpDocumentor from generating documentation for service methods
 *   on the client class.
 */

function removeMethodAnnotations($dir, $fileSuffix) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

    foreach ($iterator as $file) {
        if ($file->isDir()) {
            continue;
        }

        if (str_ends_with($file->getPathname(), $fileSuffix)) {
            $filePath = $file->getRealPath();
            $content = file_get_contents($filePath);

            // Regular expression to match @method annotations
            // This pattern assumes @method annotations may span multiple lines and are within comment blocks
            $pattern = '/\*\s+@method\s+[^\n]+\n/';

            if (preg_match($pattern, $content)) {
                // Remove @method annotations
                $newContent = preg_replace($pattern, '', $content);

                // Write the clean content back to the file
                file_put_contents($filePath, $newContent);
                echo "Method annotations removed from: $filePath\n";
            }
        }
    }
}

$directoryPath = __DIR__ . '/artifacts/staging/Aws';
$fileSuffix = 'Client.php';
removeMethodAnnotations($directoryPath, $fileSuffix);