#!/usr/bin/env bash

set -euo pipefail

readonly CHANGED_FILES="changed-source-files.txt"
readonly PHPCS_REPORT="phpcs-report.txt"
readonly PHPCS_FILES_WITH_ERRORS="phpcs-files-with-errors.txt"
readonly PHPCS_AFTER_PHPCBF_REPORT="phpcs-after-phpcbf-report.txt"

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
