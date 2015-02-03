<?php
require __DIR__  . '/../vendor/autoload.php';

use GuzzleHttp\Ring\Core;

function generateDocblock(array $args)
{
    foreach ($args as $name => $value) {
        if (!isset($value['doc'])) {
            continue;
        }

        $docs = $value['doc'];
        $modifiers = [];

        if (isset($value['valid'])) {
            $modifiers[] = implode('|', $value['valid']);
        }

        if (isset($value['required'])) {
            $modifiers[] = 'required';
        }

        if (isset($value['default'])) {
            $modifiers[] = 'default=' . Core::describeType($value['default']);
        }

        if ($modifiers) {
            $docs = '(' . implode(', ', $modifiers) . ') ' . $docs;
        }

        $value = wordwrap($docs, 54, "\n*   ", true);
        echo '* - ' . $name . ': ' . $value . "\n";
    }
}

$clientName = isset($argv[1]) ? $argv[1] : 'Aws\ClientFactory';
$args = call_user_func([$clientName, 'getValidArguments']);
ksort($args);

$type = isset($argv[2]) ? $argv[2] : 'docblock';

switch ($type) {
    case 'docblock':
        generateDocblock($args);
        break;
    default:
        die('Unknown type: ' . $type);
}
