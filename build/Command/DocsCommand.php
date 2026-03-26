<?php

namespace AwsBuild\Command;

use Aws\Build\Docs\DocsBuilder;

final class DocsCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'docs';
    }

    public function getDescription(): string
    {
        return 'Generates custom API documentation over the phpDocumentor output.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php docs [--issue-logging-enabled]';
    }

    protected function doExecute(array $args): int
    {
        $buildDir = $this->getBuildDir();
        $projectRoot = $this->getProjectRoot();

        // Setup directories.
        $xmlObj = simplexml_load_file($buildDir . '/docs/phpdoc.dist.xml');
        $xmlJson = json_encode($xmlObj);
        $config = json_decode($xmlJson, true);
        $outputDir = $buildDir . '/artifacts/docs';
        $apiProvider = \Aws\Api\ApiProvider::defaultProvider();

        // Extract the built homepage into a template file.
        $xml = new \DOMDocument();
        @$xml->loadHTMLFile($buildDir . '/artifacts/docs/index.html');
        $ele = $xml->getElementById('content');
        $ele->nodeValue = '{{ contents }}';
        $template = $xml->saveHTML();

        $sourceDirs = array_map(function ($dirRelativeToProjectRoot) use ($projectRoot) {
            return $projectRoot . '/' . $dirRelativeToProjectRoot;
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

        $options = $this->parseOptions($args);
        $issueLoggingEnabled = isset($options['issue-logging-enabled']);

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

        return 0;
    }
}
