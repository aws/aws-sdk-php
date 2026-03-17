<?php

namespace AwsBuild\Command;

use Aws\Build\Docs\RedirectMapBuilder;

class BuildRedirectMapCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'build-redirect-map';
    }

    public function getDescription(): string
    {
        return 'Builds the docs redirect map (artifacts/docs/package.redirects.conf).';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php build-redirect-map';
    }

    protected function doExecute(array $args): int
    {
        $path = $this->getBuildDir() . '/artifacts/docs/package.redirects.conf';
        $apiProvider = \Aws\Api\ApiProvider::defaultProvider();

        $builder = new RedirectMapBuilder($apiProvider, $path);
        $builder->build();

        $this->output('Redirect map built.');
        return 0;
    }
}
