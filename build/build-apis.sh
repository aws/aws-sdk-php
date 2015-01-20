#!/usr/bin/env bash
# Converts a single API file or multiple API files to PHP config files.

set -e

usage() {
  cat <<EOT
Usage: build-apis [--help] SRC

Copies a source JSON file or directory of JSON files to the API folder as PHP
config files.

Options:
  --help    Displays this help message.

Arguments:
  SRC       Path to a JSON file, a directory that contains files, or a glob
            that contains JSON files.
EOT
}

# Ensure that at least one argument was passed.
[ $# -eq 0 ] && usage && exit 1
[ "$1" == "--help" ] && usage && exit 0

# Get the current script directory.
DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

tojson() {
  f=${1:?"a filename is required"}
  [ "$f" == "." ] && return
  topath="$DIR/../src/data/`basename $f .json`.php"
  php json-to-php.php $f > "$topath"
}

max_jobs=25
counter=0

for f in "$@"; do
  tojson $f &
  ((counter++))
  [ $counter -eq "$max_jobs" ] && wait
done

[ $counter -ne 0 ] && wait
