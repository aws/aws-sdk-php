#!/usr/bin/env bash

set -euo pipefail

readonly CHANGED_FILES="changed-source-files.txt"
readonly DIFF_BASE_FILE="diff-base.txt"
readonly DIFF_HEAD_FILE="diff-head.txt"
readonly CHANGED_LINES_DIFF="changed-source-lines.diff"
readonly PHPCS_JSON_REPORT="phpcs-report.json"
readonly PHPCS_REPORT="phpcs-report.txt"
readonly PHPCS_FILES_WITH_ERRORS="phpcs-files-with-errors.txt"
readonly PHPCS_AFTER_PHPCBF_REPORT="phpcs-after-phpcbf-report.txt"

if [[ "${EVENT_NAME:-}" == "pull_request" ]]; then
    changed_files=()
    while IFS= read -r file; do
        changed_files+=("$file")
    done < "$CHANGED_FILES"
    git -c core.quotePath=false diff \
        --unified=0 \
        --no-color \
        "$(cat "$DIFF_BASE_FILE")" \
        "$(cat "$DIFF_HEAD_FILE")" \
        -- "${changed_files[@]}" > "$CHANGED_LINES_DIFF"

    echo "::group::PHPCS violations on changed lines"
    set +e
    vendor/bin/phpcs \
        --standard=phpcs.xml.dist \
        --basepath="$(pwd)" \
        --no-colors \
        --report=json \
        --file-list="$CHANGED_FILES" > "$PHPCS_JSON_REPORT"
    phpcs_exit=$?
    set -e

    if [[ "$phpcs_exit" -eq 0 ]]; then
        echo "No PHPCS violations found."
        echo "::endgroup::"
        exit 0
    fi

    set +e
    php .github/scripts/filter-phpcs-report.php \
        "$PHPCS_JSON_REPORT" \
        "$CHANGED_LINES_DIFF"
    filter_exit=$?
    set -e
    echo "::endgroup::"

    exit "$filter_exit"
fi

echo "::group::PHPCS violations"
set +e
vendor/bin/phpcs \
    --standard=phpcs.xml.dist \
    --basepath="$(pwd)" \
    --no-colors \
    --file-list="$CHANGED_FILES" 2>&1 \
    | tee "$PHPCS_REPORT"
phpcs_exit=${PIPESTATUS[0]}
set -e
echo "::endgroup::"

if [[ "$phpcs_exit" -eq 0 ]]; then
    exit 0
fi

awk '
    /^[[:space:]]*FILE: / {
        sub(/^[[:space:]]*FILE: /, "")
        if (!seen[$0]++) {
            print
        }
    }
' "$PHPCS_REPORT" > "$PHPCS_FILES_WITH_ERRORS"

if [[ ! -s "$PHPCS_FILES_WITH_ERRORS" ]]; then
    echo "Could not determine files with PHPCS violations from $PHPCS_REPORT."
    exit "$phpcs_exit"
fi

echo "::group::PHPCBF fixed-code preview"
set +e
vendor/bin/phpcbf \
    --standard=phpcs.xml.dist \
    --file-list="$PHPCS_FILES_WITH_ERRORS" > phpcbf-report.txt 2>&1

vendor/bin/phpcs \
    --standard=phpcs.xml.dist \
    --basepath="$(pwd)" \
    --no-colors \
    --file-list="$PHPCS_FILES_WITH_ERRORS" > "$PHPCS_AFTER_PHPCBF_REPORT" 2>&1
phpcs_after_phpcbf_exit=$?
set -e

if [[ "$phpcs_after_phpcbf_exit" -ne 0 ]]; then
    echo "PHPCBF could not fix every violation automatically. The preview below reflects any changes PHPCBF wrote."
fi

previewed_changes=false
while IFS= read -r file; do
    if git diff --quiet -- "$file"; then
        continue
    fi

    echo ""
    echo "$file after PHPCBF"
    echo "----- begin PHPCBF diff -----"
    git diff --unified=2 -- "$file"
    echo "----- end PHPCBF diff -----"
    previewed_changes=true
done < "$PHPCS_FILES_WITH_ERRORS"

if [[ "$previewed_changes" == false ]]; then
    echo "PHPCBF did not write any changes."
fi
echo "::endgroup::"

echo ""
echo "Run the following command locally for PHPCBF to autofix formatting errors:"
echo "phpcbf --standard=phpcs.xml.dist \\"
sed 's/^/  /; $!s/$/ \\/' "$PHPCS_FILES_WITH_ERRORS"
echo ""

exit "$phpcs_exit"
