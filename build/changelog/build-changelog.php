<?php

require __DIR__ . '/ChangelogBuilder.php';

use Aws\Build\Changelog\ChangelogBuilder;

$changelogBuilder = new ChangelogBuilder();

$changelogBuilder->buildChangelog();
$changelogBuilder->fixEndpointFile();
$changelogBuilder->cleanNextReleaseFolder();