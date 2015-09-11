<?php
/**
 * This file updates the '@method' annotations on the Aws\Sdk class.
 */

require __DIR__ . '/../vendor/autoload.php';

$namespaces = array_map(function (array $manifest) {
    return $manifest['namespace'];
}, array_values(Aws\manifest()));

sort($namespaces);

$annotations = array_map(function ($namespace) {
    return " * @method \\Aws\\{$namespace}\\{$namespace}Client"
        . " create{$namespace}(array \$args = [])";
}, $namespaces);
$previousAnnotationPattern = '/^\* @method'
    . ' \\\\Aws\\\\(?:[a-zA-Z0-9]+)\\\\(?:[a-zA-Z0-9]+)Client'
    . ' create(?:[a-zA-Z0-9]+)\\(array \$args = \\[\\]\\)/';

(new ClassAnnotationUpdater(
    new ReflectionClass(\Aws\Sdk::class),
    $annotations,
    '',
    $previousAnnotationPattern
))
    ->update();
