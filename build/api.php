<?php
/*
 * Loads each JSON file in the provided directory, converts them to .php files,
 * and places them into the SDK.
 */

if (!isset($argv[1])) {
    die('A source path was not provided in argument 1');
}

$dir = $argv[1];

if (is_file($dir)) {
    copyJson($dir);
} elseif (is_dir($dir)) {
    foreach (scandir($dir) as $file) {
        copyJson($dir . '/' . $file);
    }
} else {
    die('Invalid file/directory');
}

function copyJson($file) {
    if ($file[0] == '.') {
        continue;
    }
    $phpFile = __DIR__ . '/../src/Common/Resources/api/'
        . str_replace('.json', '.php', basename($file));
    $json = json_decode(file_get_contents($file), true);
    $script = "<?php\nreturn " . var_export($json, true) . ";\n";
    // Convert "array()" to "[]"
    $script = str_replace('array (', '[', $script);
    $script = str_replace(')', ']', $script);
    // Removing trailing whitespace
    $script = preg_replace('/\s+$/m', '', $script);
    file_put_contents($phpFile, $script);
}
