help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo "  clean          to delete all Makefile artifacts"
	@echo "  clear-cache    to clear the cached JSON compiled SDK files"
	@echo "  test           to perform unit tests.  Provide TEST to perform a specific test."
	@echo "  coverage       to perform unit tests with code coverage. Provide TEST to perform a specific test."
	@echo "  coverage-show  to show the code coverage report"
	@echo "  integ          to run integration tests. Provide TEST to perform a specific test."
	@echo "  guide          to build the user guide documentation"
	@echo "  guide-show     to view the user guide"
	@echo "  api            to build the API documentation. Provide ISSUE_LOGGING_ENABLED to save build issues to file."
	@echo "  api-show       to view the API documentation"
	@echo "  api-package    to build the API documentation as a ZIP"
	@echo "  api-manifest   to build an API manifest JSON file for the SDK"
	@echo "  compile-json   to compile the JSON data files in src/data into PHP files"
	@echo "  package        to package a phar and zip file for a release"
	@echo "  check-tag      to ensure that the TAG argument was passed"
	@echo "  tag            to chag tag a release based on the changelog. Must provide a TAG"
	@echo "  release        to package the release and push it to GitHub. Must provide a TAG"
	@echo "  full-release   to tag, package, and release the SDK. Provide TAG"

clean: clear-cache
	rm -rf build/artifacts/*
	cd docs && make clean

clear-cache:
	php build/aws-clear-cache.php

test:
	@AWS_ACCESS_KEY_ID=foo AWS_SECRET_ACCESS_KEY=bar AWS_CSM_ENABLED=false \
	vendor/bin/phpunit --testsuite=unit $(TEST)

test-phar: package
	[ -f build/artifacts/behat.phar ] || (cd build/artifacts && \
	wget https://github.com/Behat/Behat/releases/download/v3.0.15/behat.phar)
	[ -f build/artifacts/phpunit.phar ] || (cd build/artifacts && \
	wget https://phar.phpunit.de/phpunit.phar)
	php -dopcache.enable_cli=1 build/phar-test-runner.php --format=progress

coverage:
	@AWS_ACCESS_KEY_ID=foo AWS_SECRET_ACCESS_KEY=bar AWS_CSM_ENABLED=false \
	vendor/bin/phpunit --testsuite=unit --coverage-html=build/artifacts/coverage $(TEST)

coverage-show:
	open build/artifacts/coverage/index.html

# Ensures that the MODELSDIR variable was passed to the make command
check-models-dir:
	$(if $(MODELSDIR),,$(error MODELSDIR is not defined. Pass via "make tag MODELSDIR=../models"))

sync-models: check-models-dir
	rsync -chavPL $(MODELSDIR) src/data --exclude="*/*/service-2.json" \
	--exclude="*/*/resources-1.json" --exclude=".idea/" --exclude="*.iml" \
	--exclude="sdb/" --exclude="lambda/2014-11-11/" --exclude=".git/" \
	--exclude="*.md"

	rsync -chavPL src/data/iot-data/ src/data/data.iot/
	rm -rf src/data/iot-data

	rsync -chavPL src/data/meteringmarketplace/ src/data/metering.marketplace/
	rm -rf src/data/meteringmarketplace

integ:
	vendor/bin/behat --format=progress --tags=integ

smoke:
	vendor/bin/behat --format=progress --tags=smoke

smoke-noassumerole:
	vendor/bin/behat --format=progress --tags='~@noassumerole&&@smoke'

# Packages the phar and zip
package:
	php build/packager.php $(SERVICE)

guide:
	cd docs && make html

guide-show:
	open docs/_build/html/index.html

api-get-apigen:
	mkdir -p build/artifacts
	[ -f build/artifacts/apigen.phar ] || wget -q -O build/artifacts/apigen.phar https://github.com/ApiGen/ApiGen/releases/download/v4.1.2/apigen.phar

api: api-get-apigen
	# Build the package if necessary.
	[ -d build/artifacts/staging ] || make package
	# Delete a previously built API build to avoid the prompt.
	rm -rf build/artifacts/docs
	php build/artifacts/apigen.phar generate --config build/docs/apigen.neon --debug
	make api-models
	make redirect-map

api-models:
	# Build custom docs
	php build/docs.php $(if $(ISSUE_LOGGING_ENABLED),--issue-logging-enabled,)

redirect-map:
	# Build redirect map
	php build/build-redirect-map.php

api-show:
	open build/artifacts/docs/index.html

api-package:
	zip -r build/artifacts/aws-docs-api.zip build/artifacts/docs/build

api-manifest:
	php build/build-manifest.php
	make clear-cache

# Compiles JSON data files and prints the names of PHP data files created or
# updated.
compile-json:
	php -dopcache.enable_cli=1 build/compile-json.php
	git diff --name-only | grep ^src/data/.*\.json\.php$ || true

annotate-clients: clean
	php build/annotate-clients.php --all

annotate-client-locator: clean
	php build/annotate-client-locator.php

build-manifest:
	php build/build-manifest.php >/dev/null

build: | build-manifest compile-json annotate-clients annotate-client-locator

# Ensures that the TAG variable was passed to the make command
check-tag:
	$(if $(TAG),,$(error TAG is not defined. Pass via "make tag TAG=4.2.1"))

# Creates a release but does not push it. This task updates the changelog
# with the TAG environment variable, replaces the VERSION constant, ensures
# that the source is still valid after updating, commits the changelog and
# updated VERSION constant, creates an annotated git tag using chag, and
# prints out a diff of the last commit.
tag: check-tag
	@echo Tagging $(TAG)
	chag update $(TAG)
	sed -i'' -e "s/VERSION = '.*'/VERSION = '$(TAG)'/" src/Sdk.php
	php -l src/Sdk.php
	git commit -a -m '$(TAG) release'
	chag tag
	@echo "Release has been created. Push using 'make release'"
	@echo "Changes made in the release commit"
	git diff HEAD~1 HEAD

# Creates a release based on the master branch and latest tag. This task
# pushes the latest tag, pushes master, creates a phar and zip, and creates
# a Github release. Use "TAG=X.Y.Z make tag" to create a release, and use
# "make release" to push a release. This task requires that the
# OAUTH_TOKEN environment variable is available and the token has permission
# to push to the repository.
release: check-tag package
	git push origin master
	git push origin $(TAG)
	php build/gh-release.php $(TAG)

# Tags the repo and publishes a release.
full_release: tag release

.PHONY: help clean test coverage coverage-show integ package compile-json \
guide guide-show api-get-apigen api api-show api-package api-manifest \
check-tag tag release full-release clear-cache test-phar integ smoke \
api-models compile-json annotate-clients annotate-client-locator \
build-manifest check-models-dir sync-models
