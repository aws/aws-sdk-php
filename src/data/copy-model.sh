#!/bin/bash

declare -r INTEG="aws-dr-tools-integration-pdx-64002.pdx4.corp.amazon.com"
declare -r APOLLO_PATH="/apollo/env/CoralJSONModels-development"

declare SERVICE="$1"
declare VERSION="$2"

if [ -z "${SERVICE}" ]; then
  echo "Usage copy-model.sh SERVICENAME [VERSION]"
  exit 1
fi

if [ -z "${VERSION}" ]; then
  echo "Syncing all versions and models for ${SERVICE}"
  declare COPYTO="./"
else
  echo "Syncing the ${VERSION} or ${SERVICE}"
  declare COPYTO="./${SERVICE}"
fi

scp -r "${INTEG}:${APOLLO_PATH}/${SERVICE}/${VERSION}" "${COPYTO}"

