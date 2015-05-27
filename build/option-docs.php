<?php
require __DIR__  . '/../vendor/autoload.php';

function generateDocblock(array $args)
{
    foreach ($args as $name => $value) {
        if (!isset($value['doc']) || !empty($value['internal'])) {
            continue;
        }

        $docs = $value['doc'];
        $modifiers = [];

        if (isset($value['valid'])) {
            $modifiers[] = implode('|', $value['valid']);
        }

        if (!empty($value['required'])) {
            $modifiers[] = 'required';
        }

        if (isset($value['default']) && !is_callable($value['default'])) {
            $modifiers[] = 'default=' . \Aws\describe_type($value['default']);
        }

        if ($modifiers) {
            $docs = '(' . implode(', ', $modifiers) . ') ' . $docs;
        }

        $docs = '* - ' . $name . ': ' . $docs;
        echo wordwrap($docs, 70, "\n*   ") . "\n";
    }
}

$clientName = isset($argv[1]) ? $argv[1] : 'Aws\AwsClient';
$args = call_user_func([$clientName, 'getArguments']);
ksort($args);

$type = isset($argv[2]) ? $argv[2] : 'docblock';

switch ($type) {
    case 'docblock':
        generateDocblock($args);
        break;
    default:
        die('Unknown type: ' . $type);
}
