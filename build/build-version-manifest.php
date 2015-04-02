<?php

$manifest = [];
foreach (glob(__DIR__ . '/../src/data/**/**/api-2.json') as $file) {
    $model = json_decode(file_get_contents($file), true);
    $metadata = $model['metadata'] + ['compatibleApiVersions' => []];
    $manifest[$metadata['endpointPrefix']] = [
        'latest' => $metadata['apiVersion'],
        $metadata['apiVersion'] => $metadata['apiVersion'],
    ];
    foreach ($metadata['compatibleApiVersions'] as $compatVersion) {
        $manifest[$metadata['endpointPrefix']][$compatVersion] = $metadata['apiVersion'];
    }
}

$data = json_encode($manifest, JSON_PRETTY_PRINT);
$file = __DIR__ . '/../src/data/version-manifest.json';
file_put_contents($file, $data);

echo "Wrote the following data to {$file}:\n>>>>>\n{$data}<<<<<\n";
