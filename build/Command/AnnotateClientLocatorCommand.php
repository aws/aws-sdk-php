<?php

namespace AwsBuild\Command;

class AnnotateClientLocatorCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'annotate-client-locator';
    }

    public function getDescription(): string
    {
        return 'Updates @method annotations on the Aws\Sdk class.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php annotate-client-locator';
    }

    protected function doExecute(array $args): int
    {
        $namespaces = array_map(function (array $manifest) {
            return $manifest['namespace'];
        }, array_values(\Aws\manifest()));

        sort($namespaces);
        $annotations = [];
        foreach ($namespaces as $namespace) {
            $mrClient = "\\Aws\\{$namespace}\\{$namespace}MultiRegionClient";
            $mrClient = class_exists($mrClient) ? $mrClient : "\\Aws\\MultiRegionClient";

            $annotations[] = " * @method \\Aws\\{$namespace}\\{$namespace}Client"
                . " create{$namespace}(array \$args = [])";
            $annotations[] = " * @method $mrClient"
                . " createMultiRegion{$namespace}(array \$args = [])";
        }

        $previousAnnotationPattern = '/^\* @method'
            . ' \\\\Aws\\\\(?:[a-zA-Z0-9\\\\]+)Client'
            . ' create(?:[a-zA-Z0-9]+)\\(array \$args = \\[\\]\\)/';

        $updater = new \ClassAnnotationUpdater(
            new \ReflectionClass(\Aws\Sdk::class),
            $annotations,
            '',
            $previousAnnotationPattern
        );
        $updater->update();

        return 0;
    }
}
