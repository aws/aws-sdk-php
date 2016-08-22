<?php

require __DIR__ . '/../vendor/autoload.php';

$UPDATE = " - Added support for latest API updates.";
$path = __DIR__ . '/../CHANGELOG.md';

$diff = shell_exec("git status --porcelain");
$diff_array = explode("\n", $diff);

$entries = [];
foreach ($diff_array as $line) {
    $entry = explode('/', $line);
    if (sizeof($entry) < 5) continue;

    $service = \Aws\manifest($entry[2])["namespace"];
    if (strpos($entry[4], 'docs') === 0 ||
        strpos($entry[4], 'examples') === 0 ||
        in_array($service, $entries)
    ) {
        continue;
    }

    $entries[] = $service;
}

//update CHANGELOG.md before tag the release
$update_change_log = "sed -i '' -e 's/CHANGELOG/CHANGELOG\\\n\\\n## next release\\\n";
foreach ($entries as $service) {
    $update_change_log .= "\\\n* `Aws\\\\{$service}`{$UPDATE}";
}
$update_change_log .= "/' {$path}";
shell_exec($update_change_log);
