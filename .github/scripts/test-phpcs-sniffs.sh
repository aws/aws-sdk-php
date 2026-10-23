#!/usr/bin/env bash

set -euo pipefail

readonly INVALID_FIXTURE=".github/phpcs/tests/fixtures/first-condition-new-line.php"
readonly EXPECTED_FIXTURE=".github/phpcs/tests/fixtures/first-condition-same-line.php"
readonly SNIFF=".github/phpcs/AwsSdk/Sniffs/ControlStructures/FirstConditionSameLineSniff.php"
readonly PHPCS_BIN="${PHPCS_BIN:-vendor/bin/phpcs}"
readonly PHPCBF_BIN="${PHPCBF_BIN:-vendor/bin/phpcbf}"

temporary_directory="$(mktemp -d)"
trap 'rm -rf "$temporary_directory"' EXIT
actual_fixture="$temporary_directory/first-condition.php"
cp "$INVALID_FIXTURE" "$actual_fixture"

set +e
phpcs_output="$(
    "$PHPCS_BIN" \
        --standard=phpcs.xml.dist \
        --no-colors \
        "$actual_fixture" 2>&1
)"
phpcs_exit=$?
set -e

if [[ "$phpcs_exit" -eq 0 ]]; then
    echo "Expected PHPCS to reject a multi-line if condition beginning on a new line."
    exit 1
fi

if ! grep -q "FirstConditionLine" <<< "$phpcs_output"; then
    echo "$phpcs_output"
    echo "PHPCS did not report the expected FirstConditionLine violation."
    exit 1
fi

set +e
"$PHPCBF_BIN" \
    --standard=phpcs.xml.dist \
    --no-colors \
    "$actual_fixture" >/dev/null
phpcbf_exit=$?
set -e

if [[ "$phpcbf_exit" -gt 1 ]]; then
    echo "PHPCBF could not correct the multi-line if condition."
    exit "$phpcbf_exit"
fi

if ! cmp -s "$EXPECTED_FIXTURE" "$actual_fixture"; then
    echo "PHPCBF produced an unexpected result:"
    diff -u "$EXPECTED_FIXTURE" "$actual_fixture" || true
    exit 1
fi

"$PHPCS_BIN" \
    --standard=phpcs.xml.dist \
    --no-colors \
    "$actual_fixture" \
    "$SNIFF"
