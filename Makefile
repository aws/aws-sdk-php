all: clean coverage docs

clean:
	rm -rf build/artifacts/*
	cd docs && make clean

test:
	vendor/bin/phpunit --testsuite=unit $(TEST)

travis:
	vendor/bin/phpunit --colors --testsuite=unit --coverage-text

coverage:
	vendor/bin/phpunit --testsuite=unit --coverage-html=build/artifacts/coverage

coverage-show:
	open build/artifacts/coverage/index.html

integ:
	vendor/bin/phpunit --debug --testsuite=integ $(TEST)

# Packages the phar and zip
package: burgomaster
	time php build/packager.php $(SERVICE)

# Downloads a copy of Burgomaster
burgomaster:
	mkdir -p build/artifacts
	curl -s https://raw.githubusercontent.com/mtdowling/Burgomaster/0.0.2/src/Burgomaster.php > build/artifacts/Burgomaster.php

guide:
	cd docs && make html

guide-show:
	open docs/_build/html/index.html

api:
	time php build/artifacts/sami.phar update build/docs.php

api-clean:
	rm -rf build/artifacts/docs/build build/artifacts/docs/cache build/artifacts/docs/theme build/artifacts/aws-docs-api.zip

api-show:
	open build/artifacts/docs/build/index.html

api-package:
	zip -r build/artifacts/aws-docs-api.zip build/artifacts/docs/build

api-all: api-clean api api-package api-show

build-apis:
	php build/api.php $(SRC)

# Ensures that the TAG variable was passed to the make command
check_tag:
	$(if $(TAG),,$(error TAG is not defined. Pass via "make tag TAG=4.2.1"))

# Creates a release but does not push it. This task updates the changelog
# with the TAG environment variable, replaces the VERSION constant, ensures
# that the source is still valid after updating, commits the changelog and
# updated VERSION constant, creates an annotated git tag using chag, and
# prints out a diff of the last commit.
tag: check_tag
	@echo Tagging $(TAG)
	chag update -m '$(TAG) ()'
	sed -i '' -e "s/VERSION = '.*'/VERSION = '$(TAG)'/" src/Sdk.php
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
release: check_tag package
	git push origin v3
	git push origin $(TAG)
	php build/gh-release.php $(TAG)

# Tags the repo and publishes a release.
full_release: tag release

.PHONY: docs build-apis
