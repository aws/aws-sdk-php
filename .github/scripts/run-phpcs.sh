#!/usr/bin/env bash

set -euo pipefail

readonly CHANGED_FILES="changed-source-files.txt"
readonly PHPCS_REPORT="phpcs-report.txt"
readonly PHPCS_AFTER_PHPCBF_REPORT="phpcs-after-phpcbf-report.txt"
readonly PHPCS_VIOLATION_LINES="phpcs-violation-lines.txt"
readonly CHANGED_LINE_RANGES="changed-line-ranges.txt"
readonly PHPCS_RANGES="phpcs-ranges.txt"
readonly DIFF_BASE_FILE="diff-base.txt"
readonly DIFF_HEAD_FILE="diff-head.txt"

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
    /^FILE: / {
        file = $0
        sub(/^FILE: /, "", file)
        next
    }
    /^[[:space:]]*[0-9]+[[:space:]]+\|[[:space:]]+ERROR[[:space:]]+\|/ {
        line = $1 + 0
        print file, line
    }
' "$PHPCS_REPORT" > "$PHPCS_VIOLATION_LINES"

while IFS= read -r file; do
    git diff --unified=0 "$(cat "$DIFF_BASE_FILE")" "$(cat "$DIFF_HEAD_FILE")" -- "$file" \
        | awk -v file="$file" '
            /^@@ / {
                split($0, parts, " ")
                new_range = parts[3]
                sub(/^\+/, "", new_range)
                split(new_range, range, ",")
                start = range[1]
                count = range[2] == "" ? 1 : range[2]

                if (count > 0) {
                    print file, start, start + count - 1
                }
            }
        '
done < "$CHANGED_FILES" > "$CHANGED_LINE_RANGES"

awk '
    NR == FNR {
        count[$1]++
        start[$1, count[$1]] = $2
        end[$1, count[$1]] = $3
        next
    }
    {
        file = $1
        line = $2

        if (!(file in all_first) || line < all_first[file]) {
            all_first[file] = line
        }
        if (!(file in all_last) || line > all_last[file]) {
            all_last[file] = line
        }

        for (i = 1; i <= count[file]; i++) {
            if (line >= start[file, i] && line <= end[file, i]) {
                if (!(file in changed_first) || line < changed_first[file]) {
                    changed_first[file] = line
                }
                if (!(file in changed_last) || line > changed_last[file]) {
                    changed_last[file] = line
                }
            }
        }
    }
    END {
        for (file in all_first) {
            if (file in changed_first) {
                print file, changed_first[file], changed_last[file]
            } else {
                print file, all_first[file], all_last[file]
            }
        }
    }
' "$CHANGED_LINE_RANGES" "$PHPCS_VIOLATION_LINES" > "$PHPCS_RANGES"

echo "::group::PHPCBF fixed-code preview"
set +e
vendor/bin/phpcbf \
    --standard=phpcs.xml.dist \
    --file-list="$CHANGED_FILES" > phpcbf-report.txt 2>&1

vendor/bin/phpcs \
    --standard=phpcs.xml.dist \
    --basepath="$(pwd)" \
    --no-colors \
    --file-list="$CHANGED_FILES" > "$PHPCS_AFTER_PHPCBF_REPORT" 2>&1
phpcs_after_phpcbf_exit=$?
set -e

if [[ "$phpcs_after_phpcbf_exit" -ne 0 ]]; then
    echo "PHPCBF could not fix every violation automatically. The preview below reflects any changes PHPCBF wrote."
fi

while IFS= read -r file; do
    range="$(awk -v target="$file" '$1 == target { print $2 " " $3 }' "$PHPCS_RANGES")"
    if [[ -z "$range" ]]; then
        continue
    fi

    start_line="${range%% *}"
    end_line="${range##* }"

    echo ""
    echo "$file:$start_line-$end_line after PHPCBF"
    echo "----- begin fixed PHP -----"
    sed -n "${start_line},${end_line}p" "$file"
    echo "----- end fixed PHP -----"
done < "$CHANGED_FILES"
echo "::endgroup::"

echo ""
echo "Run the following command locally for PHPCBF to autofix formatting errors:"
echo "phpcbf --standard=phpcs.xml.dist \\"
sed 's/^/  /; $!s/$/ \\/' "$CHANGED_FILES"
echo ""

exit "$phpcs_exit"
