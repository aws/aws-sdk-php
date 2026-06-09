<?php

namespace AwsBuild\Command;

final class ClearCacheCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'clear-cache';
    }

    public function getDescription(): string
    {
        return 'Clears the JMESPath compiled cache directory.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php clear-cache';
    }

    protected function doExecute(array $args): int
    {
        \JmesPath\Env::cleanCompileDir();
        $this->output('JMESPath cache cleared.');
        return 0;
    }
}
