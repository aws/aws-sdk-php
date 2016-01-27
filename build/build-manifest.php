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
];

// Create a list of possible namespaces so that we can include it in the
// manifest.
$possibleNamespaces = [];
$skip = ['.', '..', 'Api', 'data', 'Multipart', 'Signature'];
foreach (scandir(__DIR__ . '/../src') as $dir) {
    if (!in_array($dir, $skip) && is_dir(__DIR__ . '/../src/' . $dir)) {
        $possibleNamespaces[strtolower($dir)] = $dir;
    }
}

$manifest = [];
foreach (glob(__DIR__ . '/../src/data/**/**/api-2.json') as $file) {
    $model = json_decode(file_get_contents($file), true);
    $metadata = $model['metadata'] + ['compatibleApiVersions' => []];
    if (empty($manifest[$metadata['endpointPrefix']])) {
        // Calculate a namespace for the service.
        $ns = isset($metadata['serviceAbbreviation'])
            ? $metadata['serviceAbbreviation']
            : $metadata['serviceFullName'];
        $ns = str_replace(['Amazon', 'AWS', 'Beta', '(', ')', ' ', '/'], '', $ns);

        if (!isset($possibleNamespaces[strtolower($ns)])) {
            throw new \Exception('NS not found: ' . $ns);
        }

        $ns = $possibleNamespaces[strtolower($ns)];

        $manifest[$metadata['endpointPrefix']] = [
            'namespace' => $ns,
            'versions' => [],
        ];
    }

    $manifest[$metadata['endpointPrefix']]['versions'][$metadata['apiVersion']]
        = $metadata['apiVersion'];
}

foreach ($manifest as $identifier => &$metadata) {
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
