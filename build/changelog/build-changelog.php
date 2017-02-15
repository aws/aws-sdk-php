<?php

require __DIR__ . '/ChangelogBuilder.php';

use Aws\Build\Changelog\ChangelogBuilder;

$params = [];

$options = getopt('v');

$params['verbose'] = isset($option['v']) ? $option['v'] : true;

$changelogBuilder = new ChangelogBuilder($params);

$changelogBuilder->buildChangelog();

$changelogBuilder->fixEndpointFile();

$changelogBuilder->cleanNextReleaseFolder();
