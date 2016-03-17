<?php
/**
 * This file is responsible for adding @method annotations to each client class.
 */
require __DIR__ . '/../vendor/autoload.php';

// parse out --class, --tag, and --all options
// You can have multiple --class and --tag flags
//  e.g. php annotate-clients.php --class=Aws\S3\S3Client --class=Aws\Swf\SwfClient
// Use --class to update the annotation on a class
// Use --tag to update annotations on clients updated since a given git tag
// Use --tag=latest to do so comparing against the last release
// Use --all to update annotations on all clients
// Combine them at will; each class will only be updated once
$options = getopt('', ['class:', 'tag:', 'all']) + ['class' => [], 'tag' => []];

// make sure all options are arrays
array_walk($options, function (&$value) {
    if (!is_array($value)) {
        $value = [$value];
    }
});

function get_client_classes($namespace) {
    $clients = ["Aws\\{$namespace}\\{$namespace}Client"];
    if (class_exists("Aws\\{$namespace}\\{$namespace}MultiRegionClient")) {
        $clients []= "Aws\\{$namespace}\\{$namespace}MultiRegionClient";
    }

    return $clients;
};

if (isset($options['all'])) {
    // Get all client classes and mark them for update
    $options['class'] = Aws\flatmap(Aws\manifest(), function (array $manifest) {
        return get_client_classes($manifest['namespace']);
    });
}

foreach ($options['tag'] as $tag) {
    // Change 'latest' to the last release
    if ('latest' === $tag) {
        $tag = trim(`git tag | tail -n 1`);
    }

    // Find all api-2.json files changed since a given tag. These are service
    // API definitions; changes here can mean changes to client annotations.
    exec("git diff-index --name-only --cached $tag", $files);
    $alteredApiFiles = array_filter($files, function ($file) {
        return preg_match('/api-2.json$/', $file);
    });

    // Find the client classes for each changed API service definition and mark
    // them for update.
    $clientsWithChangedApis = Aws\flatmap($alteredApiFiles, function ($file) {
        $file = str_replace('src/data/', '', $file);
        $endpoint = substr($file, 0, strpos($file, '/'));
        return get_client_classes(Aws\manifest($endpoint)['namespace']);
    });
    $options['class'] = \Aws\flatmap(
        [$options['class'], $clientsWithChangedApis],
        function ($class) { return $class; }
    );
}

foreach ($options['class'] as $classToUpdate) {
    // Update the @method annotations on a client.
    $annotator = new ClientAnnotator($classToUpdate);

    if (!$annotator->updateApiMethodAnnotations()) {
        trigger_error(
            "Unable to update annotations on $classToUpdate",
            E_USER_WARNING
        );
    }
}
