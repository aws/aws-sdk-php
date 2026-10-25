#!/usr/bin/env bash

set -euo pipefail

readonly FILTER=".github/scripts/filter-phpcs-report.php"

temporary_directory="$(mktemp -d)"
trap 'rm -rf "$temporary_directory"' EXIT
report="$temporary_directory/phpcs-report.json"
diff_file="$temporary_directory/changed-lines.diff"

cat > "$report" <<'JSON'
{
  "files": {
    "src/Example.php": {
      "messages": [
        {
          "message": "Changed-line violation",
          "source": "Example.Changed",
          "severity": 5,
          "fixable": true,
          "type": "ERROR",
          "line": 2,
          "column": 1
        },
        {
          "message": "Second changed-line violation",
          "source": "Example.SecondChanged",
          "severity": 5,
          "fixable": true,
          "type": "ERROR",
          "line": 10,
          "column": 1
        },
        {
          "message": "Legacy violation",
          "source": "Example.Legacy",
          "severity": 5,
          "fixable": true,
          "type": "ERROR",
          "line": 20,
          "column": 1
        }
      ]
    }
  }
}
JSON

cat > "$diff_file" <<'DIFF'
diff --git a/src/Example.php b/src/Example.php
--- a/src/Example.php
+++ b/src/Example.php
@@ -1,0 +2,2 @@
+changed
+++ $counter;
@@ -9,0 +10 @@
+changed again
DIFF

set +e
output="$(php "$FILTER" "$report" "$diff_file" 2>&1)"
filter_exit=$?
set -e

if [[ "$filter_exit" -ne 1 ]]; then
    echo "$output"
    echo "Expected changed-line violations to fail the filter."
    exit 1
fi
if ! grep -q "Changed-line violation" <<< "$output"; then
    echo "$output"
    echo "The changed-line violation was not reported."
    exit 1
fi
if ! grep -q "Second changed-line violation" <<< "$output"; then
    echo "$output"
    echo "A changed-line violation after an added +++ line was not reported."
    exit 1
fi
if grep -q "Legacy violation" <<< "$output"; then
    echo "$output"
    echo "A violation outside the changed lines was reported."
    exit 1
fi

sed -i.bak \
    -e 's/"line": 2/"line": 30/' \
    -e 's/"line": 10/"line": 31/' \
    "$report"
rm "$report.bak"
output="$(php "$FILTER" "$report" "$diff_file")"
if ! grep -q "No PHPCS violations found on changed lines" <<< "$output"; then
    echo "$output"
    echo "Expected a successful report when violations are outside changed lines."
    exit 1
fi
