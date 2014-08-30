<?php

use Aws\Build\Docs\DocsBuilder;
use Aws\Common\Api\FilesystemApiProvider;

// Setup autoloading for SDK and build classes.
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('Aws\\Build\\Docs\\', __DIR__ . '/docs/classes');

// Setup API provider for service models.
$apiProvider = new FilesystemApiProvider(
    __DIR__ . '/../src/Common/Resources/api'
);

// Setup directories.
$sourceDir = __DIR__ . '/artifacts/staging';
$docsDir = __DIR__ . '/artifacts/doc-models';
$outputDir = __DIR__ . '/artifacts/docs';
foreach ([$outputDir, $outputDir . '/theme', $outputDir . '/theme/layout', $outputDir . '/theme/img'] as $dir) {
    if (!is_dir($dir)) {
        if (!mkdir($dir, 0755)) {
            fwrite(STDERR, "Could not create directory: {$dir}.");
            exit();
        }
    }
}

// Generate API docs
$builder = new DocsBuilder($apiProvider, $docsDir, $outputDir);
return $builder->getSami($sourceDir);

/**
 * TODO:
 * ------
 * - Sourcing the doc models.
 * - Ordering/tweaking search.
 * - Visual tweaks to API pages.
 */
