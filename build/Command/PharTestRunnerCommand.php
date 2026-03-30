<?php

namespace AwsBuild\Command;

final class PharTestRunnerCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'phar-test-runner';
    }

    public function getDescription(): string
    {
        return 'Runs the PHPUnit + Behat test suites against the phar artifacts.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php phar-test-runner [-- phpunit/behat options]';
    }

    protected function doExecute(array $args): int
    {
        $buildDir = self::getBuildDir();

        require $buildDir . '/artifacts/aws.phar';
        require $buildDir . '/artifacts/phpunit.phar';
        require $buildDir . '/artifacts/behat.phar';

        return 0;
    }
}
