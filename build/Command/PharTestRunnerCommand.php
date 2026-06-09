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
        $script = <<<'INLINE_PHP'
            require '%BUILD_DIR%' . '/artifacts/aws.phar';
            require '%BUILD_DIR%' . '/artifacts/phpunit.phar';
            require '%BUILD_DIR%' . '/artifacts/behat.phar';    
    INLINE_PHP;

        $buildDir = addslashes(self::getBuildDir());
        $script = str_replace('%BUILD_DIR%', $buildDir, $script);
        $output = [];
        $exitCode = 0;
        exec('php -r ' . escapeshellarg($script) . ' 2>&1', $output, $exitCode);

        $outputStr = implode("\n", $output);

        if ($exitCode !== 0) {
            $this->error("Phar test failed (exit code $exitCode):\n$outputStr");
            return 1;
        }

        $this->output($outputStr);

        return 0;
    }
}
