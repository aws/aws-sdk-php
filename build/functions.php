<?php

function get_code_for_array(array $array)
{
    // Use var_export as a starting point.
    $code = "<?php return " . var_export($array, true) . ";\n";

    // Convert "array()" to "[]".
    $code = str_replace('array (', '[', $code);
    $code = str_replace(')', ']', $code);

    // Removing trailing whitespace.
    $code = preg_replace('/\s+$/m', '', $code);

    // Move arrays to the same line.
    $code = preg_replace('/=>\s*\n\s*\[/', '=> [', $code);

    // Get rid of numbered array indexes.
    $code = preg_replace('/(\s*)(\d+ => )/', '$1', $code);

    // Make empty arrays span only a single line.
    $code = preg_replace('/=>\s*\[\n\s*\]/', '=> []', $code);

    // Add a trailing new line.
    $code .= "\n";

    return $code;
}
