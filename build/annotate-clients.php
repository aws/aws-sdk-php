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

if (isset($options['all'])) {
    // Get all client classes and mark them for update
    $options['class'] = array_values(array_map(function (array $manifest) {
        return "Aws\\{$manifest['namespace']}\\{$manifest['namespace']}Client";
    }, Aws\manifest()));
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
    $clientsWithChangedApis = array_values(array_map(function ($apiFile) {
        $apiFile = str_replace('src/data/', '', $apiFile);
        $endpoint = substr($apiFile, 0, strpos($apiFile, '/'));
        $namespace = Aws\manifest($endpoint)['namespace'];

        return "Aws\\{$namespace}\\{$namespace}Client";
    }, $alteredApiFiles));
    $options['class'] = array_merge($options['class'], $clientsWithChangedApis);
}

foreach (array_unique($options['class']) as $classToUpdate) {
    // Update the @method annotations on a client.
    (new ClientAnnotator($classToUpdate))
        ->updateApiMethodAnnotations()
        || trigger_error(
            "Unable to update annotations on $classToUpdate",
            E_USER_WARNING
        );
}
