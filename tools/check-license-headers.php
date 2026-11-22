#!/usr/bin/env php
<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

const LICENSE_HEADER = <<<'HEADER'
/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
HEADER;

$root = \dirname(__DIR__);
$command = [
    'git',
    '-C',
    $root,
    'ls-files',
    '-z',
    '--cached',
    '--others',
    '--exclude-standard',
    '--',
    '*.php'
];
$process = \proc_open(
    $command,
    [
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w']
    ],
    $pipes
);
if (!\is_resource($process)) {
    \fwrite(STDERR, "Could not start git to find PHP files.\n");

    exit(2);
}

$stdout = \stream_get_contents($pipes[1]);
$stderr = \stream_get_contents($pipes[2]);
\fclose($pipes[1]);
\fclose($pipes[2]);
$status = \proc_close($process);
if ($status !== 0 || $stdout === false || $stderr === false) {
    \fwrite(
        STDERR,
        "Could not list PHP files with git.\n" . ($stderr ?: '')
    );

    exit(2);
}

$files = \array_values(
    \array_filter(
        \explode("\0", $stdout),
        static fn(string $file): bool => $file !== ''
    )
);
\sort($files);
$invalid = [];

foreach ($files as $file) {
    $contents = \file_get_contents($root . '/' . $file);
    if ($contents === false) {
        $invalid[] = $file . ' (could not be read)';
        continue;
    }

    $contents = \str_replace("\r\n", "\n", $contents);
    $prefix = "<?php\n\n" . LICENSE_HEADER . "\n\n";
    if (\str_starts_with($contents, "#!/usr/bin/env php\n")) {
        $prefix = "#!/usr/bin/env php\n" . $prefix;
    }

    if (!\str_starts_with($contents, $prefix)) {
        $invalid[] = $file;
    }
}

if ($invalid !== []) {
    \fwrite(
        STDERR,
        "Missing or invalid Apache-2.0 license header:\n"
        . ' - '
        . \implode("\n - ", $invalid)
        . "\n"
    );

    exit(1);
}

\printf("Checked %d PHP files.\n", \count($files));
