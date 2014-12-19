<?php
/*
 * Converts a JSON file to a PHP file that can be require()d.
 */

if (!isset($argv[1])) {
    die('A source file path was not provided in argument 1');
}

$file = $argv[1];

if (!is_file($file)) {
    die('The source file must be a readable file.');
}

$json = json_decode(file_get_contents($file), true);
$script = "<?php return " . var_export($json, true) . ";\n";

// Convert "array()" to "[]"
$script = str_replace('array (', '[', $script);
$script = str_replace(')', ']', $script);

// Removing trailing whitespace
$script = preg_replace('/\s+$/m', '', $script);

// Move arrays to the same line
$script = preg_replace('/=>\s*\n\s*\[/', '=> [', $script);

// Get rid of numbered array indexes
$script = preg_replace('/(\s*)(\d+ => )/', '$1', $script);

// Make empty arrays span only a single line.
$script = preg_replace('/=>\s*\[\n\s*\]/', '=> []', $script);

// Add a trailing new line
$script .= "\n";

echo $script;
