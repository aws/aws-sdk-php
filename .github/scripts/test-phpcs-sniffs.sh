#!/usr/bin/env bash

set -euo pipefail

readonly PHPCS_BIN="${PHPCS_BIN:-vendor/bin/phpcs}"
readonly PHPCBF_BIN="${PHPCBF_BIN:-vendor/bin/phpcbf}"

temporary_directory="$(mktemp -d)"
trap 'rm -rf "$temporary_directory"' EXIT

test_sniff() {
    local invalid_fixture="$1"
    local expected_fixture="$2"
    local error_code="$3"
    local description="$4"
    local actual_fixture="$temporary_directory/$(basename "$invalid_fixture")"

    cp "$invalid_fixture" "$actual_fixture"

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
        echo "Expected PHPCS to reject ${description}."
        exit 1
    fi

    if ! grep -q "$error_code" <<< "$phpcs_output"; then
        echo "$phpcs_output"
        echo "PHPCS did not report the expected ${error_code} violation."
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
        echo "PHPCBF could not correct ${description}."
        exit "$phpcbf_exit"
    fi

    if ! cmp -s "$expected_fixture" "$actual_fixture"; then
        echo "PHPCBF produced an unexpected result:"
        diff -u "$expected_fixture" "$actual_fixture" || true
        exit 1
    fi

    "$PHPCS_BIN" \
        --standard=phpcs.xml.dist \
        --no-colors \
        "$actual_fixture"
}

test_sniff \
    ".github/phpcs/tests/fixtures/first-condition-new-line.php" \
    ".github/phpcs/tests/fixtures/first-condition-same-line.php" \
    "FirstConditionLine" \
    "a multi-line if condition beginning on a new line"

test_sniff \
    ".github/phpcs/tests/fixtures/multiline-function-brace-invalid.php" \
    ".github/phpcs/tests/fixtures/multiline-function-brace-valid.php" \
    "TypedBraceOwnLine" \
    "an invalid multi-line function declaration brace"

comment_fixture=".github/phpcs/tests/fixtures/multiline-function-comment.php"
actual_comment_fixture="$temporary_directory/$(basename "$comment_fixture")"
cp "$comment_fixture" "$actual_comment_fixture"

set +e
comment_output="$(
    "$PHPCS_BIN" \
        --standard=phpcs.xml.dist \
        --no-colors \
        "$actual_comment_fixture" 2>&1
)"
comment_exit=$?
set -e

if [[ "$comment_exit" -eq 0 ]] || ! grep -q "BraceSameLine" <<< "$comment_output"; then
    echo "$comment_output"
    echo "PHPCS did not report the expected declaration comment violation."
    exit 1
fi

set +e
"$PHPCBF_BIN" \
    --standard=phpcs.xml.dist \
    --no-colors \
    "$actual_comment_fixture" >/dev/null
set -e

if ! cmp -s "$comment_fixture" "$actual_comment_fixture"; then
    echo "PHPCBF rewrote a declaration containing an intervening comment:"
    diff -u "$comment_fixture" "$actual_comment_fixture" || true
    exit 1
fi
php -l "$actual_comment_fixture" >/dev/null

"$PHPCS_BIN" \
    --standard=phpcs.xml.dist \
    --no-colors \
    ".github/phpcs/AwsSdk/Sniffs/ControlStructures/FirstConditionSameLineSniff.php" \
    ".github/phpcs/AwsSdk/Sniffs/Functions/MultiLineFunctionDeclarationBraceSniff.php"
