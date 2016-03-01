<?php
/**
 * This file updates the '@method' annotations on the Aws\Sdk class.
 */

require __DIR__ . '/../vendor/autoload.php';

$namespaces = array_map(function (array $manifest) {
    return $manifest['namespace'];
}, array_values(Aws\manifest()));

sort($namespaces);
$annotations = [];
foreach ($namespaces as $namespace) {
    $mrClient = "\\Aws\\{$namespace}\\{$namespace}MultiRegionClient";
    $mrClient = class_exists($mrClient) ? $mrClient : "\\Aws\\MultiRegionClient";

    $annotations []= " * @method \\Aws\\{$namespace}\\{$namespace}Client"
        . " create{$namespace}(array \$args = [])";
    $annotations []= " * @method $mrClient"
        . " createMultiRegion{$namespace}(array \$args = [])";
}

$previousAnnotationPattern = '/^\* @method'
    . ' \\\\Aws\\\\(?:[a-zA-Z0-9\\\\]+)Client'
    . ' create(?:[a-zA-Z0-9]+)\\(array \$args = \\[\\]\\)/';

$updater = new ClassAnnotationUpdater(
    new ReflectionClass(\Aws\Sdk::class),
    $annotations,
    '',
    $previousAnnotationPattern
);
$updater->update();
