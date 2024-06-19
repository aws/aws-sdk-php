<?php
use Aws\Build\Docs\DocsBuilder;

// Setup autoloading for SDK and build classes.
$loader = require __DIR__ . '/../vendor/autoload.php';

// Setup directories.
$xmlObj = simplexml_load_file(__DIR__ . '/docs/phpdoc.dist.xml');
$xmlJson = json_encode($xmlObj);
$config = json_decode($xmlJson, true);
$outputDir = __DIR__ . '/artifacts/docs';
$apiProvider = \Aws\Api\ApiProvider::defaultProvider();

// Extract the built homepage into a template file.
$xml = new DOMDocument();
@$xml->loadHTMLFile(__DIR__ . '/artifacts/docs/index.html');
$ele = $xml->getElementById('content');
$ele->nodeValue = '{{ contents }}';
//$template = str_replace('class="phpdocumentor"', 'class="generated-page"', $xml->saveHTML());
$template = $xml->saveHTML();

$sourceDirs = array_map(function ($dirRelativeToProjectRoot) {
    return __DIR__ . '/../' . $dirRelativeToProjectRoot;
}, is_array($config['version']['api']['source']['path'])
    ? $config['version']['api']['source']['path']
    : [$config['version']['api']['source']['path']]
);
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

$issueLoggingEnabled = isset(getopt(
    '',
    array('issue-logging-enabled::')
)['issue-logging-enabled']);

// Generate API docs
$builder = new DocsBuilder(
    $apiProvider,
    $outputDir,
    $template,
    'http://docs.aws.amazon.com/aws-sdk-php/v3/api/',
    [],
    $sourceFiles,
    $issueLoggingEnabled
);
$builder->build();
