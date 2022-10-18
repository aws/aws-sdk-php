<?php
require __DIR__ . '/../vendor/autoload.php';

/**
 * Finds all JSON files in src/data, converts them to PHP files that return
 * arrays, and writes those files to $originalFileName.json.php.
 */
$dataFilesIterator = \Aws\recursive_dir_iterator(realpath(__DIR__ . '/../src/data'));


foreach (new RegexIterator($dataFilesIterator, '/\.json$/') as $dataFile) {
    (new JsonCompiler($dataFile))
        ->compile("$dataFile.php");
}
foreach (new RegexIterator($dataFilesIterator, '/endpoint-.*\.json(\.php)?$/') as $dataFile) {
    $gzdata = gzencode(file_get_contents($dataFile));
    file_put_contents( $dataFile.".gz", $gzdata);
    unlink($dataFile);
    echo $dataFile . "\n";
}
