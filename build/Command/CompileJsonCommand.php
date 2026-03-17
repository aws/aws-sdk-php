<?php

namespace AwsBuild\Command;

class CompileJsonCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'compile-json';
    }

    public function getDescription(): string
    {
        return 'Compiles src/data/**/*.json files into PHP arrays.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php compile-json';
    }

    protected function doExecute(array $args): int
    {
        $dataDir = realpath($this->getProjectRoot() . '/src/data');
        $dataFilesIterator = \Aws\recursive_dir_iterator($dataDir);
        $count = 0;

        foreach (new \RegexIterator($dataFilesIterator, '/\.json$/') as $dataFile) {
            (new \JsonCompiler($dataFile))
                ->compile("$dataFile.php");
            $count++;
        }

        $this->output("Compiled $count JSON files.");
        return 0;
    }
}
