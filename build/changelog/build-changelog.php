<?php

require __DIR__ . '/ChangelogBuilder.php';

use Aws\Build\Changelog\ChangelogBuilder;

$params = [
    'verbose' => true
];

$changelogBuilder = new ChangelogBuilder($params);

$changelogBuilder->buildChangelog();

$changelogBuilder->fixEndpointFile();

$changelogBuilder->cleanNextReleaseFolder();
