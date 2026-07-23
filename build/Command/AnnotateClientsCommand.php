<?php

namespace AwsBuild\Command;

final class AnnotateClientsCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'annotate-clients';
    }

    public function getDescription(): string
    {
        return 'Adds @method annotations to service client classes.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php annotate-clients [--all] [--class=<FQCN>] [--tag=<git-tag>]';
    }

    protected function doExecute(array $args): int
    {
        $options = $this->parseOptions($args) + ['class' => [], 'tag' => []];

        // make sure all options are arrays
        array_walk($options, function (&$value) {
            if (!is_array($value)) {
                $value = [$value];
            }
        });

        if (isset($options['all'])) {
            $options['class'] = \Aws\flatmap(\Aws\manifest(), function (array $manifest) {
                return $this->getClientClasses($manifest['namespace']);
            });
        }

        foreach ($options['tag'] as $tag) {
            if ('latest' === $tag) {
                $tag = trim(`git tag | tail -n 1`);
            }

            exec("git diff-index --name-only --cached $tag", $files);
            $alteredApiFiles = array_filter($files, function ($file) {
                return preg_match('/api-2.json$/', $file);
            });

            $clientsWithChangedApis = \Aws\flatmap($alteredApiFiles, function ($file) {
                $file = str_replace('src/data/', '', $file);
                $endpoint = substr($file, 0, strpos($file, '/'));
                return $this->getClientClasses(\Aws\manifest($endpoint)['namespace']);
            });
            $options['class'] = \Aws\flatmap(
                [$options['class'], $clientsWithChangedApis],
                function ($class) { return $class; }
            );
        }

        foreach ($options['class'] as $classToUpdate) {
            $annotator = new \ClientAnnotator($classToUpdate);

            if (!$annotator->updateApiMethodAnnotations()) {
                trigger_error(
                    "Unable to update annotations on $classToUpdate",
                    E_USER_WARNING
                );
            }
        }

        return 0;
    }

    private function getClientClasses(string $namespace): array
    {
        $clients = ["Aws\\{$namespace}\\{$namespace}Client"];
        if (class_exists("Aws\\{$namespace}\\{$namespace}MultiRegionClient")) {
            $clients[] = "Aws\\{$namespace}\\{$namespace}MultiRegionClient";
        }

        return $clients;
    }
}
