<?php

namespace AwsBuild\Command;

class PackageCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'package';
    }

    public function getDescription(): string
    {
        return 'Packages aws.phar and aws.zip for a release.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php package [--service=<name>]';
    }

    protected function doExecute(array $args): int
    {
        $options = $this->parseOptions([], ['service:']);

        $buildDir = $this->getBuildDir();
        $projectRoot = $this->getProjectRoot();
        $stageDirectory = $buildDir . '/artifacts/staging';
        $burgomaster = new \Burgomaster($stageDirectory, $projectRoot . '/');
        $autoloaderFilename = 'aws-autoloader.php';

        $metaFiles = ['README.md', 'LICENSE', 'NOTICE', 'CHANGELOG.md'];
        foreach ($metaFiles as $file) {
            $burgomaster->deepCopy($file, $file);
        }

        $sdkFiles = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(realpath($projectRoot . '/src'))
        );
        $sdkFiles = new \CallbackFilterIterator($sdkFiles, function (\SplFileInfo $file) {
            return !in_array($file->getBasename('.php'), [
                'docs-2.json',
                'examples-1.json',
            ]);
        });

        $burgomaster->recursiveCopy('src', 'Aws', ['php', 'php.gz'], $sdkFiles);
        $burgomaster->recursiveCopy('vendor/aws/aws-php-sns-message-validator/src', 'Aws/Sns');
        $burgomaster->recursiveCopy('vendor/mtdowling/jmespath.php/src', 'JmesPath');
        $burgomaster->recursiveCopy('vendor/guzzlehttp/guzzle/src', 'GuzzleHttp');
        $burgomaster->recursiveCopy('vendor/guzzlehttp/psr7/src', 'GuzzleHttp/Psr7');
        $burgomaster->recursiveCopy('vendor/guzzlehttp/promises/src', 'GuzzleHttp/Promise');
        $burgomaster->recursiveCopy('vendor/psr/http-message/src', 'Psr/Http/Message');

        $autoloaderContents = [
            'Aws/functions.php',
            'GuzzleHttp/functions_include.php',
            'JmesPath/JmesPath.php',
        ];

        if (file_exists($projectRoot . '/vendor/symfony/polyfill-intl-idn')) {
            $burgomaster->recursiveCopy($projectRoot . '/vendor/symfony/polyfill-intl-idn', 'Symfony/Polyfill/Intl/Idn');
            array_push($autoloaderContents, 'Symfony/Polyfill/Intl/Idn/bootstrap.php');
        }

        if (file_exists($projectRoot . '/vendor/psr/http-client/src')) {
            $burgomaster->recursiveCopy($projectRoot . '/vendor/psr/http-client/src', 'Psr/Http/Client');
        }

        $burgomaster->createAutoloader($autoloaderContents, $autoloaderFilename);

        $burgomaster->createZip($buildDir . "/artifacts/aws.zip");
        $burgomaster->createPhar(
            $buildDir . "/artifacts/aws.phar",
            null,
            $autoloaderFilename,
            'aws-' . \Aws\Sdk::VERSION . '.phar'
        );

        $burgomaster->startSection('test-phar');
        $burgomaster->exec('php ' . $buildDir . '/WorkflowCommandRunner.php test-phar');
        $burgomaster->endSection();

        return 0;
    }
}
