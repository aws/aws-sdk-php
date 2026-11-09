<?php
/*
 * This file is responsible for building up the API manifest file, including
 * determining the latest API version and hooking up endpoint prefix names
 * with client namespace names.
 */

$compatibleApiVersions = [
    'apigateway' => [
        'latest' => [
            '2015-06-01',
        ],
    ],
    'cloudfront' => [
        'latest' => [
            '2016-01-13',
            '2015-09-17',
        ],
        '2015-07-27' => [
            '2015-04-17',
            '2014-11-06'
        ],
    ],
    'ec2' => [
        'latest' => [
            '2015-04-15',
        ],
    ],
    'events' => [
        'latest' => [
            '2014-02-03',
        ],
    ],
    'inspector' => [
        'latest' => [
            '2015-08-18',
        ]
    ],
];

require __DIR__ . '/NamespaceResolver.php';

// Namespaces are derived from serviceId only; see NamespaceResolver.
$namespaceResolver = new NamespaceResolver(__DIR__ . '/..');

$manifest = [];
foreach (glob(__DIR__ . '/../src/data/**/**/api-2.json') as $file) {
    $model = json_decode(file_get_contents($file), true);
    preg_match('@src/data/([^/]+)/[0-9]{4}-[0-9]{2}-[0-9]{2}/api-2.json$@', $file, $matches);
    $identifier = $matches[1];
    $metadata = $model['metadata'] + ['compatibleApiVersions' => []];
    if (empty($manifest[$identifier])) {
        $manifest[$identifier] = ['versions' => []];
    }

    $manifest[$identifier]['versions'][$metadata['apiVersion']]
        = $metadata['apiVersion'];

    // Some API versions released before 2017 carry no serviceId. The latest
    // version of every service does, and all versions share one namespace,
    // so the namespace and serviceIdentifier come from the latest version.
    $manifest[$identifier]['metadataByVersion'][$metadata['apiVersion']] = $metadata;
}

foreach ($manifest as $identifier => &$metadata) {
    $latest = max(array_keys($metadata['metadataByVersion']));
    $latestMetadata = $metadata['metadataByVersion'][$latest];
    unset($metadata['metadataByVersion']);

    $metadata = ['namespace' => $namespaceResolver->resolve($latestMetadata)]
        + $metadata;
    $metadata['serviceIdentifier']
        = str_replace(' ', '_', strtolower($latestMetadata['serviceId']));

    $metadata['versions']['latest'] = max(array_keys($metadata['versions']));
    foreach ($metadata['versions'] as $name => $version) {
        if (isset($compatibleApiVersions[$identifier][$name])) {
            foreach ($compatibleApiVersions[$identifier][$name] as $compatVersion) {
                $metadata['versions'][$compatVersion]
                    = $metadata['versions'][$name];
            }
        }
    }

    krsort($metadata['versions']);
}

$data = json_encode($manifest, JSON_PRETTY_PRINT);
$file = __DIR__ . '/../src/data/manifest.json';
file_put_contents($file, "$data\n");

echo "Wrote the following data to {$file}:\n>>>>>\n{$data}<<<<<\n";
