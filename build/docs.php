<?php
use Aws\Build\Docs\DocsBuilder;

// Setup autoloading for SDK and build classes.
$loader = require __DIR__ . '/../vendor/autoload.php';

// Setup directories.
$outputDir = __DIR__ . '/artifacts/docs';
$apiProvider = \Aws\Api\ApiProvider::defaultProvider();

// Extract the built homepage into a template file.
$xml = new DOMDocument();
@$xml->loadHTMLFile(__DIR__ . '/artifacts/docs/index.html');
$ele = $xml->getElementById('content');
$ele->nodeValue = '{{ contents }}';
$template = str_replace('class="homepage"', 'class="generated-page"', $xml->saveHTML());

// Generate API docs
$builder = new DocsBuilder($apiProvider, $outputDir, $template);
$builder->build();
