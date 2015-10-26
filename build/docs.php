<?php
use Aws\Build\Docs\DocsBuilder;

// Setup autoloading for SDK and build classes.
$loader = require __DIR__ . '/../vendor/autoload.php';

// Setup directories.
$config = \Nette\Neon\Neon::decode(file_get_contents(__DIR__ . '/docs/apigen.neon'));
$outputDir = __DIR__ . '/../' . $config['destination'];
$apiProvider = \Aws\Api\ApiProvider::defaultProvider();

// Extract the built homepage into a template file.
$xml = new DOMDocument();
@$xml->loadHTMLFile(__DIR__ . '/artifacts/docs/index.html');
$ele = $xml->getElementById('content');
$ele->nodeValue = '{{ contents }}';
$template = str_replace('class="homepage"', 'class="generated-page"', $xml->saveHTML());

$quickLinkServices = ['s3', 'dynamodb', 'glacier', 'ec2'];

$sourceDirs = array_map(function ($dirRelativeToProjectRoot) {
    return __DIR__ . '/../' . $dirRelativeToProjectRoot;
}, is_array($config['source']) ? $config['source'] : [$config['source']]);
$sourceFiles = [];
foreach ($sourceDirs as $dir) {
    $sourceFiles = array_merge(
        $sourceFiles,
        array_filter(
            array_map('realpath', iterator_to_array(\Aws\recursive_dir_iterator($dir))),
            function ($path) {
                return preg_match('/(?<!\.json)\.php/', $path);
            }
        )
    );
}

// Generate API docs
$builder = new DocsBuilder(
    $apiProvider,
    $outputDir,
    $template,
    $config['baseUrl'],
    $quickLinkServices,
    $sourceFiles
);
$builder->build();
