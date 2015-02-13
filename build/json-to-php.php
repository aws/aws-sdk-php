<?php
/*
 * Converts a JSON file to a PHP file that can be require()d.
 */

require __DIR__ . '/functions.php';

if (!isset($argv[1])) {
    die('A source file path was not provided in argument 1');
}

$file = $argv[1];

if (!is_file($file)) {
    die('The source file must be a readable file.');
}

$json = json_decode(file_get_contents($file), true);
$script = get_code_for_array($json);

echo $script;
