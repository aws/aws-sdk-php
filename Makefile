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
	time php build/packager.php

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

.PHONY: docs
