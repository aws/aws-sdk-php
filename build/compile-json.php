<?php
require __DIR__ . '/../vendor/autoload.php';

/**
 * Finds all JSON files in src/data, converts them to PHP files that return
 * arrays, and writes those files to $originalFileName.json.php.  Files for
 * endpoints v2 starting with endpoints- will get zipped.
 */
$dataFilesIterator = \Aws\recursive_dir_iterator(realpath(__DIR__ . '/../src/data'));
foreach (new RegexIterator($dataFilesIterator, '/\.json$/') as $dataFile) {
    (new JsonCompiler($dataFile))
        ->compile("$dataFile.php");
}
