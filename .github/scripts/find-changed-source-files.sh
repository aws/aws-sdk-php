#!/usr/bin/env bash

set -euo pipefail

readonly AUTOMATION_USER="aws-sdk-php-automation"
readonly CHANGED_FILES="changed-source-files.txt"
readonly DIFF_BASE_FILE="diff-base.txt"
readonly DIFF_HEAD_FILE="diff-head.txt"

if [[ "${EVENT_NAME:-}" == "pull_request" ]]; then
    BASE_SHA="${PR_BASE_SHA:?PR_BASE_SHA is required for pull_request events}"
    HEAD_SHA="${PR_HEAD_SHA:?PR_HEAD_SHA is required for pull_request events}"
    DIFF_BASE="$(git merge-base "$BASE_SHA" "$HEAD_SHA")"
else
    DIFF_BASE="${PUSH_BEFORE_SHA:-}"
    HEAD_SHA="${HEAD_SHA:-${GITHUB_SHA:-}}"
fi

if [[ -z "$HEAD_SHA" ]]; then
    echo "HEAD_SHA is required."
    exit 1
fi

if [[ -z "$DIFF_BASE" || "$DIFF_BASE" == "0000000000000000000000000000000000000000" ]]; then
    DIFF_BASE="$(git rev-list --max-parents=0 "$HEAD_SHA")"
fi

echo "$DIFF_BASE" > "$DIFF_BASE_FILE"
echo "$HEAD_SHA" > "$DIFF_HEAD_FILE"

SKIP_GENERATED_SERVICE_STUBS=false
if [[ "${GITHUB_ACTOR:-}" == "$AUTOMATION_USER" || "${PR_USER_LOGIN:-}" == "$AUTOMATION_USER" ]]; then
    SKIP_GENERATED_SERVICE_STUBS=true
fi

is_generated_service_stub() {
    local file="$1"

    if [[ "$file" =~ ^src/([^/]+)/([^/]+)Client\.php$ ]]; then
        local service="${BASH_REMATCH[1]}"
        local client="${BASH_REMATCH[2]}"

        [[ "$client" == "$service" ]] || return 1
        grep -Fxq "class ${service}Client extends AwsClient {}" "$file"
        return
    fi

    if [[ "$file" =~ ^src/([^/]+)/Exception/([^/]+)Exception\.php$ ]]; then
        local service="${BASH_REMATCH[1]}"
        local exception="${BASH_REMATCH[2]}"

        [[ "$exception" == "$service" ]] || return 1
        grep -Fxq "class ${service}Exception extends AwsException {}" "$file"
        return
    fi

    return 1
}

git diff --name-only --diff-filter=ACMRT "$DIFF_BASE" "$HEAD_SHA" -- '*.php' \
    | while IFS= read -r file; do
        [[ "$file" == src/* ]] || continue
        [[ "$file" == src/data/* ]] && continue

        if [[ "$SKIP_GENERATED_SERVICE_STUBS" == true ]] && is_generated_service_stub "$file"; then
            continue
        fi

        echo "$file"
    done > "$CHANGED_FILES"

if [[ -s "$CHANGED_FILES" ]]; then
    echo "has_files=true" >> "$GITHUB_OUTPUT"
    cat "$CHANGED_FILES"
else
    echo "has_files=false" >> "$GITHUB_OUTPUT"
    echo "No changed source files to check."
fi
