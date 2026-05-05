<?php

namespace AwsBuild;

require dirname(__DIR__) . '/vendor/autoload.php';

use AwsBuild\Command\AnnotateClientLocatorCommand;
use AwsBuild\Command\AnnotateClientsCommand;
use AwsBuild\Command\BuildChangelogCommand;
use AwsBuild\Command\BuildManifestCommand;
use AwsBuild\Command\BuildRedirectMapCommand;
use AwsBuild\Command\BuildServiceCommand;
use AwsBuild\Command\ClearCacheCommand;
use AwsBuild\Command\CompileJsonCommand;
use AwsBuild\Command\DocsCommand;
use AwsBuild\Command\GhReleaseCommand;
use AwsBuild\Command\ListCommand;
use AwsBuild\Command\NormalizeDocsFilesCommand;
use AwsBuild\Command\OptionDocsCommand;
use AwsBuild\Command\PackageCommand;
use AwsBuild\Command\PharTestRunnerCommand;
use AwsBuild\Command\RemoveMethodAnnotationsCommand;
use AwsBuild\Command\RemoveServiceCommand;
use AwsBuild\Command\TestPharCommand;

class WorkflowCommandRunner
{
    private const COMMANDS = [
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

    public function run(array $argv): int
    {
        $commandName = $argv[1] ?? null;

        if ($commandName === null) {
            return $this->usage();
        }

        if (!isset(self::COMMANDS[$commandName])) {
            fwrite(STDERR, "Unknown command: $commandName\n");
            return $this->usage();
        }

        [$projectRoot, $args] = $this->parseArgs(array_slice($argv, 2));

        $_SERVER['argv'] = array_merge([$argv[0]], $args);
        $_SERVER['argc'] = count($_SERVER['argv']);

        $command = $this->createCommand($commandName, $projectRoot);

        return $command->execute($args);
    }

    private function usage(): int
    {
        fwrite(STDERR, "Usage: php build/WorkflowCommandRunner.php <command> [options...]\n");
        fwrite(STDERR, "Run 'php build/WorkflowCommandRunner.php list' to see available commands.\n");
        return 1;
    }

    private function parseArgs(array $args): array
    {
        $projectRoot = null;
        $filtered = [];
        foreach ($args as $arg) {
            if (str_starts_with($arg, '--project-root=')) {
                $projectRoot = substr($arg, strlen('--project-root='));
            } else {
                $filtered[] = $arg;
            }
        }
        return [$projectRoot, $filtered];
    }

    private function createCommand(string $name, ?string $projectRoot): Command\CommandInterface
    {
        $class = self::COMMANDS[$name];

        if ($class === ListCommand::class) {
            return new ListCommand(self::COMMANDS);
        }

        return new $class($projectRoot);
    }
}

// Self-contained autoloader for AwsBuild classes.
spl_autoload_register(function ($class) {
    $prefix = 'AwsBuild\\';
    if (strncmp($prefix, $class, strlen($prefix)) === 0) {
        $relativeClass = substr($class, strlen($prefix));
        $file = __DIR__ . '/' . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

exit((new WorkflowCommandRunner())->run($_SERVER['argv']));
