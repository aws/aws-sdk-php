<?php

require __DIR__ . '/functions.php';

$manifest = [];
foreach (glob(__DIR__ . '/../src/data/*.api.php') as $file) {
    $model = include $file;
    $metadata = $model['metadata'] + ['compatibleApiVersions' => []];
    $manifest[$metadata['endpointPrefix']] = [
        'latest' => $metadata['apiVersion'],
        $metadata['apiVersion'] => $metadata['apiVersion'],
    ];
    foreach ($metadata['compatibleApiVersions'] as $compatVersion) {
        $manifest[$metadata['endpointPrefix']][$compatVersion] = $metadata['apiVersion'];
    }
}

$data = get_code_for_array($manifest);
$file = __DIR__ . '/../src/data/api-version-manifest.php';
file_put_contents($file, $data);

echo "Wrote the following data to {$file}:\n>>>>>\n{$data}<<<<<\n";
