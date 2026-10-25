<?php

if ($argc !== 3) {
    fwrite(
        STDERR,
        "Usage: php filter-phpcs-report.php <phpcs-report.json> <diff>\n"
    );
    exit(2);
}

$report = json_decode(
    file_get_contents($argv[1]),
    true
);
if (!is_array($report) || !isset($report['files'])) {
    fwrite(STDERR, "Unable to read the PHPCS JSON report.\n");
    exit(2);
}

$ranges = parseChangedLineRanges(file_get_contents($argv[2]));
$violations = [];
$workingDirectory = str_replace('\\', '/', getcwd());
foreach ($report['files'] as $path => $file) {
    $normalizedPath = normalizePath($path, $workingDirectory);
    foreach ($file['messages'] as $message) {
        if (isChangedLine($ranges[$normalizedPath] ?? [], $message['line'])) {
            $violations[$normalizedPath][] = $message;
        }
    }
}

if (empty($violations)) {
    echo "No PHPCS violations found on changed lines.\n";
    exit(0);
}

$count = 0;
foreach ($violations as $path => $messages) {
    echo "\nFILE: {$path}\n";
    foreach ($messages as $message) {
        $fixable = $message['fixable'] ? ' [x]' : '';
        echo sprintf(
            "%d:%d %s%s %s (%s)\n",
            $message['line'],
            $message['column'],
            strtoupper($message['type']),
            $fixable,
            $message['message'],
            $message['source']
        );
        $count++;
    }
}

echo "\nFound {$count} PHPCS violation(s) on changed lines.\n";
exit(1);

/**
 * @return array<string, array<int, array{0: int, 1: int}>>
 */
function parseChangedLineRanges(string $diff): array
{
    $ranges = [];
    $path = null;
    foreach (preg_split('/\r\n|\n|\r/', $diff) as $line) {
        if (str_starts_with($line, '+++ ')) {
            $path = substr($line, 4);
            $path = explode("\t", $path, 2)[0];
            if ($path === '/dev/null') {
                $path = null;
            } elseif (str_starts_with($path, 'b/')) {
                $path = substr($path, 2);
            }
            continue;
        }

        if ($path === null
            || !preg_match(
                '/^@@ -\d+(?:,\d+)? \+(\d+)(?:,(\d+))? @@/',
                $line,
                $matches
            )
        ) {
            continue;
        }

        $start = (int) $matches[1];
        $count = isset($matches[2]) ? (int) $matches[2] : 1;
        if ($count > 0) {
            $ranges[$path][] = [$start, $start + $count - 1];
        }
    }

    return $ranges;
}

function normalizePath(string $path, string $workingDirectory): string
{
    $path = str_replace('\\', '/', $path);
    $prefix = rtrim($workingDirectory, '/') . '/';

    return str_starts_with($path, $prefix)
        ? substr($path, strlen($prefix))
        : $path;
}

/**
 * @param array<int, array{0: int, 1: int}> $ranges
 */
function isChangedLine(array $ranges, int $line): bool
{
    foreach ($ranges as [$start, $end]) {
        if ($line >= $start && $line <= $end) {
            return true;
        }
    }

    return false;
}
