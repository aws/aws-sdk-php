<?php

require __DIR__ . '/ChangelogBuilder.php';

use Aws\Build\Changelog\ChangelogBuilder;

$params = array();

$options = getopt('v:');

if (isset($option['v'])) {
    $params['verbose'] = $option['v'];
} else {
    $params['verbose'] = true;
}

$changelogBuilder = new ChangelogBuilder($params);

$changelogBuilder->buildChangelog();

$changelogBuilder->fixEndpointFile();

$changelogBuilder->cleanNextReleaseFolder();
