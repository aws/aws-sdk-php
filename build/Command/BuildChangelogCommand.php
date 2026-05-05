<?php

namespace AwsBuild\Command;

use Aws\Build\Changelog\ChangelogBuilder;

final class BuildChangelogCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'build-changelog';
    }

    public function getDescription(): string
    {
        return 'Builds CHANGELOG.md from next-release entries.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php build-changelog [-v]';
    }

    protected function doExecute(array $args): int
    {
        $params = [];
        $params['verbose'] = $this->verbose;
        $params['base_dir'] = $this->getProjectRoot() . '/';

        $changelogBuilder = new ChangelogBuilder($params);

        $changelogBuilder->buildChangelog();

        // Omit fixEndpointFile() call - method doesn't exist on ChangelogBuilder

        $changelogBuilder->cleanNextReleaseFolder();

        return 0;
    }
}
