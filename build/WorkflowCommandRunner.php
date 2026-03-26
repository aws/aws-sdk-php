<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use AwsBuild\Command\ListCommand;
use AwsBuild\Command\ClearCacheCommand;
use AwsBuild\Command\CompileJsonCommand;
use AwsBuild\Command\BuildRedirectMapCommand;
use AwsBuild\Command\PharTestRunnerCommand;
use AwsBuild\Command\AnnotateClientsCommand;
use AwsBuild\Command\AnnotateClientLocatorCommand;
use AwsBuild\Command\BuildManifestCommand;
use AwsBuild\Command\BuildServiceCommand;
use AwsBuild\Command\OptionDocsCommand;
use AwsBuild\Command\TestPharCommand;
use AwsBuild\Command\RemoveMethodAnnotationsCommand;
use AwsBuild\Command\PackageCommand;
use AwsBuild\Command\DocsCommand;
use AwsBuild\Command\GhReleaseCommand;
use AwsBuild\Command\NormalizeDocsFilesCommand;
use AwsBuild\Command\BuildChangelogCommand;
use AwsBuild\Command\RemoveServiceCommand;

const WORKFLOW_COMMANDS = [
    'list'                       => ListCommand::class,
    'clear-cache'                => ClearCacheCommand::class,
    'compile-json'               => CompileJsonCommand::class,
    'build-redirect-map'         => BuildRedirectMapCommand::class,
    'phar-test-runner'           => PharTestRunnerCommand::class,
    'annotate-clients'           => AnnotateClientsCommand::class,
    'annotate-client-locator'    => AnnotateClientLocatorCommand::class,
    'build-manifest'             => BuildManifestCommand::class,
    'build-service'              => BuildServiceCommand::class,
    'option-docs'                => OptionDocsCommand::class,
    'test-phar'                  => TestPharCommand::class,
    'remove-method-annotations'  => RemoveMethodAnnotationsCommand::class,
    'package'                    => PackageCommand::class,
    'docs'                       => DocsCommand::class,
    'gh-release'                 => GhReleaseCommand::class,
    'normalize-docs-files'       => NormalizeDocsFilesCommand::class,
    'build-changelog'            => BuildChangelogCommand::class,
    'remove-service'             => RemoveServiceCommand::class,
];

$argv = $_SERVER['argv'];
$commandName = $argv[1] ?? null;

if ($commandName === null) {
    fwrite(STDERR, "Usage: php build/WorkflowCommandRunner.php <command> [options...]\n");
    fwrite(STDERR, "Run 'php build/WorkflowCommandRunner.php list' to see available commands.\n");
    exit(1);
}

if (!isset(WORKFLOW_COMMANDS[$commandName])) {
    fwrite(STDERR, "Unknown command: $commandName\n");
    fwrite(STDERR, "Run 'php build/WorkflowCommandRunner.php list' to see available commands.\n");
    exit(1);
}

$args = array_slice($argv, 2);
$_SERVER['argv'] = array_merge([$argv[0]], $args);
$_SERVER['argc'] = count($argv);

$class = WORKFLOW_COMMANDS[$commandName];

if ($class === ListCommand::class) {
    $command = new ListCommand(WORKFLOW_COMMANDS);
} else {
    $command = new $class();
}

exit($command->execute($args));
