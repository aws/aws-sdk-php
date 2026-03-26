<?php

namespace AwsBuild\Command;

final class RemoveMethodAnnotationsCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'remove-method-annotations';
    }

    public function getDescription(): string
    {
        return 'Strips @method annotations before doc generation.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php remove-method-annotations';
    }

    protected function doExecute(array $args): int
    {
        $directoryPath = $this->getBuildDir() . '/artifacts/staging/Aws';
        $fileSuffix = 'Client.php';
        $this->removeMethodAnnotations($directoryPath, $fileSuffix);

        return 0;
    }

    private function removeMethodAnnotations(string $dir, string $fileSuffix): void
    {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir));

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                continue;
            }

            if (str_ends_with($file->getPathname(), $fileSuffix)) {
                $filePath = $file->getRealPath();
                $content = file_get_contents($filePath);

                // Regular expression to match @method annotations
                $pattern = '/^\s*\*\s+@method\s+[^\n]+\n/m';

                if (preg_match($pattern, $content)) {
                    $newContent = preg_replace($pattern, '', $content);
                    file_put_contents($filePath, $newContent);
                    $this->output("Method annotations removed from: $filePath");
                }
            }
        }
    }
}
